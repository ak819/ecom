
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper form-1">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h3 class="page-title">Product Images Management</h3>
                        <div class="ml-auto text-right">
                          
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


              
              
          <div class="col-12">
            <a href="<?= base_url()?>ipanel/product"   style="margin-bottom: 31px;" class="btn btn-info btn-sm"><< Back </a>
            <button type="button" style="margin-bottom: 31px;"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-sm">Add New Images </button>
                <div class="card">
                  
                  <?php if ($this->session->flashdata('msg')) { ?>
                      
                    <div class="alert alert-success" role="alert"> <a class="close" data-dismiss="alert" href="#"></a>
                      <?= $this->session->flashdata('msg'); ?>
                    </div>

                  <?php } ?>

                  <div class="card-header" style="margin-bottom: 30px;">
                    <h4 class="card-title"><?php if(empty(!$p_images)){ echo $p_images[0]->p_name; }else{ "No record" ;} ?></h4>
                  </div>
                  <div class="table-responsive">
                    <form action="<?= base_url()?>ipanel/product/photopriority" method="post">

                    <table class="table table-striped table-bordered" id="zero_config">
                      <thead>
                        <tr>
                          <th class="w-1">Sr No.</th>
                          <th>Image</th>
                          <th class="text-center">Action</th>
                          <th>Priority</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;
                        foreach ($p_images as $key => $value) {
                          # code...
                          ?>
                          <tr>
                          <td><?= $i; ?></td>  
                          <td>
                             <?php $filename=explode('.',$value->name); 
                               $extension=$filename[1];
                              ?>
                            <?php if($extension == "mp4") {?>
                              <video width="100" height="100" controls>
                              <source src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $value->name ?>" type="video/mp4">
                              </video>

                            <?php }else{ ?>
                            <img   height="50" width="50" id="image_upload_preview" src="<?= base_url();?>assets/ipanel/uploads/product_img/thumb/<?= $value->name ?>" alt="your image" />
                             <?php } ?>

                          </td> 
                          <td>
                         
                            <a href="<?= base_url();?>ipanel/product/editImage/<?= $value->p_id ?>/<?= $value->id?>" class="btn btn-primary btn-sm">Edit</a>

                            <a onclick="return confirm('Are you sure to Delete this record?')" href="<?= base_url();?>ipanel/product/deleteImg/<?= $value->name ?>/<?= $value->id ?>" class="btn btn-danger btn-sm">Delete</a>

                               <?php if ($value->status =='a'){ ?>
                          <a href="<?= base_url();?>ipanel/product/imagestatus/d/<?= $value->p_id;?>/<?= $value->id;?>" class="btn btn-success btn-sm" data-original-title="Click to Deactivate">Activated</a>
                        <?php } else { ?> <a href="<?= base_url();?>ipanel/product/imagestatus/a/<?= $value->p_id;?>/<?= $value->id;?>" class="btn btn-danger btn-sm" data-original-title="Click to Activate">Deactivated</a> <?php } ?>
                          
                          </td>
                             <td><input type="number" class="span4 priority" name="photo[<?= $value->id ?>]" max="<?= count($p_images);?>" id="photo_<?= $value->id ;?>" value="<?= $value->priority; ?>" ></td>


                        </tr>
                          <?php
                           $i++;}
                        ?>
                     </tbody>
                          <tfoot>
                <tr>
                  <th></th>
                 
                   <th></th>
                    <th></th>
                  <td> <?php if(empty(!$p_images))  { ?><button type="submit" class="btn btn-info">Update</button> <?php } ?></td>
                </tr>
              </tfoot>
                   </table>
                   </form>
                 </div>
               </div>
             </div>
           
          
          </div>
        </div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= base_url();?>ipanel/product/storeimg/" class="dropzone" id="dropzonewidget" enctype="multipart/form-data">
              <div class="form-group">

                <label for="exampleInputEmail1"></label>

                <input type="hidden" class="form-control" id="p_id"  name="p_id"  value="<?= $p_id ?>">

              </div>
         
        </form>
  
      </div>
      <div class="modal-footer">
        <a href="<?= base_url()?>ipanel/product/Images/<?= $this->uri->segment(4); ?>" class="btn btn-secondary" >Close</a>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script src='<?= base_url();?>assets/ipanel/dropzone.js' type='text/javascript'></script>
 <script type="text/javascript">
    Dropzone.autoDiscover = false;

        $(".dropzone").dropzone({

          maxFilesize: 2.5,
         addRemoveLinks: true,

     sending: function(data){
                   
           console.log(data);    
     

           },

         removedfile: function(file) {
          var name = file.name; 
          var p_id=$('#p_id').val();

  var answer = confirm("Are you sure want to delete image ?")
  if (answer){

          $.ajax({

            
           type: 'POST',
           url: '<?= base_url();?>ipanel/product/removeimg/',
           data: {name: name,p_id:p_id,request: 2},

           sucess: function(data){
            console.log('success: ' + data);
           }
          });
          var _ref;
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
  }
        else{
        
        return false;
        
         }


         }
        });
      </script>
