<?php
echo $_GET['qt'];
if(isset($_GET['id']) && isset($_GET['qt'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

if(!isset($_SESSION['mem'])){
    to("?do=login");
}
echo "<h2 class='ct'>{$_SESSION['mem']}的購物車</h2>";

if(empty($_SESSION['cart'])){
    echo "<h3 class='ct'>目前購物車是空的</h3>";
}else{
?>
<table class="all">
    <tr>
        <td class="tt ct">編號</td>
        <td class="tt ct">商品名稱</td>
        <td class="tt ct">數量</td>
        <td class="tt ct">庫存量</td>
        <td class="tt ct">單價</td>
        <td class="tt ct">小計</td>
        <td class="tt ct">刪除</td>
    </tr>
    <tr>
        <td class="pp"></td>
        <td class="pp"></td>
        <td class="pp"></td>
        <td class="pp"></td>
        <td class="pp"></td>
        <td class="pp"></td>
        <td class="pp">
            <img src="./icon/0415.jpg" alt="">
        </td>
    </tr>
</table>
<?php
}
?>