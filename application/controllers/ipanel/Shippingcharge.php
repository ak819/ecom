<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Shippingcharge extends CI_Controller {
		  function  __construct() 
	  {
  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
	$this->load->helper('identical');# Load the pagination library
	$this->load->model(array('ipanel/m_shippingcharge'));

    }



	public function index()
	{
		// get all the categories
        
		$data['shippingchagre']=$this->m_shippingcharge->getAll();

	/*	echo "<pre>";
		print_r($data);
		exit;*/

		$this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/shippingcharge_list',$data);
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
		 $data['cat_list']=$this->m_category->getactiveipanel();
		 $data['brand_list']=$this->m_brand->getActive();

	    $this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/product/addproduct',$data);
        $this->load->view('ipanel/footer');		
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(isset($_FILES['p_pdf']) && $_FILES['p_pdf']['name'])
		{
				$pass_data    = array();
				$filename	=	uplodeImage($this->pdf_upload_path,'p_pdf',$pass_data);

			$file_path  = base_url().'assets/ipanel/uploads/product_pdf/'.$filename;
		}
		else
		{
			$file_path =""; 
		}
		

		$result=$this->M_products->insert($file_path);
		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Added !');
			  header("location:".base_url()."ipanel/product");
			 
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
		$data['info']=$this->m_shippingcharge->getdetails($id);
		$data['shippingchagre']=$this->m_shippingcharge->getAll();



	    $this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/shippingcharge_list',$data);
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


		$result=$this->m_shippingcharge->update($id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Updated !');
			redirect('ipanel/shippingcharge');	
			 
		
	}
	
	/**
	 * change status  of the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function status($status,$id)
	{
		$result=$this->M_products->changeStatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record Status Changed !');
			  header("location:".base_url()."ipanel/product");
	}



	public function importfromxls()
	{
		ini_set('memory_limit', '-1');
		/*echo "<pre>";
		print_r($_FILES);*/
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['excel']['name']) && in_array($_FILES['excel']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['excel']['name']);
            $extension = end($arr_file);

        if('csv' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        
        $spreadsheet = $reader->load($_FILES['excel']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

         /* echo "<pre>";
           print_r($_POST);
           print_r($sheetData);
           exit;*/
        $result=$this->M_products->insertxls($sheetData);

     	if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Excel Imported Successfully...');
			  header("location:".base_url()."ipanel/product");
        }
    }

 
     
     public function Images($p_id)
     {
       $data['p_images']=$this->M_products->getImages($p_id);
       $data['p_id']=$p_id;
       
       /*echo "<pre>";
       print_r($data);
       exit;
       */
       $this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/product/p_images',$data);
        $this->load->view('ipanel/footer');	

     }

    
      public function storeimg()
     {
      
          if($_FILES['file']['name'])
       {
      
        $pass_data    = array();
        $file_name  = uplodeImage($this->image_upload_path,'file',$pass_data);
      
        $file_path  = $this->image_upload_path.'/'.$file_name;
        $thumb_path = $this->image_upload_path.'/thumb/';
        resize_image($file_path,$thumb_path,360,248);//275,184
        $small_path = $this->image_upload_path.'/small/';
         resize_image($file_path,$small_path,100,75);
         $p_id=$this->input->post('p_id');
         $res=$this->M_products->storeimg($file_name,$p_id);
         if($res)
         	{
         		return $file_name;
         	}

        }

     }


       public function removeimg()
       {
        
      $name=$_POST['name'];
      $p_id=$_POST['p_id'];
      //echo "id".$id;exit;
       $result=$this->M_products->deleteimg($name,$p_id);
       $filename = $this->image_upload_path."\\".$_POST['name']; 
       //echo "file".$filename;exit;
       delete_files($filename);
       }

       public function deleteImg($name,$id)
       {

          $result=$this->M_products->deleteimg2($name,$id);
          if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record deleted sucessfully..');
			 redirect($_SERVER['HTTP_REFERER']);
        }
          	
    

	public function editImage($p_id,$id)
	{
		 
	    $data['photo']=$this->M_products->getImageDetails($id);
	    
		$this->load->view('ipanel/header');  
        $this->load->view('ipanel/sidebar');  
		$this->load->view('ipanel/product/edit_image',$data);
		$this->load->view('ipanel/footer');
		
		
		
		
	}



	public function updateImage($p_id,$id)
	{
      		
		if(isset($_FILES['photo']) AND $_FILES['photo']['error']!=4)
			
		    {
				 $pass_data    = array();
        $file_name  = uplodeImage($this->image_upload_path,'photo',$pass_data);
      
        $file_path  = $this->image_upload_path.'/'.$file_name;
        $thumb_path = $this->image_upload_path.'/thumb/';
        resize_image($file_path,$thumb_path,360,248);//275,184
        $small_path = $this->image_upload_path.'/small/';
        resize_image($file_path,$small_path,100,75);
        
			}
		   else{

		   	$file_name=$this->input->post('hidden_photo');


			}
			
			$res=$this->M_products->updateImage($id,$file_name);

			if($res)
			{
               	$this->session->set_flashdata('msg','Record updated sucessfully');

			}else
			{

              	$this->session->set_flashdata('msg','Something wents Wrong !');


			}
           
           redirect('ipanel/product/Images/'.$p_id);
		
		
		
     }

     public function imagestatus($status,$p_id,$id)
     {
 
      $result=$this->M_products->imagestatus($status,$id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			 redirect('ipanel/product/Images/'.$p_id);	
		}
			$this->session->set_flashdata('msg','Record Status Changed !');
			  redirect('ipanel/product/Images/'.$p_id);	
     

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
     

     public function draft()
     {
       
      $data['productsList']=$this->M_products->getallDraft();

        $this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/product/draft_product_list',$data);
        $this->load->view('ipanel/footer');	




     }


     public function draftedit($id)
     {

        $data['info']=$this->M_products->getdraftproduct($id);
	    $data['filters']=$this->m_category->getfilternamesarray($data['info'][0]['cat_id']);
		$data['cat_list']=$this->m_category->getactiveipanel();
		$data['brand_list']=$this->m_brand->getActive();

	    $this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/product/adddraftproduct',$data);
        $this->load->view('ipanel/footer');	
	




     }

     public function updatedraft($id)
     {



       $result=$this->M_products->updatedraft($id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect('ipanel/product/draft');		
		}else{
           
            
         	
			redirect('ipanel/product/draft');		

		}
		


     }

     public function draftdelete($id)
     {
     	 $result=$this->M_products->draftdelete($id);

		if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect('ipanel/product/draft');		
		}else{
           
            
         	
			redirect('ipanel/product/draft');		

		}
     }

     public function movetoproduct()
     {
       
       $res=$this->M_products->movetoproduct();
       if($res)
       {
       	$this->session->set_flashdata('msg','Record Moved Successfully ');
			redirect($_SERVER['HTTP_REFERER']);	

       }else{
       	
       	$this->session->set_flashdata('msgr','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);	

       }

       

     }


     public function video($p_id)
     {
     	
      $data['p_images']=$this->M_products->getvideos($p_id);
      $data['p_id']=$p_id;

       $this->load->view('ipanel/header');
        $this->load->view('ipanel/sidebar');
        $this->load->view('ipanel/product/p_videos',$data);
        $this->load->view('ipanel/footer');	


     }
      public function storevideo()
     {
       
      /*   if($_FILES['file']['name'])
       {
      
        $pass_data    = array();
       
        $file_name  = uplodeImage($this->video_upload_path,'file',$pass_data);
        $file_path  = $this->video_upload_path.'/'.$file_name;
         $p_id=$this->input->post('p_id');
         $res=$this->M_products->storevideos($file_name,$p_id);
         if($res)
         	{
         		return $file_name;
         	}

        }*/

         if($_FILES['file']['name'])
       {
      
        $pass_data    = array();
        $file_name  = uplodevideo($this->video_upload_path,'file',$pass_data);
      
        $file_path  = $this->video_upload_path.'/'.$file_name;
       
        $p_id=$this->input->post('p_id');
        $res=$this->M_products->storevideos($file_name,$p_id);
        if($res)
         	{
         		return $file_name;
         	}

        }

     }


     public function removevideo()
      {
        
      $name=$_POST['name'];
      $p_id=$_POST['p_id'];
      //echo "id".$id;exit;
       $result=$this->M_products->deletevideos($name,$p_id);
       $filename = $this->video_upload_path."\\".$_POST['name']; 
       //echo "file".$filename;exit;
       delete_files($filename);

       }

       public function deletevideo($name,$id)
       {

          $result=$this->M_products->deletevideos($name,$id);
          if(!$result)
		{
			$this->session->set_flashdata('msg','Something went Worng !');
			redirect($_SERVER['HTTP_REFERER']);		
		}
			$this->session->set_flashdata('msg','Record deleted sucessfully..');
			 redirect($_SERVER['HTTP_REFERER']);
        }
          	
    

}