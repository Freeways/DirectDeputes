<?php 
session_start();
$id = 1;
//$cnx = mysql_connect ("127.0.0.1","root","") or die("Impossible de se connecter");
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");
$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");

$titre=$_POST["titre"];
$region=$_POST["region"];
$contenu=($_POST["contenu"]);

$sql = "INSERT INTO sujets (titre,contenue,dateC,reg,votep,votem,usr) VALUES ('$titre','$contenu','2015-02-08','$region','0','0','$id')";

mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

header('Location : dashboard.php');
mysql_close();
?>