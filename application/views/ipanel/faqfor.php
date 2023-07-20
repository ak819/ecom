 <?php 
$flag=$this->uri->segment(3);

?>
 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
         
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
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
                                    <li class="breadcrumb-item active" aria-current="page">Manage FAQ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">

                <div id="add_cat" <?= ($flag=='optionedit')?"style='display:block'":"style='display:none'"?> >
                      <div class="card">
                      <div class="card-body">
                               <form class="form-horizontal" action="<?= base_url();?>ipanel/faqs/<?= ($flag=="optionedit")?"optionupdate/".$this->uri->segment(4):"optionstore" ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">FAQ Option Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fname" placeholder="Enter Option Name Here" name="<?= ($flag=="optionedit")?"option":"option[]"?>" required="1" value="<?php if($flag == "optionedit"){  echo $info->option;  } ?>">
                                     

                                       
                                           
                                        </div>
                                   
                                  <div class="col-sm-12">
                                    <br>
                                          <div class="input_fields_container_option">
                            

                                         </div>

                                  </div>
                                           
                                     <?php if($flag !=="optionedit"){ ?>     

                                     <label class="control-label col-sm-3 text-right control-label col-form-label"></label>
                                       
                                           <div class="col-sm-6">
                                            <button class="btn btn-primary" id="addoption">Add more</button>
                                            </div>
                                    <br>
                                <?php } ?>
                                    </div>
                                  
                                        

                                    <button type="submit" class="btn btn-success"><?= ($flag=="optionedit")?"Update":"Save"?></button>
                                     <button type="button" class="btn btn-danger button_close" onclick="close_unit();">Close</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                          <div class="col-md-2">
                       <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                     </div>
                        <div class="container-fluid">
                                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">FAQ Option List</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Option</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <?php  $i=1; foreach($faqoptions as $val) { ?>
                                            <tr>
                                               <td><?= $i++; ?></td>
                                                <td><?= $val->option ?></td>
                                                <td><a href="<?= base_url();?>ipanel/faqs/optionedit/<?= $val->id;?>" class="btn btn-cyan btn-sm" data-original-title="Edit" >Edit</a>
                          <?php if ($val->status =='a'){ ?>
                          <a href="<?= base_url();?>ipanel/faqs/optionstatus/d/<?= $val->id;?>" class="btn btn-success btn-sm" data-original-title="Click to Deactivate">Activated</a>
                        <?php } else { ?> <a href="<?= base_url();?>ipanel/faqs/optionstatus/a/<?= $val->id;?>" class="btn btn-danger btn-sm" data-original-title="Click to Activate">Deactivated</a> <?php } ?></td>
                                            </tr>

                                           <?php } ?>
                                     
                                    </table>
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
  </script>