<?php 
    $orderid = $_POST['orderid'];

    $query = "UPDATE orders set status ='shipped' WHERE orderid = $orderid";
    $result = mysql_query($query) or die(mysql_error());

    if($result){
        echo "order was processed";
    }else{
        echo "Unable to process order";
    }
    echo "<a href='admin.php?content=process'>Process more orders</a>";
?>