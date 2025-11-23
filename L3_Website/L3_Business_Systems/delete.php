<?php
if (isset($_GET["id"])) {
   $id = $_GET["id"];

    $servername = "localhost";
    $username = "sachintiwari";
    $password = "SmkRVE4ej7l8Zi";
    $database = "sachintiwari_business_systems";

    $connection = new mysqli($servername, $username, $password, $database);
    $sql = "DELETE FROM finished_products WHERE id=$id";
    $connection->query($sql);
}

header("Location: finished_products.php");
exit;
?>