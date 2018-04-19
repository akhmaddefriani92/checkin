<?php
class model_citilink extends CI_Model{
    
    var $table = 'requesttable';
    
    // LogID    KiosAddress Airline QueryRequest    QueryResponse   TanggalRequest  Status  Finish  Flag    FlagGA  PaxName LastName
   
    var $column = array('LogID','KiosAddress','Airline', 'QueryRequest', 'QueryResponse', 'TanggalRequest', 'Status', 'Finish', 'Flag', 'FlagGA', 'PaxName', );
    var $order = array('FlightNo' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    function tampildata()
    {
        
        $query= $this->db->query("SELECT  top 200 * FROM requesttable where (airline='QG' ) order by logid desc");
        foreach($query->result_array() as $row=> $value){
        
            $data[]=$value;

        }
        
         return $data;
    }

    function tampilperbaris($baris)
    {
        
        $query= $this->db->query("SELECT top $baris  * FROM requesttable where (airline='QG' ) order by logid desc");
        foreach($query->result_array() as $row=> $value){
        
            $data[]=$value;

        }
        
         return $data;
    }
    
    function get_paxtemp($Logid){
        $sql  = "SELECT * FROM paxtemp WHERE Logid = $Logid order by FlightNo,PaxID";
        $query=$this->db->query($sql);
        foreach($query->result_array() as $row=> $value){
            $data[]=$value;
        }
        
         return $data;

    }
}