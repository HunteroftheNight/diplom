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
    $id_app=(int)$fields['id_app'];
    $name=$fields['name'];
    $app_date=$fields['app_date'];
    $id_count=$fields['id_count'];

    
    $stmt = $dbh->prepare("INSERT INTO `priobretenie` (`id_group`, `id_sub`, `id_device`, 
                                                        `id_app`, `name`, `app_date`, `id_count`) 
    VALUES(:id_group, :id_sub, :id_device, :id_app, :name, :app_date, :id_count)");

    
echo "<pre>";
print_r($fields);
echo "</pre>";

$stmt->bindParam(':id_group', $id_group);
$stmt->bindParam(':id_sub', $id_sub);
$stmt->bindParam(':id_device', $id_device); 
$stmt->bindParam(':name', $name);
$stmt->bindParam(':id_app', $id_app);
$stmt->bindParam(':app_date', $app_date);
$stmt->bindParam(':id_count', $id_count);          
$stmt->execute(); 