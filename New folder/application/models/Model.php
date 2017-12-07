<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	
	public function insert($tablename,$data)
	{
		$this->db->insert($tablename,$data);
	}
	
	public function update($tablename,$data,$where)
	{
		$this->db->update($tablename,$data,$where);
	}
	
	public function delete($tablename,$where)
	{
		$this->db->delete($tablename,$where);
	}
	
	public function getmemberid($email,$password)
	{
		$this->db->select('*');
		$this->db->from('memberlogin');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get()->result_array();
	}
	
	public function getmemberdata($memberid)
	{
		$this->db->select('*');
		$this->db->from('memberdata');
		$this->db->where('memberid',$memberid);
		return $this->db->get()->result_array();
	}
	
	public function getprogramcategory()
	{
		$this->db->select('*');
		$this->db->from('programcategory');
		$this->db->where('deleted','0');
		return $this->db->get()->result_array();
	}
	
	public function getprogramdetail($categoryid='',$programname='')
	{
		$this->db->select('*');
		$this->db->from('programdetail');
		if ($categoryid!="")
		{
			$this->db->where('categoryid',$categoryid);
		}
		
		if ($programname!="")
		{
			$this->db->like('title',$programname,'both');
		}
		$this->db->where('availablestatus','1');
		$this->db->where('deleted','0');
		return $this->db->get()->result_array();
	}
	
	public function getprogramdetaildata($programdetailid)
	{
		$this->db->select('*');
		$this->db->from('programdetail');
		$this->db->where('programdetailid',$programdetailid);
		return $this->db->get()->result_array();
	}
	
	public function getprogramdetaillocation($programdetailid)
	{
		$this->db->select('*');
		$this->db->from('programlocation');
		$this->db->where('programdetailid',$programdetailid);
		return $this->db->get()->result_array();
	}
	
	public function getprogramdetaillocationdata($programlocationid)
	{
		$this->db->select('*');
		$this->db->from('programlocation');
		$this->db->where('programlocationid',$programlocationid);
		return $this->db->get()->result_array();
	}
	
	public function getprogramschedule()
	{
		$this->db->select('*');
		$this->db->from('programschedule');
		$this->db->where('invalidstatus','0');
		return $this->db->get()->result_array();
	}
	
	public function getcountinvoice()
	{
		$this->db->select('*');
		$this->db->from('invoice');
		return $this->db->get()->num_rows();
	}
	
	public function getinvoicedata($invoiceid)
	{
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->where('invoiceid',$invoiceid);
		return $this->db->get()->result_array();
	}
	
	public function getmemberinvoice($memberid)
	{
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->where('memberid',$memberid);
		return $this->db->get()->result_array();
	}
	
	public function getpaymentperinvoice($invoiceid)
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('invoiceid',$invoiceid);
		return $this->db->get()->result_array();
	}
	
	public function getregistrationfee($memberid)
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('memberid',$memberid);
		$this->db->where('paymentpurpose','Registration Fee');
		return $this->db->get()->result_array();
	}
	
	public function getpaymentdata($paymentid)
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('paymentid',$paymentid);
		return $this->db->get()->result_array();
	}
	
	public function getmasterbank($masterbankid="")
	{
		$this->db->select('*');
		$this->db->from('masterbank');
		if ($masterbankid!="")
		{
			$this->db->where('masterbankid',$masterbankid);
		}
		return $this->db->get()->result_array();
	}
	
	public function getbankmaster()
	{
		$this->db->select('*');
		$this->db->from('bankmaster');
		$this->db->order_by('Nama','asc');
		return $this->db->get()->result_array();
	}
	
	public function getoccupationmaster()
	{
		$this->db->select('*');
		$this->db->from('occupationmaster');
		return $this->db->get()->result_array();
	}
}