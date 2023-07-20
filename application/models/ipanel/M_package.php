<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_package extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    

    public function getPackage($p_id)
    {

        return $this->db->select('tbl_package.*')
                            ->from('tbl_package')
                            ->where('tbl_package.p_id',$p_id)
                            ->get()
                            ->result();


    }

    public function insert()
    {
        $data=array('p_id'=>$this->input->post('p_id'),
                    'name'=>$this->input->post('name'),
                    'price'=>$this->input->post('price'),
                    'discount'=>$this->input->post('discount'),
                    'weight'=>$this->input->post('weight'),
                    'status'=>$this->input->post('status'),
                  
                 );

       return $this->db->insert('tbl_package',$data);

    }



    public function getDetails($id)
    {
   return $this->db->where('id',$id)->get('tbl_package')->row();
    }
    
    public function update($id)
    {
       $data=array('p_id'=>$this->input->post('p_id'),
                    'name'=>$this->input->post('name'),
                    'price'=>$this->input->post('price'),
                    'discount'=>$this->input->post('discount'),
                    'weight'=>$this->input->post('weight'),
                    'status'=>$this->input->post('status'),
                  
                 );

                       $this->db->where('id',$id);
      return  $this->db->update('tbl_package',$data);  


    }

    public function status($status,$id)
    {
      $data=array('status'=>$status);
    return $this->db->where('id',$id)->update('tbl_package',$data);


    }

    public function imagepriority()
    {

      foreach ($_POST['photo'] as $id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('id',$id)->update('tbl_products_images',$data);
        }

        return 1;


    }

    





}        