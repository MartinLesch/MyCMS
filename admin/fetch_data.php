<?php
if(isset($_POST['get_option']))
{
 $host = 'localhost';
 $user = 'user';
 $pass = 'passwort';
 mysql_connect($host, $user, $pass);
 mysql_select_db('cms');

 $state = $_POST['get_option'];
 $find=mysql_query("select SmID from places where state='$state'");
 while($row=mysql_fetch_array($find))
 {
  echo "<option>".$row['SmID']."</option>";
 }
 exit;
}
?>