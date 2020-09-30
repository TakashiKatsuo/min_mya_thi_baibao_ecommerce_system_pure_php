<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_GET['productid'];

	$sql = "DELETE FROM products WHERE Product_id=:id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:product_list.php");
	} else {
		echo "Error";
	}

?>