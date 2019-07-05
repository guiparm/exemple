<?php
if(isset($_POST["envoi"])){
    if(isset($_POST["commentaires"])){
        $comment=$_POST["commentaires"];
        if($comment==''){
            echo "message vide<br>";
        }else{
            echo $comment;
            $headers = "MIME-Version: 1.0" ."\r\n";
            $headers .= "content-type: text/html; charset=UTF8" ."\r\n";
            $headers .= "From:".$_POST["mail"]."\r\n"."Reply-To: " .$_POST["mail"]."\r\n"."X-Mailer: PHP/".phpversion();
            echo $headers;
            //mail("guillaume.parmentier@free.fr","formulaire de contact",$comment,$headers);

            if(isset($_POST["dataagree"])){
                
                    echo "checked<br>";
                    $email=$_POST["mail"];
                    if($email!=''){
                        require_once("connect.php");
                        $res=$dbh->prepare("INSERT INTO `gparmentierMail`(`id`,`mail`) VALUES ('',:adressemail)");
                        $res->execute(array('adressemail'=>$email));
                        echo "mail sauvegard&eacute<br>";
                    }
                
            }
        }
    }else{
        echo "hello world<br>";
    }
}
/*require("connect.php");
$res=$dbh->query("SELECT * FROM `gparmentierMail`");
$res=$dbh->query("INSERT INTO `gparmentierMail`(`id`,`mail`) VALUES ('','$email')");
while($res_for=$res->fetch()){
$a=$res_for["id"];
$b=$res_for["mail"];
echo "$a $b  <br>";
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>


    </style>
    <script type="text/javascript">
        function messageRempli() {
            var messageDone = document.forms["contactMe"]["commentaires"].value;
            if ((messageDone == null) || (messageDone == ``)) {
                alert("laissez un message");
                return false;
            } else {
                return true;
            }
        }
    </script>
</head>

<body>

    <a href="index.html">retour</a>
    <form action="contact.php" method="post" name="contactMe" onsubmit="messageRempli()">
        <fieldset class="gridy">
            <legend>ID</legend>

            <label for="nom">nom:</label>
            <input type="text" name="nom" placeholder="nom" autofocus />
            <label for="prenom">pr&eacute;nom :</label>
            <input type="text" name="prenom" placeholder="prenom" />
            <label for="tel">Tel :</label>
            <input type="tel" name="tel" placeholder="99.99.99.99.99" />
            <label for="mail">e-mail :</label>
            <input type="email" name="mail" placeholder="xxx@xxx.xxx" />

        </fieldset>
        <br />

        <fieldset>
            <legend>Message</legend>
            <!--            <label for="commentaires">Message : <br/></label>-->
            <textarea name="commentaires" placeholder="saisissez votre message ici" rows=10 cols=40></textarea>
            <br />

        </fieldset>
        <input type="checkbox" name="dataagree" />
        <label for="dataagree" value="true">Vous m'autorisez a conserver les données</label>
        <br />
        <input type="submit" name="envoi" />
    </form>

</body>

</html>

