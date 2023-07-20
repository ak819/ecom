<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {

    function  __construct() 
  {
    //echo "inn";exit;
      parent::__construct();
    $this->load->library('pagination');# Load the pagination library
    $this->load->helper(array('identical','file'));# Load the pagination library
    //$this->admin_id=$this->session->userdata('admin_id');
    $this->load->library('upload');
   $this->load->model(array('ipanel/m_banner','ipanel/m_category','ipanel/m_user','web/m_products','ipanel/M_enquiry','ipanel/m_email','ipanel/m_cms','ipanel/m_advertise','ipanel/m_channelpartner','ipanel/m_faqs','ipanel/m_feedback','ipanel/m_customize'));


    }

  

  public function index()
  {
      $packid1=strreplace_encode($this->encrypt->encode('9'));
     $packid=strreplace_decode($packid1);
    $packid=$this->encrypt->decode($packid);

        echo $packid;
        exit; 
     
     $data['banner']=$this->m_banner->getAllActive();
     $data['pagedata']=$this->m_cms->getdata('aboutus');
     $data['todaysdeal']=$this->m_products->getTodaysDeal();
     $data['newarrival']=$this->m_products->getNewArrivals();
     
    /* echo "<pre>";
     print_r($data['todaysdeal']);
     exit;*/
     $data['popular']=$this->m_products->getPopularProducts();
    

          
    $this->load->view('web/header',$data);  
    $this->load->view('web/home',$data);
    $this->load->view('web/footer');

  }
  
  
    public function myaccount()
  {
       
    

    $this->load->view('web/header2');  
    $this->load->view('web/myaccount');
    $this->load->view('web/footer2');
  }

  public function register()
  {
  
    $this->load->view('web/register');
    $this->load->view('web/footer');
  } 

    public function login()
  {
      
  
    $this->load->view('web/login');
    $this->load->view('web/footer');

   } 

    public function forget()
    {
 
    $this->load->view('web/header'); 
    $this->load->view('web/forget');
    $this->load->view('web/footer');
    
    }

    public function aboutus()
  {
  
   $pagedata['pagedata']=$this->m_cms->getdata('aboutus');

    $this->load->view('web/header'); 
    $this->load->view('web/aboutus',$pagedata);
    $this->load->view('web/footer');
  
    }

     public function faq()
  {

    $data['cat_list']=$this->m_category->getActive();
    $data['faqoption']=$this->m_faqs->getactiveoption();
    $data['faqlist']=$this->m_faqs->getActive();

    $this->load->view('web/header',$data); 
    $this->load->view('web/faq',$data);
    $this->load->view('web/footer');   

  }

  public function contact()
  {
    $this->load->view('web/header'); 
    $this->load->view('web/contact');
    $this->load->view('web/footer');
  }

  

  public function deliverytime()
  {


    $this->load->view('web/header'); 
    $this->load->view('web/dilverytime');
    $this->load->view('web/footer');         
      
  }
  

  public function diclaimer()
  {

     $this->load->view('web/header'); 
   $this->load->view('web/disclaimer');
   $this->load->view('web/footer');

  }

  public function privacypolicy()
  {
    $this->load->view('web/header'); 
    $this->load->view('web/privacypolicy');
    $this->load->view('web/footer');
  }

  public function termsconditions()
  {
    $this->load->view('web/header');
    $this->load->view('web/Terms');
    $this->load->view('web/footer');
  }

  public function returnrefund()
  {
    $this->load->view('web/header');
    $this->load->view('web/returnrefund');
    $this->load->view('web/footer');
  }
      
      
    public function cancellation()
    {
        
      $this->load->view('web/header');
    $this->load->view('web/cancellation');
    $this->load->view('web/footer');   
        
    }
     
     public function customization()
    {
        
      $this->load->view('web/header');
    $this->load->view('web/customize_form');
    $this->load->view('web/footer');   
        
    }
    
    
    
     
    public function franchisee()
    {
        
     $this->load->view('web/header');
    $this->load->view('web/franchisee_form');
    $this->load->view('web/footer');   
        
    }
  
  
  
  
  

  public function shipping()
  {

    $this->load->view('web/header'); 
  $this->load->view('web/shipping');
  $this->load->view('web/footer');

  }



    public function searchresult()
    {
        if(!$this->input->get('keyword'))
        {

           redirect($_SERVER['HTTP_REFERER']);


        }else{
         
        $data['categories']=$this->m_category->getAll();
    $data['products']=$this->M_products->getsearchwise($this->input->get('keyword'));
    $data['keyword']=$this->input->get('keyword');
    $this->load->view('web/header');  
    $this->load->view('web/searchproduct',$data);
    $this->load->view('web/footer');

        }


    }

    

    public function checkuserlogin()
    {
      

   

      if($this->session->userdata('user_id'))
    {

         echo "LoggedIn";

    }else{

      $this->session->set_userdata('p_id',$this->input->post('p_id'));
      $this->session->set_userdata('pack_id',$this->input->post('opations'));
      $this->session->set_userdata('prev_url_flag',$this->input->post('prev_url_flag'));
      return false;
    }


    }   


    public function makepayment()
    {

    $this->load->view('web/header');
  $this->load->view('web/makepayment');
  $this->load->view('web/footer');

    }


    public function youraccount()
    {
   
    $this->load->view('web/header');
  $this->load->view('web/youraccount');
  $this->load->view('web/footer');

    }


    public function yourorder()
    {
   
    $this->load->view('web/header');
  $this->load->view('web/yourorder');
  $this->load->view('web/footer');

    }

    public function orderdetails()
    {

     $this->load->view('web/header');
  $this->load->view('web/orderdetails');
  $this->load->view('web/footer');


    }

    public function compare()
    {

    $this->load->view('web/header');
  $this->load->view('web/comparproduct');
  $this->load->view('web/footer');

    }

    public function payresponse()
  {
    
    $data1['status']='';
    $data1['order_id']='1';
    $data1['email']='chaudhariakshay28@gmail.com';
    $data1['payuid']='dfsdfs';
    $data1['paidamount']='2000';
  

   $this->load->view('web/header'); 
   $this->load->view('web/order_response',$data1);
   $this->load->view('web/footer');


  }
  
  
  public function customize()
  {
    $this->load->view('web/header'); 
   $this->load->view('web/customize_form');
   $this->load->view('web/footer');  
      
      
  }

   public  function feedback()
  {

   $data['feedbacklist']=$this->m_feedback->getActive();
   if($data['feedbacklist'])
   {

    $this->load->view('web/header'); 
    $this->load->view('web/feedback',$data);
    $this->load->view('web/footer');  

   }else{
     
    $this->load->view('web/header'); 
    $this->load->view('web/feedbackform');
    $this->load->view('web/footer');  
 
   }

  }

  public function writefeedback()
  {
 
   $this->load->view('web/header'); 
    $this->load->view('web/feedbackform');
    $this->load->view('web/footer');  
 

  }

   public function submitfeedback()
   {


    $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('exact_length', 'Your %s Must Be 10 Have Digits');
    $this->form_validation->set_message('max_length', 'Your %s Must Be at least 6 characters long');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|exact_length[10]');
    $this->form_validation->set_rules('productdetails', 'Product Details', 'required');
    $this->form_validation->set_rules('message', 'Message', 'required|max_length[450]');
    if ($this->form_validation->run() == FALSE)
    {
      
   
     $this->load->view('web/header'); 
     $this->load->view('web/feedbackform');
     $this->load->view('web/footer');  

    }else
    {
      if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    // Your site secret key obtained from Google
    $secret ='6LcmktcZAAAAAEHCaSqose_J1DU7SQbx0K0niyYk';
    $grResponse = $_POST['g-recaptcha-response'];
    // Verify with Google Servers
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$grResponse);
    $responseData = json_decode($verifyResponse);
    
    
       
    if($responseData->success)
    {   
      $res=$this->m_feedback->submitfeedback();
      if($res)
      {
       $this->session->set_flashdata('feedbackmsg','Thank you,your feedback submitted successfully.'); 
       redirect(base_url().'writefeedback');

      }else{

        $this->session->set_flashdata('feedbackmsg','Please try again'); 
        redirect(base_url().'writefeedback');

      }

    }

    }else{

      $this->session->set_flashdata('feedbackmsg','Please try again'); 
        redirect(base_url().'writefeedback'); 
    }

    }

  
 
    }

     public function contactus()
    {
    
     $this->form_validation->set_message('required', 'Pleas Enter %s ');
    $this->form_validation->set_message('exact_length', 'Your %s Must Be 10 Have Digits');
    $this->form_validation->set_message('valid_email', 'Please Enter Valid %s ');
    $this->form_validation->set_message('max_length', 'Your %s Must Be at least 6 characters long');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|exact_length[10]');
    $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email');
    $this->form_validation->set_rules('message', 'Message', 'required|max_length[450]');
    if ($this->form_validation->run() == FALSE)
    {
      
   
     $this->load->view('web/header'); 
     $this->load->view('web/contact');
     $this->load->view('web/footer');  

    }else
    {
 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    // Your site secret key obtained from Google
    $secret ='6LcmktcZAAAAAEHCaSqose_J1DU7SQbx0K0niyYk';
    $grResponse = $_POST['g-recaptcha-response'];
    // Verify with Google Servers
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$grResponse);
    $responseData = json_decode($verifyResponse);
    
    
       
    if($responseData->success)
    {   
             $name=$this->input->post('name');
             $mobile=$this->input->post('mobile');
             $email=$this->input->post('email');
             $msg=$this->input->post('message');

             $message="Enquiry  From stylica,<br><br>";
             $message.="<b>Details as below,</b><br>";
             $message.="Name:-".$name."<br>";
             $message.="Mobile:-".$mobile."<br>";
             $message.="Email:-".$email."<br>";
             $message.="Message:-".$msg."<br>";
        
     

                $config['protocol']     = 'smtp';
                $config['smtp_host']    = 'mail.stylica.org'; //'ssl://smtp.gmail.com'; // this for gmail A/C
                $config['smtp_port']    = '25'; //'465';
                $config['smtp_timeout'] = '7';
                $config['smtp_user']    = $this->config->item('smtp_user'); //'mygmail@gmail.com';
                $config['smtp_pass']    = $this->config->item('smtp_pass');
                $config['charset']      = 'utf-8';
                $config['newline']      = "\r\n";
                $config['mailtype']     = 'text'; // or html
                $config['validation']   = TRUE; // bool whether to validate email or not    
                //$config['protocol'] = "sendmail";
                $config['mailpath'] = '/usr/sbin/sendmail';
                //$config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html'; // Append This Line
                
                 $this->email->initialize($config);
                 $fromEmail=$email;
                 $subject="Enquiry from stylica.org";
                    $this->email->from($fromEmail);
                   $this->email->to('director@stylica.org');
                   // $this->email->to('chaudhariakshay28@gmail.com');
                    $this->email->subject($subject);
                    $this->email->message($message);  
               $res=$this->email->send();

               if($res)
          { 
             
                $this->session->set_flashdata('msg','Form submitted successfully.'); 
                redirect('contact');

          }else{
              
                  $this->session->set_flashdata('msg','Please Try Again.'); 
                redirect('contact');
                }
       }
       
           }else{
               
           $this->session->set_flashdata('msg','Please Try Again.'); 
            redirect('contact');

               
     

           }
      

          }
      }
  
    
     public function showerror()
     {
       echo "<h2><center>Page Not Found </center></h2>";

       exit;

     }
         
 
     

}