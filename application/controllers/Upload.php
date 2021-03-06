<?php 
 
class Upload extends CI_Controller{
 
	function __construct(){
		parent::__construct();
          $this->load->helper(array('form', 'url'));
        //   $this->_ci = &get_instance();
	}
 
	public function index(){
	    $data['userdata'] = $this->userdata;
	    
		$this->load->view('v_upload', array('error' => ' ' ));
    }

    function saveGuru(){
                
		$nim=$this->input->post('nim');
		// $username=$this->input->post('username');
		// $alamat=$this->input->post('alamat');
		// $email=$this->input->post('email');


		//upload photo
		$config['max_size']=2048;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
		$config['overwritue']=TRUE;
		$config['upload_path']='./img/';

		$this->load->library('upload');
		$this->upload->initialize($config);

		//ambil data image
		$this->upload->do_upload('photo');
		$data_image=$this->upload->data('file_name');
		$location=base_url().'img/';
		$pict=$location.$data_image;


		$guru=array(
			'nim'=>$nim,
			// 'username'=>$username,
			// 'alamat'=>$alamat,
			// 'password'=> md5($nip),
			// 'email'=>$email,
			'proposal'=> $pict,
			// 'level'=> '1'
			);
		//simpan data 
		$this->db->insert('fileproposal',$guru);

		redirect('Posisi');
	}
    
		public function upload(){
			$config['upload_path']          = './img/';
		    $config['allowed_types']        = 'doc|docx|pdf';
		    $config['max_size']             = 10000;
		    $config['max_width']            = 1024;
		    $config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
            if ( !$this->upload->do_upload('photo')) //sesuai dengan name pada form 
            {
                   echo 'anda gagal upload';
            }
            else
            {
            	//tampung data dari form
            	$nim = $this->input->post('nim');
            	// $harga = $this->input->post('harga');
            	$file = $this->upload->data();
            	$gambar = $file['file_name'];
 
                $indonesia=array(
			        'nim' => $nim,
			        // 'harga' => $harga,
			        'proposal' => $gambar
				);
				// $this->session->set_flashdata('msg','data berhasil di upload');
				redirect('Posisi');
 
            }
        }
    
    public function tambah_aksi()
	{
		$data = array(
            'nim' => $this->input->post('nim'),
        );
        
		if (!empty($_FILES['aksi_upload']['name'])) {
			$upload = $this->_do_upload();
			$data['proposal'] = $upload;
        }
        
        // if (!empty($_FILES['ppt']['name'])) {
		// 	$upload = $this->_do_upload();
		// 	$data['ppt'] = $upload;
        // }
        
		$this->db->insert('fileproposal',$data);
		redirect('landingpage', $data);
	}
 
	public function aksi_upload(){
		$config['upload_path']          = './img/';
		$config['allowed_types']        = 'png|jpg|gif';
		$config['max_size']             = 10000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('proposal')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('posisi/home', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('landingpage', $data);
        }
        
        // if ( ! $this->upload->do_upload('ppt')){
		// 	$error = array('error' => $this->upload->display_errors());
		// 	$this->load->view('v_upload', $error);
		// }else{
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$this->load->view('landingpage', $data);
		// }

    }

    function multiple_upload(){
        $config['upload_path']   = './uploads/'; 
        //$config['allowed_types'] = 'gif|jpg|png'; 
        //$config['max_size']      = 100; 
        //$config['max_width']     = 1024; 
        //$config['max_height']    = 768;  
        $this->load->library('upload', $config);
        // script upload file pertama
        $this->upload->do_upload('file1');
        $file1 = $this->upload->data();
        echo "<pre>";
        print_r($file1);
        echo "</pre>";
        
        // script uplaod file kedua
        $this->upload->do_upload('file2');
        $file2 = $this->upload->data();
        echo "<pre>";
        print_r($file2);
        echo "</pre>";
   }
    
    function do_upload() {
        // setting konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1
        $this->upload->do_upload('gambar');
        $result1 = $this->upload->data();
        // upload gambar 2
        $this->upload->do_upload('gambar2');
        $result2 = $this->upload->data();
        // upload gambar 1
        $this->upload->do_upload('gambar3');
        $result3 = $this->upload->data();
        // menyimpan hasil upload
        $result = array('gambar1'=>$result1,'gambar2'=>$result2,'gambar3'=>$result3);
        // menampilkan hasil upload
        echo "<pre>";
        print_r($result);
        echo "</pre>";
        // cara akses file name dari gambar 1
        echo  $result['gambar1']['file_name'];
        // cara akses file name dari gambar 1
        echo  $result['gambar2']['file_name'];
        // cara akses file name dari gambar 1
        echo  $result['gambar3']['file_name'];
    }

    public function upload_malasngoding(){
        $user = $this->session->userdata();
        $data = array(
			'nim' => $user['userdata']->username,
			'jenisusahaid' => $user['userdata']->jenisusahaid,
        );

        if(!empty($_FILES['proposal']['name'])){
			$ekstensi_diperbolehkan	= array('pdf','docx','doc');
			$nama = basename($_FILES["proposal"]["name"]);
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['proposal']['size'];
			$file_tmp = $_FILES['proposal']['tmp_name'];	
            // $directory = '.../../proposaltahap3/';
            $directory = realpath(APPPATH . '../proposaltahap2');
            
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){		
                    // print_r($directory.$nama);die;	
                    move_uploaded_file($file_tmp, $directory.'/'.$nama);
                    $data['proposal'] = realpath($directory.'/'.$nama);
                    // move_uploaded_file($file_tmp, $directory.$nama);
                    // $data['proposal'] = $directory.$nama;
                    // $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
                    $uploadsuccess = $this->db->insert('fileproposal', $data);
                    if($uploadsuccess){
                        $this->session->set_flashdata('msg', show_msg('File berhasil diupload)', 'success', 'fa-success'));
                    redirect('Posisi', $data);
                    }
				    } else
				{
				    $this->session->set_flashdata('msg', show_msg('Ukuran file terlalu besar.)', 'warning', 'fa-warning'));
				// 	echo 'UKURAN FILE TERLALU BESAR';
					redirect('Posisi');
				}
			}else{
			     $this->session->set_flashdata('msg', show_msg('Ekstensi file harus PDF/doc/docx)', 'warning', 'fa-warning'));
			     //$wewe = ($out['msg'] = show_succ_msg('Data Pegawai Berhasil ditambahkan', '20px'));
				// 	echo 'UKURAN FILE TERLALU BESAR';
					redirect('Posisi');
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
    }

    public function upload_malasngoding2(){
        $user = $this->session->userdata();
        // print_r($user['userdata']->username);die;

        $data = array(
			'nim' => $user['userdata']->username,
			'jenisusahaid' => $user['userdata']->jenisusahaid,
        );

        if(!empty($_FILES['proposal']['name'])){
			$ekstensi_diperbolehkan	= array('pdf','docx','doc');
			$nama = basename($_FILES["proposal"]["name"]);
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['proposal']['size'];
			$file_tmp = $_FILES['proposal']['tmp_name'];	
            // $directory = '.../../proposaltahap3/';
            $directory = realpath(APPPATH . '../proposaltahap3');
            // $file_tmp = $_FILES['proposal']['tmp_name'];	
            // $directory = 'C:\xampp\htdocs\wirusci\proposaltahap3\\';
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){		
                    // print_r($directory.$nama);die;	
                    move_uploaded_file($file_tmp, $directory.'/'.$nama);
                    $data['proposal'] = realpath($directory.'/'.$nama);
                    $uploadsuccess = $this->db->insert('fileproposaltahap3', $data);
                     if($uploadsuccess){
                        $this->session->set_flashdata('msg', show_msg('File berhasil diupload)', 'success', 'fa-success'));
                    redirect('Posisi', $data);
                    }
				    } else{
				    $this->session->set_flashdata('msg', show_msg('Ukuran file terlalu besar.)', 'warning', 'fa-warning'));
				    redirect('Posisi');
				// 	echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
			    $this->session->set_flashdata('msg', show_msg('Ekstensi file harus PDF/doc/docx)', 'warning', 'fa-warning'));
				// 	echo 'UKURAN FILE TERLALU BESAR';
					redirect('Posisi');
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
    }

    public function download($id){
        $query = $this->db->get_where('files',array('id'=>$id));
        return $query->row_array();
       }
	
}