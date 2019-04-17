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

    public function __construct($MySQLi, $getresourc = null) {
        $this->mysqli = $MySQLi;
        if ($getresourc) {
            if (isset($getresourc['MmID'])) {
                $this->mmID = $getresourc['MmID'];
            }
            if (isset($getresourc['SmID'])) {
                $this->smID = $getresourc['SmID'];
                $result = $this->mysqli->query("SELECT MmID FROM submenu WHERE SmID=" . $this->smID . ";");
                $resultArr = $result->fetch_assoc();
                $this->mmID = $resultArr["MmID"];
            }
        }
    }

    function getContent() {
        //$returnArr[0]==error Message
        $returnArr = array(false, "");
        //test
        if (!$this->mmID) {
            $returnArr[0] = "Content: Es fehlt die MMID!";
        } else if (!$this->smID) {
            $returnArr[0] = "Content: Es fehlt die SMID!!!!!";
        } else {
            //return "Hier kommt der Inhalt der Seite --- irgendwann mal ...";
            if ($result = $this->mysqli->query("SELECT PfadZurDatei FROM content WHERE SmID=" . $this->smID . " LIMIT 1;")) {
                if ($result->num_rows > 0) {
                    $rowContent = $result->fetch_assoc();
                    $returnArr[1] = "./content/articles/". $this->smID ."_" .  $rowContent["PfadZurDatei"] . ".php";
                } else {
                    $returnArr[0] = "content: Eventuell bisher kein Inhalt fuer diese SMID gespeichert?";
                }
            } else {
                $returnArr[0] = "content: Fehler bei Abfrage Inhalt bei DB.";
            }
        }
        return $returnArr;
    }

}
