<div class="social-icns">
    <div class="container">
      <div class="icn-btn-wrap">
          <ul class="icons-wrap">
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-forumbee" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            </div>
            
        </div>
   </div>
    </div>
   <div class="foot-section" style="display: block;">
      <div class="container">
          
             
            <div class="col-lg-3 col-md-3 foot-blks">
              <h3>Categories</h1>
                <ul id="g-f">
                  <li><a href="#">Categories </a></li>
          <li><a href="#">Equipments</a></li>
          <li><a href="#">Gardening</a></li>
          <li><a href="#">Remedies</a></li>
          <li><a href="#">Fertilizers</a></li>
          <li><a href="#">Organic Farming</a></li>
          <li><a href="#">Bulk</a></li>
          <li><a href="#">Seeds</a></li>
          <li><a href="#">Irrigation</a></li>
          <li><a href="#">Cattle & Bird</a></li>
          <li><a href="#">Farm Products</a></li>
          <li><a href="#">Media</a></li>
                </ul>
            </div>
      
      
    
      <div class="col-lg-3 col-md-3 foot-blks">
              <h3>Our Policies</h1>
                
                  <ul id="g-f">
                                        <li>
                                           <a href="#">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="#">Shipping / Delivery</a>
                                        </li>
                                        <li>
                                            <a href="#">Cancellation Policy</a>
                                        </li>
                                        <li>
                                            <a href="#">Return Policy</a>
                                        </li>
                                        <li>
                                            <a href="#">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="#">Terms of Use</a>
                                        </li>
                                        <li>
                                            <a href="#">Seller Terms and Conditions</a>
                                        </li>
                                        
                                    </ul>
                </ul>
            </div>
      
      
            
    </div>
</div>
   
   <div class="copyright"><p>Copyright2021@Biolife Agrotech Private Limited.com. All rights reserved.</p></div>
   
   
    
<div class="topper"><a href="#Home"><i class="fa fa-angle-double-up"></i></a></div>
<!-- Bootstrap core JavaScript -->
<script src="<?= base_url()?>assets/web/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/web/js/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url()?>assets/web/js/zoom.js"></script>
 <script src="<?= base_url() ?>assets/web/js/cart.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/web/js/menuzord.js"></script>
 <script src="<?= base_url()?>assets/web/js/owl.carousel.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
        jQuery("#menuzord").menuzord({
          align: "left"
        });
      });
    </script>

 
<script>
  $(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      autoPlay: false, //Set AutoPlay to 3 seconds
      items : 5,
      pagination : false,
      navigation : true,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,2]
 
  });

  $(".owl4").owlCarousel({
 
      autoPlay: false, //Set AutoPlay to 3 seconds
      items : 4,
      pagination : false,
      navigation : true,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,2]
 
  });

  $("#owl-demo-assoc").owlCarousel({
 
      autoPlay: false, //Set AutoPlay to 3 seconds
      items : 2,
      itemsDesktop : [1199,3],
    pagination : true,
    navigation : false,
      itemsDesktopSmall : [979,2]
 
  });

  $("#owl-demo-clie").owlCarousel({
 
      autoPlay: false, //Set AutoPlay to 3 seconds
      items : 2,
      itemsDesktop : [1199,3],
    pagination : true,
    navigation : false,
      itemsDesktopSmall : [979,2]
 
  });

 $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
 $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
 
});

</script>
<script type="text/javascript">   
 $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});  

</script>
<script>
$(function(){

      $('.zoom').okzoom({
  width: 150,
  height: 150,
  round: true,
  background: "#fff",
  backgroundRepeat: "repeat",
  shadow: "0 0 5px #000",
  border: "1px solid black"
});
 });

</script>
 
 <script src="<?= base_url()?>assets/web/js/jquery.nicescroll.js"></script>
 <script>
  $(document).ready(function() {
      $("body").niceScroll();
    });
  </script>
<?php if(isset($payflag)){ ?>
  <script>
  $(document).ready(function(){window.localStorage.clear()});
 </script>
<?php } ?>
 <script type="text/javascript">


  $(function () {

    $('.my-cart-btn').myCart({
       
                 
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
     
     
      checkoutCart: function(products, totalPrice, totalQuantity) {

       
     
      },
   
    });

  
  });


$('.add_to_wishlist').click(function () {
    var p_id=$(this).attr('data-pid');
    var packid=$(this).attr('data-packid');
    //var url=$(this).attr('data-prev-url');
    var urlflag="wishlist";
    checklogin(p_id,packid,urlflag);
 var user_id="<?= $this->session->userdata('user_id')?>";  
    if(user_id)
     {
    $.post("<?= base_url()?>addtowishlist",{p_id:p_id,packid:packid}, function(data){ 

            if(data)
            { 
             
              window.location.replace("<?= base_url()?>wishlist");     

            }else{

              alert('already added to wishlist');

            }

             
            
            });
      }

        
    });
$('#pro_to_buy').click(function () {
    var p_id="-";
    var url=$(this).attr('data-prev-url');
    var urlflag="cart";
    checklogin(p_id,url,urlflag);
    var user_id="<?= $this->session->userdata('user_id')?>";  
    if(user_id)
     {
       window.location.replace("<?= base_url()?>shipping"); 
     }
    });
function checklogin(p_id,packid,prev_url_flag)
{

  $.post("<?= base_url()?>checkuserlogin",{p_id:p_id,packid:packid,prev_url_flag:prev_url_flag}, function(data){ 

            if(data)
            { 
             
                return true;
            }
             else{
                    
                window.location.replace("<?= base_url()?>login"); 

              }

          
            
            });



}

$('.deletewishlist').click(function () {
   
     var box=confirm('Are you sure to remove from wishlist');
   if (box==true)
            return true;
        else
           return false;
          
        
    });



$('#paybutton').click(function () {
   
    var p_id="-";
    var url=$('#prev_url').val();
    var urlflag="makepayment";
    checklogin(p_id,url,urlflag);
    var user_id="<?= $this->session->userdata('user_id')?>";  
    if(user_id)
     {

      window.location.href = "<?= base_url()?>confirmorder";
    
     }
          
        
    });

</script>
</body>
</html>