<?php 
	session_start();
	include 'dbconnection/dbconnect.php';

	$id = $_SESSION['user']['User_id'];

	$orderid = $_GET['orderid'];

	$status =0;

	$sql = "UPDATE orders SET Shipment_status=:shipmentstatus, Status_changed_by=:statuschangedby WHERE Order_id=:orderid";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":orderid", $orderid);
	$stmt->bindParam(":shipmentstatus", $status);
	$stmt->bindParam(":statuschangedby", $id);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:order_list.php");
	} else {
		echo "Error";
	}
		
?>