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

      <li <?php  $user = $this->session->userdata();
      if (($userdata->roleid == '1' OR $userdata->roleid == '4' OR $userdata->roleid == '3') AND $user['userdata']->statusid == 0 ){ ?>>
        <a href="<?php echo base_url('Pertanyaan'); ?>">
          <i class="fa fa-user"></i>
          <span>Pengajuan Tahap 1</span>
        </a>
      </li> <?php } ?>

      <li <?php $user = $this->session->userdata();
      if (($userdata->roleid == '1' OR $userdata->roleid == '4' OR $userdata->roleid == '3') AND $user['userdata']->statusid == 1 ){ ?>>
        <a href="<?php echo base_url('Posisi'); ?>">
          <i class="fa fa-user"></i>
          <span>Pengajuan Tahap 2</span>
        </a>
      </li> <?php } ?>

      <li <?php $user = $this->session->userdata();
      if (($userdata->roleid == '1' OR $userdata->roleid == '4' OR $userdata->roleid == '3') AND $user['userdata']->statusid == 2 ){ ?>>
        <a href="<?php echo base_url('Posisi/tahap_3'); ?>">
          <i class="fa fa-user"></i>
          <span>Pengajuan Tahap 3</span>
        </a>
      </li> <?php } ?>

      <li <?php if ($userdata->roleid == '2' OR $userdata->roleid == '4'){ ?>>
        <a href="<?php echo base_url('Pertanyaan/tahap1'); ?>">
          <i class="fa fa-user"></i>
          <span>Jawaban Tahap 1</span>
        </a>
      </li> <?php } ?>

      <li <?php if ($userdata->roleid == '2' OR $userdata->roleid == '4'){ ?>>
        <a href="<?php echo base_url('Pertanyaan/tahap2'); ?>">
          <i class="fa fa-user"></i>
          <span>Proposal Pengajuan Tahap 2</span>
        </a>
      </li> <?php } ?>

      <li <?php if ($userdata->roleid == '2' OR $userdata->roleid == '4'){ ?>>
        <a href="<?php echo base_url('Pertanyaan/tahap3'); ?>">
          <i class="fa fa-user"></i>
          <span>Proposal Pengajuan Tahap 3</span>
        </a>
      </li> <?php } ?>

      <li <?php if ($userdata->roleid == '2' OR $userdata->roleid == '4'){ ?>>
        <a href="<?php echo base_url('Kota'); ?>">
          <i class="fa fa-user"></i>
          <span>Set Lolos</span>
        </a>
      </li> <?php } ?>

      <li>
        <a href="<?php echo base_url('Auth/logout'); ?>">
          <i class="fa fa-user"></i>
          <span>Logout</span>
        </a>
      </li>
    
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>