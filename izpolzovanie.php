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

    <title>Использование</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/registration.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
	  <link href="css/form.css" rel="stylesheet">
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
        <h2>Заявка на использование</h2>
      </div>
    </div>

    <div class="container">

		<center><form action ="/php/use.php" method="GET" id="form">	
		
			<label>Код группы</label>
			<input type ="text" name ="id_group"/><br/><br/>
			<label>Код подгруппы</label>
			<input type ="text" name ="id_sub"/><br/><br/>
			<label>Код прибора</label>
			<input type ="text" name ="id_device"/><br/><br/>
			<label>Кому выдан</label>
			<input type ="text" name ="your_name"/><br/><br/>	
      <label>Номер экземпляра</label>
			<input type ="text" name ="example"/><br/><br/>
					
						
			<button type="submit">Отправить</button>			
		</form></center>
		<hr>
		
		
		
    </div> 
	<hr> <!-- /container -->
    
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
