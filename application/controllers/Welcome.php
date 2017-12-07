<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/* $data = array (
		'nama' => 'Vincent',
		'alamat' => 'Taman Kebon Jeruk'
		);
		
		$this->load->view('welcome_message',$data); */
		//$this->load->view('index.php');
		
		
		/* $data = $this->model->GetFoodishData();
		foreach($data as $row)
		{
			echo "FoodishID : ".$row['FoodishID']."<br />";
			echo "Email : ".$row['Email']."<br />";
			echo "Password : ".$row['Password']."<br />";
		} */
		
		
		//$data = $this->model->GetFoodishData();
		//$this->load->view('index.php',array('data' => $data));
	}
	
	public function informasifoodishlanjut()
	{
		$this->load->view('informasifoodish-lanjut.php');
	}
	
	public function tes($param1,$param2)
	{
		echo $param1.'<br/>';
		echo $param2;
	}
	
	public function insert()
	{
		$this->model->InsertDataFoodishLogin('FoodishLogin',array(
		"FoodishID" => "FD123123",
		"Email" => "asdasd@yahoo.com"
		));
	}
	
	public function update()
	{
		$this->model->UpdateDataFoodishLogin('FoodishLogin',array(
		"Email" => "dsadsa@yahoo.com"
		),array(
		"FoodishID" => "FD123123"
		));
	}
	
	public function delete()
	{
		$this->model->DeleteDataFoodishLogin('FoodishLogin',array(
		"FoodishID" => "FD123123"
		));
	}
	
	
	
	public function tarikdatafoodish()
	{
		$data = $this->model->GetFoodishData();
		foreach($data as $row)
		{
			$nama = $row['Name'];
		}
		
		$this->load->view('informasifoodish-lanjut.php',array('name' => $nama));
	}
	
}
