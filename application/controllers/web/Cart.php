<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
		  function  __construct() 
	  {

  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
  $this->load->library('Form_validation');
	$this->load->helper('identical');
  $this->load->helper('crypto');#load helper crpto for ccavenue intigration.
	$this->load->model(array('web/m_products','ipanel/m_category','web/m_user','web/m_address','web/m_order','ipanel/m_payments'));
	   
	//checkLoginUser();

     }

  

   public function storecart()
   {  
     /*      foreach($_POST['products'] as $val)
    {
         if($val->quantity <= 0)
         {
          unset($val);
         }
    }   */
     
        $this->session->set_userdata($_POST);
        $this->session->set_flashdata('msg','Item added to cart...!');
  
         echo "Product Added";


   }

   public function updatecart()
   {
   /* foreach($_POST['products'] as $val)
    {
         if($val->quantity <= 0)
         {
          unset($val);
         }
    }   */
     $this->session->set_userdata($_POST);
     print_r($this->session->userdata('products'));

      echo "Product Updated";
   }
   
   public function showmycart()
   {
 

    $data['breadcumflag']='cart';
    
   /*  print_r($_SESSION);
       exit;
*/
     
    $this->load->view('web/header',$data);  
    $this->load->view('web/cart');
    $this->load->view('web/footer');


   }

   public function cartproduct()
   {
      /* print_r($_SESSION);
       exit;*/


   }

   public function shipping()
   {
    checkcart();
    checkLoginUser();
    
    $data['adresses']=$this->m_address->getaddresses();
    
    /*echo "<pre>";
    print_r($data);
    exit;*/
    
    $this->load->view('web/header',$data);  
    $this->load->view('web/shipping',$data);
    $this->load->view('web/footer');


   }

 
   public function addshipping()
   {
    
    checkcart();
    checkLoginUser();
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
    
    /*echo "<pre>";
    print_r($data);
    exit;*/
    
    $this->load->view('web/header',$data);  
    $this->load->view('web/shipping',$data);
    $this->load->view('web/footer');

    }else{
     
      $this->m_address->insetnew();
     
     redirect(base_url().'shipping');

    }





   

    
   }

   public function editaddress($encryptid)
   {
    $id=strreplace_decode($encryptid);
    $newid=$this->encrypt->decode($id);
  
    $data['addressdetails']=$this->m_address->getdetails($newid);
  

    /*  echo "<pre>";
      print_r($data);
      exit;*/

    $this->load->view('web/header',$data);  
    $this->load->view('web/editshipping',$data);
    $this->load->view('web/footer');



   }


   public function updateshipping($encryptid)
   {
    $id=strreplace_decode($encryptid);
    $newid=$this->encrypt->decode($id);

     $this->m_address->updateshipping($newid);
     
     redirect(base_url().'shipping');

   }

   

   public function getlocation()
   {
      
   $result=$this->m_order->getLocation($this->input->post('pin'));  

   echo json_encode($result);

   }

   public function sessionpincode()
   {
    $pin=$this->input->post('pin'); // to store localstorage pin in current session

    $this->session->set_userdata('shippin',$pin);


     echo "pincode confirmed successfully";
    
   }

  public function getcurrentadress()
  {
    
    $res=$this->m_address->getcurrentadress(); 
    
     print_r(json_encode($res));


  } 

  public  function deleteaddress($encryptid)
  {
    
  checkLoginUser();
    $id=strreplace_decode($encryptid);
    $newid=$this->encrypt->decode($id);
  $res=$this->m_address->deleteaddress($newid);
  if($res)
  {

    redirect($_SERVER['HTTP_REFERER']);
  }


  }
  public function chanegadress()
  {
    checkLoginUser();
   $res=$this->m_address->chanegadress();
    
    echo $res;

  }

  public function activateaddress($addressid)
   {
    checkLoginUser();
    checkcart();
  
   $id=strreplace_decode($addressid);
   $adress_id=$this->encrypt->decode($id);
   $this->m_address->ativateaddress($adress_id);
     
    redirect(base_url().'checkout');

   }
  public function checkout()
  {
    checkLoginUser();
    checkcart();

  
   $data['shippingdetails']=$this->m_address->getactivedetails(); 
   $data['address_id']=$this->encrypt->encode($data['shippingdetails']->address_id);            
   $data['user_id']=$this->encrypt->encode($data['shippingdetails']->user_id); 
  $this->load->view('web/header');
  $this->load->view('web/makepayment',$data);
  $this->load->view('web/footer');

  }

    public function confirmeorder()
  {
    checkLoginUser();
    checkcart();
    
  $result['payinfo']=$this->m_order->addOrder();
  $merchant_data='';
  $working_key=$this->config->item('working_key');//Shared by CCAVENUES
  $access_code=$this->config->item('access_code');//Shared by CCAVENUES
  
  foreach ($result['payinfo'] as $key => $value){
    $merchant_data.=$key.'='.$value.'&';
  }

  $encrypted_data=encrypt($merchant_data,$working_key); 
  
  $data['access_code']=$access_code;
  $data['encrypted_data']=$encrypted_data;

      $this->load->view('web/ccavenue/ccavRequestHandler',$data);
  }

  public function ccavResponse()
  {
    $workingKey=$this->config->item('working_key');   //Working Key should be provided here.
  $encResponse=$_POST["encResp"];     //This is the response sent by the CCAvenue Server
  $rcvdString=decrypt($encResponse,$workingKey);    //Crypto Decryption used as per the specified working key.
  $order_status="";
  $decryptValues=explode('&', $rcvdString);
  $dataSize=sizeof($decryptValues);


  for($i = 0; $i < $dataSize; $i++) 
  {
    $information=explode('=',$decryptValues[$i]);
          
      
    if($i==3) $order_status=$information[1];
    if($i==0) $order_id=$information[1];
    if($i==11)  $name=$information[1];
    if($i==10)  $finaltotal=$information[1];
    if($i==17)  $mobile=$information[1];
    if($i==1) $trans_id=$information[1];
    if($i==18) $email=$information[1];
    $data[$information[0]]=$information[1];
  }

  
    $this->m_payments->insertCCav($data);
    
  if($order_status==="Success")
  {
     $this->session->unset_userdata('products');
    //Do success order processing here...
     $data1['status']=$order_status;
     $data1['order_id']=$order_id;
     $data1['email']=$email;
     $data1['txnid']=$trans_id;
    $data1['paidamount']=$finaltotal;
    $data2['payflag']="Success";

    $res1=$this->m_order->updateorderdetails($data1);
     // $sendsuccessmail=$this->sendsuccessmail($order_id);

   $this->load->view('web/header'); 
   $this->load->view('web/order_response',$data1);
   $this->load->view('web/footer',$data2);    
    
  }
  else if($order_status==="Aborted")
  {
  
     $data1['status']=$order_status;
     $data1['order_id']=$order_id;
     $data1['email']=$email;
     $data1['txnid']=$trans_id;
    $data1['paidamount']=$finaltotal;

      $res1=$this->m_order->updateorderdetails($data1);

   $this->load->view('web/header'); 
   $this->load->view('web/order_response',$data1);
   $this->load->view('web/footer');    
  
  }
  else if($order_status==="Failure")
  {
     $data1['status']=$order_status;
     $data1['order_id']=$order_id;
     $data1['email']=$email;
     $data1['txnid']=$trans_id;
    $data1['paidamount']=$finaltotal;

      $res1=$this->m_order->updateorderdetails($data1);

   $this->load->view('web/header'); 
   $this->load->view('web/order_response',$data1);
   $this->load->view('web/footer');    
  }
  else
  {
   
     $data1['status']="";
   $this->load->view('web/header'); 
   $this->load->view('web/order_response',$data1);
   $this->load->view('web/footer');    
  
  }


  }

  
 

  public function sendsuccessmail($order_id)
  {

  $data['orderdetails']=$this->m_order->getorderdetails($order_id);
  $data['orderitems']=$this->m_order->getorderitems($order_id);
   //$this->load->view('web/userheader');
  //$this->load->view('web/orderdetailsemail',$data);
  //$this->load->view('web/footer');
  if($data['orderdetails'])
   {
           $message=$this->load->view('web/order_email_template',$data,TRUE);
             
        
          $this->load->library('email');
          $config['protocol']     = 'smtp';
          $config['smtp_host']    = 'mail.xposureindia.com'; //'ssl://smtp.gmail.com'; // this for gmail A/C
          $config['smtp_port']    = '25'; //'465';
          $config['smtp_timeout'] = '7';
          $config['smtp_user']    = 'axay@xposureindia.com'; //'mygmail@gmail.com';
          $config['smtp_pass']    = 'Vst*uuQ44!_g';
          $config['charset']      = 'utf-8';
          $config['newline']      = "\r\n";
          $config['mailtype']   = 'text'; // or html
          $config['validation']   = TRUE; // bool whether to validate email or not    
          $config['mailpath'] = '/usr/sbin/sendmail';
          $config['charset'] = 'iso-8859-1';
          $config['wordwrap'] = TRUE;
          $config['mailtype'] = 'html';// Append This Line
          $this->email->initialize($config);
          $this->email->from('info@xposureindia.com','Sadhana India Craft');
          $this->email->to($data['orderdetails']->bill_email,$data['orderdetails']->bill_name);
          $this->email->subject('Order confirmation');
          $this->email->message($message);
         return $this->email->send();

   }else{

    
   }

  
   }

}