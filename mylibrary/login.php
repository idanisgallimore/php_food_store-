<?php 
    function login(){
        $con = @mysql_connect("localhost", "idanis", "idanis") or die("did not connect".mysql_error());
        mysql_select_db("store", $con) or die("did not connect to db" . mysql_error());
    }

?>