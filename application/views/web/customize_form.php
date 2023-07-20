

 
 
 
 
<div class="top-banner-wrap"><div class="container"><h3>Customization</h3></div></div>
<div class="customization-page">
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="register-customize">
        <form action="<?= base_url()?>welcome/customizesubmit" enctype="multipart/form-data" method="POST" class="form-horizontal">
  <div class="form-group"> 
   
    <div class="col-sm-12">
      <div class="price-range">

 <div class="ui-container">
               
                <div class="slider-range2">
                 <label>Length</label>
                  <div class="slider-range" id="length-slider-range"></div>
                  <input type="text"  name="minlength" id="minlength" class="min" readonly>
                  <input type="text"  name="maxlength" id="maxlength" class="max" readonly>
                </div>
                
				</div> 
        </div>
    </div>
        <div class="col-sm-12">
      <div class="price-range">

 <div class="ui-container">
               
                <div class="slider-range2">
                 <label>Width</label>
                  <div class="slider-range" id="width-slider-range"></div>
                  <input type="text" name="minwidth"  id="minwidth"  class="min" readonly>
                  <input type="text" name="maxwidth" id="maxwidth"  class="max" readonly>
                </div>
                
				</div> 
        </div>
    </div>
      
     <div class="col-sm-12">
      <div class="price-range">

 <div class="ui-container">
               
                <div class="slider-range2">
                 <label>Thickness</label>
                  <div class="slider-range" id="thickness-slider-range"></div>
                  <input type="text" name="minthickness" id="minthickness" class="min"  readonly>
                  <input type="text" name="maxthickness" id="maxthickness"  class="max" readonly>
                </div>
                
				</div> 
        </div>
    </div>
    
  </div>
  <div class="form-group">
        <div class="col-sm-12">
 <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary btn-lg loadproudct" data-toggle="modal" data-target="#myModal">Choose your product</button>
        </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Choose your product</h4>
      </div>
      <div class="modal-body">
        <div id="productlist"></div>
         <div id="pagination"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
     <div class="moall-footer"></div>
    
  </div>
  <div class="form-group">
        <div class="col-sm-12">
            <div class="form-group no-marg-form">
                
    <label for="exampleInputFile">Or</label>
    <input type="file" name="file" id="exampleInputFile"><span>(File size should be less than 1 MB. and should be jpg,jpeg,pdf)</span>
    <p class="help-block">Choose Artwork option / <span class="small-txt">Our designer will call you.</span></p>
  </div>
            
            
      
</div>
  </div>
  
    <div class="form-group">
     <div class="col-sm-12"><label>Quantity (In pcs)</label></div>
    <div class="clearfix"></div>
     <div class="col-sm-12">
        <input type="number" class="form-control" name="qty" id="Quantity"  value="1" placeholder="Quantity"  >
         <?php if(form_error('qty')) {?>
   <label class="errormsg"><?php echo form_error('qty'); ?></label>
   <?php } ?>
    </div>
    
  </div>

   <div class="form-group">
     <div class="col-sm-12"><label>Enter E-mail</label></div>
    <div class="clearfix"></div>
     <div class="col-sm-12">
        <input type="email" class="form-control" name="email" placeholder=""  value="<?php echo set_value('email'); ?>" >
         <?php if(form_error('email')) {?>
   <label class="errormsg"><?php echo form_error('email'); ?></label>
   <?php } ?>
    </div>
    
  </div>

<p>Please enter your Email-Id and get your costing directly.</p>



<div class="form-group">
     <div class="col-sm-12"><label>Leave message for us</label></div>
    <div class="clearfix"></div>
     <div class="col-sm-12">
        <textarea name="message" class="form-control" rows="3" ><?php echo set_value('message'); ?></textarea>
         <?php if(form_error('message')) {?>
   <label class="errormsg"><?php echo form_error('message'); ?></label>
  
   <?php } ?>
    </div>
    
  </div>

  <div class="form-group">
     <div class="col-sm-12">
    <div data-type="image" class="g-recaptcha" data-sitekey="6LcmktcZAAAAAE8TjbtlfmOYhA8nn_PcrhONq2Mf"></div>
                          
                            <h4 id="error_msg" style="display:none;color:red;">Please Check it....</h4>
   </div>
 </div>


  
  <div class="form-group">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-default btn-default-new">Submit</button>
    </div>
  </div>
</form>
<p>We will review your requirement and get back to you shortly</p>
</div>
</div>
    </div>
</div>




<script src="http://xposureindia.com/stylica/assets/web/js/jquery-ui.js"></script>

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

     <script>
  $(function() {
    $( "#length-slider-range" ).slider({
      range: true,
      min: 100,
      max: 3000,
      step: 5,     
      values: [ 100, 3000 ],
      slide: function( event, ui ) {
        $( "#minlength" ).val( ui.values[ 0 ]+"mm"   );
        $( "#maxlength" ).val( ui.values[ 1 ]+"mm" );
      }
    });
    $( "#minlength" ).val( $( "#length-slider-range" ).slider( "values", 0 )+"mm" );
    $( "#maxlength" ).val( $( "#length-slider-range" ).slider( "values", 1 )+"mm" );
  
  });
  $(function() {
    $( "#width-slider-range" ).slider({
      range: true,
      min: 100,
      max: 3000,
      step: 5,     
      values: [ 100, 3000 ],
      slide: function( event, ui ) {
        $( "#minwidth" ).val( ui.values[ 0 ]+"mm"   );
        $( "#maxwidth" ).val( ui.values[ 1 ]+"mm" );
      }
    });
    $( "#minwidth" ).val( $( "#width-slider-range" ).slider( "values", 0 )+"mm" );
    $( "#maxwidth" ).val( $( "#width-slider-range" ).slider( "values", 1 )+"mm" );
  
  });
 
  $(function() {
    $( "#thickness-slider-range" ).slider({
      range: true,
      min: 1,
      max: 18,
      step: 1,     
      values: [ 1, 18 ],
      slide: function( event, ui ) {
        $( "#minthickness" ).val( ui.values[ 0 ]+"mm"   );
        $( "#maxthickness" ).val( ui.values[ 1 ]+"mm" );
      }
    });
    $( "#minthickness" ).val( $( "#thickness-slider-range" ).slider( "values", 0 )+"mm" );
    $( "#maxthickness" ).val( $( "#thickness-slider-range" ).slider( "values", 1 )+"mm" );
  
  });


$(document).on('click', '.check-bx-back .product_check', function() {
     if ($(this).is(':checked')){

      var flag="add";

       }else{

        var flag="remove";
    
        }
      var product=$(this).val();

       $.ajax({
        url: '<?=base_url()?>customize_product',
        type: 'post',
        dataType: 'json',
        data:{product:product,flag:flag},
        success: function(response){
        }
        });
 }) ;


  

    $(document).ready(function(){
    
       //tost("login to continue");
    loadproducts(1);

    });

      $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       //$('#myModal').modal('show');
       loadproducts(pageno);
       //$(window).scrollTop(0);

     });

        function loadproducts(pagno){
      

       $.ajax({
        
        url: '<?=base_url()?>loadallprdoucts/'+pagno,
        type: 'post',
        dataType: 'json',
        data:{

          },

      success: function(response){

        //alert(response);

      $('#pagination').html(response.pagination);
                
       $('#productlist').empty();
    
       if(response.products!="")
       {
        
       $('#productlist').append(response.products);

       }
   

      $('html, div').animate({scrollTop: $("#productlist").offset().top}, 'slow');
            
            //window.scrollTo(0, 0);

        }

     
       });
     }

  
  
</script>

 