<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	  function  __construct() 
	{
		//echo "inn";exit;
	  	parent::__construct();
		$this->load->library('pagination');# Load the pagination library
		$this->load->helper('identical');# Load the pagination library
		$this->load->model(array('ipanel/m_admin','ipanel/m_dashboard'));
		 checkLogin();
		
    }
    public function index()
	{
		$data['usercount']=$this->m_dashboard->getusercount();
		$data['totalshop']=$this->m_dashboard->gettotalshop();
		$data['totalorders']=$this->m_dashboard->gettotalorders();
		$data['pedingorders']=$this->m_dashboard->getpendingorder();

       /* echo "<pre>";
        print_r($data);
        exit;*/

		$this->load->view('ipanel/header');
		$this->load->view('ipanel/sidebar');
		$this->load->view('ipanel/dashboard',$data);
		$this->load->view('ipanel/footer');
		
	}

  function getvalue($keymonth,$field,$res)
  {
     foreach($res as $val)
     {

      if($val->$field == $keymonth)
      {
        return intval($val->amount);
      }
      
     }

  }

	public function getdata()
	{
     
  $months = array(0=>'Jan',1 => 'Feb', 2 => 'Mar', 3 => 'Apr', 4 => 'May', 5 => 'Jun', 6 => 'Jul', 7 => 'Aug', 8 => 'Sep', 9 => 'Oct', 10 => 'Nov', 11 => 'Dec');

 
	$res=$this->m_dashboard->getchartdata();

  
  $chartdata=array();
 	if($res)
	{
    

    for($i=0; $i<=11; $i++)
    {
     
      if(in_array_field($months[$i],'month',$res)) 
      {
      $amount=$this->getvalue($months[$i],'month',$res);     
      $data=array('Month'=>$months[$i], 'amount'=>$amount);

      }
      else{

        $data=array('Month'=>$months[$i], 'amount'=>0);

      }
      
      $chartdata[]=$data;

     
    }
    
	}else{

   
   $chartdata =array (
  0 => 
  array (
    'Month' => 'Jan',
    'amount' => 0,
  ),
  1 => 
  array (
    'Month' => 'Feb',
    'amount' => 0,
  ),
  2 => 
  array (
    'Month' => 'Mar',
    'amount' => 0,
  ),
  3 => 
  array (
    'Month' => 'Apr',
    'amount' => 0,
  ),
  4 => 
  array (
    'Month' => 'May',
    'amount' => 0,
  ),
  5 => 
  array (
    'Month' => 'Jun',
    'amount' => 0,
  ),
  6 => 
  array (
    'Month' => 'Jul',
    'amount' => 0,
  ),
  7 => 
  array (
    'Month' => 'Aug',
    'amount' => 0,
  ),
  8 => 
  array (
    'Month' => 'Sep',
    'amount' => 0,
  ),
  9 => 
  array (
    'Month' => 'Oct',
    'amount' => 0,
  ),
   10 => 
  array (
    'Month' => 'Nov',
    'amount' => 0,
  ),
   11 => 
  array (
    'Month' => 'Dec',
    'amount' => 0,
  ),
);

 }


print_r(json_encode($chartdata));





	}
	
	
 
}
