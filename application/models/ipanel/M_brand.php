<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_brand extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	return $this->db->order_by('id','desc')->get('tbl_brand')->result();
    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('tbl_brand.*')->where_in('id',$category)->order_by('id','desc')->get('tbl_brand')->result();
    }
    public function getActive()
    {
      return $this->db->where('status','a')->get('tbl_brand')->result();
    }
      public function getdetails($id)
    {

        return $this->db->where('id',$id)->get('tbl_brand')->row();

    }
    function insert()
    {
        $brand=$this->input->post('name');

          for ($i=0; $i<count($brand); $i++) 
        { 
            $data=array(  
                          "name"=>$brand[$i],
                         
                        );

            $this->db->insert('tbl_brand',$data);

        }
                                                                          
        return 1;
    }
    function update($id)
    {
        $data=array(
                'name'=>$this->input->post('name'),
             );
        return $this->db->where('id',$id)->update('tbl_brand',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('tbl_brand',$data);
    }
    function updatepriority()
    {

        foreach ($_POST['cat'] as $id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('id',$cat_id)->update('tbl_brand',$data);
        }
    }
 
}        