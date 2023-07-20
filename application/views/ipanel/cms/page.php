  <?php $flag=$this->uri->segment(2); ?>

<?php if($flag == "edit"){  }//print_r($pagedata); } exit; ?>

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
       <?php if ($this->session->flashdata('msg')) {
                  ?>
                      
                      <div class="alert alert-success" role="alert"> <a class="close" data-dismiss="alert" href="#"></a>
                      <?= $this->session->flashdata('msg'); ?>
                    </div>
                  <?php } ?>
    </div>
    
      <div class="box">
       
           <div class="col-md-6" style="">
                  <form action="<?php echo base_url(); ?>cms/updatepage/<?=$pagedata->id?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
            <input type="hidden" name="pagename" value="<?= $pagedata->pagename;?>">
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
             <textarea class="form-control rounded-0" id="description" rows="20" name="description" ><?=  $pagedata->description; ?></textarea>
               <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
               <script type="text/javascript">
    
      CKEDITOR.replace( 'description',
      {
         filebrowserBrowseUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/ckfinder.html',
         filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/ckfinder.html?type=Images',
         filebrowserFlashBrowseUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/ckfinder.html?type=Flash',
         filebrowserUploadUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
         filebrowserImageUploadUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
         filebrowserFlashUploadUrl : '<?php echo base_url();?>assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
         } 
         );
    </script>  
                                           
    
                </div>
                 
              
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-pink" >Update</button>
             
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
