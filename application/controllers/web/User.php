<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
		  function  __construct() 
	  {

  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
  $this->load->library('Form_validation');
	$this->load->helper('identical');# Load the pagination library
	$this->load->model(array('web/m_products','ipanel/m_category','web/m_user'));
	
	//checkLogin();
     }

  

   public function register()
   {
     
       $this->load->view('web/register');
       $this->load->view('web/footer');

   }
   
   public function isuniqueemail()
   {

     $emailid=$this->input->post('email');
     $res=$this->m_user->checkemailexits($emailid);

      $data=array('is_ex'=>$res,
                    );
      print_r(json_encode($data));


   }

   public function do_registration()
   {

     $xssdata = $this->security->xss_clean($_POST);

    if ($this->security->xss_clean($xssdata, TRUE) === FALSE)
      {
           

         $msg= "Please Try Again";
         $this->session->set_flashdata('registerno',$msg); 
         redirect('register');

      }

    $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('valid_email', 'Please Enter Valid %s ');
    $this->form_validation->set_message('is_unique', 'Please Enter Unique %s ');
    $this->form_validation->set_message('exact_length', 'Your %s Must Be 10 Have Digits');
    $this->form_validation->set_message('min_length', 'Your %s Must Be at least 6 characters long');

    $this->form_validation->set_rules('name', 'Name', 'required');
    //$this->form_validation->set_rules('lname', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email|is_unique[tbl_user.  my_login_email]');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|exact_length[10]|is_unique[tbl_user.mobile]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
     $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|matches[password]');
    if ($this->form_validation->run() == FALSE)
    {
    $this->load->view('web/register');
    $this->load->view('web/footer');
    }else
    {
     $res=$this->m_user->registerit();
     if($res)
     { 

      $this->session->set_flashdata('registeryes','Account Created Sucessfully,Please Process login.');
       redirect('login');

     }else{

       $this->session->set_flashdata('registerno','Someting Went Wrong Please Try Again...!');
        redirect('register');
     }  

     

      
       
      

    }




   }

   public function do_signup()
   {

    $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('valid_email', 'Please Enter Valid %s ');
    $this->form_validation->set_message('is_unique', 'Please Enter Unique %s ');
    $this->form_validation->set_message('exact_length', 'Your %s Must Be 10 Have Digits');
    $this->form_validation->set_message('min_length', 'Your %s Must Be at least 6 characters long');

    $this->form_validation->set_rules('name', 'Name', 'required');
    //$this->form_validation->set_rules('lname', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email|is_unique[tbl_user.  my_login_email]');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|exact_length[10]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
     $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|matches[password]');
    if ($this->form_validation->run() == FALSE)
    {

      $this->load->view('web/login_register_for');
    


    }else
    {
     $res=$this->m_user->registerit();
     if($res)
     { 

      $this->session->set_flashdata('registeryes','Account Created Sucessfully,Please Process login.');
     }else{

       $this->session->set_flashdata('registerno','Someting Went Wrong Please Try Again...!');
     }  

     

      
       if($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "wishlist")
      {

          $id=strreplace_decode($this->session->userdata('p_id'));
          $p_id=$this->encrypt->decode($id);
          $this->m_user->addwishlist($this->session->userdata('user_id'),$p_id);
       $array_items = array('p_id', 'prev_url','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
       redirect(base_url().'wishlist');

      }elseif($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "cart")
      {
           $array_items = array('p_id', 'prev_url','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
         redirect(base_url().'cart');

      } elseif($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "makepayment")
      {
           $array_items = array('p_id', 'prev_url','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
         redirect(base_url().'checkout');

      }else{

             $array_items = array('p_id', 'prev_url','prev_url_flag');

       $this->session->unset_userdata($array_items);
       

        redirect(base_url());
      }
      

    }

  

 



   }
  
   

    public function do_login()
    {

        $xssdata = $this->security->xss_clean($_POST);

    if ($this->security->xss_clean($xssdata, TRUE) === FALSE)
      {
           

         $msg= "Please Try Again";
         $this->session->set_flashdata('registerno',$msg); 
         redirect('login');

      }

    $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('valid_email', 'Please Enter Valid %s ');
    $this->form_validation->set_message('min_length', 'Your %s Must Be at least 6 characters long');
    $this->form_validation->set_rules('signin_email', 'Email ID', 'required|valid_email');
    $this->form_validation->set_rules('signin_password', 'Password', 'required|min_length[6]');

    if ($this->form_validation->run() == FALSE)
    {
 
    
     $this->load->view('web/login');
     $this->load->view('web/footer');
   
    }else
    {
     $res=$this->m_user->go_for_login();
  
     if($res)
     {
       
      if($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "wishlist")
      {
        $p_id=$this->encrypt->decode(strreplace_decode($this->session->userdata('p_id')));
        $pack_id=$this->encrypt->decode(strreplace_decode($this->session->userdata('pack_id')));
          $this->m_user->addwishlist($this->session->userdata('user_id'),$p_id,$pack_id);

       /* echo "<pre>";
       print_r($_SESSION);
       exit; */
       $array_items = array('p_id','pack_id','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
       redirect(base_url().'wishlist');

      }elseif($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "cart")
      {
           $array_items = array('p_id','pack_id','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
         redirect(base_url().'cart');

      } elseif($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "makepayment")
      {
           $array_items = array('p_id','pack_id','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
         redirect(base_url().'checkout');

      }else{

             $array_items = array('p_id','pack_id','prev_url_flag');

       $this->session->unset_userdata($array_items);
       

        redirect(base_url());
      }

     }else{

   
       $this->session->set_flashdata('login_status','Email ID Or Password Not Matched.');
    
       redirect('login');
    
     }


    }
  
   }

    public function do_login_for()
    {
    if($this->session->userdata('user_id'))
    {
      redirect($_SERVER['HTTP_REFERER']); 
    }
   
    $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('valid_email', 'Please Enter Valid %s ');
    $this->form_validation->set_message('min_length', 'Your %s Must Be at least 6 characters long');
    $this->form_validation->set_rules('signin_email', 'Email ID', 'required|valid_email');
    $this->form_validation->set_rules('signin_password', 'Password', 'required|min_length[6]');

    if ($this->form_validation->run() == FALSE)
    {
 
       $this->load->view('web/login_register_for');
   
    }else
    {
     $res=$this->m_user->go_for_login();
  
     if($res)
     {
      if($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "wishlist")
      {

          $id=strreplace_decode($this->session->userdata('p_id'));
          $p_id=$this->encrypt->decode($id);
          $this->m_user->addwishlist($this->session->userdata('user_id'),$p_id);

       /* echo "<pre>";
       print_r($_SESSION);
       exit; */
       $array_items = array('p_id', 'prev_url','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
       redirect(base_url().'wishlist');

      }elseif($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "cart")
      {
           $array_items = array('p_id', 'prev_url','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
         redirect(base_url().'cart');

      } elseif($this->session->userdata('prev_url_flag') AND $this->session->userdata('prev_url_flag') == "makepayment")
      {
           $array_items = array('p_id', 'prev_url','prev_url_flag');

       $this->session->unset_userdata($array_items);
       
         redirect(base_url().'checkout');

      }else{

             $array_items = array('p_id', 'prev_url','prev_url_flag');

       $this->session->unset_userdata($array_items);
       

        redirect(base_url());
      }
      

     }else{
       
                     
       $this->session->set_flashdata('login_status','Email ID Or Password Not Matched.');
    
       $this->load->view('web/login_register_for');
    
     }


    }
  
   }

   public function forgetpassword()
   {
    
  

       $this->load->view('web/userheader',$data);  
       $this->load->view('web/forgetpassword');
       $this->load->view('web/footer');
    

   }

   public function verifytoforget()
   {
     $xssdata = $this->security->xss_clean($_POST);

    if ($this->security->xss_clean($xssdata, TRUE) === FALSE)
      {
           

         $msg= "Please Try Again";
         $this->session->set_flashdata('registerno',$msg); 
         redirect('forgetpassword');

      }

   $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('valid_email', 'Please Enter Valid %s ');
    $this->form_validation->set_rules('signin_email', 'Email ID', 'required|valid_email');
  
    if ($this->form_validation->run() == FALSE)
    {

    $this->load->view('web/header'); 
    $this->load->view('web/forget');
    $this->load->view('web/footer');

    }else
    {
     $res=$this->m_user->verifytoforget();
     if($res)
     {
      
      $this->m_user->deleteforgetlink($res->id);
      $emailid=$this->encrypt->encode($res->my_login_email);
      $id=$this->encrypt->encode($res->id);
  
      $link=base_url()."changepassword/".strreplace_encode($emailid)."/".strreplace_encode($id);
     
      $data=array('user_id'=>$res->id, 
                  'link'=>$link,
                  'expirydate'=>date("Y-m-d", strtotime('+24 hours')),
                  //'expirytime'=>date('h:i:s'),
                  );
    $expirydate=date("Y-m-d", strtotime('+24 hours'));
    $linkid=$this->m_user->forgetlink($data);
    $ecrylinkid=$this->encrypt->encode($linkid);

      $link=base_url()."changepassword/".strreplace_encode($ecrylinkid).'/'.strreplace_encode($emailid)."/".strreplace_encode($id);
        
       $name=$res->name; 
       $email=$this->resetemail($link,$res->my_login_email,$name,$expirydate);
       if($email)
        {

          $msg="Password Reset Link Sent On <b>".$res->my_login_email."</b>,<br>Please Check";

        }else{
         
         $msg="Opps, Something Went Wrong...!<br>Please Try Again.";

        }
    
      $data['msg']=$msg;
      $this->load->view('web/header');  
      $this->load->view('web/message',$data);
      $this->load->view('web/footer');


      

     }else{

    
      $this->session->set_flashdata('forget_status','Email ID Not Found.');
      $this->load->view('web/forget');

     }


    }

   }

   public function resetemail($link,$emailid,$name,$expirydate)
   {
    
            $data['expirydate']=$expirydate;
            $data['link']=$link;

            $message=$this->load->view('web/resetpasswordemail',$data,TRUE);
        
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
          $this->email->from('info@xposureindia.com','Yogi Ayurvedic');
          $this->email->to($emailid,$name);
          $this->email->subject('Reset Password');
          $this->email->message($message);
         return $this->email->send();
        /* $this->email->send();
          $res=$this->email->print_debugger();
          echo"<pre>";
          print_r($res);
          exit;*/


   }

   public function changepassword()
   {


   $data['link_id']=$this->uri->segment(2);   
   $data['email_id']= $this->uri->segment(3);
   $data['id']=$this->uri->segment(4);

      $id=strreplace_decode($data['link_id']);
      $linkid=$this->encrypt->decode($id);
  
     $verifylink=$this->m_user->verifylink($linkid);
     if($verifylink)
     {
   
     
       $this->session->set_flashdata('');
        $this->load->view('web/header'); 
       $this->load->view('web/changepassword');
        $this->load->view('web/footer');
       
     }else
     {

    
      $data['msg']="Reset Link Expired";
      $this->load->view('web/header');  
      $this->load->view('web/message',$data);
      $this->load->view('web/footer');
     
 
     }  


   }


   public function resetpassword()
   {

  $this->form_validation->set_message('required', 'Pleas Enter %s ');
  $this->form_validation->set_message('min_length', 'Your %s Must Be at least 6 characters long');
  
  $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
  $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[new_password]');
     
  
    if ($this->form_validation->run() == FALSE)
    {
    
   
     $data['verify']=array('id1'=>$this->input->post('id1'),
                           'id2'=>$this->input->post('id2'),
                           'id3'=>$this->input->post('id3')  
                           );


      $this->load->view('web/header');  
      $this->load->view('web/changepassword',$data);
      $this->load->view('web/footer');

    }else
    {

      $id1=strreplace_decode($this->input->post('id1'));
      $link_id=$this->encrypt->decode($id1);
      $id3=strreplace_decode($this->input->post('id3'));
      $user_id=$this->encrypt->decode($id3);
   
      $res=$this->m_user->resetpassword($link_id,$user_id);
       
      if($res)
     { 

      $this->session->set_flashdata('registeryes','Password Changed Sucessfully,Please Process login.');
     }else{

       $this->session->set_flashdata('registerno','Someting Went Wrong Please Try Again...!');
     }  

      
       redirect(base_url().'login');

    

    }


   }

   public function checklogedin()
   {
    if($this->session->userdata('user_id'))
    {
         echo "LoggedIn";

    }else{

      return false;
    }


   }

   public function logout()
   {
    //echo "inn";exit;
       $this->m_user->logouttime();//update logout time   
        $user_data = array(
              'user_id'  =>'',
              'firstname' => '',
              'lastname'  => '',
              'mobile'=>'',
              'email' => '',
              'logged_in'  => '',
              
            );
      $this->session->set_userdata($user_data);
      header("location:".base_url());
      //$this->index();
   }



  
}