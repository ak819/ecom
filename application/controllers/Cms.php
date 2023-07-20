<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_cms'));
    }
     public function page()
   {
 		$pagename=$this->input->get('pagename');

		$data['pagedata']=$this->m_cms->getdata($pagename);
  
   		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/cms/page',$data);
        $this->load->view('ipanel/footer');				
   
   }
   public function updatepage($id)
   {

   		$result=$this->m_cms->updatepage($id);
  		$pagename=$this->input->post('pagename');
        if ($result) {
        	$this->session->set_flashdata('msg'," updated !"); 
        }else{
        	$this->session->set_flashdata('msg'," Something went wrong !"); 
        }
      	header("location:".base_url()."cms/page?pagename=".$pagename);

  		
   }
   public function contact()
   {
      $data['contact']=$this->m_cms->getcontact();


         $this->load->view('ipanel/header');
         $this->load->view('ipanel/sidebar');
         $this->load->view('ipanel/cms/contact',$data);
         $this->load->view('ipanel/footer');       

   }

   public function updatecontact()
   {
         $result=$this->m_cms->updatecontact();
        if ($result) {
          $this->session->set_flashdata('msg'," updated !"); 
        }else{
          $this->session->set_flashdata('msg'," Something went wrong !"); 
        }
        redirect(base_url().'cms/contact');


   }
}
