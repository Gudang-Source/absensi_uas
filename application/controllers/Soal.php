<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->login_model->check_login();
    }

	public function index()
	{
        $data['soa'] = $this->db->get('soal');
		$this->load->view('datasoal', $data);
	}

    public function formsoal()
    {
        $uri = $this->uri->segment('3');
        if (!empty($uri)) {
            $data['editsoal'] = $this->db->get_where('soal', ['KodeSoal'=>$uri])->result();
        } else {
            $data['editsoal'] = "";
        }
        $this->load->view('formsoal', $data);
    }

    public function simpan()
    {
        $pos = $this->input->post();
        if (empty($pos)) {
            redirect('bagianadmin');
        }
        if (empty($pos['id'])) {
        $a = $this->db->insert('soal', ['NamaSoal'=>$pos['NamaSoal'], 'tanggal_uji'=>$pos['tanggal_uji'], 'waktu_awal'=>$pos['waktu_awal'], 'waktu_akhir'=>$pos['waktu_akhir'], 'link_soal'=>$pos['link_soal'], 'jurusan'=>$pos['jurusan'], 'tingkatan'=>$pos['kelas']]);
        } else {
        $a = $this->db->update('soal', ['NamaSoal'=>$pos['NamaSoal'], 'tanggal_uji'=>$pos['tanggal_uji'], 'waktu_awal'=>$pos['waktu_awal'], 'waktu_akhir'=>$pos['waktu_akhir'], 'link_soal'=>$pos['link_soal'], 'jurusan'=>$pos['jurusan'], 'tingkatan'=>$pos['kelas']], ['KodeSoal'=>$pos['id']]);
        }
        if ($a) {
            echo $this->session->set_flashdata('msg','info');
            redirect('soal');
        } else {
            echo $this->session->set_flashdata('msg','error');
            redirect('soal');
        }
    }

    public function hapus()
    {
        $pos = $this->input->post('KodeSoal');
        if (empty($pos)) {
            redirect('bagianadmin');
        }
        $this->db->delete('soal', ['KodeSoal'=>$pos]);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('soal');
    }

}
