  <?php $flag=$this->uri->segment(3); ?>

<?php if($flag == "editImage"){  }//print_r($add_info); } exit; ?>

<style>
#overlay {
    margin-left:16px;
    position: absolute;
    display: none;
     height: 530px;
    background-color: rgba(0,0,0,0.1);
    z-index: 2;
    
}
</style>
<div class="container-fluid">

<div class="page-wrapper form-1">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="page-breadcrumb">
        <h3>
        Product Images Management
        <small><?php echo $this->session->flashdata('message');?></small>
      </h3>
    </div>
    
      <div class="box">
       
           <div class="col-md-6" style="">
                  <form action="<?= base_url()?>ipanel/product/updateImage/<?= $this->uri->segment(4); ?>/<?=$this->uri->segment(5); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">

                    <label for="exampleInputEmail1">Image</label><br>
                        <?php  if($flag =='editImage'){?>
                        <input type="hidden" name="hidden_photo" id="hidden_photo" value="<?php echo $photo[0]->name;?>" />
                        <img height="150" width="150" id="image_upload_preview" src="<?= base_url()?>assets/ipanel/uploads/product_img/<?php echo $photo[0]->name;?>" style="margin-bottom: 30px;">
                        <?php }?><br>
                        
                        <br>
                        <input type="file" name="photo" id="inputFile"  value="" <?= ($flag=="editImage")? "":"required='1'";?> />
                </div>
               
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-pink" ><?php if($flag == "editImage"){  echo "Update";  }else { echo "Submit";} ?></button>
             
              </div>
            </form>
             </div>
        <!-- /.box-body -->
        <div class="box-footer">
        
        </div>
        <!-- /.box-footer-->
      </div>


 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
      
            <!-- /.box-header -->
            <div class="box-body">
             
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>

 
  <!-- /.content-wrapper -->
  </div>
</section>
</div>
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#image_upload_preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#inputFile").change(function() {
   var file =this.files[0];

   if (file.size > 2500000) {
       
       alert('Filesize must 2.5mb or below');
       $("#inputFile").val('');
     
     
}else{

    readURL(this);
}
});
</script>
