


<?php
//stellt das AdminMenü dar und generiert anhand einer while Schleife die entsprechenden href Links
$linkArray=array("Content anlegen","Menu bearbeiten","Style auswaehlen");

$idx=0;
while(true){
    echo "<a href='index.php?path=".str_replace(' ','_',$linkArray[$idx])."'>".$linkArray[$idx]."</a>";
    $idx++;
    if($idx==count($linkArray)){
        break;
    }
    echo "|";
}
?>
