<?php
class MY_Controller extends CI_Controller{
    public $data; public $DBData;
    function __construct() {
        parent::__construct();
        if(!$this->session->has_userdata('admin')){
            redirect('Admin/Login');
        }
        $this->lang->load('admintemp');
        $this->DBData = $this->load->database('DBData', TRUE);
    }
    function LoadView($temp = 'Admin/Admin/index'){
        $this->data['temp'] = $temp;
        $this->load->view('Admin/layout',  $this->data);
    }
}
