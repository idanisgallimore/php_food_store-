<?php 
session_start();
include_once("../mylibrary/login.php");

login();

$userid = $_POST['userid'];
$password = $_POST['password'];

// Remember to add Password function to query!
$query = "SELECT userid, password from admin WHERE userid = '$userid' AND password = '$password'";
$result = mysql_query($query) or die(mysql_error());

if(mysql_num_rows($result) == 0){
    echo "<h2>Sorry, your account was not validated.</h2><br>\n";
    echo "<a href=\"admin.php\">Try again</a><br>\n";
}else{
    $_SESSION["store_admin"] = $userid;
    header("Location: admin.php"); 
}

?>