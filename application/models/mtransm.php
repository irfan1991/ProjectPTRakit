<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mtransm extends CI_Model {

	function getData()
	{
		$this->db->select('id_trx_hdr,no_trx_hdr,namakar,tgl_trx_hdr');
		$this->db->join('karyawan','trx_masuk_hdr.id_karyawan=karyawan.id_kary');
//		$this->db->join('departement d','d.id=karyawan.dpmnt');
		$sql = $this->db->get('trx_masuk_hdr');
		if ($sql->num_rows()>0)
		{
			return $sql->result();
		}
		else
		{
			return false;	
		}
	}


	function laporan_periode($tanggal1,$tanggal2)
    {

    	$query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi, kar.namakar as nama_karyawan, o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator from trx_masuk_hdr as hd, trx_masuk_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and hd.id_karyawan = kar.id_kary and hd.id_trx_hdr = dt.id_trx_hdr and hd.tgl_trx_hdr between  '$tanggal1' and '$tanggal2' group by id";
        
        return $this->db->query($query);
    }



function buat_kode()   {    
  $this->db->select('RIGHT(trx_masuk_hdr.no_trx_hdr,2) as kode', FALSE);
  $this->db->order_by('no_trx_hdr','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('trx_masuk_hdr');      //cek dulu apakah ada sudah ada kode di tabel.    
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



	function tampilkan_detail_transaksi()
    {
        $query  ="select dt.id_trx_dtl as no, hd.no_trx_hdr as nomor_transaksi,hd.id_trx_hdr as id,hd.tgl_trx_hdr as tanggl_transaksi,  o.nama_obat as nama_obat, dt.qty as stok, hd.user_c as operator from trx_masuk_hdr as hd, trx_masuk_dtl as dt , obat as o , karyawan as kar where dt.idobat = o.idobat and  hd.id_trx_hdr = dt.id_trx_hdr";
        return $this->db->query($query);
    }
    
function masuk_transaksi()
    {
        $query  ="select * from trx_masuk_dtl";
        return $this->db->query($query);
    }

	
	
	function find_header_trx($id)
	{
		$this->db->where('id_trx_hdr',$id);
		$sql = $this->db->get('trx_masuk_hdr');
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
		$this->db->select('trx_masuk_dtl.*,obat.nama_obat,obat.satuan',false);
		$this->db->where('id_trx_hdr',$id);
		$this->db->join('obat','trx_masuk_dtl.idobat=obat.idobat');
		$sql = $this->db->get('trx_masuk_dtl');
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
		
			
			'date_c' => date('Y-m-d H:i:s'),
			'user_c' => $this->input->post('user_c'),

		);
		$this->db->insert('trx_masuk_hdr', $data);
		$idhdr = $this->db->insert_id();
//		echo "<pre>";echo print_r($data)."</pre>".br();
		
		$ido = $this->input->post('idobat');
		$qty = $this->input->post('qty');
		
		for($i=0;$i<count($ido);$i++)
		{
			$det = array(
				'id_trx_hdr' => $idhdr,
				'idobat' => $ido[$i],
				'qty' => $qty[$i],
							);
			$this->db->insert('trx_masuk_dtl', $det);
//			echo "<pre>";echo print_r($det)."</pre>".br();
		}
			
		$this->db->trans_complete();	
		return $this->db->trans_status();
	}
	
	function ubah_data($id)
	{
		$this->db->trans_start();
//		echo "<pre>";echo print_r($_POST)."</pre>".br();
		$data = array(
			'no_trx_hdr' => $_POST['notrx'],
			'tgl_trx_hdr' => $_POST['tanggal'],
		
				
			'date_c' => date('Y-m-d H:i:s'),
			'iduser_c' => 1,
		);
		$this->db->where('id_trx_hdr', $id);
		$this->db->update('trx_masuk_hdr', $data);
		
		$idd = $this->input->post('iddtl');
		$qty = $this->input->post('qty');
		
		$this->db->where('id_masuk_hdr', $id);
		if($idd)	$this->db->where_not_in('id_trx_dtl',$idd);
		$this->db->delete('trx_masuk_dtl');
		
		if($idd)
		{
			for($i=0;$i<count($$idd);$i++)
			{
				$det = array(
					'id_trx_hdr' => $idhdr,
					'idobat' => $ido[$i],
					'qty' => $qty[$i],
				);
				$this->db->where('id_trx_hdr', $id);
				$this->db->where('id_trx_dtl', $idd[$i]);
				$this->db->update('trx_masuk_dtl', $det);
			}
		}
		
		$ido = $this->input->post('idobat');
		$qty = $this->input->post('qty');
		
		if($ido)
		{
			for($i=0;$i<count($ido);$i++)
			{
				$det = array(
					'id_trx_hdr' => $idhdr,
					'idobat' => $ido[$i],
					'qty' => $qty[$i],
			
				);
				$this->db->insert('trx_masuk_dtl', $det);
			}
		}

		$this->db->trans_complete();	
		return $this->db->trans_status();
	}


	function hapus_data($id)
	{
		$this->db->where('id_trx_hdr',$id); 
		$this->db->delete('trx_masuk_hdr'); 
	}
	

}

