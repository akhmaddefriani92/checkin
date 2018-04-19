<?php
class model_konter extends CI_Model{
    
    private $dbmssql;

    public function __construct()
    {
        parent::__construct();
        $this->db=$this->load->database("konter", TRUE);
    }
    
    function detailchart($tgl, $kota){
        $sql ="select ipcetak, SUBSTRING(flightno ,1,2)  as airlines, sum(total) as total, tanggal from konter where kota='$kota' and tanggal='$tgl' group by ipcetak, substring(flightno, 1,2) order by ipcetak, airlines";
        $query = $this->db->query($sql);

        return $query;


    }

    function group_airline($tgl, $kota){
        $sql ="select SUBSTRING(flightno ,1,2)  as airlines  from konter where kota='$kota' and tanggal='$tgl' group by airlines order by  airlines";
        $query = $this->db->query($sql);

        return $query;
    }

    function group_ipcetak($tgl, $kota){
        // $sql ="select ipcetak  from konter where kota='$kota' and tanggal='$tgl' group by ipcetak order by  ipcetak";
        $sql ="select a.ipcetak, b.lokasi  from konter a left join lokasi b on a.ipcetak=b.ipaddress  where a.kota='$kota' and b.kota='$kota'  and a.tanggal='$tgl'  group by a.ipcetak order by  a.ipcetak";
        $query = $this->db->query($sql);

        return $query;
    }

    function get_total($tgl, $kota, $ipcetak, $airlines){
       $sql ="select sum(total) as total from konter where kota='$kota' and tanggal='$tgl' and ipcetak='$ipcetak' and flightno like '$airlines%'   group by substring(flightno, 1,2) order by ipcetak";
        $query = $this->db->query($sql);
        $num=$query->num_rows();
        if($num>=1){
            $row = $query->row_array();
            // print_r($row);
            $total = $row["total"];
        }else{
            $total=0;
        }

        return $total;
    }

    function get_lokasi($kota, $ipaddress){
        $sql ="select lokasi from lokasi where kota='$kota' and ipaddress='$ipaddress'";
        $query = $this->db->query($sql);
        $num=$query->num_rows();
        if($num>=1){
            $row = $query->row_array();
            // print_r($row);
            $lokasi = $row["lokasi"];
        }else{
            $lokasi="";
        }

        return $lokasi;
    }

    function get_username($tgl_daily, $kota, $ipcetak){
        $db = $kota."_201";
        $this->dbmssql = $this->load->database($kota."_201", true);

        $sql ="select count(username) as total,username from daily$tgl_daily where ipcetak='$ipcetak' group by username";
        $query = $this->dbmssql->query($sql);
        $num=$query->num_rows();
        if($num>=1){
            $row="";
            foreach ($query->result_array() as  $value) {
                $username= $value["username"];
                $total= $value["total"];
                $row.=$username." : ".$total." rows <br>";
            }
        }else{
            $row="";
        }
        return $row;

    }
    
    /*function chartvalue($kota, $tanggal, $datay){
        $end= date("Y-m-d", strtotime($tanggal));
        $start = date("Y-m-d", strtotime($tanggal."-7 day"));

        $sql = "select airlines from printingdocument where kota='$kota' and tanggal between '$start' and '$end' and airlines!='TOTAL' group by airlines";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row){
            
            $airlines=$row["airlines"];
            $airlinesx[]=$row["airlines"];
            $tot=array();
            
                // while ($start<$end){
                foreach ($datay as $start) {
                    
                    # code...
                    $start = date("Y-m-d", strtotime($start));
                    $sql1="select total from printingdocument where airlines='$airlines' and tanggal='$start' and kota='$kota'";
                    // $start= date("Y-m-d", strtotime($start."+1 day"));
                    $query1 = $this->db->query($sql1);
                    $values = $query1->row_array();
                    
                    if(empty($values["total"])){
                        $totx=0;
                    }else{
                        $totx=$values["total"];
                    }

                    $tot[] = $totx;
                    // $tot["total"] = $totx;
                    // $total[] = $values["total"];
                 // echo $start;   
                }
            
            array_push($airlinesx, $tot);           
            // $start= date("Y-m-d", strtotime($tanggal." -7 day"));
        }

         return $airlinesx;


    }*/

    

    /*function donutchart($tgl, $tgl2, $kota){
        $sql ="select  sum(total) as total, airlines from printingdocument where airlines!='TOTAL' and tanggal between '$tgl' and  '$tgl2' and kota='$kota' group by airlines";
        
        $query = $this->db->query($sql);
        $temp =array();
        foreach ($query->result_array() as  $value) {
                $temp2 = array();
                $temp2[0]=$value["airlines"];
                $temp2[1]=(int)$value["total"];

            array_push($temp, $temp2)    ;
        }

        return $temp;


    }*/


}