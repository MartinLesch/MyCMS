<?php
session_start();
$draft = false;
if ($draft) {
    echo "Start mit index2.php ... " . "<br>";
}
//header('Content-Type: text/html; charset=ISO-8859-1');
require_once "./includes/dbConnect.php";
if ($draft) {
    if (isset($mysqli)) {
        echo "Variable mysqli ist gesetzt. " . "<br>";
    }
}
require_once "./includes/ClassLoader.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php 
        if ($draft) {
            echo "Hole css ... " . "<br>";
        }
        echo $cTemplateManager->getCss(); 
        // <link rel="stylesheet" type="text/css" href="./css/default/style.css">
        ?>
        <meta charset="UTF-8">
        <title>Beispiel CMS VIF4</title>
        <!-- <link rel="stylesheet" href="./css/default/style.css"> !-->
           <!--<?php //echo $this->getSubMenu(1); ?>!-->
        
    </head>
    <body>
        <div class="Kopf">
           Kopf
        </div>
        <div class="Hauptmenue">
            Hauptmenue <br>
           <?php echo $cMenueManager->getMainMenu(); ?>
        </div>
        
        <div class="Submenue">
            Submenue <br>
           <?php echo $cMenueManager->getSubMenu(); ?>
        </div>
        
        <div class="Content">
            Content <br> 
            <?php echo $cContentManager->getContent(); ?>
        </div>
        
        <div class="Fuss">
            Fuss
        </div>
    </body>
    
    
</html>

