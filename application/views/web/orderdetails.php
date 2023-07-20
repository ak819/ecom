<div class="top-banner-wrap"><div class="container"><h3>Shipping &amp; billing address</h3></div></div>
<?php if(empty(!$orderdetails)){ ?>

<div class="order-det-wrap">
	<div class="container">
		<div class="row row row justify-content-md-center">
			<div class="col-sm-12">
				<div class="invoice-wrap">
				<div class="order-table">
					<div class="id-date-wrap">
						
 <table class="table table-borderless">
  <thead>
    <tr class="oid back-tb-clr">
      <th>Order id : #<?= $orderdetails->id ?></th>
      <th>Payment id : <?= $orderdetails->txn_id ?></th>
      <th>Date : <?= date('d-m-Y',strtotime($orderdetails->order_date)) ?></th>
    </tr>
  </thead>
  </table>
<table class="table table-borderless">
  <tbody>
    <tr>
      <td>
      	<h5>Shipping Address</h5>
      	<p><strong>Name :</strong>  <?= $orderdetails->ship_name ?></p>
      	<p><strong>Address:</strong> <?= $orderdetails->ship_address ?>,<?= $orderdetails->ship_pin ?>,<?= $orderdetails->ship_city ?>,<?= $orderdetails->ship_state ?>,India</p>
        <p><strong>Email :</strong>  <?= $orderdetails->ship_email ?></p>
      	<p><strong>Mobile :</strong> <?= $orderdetails->ship_mob ?></p>
      </td>
      <td class="ba">
      	<h5>Billing Address</h5>
      	<p><strong>Name :</strong> <?= $orderdetails->ship_name ?></p>
      	<p><strong>Address:</strong><?= $orderdetails->ship_address ?>,<?= $orderdetails->ship_pin ?>,<?= $orderdetails->ship_city ?>,<?= $orderdetails->ship_state ?>,India</p>
        <p><strong>Email :</strong> <?= $orderdetails->ship_email ?></p>
      	<p><strong>Mobile :</strong><?= $orderdetails->ship_mob ?></p>
      </td>
    </tr>
  </tbody>
</table>
					</div>
				</div>

<div class="price-table-inner">
	
  <table class="table table-borderless">
  <thead >
    <tr class="back-tb-clr">
      <th scope="col">Product</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
   <tbody>
    <?php  $total_amount=0; foreach($product_list as $val) { ?>
    <tr class="btm-bdr-tr">
      <th scope="row">
      	<div class="products-invoice-table">
      		<img src="<?= $val->product_image ?>">
      	</div>
      </th>
       <td><?= $val->product_name ?></td>
      <td><?= $val->product_qty ?></td>
      <?php if($val->discount) { $dicountedprice=$val->price-($val->price * $val->discount / 100);?>
      <td><?=  number_format($dicountedprice, 2,'.', '') ?> <span class="dis"><?= $val->price ?></span> <span class="dis1">(<?= $val->discount ?>%) </span></td>
      <?php }else{ ?>
        <td><?=  number_format($val->price, 2,'.', '') ?>
      <?php } ?>
      <td><?=  number_format($val->total_price, 2,'.', '') ?></td>
    </tr>
  

   <?php $total_amount+=$val->total_price; } ?>
   
    <tr>
   	<td></td>
     <th>&nbsp;</th>
     <td>&nbsp;</td>
      
      <th>Total amount</th>
      <td>&nbsp;<?=  number_format($total_amount, 2,'.', '') ?></td>
    </tr>
   <tr>
   	<td></td>
     <th>Payment status</th>
      <td> <?= $orderdetails->payment_status ?></td>
      
      <th>Shipping</th>
  
        <?php $shipingcharges=$orderdetails->shipping_charge; ?>
      <td>+ <?=  number_format($shipingcharges, 2,'.', '') ?></td>
    
    </tr>

    <?php if($orderdetails->coupndiscount){  ?>
    <tr >
    <td></td>
     <th></th>
     <td></td>
      
      <th>Coupon discount</th>
  
      <td>- <?=  number_format($orderdetails->coupndiscount, 2,'.', '') ?></td>
    </tr>

    <?php } ?>

    <tr>
    <td></td>
      <th>Paid amount</th>
      <td><?= number_format($orderdetails->payed_amount, 2,'.', '') ?></td>
      <th>Final Total</th>
      <td>&nbsp;<?=  number_format($total_amount+$shipingcharges-$orderdetails->coupndiscount, 2,'.', '') ?></td>
    </tr>


  </tbody>
</table>

</div>


			</div>
		</div>
		</div>
	</div>
</div>


<?php }else { ?>

  <div class="empty-cart">
  
  <div class="container">
  
   
   <h4><b><b></h4>
     
      <h3>No Details to View</h3>

     
  </div>
</div>





<?php } ?>






