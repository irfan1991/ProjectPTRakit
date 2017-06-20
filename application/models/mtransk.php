<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mtransk extends CI_Model {

	
		function getTransaksi()
	{

	 $query  ="select * from obat where stock_akhir > 0 ";
      return $this->db->query($query);
     
	}

	function saveriwayat($nama)
	{
         
		 $query= "select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, sum(dt.qty) stok ,hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr group by dt.id_trx_dtl having(nama_karyawan) = '$nama'";
		 //$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.id_trx_hdr as id,hd.status as status,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr group by id having(nama_karyawan) = '$nama'";
        return $this->db->query($query);
	}

	function savestok($stok)
	{

		 $query= "select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, sum(dt.qty) stok ,hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr group by dt.id_trx_dtl having(nama_obat) = '$stok'";

		// $query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.id_trx_hdr as id,hd.status as status,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr group by id having(nama_obat) = '$stok'";
        return $this->db->query($query);
	}

	function savestatus($nama,$tanggal1,$tanggal2)
	{
		$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr between  '$tanggal1' and '$tanggal2' group by id having(status) = '$nama'";
        return $this->db->query($query);
	}


	function buat_kode()   {    
			  $this->db->select('RIGHT(trx_keluar_hdr.no_trx_hdr,2) as kode', FALSE);
			  $this->db->order_by('no_trx_hdr','DESC');    
			  $this->db->limit(1);     
			  $query = $this->db->get('trx_keluar_hdr');      //cek dulu apakah ada sudah ada kode di tabel.    
			  if($query->num_rows() <> 0){       
			   //jika kode ternyata sudah ada.      
			   $data = $query->row();      
			   $kode = intval($data->kode) + 1;     
			  }
			  else{       
			   //jika kode belum ada      
			   $kode = 1;     
			  }
			  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
			  $kodejadi = date("Y-m")."/".$kodemax;     
			  return $kodejadi;  
			 		}



	function obat_list()
	{
		$sql = $this->db->get('obat');
		if ($sql->num_rows()>0)
		{
			foreach($sql->result() as $l):
				$list[$l->nama_obat] = $l->idobat.' - '.$l->nama_obat;
			endforeach;
			return $list;
		}
		else
		{
			return false;	
		}		
	}

	function getData()
	{
		 $query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr group by id order by id";
        return $this->db->query($query);
	}
	    function laporan_kec($kl,$tanggal5,$tanggal6)
    {

		 //$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as stt,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr between  '$tanggal5' and '$tanggal6' group by id having(stt) = '$nm'";
		   $query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as data1 ,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr between '$tanggal5' and '$tanggal6' group by id having(data1)='$kl'";
		//$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr between  '$tanggal5' and '$tanggal6' group by id ";
        return $this->db->query($query);
    }
	
	    function laporan_periode($tanggal1,$tanggal2)
    {

    	$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr between  '$tanggal1' and '$tanggal2' group by id";
        
        return $this->db->query($query);
    }
	  function laporan_rekap($tanggal3,$tanggal4)
    {

    	$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, sum(dt.qty) stok, sum(dt.harga) as harga ,hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr between  '$tanggal3' and '$tanggal4' group by dt.id_trx_dtl";
       //$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa  from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.id_trx_hdr between '$tanggal3' and '$tanggal4' group by id";

        return $this->db->query($query);
    }

     function findhadir($id)
    {

    	$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.status as status,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator, hd.amnanesa as amnanesa, hd.diagnosa as diagnosa from trx_keluar_hdr as hd, trx_keluar_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.id_trx_hdr  = '$id' group by id";
        
        return $this->db->query($query)->row();;
    }



	function find_header_trx($id)
	{
		$this->db->where('id_trx_hdr',$id);
		$sql = $this->db->get('trx_keluar_hdr');
		if ($sql->num_rows()>0)
		{
			return $sql->row_array();
		}
		else
		{
			return false;	
		}		
	}

	function find_detail_trx($id)
	{
		$this->db->select('trx_keluar_dtl.*,obat.nama_obat,obat.satuan,obat.harga,obat.stock_akhir',false);
		$this->db->where('id_trx_hdr',$id);
		$this->db->join('obat','trx_keluar_dtl.idobat=obat.idobat');
		$sql = $this->db->get('trx_keluar_dtl');
		if ($sql->num_rows()>0)
		{
			return $sql->result();
		}
		else
		{
			return false;	
		}		
	}
	

	function find_detail_transaksi($id)
	{
		$this->db->select('trx_keluar_dtl.*,obat.nama_obat,obat.satuan,obat.harga',false);
		$this->db->where('id_trx_dtl',$id);
		$this->db->join('obat','trx_keluar_dtl.idobat=obat.idobat');
		$sql = $this->db->get('trx_keluar_dtl');
		if ($sql->num_rows()>0)
		{
			return $sql->result();
		}
		else
		{
			return false;	
		}		
	}


	function simpan_data()
	{
		$this->db->trans_start();
//		echo "<pre>";echo print_r($_POST)."</pre>".br();
		$data = array(
			'no_trx_hdr' => $_POST['notrx'],
			'tgl_trx_hdr' => $_POST['tanggal'],
			'amnanesa' => $_POST['amnanesa'],
			'diagnosa' => $_POST['diagnosa'],
			'status' => $_POST['status'],
			'id_karyawan' => $_POST['kary'],
			'date_c' => date('Y-m-d H:i:s'),
			'user_c' => $this->input->post('user_c'),
		);
		$this->db->insert('trx_keluar_hdr', $data);
		$idhdr = $this->db->insert_id();
//		echo "<pre>";echo print_r($data)."</pre>".br();
		
		$ido = $this->input->post('idobat');
		$qty = $this->input->post('qty');
		$hrg = $this->input->post('harga');
		
		for($i=0;$i<count($ido);$i++)
		{
			$det = array(
				'id_trx_hdr' => $idhdr,
				'idobat' => $ido[$i],
				'qty' => $qty[$i],
				'harga' => $hrg[$i],
			);
			$this->db->insert('trx_keluar_dtl', $det);
//		
		}
	

		
		$this->db->trans_complete();	
		return $this->db->trans_status();
	}
	
	function ubah_data($id)
	{
		$this->db->trans_start();
		$data = array(
			'no_trx_hdr' => $_POST['notrx'],
			'tgl_trx_hdr' => $_POST['tanggal'],
			'amnanesa' => $_POST['amnanesa'],
			'status' => $_POST['status'],
			'diagnosa' => $_POST['diagnosa'],
			'id_karyawan' => $_POST['kary'],
			'date_c' => date('Y-m-d H:i:s'),
			'user_c' => $this->input->post('user_c'),
		);

		$this->db->where('id_trx_hdr', $id);
		$this->db->update('trx_keluar_hdr', $data);
		
		$idd = $this->input->post('iddtl');
		$qty = $this->input->post('qty');
		$hrg = $this->input->post('harga');
		$idhdr = $this->input->post('did');
		
		$ido = $this->input->post('idobat');
		
		
		if($ido)
		{
			for($i=0;$i<count($ido);$i++)
			{
				$det = array(
					'id_trx_hdr' => $idhdr,
					'idobat' => $ido[$i],
					'qty' => $qty[$i],
					'harga' => $hrg[$i],
				);
				$this->db->insert('trx_keluar_dtl', $det);
			}
		}

		$this->db->trans_complete();	
		return $this->db->trans_status();
	}


	function update_transaksi_dtl($id,$data){

	$this->db->where('id_trx_dtl', $id);
	$this->db->update('trx_keluar_dtl', $data);

	}



	function hapus_data($id)
	{
		$this->db->where('id_trx_hdr',$id); 
		$this->db->delete('trx_keluar_hdr'); 


		$this->db->where('id_trx_hdr',$id); 
		$this->db->delete('trx_keluar_dtl'); 

	}


	function hapus_data_transaksi($id)
	{
		
		$this->db->where('id_trx_dtl',$id); 
		$this->db->delete('trx_keluar_dtl'); 

	}
	

}

