<?php
class Dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_dashboard', 'dashboard');
        $this->load->helper('url');
        chek_session();
    }


    public function index(){
        
        $tanggal  = date("Y-m-d", strtotime("-1 day"));

        
        $data["T1C"] = $this->dashboard->gettotal("CT1", $tanggal);
        $data["DJB"] = $this->dashboard->gettotal("DJB", $tanggal);
        $data["HLP"] = $this->dashboard->gettotal("HLP", $tanggal);
        $data["CT3"] = $this->dashboard->gettotal("CT3", $tanggal);
        $data["PLM"] = $this->dashboard->gettotal("PLM", $tanggal);
        $data["PNK"] = $this->dashboard->gettotal("PNK", $tanggal);
        $data["PDG"] = $this->dashboard->gettotal("PDG", $tanggal);
        $data["PGK"] = $this->dashboard->gettotal("PGK", $tanggal);
        $data["PKU"] = $this->dashboard->gettotal("PKU", $tanggal);
        $data["BDO"] = $this->dashboard->gettotal("BDO", $tanggal);
        $data["KNO"] = $this->dashboard->gettotal("KNO", $tanggal);
        $data["DTB"] = $this->dashboard->gettotal("DTB", $tanggal);
        $data["tanggal"]=$tanggal;

        
        
        $username=$this->session->userdata('username');
        
        // $data["type"] = $this->users->get_type($username);
        
        // $this->load->view('v_dashboard', $data);
        $this->template->load('template','dashboard', $data);

    }

    public function getchart(){
        $e= date("Y-m", strtotime("-3 month"));
        $ar_d1 = array();    
        for($i=0;$i<=3;$i++){
            $d2 = date("My", strtotime($e."+".$i." month"));
            array_push($ar_d1, $d2);
        }

        $ar_data = $this->dashboard->getchart($ar_d1);
        $Response = array('datay' => $ar_d1, 'datax' => $ar_data);
        echo json_encode($Response);


    }
   
    
    

}