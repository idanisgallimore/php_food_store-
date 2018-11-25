<?php 
    echo "<h2>Pending orders:</h2>";

    $query = "SELECT t1.orderid, t1.custid, t1.date,
    t2.lastname from orders as t1, customers as t2 WHERE
    t1.status='pending' AND t1.custid = t2.custid
    ORDER BY t1.date";
    $result = mysql_query($query);

    echo "<table> 
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Last Name</th>
            <th>Date Submitted</th>
        </tr>";
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
            $orderid = $row['orderid'];
            $custid = $row['custid'];
            $lastname = $row['lastname'];
            $date = $row['date'];

            echo "<tr>
                <td>$orderid</td>
                <td>$custid</td>
                <td>$lastname</td>
                <td>$date</td>
                <td><a href='admin.php?content=shiporder&id=$orderid'>Process</a></td>
            </tr>";
        }
        echo "</table>";

?>