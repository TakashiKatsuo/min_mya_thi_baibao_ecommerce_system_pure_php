<?php 

	$servername="localhost";
	$dbname="baibao_db";
	$user="root";
	$pass="";

	$dsn="mysql:host=$servername;dbname=$dbname";
	$pdo = new PDO($dsn,$user,$pass);

	try{
		$conn=$pdo;

		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "Connection Succefully";
	}
	catch(PDOException $e){
		echo "Server Error".$e->getMessage();
	}

?>