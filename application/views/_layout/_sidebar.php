<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <li <?php if ($userdata->roleid == '1' OR $userdata->roleid == '4' OR $userdata->roleid == '3'){ ?>>
        <a href="<?php echo base_url('Pegawai'); ?>">
          <i class="fa fa-user"></i>
          <span>Pengajuan Awal (Soal)</span>
        </a>
      </li> <?php } ?>

      <li <?php if ($userdata->roleid == '1' OR $userdata->roleid == '4' OR $userdata->roleid == '3'){ ?>>
        <a href="<?php echo base_url('Posisi'); ?>">
          <i class="fa fa-user"></i>
          <span>Status Pengajuan</span>
        </a>
      </li> <?php } ?>

      <li <?php if ($userdata->roleid == '2' OR $userdata->roleid == '4'){ ?>>
        <a href="<?php echo base_url('Kota'); ?>">
          <i class="fa fa-user"></i>
          <span>Lihat Jawaban Pengajuan</span>
        </a>
      </li> <?php } ?>

      <li <?php if ($userdata->roleid == '2' OR $userdata->roleid == '4'){ ?>>
        <a href="<?php echo base_url('Pegawai'); ?>">
          <i class="fa fa-user"></i>
          <span>Lihat Proposal Pengajuan</span>
        </a>
      </li> <?php } ?>
    
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>