<!--Counter Inbox-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->db->get_where('sekolah', ['id'=>1])->row_array();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ujian Sekolah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" href="<?php echo base_url().'assets/images/'.$set['LogoSekolah'];?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!--Header-->
  <?php
    $this->load->view('v_header');
  ?>

  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="<?php echo base_url('kartu/cetak'); ?>" class="btn btn-primary" target="_blank">
        <span class='fa fa-print'></span> Cetak Kartu
      </a>
    </section>

    <!-- Main content -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          
            <?php echo $this->session->flashdata('notif') ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table>
                  <?php
                    $kolom = 2;
                    $i=1;
                    foreach ($soa->result_array() as $dt) :
                      if(($i) % $kolom== 1) {    
                      echo'<tr>';   
                    }
                    ?>
            
                  <td width="64"> </td>
                  <td>
<br/>               
<table cellpadding="0" cellspacing="0" style="border:1px #000 solid; border-collapse: collapse; width: 400px;">
<tr>
  <td>
<table width="100%">
<tr>
  <td align="center" width="22%"><center><img src="<?php echo base_url().'assets/images/'.$set['LogoSekolah'];?>" width='60px' style='padding-top:5px;'></center></td>
  <td align="center" style="font-weight:bold; font-size:18px;">KARTU LOGIN PESERTA<br/><?php echo $set['NamaSekolah']; ?></td>
  <td width="15%"></td>
 </tr>
</table><hr style="border-top: 3px double #000; border-bottom: 1.5px solid #000; padding:none; height:none; top:none;" width="98%">
  </td>
 </tr>
<tr>
  <td>
    <table width="85%" style="margin: 0 auto;">
      <tr><td>Nama</td><td>: <?php echo $dt['nama_siswa']; ?></td></tr>
      <tr><td>Kelas</td><td>: <?php echo $dt['kelas']; ?></td></tr>
      <tr><td>Username</td><td>: <?php echo $dt['no_peserta']; ?></td></tr>
      <tr><td>Password</td><td>: <?php echo $dt['no_peserta']; ?></td></tr>
    </table><br/>
  </td>
</tr>
<tr>
  <td>
    <table style="width:60%; float:right;">
      <tr><td>Kepala <?php echo $set['NamaSekolah']; ?></td></tr>
      <tr><td height="20px;"></td></tr>
      <tr><td>..................</td></tr>
    </table>
  </td>
</tr>
<tr>
  <td height="4px;"></td>
 </tr>
</table>
<br/>

                  </td>
                
        <?php     
        if(($i) % $kolom== 0) {    
        echo'</tr>';    
              } $i++; endforeach;?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    $this->load->view('v_footer');
  ?>


</div>
<!-- ./wrapper -->


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>

    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Data berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
