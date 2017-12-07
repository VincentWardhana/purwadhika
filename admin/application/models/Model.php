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
	
	public function getadminid($email,$password)
	{
		$this->db->select('*');
		$this->db->from('adminlogin');
		$this->db->where('Username',$email);
		$this->db->where('Password',$password);
		return $this->db->get()->result_array();
	}
	
	public function getpaymentconfirmation($filterbank,$filterprogramid,$search)
	{
		$this->db->select('*');
		$this->db->from('paymentconfirmation pc');
		$this->db->join('payment p', 'pc.paymentid=p.paymentid');
		$this->db->join('invoice iv', 'p.invoiceid=iv.invoiceid');
		$this->db->join('programdetail pd', 'iv.programdetailid=pd.programdetailid');
		$this->db->join('memberdata md', 'pc.memberid=md.memberid');
		$this->db->where('confirmationstatus','0');
		
		if ($filterbank!="")
		{
			$this->db->where('toaccountnumber',$filterbank);
		}
		
		if ($filterprogramid!="")
		{
			$this->db->where('pd.programid=',$filterprogramid);
		}
		
		if ($search!="")
		{
			$this->db->where("md.name like '%$search%'");
		}
		
		$this->db->order_by('confirmationtime','desc');
		return $this->db->get()->result_array();
	}
	
	public function getcountpaymentconfirmation()
	{
		$this->db->select('*');
		$this->db->from('paymentconfirmation');
		$this->db->where('confirmationstatus','0');
		return $this->db->get()->num_rows();
	}
	
	public function getmemberdata($memberid)
	{
		$this->db->select('*');
		$this->db->from('memberdata');
		$this->db->where('memberid',$memberid);
		return $this->db->get()->result_array();
	}
	
	public function getpaymentdata($paymentid)
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('paymentid',$paymentid);
		return $this->db->get()->result_array();
	}
	
	public function getprogramdetail($filtercategoryid,$filterstatus,$search)
	{
		$this->db->select('*');
		$this->db->from('programdetail');
		
		if ($filtercategoryid!="")
		{
			$this->db->where('categoryid',$filtercategoryid);
		}
		
		if ($filterstatus!="")
		{
			$this->db->where('availablestatus',$filterstatus);
		}
		
		if ($search!="")
		{
			$this->db->where("programdetail like '%$search%'");
		}
		
		$this->db->where('deleted','0');
		return $this->db->get()->result_array();
	}
	
	public function getprogramdata($programid)
	{
		$this->db->select('*');
		$this->db->from('program');
		$this->db->where('programid',$programid);
		return $this->db->get()->result_array();
	}
	
	public function getprogram()
	{
		$this->db->select('*');
		$this->db->from('program');
		$this->db->where('deleted','0');
		return $this->db->get()->result_array();
	}
	
	public function getprogramcategorydata($categoryid)
	{
		$this->db->select('*');
		$this->db->from('programcategory');
		$this->db->where('categoryid',$categoryid);
		return $this->db->get()->result_array();
	}
	
	public function getprogramcategory()
	{
		$this->db->select('*');
		$this->db->from('programcategory');
		$this->db->where('deleted','0');
		return $this->db->get()->result_array();
	}
	
	public function getprogrampercategory($categoryid)
	{
		$this->db->select('*');
		$this->db->from('program');
		$this->db->where('categoryid',$categoryid);
		return $this->db->get()->result_array();
	}
	
	public function getprogramdetaildata($programdetailid)
	{
		$this->db->select('*');
		$this->db->from('programdetail');
		$this->db->where('programdetailid',$programdetailid);
		return $this->db->get()->result_array();
	}
	
	public function countpaymentinstallment($programdetailid)
	{
		$this->db->select('*');
		$this->db->from('paymentinstallment');
		$this->db->where('programdetailid',$programdetailid);
		return $this->db->get()->num_rows();
	}
	
	public function getpaymentinstallment($programdetailid)
	{
		$this->db->select('*');
		$this->db->from('paymentinstallment');
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
	
	public function getprogramlocationschedule($programlocationid)
	{
		$this->db->select('*');
		$this->db->from('programschedule');
		$this->db->where('programlocationid',$programlocationid);
		$this->db->where('invalidstatus','0');
		return $this->db->get()->result_array();
	}
	
	public function getinvalidprogramschedule()
	{
		$this->db->select('*');
		$this->db->from('programschedule');
		$this->db->where('invalidstatus','0');
		$this->db->where('NOW() > validuntil');
		return $this->db->get()->result_array();
	}
	
	public function getinvoicepaymentinstallmentnotset($filtercategoryid,$filterprogramid,$search)
	{
		$this->db->select('*');
		$this->db->from('invoice iv');
		$this->db->join('programdetail pd', 'iv.programdetailid=pd.programdetailid');
		$this->db->join('memberdata md', 'iv.memberid=md.memberid');
		$this->db->where('iv.eventstatus','0');
		$this->db->where('paymentinstallmentstatus','0');
		
		if ($filtercategoryid!="")
		{
			$this->db->where('pd.categoryid',$filtercategoryid);
		}
		
		if ($filterprogramid!="")
		{
			$this->db->where('pd.programid',$filterprogramid);
		}
		
		if ($search!="")
		{
			$this->db->where("md.name like '%$search%'");
		}
		
		$this->db->order_by('invoicetime','desc');
		return $this->db->get()->result_array();
	}
	
	public function getcountinvoicepaymentinstallmentnotset()
	{
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->where('eventstatus','0');
		$this->db->where('paymentinstallmentstatus','0');
		$this->db->order_by('invoicetime','desc');
		return $this->db->get()->num_rows();
	}
	
	public function getinvoicedata($invoiceid)
	{
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->where('invoiceid',$invoiceid);
		return $this->db->get()->result_array();
	}
	
	public function getmasterbank()
	{
		$this->db->select('*');
		$this->db->from('masterbank');
		return $this->db->get()->result_array();
	}
	
	public function getoccupationmaster()
	{
		$this->db->select('*');
		$this->db->from('occupationmaster');
		return $this->db->get()->result_array();
	}
}