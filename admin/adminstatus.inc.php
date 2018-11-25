<?php 
    if(isset($_SESSION['store_admin'])){
        echo "<h2 class=\"page-title\">Current Store Status</h2>";

        $query = "SELECT prodid from products";
        $result = mysql_query($query);
        $totalProducts = mysql_num_rows($result);

        echo "<p class=\"page-content\">Products in store:</p>
        <p class=\"page-content\">$totalProducts</p>";

        $query = "SELECT prodid from products where quantity = 0";
        $result = mysql_query($query);
        $outOfStock = mysql_num_rows($result);
        echo "<p class=\"page-content\">Out of Stock:</p>
        <p class=\"page-content\">$outOfStock</p>";

        $query = "SELECT orderid from orders where status = 'pending'";
        $result = mysql_query($query);
        $orderStatus = mysql_num_rows($result);
        echo "<p class=\"page-content\">Pending orders:</p>
        <p class=\"page-content\">$orderStatus</p>";

        
    }




?>