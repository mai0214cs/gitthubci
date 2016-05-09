<?php
class NewsList extends MY_Controller{
    function __construct() {
        parent::__construct();
        $this->lang->load('adminnews');
        $this->load->library('LoadMenu');
        //$this->load->model('Data_category');
    }
    function index($id=1){
        
        $q_total = $this->DBData->where('type=4')->get('page');
        
        
        $config['total_rows'] = $q_total->num_rows();
        $config['base_url'] = urlfull('Admin/ListNews');
        $config['per_page'] = 2;
        $this->load->library('pagination', $config);
        $this->data['listpage'] = $this->pagination->create_links();
        
        /* */
        $q_list= $this->DBData->select('a.id,a.title,a.avatar,a.url,a.status,a.order,b.title AS cate,b.url AS urlcate')->where('a.type=4')->order_by('a.order ASC', 'a.id DESC')->join('page AS b', 'a.id_page = b.id', 'LEFT')->limit($config['per_page'], $config['per_page']*($id-1))->get('page AS a');
        $this->data['list'] = $q_list->result();
        
        
        
        
        $this->LoadView('News/NewsList');
    }
}
