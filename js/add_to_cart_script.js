$(document).ready(function(){

	// $('#result').delay(10000).load(location.href);
	getData();
	count();

	$('.view_detail').click(function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var image = $(this).data('image');
		var price = $(this).data('price');
		var discountedprice = $(this).data('discountedprice');
		var weight = $(this).data('weight');
		var description = $(this).data('description');
		var productvariant = $(this).data('productvariant');
		var variantoptionid = $(this).data('variantoptionid');
		var totalvariantoptionprice = $(this).data('totalvariantoptionprice');
		var subcategory = $(this).data('subcategory');

		$(".pid").html("Product Brand: "+id);
		$(".pimg").attr('src',"backend/"+image);
		$(".pname").html("Product Brand: "+name);
		$(".pprice").html("Product Price: "+price);
		$(".pdiscountedprice").html("Product discountedprice: "+discountedprice);
		$(".pweight").html("Product weight: "+weight);
		$(".pdescription").html("Description: </br>"+description);
		$(".pvariant").html("Product Selected Variant: </br>"+productvariant);
		$(".voptionid").html("Product Selected Variant: </br>"+variantoptionid);
		$(".totalpvariantoptionprice").html("Product Selected Variant: </br>"+totalvariantoptionprice);
		$(".psubcategory").html("Product Subcategory: "+subcategory);

		$(".cart_data").data('id',$(this).data('id'));
		$(".cart_data").data('name',$(this).data('name'));
		$(".cart_data").data('image',$(this).data('image'));
		$(".cart_data").data('price',$(this).data('price'));
		$(".cart_data").data('discountedprice',$(this).data('discountedprice'));
		$(".cart_data").data('weight',$(this).data('weight'));
		$(".cart_data").data('description',$(this).data('description'));
		$(".cart_data").data('productvariant',$(this).data('productvariant'));
		$(".cart_data").data('variantoptionid',$(this).data('variantoptionid'));
		$(".cart_data").data('totalvariantoptionprice',$(this).data('totalvariantoptionprice'));
		$(".cart_data").data('subcategory',$(this).data('subcategory'));

		$('#product_detail').modal('show');

	});

	// Count
	function count(){
		var shopString = localStorage.getItem("Baibaoshop");
		if (shopString) {
			var shopArray = JSON.parse(shopString);
			if (shopArray!=0) {
				var count=shopArray.length;
				$("#item_count").attr('data-count',count);
			}else {
				$("#item_count").attr('data-count',0);	
			}

		}else {
			$("#item_count").attr('data-count',0);	
		}
	};


	// Add To Cart
	$(".addtocart").on('click',function(e){

		var item_qty=parseInt($('#qty').val());
		var id = $(this).data('id');
		var name = $(this).data('name');
		var image = $(this).data('image');
		var price = $(this).data('price');
		var discountedprice = $(this).data('discountedprice');
		var weight = $(this).data('weight');
		var description = $(this).data('description');
		var productvariant = $(this).data('productvariant');
		var variantoptionid = $(this).data('variantoptionid');
		var totalvariantoptionprice = $(this).data('totalvariantoptionprice');
		alert('Successfully Added "'+id+' / '+name+'" into Cart!');
		var qty=1;
		if (item_qty) {
			qty+=item_qty;

		}

		var shop_item = {
			id:id,
			name:name,
			price:price,
			discountedprice:discountedprice,
			weight:weight,
			description:description,
			productvariant:productvariant,
			variantoptionid:variantoptionid,
			totalvariantoptionprice:totalvariantoptionprice,
			image:image,
			qty:qty
		}

		var shopString = localStorage.getItem("Baibaoshop");
		var shopArray;
		if (shopString==null) {
			shopArray=Array();
		}else {
			shopArray=JSON.parse(shopString);
		}

		var status = false;
		$.each(shopArray,function(i,v){
			if (id==v.id && variantoptionid==v.variantoptionid) {
				// HERE DO CONDITION: IF THE PRODUCT VARIANT IS DIFFERENT BUT SAME PRODUCT ID (TRUTH! ADD IT TO CART LOCALSTORAGE)
					status = true;
					if (!item_qty) {
						v.qty++;
					}else{
						v.qty+=item_qty;
				}
			}
		})

		if (status==false) {
			shopArray.push(shop_item);

		}

		var shopData = JSON.stringify(shopArray);
		localStorage.setItem("Baibaoshop", shopData);
		
		// $.ajaxSetup ({
		// 	cache: false
		// });
		// var ajax_load = "<img src='http://automobiles.honda.com/images/current-offers/small-loading.gif' alt='loading...' />";

	 //    var loadUrl = window.location.href;
	 //    console.log(loadUrl);
	 //    $(this).load(loadUrl);
		// $('#product_detail').modal('hide');
		// $(".modal-backdrop").remove();


	 // location.reload();



		count();

	});

	// Show to Table Data
	function getData(){
		var shopString = localStorage.getItem("Baibaoshop");
		if (shopString) {
			var shopArray = JSON.parse(shopString);

			var html='';
			var html1='';
			var html2='';
			var html3='';

			var no=1;
			var total=0;
			var totaldiscount=0;
			var totalweight=0;
			var totalqty=0;

			$.each(shopArray,function(i,v){
				var name = v.name;
				var image = v.image;
				var description = v.description;
				var unit_price = v.price;
				var discountedprice = v.discountedprice;
				var weight = v.weight;
				var description = v.description;
				var productvariant = v.productvariant;
				var variantoptionid = v.variantoptionid;
				var totalvariantoptionprice = v.totalvariantoptionprice;
				var qty = v.qty;
				var discount = unit_price-discountedprice;

				if (productvariant=="") {
					productvariant="Default";
				}

				if (discountedprice) {
					var price_show=discountedprice+'<del> '+unit_price+'</del>';
					var price = discountedprice;
				}else{
					var price_show = unit_price;
					var price = unit_price;
				}

				// Checkout First Step Page
				html += `<div class="card ecommerce-card">
                            <div class="card-content">
                                <div class="item-img text-center">
                                    <img src="${ image.replace("../", "backend/") }" height="220" width="260" alt="img-placeholder">
                                </div>
                                <div class="card-body">
                                    <div class="item-name">
                                        Name: ${name} <br>
                                        Option Selected: ${productvariant} <br>
                                        Description: ${description}
                                        <span></span>
                                        <p class="item-company">By <span class="company-name">Seller Name & ID</span></p>
                                    </div> <br>
                                    <div class="item-quantity">
                                        <p class="quantity-title">Quantity</p>
                                        <button class="btn btn-primary btn-sm min" data-item_i="${i}"><i class="fa fa-minus"></i></button> ${qty} <button class="btn btn-primary btn-sm max" data-item_i="${i}"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                        </div>
                                        <div class="item-cost">
                                            <h6 class="item-price">
                                                ${price_show} MMK
                                            </h6>
                                            <p class="shipping">
                                                <i class="feather icon-shopping-cart"></i> Pre Price
                                            </p>
                                        </div>
                                        <div class="item-cost">
                                            <h6 class="item-price">
                                                ${(price*qty).toFixed(2)} MMK
                                            </h6>
                                            <p class="shipping">
                                                <i class="feather icon-shopping-cart"></i> Amount Price
                                            </p>
                                        </div>
                                        <div class="item-cost">
                                            <h6 class="item-price">
                                                ${(totalvariantoptionprice*qty).toFixed(2)} MMK
                                            </h6>
                                            <p class="shipping">
                                                <i class="feather icon-shopping-cart"></i> Additional Variant Amount Price
                                            </p>
                                        </div>
                                        <div class="item-cost">
                                            <h6 class="item-price">
                                                ${(weight*qty).toFixed(2)}
                                            </h6>
                                            <p class="shipping">
                                                <i class="feather icon-shopping-cart"></i> Weight Amount
                                            </p>
                                        </div>
                                    </div>
                                    <div class="wishlist remove-wishlist" data-item_i="${i}">
                                        <i class="feather icon-x align-middle"></i> Remove
                                    </div>
                                </div>
                            </div>
                        </div>`;

                // Checkout First Step Page
                html1 += `<div class="detail">
	                            <div class="detail-title">
	                                ${name} ( ${productvariant} ) Quantity: ${qty}
	                            </div>
	                            <div class="detail-amt">
	                                Amount Price: ${(price*qty).toFixed(2)} MMK
	                                <div class="detail-amt">
		                                Variant Option Price Amount: ${(totalvariantoptionprice*qty).toFixed(2)} MMK
		                            </div>
	                                <div class="detail-amt discount-amt">
		                                You Saved: Discount -${(discount*qty).toFixed(2)} MMK
		                            </div>
		                            <div class="detail-amt">
		                                Weight Amount: ${(weight*qty).toFixed(2)}
		                            </div>
	                            </div>
	                        </div>`;

	            // Checkout Final Step Page
	            html2 += `<div class="detail">
	                            <div class="details-title">
	                                ${name} (${price} MMK)
	                                <small>${productvariant}</small> 
	                            </div>
	                            <div class="detail-amt">
	                                <div class="detail-amt">
	                                	<strong>Variant Amount Price: +${(totalvariantoptionprice*qty).toFixed(2)} MMK</strong>
	                                </div>
	                                <div class="detail-amt">
	                                	<strong>Amount Price: ${(price*qty).toFixed(2)} MMK</strong>
	                                </div>
	                                <div class="detail-amt discount-amt">
	                                	<strong>Total Sub Discounts: -${(discount*qty).toFixed(2)} MMK</strong>
	                                </div>
	                                <strong>Total Sub Amount Price: ${((price*qty)+(totalvariantoptionprice*qty)).toFixed(2)} MMK</strong>
	                                <div class="detail-amt">
	                                	<small>Price of ${qty} items</small>
	                                </div>
	                            </div>
	                        </div>`;

				total += (price*qty)+(totalvariantoptionprice*qty);
				totaldiscount += discount*qty;
				totalweight += weight*qty;
				totalqty += qty;
			});

			// Checkout First Step Page
			html1 += `<hr>
	                    <div class="detail">
	                        <div class="detail-title detail-total">Total Amount Price</div>
	                        <div class="detail-amt total-amt">${(total).toFixed(2)} MMK</div>
	                    </div>
	                    <div class="detail">
	                        <div class="detail-title detail-total">Total Amount You Saved</div>
	                        <div class="detail-amt total-amt">${(totaldiscount).toFixed(2)} MMK</div>
	                    </div>
	                    <div class="detail">
	                        <div class="detail-title detail-total">Total Weight Amount</div>
	                        <div class="detail-amt total-amt">${(totalweight).toFixed(2)}</div>
	                    </div>`;

	        // Checkout Final Step Page
	        html2 += `<hr>
	        			<div class="detail">
	                        <div class="details-title">
	                            Amount Saved
	                        </div>
	                        <div class="detail-amt discount-amt">-${(totaldiscount).toFixed(2)} MMK</div>
	                        <div class="detail-title detail-total">Total</div>
	                        <div class="detail-amt total-amt">${(total).toFixed(2)} MMK</div>
	                    </div>`;

			$(".checkout-items").html(html);
			$(".checkoutsummary").html(html1);
			$(".finalcheckoutsummary").html(html2);
			$(".total").val(total);
			$(".totaldiscount").val(totaldiscount);
			$(".totalweight").val(totalweight);
			$(".totalqty").val(totalqty);
			
		}else{

			html='';
			$(".checkout-items").html(html);
			$(".checkoutsummary").html(html1);
			$(".finalcheckoutsummary").html(html2);
		}

		if (localStorage.getItem("Baibaoshop") === null) {
		  	
		  	// Checkout First Step Page
			html3 += `<button class="btn btn-primary btn-block">There is nothing in Cart!</button><br>
						<a href="index.php">Go Shop Now?</a>`;

			$(".disablecheckout").html(html3);
		} else {

			// Checkout First Step Page
			html3 += `<a href="shop_checkout_form.php" class="btn btn-primary btn-block place-order">PLACE ORDER</a>`;

			$(".disablecheckout").html(html3);
		}


	}



	$(".checkout-items").on('click','.max',function(){

		var item_i = $(this).data('item_i');

		var shopString = localStorage.getItem("Baibaoshop");
		if (shopString) {

			var shopArray = JSON.parse(shopString);

			$.each(shopArray,function(i,v){
				if (item_i==i) {
					v.qty++;
				}

			})

			var shopData=JSON.stringify(shopArray);
			localStorage.setItem("Baibaoshop",shopData);
			getData();
			count();

		}

	});

	$(".checkout-items").on('click','.min',function(){
		var item_i = $(this).data('item_i');

		var shopString = localStorage.getItem("Baibaoshop");
		if (shopString) {

			var shopArray = JSON.parse(shopString);

			$.each(shopArray,function(i,v){
				
				if (item_i==i) {
					v.qty--;
					if (v.qty==0) {
						shopArray.splice(item_i,1);
					}
				}

			})

			var shopData=JSON.stringify(shopArray);
			localStorage.setItem("Baibaoshop",shopData);
			getData();
			count();

		}

	})

	$(".checkout-items").on('click','.remove-wishlist',function(){
		var item_i = $(this).data('item_i');

		var shopString = localStorage.getItem("Baibaoshop");
		if (shopString) {

			var shopArray = JSON.parse(shopString);

			$.each(shopArray,function(i,v){

				if (item_i==i) {
					shopArray.splice(item_i,1);
				}

			})

			var shopData=JSON.stringify(shopArray);
			localStorage.setItem("Baibaoshop",shopData);
			getData();
			count();

		}

	})


	// For But Now
	$('.buy_now').on('click',function(){
		var oaddress = $('.O_address').val();
		var ophono = $('.O_phone_number').val();
		var shippingid = $('.Shipping_id').val();
		var paymenttype = $('.Payment_type').val();
		var creditcardno = $('.Credit_card_number').val();
		var notes = $('.Notes').val();
		var total = $('.total').val();
		var totaldiscount = $('.totaldiscount').val();
		var totalweight = $('.totalweight').val();
		var totalqty = $('.totalqty').val();

		var shopString = localStorage.getItem("Baibaoshop");
		if (shopString) {
			var shopArray = JSON.parse(shopString);

			$.post('shop_send_order.php',{
				shop_arr:shopArray,
				oaddress:oaddress,
				ophono:ophono,
				shippingid:shippingid,
				paymenttype:paymenttype,
				creditcardno:creditcardno,
				notes:notes,
				total:total,
				totaldiscount:totaldiscount,
				totalweight:totalweight,
				totalqty:totalqty},function(response){
				
				if (response) {
					alert("Order Success!");
					localStorage.clear();
					getData();
					location.href="shop_invoice_final_checkout.php"
				} else {
					alert("Error");
				}
			})

		}

	})


})