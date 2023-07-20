<div class="product-inner-section">
    <div class="container-fluid">  
    <div class="product-page-title">
     
     <?php if(isset($info)) {  ?>
    <h4><b><?= (isset($info[0]->subcat_name) AND $info[0]->subcat_name )? ucfirst($info[0]->subcat_name).' / ' : '' ?></b><b><?= ucfirst($info[0]->cat_name)?> (TOTAL PRODUCTS: <?= $info[0]->count?>)</b></h4>
    <?php   } ?>

 <form action="<?= base_url()?>filterproducts" method="get" id="filterform" enctype="multipart/form-data">
  <?php   $cat_id=(isset($_GET['ref']) AND $_GET['ref'])? $_GET['ref']    : $this->uri->segment(2); ?>
  <?php   $subcat_id=(isset($_GET['ref1']) AND $_GET['ref1'])? $_GET['ref1']: ""; ?>
  <?php   $subsubcat_id=(isset($_GET['ref2']) AND $_GET['ref2'])? $_GET['ref2']:""?>

  <input type="hidden" name="ref" id="cat_id" value="<?= $cat_id ?>"/> 
  <input type="hidden" name="ref1" id="subcat_id" value="<?= $subcat_id ?>"/> 
  <input type="hidden" name="ref2" id="subsubcat_id" value="<?= $subsubcat_id ?>"/>  


    <ul class="sort-by-list">
        <li>
            Sort By :
        </li>
        <li>
                                        <select class="select-categories" id="sort_by_select" name="sort" onchange="this.form.submit()">
                                            <option value="">..Select..</option>
                                            <option value="price_high_to_low" <?= (isset($_GET['sort']) AND $_GET['sort'] == "price_high_to_low")? "selected" : ""?>>Price High to Low</option>
                                            <option value="price_low_to_high" <?= (isset($_GET['sort']) AND $_GET['sort'] == "price_low_to_high")? "selected" : ""?>>Price Low to High</option>
                                            <option value="popularity" <?= (isset($_GET['sort']) AND $_GET['sort'] == "popularity")? "selected" : ""?>>Popularity</option>
                                            <option value="discount" <?= (isset($_GET['sort']) AND $_GET['sort'] == "discount")? "selected" : ""?>>Discount</option>
                                        </select>
        </li>
                                
    </ul>
    </div>
    
        <div class="col-sm-3">
        <?php if(isset($category) AND $category){ ?>    
        <h4 class="product-list-title">Category</h4>
        <div class="side-inner-links">
            <ul class="product-inner-lst">
                <?php foreach($category as $val){  $id=$this->encrypt->encode($val->id); ?>
                <li><a class="ref1" href="javascript:void(0)" data-id="<?= $id=strreplace_encode($id); ?>"><?= $val->name ?> (<?= $val->count ?>)</a></li>
                <?php } ?>
            </ul>
        </div>
        <?php  } ?>

         <?php if(isset($subcategory) AND $subcategory){ ?>    
        <h4 class="product-list-title">Category</h4>
        <div class="side-inner-links">
            <ul class="product-inner-lst">
                <?php foreach($subcategory as $val){ $id=$this->encrypt->encode($val->id);?>
                <li><a class="ref2" href="javascript:void(0)" data-id="<?= $id=strreplace_encode($id); ?>"><?= $val->name ?> (<?= $val->count ?>)</a></li>
                <?php } ?>
            </ul>
        </div>
        <?php  } ?>


         <?php if(isset($Maincategory) AND $Maincategory){ ?>    
        <h4 class="product-list-title">Our Category</h4>
        <div class="side-inner-links">
           <ul class="product-inner-lst">
                <?php foreach($Maincategory as $val){  $id=$this->encrypt->encode($val->cat_id); ?>
                <li><a class="" href="<?= base_url()?>products/<?= $id=strreplace_encode($id); ?>/<?= preg_replace('/[^A-Za-z0-9\-]/', '-', $val->cat_name);?>" ><?= $val->cat_name ?> (<?= $val->count ?>)</a></li>
                <?php } ?>
            </ul>
        </div>
        <?php  } ?>


    
        <?php if(isset($brandlist) AND $brandlist){ ?>
        <h4 class="product-list-title">Company Manufacture</h4>
        
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
        <div class="side-list-1">
        <ul class="product-inner-lst" id="filt2">
          <?php foreach($brandlist as $val){ ?>                       
            <li>
            <span><input type="checkbox" class="" name="brand[]" value="<?= $val->id ?>"/></span>
            <label><?= $val->name ?></label>
            </li>
            <?php } ?>                                           
        </ul>
        </div>
         <?php  } ?>   
            
              <?php if(isset($volumelist) AND $volumelist){ ?>
            <h4 class="product-list-title">Size / Volume</h4>
            <div class="size-wrap">
                <ul class="product-inner-lst"> 
                 <?php foreach($volumelist as $val){ ?>             
                    <li>
                    <span><input type="checkbox"  class="filter"  name="unit[]" value="<?= $val->name ?>" <?= (isset($_GET['unit']) AND in_array($val->name,$_GET['unit']))? "checked" : ""?>/></span>
                    <label><?= $val->name ?></label>
                    </li>
                   <?php } ?>                                         
                </ul>
            </div>
             <?php  } ?>   
            
            
            <div class="price-range">

          <div class="ui-container">
               
                <div class="slider-range2">
                 <h4 class="product-list-title">Price Range</h4>

                  <div class="slider-range"></div>
                  <input type="text" id="min" name="min-price" value="" readonly>
                  <input type="text" id="max"  name="max-price" value="" readonly>


                </div>
                
        </div>
        
        </div>
        <button type="submit" class="btn-primary"></button>
    </form>
        </div>
        <div class="col-sm-9">
         <div id="productlist">



        </div>
         <hr>
         <div id="pagination"></div> 
            
    </div>
</div>


<script src="<?= base_url()?>assets/web/js/jquery.mCustomScrollbar.concat.min.js"></script>

<script>
$("#filt2").mCustomScrollbar({
          scrollButtons:{enable:true},
          theme:"light-thick",
          scrollbarPosition:"outside"
        });
</script>
<script>
$(function() {
    var minvalue=parseInt("<?= (isset($_GET['min-price']))? $_GET['min-price']  : $min_range ?>");
    var maxvalue=parseInt("<?= (isset($_GET['max-price']))? $_GET['max-price']  : $max_range ?>");
    var minrange="<?= $min_range ?>";
    var maxrange="<?= $max_range ?>";
   
    $( ".slider-range" ).slider({
      range: true,
      min: parseInt(minrange),
      max: parseInt(maxrange),
      //step: 0,     
      values: [minvalue,  maxvalue],
      slide: function( event, ui ) {
        $( "#min" ).val(ui.values[ 0 ]);
        $( "#max" ).val(ui.values[ 1 ]);

         console.log($('#min').val());
         console.log($('#max').val());

          $('#filterform').submit();
      }
    });
    $( "#min" ).val( $( ".slider-range" ).slider( "values", 0 ) );
    $( "#max" ).val( $( ".slider-range" ).slider( "values", 1 ) );
  });


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
         
        var ref=$('#cat_id').val();
        var ref1=$('#subcat_id').val();
        var ref2=$('#subsubcat_id').val();
        var filt=$('#sort_by_select').val();
        var min=$('#min').val();
        var max=$('#max').val();
        console.log(min);
        console.log(max);
       $.ajax({
        url:'<?=base_url()?>loadprdoucts/'+pagno,
        type:'post',
        dataType:'json',
        data:{
         ref:ref,
         ref1:ref1,
         ref2:ref2,
         minprice:min,
         maxprice:max,
         sortby:filt,
         brand:"<?= (isset($_GET['brand']) AND !empty($_GET['brand'])) ? implode(',',$this->input->get('brand')) : ""  ?>",
         unit:"<?= (isset($_GET['unit']) AND !empty($_GET['unit'])) ? implode(',',$_GET['unit']) : ""  ?>",
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
      $("#"+id).append('<li class="noresult"><b>No result found..!</b></li>');
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
  $(".ref1").on("click", function(){
    var $target=$(this);
    var id= $target.data('id');

     $('#subcat_id').val(id);
     $('#filterform').submit();

  });
  $(".ref2").on("click", function(){
    var $target=$(this);
    var id= $target.data('id');

     $('#subsubcat_id').val(id);
     $('#filterform').submit();

  });
});
 $(document).ready(function(){
  $(".filter").on("click", function(){

     $('#filterform').submit();

  });
});
</script>