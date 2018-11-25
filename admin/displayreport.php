<?php 

   header("Content-type: application/vnd.ms-excel");
   header("Content-Disposition: attachment; filename= report.xls");
   header("Pragma: no-cache");
   header("Expires: 0");

   include_once("../mylibrary/login.php");
   login();

   $startmonth = $_REQUEST['startmonth'];
   $startday = $_REQUEST['startday'];
   $startyear = $_REQUEST['startyear'];
   $dbstartdate= "$startyear-$startmonth-$startday";
   $startdate = "$startmonth/$startday/$startyear";

   $endmonth = $_REQUEST['endmonth'];
   $endday = $_REQUEST['endday'];
   $endyear = $_REQUEST['endyear'];
   $dbenddate= "$endyear-$endmonth-$endday";
   $enddate = "$endmonth/$endday/$endyear";

   $query = "SELECT products.description, sum(order_items.quantity) as total, products.price
   FROM orders, order_items, products
   WHERE orders.orderid = order_items.orderid
   AND order_items.prodid = products.prodid
   AND orders.status ='shipped' 
   AND orders.date >= '$dbstartdate' AND orders.date <= ' $dbenddate'
   GROUP BY products.description";

   $result = mysql_query($query) or die("Double check the query for errors: ".mysql_error());
   echo 
   "<table>
        <tr>
            <th>Products sold between: $startdate and $enddate</th>
        </tr>
        <tr>
            <td>Product</td>
            <td>Quantity Sold</td>
            <td>Unit Price</td>
            <td>Total</td>
        </tr>";

    $count = 3;
    while($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $product = $row['description'];
        $price = $row['price'];
        $quantity = $row['total'];
        $total = $price * $quantity;

        echo 
        "<tr>
            <td>$product</td>
            <td>$quantity</td>";
        printf(
            "<td>%.2f</td>
            <td>=B%s * C%s</td></tr>",
            $price, $count, $count);
        
            $count++;
    }
    $count--;
   
    echo
        "<tr>
            <td>Total</td>
            <td>=SUM(B3:B" . $count . ")</td>
            <td>=SUM(D3:D" . $count . ")</td>
        </tr>
    </table>";


?>