<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_order extends CI_Model {
	 public function __construct()
	 {
		  parent::__construct();
		  $this->load->helper(array('form', 'url','html'));
		  $this->load->library(array('form_validation','session'));
		  // getactiveaddress
	 }

	 public function addOrder()
	 {
	 		$stream_clean = $this->session->userdata('products');
			$cart_products = json_decode($stream_clean);
			$user_id=$this->session->userdata('user_id');
			$address=$this->m_address->getcurrentadress();

			$paymentOption="online";//$this->input->post('paymentOption');
		
			$this->db->trans_begin();
	 		$data=array(
					'user_id'=>$user_id,
					'payment_method'=>$paymentOption,
					'order_amount'=>'',
					'payed_amount'=>'',
					'payment_status'=>'pending',
					'order_completion_status'=>'pending',
	 			);
	  			$this->db->insert('tbl_order_details',$data);
				$order_id=$this->db->insert_id();
				$addressdetails=$this->m_address->getactiveaddress($address->address_id,$user_id);


			  
				$data=array(
					'order_id'=>$order_id,
					'ship_name'=>$addressdetails->ship_name,
					'ship_email'=>$addressdetails->ship_email,
					'ship_mob'=>$addressdetails->ship_mobile,
					'ship_address'=>$addressdetails->ship_address,
					'ship_city'=>$addressdetails->ship_city,
					'ship_state'=>$addressdetails->ship_state,
					'ship_pin'=>$addressdetails->ship_pin,
					'ship_country'=>'India',
					'bill_name'=>$addressdetails->bill_name,
					'bill_email'=>$addressdetails->bill_email,
					'bill_mob'=>$addressdetails->bill_mobile,
					'bill_address'=>$addressdetails->bill_address,
					'bill_city'=>$addressdetails->bill_city,
					'bill_state'=>$addressdetails->bill_state,
					'bill_pin'=>$addressdetails->bill_pin,
					'bill_country'=>'India',
	 			);	
					

					$this->db->insert('tbl_billing_shipping_details',$data);
					
					$total=$item_count=$totalweight=$shipingcharges=0;
				
					foreach ($cart_products as $product)
					 { 
					 	  $id=strreplace_decode($product->id);
                          $product->id=$this->encrypt->decode($id);
					 	  $prod_qty = $product->quantity;
					 	  $product_details=$this->detailsProduct($product->id);
					 	  $product_ids[]=$product->id;
					 	  foreach($product_details as $row)
								   {
								        if($row->discount)
								   	     {
                                          $p_price=$row->bottom_price-($row->bottom_price * $row->discount / 100);
								   	     }else{

								   	      $p_price=$row->bottom_price; 	 
								   	     }
										 //$size=$row->p_size;
										 $cat_id=$row->cat_id;
										 $product_name=$row->p_name;
										 $gst=$row->gst;
										 $p_img=$product->image;
										 $discount=$row->discount;
										 $amt = ($p_price) * ($prod_qty);
										 $total += $amt;
										 $item_count +=$prod_qty;
										 $totalweight+=($row->p_weight) * ($prod_qty);
										
									}
									 $data=array(
									'order_id'=>$order_id,
									'user_id'=>$user_id,
									'product_id'=>$product->id,
									'product_name'=>$product_name,
									'discount'=>$discount,
									'product_qty'=>$prod_qty,
									'price'=>$row->bottom_price,
									'gst'=>$gst,
									'total_price'=>$amt,
									'product_image'=>$p_img,
								
									
									);
								//print_r($data);
								$this->db->insert('tbl_order_item',$data);
					}
                
                    	
				$shipingcharges=$this->calculateshipingcharges($addressdetails->ship_pin,$totalweight);
        
							$data=array(
									'shipping_charge'=>$shipingcharges,
									'bill_name'=>$addressdetails->ship_name,
									'payed_amount'=>'',
									'order_amount'=>$total,
									'item_count'=>$item_count,
									'order_date'=>date("Y-m-d H:i:s"),
									);
				$this->db->update('tbl_order_details', $data, "id =$order_id");	
	 			if ($this->db->trans_status() === FALSE)
				{
				        $this->db->trans_rollback();
				        return false;
				}
					
				$this->db->trans_commit();
			
				$paymentdata = new stdClass();
				$paymentdata->tid=time();
				$paymentdata->merchant_id=$this->config->item('merchant_id');
                $paymentdata->order_id =$order_id;
                $paymentdata->amount =number_format($total+$shipingcharges, 2,'.', '');
                $paymentdata->currency="INR";
                $paymentdata->redirect_url=$this->config->item('redirect_url');
                $paymentdata->cancel_url=$this->config->item('redirect_url');
                $paymentdata->language="EN";
                $paymentdata->billing_name = $addressdetails->ship_name;
                $paymentdata->billing_address = $addressdetails->ship_address;
                $paymentdata->billing_city = $addressdetails->ship_city;
                $paymentdata->billing_state = $addressdetails->ship_state;
                $paymentdata->billing_zip = $addressdetails->ship_pin;
                $paymentdata->billing_country="India";
                $paymentdata->billing_tel = $addressdetails->ship_mobile;
                $paymentdata->billing_email = $addressdetails->ship_email;
                $paymentdata->merchant_param1=$this->session->userdata('user_id');
                

                return $paymentdata;

					
	 }


	
	    public function detailsProduct($prod_id)
	 {
	 	$this->db->select ('*'); 
    	$this->db->from ('tbl_products');
		$this->db->where('id',$prod_id);
		$query = $this->db->get('');
		return $query->result();
	 }

	 public function get_coupon_amount($couponid)
    {
     return $this->db->select('tbl_coupon.amount as amount')
                     ->from('tbl_coupon')
                     ->where('code',$couponid)
                     ->get('')
                     ->row('amount');

    }
	

	 public	function cancel_order($order_id)
	 {
	 	
		$data = array('order_completion_status' => 'cancel',
			           'payment_status'=> 'cancel',
						'status_reason' =>'Payment cancellation');
	 	$this->db->update('tbl_order_details', $data, "id = $order_id");
	 	return 1;
	 }

	public function  storepayuresponse($data)
	{

     $this->db->insert('payuresponse',$data);

	}

	public function updateorderdetails($data1)
	{
		$data = array('payment_status'=>$data1['status'],'txn_id'=>$data1['txnid'],'	payed_amount'=>$data1['paidamount']);
		$this->db->where('id',$data1['order_id']);
	 	$this->db->update('tbl_order_details',$data);
	 	return 1;
	}
	
	public function getuserorders()
	{
		return $this->db->select('*')
	            ->from('tbl_order_details')
                ->where('user_id',$this->session->userdata('user_id'))
                ->where('payment_status!=','cancel')
                ->get()
                ->result();

	}

	public function orderdetails($order_id)
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
	public function getorderdetails($order_id)
	{
		$this->db->select('tbl_order_details.*,tbl_billing_shipping_details.*'); 
    	$this->db->from('tbl_order_details');
		$this->db->where('tbl_order_details.id',$order_id);
		$this->db->join('tbl_billing_shipping_details ', 'tbl_order_details.id = tbl_billing_shipping_details.order_id');
		return $orderdetails = $this->db->get('')->row();


	}
    public function getorderitems($order_id)
    {
     
    return $product_list= $this->db->select('tbl_order_item.*')
								->from('tbl_order_item')
								->where('tbl_order_item.order_id',$order_id)	
								->get('')
								->result();	

    }

/*     public function calculateshipingcharges($pin)
    {
      
      
      $location=$this->getLocation($pin);
      
      
      
      if($location->city_id =="369" AND $location->state_id == "21")
      {
        $shiptype="local"; //checked pin details for nashik
      }
  elseif($location->city_id !=="369" AND $location->city_id !=="356" AND $location->state_id == "21")
      {
         $shiptype="ROM";  //checked pin details for rest of maharashtra
      }
  elseif($location->city_id !=="356" AND $location->state_id == "21")
      {
         $shiptype="ROI";  //checked pin details of nagpur for rest of india

      }else{
        
         $shiptype="ROI"; //checked pin details of nagpur for rest of india
      }

   $shipingcharges=$this->getShipingCharges($shiptype);
   
      $charges=$shipingcharges->amount;
      
      return $charges;
    }*/

     public function calculateshipingcharges($pin,$totalweight)
    {
      
      
      $location=$this->getLocation($pin);


  
      
      if($location->city_id =="369" AND $location->state_id == "21")
      {
        $shiptype="local"; //checked pin details for nashik
      }
  elseif($location->city_id !=="369" AND $location->city_id !=="356" AND $location->state_id == "21")
      {
         $shiptype="ROM";  //checked pin details for rest of maharashtra
      }
  elseif($location->city_id !=="356" AND $location->state_id == "21")
      {
         $shiptype="ROI";  //checked pin details of nagpur for rest of india

      }else{
        
         $shiptype="ROI"; //checked pin details of nagpur for rest of india
      }

   $shipingcharges=$this->getShipingCharges($shiptype);

   
    if($shipingcharges)
    {
      if($totalweight<=250)
      {
        $charges=$shipingcharges->gm250;
      }
      elseif($totalweight >250 AND $totalweight <= 500)
      {
      
         $charges=$shipingcharges->gm500;

      }elseif($totalweight >500 AND $totalweight <= 1000)
      {
            $charges=$shipingcharges->gm1000;

      }elseif($totalweight > 1000)
      {
         $charges1=$charges2=0;

         $charges=$shipingcharges->gm1000;
         $ratio=$totalweight/1000;
         $weight1 = floor( $ratio );    
         $weight2 = ($ratio - $weight1) * 1000;
         $charges1=$weight1*$charges;


          if($weight2<=250)
      {

       
        $charges2=$shipingcharges->gm250;
        $charges=$charges1+$charges2;
      }
      elseif($weight2 >250 AND $weight2 <= 500)
      {
        

         $charges2=$shipingcharges->gm500;
         $charges=$charges1+$charges2;

      }elseif($weight2 >500 AND $weight2 <= 1000)
      {
       
            $charges2=$shipingcharges->gm1000;
             $charges=$charges1+$charges2;

      }

      }

    }

     return $charges;
     

    }

    public function getLocation($pin)
    {
     return  $result=$this->db->select('*')
               ->from('locations')
               ->where('pincode',$pin)
               ->get()
               ->row();



    }
    public function getShipingCharges($shiptype)
    {
        return  $result=$this->db->select('*')
               ->from('shipingcharges')
               ->where('type',$shiptype)
               ->get()
               ->row();

    }

 public function get_latest($status)
    {
     return $this->db->select('tbl_coupon.amount as amount')
                     ->from('tbl_coupon')
                     ->where('code',$couponid)
                     ->get('')
                     ->row('amount');

    }
   
    
}