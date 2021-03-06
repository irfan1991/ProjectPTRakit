<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiK extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mtransk');
		$this->load->helper('finance');
	//	$this->auth->check_user_authentification();
	}
	
	function index()
	{
		$data['judul']='Transaksi Keluar';
		$data['username'] = $this->session->userdata('username');
		$data['sql']=$this->mtransk->getData()->result();
		$data['content']='tkeluar/tampil';
		$this->load->view('layout/main',$data);
	}
	

	function transaksi()
	{

		$id = $this->uri->segment(3);
		$data['judul']='Transaksi Keluar';
		$data['username'] = $this->session->userdata('username');
		$data['sql']=$this->mtransk->getTransaksi();
		$data['content']='tkeluar/form';
		$this->load->view('layout/main',$data);
	}


	function tambah()
	{
		$this->load->model('mkry'); //load model karyawan
		$this->load->model('mobat'); //load model obat 
		$data['kodeunik'] = $this->mtransk->buat_kode();
		$data['judul']='Transaksi Keluar';
		$data['username'] = $this->session->userdata('username');
		$data['tujuan']='simpan';
		$data['kary']= $this->mkry->karyawan_list();
		$data['obat']= $this->mobat->getTransaksi()->result();
		$data['content']='tkeluar/form';
		$this->load->view('layout/main',$data);
	}


	function ubah()
	{
		$this->load->model('mkry'); //load model karyawan
		$this->load->model('mobat'); //load model obat 
		$id = $this->uri->segment(3);
		$data['kodeunik'] = $this->mtransk->buat_kode();
		$data['username'] = $this->session->userdata('username');
		$data['sqlH']= $this->mtransk->find_header_trx($id); // find headernya
		$data['sqlD']= $this->mtransk->find_detail_trx($id); // find detailnya
		$data['judul']='Transaksi Keluar';
		$data['tujuan']='rubah/'.$id;
		$data['kary']= $this->mkry->karyawan_list();
		$data['obat']= $this->mobat->getTransaksi()->result();
		$data['content']='tkeluar/form_ubah';
		$this->load->view('layout/main',$data);
	}

	function getriwayat()
	{

		$this->load->model('mkry'); //load model karyawan
		$data['kary']= $this->mkry->karyawan_list();
		$data['judul']='Daftar Riwayat Karyawan';
		$data['username'] = $this->session->userdata('username');
		$data['sql']=$this->mtransk->getData()->result();
		$data['content']='tkeluar/riwayat';
		$this->load->view('layout/main',$data);
	}

    function riwayat()

    {
      
         if(isset($_POST['submit']))
        {

        $nama =$this->input->post('karyawan');

        $this->load->model('mkry'); //load model karyawan
		$data['kary']= $this->mkry->karyawan_list2();
		$data['judul']='Daftar Riwayat Karyawan';
		$data['username'] = $this->session->userdata('username');
			
		$data['sql']=$this->mtransk->saveriwayat($nama);
		$data['content']='tkeluar/riwayat';
		$this->load->view('layout/main',$data);
		//die($sql);
		//print_r($data['sql']);
        }
        else
        {
        	
        $this->load->model('mkry'); //load model karyawan
		$data['kary']= $this->mkry->karyawan_list2();
		$data['judul']='Daftar Riwayat Karyawan';
		$data['username'] = $this->session->userdata('username');
		$data['sql']=$this->mtransk->getData();
		$data['content']='tkeluar/riwayat';
		$this->load->view('layout/main',$data);
        }
    }

    function stok()
    {
      
         if(isset($_POST['submit']))
        {

        $nama =$this->input->post('obat');

        $this->load->model('mkry'); //load model karyawan
		$data['obat']= $this->mtransk->obat_list();
		$data['judul']='Daftar Riwayat Karyawan';
		$data['username'] = $this->session->userdata('username');
			
		$data['sql']=$this->mtransk->savestok($nama);
		$data['content']='tkeluar/stok';
		$this->load->view('layout/main',$data);
		//die($sql);
		//print_r($data['sql']);
        }
        else
        {
        	
        $this->load->model('mkry'); //load model karyawan
		$data['obat']= $this->mtransk->obat_list();
		$data['judul']='Daftar Riwayat Karyawan';
		$data['username'] = $this->session->userdata('username');
		$data['sql']=$this->mtransk->getData();
		$data['content']='tkeluar/stok';
		$this->load->view('layout/main',$data);
        }
    }


 function status()
    {
      
         if(isset($_POST['submit']))
        {
        $tanggal1=  $this->input->post('tanggal1');
        $tanggal2=  $this->input->post('tanggal2');
        $nama = $this->input->post('status');
        $data['nama'] =$this->input->post('status');
        $data['tanggal1']=  $this->input->post('tanggal1');
        $data['tanggal2']=  $this->input->post('tanggal2');
    	$data['judul']='Data Kecelakaan / Non Kecelakaan Karyawan';
		$data['username'] = $this->session->userdata('username');
		$data['sql']=$this->mtransk->savestatus($nama,$tanggal1,$tanggal2);
		$data['content']='tkeluar/status';
		$this->load->view('layout/main',$data);
		
        }
        else
        {
    
   		$this->load->model('mkry'); //load model karyawan
		$data['obat']= $this->mtransk->obat_list();
		$data['judul']='Data Kecelakaan / Non Kecelakaan Karyawan';
		$data['username'] = $this->session->userdata('username');
		$data['sql']=$this->mtransk->getData();
		$data['content']='tkeluar/status';
		$this->load->view('layout/main',$data);
        }
    }

    


	function ubahtransaksi()
	{
		$this->load->model('mkry'); //load model karyawan
		$this->load->model('mobat'); //load model obat 
		$id = $this->uri->segment(3);
		$data['username'] = $this->session->userdata('username');
		$data['sqlH']= $this->mtransk->find_header_trx($id); // find headernya
		$data['sqlD']= $this->mtransk->find_detail_transaksi($id); // find detailnya
		$data['judul']='Transaksi Keluar';
		$data['tujuan']='rubahtransaksi';
		$data['obat']= $this->mobat->getTransaksi()->result();
		$data['content']='tkeluar/transaksi';
		$this->load->view('layout/main',$data);
	}
	
	function simpan()
	{

		$this->mtransk->simpan_data(); // menuju model mtransk->simpan_data()
		$this->session->set_userdata('SUKSES','Sukses Tambah ..'); // menampilkan pesan
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-warning\" style='color:yellow;' id=\"alert\">Sukses Menyimpan Data !!</div></div>");
		redirect('transaksiK');
	}

	function rubah()
	{
		$id = $this->uri->segment(3);
		$this->mtransk->ubah_data($id); // menuju model mtransk->simpan_data()
		redirect('transaksiK'); //nanti di aktifkan
	}


	function rubahtransaksi()
	{
			$id= $this->input->post('did');
			$idx= $this->input->post('do');
				$data = array(
					'qty' => $this->input->post('qty'),
					
				);
			$this->mtransk->update_transaksi_dtl($id,$data);

			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-info\" style='color:green;' id=\"alert\">Sukses Mengudate Data !!</div></div>");
               redirect('transaksiK/ubah/'.$idx);
	}
	
	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->mtransk->hapus_data($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" style='color:yellow;' id=\"alert\">Sukses Menghapus Data !!</div></div>");
		redirect('/transaksiK');
	}

	function hapustransaksi()
	{
		$id = $this->uri->segment(3);
		$this->mtransk->hapus_data_transaksi($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" style='color:yellow;' id=\"alert\">Sukses Menghapus Data !!</div></div>");
		redirect($_SERVER['HTTP_REFERER']);
	}
	

	function laporan()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
			//$tanggal3=  $this->input->post('tanggal3');
           // $tanggal4=  $this->input->post('tanggal4');
            //$data['record']=  $this->model_transaksi->laporan_periode($tanggal1,$tanggal2);

			$data['judul']='Transaksi Keluar';
			$data['username'] = $this->session->userdata('username');
			$data['sql']=$this->mtransk->laporan_periode($tanggal1,$tanggal2)->result();
			//$data['sql']=$this->mtransk->laporan_periode($tanggal3,$tanggal4)->result();
			$data['content']='tkeluar/tampil';
			$this->load->view('layout/main',$data);
        }
        else
        {
            
	        $data['judul']='Transaksi Keluar';
			$data['username'] = $this->session->userdata('username');
			$data['sql']=$this->mtransk->getData()->result();
			$data['content']='tkeluar/tampil';
			$this->load->view('layout/main',$data);
        }
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
        $pdf->Text(10, 10, 'LAPORAN KUNJUNGAN TRANSAKSI KLINIK','',1);
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
        $pdf->Cell(35, 7, 'Amnanesia', 1,0);
        $pdf->Cell(35, 7, 'Diagnosa', 1,1);

        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data= $this->mtransk->laporan_periode($tanggal1,$tanggal2);
		//echo $this->db->last_query();
		//echo print_r($data->result());
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(30, 7, $r->nomor_transaksi, 1,0);
            $pdf->Cell(30, 7, $r->tanggl_transaksi, 1,0);
            $pdf->Cell(50, 7, $r->nama_karyawan, 1,0);
            $pdf->Cell(35, 7, $r->amnanesa, 1,0);
            $pdf->Cell(35, 7, $r->diagnosa, 1,1);
            $no++;
           
        }
       
      
        $pdf->Output();
     
        
  }
  function rekap()
    {
		//ob_start();
    	$this->load->library('cfpdf');
    	$this->load->model('mkry'); //load model karyawan
		$this->load->model('mobat'); //load model obat 
        $tanggal3=  $this->input->post('tanggal3');
        $tanggal4=  $this->input->post('tanggal4');
		
		
            
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN REKAP TRANSAKSI KLINIK','',1);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
	
	    $pdf->Text(10, 15, 'Periode');
        $pdf->Text(27, 15, $tanggal3);
        $pdf->Text(50, 15, 'sampai');
        $pdf->Text(66, 15, $tanggal4);

        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 13,'','',1);
        $pdf->Cell(10, 10, 'No', 1,0);
        $pdf->Cell(25, 10, 'No Transaksi', 1,0);
        $pdf->Cell(25, 10, 'Tanggal', 1,0);
        $pdf->Cell(30, 10, 'Nama karyawan', 1,0);
        $pdf->Cell(25, 10, 'Amnanesia', 1,0);
        $pdf->Cell(25, 10, 'Diagnosa', 1,0);
		$pdf->Cell(15, 10, 'Qty', 1,0);
		$pdf->Cell(20, 10, 'harga', 1,0);
		$pdf->Cell(20, 10, ' subtotal', 1,1);
		
		

        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data= $this->mtransk->laporan_rekap($tanggal3,$tanggal4);
		//echo $this->db->last_query();
		//echo print_r($data->result());
        $no=1;
        $total=0;
		//if($data) {
        foreach ($data->result() as $r)
        {
            $pdf->Cell(10, 8, $no, 1,0);
            $pdf->Cell(25, 8, $r->nomor_transaksi, 1,0);
            $pdf->Cell(25, 8, $r->tanggl_transaksi, 1,0);
            $pdf->Cell(30, 8, $r->nama_karyawan, 1,0);
            $pdf->Cell(25, 8, $r->amnanesa, 1,0);
            $pdf->Cell(25, 8, $r->diagnosa, 1,0);
			$pdf->Cell(15, 8, $r->stok, 1,0);
			$pdf->Cell(20, 8, $r->harga, 1,0);
			$pdf->Cell(20, 8, $r->stok * $r->harga, 1,1);
            $no++;
			$total=$total+$r->stok * $r->harga;
			//$total+=$r->harga;
           
        }
			//echo to_rupiah($total)
		//}
      	$pdf->Cell(175,8,'Total',1,0,'R');
        $pdf->Cell(20,8,to_rupiah($total),1,0);
        $pdf->Output();
	}
	///Laporan rekap data kecelakaan 
	function rekapKec()
    {

    	$this->load->library('cfpdf');
    	$this->load->model('mkry'); //load model karyawan
		//$this->load->model('mobat'); //load model obat 
        $tanggal5=  $this->input->post('tanggal5');
        $tanggal6=  $this->input->post('tanggal6');
        $kl=  $this->input->post('rekapKec');
            
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN','',0);
        $pdf->Text(35, 10,$kl == 0 ? 'KECELAKAAN' : 'NON KECELAKAAN','',1);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
	
	    $pdf->Text(10, 15, 'Periode');
        $pdf->Text(27, 15, $tanggal5);
        $pdf->Text(50, 15, 'sampai');
        $pdf->Text(66, 15, $tanggal6);
		
		//$pdf->Text(10, 15, 'Status ');
        //$pdf->Text(27, 15, $status);

        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 13,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'No Transaksi', 1,0);
        $pdf->Cell(30, 7, 'Tanggal', 1,0);
        $pdf->Cell(50, 7, 'Nama karyawan', 1,0);
        $pdf->Cell(35, 7, 'Diagnosa', 1,0);
		$pdf->Cell(35, 7, 'status', 1,1);

        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data= $this->mtransk->laporan_kec($kl,$tanggal5,$tanggal6);
		//echo $this->db->last_query();
		//echo print_r($data->result());
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(30, 7, $r->nomor_transaksi, 1,0);
            $pdf->Cell(30, 7, $r->tanggl_transaksi, 1,0);
            $pdf->Cell(50, 7, $r->nama_karyawan, 1,0);
            $pdf->Cell(35, 7, $r->diagnosa, 1,0);
			$pdf->Cell(35, 7, $r->data1, 1,1);
            $no++;
           
        }
       
        $pdf->Output();
     
        
  }// batas akhir 
   function kuitansi()
    {

    	$this->load->library('cfpdf');
    	$this->load->model('mkry'); //load model karyawan
		$this->load->model('mobat'); //load model obat 
    	$id = $this->uri->segment(3);
       	$dat= $this->mtransk->findhadir($id); // find headernya
		$data2= $this->mtransk->find_detail_trx($id); // find detailnya
		date_default_timezone_set('Asia/Jakarta');
		$date = date('m/d/Y h:i:s a', time());
        //   print_r($dat); 
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'KUITANSI KLINIK','',1);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
		$pdf->Cell(10, 13,'','',1);
      

		
	    $pdf->Text(10, 20, 'No Transaksi');
        $pdf->Text(70, 20, $dat->nomor_transaksi);
        $pdf->Text(10, 25, 'Tanggal Transaksi');
        $pdf->Text(70, 25, $dat->tanggl_transaksi);
   		$pdf->Text(10, 30, 'Nama Karyawan');
        $pdf->Text(70, 30, $dat->nama_karyawan);
        $pdf->Text(10, 35, 'Amnanesia');
        $pdf->Text(70, 35, $dat->amnanesa);
        $pdf->Text(10, 40, 'Diagnosa');
        $pdf->Text(70, 40, $dat->diagnosa);

        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 25,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'Nama Obat', 1,0);
        $pdf->Cell(25, 7, 'Jumlah', 1,0);
        $pdf->Cell(20, 7, 'Satuan', 1,0);
        $pdf->Cell(25, 7, 'Harga', 1,0);
        $pdf->Cell(25, 7, 'Total', 1,1);
      
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
       // $data= $this->mtransk->laporan_periode($tanggal1,$tanggal2);
        $no=1;
        $total=0;
        foreach ($data2 as $q)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(30, 7, $q->nama_obat, 1,0);
            $pdf->Cell(25, 7, $q->qty, 1,0);
            $pdf->Cell(20, 7, $q->satuan, 1,0);
            $pdf->Cell(25, 7, $q->harga, 1,0);
            $pdf->Cell(25, 7, $q->qty * $q->harga, 1,1);
            $no++;
            $total=$total+$q->qty * $q->harga;
        }
       
      	$pdf->Cell(110,7,'Total',1,0,'R');
        $pdf->Cell(25,7,to_rupiah($total),1,0);


        $pdf->Text(144, 100, 'Jakarta' );
         $pdf->Text(158, 100, date("Y/m/d") );
        $pdf->Text(155, 105, 'Operator');
      	$pdf->Text(158, 130, $dat->operator);


        $pdf->Output();
     
        
  }

	
	function preview()
	{
		$id = $this->uri->segment(3);
		$data['sqlH']= $this->mtransk->find_header_trx($id); // find headernya
		$data['sqlD']= $this->mtransk->find_detail_trx($id); // find detailnya
		$this->load->view('tkeluar/preview',$data);
	}
}
