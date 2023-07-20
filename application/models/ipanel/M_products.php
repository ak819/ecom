<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_products extends CI_Model {
    public function __construct()
    {

    	parent::__construct();
    }
    public function getAll()
    {
    	//return $this->db->order_by('id','desc')->get('tbl_products')->result();
          return  $this->db->select('tbl_products.*,tbl_brand.name as brand_name,tbl_category.cat_name,tbl_products_images.name as p_image')
                     ->from('tbl_products')
                     ->join('tbl_brand','tbl_products.brand_id = tbl_brand.id','left')
                     ->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->group_by('tbl_products.id')
                     ->order_by('tbl_products.id','desc')
                     ->get('')
                     ->result();
 
    }

   
    public function getActive()
    {
        return $this->db->where('p_status','active')->order_by('priority','asc')->get('tbl_products')->result();
    }
      public function getdetails($id)
    {
        return $this->db->where('id',$id)->get('tbl_products')->result_array();
    }



    function insert($pdffile)
    {
        $data=array(
                'p_name'=>$this->input->post('p_name'),
                'model_no'=>$this->input->post('model_no'),
                'brand_id'=>$this->input->post('brand'),
                'cat_id'=>$this->input->post('cat_id'),
                'sub_id1'=>$this->input->post('sub_id1'),
                'sub_id2'=>$this->input->post('sub_id2'),
                'unit'=>$this->input->post('unit'),
                'bottom_price'=>$this->input->post('base_price'),
                'p_weight'=>$this->input->post('p_weight'),
                'gst'=>$this->input->post('gst'),
                'discount'=>$this->input->post('discount'),
                'tech_spec'=>$this->input->post('tech_spec'),
                //'warranty'=>$this->input->post('warranty'),
                //'support'=>$this->input->post('support'),
                'status'=>$this->input->post('status'),
                //'p_pdf'=>$pdffile
             );                                                                              
        return $this->db->insert('tbl_products',$data);
    }
    function update($id,$pdffile)
    {
        $data=array(
                'p_name'=>$this->input->post('p_name'),
                'model_no'=>$this->input->post('model_no'),
                'brand_id'=>$this->input->post('brand'),
                'cat_id'=>$this->input->post('cat_id'),
                'sub_id1'=>$this->input->post('sub_id1'),
                'sub_id2'=>$this->input->post('sub_id2'),
                'unit'=>$this->input->post('unit'),
                'bottom_price'=>$this->input->post('base_price'),
                'p_weight'=>$this->input->post('p_weight'),
                'gst'=>$this->input->post('gst'),
                'discount'=>$this->input->post('discount'),
                'tech_spec'=>$this->input->post('tech_spec'),
                //'warranty'=>$this->input->post('warranty'),
                //'support'=>$this->input->post('support'),
                'status'=>$this->input->post('status'),
                //'p_pdf'=>$pdffile
              
               );
        return $this->db->where('id',$id)->update('tbl_products',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('tbl_products',$data);
    }
   
   
    
    function insertxls($data)
    {
        unset($data[0]);

        foreach ($data as $product) {

       $brand_id=$this->getbrandid($product[1]);

              
        $data=array(
                'p_name'=>$product[0],
                'model_no'=>$product[2],
                'brand_id'=>$brand_id,
                'cat_id'=>$this->input->post('cat_id'),
                'sub_id1'=>$this->input->post('sub_id1'),
                'sub_id2'=>$this->input->post('sub_id2'),
                'sub_id3'=>$this->input->post('sub_id3'),
                'sub_id4'=>$this->input->post('sub_id4'),
                'sub_id5'=>$this->input->post('sub_id5'),
                'sub_id6'=>$this->input->post('sub_id6'),
                'sub_id7'=>$this->input->post('sub_id7'),
                'sub_id8'=>$this->input->post('sub_id8'),
                'sub_id9'=>$this->input->post('sub_id9'),
                'sub_id10'=>$this->input->post('sub_id10'),
                'bottom_price'=>$product[5],
                'gst'=>$product[4],
                'tech_spec'=>$product[3],
                'warranty'=>$product[6],
                'support'=>$product[7],
                'status'=>'d',
             );
               

             $this->db->insert('tbl_draft_products',$data);
        }
        return true;
    }

    public function getbrandid($brandname)
    { 
        $id= $this->db->select('tbl_brand.id as id')
                 ->from('tbl_brand')
                 ->where('name',$brandname)
                 ->get('')
                 ->row('id');
       if($id)
       {
         return $id;
       }else{

        return 0;
       }


    }

    public function destory($id)
    {
       return $this->db->delete('tbl_products',"id=$id");
    }



 

    public function getImages($p_id)
    {

       //return $this->db->where('p_id',$p_id)->get('tbl_products_images')->result();

        return $this->db->select('tbl_products_images.*,tbl_products.p_name')
                            ->from('tbl_products_images')
                            ->join('tbl_products','tbl_products_images.p_id=tbl_products.id','left')
                            ->where('tbl_products_images.p_id',$p_id)
                            ->get()
                            ->result();


    }

    public function storeimg($filename,$p_id)
    {
        $data=array(
                   'name'=>$filename,
                   'p_id'=>$p_id,
                 );

       return $this->db->insert('tbl_products_images',$data);

    }


     public function deleteimg($name,$p_id)
    {

        $this->db->where('name', $name);
        $this->db->where('p_id',$p_id);

    return  $this->db->delete('tbl_products_images');

    }
    
    public function deleteimg2($name,$id)
    {

        $this->db->where('name', $name);
        $this->db->where('id',$id);
        return  $this->db->delete('tbl_products_images');
    }
    
    public function getImageDetails($id)
    {
   return $this->db->where('id',$id)->get('tbl_products_images')->result();
    }
    
    public function updateImage($id,$filename)
    {
      $data=array(
                   'name'=>$filename,
                 );

      
                       $this->db->where('id',$id);
      return  $this->db->update('tbl_products_images',$data);  


    }

    public function imagestatus($status,$id)
    {
      $data=array('status'=>$status);
    return $this->db->where('id',$id)->update('tbl_products_images',$data);


    }

    public function imagepriority()
    {

      foreach ($_POST['photo'] as $id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('id',$id)->update('tbl_products_images',$data);
        }

        return 1;


    }


     public function getallDraft()
    {
      
       return  $this->db->select('tbl_draft_products.*,tbl_brand.name as brand_name,tbl_category.cat_name')
                     ->from('tbl_draft_products')
                     ->join('tbl_brand','tbl_draft_products.brand_id = tbl_brand.id','left')
                     ->join('tbl_category','tbl_draft_products.cat_id = tbl_category.cat_id')
                     ->where('tbl_draft_products.status','a')
                     ->order_by('tbl_draft_products.id','desc')
                     ->get('')
                     ->result();


    }

   

    public function movetoproduct()
    {

     $draftproduct=$this->input->post('chk_product');

      foreach($draftproduct as $val)
      {
        try{
        $draftdetails=$this->getDraftDetails($val);

        $data=array('p_name'=>$draftdetails->p_name,
                    'model_no'=>$draftdetails->model_no,
                    'brand_id'=>$draftdetails->brand_id,
                    'cat_id'=>$draftdetails->cat_id,
                    'sub_id1'=>$draftdetails->sub_id1,
                    'sub_id2'=>$draftdetails->sub_id2,
                    'sub_id3'=>$draftdetails->sub_id3,
                    'sub_id4'=>$draftdetails->sub_id4,
                    'sub_id5'=>$draftdetails->sub_id5,
                    'sub_id6'=>$draftdetails->sub_id6,
                    'sub_id7'=>$draftdetails->sub_id7,
                    'sub_id8'=>$draftdetails->sub_id8,
                    'sub_id9'=>$draftdetails->sub_id9,
                    'sub_id10'=>$draftdetails->sub_id10,
                    'bottom_price'=>$draftdetails->bottom_price,
                    'gst'=>$draftdetails->gst,
                    'tech_spec'=>$draftdetails->tech_spec,
                    'warranty'=>$draftdetails->warranty,
                    'support'=>$draftdetails->support,
                    'draft_id'=>$draftdetails->id
                   );
         $res=$this->insertoproduct($data);
         if($res)
         {
           $this->deactivateDraft($draftdetails->id);

         }else{


         }
       }
        catch (Exception $e) {
  //alert the user.
        return false;
        
       }

        
      }

      return true;

    }
     public function getDraftDetails($id)
    {

     return $this->db->where('id',$id)->get('tbl_draft_products')->row();

    }
    public function getdraftproduct($id)
    {

     return $this->db->where('id',$id)->get('tbl_draft_products')->result_array();
    }

    public function insertoproduct($data)
    {

       return $this->db->insert('tbl_products1',$data);
    }

    public function deactivateDraft($id)
    {
      $data=array('status'=>'d');
    return $this->db->where('id',$id)->update('tbl_draft_products',$data);


    } 
    public function updatedraft($id)
    {
     $data=array(
                'p_name'=>$this->input->post('p_name'),
                'model_no'=>$this->input->post('model_no'),
                'brand_id'=>$this->input->post('brand'),
                'cat_id'=>$this->input->post('cat_id'),
                
                'sub_id1'=>$this->input->post('sub_id1'),
                'sub_id2'=>$this->input->post('sub_id2'),
                'sub_id3'=>$this->input->post('sub_id3'),
                'sub_id4'=>$this->input->post('sub_id4'),
                'sub_id5'=>$this->input->post('sub_id5'),
                'sub_id6'=>$this->input->post('sub_id6'),
                'sub_id7'=>$this->input->post('sub_id7'),
                'sub_id8'=>$this->input->post('sub_id8'),
                'sub_id9'=>$this->input->post('sub_id9'),
                'sub_id10'=>$this->input->post('sub_id10'),

                
                'bottom_price'=>$this->input->post('base_price'),
                'gst'=>$this->input->post('gst'),
                'discount'=>$this->input->post('discount'),
                'tech_spec'=>$this->input->post('tech_spec'),
                'warranty'=>$this->input->post('warranty'),
                'support'=>$this->input->post('support'),
              
               );
      $this->db->where('id',$id)->update('tbl_draft_products',$data);
       $this->session->set_flashdata('msg','Record Updated !');
        if(isset($_POST['move']))
        {


          $draftdetails=$this->getDraftDetails($id);

        $data=array('p_name'=>$draftdetails->p_name,
                    'model_no'=>$draftdetails->model_no,
                    'brand_id'=>$draftdetails->brand_id,
                    'cat_id'=>$draftdetails->cat_id,
                    'sub_id1'=>$draftdetails->sub_id1,
                    'sub_id2'=>$draftdetails->sub_id2,
                    'sub_id3'=>$draftdetails->sub_id3,
                    'sub_id4'=>$draftdetails->sub_id4,
                    'sub_id5'=>$draftdetails->sub_id5,
                    'sub_id6'=>$draftdetails->sub_id6,
                    'sub_id7'=>$draftdetails->sub_id7,
                    'sub_id8'=>$draftdetails->sub_id8,
                    'sub_id9'=>$draftdetails->sub_id9,
                    'sub_id10'=>$draftdetails->sub_id10,
                    'bottom_price'=>$draftdetails->bottom_price,
                    'gst'=>$draftdetails->gst,
                    'tech_spec'=>$draftdetails->tech_spec,
                    'warranty'=>$draftdetails->warranty,
                    'support'=>$draftdetails->support,
                    'draft_id'=>$draftdetails->id
                   );
         $res=$this->insertoproduct($data);
         if($res)
         {
           $this->deactivateDraft($draftdetails->id);

         }else{


         }
         $this->session->set_flashdata('msg','Record moved successfully  !');
        }

     return 1;

    }


    public function draftdelete($id)
    {

     $data=array('status'=>'deleted');
    return $this->db->where('id',$id)->update('tbl_draft_products',$data);



    }


    public function getvideos($p_id)
    {

         return $this->db->select('tbl_products_videos.*,tbl_products.p_name')
                            ->from('tbl_products_videos')
                            ->join('tbl_products','tbl_products_videos.p_id=tbl_products.id','left')
                            ->where('tbl_products_videos.p_id',$p_id)
                            ->get()
                            ->result();


    }

    public function storevideos($file_name,$p_id)
    {
      $data=array(
                   'name'=>$file_name,
                   'p_id'=>$p_id,
                 );

       return $this->db->insert('tbl_products_videos',$data);


    }

     public function deletevideos($name,$id)
    {
      
        $this->db->where('name', $name);
        $this->db->where('id',$id);
        return  $this->db->delete('tbl_products_videos');
    }


    public function deleteimages()
    {
       $data=array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24',
        '25','26','27','28','29','30','31','32','33','34','35');
       $this->db->where_not_in('p_id',$data);
        return  $this->db->delete('tbl_products_images');


    }



}        