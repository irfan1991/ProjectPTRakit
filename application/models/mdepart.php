<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdepart extends CI_Model {



	public function insert_departemen(){

			$data =[
				'nama' => $this->input->post('nama'),
				
			];

			$this->db->insert('departement',$data);
	}


	function show_depart(){
				$query = $this->db->get('departement');
				$query_result = $query->result();
				return $query_result;
						}

	// Function To Fetch Selected Student Record
	function show_depart_id($data){
				$this->db->select('*');
				$this->db->from('departement');
				$this->db->where('id', $data);
				$query = $this->db->get();
				$result = $query->result();
				return $result;
						}
	
	function update_depart_id1($id,$data){
	$this->db->where('id', $id);
	$this->db->update('departement', $data);
	}


	function getData()
	{
		$sql = $this->db->get('departement');
		if ($sql->num_rows()>0)
		{
			return $sql->result();
		}
		else
		{
			return false;	
		}
	}
	function departemen_list()
	{
		$sql = $this->db->get('departement');
		if ($sql->num_rows()>0)
		{
			foreach($sql->result() as $l):
				$list[$l->id] = $l->nama;
			endforeach;
			return $list;
		}
		else
		{
			return false;	
		}		
	}
	function find_data_id_dpt($id)
	{
		$this->db->where('id',$id);
		$sql = $this->db->get('departement');
		if ($sql->num_rows()>0)
		{
			return $sql->row_array();
		}
		else
		{
			return false;	
		}		
	}
	
	function simpan_data()
	{
		$data = array(
			'nama' => $_POST['nama']
		);
		$this->db->insert('departement',$data); 
	}
	
	function ubah_dpt($id)
	{
		$data = array(
			'nama' => $_POST['nama'],
		);
		$this->db->where('id',$id); 
		$this->db->update('departement',$data); 
	}
	
	function hapus_data($id)
	{
		$this->db->where('id',$id); 
		$this->db->delete('departement'); 
	}
	
}

