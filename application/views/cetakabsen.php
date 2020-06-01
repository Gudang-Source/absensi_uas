<!--Counter Inbox-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->db->get_where('sekolah', ['id'=>1])->row_array();
function tgl_indo($tanggal){
  $bulan = array(
    1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
    );
  $pecah = explode('-', $tanggal);
  return $pecah[2] . ' ' . $bulan[ (int)$pecah[1] ] . ' ' . $pecah[0];
}
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ujian-Sekolah | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
 <link rel="shorcut icon" href="<?php echo base_url().'assets/images/'.$set['LogoSekolah'];?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">

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
      <h1>
        MAPEL : <?php $kkj = $map->num_rows();
        if (empty($kkj)) {
          echo "Tidak Ada Mapel Pilihan";
        } else {
         foreach ($map->result_array() as $ke) {
          echo $ke['NamaSoal'].' ('.$ke['tingkatan'].') ';
        } } ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
      </ol>
    </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
          
        </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
            <div class="box-header">
            </div>
        <div class="row">
        <form method="POST" action="<?php echo base_URL('absen'); ?>">
          <div class="col-xs-12">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
          Pilih Tingkatan : <select name="tingkata" class="form-control" id="tingkata"><option value=" ">Pilih Tingkatan</option><option value="X">X</option><option value="XI">XI</option><option value="XII">XII</option></select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
          Pilih Mapel : <select name="mapel" class="mapel form-control" id="mapel"></select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
          Pilih Kelas :  <select name="kelas" class="kelas form-control" id="kelas"></select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding-top: 20px">
          <button class="btn btn-primary" type="Submit">Cari Data</button>
          </div>
        </div>
        </form> 
        <hr>
        <?php if(!empty($kkj)) { 
          foreach ($map->result_array() as $ke) {
          ?>
         <div class="col-xs-12">
          <hr>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <h3 style="font-weight: bold">CETAK DAFTAR HADIR</h2>
          <table style="width: 98%; margin: 0 auto; font-size: 15px;"><tr><td width="150px;">Mapel</td><td width="1%">:</td><td><?php echo $ke['NamaSoal']; ?></td></tr>
          <tr><td>Kelas</td><td>:</td><td><?php echo $kela; ?></td></tr>
          <tr><td>Jadwal Mengerjakan</td><td>:</td><td><?php echo tgl_indo($ke['tanggal_uji'])." | ".$ke['waktu_awal']." s/d ".$ke['waktu_akhir']; ?></td></tr>
          </table>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 1%">
                  <form method="post" action="<?php echo base_URL('absen/cetak'); ?>" target="_blank">
                        <?php
                        echo "<input type='hidden' value='".$ke['KodeSoal']."' name='mapel'>";
                        echo "<input type='hidden' value='".$kela."' name='kelas'>";
                        echo "<button type='Submit' class='btn btn-primary' style='float:right;'><i class='fa fa-print'> Cetak Daftar Hadir </i></button>";
                        ?>
                  </form>
        </div>
      </div>
      <?php } } ?>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <hr>
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                <th>No</th>
                <th>No. Peserta</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jam Hadir</th>
                <th>TTD</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    if(!empty($kkj)) {
                    foreach ($sudah->result_array() as $i) :
                       $no++;
                    ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $i['no_peserta'];?></td>
                  <td><?php echo $i['nama_siswa'];?></td>
                  <td><?php echo $i['kelas'];?></td>
                  <td><?php echo $i['TanggalMengerjakan'].' '.$i['Jam'];?></td>
                  <td>ttd</td>
                </tr>
        <?php endforeach; ?>
                <?php
                    $no= $sudah->num_rows();
                    foreach($soa->result_array() as $i) :
                       $no++;
                    ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $i['no_peserta'];?></td>
                  <td><?php echo $i['nama_siswa'];?></td>
                  <td><?php echo $i['kelas'];?></td>
                  <td><i style='color: red'>Belum Mengerjakan</i></td>
                  <td></td>
                </tr>
        <?php endforeach; } ?>
                </tbody>
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
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>

<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tingkata').change(function(){
      var tingkata=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>absen/kelas",
        method : "POST",
        data : {tingkata: tingkata},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option>'+data[i].kelas+'</option>';
                }
                $('.kelas').html(html);
          
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tingkata').change(function(){
      var KodeSoal=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>absen/mapel",
        method : "POST",
        data : {KodeSoal: KodeSoal},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].KodeSoal+'">'+data[i].NamaSoal+'</option>';
                }
                $('.mapel').html(html);
          
        }
      });
    });
  });
</script>

</body>
</html>
