

	<div class="order-placed">
		<div class="container">
			<div class="success-wrap-1">
	<?php if($status == "Success") { ?>		
			<div class="success">
				<img src="<?= base_url() ?>assets/web/img/success-ful.png">
			</div>
			<h4 class="success-f">your order placed successfully</h4>
			<p class="success-f">thankyou for shopping with us</p>
<ul class="success-list">
	<li>your order id is :#<?= $order_id?></li>
	<li>your payment status is :<?= $status?> </li>
	<li>an email with all details has been sent to :<br> <span><a href="#" class="ee-mail"><?= $email ?></span></a></li>
</ul>

<p style="text-align: center;"><a class="btn cs-btn" href="<?= base_url() ?>" role="button">Continue Shopping</a></p>

 <?php }elseif($status !== "Success" AND empty(!$status)){ ?>

<div class="success">
				<img src="<?= base_url() ?>assets/web/img/worong-ful.png">
			</div>
<h4 class="success-f">your order not placed successfully</h4>
<ul class="success-list">
<li>due to uncomplete payment</li>
	<li>please <a href="<?= base_url() ?>makepayment" class="ee-mail">reorder</a> or <a href="<?= base_url() ?>" class="ee-mail">continue shopping</a></li>

</ul>
<?php }else{ ?>

	<div class="success-wrap">

	<div class="success">
				<img src="<?= base_url() ?>assets/web/img/worong-ful.png">
			</div>
<h4 class="success-f">Somthing went wrong please contact us</h4>

<ul class="success-list">
	<li>please <a href="<?= base_url() ?>makepayment">reorder</a> or <a href="<?= base_url() ?>">continue shopping</a></li>
</ul>
</div>
<?php } ?>


		</div>
	</div>
</div>
