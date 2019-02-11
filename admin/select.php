<html>
<head>
<link rel="stylesheet" type="text/css" href="select_style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>

</head>
<body>
<p id="heading">test</p>
<center>
<div id="select_box">
 <select onchange="fetch_select(this.value);">
  <option>Select...</option>
  <?php
  $host = 'localhost';
  $user = 'user';
  $pass = 'passwort';
  mysql_connect($host, $user, $pass);
  mysql_select_db('cms');

  $select=mysql_query("select MmID from mainmenu");
  while($row=mysql_fetch_array($select))
  {
   echo "<option>".$row['test']."</option>";
  }
 ?>
 </select>

 <select id="new_select">
 </select>
	  
</div>     
</center>
</body>
</html>