<?php 
 include_once("../mylibrary/getThumb.php");
    $catid =$_POST['cat'];
    $description =$_POST['description'];
    $price =$_POST['price'];
    $quantity =$_POST['quantity'];

    if(get_magic_quotes_gpc()){
        $catid = stripslashes($catid);
        $description = stripslashes($description);
        $price = stripslashes($price);
        $quantity = stripslashes($quantity);
    }
    $catid = mysql_real_escape_string($catid);
    $description = mysql_real_escape_string($description);
    $price = mysql_real_escape_string($price);
    $quantity = mysql_real_escape_string($quantity);

    $thumbnail = getThumb($_FILES['picture']);
    $thumbnail = mysql_real_escape_string($thumbnail);

    $query = "INSERT into products(catid, description, picture, price, quantity) VALUES('$catid', '$description', '$thumbnail', '$price','$quantity')";
    $result = mysql_query($query) or die(mysql_error());
    if($result){
        echo "<h2>New product added</h2>\n";
    }else{
        echo "<h2>New product not added!!!!</h2>\n";
    }

?>