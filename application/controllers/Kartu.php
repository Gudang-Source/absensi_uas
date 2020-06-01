<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->login_model->check_login();
    }

    public function index()
    {
        $data['soa'] = $this->db->get('siswa');
        $this->load->view('kartu', $data);
    }

    public function cetak()
    {
        $data['soa'] = $this->db->get('siswa');
        $this->load->view('cetakkartu', $data);  
    }

}
