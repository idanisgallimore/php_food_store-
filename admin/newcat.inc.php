<?php 
    if(isset($_SESSION['store_admin'])){
        echo "<h2 class=\"page-title\">Add new category</h2>
            <form action=\"admin.php\" method=\"post\">
            <input type=\"text\" name=\"catname\" class=\"form-input\" placeholder=\"Category Name\">
            <input type=\"hidden\" name=\"content\" value=\"addcat\">
            <input type=\"submit\" value=\"Submit\" class=\"form-btn\">
        </form>";
    }else{
        echo "Please log in!";
    }

?>