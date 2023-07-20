<div class="compare-product">
	<div class="container">
		<div class="row">
			<h4>Compare Products </h4>
			<p>Select product to compare,search by name or model no</p>
      <hr>
      <form action="<?= base_url()?>compare" id="compareproduct" method="get">
        <input type="hidden" name="product" value="<?= $_GET['product'] ?>">
        <input type="hidden" name="category" value="<?= $_GET['category'] ?>">
			<div class="col-md-3">
			<select  class="form-controll selectmenu" name="product1" disabled="1">
         <?php foreach($compareproduct as $val) { ?>
            <option value="<?= $val->product_id?>" <?=($val->product_id == $_GET['product'])? "selected" :"" ?> ><?= $val->p_name?>( <?= $val->model_no?> )</option>
          <?php } ?>
            </select>
			</div>

			<div class="col-md-3">
			<select id="product2" class="form-controll selectmenu" name="product2">
        	<option value="">select product 2</option>
               <?php foreach($compareproduct as $val) {?>
                <?php if($val->product_id == $_GET['product']) { ?>
                <?php }else{?>
          <option value="<?= $val->product_id?>" <?=(isset($_GET['product2']) AND $val->product_id == $_GET['product2'])? "selected" :"" ?>><?= $val->p_name?>( <?= $val->model_no?> )</option>
          <?php } } ?>
            </select>
			</div>

			<div class="col-md-3">
			<select id="product3" class="form-controll selectmenu" name="product3">
        	<option value="">select product 3</option>
           <?php foreach($compareproduct as $val) {?>
                <?php if($val->product_id == $_GET['product']) { ?>
                <?php }else{?>
          <option value="<?= $val->product_id?>" <?=(isset($_GET['product3']) AND $val->product_id == $_GET['product3'])? "selected" :"" ?>><?= $val->p_name?>( <?= $val->model_no?> )</option>
          <?php } } ?>
            </select>
			</div>

			<div class="col-md-3">
			<select id="product4" class="form-controll selectmenu" name="product4">
        	<option value="">select product 4</option>
           <?php foreach($compareproduct as $val) {?>
                <?php if($val->product_id == $_GET['product']) { ?>
                <?php }else{?>
          <option value="<?= $val->product_id?>" <?=(isset($_GET['product4']) AND $val->product_id == $_GET['product4'])? "selected" :"" ?>><?= $val->p_name?>( <?= $val->model_no?> )</option>
          <?php } } ?>
            </select>
			</div>

			<input type="submit" value="Compare Selected Products " class="btn btn-primary-outline btn-sm m-t-1">
      <hr>

    </form>
		</div>
	</div>
</div>


<hr>
<hr>


<?php if(isset($product1) AND isset($product2)){ ?>
<div class="compare-select">
  <div class="container">
    <div class="row">
           
  <table class="table">
    <thead>
      <tr>
        <th></th>

        <th><img src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $product1->name ?>"><p><?= $product1->p_name ?></p><h5><a href="javascript:void(0)" class="btn btn-default my-cart-btn"
                   data-image="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $product1->name  ?>"
           data-pid="<?= $product1->product_id  ?>" 
           data-name="<?= $product1->p_name  ?>" 
           data-price="<?= $product1->price ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add To Cart</a></h5></th>

         <th><img src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $product2->name ?>"><p><?= $product2->p_name ?></p><h5><a href="javascript:void(0)" class="btn btn-default my-cart-btn"
                   data-image="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $product2->name  ?>"
           data-pid="<?= $product2->product_id  ?>" 
           data-name="<?= $product2->p_name  ?>" 
           data-price="<?= $product2->price ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add To Cart</a></h5></th>

           <?php if(isset($product3)){ ?>
         <th><img src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $product3->name ?>"><p><?= $product3->p_name ?></p><h5><a href="javascript:void(0)" class="btn btn-default my-cart-btn"
                   data-image="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $product3->name  ?>"
           data-pid="<?= $product3->product_id  ?>" 
           data-name="<?= $product3->p_name  ?>" 
           data-price="<?= $product2->price ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add To Cart</a></h5></th>
            <?php } ?>

        <?php if(isset($product4)){ ?>
        <th><img src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $product4->name ?>"><p><?= $product4->p_name ?></p><h5><a href="javascript:void(0)" class="btn btn-default my-cart-btn"
                   data-image="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $product4->name  ?>"
           data-pid="<?= $product4->product_id  ?>" 
           data-name="<?= $product4->p_name  ?>" 
           data-price="<?= $product4->price ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add To Cart</a></h5></th>
         <?php } ?>

           <input type="hidden" value="1" id="qty">
      </tr>
    </thead>
    <tbody>
      <?php if($filtersname->sub_cat_1) { ?>
      <tr>
        <td><strong><?= $filtersname->sub_cat_1 ?></strong></td>
        <td><?= ($product1->filter1)? $product1->filter1 : "-"  ?></td>
        <td><?= ($product2->filter1)? $product2->filter1 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter1)? $product3->filter1 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter1)? $product4->filter1 : "-"  ?></td><?php } ?>
      </tr>
    <?php } ?>
    <?php if($filtersname->sub_cat_2) { ?>
      <tr>
        <td><strong> <?= $filtersname->sub_cat_2 ?> </strong></td>
        <td><?= ($product1->filter2)? $product1->filter2 : "-"  ?></td>
        <td><?= ($product2->filter2)? $product2->filter2 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter2)? $product3->filter2 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter2)? $product4->filter2 : "-"  ?></td><?php } ?>
      </tr>
       <?php } ?>
        <?php if($filtersname->sub_cat_3) { ?>
      <tr>
        <td><strong>  <?= $filtersname->sub_cat_3 ?> </strong></td>
        <td><?= ($product1->filter3)? $product1->filter3 : "-"  ?></td>
        <td><?= ($product2->filter3)? $product2->filter3 : "-"  ?></td>
    <?php if(isset($product3)){ ?><td><?= ($product3->filter3)? $product3->filter3 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter3)? $product4->filter3 : "-"  ?></td><?php } ?>
      </tr>
        <?php } ?>
        <?php if($filtersname->sub_cat_4) { ?>
      <tr>
        <td><strong> <?= $filtersname->sub_cat_4 ?> </strong></td>
        <td><?= ($product1->filter4)? $product1->filter4 : "-"  ?></td>
        <td><?= ($product2->filter4)? $product2->filter4 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter4)? $product3->filter4 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter4)? $product4->filter4 : "-"  ?></td><?php } ?>
       <?php } ?>
        <?php if($filtersname->sub_cat_5) { ?>
      <tr>
        <td><strong> <?= $filtersname->sub_cat_5 ?></strong></td>
        <td><?= ($product1->filter5)? $product1->filter5 : "-"  ?></td>
        <td><?= ($product2->filter5)? $product2->filter5 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter5)? $product3->filter5 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter5)? $product4->filter5 : "-"  ?></td><?php } ?>
      </tr>
        <?php } ?>
        <?php if($filtersname->sub_cat_6) { ?>
      <tr>
        <td><strong><?= $filtersname->sub_cat_6 ?> </strong></td>
        <td><?= ($product1->filter6)? $product1->filter6 : "-"  ?></td>
        <td><?= ($product2->filter6)? $product2->filter6 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter6)? $product3->filter6 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter6)? $product4->filter6 : "-"  ?></td><?php } ?>
      </tr>
      <?php } ?>
       <?php if($filtersname->sub_cat_7) { ?>
      <tr>
        <td><strong> <?= $filtersname->sub_cat_7 ?> </strong></td>
        <td><?= ($product1->filter7)? $product1->filter7 : "-"  ?></td>
        <td><?= ($product2->filter7)? $product2->filter7 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter7)? $product3->filter7 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter7)? $product4->filter7 : "-"  ?></td><?php } ?>
      </tr>
       <?php } ?>
        <?php if($filtersname->sub_cat_8) { ?>
      <tr>
        <td><strong> <?= $filtersname->sub_cat_8 ?></strong></td>
         <td><?= ($product1->filter8)? $product1->filter8 : "-"  ?></td>
        <td><?= ($product2->filter8)? $product2->filter8 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter8)? $product3->filter8 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter8)? $product4->filter8 : "-"  ?></td><?php } ?>
      </tr>
    <?php } ?>
     <?php if($filtersname->sub_cat_9) { ?>
      <tr>
        <td><strong><?= $filtersname->sub_cat_9 ?> </strong></td>
        <td><?= ($product1->filter9)? $product1->filter9 : "-"  ?></td>
        <td><?= ($product2->filter9)? $product2->filter9 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter9)? $product3->filter9 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter9)? $product4->filter9 : "-"  ?></td><?php } ?>
      </tr>
         <?php } ?>
       <?php if($filtersname->sub_cat_10) { ?>
      <tr>
        <td><strong> <?= $filtersname->sub_cat_10 ?>  </strong></td>
        <td><?= ($product1->filter10)? $product1->filter10 : "-"  ?></td>
        <td><?= ($product2->filter10)? $product2->filter10 : "-"  ?></td>
  <?php if(isset($product3)){ ?><td><?= ($product3->filter10)? $product3->filter10 : "-"  ?></td><?php } ?>
  <?php if(isset($product4)){ ?><td><?= ($product4->filter10)? $product4->filter10 : "-"  ?></td><?php } ?>
      </tr>
       <?php } ?>
    </tbody>
  </table>
</div>

    </div>
  </div>

 <?php } ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="<?= base_url();?>assets/web/js/jqueryvalidate.js"></script>
<script src="<?= base_url();?>assets/web/js/compareproduct.js"></script>
