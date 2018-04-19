<?php
class Batik extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_batik', 'batik');
        $this->load->model('model_dashboard', 'dashboard');
        $this->load->helper('url');
        $this->load->model('model_users', 'users');
        chek_session();
    }


    public function index(){
        $data_airlines["total"] = $this->dashboard->Batik();
        $username=$this->session->userdata('username');
        $data_airlines["type"] = $this->users->get_type($username);
        $this->template->load('template', 'batik', $data_airlines);

    }
   
    
    public function ajax_list(){

        $baris     = $_POST['baris'];
        $data  = $this->batik->tampilperbaris($baris);
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

        $paxtemp  = $this->batik->get_paxtemp($logid);

        echo "<table  width='80%'class='table table-hover table-bordered' style='font-size:11px;border:1px solid #b0b0b0;'>
              <tr>
              <th>FlightNo</th>
              <th>PaxID</th>
              <th>Nama</th>
              <th>DepCity</th>
              <th>DepDate</th>
              <th>DepTime</th>
              <th>ArrCity</th>
              <th>ArrDate</th>
              <th>ArrTime</th>
              <th>Seat</th>
            </tr>";
            foreach ($paxtemp as $key => $value) {
                # code...
                echo "
                      <tr>
                        <td>$value[FlightNo]</td>
                        <td>$value[PaxID]</td>
                        <td>$value[Nama]</td>
                        <td>$value[DepartureCity]</td>
                        <td>$value[DepartureDate]</td>
                        <td>$value[DepartureTime]</td>
                        <td>$value[ArriveCity]</td>
                        <td>$value[ArriveDate]</td>
                        <td>$value[ArriveTime]</td>
                        <td>$value[Seat]</td>
                      </tr> 
                    "; 
            }
            echo "</table>";
            
     
     echo "<h4 class='page-header'>Table Response Lion</h4>";
        $responselion   = $this->batik->get_responselion($pnr);
        #Logid Airline PNR LogDate Status  Response
        echo "<table  width='80%'class='table table-hover table-bordered' style='font-size:11px;border:1px solid #b0b0b0;'>
              <tr>
              <th>Airline</th>
              <th>PNR</th>
              <th>LogDate</th>
              <th>Status</th>
              <th>Response</th>
              </tr>";
            foreach ($responselion as $key => $value2) {
                echo "<tr>
                        <td>$value2[Airline]</td>
                        <td>$value2[PNR]</td>
                        <td>$value2[LogDate]</td>
                        <td>$value2[Status]</td>
                        <td>$value2[Response]</td>
                    </tr>";   
            }
        echo "</table>";          


        $ipa=array("192.168.20.86", "192.168.20.88","192.168.20.200"," 192.168.20.204");

        $ipb=array("192.168.20.85", "192.168.20.87", "192.168.20.202", "192.168.20.206");

        $ipc=array("192.168.20.208", "192.168.20.212","192.168.20.210", "192.168.20.214" );


        echo "<h4 class='page-header'>Log File $pnr</h4>";

        if (in_array($kios, $ipa)){
                        
        echo "<a href='http://172.16.20.74/chger/get_text.php?pnr=$pnr' id='btnklik' target='_blank'>$pnr</a>";
        }
        // elseif($kios=="192.168.20.86" || $kios=="192.168.20.88"){
        elseif (in_array($kios, $ipb)){

          echo "<td><a href='http://172.16.20.74:8082/chger/get_text.php?pnr=$pnr' id='btnklik' target='_blank'>$pnr</a></td>";
          
        }elseif (in_array($kios, $ipc)){
          echo "<td><a href='http://172.16.20.74:8085/chger/get_text.php?pnr=$pnr' id='btnklik' target='_blank'>$pnr</a></td>";
          
        }
    
    }

    


}