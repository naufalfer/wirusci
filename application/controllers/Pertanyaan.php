<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
		$this->load->model('M_fileproposal');
		$this->load->model('M_fileproposal_tahap3');
		$this->load->model('M_jawabanpertanyaan');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['dataPosisi'] = $this->M_posisi->select_all();
		$data['dataKota'] = $this->M_kota->select_all();

		$data['page'] = "pegawai";
		$data['judul'] = "Pengisian Soal";
		// $data['deskripsi'] = "Manage Data Pegawai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('pegawai/home', $data);
	}

	public function tahap1() {
		$data['userdata'] = $this->userdata;

		$user = $this->session->userdata();

		if ($user['userdata']->jenisusahaid == 1){
		$data['proposal'] = $this->M_jawabanpertanyaan->select_jenisusaha1();
		} else if ($user['userdata']->jenisusahaid == 2){
			$data['proposal'] = $this->M_jawabanpertanyaan->select_jenisusaha2();
		} else if ($user['userdata']->jenisusahaid == 3){
			$data['proposal'] = $this->M_jawabanpertanyaan->select_jenisusaha3();
		} else if ($user['userdata']->jenisusahaid == 4){
			$data['proposal'] = $this->M_jawabanpertanyaan->select_jenisusaha4();
		} else if ($user['userdata']->jenisusahaid == 5){
			$data['proposal'] = $this->M_jawabanpertanyaan->select_jenisusaha5();
		} else $data['proposal'] = $this->M_jawabanpertanyaan->select_all();

		$data['page'] = "pegawai";
		$data['judul'] = "List Jawaban Tahap 1";
		// $data['deskripsi'] = "Manage Data Pegawai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('jawabanpertanyaan', $data);
	}

	public function tahap2() {
		$data['userdata'] = $this->userdata;
		
		$user = $this->session->userdata();

		if ($user['userdata']->jenisusahaid == 1){
		$data['proposal'] = $this->M_fileproposal->select_jenisusaha1();
		} else if ($user['userdata']->jenisusahaid == 2){
			$data['proposal'] = $this->M_fileproposal->select_jenisusaha2();
		} else if ($user['userdata']->jenisusahaid == 3){
			$data['proposal'] = $this->M_fileproposal->select_jenisusaha3();
		} else if ($user['userdata']->jenisusahaid == 4){
			$data['proposal'] = $this->M_fileproposal->select_jenisusaha4();
		} else if ($user['userdata']->jenisusahaid == 5){
			$data['proposal'] = $this->M_fileproposal->select_jenisusaha5();
		} else $data['proposal'] = $this->M_fileproposal->select_all();

		$data['page'] = "pegawai";
		$data['judul'] = "List Proposal Tahap 2";
		// $data['deskripsi'] = "Manage Data Pegawai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('proposal2', $data);
	}

	public function tahap3() {
		$data['userdata'] = $this->userdata;
		
		$user = $this->session->userdata();

		if ($user['userdata']->jenisusahaid == 1){
		$data['proposal'] = $this->M_fileproposal_tahap3->select_jenisusaha1();
		} else if ($user['userdata']->jenisusahaid == 2){
			$data['proposal'] = $this->M_fileproposal_tahap3->select_jenisusaha2();
		} else if ($user['userdata']->jenisusahaid == 3){
			$data['proposal'] = $this->M_fileproposal_tahap3->select_jenisusaha3();
		} else if ($user['userdata']->jenisusahaid == 4){
			$data['proposal'] = $this->M_fileproposal_tahap3->select_jenisusaha4();
		} else if ($user['userdata']->jenisusahaid == 5){
			$data['proposal'] = $this->M_fileproposal_tahap3->select_jenisusaha5();
		} else $data['proposal'] = $this->M_fileproposal_tahap3->select_all();
      

		$data['page'] = "pegawai";
		$data['judul'] = "List Proposal Tahap 3";
		// $data['deskripsi'] = "Manage Data Pegawai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('proposal3', $data);
	}

	public function tampil() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('pegawai/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Pegawai Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataPegawai'] = $this->M_pegawai->select_by_id($id);
		$data['dataPosisi'] = $this->M_posisi->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_pegawai', 'update-pegawai', $data);
	}


	function inputData_action(){

		// $user = $this->session->userdata();
        // // print_r($user['userdata']->username);die;

        // $data = array(
        //     'nim' => $user['userdata']->username,
		// );
		
		$user = $this->session->userdata();
		$nim = $user['userdata']->username;
		$jenisusahaid = $user['jenisusahaid']->jenisusahaid;
		$no1 = $this->input->post('soal1');
		$no2 = $this->input->post('soal2');
		$no3 = $this->input->post('soal3');
		$no4 = $this->input->post('soal4');
		$no5 = $this->input->post('soal5');
		$no6 = $this->input->post('soal6');
		$no7 = $this->input->post('soal7');
		$no8 = $this->input->post('soal8');
		$no9 = $this->input->post('soal9');
		$no10 = $this->input->post('soal10');
		$no11 = $this->input->post('soal11');
		$no12 = $this->input->post('soal12');
		$no13 = $this->input->post('soal13');
		$no14 = $this->input->post('soal14');
		$no15 = $this->input->post('soal15');
		$no16 = $this->input->post('soal16');
		$no17 = $this->input->post('soal17');
		$no18 = $this->input->post('soal18');
		$no19 = $this->input->post('soal19');
		$no20 = $this->input->post('soal20');
		$no21 = $this->input->post('soal21');
		$no22 = $this->input->post('soal22');
		$no23 = $this->input->post('soal23');
		$no24 = $this->input->post('soal24');
		$no25 = $this->input->post('soal25');
		$no26 = $this->input->post('soal26');
		$no27 = $this->input->post('soal27');
		$no28 = $this->input->post('soal28');
		$no29 = $this->input->post('soal29');
		$no30 = $this->input->post('soal30');
		$no31 = $this->input->post('soal31');
		// $no26 = $this->input->post('soal1');

		$values_penjualan = array(
			'NIM' => $nim,
			'jenisusahaid' => $jenisusahaid,
			'jawabanpertanyaan1' => $no1,
			'jawabanpertanyaan2' => $no2,
			'jawabanpertanyaan3' => $no3,
			'jawabanpertanyaan4' => $no4,
			'jawabanpertanyaan5' => $no5,
			'jawabanpertanyaan6' => $no6,
			'jawabanpertanyaan7' => $no7,
			'jawabanpertanyaan8' => $no8,
			'jawabanpertanyaan9' => $no9,
			'jawabanpertanyaan10' => $no10,
			'jawabanpertanyaan11' => $no11,
			'jawabanpertanyaan12' => $no12,
			'jawabanpertanyaan13' => $no13,
			'jawabanpertanyaan14' => $no14,
			'jawabanpertanyaan15' => $no15,
			'jawabanpertanyaan16' => $no16,
			'jawabanpertanyaan17' => $no17,
			'jawabanpertanyaan18' => $no18,
			'jawabanpertanyaan19' => $no19,
			'jawabanpertanyaan20' => $no20,
			'jawabanpertanyaan21' => $no21,
			'jawabanpertanyaan22' => $no22,
			'jawabanpertanyaan23' => $no23,
			'jawabanpertanyaan24' => $no24,
			'jawabanpertanyaan25' => $no25,
			'jawabanpertanyaan26' => $no26,
			'jawabanpertanyaan27' => $no27,
			'jawabanpertanyaan28' => $no28,
			'jawabanpertanyaan29' => $no29,
			'jawabanpertanyaan30' => $no30,
			'jawabanpertanyaan31' => $no31,
		);

		$this->db->insert('jawabanpertanyaan', $values_penjualan);

		// $this->M_pegawai->input_jawaban($values_penjualan);
		// $this->cart->destroy();
		redirect("Pertanyaan");
		}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pegawai->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Pegawai Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pegawai Gagal dihapus', '20px');
		}
	}

	public function export(){
			// Load plugin PHPExcel nya
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			
			// Panggil class PHPExcel nya
			$excel = new PHPExcel();
			// Settingan awal fil excel
			$excel->getProperties()->setCreator('My Notes Code')
						 ->setLastModifiedBy('My Notes Code')
						 ->setTitle("Jawaban Pertanyaan")
						 ->setSubject("Jawaban")
						 ->setDescription("Jawaban Pertanyaan Pengusul")
						 ->setKeywords("Data Jawaban");
			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = array(
			  'font' => array('bold' => true), // Set font nya jadi bold
			  'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			  ),
			  'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			  )
			);
			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(
			  'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			  ),
			  'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			  )
			);
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
			$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
			// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			// $excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
			// Apply style header yang telah kita buat tadi ke masing-masing kolom header
			$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			// $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
			$siswa = $this->M_jawabanpertanyaan->select_all();
			$no = 1; // Untuk penomoran tabel, di awal set dengan 1
			$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->NIM);
			  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jawabanpertanyaan1);
			  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jawabanpertanyaan2);
			  // $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->filegbr);
			  
			  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			  // $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			  
			  $no++; // Tambah 1 setiap kali looping
			  $numrow++; // Tambah 1 setiap kali looping
			}
			// Set width kolom
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
			// $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
			
			// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			// Set orientasi kertas jadi LANDSCAPE
			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			// Set judul file excel nya
			$excel->getActiveSheet(0)->setTitle("Laporan Data Jawaban Pengusul");
			$excel->setActiveSheetIndex(0);
			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Jawaban Pertanyaan Semua Pengusul.xlsx"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$write->save('php://output');
		  }

		  public function exportid($id){
			// Load plugin PHPExcel nya
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			
			// Panggil class PHPExcel nya
			$excel = new PHPExcel();
			// Settingan awal fil excel
			$excel->getProperties()->setCreator('My Notes Code')
						 ->setLastModifiedBy('My Notes Code')
						 ->setTitle("Jawaban Pertanyaan")
						 ->setSubject("Jawaban")
						 ->setDescription("Jawaban Pertanyaan Pengusul")
						 ->setKeywords("Data Jawaban");
			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = array(
			  'font' => array('bold' => true), // Set font nya jadi bold
			  'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			  ),
			  'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			  )
			);
			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(
			  'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			  ),
			  'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			  )
			);
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
			$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
			// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIM"); // Set kolom B3 dengan tulisan "NIS"
			// $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "JAWABAN PERTANYAAN 1"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "JAWABAN PERTANYAAN 2"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('E3', "JAWABAN PERTANYAAN 3"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('F3', "JAWABAN PERTANYAAN 4"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('G3', "JAWABAN PERTANYAAN 5"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('H3', "JAWABAN PERTANYAAN 6"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('I3', "JAWABAN PERTANYAAN 7"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('J3', "JAWABAN PERTANYAAN 8"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('K3', "JAWABAN PERTANYAAN 9"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('L3', "JAWABAN PERTANYAAN 10"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('M3', "JAWABAN PERTANYAAN 11"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('N3', "JAWABAN PERTANYAAN 12"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('O3', "JAWABAN PERTANYAAN 13"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('P3', "JAWABAN PERTANYAAN 14"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('Q3', "JAWABAN PERTANYAAN 15"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('R3', "JAWABAN PERTANYAAN 16"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('S3', "JAWABAN PERTANYAAN 17"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('T3', "JAWABAN PERTANYAAN 18"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('U3', "JAWABAN PERTANYAAN 19"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('V3', "JAWABAN PERTANYAAN 20"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('W3', "JAWABAN PERTANYAAN 21"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('X3', "JAWABAN PERTANYAAN 22"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('Y3', "JAWABAN PERTANYAAN 23"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('Z3', "JAWABAN PERTANYAAN 24"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('AA3', "JAWABAN PERTANYAAN 25"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('AB3', "JAWABAN PERTANYAAN 26"); // Set kolom A3 dengan tulisan "NO"
			$excel->setActiveSheetIndex(0)->setCellValue('AC3', "JAWABAN PERTANYAAN 27"); // Set kolom B3 dengan tulisan "NIS"
			$excel->setActiveSheetIndex(0)->setCellValue('AD3', "JAWABAN PERTANYAAN 28"); // Set kolom C3 dengan tulisan "NAMA"
			$excel->setActiveSheetIndex(0)->setCellValue('AE3', "JAWABAN PERTANYAAN 29"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
			$excel->setActiveSheetIndex(0)->setCellValue('AF3', "JAWABAN PERTANYAAN 30"); // Set kolom E3 dengan tulisan "ALAMAT"
			$excel->setActiveSheetIndex(0)->setCellValue('AG3', "JAWABAN PERTANYAAN 31"); // Set kolom E3 dengan tulisan "ALAMAT"
			// Apply style header yang telah kita buat tadi ke masing-masing kolom header
			$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AA3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AB3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AC3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AD3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AE3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AF3')->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AG3')->applyFromArray($style_row);

			// $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
			// $siswa = $this->M_jawabanpertanyaan->select_all();
			$siswa = $this->M_jawabanpertanyaan->get($id);
			$no = 1; // Untuk penomoran tabel, di awal set dengan 1
			$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->NIM);
			  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jawabanpertanyaan1);
			  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jawabanpertanyaan2);
			  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jawabanpertanyaan3);
			  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jawabanpertanyaan4);
			  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jawabanpertanyaan5);
			  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->jawabanpertanyaan6);
			  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->jawabanpertanyaan7);
			  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->jawabanpertanyaan8);
			  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->jawabanpertanyaan9);
			  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->jawabanpertanyaan10);
			  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->jawabanpertanyaan11);
			  $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->jawabanpertanyaan12);
			  $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->jawabanpertanyaan13);
			  $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->jawabanpertanyaan14);
			  $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->jawabanpertanyaan15);
			  $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->jawabanpertanyaan16);
			  $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->jawabanpertanyaan17);
			  $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->jawabanpertanyaan18);
			  $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->jawabanpertanyaan19);
			  $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->jawabanpertanyaan20);
			  $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->jawabanpertanyaan21);
			  $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->jawabanpertanyaan22);
			  $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->jawabanpertanyaan23);
			  $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->jawabanpertanyaan24);
			  $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->jawabanpertanyaan25);
			  $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->jawabanpertanyaan26);
			  $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->jawabanpertanyaan27);
			  $excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->jawabanpertanyaan28);
			  $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->jawabanpertanyaan29);
			  $excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data->jawabanpertanyaan30);
			  $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->jawabanpertanyaan31);

			  // $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->filegbr);
			  
			  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('AD'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('AF'.$numrow)->applyFromArray($style_row);
			  $excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);

			  // $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			  
			  $no++; // Tambah 1 setiap kali looping
			  $numrow++; // Tambah 1 setiap kali looping
			}
			// Set width kolom
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('J')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('L')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('M')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('N')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('O')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('P')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('R')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('S')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('T')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('U')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('V')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('W')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('X')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('AC')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('AD')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('AE')->setWidth(25); // Set width kolom C
			$excel->getActiveSheet()->getColumnDimension('AF')->setWidth(25); // Set width kolom D
			$excel->getActiveSheet()->getColumnDimension('AG')->setWidth(25); // Set width kolom C
			// $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D

			// $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
			
			// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			// Set orientasi kertas jadi LANDSCAPE
			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			// Set judul file excel nya
			$excel->getActiveSheet(0)->setTitle("Laporan Data Jawaban Pengusul");
			$excel->setActiveSheetIndex(0);
			// Proses file excel
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Jawaban Pertanyaan Pengusul.xlsx"'); // Set nama file excel nya
			header('Cache-Control: max-age=0');
			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$write->save('php://output');
		  }

	public function export2() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_jawabanpertanyaan->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "No");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "NIM");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Jawaban Pertanyaan 1");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Jawaban Pertanyaan 2");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Jawaban Pertanyaan 3");
		// $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Jawaban Pertanyaan 4");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->NIM); 
		    // $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$rowCount, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->jawabanpertanyaan1); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->jawabanpertanyaan2); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->jawabanpertanyaan3); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->jawabanpertanyaan4); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pegawai.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pegawai.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$id = md5(DATE('ymdhms').rand());
						$check = $this->M_pegawai->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['nama'] = ucwords($value['B']);
							$resultData[$index]['telp'] = $value['C'];
							$resultData[$index]['id_kota'] = $value['D'];
							$resultData[$index]['id_kelamin'] = $value['E'];
							$resultData[$index]['id_posisi'] = $value['F'];
							$resultData[$index]['status'] = $value['G'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_pegawai->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Pegawai Berhasil diimport ke database'));
						redirect('Pegawai');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Pegawai Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Pegawai');
				}

			}
		}
   }
   
   public function download_proposal($id){
      $proposal = $this->M_fileproposal->get($id);
      // print_r($proposal[0]->proposal); die;

      $path = $proposal[0]->proposal;

      if(file_exists($path))
         {
         header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header('Content-Disposition: attachment; filename='.basename($path));
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($path));
         ob_clean();
         flush();
         readfile($path);
         exit;
      }else{
         $this->session->set_flashdata('msg', show_msg('File tidak ditemukan)', 'warning', 'fa-warning'));
			redirect('Pertanyaan/tahap2');
      }
   }

   public function download_proposal_tahap3($id){
      $proposal = $this->M_fileproposal_tahap3->get($id);
      // print_r($proposal[0]->proposal); die;

      $path = $proposal[0]->proposal;

      if(file_exists($path))
         {
         header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header('Content-Disposition: attachment; filename='.basename($path));
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($path));
         ob_clean();
         flush();
         readfile($path);
         exit;
      }else{
         $this->session->set_flashdata('msg', show_msg('File tidak ditemukan)', 'warning', 'fa-warning'));
			redirect('Pertanyaan/tahap3');
      }
   }
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */