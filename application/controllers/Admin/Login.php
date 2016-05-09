<?php
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        if($this->session->has_userdata('admin')){
            redirect('Admin/Admin');
        }
        $this->data = array();
        $this->lang->load('adminaccount');
    }
    function index(){
        if($this->input->post()){
            $this->form_validation->set_rules('username',lang('username'),'required|min_length[5]');
            $this->form_validation->set_rules('password',lang('password'),'required|min_length[5]');
            if($this->form_validation->run()){
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'status'   => 1
                );
                $DBUser = $this->load->database('DBUser', TRUE);
                $query=$DBUser->select('id,username,fullname')->where($data)->get('user');
                $result = $query->row_array();
                if(count($result)>0){
                    $this->session->set_userdata(array('admin'=>$result));
                    redirect('Admin/Admin');
                }else{
                    $this->data['message_info'] = lang('login_error');
                }
            }
        }
        $this->load->view('Admin/Login/index', $this->data);
    }
}
