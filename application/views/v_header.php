<!--Counter Inbox-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->db->get_where('sekolah', ['id'=>1])->row_array();
?>

<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">ABS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">ABSENSI</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'assets/images/'.$set['LogoSekolah'];?>" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_user'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/images/'.$set['LogoSekolah'];?>" class="img-circle" alt="">

                <p><?php echo $this->session->userdata('username'); ?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url().'bagianadmin/logout'?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
                <div class="pull-left">
                  <a data-toggle="modal" data-target="#ModalUbah" class="btn btn-default btn-flat">Ubah Password</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url().''?>" target="_blank" title="Lihat Website"><i class="fa fa-globe"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li>
          <a href="<?php echo base_url().'bagianadmin'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php 
          $dgg = $this->db->query("select tingkatan from siswa group by tingkatan")->result();
              foreach ($dgg as $kee) {
              $ting = $kee->tingkatan;
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Soal Kelas <?php echo $ting; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php $dggg = $this->db->get_where('soal', ['tingkatan'=>$ting])->result(); 
            foreach ($dggg as $kddd) {
              echo '<li><a href="'.base_url().'absen/data/'.$ting.'/'.$kddd->KodeSoal.'/'.$kddd->jurusan.'"><i class="fa fa-list"></i>'.$kddd->NamaSoal.'</a></li>';
            }
            ?>
          </ul>
        </li>
        <?php } ?>
        <li>
          <a href="<?php echo base_url().'absen'?>">
            <i class="fa fa-print"></i> <span>Cetak Daftar Hadir</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'kartu'?>">
            <i class="fa fa-print"></i> <span>Cetak Kartu</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php if($this->session->userdata('akses')=='O') {?>
        <li>
          <a href="<?php echo base_url().'soal'?>">
            <i class="fa fa-plus"></i> <span>Input Link Soal</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'datasiswa'?>">
            <i class="fa fa-user"></i> <span>Data Siswa / Peserta</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'datasekolah'?>">
            <i class="fa fa-gear"></i> <span>Data Sekolah</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
      <?php } else { echo ""; } ?>
        <li>
          <a href="<?php echo base_url().'datauser'?>">
            <i class="fa fa-user-plus"></i> <span>Data User</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url().'bagianadmin/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>