<?php 

	session_start();
	include 'dbconnection/dbconnect.php';

	$id = $_SESSION['user']['User_id'];
	$shippingid = $_GET['shippingid'];

	$approve = 1;

	$sql = "UPDATE shippings SET Status_approve=:approve, Status_changed_by=:statuschangedby WHERE Shipping_id=:shippingid";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":shippingid", $shippingid);
	$stmt->bindParam(":approve", $approve);
	$stmt->bindParam(":statuschangedby", $id);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:shipping_list.php");
	} else {
		echo "Error";
	}

?>