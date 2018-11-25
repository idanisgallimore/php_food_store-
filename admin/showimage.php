<?php 
header("Content-type: image/jpeg");
include_once("../mylibrary/login.php");
login();
$prodid = $_GET['id'];
$query = "SELECT picture FROM products WHERE prodid = '$prodid'";
$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_BOTH);
$picture = $row['picture'];
echo $picture;

?>