<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->model('M_admin');
	}
	
	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('landingpage');
		} else {
			redirect('Home');
		}
	}

	public function halamanlogin() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('login');
		} else {
			redirect('Home');
		}
	}

	public function register() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('register');
		} else {
			redirect('Home');
		}
	}

	public function registerpembimbing() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('registerpembimbing');
		} else {
			redirect('Home');
		}
	}

	public function input_register() {
		// $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|max_length[9]');
		// $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[16]');
		// $this->form_validation->set_rules('confirmpassword', 'Konfirmasi Password', 'required|min_length[8]|max_length[16]');
		// $this->form_validation->set_rules('nama', 'Nama', 'required|alpha');
		// $this->form_validation->set_rules('roles', 'Roles', 'required');
		// $this->form_validation->set_rules('nimteman1', 'NIM Teman 1', 'requirednumeric|max_length[9]');
		// $this->form_validation->set_rules('nimteman2', 'NIM Teman 2', 'required|min_length[4]|max_length[15]');

		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$confpassword = $this->input->post('confirmpassword');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nowhatsapp = $this->input->post('nowhatsapp');
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		$roles = $this->input->post('roles');
		$nimteman1 = $this->input->post('nimteman1');
		$nimteman2 = $this->input->post('nimteman2');
		$nimteman3 = $this->input->post('nimteman3');
		$nimteman4 = $this->input->post('nimteman4');

		$matchnim = $this->M_admin->get($nim);
      // print_r($proposal[0]->proposal); die;

      $path = $matchnim[0]->matchnim;

      if(file_exists($path)){
		$this->session->set_flashdata('error_msg', 'NIM sudah ada.');
		redirect('Auth/register');
	  } elseif ($password != $confpassword){
			$this->session->set_flashdata('error_msg', 'Password tidak sama.');
			redirect('Auth/register');
		} elseif ($nim == ''){
			$this->session->set_flashdata('error_msg', 'NIM wajib diisi');
			redirect('Auth/register');
		} elseif ($password == ''){
			$this->session->set_flashdata('error_msg', 'Password wajib diisi');
			redirect('Auth/register');
		} elseif ($nama == ''){
			$this->session->set_flashdata('error_msg', 'Nama wajib diisi');
			redirect('Auth/register');
		} elseif ($nowhatsapp == ''){
			$this->session->set_flashdata('error_msg', 'No Whatsapp wajib diisi');
			redirect('Auth/register');
		} elseif ($email == ''){
			$this->session->set_flashdata('error_msg', 'Email wajib diisi');
			redirect('Auth/register');
		} elseif ($jurusan == ''){
			$this->session->set_flashdata('error_msg', 'Jurusan wajib diisi');
			redirect('Auth/register');
		} elseif ($prodi == ''){
			$this->session->set_flashdata('error_msg', 'Prodi wajib diisi');
			redirect('Auth/register');
		} elseif ($nimteman1 == ''){
			$this->session->set_flashdata('error_msg', 'NIM Teman 1 wajib diisi');
			redirect('Auth/register');
		} elseif ($nimteman2 == ''){
			$this->session->set_flashdata('error_msg', 'NIM Teman 2 wajib diisi');
			redirect('Auth/register');
		}
		// } elseif ($nimteman3 == ''){
		// 	$this->session->set_flashdata('error_msg', 'NIM Teman 3 wajib diisi');
		// 	redirect('Auth/register');
		// } elseif ($nimteman4 == ''){
		// 	$this->session->set_flashdata('error_msg', 'NIM Teman 4 wajib diisi');
		// 	redirect('Auth/register');
		// } 

		$values_register = array(
			'username' => $nim,
			'password' => md5($password),
			'nama' => $nama,
			'email' => $email,
			'jurusanid' => $jurusan,
			'prodiid' => $prodi,
			'nowhatsapp' => $nowhatsapp,
			'roleid' => '1',
			'nimteman1' => $nimteman1,
			'nimteman2' => $nimteman2,
			'nimteman3' => $nimteman3,
			'nimteman4' => $nimteman4,
		);

		$registersuccess = $this->db->insert('admin', $values_register);
		
		if ($registersuccess){
		    $this->session->set_flashdata('error_msg', 'Register Sukses. Silahkan Login.');
			redirect('Auth/register');
		}
		
// 		redirect('Auth/register');
	}

	public function input_register_pembimbing() {
		// $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|max_length[9]');
		// $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[16]');
		// $this->form_validation->set_rules('confirmpassword', 'Konfirmasi Password', 'required|min_length[8]|max_length[16]');
		// $this->form_validation->set_rules('nama', 'Nama', 'required|alpha');
		// $this->form_validation->set_rules('roles', 'Roles', 'required');
		// $this->form_validation->set_rules('nimteman1', 'NIM Teman 1', 'requirednumeric|max_length[9]');
		// $this->form_validation->set_rules('nimteman2', 'NIM Teman 2', 'required|min_length[4]|max_length[15]');

		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$confpassword = $this->input->post('confirmpassword');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nowhatsapp = $this->input->post('nowhatsapp');
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		// $roles = $this->input->post('roles');
		$nimteman1 = $this->input->post('nimteman1');
		// $nimteman2 = $this->input->post('nimteman2');
		// $nimteman3 = $this->input->post('nimteman3');
		// $nimteman4 = $this->input->post('nimteman4');

		$matchnim = $this->M_admin->get($nim);
      // print_r($proposal[0]->proposal); die;

      $path = $matchnim[0]->matchnim;

      if(file_exists($path)){
		$this->session->set_flashdata('error_msg', 'NIM sudah ada.');
		redirect('Auth/register');
	  } elseif ($password != $confpassword){
			$this->session->set_flashdata('error_msg', 'Password tidak sama.');
			redirect('Auth/register');
		} elseif ($nim == ''){
			$this->session->set_flashdata('error_msg', 'NIM wajib diisi');
			redirect('Auth/register');
		} elseif ($password == ''){
			$this->session->set_flashdata('error_msg', 'Password wajib diisi');
			redirect('Auth/register');
		} elseif ($nama == ''){
			$this->session->set_flashdata('error_msg', 'Nama wajib diisi');
			redirect('Auth/register');
		} elseif ($nowhatsapp == ''){
			$this->session->set_flashdata('error_msg', 'No Whatsapp wajib diisi');
			redirect('Auth/register');
		} elseif ($email == ''){
			$this->session->set_flashdata('error_msg', 'Email wajib diisi');
			redirect('Auth/register');
		} elseif ($jurusan == ''){
			$this->session->set_flashdata('error_msg', 'Jurusan wajib diisi');
			redirect('Auth/register');
		} elseif ($prodi == ''){
			$this->session->set_flashdata('error_msg', 'Prodi wajib diisi');
			redirect('Auth/register');
		} elseif ($nimteman1 == ''){
			$this->session->set_flashdata('error_msg', 'NIM Ketua Tim wajib diisi');
			redirect('Auth/register');
		}

		$values_register = array(
			'username' => $nim,
			'password' => md5($password),
			'nama' => $nama,
			'email' => $email,
			'jurusanid' => $jurusan,
			'prodiid' => $prodi,
			'nowhatsapp' => $nowhatsapp,
			'roleid' => '2',
			'nimteman1' => $nimteman1,
		);

		$registersuccess = $this->db->insert('admin', $values_register);
		
		if ($registersuccess){
		    $this->session->set_flashdata('error_msg', 'Register Sukses. Silahkan Login.');
			redirect('Auth/register');
		}
		
// 		redirect('Auth/register');
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$data = $this->M_auth->login($username, $password);

			if ($data == false) {
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('Auth');
			} else {
				$session = [
					'userdata' => $data,
					'status' => "Loged in"
				];
				$this->session->set_userdata($session);
				redirect('Home');
			}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */