<?php
class model_dashboard extends CI_Model{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    function gettotal($kota, $tanggal){

        $query = $this->db->query("select sum(total) as total from printingdocument where kota='$kota' and tanggal='$tanggal' and airlines!='total'");
        $row = $query->row_array();
        $numrow= $row["total"];
        
        return $numrow;
    }

    function getchart($ar_d1){

        $sql = "select kota from printingdocument group by kota";
        $query = $this->db->query($sql);
        $data = array();
        $temp = array();
        foreach ($query->result_array() as  $value) {
            $kota = $value["kota"];
            $temp["name"]=$value["kota"];
            $temp2 = array();   
            foreach ($ar_d1 as $bulan) {
                $bulan1 = date("Y-m", strtotime($bulan));                    
                $sql2 = "select sum(total) as total from printingdocument where kota='$kota' and airlines!='total' and tanggal like '$bulan1%'";
                $query2 = $this->db->query($sql2);
                $tot  = $query2->row_array();
                $total = $tot["total"];

                array_push($temp2, (int)$total);
                $temp["data"]=$temp2;
            }
            array_push($data, $temp);
        }


        
        return $data;
    }


}