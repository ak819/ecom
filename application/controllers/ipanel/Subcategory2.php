<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory2 extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_subcategory2'));
		$this->load->model(array('ipanel/m_subcategory1'));
		$this->load->model(array('ipanel/m_category'));
        checkLogin();
		
    }

	public function index()
	{

      $data['cat_list']=$this->m_category->getAll();
      $data['sub_cat2_list']=$this->m_subcategory2->getAll();

   

        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/subcategory2',$data);
		$this->load->view('ipanel/footer');

	}

	
   	public function store()
   	{
      /* echo "<pre>";
       print_r($_POST);
       exit;*/

			$res=$this->m_subcategory2->insert();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/subcategory2');
		
		
		
     }
 

	public function edit($id)
	{
		 
	    $data['info']=$this->m_subcategory2->getdetails($id);
		$data['cat_list']=$this->m_category->getAll();
		$data['sub_cat2_list']=$this->m_subcategory2->getAll();
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/subcategory2',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($id)
	{
            
			$res=$this->m_subcategory2->update($id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/subcategory2');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_subcategory2->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/subcategory2');


       }

       public  function getsubcatwise()
       {

       $res=$this->m_subcategory2->getsubcatwise($this->input->post('sub_cat_id'),$this->input->post('cat_id'));
 
       echo json_encode($res);

       }



    


  }
	
	
