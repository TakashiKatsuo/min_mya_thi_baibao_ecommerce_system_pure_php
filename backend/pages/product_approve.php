<?php 

	session_start();
	include 'dbconnection/dbconnect.php';

	$id = $_SESSION['user']['User_id'];

	$productid = $_GET['productid'];

	$approve = 1;

	$sql = "UPDATE products SET Status_approve=:statusapprove, Status_changed_by=:approvedby WHERE Product_id=:productid";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":productid", $productid);
	$stmt->bindParam(":statusapprove", $approve);
	$stmt->bindParam(":approvedby", $id);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:product_list.php");
	} else {
		echo "Error";
	}

?>