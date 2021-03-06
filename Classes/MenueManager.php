<?php

//class ManueManager stellt die Main- und dazugehörigen Submenus aus der DB bereit
class MenueManager {

    private $mysqli;
    private $mmID = null;
    private $smID = null;

    // Deklariert einen public Konstruktor und speichert die IDs in die Variable $GET
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
    // Deklariert einen public Konstruktor getMainMenu der die MainMenus aus der DB abruft und in einem Link darstellt
    function getMainMenu() {



        $result = $this->mysqli->query("SELECT * FROM mainmenu;");

        while ($row = $result->fetch_assoc()) {

            echo "<a href='index2.php?MmID=" . $row['MmID'] . "'>" . $row['MmName'] . " </a> &nbsp";
        }
    }
    // Deklariert einen public Konstruktor getMainMenu der die MainMenus aus der DB abruft und in einem Link darstellt
    function getSubMenu() {

        if ($this->mmID) {
            $result = $this->mysqli->query("SELECT * FROM submenu WHERE MmID=" . $this->mmID . ";");
            while ($row = $result->fetch_assoc()) {
                echo "<a href='index2.php?MmID=" . $row['MmID'] . "&SmID=" . $row['SmID'] . "'>" . $row['SmName'] . " </a> <br>";
            }
        }
    }

}
