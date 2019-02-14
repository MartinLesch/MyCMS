<?php
session_start();
require_once '../includes/dbConnect.php';
$path = false;
if (isset($_GET["path"])) {
    $path = $_GET["path"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin-Bereich
        </title>
    </head>
    <body>
    <center>
        <table width="1024" border="1">
            <colgroup>
                <col width="15%">
                <col width="85%">
            </colgroup>
            <tr>
                <td colspan="2" height="100px">
                    <h1>Admin-Bereich</h1>
                    <?php
//headerInhalt
                    include_once './includes/menu.php';
                    ?>
                </td>
            </tr>
            <tr>
                <td align="left" valign="top">
                    <?php
//menuInhalt
                    if ($path) {
                        echo "<b>" . str_replace("_", " ", $path) . "</b>";
                        echo "<br>";
                    }
                    if ($path == "Menu_bearbeiten") {
                        echo "<br> ";
                        echo "<b><font color='red'> HauptMen&uuml; </font></b> <br>" ;

                        echo "<a href='index.php?path=" . $_GET["path"] ;
                        echo "&subpath=HauptMenuNeu'> Neu";
                        echo "</a> <br>";
                        echo "<a href='index.php?path=" . $_GET["path"] ;
                        echo "&subpath=HauptMenuLoeschen'> L&ouml;schen";
                        echo "</a> <br>";
                        echo "<a href='index.php?path=" . $_GET["path"] ;
                        echo "&subpath=HauptMenuAendern'> &Auml;ndern";
                        echo "</a> <br>";
                        echo "<br> ";
                        
                        echo "<b><font color='red'> SubMen&uuml </font></b> <br>" ;
                        echo "<a href='index.php?path=" . $_GET["path"] ;
                        echo "&subpath=SubMenuNeu'> Neu";
                        echo "</a> <br>";
                        echo "<a href='index.php?path=" . $_GET["path"] ;
                        echo "&subpath=SubMenuLoeschen'> L&ouml;schen";
                        echo "</a> <br>";
                        echo "<a href='index.php?path=" . $_GET["path"] ;
                        echo "&subpath=SubMenuAendern'> &Auml;ndern";
                        echo "</a> <br>";
                        echo "<br> ";
                        echo "<br> ";
                       
                    }
                    ?>
                </td>
                <td align="left" valign="top">
                    <?php
                    //content
                    if ($path) {
                        if (!isset($_GET["subpath"])) {
                            include_once './sites/' . $path . '.php';
                        }else{
                            include_once './sites/' . $_GET["subpath"] . '.php';
                        }
                    } else {
                        include_once './sites/start.php';
                    }
                    ?>
                </td>
            </tr>

        </table>
    </center>
</body>
</html>