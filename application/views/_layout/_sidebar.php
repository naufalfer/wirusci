<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <p><?php echo $userdata->roleid; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

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