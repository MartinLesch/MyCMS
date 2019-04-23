<?php
if ($draft) {
    echo "Classloader.php einfuegen." . " <br>";
}
include_once "./Classes/TemplateManager.php";
$cTemplateManager = new TemplateManager($mysqli, $draft);
if ($draft) {
    if(isset($cTemplateManager)) {
        echo "Variable cTemplateManager ist gesetzt." . " <br>";
    } else {
        echo "PROBLEM: Variable cTemplateManager NICHT gesetzt." . " <br>";        
    }
}
include_once "./Classes/ContentManager.php";
if (isset($_GET)) {
    $cContentManager = new ContentManager($mysqli, $_GET);
}else{
    $cContentManager = new ContentManager($mysqli);
}
include_once "./Classes/MenueManager.php";
if (isset($_GET)) {
    $cMenueManager = new MenueManager($mysqli, $_GET);
}else{
    $cMenueManager = new MenueManager($mysqli);
}