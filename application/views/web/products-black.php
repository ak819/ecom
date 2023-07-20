
<div class="Resart">
<div class="container-fluid">
	<?php $buttonflag=$this->uri->segment(1);
    $cat_id=(isset($_GET['ref']) AND $_GET['ref'])? $_GET['ref']    : $this->uri->segment(2);

  
    $cat_name=str_replace('%20',' ', $this->uri->segment(3));?>
 
</div>
</div>
  <div class="compare-box"> 
    <div class="container-fluid">
      <div class="col-sm-12">
     <?php if($buttonflag  == "myproducts") { ?>
  <a href="<?= $url ?>"><button class="reset-1" type="button">Reset filters</button></a> 
    <?php } ?>
  </div>
  </div>
  </div>
    <div class="clearfix"></div>
    
			<div class="container-fluid">
              
				<div class="col-sm-3">
          
	     <div class="side-wrap">
		<form action="<?= base_url()?>myproducts" method="get" id="filterform" >


			<div class="inner-list-wrap-top">
			<div class="dropdownbox">
  				<p><i class="fa fa-caret-right"></i><?= ($filters) ? $filters[0]->cat_name : $cat_name ?></p>
			</div>


       <input type="hidden" name="ref" id="cat_id" value="<?= ($filters) ?  $filters[0]->cat_id : $cat_id ?>" /> 
        <input type="hidden" name="searchkey" value="<?= (isset($_GET['searchkey']))? $_GET['searchkey']  : "" ?>" /> 
       <input type="hidden" name="filt1"  id="filt1" value="<?= (isset($_GET['filt1']))? $_GET['filt1']  : "" ?>"  />  



     
     <?php if($filters AND $filters[0]->sub_cat_1) { ?>
	<div>
          <ul id="myList">
           <?php $filt1=$this->m_category->getActiveSub($filters[0]->cat_id,1);  if($filt1) { foreach($filt1 as $val) { ?>
			  <li><?php if(isset($_GET['filt1']) AND $_GET['filt1'] == $val->id){ echo "<i class='fa fa-caret-right'></i>"; } ?><a class="filt1" href="javascript:void(0)" data-id="<?= $val->id ?>"><?= $val->name ?></a></li>
                 <?php } } ?>

			</ul>

		
		<div id="loadMore">Load more</div>
		<div id="showLess">Show less</div>

	</div>
	<?php } ?>	

				<!--  <h3 class="list-heading">Price</h3> -->
				<div class="price-range">

          <div class="ui-container">
               
                <div class="slider-range2">
                 <p>Price Range</p>
                  <div class="slider-range"></div>
                  <input type="text" id="min" name="min-price"  readonly>
                  <input type="text" id="max"  name="max-price" readonly>


                </div>
                
        </div>
				
	<!-- 	<div class="ui-container">
               
			<div class="range-filter">
            
            <div class="price-controls">
               
                <input class="min-price" name="min-price" id="min"   placeholder="min" type="text" value="<?= (isset($_GET['min-price']))? $_GET['min-price']  : "" ?>">
                <input class="max-price" name="max-price" id="max"  placeholder="max" type="text" value="<?= (isset($_GET['max-price']))? $_GET['max-price']  : "" ?>">
                <button type="button" class="filter" >GO</button>
            </div>
        </div>
		</div> -->

  
<!--
  <?php if($brandlist) { ?>
			 <h3 class="list-heading">Brand</h3>
       <div>
      <ul id="brand"> 

        <?php if(isset($_GET['brand']) AND !empty($_GET['brand'])) {  foreach($brandlist as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['brand']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="brand[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($brandlist as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['brand']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="brand[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
          	  <?php  foreach($brandlist as $val) { ?>
			    		<li> 
							<input type="checkbox"   class="filter" name="brand[]"  value="<?= $val->id ?>">
			    			<label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
						</li>
			   		 <?php  } } ?>	
            			
			 </ul>
		<div id="brandload">Load more</div>
		<div id="brandless">Show less</div>

	  </div> 
	<?php } ?>-->		

<?php if($filters AND $filters[0]->sub_cat_2) { ?>
   <?php $filt2=$this->m_category->getActiveSub($filters[0]->cat_id,2);  if($filt2) {  ?>
   <div class="outer-scroll-wrap">
			 <h3 class="list-heading"><?= $filters[0]->sub_cat_2?></h3>
       <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search2" data-id="filt2" placeholder="Search...">
            <span class="sp-1">
              <i class="fa fa-times closesearch" data-id="search2" data-listid="filt2" aria-hidden="true"></i>
            </span>
            <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>
       <div class="inner-list-wrap">
       <div >
      <ul id="filt2"> 
          	 

              <?php if(isset($_GET['filt2']) AND !empty($_GET['filt2'])) {  foreach($filt2 as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['filt2']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt2[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt2 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt2']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt2[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt2 as $val) { ?>
            <li> 
              <input type="checkbox"   class="filter" name="filt2[]"  value="<?= $val->id ?>">
              <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>  	
                
            			
			 </ul>
		

	  </div> 
  </div>
</div>
	<?php } } ?>				
				
	<?php if($filters AND $filters[0]->sub_cat_3) { ?>
   <?php $filt3=$this->m_category->getActiveSub($filters[0]->cat_id,3);  if($filt3) { ?>
  <div class="outer-scroll-wrap">		
				 <h3 class="list-heading"><?= $filters[0]->sub_cat_3 ?></h3>
          <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search3" data-id="filt3" placeholder="Search...">
          <span class="sp-1"><i class="fa fa-times closesearch" data-id="search3" data-listid="filt3" aria-hidden="true"></i></span>
           <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>

        <div class="inner-list-wrap">
				<div>
          <ul id="filt3">
	 
			    		  <?php if(isset($_GET['filt3']) AND !empty($_GET['filt3'])) {  foreach($filt3 as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['filt3']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt3[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt3 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt3']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt3[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt3 as $val) { ?>
              <li> 
              <input type="checkbox"   class="filter" name="filt3[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>    
               	
            			
			</ul>
	
	</div>
  </div>
  </div>
	<?php } } ?>	

	<?php if($filters AND $filters[0]->sub_cat_4) { ?>	
    <?php $filt4=$this->m_category->getActiveSub($filters[0]->cat_id,4);  if($filt4) { ?>
    <div class="outer-scroll-wrap">
				 <h3 class="list-heading"><?= $filters[0]->sub_cat_4 ?></h3>
           <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search4" data-id="filt4" placeholder="Search...">
           <span class="sp-1"><i class="fa fa-times closesearch" data-id="search4" data-listid="filt4" aria-hidden="true"></i></span>
            <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>
           <div class="inner-list-wrap">
           <div>
				<ul id="filt4">
		 
				<?php if(isset($_GET['filt4']) AND !empty($_GET['filt4'])) {  foreach($filt4 as $val) { ?>
        <?php if (in_array($val->id,array_reverse($_GET['filt4']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt4[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt4 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt4']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt4[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt4 as $val) { ?>
              <li> 
              <input type="checkbox"   class="filter" name="filt4[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>    
             

				
				</ul>
		
	</div>
  </div>
  </div>
<?php } }?>	


<?php if($filters AND $filters[0]->sub_cat_5) { ?>	
   <?php $filt5=$this->m_category->getActiveSub($filters[0]->cat_id,5);  if($filt5) {?>
  <div class="outer-scroll-wrap">
				 <h3 class="list-heading"><?= $filters[0]->sub_cat_5 ?></h3>
          <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search5" data-id="filt5" placeholder="Search...">
          <span class="sp-1"><i class="fa fa-times closesearch" data-id="search5" data-listid="filt5" aria-hidden="true"></i></span>
           <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>
        <div class="inner-list-wrap">
        <div>
				<ul id="filt5">

					
					 <?php if(isset($_GET['filt5']) AND !empty($_GET['filt5'])) {  foreach($filt5 as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['filt5']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt5[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt5 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt5']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt5[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt5 as $val) { ?>
              <li> 
              <input type="checkbox"   class="filter" name="filt5[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>    
             
				</ul>
    
  </div>
 </div>
 </div>
		<?php } } ?>

			<?php if($filters AND $filters[0]->sub_cat_6) { ?>
      <?php $filt6=$this->m_category->getActiveSub($filters[0]->cat_id,6);  if($filt6) {  ?>
      <div class="outer-scroll-wrap">	
				 <h3 class="list-heading"><?= $filters[0]->sub_cat_6 ?></h3>
          <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search6" data-id="filt6" placeholder="Search...">
          <span class="sp-1"><i class="fa fa-times closesearch" data-id="search6" data-listid="filt6" aria-hidden="true"></i></span>
           <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>
        <div class="inner-list-wrap">
        <div>
				<ul id="filt6">
					
					   <?php if(isset($_GET['filt6']) AND !empty($_GET['filt6'])) {  foreach($filt6 as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['filt6']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt6[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt6 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt6']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt6[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt6 as $val) { ?>
              <li> 
              <input type="checkbox"   class="filter" name="filt6[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>    
             
				</ul>
     
  </div>
</div>
</div>
<?php } }?>	
<?php if($filters AND $filters[0]->sub_cat_7) { ?>
  <?php $filt7=$this->m_category->getActiveSub($filters[0]->cat_id,7);  if($filt7) { ?>
<div class="outer-scroll-wrap">	
				 <h3 class="list-heading"><?= $filters[0]->sub_cat_7 ?></h3>
           <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search7" data-id="filt7" placeholder="Search...">
          <span class="sp-1"><i class="fa fa-times closesearch" data-id="search7" data-listid="filt7" aria-hidden="true"></i></span>
           <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>
        <div class="inner-list-wrap">
        <div>
				<ul id="filt7">
					
				<?php if(isset($_GET['filt7']) AND !empty($_GET['filt7'])) {  foreach($filt7 as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['filt7']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt7[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt7 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt7']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt7[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt7 as $val) { ?>
              <li> 
              <input type="checkbox"   class="filter" name="filt7[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>    
             
				</ul>
       
  </div>
</div>
</div>
<?php } } ?>	

<?php if($filters AND $filters[0]->sub_cat_8) { ?>
 <?php $filt8=$this->m_category->getActiveSub($filters[0]->cat_id,8);  if($filt8) {?>
  <div class="outer-scroll-wrap">
				 <h3 class="list-heading"><?= $filters[0]->sub_cat_8 ?></h3>
          <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search8" data-id="filt8" placeholder="Search...">
          <span class="sp-1"><i class="fa fa-times closesearch" data-id="search8" data-listid="filt8" aria-hidden="true"></i></span>
           <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>
        <div class="inner-list-wrap">
				<div>
        <ul id="filt8">
					
					    <?php if(isset($_GET['filt8']) AND !empty($_GET['filt8'])) {  foreach($filt8 as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['filt8']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt8[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt8 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt8']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt8[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt8 as $val) { ?>
              <li> 
              <input type="checkbox"   class="filter" name="filt8[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>    
             
						
				</ul>
        
  </div>
  </div>
</div>
<?php }  }?>

<?php if($filters AND $filters[0]->sub_cat_9) { ?>
  <?php $filt9=$this->m_category->getActiveSub($filters[0]->cat_id,9);  if($filt9) { ?>
  <div class="outer-scroll-wrap">

				 <h3 class="list-heading"><?= $filters[0]->sub_cat_9 ?></h3>
          <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search9" data-id="filt9" placeholder="Search...">
           <span class="sp-1"><i class="fa fa-times closesearch" data-id="search9" data-listid="filt9" aria-hidden="true"></i></span>
            <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>
        <div class="inner-list-wrap">
				<div>
        <ul id="filt9">
				
					    <?php if(isset($_GET['filt9']) AND !empty($_GET['filt9'])) {  foreach($filt9 as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['filt9']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt9[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt9 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt9']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt9[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt9 as $val) { ?>
              <li> 
              <input type="checkbox"   class="filter" name="filt9[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>    
              
				</ul>
     
  </div>
</div>
</div>
	<?php } } ?>



	<?php if($filters AND $filters[0]->sub_cat_10) { ?>
    <?php $filt10=$this->m_category->getActiveSub($filters[0]->cat_id,10);  if($filt10) {  ?>
   <div class="outer-scroll-wrap">
                                 <h3 class="list-heading"><?= $filters[0]->sub_cat_10 ?></h3>
                                 <div class="form-group">
          <div class="input-grp">

            <input type="text" class="form-control searchfilter" id="search10" data-id="filt10" placeholder="Search...">
        <span class="sp-1"><i class="fa fa-times closesearch" data-id="search10" data-listid="filt10" aria-hidden="true"></i></span>
         <span class="sp-2">
              <i class="fa fa-search search-tag"  aria-hidden="true"></i>
            </span>
          </div>
        </div>
                                <div class="inner-list-wrap">
                                <div>
        <ul id="filt10">
       
        <?php if(isset($_GET['filt10']) AND !empty($_GET['filt10'])) {  foreach($filt10 as $val) {?>
        <?php if (in_array($val->id,array_reverse($_GET['filt10']))) { ?>
          <li class="actives"> 
            <input type="checkbox"   class="filter" name="filt10[]"  value="<?= $val->id ?>" checked>
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>
        <?php } ?>
       <?php  foreach($filt10 as $val) {?>
        <?php if (!in_array($val->id,array_reverse($_GET['filt10']))) { ?>
          <li> 
              <input type="checkbox"   class="filter" name="filt10[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>

        <?php } ?>

         <?php }}else{ ?>
              <?php  foreach($filt10 as $val) { ?>
              <li> 
              <input type="checkbox"   class="filter" name="filt10[]"  value="<?= $val->id ?>">
                <label class="checkbox-label" for="checkbox1"><?= $val->name ?></label>
            </li>
             <?php  } } ?>    
             
                                </ul>
     
  </div>
</div>
</div>
        <?php }  }?>
        

	</div>

			</div>
			
			</form>

			</div>
    </div>
			
<div class="col-sm-9" >
<div id="productlist">

	


		</div>
    <div id="pagination"></div> 
</div>
</div>
<div class="clearfix"></div>



<script>
$(document).ready(function () {
    myList = $("#myList li").size();
    if(myList <= 4)
    {
      $('#loadMore').css('display','none');
      $('#showLess').css('display','none');
    }
    x=4;
    $('#myList li:lt('+x+')').css('display','block');
    $('#loadMore').click(function () {
        x= (x+5 <= myList) ? x+5 : myList;
        $('#myList li:lt('+x+')').css('display','block');
    });
    $('#showLess').click(function () {
      var el = $('#myList li').filter(function() {
       return $(this).css('display') == 'block';
      });
       x=el.length - 4;
       if(x < 4)
       {
       	x=4;
       }
       $('#myList li').css('display','none');
       $('#myList li:lt('+x+')').css('display','block');
    });
});
</script> 

<!-- <script>
$(document).ready(function () {
    brand = $("#brand li").size();
     if(brand <= 4)
    {
      $('#brandload').css('display','none');
      $('#brandless').css('display','none');
    }
    x=$("#brand li").size();
    $('#brand li:lt('+x+')').css('display','block');
    $('#brandload').click(function () {
        x= (x+5 <= brand) ? x+5 : brand;
        $('#brand li:lt('+x+')').css('display','block');
    });
    $('#brandless').click(function () {
      var el = $('#brand li').filter(function() {
       return $(this).css('display') == 'block';
      });
       x=el.length - 4;
       if(x < 4)
       {
       	x=4;
       }
       $('#brand li').css('display','none');
       $('#brand li:lt('+x+')').css('display','block');
    });
});
</script> 
 -->
<!-- 2 -->


    <script>
      $(".ui-slider-handle").blur(function(){
  alert("This input field has lost its focus.");
});

      $(".ui-slider-handle").focusout(function(){
  alert("This input field has lost its focus.");
});

  $(function() {
    var minvalue="<?= (isset($_GET['min-price']))? $_GET['min-price']  : "0" ?>";
    var maxvalue="<?= (isset($_GET['max-price']))? $_GET['max-price']  : "72000" ?>";
    var minrange="<?= $min_range ?>";
    var maxrange="<?= $max_range ?>";

    $( ".slider-range" ).slider({
      range: true,
      min: parseInt(minrange),
      max: parseInt(maxrange),
      step: 50,     
      values: [minvalue,  maxvalue],
      slide: function( event, ui ) {
        $( "#min" ).val(ui.values[ 0 ]);
        $( "#max" ).val(ui.values[ 1 ]);

         $('#filterform').submit();
      }
    });
    $( "#min" ).val( $( ".slider-range" ).slider( "values", 0 ) );
    $( "#max" ).val( $( ".slider-range" ).slider( "values", 1 ) );
  });
</script>


  <script type='text/javascript'>
   $(document).ready(function(){

    loadproducts(1);

    });

      $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');

       loadproducts(pageno);
       //$(window).scrollTop(0);

     });

        function loadproducts(pagno){
         
        var cat_id=$('#cat_id').val();
        var filt1=$('#filt1').val();
        var min=$('#min').val();
        var max=$('#max').val();
        //console.log(type);

       $.ajax({
        
        url: '<?=base_url()?>loadprdoucts/'+pagno,
        type: 'post',
        dataType: 'json',
        data:{

         cat_id:cat_id,
         brand:"<?= (isset($_GET['brand']) AND !empty($_GET['brand'])) ? implode(',',$this->input->get('brand')) : ""  ?>",
         searchkey:"<?= (isset($_GET['ref2']) AND !empty($_GET['ref2'])) ? $this->input->get('ref2') : ""  ?>",
         minprice:min,
         maxprice:max,
         filt1:filt1,

         filt2:"<?= (isset($_GET['filt2']) AND !empty($_GET['filt2'])) ? implode(',',$_GET['filt2']) : ""  ?>",
         filt3:"<?= (isset($_GET['filt3']) AND !empty($_GET['filt3'])) ? implode(',',$_GET['filt3']) : ""  ?>",
         filt4:"<?= (isset($_GET['filt4']) AND !empty($_GET['filt4'])) ? implode(',',$_GET['filt4']) : ""  ?>",
         filt5:"<?= (isset($_GET['filt5']) AND !empty($_GET['filt5'])) ? implode(',',$_GET['filt5']) : ""  ?>",
         filt6:"<?= (isset($_GET['filt6']) AND !empty($_GET['filt6'])) ? implode(',',$_GET['filt6']) : ""  ?>",
         filt7:"<?= (isset($_GET['filt7']) AND !empty($_GET['filt7'])) ? implode(',',$_GET['filt7']) : ""  ?>",
         filt8:"<?= (isset($_GET['filt8']) AND !empty($_GET['filt8'])) ? implode(',',$_GET['filt8']) : ""  ?>",
         filt9:"<?= (isset($_GET['filt9']) AND !empty($_GET['filt9'])) ? implode(',',$_GET['filt9']) : ""  ?>",
         filt10:"<?= (isset($_GET['filt10']) AND !empty($_GET['filt10'])) ? implode(',',$_GET['filt10']) : ""  ?>",
          },

      success: function(response){

      	//alert(response);

      $('#pagination').html(response.pagination);
                
       $('#productlist').empty();
    
       if(response.products!="")
       {
        
       $('#productlist').append(response.products);

       }
   

  $('html, body').animate({scrollTop: $("#Home").offset().top}, 'slow');

        }

     
       });
     }

  $('.searchfilter').bind('keyup', function() {
   $('.noresult').remove();
   var searchString = $(this).val();
   var id=$(this).attr('data-id');
   var thisid=$(this).attr('id');
   var i=0;
    $("#"+id+" li").each(function(index, value) {
        currentName = $(value).text()
        if( currentName.toUpperCase().indexOf(searchString.toUpperCase()) > -1) {
          i++;
           $(value).show();
       $('#'+thisid).next().css('display','block');
        } else {
            $(value).hide();
           $('#'+thisid).next().css('display','block');
        }
        
    });
    if(i< 1)
    {
      $("#"+id).append('<li class="noresult">No result found</li>');
       $('#'+thisid).next().css('display','block');
    }
   });

   $(".closesearch").on("click", function(){
    $('.noresult').remove();
    var $target=$(this);
    var id= $target.data('id');
    var listid=$target.data('listid');
     $('#'+id).val('');
     $('#'+listid+' li').show();
     $(this).css('display','none');

  });
  
  $(document).ready(function(){
  $(".filt1").on("click", function(){
  	var $target=$(this);
  	var id= $target.data('id');

     $('#filt1').val(id);
     $('#filterform').submit();


  });
});
 $(document).ready(function(){
  $(".filter").on("click", function(){

     $('#filterform').submit();

  });
});



   </script>