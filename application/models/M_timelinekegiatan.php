<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_timelinekegiatan extends CI_Model {
	public function select_all(){
        $query = $this->db->get('timelinekegiatan');
        return $query->result();
    }

    public function get($id){
      $query = $this->db->get_where('timelinekegiatan', array('id' => $id));
      return $query->result();
    }

    public function delete($id = '') {
      if ($id != '') {
        $this->db->where('id', $id);
      }
  
      $data = $this->db->delete('timelinekegiatan');
  
      if ($data) {
        return true;
      } else false;
    }
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */