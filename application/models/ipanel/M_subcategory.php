<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_subcategory extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll($id)
    {

         return $this->db->select('tbl_category.cat_name,tbl_subcategory'.$id.'.*,tbl_catergory_filter.sub_cat_'.$id.' as filtername')
                     ->from('tbl_subcategory'.$id.'')
                     ->join('tbl_category','tbl_subcategory'.$id.'.cat_id=tbl_category.cat_id')
                     ->join('tbl_catergory_filter','tbl_category.cat_id=tbl_catergory_filter.cat_id')
                     ->order_by('tbl_category.cat_id','asc')
                     ->get('')
                     ->result();
    
   /* $tablename='tbl_subcategory'.$id;
    $query = $this->db->query('SELECT tbl_category.cat_name,'.$tablename.'.*
                                FROM '.$tablename.'
                                INNER JOIN tbl_category ON '.$tablename.'.cat_id=tbl_category.cat_id
                               ORDER BY '.$tablename.'.id DESC
                                ');
    return $query->result();*/

    }
    public function getusercategorylist($category)
    {
    //    return $category;
        return $this->db->select('tbl_category.*')->where_in('cat_id',$category)->order_by('cat_id','desc')->get('tbl_subcategory1')->result();
    }
    public function getActive()
    {
      return $this->db->where('cat_status','a')->order_by('priority','asc')->get('tbl_subcategory1')->result();
    }
      public function getdetails($id,$recordid)
    {
     
        return $this->db->where('id',$recordid)->get('tbl_subcategory'.$id)->row();

    }
    function insert($id)
    {
        $category=$this->input->post('name');
        $cat_id=$this->input->post('cat_id');

          for ($i=0; $i <count($category) ; $i++) 
        { 
            $data=array(  
                          "name"=>$category[$i],
                          "cat_id"=>$cat_id,
                         );

            $this->db->insert('tbl_subcategory'.$id,$data);

        }
                                                                          
        return 1;
    }
    function update($id,$recordid)
    {
        $data=array(
                'name'=>$this->input->post('name'),
                'cat_id'=>$this->input->post('cat_id'),
             );
        return $this->db->where('id',$recordid)->update('tbl_subcategory'.$id,$data);
    }
    function changeStatus($id,$status,$recordid)
    {
        $data=array('status'=>$status);
        return $this->db->where('id',$recordid)->update('tbl_subcategory'.$id,$data);
    }
    function updatepriority()
    {

        foreach ($_POST['cat'] as $cat_id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('cat_id',$cat_id)->update('tbl_subcategory1',$data);
        }
    }
    function addcategory()
    {
        $data=array(

                'cat_name'=>$this->input->post('cat_name'),
                'cat_discp'=>$this->input->post('cat_discp'),
                'cat_status'=>$this->input->post('cat_status'),
                'cat_img'=>""
             );                                                                              
        return $this->db->insert('tbl_subcategory1',$data);
    }


    function getcatwise($cat_id,$index)
    {

   return $this->db->select('id,name')->from('tbl_subcategory'.$index)->where('cat_id',$cat_id)->order_by('id','asc')->get('')->result();


    }
    function getSubCatwise($cat_id)
    {
      return $this->db->select('id,name')->from('tbl_subcategory1')->where('cat_id',$cat_id)->order_by('id','asc')->get('')->result();

    }
    function getsubsubcatwise($cat_id,$sub_cat_id)
    {

       return $this->db->select('id,name')->from('tbl_subcategory2')->where('cat_id',$cat_id)->where('subcat_id',$sub_cat_id)->order_by('id','asc')->get('')->result();

    }

    public function getsubcategory($catid,$index)
    {

  return $this->db->select('tbl_subcategory'.$index.'.id,name')
                   ->from('tbl_subcategory'.$index)
                   ->where('tbl_subcategory'.$index.'.cat_id',$catid)
                   ->where('tbl_subcategory'.$index.'.status','a')
                   ->join('tbl_catergory_filter','tbl_subcategory'.$index.'.cat_id=tbl_catergory_filter.cat_id','inner')
                   ->get('')
                   ->result();
     
    }

    
}        