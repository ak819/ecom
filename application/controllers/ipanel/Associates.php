<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Associates extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_associates'));
		$this->img_upload_path = realpath(APPPATH.'../assets/ipanel/uploads/associates_img');
        checkLogin();
		
    }

	public function index()
	{

      $data['companylist_list']=$this->m_associates->getAll();		
        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/our_associates',$data);
		$this->load->view('ipanel/footer');

	}

	
   		public function store()
	{
		/*echo "<pre>";
		print_r($_POST);
		print_r($_FILES);
		exit;*/
		// validate
		if($_FILES['img']['name'])
		{
				$pass_data    = array();
				$file_name	=	uplodeImage($this->img_upload_path,'img',$pass_data);
				$file_path  = $this->img_upload_path.'/'.$file_name;
				$thumb_path = $this->img_upload_path.'/thumb/';
				resize_image($file_path,$thumb_path,360,248);//275,184
				$small_path = $this->img_upload_path.'/small/';
				resize_image($file_path,$small_path,100,75);	
		}
		else
		{
			$file_name =	$this->input->post('hidden_photo'); 
		}
		$result=$this->m_associates->insert($file_name);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Added !');
			 redirect($_SERVER['HTTP_REFERER']);		
	}
 

	public function edit($event_id)
	{
		 
	    $data['info']=$this->m_associates->getdetails($event_id);
		$data['companylist_list']=$this->m_associates->getAll();	
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/p_company',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($id)
	{
		
		if(isset($_FILES['img']) && $_FILES['img']['name'])
		{
				$pass_data    = array();
				$file_name	=	uplodeImage($this->img_upload_path,'img',$pass_data);
				$file_path  = $this->img_upload_path.'/'.$file_name;
				$thumb_path = $this->img_upload_path.'/thumb/';
				resize_image($file_path,$thumb_path,360,248);//275,184
				$small_path = $this->img_upload_path.'/small/';
				resize_image($file_path,$small_path,100,75);	
		}
		else
		{
			$file_name =	$this->input->post('hidden_photo'); 
		}
		$result=$this->m_associates->update($file_name,$id);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Updated !');
			 redirect($_SERVER['HTTP_REFERER']);		
			  //redirect($_SERVER['HTTP_REFERER']);
		
	}

       public function status($status,$id)
       {

        $result=$this->m_associates->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/associates');


       }

       public function categorypriority()
       {

		$data['cat_list']=$this->m_associates->getActive();		

		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/categoryspriority',$data);
		$this->load->view('ipanel/footer');
		

       }

       public function updatepriority()
       {
       
       
        $result=$this->m_associates->updatepriority();
		
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
		else
		{
			$this->session->set_flashdata('msg','Record Priority Changed !');

			  redirect($_SERVER['HTTP_REFERER']);

	    }		  	
  
  
       }



    


  }
	
	
