<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./assets/style.css" />
    <title>La Chacha's Food Store</title>
</head>
<body>
    <?php 
        include_once("mylibrary/login.php");
        include_once("mylibrary/showproducts.php");

        // login to the database 
        login();
    ?>
    <!-- double check the path for this! -->
    <?php include("/admin/header.inc.php"); ?>
        
    <div class="nav-bar">
        <?php include("nav.inc.php"); ?>
    </div>
    <main>

        <?php 
            if(!isset($_REQUEST['content'])){
                include("main.inc.php");
            }else{
                $content = $_REQUEST['content'];
                $nextpage = $content.".inc.php";
                include($nextpage);
            }
        
        ?>
    </main>

    <div class="s-cart">
        <?php include("cart.inc.php"); ?>
    </div>
   
     <?php include("/admin/footer.inc.php") ?>;
</body>
</html>