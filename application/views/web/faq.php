
  

<h2 class="inner-page-head">FAQ's</h2>
<div class="faq">
<div class="container">
  <div class="col-sm-4 bdr-ri">
  <ul class="nav nav-tabs" role="tablist">
       <?php $i=1; foreach($faqoption as $val) {  ?>
        <li role="presentation" class="<?=($i == "1")? "active" :""?>"><a href="#tab<?= $i ?>" aria-controls="tab<?= $i ?>" role="tab" data-toggle="tab"><?= $val->option ?></a></li>
    
        <?php $i++; } ?>
      
      </ul>
</div>
<div class="col-sm-8">
  <!-- Tab panes -->
  <div class="tab-content">

    <?php $j=1; foreach($faqoption as $val) {  ?>
  <div role="tabpanel" class="tab-pane <?=($j == "1")? "active" :""?>" id="tab<?= $j ?>">
   <div id="accordion-1" class="accordion">
      <?php $faqlist=$this->m_faqs->getbyoption($val->id); ?>
        <?php if($faqlist)  $i=1; foreach($faqlist as $val) {  ?>

  <h3><?= $val->question ?></h3>
  <div>
    <p>
    <?= $val->answer ?>
    </p>
  </div>
 
      <?php  $i++; } ?>


</div>
</div>

<?php  $j++; } ?>

    


    </div>

 


 
  

 
    



<script>
  $( function() {
    $( ".accordion" ).accordion();
  } );
  </script>
    







  </div>
</div>
</div>
</div><!-- Footer -->

 
   
   
