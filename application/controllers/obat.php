<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			# code...
			redirect('/');
		} 

		$this->load->model('mobat');
		
	}
	
	function index()
	{
		$data['judul']='obat';
		$data['sql']=$this->mobat->getData();
		$data['content']='obat/tampil';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('layout/main',$data);
	}
	
	function tambah()
	{
		$data['judul']='Tambah Data Obat';
		$data['sql'] = FALSE; 
		$data['tujuan'] = 'simpan'; 
		$data['username'] = $this->session->userdata('username');
		$data['content']='obat/form';
		$this->load->view('layout/main',$data);
	}

	function ubah()
	{
		$id = $this->uri->segment(3);
		$data['judul']='Ubah Data Obat';
		$data['sql'] = $this->mobat->find_data_obat_id($id); 
		$data['tujuan'] = 'simpan'; 
		$data['obat'] = $this->mobat->show_obat();
		$data['single_depart'] = $this->mobat->show_obat_id($id);
		$data['username'] = $this->session->userdata('username');
		$data['tujuan'] = 'rubah/'.$id; 
		$data['content']='obat/edit';
		$this->load->view('layout/main',$data);
	}
	
	function simpan()
	{
		$this->mobat->simpan_data(); // menuju model mobat->simpan_data()
		$this->session->set_userdata('SUKSES','Sukses Tambah ..'); // menampilkan pesan
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-warning\" style='color:yellow;' id=\"alert\">Sukses Menyimpan Data !!</div></div>");
		redirect('obat'); //nanti di aktifkan
	}

	function rubah()
	{
	
				
			$id= $this->input->post('did');
			$data = array(
			'nama_obat' => $this->input->post('nama_obat'),
			'harga' => $this->input->post('harga'),
			'stock_awal' => $this->input->post('stock_awal'),
			'stock_akhir' => $this->input->post('stock_awal'),
			
			);

			$this->mobat->update_obat_id1($id,$data);
			
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-info\" style='color:green;' id=\"alert\">Sukses Mengudate Data !!</div></div>");
                redirect('/obat'); //jika gagal maka akan ditampilkan form upload
		
	}
	
	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->mobat->hapus_data($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" style='color:yellow;' id=\"alert\">Sukses Menghapus Data !!</div></div>");
		redirect('/obat');
	}



	function update_obat_id1($id,$data){
	$this->db->where('idobat', $id);
	$this->db->update('obat', $data);
	}

}

/* End of file obat.php */
/* Location: ./application/controllers/obat.php */
