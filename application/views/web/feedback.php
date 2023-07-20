
<div class="clearfix"></div>
<div class="inner-banner">
    <h2 class="inner-page-head">Testimonials</h2>
  </div>

<div class="clearfix"></div>
<div class="testimonials-wrap">
<div class="container">
<div class="nhead11">
      <a class="write-feedback" href="<?= base_url()?>writefeedback"><!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> --> Write your review</a>
    </div>
  
  <div class="clearfix"></div>

   <?php if($feedbacklist){ ?>

    

      
  <div class="news1">

<?php  $i=0; $count=count($feedbacklist);  foreach($feedbacklist as $val) { ?>

<div class="col-12 event1">
<p class="tex"><?= $val->message?></p>
<div class="re">
<div class="col-1"></div>
<div class="col-5 reviews"><h5><i class="fa fa-user" aria-hidden="true"></i> <?= $val->name?> </h5></div>
<div class="col-6 reviews"><p class="rdate"><?= date('d-F-Y  h:i A',strtotime($val->date_inserted)) ?></p>
</div>
</div>
</div>

    <div class="clearfix"></div>
    <div class="rate">
    <?php if($val->rating){  ?>
      <?php for($i=1; $i<=$val->rating; $i++ ){  ?>
    <label for="star5" class="starrating" title="text"></label>

  <?php } } ?>
  </div>
  <div class="clearfix"></div>

<?php  $i++; ?>
<?php if($i==$count){ ?>
<?php  }else{ ?>
 <hr>
<?php } ?>
<?php } ?>

</div>


 
</div>
</div>
 
<?php } ?>
