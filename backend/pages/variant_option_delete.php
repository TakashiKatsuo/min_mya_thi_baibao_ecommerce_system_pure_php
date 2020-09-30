<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_GET['variantoptionid'];

	$sql = "DELETE FROM variant_options WHERE Variant_option_id=:id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:variant_option_list.php");
	} else {
		echo "Error";
	}

?>