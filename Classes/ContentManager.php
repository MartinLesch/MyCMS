<?php
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

    function getContent() {
        //test
        if (!$this->mmID) {
            return "Content: Es fehlt die MMID!";
        }
        
        if (!$this->smID) {
            return "Content: Es fehlt die SMID!";
        }
        //return "Hier kommt der Inhalt der Seite --- irgendwann mal ...";
        if ($result = $this->mysqli->query("SELECT PfadZurDatei FROM content WHERE SmID=" . $this->smID . " LIMIT 1;")) {
            if ($result->num_rows > 0) {
                $rowContent = $result->fetch_assoc();
                return " include_once ./content/articles/" . $rowContent["PfadZurDatei"] . ".php";
            } else {
                return "content: Eventuell bisher kein Inhalt fuer diese SMID gespeichert?";
            }
            
        } else {
            return "content: Fehler bei Abfrage Inhalt bei DB.";
        }
    }

}
