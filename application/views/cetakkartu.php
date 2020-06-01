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
  <title>CETAK KARTU</title>
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
<body onload="window.print()">
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
            
<!-- ./wrapper -->


<!-- jQuery 2.2.3 -->
</body>
</html>
