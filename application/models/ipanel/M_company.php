<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_company extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	return $this->db->order_by('id','desc')->get('p_company')->result();
    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('p_company.*')->where_in('id',$category)->order_by('id','desc')->get('p_company')->result();
    }
    public function getActive()
    {
      return $this->db->where('status','a')->get('p_company')->result();
    }
      public function getdetails($id)
    {

        return $this->db->where('id',$id)->get('p_company')->row();

    }
    function insert($filename)
    {
       
            $data=array(  
                          "name"=>$this->input->post('name'),
                          "image"=>$filename,
                          'brand_status'=>$this->input->post('brand_status'),
                          'associate_status'=>$this->input->post('associate_status'),
                         
                        );

            $this->db->insert('p_company',$data);
 
                                                                      
        return 1;
    }
    function update($id,$filename)
    {
       $data=array(  
                          "name"=>$this->input->post('name'),
                          "image"=>$filename,
                          'brand_status'=>$this->input->post('brand_status'),
                          'associate_status'=>$this->input->post('associate_status'),
                         
                  );
        return $this->db->where('id',$id)->update('p_company',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('p_company',$data);
    }
    function updatepriority()
    {

        foreach ($_POST['cat'] as $id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('id',$cat_id)->update('p_company',$data);
        }
    }
 
}        