
<div class="clearfix"></div>

<div class="container">
  <div class="row">


 <?php if($adresses) { ?>
      <?php $i=1; foreach($adresses as $val) { ?>
        <?php  $id=$this->encrypt->encode($val->address_id);?>
    <div class="col-md-3">
      <div class="addr">
      <h5 class="na"><?= $val->ship_name ?></h5>
        <p class="address"><?= $val->ship_address ?></p>
        <p><?= $val->ship_city ?>,<?= $val->ship_state ?> - <?= $val->ship_pin ?></p>
        <p><?= $val->ship_mobile ?></p>

        <hr>
       
        <!--  <button type="button" class="doship" data-ref="ship<?=$i?>">Deliver to this address</button> -->
        <a class="big-butt" href="<?= base_url()?>delivertoaddress/<?= $id=strreplace_encode($id); ?>">Deliver to this address</a>
   
        </form>
       
  
<div class="button-wrap">

          <a class="small-buton btn btn-default" 
          href="<?= base_url()?>editaddress/<?= $id=strreplace_encode($id); ?>">Edit</a>
       

          <a class="small-buton btn btn-default" 
          href="<?= base_url()?>deleteaddress/<?= $id=strreplace_encode($id); ?>">delete</a>
</div>
    
    </div>
  </div>
 <?php $i++; }  }?>

<div class="clearfix"></div>
<br><br>

<?php   if(count($adresses) < 4){  ?>

  <div class="size">
<form id="addshiping"  action="<?= base_url()?>addshipping" method="post">
  <div class="shippingadress">
  <p class="add">Add Shipping Address</p>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="firstname">Name:</label>
      <input type="text" class="form-control"  placeholder="akshay kumar"
                           name="ship_name" id="ship_name"
                           value="<?php echo set_value('ship_name'); ?>">
        <?php if(form_error('ship_name')) {?>
   <label class="errormsg"><?php echo form_error('ship_name'); ?></label>
   <?php } ?>
    </div>
  </div>
  <div class="clearfix"></div>
   <div class="form-group col-md-12">
      <label for="inputContactNo:">Mobile:</label>
     <input type="text" class="form-control" id="ship_mobile" placeholder="3397238933"
                          name="ship_mobile" value="<?php echo set_value('ship_mobile'); ?>">
          <?php if(form_error('ship_mobile')) {?>
   <label class="errormsg"><?php echo form_error('ship_mobile'); ?></label>
   <?php } ?>
    </div>
       <div class="clearfix"></div>

    <!-- <div class="form-group col-md-12">
      <label for="inputEmailId:">Email Id:</label>
          <input type="text" class="form-control" id="ship_email" placeholder="abc@gmail.com" name="ship_email" value="">
    </div> -->
     <div class="clearfix"></div>

     <div class="form-group col-md-12">
                        <label for="ship_pin">Pincode</label>
                     
                          <input type="text" class="form-control" id="ship_pin" name="ship_pin"placeholder="422007" value="<?php echo set_value('ship_pin'); ?>">
                            <?php if(form_error('ship_pin')) {?>
   <label class="errormsg"><?php echo form_error('ship_pin'); ?></label>
   <?php } ?>
                     
                      </div>

  <div class="clearfix"></div>                    
  <div class="form-group">
     <div class="form-group col-md-12">
    <label for="inputAddress">Address with Proper Landmark</label>
    <textarea class="form-control"  id="ship_address" name="ship_address" rows="3"><?php echo set_value('ship_address'); ?></textarea>
      <?php if(form_error('ship_address')) {?>
   <label class="errormsg"><?php echo form_error('ship_address'); ?></label>
   <?php } ?>
  </div>
  </div>
   <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputcity:">City</label>
          <input type="text" class="form-control"   id="ship_city" name="ship_city" placeholder="eg. nashik" value="<?php echo set_value('ship_city'); ?>">
            <?php if(form_error('ship_city')) {?>
   <label class="errormsg"><?php echo form_error('ship_city'); ?></label>
   <?php } ?>
    </div>
    <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputstate:">State</label>
         <input type="text" class="form-control"  id="ship_state" name="ship_state" placeholder="eg. maharashtra" readonly="1" value="<?php echo set_value('ship_state'); ?>">
           <?php if(form_error('ship_state')) {?>
   <label class="errormsg"><?php echo form_error('ship_state'); ?></label>
   <?php } ?>
    </div>
    <div class="clearfix"></div>

    <div class="form-group col-md-12">
      <label for="inputcountry:">Country</label>
           <input type="text" class="form-control" id="ship_country"  name="ship_country"  placeholder="India" value="India" readonly="1">
    </div>


<div class="clearfix"></div>
<hr>
</div>


<button type="button" id="saveadress1" class="btn btn-defoult1" data-toggle="modal" data-target="#exampleModalLong">Submit Address
</button> 
</form>
</div>
<?php  } ?>
</div>
</div>


   <script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
   <script src="<?= base_url() ?>assets/web/js/ship.js"></script>