<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }

  
  public function checkemailexits($emailid)
  {
    $this->db->select('tbl_user.my_login_email');
      $this->db->where('my_login_email',$emailid);
      $this->db->from('tbl_user');
      $res=$this->db->get();

     if(!$res->num_rows())
         {
            return 0;
         }
         else
         {
           
             return 1;
         }



  }
  public function registerit()
  {
     $data=array('name'=>$this->input->post('name'),
                 //'lname'=>$this->input->post('lname'),
                 'mobile'=>$this->input->post('mobile'),
                 'my_login_email'=>$this->input->post('email'),
                 'my_login_password'=>md5($this->input->post('password')),
                 );
     $this->db->insert('tbl_user',$data);
     $query=$this->db->select('tbl_user.id,name,mobile,my_login_email')
                 ->from('tbl_user')
                 ->where('my_login_email',$this->input->post('email'))
                 ->where('my_login_password',md5($this->input->post('password')))
                 ->get('');
        if(!$query->num_rows())
        {
            return 0;
        }
        else
        {
        foreach($query->result() as $rows)
        {   
            $user_data = array(
              'user_id'  => $rows->id,
              'name'  => $rows->name,
              'mobile'=>$rows->mobile,
              'email' => $rows->my_login_email,
              'logged_in'  => TRUE,
              
            );
        }
        $this->session->set_userdata($user_data); //add all data to session
        $data=array('login_time'=>date('Y-m-d H:i:s'));
        $this->db->where("id",$this->session->userdata('user_id'))
                 ->update('tbl_user',$data);

                 return 1;
        }
     


  }

  public function go_for_login()
  {
   //echo "inn";exit;
      $query=$this->db->select('tbl_user.id,name,mobile,my_login_email')
                 ->from('tbl_user')
                 ->where('my_login_email',$this->input->post('signin_email'))
                 ->where('my_login_password',md5($this->input->post('signin_password')))
                 ->get('');
        if(!$query->num_rows())
        {
            return 0;
        }
        else
        {
        foreach($query->result() as $rows)
        {   
            $user_data = array(
              'user_id'  => $rows->id,
              'name'  => $rows->name,
              'mobile'=>$rows->mobile,
              'email' => $rows->my_login_email,
              'logged_in'  => TRUE,
              
            );
        }
       /* $this->session->set_userdata('user_id',$user_data['user_id']);
        $this->session->set_userdata('name',$user_data['name']);
        $this->session->set_userdata('mobile',$user_data['mobile']);
        $this->session->set_userdata('email',$user_data['email']);*/
        $this->session->set_userdata($user_data);
        $data=array('login_time'=>date('Y-m-d H:i:s'));
        $this->db->where("id",$this->session->userdata('user_id'))
                 ->update('tbl_user',$data);

                 return 1;
        }


   }

   public function logouttime()
    {

     $data=array('logout_time'=>date('Y-m-d H:i:s'));
        $this->db->where("id",$this->session->userdata('user_id'))
                 ->update('tbl_user',$data);

                 return 1;

    }
//////////////////////////////////  for forget password /////////////////////////////////////////// 
  public function verifytoforget()
  {
    $this->db->select('tbl_user.id,my_login_email,name');
      $this->db->where('my_login_email',$this->input->post('signin_email'));
      $this->db->from('tbl_user');
      $res=$this->db->get();
     return $res->row();

  }

  public function forgetlink($data)
  {

   $this->db->insert('forget_password_links',$data);

   return $this->db->insert_id();

  }
  public function deleteforgetlink($id)
  {

      $this->db->where('user_id', $id);
      $this->db->delete('forget_password_links');

  }
 
 public function verifylink($linkid)
 {
  
      $this->db->select('forget_password_links.*');
      $this->db->where('id',$linkid);
      $this->db->where('expirydate >',date("Y-m-d"));
      //$this->db->where('expirytime >=',date("h:i:s"));
      $this->db->from('forget_password_links');
      $res=$this->db->get();
     return $res->row();


 }

 public function resetpassword($link_id,$user_id)
  {
    $data=array('my_login_password'=>md5($this->input->post('new_password')),
            );
            $this->db->where("id",$user_id);
            $this->db->update('tbl_user',$data);

                $this->db->where('id', $link_id);
    return  $this->db->delete('forget_password_links');

  }

  public function getuserdeatails()
{
   return $this->db->select('tbl_user.id,name,mobile,my_login_email')
                 ->from('tbl_user')
                 ->where("id",$this->session->userdata('user_id'))
                 ->get('')
                 ->row();


}

  public function updatemyaccount()
  {
    $data=array('name'=>$this->input->post('name'),
                //'lname'=>$this->input->post('lname'),
                'mobile'=>$this->input->post('mobile'),   
               );

            $this->db->where("id",$this->session->userdata('user_id'));
            $this->db->update('tbl_user',$data);

        return 1;
  }

  public function changepassword()
  {
  
   $data=array('my_login_password'=>md5($this->input->post('new_password')),
            );
            $this->db->where("id",$this->session->userdata('user_id'));
            $this->db->update('tbl_user',$data);

              
     return 1;


  }

public function addwishlist($u_id,$p_id,$pack_id)
{
   

   $data=array('u_id'=>$u_id,
                 'p_id'=>$p_id,
                  'pack_id'=>$pack_id,
                 );
     return $this->db->insert('tbl_wishlists',$data);



}
public function deletewish($u_id,$id)
{
$data=array('status'=>'n',
            );
            $this->db->where("u_id",$u_id);
             $this->db->where("p_id",$id);
            $this->db->update('tbl_wishlist',$data);


}
public function getwishlist()
{

    return  $this->db->select('tbl_products.*,tbl_products_images.name')
                     ->from('tbl_wishlist')
                     ->join('tbl_products','tbl_wishlist.p_id = tbl_products.id','left')
                     ->join('tbl_products_images','tbl_products.id = tbl_products_images.p_id','left')
                     ->where('tbl_products.status','a')
                     ->where('tbl_wishlist.status','y')
                     ->where("u_id",$this->session->userdata('user_id'))
                     ->group_by('tbl_products.id')
                     ->get('')
                     ->result();


/*  return $this->db->select('tbl_wishlist.*')
                 ->from('tbl_wishlist')
                 ->where("u_id",$this->session->userdata('user_id'))
                 ->get('')
                 ->result();*/

}
public function checkwishlist($u_id,$p_id)
{ 
  return $this->db->select('tbl_wishlist.*')
                 ->from('tbl_wishlist')
                 ->where("u_id",$u_id)
                 ->where("p_id",$p_id)
                 ->where('status','y')
                 ->get('')
                 ->result();

  $this->session->set_flashdata('msg','Item added to wishlist...!');

}

public function uppdatename()
{

 $data=array('name'=>$this->input->post('name'),
               
            );

            $this->db->where("id",$this->session->userdata('user_id'));
            $this->db->update('tbl_user',$data);

  return 1;
}

public function updatemobile()
{
 
$data=array('mobile'=>$this->input->post('mobile'),);

            $this->db->where("id",$this->session->userdata('user_id'));
            $this->db->update('tbl_user',$data);

 return 1;
}

public function checkoldpassword()
{

 return $this->db->select('tbl_user.id,mobile,my_login_email as email')
           ->from('tbl_user')
           ->where('id',$this->session->userdata('user_id'))
           ->where('my_login_password',md5($this->input->post('currentpassword')))
           ->get('')
           ->num_rows();



}

/////////////////////////////////////////////////////////////////////////////////////////////////

}        