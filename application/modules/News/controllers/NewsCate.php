<?php
class NewsCate extends MY_Controller{
    function __construct() {
        parent::__construct();
        $this->lang->load('adminnews');
        $this->load->library('LoadMenu');
        $this->load->model('Data_category');
    }
    function index(){
        $query=$this->DBData->select('id AS idpage,id_page AS idparent,title,avatar,url,status,page.order')->where('type',3)->order_by('id_page ASC', 'page.order ASC', 'id ASC')->get('page');
        $data=$query->result();
        $menu = new LoadMenu();
        $this->data['list'] = $menu->ListMenu($data, 0);
        $this->LoadView('News/NewsCate');
    }
    function update($id=0){
        $query=$this->DBData->select('id AS idpage,id_page AS idparent,title')->where('type',3)->order_by('id_page ASC', 'page.order ASC', 'id ASC')->get('page');
        $listcate=$query->result();
        if($this->input->post()){
            $this->form_validation->set_rules('idpage','ID','numeric');
            $this->form_validation->set_rules('title',lang('CateNews_title'),'required|min_length[5]');
            $this->form_validation->set_rules('orderby',lang('CateNews_orderby'),'numeric');
            if($this->form_validation->run()){
                $data = array(
                    'type' => 3,
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'avatar' => $this->input->post('avatar'),
                    'detail' => $this->input->post('detail'),
                    'seo_title' => trim($this->input->post('seotitle'))==''?$this->input->post('title'):trim($this->input->post('seotitle')),
                    'seo_description' => $this->input->post('seodescription'),
                    'seo_keyword' => $this->input->post('seokeyword'),
                    'url' => $this->input->post('url'),
                    'status' => $this->input->post('status'),
                    'order' => $this->input->post('orderby'),
                    'id_page' => $this->input->post('idparent'),
                    'date_edit' => date('Y-m-d H:i:s'),
                    'idadmin_edit' => $this->session->userdata('admin')['id']
                );
                $num = 1;
                /* No Test URL */
                if($id==0){
                    if($data['id_page']!=0){
                        $query = $this->DBData->where(array('id'=>$data['id_page'], 'type'=>3))->get('page');
                        $num = $query->num_rows();
                    }
                    
                    $data['date_add'] = date('Y-m-d H:i:s');
                    $data['idadmin_add'] = $this->session->userdata('admin')['id'];
                    if($num>0){
                        if($this->DBData->insert("page", $data)){
                            $this->session->set_flashdata("message", lang('CateNews_addsuccess'));
                            redirect('/Admin/CateNews');
                        }else{
                            $this->session->set_flashdata("message", lang('CateNews_adderror'));
                        }
                    }else{
                        $this->session->set_flashdata("message", lang('CateNews_noexist'));
                    }
                }else{
                    if($data['id_page']!=0){
                        $testcate = new LoadMenu();
                        $num = in_array($data['id_page'], $testcate->EditMenuList($listcate, 0, $id))?1:0;
                    }
                    if($num>0){
                        if($this->DBData->where(array('id'=>$id, 'type'=>3))->update("page", $data)){
                            $this->session->set_flashdata("message", lang('CateNews_editsuccess'));
                            redirect('/Admin/CateNews');
                        }else{
                            $this->session->set_flashdata("message", lang('CateNews_editerror'));
                        }
                    }else{
                        $this->session->set_flashdata("message", lang('CateNews_noexist'));
                    }
                }
            }
        }
        
        $menu = new LoadMenu();
        $this->data['list'] = $id==0?$menu->ListMenu($listcate, 0):$menu->ListMenuEdit($listcate, 0, $id);
        $this->data['ID'] = $id;
        if($id>0){
            $querycate = $this->DBData->select('*')->where(array('id'=>$id, 'type'=>3))->get('page');
            $this->data['item'] = $querycate->row();
            if(!isset($this->data['item']->id)){$this->data['item'] = $this->Data_category; }
        }else{
            $this->data['item'] = $this->Data_category;
        }
        //print_r($this->data['item']);
        $this->data['js'] = array('ckeditor/ckeditor.js','ckfinder/ckfinder.js');
        $this->LoadView('News/NewsCateUpdate');
    }
    
    function checkstatus($id){
        if($this->input->post()){
            $data = array(
                'id'=>$id,
                'type'=>3,
            );
            if($this->DBData->where($data)->update('page',array('status'=>  $this->input->post('val')))){
                echo lang('CateNews_statussuccess');
            }else{
                echo lang('CateNews_statuserror');
            }
        }
    }
    function delete(){
        if($this->input->post()){
            $id = $this->input->post('idold');
            $idnew = $this->input->post('idnew');
            /* Test category */
            $query = $this->DBData->where(array('id'=>$idnew, 'type'=>3))->get('page');
            if($query->num_rows()==0){ $idnew = 0; }
            /* Convert category */
            $this->DBData->where(array('id_page'=>$id, 'type'=>3))->update('page',array('id_page'=>$idnew));
            /* Convert list */
            if($idnew>0){
                $this->DBData->where(array('id_page'=>$id, 'type'=>4))->update('page',array('id_page'=>$idnew));
            }else{
                $this->DBData->where(array('id_page'=>$id, 'type'=>4))->delete('page');
            }
            /* Delete category */
            if($this->DBData->where(array('id'=>$id, 'type'=>3))->delete('page')){
                $this->session->set_flashdata("message", lang('CateNews_deletesuccess'));
            }else{
                $this->session->set_flashdata("message", lang('CateNews_deleteerror'));
            }
        }
    }
}