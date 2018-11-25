<?php 
    function showproducts($catid, $page, $currentpage, $newpage){
        $query = "SELECT count(prodid) from products where catid = '$catid'";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);

        if($row[0] == 0){
            echo "There are no products in this category";
         }else{
             $thispage = $page;
             $total = $row[0];
             $recordsperpage = 5;
             $offset = ($thispage - 1) *$recordsperpage;

             $totalpages = ceil($total / $recordsperpage);
             echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
             echo "<tr><td><h2>Image</h2></td>\n";
             echo "<td><h2>Product</h2></td>\n";
             echo "<td><h2>Price</h2></td>\n";
             echo "<td><h2>Quantity in Stock</h2></td>\n";
             echo "<td><h2>Special</h2></td></tr>\n";

             $query = "SELECT * from products where catid = '$catid' LIMIT $offset, $recordsperpage";
             $result = mysql_query($query);
             while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                $prodid = $row['prodid'];
                $description = $row['description'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $onsale = $row['onsale'];

                echo "<tr><td>\n";
                echo "<img src=\"showimage.php?id=$prodid\" width=\"80\" height=\"60\">";
             echo "</td><td>\n";
                echo "<a href=\"$newpage&id=$prodid\">$description\n";
             echo "</td><td>\n";
                echo "$" . $price . "\n";
             echo "</td><td>\n";
                echo $quantity . "\n";
             echo "</td><td>\n";
             if ($onsale){
                echo "On sale!\n";
             }
             else{
                echo "&nbsp;\n";
             }
            echo "</td></tr>\n";
             }
             
         }
         echo "</table>\n";
         if ($thispage > 1)
         {
            $page = $thispage - 1;
            $prevpage = "<a href=\"$currentpage&cat;=$catid&page;=$page\">Previous page</a>";
         } else
         {
            $prevpage = " ";
         }
         if ($thispage < $total)
         {
            $page = $thispage + 1;
            $nextpage = " <a href=\"$currentpage&cat;=$catid&page;=$page\">Next page</a>";
         } else
         {
            $nextpage = " ";
         }
         if ($total > 1){
            echo $prevpage . "  " . $nextpage;
      }
   }

?>