<?php
if (isset($_POST["commit"])) {
    $subChange = $_POST["DEL_SMID"];
} else {
    echo "<br> <br> ";
    $subChange = false;
}
if ($subChange) {
    $mysqli->query("DELETE from submenu WHERE SmID = " . $subChange );
    echo "Submen&uuml;-Eintrag wurde gel&oumlscht: " . $subChange . " <br> <br>";
}
?>

<form name="SubMenueDel" action="#" method="POST"> <br>
    <h1>Submen&uuml; Eintrag l&ouml;schen</h1>
    <font color="red">
    &nbsp; Welcher Submen&uuml; Eintrag soll gel&ouml;scht werden? 
    <SELECT name="DEL_SMID" >
        <option value="0">Bitte w&auml;hlen</option>
        <?php
        $result = $mysqli->query("SELECT * FROM submenu;");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['SmID'] . "'>" . $row['SmName'] . "</option>";
        }
        ?>
    </SELECT>
    </font>
    <br>
    <br>
    &nbsp; <input Type="submit" name="commit" value="Ausf&uuml;hren" style="font-size: 18pt">
</form>


