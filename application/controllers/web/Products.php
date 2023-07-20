<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
		  function  __construct() 
	  {

  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
  $this->load->library('encrypt');
	$this->load->helper('identical');# Load the pagination library
	$this->load->model(array('web/m_products','ipanel/m_category','ipanel/m_volume'));
	
	//checkLogin();
     }

    public function getNewArrivals()
    {

      $data=$this->m_products->getNewArrivals();
      if($data)
      {
         foreach($data as $val)
       {
        $id=$this->encrypt->encode($val->id);
        $val->id=strreplace_encode($id);

       }

      
        print_r(json_encode($data));

      }else{
        
        return 0;
      }

    }
    public function getTodaysDeal()
    {

    $data=$this->m_products->getTodaysDeal();

     foreach($data as $val)
       {
        $id=$this->encrypt->encode($val->id);
        $val->id=strreplace_encode($id);

       }

        
       print_r(json_encode($data));
 
    }
      public function getCategoryWise()
    {

      $data=$this->m_products->getCategoryWise($_POST['cat_id'],$_POST['item_count']);
     if($data)
     {
       foreach($data as $val)
       {
        $id=$this->encrypt->encode($val->id);
        $val->id=strreplace_encode($id);

       }

      print_r(json_encode($data));
    }else{

      return 0;
    }
        
      
    }

    public function shopbycategory()
    {

    $data=$this->m_products->shopbycategory();
    if($data)
     {
       foreach($data as $val)
       {
        $id=$this->encrypt->encode($val->id);
        $val->id=strreplace_encode($id);

       }

      print_r(json_encode($data));
    }else{

      return 0;
    }

    }

    public function shopbybrand()
    {

    $data=$this->m_products->shopbybrand();

    if($data)
     {
      print_r(json_encode($data));
    }else{

      return 0;
    }

    }


    public function getdetails($p_id,$pack_id,$p_name)
    {

    $pid=strreplace_decode($p_id);
    $pid=$this->encrypt->decode($pid);

    $packid=strreplace_decode($pack_id);
    $packid=$this->encrypt->decode($packid);

    $productdata=$this->m_products->getproductDetails($pid);
    $id=$this->encrypt->encode($productdata['productdetails']->id);
    $productdata['productdetails']->id=strreplace_encode($id);
    $productdata['pack_details']=$this->m_products->getPackDetails($pid,$packid);
    $productdata['pack_details']->encrpt_id=$this->encrypt->encode(strreplace_encode($productdata['productdetails']->id));
    $productdata['packs']=$this->m_products->getActivePack($pid);

    $this->load->view('web/header');  
    $this->load->view('web/productdetails',$productdata);
    $this->load->view('web/footer');

    }
    public function getPackDetails()
    {
    try {
    $packid=strreplace_decode($this->input->post('id'));
    $packid=$this->encrypt->decode($packid);
    $pid=strreplace_decode($this->input->post('pid'));
    $p_id=$this->encrypt->decode($pid);

    $product=$this->m_products->getproductDetails($p_id);
    $product['productdetails']->id=strreplace_encode($this->encrypt->encode($product['productdetails']->id));
    $pack_details=$this->m_products->getPackDetails($p_id,$packid);
    if($pack_details AND $pack_details->status == "a")
    { 
   $pack_details->id=strreplace_encode($this->encrypt->encode($pack_details->id));
    
    if($pack_details->discount)
    {
       $dicountedprice=$pack_details->price-($pack_details->price * $pack_details->discount / 100);
                $yousave=($pack_details->price)-$dicountedprice; 
                $p_price=$pack_details->price;
                $discount=$pack_details->discount;
                $pack_price=$dicountedprice;

      $pricing='<ul class="price-lst">
                <li>M.R.P.:  <span class="main-price">'.number_format($p_price,2).'</span></li>
                <li>Price:  <sapn class="original-price">'.number_format($dicountedprice,2).'</sapn> <!-- span class="delivery-cls">FREE Delivery!</span> --></li>
                <li>You Save:  <span class="disc-1">'.number_format(round($yousave),2).'</span></li>
                <li>Discount:  <span class="disc-1">'.$discount.'%</span></li>
            </ul>
             <hr>
            <div class="spinner-wrap">
              <label for="spinner">Order Qty:</label>
              <input id="spinner" name="value" min="1" value="1">
            </div>
      <button class="btn btn-primary today-deal add-cartt my-cart-btn"
                   data-image="'. base_url().'/assets/ipanel/uploads/product_img/"'. $product['productdetails']->name.'
           data-pid="'.$product['productdetails']->id.'"
           data-packid="'.$pack_details->id.'"
           data-name="'.$product['productdetails']->p_name.'('.$pack_details->name.')"
           data-price="'.$pack_price.'">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
           Add to cart 
      </button>
      <p class="wishlst"><i class="fa fa-heart" aria-hidden="true"></i><a href="javascript:void(0)" class="add_to_wishlist"  data-pid="'.$product['productdetails']->id.'"
           data-packid="'.$pack_details->id.'">Add to Wishlist</a></p>';

    }else{

        $pricing='<ul class="price-lst">
               
                <li>Price:  <sapn class="original-price">'.number_format($pack_details->price,2).'</sapn> <!-- span class="delivery-cls">FREE Delivery!</span> --></li>
            </ul>
             <hr>
            <div class="spinner-wrap">
              <label for="spinner">Order Qty:</label>
              <input id="spinner" name="value" min="1" value="1">
            </div>
      <button class="btn btn-primary today-deal add-cartt my-cart-btn"
                   data-image="'. base_url().'/assets/ipanel/uploads/product_img/"'. $product['productdetails']->name.'
           data-pid="'.$product['productdetails']->id.'"
           data-packid="'.$pack_details->id.'"
           data-name="'.$product['productdetails']->p_name.'('.$pack_details->name.')"
           data-price="'.$pack_details->price.'">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
           Add to cart 
      </button>
      <p class="wishlst"><i class="fa fa-heart" aria-hidden="true"></i><a href="javascript:void(0)" class="add_to_wishlist"  data-pid="'.$product['productdetails']->id.'"
           data-packid="'.$pack_details->id.'">Add to Wishlist</a></p>';


    }
     $data['pricing']=$pricing;
     echo json_encode($data);

    }else{
     
      $data['pricing']='';
     echo json_encode($data); 

    }
    }
//catch exception
catch(Exception $e) {
      
      $data['pricing']='N/A';
      echo json_encode($data);   
   }

    }

     public function showallProducts()
    {
   
    $data['Maincategory']=$this->m_category->getActive();
    $data['min_range']=$this->m_products->getminPrice();
    $data['max_range']=$this->m_products->getmaxPrice();
    $data['brandlist']=$this->m_category->getbrandActive();
    $data['volumelist']=$this->m_volume->getActive();

    $this->load->view('web/header');  
    $this->load->view('web/products',$data);
    $this->load->view('web/footer');


    }

    public function getCategoryProducts($cat_id,$cat_name)
    {
    $id=strreplace_decode($cat_id);
    $cat_id=$this->encrypt->decode($id);
    $data['info']=$this->m_category->getcatdetails($cat_id);
    $data['category']=$this->m_category->getSubActive($cat_id);
    $data['min_range']=$this->m_products->getminPriceRange($cat_id,'cat_id');
    $data['max_range']=$this->m_products->getmaxPriceRange($cat_id,'cat_id');
    $data['brandlist']=$this->m_category->getbrandwith($cat_id,'cat_id');
    $data['volumelist']=$this->m_volume->getActive();

    $this->load->view('web/header');  
    $this->load->view('web/products',$data);
    $this->load->view('web/footer');


    }


    public function getproducts($rowno)
    {
     
    $rowperpage = 8;
    if($rowno != 0){

      $rowno = ($rowno-1) * $rowperpage;
    
    }
    $datacount=$this->m_products->getproductsrow();

    $products=$this->m_products->getproducts($rowperpage,$rowno);
     $productstring="";
    if($products)
    {
      $i=1;
      foreach($products as $val)
      {
        $image=base_url().'assets/ipanel/uploads/product_img/'.$val->img;

        $p_name=preg_replace('/[^A-Za-z0-9\-]/', '-',$val->p_name);
        $p_id=$val->p_id;
        $id=$this->encrypt->encode($val->p_id);
        $val->p_id=strreplace_encode($id);

         if($val->discount > 0)
      { 
         $discount_pack=$this->m_products->getHigestDiscount($p_id);
           
         $val->id=strreplace_encode($this->encrypt->encode($discount_pack->id));
         $val->price=$discount_pack->price;
         $val->discount=$discount_pack->discount;
         $val->pack_name=$discount_pack->name;
        
        $dicountedprice=$val->price-($val->price * $val->discount / 100);
        $yousave=($val->price)-$dicountedprice;
        $productstring.='<div class="col-sm-3"><div class="product-inner"><span class="discount">'.$val->discount.'%</span>
        <div class="todays-item-wrap"><img src="'.$image.'"></div>
<div class="todays-item-txt">
    <p>'.$val->p_name.'</p>
    <p class="price-1"><span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span>'.$dicountedprice.'&nbsp; - &nbsp; 
    <span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span><span class="strik">'.$val->price.'</span></p>
          <div class="clearfix"></div>
          <span class="product-discount">You Save : <i class="fa fa-inr" aria-hidden="true"></i>&nbsp;'.$yousave.'('.$val->discount.'%)</span>
          </div>

      </div>
      <a  target="_blank" class="btn btn-primary today-deal todays-item-btn-abs" href="'.base_url().'moredetails/'.$val->p_id.'/'.$val->id.'/'.$p_name.'" role="button">View more..</a>
      </div>';
      }else{
        $val->id=strreplace_encode($this->encrypt->encode($val->id));
         $productstring.='<div class="col-sm-3"><div class="product-inner">
        <div class="todays-item-wrap"><img src="'.$image.'">
       </div>
<div class="todays-item-txt">
    <p>'.$val->p_name.'</p>
    <p class="price-1"><span class="rupees-icn"><i class="fa fa-inr" aria-hidden="true"></i></span>'.$val->price.'<span class="rupees-icn"></p>
          <div class="clearfix"></div>
          </div>
          <a target="_blank" class="btn btn-primary today-deal todays-item-btn-abs" href="'.base_url().'moredetails/'.$val->p_id.'/'.$val->id.'/'.$p_name.'" role="button">View more..</a>
      </div>
      </div>';

      }
     
      

    $i++;  }
   }else{

     // $url=$this->m_category->getproducturlby($_POST['ref']);

         $productstring.="<div class='sorry'><P>Sorry,we couldn't find any result matching</P><p class='ion'><a href='".$url."'><i class='fa fa-refresh' aria-hidden='true'></i></a></p></div>";


    }


    $data['products']=$productstring;
    $config['base_url'] = base_url().'loadprdoucts';
    $config['use_page_numbers'] = TRUE;
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Previous';
    $config['total_rows'] = floatval($datacount);
    $config['per_page'] = $rowperpage;
    // Initialize
    $this->pagination->initialize($config);



    // Initialize $data Array

    $data['pagination'] = $this->pagination->create_links();



    $data['result']=$data['products'];
    $data['row'] = $rowno;
      



    //echo base64_encode(json_encode($data));

     echo json_encode($data);
    }


    public function filterproducts()
    {

    $data['Maincategory']=$this->m_category->getActive();
    $data['min_range']=$this->m_products->getminPrice();
    $data['max_range']=$this->m_products->getmaxPrice();
    $data['brandlist']=$this->m_category->getbrandActive();
    $data['volumelist']=$this->m_volume->getActive();

     if($_GET['ref1'] AND $_GET['ref2']=="")
     {
      //echo "hiii";
      //exit;
     $ref=strreplace_decode($_GET['ref']);
     $cat_id=$this->encrypt->decode($ref);
     $ref1=strreplace_decode($_GET['ref1']);
     $subcat_id=$this->encrypt->decode($ref1);
    $data['info']=$this->m_category->getsubcatdetails($subcat_id);
    $data['subcategory']=$this->m_category->getSubSubActive($cat_id,$subcat_id);
    $data['min_range']=$this->m_products->getminPriceRange($subcat_id,'sub_id1');
    $data['max_range']=$this->m_products->getmaxPriceRange($subcat_id,'sub_id1');
    $data['brandlist']=$this->m_category->getbrandwith($subcat_id,'sub_id1');
    $data['volumelist']=$this->m_volume->getActive();
     }
     if($_GET['ref2']!=="")
     {

      //echo "hiii2";
      //exit;
       $ref2=strreplace_decode($_GET['ref2']);
       $subsubcat_id=$this->encrypt->decode($ref2);
    $data['info']=$this->m_category->getsubsubcatdetails($subsubcat_id);
    $data['min_range']=$this->m_products->getminPriceRange($subsubcat_id,'sub_id2');
    $data['max_range']=$this->m_products->getmaxPriceRange($subsubcat_id,'sub_id2');
     $data['brandlist']=$this->m_category->getbrandwith($subsubcat_id,'sub_id2');
     $data['volumelist']=$this->m_volume->getActive();


     
     }
     if($_GET['ref'] AND $_GET['ref1']=="" AND $_GET['ref2']=="")
     {
      //echo "hii3";
      //exit;
      $id=strreplace_decode($_GET['ref']);
    $cat_id=$this->encrypt->decode($id);
    $data['info']=$this->m_category->getcatdetails($cat_id);
    $data['category']=$this->m_category->getSubActive($cat_id);
    $data['min_range']=$this->m_products->getminPriceRange($cat_id,'cat_id');
    $data['max_range']=$this->m_products->getmaxPriceRange($cat_id,'cat_id');
    $data['brandlist']=$this->m_category->getbrandwith($cat_id,'cat_id');
    $data['volumelist']=$this->m_volume->getActive();
     }


     /*echo "<pre>";
     print_r($data);
     exit;*/
    $this->load->view('web/header');  
    $this->load->view('web/products',$data);
    $this->load->view('web/footer');

    }


    public function compare()
    {

    $data['cat_list']=$this->m_category->getActive();
    $data['filtersname']=$this->m_category->getfilternames($this->input->get('category'));
    $data['compareproduct']=$this->m_products->getforcompare();
    if(isset($_GET['product']) AND $_GET['product'])
    {
      $data['product1']=$this->m_products->getalldetails($_GET['product']);
    }
    if(isset($_GET['product2']) AND $_GET['product2'])
    {
       $data['product2']=$this->m_products->getalldetails($_GET['product2']);
    }
    if(isset($_GET['product3']) AND $_GET['product3'])
    {
       $data['product3']=$this->m_products->getalldetails($_GET['product3']);
    }
     if(isset($_GET['product4']) AND $_GET['product4'])
    {
       $data['product4']=$this->m_products->getalldetails($_GET['product4']);
    }
  


    $this->load->view('web/header',$data);
    $this->load->view('web/comparproduct',$data);
    $this->load->view('web/footer');
     
    }


    public function  testing()
    {
      $res=$this->m_products->getPack();
      echo "<pre>";
      print_r($res);
      exit;


    } 


    


  
}