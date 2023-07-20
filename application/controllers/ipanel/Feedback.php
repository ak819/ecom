<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_feedback'));
        checkLogin();
		
    }

	public function index()
	{

     $data['feedbacklist']=$this->m_feedback->getAll();		

        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/feedbacklist',$data);
		$this->load->view('ipanel/footer');

	}

       public function status($status,$id)
       {

        $result=$this->m_feedback->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			redirect($_SERVER['HTTP_REFERER']);	


       }

      
      


    


  }
	
	
