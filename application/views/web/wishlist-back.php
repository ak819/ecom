



<div class="top-banner-wrap"><div class="container"><h3>Wish list</h3></div></div>
<?php if(empty(!$wishlist)){ ?>
<div class="wishlist-inner">
	<div class="container">
		<div class="row">
		 
		       
		    
         <div class="shop">
            
            <h5> <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); }  ?></h5>
          </div>
          <div class="clearfix"></div>
  

 <?php foreach($wishlist as $val) { 
    $dicountedprice=$val->bottom_price-($val->bottom_price * $val->discount / 100);
    $yousave=($val->bottom_price)-$dicountedprice;
      $id=$this->encrypt->encode($val->id);
      $val->id=strreplace_encode($id);

    ?>           
<div class="col-sm-3">
<div class="owl-item"><div class="item">

    <div class="prodcut-wrp">
       <a href="<?= base_url() ?>deletewish/<?= $val->id?>" class="deletewishlist"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
     <div class="wish-product-pic"><img src="<?= base_url()?>assets/ipanel/uploads/product_img/<?= $val->name?>">
   <div class="clearfix"></div></div>
	<div class="text-wrap-wish"><h4><?= $val->p_name ?></h4>
        
        <?php  if($val->discount){ ?>
     <div class="desc"><i class="fa fa-inr" aria-hidden="true"></i> <?= $dicountedprice?> <span><i class="fa fa-inr" aria-hidden="true" style="text-decoration: line-through; font-size: 13px;"></i><strike>  <?= $val->bottom_price ?>  </strike></span></div>
     <p class="yousave">You Save : <i class="fa fa-inr" aria-hidden="true"><?= $yousave ?>(<?= $val->discount ?>%)</i></p>

        <?php }else{  ?>
       <div class="desc"><i class="fa fa-inr" aria-hidden="true"></i> <?= $val->bottom_price ?></span></div>
        <?php  } ?>

     <a class="btn btn-primary buy-now-btn" href="#" role="button">Add to Cart</a>
     </div>
     </div>
     </div>
 </div>
 </div>	
<?php } ?>


</div>
</div>
</div>

<?php }else{  ?>

  <div class="empty-cart"> 
  <div class="container">

      <div class="cart-empty">
      <img src="<?= base_url()?>assets//web/img/basic1-136_heart_favorite_list-512.png">
      </div>
      <h3>Your Wishlist Is Empty</h3>
      <a class="btn btn-primary empty-btn" href="<?= base_url() ?>" role="button">Continue shopping..</a>
  </div>
  </div>
<?php } ?>