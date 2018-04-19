<?php
class model_selfcheckin extends CI_Model{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    function chartvalue($kota, $tanggal, $datay){
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


    }

    function detailchart($tgl, $tgl2, $kota){
        // $sql ="select sum(total) as total, airlines, tanggal from printingdocument where airlines!='TOTAL' and tanggal between '$tgl' and  '$tgl2' and kota='$kota' group by airlines";
        $sql ="select total, airlines, tanggal from printingdocument where airlines!='TOTAL' and tanggal between '$tgl' and  '$tgl2' and kota='$kota' order by tanggal, airlines";
        $query = $this->db->query($sql);

        return $query;


    }

    function group_airlines($tgl, $tgl2,$kota){
        $sql ="select  airlines from printingdocument where airlines!='TOTAL' and tanggal between '$tgl' and  '$tgl2' and kota='$kota'  group by airlines order by  airlines";
        $query = $this->db->query($sql);

        return $query;        
    }

    function get_total($tgl, $airlines, $kota){
        $sql ="select total from printingdocument where tanggal='$tgl' and airlines='$airlines' and kota='$kota'";
        $query = $this->db->query($sql);
        $num=$query->num_rows();
        if($num>=1){
            $row = $query->row_array();
            $total = $row["total"];
        }else{
            $total=0;
        }
        
        return $total;
    }

    function donutchart($tgl, $tgl2, $kota){
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


    }


}