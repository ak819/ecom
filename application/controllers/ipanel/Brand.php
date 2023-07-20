<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_brand'));
        checkLogin();
		
    }

	public function index()
	{

     $data['brandlist']=$this->m_brand->getAll();		
        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/brand/brand',$data);
		$this->load->view('ipanel/footer');

	}
   	public function store()
   	{

			$res=$this->m_brand->insert();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/Brand');
		
		
		
     }
 

	public function edit($event_id)
	{
		 
	    $data['info']=$this->m_brand->getdetails($event_id);
		$data['brandlist']=$this->m_brand->getAll();		
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/brand/brand',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($id)
	{
       

			$res=$this->m_brand->update($id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/Brand');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_brand->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/Brand');


       }



    


  }
	
	
