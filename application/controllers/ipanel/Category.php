<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
	  	$this->load->library('form_validation');
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_category','ipanel/m_subcategory'));
        checkLogin();
		
    }

	public function index()
	{

     $data['cat_list']=$this->m_category->getAll();		
        $this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/category',$data);
		$this->load->view('ipanel/footer');

	}

	
   	public function store()
   	{
   		$xssdata = $this->security->xss_clean($_POST);

    if ($this->security->xss_clean($xssdata, TRUE) === FALSE)
      {


             $msg= "Please Try Again";
				 $this->session->set_flashdata('msg',$msg); 
				 $this->load->view('ipanel/login');

      }

			$res=$this->m_category->insert();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/category');
		
		
		
     }
 

	public function edit($event_id)
	{
		 
	    $data['cat_info']=$this->m_category->getdetails($event_id);
		$data['cat_list']=$this->m_category->getAll();		
	
		  
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/category',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}

	public function update($cat_id)
	{
       

			$res=$this->m_category->update($cat_id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/category');
		
		
		
     }

       public function status($status,$id)
       {

        $result=$this->m_category->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');

			 redirect('ipanel/category');


       }

       public function categorypriority()
       {

		$data['cat_list']=$this->m_category->getactiveipanel();		

		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/categoryspriority',$data);
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
		else
		{
			$this->session->set_flashdata('msg','Record Priority Changed !');

			  redirect($_SERVER['HTTP_REFERER']);

	    }		  	
  



       }


        public function filter()
        {

       	$data['cat_list']=$this->m_category->getactiveipanel();
       	$data['filters']=$this->m_category->getfilters();		

		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/filter',$data);
		$this->load->view('ipanel/footer');

        }

        public function checkhavefilter()
        {

        $res=$this->m_category->checkhavefilter($this->input->post('cat_id'));

          if(empty(!$res))
          {
           print_r(json_encode($res));

          }else{
          	
          	return 0;
          }

        }

        public function editfilter($id)
        {
        $data['cat_info']=$this->m_category->getfilterdetails($id);
        $data['cat_list']=$this->m_category->getactiveipanel();
       	$data['filters']=$this->m_category->getfilters();

       	$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/category/filter',$data);
		$this->load->view('ipanel/footer');	


        }
        public function storefilter()
        {

          $res=$this->m_category->storefilter();
			if($res)
			{

               	$this->session->set_flashdata('msg','Record saved sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/category/filter');

       

        }

         public function updatefilter($id)
        {

          $res=$this->m_category->updatefilter($id);
			if($res)
			{

               	$this->session->set_flashdata('msg','Record Updated sucessfully');
			}else
			{

              	$this->session->set_flashdata('msgr','Something wents Wrong !');
			}
           
           redirect('ipanel/category/filter');

       

        }


        public function getfilternames()
        {
        	$cat_id=$this->input->post('cat_id');
        	$res=$this->m_category->getfilternames($cat_id);

            print_r(json_encode($res));

        }
      
      public function getfilterbyindex()
      {

      	$cat_id=$this->input->post('cat_id');
      	$index=$this->input->post('index');
        $res=$this->m_category->getfilterbyindex($cat_id,$index);

        print_r(json_encode($res));


      }

      public function getsubcategory()
      {
      	$cat_id=$this->input->post('cat_id');
      	$index=$this->input->post('index');

         $res=$this->m_subcategory->getsubcategory($cat_id,$index);

        print_r(json_encode($res));
   

      }


    


  }
	
	
