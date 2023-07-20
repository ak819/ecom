<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channelpartner extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_channelpartner'));
		$this->img_path = realpath(APPPATH.'../assets/ipanel/uploads/channelpartner');
        checkLogin();
		
    }

	public function index()
	{
		$data['channelpartner_list']=$this->m_channelpartner->getAll();
        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/channelpartner',$data);
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
			if(isset($_FILES['image']) AND $_FILES['image']['error']!=4)
		    {
				$pass_data    = array();
				$banner_image	=	uplodeImage($this->img_path,'image',$pass_data);
			
				$file_path  = $this->img_path.'/'.$banner_image;

			
			}
		   else
		    {

		   	$banner_image="";

	        }
			$res=$this->m_channelpartner->insert($banner_image);
			if($res)
			{

               	$this->session->set_flashdata('msg','Banner saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msg','Something wents Wrong !');
			}
           
           redirect('ipanel/Channelpartner/index');
		
		
		
     }
 

	public function edit($event_id)
	{
		 
	    $data['info']=$this->m_channelpartner->getEventDetails($event_id);
		$data['channelpartner_list']=$this->m_channelpartner->getAll();
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/channelpartner',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($banner_id)
	{
      
			
			if(isset($_FILES['image']) AND $_FILES['image']['error']!=4)
			
		    {
				$pass_data    = array();
				$banner_image	=	uplodeImage($this->img_path,'image',$pass_data);
			
				$file_path  = $this->img_path.'/'.$banner_image;

			
			}
		   else{

		   	$banner_image=$this->input->post('hidden_photo');

			}
			
			$res=$this->m_channelpartner->update($banner_id,$banner_image);

			if($res)
			{
               	$this->session->set_flashdata('msg','Banner updated sucessfully');

			}else
			{

              	$this->session->set_flashdata('msg','Something wents Wrong !');


			}
           
           redirect('ipanel/Channelpartner/index');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_channelpartner->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/Channelpartner/index');


       }



    


  }
	
	
