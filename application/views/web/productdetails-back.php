<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/web/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/web/css/slick-theme.css">


<div class="descripition-blocks">
		<div class="container">
		
			
<div class="col-sm-4">
    <?php if(count($productImages) == 1) { ?>
          <div class="slider slider-for">
          <?php if($productImages) { foreach($productImages as $val) { ?>
          <div>
          <div class="slide-main-image">
           <img  class="p_image zoom" src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $val->name ?>"/>
          </div>
         </div>
          <?php } } ?>

        
          </div>
          <?php }else{ ?>  

             <div class="slider slider-for">
          <?php if($productImages) { foreach($productImages as $val) { ?>
          <div>
          <div class="slide-main-image">
           <img  class="p_image zoom" src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $val->name ?>"/>
          </div>
         </div>
          <?php } } ?>

        
          </div>

      <div class="slider slider-nav">
          <?php if($productImages) { foreach($productImages as $val) { ?>
                 <div>
          <div class="slide-main-image-t center-img">
            <img  class="p_image " src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $val->name ?>"/>
          </div>
        </div>
             <?php } } ?> 
       </div>

       <?php } ?>
      </div>


                <!--Carousel Wrapper-->
                <!--/.Carousel Wrapper-->
               

		<div class="p-details">
			<div class="col-sm-7 dit">
				
				<h4><?= $productdetails->p_name?></h4>
		       <?php if($productdetails->discount){

		        $dicountedprice=$productdetails->bottom_price-($productdetails->bottom_price * $productdetails->discount / 100);
                $yousave=($productdetails->bottom_price)-$dicountedprice; 
                $p_price=$productdetails->bottom_price;
                $discount=$productdetails->discount;

                 }else{

                    $p_price=$productdetails->bottom_price;

                 }

		       	?>

				<?php if($productdetails->discount) { ?>

						<h5 class="prices"><strong><span> Price:&nbsp;</span><i class="fa fa-inr" aria-hidden="true"></i></strong><?= $dicountedprice?> &nbsp;&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><strike><?= $p_price ?></strike></h5>
						<p>You Save <span>: <?= round($yousave) ?> (<?= $discount ?>%)</span></p>

			    <?php }else{ ?>
                       <h5 class="prices"><strong><span> Price:&nbsp;</span><i class="fa fa-inr" aria-hidden="true"></i></strong><?= $p_price ?></h5>
				<?php  } ?>

				 <!-- <p style="margin:0px;" id="viewcart"><a href="<?= base_url()?>cart">View cart</a> or <a href="">continue shopping</a></p> -->
				 
			        <input type="hidden" value="1" id="qty">
					<button class="btn btn-default my-cart-btn"
                   data-image="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $productdetails->name ?>"
			 	   data-pid="<?= $productdetails->id ?>" 
			 	   data-name="<?= $productdetails->p_name ?>" 
			 	   data-price="<?= $productdetails->bottom_price;?>">
			 	  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
			 	   Add to cart </button>
			 	  

			 	   <button class="add_to_wishlist"
			 	   data-pid="<?= $productdetails->id ?>" data-prev-url="<?= $url=getCurrentURL(); ?>">

			 	   <i class="fa fa-heart" aria-hidden="true"></i>
					Add to wish list</button>

                
			 		<div class="clearfix"></div>
                   <div class="techspec">

                   	<?= $productdetails->tech_spec ?>
				</div>
			
		</div>
		</div>
		     <br>
			<div class="clearfix"></div>
     <?php if($productvideo) { foreach($productvideo as $video) { ?>

   <video width="100%" height="350" controls>
   <source src="<?= base_url() ?>assets/ipanel/uploads/product_video/<?= $video->name ?>" type="video/mp4">
   </video>

   <?php } } ?>
   
		</div>
	</div>	

      
      
      
  <?php $relatedproduct=$this->m_products->getralated($productdetails->id,$productdetails->cat_id,$productdetails->sub_id1);
    /*echo "<pre>";
      print_r($relatedproduct);
    exit;*/
   if($relatedproduct){ ?>  
      
      
    <div class="slider-foot-wrap">
    <div class="container">
    
			<h4 class="prod-head-inner">People also searched for</h4>
       <div id="owl-demo-inner-1">

    <?php
            $dicountedprice=$yousave=0;
           $totalcount=count($relatedproduct); $i=1; $count=count($relatedproduct); foreach($relatedproduct as $val)   { 

           $dicountedprice=$val->bottom_price-($val->bottom_price * $val->discount / 100);
           $yousave=($val->bottom_price)-$dicountedprice; 
           $p_price=$val->bottom_price;
           $p_name=preg_replace('/[^A-Za-z0-9\-]/', '-',$val->p_name);
           $id=$this->encrypt->encode($val->id);
           $val->id=strreplace_encode($id);

                        ?>
        	<div class="item">
        
                            <div class="col-item">
                                <a href="<?= base_url() ?>product/<?= $val->id ?>/<?= $p_name ?>">
                                <div class="photo">
                                    <img src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $val->name ?>" class="img-responsive" alt="a">
                                </div>
                                <div class="info">
                                        <h5 class="thumb-head"><?= $val->p_name ?></h5>
                                         <?php if($val->discount) { ?>
                                              <h6 class="prices"><strong><i class="fa fa-inr" aria-hidden="true"></i></strong><?=  $dicountedprice ?>&nbsp;&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><strike><?=  $p_price ?> </strike></h6>
                                            <p>You Save <span>:<?=  $yousave ?>(<?= $val->discount ?>%)</span></p>
                                           <?php }else{ ?>
                                           <h5 class="price-text-color"><i class="fa fa-inr" aria-hidden="true"></i><?= $p_price ?></h5>
                                        <?php } ?>
                                 
                                                                         
                                  </div>
                                  </a>
                            </div>
                            
        	
        	</div>
       
          <?php } ?>
  
     
        </div>
        </div>
    </div>
    
  <?php } ?>






<script src="<?= base_url();?>assets/web/js/okzoom.js"></script>
<!-- <script src="<?= base_url();?>assets/web/js/xzoom.js"></script> -->
 <script>
$(function(){

      $('.zoom').okzoom({
  width: 100,
  height: 100,
  round: true,
  background: "#fff",
  backgroundRepeat: "repeat",
  shadow: "0 0 5px #000",
  border: "1px solid black"
});
 });

</script>


 <script src="<?= base_url();?>assets/web/js/slick.js" type="text/javascript" charset="utf-8">
  
 </script>

<script>
/*$(document).ready(function() {

  $(".slider-for .zoom").xzoom({tint: '#333', Xoffset: 5});
s
 

});*/

    $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  arrows: false,
  centerMode: true,
  focusOnSelect: true
});
  </script>
<script>

    $("#slide-menu li a").click(function(event){
      event.preventDefault();
      if($(this).next('ul').length){
        $(this).next().toggle('fast');
        $(this).next().css("margin-left", "10px");
        $(this).children('i:last-child').toggleClass('fa-caret-down fa-caret-left');
      }
    });
    
    
</script>



