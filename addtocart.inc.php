<?php 
    $prodid = $_POST['prodid'];
    $quantity = $_POST['quantity'];

    $query = "SELECT quantity, description from products where prodid = '$prodid' ";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);

    // Gives total of what is in the array
    $stock = $row[0];
    // Gives the name of the object your click on
    $description = $row[1];

    if($quantity > $stock){
        echo "<h2>Sorry, there are only $stock $description left in stock</h2>\n";
        echo "<h2>Please select another quantity</h2>\n";
    }else{
        if (isset($_SESSION['cart'][$prodid]))
        {
           $_SESSION['cart'][$prodid] += $quantity;
        } else
        {
           $_SESSION['cart'][$prodid] = $quantity;
        }
        echo "<h2>Product added to cart.</h2>\n";
     }
     echo "<a href=\"index.php\">Continue shopping</a><br>\n";
     echo "<a href=\"index.php?content=checkout\">Check out</a>\n";
    
    


?>