<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_products extends CI_Model {
    public function __construct()
    {
      parent::__construct();
    }


    public function homeproduct()
    {
     

          $result=$this->db->select('tbl_products.*,tbl_brand.name as brand_name,tbl_category.cat_name,tbl_products_images.name')
                     ->from('tbl_products')
                     ->join('tbl_brand','tbl_products.brand_id = tbl_brand.id','left
                      ')
                     ->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->where('tbl_products.status','a')
                     //->where('tbl_products.discount','')
                     ->order_by('tbl_products.cat_id','asc')
                     ->group_by('tbl_products.cat_id')
                     ->limit(8)
                     ->get('')
                     ->result();

         return $result;        

    }

    public function getNewArrivals()
    {

         $result=$this->db->select('tbl_products.*,tbl_brand.name as brand_name,tbl_category.cat_name,tbl_products_images.name')
                     ->from('tbl_products')
                     ->join('tbl_brand','tbl_products.brand_id = tbl_brand.id','left')
                     ->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->where('tbl_products.status','a')
                     ->order_by('tbl_products.id','desc')
                     ->group_by('tbl_products.id')
                     ->limit(8)
                     ->get('')
                     ->result();

       /*foreach($result as $val)
       {

        $val->id=$this->encrypt->encode($val->id);

       }*/

       return $result;        

    }


    public function getTodaysDeal()
    {
        return  $this->db->select('tbl_products.*,tbl_products_images.name')
                     ->from('tbl_products')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->where('tbl_products.status','a')
                     ->where('tbl_products.discount >',0)
                     ->order_by('tbl_products.discount','desc')
                     ->group_by('tbl_products.id')
                     ->limit(8)
                     ->get('')
                     ->result();

    }

    public function getPopularProducts()
    {

      return  $this->db->select('tbl_products.*,tbl_products_images.name,SUM(tbl_order_item.product_qty) as qty')
                     ->from('tbl_products')
                     ->join('tbl_order_item','tbl_products.id = tbl_order_item.product_id')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->where('tbl_products.status','a')
                     ->order_by('qty','desc')
                     ->group_by('tbl_products.id')
                     ->limit(8)
                     ->get('')
                     ->result();



    }

    public function getCategoryWise($cat_id,$item_count)
    {
     
     return  $this->db->select('tbl_products.*,tbl_brand.name as brand_name,tbl_category.cat_name,tbl_products_images.name')
                     ->from('tbl_products')
                     ->join('tbl_brand','tbl_products.brand_id = tbl_brand.id','left')
                     ->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->where('tbl_products.status','a')
                     ->where('tbl_products.cat_id',$cat_id)
                     ->order_by('tbl_products.cat_id','asc')
                     ->group_by('tbl_products.id')
                     ->limit($item_count)
                     ->get('')
                     ->result();


    }

    public function getralated($id,$cat_id,$sub_id1,$sub_id2)
    { 
       $id=strreplace_decode($id);
      $p_id=$this->encrypt->decode($id);

return  $this->db->select('tbl_products.p_name,tbl_category.cat_name,tbl_package.*,tbl_package.name as pack_name,tbl_products_images.name')
                     ->from('tbl_products')
                     ->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->join('tbl_package','tbl_products.id = tbl_package.p_id')
                     ->where('tbl_products.status','a')
                     ->where('tbl_products.cat_id',$cat_id)
                     ->where('tbl_products.sub_id1',$sub_id1)
                     ->where('tbl_products.sub_id2',$sub_id2)
                      ->where('tbl_products.id!=',$p_id)
                     ->order_by('tbl_package.discount desc','tbl_package.p_id desc')
                     //->order_by('tbl_package.p_id','desc')
                     ->group_by('tbl_products.id')
                     ->get('')
                     ->result();
 

    }


    public function shopbybrand()
    {

         return  $this->db->select('tbl_products.*,tbl_brand.name as brand_name,tbl_category.cat_name,tbl_products_images.name')
                     ->from('tbl_products')
                     ->join('tbl_brand','tbl_products.brand_id = tbl_brand.id','left')
                     ->where('tbl_products.status','a')
                     ->order_by('tbl_products.id','desc')
                     ->group_by('tbl_products.brand_id')
                     ->limit(8)
                     ->get('')
                     ->result();




    }
    

    public function getproductsrow()
    {
     $cat_id=$this->encrypt->decode(strreplace_decode($this->input->post('ref')));
     $subcat_id=$this->encrypt->decode(strreplace_decode($this->input->post('ref1')));
     $subsubcat_id=$this->encrypt->decode(strreplace_decode($this->input->post('ref2')));
    //$search=$this->input->post('searchkey');
     $brand_id=$this->input->post('brand');
     $unit=$this->input->post('unit');
     $min=preg_replace("/[^0-9]/",'',trim($this->input->post('minprice')));
     $max=preg_replace("/[^0-9]/",'',trim($this->input->post('maxprice')));
     $sort=$this->input->post('sortby');
    
        $this->db->select('tbl_products.p_name,tbl_category.cat_name,tbl_products_images.name as img,tbl_package.*,tbl_package.name as pack_name');
                        $this->db->from('tbl_products');
                        $this->db->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id');
                        $this->db->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left');
                        $this->db->join('tbl_package','tbl_products.id = tbl_package.p_id');
                        $this->db->where('tbl_products.status','a');
                        $this->db->where('tbl_package.status','a');
                        if($cat_id)
                        {
                         $this->db->where('tbl_products.cat_id',$cat_id);
                        }
                        if($subcat_id)
                        {
                          $this->db->group_start();

                           $this->db->where_in('tbl_products.sub_id1',$subcat_id);

                           $this->db->group_end();
                        }
                        if($subsubcat_id)
                        {
                          $this->db->group_start();

                           $this->db->where_in('tbl_products.sub_id2',$subsubcat_id);

                           $this->db->group_end();
                        }
                          if($max)
                        {

                              $this->db->group_start();
                            $this->db->where('tbl_package.price >=',$min); 
                              
                            $this->db->group_end();

                             $this->db->group_start();
                             $this->db->where('tbl_package.price <=',$max); 
                             $this->db->group_end();

          
                        }
                        if($brand_id)
                        {
                            $brand_id=explode(',', $brand_id);
                          $this->db->group_start();

                          $this->db->where_in('tbl_products.brand_id',$brand_id);

                          $this->db->group_end();
                         
                        }
                        if($unit)
                        {
                            $unit=explode(',', $unit);
                          $this->db->group_start();

                          $this->db->where_in('tbl_products.unit',$unit);

                          $this->db->group_end();
                         
                        }

                         if($sort AND $sort=="discount"){

                          $this->db->group_start();

                          $this->db->or_where('tbl_package.discount >',0);

                          $this->db->group_end();
                         $this->db->order_by('tbl_package.discount','desc');
                         }

                        // if($search)
                        // {
                        //   $this->db->group_start();

                  
                        //   $this->db->like('tbl_products.p_name',$search);

                        //  $this->db->group_end();

                        // }
                        
                        //$this->db->limit($rowperpage, $rowno);

                        
                        $this->db->group_by('tbl_products.id','desc');
                
                        $res=$this->db->get('');
              return     $res->num_rows();


   

    }

    public function getproducts($rowperpage,$rowno)
    {
   
     $cat_id=$this->encrypt->decode(strreplace_decode($this->input->post('ref')));
     $subcat_id=$this->encrypt->decode(strreplace_decode($this->input->post('ref1')));
     $subsubcat_id=$this->encrypt->decode(strreplace_decode($this->input->post('ref2')));
    //$search=$this->input->post('searchkey');
     $brand_id=$this->input->post('brand');
     $unit=$this->input->post('unit');
     $min=preg_replace("/[^0-9]/",'',trim($this->input->post('minprice')));
     $max=preg_replace("/[^0-9]/",'',trim($this->input->post('maxprice')));
     $sort=$this->input->post('sortby');
    
      $this->db->select('tbl_products.p_name,tbl_category.cat_name,tbl_products_images.name as img,tbl_package.*,tbl_package.name as pack_name');
                        $this->db->from('tbl_products');
                        $this->db->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id');
                        $this->db->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left');
                         $this->db->join('tbl_package','tbl_products.id = tbl_package.p_id');
                        $this->db->where('tbl_products.status','a');
                        $this->db->where('tbl_package.status','a');
                        //$this->db->distinct('tbl_package.p_id');
                        if($cat_id)
                        {

                         $this->db->where('tbl_products.cat_id',$cat_id);
                        }
                        if($subcat_id)
                        {
                          $this->db->group_start();

                           $this->db->where_in('tbl_products.sub_id1',$subcat_id);

                           $this->db->group_end();
                        }
                        if($subsubcat_id)
                        {
                          $this->db->group_start();

                          $this->db->where_in('tbl_products.sub_id2',$subsubcat_id);

                           $this->db->group_end();
                        }
                          if($max)
                        {

                            $this->db->group_start();
                        
                            $this->db->where('tbl_package.price >=',$min); 
                              
                            $this->db->group_end();

                             $this->db->group_start();
                             $this->db->where('tbl_package.price <=',$max); 
                             $this->db->group_end();

          
                        }
                        if($brand_id)
                        {
                            $brand_id=explode(',', $brand_id);
                          $this->db->group_start();

                          $this->db->where_in('tbl_products.brand_id',$brand_id);

                          $this->db->group_end();
                         
                        }
                        if($unit)
                        {
                            $unit=explode(',', $unit);
                          $this->db->group_start();

                          $this->db->where_in('tbl_products.unit',$unit);

                          $this->db->group_end();
                         
                        }
                          $this->db->group_by('tbl_package.p_id','desc');
                         
                        if($sort AND $sort=="price_high_to_low"){

                          $this->db->order_by('tbl_package.price','desc');

                         }elseif($sort AND $sort=="price_low_to_high"){
                          $this->db->order_by('tbl_package.price','asc');
                         }elseif($sort AND $sort=="popularity"){

                         }
                         elseif($sort AND $sort=="discount"){

                          $this->db->group_start();

                          $this->db->or_where('tbl_package.discount >',0);

                          $this->db->group_end();
                         $this->db->order_by('tbl_package.discount','desc');
                         }else{

                            $this->db->order_by('tbl_products.id','desc');
                         }
            
                       
                        $this->db->limit($rowperpage, $rowno);
                        
                
                        $res=$this->db->get('');
                        
              return     $res->result();               





    }

  


    public function getproductDetails($p_id)
    {
      
   $productdetails=  $this->db->select('tbl_products.*,p_company.name as brand_name,tbl_category.cat_name,tbl_products_images.name')
                        ->from('tbl_products')
                        ->join('p_company','tbl_products.brand_id = p_company.id','left')
                        ->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
                        ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                        ->where('tbl_products.status','a')
                        ->where('tbl_products.id',$p_id)
                        ->get('')
                        ->row();

       $productImages=$this->db->select('tbl_products_images.*')
                               ->from('tbl_products_images')
                               ->where('p_id',$p_id)
                               ->where('status','a')
                               ->order_by('priority','asc')
                               ->get('')
                               ->result();
         
         $data=array('productdetails'=>$productdetails,     
                     'productImages'=>$productImages,
                   );

         

    return $data;

    }

         public function getprice($id)
    {

       $id=strreplace_decode($id);
      $p_id=$this->encrypt->decode($id);
        return $this->db->select('tbl_products.bottom_price as price,discount')
                            ->from('tbl_products')
                            ->where('id',$p_id)
                            ->get('')
                            ->row();
    }
   /* public function checkprice($pid)
    {
      $product=$this->db->select('tbl_products.bottom_price as price,discount')
                            ->from('tbl_products')
                            ->where('id',$pid)
                            ->get('')
                            ->row();
       if($product->discount)
       {
        
        $p_price=$product->price-($product->price * $product->discount / 100);
       }else{

        $p_price=$product->price;
       }                     
       
       return $p_price;

    }*/


       public function getProduct($id)
    {  
        $id=strreplace_decode($id);
      $p_id=$this->encrypt->decode($id);
        return $this->db->select('tbl_products.bottom_price as price,p_weight,discount')
                            ->from('tbl_products')
                            ->where('id',$p_id)
                            ->get('')
                            ->row();
    }


    public function getforcompare()
    {

     return  $this->db->select('tbl_products.id as product_id,p_name,model_no,brand_id,tbl_brand.name as brand_name,tbl_category.cat_name,tbl_products_images.name')
                     ->from('tbl_products')
                     ->join('tbl_brand','tbl_products.brand_id = tbl_brand.id','left')
                     ->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->where('tbl_products.status','a')
                     ->where('tbl_products.cat_id',$this->input->get('category'))
                     ->order_by('tbl_products.id','desc')
                     ->group_by('tbl_products.id')
                     ->get('')
                     ->result();

    }


    public function getalldetails($id)
    {
       return  $this->db->select('tbl_products.id as product_id,tbl_products.bottom_price as price,p_name,model_no,brand_id,tbl_brand.name as brand_name,tbl_category.cat_name,tbl_products_images.name,tbl_subcategory1.name as filter1,tbl_subcategory2.name as filter2,,tbl_subcategory3.name as filter3,tbl_subcategory4.name as filter4,tbl_subcategory5.name as filter5,tbl_subcategory6.name as filter6,tbl_subcategory7.name as filter7,tbl_subcategory8.name as filter8,tbl_subcategory9.name as filter9,tbl_subcategory10.name as filter10')
                ->from('tbl_products')
                ->join('tbl_brand','tbl_products.brand_id = tbl_brand.id','left')
                ->join('tbl_category','tbl_products.cat_id = tbl_category.cat_id')
                ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                ->join('tbl_subcategory1','tbl_products.sub_id1 = tbl_subcategory1.id','left')
                ->join('tbl_subcategory2','tbl_products.sub_id2 = tbl_subcategory2.id','left')
                ->join('tbl_subcategory3','tbl_products.sub_id3 = tbl_subcategory2.id','left')
                ->join('tbl_subcategory4','tbl_products.sub_id4 = tbl_subcategory4.id','left')
                ->join('tbl_subcategory5','tbl_products.sub_id5 = tbl_subcategory5.id','left')
                ->join('tbl_subcategory6','tbl_products.sub_id6 = tbl_subcategory6.id','left')
                ->join('tbl_subcategory7','tbl_products.sub_id7 = tbl_subcategory7.id','left')
                ->join('tbl_subcategory8','tbl_products.sub_id8 = tbl_subcategory8.id','left')
                ->join('tbl_subcategory9','tbl_products.sub_id9 = tbl_subcategory9.id','left')
                ->join('tbl_subcategory10','tbl_products.sub_id10 = tbl_subcategory10.id','left')

                     ->where('tbl_products.status','a')
                     ->where('tbl_products.id',$id)
                     ->order_by('tbl_products.id','desc')
                     ->group_by('tbl_products.id')
                     ->get('')
                     ->row();





    }


    public function getminPriceRange($cat_id,$field)
    {
     return $this->db->select('MIN(price) as p_min')
                            ->from('tbl_package')
                            ->join('tbl_products','tbl_package.p_id = tbl_products.id')
                            ->where('tbl_products.'.$field.'',$cat_id)
                            ->where('tbl_package.status','a') 
                            ->get('')
                            ->row('p_min');

    }

    public function getmaxPriceRange($cat_id,$field)
    {
        return   $this->db->select('MAX(price) as p_max')
                            ->from('tbl_package')
                            ->join('tbl_products','tbl_package.p_id = tbl_products.id')
                             ->where('tbl_products.'.$field.'',$cat_id)
                             ->where('tbl_package.status','a')  
                             ->get('')
                             ->row('p_max');

    }

     public function getminPrice()
    {
     return $this->db->select('MIN(price) as p_min')
                            ->from('tbl_package')
                            ->join('tbl_products','tbl_package.p_id = tbl_package.p_id')
                            ->where('tbl_package.status','a') 
                            ->get('')
                            ->row('p_min');

    }

    public function getmaxPrice()
    {
        return   $this->db->select('MAX(price) as p_max')
                            ->from('tbl_package')
                            ->join('tbl_products','tbl_package.p_id = tbl_package.p_id')
                             ->where('tbl_package.status','a')  
                             ->get('')
                             ->row('p_max');

    }


    public function getHigestDiscount($p_id)
    {
       return   $this->db->select('*')
                            ->from('tbl_package')
                             ->where('p_id',$p_id)
                             ->order_by('tbl_package.discount','desc')
                             ->get('')
                             ->row();

    }



    public function getPackDetails($pid,$pack_id)
    {
        return   $this->db->select('*')
                            ->from('tbl_package')
                             ->where('id',$pack_id)
                             ->where('p_id',$pid)
                             ->get('')
                             ->row();


    }



    public function getActivePack($pid)
    {
        return   $this->db->select('*')
                            ->from('tbl_package')
                             ->where('p_id',$pid)
                             ->get('')
                             ->result();


    }







}        