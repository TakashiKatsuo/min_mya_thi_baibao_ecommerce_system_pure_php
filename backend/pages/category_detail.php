<?php 

	include 'dbconnection/dbconnect.php';

	if(isset($_POST["Categoryid"])){  
		$output = '';  

		$sql = "SELECT * FROM categories WHERE Category_id=:id";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $_POST["Categoryid"]);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$output .= '  
		<div class="table-responsive">  
		<table class="table table-bordered"> 
		<tr>  
		<td width="30%" colspan="2" align="center"><h3>Category</h3></td>  
		</tr>  
		<tr>  
		<td width="30%"><h5>CodeNo</h5></td>  
		<td width="70%">'.$data["Category_id"].'</td>  
		</tr>  
		<tr>  
		<td width="30%"><h5>Image</h5></td>  
		<td width="70%"><img src="'.$data['Category_image'].'" height="150" width="200" class="img-thumbnail" /></td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Name</h5></td>  
		<td width="70%">'.$data["Category_name"].'</td>  
		</tr> 
		';  
		echo $output;  
	}

?>