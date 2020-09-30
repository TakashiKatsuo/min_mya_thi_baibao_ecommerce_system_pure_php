<?php 
	session_start();
	include 'dbconnection/dbconnect.php';

	$id = $_SESSION['user']['User_id'];

    $orderid = $_GET['orderid'];

    $status =1;

	$sql = "UPDATE orders SET Order_cancel_status=:ordercancelstatus, Status_changed_by=:statuschangedby WHERE Order_id=:orderid";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":orderid", $orderid);
	$stmt->bindParam(":ordercancelstatus", $status);
	$stmt->bindParam(":statuschangedby", $id);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:order_list.php");
	} else {
		echo "Error";
	}

?>