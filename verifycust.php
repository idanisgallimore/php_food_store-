<?php 
    session_start();
    // Login to the db via the login() function
    include_once("/mylibrary/login.php");
    login();

    $email = $_POST['email'];
    $password = $_POST['password1'];

    $query = "SELECT * from customers where email = '$email' AND password = PASSWORD('$password')";
    $result = mysql_query($query);
    // Check if there are any customers with these credentials in the db
    $row = mysql_num_rows($result);

    if($row){
        $row = mysql_fetch_array($result, MYSQL_ASSOC);

        $custid = $row['custid'];

        $_SESSION['cust'] = $custid;
        header("Location:index.php?content=confirmorder");
    }else{
        echo "<h2>Sorry, Unable to verify customer</h2>\n";
        echo "<a href=\"index.php?content=checkout\">Go back to check out</a>\n";
    }


?>