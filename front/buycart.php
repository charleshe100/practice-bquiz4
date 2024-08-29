<?php
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
    <?php
    foreach ($_SESSION['cart'] as $id => $qt) {
        $goods=$Goods->find($id);
    ?>    
    <tr>
        <td class="pp"><?=$goods['no'];?></td>
        <td class="pp"><?=$goods['name'];?></td>
        <td class="pp"><?=$qt;?></td>
        <td class="pp"><?=$goods['stock'];?></td>
        <td class="pp"><?=$goods['price'];?></td>
        <td class="pp"><?=$goods['price'] * intval($qt);?></td>
        <td class="pp">
            <img src="./icon/0415.jpg" onclick="removeItem(<?=$id;?>)">
        </td>
    </tr>
    <?php } ?>
</table>
<div class="ct">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
</div>
<?php
}
?>

<script>
function removeItem(id){
	console.log('removeItem Ok');
	
	$.post("./api/del_cart.php",{id},function(){
		location.href='index.php?do=buycart';
	})
}
</script>