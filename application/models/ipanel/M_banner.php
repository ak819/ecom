<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_banner extends CI_Model
{  
   /* registration and plus login */
      public function insert($banner_img)
      {

       $data=array(
                'title'=>$this->input->post('title'),
                'image'=>$banner_img,
             );
       return $this->db->insert('banner',$data);
         


      }
      public function update($banner_id,$banner_img)
      {
          $data=array(
                'title'=>$this->input->post('title'),
                'image'=>$banner_img,
             );

            $this->db->where('id',$banner_id);
     return $this->db->update('banner',$data);


      }

     public function changeStatus($status,$id)
    {
      $data=array('status'=>$status);

      return $this->db->where('id',$id)->update('banner',$data);

    }

    public function getAll()
    {
           return $res=$this->db->select('*')->from('banner')->get()->result();

    }

    public function getEventDetails($banner_id)
    {
    
      return $res=$this->db->select('*')->from('banner')->where('id',$banner_id)->get()->result();

    }

    public function getAllActive()
    {

     return $res=$this->db->select('*')->from('banner')->where('status','a')->get()->result();
    }

    public function getActiveEvent($arg)
    {

     return $res=$this->db->select('banner.image')->from('banner')->where('status','a')->limit(6)->order_by('id','desc')->get()->result();


    }

     
 
}