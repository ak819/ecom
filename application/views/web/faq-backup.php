



<div class="inner-banner">
        <img src="<?= base_url() ?>assets/web/images/inner-banner-1.jpg">
        <h2>Frequently Asked Question</h2>
</div>

<div class="clearfix"></div>
<div class="faq">
<div class="container">
<div class="row">
  <div class="col-4">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <?php $i=1; foreach($faqoption as $val) {  ?>
      <a class="nav-link <?=($i == "1")? "active" :""?>" id="v-tab<?=$i?>" data-toggle="pill" href="#tab<?=$i?>" role="tab" aria-controls="#tab<?=$i?>" aria-selected="true"><?= $val->option ?></a>
     <?php $i++; } ?>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="v-pills-tabContent">
     
     <?php $j=1; foreach($faqoption as $val) {  ?>
      <div class="tab-pane fade <?=($j == "1")? "active show" :""?>" id="tab<?=$j?>" role="tabpanel" aria-labelledby="v-tab<?=$j?>">
      <div class="bs-example">
    <div class="accordion" id="accordionExample<?= $j ?>">
        <?php $faqlist=$this->m_faqs->getbyoption($val->id); ?>
        <?php if($faqlist)  $i=1; foreach($faqlist as $val) {  ?>
        <div class="card">
            <div class="card-header" id="heading<?= $i ?>">
                <h2 class="mb-0">
                    <button type="button" class="btn1 btn-link" data-toggle="collapse" data-target="#collapse<?= $i ?>"><p><i class="fa fa-plus"></i> <?= $val->question ?></p> </button>                                
                </h2>
            </div>
            <div id="collapse<?= $i ?>" class="collapse" aria-labelledby="heading<?= $i ?>" data-parent="#accordionExample<?= $j ?>">
                <div class="card-body">
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
</div>