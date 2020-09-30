<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_POST['Subcategory_id'];
	$image = $_FILES['Subcategory_image'];
	$name = $_POST['Subcategory_name'];
	$cateid = $_POST['Category_id'];

	$basepath = "../images/subcategories/";
	$fullpath = $basepath.$image['name'];
	move_uploaded_file($image['tmp_name'], $fullpath);

	$sql = "INSERT INTO subcategories (Subcategory_id, Subcategory_image, Subcategory_name, Category_id) VALUES (:subcategory_id, :subcategory_image, :subcategory_name, :category_id)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':subcategory_id', $id);
	$stmt->bindParam(':subcategory_image', $fullpath);
	$stmt->bindParam(':subcategory_name', $name);
	$stmt->bindParam(':category_id', $cateid);

	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:subcategory_list.php");
	} else {
		echo "Error";
	}

?>