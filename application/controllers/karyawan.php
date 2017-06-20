<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			if (!$this->session->userdata('username')) {
			# code...
			redirect('/');
		} 
		$this->load->model('mkry');
	//	$this->auth->check_user_authentification();
	}
	
	public function tbn()
	{
		$this->load->view('karyawan/form');
	}


	function index()
	{
		$data['judul']='Karyawan';
		$data['sql']=$this->mkry->getData();
		$data['content']='karyawan/tampil';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('layout/main',$data);
	}
	
	function tambah()
	{
		$this->load->model('mdepart'); //load model departement 
		$data['sql'] =FALSE;
		$data['judul'] ='Tambah Karyawan';
		$data['tujuan']='simpan';
		$data['kodeunik'] = $this->mkry->buat_kode();
		$data['username'] = $this->session->userdata('username');
		$data['depart']= $this->mdepart->departemen_list();
		$data['content']='karyawan/form';
		$this->load->view('layout/main',$data);
	}

	function ubah()
	{
		$this->load->model('mdepart'); //load model departement 
		$id = $this->uri->segment(3);
		$data['username'] = $this->session->userdata('username');
		$data['sql'] =$this->mkry->find_data_karyawan_id($id);
		$data['kodeunik'] = $this->mkry->buat_kode();
		$data['karyawan'] = $this->mkry->show_karyawan();
		$data['single_depart'] = $this->mkry->show_karyawan_id($id);
		$data['judul']='Ubah Karyawan';
		$data['tujuan']='rubah/'.$id;
		$data['depart']= $this->mdepart->departemen_list();
		$data['content']='karyawan/edit';
		$this->load->view('layout/main',$data);
	}
	
	function simpan()
	{
		$this->mkry->simpan_data(); // menuju model mobat->simpan_data()
		$this->session->set_userdata('SUKSES','Sukses Tambah ..'); // menampilkan pesan
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-warning\" style='color:yellow;' id=\"alert\">Sukses Menyimpan Data !!</div></div>");
		redirect('karyawan'); //nanti di aktifkan
	}

	function rubah()
	{
				
			$id= $this->input->post('did');
		$data = array(
			'nik' => $this->input->post('nik'),
			'namakar' => $this->input->post('namakar'),
			'tgllahir' => $this->input->post('tanggal'),
			'dpmnt' => $this->input->post('depart'),
			'no_mr' => $this->input->post('nomr'),
			'status' => $this->input->post('status'),
			'jk' => $this->input->post('jk'),
			//'dpmnt' => $_POST['depart'],
			'date_u' => date('Y-m-d H:i:s'),
			'user_u' => $this->input->post('user_u'),

		);
			$this->mkry->update_karyawan_id1($id,$data);

			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-info\" style='color:green;' id=\"alert\">Sukses Mengudate Data !!</div></div>");
                redirect('/karyawan'); //jika gagal maka akan ditampilkan form upload
	}
	
		function hapus()
	{

		$id = $this->uri->segment(3);
		$this->mkry->hapus_data($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" style='color:yellow;' id=\"alert\">Sukses Menghapus Data !!</div></div>");
		redirect('/karyawan');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
