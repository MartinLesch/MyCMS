<?php
if (isset($_POST["commit"])) {
    $subChange = $_POST["CHANGE_SMID"];
    $newName = $_POST["CHANGE_NAME"];
} else {
    echo "<br> <br> ";
    $subChange = false;
    $newName = false;
}
if ($subChange) {
    $cMysqli->query("UPDATE submenu SET SmName = '" .$newName ."' WHERE SmID = " .$subChange );
    echo "Hauptmen&uuml;-Eintrag wurde ge&auml;ndert: " .$subChange ." &nbsp; " .$newName ." <br> <br>";
}
?>

<form name="SubMenueChange" action="#" method="POST"> <br>
    <h1>Submen&uuml; Eintrag &auml;ndern</h1>
    <font color="red">
    &nbsp; Welcher Submen&uuml; Eintrag soll ge&auml;ndert werden? 
    </font>
    <SELECT name="CHANGE_SMID" required>
        <option value="0">Bitte w&auml;hlen</option>
        <?php
        $result = $cMysqli->query("SELECT * FROM submenu;");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['SmID'] . "'>" . $row['SmName'] . "</option>";
        }
        ?>
    </SELECT>
    <font color="red">
    Neue Bezeichnung: &nbsp;
    </font>
    &nbsp;
    <input Type="text" name="CHANGE_NAME" pattern=".{1,}" title="Eingabe mit mind. einem Zeichen erforderlich!" placeholder="Bitte Namen eingeben" required> 
    <br>
    <br>
    <br>
    &nbsp; <input Type="submit" name="commit" value="Ausf&uuml;hren"  style="font-size: 18pt">
    <br>
    <br>
</form>


