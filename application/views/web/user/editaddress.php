	<div class="inner-header">
	<img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
	<h2>Shipping Address</h2>
 </div>

<div class="product-inner-section">
	<div class="container-fluid">
	
	
<div class="clearfix"></div>
	<div class="col-sm-6 col-sm-offset-3">
	
	<p class="add"></p>
	
	
	<div class="form-wrap-inner">
		<form id="addshiping"  action="<?= base_url()?>updatemyaddress/<?= $this->uri->segment(2) ?>" method="post">
      <div class="shippingadress">
      <p class="add">Update Shipping Address</p>
  <div class="form-group">
    <label for="firstname">Name:</label>
      <input type="text" class="form-control"  placeholder="akshay kumar"
                           name="ship_name" id="ship_name"
                           value="<?= $addressdetails->ship_name ?>">
  </div>
  
  <div class="form-group">
    <label for="inputContactNo:">Mobile:</label>
     <input type="number" class="form-control" id="ship_mobile" placeholder="3397238933"
                          name="ship_mobile" value="<?= $addressdetails->ship_mobile ?>">
  </div>
  
  <div class="form-group">
    <label for="ship_pin">Pincode</label>
                     
                          <input type="text" class="form-control" id="ship_pin" name="ship_pin"placeholder="422007" value="<?= $addressdetails->ship_pin ?>">
  </div>
  
    <div class="form-group">
    <label for="inputAddress">Address with Proper Landmark</label>
    <textarea class="form-control"  id="ship_address" name="ship_address" rows="3"><?= $addressdetails->ship_address ?></textarea>
  </div>

  <div class="form-group">
    <label for="inputcity:">City</label>
          <input type="text" class="form-control"   id="ship_city" name="ship_city" placeholder="eg. nashik" value="<?= $addressdetails->ship_city ?>">
  </div>
  
  
  <div class="form-group">
    <label for="inputstate:">State</label>
         <input type="text" class="form-control"  id="ship_state" name="ship_state" placeholder="eg. maharashtra" readonly="1" value="<?= $addressdetails->ship_state ?>">
  </div>
 
   <div class="form-group">
    <label for="inputcountry:">Country</label>
           <input type="text" class="form-control" id="ship_country"  name="ship_country"  placeholder="India" value="India" readonly="1">
  </div>

  </div>
  
  <button type="button" id="saveadress1" class="btn btn-default">Update</button>
</form>



</div>
</div>
	</div>
</div>
 <script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
   <script src="<?= base_url() ?>assets/web/js/ship.js"></script>
