<?php 
session_start();
$id = 1;
//$cnx = mysql_connect ("127.0.0.1","root","") or die("Impossible de se connecter");
$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");


$to=$_POST["towho"];
$contenu=($_POST["contenu"]);
$sql = "INSERT INTO messagesenvoyes (contenu,emetteurU) VALUES ('$contenu','$id')";
mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

$sql2 = "INSERT INTO messagesrecus (contenu,recepteurD) VALUES ('$contenu','$to')";
mysql_query ($sql2) or die ('Erreur SQL !'.$sql2.'<br />'.mysql_error());





mysql_close();
?>