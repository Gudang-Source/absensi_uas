<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
    }
    function index(){
        $this->load->view('walikelas/w_login');
    }
    function proses(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        if (empty($username and $password)) {
            redirect(site_url('./'));
        }
       if ($username!=$password) {
        $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
         redirect('walikelas/login');
       }
       $dg = $this->db->get_where('siswa',['kelas'=>$password]);
       $dg1 = $dg->num_rows();
       $dg2 = $dg->row_array();
       if(!empty($dg1)) {
        $datasesi = array('kelas' => $password,
                          'masuk' => "login_walikelas"
                         );
        $this->session->set_userdata($datasesi);
        redirect('walikelas/bagianadmin');
       }else{
         echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
         redirect('walikelas/login');
       }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect('walikelas/login');
    }

}
