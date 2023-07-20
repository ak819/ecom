<div class="cart-wrap-inner">
<?php $cartproduct=json_decode($this->session->userdata('products'));
 
  


 if(empty(!$cartproduct)){ ?>
<div class="container">
    <div class="row">
  <div class="col-md-9">
	     
        <div class="shop">
            <p>Shopping Cart</p>
             <h5><?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');  }  ?></h5>
        </div>
<div class="clearfix"></div>
<hr>

 <?php $total=0;
                          foreach(json_decode($this->session->userdata('products')) as $products) {
                             
                           $product=$this->m_products->getprice($products->id);
                            if($product->discount)
                            {
                                $dicountedprice=$product->price-($product->price * $product->discount / 100);
                                $p_price=$dicountedprice;
                                $orignalprice=$product->price;
                                $discount=$product->discount;
                            }else{

                                $p_price=$product->price;
                            }

                           ?>
<div class="cartproduct" id="cart_<?= $products->id ?>">
		      <div class="col-md-3">
		          <div class="product-img-c">
			     <img src="<?= $products->image ?>">
			     </div>
		      </div>
    
<div class="col-md-7">
<div class="carted">
	<p><?= $products->name?></p>
   <!--  <div class="dropdown1">
        <div class="select">
            <span>Qty : </span>
            <i class="fa fa-chevron-left"></i>

        </div>
          
   
    </div> -->
    <div class="qty">
    <input class="form-control my-product-quantity"  type="number" value="<?= $products->quantity?>" min="1" data-id="<?= $products->id ?>" data-name="<?= $products->name ?>" data-price="<?= $p_price ?>" >
    </div>
    <div class="de">
         <p><a href="javascript:void(0);" data-id="<?= $products->id ?>" data-div="cart_<?= $products->id ?>"  class="my-product-remove"><i class="fa fa-trash" aria-hidden="true"></i></a></p>
    </div>

    </div>
        <div class="pric">
          <p> <i class="fa fa-inr" aria-hidden="true"></i><span  class="my-product-total"><?php $amount=round($products->quantity * $p_price); echo number_format($amount, 2,'.', ''); ?></span></p>
        </div>
    </div>
  </div>

<div class="clearfix"></div>
   <hr>
    <?php   $total+=$amount; }  ?>
   
</div>
<div class="col-md-3">
<div class="pric1 marg-tp">
          <p>Subtotal (<span class="my-cart-badge">1</span> item) : <i class="fa fa-inr" aria-hidden="true"></i> <span class="my-cart-grand-total"><?=  number_format($total, 2,'.', '') ?></span></p>
          <a href="javascript:void(0);" id="pro_to_buy" data-prev-url="<?= $url=getCurrentURL(); ?>"> Proceed To Buy</a>
        </div>
    </div>
</div>
</div>


<?php }else{  ?>


  <div class="empty-cart"> 
  <div class="container">

      <div class="cart-empty">
      <img src="<?= base_url()?>assets//web/img/shopping-cart.png">
      </div>
      <h3>Your Shopping Cart Is Empty</h3>
      <a class="btn btn-primary empty-btn" href="<?= base_url() ?>" role="button">Continue shopping..</a>
  </div>
</div>
<?php  } ?>


</div>
 