<!--Counter Inbox-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->db->get_where('sekolah', ['id'=>1])->row_array();
if (!empty($editsoal)) {
foreach ($editsoal as $kun) {
    $NamaSoal = $kun->NamaSoal;
    $waktu_awal = $kun->waktu_awal;
    $waktu_akhir = $kun->waktu_akhir;
    $tanggal_uji = $kun->tanggal_uji;
    $link_soal = $kun->link_soal;
    $IDSoal = $kun->KodeSoal;
    $jurusan = $kun->jurusan;
    $kelas = $kun->tingkatan;
} 
} else {
    $IDSoal = "";
    $NamaSoal = "";
    $waktu_awal = "";
    $waktu_akhir = "";
    $tanggal_uji = "";
    $link_soal = "";
    $jurusan = "";
    $tingkatan = "";
    $kelas = "";
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
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">
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
        Input Soal
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Soal</a></li>
        <li class="active">Input Soal</li>
      </ol>
    </section>

     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

  <form method="post" action="<?php echo base_URL('soal/simpan/'); ?>">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" name="id" value="<?php echo $IDSoal; ?>">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group float-lb">
                                                <h5>Nama Soal</h5> 
                                                    <div class="nk-int-st">
                                                <input type="text" class="form-control" placeholder="Nama Soal" required name="NamaSoal" value="<?php echo $NamaSoal; ?>">
                                        </div>
                                </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group float-lb">
                                                <h5>Link Soal</h5> 
                                                    <div class="nk-int-st">
                                               <input type="text" class="form-control" placeholder="Link Soal" required name="link_soal" value="<?php echo $link_soal; ?>">
                                        </div>
                                </div>
                                </div>

                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <h5>Tanggal Ujian</h5> 
                                     <div class="form-group float-lb">                                               
                                         <div class="nk-int-st">
                                             <input type="date" class="form-control" required name="tanggal_uji" value="<?php echo $tanggal_uji; ?>">
                                                                    
                                            </div>
                                        </div>
                                </div>
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <h5>Jam Mulai</h5> 
                                     <div class="form-group float-lb">                                               
                                         <div class="nk-int-st">
                                             <input type="time" class="form-control" required name="waktu_awal" value="<?php echo $waktu_awal; ?>">
                                                                    
                                            </div>
                                        </div>
                                </div>
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <h5>Jam Selesai</h5> 
                                     <div class="form-group float-lb">                                               
                                         <div class="nk-int-st">
                                             <input type="time" class="form-control" required name="waktu_akhir" value="<?php echo $waktu_akhir; ?>">
                                            </div>
                                        </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group float-lb">
                                                <h5>Kelas</h5> 
                                                    <div class="nk-int-st">
                                                <select name="kelas" class="form-control" required>
                                                  <?php 
                                                    $dgg = $this->db->query("select tingkatan from siswa group by tingkatan")->result();
                                                    foreach ($dgg as $kee) {
                                                  ?>
                                                  <option value="<?php echo $kee->tingkatan; ?>" <?php if ($kelas==$kee->tingkatan) { echo "selected"; } ?>><?php echo $kee->tingkatan; ?></option>
                                                  <?php } ?>
                                                </select>
                                        </div>
                                </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group float-lb">
                                                <h5>Jurusan</h5> 
                                                    <div class="nk-int-st">
                                                <select name="jurusan" class="form-control" required>
                                                <option value="all" <?php if ($jurusan=='all') { echo "selected"; } ?>>ALL</option>
                                                  <?php 
                                                    $dg = $this->db->query("select jurusan from siswa group by jurusan")->result();
                                                    foreach ($dg as $ke) {
                                                  ?>
                                                  <option value="<?php echo $ke->jurusan; ?>" <?php if ($jurusan==$ke->jurusan) { echo "selected"; } ?>><?php echo $ke->jurusan; ?></option>
                                                  <?php } ?>
                                                </select>
                                        </div>
                                </div>
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group float-lb" style="float: right;">
                                          <button type="Submit" class="btn btn-primary"><span class="fa fa-save"> </span>  Simpan</button> 
                                          <button type="Reset" class="btn btn-default">Reset</button> 
                                </div>
                                </div>

                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
 </form>

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
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>

<script>

            var lineChartData = {
                labels : <?php echo json_encode($bulan);?>,
                datasets : [

                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($value);?>
                    }

                ]

            }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

        var canvas = new Chart(myLine).Line(lineChartData, {
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.005)",
            scaleGridLineWidth : 0,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : true,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 2,
            datasetStroke : true,
            tooltipCornerRadius: 2,
            datasetStrokeWidth : 2,
            datasetFill : true,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });

        </script>

</body>
</html>
