<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_faqs extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	return $this->db->select('tbl_faqs.*,faqoption.option as faqfor')
                      ->from('tbl_faqs')
                      ->join('faqoption','tbl_faqs.for = faqoption.id','left')
                      ->order_by('id','asc')
                      ->get('')
                      ->result();

                      //->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
    }
    
    public function getoption()
    {
      return $this->db->order_by('id','asc')->get('faqoption')->result();

    }

    public function getactiveoption()
    {

     return $this->db->where('status','a')->order_by('id','asc')->get('faqoption')->result();

    }

    public function getbyoption($optionid)
    {

   return $this->db->select('tbl_faqs.*')->where('for',$optionid)->where('status','a')->order_by('id','asc')->get('tbl_faqs')->result();

    }

     public function getProductfaq()
    {

   return $this->db->select('tbl_faqs.*')
                    ->from('tbl_faqs')
                    ->where('for','1')
                    ->where('status','a')
                    ->order_by('id','asc')
                    ->limit(3)
                    ->get('')
                    ->result();

    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('tbl_faqs.*')->where_in('id',$category)->order_by('cat_id','desc')->get('tbl_faqs')->result();
    }
    public function getActive()
    {
      return $this->db->where('status','a')->get('tbl_faqs')->result();
    }
      public function getdetails($id)
    {

        return $this->db->where('id',$id)->get('tbl_faqs')->row();

    }
    function insert()
    {
       

    
            $data=array(  
                          "for"=>$this->input->post('for'),
                          "question"=>$this->input->post('question'),
                          "answer"=>$this->input->post('answer'),
                         
                         );

            return $this->db->insert('tbl_faqs',$data);

      
    }
    function update($id)
    {
          $data=array(  
                          "for"=>$this->input->post('for'),
                          "question"=>$this->input->post('question'),
                          "answer"=>$this->input->post('answer'),
                         
                         );
        return $this->db->where('id',$id)->update('tbl_faqs',$data);
    }
    function changeStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('tbl_faqs',$data);
    }
    function updatepriority()
    {

        foreach ($_POST['priority'] as $cat_id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('cat_id',$cat_id)->update('tbl_faqs',$data);
        }

         return ture;
    }
    function addcategory()
    {
        $data=array(

                'cat_name'=>$this->input->post('cat_name'),
                'cat_discp'=>$this->input->post('cat_discp'),
                'cat_status'=>$this->input->post('cat_status'),
                'cat_img'=>""
             );                                                                              
        return $this->db->insert('tbl_faqs',$data);
    }

     function insertoption()
    {
        $option=$this->input->post('option');

          for ($i=0; $i <count($option) ; $i++) 
        { 
            $data=array(  
                          "option"=>$option[$i],
                         
                         );

            $this->db->insert('faqoption',$data);

        }
                                                                          
        return 1;
    }

    public function getoptiondetails($id)
    {

     return $this->db->where('id',$id)->get('faqoption')->row();

    }
    function updateoption($id)
    {
        $data=array(
                'option'=>$this->input->post('option'),
             );
        return $this->db->where('id',$id)->update('faqoption',$data);
    }
    function changeoptionStatus($status,$id)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$id)->update('faqoption',$data);
    }
}        