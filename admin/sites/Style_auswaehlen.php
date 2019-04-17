<?php
if (isset($_POST["Commit"])) {
    $temID = $_POST["TemplateID"];
    echo "TemplateID: " . $temID;
    $mysqli->query("UPDATE template SET IsActive = '0';");
    $mysqli->query("UPDATE template SET IsActive = '1' WHERE TemplateID=" . $temID . ";");
    echo "SQL Meldet: " . $mysqli->error;
}
    

    
 
?>

<form action="#" method="POST" id="myStyle">
    
<SELECT name="TemplateID" >
    <option value="0">Bitte wählen</option>
    
        <?php
    $result = $mysqli->query("SELECT * FROM template;");
    while ($row = $result->fetch_assoc()) {

        echo "<option value='" . $row['TemplateID'] . "' "  . ">" . $row['TemplateBezeichnung'] . "</option>";
    }
    ?>
    </SELECT>
    <br>
    <br>
    <input type="submit" class="button" name="Commit" value="Auswählen" />

</form>