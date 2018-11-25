<?php 
include_once("./mylibrary/showproducts.php");
    $catid = $_GET['cat'];
    $query = "SELECT name from categories where catid = '$catid'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);

    echo "<h2>{$row['name']} click on a product to purchase</h2>";

    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    showproducts($catid, $page, "index.php?content=buyproducts", "index.php?content=updatecart");
?>