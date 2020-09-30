<?php 
	session_start();
	include 'dbconnection/dbconnect.php';

	$userid = $_SESSION['user']['User_id'];

	$id = $_POST['Product_id'];
	$image = $_FILES['Product_image'];
	$brand = $_POST['Product_brand'];
	$name = $_POST['Product_name'];
	$price = $_POST['Product_price'];
	$dprice = $_POST['Product_discounted_price'];
	$weight = $_POST['Product_weight'];
	$pdesc = $_POST['Product_description'];
	$subcateid = $_POST['Subcategory_id'];

	$statusapproval = 0;


	// DO IF CONDITIONS HERE TO SET THE SELLER OR MANAGER SESSION ID INTO SELLER_ID OR MANAGER_ID


	$basepath = "../images/products/";
	$fullpath = $basepath.$image['name'];
	move_uploaded_file($image['tmp_name'], $fullpath);

	$sql = "INSERT INTO products (Product_id, Product_image, Product_brand, Product_name, Product_price, Product_discounted_price, Product_weight, Product_description, Subcategory_id, Seller_id, Status_approve) VALUES (:product_id, :product_image, :product_brand, :product_name, :product_price, :dprice, :weight, :pdesc, :subcategory_id, :userid, :statusapproval)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':product_id', $id);
	$stmt->bindParam(':product_image', $fullpath);
	$stmt->bindParam(':product_brand', $brand);
	$stmt->bindParam(':product_name', $name);
	$stmt->bindParam(':product_price', $price);
	$stmt->bindParam(':dprice', $dprice);
	$stmt->bindParam(':weight', $weight);
	$stmt->bindParam(':pdesc', $pdesc);
	$stmt->bindParam(':subcategory_id', $subcateid);
	$stmt->bindParam(':userid', $userid);
	$stmt->bindParam(':statusapproval', $statusapproval);

	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:product_list.php");
	} else {
		echo "Error";
	}

?>