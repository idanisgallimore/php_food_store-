<?php 
    $catname = $_POST['catname'];

    if(get_magic_quotes_gpc()){
        $catname = stripslashes($catname);
    }

    $catnameval = mysql_real_escape_string($catname);

    $query = "INSERT into categories(name) VALUES('$catnameval')";
    $result = mysql_query($query);

    if($result){
        echo "<p class=\"page-content\">Category added: $catname</p>";
    }else{
        echo "<p class=\"page-content\">Category not added</p>";
    }
?>