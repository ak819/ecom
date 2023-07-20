<div class="inner-header">
	<img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
	<h2>Wishlist</h2>
 </div>
<?php if(empty(!$wishlist)){ ?>
<div class="wishlist-wrap">
	<div class="container">
		
       <?php foreach($wishlist as $val) { 
    $dicountedprice=$val->bottom_price-($val->bottom_price * $val->discount / 100);
    $yousave=($val->bottom_price)-$dicountedprice;
      $id=$this->encrypt->encode($val->id);
      $val->id=strreplace_encode($id);

    ?>        

		<div class="col-sm-3">
			<div class="product-inner">
				<div class="todays-item-wrap"><img src="images/agriculture1.jpg"></div>
				<div class="todays-item-txt">
					
					<div class="desc">
					    <h3>Fertilizers</h3>
					    <i class="fa fa-inr" aria-hidden="true"></i> 3570 <span><i class="fa fa-inr" aria-hidden="true" style="text-decoration: line-through; font-size: 13px;"></i><strike>  5950  </strike></span>
					</div>
					
					<div class="clearfix"></div>
					<a class="btn btn-primary today-deal" href="#" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
				</div>
			</div>
			</div>
		
		
   <?php } ?>


		
	</div>
</div>

<?php }else{  ?>
<div class="yourorder">
	<div class="container">
		<div class="row">

<div class="empty-cart"> 
  <div class="container">

      <div class="cart-empty">
        <img src="<?= base_url()?>assets/web/images/empty-cart.png">
      </div>
      <h3>Not Items Found.</h3>
      <a class="btn btn-primary empty-btn" href="<?= base_url()?>" role="button">Continue shopping..</a>
  </div>
  </div>

		</div>
	</div>
</div>
<?php } ?>