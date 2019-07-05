<?php

//usual name = connect_mysql.php ou config.ink.php
    $server="exmachinefmci.mysql.db";
    $db="exmachinefmci";
    $user="exmachinefmci";
    $pass="carp310M";
try{
    $dbh=new PDO("mysql:host=$server;dbname=$db",$user,$pass);
} catch(Exception $e){ die("erreur:".$e->getMessage());}

//end connect_mysql.php

?>
