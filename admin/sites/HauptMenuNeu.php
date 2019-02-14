<?php
if (isset($_POST["commit"])) {
    $subChange = $_POST["HauptNeu"];
} else {
    echo "<br> <br> ";
    $subChange = false;
}
if ($subChange) {
    $mysqli->query("INSERT INTO mainmenu (MmName) VALUES ('" . $subChange . "')");
    echo "Neuer Hauptmen&uuml;-Eintrag wurde angelegt: " . $subChange . " <br>";
}
?>

<form name="MenueNeu" action="#" method="POST"> <br>

    <h1>Neuer Hauptmen&uuml; Eintrag</h1>
    <font color="red">
    Bezeichnung des neuen Hauptmen&uuml; Eintrages: &nbsp;
    </font>
    &nbsp;
    <input Type="text" name="HauptNeu" pattern=".{1,}" title="Eingabe mit mind. einem Zeichen erforderlich!" placeholder="Bitte Namen f&uuml;r neuen Hauptmen&uuml; - Eintrag eingeben" required> 
    <br>
    <br>
    <br>
    &nbsp;
    <input Type="submit" name="commit" value="Ausf&uuml;hren" style="font-size: 18pt">
    <br>
    <br>
</form>


