<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=bquiz4";
    protected $table;
    protected $pdo;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    // 給UPDATE…SET後面與WHERE後面的條件使用
    // UPDATE…SET join(",",$tmp)
    // WHERE join(" AND ",$tmp)
    protected function a2s($array){
        foreach($array as $key => $value){
            if($key !='id'){
                $tmp[]="`$key`='$value'";
            }
        }
        return $tmp;
    }

    // 給其他function的$sql串接$array與$other使用
    private function sql_all($sql,$array,$other){
        //如果資料表存在且不為空
        if(isset($this->table) && !empty($this->table)){
            //如果$array是陣列
            if(is_array($array)){
                //如果$array不為空
                if(!empty($array)){
                    $tmp=$this->a2s($array);
                    $sql .=" WHERE ".join(" AND ",$tmp);
                }
            }else{
                //不是陣列，就是SQL語法WHERE字串
                $sql .= "$array";
            }
            //SQL語法WHERE字串後面的其他條件句
            $sql .= $other;
            return $sql;
        }
    }

    //聚合函式
    protected function math($math,$col,$array='',$other=''){
        $sql="SELECT $math($col) FROM $this->table";
        $sql=$this->sql_all($sql,$array,$other);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($col, $where='',$other=''){
        return $this->math('sum',$col,$where,$other);
    }

    function max($col, $where='',$other=''){
        return $this->math('sum',$col,$where,$other);
    }

    function min($col, $where='',$other=''){
        return $this->math('sum',$col,$where,$other);
    }
    
    // 查詢all
    function count($where='',$other=''){
        $sql="SELECT count(*) FROM `$this->table` ";
        $sql=$this->sql_all($sql,$where,$other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    // 查詢count
    function all($where='',$other=''){
        $sql="SELECT * FROM `$this->table` ";
        $sql=$this->sql_all($sql,$where,$other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // 查、刪、改、增
    function find($id){
        $sql="SELECT * FROM `$this->table` ";
        if(is_array($id)){
            $tmp=$this->a2s($id);
            $sql .=" WHERE ".join(" AND ",$tmp);
        }else if(is_numeric($id)){
            $sql .=" WHERE `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id){
        $sql="DELETE FROM `$this->table` ";
        if(is_array($id)){
            $tmp=$this->a2s($id);
            $sql .=" WHERE ". join(" AND ",$tmp);
        }else if(is_numeric($id)){
            $sql .= " WHERE `id`='$id'";
        }
        return $this->pdo->exec($sql);
    }

    function save($array){
        if(isset($array['id'])){
            $sql= "UPDATE `$this->table` SET ";
            if(!empty($array)){
                $tmp=$this->a2s($array);
            }
            $sql .= join(",",$tmp);
            $sql .= " WHERE `id`='{$array['id']}'";
        }else{
            $sql="INSERT INTO `$this->table` ";
            $col="(`".join("`,`",array_keys($array))."`)";
            $value="('".join("','",$array)."')";

            $sql= $sql.$col." VALUES".$value;
        }
        return $this->pdo->exec($sql);
    }

    // 自行輸入SQL語法
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

// 轉址
function to($url){
    header("location:".$url);
}

// print_r
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Admin=new DB('admin');
$Bottom=new DB('bottom');
$Goods=new DB('goods');
$Mem=new DB('mem');
$Order=new DB('orders');
$Type=new DB('type');
$Total=new DB('total');

if(!isset($_SESSION['visited'])){
    $Total->q("UPDATE `total` SET `total`=`total`+1 WHERE `id`=1");
    $_SESSION['visited']=1;
}
?>