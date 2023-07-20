






<div class="inner-banner">
        <!--<img src="<?= base_url() ?>assets/web/images/inner-banner-1.jpg">-->
        <h2 class="inner-page-head">Frequently Asked Question</h2>
</div>


<div class="faq">
<div class="container">
  <div class="col-sm-4 bdr-ri">
  <ul class="nav nav-tabs" role="tablist">
      <?php $i=1; foreach($faqoption as $val) {  ?>
    <li role="presentation" class="<?=($i == "1")? "active" :""?>"><a href="#home<?=$i?>" aria-controls="home<?=$i?>" role="tab" data-toggle="tab"><?= $val->option ?></a></li>
    <?php $i++; } ?>
  </ul>
</div>
<div class="col-sm-8">
  <!-- Tab panes -->
  <div class="tab-content">

  <?php $j=1; foreach($faqoption as $val) {  ?>

    <div role="tabpanel" class="tab-pane <?=($j == "1")? "active" :""?>" id="home<?=$j?>">
      
        <div class="accordion" id="accordionExample<?=$j?>">
  
 <div class="panel-group" id="accordion<?=$j?>" role="tablist" aria-multiselectable="true">

    <?php $faqlist=$this->m_faqs->getbyoption($val->id); ?>
        <?php if($faqlist)  $i=1; foreach($faqlist as $val) {  ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading<?=$i?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion<?=$j?>" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>">
         <?= $val->question ?>
        </a>
      </h4>
    </div>
    <div id="collapse<?=$i?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?=$i?>">
      <div class="panel-body">
      <?= $val->answer ?>
      </div>
    </div>
  </div>
  <?php  $i++; } ?>
 
</div>
  
</div>
    

    </div>

 <?php  $j++; } ?>

    




    







  </div>
</div>
</div>
</div>