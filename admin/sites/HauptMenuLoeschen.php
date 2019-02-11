<?php
if (isset($_POST["commit"])) {
    $subChange = $_POST["DEL_MMID"];
} else {
    echo "<br> <br> ";
    $subChange = false;
}
if ($subChange) {
    $cMysqli->query("DELETE from mainmenu WHERE MmID = " . $subChange );
    echo "Hauptmen&uuml;-Eintrag wurde gel&ouml;scht: " . $subChange . " <br> <br>";
}
?>

<form name="MenueDel" action="#" method="POST"> <br>
    <h1>Hauptmen&uuml; Eintrag l&ouml;schen</h1>
    <font color="red">
    &nbsp; Welcher Hauptmen&uuml; Eintrag soll gel&ouml;scht werden? 
    <SELECT name="DEL_MMID" required>
        <option value="0">Bitte w&auml;hlen</option>
        <?php
        $result = $cMysqli->query("SELECT * FROM mainmenu;");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['MmID'] . "'>" . $row['MmName'] . "</option>";
        }
        ?>
    </SELECT>
    </font>
    <br>
    <br>
    &nbsp; <input Type="submit" name="commit" value="Ausf&uuml;hren"  style="font-size: 18pt">
    <br>
    <br>
</form>


