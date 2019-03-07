<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContentManager
 *
 * @author aschoenf
 */
class ContentManager {

    private $mysqli;
    private $mmID = null;
    private $smID = null;

    public function __construct($MySQLi, $GET = null) {
        $this->mysqli = $MySQLi;
        if ($GET) {
            if (isset($GET['MmID'])) {
                $this->mmID = $GET['MmID'];
            } else if (isset($GET['SmID'])) {
                $this->smID = $GET['SmID'];
                $result = $this->mysqli->query("SELECT MmID FROM submenu WHERE SmID=" . $this->smID . ";");
                $resultArr = $result->fetch_assoc();
                $this->mmID = $resultArr["MmID"];
            }
        }
    }
    function getHeaderContent(){
        echo NeuesHauptmenue;
    }
    function getFuss(){
        echo IchBinEinFuss;
    }
            
                function getMainMenu() {
        $eausgabe = "";
        $result = $this->mysqli->query("SELECT * FROM mainmenu;");
        while ($resultArr = $result->fetch_assoc()) {
            $eausgabe .= '<a href=index.php?MmID=' . $resultArr["MmID"] . '> ' . $resultArr["MmName"] . ' </a> |';
        }
        return $eausgabe;
    }

    function getSubMenu($mmid) {
        $eausgabe = "";
        $result = $this->mysqli->query("SELECT * FROM submenu WHERE MmID=" . $mmid . ";");
       
        if ($mmid != NULL) {
            while ($resultArr = $result->fetch_assoc()) {


                $eausgabe .= '<a href=index.php?SmID=' . $resultArr["SmID"] . '> ' . $resultArr["SmName"] . ' </a><br>';
            }
        }
        return $eausgabe;
    }

    function getContent() {
        $eausgabe = "";
        $result = $this->mysqli->query("SELECT * From content LEFT JOIN subcont ON content.CID = subcont.CID WHERE SmID=" . $this->smID . ";");
        if ($this->smID != NULL) {
            while ($resultArr = $result->fetch_assoc()) {


#$eausgabe .= '<a href=index.php?CID='. $resultArr["CID"] . '> '.$resultArr["CLongText"].' </a><br>';
                $content = $resultArr["CLongText"];
                
                return $content;
            }
        }
    }

    function getMainMenuName() {
        $result = $this->mysqli->query("SELECT * FROM mainmenu;");
        $mainmenuname=array();
        while ($resultArr = $result->fetch_assoc()) {
            $mainmenuname[$resultArr["MmID"]] =  $resultArr["MmName"];
        }
        return $mainmenuname;
    }

    function getSubMenuName($mmID) {
        $result = $this->mysqli->query("SELECT * FROM submenu WHERE MmID=" . $mmID . ";");
        $submenuname=array();
        while ($resultArr = $result->fetch_assoc()) {
            $submenuname[$resultArr["SmID"]] =  $resultArr["SmName"];
        }
        return $submenuname;
    }
    
    
}
