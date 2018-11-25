<?php 
    echo "<h2>Here is your shopping cart.</h2>";

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();

        echo "is empty";
    }else{
        $items = count($_SESSION['cart']);
        if($items == 0){
            echo "is empty";
        }else{
            $total = 0;
            echo "<tr><td>Product</td><td>Quantity</td><td>Total</td></tr>\n";
            foreach($_SESSION['cart'] as $prodid => $quantity)
            {
               $query = "SELECT description, price FROM products WHERE prodid = $prodid";
               $result = mysql_query($query);
               $row = mysql_fetch_array($result, MYSQL_ASSOC);
               $description = $row['description'];
               $price = $row['price'];
               $subtotal = $price * $quantity;
               $total += $subtotal;
               printf("<tr><td>%s</td><td>%s</td><td>$%.2lf</td></tr>\n", $description, $quantity, $subtotal);
            }
            printf("<tr><td colspan=\"2\">Total</td><td>$%.2lf</td></tr>\n", $total);
            echo "</table>\n";
        }
    }


?>