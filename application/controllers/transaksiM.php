<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiM extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mtransm');
	//	$this->auth->check_user_authentification();
	}
	

	function index()
	{
		$data['judul']='Transaksi masuk';
		$data['sql']=$this->mtransm->getData();
		$data['username'] = $this->session->userdata('username');
		$data['detail']= $this->mtransm->tampilkan_detail_transaksi()->result();
		$data['masuk']= $this->mtransm->masuk_transaksi()->result();
		$data['content']='mmasuk/tampil';
		$this->load->view('layout/main',$data);
	}
	
	function tambah()
	{
		$this->load->model('mkry'); //load model karyawan
		$this->load->model('mobat'); //load model obat 
		$data['kodeunik'] = $this->mtransm->buat_kode();
		$data['judul']='Transaksi Masuk';
		$data['tujuan']='simpan';
		$data['kary']= $this->mkry->karyawan_list();
		$data['obat']= $this->mobat->getData();
		$data['username'] = $this->session->userdata('username');
		$data['content']='mmasuk/form';
		$this->load->view('layout/main',$data);
	}

	function ubah()
	{
		$this->load->model('mkry'); //load model karyawan
		$this->load->model('mobat'); //load model obat 
		$id = $this->uri->segment(3);
		$data['kodeunik'] = $this->mtransm->buat_kode();
		$data['sqlH']= $this->mtransm->find_header_trx($id); // find headernya
		$data['sqlD']= $this->mtransm->find_detail_trx($id); // find detailnya
		$data['judul']='Transaksi Masuk';
		$data['tujuan']='rubah/'.$id;
		$data['username'] = $this->session->userdata('username');
		$data['kary']= $this->mkry->karyawan_list();
		$data['obat']= $this->mobat->getData();
		$data['content']='mmasuk/form_ubah';
		$this->load->view('layout/main',$data);
	}
	
	function simpan()
	{
		$this->mtransm->simpan_data(); // menuju model mtransk->simpan_data()
		$this->session->set_userdata('SUKSES','Sukses Tambah ..'); // menampilkan pesan
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-warning\" style='color:yellow;' id=\"alert\">Sukses Menyimpan Data !!</div></div>");
		redirect('transaksiM'); //nanti di aktifkan
	}

	function rubah()
	{
		$id = $this->uri->segment(3);
		$this->mtransm->ubah_data($id); // menuju model mtransk->simpan_data()
		$this->session->set_userdata('SUKSES','Ubah Tambah ..'); // menampilkan pesan
		redirect('transaksiM'); //nanti di aktifkan
	}
	
	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->mtransm->hapus_data($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" style='color:yellow;' id=\"alert\">Sukses Menghapus Data !!</div></div>");
		redirect('/transaksiM');
	}
	
	function preview()
	{
		$id = $this->uri->segment(3);
		$data['sqlH']= $this->mtransm->find_header_trx($id); // find headernya
		$data['sqlD']= $this->mtransm->find_detail_trx($id); // find detailnya
		$this->load->view('mmasuk/preview',$data);
	}


	function pdf()
    {

    	$this->load->library('cfpdf');
    	$this->load->model('mkry'); //load model karyawan
		$this->load->model('mobat'); //load model obat 
        $tanggal1=  $this->input->post('tanggal1');
        $tanggal2=  $this->input->post('tanggal2');
            
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI KELUAR','',1);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
	
	    $pdf->Text(10, 15, 'Periode');
        $pdf->Text(27, 15, $tanggal1);
        $pdf->Text(50, 15, 'sampai');
        $pdf->Text(66, 15, $tanggal2);

        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 13,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'No Transaksi', 1,0);
        $pdf->Cell(30, 7, 'Tanggal', 1,0);
        $pdf->Cell(50, 7, 'Nama karyawan', 1,0);
        $pdf->Cell(25, 7, 'Nama Obat', 1,0);
        $pdf->Cell(25, 7, 'Jumlah', 1,0);
        $pdf->Cell(25, 7, 'Operator', 1,1);

        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data= $this->mtransm->laporan_periode($tanggal1,$tanggal2);
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(30, 7, $r->nomor_transaksi, 1,0);
            $pdf->Cell(30, 7, $r->tanggl_transaksi, 1,0);
            $pdf->Cell(50, 7, $r->nama_karyawan, 1,0);
            $pdf->Cell(25, 7, $r->nama_obat, 1,0);
            $pdf->Cell(25, 7, $r->stok, 1,0);
            $pdf->Cell(25, 7, $r->operator, 1,1);
            $no++;
           
        }
       
      
        $pdf->Output();
     
        
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
