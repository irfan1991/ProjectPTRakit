<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departement extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			# code...
			redirect('/');
		
	}
	$this->load->model('mdepart');
		
	}
	
	function index()
	{
		$data['judul']='Departemen';
		$data['sql']=$this->mdepart->getData();
		$data['content']='dpt/tampil';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('layout/main',$data);
	}



	function tambah()
	{
		
		$this->form_validation->set_rules('nama','Nama Departemen','required');
		
		if ($this->form_validation->run() === false) {

		$data['judul']='Tambah Data departement';
		$data['sql'] = FALSE; 
		$data['tujuan'] = 'simpan'; 
		$data['content']='dpt/form';
		$data['username'] = $this->session->userdata('username');
	
			$this->load->view('layout/main',$data);
		
				} 
			else 
				{
					
			$this->mdepart->insert_departemen();
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-warning\" style='color:green;' id=\"alert\">Sukses Menyimpan Data !!</div></div>");
                redirect('/departement'); //jika gagal maka akan ditampilkan form upload
		}

	}
	
	function ubah()
	{
		$id = $this->uri->segment(3);
		$data['judul']='Ubah Data departemetn';
		$data['sql'] = FALSE; 
		$data['departement'] = $this->mdepart->show_depart();
		$data['single_depart'] = $this->mdepart->show_depart_id($id);
		$data['tujuan'] = 'rubah/'.$id; 
		$data['content']='dpt/edit';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('layout/main',$data);
	}
	
	function simpan()
	{
		$this->mdepart->simpan_data(); // menuju model mobat->simpan_data()
		$this->session->set_userdata('SUKSES','Sukses Tambah ..'); // menampilkan pesan
	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-warning\" style='color:yellow;' id=\"alert\">Sukses Menyimpan Data !!</div></div>");
		redirect('departement'); //nanti di aktifkan
	}

	function rubah()
	{
	
					
			$id= $this->input->post('did');
			$data = array(
			'nama' => $this->input->post('nama'),
			
			);
			$this->mdepart->update_depart_id1($id,$data);
			//$this->show_user_id();
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-info\" style='color:green;' id=\"alert\">Sukses Mengudate Data !!</div></div>");
                redirect('/departement'); //jika gagal maka akan ditampilkan form upload
		
	}
	
	function hapus()
	{

		$id = $this->uri->segment(3);
		$this->mdepart->hapus_data($id);
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" style='color:yellow;' id=\"alert\">Sukses Menghapus Data !!</div></div>");
		redirect('/departement');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */







