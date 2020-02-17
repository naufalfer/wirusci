<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
		$this->load->model('M_timelinekegiatan');
	}

	public function index() {
		// $data['jml_pegawai'] 	= $this->M_pegawai->total_rows();
		// $data['jml_posisi'] 	= $this->M_posisi->total_rows();
		// $data['jml_kota'] 		= $this->M_kota->total_rows();
		$data['userdata'] 		= $this->userdata;
		$data['timelinekegiatan'] = $this->M_timelinekegiatan->select_all();


		$data['page'] 			= "home";
		$data['judul'] 			= "Timeline Kegiatan";
		// $data['deskripsi'] 		= "Manage Data CRUD";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */