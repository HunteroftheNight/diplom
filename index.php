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

    <title>Инструкции</title>

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


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <center><h2>Инструкции</h2><center>
        <center><h4>Для работы с приложением войдите в систему</h4><center>
        
        
		<?php if (!$user->isLoggedin()) { ?>
		<p><a class="btn btn-danger btn-lg" href="#" role="button" color="blue" data-toggle="modal" data-target="#modal_registration">
        Регистрация &raquo;</a></p>
		<?php } ?>
		
      </div>
    </div>

   
      <div class="container">
      <!-- Example row of columns -->
      <hr>
      <?php if (!$user->isLoggedin()) { ?>
        <div class="row">
		    <div class="col-md-12">
          <center><h3>Справочник приборов</h3><center>
		      <center><p>Войдите в справочник для получения информации о приборе</p></center>
          <center><p><a class="btn btn-default" href="/pribori.php" role="button">Перейти &raquo;</a></p></center>
        </div>
      <?php } 

      else if ($user->isLoggedin() and $user->checkGroupId(1)) { ?>
        <div class="row">
        <div class="col-md-12">
          <center><h3>Заявка на использование</h3><center>
          <center><p>Заполните заявку для получения прибора в эксплуатацию</p></center>
          <center><p><a class="btn btn-default" href="/pribori.php" role="button">Перейти &raquo;</a></p></center>
        </div>
      </div>
      <hr>
      <?php } 
           
      
      else if ($user->isLoggedin() and $user->checkGroupId(3)) { ?>
        <div class="row">
        <div class="row">
		    <div class="col-md-6">
          <center><h3>Справочник приборов</h3><center>
		      <center><p>Войдите в справочник для получения информации о приборе</p></center>
          <center><p><a class="btn btn-default" href="/pribori.php" role="button">Перейти &raquo;</a></p></center>
        </div>

        <div class="col-md-6">
          <center><h3>Приобретение</h3><center>
		      <center><p>Приобрести прибор</p></center>
          <center><p><a class="btn btn-default" href="/priobretenie.php" role="button">Перейти &raquo;</a></p></center>
        </div>

        	      
      </div>
      <hr>
      <?php }  


      else if ($user->isLoggedin() and $user->checkGroupId(4)) { ?>
        <div class="row">
        <div class="col-md-4">
          <center><h3>Заявка на поверку</h3><center>
          <center><p>Передача прибора для калибровки</p></center>
          <center><p><a class="btn btn-default" href="/pribori.php" role="button">Перейти &raquo;</a></p></center>
        </div>

        <div class="col-md-4">
          <center><h3>Тех. обслуживание</h3><center>
		      <center><p>Заявка для учета данных о тех.обслуживании</p></center>
          <center><p><a class="btn btn-default" href="/pribori.php" role="button">Перейти &raquo;</a></p></center>
        </div>

        <div class="col-md-4">
          <center><h3>График использования</h3><center>
		      <center><p></p></center>
          <center><p><a class="btn btn-default" href="/graph.php" role="button">Перейти &raquo;</a></p></center>
        </div>
      </div>
      <hr>
      <?php }  
      

       else { ?>
	    <div class="row">
        <div class="col-md-6">
          <center><h3>Добавить новый прибор</h3><center>
		      <center><p></p></center>
          <center><p><a class="btn btn-default" href="/new_device.php" role="button">Перейти &raquo;</a></p></center>
        </div>
		
		
	   <div class="row">
		    <div class="col-md-6">
          <center><h3>Заявка на использование</h3><center>
		      <center><p>Заполните заявку для получения прибора в эксплуатацию</p></center>
          <center><p><a class="btn btn-default" href="/pribori.php" role="button">Перейти &raquo;</a></p></center>
        </div>
      </div>
      <hr>
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
