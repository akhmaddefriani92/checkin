<?php
class model_users extends CI_Model{
    
    var $table = 'users';
    
    
    var $column = array('username','password','fullname');
    var $order = array('id' => 'desc');

    

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    
    
    function login($username,$password)
    {
        $chek=  $this->db->get_where('users',array('username'=>$username,'password'=>  $password));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    
    public function tampildata()
    {
        
        $query=$this->db->query('select * from users');
        $data = array();
        foreach($query->result_array() as $row=> $value){
        
            $data[]=$value;

        }
        
         return $data;

    }
    
    public function get_type($username)
    {
        $this->db->from($this->table);
        $this->db->where('username',$username);
        $query = $this->db->get();
        $row = $query->row_array();
        $tipe = $row["tipe"];

        return $tipe;
    }    

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    /*private function _get_datatables_query()
    {
        
        $this->db->from($this->table);
        
        $i = 0;
    
        foreach ($this->column as $item) 
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }
        
        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_last_id()
    {
        $this->db->limit(1);
        $this->db->from($this->table);
        $this->db->order_by('ID', 'DESC');
        $query = $this->db->get();
        $row = $query->row();
        $ID  = $row->ID+1;
        return $ID;
    }*/


}