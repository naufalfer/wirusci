<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}

	public function updatepembimbing($data, $id) {
		$this->db->where("nimteman1", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	public function get($nim){
		$query = $this->db->get_where('admin', array('username' => $nim));
		return $query->result();
	  }

	public function getid($nim){
		$this->db->select('id');
		$this->db->from('admin');
		$this->db->where('username', $nim);

		$data = $this->db->get();
		return $data;
	  }
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */