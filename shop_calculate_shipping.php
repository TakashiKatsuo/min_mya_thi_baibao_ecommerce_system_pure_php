<?php 

  include 'backend/pages/dbconnection/dbconnect.php';

  $id = $_POST['Shippingid'];

  $output = '';  

  $sql = "SELECT * FROM shippings WHERE Shipping_id=:id";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $shipping = $stmt->fetch(PDO::FETCH_ASSOC);

  $peritemprice = $shipping['Per_item_price'];
  $perweightprice = $shipping['Per_weight_price'];

  $output .= '<hr>
              <h4>Shipping Costs</h4>
              <div class="detail">
                  <div class="details-title">
                      Per Qiantity Price: 
                  </div>
                  <div class="detail-amt discount-amt"><input type="text" name="Total_per_item_price" class="shippingcalctotalqty" readonly> MMK</div>
                  <div class="detail-title detail-total">Per Weight Price: </div>
                  <div class="detail-amt total-amt"><input type="text" name="Total_per_weight_price" class="shippingcalctotalweight" readonly> MMK</div>
              </div>';  
  echo $output; 



?>

<script type="text/javascript">

	$(document).ready(function(){

    shippingcalculates();

    function shippingcalculates() {

      var totalweight = $( ".totalweight" ).val();
      var totalqty = $( ".totalqty" ).val();

      var shippingcalctotalweight = (totalweight*<?= $perweightprice ?>).toFixed(2);
      var shippingcalctotalqty = (totalqty*<?= $peritemprice ?>).toFixed(2);

      $(".shippingcalctotalweight").val(shippingcalctotalweight);
      $(".shippingcalctotalqty").val(shippingcalctotalqty);
    }
  })

</script>