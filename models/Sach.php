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
    function detail($id)
    {
        $data = $this->selectQuery('select * from sach where masach=?', [$id]);
        return $data[0];
    }
    public function seltenloai($id){
        $data = $this->selectQuery('select * from loai where maloai=?', [$id]);
        return $data[0];
    }
    public function seltennxb($id){
        $data = $this->selectQuery('select * from nhaxb where manxb=?', [$id]);
        return $data[0];
    }
    public function delete($Id)
	{
		$sql = "DELETE FROM sach WHERE masach = '$Id'";
	$data=$this->updateQuery($sql);
    return $this->selectQuery('select * from sach');
   
	}
    public function add($id,$name,$des,$price,$img,$nxb,$loai){
        $sql="INSERT INTO `sach`(`masach`, `tensach`, `mota`, `gia`, `hinh`, `manxb`, `maloai`) 
        VALUES ('$id','$name','$des','$price','$img','$nxb','$loai')";
        $data=$this->updateQuery($sql);
        return $this->selectQuery('select * from sach');
    }
    public function setedit($id){
        $data = $this->selectQuery('select * from sach where masach=?', [$id]);
        return $data[0];
    }
}