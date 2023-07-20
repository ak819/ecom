<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_email extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    
   
    function insertenquiry()
    {

        $data=array(

                'email'=>$this->input->post('email'),
                 'name'=>$this->input->post('name'),
                 'mobile'=>$this->input->post('mobile'),
                 'message'=>$this->input->post('msg')
             
             );
        
        return $this->db->insert('enquiry_email',$data);
    }

    function insertfranchenquiry()
    {

        $data=array(

                'email'=>$this->input->post('email'),
                 'name'=>$this->input->post('name'),
                 'mobile'=>$this->input->post('mobile'),
                 'message'=>$this->input->post('msg'),
                 'business'=>$this->input->post('business')
             
             );
        
        return $this->db->insert('franch_email',$data);
    }




    function insertcareeremail($attachment)
    {


        $data=array(

                 'email'=>$this->input->post('email'),
                 'name'=>$this->input->post('name'),
                 'mobile'=>$this->input->post('mobile'),
                 'message'=>$this->input->post('msg'),
                 'attachment'=>$attachment

                    );
          
           return $this->db->insert('career_email',$data);

    }
   
    function changeStatus($status,$id)
    {
        $data=array('admin_status'=>$status);
        return $this->db->where('admin_id',$id)->update('tbl_admin_user',$data);
     }

     public function get_all_enquirymails()
     {
      
      return $this->db->select('*')
                      ->from('enquiry_email')
                      ->get('')
                      ->result(); 
     }


     public function get_all_careeremails()
     {

        return $this->db->select('*')
                      ->from('career_email')
                      ->get('')
                      ->result(); 

     }

     public function get_all_franchemails()
     {

        return $this->db->select('*')
                      ->from('franch_email')
                      ->get('')
                      ->result(); 

     }

     public function registerIP($ip)
     {  


          $query=$this->db->select('*')
                      ->from('visitor_ip')
                      ->where('user_ip',$ip)
                      ->get('')
                      ->result(); 


          if(empty($query))
        {
                 
                 $data=array(

                 'user_ip'=>$ip,
        

                    );
        
    
         $this->db->insert('visitor_ip',$data);

          $id=$this->db->insert_id();
        
          if($id)
          {

            return true;
          }





        }else{


        }
        

     }

     public function Ipcount()
     {

               return  $this->db->select('*')
                      ->from('visitor_ip')
                      ->get('')
                      ->result(); 


     }



}        