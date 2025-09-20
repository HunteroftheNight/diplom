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

    <title>Поиск</title>

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
        <h2>Результаты поиска</h2>
      </div>
    </div>
<?php
  		
	//header('Content-Type: application/json; charset=utf-8');

	  if (isset($_POST['searchText'])){
	  	echo '<div class="container">
	      		<div class="row">
	      		';

	    $dbh = new PDO('mysql:host=localhost; dbname=movedb;', "root","");  
	     
	    $s = '';

	    $qu = "SELECT * FROM devices WHERE name LIKE '%" . $_POST['searchText'] . "%'";

	    foreach($dbh->query($qu) as $row) {
	      if ($row['name'] == !null) {
			echo '
	        			<div class="col-md-4 tables">
	        			<div clas="col-md-1">
	        			</div>

	        			<div class="col-md-10 tabless">
	          				<h5><b>'. $row["name"] .'</b></h5>
				          	<p>'. mb_substr($row["purpose"],0,100, 'UTF-8') .'...'.'</p>
				          
				          	<div class="tablbut2"><a class="btn btn-default tablbut" href="/device.php?pribori&device='.$row["id_device"].'" role="button">Подробнее &raquo;</a></div>
				         </div>
						<div clas="col-md-1">
	        			</div>

			        	</div>
			      	 ';
			}
	    }


	    echo '</div>
			   <hr>
				</div>';

	    echo json_encode($s);
	  }

	 
?>

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

    <script src="js/search.js"></script>

  </body>
</html>




