<?php
class Users extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_users', 'user');
        $this->load->helper('url');
        // chek_session();
    }


    public function index(){
        // $data_airlines["view_data"] = $this->user->tampildata();
        // $username=$this->session->userdata('username');
        // $data_airlines["type"] = $this->user->get_type($username);
        // $this->template->load('template', 'user', $data_airlines);

    }
   
    
    public function ajax_list(){

        $list   = $this->user->get_datatables();
        $data   = array();
        $no     = $_POST['start'];
        $nomor  = 1;
        foreach ($list as $user) {
            $no++;
            
            
            $aksi = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_user('."'".$user->ID."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_user('."'".$user->ID."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
             $Name = $this->airlines->get_one($user->AirlinesINX);         
            $row = array(
                        "no"         => $no,
                        "UserName"          => $user->UserName, 
                        "Password"           => $user->Password,
                        "FullName"        => $user->FullName,
                        "AirlinesINX"        => $Name,
                        "Deletef"        => $user->Deletef,
                        "aksi"          => $aksi
                        );
            $data[] = $row;
            $nomor++;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->user->count_all(),
                        "recordsFiltered" => $this->user->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
        
        $data = $this->user->get_by_id($id);
        // print_r($data);
        $array=array();
        $array["id"] =$data->id;
    $array["username"] =$data->username;
    $array["fullname"] =$data->fullname;
    $array["password"] =md5($data->password);
    $array["tipe"] =$data->tipe;
        echo json_encode($array);
    }

    public function ajax_add(){
     
        $data = array(
                        'username' => $this->input->post('username'),
                        'fullname' => $this->input->post('fullname'),
                        'password' => md5($this->input->post('password')),
                        'tipe' => $this->input->post('tipe')
                     );
        $insert = $this->user->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update(){
        
        $data = array(
                       
                        'username' => $this->input->post('username'),
                        'fullname' => $this->input->post('fullname'),
                        'password' => md5($this->input->post('password')),
                        'tipe' => $this->input->post('tipe')
                );
        $this->user->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
        
    }

    public function ajax_delete($id){

        $this->user->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


}