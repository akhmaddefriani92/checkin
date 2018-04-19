<?php
class Dashboard extends CI_Controller{
    
    
    function index(){
        chek_session();
        $data = $this->session->userdata('username');
        print_r($data);
        $this->template->load('template','v_dashboard');
    }
}