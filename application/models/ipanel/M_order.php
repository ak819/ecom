<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model {

	var $table = 'tbl_order_details';
	var $column_order = array(null, 'id','txn_id','bill_name','order_date','payment_status'); //set column field database for datatable orderable
	var $column_search = array('id','txn_id','bill_name','order_date','payment_status'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
    /*  echo "<pre>";
      print_r($_POST);
      exit;*/
		//add custom filter here
		if($this->input->post('orderstatus'))
		{
		    if($this->input->post('orderstatus')=="unpaid")
		    {
		      $this->db->where('payed_amount',0);
		       $this->db->where('order_completion_status!=','cancel'); 
		    }elseif($this->input->post('orderstatus')=="pending")
		    {
		        $this->db->where('order_completion_status', $this->input->post('orderstatus'));   
		        //$this->db->where('payed_amount!=',0);  
		     
		    }else{
		        
		          $this->db->where('order_completion_status', $this->input->post('orderstatus'));  
		    }
			
			//
		}
		
		$this->db->from($this->table);
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_list_countries()
	{
		$this->db->select('country');
		$this->db->from($this->table);
		$this->db->order_by('country','asc');
		$query = $this->db->get();
		$result = $query->result();

		$countries = array();
		foreach ($result as $row) 
		{
			$countries[] = $row->country;
		}
		return $countries;
	}

    public function getorderdetails($order_id)
    {


    
		$this->db->select('tbl_order_details.*,tbl_billing_shipping_details.*'); 
    	$this->db->from('tbl_order_details');
		$this->db->where('tbl_order_details.id',$order_id);
		$this->db->join('tbl_billing_shipping_details ', 'tbl_order_details.id = tbl_billing_shipping_details.order_id');
		$orderdetails = $this->db->get('')->row();
		if($orderdetails)
		{
		$product_list= $this->db->select('tbl_order_item.*')
								->from('tbl_order_item')
								->where('tbl_order_item.order_id',$order_id)	
								->get('')
								->result();	
		}else{

			$product_list="";
		}
		return  array('orderdetails' =>$orderdetails,
					  'product_list' =>$product_list);




    }
     public	function changestatus()
	 {
	 	$order_id=$this->input->post('order_id');
	 	if($this->input->post('status')=="cancel")
	 	{
	 		$data = array('order_completion_status'=>'cancel',
						'status_reason'=>$this->input->post('reason'));

	 	}elseif($this->input->post('status')=="dispatched")
        {
          	$data = array('order_completion_status'=>'dispatched',
						'tracking_no'=>$this->input->post('trackingno'));

        }
	 	else{

	 		 $data = array('order_completion_status' =>$this->input->post('status'));
	 	}
	   
	 	$this->db->update('tbl_order_details', $data, "id = $order_id");
	 	return 1;
	 }

   
    

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */

?>