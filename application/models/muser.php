<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model {

	var $data;


	function get_one($id)
	{

		$param = array('iduser' => $id );
		return $this->db->get_where('user',$param);
	}

	
public function update_user(){

			$data =[
				'username' => $this->input->post('username'),
				'role' => $this->input->post('role'),
				'email' => $this->input->post('email'),
				'password'=> $this->input->post('password')
			];
			$this->db->where('iduser',$this->input->post('id'));
			$this->db->update('user',$data);
	}

	
	function getData()
	{
		$sql = $this->db->get('user');
		if ($sql->num_rows()>0)
		{
			return $sql->result();
		}
		else
		{
			return false;	
		}
		
	}
	function find_data_user($id)
	{
		$this->db->where('iduser',$id);
		$sql = $this->db->get('user');
		if ($sql->num_rows()>0)
		{
			return $sql->row_array();
		}
		else
		{
			return false;	
		}		
	}

	function fill_data()
	{
		$this->data = array(
			'username' => $this->input->post('username'),
			'role' => $this->input->post('administrator'),
			'aktif' => 1
		);
		if($this->input->post('password')) $this->data['password'] = md5($this->input->post('password'));
	}	
	function simpan_data()
	{
		$this->db->insert('user',$this->data); 
	}
	
	function ubah_data($id)
	{
		$this->db->where('iduser',$id); 
		$this->db->update('user',$this->data); 
	}
	
	function hapus_data($id)
	{
		$this->db->where('iduser',$id); 
		$this->db->delete('user'); 
	}
	
}

