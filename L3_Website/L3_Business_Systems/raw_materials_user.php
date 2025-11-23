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
            <a href="user_page.php"  >
                  <span class="material-icons-round">grid_view</span>
                  <h3>Dashboard</h3>
            </a>
        
            <a href="inventory_user.php" >
                  <span class="material-icons-round">inventory</span>
                  <h3>inventory</h3>
            </a>

         
            <a href="#" class="active">
                  <span class="material-icons-round">warehouse</span>
                  <h3>Raw Materials</h3>
            </a>

         
            <a href="finished_products_user.php">
                  <span class="material-icons-round">inventory_2</span>
                  <h3>Finished Goods</h3>
            </a>
            
            <a href="Health_Safety_user.php">
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
            <!---------------------END OF ASIDE ------------->
            <main>
    <h2 style="margin-bottom: 0.8rem;">Raw Materials</h2>

    <div class="finished-products-table">
        <table>
            <thead>
                <tr>
                    <th>Materials ID</th>
                    <th>Raw Materials</th>

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
                $sql = "SELECT materials_id, raw_materials FROM raw_products";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }
                while ($row = $result->fetch_assoc()) {
                    $materials_id = htmlspecialchars($row['materials_id']);
                    $raw = htmlspecialchars($row['raw_materials']);
                    echo "
                    <tr>
                        <td>{$materials_id}</td>
                        <td>{$raw}</td>

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