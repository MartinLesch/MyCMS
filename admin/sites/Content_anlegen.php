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
    ?>
    <table>
        <tr>
            <td>Auswahl Hauptmenupunkt</td>
            <td>
                <SELECT name="MmID" onchange="return submit();">
                    <option value="0">Bitte w�hlen</option>
                    <?php
                    $result = $cMysqli->query("SELECT * FROM mainmenu;");
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
        <tr>
            <td>Auswahl Submenupunkt</td>
            <td>
                <SELECT name="SMID" onchange="return submit();">
                    <option value="0">Bitte w�hlen</option>
                    <?php
                    if ($mmid) {
                        $result = $cMysqli->query("SELECT * FROM submenu WHERE MmID=" . $mmid . ";");
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
                if ($mmid && $smid) {
                    if ($result = $cMysqli->query("SELECT * FROM content WHERE SmID=" . $smid . ";")) {
                        $row = $result->fetch_assoc();

                        include "../contents/" . $row["PfadZurDatei"].".php";
                    } else {
                        echo "Nichts gefunden";
                    }
                }
                ?>
            </td>
        </tr>
    </table>
</form>

