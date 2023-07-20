<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
		  function  __construct() 
	  {

  	parent::__construct();
	$this->load->library('pagination');# Load the pagination library
  $this->load->library('Form_validation');
	$this->load->helper('identical');# Load the pagination library
	$this->load->model(array('ipanel/m_order'));
	
	checkLogin();

     }


public function index($status)
{
 

  $data['status']=$status;
  $this->load->view('ipanel/header');  
  $this->load->view('ipanel/sidebar');  
  $this->load->view('ipanel/orderlist',$data);
  $this->load->view('ipanel/footer');


}

public function ajax_list()
  {
    $list = $this->m_order->get_datatables();
    
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $val) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $val->id;
      $row[] = $val->bill_name;           
      $row[] = $val->txn_id;
      $row[] = $val->order_amount;
      $row[] = $val->payed_amount;
      $row[] = $val->payment_status;
      $row[] = date('d-m-Y',strtotime($val->order_date));
      if($this->input->post('orderstatus') == "cancel")
      {
        $row[]=$val->status_reason;
      }
       if($this->input->post('orderstatus') == "dispatched")
      {
        $row[]=$val->tracking_no;
      }

      $url="'".base_url()."orderdetail/".$val->id."',";
      $param="'mywindow','menubar=1,resizable=1,scrollbars=yes,width=700,height=400'";

      $row[] ='<a href="javascript:void(0);" class="btn btn-info btn-sm" style="text-decoration:none;" onClick="javascript : window.open('.$url.''.$param.');">View</a>';


      $changestatus='<div class="btn-group"><button type="button" class="btn btn-outline-dark dropdown-toggle" id="statusbutton" onClick="hidestatus()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >';
       if($val->order_completion_status == 'pending'){ $changestatus.='Pending'; }
       elseif($val->order_completion_status == 'in_proccess'){ $changestatus.='In proccessed'; }
      elseif($val->order_completion_status == 'dispatched'){ $changestatus.='Dispatched'; }
       elseif($val->order_completion_status == 'completed'){ $changestatus.='Completed'; }
      elseif($val->order_completion_status == 'cancel'){  $changestatus.='Cancel';}
      else{  $changestatus.='';}
     $changestatus.='</button><div class="dropdown-menu">
                      <a class="dropdown-item changestatus" href="javascript:void(0);" data-orderid="'.$val->id.'" data-name="Pending" data-status="pending" >Pending</a>
                      <a class="dropdown-item changestatus" href="javascript:void(0);" data-orderid="'.$val->id.'" data-name="In proccessed" data-status="in_proccess">In proccessed</a>
                      <a class="dropdown-item changestatus" href="javascript:void(0);" data-orderid="'.$val->id.'" data-name="Completed" data-status="dispatched">Dispatched</a>
                       <a class="dropdown-item changestatus" href="javascript:void(0);" data-orderid="'.$val->id.'" data-status="completed">Completed</a>
                      <a class="dropdown-item changestatus" href="javascript:void(0);" data-orderid="'.$val->id.'" data-name="Cancel" data-status="cancel">Cancel</a>
                      </div>
                      </div>';



      $row[] =$changestatus;

      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_order->count_all(),
            "recordsFiltered" => $this->m_order->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }


  public function viewdetails($order_id)
  {

    $data=$this->m_order->getorderdetails($order_id); 
   $this->load->view('ipanel/orderdetails',$data);
 

  }

  public function changestatus()
  {
  
  $res=$this->m_order->changestatus();

  echo $res;


  }







}     