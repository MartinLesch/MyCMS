<?php
$selectEinsArray = array();
$selectEinsArray[1] = "Eintrag1";
$selectEinsArray[4] = "Eintrag4";
$selectEinsArray[3] = "EintragUTZ";

$selectZweiArray = array();
$selectZweiArray[1] = array("E1  Punkt 1", "E1  Punkt 2");
$selectZweiArray[4] = array("E4  Punkt 1", "E4  Punkt 2");
$selectZweiArray[3] = array("EUTZ  Punkt 1", "EUTZ  Punkt 2");



if (isset($_POST["MMID"])) {
    if ($_POST["MMID"] != "0") {
        $mmid = $_POST["MMID"];
        if (isset($_POST["SMID"])) {
            if ($_POST["SMID"] != "0") {
                echo 'hier';
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
<form method="POST" action='#'>
    <SELECT name='MMID' onchange='submit();'>
        <option value='0'>Bitte wählen</option>
<?php
foreach ($selectEinsArray AS $key => $val) {
    $selected = "";
    if ($mmid == $key) {
        $selected = "selected";
    }
    echo "<option value='" . $key . "' " . $selected . ">" . $val . "</option>";
}
?>
    </SELECT>
    <br><br><br>
<?php
$disableSELECT2 = "disabled";
if ($mmid) {
    $disableSELECT2 = "";
}
?>
    <SELECT name='SMID' <?php echo $disableSELECT2; ?> onchange='submit();'>
        <option value='0'>Bitte wählen</option>
<?php
foreach ($selectZweiArray[$mmid] AS $optionSub) {
    $selected = "";
    if ($smid == $optionSub) {
        $selected = "selected";
    }
    echo "<option value='" . $optionSub . "' " . $selected . ">" . $optionSub . "</option>";
}
?>
    </SELECT>

    <br>
<?php
//Laden Content
echo $mmid . "<br>";
echo $smid . "<br>";
?>
</form>
