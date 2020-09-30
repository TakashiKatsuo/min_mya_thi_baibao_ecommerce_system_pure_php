<?php 

	include 'dbconnection/dbconnect.php';

	if(isset($_POST["Variantid"])){  
		$output = '';  

		$sql = "SELECT v.*, p.* FROM variants v, products p WHERE v.Product_id=p.Product_id AND Variant_id=:id";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $_POST["Variantid"]);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$output .= '  
		<div class="table-responsive">  
		<table class="table table-bordered"> 
		<tr>  
		<td width="30%" colspan="2" align="center"><h3>Variant</h3></td>  
		</tr>  
		<tr>  
		<td width="30%"><h5>CodeNo</h5></td>  
		<td width="70%">'.$data["Variant_id"].'</td>  
		</tr>  
		<tr>  
		<td width="30%"><h5>Name</h5></td>  
		<td width="70%">'.$data["Variant_name"].'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Description</h5></td>  
		<td width="70%">'.$data["Variant_description"].'</td>  
		</tr> 
		<tr>  
		<td width="30%" colspan="2" align="center"><h3>Product</h3></td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Codeno</h5></td>  
		<td width="70%">'.$data["Product_id"].'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Brand</h5></td>  
		<td width="70%">'.$data["Product_brand"].'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Name</h5></td>  
		<td width="70%">'.$data["Product_name"].'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Image</h5></td>  
		<td width="70%"><img src="'.$data['Product_image'].'" height="150" width="200" class="img-thumbnail" /></td>  
		</tr> 
		';  
		echo $output;  
	}

?>