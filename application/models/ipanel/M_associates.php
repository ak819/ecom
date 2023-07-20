<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_associates extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	return $this->db->order_by('id','desc')->get('our_associates')->result();
    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('our_associates.*')->where_in('id',$category)->order_by('id','desc')->get('our_associates')->result();
    }
    public function getActive()
    {
      return $this->db->where('status','a')->get('our_associates')->result();
    }
      public function getdetails($id)
    {

        return $this->db->where('id',$id)->get('our_associates')->row();

    }
    function insert($filename)
    {
       
            $data=array(  
                          "name"=>$this->input->post('name'),
                          "image"=>$filename,
                         
                        );

            $this->db->insert('our_associates',$data);
 
                                                                      
        return 1;
    }
    function update($id,$filename)
    {
       $data=array(  
                          "name"=>$this->input->post('name'),
                          "image"=>$filename,
                         
                  );
        return $this->db->where('id',$id)->update('our_associates',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('our_associates',$data);
    }
    function updatepriority()
    {

        foreach ($_POST['cat'] as $id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('id',$cat_id)->update('our_associates',$data);
        }
    }
 
}