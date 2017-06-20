<?php

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mkry');
	}
	
	function index()
	{
		$d['title']= 'Sistem Informasi Klinik';
		$d['judul']= 'Halaman Login';
		$this->load->view('login_form');
	}

	function login_exec()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek = $this->mkry->cek($username,$password);
		if ($cek->num_rows == 1) {
				# code...
					foreach ($cek->result() as $data) {
						# code...
						$ses_data['iduser'] =$data->iduser;
						$ses_data['role'] = $data->role;
						$ses_data['email'] = $data->email;
						$ses_data['username'] = $data->username;
						$this->session->set_userdata($ses_data);
					}
					redirect('/obat');

			} else {
				# code...
		$this->session->set_flashdata('pesan','Maaf username dan password Anda salah.');
		redirect('/');

			}
				
			
	}

	function logout()
	{
		
			$this->session->sess_destroy();
			redirect('/');


	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
