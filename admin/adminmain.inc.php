<?php 
    $userid = $_SESSION['store_admin'];

    $query = "SELECT name from admin WHERE userid = '$userid'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    
    $name = $row['name'];
    echo "<h2 class=\"page-title\">Welcome $name</h2>";

    $date = date("l, F j ,Y");
    echo "<h2 class=\"page-subtitle\">Today's Date: $date</h2>";

    if(is_readable('../mylibrary/dailymessages.txt')){
        $message = file_get_contents('../mylibrary/dailymessages.txt');
        $message = nl2br($message);
        echo $message;
    }else{
        echo "No messages today";
    }

    echo "<h2 class=\"page-subtitle\">Products on sale!</h2>";
    $query = "SELECT prodid, description, price, quantity from products where onsale = 1";
    $result = mysql_query($query) or die(mysql_error());
     
    while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
        $prodid = $row['prodid'];
        $description = $row['description'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        
        printf("<a href=\"admin.php?content=updateproduct&id;=$prodid\">%s</a>   - $%.2lf\n", $description, $price);
        if ($quantity == 0)
           echo "  <font color=\"ff0000\">OUT OF STOCK</font><br>\n";
        else
           echo "<br>";
    
    }
?>