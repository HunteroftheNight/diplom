<?php 

	function grafik($groupid = null){
		try {
		$dbh = new PDO('mysql:host=localhost; dbname=movedb', "root","");
		echo '<div class="container">
	      		<div class="row">
	      		';

	    $qu = '';  	
	    	
	    if ($groupid == null) 
	    {$qu = 'SELECT * FROM izpolzovanie';}
	    else {
	    	$qu = 'SELECT * FROM izpolzovanie WHERE id_group =' . $groupid;
	    }

		foreach($dbh->query($qu) as $row) {
			if ($row['your_name'] == !null) {
			echo '
	        	<div class="col-md-4 tables">
	        	<div clas="col-md-1">
	        	</div>

	        	<div class="col-md-10 tabless">
	          		<h5><b>'. $row["your_name"] .'</b></h5>
				    <p>'. mb_substr($row["purpose"],0,100, 'UTF-8') .'...'.'</p>
				          
					<div class="tablbut2">
					<a class="btn btn-default tablbut" href="/device.php?pribori&device='.$row["id_device"].'" role="button">Подробнее &raquo;</a></div>
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
		$dbh = null;
	}	catch (PDOException $e) {
			print "error!: " . $e->getMessage() . "<br/>" ;
			die();

	}
	}


	function oborydovanie($groupid = null){
		try {
		$dbh = new PDO('mysql:host=localhost; dbname=movedb', "root","");
		echo '<div class="container">
	      		<div class="row">
	      		';

	    $qu = '';  	
	    	
	    if ($groupid == null) 
	    {$qu = 'SELECT * FROM Оборудование';}
	    else {
	    	$qu = 'SELECT * FROM Оборудование WHERE Группа =' . $groupid;
	    }

		foreach($dbh->query($qu) as $row) {

			if ($row['Название_оборудования'] == !null) {
			echo '			

    				<div class="col-md-4 tables">

        				<div clas="col-md-1">
        				</div>

	        			<div class="col-md-10 tabless">
	          				<h5><b>'. $row["Название_оборудования"] .'</b></h5>
				          	<p>'. mb_substr($row["Назначение"],0,100, 'UTF-8') .'...'.'</p>
				          
				          	<div class="tablbut2"><a class="btn btn-default tablbut" href="/device.php?oborydovanie&device='.$row["Код_Об"].'" role="button">Подробнее &raquo;</a></div>
				          
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
		$dbh = null;
	}	catch (PDOException $e) {
			print "error!: " . $e->getMessage() . "<br/>" ;
			die();

	}
	}
	
?>


