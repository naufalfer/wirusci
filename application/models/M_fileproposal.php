<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fileproposal extends CI_Model {
	public function select_all(){
        $query = $this->db->get('fileproposal');
        return $query->result();
    }

    public function get($id){
      $query = $this->db->get_where('fileproposal', array('id' => $id));
      return $query->result();
    }
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */