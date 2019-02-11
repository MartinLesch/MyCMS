<?php
session_start();
require_once '../includes/dbConnect.php';
require_once '../includes/upload.php';
$path = false;
if (isset($_GET["path"])) {
    $path = $_GET["path"];
}

function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

function contentanlegen($fileName, $neucontent) {
    if ($neucontent != "") {
        $datei = fopen($fileName, 'w+');
        fwrite($datei, $neucontent);
        fclose($datei);
    }
}

if (isset($_POST["contentanlegen"])) {
    if (isset($_POST["contentnameVorhanden"])) {
        unlink("../content/articles/" . $_POST["contentnameVorhanden"] . ".php");
        $PfadZurDateiTemp = $_POST["contentnameVorhanden"];
    } else {
        $PfadZurDateiTemp = $_POST["contentname"];
    }
    contentanlegen("../content/articles/" . $PfadZurDateiTemp . ".php", $_POST["textareatiny"]);
    if (!$result = $mysqli->query("INSERT INTO content (PfadZurDatei,smid) VALUES ('" . $PfadZurDateiTemp . "'," . $_POST["SMID"] . ");")) {
        echo "Speichern nein!";
    }
}
?>

<!DOCTYPE html>
<script src="../includes/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#textareatiny',
        language: 'de',

        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern codesample"
        ],
        toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | codesample | print | removeformat | subscript superscript charmap | spellchecker pagebreak \n\
                  styleselect formatselect fontselect fontsizeselect | \n\
                  searchreplace | bullist numlist | \n\
                  outdent indent blockquote | undo redo | \n\
                  link unlink image code | forecolor backcolor | table ",
        menubar: true,
        toolbar_items_size: 'small',
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
        // without images_upload_url set, Upload tab won't show up
        images_upload_url: 'upload.php',
        // override default upload handler to simulate successful upload
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload.php');

            xhr.onload = function () {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },

    });
    tinymce.init({
        selector: '#tinyzwei',

    });
</script>
<meta charset="UTF-8"> 

<form action="#" method="POST">

<?php
if (isset($_POST["MMID"])) {
    if ($_POST["MMID"] != "0") {
        $mmid = $_POST["MMID"];
        if (isset($_POST["SMID"])) {
            if ($_POST["SMID"] != "0") {
                $smid = $_POST["SMID"];
            } else {
                $smid = false;
            }
        } else {
            $smid = false;
        }
    } else {
        $mmid = false;
        $smid = false;
    }
} else {
    $mmid = false;
    $smid = false;
}

//content laden, falls vorhanden
$content = false;
$tinyFreigabe = false;
$disabledContent = "";
if ($mmid && $smid) {
    $tinyFreigabe = true;
    if ($result = $mysqli->query("SELECT * FROM content WHERE SmID=" . $smid . ";")) {
        if ($result->num_rows > 0) {
            $rowContent = $result->fetch_assoc();
            $content = get_include_contents("../content/articles/" . $rowContent["PfadZurDatei"] . ".php");
            $disabledContent = "disabled";
        }
    } else {
        echo "Fehler DB.";
    }
}
?>
    <table>
        <tr>
            <td>Auswahl Hauptmenupunkt</td>
            <td>
                <SELECT name="MMID" onchange="return submit();">
                    <option value="0">Bitte wählen</option>
<?php
$result = $mysqli->query("SELECT * FROM mainmenu;");
while ($row = $result->fetch_assoc()) {
    $selected = "";
    if ($mmid == $row['MmID']) {
        $selected = "selected";
    }

    echo "<option value='" . $row['MmID'] . "' " . $selected . ">" . $row['MmName'] . "</option>";
}
?>
                </SELECT>
            </td>
        </tr>
<?php
$disableSELECT2 = "disabled";
if ($mmid) {
    $disableSELECT2 = "";
}
?>
        <tr>
            <td>Auswahl Submenupunkt</td>
            <td>
                <SELECT name="SMID" <?php echo $disableSELECT2; ?> onchange="return submit();">
                    <option value="0">Bitte wählen</option>
<?php
if ($mmid) {
    $result = $mysqli->query("SELECT * FROM submenu WHERE MmID=" . $mmid . ";");
    while ($row = $result->fetch_assoc()) {
        $selected = "";
        if ($smid == $row['SmID']) {
            $selected = "selected";
        }
        echo "<option value='" . $row['SmID'] . "' " . $selected . ">" . $row['SmName'] . "</option>";
    }
}
?>
                </SELECT>
            </td>
        </tr>
        <tr>
            <td>Content</td> 
            <td>
<?php
if (!empty($disabledContent)) {
    echo '<input type="text" value="' . $rowContent["PfadZurDatei"] . '" name="contentname" ' . $disabledContent . ' /> ';
    echo '<input type="hidden" value="' . $rowContent["PfadZurDatei"] . '" name="contentnameVorhanden" /> ';
} else {
    echo '<input type="text" name="contentname" /> ';
}
?>
            </td>
        </tr>

        <tr>
            <td></td> 
            <td>


<?php
if ($tinyFreigabe) {
    echo "<textarea id='textareatiny' name='textareatiny'>" . $content . "</textarea>";
    echo '<input type="submit" class="button" name="contentanlegen" value="Speichern"/>';
}
?>



            </td>
        </tr>
    </table>
</form>

