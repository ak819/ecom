<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volume extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_volume'));
        checkLogin();
		
    }

	public function index()
	{

     $data['brandlist']=$this->m_volume->getAll();		
        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/volume',$data);
		$this->load->view('ipanel/footer');

	}
   	public function store()
   	{

			$res=$this->m_volume->insert();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/volume');
		
		
		
     }
 

	public function edit($event_id)
	{
		 
	    $data['info']=$this->m_volume->getdetails($event_id);
		$data['brandlist']=$this->m_volume->getAll();		
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/volume',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($id)
	{
       

			$res=$this->m_volume->update($id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/volume');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_volume->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/volume');


       }



    


  }
	
	
