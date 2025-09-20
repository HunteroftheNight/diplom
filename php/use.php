<?php
	session_start();
	
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/TreeMenu.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/User.php");
	
	$user = new User($dbh);
	$treeMenu = new TreeMenu($dbh);

    $dbh = new PDO('mysql:host=localhost; dbname=movedb;', "root",""); 

    $fields=$_GET;

    $id_group=(int) $fields['id_group'];
    $id_sub=(int) $fields['id_sub'];
    $id_device=(int) $fields['id_device'];
    $example=(int) $fields['example'];
    $your_name= $fields['your_name'];
    


    $stmt = $dbh->prepare("INSERT INTO `izpolzovanie` (`id_group`, `id_sub`, `id_device`, `example`, `your_name`) 
    VALUES (:id_group, :id_sub, :id_device, :example, :your_name)");
    $stmt2 = $dbh->prepare("INSERT INTO `examples` (`id_group`, `id_sub`, `id_device`, `example`, `your_name`) 
    VALUES (:id_group, :id_sub, :id_device, :example, :your_name)");

   

    echo "<pre>";
    print_r($fields);
    echo "</pre>";

   
             
    try {
        $stmt->bindParam(':id_group',  $id_group);
        $stmt->bindParam(':id_sub',   $id_sub);
        $stmt->bindParam(':id_device',  $id_device); 
        $stmt->bindParam(':example', $example);
        $stmt->bindParam(':your_name', $your_name); 

        $stmt->execute();

        echo 'success!';
    }
    catch (PDOException $e) {
        echo  $e;
        echo 'error!';
    }

    ?>
    <script>
        location.href = '/pribori.php';
    </script>

    
