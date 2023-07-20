<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My extends CI_Controller {
		  function  __construct() 
	  {

  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
  $this->load->library('Form_validation');
	$this->load->helper('identical');# Load the pagination library
	$this->load->model(array('web/m_products','ipanel/m_category','web/m_user','web/m_order','web/m_address'));
	
	checkLoginUser();

     }
 
 public function index()
 {

 
 $userdata['userdetails']=$this->m_user->getuserdeatails();


 
  $this->load->view('web/header');  
  $this->load->view('web/user/myaccount',$userdata);
  $this->load->view('web/footer');

 }





 public function order()
 {


 
   $data['myorders']=$this->m_order->getuserorders();

    $this->load->view('web/header');  
    $this->load->view('web/user/myorder',$data);
    $this->load->view('web/footer');


 }

 public function orderdetails($encryptid)
 {
   $id=strreplace_decode($encryptid);
   $orderid=$this->encrypt->decode($id);
   $data1=$this->m_order->orderdetails($orderid);
   
    $this->load->view('web/header');  
    $this->load->view('web/orderdetails',$data1);
    $this->load->view('web/footer');




 }

 public function wishlist()
 {

  $res['wishlist']=$this->m_user->getwishlist();

  /*echo "<pre>";
  print_r($res);
  exit;*/
  $this->load->view('web/header'); 
  $this->load->view('web/wishlist',$res);
  $this->load->view('web/footer');




 }
 public function addtowishlist()
 {
   
   $pid=$this->encrypt->decode(strreplace_decode($this->input->post('p_id')));
   $packid=$this->encrypt->decode(strreplace_decode($this->input->post('packid')));
$check=$this->m_user->checkwishlist($this->session->userdata('user_id'),$pid,$packid);
if($check)
{
  return false;
}else{
  $pid=$this->encrypt->decode(strreplace_decode($this->input->post('p_id')));
  $packid=$this->encrypt->decode(strreplace_decode($this->input->post('packid')));
$res=$this->m_user->addwishlist($this->session->userdata('user_id'),$pid,$packid);
$this->session->set_flashdata('msg','Item added to wishlist...!');
echo "Item added to wishlist...!";

}

 }
 
 public function deletewish($id)
 {
     $id=strreplace_decode($id);
   $pid=$this->encrypt->decode($id);
   $res=$this->m_user->deletewish($this->session->userdata('user_id'),$pid);
   redirect(base_url().'wishlist');


 }

public function updatemyaccount()
 {

   $xssdata = $this->security->xss_clean($_POST);

    if ($this->security->xss_clean($xssdata, TRUE) === FALSE)
      {
           

         $msg= "Please Try Again";
         $this->session->set_flashdata('registerno',$msg); 
         redirect('youraccount');

      }
      
  $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('exact_length', 'Your %s Must Be 10 Have Digits');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|exact_length[10]');
   
    if ($this->form_validation->run() == FALSE)
    {

     $data['cat_list']=$this->m_category->getActive();
     $userdata['userdetails']=$this->m_user->getuserdeatails();

       $this->load->view('web/header',$data);  
       $this->load->view('web/user/myaccount',$userdata);
       $this->load->view('web/footer');


    }else
    {
      $res=$this->m_user->updatemyaccount();
     if($res)
     { 

      $this->session->set_flashdata('msg','Account updated successfully');

     }else{

       $this->session->set_flashdata('msg','Someting Went Wrong Please Try Again...!');
     }
     $data['cat_list']=$this->m_category->getActive();
     $userdata['userdetails']=$this->m_user->getuserdeatails();

       $this->load->view('web/header',$data);  
       $this->load->view('web/user/myaccount',$userdata);
       $this->load->view('web/footer');



    }
  
 }

     public function changepassword()
 {
     $xssdata = $this->security->xss_clean($_POST);

    if ($this->security->xss_clean($xssdata, TRUE) === FALSE)
      {
           

         $msg= "Please Try Again";
         $this->session->set_flashdata('registerno',$msg); 
         redirect('youraccount');

      }

   $this->form_validation->set_message('required', 'Pleas Enter %s ');
  $this->form_validation->set_message('min_length', 'Your %s Must Be at least 6 characters long');
  $this->form_validation->set_rules('currentpassword', 'New Password', 'required|min_length[6]');
  $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
  $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[new_password]');
     
  
    if ($this->form_validation->run() == FALSE)
    {
  
     $userdata['userdetails']=$this->m_user->getuserdeatails();

       $this->load->view('web/header');  
       $this->load->view('web/user/myaccount',$userdata);
       $this->load->view('web/footer');

     }else{
      
      $checkpassword=$this->m_user->checkoldpassword();
      if(!$checkpassword)
      {
       
      $userdata['userdetails']=$this->m_user->getuserdeatails();
      $userdata['false']="yes";
       //$this->session->set_flashdata('pwdmsg','Your entered wrong password.');
       $this->load->view('web/header');  
       $this->load->view('web/user/myaccount',$userdata);
       $this->load->view('web/footer');

      }else{
      
      $res=$this->m_user->changepassword();
     if($res)
     { 

      $this->session->set_flashdata('pwdmsg','Your password updated successfully');

     }else{

       $this->session->set_flashdata('pwdmsg','Someting Went Wrong Please Try Again...!');
     }
          
 

       redirect(base_url().'youraccount');


     }

     }


 }


 public function myaddress()
 {
  $data['adresses']=$this->m_address->getaddresses();

  $this->load->view('web/header');  
  $this->load->view('web/user/myaddress',$data);
  $this->load->view('web/footer');


 }
  public function addaddress()
   {
    
    $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('exact_length', 'Your %s Must Be 10 Have Digits');
    $this->form_validation->set_message('valid_email', 'Please Enter Valid %s ');
    $this->form_validation->set_message('max_length', 'Your %s Must Be at least 6 characters long');
    $this->form_validation->set_rules('ship_name', 'Name', 'required');
    $this->form_validation->set_rules('ship_mobile', 'Mobile Number', 'required|exact_length[10]');
    $this->form_validation->set_rules('ship_pin', 'Pin', 'required|exact_length[6]');
    $this->form_validation->set_rules('ship_address', 'Address', 'required|max_length[450]');
    $this->form_validation->set_rules('ship_city', 'City', 'required');
    $this->form_validation->set_rules('ship_state', 'State', 'required');
     if ($this->form_validation->run() == FALSE)
    {
      
   
     $data['adresses']=$this->m_address->getaddresses();

    $this->load->view('web/header');  
    $this->load->view('web/user/myaddress',$data);
    $this->load->view('web/footer');

    }else{
     
      $this->m_address->insetnew();
     
     redirect(base_url().'myaddress');

    }
   

    
   }

   public function editmyaddress($encryptid)
   {
    $id=strreplace_decode($encryptid);
    $newid=$this->encrypt->decode($id);
    $data['addressdetails']=$this->m_address->getdetails($newid);


    $this->load->view('web/header');  
    $this->load->view('web/user/editaddress',$data);
    $this->load->view('web/footer');



   }
   public function updatemyaddress($encryptid)
   {
 
     $id=strreplace_decode($encryptid);
    $newid=$this->encrypt->decode($id);

     $this->m_address->updateshipping($newid);
     
     redirect(base_url().'myaddress');

   }
  
   public  function deleteaddress($encryptid)
  {
    
    $id=strreplace_decode($encryptid);
    $newid=$this->encrypt->decode($id);
  $res=$this->m_address->deleteaddress($newid);
  if($res)
  {

    redirect($_SERVER['HTTP_REFERER']);
  }

  }

}
?>