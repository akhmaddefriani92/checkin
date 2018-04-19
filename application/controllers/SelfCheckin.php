<?php
class SelfCheckin extends CI_Controller{
    
    public $yest;
    function __construct() {
        parent::__construct();
        $this->load->model('model_selfcheckin', 'selfcheckin');
        $this->load->helper('url');
        $this->yest = date("Y-m-d", strtotime("-1 day"));
        chek_session();
    }


    public function index(){
        
        $tanggal  = date("Y-m-d", strtotime("-1 day"));
        $username=$this->session->userdata('username');
        
        // $data["type"] = $this->users->get_type($username);
        
        // $this->load->view('v_dashboard', $data);
        // $this->template->load('template','dashboard', $data);

    }
   
    public function kota($kota){
        $data["kota"] = $kota;
        $data["tanggal"] = $this->yest;
        $this->template->load('template','selfcheckin', $data);

        // print_r($data);
        /*$array=array();
        $array["id"] =$data->id;
    $array["username"] =$data->username;
    $array["fullname"] =$data->fullname;
    $array["password"] =md5($data->password);
    $array["tipe"] =$data->tipe;
        echo json_encode($array);*/
    }

    public function ajax_chart(){
        $kota = $_POST["kota"];
        $tanggal=date("Y-m-d", strtotime($_POST["tanggal"]));
        $tglx =    date("Y-m-d", strtotime($_POST["tanggal"]."-7 day"));
        $datay =array();
        for($i=1;$i<=7;$i++){
            $tgl = date("dMY", strtotime($tglx."+".$i." days"));
            array_push($datay, $tgl);
        }

        $num_tgl = count($datay)-1;
        // print_r($datay);
        $jsony= json_encode($datay);

        $jsony = str_replace('"', "'", $jsony);
        // $datax_value =$this->selfcheckin->chartvalue($kota, $tanggal);
        $datax_value =$this->selfcheckin->chartvalue($kota, $tanggal, $datay);


        $test =array();
        $temp = array();
        // print_r($datax_value);
        for ($i=0; $i <count($datax_value) ; $i++) { 
            # code...
            if ($i%2==1) {
                # code...
                // echo "ss".$datax_value[$i]."\r\n";
                $temp1 = array();
                foreach ($datax_value[$i] as $key => $value) {
                    # code...
                    $temp1[]=(int)$value;
                }
                $test['data']=$temp1;
                $temp[] = $test;
            }else{
                $test['name'] =$datax_value[$i];
                // echo $datax_value[$i]."\r\n";
                // $temp[] = $test;

            }
        }

        // detail chart
        $tglxx =date("Y-m-d", strtotime($tglx."+1 day"));
        /*$det = $this->selfcheckin->detailchart($tglxx, $tanggal, $kota);
        $detail = array();
        foreach ($det->result_array() as $value) {
                $tex = array();
                $tex["airlines"]=$value["airlines"];
                $tex["tanggal"]=date("dMY", strtotime($value["tanggal"]));
                $tex["total"]=$value["total"];
                array_push($detail, $tex);
        }*/
        $airx = $this->selfcheckin->group_airlines($tglxx, $tanggal, $kota);
        $th="<tr><th>Tanggal</th>";
        $tr="";
        foreach ($airx->result_array() as  $value) {
            $airlines=$value["airlines"];
            $th.="<th>".$airlines."</th>";
        }
        $th.="<th>total</th></tr>";
        $jtotal=0;
        foreach ($datay as $key => $value) {
            $tgl=date("Y-m-d", strtotime($value));
            $tr.="<tr>";
            $tr.="<td>".$tgl."</td>";
            foreach ($airx->result_array() as  $val) {
                $airlines=$val["airlines"];
                $total = $this->selfcheckin->get_total($tgl, $airlines, $kota);
                $jtotal=$jtotal+$total;
                $tr.="<td>".$total."</td>";
            }
            $tr.="<td>".$jtotal."</td>";
            $tr.="</tr>";
            $jtotal=0;
        }
        
        


/*        $d_donut = array();
        $d_donut["name"] = "Total Pax";
        $donut = $this->selfcheckin->donutchart($tglxx, $tanggal, $kota);
        $d_donut["data"]=$donut;
        $d_donutx = array();
        array_push($d_donutx, $d_donut);*/
        
        // $d_chart = json_encode($d_donutx, JSON_NUMERIC_CHECK);
        // $d_chart = preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $d_chart);
        // $d_chart1 = json_decode($d_chart);


        // print_r($datax_value);
        // $Response = array('datay' => $datay, 'datax' => $temp, 'detail' =>$detail, "donut"=>$d_donutx);
        $Response = array('datay' => $datay, 'datax' => $temp, 'th' => $th, 'tr'=>$tr);

        echo json_encode($Response);

    }
    

}