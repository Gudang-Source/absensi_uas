<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->login_model->check_login();
    }

    public function index()
    {
        $pos = $this->input->post();
        if(empty($this->input->post('mapel') && $this->input->post('kelas'))) {
        $data['soa'] = "";
        $data['sudah'] = "";
        $data['map'] = $this->db->query("select*from soal where KodeSoal='a' ");
        $data['kela'] = "";
        } else {
        $data['map'] = $this->db->query("select*from soal where KodeSoal='".$pos['mapel']."'");
        $data['soa'] = $this->db->query('select*from siswa where siswa.kelas="'.$pos['kelas'].'" AND NOT EXISTS(SELECT * FROM absensi WHERE absensi.KodeSoal="'.$pos['mapel'].'" AND siswa.no_peserta = absensi.IDSiswa)');
        $data['sudah'] = $this->db->query("select*from absensi,siswa where absensi.IDSiswa=siswa.no_peserta AND siswa.kelas='".$pos['kelas']."' AND absensi.KodeSoal='".$pos['mapel']."' order by siswa.IDSiswa ASC");
        $data['kela'] = $this->input->post('kelas');
        }
        $this->load->view('cetakabsen', $data);
    }

    public function data() {
        $uri3 = $this->uri->segment(3);
        $uri4 = $this->uri->segment(4);
        $uri5 = $this->uri->segment(5);
        $data['map'] = $this->db->get_where('soal',['KodeSoal'=>$uri4]);
        if ($uri5=='all') {
        $data['soa'] = $this->db->query('select*from siswa where siswa.tingkatan="'.$uri3.'" AND NOT EXISTS(SELECT * FROM absensi WHERE absensi.KodeSoal="'.$uri4.'" AND siswa.no_peserta = absensi.IDSiswa)');
        $data['sudah'] = $this->db->query("select*from absensi,siswa where absensi.IDSiswa=siswa.no_peserta AND absensi.KodeSoal='".$uri4."' order by siswa.IDSiswa ASC");
        } else {
        $data['soa'] = $this->db->query('select*from siswa where siswa.tingkatan="'.$uri3.'" AND siswa.jurusan="$uri5" AND NOT EXISTS(SELECT * FROM absensi WHERE absensi.KodeSoal="'.$uri4.'" AND siswa.no_peserta = absensi.IDSiswa)');
        $data['sudah'] = $this->db->query("select*from absensi,siswa where absensi.IDSiswa=siswa.no_peserta AND absensi.KodeSoal='".$uri4."' order by siswa.IDSiswa ASC");
        }
        $this->load->view('dataabsen', $data);
    }

    public function kelas(){
        $ting = $this->input->post('tingkata');
        $data = $this->db->query("select kelas from siswa where tingkatan='".$ting."' group by kelas")->result();
        echo json_encode($data);
    }

    public function mapel(){
        $ting = $this->input->post('KodeSoal');
        $data = $this->db->query("select * from soal where tingkatan='".$ting."'")->result();
        echo json_encode($data);
    }

    public function cetak()
    {
        $pos = $this->input->post();
        $data['map'] = $this->db->query("select*from soal where KodeSoal='".$pos['mapel']."'");
        $data['soa'] = $this->db->query('select*from siswa where siswa.kelas="'.$pos['kelas'].'" AND NOT EXISTS(SELECT * FROM absensi WHERE absensi.KodeSoal="'.$pos['mapel'].'" AND siswa.no_peserta = absensi.IDSiswa)');
        $data['sudah'] = $this->db->query("select*from absensi,siswa where absensi.IDSiswa=siswa.no_peserta AND siswa.kelas='".$pos['kelas']."' AND absensi.KodeSoal='".$pos['mapel']."' order by siswa.IDSiswa ASC");
        $data['kela'] = $this->input->post('kelas');
        $this->load->view('cetak', $data);
    }

}
