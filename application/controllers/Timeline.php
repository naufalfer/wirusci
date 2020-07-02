<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
		$this->load->model('M_fileproposal');
		$this->load->model('M_fileproposal_tahap3');
		$this->load->model('M_jawabanpertanyaan');
		$this->load->model('M_timelinekegiatan');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		// $data['dataPegawai'] = $this->M_pegawai->select_all();
		// $data['dataPosisi'] = $this->M_posisi->select_all();
		// $data['dataKota'] = $this->M_kota->select_all();

		$data['page'] = "timeline";
		$data['judul'] = "Tambah Timeline Kegiatan";
		// $data['deskripsi'] = "Manage Data Pegawai";

		// $data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('tambahtimeline/home', $data);
    }
    
    function inputData_action(){
		
		$user = $this->session->userdata();

		$tanggalkegiatan = $this->input->post('tanggalkegiatan');
		$namakegiatan = $this->input->post('namakegiatan');

		$values_timelinekegiatan = array(
			'tanggalkegiatan' => $tanggalkegiatan,
			'namakegiatan' => $namakegiatan,
		);

		$success = $this->db->insert('timelinekegiatan', $values_timelinekegiatan);

		if ($success) {
            $this->session->set_flashdata('msg', show_msg('Timeline Kegiatan Berhasil Ditambahkan', 'success', 'fa-success'));
            redirect('Timeline');
		} else {
            $this->session->set_flashdata('msg', show_msg('Timeline gagal ditambahkan', 'warning', 'fa-warning'));
					redirect('Timeline');
		}

		redirect("Timeline");
		}

	public function set_status(){
			$kegiatanid = $this->input->post('idkegiatan');
			$kegiatan = $this->M_timelinekegiatan->delete($kegiatanid);
			
			if ($kegiatan == true) {
			   $this->session->set_flashdata('msg', show_succ_msg('Timeline telah didelete'));
			   redirect('Home');
			} else {
			   $this->session->set_flashdata('msg', show_err_msg('Timeline gagal diupdate'));
			   redirect('Home');
			}
		 }

	
   }

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */