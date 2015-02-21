<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Dashboard</title>
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
// $monid = $_SESSION['monid'];
//$cnx = mysql_connect ("127.0.0.1","root","") or die("Impossible de se connecter");
$cnx = mysql_connect ("localhost","root","") or die("Impossible de se connecter");

$db = "parlamenthon";
mysql_select_db($db,$cnx) or die("Impossible d'ouvrir la base");
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
                    <li><a href="dashboard.php"><i class="glyphicon glyphicon-inbox"></i> Sujets</a></li>
                </ul>
              
            </div>
            <!-- /sidebar -->
          
            <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->
                        
                        <div class="col-sm-12" id="featured">   
                          <div class="page-header text-muted">
                          Les sujets
                          </div> 
                        </div>

                       <ul class="pager">
                          <li><a href="dashboard_top.php" >Top sujets</a></li>
                          <li><a href="dashboard_recent.php" >Plus récents</a></li>
                          <li class="disabled"><a href="dashboard_region.php"  >Dans ma région</a></li>
                        </ul>
                        <?php 

                        $req2="select u.nom from users u,sujets s  where u.id_user=s.usr";
                            $result2=mysql_query($req2);

                            while($data2 = mysql_fetch_array($result2))
                            {
                              //echo"<br>";
                              $nom=$data2['nom'];
                              //echo $data2['nom'];
                            }

                        $req="select * from sujets order by dateC desc";
                          $result=mysql_query($req);
                          while($data = mysql_fetch_array($result))
                          {   
                            
                              //echo"";
                              $titre = $data['titre'];
                              //echo $data['titre'];
                              //echo"<br>";
                              $date = $data['dateC'];
                              //echo $data['dateC'];
                              //echo"<br>";
                              $votep = $data['votep'];
                              //echo $data['votep'];
                              //echo"<br>";
                              $votem = $data['votem'];
                              $id_sub = $data['id_sujet'];
                              //echo $data['votem'];
                            
                              echo "<!--/stories-->
                              <div class='row' style='height: 20%';>    
                                <div class='col-sm-10'>
                                  <h3>".$titre."</h3>
                                  <small class='text-muted'>".$date." • Par <i>".$nom."</i></small><br>
                                  <a href='thread.php?id=".$id_sub."'><strong><span class='label label-default' style='float:left;margin:10px;' >Lire le contenu</span></strong></a>
                                  <div class='col-sm-2' style='float:right;'>
                                    ".$votep."  <span class='glyphicon glyphicon-thumbs-up' style='display:inline;'></span>
                                    ".$votem."  <span class='glyphicon glyphicon-thumbs-down' style='display:inline;float:right;'></span>
                                  </div>
                                  
                                </div>
                                <div class='col-sm-2'>
                                  <a href='' class='pull-right' style='margin: 20px;'><img src='http://api.randomuser.me/portraits/thumb/men/86.jpg' class='img-circle'></a>
                                </div> 
                              </div>";

                              echo "
                              <div class='row divider'>    
                                 <div class='col-sm-12'><hr></div>
                              </div>";
                          }
                          ?>
                        
                        
                          <!--
                        <div class="row" style="height: 20%;">    
                          <div class="col-sm-10">
                            <h3>Titre : (crud_bd recent)</h3>
                            <small class="text-muted">Il y a 3 jours • Par <i>Foulen</i></small><br>
                            <a href="javascript: newWindow();"><strong><span class="label label-default" style="float:left;margin:10px;" >Lire la suite</span></strong></a>
                            <div class="col-sm-2" style="float:right;">
                              <span class="glyphicon glyphicon-thumbs-up" style="display:inline;"></span>
                              <span class="glyphicon glyphicon-thumbs-down" style="display:inline;float:right;"></span>
                            </div>
                            
                          </div>
                          <div class="col-sm-2">
                            <a href="#" class="pull-right" style="margin: 20px;"><img src="http://api.randomuser.me/portraits/thumb/men/86.jpg" class="img-circle"></a>
                          </div> 
                        </div>
                        <div class="row divider">    
                           <div class="col-sm-12"><hr></div>
                        </div>

                        -->
                      
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