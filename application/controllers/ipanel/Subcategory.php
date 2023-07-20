<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

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

     /* echo "<pre>";
      print_r($data['sub_cat_list']);
      exit;
      */

        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/subcategory1',$data);
		$this->load->view('ipanel/footer');

	}

	
   	public function store($id)
   	{

			$res=$this->m_subcategory->insert($id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/subcategory/index/'.$id);
		
		
		
     }
 

	public function edit($id,$recordid,$recordname)
	{
		 
	    $data['info']=$this->m_subcategory->getdetails($id,$recordid);
		$data['cat_list']=$this->m_category->getAll();
		$data['sub_cat_list']=$this->m_subcategory->getAll($id);		
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/subcategory1',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($id,$recordid)
	{
       

			$res=$this->m_subcategory->update($id,$recordid);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}

           
            redirect('ipanel/subcategory/index/'.$id);
		
		
		
     }

       public function status($id,$status,$recordid)
       {

        $result=$this->m_subcategory->changeStatus($id,$status,$recordid);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');
			
			redirect('ipanel/subcategory/index/'.$id);

       }
       
       function getcatwise()
       {
            
        $res=$this->m_subcategory->getcatwise($this->input->post('cat_id'));
 
         echo json_encode($res);

       }

       function getsubcat()
       {
         $res=$this->m_subcategory->getSubCatwise($this->input->post('cat_id'));
 
         echo json_encode($res);

       }
       function getsubsubcatwise()
       {

        $res=$this->m_subcategory->getsubsubcatwise($this->input->post('cat_id'),$this->input->post('sub_cat_id'));
 
         echo json_encode($res);


       }


    


  }
	
	
