<?php 
include_once("../mylibrary/getThumb.php");
    $button = $_POST['button'];

    if($button == "Delete Product"){
        $prodid = $_POST['prodid'];
        $query = "DELETE from products WHERE prodid = $prodid";
        $result = mysql_query($query); 
        if($result){
            echo "<h2>Product deleted!</h2>";
            exit;
        }
        else{
            echo "<h2>Product $prodid not deleted!</h2>";
            exit;
        }
    }
    else{
        $prodid = $_POST['prodid'];
        $catid = $_POST['catid'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

            // format the query to make your life easier 
        if(get_magic_quotes_gpc()){
            $description = stripslashes($description);
        }
        $description = mysql_real_escape_string($description);

        if(isset($_POST['onsale'])){
            $onsale = 1;
        }else{
            $onsale = 0;
        }

        $PicName = $_FILES['picture']['name'];
        if($PicName){
            $thumbnail = getThumb($_FILES['picture']);
            $thumbnail = mysql_real_escape_string($thumbnail);
            $query = "UPDATE products SET catid='$catid', description='$description', price='$price', quantity='$quantity',
             onsale='$onsale', picture='$thumbnail' WHERE prodid = '$prodid'";
        }else{
            $query = "UPDATE products SET catid='$catid', description='$description', price='$price', quantity='$quantity',
             onsale='$onsale' WHERE prodid = '$prodid'";
        }
        $result = mysql_query($query);
        if($result){
            echo "<h2>Product info changed!</h2>";
        }else{
            echo "<h2>Product info not changed!</h2>";
        }
    }

?>