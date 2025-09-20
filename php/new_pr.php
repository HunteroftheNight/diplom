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
    $name=$fields['name'];
    $standard=$fields['standard'];
    $modify=$fields['modify'];
    $brand=$fields['brand'];
    $purpose=$fields['purpose'];
    $characteristic=$fields['characteristic'];

    
    $stmt = $dbh->prepare("INSERT INTO `devices` (`id_group`, `id_sub`, `id_device`, `name`, 
                                             `standard`, `modify`, `brand`, `purpose`, `characteristic`) 
    VALUES(:id_group, :id_sub, :id_device, :name, :standard, :modify, :brand, :purpose, :characteristic)");

$stmt->bindParam(':id_group', $id_group);
$stmt->bindParam(':id_sub', $id_sub);
$stmt->bindParam(':id_device', $id_device); 
$stmt->bindParam(':name', $name);
$stmt->bindParam(':standard', $standard);
$stmt->bindParam(':modify', $modify);
$stmt->bindParam(':brand', $brand);
$stmt->bindParam(':purpose', $purpose);
$stmt->bindParam(':characteristic', $characteristic);          
$stmt->execute(); 
?>
<script>
    location.href = '/auth.php';
</script>