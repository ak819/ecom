<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_payments extends CI_Model {


 public function insertCCav($data)
 {
    	    $this->db->insert('tbl_ccav',$data);
    	  
    	  $paymentdata=array('user_id'=>$data['merchant_param1'],
    	                     'txn_id'=>$data['tracking_id'],
    	                     'order_id'=>$data['order_id'],
    	                     'amount'=>$data['amount'],
    	                     'mode'=>$data['payment_mode'],
    	                     'payment_status'=>$data['order_status'],
    	                     'trandate'=>date('Y-m-d H:i:s',strtotime($data['trans_date'])),
    	      
    	                     );
           return $this->db->insert('tbl_payment',$paymentdata);
 }




}
?>