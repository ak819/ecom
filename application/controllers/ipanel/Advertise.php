<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advertise extends CI_Controller {
		  function  __construct() 
	  {
  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
	$this->load->helper('identical');# Load the pagination library
	$this->load->model(array('ipanel/M_advertise'));

	$this->img_upload_path = realpath(APPPATH.'../assets/ipanel/uploads/img');
	
	checkLogin();
    }
	public function index()
	{
		// get all the categories
        
		$data['advertiseList']=$this->M_advertise->getAll();
		//print_r($data);exit;
		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/advertise',$data);
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

	/*	echo "<pre>";
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
		$result=$this->M_advertise->insert($file_name);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Added !');
			  header("location:".base_url()."ipanel/Advertise");
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
		$data['advertise']=$this->M_advertise->getdetails($id);
		$data['advertiseList']=$this->M_advertise->getAll();
		//echo "<pre>";
		//print_r($data);exit;
		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/advertise',$data);
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
		$result=$this->M_advertise->update($file_name,$id);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Updated !');
			 header("location:".base_url()."ipanel/Advertise");
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
		$result=$this->M_advertise->changeStatus($status,$id);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');
			  header("location:".base_url()."ipanel/Advertise");
	}


	public function setpriority()
	{
		$data['catList']=$this->M_advertise->getActiveCategories();
		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/categoryListPriority',$data);
        $this->load->view('ipanel/footer');	
	}
	public function updatepriority()
	{
		
		$result=$this->M_advertise->updatepriority();
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');
			  header("location:".base_url()."Advertise/setpriority");

	}
	public function add()
	{
		$_POST['cat_status']='y';
		echo $result=$this->M_advertise->addcategory();


	}



	
}