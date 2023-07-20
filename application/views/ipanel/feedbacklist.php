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
                                <h4 class="card-title">Feedback List</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Product Details</th>
                                                <th>Message</th>
                                                <th>Rating</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <?php  $i=1; foreach($feedbacklist as $val) { ?>
                                            <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $val->name ?></td>
                                                    <td><?= $val->mobile ?></td>
                                                    <td><?= $val->product_details ?></td>
                                                    <td><?= $val->message ?></td>
                                                    <td><?= $val->rating ?></td>
                                                <td>
                          <?php if ($val->status =='a'){ ?>
                          <a href="<?= base_url();?>ipanel/feedback/status/d/<?= $val->id;?>" class="btn btn-success btn-sm" data-original-title="Click to Deactivate">Activated</a>
                        <?php } else { ?> <a href="<?= base_url();?>ipanel/feedback/status/a/<?= $val->id;?>" class="btn btn-danger btn-sm" data-original-title="Click to Activate">Deactivated</a> <?php } ?></td>
                                            </tr>

                                           <?php } ?>
                                     
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


  </script>