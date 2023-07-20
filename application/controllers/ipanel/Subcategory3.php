<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory3 extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_subcategory3'));
		$this->load->model(array('ipanel/m_subcategory2'));
		$this->load->model(array('ipanel/m_subcategory1'));
		$this->load->model(array('ipanel/m_category'));
        checkLogin();
		
    }

	public function index()
	{

      $data['cat_list']=$this->m_category->getAll();
      $data['sub_cat3_list']=$this->m_subcategory3->getAll();


        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/subcategory3',$data);
		$this->load->view('ipanel/footer');

	}

	
   	public function store()
   	{

			$res=$this->m_subcategory3->insert();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/subcategory3');
		
		
		
     }
 

	public function edit($id)
	{
		$data['cat_list']=$this->m_category->getAll();
	    $data['info']=$this->m_subcategory3->getdetails($id);
		$data['sub_cat3_list']=$this->m_subcategory3->getAll();
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/subcategory3',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($id)
	{
            
			$res=$this->m_subcategory3->update($id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/subcategory3');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_subcategory3->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/subcategory3');


       }


       public function getsubcat2wise()
       {
       	
       

         $res=$this->m_subcategory3->getsubcat2wise($this->input->post('sub_cat_id2'),$this->input->post('sub_cat_id1'),$this->input->post('cat_id'));
 
       echo json_encode($res);

       	

       }



    


  }
	
	
