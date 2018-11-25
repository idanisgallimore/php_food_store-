<?php 
    echo "<h2>Review your shopping cart</h2>";

    $total = 0;

    echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
    echo "<tr><td>Product</td><td>Price</td><td>Quantity</td><td>Total</td><td> </td>\n";
    foreach($_SESSION['cart'] as $prodid => $quantity){
        $query = "SELECT description, price from products WHERE prodid = '$prodid'";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result, MYSQL_ASSOC);

        $description = $row['description'];
        $price = $row['price'];

        $subtotal = $price * $quantity;
        $total += $subtotal;

        printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>$%.2f</td>\n",
        $description, $price, $quantity, $subtotal);
        echo "<td><a href=\"index.php?content=updateitem&id=$prodid\">Modify</a></td></tr>\n";
    }

    printf("<tr><td colspan=\"3\"><b>Total</b></td><td>$%.2f</td></tr>\n", $total);
    echo "</table>\n";

?>