<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$this->load->view('signin.php');
	}
	
	public function signin()
	{
		$this->load->view('signin.php');
	}
	
	public function signinproc()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = md5($password);
		
		$getmemberid = $this->model->getmemberid($email,$password);
		foreach($getmemberid as $row)
		{
			$memberid = $row['memberid'];
		}
		
		if ($memberid!="")
		{
			$_SESSION['memberid'] = $memberid;
			$this->session->set_userdata('memberid', $memberid);
			
			redirect("program");
		}
		else
		{
			$this->session->set_flashdata('memberidfail','The email or password you entered is incorrect !');
			
			redirect("signin");
		}
	}
	
	public function logout()
	{
		session_destroy();
		
		redirect(base_url());
	}
	
	public function signup()
	{
		$this->load->view('signup.php');
	}
	
	public function signupproc()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = md5($password);
		$birthdate = $_POST['birthdate'];
		$birthmonth = $_POST['birthmonth'];
		$birthyear = $_POST['birthyear'];
		$occupation = $_POST['occupation'];
		$institution = $_POST['institution'];
		$lasteducation = $_POST['lasteducation'];
		$educationinstitution = $_POST['educationinstitution'];
		$phonenumber = $_POST['phonenumber'];
		
		$this->db->set('registerdate', 'NOW()', FALSE);
		$this->db->insert('memberlogin', array(
			'email' => $email,
			'password' => $password,
		));
		
		$this->db->insert('memberdata', array(
			'name' => $name,
			'email' => $email,
			'birthday' => "$birthyear-$birthmonth-$birthdate",
			'occupation' => $occupation,
			'institution' => $institution,
			'lasteducation' => $lasteducation,
			'educationinstitution' => $educationinstitution,
			'phonenumber' => $phonenumber,
		));
		
		redirect("signin");
	}
	
	public function paymentconfirmation()
	{
		if ($_SESSION['memberid']=="")
		{
			redirect("signin");
		}
		
		$this->load->view('paymentconfirmation_header.php');
	}
	
	public function paymentconfirmationdetail($paymentid)
	{
		if ($_SESSION['memberid']=="")
		{
			redirect("signin");
		}
		
		$data = array (
			'paymentid' => $paymentid,
		);
		
		$this->load->view('paymentconfirmation_detail.php',$data);
	}
	
	public function profile()
	{
		if ($_SESSION['memberid']=="")
		{
			redirect("signin");
		}
		
		$this->load->view('profile.php');
	}
	
	public function updateprofile()
	{
		if ($_SESSION['memberid']=="")
		{
			redirect("signin");
		}
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$birthdate = $_POST['birthdate'];
		$birthmonth = $_POST['birthmonth'];
		$birthyear = $_POST['birthyear'];
		$occupation = $_POST['occupation'];
		$institution = $_POST['institution'];
		$lasteducation = $_POST['lasteducation'];
		$educationinstitution = $_POST['educationinstitution'];
		$phonenumber = $_POST['phonenumber'];
		
		$this->model->update('memberdata',array(
			'name' => $name,
			'email' => $email,
			'birthday' => "$birthyear-$birthmonth-$birthdate",
			'occupation' => $occupation,
			'institution' => $institution,
			'lasteducation' => $lasteducation,
			'educationinstitution' => $educationinstitution,
			'phonenumber' => $phonenumber,
		),array(
			"memberid" => $_SESSION['memberid'],
		));
		
		$this->session->set_flashdata('updateprofilesuccess','Your Profile has been updated successfully !');
		
		redirect("profile");
	}
	
	public function program()
	{
		error_reporting( error_reporting() & ~E_NOTICE );
		error_reporting(0);
		
		$data = array (
			'filtercategoryid' => $_GET['fc'],
			'programname' => $_GET['fpn'],
		);
		
		$this->load->view('program.php',$data);
	}
	
	public function filterprogram()
	{
		$filtercategoryid = $_POST['categoryid'];
		$programname = $_POST['programname'];
		
		redirect("program?fc=$filtercategoryid&fpn=$programname");
	}
	
	public function programdetail($programdetailid)
	{
		if ($_SESSION['memberid']=="")
		{
			redirect("signin");
		}
		
		$data = array (
			'programdetailid' => $programdetailid,
		);
		
		$this->load->view('program_detail.php',$data);
	}
	
	public function createinvoice($programdetailid)
	{
		if ($_SESSION['memberid']=="")
		{
			redirect("signin");
		}
		
		date_default_timezone_set('Asia/Jakarta');
		
		$programdetaillocationid = $_POST['programdetaillocationid'];
		$schedule = $_POST['schedule'];
		$marketingsource = $_POST['marketingsource'];
		$registerreason = $_POST['registerreason'];
		
		$getprogramdetaillocationdata = $this->model->getprogramdetaillocationdata($programdetaillocationid);
		foreach($getprogramdetaillocationdata as $row)
		{
			$location = $row['location'];
		}
		
		$getprogramdetaildata = $this->model->getprogramdetaildata($programdetailid);
		foreach($getprogramdetaildata as $row)
		{
			$programdetail = $row['programdetail'];
			$title = $row['title'];
			$price = $row['price'];
			$eventstatus = $row['eventstatus'];
		}
		
		$getcountinvoice = $this->model->getcountinvoice();
		$invoicecounter = $getcountinvoice + 1;
		
		$year = date('Y');
		$month = date('m');
		$day = date('d');
		$hour = date('H');
		$minute = date('i');
		$second = date('s');
				
		$invoiceid = "IV$year$month$day$hour$minute$second$invoicecounter";
		
		$this->db->set('invoicetime', 'NOW()', FALSE);
		
		$this->db->insert('invoice', array(
			'invoiceid' => $invoiceid,
			'memberid' => $_SESSION['memberid'],
			'programdetailid' => $programdetailid,
			'programdetail' => $programdetail,
			'title' => $title,
			'price' => $price,
			'location' => $location,
			'schedule' => $schedule,
			'eventstatus' => $eventstatus,
			'marketingsource' => $marketingsource,
			'registerreason' => $registerreason,
		));
		
		if ($eventstatus=="1")
		{
			$this->db->set('paymentduedate', 'NOW() + interval 1 day', FALSE);
			$this->db->insert('payment', array(
				'invoiceid' => $invoiceid,
				'memberid' => $_SESSION['memberid'],
				'paymentpurpose' => 'Event',
				'price' => $price,
				'paymentstatus' => '0',
			));
		}
		
		redirect("invoice/$invoiceid");
	}
	
	public function invoice($invoiceid)
	{
		if ($_SESSION['memberid']=="")
		{
			redirect("signin");
		}
		
		$data = array (
			'invoiceid' => $invoiceid,
		);
		
		$this->load->view('invoice.php',$data);
	}
	
	public function verification()
	{
		$this->load->view('verification.php');
	}
	
	public function confirmpayment($paymentid)
	{
		error_reporting( error_reporting() & ~E_NOTICE );
		error_reporting(0);
		
		if ($_SESSION['memberid']=="")
		{
			redirect("signin");
		}
		
		date_default_timezone_set('Asia/Jakarta');
		
		$paymentmethod = $_POST['paymentmethod'];
		
		if ($paymentmethod=="Transfer")
		{
			$masterbankid = $_POST['masterbankid'];
			
			$getmasterbank = $this->model->getmasterbank($masterbankid);
			foreach($getmasterbank as $row)
			{
				$norekening = $row['norekening'];
				$atasnama = $row['atasnama'];
				$namabank = $row['namabank'];
			}
			
			$frombankname = $_POST['frombanknametransfer'];
			$fromaccountname = $_POST['fromaccountname'];
			$fromaccountnumber = $_POST['fromaccountnumber'];
			$transferammount = $_POST['transferammount'];
		}
		else if ($paymentmethod=="Debit")
		{
			$frombankname = $_POST['frombanknamedebit'];
			$remarks = $_POST['remarks'];
		}
		else if ($paymentmethod=="Credit")
		{
			$frombankname = $_POST['frombanknamecredit'];
			$remarks = $_POST['remarks'];
		}
		else if ($paymentmethod=="Cash")
		{
			$remarks = $_POST['remarks'];
		}
		
		if (!empty($_FILES['userfile']['name'])) 
		{
			date_default_timezone_set('Asia/Jakarta');
			
			// upload photo
			$config['upload_path']          = './admin/paymentconfirmation/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 20000;
			$config['max_width']            = 20000;
			$config['max_height']           = 20000;
			
			// rename picture to unique id
			$filename = uniqid();
			$config['file_name'] 			= $filename;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				$error2 = array('error' => $this->upload->display_errors());

				var_dump($error2);
				$this->session->set_flashdata('uploadpictfail','Upload Picture Failed !');
				redirect("paymentconfirmationdetail/$paymentid");
			}
			else
			{
				$upload_data = $this->upload->data();
				
				$origname = $upload_data['orig_name'];
				
				$this->load->library('image_lib');
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = "./admin/paymentconfirmation/$origname";
				$config2['maintain_ratio'] = TRUE;
                $config2['create_thumb'] = FALSE;
                $config2['overwrite'] = TRUE;
				$config2['width']         = 2000;
				$config2['height']       = 2000;
				
				$this->load->library('image_lib', $config2);

				$this->image_lib->clear();
                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
			}
		}
		
		$this->db->set('confirmationtime', 'NOW()', FALSE);
		$this->model->insert('paymentconfirmation',array(
			"memberid" => $_SESSION['memberid'],
			"paymentid" => $paymentid,
			"paymentmethod" => $paymentmethod,
			"tobankname" => $namabank,
			"toaccountname" => $atasnama,
			"toaccountnumber" => $norekening,
			"frombankname" => $frombankname,
			"fromaccountname" => $fromaccountname,
			"fromaccountnumber" => $fromaccountnumber,
			"transferammount" => $transferammount,
			"filename" => $origname,
			"remarks" => $remarks,
			"confirmationstatus" => '0',
		));
		
		$this->model->update('payment',array(
			'paymentstatus' => '1',
		),array(
			"paymentid" => $paymentid,
		));
		
		redirect("paymentconfirmation");
	}
}
