<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mobat extends CI_Model {

	function getData()
	{
		$sql = $this->db->get('obat');
		if ($sql->num_rows()>0)
		{
			return $sql->result();
		}
		else
		{
			return false;	
		}
	}
	

	function getTransaksi()
	{


		 $query  ="select *from obat where stock_akhir != 0 ";
        return $this->db->query($query);
     
	}

	
	function find_data_obat_id($id)
	{
		$this->db->where('idobat',$id);
		$sql = $this->db->get('obat');
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
			'nama_obat' => $_POST['nama_obat'],
			'satuan' => $_POST['satuan'],
			'harga' => $this->input->post('harga'),
			'stock_awal' => $_POST['stock_awal'],
			'stock_akhir' => $_POST['stock_awal'],
		);
		$this->db->insert('obat',$data); 
	}
	
		
	function update_obat_id1($id,$data){
	$this->db->where('idobat', $id);
	$this->db->update('obat', $data);
	}

	
	function hapus_data($id)
	{
		$this->db->where('idobat',$id); 
		$this->db->delete('obat'); 
	}
	
		function show_obat(){
				$query = $this->db->get('obat');
				$query_result = $query->result();
				return $query_result;
						}

	// Function To Fetch Selected Student Record
	function show_obat_id($data){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('idobat', $data);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
						}
	


}

