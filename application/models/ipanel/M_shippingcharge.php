<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_shippingcharge extends CI_Model
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
      public function update($id)
      {
          $data=array(
                'type'=>$this->input->post('type'),
                'gm250'=>$this->input->post('250gm'),
                'gm500'=>$this->input->post('500gm'),
                'gm1000'=>$this->input->post('1000gm'),
             );

            $this->db->where('id',$id);
     return $this->db->update('shipingcharges',$data);


      }

     public function changeStatus($status,$id)
    {
      $data=array('status'=>$status);

      return $this->db->where('id',$id)->update('banner',$data);

    }

    public function getAll()
    {
           return $res=$this->db->select('*')->from('shipingcharges')->get()->result();

    }

    public function getdetails($id)
    {
    
      return $res=$this->db->select('*')->from('shipingcharges')->where('id',$id)->get()->row();

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