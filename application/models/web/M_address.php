<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_address extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }

  
  public function insetnew()
  {
    
    $this->db->set('a_status','d');
    $this->db->where('user_id',$this->session->userdata('user_id'));
    $this->db->update('tbl_user_address');

        $data=array('ship_name'=>$this->input->post('ship_name'),
                    'ship_mobile'=>$this->input->post('ship_mobile'),
                    'ship_email'=>$this->session->userdata('email'),
                    'ship_pin'=>$this->input->post('ship_pin'),
                    'ship_address'=>$this->input->post('ship_address'),
                    'ship_city'=>$this->input->post('ship_city'),
                    'ship_state'=>$this->input->post('ship_state'),
                    'ship_country'=>$this->input->post('ship_country'),
                    'bill_name'=>$this->input->post('ship_name'),
                    'bill_mobile'=>$this->input->post('ship_mobile'),
                    'bill_email'=>$this->session->userdata('email'),
                    'bill_pin'=>$this->input->post('ship_pin'),
                    'bill_address'=>$this->input->post('ship_address'),
                    'bill_city'=>$this->input->post('ship_city'),
                    'bill_state'=>$this->input->post('ship_state'),
                    'bill_country'=>$this->input->post('ship_country'),
                    'a_status'=>'a',
                    'user_id'=>$this->session->userdata('user_id'),
                  );

         


        $this->db->insert('tbl_user_address',$data);
        return $this->db->insert_id();



  }

  public function getcurrentadress()
  {


   return $this->db->select('tbl_user_address.*')
                   ->from('tbl_user_address')
                   ->where('user_id',$this->session->userdata('user_id'))
                   ->where('a_status','a')
                   ->order_by('address_id','desc')
                   ->limit(1)
                   ->get('')
                   ->row();

  }

  public function getactiveaddress($addressid,$user_id)
  {
        return $this->db->select('tbl_user_address.*')
                   ->from('tbl_user_address')
                   ->where('user_id',$this->session->userdata('user_id'))
                   ->where('a_status','a')
                   ->where('address_id',$addressid)
                   ->get('')
                   ->row();
  }

 
  public function getaddresses()
  {
     return $this->db->select('tbl_user_address.*')
                   ->from('tbl_user_address')
                   ->where('user_id',$this->session->userdata('user_id'))
                   ->order_by('address_id','asc')
                   //->limit(3)
                   ->get('')
                   ->result();
  }

  public function deleteaddress($id)
  {
   $this->db->where('address_id',$id);
    $this->db->where('user_id',$this->session->userdata('user_id'));
  return $this->db->delete('tbl_user_address');

  }
  public function chanegadress()
  {
    $this->db->set('a_status','d');
    $this->db->where('user_id',$this->session->userdata('user_id'));
    $this->db->update('tbl_user_address');

    $this->db->set('a_status','a');
    $this->db->where('address_id',$this->input->post('adressid'));
    $this->db->update('tbl_user_address');

      return 1;
  }

  public function getdetails($id)
  {

  return $this->db->select('tbl_user_address.*')
                   ->from('tbl_user_address')
                   ->where('address_id',$id)
                   ->where('user_id',$this->session->userdata('user_id'))
                   ->get('')
                   ->row();


  }
   public function getdetails2($id,$user_id)
  {
    return $this->db->select('tbl_user_address.*')
                   ->from('tbl_user_address')
                   ->where('address_id',$id)
                   ->where('user_id',$user_id)
                   ->order_by('address_id','desc')
                   ->get('')
                   ->row();


  }

  public function getactivedetails()
  {
    return $this->db->select('tbl_user_address.*')
                   ->from('tbl_user_address')
                   ->where('a_status','a')
                   ->where('user_id',$this->session->userdata('user_id'))
                   ->get('')
                   ->row();

  }


  public function updateshipping($id)
  {

   $data=array('ship_name'=>$this->input->post('ship_name'),
                    'ship_mobile'=>$this->input->post('ship_mobile'),
                    'ship_email'=>$this->session->userdata('email'),
                    'ship_pin'=>$this->input->post('ship_pin'),
                    'ship_address'=>$this->input->post('ship_address'),
                    'ship_city'=>$this->input->post('ship_city'),
                    'ship_state'=>$this->input->post('ship_state'),
                    'ship_country'=>$this->input->post('ship_country'),
                    'bill_name'=>$this->input->post('ship_name'),
                    'bill_mobile'=>$this->input->post('ship_mobile'),
                    'bill_email'=>$this->session->userdata('email'),
                    'bill_pin'=>$this->input->post('ship_pin'),
                    'bill_address'=>$this->input->post('ship_address'),
                    'bill_city'=>$this->input->post('ship_city'),
                    'bill_state'=>$this->input->post('ship_state'),
                    'bill_country'=>$this->input->post('ship_country'),
                    'a_status'=>'a',
                    'user_id'=>$this->session->userdata('user_id'),
                  );


        $this->db->where('address_id',$id);
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $this->db->update('tbl_user_address',$data);

   }


   public function ativateaddress($address_id)
   {

     $this->db->set('a_status','d');
    $this->db->where('user_id',$this->session->userdata('user_id'));
    $this->db->update('tbl_user_address');

    $this->db->set('a_status','a');
    $this->db->where('address_id',$address_id);
    $this->db->update('tbl_user_address');

  
   }
  
}        