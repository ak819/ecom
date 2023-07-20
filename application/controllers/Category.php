<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
		  function  __construct() 
	  {
  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
	$this->load->helper('identical');# Load the pagination library
	$this->load->model(array('ipanel/M_category'));

	$this->category_upload_path = realpath(APPPATH.'../assets/ipanel/uploads/category_img');
	
	checkLogin();
    }
	public function index()
	{
		// get all the categories
        
		$data['categoryList']=$this->M_category->getAll();
		//print_r($data);exit;
		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/category',$data);
        $this->load->view('ipanel/footer');		
	
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form 
		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/addcategory');
        $this->load->view('ipanel/footer');	
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		if($_FILES['cat_img']['name'])
		{
				$pass_data    = array();
				$file_name	=	uplodeImage($this->category_upload_path,'cat_img',$pass_data);
				$file_path  = $this->category_upload_path.'/'.$file_name;
				$thumb_path = $this->category_upload_path.'/thumb/';
				resize_image($file_path,$thumb_path,360,248);//275,184
				$small_path = $this->category_upload_path.'/small/';
				resize_image($file_path,$small_path,100,75);	
		}
		else
		{
			$file_name =	$this->input->post('hidden_photo'); 
		}
		$result=$this->M_category->insert($file_name);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Added !');
			  header("location:".base_url()."Category");
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the 
		
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the 
		$data['category']=$this->M_category->getdetails($id);
		$data['categoryList']=$this->M_category->getAll();
		//echo "<pre>";
		//print_r($data);exit;
		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/category',$data);
        $this->load->view('ipanel/footer');	
	
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(isset($_FILES['cat_img']) && $_FILES['cat_img']['name'])
		{
				$pass_data    = array();
				$file_name	=	uplodeImage($this->category_upload_path,'cat_img',$pass_data);
				$file_path  = $this->category_upload_path.'/'.$file_name;
				$thumb_path = $this->category_upload_path.'/thumb/';
				resize_image($file_path,$thumb_path,360,248);//275,184
				$small_path = $this->category_upload_path.'/small/';
				resize_image($file_path,$small_path,100,75);	
		}
		else
		{
			$file_name =	$this->input->post('hidden_photo'); 
		}
		$result=$this->M_category->update($file_name,$id);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Updated !');
			 header("location:".base_url()."Category");
			  //redirect($_SERVER['HTTP_REFERER']);
		
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete

	}

	/**
	 * change status  of the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function status($status,$id)
	{
		$result=$this->M_category->changeStatus($status,$id);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');
			  header("location:".base_url()."Category");
	}


	public function setpriority()
	{
		$data['catList']=$this->m_category->getActiveCategories();
		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/categoryListPriority',$data);
        $this->load->view('ipanel/footer');	
	}
	public function updatepriority()
	{
		
		$result=$this->m_category->updatepriority();
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');
			  header("location:".base_url()."Category/setpriority");

	}
	public function add()
	{
		$_POST['cat_status']='y';
		echo $result=$this->m_category->addcategory();


	}



	
}