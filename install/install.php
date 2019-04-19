<?php
session_start();
/*
 * install.php - Eingabeformular fuer installation cms
 * ... startet exec_intall.php nachdem das Formular ausgefuellt ist
 * ... benutzer, zugangsdaten zu sql-instanz
 */
?>
<html>
    <meta charset="UTF-8" />
    <meta http-equiv="expires" content="0" />
    <meta name="author" content="Martin Lesch" />
    <meta name="date" content="2019-04-19T23:19:37+02:00" />
    <meta name="description" content="Installation MeinCMS Schulprojekt VIF4." />
    <meta name="keywords" lang="de" content="HTML, PHP, VIF4, MeinCMS, Installation, BBS2, LeerMartin Lesch, Deutsch" />
    <head>
        <title>
            Install MyCMS
        </title>
    </head>
    <body>
    <center>
        <h1>
            Installation MeinCMS <br>
        </h1>
        Die Datenbank muss existieren, das Admin-Verzeichnis sollte nachfolgend <br>
        geschuetzt werden.  <br>
        Bitte fuellen Sie die folgenden Felder entsprechend aus. <font color="red"> Die <br>
        Zeilen in roter Schrift sind zwingend auszufuellen. </font> <br>
        Diese Installation kann nur ein mal ausgefuehrt werden. <br> 
        <form name="install" action="exec_install.php" method="POST"> <br>
            <table border="1px" width="800px"> 
                <colgroup>
                    <col width="50%">
                    <col width="50%">
                </colgroup>
                <caption>
                    Bitte fuellen Sie die folgenden Eingabefelder aus!
                </caption>
                <thead bgcolor="yellow"> <!-- Tabellenkopf beginnt -->
                    <tr> 
                        <th>  
                            Angaben fuer MySQL
                        </th>
                        <th>
                            Ihre Eingaben
                        </th>
                    </tr>
                </thead>
                <tfoot bgcolor="blue">
                    <tr> 
                        <td>  
                            Install.php von Martin Lesch
                        </td>
                        <td>
                            Projekt der VIF4 - BBS2-Leer
                        </td>
                    </tr> 
                </tfoot>
                <tbody>
                    <tr>
                        <td>
                            <font color="red">
                            Benutzername MySQL: &nbsp;
                            </font>
                        </td>
                        <td>
                            <input Type="text" name="UserSQL" placeholder="root"required> <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font color="black">
                            Passwort MySQL: &nbsp;
                            </font>
                        </td>
                        <td>
                            <input Type="password" name="PassSQL"> <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font color="red">
                            IP oder DNS fuer MySQL-Instanz: &nbsp;
                            </font>
                        </td>
                        <td>
                            <input Type="text" name="AdrSQL" placeholder="localhost" required> <br>
                            <!-- pattern="((^|\.)((25[0-5]_*)|(2[0-4]\d_*)|(1\d\d_*)|([1-9]?\d_*))){4}_*$" -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font color="red">
                            Name der Datenbank: &nbsp;
                            </font>
                        </td>
                        <td>
                            <input Type="text" name="DbNameSQL" placeholder="cms" required> <br>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="yellow">
                <center><b> Angaben fuer .htpasswd (Admin)</b></center>
                </td>
                <td bgcolor="yellow">
                    <br>
                </td>
                </tr>
                <tr>
                    <td>
                        <font color="black">
                        Benutzername Admin: &nbsp;
                        </font>
                    </td>
                    <td>
                        <input Type="text" name="UserAdmin" placeholder="admin" > <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="black">
                        Passwort Admin: &nbsp;
                        </font>
                    </td>
                    <td>
                        <input Type="password" name="PassAdmin" pattern=".{4,}" title="Mindestens 4-stellig" placeholder="geheim" > <br>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <input Type="submit" name="commit" value="Installation starten - los geht's">
        </form>
    </center>
</body>
</html>
