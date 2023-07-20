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
                                    <li class="breadcrumb-item active" aria-current="page">Shipping Charge list</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            
            <div class="container-fluid">

                <div id="add_cat" <?= ($flag=='edit')?"style='display:block'":"style='display:none'"?> >
                      <div class="card">
                      <div class="card-body">
                               <form class="form-horizontal" action="<?= base_url();?>ipanel/shippingcharge/<?= ($flag=="edit")?"update/".$this->uri->segment(4):"store/".$this->uri->segment(4) ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                    <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Select Type</label>
                                    <div class="col-md-7">
                                        <select class="select2 form-control custom-select" style=" height:36px;" name="type" required>
                                            <option value="">Select</option>
                                            <option value="local" <?php if($flag == "edit" AND $info->type =="local"){  echo "selected";  } ?>>local</option>
                                            <option value="ROM" <?php if($flag == "edit" AND $info->type =="ROM"){  echo "selected";  } ?>>ROM (Rest Of Maharashtra)</option>
                                            <option value="ROI" <?php if($flag == "edit" AND $info->type =="ROI"){  echo "selected";  } ?>>ROI (Rest Of India)</option>
                                            
                                        </select>
                                    </div>

                                   <label class="col-md-3 m-t-15 filter">250 gm</label>
                                    <div class="col-sm-7">
                                            <input type="text" class="form-control" name="250gm" placeholder="250 gm charge here" required value="<?php if($flag == "edit"){  echo $info->gm250;  } ?>">
                                           
                                           
                                    </div>

                                    <label class="col-md-3 m-t-15 filter">500 gm</label>
                                    <div class="col-sm-7">
                                            <input type="text" class="form-control" name="500gm" placeholder="500gm chagre here" required value="<?php if($flag == "edit"){  echo $info->gm500;  } ?>">
                                           
                                           
                                    </div>


                                    <label class="col-md-3 m-t-15 filter">1000 gm</label>
                                    <div class="col-sm-7">
                                            <input type="text" class="form-control" name="1000gm" placeholder="1000gm charge here" required value="<?php if($flag == "edit"){  echo $info->gm1000;  } ?>">
                                           
                                           
                                    </div>

                                   
                                  </div> 


                                  
                                    <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                                     <button type="button" class="btn btn-danger button_close" onclick="close_unit();">Close</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                     
                        <div class="container-fluid">
                                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Shipping Chagres List</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Type</th>
                                                <th>250g chrges</th>
                                                <th>500g chrges</th>
                                                <th>1000g chrges</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <?php $i=1; foreach($shippingchagre as $val) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $val->type ?></td>
                                                <td><?= $val->gm250 ?></td>
                                                <td><?= $val->gm500 ?></td>
                                                <td><?= $val->gm1000 ?></td>
                                                <td><a href="<?= base_url();?>ipanel/shippingcharge/edit/<?= $val->id;?>" class="btn btn-cyan btn-sm" data-original-title="Edit" >Edit</a></td>
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
  $('.button_class').show('display','block');
  
}
  </script>                   