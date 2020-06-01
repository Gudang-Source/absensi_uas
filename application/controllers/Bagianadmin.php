<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagianadmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        //$this->load->library('upload');
        $this->login_model->check_login();
    }

	public function index()
	{
        $tgl = date("Y-m-d");
        $tma = date("H:i:s");
        $data['map'] = $this->db->query("select*from soal where tanggal_uji='$tgl' AND waktu_awal <= '$tma' AND waktu_akhir >= '$tma'");
        $a = $this->db->query("select*from soal where tanggal_uji='$tgl' AND waktu_awal <= '$tma' AND waktu_akhir >= '$tma'")->row_array();
        $mulai = $a['waktu_awal'];
        $akhir = $a['waktu_akhir'];
        $data['soa'] = $this->db->query('select*from siswa where NOT EXISTS(SELECT * FROM absensi WHERE absensi.TanggalMengerjakan="'.$tgl.'" AND siswa.no_peserta = absensi.IDSiswa AND absensi.Jam BETWEEN "'.$mulai.'" AND "'.$akhir.'")');
        $data['sudah'] = $this->db->query("select*from absensi,siswa where absensi.IDSiswa=siswa.no_peserta AND absensi.TanggalMengerjakan='$tgl' AND absensi.Jam BETWEEN '$mulai' AND '$akhir' order by siswa.IDSiswa ASC");
		$this->load->view('untukadmin', $data);
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('satpam');
    }

}
