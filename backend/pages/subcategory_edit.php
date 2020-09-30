<?php 

	include 'dbconnection/dbconnect.php';

	$id = $_POST['Subcategory_id'];
	$name = $_POST['Subcategory_name'];
	$image = $_FILES['Subcategory_image'];
	$oldimage = $_POST['Subcategory_old_image'];
	$cateid = $_POST['Category_id'];

	if ($image['size']>0) {

		$basepath = "../images/subcategories/";
		$fullpath = $basepath.$image['name'];
		move_uploaded_file($image['tmp_name'], $fullpath);
	} else {

		$fullpath = $oldimage;
	}

	$sql = "UPDATE subcategories SET Subcategory_image=:subcategory_image, Subcategory_name=:subcategory_name, Category_id=:category_id WHERE Subcategory_id=:subcategory_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":subcategory_id", $id);
	$stmt->bindParam(":subcategory_name", $name);
	$stmt->bindParam(":subcategory_image", $fullpath);
	$stmt->bindParam(":category_id", $cateid);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:subcategory_list.php");
	} else {
		echo "Error";
	}

?>