<?php 
 include_once("../mylibrary/showproducts.php");
    if(isset($_SESSION['store_admin'])){
        echo "<h2>Click on the product to edit</h2>";
        $catid = $_GET['cat'];
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        showproducts($catid, $page, "admin.php?content=editproducts", "admin.php?content=updateproduct");
    }else{
        echo "<h2>You are not logged in!</h2>";
    }
?>