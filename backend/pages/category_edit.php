<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_POST['Category_id'];
	$name = $_POST['Category_name'];
	$image = $_FILES['Category_image'];
	$oldimage = $_POST['Category_old_image'];

	if ($image['size']>0) {

		$basepath = "../images/categories/";
		$fullpath = $basepath.$image['name'];
		move_uploaded_file($image['tmp_name'], $fullpath);
	} else {

		$fullpath = $oldimage;
	}

	$sql = "UPDATE categories SET Category_image=:category_image, Category_name=:category_name WHERE Category_id=:category_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":category_id", $id);
	$stmt->bindParam(":category_name", $name);
	$stmt->bindParam(":category_image", $fullpath);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:category_list.php");
	} else {
		echo "Error";
	}

?>