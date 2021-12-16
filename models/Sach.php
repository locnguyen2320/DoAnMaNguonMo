<?php 
if (!defined('HOST')){
    exit;
}
class Sach extends Db 
{
    function all()
    {
        return $this->selectQuery('select * from sach');
    }
    function random($n)
    {
        return $this->selectQuery("select * from sach order by rand() limit 0, $n");
    }
    function allnxb(){
        return $this->selectQuery('SELECT * FROM `nhaxb`');
    }
    function allloai(){
        return $this->selectQuery('SELECT * FROM `loai` ');
    }
    function search($kw)
    {
        $s ='select * from sach where tensach like ?';
        $a =["%$kw%"];
        return $this->selectQuery($s, $a);
    }
    public function locloai($id){
        return $this->selectQuery('select * from sach where maloai=?', [$id]);
        
    }
    public function locnxb($id){
        return $this->selectQuery('select * from sach where manxb=?', [$id]);
    
    }
}