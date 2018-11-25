<?php 
    session_start();
     // Login to the db via the login() function
     include_once("/mylibrary/login.php");
     login();

     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $address = $_POST['address'];
     $city = $_POST['city'];
     $state = $_POST['state'];
     $zip = $_POST['zip'];
     $email = $_POST['email'];
     $phonenumber = $_POST['phonenumber'];
     $password1 = $_POST['password1'];
     $password2 = $_POST['password2'];

     if(get_magic_quotes_gpc()){
         $firstname = stripslashes($firstname);
         $lastname = stripslashes($lastname);
         $address = stripslashes($address);
         $city = stripslashes($city);
         $state = stripslashes($state);
         $zip = stripslashes($zip);
         $email = stripslashes($email);
         $phonenumber = stripslashes($phonenumber);
         $password1 = stripslashes($password1);
         $password2 = stripslashes($password2);
     }
     $firstname = mysql_real_escape_string($firstname);
     $lastname = mysql_real_escape_string($lastname);
     $address = mysql_real_escape_string($address);
     $city = mysql_real_escape_string($city);
     $state = mysql_real_escape_string($state);
     $zip = mysql_real_escape_string($zip);
     $email = mysql_real_escape_string($email);
     $phonenumber = mysql_real_escape_string($phonenumber);
     $password1 = mysql_real_escape_string($password1);
     $password2 = mysql_real_escape_string($password2);

    //  use this variable to make sure everything pans out
    $baduser = 0;

    if(trim($email) == ""){
        $baduser = 1 ;
    }
    if(trim($password1) == ""){
        $baduser = 2 ;
    }

    if($password1 !=  $password2){
        $baduser = 3 ;
    }
    // Checking to make sure the account doesn't already exist
    $query = "SELECT * from customers where email = '$email'";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);

    if($rows != 0){
        $baduser = 4 ;
    }
    
    if($baduser == 0){
        $query = "INSERT INTO customers(firstname, lastname, address, city,
        state, zip, email, phone, password) VALUES('$firstname',
        '$lastname', '$address', '$city', '$state', '$zip', '$email', '$phonenumber', PASSWORD('$password1')) ";
        $result = mysql_query($query) or die(mysql_error());

        if($result){
            $query = "SELECT LAST_INSERT_ID() from customers";
            $result = $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $_SESSION['cust'] = $row[0];
            header("Location: index.php?content=confirmorder");
        }else{
            echo "Could not process at this time";
        }
    }else{
            switch($baduser){
                case(1):
                echo "email is blank";
                break;

                case(2): 
                echo "password is blank";
                break;

                case(3):
                echo "passwords don't match"; 
                break;

                case(4):
                echo "that email is already taken";
                break;
            }
            echo "<a href=\"index.php?content=newcust\">Try again</a>\n";
        }
    
 ?>