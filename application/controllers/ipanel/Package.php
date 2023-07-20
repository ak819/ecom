<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Package extends CI_Controller {
      function  __construct() 
    {
    parent::__construct();
  $this->load->library('pagination');# Load the pagination library
  $this->load->helper('identical');# Load the pagination library
  $this->load->model(array('ipanel/M_products','ipanel/M_package'));

      checkLogin();

    }


     public function list($p_id)
     {
       $data['p_info']=$this->M_products->getdetails($p_id);
       $data['p_packages']=$this->M_package->getPackage($p_id);
       $data['p_id']=$p_id;
       
     
       
       $this->load->view('ipanel/header');
       $this->load->view('ipanel/sidebar');
       $this->load->view('ipanel/product/p_package',$data);
       $this->load->view('ipanel/footer'); 

     }

    
      public function store()
     {

    
      $result=$this->M_package->insert();
     if(!$result)
     {
      $this->session->set_flashdata('msg','Something went Worng !');
      redirect($_SERVER['HTTP_REFERER']);   
     }
      $this->session->set_flashdata('msg','Record Added !');
        //redirect('ipanel/product/Images/'.$p_id);
        redirect($_SERVER['HTTP_REFERER']);   
       

     }


      
      

  public function edit($p_id,$id)
  {
       $data['info']=$this->M_package->getDetails($id);
       $data['p_info']=$this->M_products->getdetails($p_id);
       $data['p_packages']=$this->M_package->getPackage($p_id);
       $data['p_id']=$p_id;
      
    $this->load->view('ipanel/header');  
    $this->load->view('ipanel/sidebar');  
    $this->load->view('ipanel/product/p_package',$data);
    $this->load->view('ipanel/footer');
    
    
    
    
  }



  public function update()
  { 
    $p_id=$this->input->post('p_id');
    $id=$this->input->post('id');
          
       $result=$this->M_package->update($id);
      if($result)
      {
                $this->session->set_flashdata('msg','Record updated sucessfully');

      }else
      {

                $this->session->set_flashdata('msg','Something wents Wrong !');


      }

           redirect('ipanel/package/list/'.$p_id);
    
    
    
     }

       public function status($status,$p_id,$id)
     {
 
      $result=$this->M_package->status($status,$id);

    if(!$result)
    {
      $this->session->set_flashdata('msg','Something went Worng !');
       redirect('ipanel/package/list/'.$p_id);  
    }
      $this->session->set_flashdata('msg','Record Status Changed !');
        redirect('ipanel/package/list/'.$p_id); 
     

     }

    
     public function photopriority()
  {
        /* echo "<pre>";
          print_r($_POST);
          exit;
    */
        $result=$this->M_products->imagepriority();
    //echo "inn";exit;
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