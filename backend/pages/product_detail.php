<?php 

	include 'dbconnection/dbconnect.php';

	if(isset($_POST["Productid"])){  
		$output = '';  

		$sql = "SELECT p.*, subcat.* FROM products p, subcategories subcat WHERE p.Subcategory_id=subcat.Subcategory_id AND Product_id=:id";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $_POST["Productid"]);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$statusinfo='';
		$approvedbyinfo='';

		if ($data["Status_approve"]==0) {
            $statusinfo= 'Not Yet Approved';
        } else {
            $statusinfo= 'Approved'; }

        if ($data["Status_changed_by"]==NULL) {
            $approvedbyinfo= 'Not Available';
        } else {
            $approvedbyinfo= $data["Status_changed_by"]; }

		$output .= '  
		<div class="table-responsive">  
		<table class="table table-bordered"> 
		<tr>  
		<td width="30%" colspan="2" align="center"><h3>Product</h3></td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>CodeNo</h5></td>  
		<td width="70%">'.$data["Product_id"].'</td>  
		</tr>  
		<tr>  
		<td width="30%"><h5>Image</h5></td>  
		<td width="70%"><img src="'.$data['Product_image'].'" height="150" width="200" class="img-thumbnail" /></td>  
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
		<td width="30%"><h5>Price</h5></td>  
		<td width="70%">'.number_format($data["Product_price"], 2, '.', ',').' MMK</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Discounted Price</h5></td>  
		<td width="70%">'.number_format($data["Product_discounted_price"], 2, '.', ',').' MMK</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Weight</h5></td>  
		<td width="70%">'.$data["Product_weight"].' lb</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Description</h5></td>  
		<td width="70%">'.$data["Product_description"].'</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Status Approval</h5></td>  
		<td width="70%">'.$statusinfo.'</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Approved By</h5></td>  
		<td width="70%">'.$approvedbyinfo.'</td>  
		</tr>
		<tr>  
		<td width="30%" colspan="2" align="center"><h3>Subcategory</h3></td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Subcategory</h5></td>  
		<td width="70%">'.$data["Subcategory_name"].'</td>  
		</tr> 
		';  


		$sql = "SELECT products.*, variants.* FROM products INNER JOIN variants ON products.Product_id=variants.Product_id WHERE products.Product_id=:id";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $_POST["Productid"]);
		$stmt->execute();
		$vdatas = $stmt->fetchAll();


		$output .= '<tr>  
						<td width="30%" colspan="2" align="center"><h3>Variants</h3></td>  
						</tr>
						<tr>  
						<td width="30%" colspan="2" align="center"><h5>(CodeNo / Name)</h5></td>  
					</tr>';

		foreach ($vdatas as $vdata) {

			$output .= '<tr> 
						<td width="30%"><h6><strong>Variant Title:</strong> '.$vdata["Variant_id"].' / '.$vdata["Variant_name"].'</h6></td>
						<td width="70%">
					';


			$sql = "SELECT variants.*, variant_options.* FROM variants INNER JOIN variant_options ON variant_options.Variant_id=variants.Variant_id WHERE variant_options.Variant_id=:vid";

			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':vid', $vdata["Variant_id"]);
			$stmt->execute();
			$vodatas = $stmt->fetchAll();

			foreach ($vodatas as $vodata) {

				$output .= '<h6><strong>Variant Options Name:</strong> '.$vodata['Variant_option_id'].' / '.$vodata['Variant_option_name'].'</h6>';
			}


			$output .= '</td>
					</tr> ';
		}


		echo $output;  
	}

?>