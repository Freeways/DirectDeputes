<?php 
//$monid = $_SESSION['monid'];
session_start();
//$cnx = mysql_connect ("127.0.0.1","root","root") or die("Impossible de se connecter");
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");
$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");






$req2="select mr.contenu,u.nom from messagesrecus mr, messagesenvoyes me, users u where mr.recepteurD=0 and me.contenu=mr.contenu and me.emetteurU=u.id_user";
$result2=mysql_query($req2);

while($data2 = mysql_fetch_array($result2))
{
	echo"<br>";
  $msg=$data2['contenu'];
  echo $data2['contenu'];
  	echo"<br>";
  $msg=$data2['nom'];
  echo $data2['nom'];
}





mysql_close();
?>