<?php 
    echo "<h2>Update Item</h2>";

    $prodid = $_GET['id'];

    $query = "SELECT description, price from products where prodid = '$prodid'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $description = $row['description'];
    $price = $row['price'];

    $quantity = $_SESSION['cart'][$prodid];

    echo "<form action='index.php' method='POST' class='ci-form'>
        <input type='hidden' name='content' value='changeitem'>
        <input type='hidden' name='prodid' value='$prodid'>
        <h3 class='ci-details'>Product id: $prodid</h3>
        <h3 class='ci-details'>Description: $description</h3>
        <h3 class='ci-details'>Price: $price</h3>
        <div class='ci-quan'>
            <h3 class='ci-details'>Quantity:</h3>
            <input type='text' name='quantity' value='$quantity'>
        </div>";

    $total = $quantity * $price;
    printf("Your total is: $%.2lf", $total);

    echo "<input type='submit' name='button' value='Update' class='btn'>
        <input type='submit' name='button' value='Remove from cart' class='btn'>
        </form>";

?>