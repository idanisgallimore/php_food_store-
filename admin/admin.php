<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../assets/style.css" />
<title>The Food Store - Admin Console</title>
</head>

<?php
   include_once("../mylibrary/login.php");
   include_once("../mylibrary/showproducts.php");
   include_once("../mylibrary/getThumb.php");

   login();
?>
<body>

<?php include("header.inc.php"); ?>

<table width="100%" border="0">
  <tr>
    <td id="nav" width="20%" valign="top">
<?php include("adminnav.inc.php"); ?></td>
    <td id="main" width="50%" valign="top">
  <?php
               if (!isset($_REQUEST['content']))
               {
                   if (!isset($_SESSION['store_admin']))
                      include("adminlogin.html");
                   else
                      include("adminmain.inc.php");
               }
               else
               {
                   $content = $_REQUEST['content'];
                   $nextpage = $content . ".inc.php";
                   include($nextpage);
               } ?></td>
    <td id="status" width="30%" valign="top">
  <?php include("adminstatus.inc.php"); ?></td>
  </tr>
</table>
<?php include("footer.inc.php"); ?>
</body>
</html>