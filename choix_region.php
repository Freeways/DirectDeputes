<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Choix de région</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>


  <?php 
session_start();
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");
//$cnx = mysql_connect ("127.0.0.1","root","") or die("Impossible de se connecter");
$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");

$req="select * from regions";
$result=mysql_query($req);
?>

	<body>
    <div class="container-full">

      <div class="row">
       
        <div class="col-lg-12 text-center v-center">
          <br><br><br><br><br><br>
          <h1>Une seule étape pour commencer</h1>
          <p class="lead">Choisissez votre région</p>
          
          <br><br><br>
          
          <form class="col-lg-12">
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
            <select class="form-control input-lg" name="region">
              <?php
  while($data = mysql_fetch_array($result))
  {   
    echo "<option value = '{$data['id_region']}'";
    echo ">{$data['nom']}</option>";
  }
  ?>
            </select>
              <span class="input-group-btn"><a href="dashboard.php"><button class="btn btn-lg btn-primary" type="button">OK</button></a></span>
            </div>
          </form>
        </div>
        
      </div> <!-- /row -->
  
    <br><br><br><br><br>

</div> <!-- /container full -->

<div class="container">
  
</div>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>