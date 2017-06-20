<?php

class Home extends Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('../user_model');
	}
	
	function index()
	{
		$data['judul']='Karyawan';
		$data['sql']=$this->mkry->getData();
		$data['content']='login_form';
		$this->load->view('layout/main',$data);
	}

	//open flash chart dev
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
