<div class="inner-header">
	<img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
	<h2>Shipping Address</h2>
 </div>

<div class="product-inner-section">
  <div class="container-fluid">

    <?php if($adresses) { ?>
      <?php foreach($adresses as $val) { ?>

  <div class="col-sm-3">
    <div class="address-wrap">
      <p><strong>Name :</strong> <?= $val->ship_name ?></p>
      <p><strong>Address : </strong><?= $val->ship_address ?></p>
      <p><?= $val->ship_city ?>,<?= $val->ship_state ?> - <?= $val->ship_pin ?></p>
      <p><strong>Mobile : </strong><?= $val->ship_mobile ?></p>
      <hr>
      <div class="button-wrap">
       <?php  $id=$this->encrypt->encode($val->address_id);?>
      <a class="small-buton btn btn-default" href="<?= base_url()?>editmyaddress/<?= $id=strreplace_encode($id); ?>">Edit</a>
      <a class="small-buton btn btn-default confirm" href="<?= base_url()?>deletemyaddress/<?= $id=strreplace_encode($id); ?>">delete</a>
</div>
    </div>
  </div>
  
   <?php }  }?>

<?php   if(count($adresses) < 4){  ?>
<div class="clearfix"></div>
  <div class="col-sm-6">  
  <div class="form-wrap-inner">
    <form id="addshiping"  action="<?= base_url()?>addaddress" method="post">
  <div class="shippingadress">
  <p class="add">Add Shipping Address</p>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="firstname">Name:</label>
      <input type="text" class="form-control"  placeholder="akshay kumar"
                           name="ship_name" id="ship_name"
                           value="">
    </div>
  </div>
  <div class="clearfix"></div>
   <div class="form-group col-md-12">
      <label for="inputContactNo:">Mobile:</label>
     <input type="text" class="form-control" id="ship_mobile" placeholder="3397238933"
                          name="ship_mobile" value="">
    </div>
       <div class="clearfix"></div>

    <!-- <div class="form-group col-md-12">
      <label for="inputEmailId:">Email Id:</label>
          <input type="text" class="form-control" id="ship_email" placeholder="abc@gmail.com" name="ship_email" value="">
    </div> -->
     <div class="clearfix"></div>

     <div class="form-group col-md-12">
                        <label for="ship_pin">Pincode</label>
                     
                          <input type="text" class="form-control" id="ship_pin" name="ship_pin"placeholder="422007">
                     
                      </div>

  <div class="clearfix"></div>                    
  <div class="form-group">
     <div class="form-group col-md-12">
    <label for="inputAddress">Address with Proper Landmark</label>
    <textarea class="form-control"  id="ship_address" name="ship_address" rows="3"></textarea>
  </div>
  </div>
   <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputcity:">City</label>
          <input type="text" class="form-control"   id="ship_city" name="ship_city" placeholder="eg. nashik">
    </div>
    <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputstate:">State</label>
         <input type="text" class="form-control"  id="ship_state" name="ship_state" placeholder="eg. maharashtra" readonly="1">
    </div>
    <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputcountry:">Country</label>
           <input type="text" class="form-control" id="ship_country"  name="ship_country"  placeholder="India" value="India" readonly="1">
    </div>

<div class="clearfix"></div>
<hr>
</div>

<button type="button" id="saveadress1"  class="btn btn-default">Submit Address
</button> 
</form>

</div>
</div>
<?php }else{ ?>
<h4><b>Note</b> : Only  4 shipping Address You Will Add. </h4>
<?php }?>
  </div>
</div>
<script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
   <script src="<?= base_url() ?>assets/web/js/ship.js"></script>
