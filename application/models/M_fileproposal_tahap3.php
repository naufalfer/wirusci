<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fileproposal_tahap3 extends CI_Model {
	public function select_all(){
        $query = $this->db->get('fileproposaltahap3');
        return $query->result();
    }

    public function select_jenisusaha1(){
      $query = $this->db->get_where('fileproposaltahap3', array('jenisusahaid' => 1));
      return $query->result();
  }

  public function select_jenisusaha2(){
    $query = $this->db->get_where('fileproposaltahap3', array('jenisusahaid' => 2));
      return $query->result();
}

public function select_jenisusaha3(){
  $query = $this->db->get_where('fileproposaltahap3', array('jenisusahaid' => 3));
  return $query->result();
}

public function select_jenisusaha4(){
  $query = $this->db->get_where('fileproposaltahap3', array('jenisusahaid' => 4));
  return $query->result();
}

public function select_jenisusaha5(){
  $query = $this->db->get_where('fileproposaltahap3', array('jenisusahaid' => 5));
  return $query->result();
}

    public function get($id){
      $query = $this->db->get_where('fileproposaltahap3', array('id' => $id));
      return $query->result();
    }
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */