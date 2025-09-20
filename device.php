<?php
	session_start();
	
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/TreeMenu.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/User.php");
	
	$user = new User($dbh);
	$treeMenu = new TreeMenu($dbh);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Приборы</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/registration.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
    <link href="css/container.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>


	 <?php include_once(__DIR__ . '/navbar.php');?>
   <div class="jumbotron">
      <div class="container">
        <h2>Приборы и оборудование</h2>
      </div>
    </div>

    <div class="container">

        <?php  if (isset($_GET['pribori'])) {

              $dbh = new PDO('mysql:host=localhost; dbname=movedb', "root","");

                foreach($dbh->query('SELECT * FROM devices WHERE id_device=' . $_GET['device'] ) as $row) {

                  if ($row['name'] == !null) {

                   echo '<div>';

                   echo '<h3>' . $row['name']. '</h3>';
                 
                   echo '<img src="' . $row['src_img'] .'" width="290" height="290"/>';
				
                   echo '<br>'.$row['id_group'].  " "  .$row['id_sub']; 
                
                   echo '<br>'.$row['purpose'];	

                   echo '<br>' .$row['standard'];

                   echo '<br>' .$row['characteristic'];

                   echo '</div>';
                 
                }
                
              }
              

          } 			
      ?>
      <?php if ($user->isLoggedin() and $user->checkGroupId(1)) { ?>    
      <center><a class="btn btn-default" href="/izpolzovanie.php?device=<?=$_GET['device']?>">Подать заявку</a></center>
      <?php } ?>

      <?php if ($user->isLoggedin() and $user->checkGroupId(3)) { ?>
      <center><a class="btn btn-default" href="/priobretenie.php?device=<?=$_GET['device']?>">Подать заявку</a></center>
      <?php } ?>

      <?php if ($user->isLoggedin() and $user->checkGroupId(4)) { ?> 
      <center><a class="btn btn-default" href="/maintenance.php?device=<?=$_GET['device']?>">Подать заявку</a></center>   
      <center><a class="btn btn-default" href="/poverka.php?device=<?=$_GET['device']?>">Подать заявку</a></center>
      <?php } ?>

                  
    </div> <!-- /container -->
    
    <center>
      <div class="navbar-fixed-bottom row-fluid" style="position: relative;">
          <div class="navbar-inner">
            <div class="container">
              <footer>
                <p>&copy; 2019 Company, Inc.</p>
              </footer>
            </div>
          </div>
        </div>
    </center>
    <!-- Bootstrap core JavaScript
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script> -->
    <!-- Placed at the end of the document so the pages load faster -->


    <script src="js/vendor/jquery/jquery.min.js"></script>
    
    <script src="js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="js/app/controller/RegistrationController.js"></script>
  </body>
</html>
