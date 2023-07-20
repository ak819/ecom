<?php 
$flag=$this->uri->segment(3);

?>
  <script src="<?= base_url();?>assets/ipanel/dist/js/baseurl.js"></script>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">

               <?php if ($this->session->flashdata('msg')) { ?>
                      <div class="alert alert-success" role="alert"> <a class="close" data-dismiss="alert" href="#">x</a>
                      <?= $this->session->flashdata('msg'); ?>
                    </div>
                  <?php } ?>
                  <?php if ($this->session->flashdata('msgr')) { ?>
                      <div class="alert alert-danger" role="alert"> <a class="close" data-dismiss="alert" href="#">x</a>
                      <?= $this->session->flashdata('msg'); ?>
                    </div>
                  <?php } ?>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Company / Manufacture management</li>
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
                           <form class="form-horizontal" action="<?= base_url();?>ipanel/company/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                          
                                <div class="card-body">
                                    <h4 class="card-title">Company / Manufacture Details</h4>
                                      
                                  
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Image:</label>
                                        <div class="col-sm-9">
                                           <div class="custom-file">
                                            <?php  if($flag=='edit' AND  $info->image){?>
                                            <input type="hidden" name="hidden_photo" id="hidden_photo" value="<?php echo $info->image;?>" />
                                            <img   height="150" width="150" src="<?php echo base_url();?>assets/ipanel/uploads/company_img/<?php echo $info->image;?>"  id="image_upload_preview" />
                                            <br>
                                            <?php }else { ?>
                                              <img   height="150" width="150" style="margin-bottom:20px;" id="image_upload_preview" src="<?php echo base_url()?>assets/images/download.png" alt="your image" />
                                              <br>
                                            <?php } ?>

                                            <input type="file"  id="inputFile" name="img" <?= ($flag!="edit") ? "required":"";?> />  (Image size should be 180 x 120 pixels)
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder=" Enter Name Here" name="name"  value="<?= ($flag=='edit') ? $info->name:"";?>"  required="1"/> 
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Type</label>
                                    <div class="col-sm-9">
                                        <div class="form-check mr-sm-2">
                                            <input type="checkbox" class="form-check-input" id="customControlAutosizing1" name="brand_status" value="y" <?= ($flag=='edit' AND $info->brand_status == "y") ? "checked" :"";?>>
                                            <label class="form-check-label mb-0" for="customControlAutosizing1">Brand</label>
                                        </div>
                                        <div class="form-check mr-sm-2">
                                            <input type="checkbox" class="form-check-input" id="customControlAutosizing2" name="associate_status" value="y" <?= ($flag=='edit' AND $info->associate_status == "y") ? "checked" :"";?>>
                                            <label class="form-check-label mb-0" for="customControlAutosizing2">Associates</label>
                                        </div>
                                        
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
   <h5 class="card-title">Company / Manufacture list</h5>
                               <div class="widget-content nopadding">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                 
                                        <thead>
                                           <tr>
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                             
                                                <th>Action</th>
                                            </tr>
                                             </thead>
                                            <tbody id="new_tbody">
                                              <?php $i=1;
                                              foreach ($companylist_list as $key => $value) {
                                                # code...
                                                ?>
                                                 <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $value->name  ?></td>
                                                <td>
                                                  <?php if($value->image){ ?>
                                                  <a href="<?php echo base_url();?>assets/ipanel/uploads/company_img/<?php echo $value->image;?>"
                                                    >
                                                  <img style="width:150;height:150px;" src="<?php echo base_url();?>assets/ipanel/uploads/company_img/<?php echo $value->image;?>" />
                                                <?php }else{ ?>

                                                      <img style="width:150;height:150px;" src="<?php echo base_url()?>assets/images/download.png" />
                                         
                                                <?php  } ?>
                                                </a>
                                                </td>
                                              
                                            

                                                
                                              <td> <a href="<?= base_url();?>ipanel/company/edit/<?= $value->id?>" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a>
                                                  
                                             <?php if ($value->status=="a"){ ?>
                            <a class="btn btn-success btn-xs"  href="<?= base_url();?>ipanel/company/status/d/<?=$value->id;?>"> <?= "Active" ?> </a>
                          <?php }else{ ?>
                            <a class="btn btn-danger btn-xs" href="<?= base_url();?>ipanel/company/status/a/<?=$value->id;?>"> <?= "Deactive" ?> </a>
                           <?php   } ?> 
                                                    
                                                </td>
                                               
                                            </tr>
                                                <?php
                                              }
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
   var url="<?= base_url()?>ipanel/company";
    window.location.replace(url);
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
