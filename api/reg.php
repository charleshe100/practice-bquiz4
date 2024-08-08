<?php include_once "db.php";
// 自行建立POST欄位的值
$_POST['regdate']=date("Y-m-d");
$Mem->save($_POST);
?>