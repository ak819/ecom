<?php 
$flag=$this->uri->segment(3);

?>
  <script src="<?= base_url();?>assets/ipanel/dist/js/baseurl.js"></script>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Banner management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Banner management</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php
              //  print_r($category);exit;?>
                <div class="row">
                    <div class="col-md-12">
                       <div id="add_cat" <?= ($flag=='edit')?"style='display:block'":"style='display:none'"?> >
                        <div class="card">
                           <form class="form-horizontal" action="<?= base_url();?>ipanel/banner/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                          
                                <div class="card-body">
                                    <h4 class="card-title">Banner Details</h4>
                                      
                                     <div class="form-group row">

                                    <label for="exampleInputEmail1" class="col-sm-3 text-right control-label col-form-label">Banner Image</label><br>
                                    <?php  if($flag =='edit'){?>
                                    <input type="hidden" name="hidden_photo" id="hidden_photo" value="<?php echo $banner_info[0]->image;?>" />

                                    <div class="col-sm-9">
                                    <img height="150" width="150" id="image_upload_preview" src="<?php echo base_url();?>assets/ipanel/uploads/banner/<?php echo $banner_info[0]->image;?>" />
                                     </div>
                                    <?php }?><br>
                                     <?php if($flag =="index") {?>
                                     <div class="col-sm-9">
                                     <img   height="150" width="150" style="margin-bottom:20px;" id="image_upload_preview" src="<?php echo base_url()?>assets/images/download.png" alt="your image" />
                                     </div>
                                     <?php } ?>
              
                                     <div class="offset-3 col-sm-9">
                                      <input type="file" name="banner_image" id="inputFile"  value="" <?= ($flag=="edit")? "":"required='1'";?> />
                                     </div>
                                     </div>
                                    

                                    <div class="form-group row" style="display:none">
                                      <label for="exampleInputEmail1" class="col-sm-3 text-right control-label col-form-label">Banner Text</label>
                                     
                                      <div class="col-sm-9">
                                      <textarea class="form-control" name="title" id="bannertext"><?php if($flag == "edit"){  echo $banner_info[0]->title;  } ?></textarea>

                                       <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                                       <script type="text/javascript">
                            
                                         CKEDITOR.replace( 'bannertext',
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


                                         
                                    </div>
                                     
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                                         <button type="button" class="btn btn-danger button_close" onclick="close_unit();">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                       <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                     </div>
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">Banner Details</h5>
                               <div class="widget-content nopadding">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                 
                                        <thead>
                                           <tr>
                                                 
                                                <th>Sr.No</th>
                                                <th>Image</th>
                                              <!--   <th>Text</th> -->
                                                <th>Action</th>
                                            </tr>
                                             </thead>
                                            <tbody id="new_tbody">
                                              <?php

                                              if($bannerList)
                                              { $i=1;
                                              foreach ($bannerList as $key => $value) {
                                                # code...
                                                ?>
                                                 <tr>
                                                <td><?= $i++; ?></td>
                                                <td>
                                                  <img  style="width:150px;height:100px;"src="<?php echo base_url();?>assets/ipanel/uploads/banner/<?php echo $value->image; ?>" />
                                                </td>
                                                <!-- <td><?= $value->title ?></td> -->
                                              <td> <a href="<?= base_url();?>ipanel/banner/edit/<?= $value->id?>" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a>

                                                  <?php if ($value->status=="a"){ ?>
                            <a class="btn btn-success btn-xs"  href="<?= base_url();?>ipanel/banner/status/d/<?=$value->id;?>"> <?= "Active" ?> </a>
                          <?php }else{ ?>
                            <a class="btn btn-danger btn-xs" href="<?= base_url();?>ipanel/banner/status/a/<?=$value->id;?>"> <?= "Deactive" ?> </a>
                       <?php  } ?>
                                                    
                                                </td>
                                               
                                            </tr>
                                                <?php
                                              } }
                                              ?>
                                              </tbody>
                                           
                                    </table>
                                </div>
                              </div>
                            </div>
                 
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function add_cat()
{
  //alert("ihjn");
  $('#add_cat').show();
  $('.button_class').css('display','none');
}
function close_unit()
{
  //alert("ihjn");
 $('#add_cat').hide();
 $('.button_class').css('display','block');

}

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#image_upload_preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
<?php  if($flag !=='edit') { ?>
$("#inputFile").change(function() {
   var file =this.files[0];

   if (file.size > 2621440) {
         //Now Here I need to update <span> 
   var path="<?= base_url()?>download.png";
   var oldpath=$('#image_upload_preview').attr('src');

       alert('Filesize must 2.5mb or below');
       $("#inputFile").val('');
        
        $('img[src="' + oldpath + '"]').attr('src', path);

     
}else{

    readURL(this);
}
});
<?php }else{ ?>
$("#inputFile").change(function() {
   var file =this.files[0];

   if (file.size > 2621440) {
     
       alert('Filesize must 2.5mb or below');
       $("#inputFile").val('');
     
}else{

    readURL(this);
}
});


  <?php }?>
  </script>
