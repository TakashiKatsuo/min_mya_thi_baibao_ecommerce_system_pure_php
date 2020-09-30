<?php 
	session_start();
	include 'backend/pages/dbconnection/dbconnect.php';
	include 'backend/pages/include/AutoID.php';

	$buyerid = $_SESSION['user']['User_id']; //Customer id Session
	
	$orderid = AutoID('orders','Order_id','ORD_',4);

	$_SESSION['orderinvoice'] = $orderid;

	date_default_timezone_set('Asia/Yangon'); //Aphaca Live Time
	$orderdate = date('Y-m-d');

	//PASS POST DATA WITH class element BY ADD TO CART JS SCRIPT WITH buy_now 
	$oaddress = $_POST['oaddress'];
	$ophono = $_POST['ophono'];
	$shippingid = $_POST['shippingid']; // Shipper ID from Shipment Type Radio Button
	$paymenttype = $_POST['paymenttype'];
	$creditcardno = $_POST['creditcardno'];
	$notes = $_POST['notes'];
	$total = $_POST['total'];
	$totaldiscount = $_POST['totaldiscount'];
	$totalweight = $_POST['totalweight'];
	$totalqty = $_POST['totalqty'];
	$shop_arr = $_POST['shop_arr']; // From Local Storage

	$paymentstatus= 0;
	if ($paymenttype=="Paywithcard") {
		$paymentstatus= 1;
	}
	$shipmentstatus = 0;
	$ordercancelstatus = 0;

	$sql = "INSERT INTO orders (Order_id, Order_date, Order_total_price_amount, Order_total_discount_amount, Order_total_weight_amount, Order_total_quantity_amount, O_address, O_phone_number, Notes, Payment_type, Payment_status, Credit_card_number, Shipment_status, Order_cancel_status, User_id, Shipping_id) VALUES (:order_id, :order_date, :order_totalprice, :order_totaldiscount, :order_totalweight, :order_totalquantity, :o_address, :o_phonenumber, :notes, :payment_type, :payment_status, :credit_cardno, :shipment_status, :order_cancelstatus, :buyer_id, :shipping_id)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':order_id', $orderid);
	$stmt->bindParam(':order_date', $orderdate);
	$stmt->bindParam(':order_totalprice', $total);
	$stmt->bindParam(':order_totaldiscount', $totaldiscount);
	$stmt->bindParam(':order_totalweight', $totalweight);
	$stmt->bindParam(':order_totalquantity', $totalqty);
	$stmt->bindParam(':o_address', $oaddress);
	$stmt->bindParam(':o_phonenumber', $ophono);
	$stmt->bindParam(':notes', $notes);
	$stmt->bindParam(':payment_type', $paymenttype);
	$stmt->bindParam(':payment_status', $paymentstatus);
	$stmt->bindParam(':credit_cardno', $creditcardno);
	$stmt->bindParam(':shipment_status', $shipmentstatus);
	$stmt->bindParam(':order_cancelstatus', $ordercancelstatus);
	$stmt->bindParam(':buyer_id', $buyerid);
	$stmt->bindParam(':shipping_id', $shippingid);
	$stmt->execute();

	if($stmt->rowCount()) {
		echo "OK";
	} else {
		echo "Error";
	}

	foreach ($shop_arr as $shop) {

		// From Local Storage
		$qty = $shop['qty']; 
		$productid = $shop['id'];
		$productvariant = $shop['productvariant'];
		$totalvariantoptionprice = $shop['totalvariantoptionprice'];
		$weight = $shop['weight']; 

		$sql = "INSERT INTO orderdetails (Order_id, Sub_quantity_amount, Product_id, Product_variant_option, Product_vop, Product_per_weight) VALUES (:order_id, :qty, :product_id, :product_variantoption, :totalvariantoptionprice, :subweight)";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':order_id', $orderid);
		$stmt->bindParam(':qty', $qty);
		$stmt->bindParam(':product_id', $productid);
		$stmt->bindParam(':product_variantoption', $productvariant);
		$stmt->bindParam(':totalvariantoptionprice', $totalvariantoptionprice);
		$stmt->bindParam(':subweight', $weight);
		$stmt->execute();

		if($stmt->rowCount()) {
			echo "OK";
		} else {
			echo "Error";
		}


	}


?>