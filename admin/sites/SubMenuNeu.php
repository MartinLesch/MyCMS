<?php
if (isset($_POST["commit"])) {
    $subNeu = $_POST["SubNeu"];
    $mmid = $_POST["HauptID"];
} else {
    echo "<br> <br> ";
    $subNeu = false;
    $mmid = false;
}
if ($subNeu) {
    $cMysqli->query("INSERT INTO submenu (MmID, SmName) VALUES (" . $mmid . ", '" . $subNeu . "')");
    echo "Neuer Submen&uuml;-Eintrag wurde angelegt: " . $subNeu . " <br>";
}
?>

<form name="SubMenueNeu" action="#" method="POST"> <br>

    <h1>Neuer Submen&uuml Eintrag</h1>
    <br>
    <font color="red">
    &nbsp; In welchem Hauptmen&uuml;? 
    </font>
    <SELECT name="HauptID" required>
        <option value="0">Bitte w&auml;hlen</option>
        <?php
        $result = $cMysqli->query("SELECT * FROM mainmenu;");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['MmID'] ."'>" . $row['MmName'] . "</option>";
        }
        ?>
    </SELECT>
    <font color="red">
    &nbsp; Bezeichnung des neuen Submen&uuml; Eintrages: &nbsp;
    </font>
    &nbsp; <input Type="text" name="SubNeu" pattern=".{1,}" title="Eingabe mit mind. einem Zeichen erforderlich!" placeholder="Bitte Namen f&uuml;r neuen Submen&uuml; - Eintrag eingeben" required> 
    <br>
    <br>
    <br>
    &nbsp; <input Type="submit" name="commit" value="Ausf&uuml;hren" style="font-size: 18pt">
    <br>
    <br>
</form>
