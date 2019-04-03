

<form action="#" method="POST" id="myStyle">
    
<SELECT name="TemplateID" onchange="return killSub()">
    <option value="0">Bitte wählen</option>
    
        <?php
    $result = $mysqli->query("SELECT * FROM template;");
    while ($row = $result->fetch_assoc()) {
        $selected = ""; {
            $selected = "selected";
        }

        echo "<option value='" . $row['TemplateID'] . "' " . $selected . ">" . $row['TemplateBezeichnung'] . "</option>";
    }
    ?>
    </SELECT>
    <br>
    <br>
    <input type="button" name="Commit" value="Auswählen" />


</form>