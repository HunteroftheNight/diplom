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
    $id_mainten=(int)$fields['id_mainten'];
    $mainten_form=$fields['mainten_form'];
    $mainten_date=$fields['mainten_date'];
    $id_count=$fields['id_count'];

    
    $stmt = $dbh->prepare("INSERT INTO `techobsluzhivanie` (`id_group`, `id_sub`, `id_device`, `example`, `id_mainten`, 
                                                        `mainten_form`, `mainten_date`, `id_count`) 
    VALUES(:id_group, :id_sub, :id_device, :example, :id_mainten, :mainten_form, :mainten_date, :id_count)");

    
echo "<pre>";
print_r($fields);
echo "</pre>";

$stmt->bindParam(':id_group', $id_group);
$stmt->bindParam(':id_sub', $id_sub);
$stmt->bindParam(':id_device', $id_device);
$stmt->bindParam(':example', $example); 
$stmt->bindParam(':id_mainten', $id_mainten);
$stmt->bindParam(':mainten_form', $mainten_form); 
$stmt->bindParam(':mainten_date', $mainten_date);
$stmt->bindParam(':id_count', $id_count);          
$stmt->execute(); 
?>
<script>
    location.href = '/pribori.php';
</script>