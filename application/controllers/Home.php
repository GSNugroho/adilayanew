<?php
    class Home extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            // if($this->session->userdata('login') != TRUE){
            //     $url = base_url();
            //     redirect($url);
            // }
        }

        function index(){
            // print_r($this->session->userdata());
            switch($this->session->userdata('level')){
                case "1":
                    redirect(site_url('Home'));
                break;
                case "2":
                    redirect(site_url('Monitor'));
                break;
                case "3":
                    redirect(site_url('Monitor'));
                break;
                case "4":
                    redirect(site_url('RnD'));
                break;
                case "5":
                    redirect(site_url('Avbooth'));
                break;
                case "6":
                    redirect(site_url('Mapping'));
                break;
                case "7":
                    redirect(site_url('Avbb'));
                break;
                case "8":
                    redirect(site_url('Vendorbb'));
                break;
                case "9":
                    redirect(site_url('Vendorbooth'));
                break;
                case "10":
                    redirect(site_url('Finance'));
                break;
                case "11":
                    redirect(site_url('Monitor'));
                break;
                case "12":
                    redirect(site_url('Monitor'));
                break;
            }
        }

        // function marketing(){
        //     if($this->session->userdata('level')=='1'){
        //         $this->load->view('marketing');
        //     }
        // }
    }
?>