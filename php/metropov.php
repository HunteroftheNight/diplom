<?php
	session_start();
	
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/TreeMenu.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/User.php");
	
	$user = new User($dbh);
	$treeMenu = new TreeMenu($dbh);

    $dbh = new PDO('mysql:host=localhost; dbname=movedb;', "root",""); 

    $fields=$_GET;

    $id_group=(int)$fields['id_group'];
    $id_sub=(int)$fields['id_sub'];
    $id_device=(int)$fields['id_device'];
    $example=(int)$fields['example'];
    $id_app=(int)$fields['id_app'];
    $app_date=$fields['app_date'];
    $deliv_date=$fields['deliv_date'];
    $poverka_date=$fields['poverka_date'];
    $csm_name=$fields['csm_name'];

    

    $stmt = $dbh->prepare("INSERT INTO `poverka` (`id_group`, `id_sub`, `id_device`, `example`, 
                                             `id_app`, `app_date`, `deliv_date`, `poverka_date`, `csm_name`) 
    VALUES(:id_group, :id_sub, :id_device, :example, :id_app, :app_date, :deliv_date, :poverka_date, :csm_name)");

    $stmt2 = $dbh->prepare("INSERT INTO `examples` (id_group, id_sub, id_device, example,
                                                          poverka_date) 
    VALUES(:id_group, :id_sub, :id_device, :example, :poverka_date)");

    echo "<pre>";
    print_r($fields);
    echo "</pre>";


    try {
            $stmt->bindParam(':id_group', $id_group);
            $stmt->bindParam(':id_sub', $id_sub);
            $stmt->bindParam(':id_device', $id_device); 
            $stmt->bindParam(':example', $example);
            $stmt->bindParam(':id_app', $id_app);
            $stmt->bindParam(':app_date', $app_date);
            $stmt->bindParam(':deliv_date', $deliv_date);
            $stmt->bindParam(':poverka_date', $poverka_date);
            $stmt->bindParam(':csm_name', $csm_name);          
            $stmt->execute();
echo 'success!';
    }
    catch (PDOException $e) {
        echo  $e;
        echo 'error!';
    }

    ?>
    <script>
        location.href = '/auth.php';
    </script>