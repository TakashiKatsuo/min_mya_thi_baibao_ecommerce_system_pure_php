<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_GET['variantid'];

	$sql = "DELETE FROM variants WHERE Variant_id=:id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:variant_list.php");
	} else {
		echo "Error";
	}

?>