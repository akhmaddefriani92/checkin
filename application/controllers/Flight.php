<?php
class Batik extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_flight', 'flight');
        $this->load->helper('url');
        chek_session();
    }


    public function index(){
        $data_airlines["view_data"] = $this->flight->tampildata_ID();
        //$data_airlines["kota"] = $this->city->tampildata();
        // $this->load->view('v_flight', $data_airlines);
        $this->template->load('template', 'batik', $data_airlines);

    }
   
    
    public function ajax_list(){

        $list   = $this->flight->get_datatables();
        $data   = array();
        $no     = $_POST['start'];
        $nomor  = 1;
        foreach ($list as $flight) {
            $no++;
            
        
            $aksi = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_flight('."'".$flight->FlightID."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_flight('."'".$flight->FlightID."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
             
             $Name = $this->airlines->get_one($flight->AirlinesINX);         
             
            $row = array(
                        "no"         => $no,
                        "FlightNo" => $flight->FlightNo, 
                        "Airlines" => $Name, 
                        "Destination"        => $flight->Destination, 
                        "STD"=> $flight->STD,
                        "Boarding"=> $flight->Boarding,
                        "Deletef"     => $flight->Deletef,
                        "aksi"        => $aksi
                        );
            $data[] = $row;
            $nomor++;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->flight->count_all(),
                        "recordsFiltered" => $this->flight->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
        
        $data = $this->flight->get_by_id($id);
        // print_r($data);
        $array=array(); 
        $array["FlightID"]=$data->FlightID;
        $array["FlightNo"]=$data->FlightNo;
        $array["AirlinesINX"]=$data->AirlinesINX;
        $array["Destination"]=trim(strtoupper($data->Destination));
        $array["STD"]=$data->STD;
        $array["Boarding"]=$data->Boarding;
        $array["Deletef"]=$data->Deletef;


        echo json_encode($array);
    }

    


}