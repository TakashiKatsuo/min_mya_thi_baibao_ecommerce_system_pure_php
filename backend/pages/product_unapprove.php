<?php 

	session_start();
	include 'dbconnection/dbconnect.php';

	$id = $_SESSION['user']['User_id'];
	
	$productid = $_GET['productid'];

	$unapprove = 0;

	$sql = "UPDATE products SET Status_approve=:statusunapprove, Status_changed_by=:approvedby WHERE Product_id=:productid";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":productid", $productid);
	$stmt->bindParam(":statusunapprove", $unapprove);
	$stmt->bindParam(":approvedby", $id);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:product_list.php");
	} else {
		echo "Error";
	}

?>