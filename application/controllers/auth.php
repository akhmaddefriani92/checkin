<?php
class auth extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_users');
        $this->load->view('form_login');
    }
    
    function login()
    {
        if(isset($_POST['submit'])){
            
            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            // $password  = md5($password);

            $hasil=  $this->model_users->login($username,$password);
            if($hasil==1)
            {
                // update last login
                $this->db->where('username',$username);
                //$this->db->update('Operator',array('last_login'=>date('Y-m-d')));
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
                redirect('Dashboard');
            }else{
                echo "<script>
                    alert('username atau password and salah !');
                        </script>";
            }
            
        }
        
    }
    
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}