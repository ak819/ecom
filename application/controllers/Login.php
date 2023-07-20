<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_admin','ipanel/m_advertise'));
		
		
    }
    public function index()
	{

		$this->load->view('ipanel/login');
		
	}
	 public function dashboard()
	{

		$this->load->view('ipanel/header');
		$this->load->view('ipanel/sidebar');
		$this->load->view('ipanel/dashboard');
		$this->load->view('ipanel/footer');
		
	}

	public function login()
	{
		
			$email		=	$this->input->post('username');
  			$password	=	md5($this->input->post('password'));
  			//echo "inn";
  			$result=$this->m_admin->login($email,$password);
			if($result==1)
			{
				
				$this->session->set_flashdata('msg'," Welcome !"); 
				header("location:".base_url()."login/dashboard");
			}

			echo $result;
			exit;
				if($result=="0") { $msg= "Username or Password does not match";} elseif($result=="n") { $msg= "User Deactivated";}
				 $this->session->set_flashdata('msg',$msg); 
				 $this->load->view('ipanel/login');
				
		
	}
	
	public function logout()
   {
   	//echo "inn";exit;
        $this->m_admin->logouttime();//update logout time   
        $data = array(
              'id'  => "",
              'first_name'  => "",
              'last_name'  => "",
              'user_type'  => "",
              'logged_in'  => FALSE,
      		);
      $this->session->unset_userdata($data);
      $this->session->sess_destroy();
      $msg="asdd";
      $this->session->set_flashdata('msg',$msg); 
      redirect('ipanel/login');
   }
 
}
