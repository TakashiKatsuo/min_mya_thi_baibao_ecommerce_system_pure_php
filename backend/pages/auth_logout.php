<?php 
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['orderinvoice']);
	header("location:auth_login_form.php");
?>