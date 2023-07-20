
       


<div class="container">
  <div class="row">

   
    <div class="col-sm-4 co">
        
        <div class="pay-u1">
        <div class="table-responsive">
        <table class="table">
      
            <tbody>
              <h2 class="shipadd1">
                    SHIPPING &amp; BILLING DETAILS   

                </h2>
        
              <tr>
                <p class="adetail">Name   : <?= $shippingdetails->ship_name ?></p>
                <!--<td> Rs.<span class="my-cart-grand-total">560.00</span> </td>-->
              </tr>
            <hr>
              <tr>
                <p class="adetail">Address : <?= $shippingdetails->ship_address ?> </p>
                <p class="adetail"><?= $shippingdetails->ship_city ?>-<?= $shippingdetails->ship_pin ?> , <?= $shippingdetails->ship_state ?></p>
              </tr>
             <hr>              
              <tr class="tr-bdr">

                <p class="adetail">Mo. : <?= $shippingdetails->ship_mobile ?>  </p> 
                
              </tr>
            </tbody>
          
        </table>

      </div>

    </div>

    </div>
        <div class="col-sm-4 co">
        
        <div class="pay-u1">
        <div class="table-responsive">
        <table class="table">
      
            <tbody>
              <h2 class="shipadd1">
                    YOUR CART DETAILS      

                </h2>

              <tr>
                <center>
                      <div class="scrollbar">

              <?php $total=$totalweight=$shippingcharges=0; $msg="";
                foreach(json_decode($this->session->userdata('products')) as $products) {
                           $product=$this->m_products->getProduct($products->id);
                           if($product->discount)
                           {
                           $p_price=$product->price-($product->price * $product->discount / 100);
                           }else{
                           $p_price=$product->price;
                           }
                           $amount=round($products->quantity * $p_price);
                           $weight=($product->p_weight * $products->quantity);

                        
                        $totalweight+=$weight;
                        $total+=$amount;

                        
                      if($this->session->userdata('user_id'))
                      {
                        
                        $res=$this->m_address->getcurrentadress();
                       
                       $shippingcharges=$this->m_order->calculateshipingcharges($res->ship_pin,$totalweight);
                       
                        
                      }else{

                         $shippingcharges=500;
                      }

                           
                 ?>
                        <div class="col-md-12">
                          <div class="col-md-2 shipaddp">
                    <img src="<?= $products->image ?>">
                        </div>

                  <div class="col-md-10 shi31"> 
                    <p><?= $products->name?></p>
                    <p> Rs. <?php $amount=round($products->quantity * $p_price); echo number_format($amount, 2,'.', ''); ?></p>
                    <hr>
                  </div>
                </div>
                 
                  <?php } ?>
                   
                </div>
                </div>

                    <center>

              </tr>
              
            </tbody>
          
        </table>

      </div>

    </div>

    </div>

    <div class="col-sm-4 co">
        
        <div class="pay-u1">
        <div class="table-responsive">
        <table class="table">
      
            <tbody>
            	<h2 class="shipadd1">
                    Your Order Total				

                </h2>

              <tr>
                <td scope="row" class="st">Subitem Total</td>
                <td class="st">Rs.<span class="my-cart-grand-total"><?php echo number_format($total, 2,'.', ''); ?></span></td>
              </tr>
              <tr>
                <td scope="row">Shipping &amp; Handling</td>
                                <td><p><?= number_format($shippingcharges, 2,'.', '') ?></p></td>
                                </tr>
              <tr class="tr-bdr">
                <th scope="row">You Pay<br><span>(inclusive of all taxes)</span></th>
                <td><p>Rs.<span class="my-cart-grand-total">
                  <?=  number_format($total+$shippingcharges, 2,'.', '') ?>

                </span></p></td>
                
              </tr>
            </tbody>
          
        </table>

      </div>

    </div>

    </div>
  </div>
</div>


<div class="container">
  <div class="row">

    <!-- <div class="input-group"> -->
    	<div class="col-md-12 co">

  <div class="input-group-prepend" id="button-addon3">
  	<p>PAY WITH US</p>
  	<hr>
  	<div class="paynow">
    <form action="#">
     <input type="hidden" name="address" value="<?= $address_id ?>">
     <input type="hidden" name="user" value="<?= $user_id ?>">
     <input type="hidden" id="prev_url" value="<?= $url=getCurrentURL(); ?>">
   <button type="button" id="paybutton" class="btn signup">Make Payment - <?=  number_format($total+$shippingcharges, 2,'.', '') ?></button>
  </form>
</div>
  </div>
  <!-- </div> -->
</div>
</div>
</div>