<?php 
    if(!isset($_SESSION['store_admin'])){
        echo "Please log in!";
    }else{
        $userid = $_SESSION['store_admin'];
        echo "<h2 class=\"page-title\">Add new product</h2>";
        echo "<form enctype=\"multipart/form-data\"  action=\"admin.php\" method=\"post\">";
        echo "<select name=\"cat\">";
            $query = "SELECT catid, name from categories";
            $result = mysql_query($query);
            while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                $catid = $row["catid"];
                $name = $row["name"];
                echo "<option value=\"$catid\">$name</option>";
            }
        echo "</select>";
        echo"<input type=\"text\" name=\"description\" class=\"form-input\" placeholder=\" Description\">
        <input type=\"text\" name=\"price\" class=\"form-input\" placeholder=\"Price\">
        <input type=\"text\" name=\"quantity\" class=\"form-input\" placeholder=\"Quantity\">
        <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1024000\">
        <input type=\"file\" name=\"picture\" class=\"form-input\">
        <input type=\"hidden\" name=\"content\" value=\"addproduct\">
        <input type=\"submit\" value=\"Submit\" class=\"form-btn\">
    </form>";
    }

?>