
<div class="clearfix"></div>
<div class="inner-banner">
    <!--<img src="<?= base_url() ?>assets/web/images/inner-banner-1.jpg">-->
    <h2 class="inner-page-head">FEEDBACK </h2>
  </div>

<div class="clearfix"></div>





<div class="feedback-inner-p">
<div class="container">
  <div class="col-sm-6 col-sm-offset-3">
  <div class="feed">
  <form id="feedback" action="<?= base_url()?>submitfeedback" method="post">
<h4><center><?= ($this->session->flashdata('feedbackmsg'))? $this->session->flashdata('feedbackmsg') : " "  ?></center></h4>

    <div class="fields-top">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name.." value="<?php echo set_value('name'); ?>"/>
    <?php if(form_error('name')) {?>
   <label class="errormsg"><?php echo form_error('name'); ?></label>
   <?php } ?>
    </div>

 

    <div class="fields-top">
     <label for="mobile">Mobile No.</label>
    <input type="number" id="mobile" name="mobile" placeholder="Enter Mobile No.." value="<?php echo set_value('mobile'); ?>">
     <?php if(form_error('mobile')) {?>
   <label class="errormsg"><?php echo form_error('mobile'); ?></label>
   <?php } ?>
    </div>

    <div class="fields-top">
     <label for="product_details">Product details.</label>
    <input type="text" id="product_details" name="productdetails" placeholder="Enter Product details.." value="<?php echo set_value('productdetails'); ?>">
     <?php if(form_error('productdetails')) {?>
   <label class="errormsg"><?php echo form_error('productdetails'); ?></label>
   <?php } ?>
    </div>


    <div class="clearfix"></div>
    <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1"/>
    <label for="star1" title="text">1 star</label>
  </div>
  
 <div class="clearfix"></div>
    <div class="fields-top-address">
    <label for="message">Description</label>
    <textarea id="message" name="message" placeholder="Write feedback.." ><?php echo set_value('message'); ?></textarea>
     <?php if(form_error('message')) {?>
   <label class="errormsg"><?php echo form_error('message'); ?></label>
  
   <?php } ?>
    </div>

    <div class="fields-top-cont">
    <div data-type="image" class="g-recaptcha" data-sitekey="6LcmktcZAAAAAE8TjbtlfmOYhA8nn_PcrhONq2Mf"></div>
                          
                            <h4 id="error_msg" style="display:none;color:red;">Please Check it....</h4>
   </div>

</div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</div>
</div>
<script type="text/javascript">
 
$('form').on('submit', function(e) {
  if(grecaptcha.getResponse() == "") {
    e.preventDefault();
    $('#error_msg').css('display','block');
    
  } else {
    $('#error_msg').css('display','none');
    $('form').submit();
  }
});

</script>














  
   
    
    


</div>
</div>


</div>


<script src="<?= base_url() ?>assets/web/js/jqueryvalidate.js"></script>
<script src="<?= base_url() ?>assets/web/js/formvalidation.js"></script>