<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inventory system</title>
        
        <!--Materials Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=order_approve" />

        <!--CSS/Stylesheet-->
        <link rel="stylesheet" href="styles_products.css"/>

    </head>
    <body>
<div class="container">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="./images/logo.png">
                <h2>Business<span class="danger">Systems</span> </h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-round">close</span>
            </div>
        </div>
        <div class="sidebar">
            <a href="manager_page.php"  >
                  <span class="material-icons-round">grid_view</span>
                  <h3>Dashboard</h3>
            </a>
        
            <a href="inventory" >
                  <span class="material-icons-round">inventory</span>
                  <h3>inventory</h3>
            </a>

         
            <a href="raw_materials.php">
                  <span class="material-icons-round">warehouse</span>
                  <h3>Raw Materials</h3>
            </a>

         
            <a href="finished_products.php" class="active">
                  <span class="material-icons-round">inventory_2</span>
                  <h3>Finished Goods</h3>
            </a>

                                <a href="Health_Safety.php">
                          <span class="material-icons-round">health_and_safety</span>
                          <h3>Health&Safety</h3>
                    </a>
            
            <a href="about_user.php">
            <span class="material-icons-outlined">info</span>
                    <h3>about </h3>
            </a>

 
              <a href="index.php">
                  <span class="material-icons-round">logout</span>
                  <h3>Logout</h3>
              </a>
        </div>
    </aside>
    <main>
    <h2 style="margin-bottom: 0.8rem;">Finished Products</h2>
    <a class="new-product-link" href="create.php"><h2>New Product</h2></a>
    <div class="finished-products-table">
        <table>
            <thead>
                <tr>
                    <th>Product ID</th> 
                    <th>Product name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "sachintiwari";
                $password = "SmkRVE4ej7l8Zi";
                $database = "sachintiwari_business_systems";
                $connection = new mysqli($servername, $username, $password, $database);
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                $sql = "SELECT * FROM finished_products";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[product_code]</td>
                        <td>$row[product_name]</td>
                        <td>$row[category]</td>
                        <td>
                            <a class='edit-link' href='edit.php?id=$row[id]'>Edit</a>
                            <a class='delete-link' href='delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>

</main>
                <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-round">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-round active">light_mode</span>
                        <span class="material-icons-round">dark_mode</span>
                    </div>
                    </div>
                </div>
</div>
</body>
<script src="script.js"></script>  
</html>