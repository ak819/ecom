<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_dashboard extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
    }

 public function getusercount()
 {
 	return $this->db->select('COUNT(id) as usercount')
 	         ->from('tbl_user')
 	         ->get()
 	         ->row('usercount');


 }
 public function gettotalshop()
 {
  return $this->db->select('SUM(payed_amount) as totalshop')
 	         ->from('tbl_order_details')
 	         ->where('payment_status','success')
 	         ->get()
 	         ->row('totalshop');

 }

 public function gettotalorders()
 {

return $this->db->select('COUNT(id) as totalorder')
 	         ->from('tbl_order_details')
 	         ->get()
 	         ->row('totalorder');


 }

 public function getpendingorder()
 {

 return $this->db->select('COUNT(id) as totalorder')
 	         ->from('tbl_order_details')
 	         ->where('order_completion_status','pending')
           ->where('payed_amount!=','0')
 	         ->get()
 	         ->row('totalorder');


 }

 public function getchartdata($year="")
 {
  if (!$year  ) {
			$year =date('Y');


 		}
 			$startdate="$year-01-01";
 			$enddate="$year-12-31";
    		$this->db->select('SUM(tbl_order_details.payed_amount) as "amount", DATE_FORMAT(tbl_order_details.order_date,"%b") as "month"')
    			 ->from('tbl_order_details');
		    $this->db->where('tbl_order_details.order_date >=',$startdate)->where('tbl_order_details.order_date <=',$enddate);
		    $this->db->where('payment_status','success');
			$this->db->order_by('order_date', 'asc');
			$this->db->group_by('month');
			return $run_q = $this->db->get()->result();



 }




}
 ?>