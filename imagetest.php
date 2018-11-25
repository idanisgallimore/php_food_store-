<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Image Test</title>
<body>
<?php
include("/mylibrary/login.php");
login();

$query = "SELECT prodid, description FROM products";
$result = mysql_query($query) or die(mysql_error());
echo "<table width=\"50%\" cellpadding=\"1\" border=\"1\">\n";
echo "<tr><td>Product ID</td><td>Description</td><td>Image</td></tr>\n";
while($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
   $prodid = $row['prodid'];
   $description = $row['description'];
   echo "<tr><td>$prodid</td><td>$description</td>\n";
   echo "<td><img src=\"showimage.php?id=$prodid\" width=\"80\" height=\"60\"></td></tr>\n";
}
echo "</table>\n";
?>
</body>
</html>