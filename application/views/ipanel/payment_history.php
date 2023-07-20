<?php 
$flag=$this->uri->segment(2);


?>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Product management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">user management</li>
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
           
                     <!--  <div class="col-md-2">
                      <button type="button" class="btn btn-primary button_class"  onclick="add_cat();">New</button>
                                          </div> -->
                 <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Payment List</h5>
                                        <div class="row">
                                          <form action="<?= base_url();?>fedpayments/allpayemnts">
                                              <fieldset>
                                                <div class="form-group">
                                                <label for="paymenttype">Select Payment made for</label>
                                                  <select name="type" id="paymenttype" class="form-control">
                                                    <option value="Enquiryrecived" <?= ($this->input->get('type')=="Enquiryrecived")? 'selected':""; ?>>Enquiry recived</option>
                                                    <option value="productdetail" <?= ($this->input->get('type')=="productdetail")? 'selected':""; ?>>Product Details</option>
                                                    <option value="stock" <?= ($this->input->get('type')=="stock")? 'selected':""; ?>>Stock Activation</option>
                                                    </select>
                                                </div>
                                                <div class="form-group"> 
                                                  <input type="submit" class="btn btn-primary form-control" value="Show result">
                                                </div>
                                              </fieldset>
                                          </form>
                                        </div>
                          <div class="widget-content nopadding">
                         <h5 class="card-title">Showing Payment List   <?= strtoupper($this->input->get('type'));?></h5>
                            <div class="table-responsive">
                                  <table id="zero_config" class="table table-striped table-bordered table-condensed">
                                         <thead> 
                    <tr> 
                        <th>sr.no.</th> 
                        <th>Order id</th> 
                        <th>Company Name</th> 
                        <th>email</th> 
                        <th>GST</th> 
                        <th>Amount</th> 
                        <th>Payment Status</th> 
                        <th>Type</th>
                       
                      <!--   <th>mobile</th> 
                      <th>Contact person</th>  -->
                   
                        <th>Action</th> 
                       
                    </tr> 
                    </thead> 
                    <tbody> 
                    <tr> 
                        <?php $cnt=1; foreach ($payment_history as $row ): ?>
                       <td><?= $cnt++?></td> 
                      
                       <td><?= $row->order_id?></td>
                       <td><?= $row->comp_name?></td>
                       <td><?= $row->email ;?></td>
                       <td><?= $row->gstno ;?></td>
                       <td><?= $row->amount?></td>
                       <td><?= $row->Tran_status?></td>
                       <td><?= $row->type?></td>


                    
                      <!--  <td><?= $row->mobile?></td>
                      <td><?= $row->contactper?></td> -->
                    
                   
                       <td>
                            <a target="_blank" class="btn btn-primary btn-xs" href="<?= base_url()?>welcome/vieworder/<?= $row->order_id?>"> View Invoice </a>
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

