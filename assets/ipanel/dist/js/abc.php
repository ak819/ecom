<?php 
$flag=$this->uri->segment(2);
?>
 <script src="<?= base_url();?>assets/ipanel/dist/js/bill.js"></script>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Bill management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                <div class="row">
                    <div class="col-md-12">
                       <div id="add_bill"  >
                        <div class="card">
                           <form class="form-horizontal" action="<?= base_url();?>bill/<?= ($flag=="edit")?"update/".$this->uri->segment(3):"store" ?>" method="post">
                          
                                <div class="card-body">
                                    <h4 class="card-title">Bill Details</h4>
                                    <div class="form-group row">
                                         <div class="col-md-2">
                                          <label for="bill_no">Bill No:</label>
                                        </div>
                                         <div class="col-md-4">
                                            <input type="text" class="form-control" name="bill_no" placeholder="Bill Number Here" value="<?= ($flag=="edit")? $facilitiesdetails->bill_no :"" ?>" >
                                        </div>
                                        <div class="col-md-2">
                                               <label for="bill_date">Bill Date:</label>
                                        </div>
                                         <div class="col-md-4">
                                             <input type="text" class="form-control" name="bill_date" placeholder="Bill Date Here" value="<?= ($flag=="edit")? $apartmentdetails->bill_date :"" ?>" >
                                        </div>
                                      </div>
                                     <div class="form-group row">
                                         <div class="custom-control  col-md-2">
                                          <label for="member_id" >Member Details</label>
                                        </div>
                                         <div class="custom-control  col-md-4">
                                            <select class="select2 form-control custom-select" name="member_id" id="member_id"  style="width: 100%; height:36px;">
                                      <option value="0" selected="selected">Select Members</option>
                                        <?php foreach($memberlist as $row){?>
                                              <option value="<?php echo $row->id;?>"<?php if($flag=='edit'){ if($memberdetails->apt_id==$row->id){?> selected="selected"<?php } }?>>
                                          <?php echo $row->name_apartment;?></option>
                                        <?php }?>
                                    </select>
                                        </div>
                                        <div class="col-md-2">
                                               <label for="bill_due_date">Bill Due Date:</label>
                                        </div>
                                         <div class="col-md-4">
                                             <input type="date" class="form-control" name="bill_due_date" placeholder="Bill Due Date Here" value="<?= ($flag=="edit")? $apartmentdetails->bill_due_date :"" ?>" >
                                        </div>
                                      </div>
                                      
                         <div class="input_fields_container ">
                          <div class="form-group row">
                         <label class="control-label">Sr. No</label>
             
                <input type="text" name="pakage_name[]" class="col-md-2" placeholder="Product Packaging" required="1">
                <input type="text" name="pakage_mrp[]"class="col-md-2" placeholder="Product MRP">
                <input type="text" name="pakage_price[]" class="col-md-2" placeholder="Product Price" required="1">
                <input type="text" name="pakage_quantity[]" class="col-md-2" placeholder="Product  Quantity" required="1">
                <input type="text" name="pakage_quantity[]" class="col-md-2" placeholder="Product  Quantity" required="1">
                 <button class="btn btn-sm btn-primary add_more_button">Add More</button>
           
            </div>
        </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"><?= ($flag=="edit")?"Update":"Save"?></button>
                                         <button type="button" class="btn btn-danger button_close" onclick="close_facility();">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                      </div>
                       <button type="button" class="btn btn-primary button_class"  onclick="add_facility();">New</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
