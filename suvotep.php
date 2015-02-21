<?php 
session_start();
$id = 1;
//$cnx = mysql_connect ("127.0.0.1","root","") or die("Impossible de se connecter");
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");
$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");


$id_sub=$_GET['id'];
echo $id_sub;

$sql = "UPDATE sujets
SET votep=votep + 1
WHERE sujets.id_sujet like '$id_sub'";



mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());



mysql_close();
?>