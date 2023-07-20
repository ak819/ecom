<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_subcategory1 extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	//return $this->db->order_by('cat_id','desc')->get('tbl_category')->result();

        return $this->db->select('tbl_category.cat_name,tbl_subcategory1.*')
                     ->from('tbl_subcategory1')
                     ->join('tbl_category','tbl_subcategory1.cat_id=tbl_category.cat_id')
                     ->order_by('tbl_subcategory1.id','desc')
                     ->get('')
                     ->result();
    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('tbl_category.*')->where_in('cat_id',$category)->order_by('cat_id','desc')->get('tbl_subcategory1')->result();
    }
    public function getActive()
    {
      return $this->db->where('cat_status','a')->order_by('priority','asc')->get('tbl_subcategory1')->result();
    }
      public function getdetails($id)
    {

        return $this->db->where('id',$id)->get('tbl_subcategory1')->row();

    }
    function insert()
    {
        $category=$this->input->post('name');
        $cat_id=$this->input->post('cat_id');

        $table_name='tbl_subcategory1';

          for ($i=0; $i <count($category) ; $i++) 
        { 
            $data=array(  
                          "name"=>$category[$i],
                          "cat_id"=>$cat_id,
                         );

            $this->db->insert($table_name,$data);

        }
                                                                          
        return 1;
    }
    function update($id)
    {
        $data=array(
                'name'=>$this->input->post('name'),
                'cat_id'=>$this->input->post('cat_id'),
             );
        return $this->db->where('id',$id)->update('tbl_subcategory1',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('tbl_subcategory1',$data);
    }
    function updatepriority()
    {

        foreach ($_POST['cat'] as $cat_id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('cat_id',$cat_id)->update('tbl_subcategory1',$data);
        }
    }
    function addcategory()
    {
        $data=array(

                'cat_name'=>$this->input->post('cat_name'),
                'cat_discp'=>$this->input->post('cat_discp'),
                'cat_status'=>$this->input->post('cat_status'),
                'cat_img'=>""
             );                                                                              
        return $this->db->insert('tbl_subcategory1',$data);
    }


    function getcatwise($cat_id)
    {

   return $this->db->select('id,name')->from('tbl_subcategory1')->where('cat_id',$cat_id)->order_by('id','asc')->get('')->result();


    }
}        