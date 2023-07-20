
<h2 class="inner-page-head">Contact with us</h2>
<div class="feedback-inner-p">
<div class="container">
  <div class="col-sm-6 col-sm-offset-3">
  <form action="<?= base_url()?>welcome/contactus" method="post">

    <div class="fields-top-cont">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo set_value('name'); ?>" required>
       <?php if(form_error('name')) {?>
   <label class="errormsg"><?php echo form_error('name'); ?></label>
   <?php } ?>
    </div>

   <div class="fields-top-cont">
      <label for="mobile">Mobile:</label>
      <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" required>
        <?php if(form_error('mobile')) {?>
   <label class="errormsg"><?php echo form_error('mobile'); ?></label>
   <?php } ?>
    </div>


    <div class="fields-top-cont">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  value="<?php echo set_value('email'); ?>" required>
       <?php if(form_error('email')) {?>
   <label class="errormsg"><?php echo form_error('email'); ?></label>
   <?php } ?>
    </div>
    <div class="fields-top-cont">
      <label for="mess">Message:</label>
      <textarea class="form-control" id="mess" placeholder="Enter message" name="message" required><?php echo set_value('message'); ?></textarea>
        <?php if(form_error('message')) {?>
   <label class="errormsg"><?php echo form_error('message'); ?></label>
  
   <?php } ?>
    </div>
    <br>
   <div class="fields-top-cont">
    <div data-type="image" class="g-recaptcha" data-sitekey="6LcmktcZAAAAAE8TjbtlfmOYhA8nn_PcrhONq2Mf"></div>
                          
                            <h4 id="error_msg" style="display:none;color:red;">Please Check it....</h4>
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

<?php $msg=$this->session->flashdata('msg'); if($msg) { ?>
<script>
 

    $(document).ready(function(){
    var msg="<?= $msg?>"
     tost(msg);

    });
 
  function tost(msg) {
              // Get the snackbar DIV
              $('#snackbar').text(msg);
              var x = document.getElementById("snackbar");
              // Add the "show" class to DIV
              x.className = "show";
              // After 3 seconds, remove the show class from DIV
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }

</script>
<?php  } ?>