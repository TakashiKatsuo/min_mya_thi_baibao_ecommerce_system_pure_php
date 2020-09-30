<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_GET['categoryid'];

	$sql = "DELETE FROM categories WHERE Category_id=:id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:category_list.php");
	} else {
		echo "Error";
	}

?>