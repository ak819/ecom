<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_cms extends CI_Model
{
   public function getdata($pagename)
   {
   		return $this->db->where('pagename',$pagename)
   				   		->get('tbl_cms')
   				   		->row();
   }
   public function updatepage($id)
   {
   		$data=array(
   				'description'=>$this->input->post('description'),
   				);
   		return $this->db->update('tbl_cms',$data,"id=$id");
   }
   public function getcontact()
    {

    return $this->db->get('tbl_contact_details')->row();

    }
    
    public function updatecontact()
    {
      $data=Array(
    'address'=>$this->input->post('address'),
    'phone'=>$this->input->post('phone'),
    'mobile'=>$this->input->post('mobile'), 
    'email'=>$this->input->post('email'), 
    'email_link'=>$this->input->post('email_link'), 
    'whatsapp'=>$this->input->post('whatsapp'),
    'whatsapp_msg'=>$this->input->post('whatsapp_msg'), 
    'facebook'=>$this->input->post('facebook'),
    'youtube'=>$this->input->post('youtube'),
    'insta'=>$this->input->post('insta'),
    'linkdin'=>$this->input->post('linkdin'), 
      );
    return $this->db->where('id',1)->update('tbl_contact_details',$data);

    }
}