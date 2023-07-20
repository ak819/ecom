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
                                    <li class="breadcrumb-item active" aria-current="page">Advertise management</li>
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
                           <form class="form-horizontal" action="<?= base_url();?>ipanel/Advertise/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                          
                                <div class="card-body">
                                    <h4 class="card-title">Advertise Details</h4>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="title" name="title" required="1" value="<?= ($flag=='edit') ? $advertise->title:"";?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Link:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="Advertise link here" name="link" value="<?= ($flag=='edit') ? $advertise->link:"";?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Image:</label>
                                        <div class="col-sm-9">
                                           <div class="custom-file">
                                            <?php  if($flag=='edit'){?>
                                            <input type="hidden" name="hidden_photo" id="hidden_photo" value="<?php echo $advertise->img;?>" />
                                            <img   height="150" width="150" src="<?php echo base_url();?>assets/ipanel/uploads/img/small/<?php echo $advertise->img;?>"  id="image_upload_preview" />
                                            <br>
                                            <?php }else { ?>
                                              <img   height="150" width="150" style="margin-bottom:20px;" id="image_upload_preview" src="<?php echo base_url()?>assets/images/download.png" alt="your image" />
                                              <br>
                                            <?php } ?>
                                            <input type="file"  id="inputFile" name="img" <?= ($flag!="edit") ? "required='1'":"";?> />
                                          </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="desc" value="" placeholder="Description"><?= ($flag=='edit') ? $advertise->desc:"";?></textarea>
                                        </div>
                                    </div>   -->
                                     <div class="form-group row" style="display:none">
                                    <label class="col-md-3 m-t-15">Type</label>
                                    <div class="col-md-7">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="type" value="r" <?php if($flag == "edit" AND $advertise->type=="r"){  echo "checked";  } ?>>
                                            <label class="custom-control-label" for="customControlValidation1">Right</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="type" value="l" <?php if($flag == "edit" AND $advertise->type=="l"){  echo "checked";  } ?>>
                                            <label class="custom-control-label" for="customControlValidation2">Left</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation3" name="type" value="b" <?php if($flag == "edit" AND $advertise->type=="b"){  echo "checked";  } ?>>
                                            <label class="custom-control-label" for="customControlValidation3">Bottom</label>
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
           <!--      <div class="col-md-2">
                       <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                     </div> -->
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">Advertise Details</h5>
                               <div class="widget-content nopadding">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                 
                                        <thead>
                                           <tr>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Link</th>
                                              <!--   <th>Type</th> -->
                                                <th>Action</th>
                                            </tr>
                                             </thead>
                                            <tbody id="new_tbody">
                                              <?php
                                              foreach ($advertiseList as $key => $value) {
                                                # code...
                                                ?>
                                                 <tr>
                                                <td><?= $value->title ?></td>
                                                <td>
                                                  <a href="<?php echo base_url();?>assets/ipanel/uploads/img/<?php echo $value->img;?>"
                                                    >
                                                  <img style="width:50;height:50px;" src="<?php echo base_url();?>assets/ipanel/uploads/img/<?php echo $value->img;?>" />
                                                </a>
                                                </td>
                                                <td><?= $value->link  ?></td>
                                              <!--   <td><?php if($value->type == "r"){ echo "right"; }elseif($value->type == "l"){ echo "left"; }elseif($value->type == "b"){ echo "bottom"; }else{ echo "not specified"; } ?></td> -->

                                                
                                              <td> <a href="<?= base_url();?>ipanel/Advertise/edit/<?= $value->id?>" class="btn btn-cyan btn-sm" data-original-title="Edit">Edit</a>
                                         <?php if ($value->status=="a"){ ?>
                            <a class="btn btn-success btn-xs"  href="<?= base_url();?>ipanel/advertise/status/d/<?=$value->id;?>"> <?= "Active" ?> </a>
                          <?php }else{ ?>
                            <a class="btn btn-danger btn-xs" href="<?= base_url();?>ipanel/advertise/status/a/<?=$value->id;?>"> <?= "Deactive" ?> </a>
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
