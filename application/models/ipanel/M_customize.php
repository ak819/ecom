<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_customize extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	return $this->db->order_by('id','desc')->get('tbl_customize')->result();
    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('tbl_category.*')->where_in('cat_id',$category)->order_by('cat_id','desc')->get('tbl_category')->result();
    }
    public function getActive()
    {
      return $this->db->select('tbl_feedback.name,rating,message,date_inserted')
                     ->where('status','a')
                     ->order_by('id','desc')
                     ->get('tbl_feedback')->result();
    }
      public function getdetails($id)
    {

        return $this->db->where('cat_id',$id)->get('tbl_category')->row();

    }
  
   
    public function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('tbl_feedback',$data);
    }


    public function submit($attachment)
    {   
        if($this->input->post('product'))
        {
          $product=implode(',',$this->input->post('product'));
        }else{
          $product="";
        }
        $data=array('minlength'=>$this->input->post('minlength'),
                    'maxlength'=>$this->input->post('maxlength'),
                    'minwidth'=>$this->input->post('minwidth'),
                    'maxwidth'=>$this->input->post('maxwidth'),
                    'minthickness'=>$this->input->post('minthickness'),
                    'maxthickness'=>$this->input->post('maxthickness'),
                    'product'=>$product,
                    'qty'=>$this->input->post('qty'),
                    'email'=>$this->input->post('email'),
                    'message'=>$this->input->post('message'),
                    'attachment'=>$attachment,
                  );
 
        return $this->db->insert('tbl_customize',$data);

    }
   
}        