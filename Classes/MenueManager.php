<?php

/* 
 * To change this template file, choose Tools | Templates
 */



function getMainMenu($MMCounter){

    echo "Hallo";
    $result = $mysqli->query("SELECT * FROM mainmenu WHERE MmID= " . $MMCounter . ";");
    $row = $result->fetch_assoc();
    return $row;

}

function getSubMenu($auswahlSM){

    echo "SubHallo";
    if ($mmid) {
        $result = $mysqli->query("SELECT * FROM submenu WHERE MmID=" . $mmid . ";");
        if ($mmid) {
                $result = $mysqli->query("SELECT * FROM submenu WHERE MmID=" . $mmid . ";");
                while ($row = $result->fetch_assoc()) {
                    $selected = "";
                    if ($smid == $row['SmID']) {
                        $selected = "selected";
                    }
                    echo "<option value='" . $row['SmID'] . "' " . $selected . ">" . $row['SmName'] . "</option>";
                }
            }
        return $result;
        }

    return "kommt noch";

    

}