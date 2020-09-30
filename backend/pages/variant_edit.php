<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_POST['Variant_id'];
	$name = $_POST['Variant_name'];
	$desc = $_POST['Variant_description'];
	$pid = $_POST['Product_id'];

	$sql = "UPDATE variants SET Variant_name=:variant_name, Variant_description=:variant_description, Product_id=:product_id WHERE Variant_id=:variant_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':variant_id', $id);
	$stmt->bindParam(':variant_name', $name);
	$stmt->bindParam(':variant_description', $desc);
	$stmt->bindParam(':product_id', $pid);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:variant_list.php");
	} else {
		echo "Error";
	}

?>