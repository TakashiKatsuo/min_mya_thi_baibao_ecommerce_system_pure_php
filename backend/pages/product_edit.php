<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_POST['Product_id'];
	$brand = $_POST['Product_brand'];
	$name = $_POST['Product_name'];
	$price = $_POST['Product_price'];
	$dprice = $_POST['Product_discounted_price'];
	$weight = $_POST['Product_weight'];
	$pdesc = $_POST['Product_description'];
	$subcateid = $_POST['Subcategory_id'];

	$statusapproval = 0;


	// DO IF CONDITIONS HERE TO SET THE SELLER OR MANAGER SESSION ID INTO SELLER_ID OR MANAGER_ID

	$image = $_FILES['Product_image'];
	$oldimage = $_POST['Product_old_image'];

	if ($image['size']>0) {

		$basepath = "../images/products/";
		$fullpath = $basepath.$image['name'];
		move_uploaded_file($image['tmp_name'], $fullpath);
	} else {

		$fullpath = $oldimage;
	}

	$sql = "UPDATE products SET Product_image=:product_image, Product_brand=:product_brand, Product_name=:product_name, Product_price=:product_price, Product_discounted_price=:dprice, Product_weight=:weight, Product_description=:pdesc, Subcategory_id=:subcategory_id, Status_approve=:statusapproval WHERE Product_id=:product_id";

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
	$stmt->bindParam(':statusapproval', $statusapproval);

	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:product_list.php");
	} else {
		echo "Error";
	}

?>