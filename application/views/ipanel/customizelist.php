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
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                        <div class="container-fluid">
                                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Customize form List</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Length</th>
                                                <th>Width</th>
                                                <th>Thickness</th>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Attachment</th>
                                            </tr>
                                        </thead>
                                         <?php  $i=1; foreach($customizelist as $val) { ?>
                                            <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $val->minlength." - ".$val->maxlength ?></td>
                                                    <td><?= $val->minwidth." - ".$val->maxwidth ?></td>
                                                    <td><?= $val->minthickness." - ".$val->maxthickness ?></td>
                                                    <td><?= $val->product ?></td>
                                                    <td><?= $val->qty ?></td>
                                                    <td><?= $val->email ?></td>
                                                    <td><?= $val->message ?></td>
                                                    <td>
                                                     <?php if($val->attachment){  ?>
                                                        <a href="<?= base_url()?>assets/ipanel/uploads/emailattachment/<?= 
                                                        $val->attachment ?>">View</a>
                                                         <?php }else{  echo "-"; }?>
 
                                                    </td>
                                             
                                            </tr>

                                           <?php } ?>
                                     
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


  </script>