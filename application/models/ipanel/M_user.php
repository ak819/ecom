<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {



    public function getallusers(){

    return $this->db->select('tbl_user.id,name,mobile,my_login_email as email,login_time,logout_time')
                    ->from('tbl_user')
                    ->get('')
                    ->result();
    }

    public function getusersdata()
    {

   return $this->db->select('tbl_user.id,name,mobile,my_login_email as email,login_time,logout_time')
                    ->from('tbl_user')
                    ->get('')
                    ->result();
    }

   
    

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */
?>