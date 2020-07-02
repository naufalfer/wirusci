<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kewirausahaan | Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color:#00c2c7" class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><b>Register Kewirausahaan</b></a>
      </div>
      
    <!--  <div class="msg" style="display:none;">-->
    <!--  <?php echo @$this->session->flashdata('msg'); ?>-->
    <!--</div>-->

      <?php
        echo show_err_msg($this->session->flashdata('error_msg'));
      ?>

      <!-- /.login-logo -->
      <div class="login-box-body">
        <!-- <p class="login-box-msg">
          <!-- <a href='halamanlogin'><b>Register Mahasiswa</b></center></a> |  -->
          <!-- <a href='halamanlogin'><b>Register Pembimbing</b></center></a> -->
        <!-- <a href='halamanlogin'><center><b></b></center></a> -->

        <?php echo validation_errors(); ?>

        <form action="<?php echo base_url('Auth/input_register'); ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="NIM/NIP" name="nim">
            <span class="fa fa-magic form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="confirmpassword">
            <span class="fa fa-unlock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
           <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="number" class="form-control" placeholder="Nomor WhatsApp" name="nowhatsapp">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <label for="jurusan">Jurusan      : </label>
          <div class="form-group has-feedback">
                    <div class="form-control">
                      <!-- <div class="row"> -->
                        <!-- <div class="col-md-3"> -->
                            <!-- <label for="jurusan">Jurusan      : </label> -->
                            <select class="form-group has-feedback" id="jurusan" name="jurusan">Pilih Jurusan
                              <option value="0">Pilih Jurusan</option>
                                <option value="1">Teknik Mesin</option>
                                <option value="2">Teknik Elektro</option>
                                <option value="3">Teknik Sipil</option>
                                <option value="4">Teknik Energi</option>
                                <option value="5">Teknik Refrigasi</option>
                                <option value="6">Teknik Kimia</option>
                                <option value="7">Teknik Informatika</option>
                                <option value="8">Bahasa Inggris</option>
                                <option value="9">Akuntansi</option>
                                <option value="10">Administrasi Niaga</option>
                            </select>
            
                        <!-- </div> -->
                    </div>
                </div>

            <label for="prodi">Program Studi  : </label>
            <div class="form-group has-feedback" >
                    <div class="form-control">
                      <!-- <div class="row"> -->
                        <!-- <div class="col-md-3"> -->
                            <select class="form-group has-feedback" id="proditekniksipil" name="proditekniksipil" style="display:none;">Pilih Prodi
                                <option value="1">D4 - Teknik Perancangan Jalan dan Jembatan</option>
                                <option value="2">D4 - Teknik Perawatan dan Perbaikan Gedung</option>
                                <option value="3">D3 - Teknik Konstruksi Sipil</option>
                                <option value="4">D3 - Teknik Konstruksi Gedung</option>
                            </select>
                            <select class="form-group has-feedback" id="proditeknikmesin" name="proditeknikmesin" style="display:none;">Pilih Prodi
                                <option value="5">D4 - Teknik Perancangan dan Konstruksi Mesin</option>
                                <option value="6">D4 - Proses Manufaktur</option>
                                <option value="7">D3 - Teknik Mesin</option>
                                <option value="8">D3 - Teknik Aeronautika</option>
                            </select>
                            <select class="form-group has-feedback" id="proditeknikelektro" name="proditeknikelektro" style="display:none;">Pilih Prodi
                                <option value="9">D4 - Teknik Elektronika</option>
                                <option value="10">D3 - Teknik Elektronika</option>
                                <option value="11">D4 - Teknik Otomasi Industri</option>
                                <option value="12">D3 - Teknik Listrik</option>
                                <option value="13">D4 - Teknik Telekomunikasi</option>
                                <option value="14">D3 - Teknik Telekomunikasi</option>
                            </select>
                            <select class="form-group has-feedback" id="proditeknikkimia" name="proditeknikelektro" style="display:none;">Pilih Prodi
                                <option value="15">D4 - Teknik Kimia Produksi Bersih</option>
                                <option value="16">D3 - Teknik Kimia</option>
                                <option value="17">D3 - Analis Kimia</option>
                            </select>
                            <select class="form-group has-feedback" id="proditeknikinformatika" name="proditeknikelektro" style="display:none;">Pilih Prodi
                                <option value="18">D4 - Teknik Informatika</option>
                                <option value="19">D3 - Teknik Informatika</option>
                            </select>
                            <select class="form-group has-feedback" id="proditeknikrefrigerasi" name="proditeknikelektro" style="display:none;">Pilih Prodi
                                <option value="20">D4 - Teknik Pendingin dan Tata Udara</option>
                                <option value="21">D3 - Teknik Pendingin dan Tata Udara</option>
                            </select>
                            <select class="form-group has-feedback" id="proditeknikenergi" name="proditeknikelektro" style="display:none;">Pilih Prodi
                                <option value="22">D4 - Teknologi Pembangkit Tenaga Listrik</option>
                                <option value="24">D4 - Teknik Konservasi Energi</option>
                                <option value="25">D3 - Teknik Konversi Energi</option>
                            </select>
                            <select class="form-group has-feedback" id="prodiakuntansi" name="proditeknikelektro" style="display:none;">Pilih Prodi
                                <option value="26">D4 - Akuntansi Manajemen Pemerintahan</option>
                                <option value="27">D4 - Akuntansi</option>
                                <option value="28">D3 - Akuntansi</option>
                                <option value="29">D4 - Keuangan Syariah</option>
                                <option value="30">D3 - Keuangan dan Perbankan</option>
                            </select>
                            <select class="form-group has-feedback" id="prodian" name="proditeknikelektro" style="display:none;">Pilih Prodi
                                <option value="31">D4 - Administrasi Bisnis</option>
                                <option value="32">D3 - Administrasi Bisnis</option>
                                <option value="33">D4 - Manajemen Pemasaran</option>
                                <option value="34">D3 - Manajemen Pemasaran</option>
                                <option value="35">D4 - Manajemen Aset</option>
                                <option value="36">D3 - Usaha Perjalanan Wisata</option>
                            </select>
                            <select class="form-group has-feedback" id="prodiinggris" name="proditeknikelektro" style="display:none;">Pilih Prodi
                                <option value="37">D3 - Bahasa Inggris</option>
                            </select>
            
                        <!-- </div> -->
                    </div>
                </div>

          <!-- Single button -->

          <label for="roles">Roles      : </label>
          <div class="form-group has-feedback">
                    <div class="form-control">
                      <!-- <div class="row"> -->
                        <!-- <div class="col-md-3"> -->
                            <!-- <label for="roles">Roles      : </label> -->
                            <select class="form-group has-feedback" id="roles" name="roles">Pilih Roles
                                <option value="1">Mahasiswa</option>
                                <option value="2">Pembimbing</option>
                                <!-- <option value="3">Reviewer</option> -->
                            </select>
                        <!-- </div> -->
                    </div>
          </div>

          <label for="jenisusaha">Jenis Usaha     : </label>
          <div class="form-group has-feedback">
                    <div class="form-control">
                      <!-- <div class="row"> -->
                        <!-- <div class="col-md-3"> -->
                            <!-- <label for="jurusan">Jenis Usaha     : </label> -->
                            <select class="form-group has-feedback" id="jenisusaha" name="jenisusaha">Pilih Jenis Usaha
                                <option value="1">Industri Berbasis Teknologi</option>
                                <option value="2">Industri Kreatif</option>
                                <option value="3">Industri Makanan dan Minuman (Kuliner)</option>
                                <option value="4">Industri Produksi/Budi-daya</option>
                                <option value="5">Industri Jasa dan Perdagangan</option>
                            </select>
                        <!-- </div> -->
                    </div>
                </div>

          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="NIM Anggota 1" name="nimteman1">
            <span class="fa fa-users form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="NIM Anggota 2" name="nimteman2">
            <span class="fa fa-users form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="NIM Anggota 3" name="nimteman3">
            <span class="fa fa-users form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="NIM Anggota 4" name="nimteman4">
            <span class="fa fa-users form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- <div class="login-logo"> -->
            </br>
            </br>,.
                <a href='halamanlogin'><center><b>Sudah punya akun? Login</b></center></a>
          </div>
        </form>
      </div>
      <!-- /.login-box-body -->
    </div>
    

    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <!-- <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script> -->
    <!-- <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script> -->
    <script>
    $('#jurusan').change(function(){
   selection = $(this).val();    
   switch(selection)
   { 
       case '1':
           $('#proditeknikmesin').show();
           break;
       default:
           $('#proditeknikmesin').hide();
           break;
   }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '2':
            $('#proditeknikelektro').show();
            break;
        default:
            $('#proditeknikelektro').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '3':
            $('#proditekniksipil').show();
            break;
        default:
            $('#proditekniksipil').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '4':
            $('#proditeknikenergi').show();
            break;
        default:
            $('#proditeknikenergi').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '5':
            $('#proditeknikrefrigerasi').show();
            break;
        default:
            $('#proditeknikrefrigerasi').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '6':
            $('#proditeknikkimia').show();
            break;
        default:
            $('#proditeknikkimia').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '7':
            $('#proditeknikinformatika').show();
            break;
        default:
            $('#proditeknikinformatika').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '8':
            $('#prodiinggris').show();
            break;
        default:
            $('#prodiinggris').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '9':
            $('#prodiakuntansi').show();
            break;
        default:
            $('#prodiakuntansi').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '10':
            $('#prodian').show();
            break;
        default:
            $('#prodian').hide();
            break;
    }
  });
  $('#jurusan').change(function(){
    selection = $(this).val();    
    switch(selection)
    { 
        case '2':
            $('#proditeknikelektro').show();
            break;
        default:
            $('#proditeknikelektro').hide();
            break;
    }
  });
</script>
  </body>
</html>
