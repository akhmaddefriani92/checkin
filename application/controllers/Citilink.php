<?php
class Citilink extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_citilink', 'citilink');
        $this->load->model('model_dashboard', 'dashboard');
        $this->load->model('model_users', 'users');
        $this->load->helper('url');
        chek_session();
    }


    public function index(){
        $data_airlines["total"] = $this->dashboard->Citilink();
        $username=$this->session->userdata('username');
        $data_airlines["type"] = $this->users->get_type($username);
        $this->template->load('template', 'citilink', $data_airlines);

    }
   
    
    public function ajax_list(){

        $baris     = $_POST['baris'];
        $data  = $this->citilink->tampilperbaris($baris);
        $result = array();
        foreach ($data as $key => $value) {
           
        
         $kios = $value["KiosAddress"];
            $pnr = $value["QueryRequest"];
            $logid = $value["LogID"];

            $join = $logid.",".$pnr.",".$kios;

            $pnr1 = '<a href="javascript:void()" title="Edit" onclick="detail('."'".$join."'".')">'.$value["QueryRequest"].'</a>';
            
            $temp = array();
            $temp["LogID"] = $value["LogID"];
            $temp["KiosAddress"] = $value["KiosAddress"];
            $temp["Airline"] = $value["Airline"];
            $temp["QueryRequest"] = $pnr1;
            $temp["QueryResponse"] = $value["QueryResponse"];
            $temp["TanggalRequest"] = $value["TanggalRequest"];
            $temp["Status"] = $value["Status"];
            $temp["Finish"] = $value["Finish"];
            $temp["LastName"] = $value["LastName"];

            array_push($result, $temp);

        }

        //output to json format
        echo json_encode($result);
    }

    public function detail(){
        
        $id = $_POST["id"];
        $x = explode(",", $id);
        $logid = $x[0];
        $pnr = $x[1];
        $kios = $x[2];

        $paxtemp  = $this->citilink->get_paxtemp($logid);

        echo json_encode($paxtemp);
    }

    


}