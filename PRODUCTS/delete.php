<?php
if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "angproducts";

    $connection = new mysqli ($servername, $username, $password, $database);

    $sql = "DELETE FROM f4angproducts WHERE id=$id";
    $connection ->query($sql);
}
header ("location:/PRODUCTS/index.php");
exit;
?>