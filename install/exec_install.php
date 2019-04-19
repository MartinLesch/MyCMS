<?php
session_start();
/*
 * exec_install.php - installation cms
 */
if (isset($_POST["commit"])) {
    $user = $_POST["UserSQL"];
    $password = $_POST["PassSQL"];
    $adress = $_POST["AdrSQL"];
    $dbName = $_POST["DbNameSQL"];
    //$userAdmin = $_POST["UserAdmin"];
    //$passwordAdmin = $_POST["PassAdmin"];
}
if (!isset($user)) {
    echo "Achtung, dieses Programm sollte nur ueber das Programm 'install.php' gestartet werden. <br>";
    echo "Programm wird nun beendet.";
    exit(1);
}
?>
<html>
    <head>
        <title> 
            MeinCMS wird installiert
        </title>
    </head> 
    <body>
        <h1>
            Installation wird durchgefuehrt ...
        </h1>
        Ihre Eingaben waren:
        <?php
        echo "<br> User MySQL = " . $user;
        echo "<br> Passwort MySQL= " . $password;
        echo "<br> Adresse bzw. DNS zu MySQL = " . $adress;
        echo "<br> Name der Datenbank in MySQL = " . $dbName;
        //echo "<br> User Admin = " . $userAdmin;
        //echo "<br> Passwort Admin = " . $passwordAdmin;

        echo "<br> <br> 1) Klasse fuer Verbindung zur Datenbank wird erstellt ... ";

        //<!-- ACHTUNG Dateiname muss fuer Wirkbetrieb noch geaendert werden ... ohne auto -->

        $myfile = fopen("../includes/dbConnect.php", "w") or die("Kann Datei -dbConnect.php- nicht erstellen!");
        $txt = "<?php \r\n /* \r\n * Automatisch von Install.php erstellt \r\n */ \r\n";
        fwrite($myfile, $txt);
        $txt = "  \$mysqli = new mysqli('" . $adress . "', '" . $user . "', '" . $password . "', '" . $dbName . "'); \r\n";
        fwrite($myfile, $txt);
        $txt = "  if (\$mysqli->connect_errno) { \r\n";
        fwrite($myfile, $txt);
        $txt = "      echo \"Fehler beim Verbinden zu MySQL: \" . \$mysqli->connect_errno; \r\n";
        fwrite($myfile, $txt);
        $txt = "      die(); \r\n";
        fwrite($myfile, $txt);
        $txt = "  } \r\n";
        fwrite($myfile, $txt);
        $txt = "?> \rn";
        fwrite($myfile, $txt);

        fclose($myfile);
        echo " erledigt!";

        /* echo "<br> <br> 2) Datei .htpasswd wird erstellt ...";
          //<!-- ACHTUNG Dateiname muss fuer Wirkbetrieb noch geaendert werden ... ohne auto -->
          $myfile2 = fopen("../admin/auto_.htpasswd", "w") or die("Kann Datei -.htpasswd- nicht erstellen!");
          $txt = "admin:\$apr1\$wSDffAcN\$yQ2L10d/31iSJtgQu3cqG0 \r\n";  // uebernommen aus .htpasswd von Arni
          fwrite($myfile2, $txt);
          $passwordEncrypted = crypt($passwordAdmin, base64_encode($passwordAdmin));
          $txt = $userAdmin . ":" . $passwordEncrypted . " \r\n";
          fwrite($myfile2, $txt);
          fclose($myfile2);
          echo " erledigt! ";
          //echo $passwordEncrypted; */

        echo "<br> <br> 2) Verbindung zu MySQL herstellen ...";
        $conn = new mysqli($adress, $user, $password, $dbName);
        if ($conn->connect_errno) {
            echo "<br>!!! Fehler beim Verbinden zu MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
            exit(1);
        }
        echo "<br>    ... Verbindung zu MySQL hergestellt via: " . $conn->host_info . "<br>";

        echo "<br> <br> 3) Anlegen Tabellen und Schluessel ...";
        $sqlData = file_get_contents('cms.sql');
        $sqlDataArr = explode(';', $sqlData);
        foreach ($sqlDataArr as $query) {
            if ($query) {
                $conn->query($query);
                if ($conn->errno) {
                    echo "<br>     ... Fehler bei ausfuehren dieser Abfrage: " . $query . " <br>";
                    echo "         ... Fehlermeldung:  " . $conn->error . " <br>";
                }
            }
        }

        $conn->close();
        echo "    ... erledigt! ";

        echo "<br> <br> 4) Diese Funktion wird unkenntlich gemacht ...";
        //<!-- ACHTUNG Dateiname muss fuer Wirkbetrieb noch geaendert werden ... ohne auto -->
        $myfile3 = fopen("install.php", "w") or die("Kann Datei -install.php- nicht erstellen!");
        $txt = "<html> <head> <title>Dummy Install</title></head> \r\n";
        fwrite($myfile3, $txt);
        $txt = "<body> <h1> Installation kann kein zweites Mal gestartet werden!</h1></body></html> \r\n";
        fwrite($myfile3, $txt);
        fclose($myfile3);
        echo " erledigt! <br> <br>";
        echo "<h1>Installation erfolgreich abgeschlossen!</h1><br>";
        ?>
    </body>
</html>