<?php
class model_batik extends CI_Model{
    
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
        
        $query= $this->db->query("SELECT * FROM requesttable where (airline='ID' OR airline='JT' or airline='IW') order by logid desc");
        foreach($query->result_array() as $row=> $value){
        
            $data[]=$value;

        }
        
         return $data;
    }
    
}