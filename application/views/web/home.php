<section id="Home">
<div id="multiple">
    <!-- slideshow -->
    <div class="cycle-slideshow" 
        data-cycle-fx=scrollHorz
        data-cycle-timeout=10000
        data-cycle-slides="> div"
        data-cycle-prev=".prevControl"
        data-cycle-next=".nextControl"
        data-cycle-pager="#pager"
        >
        <?php foreach($banner as $val){ ?>
        <div>
        <div class="banner-img"><img src="<?= base_url()?>assets/ipanel/uploads/banner/<?= $val->image ?>"></div>
       </div>
       <?php } ?>

    </div>
    <!-- prev/next links -->
    <div class="icn-holder">
    <span class="prevControl hvr-sweep-to-right"><i class="fa fa-angle-left"></i></span> 
    <span class="nextControl hvr-sweep-to-left"> <i class="fa fa-angle-right"></i></span></div>
    <!--<div class="cycle-pager" id=pager></div>-->
    <!--<div class="center">  </div>-->
    


  </div>
</section>
	
<?php if($todaysdeal){ ?>	
<div class="todays-deal">
	<div class="container-fluid">
	<h3 class="heading-one">Todays Deal <span><a href="#">See all deals</a></span></h3>
	<div class="slider-wrap">
		<div id="owl-demo">

  <?php foreach ($todaysdeal as $key => $val) { 
   $image=base_url().'assets/ipanel/uploads/product_img/'.$val->name;

        $p_name=preg_replace('/[^A-Za-z0-9\-]/', '-',$val->p_name);
        $pname=substrwords($val->p_name,50);
        $id=$this->encrypt->encode($val->id);
        $val->p_id=strreplace_encode($id);
         $dicountedprice=$val->bottom_price-($val->bottom_price * $val->discount / 100);
        $yousave=($val->bottom_price)-$dicountedprice;

  	?>
        	<div class="item">
				<div class="deal-wrap">
			<div class="todays-item-wrap"><img src="<?= $image?>"><span class="discount"><?= $val->discount?>%</span></div>
				

					<div class="todays-item-txt">
					<p><?= $pname ?></p>
	<p class="price-1"><span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span><?= $dicountedprice?> &nbsp; - &nbsp; 
	<span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span><span class="strik"><?= $val->bottom_price?></span></p>
				
					<div class="clearfix"></div>
					<span class="product-discount">Your Save : <i class="fa fa-inr" aria-hidden="true"></i><?= $yousave ?></span>
				</div>
					<a class="btn btn-primary today-deal todays-item-btn-abs" href="#" role="button"> more details..</a>
				
				</div>
			</div>
	<?php } ?>

		</div>
		</div>
	</div>
</div>
<?php } ?>


<div class="about-agri">

<div class="agri-pic">
	<img src="<?= base_url()?>assets/web/images/about-agriculture.jpg">
</div>
<div class="agri-txt">
	<h2 class="agri-heading">Biolife Agrotech Private Limited</h2>
	
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis.</p>
	<a class="btn btn-primary today-deal" href="#" role="button">Read more..</a>
</div>

</div>

<?php if($newarrival){ ?>
<div class="todays-deal">
	<div class="container-fluid">
	<h3 class="heading-one">New Arrivals <span><a href="#">See all deals</a></span></h3>
	<div class="slider-wrap">
		<div id="owl-demo-arrival" class="owl4">


       <?php foreach ($newarrival as $key => $val) { 
   $image=base_url().'assets/ipanel/uploads/product_img/'.$val->name;

        $p_name=preg_replace('/[^A-Za-z0-9\-]/', '-',$val->p_name);
        $pname=substrwords($val->p_name,50);
        $id=$this->encrypt->encode($val->id);
        $val->p_id=strreplace_encode($id);
         $dicountedprice=$val->bottom_price-($val->bottom_price * $val->discount / 100);
        $yousave=($val->bottom_price)-$dicountedprice;

  	?>
        	<div class="item">
				<div class="deal-wrap">
				<div class="todays-item-wrap"><img src="<?= $image?>"><span class="discount"><?= $val->discount?>%</span></div>
				<div class="clearfix"></div>
				<div class="todays-item-txt">


					<p><?= $pname ?></p>
	<p class="price-1"><span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span><?= $dicountedprice?> &nbsp; - &nbsp; 
	<span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span><span class="strik"><?= $val->bottom_price?></span></p>
				
					<div class="clearfix"></div>
					<span class="product-discount">Your Save : <i class="fa fa-inr" aria-hidden="true"></i><?= $yousave ?></span>
					

				</div>
						<a class="btn btn-primary today-deal todays-item-btn-abs" href="#" role="button"> more details..</a>



				</div>
			</div>
	<?php } ?>

			
		</div>
		</div>
	</div>
</div>
<?php } ?>


    <div class="missle-wrap">
		<div class="container-fluid">
			<div class="col-sm-4">
				<div class="pop-brands">
				<h3 class="brand-title">Popular <span>Brands</span></h3>
					<div id="owl-demo-clie">
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-1.jpg"></div>
						</div>
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-2.jpg"></div>
						</div>
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-3.jpg"></div>
						</div>
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-4.jpg"></div>
						</div>
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-5.jpg"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="pop-brands">
				<h3 class="brand-title">Our <span>Associates</span></h3>
					<div id="owl-demo-assoc">
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-1.jpg"></div>
						</div>
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-2.jpg"></div>
						</div>
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-3.jpg"></div>
						</div>
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-4.jpg"></div>
						</div>
						<div class="item">
							<div class="brands-img"><img src="<?= base_url()?>assets/web/images/cli-5.jpg"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="cfu-sect">
				<h3 class="call-update">CALL FOR UPDATES</h3>
				<p>Please enter your 10 digit mobile number to get promotional offer and discounts information.</p>
				
				<form id="call-frm" name="call_update" action="" method="post">

                            <input class="call-txt" type="text" name="call_update_phone" id="call_update_phone" placeholder="Enter 10 digit mobile number" maxlength="10">

                            <input class="Call-btn" type="submit" name="call_update_btn" id="call_update_btn" value="SUBMIT">

                            </form>
				</div>
			</div>
		</div>
	</div>
   