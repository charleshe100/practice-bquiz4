<?php include_once "db.php";

//後六碼用亂數來產生
$_POST['no']=date("Ymd").rand(100000,999999);

$_POST['acc']=$_SESSION['mem'];

$_POST['orderdate']=date("Y-m-d");

//將購物實陣列轉為字串
$_POST['cart']=serialize($_SESSION['cart']);

$Order->save($_POST);

unset($_SESSION['cart']);
?>