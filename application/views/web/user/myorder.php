<div class="inner-header">
	<img src="<?= base_url()?>assets/web/images/banner-inner-3.jpg">
	<h2>My Order</h2>
 </div>

<?php if(empty(!$myorders)){ ?>
<div class="order-inner-section">
	<div class="container">
		
		

<div class="middle-wrapper">
                    <div class="left-part-page2">
                        <div class="tittle-box">
                           
                            <a class="back-right-cls" href="account.php">
                        	<button type="button" class="shopping-btn" style="padding-left:10px; padding-right:10px;">Back</button></a>
                            
                        </div>
                          <h5 class="disp-dist-name"></h5>
                          
                        
                            
                                    
                                    <div class="inner-pages-mid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            
                                            <div class="table-responsive">
 
                                            
                                            
                                           <table class="table table-bordered dataTable no-footer" style="text-align: center;" id="myTable" role="grid" aria-describedby="myTable_info">
    <thead>
    

        <tr role="row" style="background: #c07d2d;">

        <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr.no: activate to sort column descending" style="width: 38px;    text-align: center;">Sr.no</th>

        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Order id: activate to sort column ascending" style="width: 60px; text-align: center;">Order id</th>

        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="total item: activate to sort column ascending" style="width: 71px; text-align: center;">total item</th>

        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="total item: activate to sort column ascending" style="width: 71px; text-align: center;">Order Amount</th>

        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Order status: activate to sort column ascending" style="width: 90px;text-align: center;">Order status</th>

        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 133px;text-align: center;">Date</th>

        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="View order: activate to sort column ascending" style="width: 82px;    text-align: center;">View details</th>

        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="total item: activate to sort column ascending" style="width: 71px; text-align: center;">Track Online</th>
        
      </tr>

    </thead>
    <tbody>
            
    <?php $i=1; foreach($myorders as $val){ ?>          
         
    <tr role="row" class="odd">
        <td class="sorting_1"><?= $i++; ?></td>
        <td><?= $val->id ?></td>
        <td><?= $val->item_count ?></td>
        <td><?= $val->order_amount ?></td>
        <td><?= $val->order_completion_status ?></td>
        <td><?= date('d-m-Y h:i A',strtotime($val->date_inserted)); ?></td> 
        <?php  $id=$this->encrypt->encode($val->id); ?>                  
        <td><a href="<?= base_url()?>orderdetails/<?=strreplace_encode($id);?>" role="button" style="margin-top: 0px;">view</a></td>
        <td><a href="#" role="button" style="margin-top: 0px;">track</a></td>    
    </tr>

   <?php } ?>

  </tbody>
  </table>
                            </div>
                            </div>
                            </div>
                            
                           
                          
                            
                        </div>
                    </div>
                </div>

		
	</div>
</div>




	


<?php  }else{ ?>
<div class="yourorder">
	<div class="container">
		<div class="row">

<div class="empty-cart"> 
  <div class="container">

      <div class="cart-empty">
         <img src="<?= base_url()?>assets/web/images/empty-cart.png">
      </div>
      <h3>You Have No Order.</h3>
      <a class="btn btn-primary empty-btn" href="<?= base_url()?>" role="button">Continue Shopping..</a>
  </div>
  </div>

		</div>
	</div>
</div>
<?php } ?>