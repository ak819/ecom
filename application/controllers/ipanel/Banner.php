<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_banner'));
		$this->banner_path = realpath(APPPATH.'../assets/ipanel/uploads/banner');
        checkLogin();
		
    }

	public function index()
	{
		$data['bannerList']=$this->m_banner->getAll();
        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/banner',$data);
		$this->load->view('ipanel/footer');

	}

	
   	public function store()
   	{
/*
        echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        exit;
*/
			if(isset($_FILES['banner_image']) AND $_FILES['banner_image']['error']!=4)
		    {
				$pass_data    = array();
				$banner_image	=	uplodeImage($this->banner_path,'banner_image',$pass_data);
			
				$file_path  = $this->banner_path.'/'.$banner_image;
			
			}
		   else
		    {

		   	$banner_image="";

	        }
			$res=$this->m_banner->insert($banner_image);
			if($res)
			{

               	$this->session->set_flashdata('msg','Banner saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msg','Something wents Wrong !');
			}
           
           redirect('ipanel/banner/index');
		
		
		
     }
 

	public function edit($event_id)
	{
		 
	    $data['banner_info']=$this->m_banner->getEventDetails($event_id);
		$data['bannerList']=$this->m_banner->getAll();
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/banner',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($banner_id)
	{
       

      
			
			if(isset($_FILES['banner_image']) AND $_FILES['banner_image']['error']!=4)
			
		    {
				$pass_data    = array();
				$banner_image	=	uplodeImage($this->banner_path,'banner_image',$pass_data);
			
				$file_path  = $this->banner_path.'/'.$banner_image;
			
		
			}
		   else{

		   	$banner_image=$this->input->post('hidden_photo');


			}
			
			$res=$this->m_banner->update($banner_id,$banner_image);

			if($res)
			{
               	$this->session->set_flashdata('msg','Banner updated sucessfully');

			}else
			{

              	$this->session->set_flashdata('msg','Something wents Wrong !');


			}
           
           redirect('ipanel/banner/index');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_banner->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/banner/index');


       }



    


  }
	
	
