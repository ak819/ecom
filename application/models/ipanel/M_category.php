<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_category extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }
    public function getAll()
    {
    	return $this->db->order_by('cat_id','asc')->get('tbl_category')->result();
    }
    public function getsubcategorylist($category)
    {
    //    return $category;
        return $this->db->select('tbl_subcategory1.*')->where_in('cat_id',$category)->order_by('cat_id','desc')->get('tbl_subcategory1')->result();
    }


    public function getactiveipanel()
    {

    return $this->db->where('cat_status','a')
                      //->where('priority!=','')
                      ->order_by('cat_id','asc')
                      ->get('tbl_category')
                      ->result();
    }
    public function getActive()
    {

      return $this->db->select('tbl_category.*,COUNT(tbl_products.cat_id) as count ')
                      ->from('tbl_category')
                      ->join('tbl_products','tbl_category.cat_id = tbl_products.cat_id','inner')
                      ->where('cat_status','a')
                      //->where('priority!=','')
                      ->group_by('tbl_products.cat_id')
                      ->order_by('priority','asc')
                      ->get('')
                      ->result();               
    }

      public function getdetails($id)
    {

        return $this->db->where('cat_id',$id)->get('tbl_category')->row();

    }
   public function insert()
    {
        $category=$this->input->post('cat_name');

          for ($i=0; $i <count($category) ; $i++) 
        { 
            $data=array(  
                          "cat_name"=>$category[$i],
                         
                         );

            $this->db->insert('tbl_category',$data);

        }
                                                                          
        return 1;
    }
   public function update($id)
    {
        $data=array(
                'cat_name'=>$this->input->post('cat_name'),
             );
        return $this->db->where('cat_id',$id)->update('tbl_category',$data);
    }
   public function changeStatus($status,$id)
    {
        $data=array('cat_status'=>$status);
        return $this->db->where('cat_id',$id)->update('tbl_category',$data);
    }
 public function updatepriority()
    {

        foreach ($_POST['priority'] as $cat_id => $priority)
        {
            $data = array( 'priority' => $priority, );
            $this->db-> where('cat_id',$cat_id)->update('tbl_category',$data);
        }

         return true;
    }
  public function addcategory()
    {
        $data=array(

                'cat_name'=>$this->input->post('cat_name'),
                'cat_discp'=>$this->input->post('cat_discp'),
                'cat_status'=>$this->input->post('cat_status'),
                'cat_img'=>""
             );                                                                              
        return $this->db->insert('tbl_category',$data);
    }

public function getfilters()
  {
    $category=$this->db->select('tbl_category.cat_name,tbl_catergory_filter.cat_id')
             ->from('tbl_catergory_filter')
             ->join('tbl_category','tbl_catergory_filter.cat_id = tbl_category.cat_id')
             ->get('')
             ->result();
     foreach($category as $val)
     {

        $val->filterslist=$this->db->select('tbl_catergory_filter.sub_cat_1,sub_cat_2,sub_cat_3,sub_cat_4,sub_cat_5,sub_cat_6,sub_cat_7,sub_cat_8,sub_cat_9,sub_cat_10')
             ->from('tbl_catergory_filter')
             ->where('cat_id',$val->cat_id)
             ->get('')
             ->result();

     }

     return $category;


  }
  public function getfilterdetails($id)
  {

return $this->db->select('tbl_catergory_filter.*')->where('cat_id',$id)->get('tbl_catergory_filter')->row();


  }
 public function checkhavefilter($id)
  {

return $this->db->select('tbl_catergory_filter.*')->where('cat_id',$id)->get('tbl_catergory_filter')->result();
  }

public  function  storefilter()
  {
  
  $data=array('cat_id' =>$this->input->post('cat_id'),
    'sub_cat_1' =>$this->input->post('sub_cat_1'),
    'sub_cat_2' =>$this->input->post('sub_cat_2'),
    'sub_cat_3' =>$this->input->post('sub_cat_3'),
    'sub_cat_4' =>$this->input->post('sub_cat_4'),
    'sub_cat_5' =>$this->input->post('sub_cat_5'), 
    'sub_cat_6' =>$this->input->post('sub_cat_6'), 
    'sub_cat_7' =>$this->input->post('sub_cat_7'), 
    'sub_cat_8' =>$this->input->post('sub_cat_8'), 
    'sub_cat_9' =>$this->input->post('sub_cat_9'), 
    'sub_cat_10' =>$this->input->post('sub_cat_10'),
    );

   return $this->db->insert('tbl_catergory_filter',$data);



  }

  public function updatefilter($id)
  {

    $data=array('cat_id' =>$this->input->post('cat_id'),
    'sub_cat_1' =>$this->input->post('sub_cat_1'),
    'sub_cat_2' =>$this->input->post('sub_cat_2'),
    'sub_cat_3' =>$this->input->post('sub_cat_3'),
    'sub_cat_4' =>$this->input->post('sub_cat_4'),
    'sub_cat_5' =>$this->input->post('sub_cat_5'), 
    'sub_cat_6' =>$this->input->post('sub_cat_6'), 
    'sub_cat_7' =>$this->input->post('sub_cat_7'), 
    'sub_cat_8' =>$this->input->post('sub_cat_8'), 
    'sub_cat_9' =>$this->input->post('sub_cat_9'), 
    'sub_cat_10' =>$this->input->post('sub_cat_10'),
    );            

    $this->db-> where('cat_id',$id)->update('tbl_catergory_filter',$data);
      
         return true;
    }


    public function getfilternames($id)
    {

   return $this->db->select('tbl_catergory_filter.sub_cat_1,sub_cat_2,sub_cat_3,sub_cat_4,sub_cat_5,sub_cat_6,sub_cat_7,sub_cat_8,sub_cat_9,sub_cat_10')
             ->from('tbl_catergory_filter')
             ->where('cat_id',$id)
             ->get('')
             ->row();

    }

    public function getfilternamesarray($id)
    {
        return $this->db->select('tbl_catergory_filter.sub_cat_1,sub_cat_2,sub_cat_3,sub_cat_4,sub_cat_5,sub_cat_6,sub_cat_7,sub_cat_8,sub_cat_9,sub_cat_10')
             ->from('tbl_catergory_filter')
             ->where('cat_id',$id)
             ->get('')
             ->result_array();
    }

    public function getfilterbyindex($catid,$index)
    {

       return $this->db->select('tbl_catergory_filter.sub_cat_'.$index.'')
             ->from('tbl_catergory_filter')
             ->where('cat_id',$catid)
             ->get('')
             ->row();

    }


    public function getActiveSub($catid,$index)
    {
        return $this->db->select('tbl_subcategory'.$index.'.id,name')
                   ->from('tbl_products')
                   ->join('tbl_subcategory'.$index.'','tbl_products.sub_id'.$index.' = tbl_subcategory'.$index.'.id')
                   ->where('tbl_subcategory'.$index.'.cat_id',$catid)
                   ->where('tbl_subcategory'.$index.'.status','a')
                   ->group_by('tbl_subcategory'.$index.'.id','asc')
                   ->get('')
                   ->result();

    }

    public function getbrandwith($cat_id,$field)
    {
        return $this->db->select('p_company.*')
                      ->from('tbl_products')
                      ->join('p_company','tbl_products.brand_id = p_company.id','inner')
                       ->where('tbl_products.'.$field.'',$cat_id)
                      ->where('tbl_products.status','a')
                      ->group_by('tbl_products.brand_id')
                      ->order_by('tbl_products.brand_id','asc')
                      ->get('')
                      ->result();         


    }
     public function getbrandActive()
    {
        return $this->db->select('p_company.*')
                      ->from('tbl_products')
                      ->join('p_company','tbl_products.brand_id = p_company.id','inner')
                      ->where('tbl_products.status','a')
                      ->group_by('tbl_products.brand_id')
                      ->order_by('tbl_products.brand_id','asc')
                      ->get('')
                      ->result();         


    }

    public function getproducturlby($cat_id)
    {
       $id=strreplace_decode($cat_id);
    $cat_id=$this->encrypt->decode($id);
       
     $res=$this->db->where('cat_id',$cat_id)->get('tbl_category')->row();

      $id=$this->encrypt->encode($res->cat_id);
        $res->cat_id=strreplace_encode($id);
    
     $url=base_url().'products/'.$res->cat_id.'/'.$res->cat_name;
     return $url;

    }

    public function getSubActive($cat_id)
    {
      return $this->db->select('tbl_subcategory1.*,COUNT(tbl_products.sub_id1) as count ')
                      ->from('tbl_subcategory1')
                      ->where('tbl_subcategory1.cat_id',$cat_id)
                      ->join('tbl_products','tbl_subcategory1.id = tbl_products.sub_id1','inner')
                      ->where('tbl_products.status','a')
                      ->where('tbl_subcategory1.status','a')
                      ->group_by('tbl_products.sub_id1')
                      ->get('')
                      ->result();               
    }
    
    public function getSubSubActive($cat_id,$subcat_id)
    {
       return $this->db->select('tbl_subcategory2.*,COUNT(tbl_products.sub_id2) as count ')
                      ->from('tbl_subcategory2')
                      ->where('tbl_subcategory2.cat_id',$cat_id)
                      ->where('tbl_subcategory2.subcat_id',$cat_id)
                      ->join('tbl_products','tbl_subcategory2.id = tbl_products.sub_id2','inner')
                      ->where('tbl_products.status','a')
                      ->where('tbl_subcategory2.status','a')
                      ->group_by('tbl_products.sub_id2')
                      ->get('')
                      ->result();         
    }

    public function getcatdetails($cat_id)
    {
    return $this->db->select('tbl_category.*,COUNT(tbl_products.cat_id) as count ')
                      ->from('tbl_category')
                      ->where('tbl_category.cat_id',$cat_id)
                      ->join('tbl_products','tbl_category.cat_id = tbl_products.cat_id','inner')
                      ->where('tbl_products.status','a')
                      ->where('tbl_category.cat_status','a')
                      ->group_by('tbl_products.cat_id')
                      ->get('')
                      ->result();     



    }
    public function getsubcatdetails($cat_id)
    {
    return $this->db->select('tbl_subcategory1.*,COUNT(tbl_products.sub_id1) as count ,tbl_subcategory1.name as cat_name')
                      ->from('tbl_subcategory1')
                      ->where('tbl_subcategory1.id',$cat_id)
                      ->join('tbl_products','tbl_subcategory1.id = tbl_products.sub_id1','inner')
                      ->where('tbl_products.status','a')
                      ->where('tbl_subcategory1.status','a')
                      ->group_by('tbl_products.sub_id1')
                      ->get('')
                      ->result();     



    }
    public function getsubsubcatdetails($cat_id)
    {
    return $this->db->select('tbl_subcategory2.*,COUNT(tbl_products.sub_id2) as count ,tbl_subcategory2.name as cat_name,tbl_subcategory1.name as subcat_name')
                      ->from('tbl_subcategory2')
                      ->where('tbl_subcategory2.id',$cat_id)
                      ->join('tbl_products','tbl_subcategory2.id = tbl_products.sub_id2','inner')
                      ->join('tbl_subcategory1','tbl_subcategory2.subcat_id = tbl_subcategory1.id','inner')
                      ->where('tbl_products.status','a')
                      ->where('tbl_subcategory2.status','a')
                      ->group_by('tbl_products.sub_id2')
                      ->get('')
                      ->result();     



    }

    


}        