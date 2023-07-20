<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_admin','ipanel/m_user','ipanel/m_category','ipanel/m_products'));
		
		
    }
	public function login()
	{
		
			$email		=	$this->input->post('username');
  			$password	=	md5($this->input->post('password'));
  			$result=$this->m_admin->login($email,$password);
			if($result==1)
			{
				//echo "inn";exit;
				$this->session->set_flashdata('msg'," Welcome !"); 
				header("location:".base_url()."welcome/showdashboard");
			}
				if($result=="0") { $msg= "Username or Password does not match";} elseif($result=="n") { $msg= "User Deactivated";}
				 $this->session->set_flashdata('msg',$msg); 
				 $this->load->view('admin/login');
				 // $this->load->view('welcome/login');
		
	}
	
	public function logout()
   {
        $this->m_admin->logouttime();//update logout time   
        $data = array(
		              'id'  => " ",
		              'first_name'  => " ",
		              'last_name'  => " ",
		              'user_type'  => " ",
		              'logged_in'  => FALSE,
      				);
      $this->session->unset_userdata($data);
      $this->session->sess_destroy();
      header("location:".base_url()."welcome");
   }
   
   public function users()
   {
   	$protype=$this->input->get('protype');

   	$data['userlist']=$this->m_user->getregistredUser($protype);	

   		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/users',$data);
        $this->load->view('ipanel/footer');				
   
   }

     public function adduser()
   {
		$data['categories']=$this->m_category->getAll();
 		$data['adduser']="hekll";
   		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/adduser',$data);
        $this->load->view('ipanel/footer');				
   }
   public function Registration()
	{
  		$accounttype=$this->input->post('accounttype');
		$result=$this->m_user->insert();
		header("location:".base_url()."admin/users/?protype=$accounttype");
	}

	public function status($status,$id)
	{
		$result=$this->m_user->changeStatus($status,$id);
		$this->session->set_flashdata('msg','Record Updated');
		redirect($_SERVER['HTTP_REFERER']);		
	}

	public function productDetails($id)
	{
		$data['productdetails']=$this->m_products->getProductdetail($id);
		$this->load->view('ipanel/productdetails',$data);
	}

}
