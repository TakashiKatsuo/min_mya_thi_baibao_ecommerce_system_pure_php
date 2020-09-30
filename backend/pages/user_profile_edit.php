<?php 
	session_start();
	include 'dbconnection/dbconnect.php';

	$id = $_SESSION['user']['User_id'];
	$fullname = $_POST['Fullname'];
	$pho = $_POST['Phone_number'];
	$address = $_POST['Address'];

	$image = $_FILES['Photo'];
	$oldimage = $_POST['Photo_old_image'];

	if ($image['size']>0) {

		$basepath = "../images/users/";
		$fullpath = $basepath.$image['name'];
		move_uploaded_file($image['tmp_name'], $fullpath);
	} else {

		$fullpath = $oldimage;
	}

	$sql = "UPDATE users SET Photo=:photo, Fullname=:fullname, Phone_number=:pho, Address=:address WHERE User_id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->bindParam(":photo", $fullpath);
	$stmt->bindParam(":fullname", $fullname);
	$stmt->bindParam(":pho", $pho);
	$stmt->bindParam(":address", $address);

	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:auth_logout.php");
	} else {
		echo "Error";
	}

?>