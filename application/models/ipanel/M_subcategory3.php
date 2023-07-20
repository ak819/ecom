<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_subcategory3 extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	//return $this->db->order_by('cat_id','desc')->get('tbl_category')->result();

        return $this->db->select('tbl_subcategory3.*,tbl_category.cat_name')
                     ->from('tbl_subcategory3')
                     ->join('tbl_category','tbl_subcategory3.cat_id=tbl_category.cat_id')
                     ->order_by('tbl_subcategory3.id','desc')
                     ->get('')
                     ->result();
    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('tbl_category.*')->where_in('cat_id',$category)->order_by('cat_id','desc')->get('tbl_subcategory3')->result();
    }
    public function getActive()
    {
      return $this->db->where('cat_status','a')->order_by('priority','asc')->get('tbl_subcategory3')->result();
    }
      public function getdetails($id)
    {

        return $this->db->where('id',$id)->get('tbl_subcategory3')->row();

    }
    function insert()
    {
        $category=$this->input->post('name');
        $cat_id=$this->input->post('cat_id');
        $sub_id1=$this->input->post('sub_id1');
        $sub_id2=$this->input->post('sub_id2');

          for ($i=0; $i <count($category) ; $i++) 
        { 
            $data=array(  
                          "name"=>$category[$i],
                          "cat_id"=>$cat_id,
                          "sub_id1"=>$sub_id1,
                          'sub_id2'=>$sub_id2,
                        );

            $this->db->insert('tbl_subcategory3',$data);

        }
                                                                          
        return 1;

    }
    function update($id)
    {
        $data=array(
                'name'=>$this->input->post('name'),
                'cat_id'=>$this->input->post('cat_id'),
                'sub_id1'=>$this->input->post('sub_id1'),
                'sub_id2'=>$this->input->post('sub_id2'),
             );
        return $this->db->where('id',$id)->update('tbl_subcategory3',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('tbl_subcategory3',$data);
    }
    function updatepriority()
    {

        foreach ($_POST['cat'] as $cat_id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('cat_id',$cat_id)->update('tbl_subcategory3',$data);
        }
    }
   

   public function getsubcat2wise($subcat2_id,$subcat1_id,$cat_id)
   {

      return $this->db->select('id,name')->from('tbl_subcategory3')->where('sub_id2',$subcat2_id)->where('sub_id1',$subcat1_id)->where('cat_id',$cat_id)->where('status','a')->order_by('id','asc')->get('')->result();
  
   }
}        