<?php 
    $search = $_GET['searchFor'];

    if(get_magic_quotes_gpc()){
        $search = stripslashes($search);
    }
    $searchsql = mysql_real_escape_string($search);

    echo "<h2>Search Results:</h2>";

    $query = "SELECT * from products where description REGEXP '$searchsql'";
    $result = mysql_query($query);
    if(!$result){
        echo "Could not process search query at this time!";
    }else{
        echo "<table class='table'>";
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
            $prodid = $row['prodid'];
            $description = $row['description'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            
            echo "<tr>
                <td><img class='search-img' src='showimage.php?id=$prodid'>
                </td><td>";

            if($quantity == 0){
                echo "<p>$description</p>";
            }else{
                // There seems to be a bug in this part of the code 
                echo "<a href='index.php?&content=updatecart&id=$prodid'>$description</a>";
            }
            echo "</td><td>";

            if($quantity == 0){
                echo "Sorry, none left in stock";
            }else if($quantity < 5){
                echo "There are $quantity left";
            }else{
                echo "\n";
            }
            echo "</td><td>";
        }
        echo "</table>";
    }


?>