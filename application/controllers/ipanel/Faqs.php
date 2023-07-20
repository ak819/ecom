<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_faqs'));
        checkLogin();
		
    }

	public function index()
	{

     $data['faq_list']=$this->m_faqs->getAll();	
     $data['faq_option']=$this->m_faqs->getoption();

  

        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/faqlist',$data);
		$this->load->view('ipanel/footer');

	}

	
   	public function store()
   	{

			$res=$this->m_faqs->insert();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/Faqs');
		
		
		
     }
 

	public function edit($id)
	{
		 
	    $data['info']=$this->m_faqs->getdetails($id);
		$data['faq_list']=$this->m_faqs->getAll();
		 $data['faq_option']=$this->m_faqs->getoption();		
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/faqlist',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($cat_id)
	{
       

			$res=$this->m_faqs->update($cat_id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/Faqs');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_faqs->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/Faqs');


       }

       public function categorypriority()
       {

		$data['cat_list']=$this->m_faqs->getActive();		

		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/categoryspriority',$data);
		$this->load->view('ipanel/footer');
		

       }

       public function updatepriority()
       {
       
       
        $result=$this->m_faqs->updatepriority();
		
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
     

     public function faqoption()
     {

      $data['faqoptions']=$this->m_faqs->getoption();
      /*echo "<pre>";
      print_r($data);
      exit;*/
        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/faqfor',$data);
		$this->load->view('ipanel/footer');

     }

     public function optionstore()
   	{

			$res=$this->m_faqs->insertoption();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/faqs/faqoption');
		
		
		
     }
 

	public function optionedit($id)
	{
		 
	    $data['info']=$this->m_faqs->getoptiondetails($id);
	   $data['faqoptions']=$this->m_faqs->getoption();
      /*echo "<pre>";
      print_r($data);
      exit;*/
        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/faqfor',$data);
		$this->load->view('ipanel/footer');
		
		
		
	}

	public function optionupdate($id)
	{
       

			$res=$this->m_faqs->updateoption($id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/faqs/faqoption');
		
		
		
     }

       public function optionstatus($status,$id)
       {

        $result=$this->m_faqs->changeoptionStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect($_SERVER['HTTP_REFERER']);		


       }


    


  }
	
	
