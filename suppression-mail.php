<?php
    if(isset($_GET["email"])){
        $suppMail=$_GET["email"];
        require_once("connect.php");
        $sql_sel="SELECT * FROM `gparmentierMail` WHERE `mail`=\"".$suppMail."\"";
      
        $selectall=$dbh->query($sql_sel);
        $countable=(count($selectall));

        if($countable>0){

            while($row=$selectall->fetch()){
                $delid=$row["id"];
                
                $del=$dbh->prepare("DELETE FROM `gparmentierMail` WHERE `id`=$delid");
                $del->execute();
                echo "$suppMail supprim&eacute;<br>";
            }
        }else{
            echo "cette adresse n'existe pas<br>"; 
        }
    }
?>