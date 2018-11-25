<?php 
    $orderid = $_GET['id'];

    // Long ass query...meh...
    $query = "SELECT t1.orderid, t1.custid, t1.date,
    t2.lastname, t2.firstname, t2.address, t2.city, t2.state,
    t2.zip from orders as t1, customers as t2 
    WHERE t1.orderid = '$orderid' 
    AND t1.custid = t2.custid";

    $result = mysql_query($query);

    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $custid = $row['custid'];
    $date = $row['date'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];

    echo "<h2>Order information for order: #$orderid</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
            </tr>
            <tr>
                <td>$firstname $lastname</td>
                <td>$address</td>
                <td>$city</td>
                <td>$state</td>
                <td>$zip</td>
            </tr>
        </table>";

        echo "<h3>Items:</h3>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>";

        $query = "SELECT t1.prodid, t1.quantity, t2.description, t2.price
        FROM order_items as t1, products as t2
        WHERE t1.orderid = $orderid AND t1.prodid = t2.prodid";
        $result = mysql_query($query);

        $total = 0; 
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
            $prodid = $row['prodid'];
            $quantity = $row['quantity'];
            $description = $row['description'];
            $price = $row['price'];

            $subtotal = $price * $quantity;

            $total += $subtotal;

            echo "<tr>
                <td>$prodid</td>
                <td>$description</td> ";
              printf("<td>%.2f</td>
                <td>%d</td>
                <td>%.2f</td></tr>", $price, $quantity, $subtotal);
        }
       echo 
       "<tr><td>Order Total:</td>";
        printf("<td>%.2f</td></tr>", $total);
        echo "</table>";

        echo 
        "<form action='admin.php' method='post'>
            <input type='hidden' name='content' value='postorder'>
            <input type='hidden' name='orderid' value='$orderid'>
            <input type='submit' name='button' value='Post Order'>
        </form>";
            

?>