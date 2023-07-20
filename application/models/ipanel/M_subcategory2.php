<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_subcategory2 extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	//return $this->db->order_by('cat_id','desc')->get('tbl_category')->result();

        return $this->db->select('tbl_category.cat_name,tbl_subcategory2.*,tbl_subcategory1.name as subcat1')
                     ->from('tbl_subcategory2')
                     ->join('tbl_category','tbl_subcategory2.cat_id=tbl_category.cat_id')
                     ->join('tbl_subcategory1','tbl_subcategory2.subcat_id=tbl_subcategory1.id')
                     ->order_by('tbl_subcategory2.id','desc')
                     ->get('')
                     ->result();
    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('tbl_category.*')->where_in('cat_id',$category)->order_by('cat_id','desc')->get('tbl_subcategory2')->result();
    }
    public function getActive()
    {
      return $this->db->where('cat_status','a')->order_by('priority','asc')->get('tbl_subcategory2')->result();
    }
      public function getdetails($id)
    {

        return $this->db->where('id',$id)->get('tbl_subcategory2')->row();

    }
    function insert()
    {
        $category=$this->input->post('name');
        $cat_id=$this->input->post('cat_id');
        $sub_id=$this->input->post('sub_id');

          for ($i=0; $i <count($category) ; $i++) 
        { 
            $data=array(  
                          "name"=>$category[$i],
                          "cat_id"=>$cat_id,
                          "subcat_id"=>$sub_id,
                        );

            $this->db->insert('tbl_subcategory2',$data);

        }
                                                                          
        return 1;

    }
    function update($id)
    {
        $data=array(
                'name'=>$this->input->post('name'),
                'cat_id'=>$this->input->post('cat_id'),
                'subcat_id'=>$this->input->post('sub_id'),
             );
        return $this->db->where('id',$id)->update('tbl_subcategory2',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('tbl_subcategory2',$data);
    }
    function updatepriority()
    {

        foreach ($_POST['cat'] as $cat_id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('cat_id',$cat_id)->update('tbl_subcategory2',$data);
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
        return $this->db->insert('tbl_subcategory2',$data);
    }

    public function getsubcatwise($subid,$catid)
    {

     return $this->db->select('id,name')->from('tbl_subcategory2')->where('sub_id1',$subid)->where('cat_id',$catid)->order_by('id','asc')->where('status','a')->get('')->result();


    }
}        