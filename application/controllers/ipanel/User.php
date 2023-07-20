<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
		  function  __construct() 
	  {

  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
    $this->load->library('Form_validation');
	$this->load->helper('identical');# Load the pagination library
	$this->load->model(array('ipanel/m_user'));
	
	//checkLogin();
     }


public function index()
{

  $data['users']=$this->m_user->getallusers();

  $this->load->view('ipanel/header');  
  $this->load->view('ipanel/sidebar');  
  $this->load->view('ipanel/userlist',$data);
  $this->load->view('ipanel/footer');


}

public function excel()
{

 
  $data['users']=$this->m_user->getusersdata();

  $this->load->view('ipanel/header');  
  $this->load->view('ipanel/sidebar');  
  $this->load->view('ipanel/userexcellist',$data);
  $this->load->view('ipanel/footer');



}












}     