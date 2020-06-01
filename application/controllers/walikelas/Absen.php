<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
       if ($this->session->userdata('masuk')!="login_walikelas") {
        redirect('walikelas/login');
    }
    }

    public function index()
    {
        redirect('halamanadmin');
    }

    public function data() {
        $uri3 = $this->session->userdata('kelas');
        $uri4 = $this->uri->segment(5);
        $uri5 = $this->uri->segment(6);
        $data['map'] = $this->db->get_where('soal',['KodeSoal'=>$uri4]);
        if ($uri5=='all') {
        $data['soa'] = $this->db->query('select*from siswa where siswa.kelas="'.$uri3.'" AND NOT EXISTS(SELECT * FROM absensi WHERE absensi.KodeSoal="'.$uri4.'" AND siswa.no_peserta = absensi.IDSiswa)');
        $data['sudah'] = $this->db->query("select*from absensi,siswa where absensi.IDSiswa=siswa.no_peserta AND absensi.KodeSoal='".$uri4."' order by siswa.IDSiswa ASC");
        } else {
        $data['soa'] = $this->db->query('select*from siswa where siswa.kelas="'.$uri3.'" AND NOT EXISTS(SELECT * FROM absensi WHERE absensi.KodeSoal="'.$uri4.'" AND siswa.no_peserta = absensi.IDSiswa)');
        $data['sudah'] = $this->db->query("select*from absensi,siswa where absensi.IDSiswa=siswa.no_peserta AND absensi.KodeSoal='".$uri4."' order by siswa.IDSiswa ASC");
        }
        $this->load->view('walikelas/dataabsen', $data);
    }

}
