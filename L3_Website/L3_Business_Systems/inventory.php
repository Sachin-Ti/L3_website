<?php


// --- CONFIG - update these ---
$servername = "localhost";
$username   = "sachintiwari";
$password   = "SmkRVE4ej7l8Zi";
$database   = "sachintiwari_business_systems";

// --- CONNECT ---
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("DB connection failed: " . $connection->connect_error);
}

// ------------------------------------------------------------
// HANDLE STOCK UPDATES
// ------------------------------------------------------------
// ------------------------------------------------------------
// HANDLE STOCK UPDATES (with max limit 100)
// ------------------------------------------------------------
if (isset($_POST['update_stock'])) {

    $product_code = $connection->real_escape_string($_POST['product_code']);
    $amount       = intval($_POST['amount']); // + or - number

    // Get current stock
    $check_sql = "SELECT stock FROM total_inventory WHERE product_code='$product_code'";
    $check_res = $connection->query($check_sql);

    if ($check_res->num_rows > 0) {
        $row = $check_res->fetch_assoc();
        $current_stock = intval($row['stock']);
    } else {
        $current_stock = 0;
    }

    // Apply change
    $new_stock = $current_stock + $amount;

    // Enforce limits (0 to 100)
    if ($new_stock < 0) {
        $new_stock = 0;
    }
    if ($new_stock > 100) {
        $new_stock = 100;
    }

    // Insert or update
    if ($check_res->num_rows > 0) {
        $update_sql = "
            UPDATE total_inventory 
            SET stock = $new_stock 
            WHERE product_code = '$product_code'
        ";
    } else {
        $update_sql = "
            INSERT INTO total_inventory (product_code, stock)
            VALUES ('$product_code', $new_stock)
        ";
    }

    $connection->query($update_sql);

    // Reload page without losing search filters
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;



    // Check if product exists in inventory
    $check_sql = "SELECT stock FROM total_inventory WHERE product_code='$product_code'";
    $check_res = $connection->query($check_sql);

    if ($check_res->num_rows > 0) {
        // Update existing product
        $update_sql = "UPDATE total_inventory 
                       SET stock = stock + ($amount)
                       WHERE product_code = '$product_code'";
    } else {
        // Insert missing product
        $update_sql = "INSERT INTO total_inventory (product_code, stock)
                       VALUES ('$product_code', $amount)";
    }

    $connection->query($update_sql);

    // Refresh page WITHOUT clearing search filters
    $redirect_url = $_SERVER['HTTP_REFERER'];
    header("Location: $redirect_url");
    exit;
}


// --- Get filters ---
$q        = isset($_GET['q']) ? trim($_GET['q']) : '';
$type     = isset($_GET['type']) ? $_GET['type'] : 'all';
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// Escape inputs
$q_esc        = $connection->real_escape_string($q);
$category_esc = $connection->real_escape_string($category);

// Build WHERE filters
$where_clauses = array();

if ($q_esc !== '') {
    $where_clauses[] = "(p.product_code LIKE '%$q_esc%' OR p.product_name LIKE '%$q_esc%')";
}

if ($type === 'finished') {
    $where_clauses[] = "p.type = 'Finished'";
} elseif ($type === 'raw') {
    $where_clauses[] = "p.type = 'Raw'";
}

if ($category_esc !== 'all' && $category_esc !== '') {
    $where_clauses[] = "(p.category = '$category_esc')";
}

$where_sql = "";
if (count($where_clauses) > 0) {
    $where_sql = "WHERE " . implode(" AND ", $where_clauses);
}

// MAIN QUERY
$sql = "
SELECT
  p.product_code,
  p.product_name,
  p.category,
  p.type,
  COALESCE(t.stock, 0) AS stock
FROM (
  SELECT product_code, product_name, category, 'Finished' AS type
  FROM finished_products

  UNION ALL

  SELECT materials_id AS product_code, raw_materials AS product_name, '' AS category, 'Raw' AS type
  FROM raw_products
) p
LEFT JOIN total_inventory t 
  ON p.product_code = t.product_code
$where_sql
ORDER BY p.product_code ASC
LIMIT 1000;
";

// Run query
$result = $connection->query($sql);

if (!$result) {
    die("Query error: " . $connection->error);
}

// Get categories
$categories = array();
$cat_sql = "SELECT DISTINCT category FROM finished_products ORDER BY category";
$cat_result = $connection->query($cat_sql);

if ($cat_result) {
    while ($row = $cat_result->fetch_assoc()) {
        if ($row['category'] !== "") {
            $categories[] = $row['category'];
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Inventory Dashboard</title>

<style>
body { font-family: Arial; margin:20px; background:#f5f5f5; }
table { width:100%; background:white; border-collapse:collapse; }
td, th { padding:10px; border-bottom:1px solid #ddd; }
th { background:#dfe7ff; }
.type-badge { padding:5px 8px; border-radius:10px; font-size:12px; }
.Finished { background:#e6f3ff; color:#004a99; }
.Raw { background:#ffe7cc; color:#a65a00; }
</style>

</head>
<body>

<a href="manager_page.php" style="
    display:inline-block;
    margin-bottom:10px;
    padding:6px 12px;
    background:#007bff;
    color:white;
    border-radius:4px;
    text-decoration:none;
    font-size:14px;">
    ← Back to Home
</a>


<form method="get">
    <input type="text" name="q" placeholder="Search..." value="<?php echo htmlspecialchars($q); ?>">
    <select name="type">
        <option value="all">All Types</option>
        <option value="finished" <?php if ($type=='finished') echo 'selected'; ?>>Finished Products</option>
        <option value="raw" <?php if ($type=='raw') echo 'selected'; ?>>Raw Materials</option>
    </select>

    <select name="category">
        <option value="all">All Categories</option>
        <?php foreach ($categories as $c): ?>
            <option value="<?php echo htmlspecialchars($c); ?>" <?php if ($category==$c) echo 'selected'; ?>>
                <?php echo htmlspecialchars($c); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Search</button>
</form>

<br>

<table>
<tr>
    <th>Product Code</th>
    <th>Type</th>
    <th>Name</th>
    <th>Category</th>
    <th style="text-align:right;">Stock</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?php echo $row['product_code']; ?></td>
    <td><span class="type-badge <?php echo $row['type']; ?>"><?php echo $row['type']; ?></span></td>
    <td><?php echo $row['product_name']; ?></td>
    <td><?php echo $row['category']; ?></td>
<td style="text-align:right;">

    <!-- Current Stock -->
    <strong><?php echo $row['stock']; ?></strong>

    <!-- Quick -1 / +1 buttons -->
    <form method="post" style="display:inline;">
        <input type="hidden" name="product_code" value="<?php echo $row['product_code']; ?>">
        <input type="hidden" name="amount" value="-1">
        <button type="submit" name="update_stock">-1</button>
    </form>

    <form method="post" style="display:inline;">
        <input type="hidden" name="product_code" value="<?php echo $row['product_code']; ?>">
        <input type="hidden" name="amount" value="1">
        <button type="submit" name="update_stock">+1</button>
    </form>

    <!-- Custom amount input -->
    <form method="post" style="margin-top:5px;">
        <input type="number" name="amount" placeholder="0" style="width:60px;">
        <input type="hidden" name="product_code" value="<?php echo $row['product_code']; ?>">
        <button type="submit" name="update_stock">Apply</button>
    </form>

</td>

</tr>
<?php endwhile; ?>

</table>

</body>
</html>

<?php
$connection->close();
?>
