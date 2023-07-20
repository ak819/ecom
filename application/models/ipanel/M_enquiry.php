<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_enquiry extends CI_Model
{
    
  public function Stockrequest()
    {
    	$data=array(
    					"RequiredQuntity"=>$this->input->get('RequiredQuntity'),
    					"seller_id"=>$this->input->get('seller_id'),
    					"u_id"=>$this->session->userdata('u_id'),
    					"p_id"=>$this->input->get('p_id'),
    					"unitrate"=>$this->input->get('unitrate'),
    					'type'=>'stockonly',
    			);
    	return $this->db->insert('tbl_enquiry',$data);
    }

    public function sendenq()
    {
    	$data=array(
    					"RequiredQuntity"=>$this->input->get('RequiredQuntity'),
    					"seller_id"=>$this->input->get('seller_id'),
    					"u_id"=>$this->session->userdata('u_id'),
    					"p_id"=>$this->input->get('p_id'),

    					"unitrate"=>$this->input->get('unitrate'),
    					'type'=>'enquiry',
    			);
    	return $this->db->insert('tbl_enquiry',$data);
    }

 	 public function makepayment()
    {
    	$data=array(
    					"seller_id"=>$this->input->get('seller_id'),
    					"u_id"=>$this->session->userdata('u_id'),
    					"p_id"=>$this->input->get('p_id'),

    					"Amount"=>$this->input->get('Amount'),
    					"status"=> "success",//$this->input->get('status'),
    			);
    	return $this->db->insert('tbl_payments',$data);
    }


     public function Enquiryrecived($u_id,$type)
    {
    	return $this->db->select('tbl_enquiry.*,p_name,p_stock,p_image')
    					->from('tbl_enquiry')
                        ->join('tbl_products','tbl_products.id=tbl_enquiry.p_id','inner')
    					->where('type',$type)
    					->where('seller_id',$u_id)
    					->get('')
    					->result();
    }
     public function Enquirysent($u_id,$type)
    {
    	return $this->db->select('tbl_enquiry.*,p_name,p_stock,p_image')
    					->from('tbl_enquiry')->join('tbl_products','tbl_products.id=tbl_enquiry.p_id','inner')
    					->where('type',$type)
    					->where('tbl_enquiry.u_id',$u_id)
    					->get('')
    					->result();
    }
    
    function approvestock($status,$id)
    {
        $data=array('approvestock'=>$status,'status'=>'viewed');
        return $this->db->where('id',$id)->update('tbl_enquiry',$data);
    }

    function approverate($status,$id)
    {
        $data=array('approverate'=>$status,'status'=>'viewed');
        return $this->db->where('id',$id)->update('tbl_enquiry',$data);
    }
    public function insertorder($orderdetails,$products)
    {   

        $this->db->insert('tbl_orderdetails',$orderdetails);
        //echo "<pre>";
        $orderid=$this->db->insert_id();
        foreach ($products as $product) {
              
                $product['name'];
                $product['order_id']=$orderid;
            // array_push(array, var)
            //print_r($product);
            $this->db->insert('tbl_orderproducts',$product);
        }
        // print_r($products);
        // exit;
        return $orderid; 
    }

    public function insertpayment()
    {
        $Tran_status=$this->input->post('Tran_status');

        $Tran_status= ($Tran_status=="P") ? "cancled":$Tran_status;
        $Tran_status= ($Tran_status=="S") ? "success":$Tran_status;
        $Tran_status= ($Tran_status=="F") ? "failed":$Tran_status;
        
        $data=array(
                    "tran_id"=>$this->input->post('tran_id'),
                    "amount"=>$this->input->post('amount')/100,
                    "Tran_status"=>$Tran_status,
                    "hash_value"=>$this->input->post('hash_value'),
                    "order_id"=>$this->input->post('reserve1'),
                    "user_id"=>$this->input->post('reserve2'),
                    "type"=>$this->input->post('reserve3'),
                );

        $this->db->insert('tbl_fedpay',$data);
        return $this->db->insert_id();
    }

    public function getpayments($type,$user_id)
    {
       return $this->db->where('type',$type)
                        ->where('user_id',$user_id)
                        ->get('tbl_fedpay')
                        ->result();
    }
    public function getAllpayments()
    {
       return $this->db->select('tbl_fedpay.*,tbl_user.*')
                       ->from('tbl_fedpay')
                       ->join('tbl_user','tbl_user.id=tbl_fedpay.user_id','inner')
                       ->get('')
                       ->result();
    }
    public function getorderdetails($order_id)
    {
        return $this->db->where('id',$order_id)->get('tbl_orderdetails')->row();
    }
     public function getProductdetails($order_id)
    {
        return $this->db->where('order_id',$order_id)->get('tbl_orderproducts')->result();
    }

    public function getPaymentdetails($order_id)
    {
        return $this->db->where('order_id',$order_id)->order_by('id','asc')->get('tbl_fedpay')->row();
    }

    public function activateproduct($paymentid,$order_id)
    {
        $products=$this->db->select('id')->where('order_id',$order_id)->get('tbl_orderproducts')->result();
        foreach ($products as $product) {
            $data=array(
                            'p_status'=>"active",
                        );

            $this->db->where('id',$product->id)->update('tbl_products',$data);
        }
        return true;
    }

    public function is_paidenquiry($u_id,$id)//enquiry id;
    {
            return $this->db->select('tbl_orderproducts.*,tbl_fedpay.*')
                            ->from('tbl_orderproducts')
                            ->join('tbl_orderdetails','tbl_orderproducts.order_id=tbl_orderdetails.id','inner')
                            ->join('tbl_fedpay','tbl_fedpay.order_id=tbl_orderdetails.id','inner')
                            ->where('tbl_fedpay.Tran_status',"success")
                            ->where('tbl_orderproducts.summary',$id)
                            ->where('tbl_orderdetails.u_id',$u_id)
                            ->get()
                            ->result();

    }

    public function getenquserdetails($u_id)
    {
        return $this->db->where('id',$u_id)->get('tbl_user')->row();
    }

    public function getpurchaseproduct($u_id)
    {
       
           return $this->db->select('tbl_orderproducts.*,tbl_fedpay.*,tbl_products.*')
                            ->from('tbl_orderproducts')
                            ->join('tbl_orderdetails','tbl_orderproducts.order_id=tbl_orderdetails.id','inner')
                            ->join('tbl_products','tbl_orderproducts.id=tbl_products.id','inner')
                            ->join('tbl_fedpay','tbl_fedpay.order_id=tbl_orderdetails.id','inner')
                            ->where('tbl_fedpay.Tran_status',"success")
                            ->where('tbl_fedpay.type',"productdetail")
                            ->where('tbl_orderdetails.u_id',$u_id)
                            ->where('tbl_products.u_id !=',$u_id)
                            ->get()
                            ->result();

    }
}