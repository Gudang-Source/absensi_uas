<?php
class Siswa extends CI_Controller{
    function __construct(){
        parent:: __construct();
    if ($this->session->userdata('masuk')!="login") {
        redirect('loginaplikasi');
    }
    }
    function index(){
        $this->load->view('v_siswa');
    }

    function proses(){
        date_default_timezone_set('Asia/Jakarta');
        $pos = $this->input->post();
        if (empty($pos)) {
            redirect('loginaplikasi');
        }
        $so = $this->input->post('KodeSoal');
        $ids = $this->input->post('IDSiswa');
        $ds = $this->db->query("select*from soal where KodeSoal='$so'")->row_array();
        $ling = $ds['link_soal'];
        $dt = $this->db->query('select*from absensi where KodeSoal="'.$so.'" AND IDSiswa="'.$ids.'"')->num_rows();
        if ($dt >= 1) {
            echo ("<script LANGUAGE='JavaScript'>
    window.location.href='$ling';
    </script>");
        } else {
        $tgl = date("Y-m-d");
        $wkt = date("H:i:s");
        $this->db->insert('absensi',['KodeSoal'=>$pos['KodeSoal'], 'IDSiswa'=>$pos['IDSiswa'], 'kelas'=>$pos['kelas'], 'TanggalMengerjakan'=>$tgl, 'Jam'=>$wkt, 'jurusan'=>$pos['jurusan']]);
       // echo '<meta http-equiv="refresh" content="3;url=$ling">';
        //header('location: https://stackoverflow.com/questions/$ling');
        echo ("<script LANGUAGE='JavaScript'>
    window.location.href='$ling';
    </script>");
    }
    }
}