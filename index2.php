<?php
session_start();
//header('Content-Type: text/html; charset=ISO-8859-1');
require_once "./includes/dbConnect.php";
require_once "./includes/ClassLoader.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Beispiel CMS VIF4</title>
        <?php $cTemplateManager->getCss; ?>
        <!-- <link rel="stylesheet" href="./css/default/style.css">
               "../css/default/style.css" !-->
        
    </head>
    <body>
        <div id="Hauptmenue">
           Hauptmenue
        </div>
        <div id="Submenue">
            Submenue
        </div>
        <div id="Content">
            Content
        </div>
        <div id="Fuss">
            Fuss
        </div>
    </body>
</html>

