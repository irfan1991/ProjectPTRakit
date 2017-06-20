<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			# code...
			redirect('/');
		} 
		$this->load->model('user_model');
		// $this->load->helper(array('form', 'url'));
	}

	

    



	public function register()
	{
		$this->form_validation->set_rules('email','Email','required|is_unique[user.email]');
		$this->form_validation->set_rules('username','Username','required|is_unique[user.username]');
		$this->form_validation->set_rules('role', 'Hak Akses','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm','Konfirmasi Password','required|matches[password]');



		if ($this->form_validation->run() === false) {

		$data['judul']='Tambah Data user';
		$data['sql'] = FALSE; 
		$data['act'] = 'add'; 
		$data['tujuan'] = 'simpan'; 
		$data['content']='user/form';
		$data['username'] = $this->session->userdata('username');
	
			$this->load->view('layout/main',$data);
		
				} 


				else 

				{
					
			$this->user_model->insert_user();
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-warning\" style='color:green;' id=\"alert\">Sukses Menyimpan Data !!</div></div>");
                redirect('/user'); //jika gagal maka akan ditampilkan form upload
		}

	}
					
				}




			

		

	



