<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			# code...
			redirect('/');
		} 
		$this->load->model('muser');
			$this->load->model('user_model');
		//$this->auth->check_user_authentification();
	}
	
	function index()
	{
		$data['judul']='user';
		$data['sql']=$this->muser->getData();
		$data['content']='user/tampil';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('layout/main',$data);
	}
	
	function tambah()
	{
		$data['judul']='Tambah Data user';
		$data['sql'] = FALSE; 
		$data['act'] = 'add'; 
		$data['tujuan'] = 'simpan'; 
		$data['content']='user/form';
		$this->load->view('layout/main',$data);
	}


	function password()
	{

		$data['judul']='Reset Password';
		$data['sql'] = FALSE; 
		$data['act'] = 'reset'; 
		$data['tujuan'] = 'simpan'; 
		$data['content']='user/password';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('layout/main',$data)	;		
	}


	function ubah()
	{
		$id = $this->uri->segment(3);
		$data['judul']='Ubah Data user';
		$data['act'] = 'ubah'; 
		$data['username'] = $this->session->userdata('username');
		$data['user'] = $this->user_model->show_user();
		$data['single_user'] = $this->user_model->show_user_id($id);
		$data['content']='user/edit';
		$this->load->view('layout/main',$data);
	}


	function profile()
	{
		$id = $this->uri->segment(3);
		$data['judul']='Profile';
		$data['act'] = 'ubah'; 
		$data['username'] = $this->session->userdata('username');
		$data['user'] = $this->user_model->show_user();
		$data['single_user'] = $this->user_model->show_user_id($id);
		$data['content']='user/profile';
		$this->load->view('layout/main',$data);
	}
	
	public function save_password()
 { 

 	$this->form_validation->set_rules('xpassword','Old Password','required');
	  $this->form_validation->set_rules('password','New Password','required');
	  $this->form_validation->set_rules('cpassword', 'Retype New', 'required|matches[password]');
	    if($this->form_validation->run() === FALSE)
	  {
	   redirect('user/password');
	  }else{
	   $cek_old = $this->user_model->cek_old();
		   if ($cek_old == False){
		    $this->session->set_flashdata('error','Old password not match!' );
		   redirect('user/password');
		   }else{
		    $this->user_model->save();
		    $this->session->sess_destroy();
		   $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-info\" style='color:green;' id=\"alert\">Sukses Mengudate Password !!</div></div>");
                redirect('/'); //jika gagal maka akan ditampilkan form upload
		   }//end if valid_user
	  }
 }

	function rubah()
	{
	
					
			$id= $this->input->post('did');
			$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'role' => $this->input->post('role'),
			//'Student_Address' => $this->input->post('daddress')
			);
			$this->user_model->update_user_id1($id,$data);
			//$this->show_user_id();
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-info\" style='color:green;' id=\"alert\">Sukses Mengudate Data !!</div></div>");
                redirect('/user'); //jika gagal maka akan ditampilkan form upload
		
	}
	
	function hapus()
	{

		$id = $this->uri->segment(3);
		$this->muser->hapus_data($id);
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" style='color:yellow;' id=\"alert\">Sukses Menghapus Data !!</div></div>");
		redirect('/user');
	}
	


}
