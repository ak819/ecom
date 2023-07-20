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
                      <?= $this->session->flashdata('msgr'); ?>
                    </div>
                  <?php } ?>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">FAQ management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">FAQ management</li>
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

                            <div class="card-body">
                                <h4><u>FAQ Details</u></h4>
                                    <form class="form-horizontal" action="<?= base_url();?>ipanel/faqs/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store" ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">FAQ for</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select"  name="for"  on required="1">
                                           <option value="">Select Type</option>
                                           
                                           <?php foreach($faq_option as $val) { ?>
                                           <option value="<?= $val->id?>" <?php if($flag == "edit" AND $info->for == $val->id){  echo "selected";  } ?>><?= $val->option ?></option>

                                           <?php } ?>
                                           
                                           
                                            
                                        </select>
                                    </div>

                                     <label class="col-md-3 m-t-15">Question</label>
                                    <div class="col-md-7">
                                          <input type="text" class="form-control" placeholder="Enter question here" 
                                            name="question"  value="<?php if($flag == "edit"){  echo $info->question;  } ?>" required>
                                    </div>
                                
                              
                                    <label class="col-md-3 m-t-15">Answer
                                    </label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="answer" id="answer" value="" ><?php if($flag == "edit"){  echo $info->answer;  } ?></textarea>
                                         <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                                               <script type="text/javascript">
                                                
                                      CKEDITOR.replace( 'answer',
                                      {
                                            width: '100%',
                                           
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

                                
                    
                        

                          <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                          <button type="button" class="btn btn-danger button_close" onclick="close_unit();">Close</button> 

                           

                         </form>
                          </div>

                             
                           </div>

                        </div>
                      </div>
                     <div class="col-md-2">
                      <button type="button" class="btn btn-primary button_class"  id="new" onclick="add_cat();">NEW FAQ</button>
                                          </div> 
                 <div class="card">
                            <div class="card-body">
   <h5 class="card-title">FAQ List</h5>
                               <div class="widget-content nopadding">
                            <div class="table-responsive">
                                  <table id="zero_config" class="table table-striped table-bordered table-condensed">
                                         <thead> 
                    <tr> 
                        <th>Sr.No</th> 
                        <th>FAQ for</th> 
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                        
                       
                    </tr> 
                    </thead> 
                    <tbody> 
                    <tr> 

                        <?php $cnt=1; foreach ($faq_list as $row ): ?>
                                

                        <td><?= $cnt++?></td> 
                        <td><?= $row->faqfor?></td>
                        <td><?php  echo $row->question; ?></td>
                        <td><?= $row->answer ?></td>
                        <td><a href="<?= base_url();?>ipanel/faqs/edit/<?= $row->id;?>" class="btn btn-cyan btn-sm" data-original-title="Edit" >Edit</a>
                          <?php if ($row->status =='a'){ ?>
                          <a href="<?= base_url();?>ipanel/faqs/status/d/<?= $row->id;?>" class="btn btn-success btn-sm" data-original-title="Click to Deactivate">Activated</a>
                        <?php } else { ?> <a href="<?= base_url();?>ipanel/faqs/status/a/<?= $row->id;?>" class="btn btn-danger btn-sm" data-original-title="Click to Activate">Deactivated</a> <?php } ?>
                      </td>

                  </tr> 
                 
                        <?php endforeach ?>
                                      
                                  </table>
                                  </div>
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
  $('#new').hide();
}
function close_unit()
{
  //alert("ihjn");
   $('#new').show();
  $('#add_cat').hide();
}
  </script>
   

 


