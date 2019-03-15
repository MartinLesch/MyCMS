
<!DOCTYPE html>
<?php

class TemplateManager {

    private $actualTemplate;
    private $mysqli;
    private $draft;

    public function __construct($mysqli, $draft) {
        $this->draft = $draft;
        if ($this->draft) {
            echo "Konstruktor der Klasse TemplateManager" . " <br>";
        }

        $this->mysqli = $mysqli;
        $this->actualTemplate = "default";
        if ($this->draft) {
            echo "Feldinhalt actualTemplate: " . $this->actualTemplate . " <br>";
        }
    }

    public function getCss() {
        if ($this->draft) {
            echo "Funktion getCss in der Klasse TemplateManager" . " <br>";
        }
        return "<link rel='Stylesheet' type='text/css' href='" . "./css/default/style.css" . "'>" . " <br>";
        //return "<link rel='Stylesheet' href='" . $this->getCurrentLayout() . "'>";
    }
    
    public function getCurrentLayout() {
        return "./css/" . "default" . "/style.css";
        $this->actualTemplate =  "./css/" . $this->getActualTemplate() . "/style.css";
        return $this->actualTemplate;
    }

    public function getActualTemplate() {


        if (!$resultTemplate = $this->mysqli->query("SELECT TemplateBezeichnung From template WHERE isActive = 1 LIMIT 1;")) {
            printf("Fehlernachricht: %s\n", $mysqli->error);
            return "default";
        } else {
            return $resultTemplate->fetch_object()->TemplateBezeichnung;
            
        }
    }

    public function setTemplateSetting() {


        $resultSetting = $this->mysqli->query(
                "SELECT templatesetting.SettingLabel,settingtemplatevalue.Value "
                . "FROM settingtemplatevalue "
                . "LEFT JOIN template "
                . "ON settingtemplatevalue.TemplateID=template.TemplateID "
                . "LEFT JOIN templatesetting "
                . "ON templatesetting.SettingID=settingtemplatevalue.SettingID "
                . "WHERE settingtemplatevalue.TemplateID=" . $this->getActualTemplateID() . ";");



        /*
          $resultSetting = $this->mysqli->query(
          "SELECT templatesetting.SettingLabel,settingtemplatevalue.Value "
          . "FROM settingtemplatevalue "
          . "LEFT JOIN template "
          . "ON settingtemplatevalue.TemplateID=template.TemplateID "
          . "LEFT JOIN templatesetting "
          . "ON templatesetting.SettingID=settingtemplatevalue.SettingID "
          . "WHERE settingtemplatevalue.TemplateID=2");

         */

        $settingValues = array();
        while ($rowSetting = $resultSetting->fetch_assoc()) {
            $settingValues[$rowSetting["SettingLabel"]] = $rowSetting["Value"];
        }
        $this->templateSettingsAssocArr = $settingValues;
    }

}
