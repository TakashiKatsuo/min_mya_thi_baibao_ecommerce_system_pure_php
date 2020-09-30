<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_GET['subcategoryid'];

	$sql = "DELETE FROM subcategories WHERE Subcategory_id=:id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:subcategory_list.php");
	} else {
		echo "Error";
	}

?>