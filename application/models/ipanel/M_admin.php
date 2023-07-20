<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{
    
   public function login($email,$password)
   {
      //echo "inn";exit;
      $query=$this->db->select('*')
                 ->from('tbl_admin_user')
                 ->where('admin_email',$email)
                 ->where('admin_password', $password)
                 ->get('');
      if($query->num_rows())
      {
     
          foreach($query->result() as $rows)
        {
         
            $newdata = array(
              'admin_id'  => $rows->admin_id,
              'admin_name'  => $rows->admin_name,
              'admin_email'  => $rows->admin_email,
              'user_role'  => $rows->admin_type,
              'logged_in'  => TRUE,
              
            );
          // print_r($newdata);exit;
        }
         $this->session->set_userdata($newdata); //add all data to session
        $data=array('login_time'=>date('Y-m-d H:i:s'));
        $this->db->where("admin_id",$this->session->userdata('admin_id'))
                 ->update('tbl_admin_user',$data);
               //  echo "inn q";
        return 1;
        //}

      }
      else
      {
        return 0;
          
        }


      }
      
  function logouttime()
    {
        $id=$this->session->userdata('admin_id');
        $data = array('logout_time' =>date('Y-m-d H:i:s'));
        $this->db->update('tbl_admin_user', $data, "admin_id =$id");
    }

}