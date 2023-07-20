<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/favicon.ico">
<title>Biolife Agrotech</title>
<!-- Bootstrap core CSS -->
<link href="<?= base_url()?>assets/web/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->

<link href="<?= base_url()?>assets/web/style.css" rel="stylesheet">
<link href="<?= base_url()?>assets/web/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url()?>assets/web/css/demo-slideshow.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link ref="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js">
<link rel="stylesheet" href="<?= base_url()?>assets/web/css/slicknav.css"/>
<link rel="stylesheet" href="<?= base_url()?>assets/web/css/owl.carousel.css">
<link href="<?= base_url()?>assets/web/css/owl.theme.css" rel="stylesheet">
<link href="<?= base_url()?>assets/web/css/menuzord.css" rel="stylesheet">
<link href="<?= base_url()?>assets/web/css/jquery.mCustomScrollbar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/web/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/web/css/slick-theme.css">
<script type="text/javascript" src="<?= base_url()?>assets/web/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url()?>assets/web/js/jquery.slicknav.js"></script>
<script src="<?= base_url()?>assets/web/js/jquery-ui.js"></script>
<script src="<?= base_url()?>assets/web/js/jquery.cycle2.js"></script>

<script src="<?= base_url()?>assets/web/js/appath.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 <script type="text/javascript">
    
    $(document).ready(function() {
      if(localStorage.products)
      {
  var products = JSON.parse(localStorage.products);
   newproducts = $.grep(products, function (value, index) {
        return value.quantity != 0;
    });   
   
  localStorage.products=JSON.stringify(newproducts);
     }else{

    localStorage.products=[];   
     }
     
  $.post(appRoot+"updatecart", {products:localStorage.products}, function(data){ 
    });

 });
  </script>

</head>
<body role="document" id="Home">
<div class="top-contact">
  <div class="container">
    <ul>
      <li><i class="fa fa-phone" aria-hidden="true"></i> 99708353099</li>
      <li><i class="fa fa-envelope" aria-hidden="true"></i> abcxyz.gmail.com</li>
    </ul>
  </div>
</div>
<div class="header-for-mobile">

  <div class="container">
    <div class="logo"> <a href="#" title="Biolife Agrotech"><img src="<?= base_url()?>assets/web/images/logo-1.png" alt="Biolife Agrotech"></a> </div>
    <div class="search-bx-mob">
        <form id="search-frm" name="call_update" action="" method="post">

                            <input class="search-txt" type="text" name="call_update_phone" id="call_update_phone" placeholder="Search product" maxlength="10">
                            
                            <button class="btn btn-primary" id="search-submit"  type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

                            

            </form>
    </div>
  </div>
</div>
<section id="header">
<div class="top-phone-strip">
  <div class="container">
  <ul>
    <li><i class="fa fa-phone" aria-hidden="true"></i> 99708353099</li>
    <li><i class="fa fa-envelope" aria-hidden="true"></i> abcxyz.gmail.com</li>
  </ul>
  </div>
</div>
  <div class="header-bg nav">
  

    <div class="container-fluid">
    <div class="logo"> <a href="<?= base_url()?>" title="Biolife Agrotech"><img src="<?= base_url()?>assets/web/images/logo-1.png" alt="Biolife Agrotech"></a> </div>
    
        <div class="search-bx">
  <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
      </span>
    </div><!-- /input-group -->
</div>
    
    <i class="fa fa-user-circle" aria-hidden="true"></i>
    <div class="login-cart">

    <div class="login-reg">
      <ul class="login-lst">
        <?php if($this->session->userdata('user_id')){
         
           $username=explode(' ',$this->session->userdata('name')); ?>

            <li>
          <i class="fa fa-user-circle" aria-hidden="true"></i>
          <a href="#"> Hi, <?= ucwords($username[0]); ?></a>
          <div class="my-acc-dropdn">
            <ul>
              <li><a href="<?= base_url()?>myaccount">My Account</a></li>
              <li><a href="<?= base_url()?>myorders">My Order</a></li>
              <li><a href="<?= base_url()?>wishlist">My Wishlist</a></li>
              <li><a href="<?= base_url()?>myaddress">My Address</a></li>
              <li><a href="<?= base_url()?>logout">Logout</a></li>
            </ul>
          </div>
        </li>

            <?php  }else {?>
             
             <li><a href="<?= base_url()?>login">Login</a></li> 
             <li><a href="<?= base_url()?>register">Register </a></li> 
 
            <?php } ?>
      </ul>
    </div>
    <a href="<?= base_url()?>cart">
    <div class="cart"><img src="<?= base_url()?>assets/web/images/cart-green.png" class="my-cart-icon"> <span class="product-number badge badge-notify my-cart-badge"></span></div>
        </div>
     </a>
    
    </div>
  </div>
</section>

<div class="content">

  <ul class="login-for-mobile">
    <li><a href="#">Login</a></li>
    <li><a href="#">Register</a></li>
    <li><a href="#">Sign in</a></li>
    <li><a href="#" class="br-nr"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> <span class="price-tag">3</span></li>
    
    
  </ul>
      <div class="container-fluid">
      <div id="menuzord" class="menuzord red">
        
        <ul class="menuzord-menu">

    <?php  $category=$this->m_category->getActive(); foreach($category as $val) {
      $id=$this->encrypt->encode($val->cat_id); 
      ?>
        <li class="active"><a href="<?= base_url()?>products/<?= $id=strreplace_encode($id); ?>/<?= preg_replace('/[^A-Za-z0-9\-]/', '-', $val->cat_name);?>"><?= $val->cat_name ?></a>

    <?php  $subcat=$this->m_category->getSubActive($val->cat_id); if($subcat){ ?>
            <div class="megamenu">
              <div class="megamenu-row">
              <div class="col-sm-6">
              

              <h3 class="list-heading">SHOP BY CATEGORIES</h3>
              
              <ul class="drop-dn-lst">
                <?php foreach($subcat as $sub)  {  
                  $subid=$this->encrypt->encode($sub->id); ?>
                <li><a href="<?= base_url()?>filterproducts?ref=<?= $id=strreplace_encode($id); ?>&ref1=<?= $subid=strreplace_encode($subid); ?>&ref2=&sort=&min-price=0&max-price=0&for=<?= preg_replace('/[^A-Za-z0-9\-]/', '-', $sub->name); ?>"><?= $sub->name ?> (<?= $sub->count?>) ></a>
               <?php  $subsubcat=$this->m_category->getSubSubActive($val->cat_id,$sub->id); if($subsubcat) {?>
                  <ul class="inner-lst">
                  <?php foreach ($subsubcat as $subsub) {  
                     $subsubid=$this->encrypt->encode($subsub->id); ?>
            <li><a href="<?= base_url()?>filterproducts?ref=<?= $id=strreplace_encode($id); ?>&ref1=<?= $subid=strreplace_encode($subid); ?>&ref2=<?= $subsubid=strreplace_encode($subsubid); ?>&sort=&min-price=0&max-price=0&<?= preg_replace('/[^A-Za-z0-9\-]/', '-', $subsub->name); ?>"><?= $subsub->name ?> (<?= $subsub->count ?>)</a></li>
                  <?php } ?>
                  </ul>
                <?php } ?>
                </li>
              <?php } ?>
              </ul>
              </div>
              
              <div class="col-sm-6">
              
              <h3 class="list-heading">SHOP BY SIZE/VOLUME</h3>
              <ul class="drop-dn-lst">
                <li><a href="#">ML</a></li>
                <li><a href="#">LTRS</a></li>
                <li><a href="#">GM</a></li>
                <li><a href="#">KG</a></li>
              </ul>
              
              <h4 class="na-list"><a href="#">New Arrivals</a></h4> 
              <h4 class="na-list"><a href="#">Today's Offers</a></h4>
              
              </div>
              </div>
            </div>
          <?php } ?>
          </li>
          <?php } ?>
          <li><a href="#">Sell with us </a></li>
          <li><a href="#">Track Your Order </a></li>
          
        </ul>
      </div>
      
      </div>
      
    </div>