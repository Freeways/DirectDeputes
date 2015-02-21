<?php 
session_start();
$id = 1;
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");
//$cnx = mysql_connect ("127.0.0.1","root","") or die("Impossible de se connecter");
$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");



$sql = "UPDATE deputes
SET votep=votep + 1
WHERE deputes.id_deputy=0";

mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

mysql_close();
?>