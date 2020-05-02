<?php
    class Login extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('M_login');
        }
     
        function index(){
            $this->load->view('login/login');
        }

        function auth(){
            $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
            $pass=htmlspecialchars($this->input->post('pass',TRUE),ENT_QUOTES);

            $cek=$this->M_login->auth_user($username,$pass);
            if($cek){
                $this->session->set_userdata('login', TRUE);
                $this->session->set_userdata('nik',$cek->nik);
                $this->session->set_userdata('username',$cek->username);
                $this->session->set_userdata('level',$cek->level);
                redirect(site_url('Home'));
            }else{
                $url=base_url();
                echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                redirect($url);
            }
        }

        function logout(){
            $this->session->sess_destroy();
            $url=base_url('');
            redirect($url);
        }
    }
?>