<?php
	session_start(); 
	include 'dbconnection/dbconnect.php';

	$shippingproviderid = $_SESSION['user']['User_id'];

	$id = $_POST['Shipping_id'];
	$name = $_POST['Shipping_name'];
	$perorderprice = $_POST['Per_order_price'];
	$peritemprice = $_POST['Per_item_price'];
	$perweightprice = $_POST['Per_weight_price'];

	$statusapprove = 0;

	$sql = "INSERT INTO shippings (Shipping_id, Shipping_name, Per_order_price, Per_item_price, Per_weight_price, Status_approve, Shipping_provider_id) VALUES (:shipping_id, :shipping_name, :perorderprice, :peritemprice, :perweightprice, :statusapprove, :shippingproviderid)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':shipping_id', $id);
	$stmt->bindParam(':shipping_name', $name);
	$stmt->bindParam(':perorderprice', $perorderprice);
	$stmt->bindParam(':peritemprice', $peritemprice);
	$stmt->bindParam(':perweightprice', $perweightprice);
	$stmt->bindParam(':statusapprove', $statusapprove);
	$stmt->bindParam(':shippingproviderid', $shippingproviderid);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:shipping_list.php");
	} else {
		echo "Error";
	}

?>