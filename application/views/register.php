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

            <label for="roles">Program Studi  : </label>
            <div class="form-group has-feedback">
                    <div class="form-control">
                      <!-- <div class="row"> -->
                        <!-- <div class="col-md-3"> -->
                            <select class="form-group has-feedback" id="prodi" name="prodi">Pilih Prodi
                                <option value="1">Teknik Sipil / D4 - Teknik Perancangan Jalan dan Jembatan</option>
                                <option value="2">Teknik Sipil / D4 - Teknik Perawatan dan Perbaikan Gedung</option>
                                <option value="3">Teknik Sipil / D3 - Teknik Konstruksi Sipil</option>
                                <option value="4">Teknik Sipil / D3 - Teknik Konstruksi Gedung</option>
                                <option value="5">Teknik Mesin / D4 - Teknik Perancangan dan Konstruksi Mesin</option>
                                <option value="6">Teknik Mesin / D4 - Proses Manufaktur</option>
                                <option value="7">Teknik Mesin / D3 - Teknik Mesin</option>
                                <option value="8">Teknik Mesin / D3 - Teknik Aeronautika</option>
                                <option value="9">Teknik Elektro / D4 - Teknik Elektronika</option>
                                <option value="10">Teknik Elektro / D3 - Teknik Elektronika</option>
                                <option value="11">Teknik Elektro / D4 - Teknik Otomasi Industri</option>
                                <option value="12">Teknik Elektro / D3 - Teknik Listrik</option>
                                <option value="13">Teknik Elektro / D4 - Teknik Telekomunikasi</option>
                                <option value="14">Teknik Elektro / D3 - Teknik Telekomunikasi</option>
                                <option value="15">Teknik Kimia / D4 - Teknik Kimia Produksi Bersih</option>
                                <option value="16">Teknik Kimia / D3 - Teknik Kimia</option>
                                <option value="17">Teknik Kimia / D3 - Analis Kimia</option>
                                <option value="18">Teknik Komputer dan Informatika / D4 - Teknik Informatika</option>
                                <option value="19">Teknik Komputer dan Informatika / D3 - Teknik Informatika</option>
                                <option value="20">Teknik Refrigerasi dan Tata Udara / D4 - Teknik Pendingin dan Tata Udara</option>
                                <option value="21">Teknik Refrigerasi dan Tata Udara / D3 - Teknik Pendingin dan Tata Udara</option>
                                <option value="22">Teknik Konversi Energi / D4 - Teknologi Pembangkit Tenaga Listrik</option>
                                <option value="23">Teknik Konversi Energi / D4 - Teknologi Pembangkit Tenaga Listrik (Kerja Sama POLBAN - PT PLN)</option>
                                <option value="24">Teknik Konversi Energi / D4 - Teknik Konservasi Energi</option>
                                <option value="25">Teknik Konversi Energi / D3 - Teknik Konversi Energi</option>
                                <option value="26">Akuntansi / D4 - Akuntansi Manajemen Pemerintahan</option>
                                <option value="27">Akuntansi / D4 - Akuntansi</option>
                                <option value="28">Akuntansi / D3 - Akuntansi</option>
                                <option value="29">Akuntansi / D4 - Keuangan Syariah</option>
                                <option value="30">Akuntansi / D3 - Keuangan dan Perbankan</option>
                                <option value="31">Administrasi Niaga / D4 - Administrasi Bisnis</option>
                                <option value="32">Administrasi Niaga / D3 - Administrasi Bisnis</option>
                                <option value="33">Administrasi Niaga / D4 - Manajemen Pemasaran</option>
                                <option value="34">Administrasi Niaga / D3 - Manajemen Pemasaran</option>
                                <option value="35">Administrasi Niaga / D4 - Manajemen Aset</option>
                                <option value="36">Administrasi Niaga / D3 - Usaha Perjalanan Wisata</option>
                                <option value="37">Bahasa Inggris / D3 - Bahasa Inggris</option>
                                <!-- <option value="38">Akuntansi / D3 - Akuntansi</option> -->
                                <!-- <option value="39">Akuntansi / D4 - Keuangan Syariah</option> -->
                                <!-- <option value="30">Akuntansi / D3 - Keuangan dan Perbankan</option> -->
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
            <!-- <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div> -->
            <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- <div class="login-logo"> -->
            </br>
            </br>,.
                <a href='halamanlogin'><center><b>Sudah punya akun? Login</b></center></a>
            <!-- </div> -->
            <!-- <div class="col-xs-offset-8 col-xs-4">
              <a href='halamanlogin'><button type="button" class="btn btn-primary btn-block btn-flat">Login</button></a>
            </div> -->
          </div>
        </form>

        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
            Google+</a>
        </div> -->
        <!-- /.social-auth-links -->

        <!-- <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->

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
  </body>
</html>
