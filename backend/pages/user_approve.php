<?php 

	session_start();
	include 'dbconnection/dbconnect.php';

	$id = $_SESSION['user']['User_id'];
	$userid = $_GET['userid'];

	$approve = 1;

	$sql = "UPDATE users SET User_approval=:userapproval, Status_changed_by=:statuschangedby WHERE User_id=:userid";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":userid", $userid);
	$stmt->bindParam(":userapproval", $approve);
	$stmt->bindParam(":statuschangedby", $id);
	$stmt->execute();

	if($stmt->rowCount()) {
		header("location:user_list.php");
	} else {
		echo "Error";
	}

?>