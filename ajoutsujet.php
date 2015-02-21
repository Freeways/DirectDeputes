<html>
<head>
</head>
<body>



<?php 
session_start();
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");
//$cnx = mysql_connect ("127.0.0.1","root","") or die("Impossible de se connecter");
$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");

$req="select * from regions";
$result=mysql_query($req);
?>








<form action="insertsj.php" method="POST">
Titre :  <input type="text" name="titre">
<br>
Region :

<select name="region">

	<?php
	while($data = mysql_fetch_array($result))
	{		
    echo "<option value = '{$data['id_region']}'";
    echo ">{$data['nom']}</option>";
	}
	?>

</select>

<br>  
sujets :
<br>
<textarea rows="4" cols="40" name="contenu">
</textarea>
<input type="submit">
</form>

<?php
mysql_close();
?>
</body>
</html>