<?php
$servername = "localhost";
$username = "sachintiwari";
$password = "SmkRVE4ej7l8Zi";
$database = "sachintiwari_business_systems";

$connection = new mysqli($servername, $username, $password, $database);

$id ="";
$category ="";
$product_name ="";
$product_code ="";

$errorMessage ="";
$successMessage ="";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //GET method: show the data of the product

    if(!isset($_GET["id"])){
        header("Location: finished_products.php");
        exit;
    }

    $id = $_GET["id"];

    //read the row of the selected product from database table
    $sql = "SELECT * FROM finished_products WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        header("Location: finished_products.php");
        exit;
    }


    $product_code = $row["product_code"];
    $product_name = $row["product_name"];
    $category = $row["category"];} 
    
    
    else {

    //POST method: update the data of the product
    $id = $_POST["id"];
    $product_code = $_POST["product_code"];
    $product_name = $_POST["product_name"];
    $category = $_POST["category"];

        do {
        if (empty($product_code) || empty($product_name) || empty($category)) {
        $errorMessage = "All the fields are required";
        break;
        }

        $sql = "UPDATE finished_products " .
               "SET product_code = '$product_code', product_name = '$product_name', category = '$category' " .
               "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Product updated successfully";

        header("Location: finished_products.php");
        exit;

    } while (false);
    }
?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inventory system</title>
        
        <!--Materials Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=order_approve" />

        <!--CSS/Stylesheet-->
        <link rel="stylesheet" href="Health.css"/>

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
            <a href="index.php"  >
                  <span class="material-icons-round">grid_view</span>
                  <h3>Dashboard</h3>
            </a>
        
            <a href="#" >
                  <span class="material-icons-round">inventory</span>
                  <h3>inventory</h3>
            </a>

         
            <a href="#">
                  <span class="material-icons-round">warehouse</span>
                  <h3>Raw Materials</h3>
            </a>

         
            <a href="finished_products.php" class="active">
                  <span class="material-icons-round">inventory_2</span>
                  <h3>Finished Goods</h3>
            </a>
            
            <a href="#">
                  <span class="material-symbols-rounded">order_approve</span>
                  <h3>Orders </h3>
                  <span class="message-count"> 26</span>
            </a>

 
              <a href="#">
                  <span class="material-icons-round">logout</span>
                  <h3>Logout</h3>
              </a>
        </div>
        </aside>
    <main>
    <div class="container my-5">

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        } 
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Product Code</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="product_code" value="<?php echo $product_code; ?>" style="max-width: 300px;">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Product Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>" style="max-width: 300px;">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Category</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="category" value="<?php echo $category; ?>" style="max-width: 300px;">
            </div>
          </div>

          <?php
          if (!empty($successMessage)) {
            echo "
            <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            </div>
            </div>
            ";
          }
          ?>

          <div class="row mb-3">
            <div class="offset-sm-3 col-sm-6 d-flex" style="gap: 10px;">
              <button type="submit" class="btn btn-primary" style="width: 120px; border-radius: 20px; background-color: #7380ec; color: #fff;">Submit</button>
              <a class="btn" href="finished_products.php" style="width: 120px; border-radius: 20px; background-color: #ff0000; color: #fff; display: inline-block; text-align: center; line-height: 38px; font-weight: 500;">Cancel</a>
            </div>
          </div>

            


            



        </form>

            
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
                <script src="script.js"></script>      
        </body>
        </html>