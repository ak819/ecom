<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_advertise extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	return $this->db->get('advertise')->result();
    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('advertise.*')->where_in('cat_id',$category)->order_by('cat_id','asc')->get('advertise')->result();
    }
    public function getActive()
    {
        return $this->db->get('advertise')->result();
    }

    public function getActiveone()
    {
      return $this->db->limit(1)->order_by('id','asc')->get('advertise')->result();
    }    
      public function getdetails($id)
    {
        return $this->db->where('id',$id)->get('advertise')->row();
    }
    function insert($filename)
    {
        $data=array(
                'title'=>$this->input->post('title'),
                'type'=>$this->input->post('type'),
                'link'=>$this->input->post('link'),
               //'cat_status'=>$this->input->post('cat_status'),
                'img'=>$filename
             );                                                                              
        return $this->db->insert('advertise',$data);
    }
    function update($filename,$id)
    {
        $data=array(
                 'title'=>$this->input->post('title'),
                 'type'=>$this->input->post('type'),
                 'link'=>$this->input->post('link'),
               //'cat_status'=>$this->input->post('cat_status'),
                 'img'=>$filename
             );
        return $this->db->where('id',$id)->update('advertise',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('advertise',$data);
    }
    function updatepriority(){

        foreach ($_POST['cat'] as $cat_id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('cat_id',$cat_id)->update('advertise',$data);
        }
    }

    function getrightside()
    {
          return $this->db->select('advertise.*')->where('status','a')->where('type','r')->limit(1)->order_by('id','desc')->get('advertise')->result();

    }
     function getleftside()
    {
      return $this->db->select('advertise.*')->where('status','a')->where('type','l')->limit(2)->order_by('id','asc')->get('advertise')->result(); 
        
    }

     function getbottomside()
    {
    return $this->db->select('advertise.*')->where('status','a')->where('type','b')->limit(1)->order_by('id','desc')->get('advertise')->result(); 
         
    }
  
  
}        