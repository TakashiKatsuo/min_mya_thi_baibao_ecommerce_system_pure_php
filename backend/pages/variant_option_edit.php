<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_POST['Variant_option_id'];
	$name = $_POST['Variant_option_name'];
	$desc = $_POST['Variant_option_description'];
	$vodp = $_POST['Variant_option_additional_price'];
	$vid = $_POST['Variant_id'];

	$sql = "UPDATE variant_options SET Variant_option_name=:variant_option_name, Variant_option_description=:variant_option_description, Variant_option_additional_price=:vodp, Variant_id=:variant_id WHERE Variant_option_id=:variant_option_id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':variant_option_id', $id);
	$stmt->bindParam(':variant_option_name', $name);
	$stmt->bindParam(':variant_option_description', $desc);
	$stmt->bindParam(':vodp', $vodp);
	$stmt->bindParam(':variant_id', $vid);

	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:variant_option_list.php");
	} else {
		echo "Error";
	}

?>