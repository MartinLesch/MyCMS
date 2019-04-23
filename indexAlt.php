<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once "./includes/dbConnect.php";
require_once "./includes/ClassLoader.php";
require_once './Classes/ContentManager.php';
require_once "./includes/headLoader.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Hauptseite</title>
        <link rel="stylesheet" href="./css/default/style.css">
        <!-- "../css/default/style.css" !-->
    </head>
    <body>

        <div 
            <!-- class="Hauptmenue" -->
             id="Hauptmenue">
             
             <?php
             $rowMM = "...";
             $uebergabeMMID=0;
             while($rowMM != ""){
               $uebergabeMMID=$uebergabeMMID + 1;
               $rowMM= $cMenueManager->getMainMenu($uebergabeMMID);   
               
             }
             
             echo "<a href=index.php?choice=" . $rowMM['ID'] . ">" . $rowMM['linkName'] . "</a>" ;
            
            
            
            ?> -->
            
            Hauptmenue
        </div>
        <div class="Submenu" id="Submenue">
            <!--<?php $cMenueManager->getSubMenu(); 
            
            ?>!-->
            
            
            
            Submenue
        </div>
        <div class="Content" id="Content">
            <!--<?php $cContentmanager->getContent(); ?>!-->
            Content
        </div>
        <div class="Fuss" id="Fuss">
            <!--<?php $cContentmanager->getFuss(); ?>!-->
            Fuss
        </div>
    </body>
</html>