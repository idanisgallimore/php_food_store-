<?php 
    echo "<h2>Finalizing order:</h2>";
    echo "Creating order";

    $custid = $_SESSION['cust'];
    $date = date('Y-m-d G:i:s');
    $status = 'pending';

    $result1 = @mysql_query('Set autocommit=0');
    $result2 = @mysql_query("set sql_mode='STRICT_ALL_TABLES'");
    $result3 = @mysql_query("START TRANSACTION");

        // And the transaction begins :p
    $query = "INSERT into orders(custid, date, status) 
    VALUES('$custid', '$date', '$status')";
    $result4 = @mysql_query($query);

    $query2 = "SELECT LAST_INSERT_ID() from orders";
    $result5 = @mysql_query($query2);

    $row = mysql_fetch_array($result5);
    $orderid = $row[0];

    foreach($_SESSION['cart'] as $prodid => $quantity){
        $priceQuery = "SELECT price from products where prodid = '$prodid'";
        $priceResult = @mysql_query($priceQuery);
        $priceRow = mysql_fetch_array($priceResult);
        $price = $priceRow[0];

        $oiQuery = "INSERT into order_items VALUES($orderid, $prodid, $quantity, $price)";
        $resulta = @mysql_query($oiQuery);

        $queryMeh = "UPDATE products set quantity = quantity - $quantity WHERE prodid = '$prodid'";
        $resultb = @mysql_query($queryMeh);

        if($resulta && $resultb){
            $result6 = true;
        }else{
            $result6 = false;
            break;
        }
    }

    if($result1 && $result2 && $result3 && $result4 && $result5 && $result6){
        $result = @mysql_query("COMMIT");
        if($result){
            echo "<h2>Your order has been completed! YAY!</h2>
            <p>Here is your order number: $orderid</p>";

            unset($_SESSION['cart']);
        }else{
            echo "Order was not placed";
        }
    }
    // outside of the if statement - I know, confusing.
    else{
        $result = @mysql_query("ROLLBACK");
        echo "Order has cannot be processed";
    }


?>