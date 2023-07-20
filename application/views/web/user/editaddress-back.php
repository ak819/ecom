<div class="clearfix"></div>

<div class="container">
  <div class="row">

<div class="clearfix"></div>
<br><br>
  <div class="size">
<form id="addshiping"  action="<?= base_url()?>updatemyaddress/<?= $this->uri->segment(2) ?>" method="post">
  <div class="shippingadress">
  <p class="add">Update Shipping Address</p>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="firstname">Name:</label>
      <input type="text" class="form-control"  placeholder="akshay kumar"
                           name="ship_name" id="ship_name"
                           value="<?= $addressdetails->ship_name ?>">
    </div>
  </div>
  <div class="clearfix"></div>
   <div class="form-group col-md-12">
      <label for="inputContactNo:">Mobile:</label>
     <input type="number" class="form-control" id="ship_mobile" placeholder="3397238933"
                          name="ship_mobile" value="<?= $addressdetails->ship_mobile ?>">
    </div>
       <div class="clearfix"></div>

    <!-- <div class="form-group col-md-12">
      <label for="inputEmailId:">Email Id:</label>
          <input type="text" class="form-control" id="ship_email" placeholder="abc@gmail.com" name="ship_email" value="">
    </div> -->
     <div class="clearfix"></div>

     <div class="form-group col-md-12">
                        <label for="ship_pin">Pincode</label>
                     
                          <input type="text" class="form-control" id="ship_pin" name="ship_pin"placeholder="422007" value="<?= $addressdetails->ship_pin ?>">
                     
                      </div>

  <div class="clearfix"></div>                    
  <div class="form-group">
     <div class="form-group col-md-12">
    <label for="inputAddress">Address with Proper Landmark</label>
    <textarea class="form-control"  id="ship_address" name="ship_address" rows="3"><?= $addressdetails->ship_address ?></textarea>
  </div>
  </div>
   <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputcity:">City</label>
          <input type="text" class="form-control"   id="ship_city" name="ship_city" placeholder="eg. nashik" value="<?= $addressdetails->ship_city ?>">
    </div>
    <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputstate:">State</label>
         <input type="text" class="form-control"  id="ship_state" name="ship_state" placeholder="eg. maharashtra" readonly="1" value="<?= $addressdetails->ship_state ?>">
    </div>
    <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputcountry:">Country</label>
           <input type="text" class="form-control" id="ship_country"  name="ship_country"  placeholder="India" value="India" readonly="1">
    </div>

      <!-- <div class="col-sm-12">
            <div class="form-check">
                  <input class="form-check-input billship" id="defaultCheck1" type="checkbox" value="1" name="billsameaship" checked="">
                  <label class="form-check-label" for="defaultCheck1">
                  Billing address same as shipping address
                  </label>
            </div>
      </div> -->
<div class="clearfix"></div>
<hr>
</div>
 <!--  <div class="billingadress">
  <p class="add">Add Billing Address</p>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="firstname">Name:</label>
         <input type="text" class="form-control" id="bill_name"  name="bill_name" placeholder="akshay kumar">
    </div>
  </div>
  <div class="clearfix"></div>
   <div class="form-group col-md-12">
      <label for="inputContactNo:">Contact No:</label>
      <input type="text" class="form-control" id="bill_mobile"  name="bill_mobile" placeholder="3397238933">
    </div>
       
     <div class="clearfix"></div>
  <div class="form-group">
     <div class="form-group col-md-12">
    <label for="inputAddress">Address with Proper Landmark</label>
   <textarea class="form-control"  id="bill_address" name="bill_address" rows="3"></textarea>s
  </div>
  </div>
   <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputcity:">City</label>
         <input type="text" class="form-control" id="bill_city" name="bill_city" placeholder="eg. nashik">
    </div>
    <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputstate:">State</label>
          <input type="text" class="form-control"  id="bill_state" name="bill_state" placeholder="eg. maharashtra">
    </div>
    <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputcountry:">Country</label>
           <input type="text" class="form-control" id="bill_country" name="bill_country"  placeholder="India" value="India" >
    </div>

    
<div class="clearfix"></div>

</div> -->

<button type="button" id="saveadress1" class="btn btn-defoult1" data-toggle="modal" data-target="#exampleModalLong">Update Address
</button> 
</form>
</div>
<!-- <div class="pric1">
          <p>Subtotal (1 item) : <i class="fa fa-inr" aria-hidden="true"></i> 34,999.00</p>
          <a href=""> Proceed To Pay</a>
        </div> -->
       <!--  <div class="col-sm-4">
        
        <div class="pay-u">
        <div class="table-responsive">
        <table class="table">
      
            <tbody>
              <tr>
                <td scope="row">Item Total</td>
                <td>Rs.<span class="my-cart-grand-total">3060.00</span></td>
              </tr>
              <tr>
                <td scope="row">Shipping &amp; Handling</td>
                              <td><p>Next Step</p></td>
                              </tr>
              <tr class="tr-bdr">
                <th scope="row">You Pay<br><span style="font-size: 14px; font-weight: 300;">(inclusive of all taxes)</span></th>
                <td><p>Rs.<span class="my-cart-grand-total">
                  3060.00

                </span></p></td>
                
              </tr>
            </tbody>
          
        </table>
      </div>
    </div>
    
    </div> -->
</div>
</div>


<!--  <div class="container">
  <div class="row">

    <div class="col-md-3">
        <h5 class="na">Akshay Akshay Akshay</h5>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Nashik, Maharashtra 422009</p>
        <a href="">Deliver to this address</a>
    </div>
 

    <div class="col-md-3">
        <h5 class="na">Akshay Akshay Akshay</h5>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Nashik, Maharashtra 422009</p>
        <a href="">Deliver to this address</a>
    </div>


    <div class="col-md-3">
        <h5 class="na">Akshay Akshay Akshay</h5>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Nashik, Maharashtra 422009</p>
        <a href="">Deliver to this address</a>
    </div>



    <div class="col-md-3">
        <h5 class="na">Akshay Akshay Akshay</h5>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <p>Nashik, Maharashtra 422009</p>
        <a href="">Deliver to this address</a>
    </div>


   

</div>
</div>
   -->
   <script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
   <script src="<?= base_url() ?>assets/web/js/ship.js"></script>