<div class="inner-header">
	<img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
	<h2>Products details</h2>
 </div>

<div class="product-inner-section">
	<div class="container">
		
		<div class="col-sm-4">
          <?php if(count($productImages) == 1) { ?>
             <div class="slider slider-for">
             <?php if($productImages) { foreach($productImages as $val) { ?>
				<div>
					<div class="prod-main-img">
						<img class="p_image zoom" src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $val->name ?>">
					</div>
				</div>
				<?php } } ?>
				</div>
           <?php }else{ ?>  
			<div class="slider slider-for">
				<?php if($productImages) { foreach($productImages as $val) { ?>
				<div>
					<div class="prod-main-img">
						<img class="p_image zoom" src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $val->name ?>">
					</div>
				</div>
				 <?php } } ?>
			</div>

			<div class="slider slider-nav">
				 <?php if($productImages) { foreach($productImages as $val) { ?>
				<div>
					<div class="prod-thumb-img">
						<img src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $val->name ?>">
					</div>
				</div>
				 <?php } } ?> 
			
			
			</div>
			<?php } ?>
		</div>
			<div class="col-sm-7 col-sm-offset-1">
		    <h2 class="product-details-box"><?= $productdetails->p_name?> </h2>
		    
		   
            
            <h4><strong>Company / Manufacture</strong> : <?= $productdetails->brand_name?></h4>
            
            <hr>
              <?php if($pack_details->discount){

		        $dicountedprice=$pack_details->price-($pack_details->price * $pack_details->discount / 100);
                $yousave=($pack_details->price)-$dicountedprice; 
                $p_price=$pack_details->price;
                $discount=$pack_details->discount;
                $pack_price=$dicountedprice;
                 }else{

                    $p_price=$pack_details->price;
                    $pack_price=$pack_details->price;
                 }

		       	?>
             <?php if($pack_details->discount){ ?>
             	<div class="p_pricing" id="pricing">
            <ul class="price-lst">
                <li>M.R.P.:  <span class="main-price"><?= number_format($p_price,2)?></span></li>
                <li>Price:  <sapn class="original-price"><?= number_format($dicountedprice,2)?></sapn> <!-- span class="delivery-cls">FREE Delivery!</span> --></li>
                <li>You Save:  <span class="disc-1"><?= number_format(round($yousave),2)?></span></li>
                <li>Discount:  <span class="disc-1"><?= $discount ?>%</span></li>
            </ul>
             <?php }else{ ?>
                 <ul class="price-lst">
                
                <li>Price:  <sapn class="original-price"><?= number_format($p_price,2)?></sapn> <!-- span class="delivery-cls">FREE Delivery!</span> --></li>
                
                 </ul>
             <?php } ?>
            <hr>
            <div class="spinner-wrap">
              <label for="spinner">Order Qty:</label>
              <input id="spinner" name="value" min="1" value="1">
            </div>
		
			<button class="btn btn-primary today-deal add-cartt my-cart-btn"
                   data-image="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $productdetails->name ?>"
			 	   data-pid="<?= $productdetails->id ?>"
			 	   data-packid="<?= $pack_details->encrpt_id ?>"
			 	   data-name="<?= $productdetails->p_name ?>(<?= $pack_details->name ?>)"
			 	   data-price="<?= $pack_price;?>">
			 	  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
			 	   Add to cart 
			</button>
			<p class="wishlst"><i class="fa fa-heart" aria-hidden="true"></i><a href="javascript:void(0)" class="add_to_wishlist"  data-pid="<?= $productdetails->id ?>"
			 	   data-packid="<?= $pack_details->encrpt_id ?>" >Add to Wishlist</a></p>
             </div>
            
			<div class="clearfix"></div>
			<div class="units-wrap">
			<h4><strong>Units</h4>
			<ul class="units-list">

				<?php $i=1; foreach ($packs as $key => $value) {

				$id=$this->encrypt->encode(strreplace_encode($value->id));
                 if($value->discount)
                 {
                 	 $value->price=$value->price-($value->price * $value->discount / 100);
                 }
				 ?>
				<li class="packs <?= ($value->id==$pack_details->id)? "active-units" : ""?>" id="Pack_<?= $i ?>" data-pid="<?= $productdetails->id ?>"  data-id="<?= $id?>">

				<a href="javascript:void(0)">
					<div class="unit-text-cls" ><?=  $value->name ?></div>
					<!-- <div class="product-notes-cls">500 ml x 2 Qty</div> -->
					<div class="sell-price-cls"><i class="fa fa-inr"></i><?= number_format($value->price,2)?></div>
				</a>
				</li>
				<?php $i++; } ?>
		
			</ul>
			</div>
			<div class="clearfix"></div>
            <!-- <ul class="taxes-list">
            <li>Inclusive of all taxes</li>
            <li>Pay online and get 2% of the order value or 30 Rs Cash Discount (Whichever is higher) </li>
            <li>Please call us on 9016762260 for bulk quantity order</li>
            </ul> -->
            <?php if($productdetails->tech_spec){ ?>
            <div class="desc-head">
            <h3>Descriptions</h3>
            <?= $productdetails->tech_spec ?>
            </div>
            <?php } ?>
		</div>
		
		
	</div>
</div>


<?php $relatedproduct=$this->m_products->getralated($productdetails->id,$productdetails->cat_id,$productdetails->sub_id1,$productdetails->sub_id2); 
    /*echo "<pre>";
      print_r($relatedproduct);
      exit;*/

?>
 <?php if($relatedproduct){ ?>
	<div class="todays-deal">
	<div class="container">
	<h3 class="heading-one">People also searched for <span></span></h3>
	<div class="slider-wrap">
		<div id="owl-demo-inner" class="owl4">
        
    <?php

  

            $dicountedprice=$yousave=0;
           $totalcount=count($relatedproduct); $i=1; $count=count($relatedproduct); foreach($relatedproduct as $val)   { 
                 $image=base_url().'assets/ipanel/uploads/product_img/'.$val->name;
           $dicountedprice=$val->price-($val->price * $val->discount / 100);
           $yousave=($val->price)-$dicountedprice; 
           $p_price=$val->price;
           $p_name=preg_replace('/[^A-Za-z0-9\-]/', '-',$val->p_name);
           $pack=$this->encrypt->encode($val->id);
           $val->id=strreplace_encode($pack);
           $p_id=$this->encrypt->encode($val->p_id);
           $val->p_id=strreplace_encode($p_id);

                        ?>

        	 	<div class="item">
				<div class="deal-wrap">
					<?php if($val->discount){ ?>
			<div class="todays-item-wrap">
				<img src="<?= $image?>">
				<span class="discount"><?= $val->discount ?>%</span>
			</div>
					<div class="todays-item-txt">
					<p><?= $val->p_name ?></p>
	<p class="price-1"><span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span><?= $val->price ?> &nbsp; - &nbsp; 
	<span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span><span class="strik"><?= $dicountedprice ?></span></p>
				
					<div class="clearfix"></div>
					<span class="product-discount">Your Save : <i class="fa fa-inr" aria-hidden="true"></i><?= $yousave ?></span>
				</div>
			<?php }else{ ?>

				<div class="todays-item-wrap">
				<img src="<?= $image?>">
				
			</div>
					<div class="todays-item-txt">
					<p><?= $val->p_name ?></p>
	<p class="price-1"><span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span><?= $val->price ?>
				
					<div class="clearfix"></div>
		
				</div>



			<?php } ?>	


					<a class="btn btn-primary today-deal todays-item-btn-abs" href="<?= base_url()?>moredetails/<?= $val->p_id?>/<?= $val->id?>/<?=  $p_name?>" role="button"> more details..</a>
				
				</div>
			</div>
			 <?php } ?>

		</div>
		</div>
	</div>
</div>
 <?php } ?>
<script>
  $( function() {
    var spinner = $( "#spinner" ).spinner();

  } );
  </script>


<script src="<?= base_url()?>assets/web/js/product.js">