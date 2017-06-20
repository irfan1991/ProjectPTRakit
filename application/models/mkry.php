<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkry extends CI_Model {


	function cek($username,$password)
	{

		
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('user');

	}

function show_karyawan(){
				$query = $this->db->get('karyawan');
				$query_result = $query->result();
				return $query_result;
						}

	// Function To Fetch Selected Student Record
	function show_karyawan_id($data){
				$this->db->select('*');
				$this->db->from('karyawan');
				$this->db->where('id_kary', $data);
				$query = $this->db->get();
				$result = $query->result();
				return $result;
						}
	
	function update_karyawan_id1($id,$data){
	$this->db->where('id_kary', $id);
	$this->db->update('karyawan', $data);
	}


	function getData()
	{
		$this->db->join('departement d','d.id=karyawan.dpmnt');
		$sql = $this->db->get('karyawan');
		if ($sql->num_rows()>0)
		{
			return $sql->result();
		}
		else
		
			return false;	
		}
	//}

	function find_data_karyawan_id($id)
	{
		$this->db->where('id_kary',$id);
		$sql = $this->db->get('karyawan');
		if ($sql->num_rows()>0)
		{
			return $sql->row_array();
		}
		else
		{
			return false;	
		}
	}

	function karyawan_list()
	{
		$sql = $this->db->get('karyawan');
		if ($sql->num_rows()>0)
		{
			foreach($sql->result() as $l):
				$list[$l->id_kary] = $l->nik.' - '.$l->namakar;
			endforeach;
			return $list;
		}
		else
		{
			return false;	
		}		
	}

	function karyawan_list2()
	{
		$sql = $this->db->get('karyawan');
		if ($sql->num_rows()>0)
		{
			foreach($sql->result() as $l):
				$list[$l->namakar] = $l->nik.' - '.$l->namakar;
			endforeach;
			return $list;
		}
		else
		{
			return false;	
		}		
	}

	function buat_kode()   {    
			  $this->db->select('RIGHT(karyawan.no_mr,2) as kode', FALSE);
			  $this->db->order_by('no_mr','DESC');    
			  $this->db->limit(1);     
			  $query = $this->db->get('karyawan');      //cek dulu apakah ada sudah ada kode di tabel.    
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
			  $kodejadi = "KGM-".$kodemax;     
			  return $kodejadi;  
			 		}


 function simpan_data()
	{
		$data = array(
			'nik' => $_POST['nik'],
			'namakar' => $_POST['nama'],
			'no_mr' => $_POST['nomr'],
			'status' => $_POST['status'],
			'jk' => $_POST['jk'],
			'tgllahir' => $this->input->post('tanggal'),
			'dpmnt' => $_POST['depart'],
			'date_c' => date('Y-m-d H:i:s'),
			'user_c' => $this->input->post('user_c'),

		);
		$this->db->insert('karyawan',$data); 
	}
	
	function ubah_data($id)
	{
		$data = array(
			'nik' => $_POST['nik'],
			'namakar' => $_POST['nama'],
			'no_mr' => $_POST['nomr'],
			'status' => $_POST['status'],
			'jk' => $_POST['jk'],
			'tgllahir' => $this->input->post('tanggal'),
			'dpmnt' => $_POST['depart'],
			'date_u' => date('Y-m-d H:i:s'),
			'user_u' => USER_ID,
		);
		$this->db->where('id_kary',$id); 
		$this->db->update('karyawan',$data); 
	}
	
	function hapus_data($id)
	{
		$this->db->where('id_kary',$id); 
		return $this->db->delete('karyawan'); 
	}

}

