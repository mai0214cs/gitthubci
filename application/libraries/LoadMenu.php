<?php
class LoadMenu {
    private $db;
    function __construct() {
       // $this->db = new DB();
    }

    private $datanew = array();
    private $dem = 0;
    public function ListMenu($data,$idparent,$string = ''){
        foreach ($data as $key => $item) {
            if($item->idparent == $idparent){
                unset($data[$key]);
                $this->datanew[$this->dem] = $item;
                $this->datanew[$this->dem]->title = $string.$item->title;
                $this->dem++;
                if($data){$this->ListMenu($data, $item->idpage,$string.'&nbsp;&nbsp;&nbsp;&nbsp;');}
            }
        }
        return $this->datanew;
    }
    public function ListMenuEdit($data,$id_capchads,$current,$string = ''){        
        foreach ($data as $key => $item) {
            if($item->idparent == $id_capchads){
                unset($data[$key]);
                if($item->idpage!=$current){
                    $this->datanew[$this->dem] = $item;
                    $this->datanew[$this->dem]->title = $string.$item->title;
                    $this->dem++;
                    if($data){$this->ListMenuEdit($data, $item->idpage,$current,$string.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');}
                }
            }
        }
        return $this->datanew;
    }
    public function AddMenuList($data,$idparent){
        foreach ($data as $key => $item) {
            if($item->idparent == $idparent){
                unset($data[$key]);
                $this->datanew[] = $item->idpage;
                if($data){$this->AddMenuList($data, $item->idpage);}
            }
        }
        return $this->datanew;
    }
    public function EditMenuList($data,$idparent,$current){        
        foreach ($data as $key => $item) {
            if($item->idparent == $idparent){
                unset($data[$key]);
                if($item->idpage!=$current){
                    $this->datanew[] = $item->idpage;
                    if($data){$this->EditMenuList($data, $item->idpage,$current);}
                }
            }
        }
        return $this->datanew;
    }
    /*
    public function LocId($current,$type, $typeadd){
        $x = DB::GetData('page', array('id, danhmuc, tieude'), 'id_Type=?', array($type),'thutu ASC, id DESC');
        $dsx = $this->DequiSelectEditMenu($x,0,$current);
        $dm = array();
        foreach ($dsx as $v) { $dm[] = $v['id']; }
        return 'NOT (danhmuc IN ('.  implode(',', $dm).')) AND id_Type='.$typeadd;
    }
    
    public function LocIdXoa($current,$type){
        $x = DB::GetData('page', array('id, id_page, tieude'), 'type=?', array($type),'id_page ASC, thutu ASC, id DESC');
        $dsx = $this->DequiSelectEditMenu($x,0,$current);
        $dm = array();
        foreach ($dsx as $v) { $dm[] = $v['id']; }
        return 'NOT(id IN ('.  implode(',', $dm).')) AND id_Type='.$type;
    }
    
    
    
    public function Locdanhmuc($id, $type, $field){
        $x = DB::GetData('page', array('id, id_page, tieude'), 'type=?', array($type),'id_page ASC, thutu ASC, id DESC');
        $dsx = $this->DequiSelectEditMenu($x,0,$id);
        $dm = array(); foreach ($dsx as $v) { $dm[] = $v['id']; }
        return 'NOT('.$field.' IN ('.implode(',', $dm).'))';
    }*/
}
