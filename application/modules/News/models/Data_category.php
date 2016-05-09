<?php
class Data_category extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    public $id = 0;
    public $type =3;
    public $title = '';
    public $description = '';
    public $avatar = '';
    public $detail = '';
    public $seo_title = '';
    public $seo_description = '';
    public $seo_keyword = '';
    public $url = '';
    public $status = 1;
    public $order = 999;
    public $id_page = 0;
    public $date_add = '';
    public $date_edit = '';
    public $idadmin_add = '';
    public $idadmin_edit = '';
    function dataitem(){
        return $this;
    }
}
