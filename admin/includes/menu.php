
<?php
$linkArray=array("Content anlegen","Menu bearbeiten");

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
