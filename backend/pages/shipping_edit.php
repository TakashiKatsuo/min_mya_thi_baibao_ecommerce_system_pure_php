<?php
	session_start(); 
	include 'dbconnection/dbconnect.php';

	$id = $_POST['Shipping_id'];
	$name = $_POST['Shipping_name'];
	$perorderprice = $_POST['Per_order_price'];
	$peritemprice = $_POST['Per_item_price'];
	$perweightprice = $_POST['Per_weight_price'];

	$statusapprove = 0;

	$sql = "UPDATE shippings SET Shipping_name=:shipping_name, Per_order_price=:perorderprice, Per_item_price=:peritemprice, Per_weight_price=:perweightprice, Status_approve=:statusapprove WHERE Shipping_id=:shipping_id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':shipping_id', $id);
	$stmt->bindParam(':shipping_name', $name);
	$stmt->bindParam(':perorderprice', $perorderprice);
	$stmt->bindParam(':peritemprice', $peritemprice);
	$stmt->bindParam(':perweightprice', $perweightprice);
	$stmt->bindParam(':statusapprove', $statusapprove);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:shipping_list.php");
	} else {
		echo "Error";
	}

?>