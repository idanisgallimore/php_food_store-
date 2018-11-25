<?php 
    echo "<h2>Confirm your order, please.</h2>";
    $total = 0;

    echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
    echo "<tr><td>Product</td><td>Price</td><td>Quantity</td><td>Total</td>\n";

    foreach($_SESSION['cart'] as $prodid => $quantity){
        $query = "SELECT description, price from products where prodid='$prodid'";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result, MYSQL_ASSOC);

        $description = $row['description'];
        $price = $row['price']; 

        $subtotal = $price * $quantity;
        $total += $subtotal;

        printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>$%.2f</td></tr>\n",
        $description, $price, $quantity, $subtotal);
    }
    printf("<tr><td colspan=\"3\"><b>Total</b></td><td>$%.2f</td></tr>\n", $total);
    echo "</table>\n";

    echo "<form action='index.php' method='post'>
        <input type='hidden' name='content' value='finishorder'>
        <input type='submit' name='button' value='Confirm Order'>
    </form>";

    echo "<form action='index.php' method='post'>
        <input type='hidden' name='content' value='reviewcart'>
        <input type='submit' name='button' value='Change Order'>
    </form>";
?>