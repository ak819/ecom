<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory1 extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_subcategory'));
		$this->load->model(array('ipanel/m_category'));
        checkLogin();
		
    }

	public function index($id)
	{

      $data['cat_list']=$this->m_category->getAll();
      $data['sub_cat_list']=$this->m_subcategory->getAll($id);

        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/subcategory1',$data);
		$this->load->view('ipanel/footer');

	}

	
   	public function store()
   	{

			$res=$this->m_subcategory1->insert();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/subcategory1');
		
		
		
     }
 

	public function edit($id)
	{
		 
	    $data['info']=$this->m_subcategory1->getdetails($id);
		$data['cat_list']=$this->m_category->getAll();
		$data['sub_cat_list']=$this->m_subcategory1->getAll();		
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/subcategory1',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($cat_id)
	{
       

			$res=$this->m_subcategory1->update($cat_id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/subcategory1');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_subcategory1->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/subcategory1');


       }
       
       function getcatwise()
       {
            
        $res=$this->m_subcategory1->getcatwise($this->input->post('cat_id'));
 
         echo json_encode($res);

       }


    


  }
	
	
