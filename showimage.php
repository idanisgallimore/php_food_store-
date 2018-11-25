<?php 
header("Content-type: image/jpeg");
include_once("/mylibrary/login.php");

login();

$prodid = $_GET['id'];
$query = "SELECT picture from products where prodid = '$prodid'";
$result = mysql_query($query);

$row = mysql_fetch_array($result, MYSQL_ASSOC);

$picture = $row['picture'];

echo $picture;

?>