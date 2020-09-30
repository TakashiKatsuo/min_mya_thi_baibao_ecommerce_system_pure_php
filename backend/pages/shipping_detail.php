<?php 

	include 'dbconnection/dbconnect.php';

	if(isset($_POST["Shippingid"])){  
		$output = '';  

		$sql = "SELECT * FROM shippings WHERE Shipping_id=:id";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $_POST["Shippingid"]);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$statusinfo='';
		$statuschangedby='';

		if ($data["Status_approve"]==0) {
            $statusinfo= 'Not Yet Approved';
        } else {
            $statusinfo= 'Approved'; }

        if ($data["Status_changed_by"]==NULL) {
            $statuschangedby= '';
        } else {
            $statuschangedby= $data["Status_changed_by"]; }

		$output .= '  
		<div class="table-responsive">  
		<table class="table table-bordered"> 
		<tr>  
		<td width="30%" colspan="2" align="center"><h3>Shipping</h3></td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>CodeNo</h5></td>  
		<td width="70%">'.$data["Shipping_id"].'</td>  
		</tr>  
		<tr>  
		<td width="30%"><h5>Name</h5></td>  
		<td width="70%">'.$data["Shipping_name"].'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Per Order Price</h5></td>  
		<td width="70%">'.number_format($data["Per_order_price"], 2, '.', ',').' MMK</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Per Item Price</h5></td>  
		<td width="70%">'.number_format($data["Per_item_price"], 2, '.', ',').' MMK</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Per Weight Price</h5></td>  
		<td width="70%">'.number_format($data["Per_weight_price"], 2, '.', ',').' MMK</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Status Approve</h5></td>  
		<td width="70%">'.$statusinfo.'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Status Changed By</h5></td>  
		<td width="70%">'.$statuschangedby.'</td>  
		</tr> 
		';  
		echo $output;  
	}

?>