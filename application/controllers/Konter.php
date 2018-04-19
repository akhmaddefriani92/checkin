<?php
class Konter extends CI_Controller{

    function __construct() {
    // public $yest;
        parent::__construct();
        $this->load->model('model_konter', 'konter');
        $this->load->helper('url');
        $this->yest = date("Y-m-d", strtotime("-1 day"));
        chek_session();
    }
    
    
    public function index(){
    
        $tanggal  = date("Y-m-d", strtotime("-1 day"));
        $username=$this->session->userdata('username');
    }

    public function kota($kota){
        $data["kota"] = $kota;
        $data["tanggal"] = $this->yest;
        $this->template->load('template','konter', $data);
    
    }
    public function ajax_chart(){

        $kota = $_POST["kota"];
        $tanggal  = date("Y-m-d", strtotime("-1 day"));
        $tanggal=date("Y-m-d", strtotime($_POST["tanggal"]));
        
        $temp1=array();
        $tgl_daily = date("jMY", strtotime($tanggal));
        
        $airy=array();
        $ar_ipcetak=array();

        $airx= $this->konter->group_airline($tanggal, $kota);
        if($kota=="KNO"){
            $kotax="mes";
        }else{
            $kotax=strtolower($kota);
        }
        $th="<tr><th>ipcetak</th><th>lokasi</th><th>fp$kotax username</th>";
        foreach ($airx->result_array() as  $value) {
           $airlines=$value["airlines"];
           $th.="<th>".$airlines."</th>";
           $airy[]=$airlines;
        }
        $th.="<th>total</th></tr>";
        $tr="";
        $ipx = $this->konter->group_ipcetak($tanggal, $kota);
        $jtotal=0;
        $temp1=array();
        foreach ($ipx->result_array() as $key => $value) {
            $temp2=array();
            $ipcetak = $value["ipcetak"];
            $lokasi = $value["lokasi"];
            if(strlen($lokasi)==2){
                $lokasi="ci".$lokasi;
            }
            $username=$this->konter->get_username($tgl_daily, $kota, $ipcetak);
            $temp2["name"]=$ipcetak;
            $tr.="<tr>";
            $tr.="<td>".$ipcetak."</td>";
            $tr.="<td>".$lokasi."</td>";
            $tr.="<td>".$username."</td>";
            $temp3=array();
            foreach ($airy as  $airlines) {
                
                $total = $this->konter->get_total($tanggal, $kota, $ipcetak, $airlines);   
                $tr.="<td>".$total."</td>";
                $jtotal=$jtotal+$total; 
                $temp3[]=(int)$total;
            }

            $tr.="<td>".$jtotal."</td>";
            $tr.="</tr>";
            $jtotal=0;
            $temp2["data"]=$temp3;

            array_push($temp1, $temp2);

        }    
          
        $y=$airy;
        $x=$temp1;
           
        $Response = array("th"=>$th, "tr"=>$tr, "datax"=>$x, "datay"=>$y);
        // $Response = array("th"=>$th, "tr"=>$tr);
        
        echo json_encode($Response);
        
        
        
    
    }    
}