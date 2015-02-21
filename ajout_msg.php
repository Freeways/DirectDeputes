<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Ajouter un sujet</title>
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
//$cnx = mysql_connect ("127.0.0.1","root","root") or die("Impossible de se connecter");
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");
$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");

$req="select * from deputes";
$result=mysql_query($req);


?>


	<body>
<div class="wrapper">
    <div class="box">
        <div class="row">
          
            <!-- sidebar -->
            <div class="column col-sm-3" id="sidebar">
                <h2 style="color:white;">DirectDéputés</h2>
                <ul class="nav">
                    <li><a href="#Message"><i class="glyphicon glyphicon-envelope"></i> Messages</a></li>
                    <li><a href="#Profile"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
                </ul>

                <ul class="nav">
                    <li><a href="#Depute"><i class="glyphicon glyphicon-th-list"></i> List des deputés</a></li>
                    <li><a href="#Sujets"><i class="glyphicon glyphicon-inbox"></i> Sujets</a></li>
                </ul>
              
            </div>
            <!-- /sidebar -->
          
            <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->
                        
                        <div class="col-sm-12" id="featured">
                        <form class="form-horizontal" action="insertms.php" method="POST">
                        <fieldset>
                         

                          <legend>Envoyer un message</legend>
                          <div class="form-group">

                        <div class="form-group">
                          <label for="towho" class="col-lg-2 control-label">À :</label>
                          <select name="towho" id="towho">

  <?php
  while($data = mysql_fetch_array($result))
  {   

   echo "<option value = '{$data['id_debuty']}'";
   echo ">{$data['nom']}</option>";
  }
  ?>

</select>
                          </div>

                          <label for="textArea" class="col-lg-2 control-label">Message</label>
                          <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="textArea" name="contenu"></textarea>
                          </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                              <button type="submit" class="btn btn-info">Envoyer</button>
                            </div>
                          </div>
                          </fieldset>
                          </form>
                          </div>
                        
                        
                        
                        <!--/divider-->
                        <div class="row divider">    
                           <div class="col-sm-12"><hr></div>
                        </div>

                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>