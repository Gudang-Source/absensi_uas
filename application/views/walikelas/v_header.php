<!--Counter Inbox-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">US</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SMK</span>
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
              <img src="<?php echo base_url().'assets/images/logosekolah.png';?>" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $this->session->userdata('kelas'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/images/logosekolah.png';?>" class="img-circle" alt="">

                <p><?php echo $this->session->userdata('kelas'); ?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url().'walikelas/bagianadmin/logout'?>" class="btn btn-default btn-flat">Sign out</a>
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
          <a href="<?php echo base_url().'walikelas/bagianadmin'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Soal Kelas <?php 
            $kel = $this->session->userdata('kelas');
            $pe = explode(" ", $kel); echo $pe[0]; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php 
           
           $dggg = $this->db->get_where('soal', ['tingkatan'=>$pe[0]])->result(); 
            foreach ($dggg as $kddd) {
              echo '<li><a href="'.base_url().'walikelas/absen/data/'.$kel.'/'.$kddd->KodeSoal.'/'.$kddd->jurusan.'"><i class="fa fa-list"></i>'.$kddd->NamaSoal.'</a></li>';
            }
            ?>
          </ul>
        </li>
         <li>
          <a href="<?php echo base_url().'walikelas/bagianadmin/logout'?>">
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