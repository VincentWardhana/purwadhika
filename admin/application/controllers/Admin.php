<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		if ($_SESSION['adminid']=="")
		{
			redirect("admin/login");
		}
		
		$this->load->view('index.php');
	}
	
	public function login()
	{
		$this->load->view('login.php');
	}
	
	public function adminlogin()
	{
		$adminid="";
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('email', 'email', 'required',
				array(
				'required' => 'Email Required',
				)
			);
			
			$this->form_validation->set_rules('password', 'password', 'required',
				array(
				'required' => 'Password Required',
				)
			);

			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('loginfail','Login Failed !');
				$this->load->view('login');
			}
			else
			{
				$email = $_POST['email'];
				$password = $_POST['password'];
				
				$getadminid = $this->model->getadminid($email,$password);
				foreach($getadminid as $row)
				{
					$adminid = $row['adminid'];
				}
				
				if ($adminid!="")
				{
					$_SESSION['adminid'] = $adminid;
					$this->session->set_userdata('adminid', $adminid);
					redirect("admin");
				}
				else
				{
					$this->session->set_flashdata('adminidfail','The email or password you entered is incorrect !');
					
					$this->load->view('login');
				}
			}
		}
	}
	
	public function logout()
	{
		session_destroy();
		
		redirect("admin/login");
	}
	
	public function do_upload()
	{
		if ($_SESSION['adminid']=="")
		{
			redirect("admin/login");
		}
		
		$config['upload_path']          = './/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 20000;
		$config['max_width']            = 20000;
		$config['max_height']           = 20000;
		
		// rename banner to unique id
		$filename = uniqid();
		$config['file_name'] 			= $filename;

		$this->load->library('upload', $config);
	}
	
	public function uploadmasterprogram()
	{
		if ($_SESSION['adminid']=="")
		{
			redirect("admin/login");
		}

		$title = $_POST['title'];
		$description = $_POST['description'];
		
		$config['upload_path']          = './masterprogram/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 20000;
		$config['max_width']            = 20000;
		$config['max_height']           = 20000;
		
		// rename banner to unique id
		$filename = uniqid();
		$config['file_name'] 			= $filename;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error1 = array('error' => $this->upload->display_errors());

			$this->session->set_flashdata('uploadmasterprogramfail','Master Program Upload Fail !');
			$this->load->view('index', $error1);
		}
		else
		{
			// insert new banner name to database
			$upload_data = $this->upload->data();
			
			$origname = $upload_data['orig_name'];
			
			$this->model->insert('masterprogram',array(
				"filename" => $origname,
				"title" => $title,
				"description" => $description,
			));
			
			$this->session->set_flashdata('uploadmasterprogramsuccess','Master Program Upload Success !');
			redirect("admin/masterprogramlist");
		}
	}
	
	public function masterprogram()
	{
		$this->load->view('master_inputprogram.php');
	}

	public function masterprogramdetail()
	{
		error_reporting( error_reporting() & ~E_NOTICE );
		error_reporting(0);
		
		$data = array (
			'filtercategoryid' => $_GET['category'],
			'filterstatus' => $_GET['status'],
			'search' => $_GET['search'],
		);
		
		$this->load->view('master_inputprogramdetail.php',$data);
	}
	
	public function filtermasterprogramdetail()
	{
		$category = $_POST['filtercategory'];
		$status = $_POST['filterstatus'];
		$search = $_POST['search'];
		
		redirect("admin/masterprogramdetail?category=$category&status=$status&search=$search");
	}
	
	public function masterbank()
	{
		$this->load->view('master_inputbank.php');
	}
	
	public function masteroccupation()
	{
		$this->load->view('master_inputoccupation.php');
	}
	
	public function programheader()
	{
		error_reporting( error_reporting() & ~E_NOTICE );
		error_reporting(0);
		
		$data = array (
			'filtercategoryid' => $_GET['category'],
			'filterprogramid' => $_GET['program'],
			'search' => $_GET['search'],
		);
		
		$this->load->view('marketing_setprogram_header.php',$data);
	}
	
	public function filtermarketingsetprogram()
	{
		$filtercategory = $_POST['filtercategory'];
		$filterprogram = $_POST['filterprogram'];
		$search = $_POST['search'];
		
		redirect("admin/programheader?category=$filtercategory&program=$filterprogram&search=$search");
	}
	
	public function marketingprogramdetail($invoiceid,$programdetailid)
	{
		$data = array (
			'invoiceid' => $invoiceid,
			'programdetailid' => $programdetailid,
		);
		
		$this->load->view('marketing_setprogram_detail.php',$data);
	}
	
	public function adminpaymentconfirmation()
	{
		error_reporting( error_reporting() & ~E_NOTICE );
		error_reporting(0);
		
		$data = array (
			'filterbank' => $_GET['bank'],
			'filterprogramid' => $_GET['program'],
			'search' => $_GET['search'],
		);
		
		$this->load->view('finance_paymentconfirmation.php',$data);
	}
	
	public function filterpaymentconfirmation()
	{
		$filterbank = $_POST['filterbank'];
		$filterprogramid = $_POST['filterprogramid'];
		$search = $_POST['search'];
		
		redirect("admin/adminpaymentconfirmation?bank=$filterbank&program=$filterprogramid&search=$search");
	}
	
	public function confirmpayment()
	{
		$confirmstatus = $_POST['confirmstatus'];
		$paymentconfirmationid = $_POST['paymentconfirmationid'];
		$paymentid = $_POST['paymentid'];

		if ($confirmstatus=="1")
		{
			$confirmationstatus = "1";
			$paymentstatus = "2";
		}
		else
		{
			$confirmationstatus = "2";
			$paymentstatus = "3";
		}
		
		$this->db->set('adminconfirmedtime', 'NOW() + interval 1 day', FALSE);
		$this->model->update('paymentconfirmation',array(
			'confirmationstatus' => $confirmationstatus,
			'adminid' => $_SESSION['adminid'],
		),array(
			"paymentconfirmationid" => $paymentconfirmationid,
		));
		
		$this->model->update('payment',array(
			'paymentstatus' => $paymentstatus,
		),array(
			"paymentid" => $paymentid,
		));
		
		
		$getpaymentdata = $this->model->getpaymentdata($paymentid);
		foreach($getpaymentdata as $row)
		{
			$memberid = $row['memberid'];
			$paymentpurpose = $row['paymentpurpose'];
		}
		
		if ($paymentpurpose=="Registration Fee")
		{
			$this->model->update('memberdata',array(
				'studentstatus' => '1',
			),array(
				"memberid" => $memberid,
			));
		}
		
		redirect("admin/adminpaymentconfirmation");
	}
	
	public function setprogramdetail($programdetailid)
	{
		$data = array (
			'programdetailid' => $programdetailid,
		);
		
		$this->load->view('master_setprogramdetail.php',$data);
	}
	
	public function updatemasterprogram()
	{
		error_reporting( error_reporting() & ~E_NOTICE );
		error_reporting(0);
		
		$counter = $_POST['counter'];
		for ($i=0; $i<$counter; $i++)
		{
			$edittype = $_POST["edittype$i"];
			$deletebutton = $_POST["deletebutton$i"];
			
			if ($deletebutton!="1")
			{
				if ($edittype=="editcategory")
				{
					$editcategory = $_POST["editcategory$i"];
					
					$defaultcategoryid = $_POST["defaultcategoryid$i"];
					$getprogramcategorydata = $this->model->getprogramcategorydata($defaultcategoryid);
					foreach($getprogramcategorydata as $row)
					{
						$dbcategory = $row['category'];
					}
					
					if ($editcategory != $dbcategory)
					{
						$updatecategory = $editcategory;
						
						$this->model->update('programcategory',array(
							'category' => $updatecategory,
						),array(
							"categoryid" => $defaultcategoryid,
						));
					}
				}
				else if ($edittype=="editprogram")
				{
					$editprogram = $_POST["editprogram$i"];
					
					$defaultprogramid = $_POST["defaultprogramid$i"];
					$getprogramdata = $this->model->getprogramdata($defaultprogramid);
					foreach($getprogramdata as $row)
					{
						$dbprogram = $row['program'];
					}
					
					if ($editprogram != $dbprogram)
					{
						$this->model->update('program',array(
							'program' => $editprogram,
						),array(
							"programid" => $defaultprogramid,
						));
					}
				}
				else if ($edittype=="editdetail")
				{
					$defaultprogramdetailid = $_POST["defaultprogramdetailid$i"];
					$choosecategoryedit = $_POST["choosecategoryedit$i"];
					$chooseprogramedit = $_POST["chooseprogramedit$i"];
					$editprogramdetail = $_POST["editprogramdetail$i"];
					
					$this->model->update('programdetail',array(
						'categoryid' => $choosecategoryedit,
						'programid' => $chooseprogramedit,
						'programdetail' => $editprogramdetail,
					),array(
						"programdetailid" => $defaultprogramdetailid,
					));
				}
			}
			else
			{
				if ($edittype=="editcategory")
				{
					$defaultcategoryid = $_POST["defaultcategoryid$i"];
					
					$this->model->update('programcategory',array(
						'deleted' => '1',
					),array(
						"categoryid" => $defaultcategoryid
					));
					
					$this->model->update('program',array(
						'deleted' => '1',
					),array(
						"categoryid" => $defaultcategoryid
					));
					
					$this->model->update('programdetail',array(
						'deleted' => '1',
					),array(
						"categoryid" => $defaultcategoryid
					));
				}
				else if ($edittype=="editprogram")
				{
					$defaultprogramid = $_POST["defaultprogramid$i"];
					
					$this->model->update('program',array(
						'deleted' => '1',
					),array(
						"programid" => $defaultprogramid
					));
					
					$this->model->update('programdetail',array(
						'deleted' => '1',
					),array(
						"programid" => $defaultprogramid
					));
				}
				else if ($edittype=="editdetail")
				{
					$defaultprogramdetailid = $_POST["defaultprogramdetailid$i"];

					$this->model->update('programdetail',array(
						'deleted' => '1',
					),array(
						"programdetailid" => $defaultprogramdetailid
					));
				}
			}
		}
		
		$addnew = $_POST['addnew'];
		if ($addnew != "")
		{
			if ($addnew=="newcategory")
			{
				$newcategory = $_POST['newcategory'];
				
				$this->model->insert('programcategory',array(
					"category" => $newcategory,
				));
			}
			else if ($addnew=="newprogram")
			{
				$choosecategory = $_POST['choosecategory'];
				$newprogram = $_POST['newprogram'];
				
				$this->model->insert('program',array(
					"categoryid" => $choosecategory,
					"program" => $newprogram,
				));
			}
			else if ($addnew=="newdetail")
			{
				$choosecategory = $_POST['choosecategory'];
				$chooseprogram = $_POST['chooseprogram'];
				$newprogramdetail = $_POST['newprogramdetail'];
				
				$this->model->insert('programdetail',array(
					"categoryid" => $choosecategory,
					"programid" => $chooseprogram,
					"programdetail" => $newprogramdetail,
				));
			}
		}
		
		$deletetype = $_POST['deletetype'];
		
		if ($deletetype!="")
		{
			$choosedeleteitem = $_POST['choosedeleteitem'];
			
			if ($deletetype=="deletecategory")
			{
				$this->model->update('programcategory',array(
					'deleted' => '1',
				),array(
					"categoryid" => $choosedeleteitem
				));
				
				$this->model->update('program',array(
					'deleted' => '1',
				),array(
					"categoryid" => $choosedeleteitem
				));
				
				$this->model->update('programdetail',array(
					'deleted' => '1',
				),array(
					"categoryid" => $choosedeleteitem
				));
			}
			else if ($deletetype=="deleteprogram")
			{
				$this->model->update('program',array(
					'deleted' => '1',
				),array(
					"programid" => $choosedeleteitem
				));
				
				$this->model->update('programdetail',array(
					'deleted' => '1',
				),array(
					"programid" => $choosedeleteitem
				));
			}
		}
		
		redirect("admin/masterprogram");
	}
	
	public function updateprogramdetail($programdetailid)
	{
		$title = $_POST['title'];
		$description1 = $_POST['description1'];
		$description2 = $_POST['description2'];
		$availablestatus = $_POST['availablestatus'];
		$price = $_POST['price'];
		$eventstatus = $_POST['eventstatus'];
		$installmentstatus = $_POST['installmentstatus'];
		$downpayment = $_POST['downpayment'];
		$paymentinstallmentcounter = $_POST['paymentinstallmentcounter'];
		
		$this->model->update('programdetail',array(
			'title' => $title,
			'description1' => $description1,
			'description2' => $description2,
			'availablestatus' => $availablestatus,
			'price' => $price,
			'eventstatus' => $eventstatus,
			'installmentstatus' => $installmentstatus,
			'downpayment' => $downpayment,
			'paymentinstallment' => $paymentinstallmentcounter,
		),array(
			"programdetailid" => $programdetailid,
		));
		
		
		
		$this->model->delete('programlocation',array(
			"programdetailid" => $programdetailid,
		));
		
		$this->model->delete('programschedule',array(
			"programdetailid" => $programdetailid,
		));
		
		$locationcounter = $_POST['locationcounter'];
		for ($i=1; $i<=$locationcounter; $i++)
		{
			$location = $_POST["location$i"];
			
			if ($location != "")
			{
				$this->model->insert('programlocation',array(
					"programdetailid" => $programdetailid,
					"location" => $location,
				));
				$programlocationid = $this->db->insert_id();
			}
			
			$schedulecounter = $_POST["schedulecounter$i"];
			for ($j=1; $j<=$schedulecounter; $j++)
			{
				$schedule = $_POST["schedule$i,$j"];
				$validuntil = $_POST["validuntil$i,$j"];
				
				if ($schedule != "" && $validuntil != "")
				{
					$this->model->insert('programschedule',array(
						"programlocationid" => $programlocationid,
						"programdetailid" => $programdetailid,
						"schedule" => $schedule,
						"validuntil" => $validuntil,
					));
				}
			}
		}
		
		
		$this->model->delete('paymentinstallment',array(
			"programdetailid" => $programdetailid,
		));
		
		$paymentinstallmentcounter = $_POST['paymentinstallmentcounter'];
		for ($i=1; $i<=$paymentinstallmentcounter; $i++)
		{
			$paymentinstallmentprice = $_POST["paymentinstallmentprice$i"];
			
			$this->model->insert('paymentinstallment',array(
				"programdetailid" => $programdetailid,
				"paymentinstallmentprice" => $paymentinstallmentprice,
			));
		}
		
		if (!empty($_FILES['userfile']['name']))
		{
			$config['upload_path']          = './programdetail/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 20000;
			$config['max_width']            = 20000;
			$config['max_height']           = 20000;
			
			// rename banner to unique id
			$filename = uniqid();
			$config['file_name'] 			= $filename;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				$error1 = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('uploadbannerfail','Program Detail Upload Fail !');
			}
			else
			{
				//delete previous service
				$getprogramdetaildata = $this->model->getprogramdetaildata($programdetailid);
				foreach($getprogramdetaildata as $row)
				{
					$filedata = array (
					'filename' => $row['filename'],
					);
				}
				
				unlink('./programdetail/'.$filedata['filename']);
				
				// insert new banner name to database
				$upload_data = $this->upload->data();
				
				$origname = $upload_data['orig_name'];
				
				$this->load->library('image_lib');
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = "./programdetail/$origname";
				$config2['maintain_ratio'] = TRUE;
				$config2['create_thumb'] = FALSE;
				$config2['overwrite'] = TRUE;
				$config2['width']         = 1920;
				$config2['height']       = 1280;
				//$config2['quality'] = 50;
				
				$this->load->library('image_lib', $config2);

				$this->image_lib->clear();
				$this->image_lib->initialize($config2);
				$this->image_lib->resize();
				
				$this->model->update('programdetail',array(
					'filename' => $origname,
				),array(
					"programdetailid" => $programdetailid,
				));
			}
		}
		
		redirect("admin/setprogramdetail/$programdetailid");
	}
	
	public function marketingsetpayment($invoiceid,$programdetailid)
	{
		$downpayment = $_POST['downpayment'];
		$registrationfee = $_POST['registrationfee'];
		$discount = $_POST['discount'];
		$paymentinstallmentcounter = $_POST['paymentinstallmentcounter'];
		
		$getinvoicedata = $this->model->getinvoicedata($invoiceid);
		foreach($getinvoicedata as $row)
		{
			$memberid = $row['memberid'];
		}
		
		if ($registrationfee!="0" && $registrationfee!="")
		{
			$this->model->insert('payment',array(
				"invoiceid" => $invoiceid,
				"memberid" => $memberid,
				"paymentpurpose" => 'Registration Fee',
				"price" => $registrationfee,
				"paymentstatus" => '0',
			));
		}
		
		if ($downpayment!="0")
		{
			$this->model->insert('payment',array(
				"invoiceid" => $invoiceid,
				"memberid" => $memberid,
				"paymentpurpose" => 'Down Payment',
				"price" => $downpayment,
				"paymentstatus" => '0',
			));
		}
		
		
		for ($i=1; $i<=$paymentinstallmentcounter; $i++)
		{
			$paymentinstallmentprice = $_POST["paymentinstallmentprice$i"];
			
			$this->model->insert('payment',array(
				"invoiceid" => $invoiceid,
				"memberid" => $memberid,
				"paymentpurpose" => 'Payment Installment',
				"price" => $paymentinstallmentprice,
				"paymentstatus" => '0',
			));
		}
		
		$this->model->update('invoice',array(
			'discount' => $discount,
			'paymentinstallmentstatus' => '1',
		),array(
			"invoiceid" => $invoiceid
		));
		
		redirect("admin/programheader");
	}
	
	public function editmasterbank()
	{
		error_reporting( error_reporting() & ~E_NOTICE );
		error_reporting(0);
		
		$bankcounter = $_POST['bankcounter'];
		
		for ($i=0; $i<$bankcounter; $i++)
		{
			$masterbankid = $_POST["masterbankid$i"];
			$editbankname = $_POST["editbankname$i"];
			$editaccnumber = $_POST["editaccnumber$i"];
			$editaccname = $_POST["editaccname$i"];
			$editbranch = $_POST["editbranch$i"];
			
			$this->model->update('masterbank',array(
				"norekening" => $editaccnumber,
				"atasnama" => $editaccname,
				"namabank" => $editbankname,
				"cabang" => $editbranch,
			),array(
				"masterbankid" => $masterbankid
			));
		}
		
		$addbankname = $_POST['addbankname'];
		$addaccnumber = $_POST['addaccnumber'];
		$addaccname = $_POST['addaccname'];
		$addbranch = $_POST['addbranch'];
		
		if ($addbankname!="" && $addaccnumber!="" && $addaccname!="" && $addbranch!="")
		{
			$this->model->insert('masterbank',array(
				"norekening" => $addaccnumber,
				"atasnama" => $addaccname,
				"namabank" => $addbankname,
				"cabang" => $addbranch,
			));
		}
		
		redirect("admin/masterbank");
	}
	
	public function deletemasterbank($masterbankid)
	{
		$this->model->delete('masterbank',array(
			"masterbankid" => $masterbankid,
		));
		
		redirect("admin/masterbank");
	}
	
	public function updateoccupation()
	{
		error_reporting( error_reporting() & ~E_NOTICE );
		error_reporting(0);
		
		$occupationcounter = $_POST['occupationcounter'];
		
		for ($i=0; $i<$occupationcounter; $i++)
		{
			$occupationid = $_POST["occupationid$i"];
			$editoccupation = $_POST["editoccupation$i"];
			
			$this->model->update('occupationmaster',array(
				"occupation" => $editoccupation,
			),array(
				"occupationid" => $occupationid
			));
		}
		
		$addoccupation = $_POST['addoccupation'];
		
		if ($addoccupation!="")
		{
			$this->model->insert('occupationmaster',array(
				"occupation" => $addoccupation,
			));
		}
		
		redirect("admin/masteroccupation");
	}
	
	public function deleteoccupationmaster($occupationid)
	{
		$this->model->delete('occupationmaster',array(
			"occupationid" => $occupationid,
		));
		
		redirect("admin/masteroccupation");
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Scheduler
	
	public function updateinvalidschedule()
	{
		$getinvalidprogramschedule = $this->model->getinvalidprogramschedule();
		foreach($getinvalidprogramschedule as $row)
		{
			$programscheduleid = $row['programscheduleid'];
			
			$this->model->update('programschedule',array(
				'invalidstatus' => '1',
			),array(
				"programscheduleid" => $programscheduleid,
			));
		}
	}
}