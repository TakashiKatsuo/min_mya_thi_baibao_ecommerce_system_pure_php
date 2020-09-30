<?php 

	session_start();
	include 'dbconnection/dbconnect.php';

	$id = $_SESSION['user']['User_id'];
	$shippingid = $_GET['shippingid'];

	$unapprove = 0;

	$sql = "UPDATE shippings SET Status_approve=:unapprove, Status_changed_by=:statuschangedby WHERE Shipping_id=:shippingid";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":shippingid", $shippingid);
	$stmt->bindParam(":unapprove", $unapprove);
	$stmt->bindParam(":statuschangedby", $id);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:shipping_list.php");
	} else {
		echo "Error";
	}

?>