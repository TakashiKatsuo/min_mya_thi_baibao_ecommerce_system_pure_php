<?php 
	include 'dbconnection/dbconnect.php';

	$id = $_POST['Category_id'];
	$image = $_FILES['Category_image'];
	$name = $_POST['Category_name'];

	$basepath = "../images/categories/";
	$fullpath = $basepath.$image['name'];
	move_uploaded_file($image['tmp_name'], $fullpath);

	$sql = "INSERT INTO categories (Category_id, Category_image, Category_name) VALUES (:category_id, :category_image, :category_name)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':category_id', $id);
	$stmt->bindParam(':category_image', $fullpath);
	$stmt->bindParam(':category_name', $name);

	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:category_list.php");
	} else {
		echo "Error";
	}

?>