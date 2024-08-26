<?php
//取得商品資料
$goods=$Goods->find($_GET['id']);
//取得商品分類文字
$types=$Type->find($goods['big'])['name']." > ".$Type->find($goods['mid'])['name'];
?>
<style>
/**
 * > 代表子元素中第一層的div
 * 只有第一層的div會被設定樣式
 */

</style>
<h2 class="ct"><?=$goods['name'];?></h2>
<div class="all" style="display:flex">
    <div class='pp'>
        <img src="./img/<?=$goods['img'];?>" style="width:100%;height:250px">
    </div>
    <div>
        <div class="pp">分類:<?=$types;?></div>
        <div class="pp">編號:<?=$goods['no'];?></div>
        <div class="pp">價格:<?=$goods['price'];?></div>
        <div class="pp">詳細說明:<?=nl2br($goods['intro']);?></div>
        <div class="pp">庫存量:<?=$goods['stock'];?></div>
    </div>
</div>
<div class="ct all tt">
    購買數量:
    <input type="number" value='1' style="width:30px;">
    <a href="Javascript:buycart(<?=$goods['id'];?>)">
        <img src="./icon/0402.jpg" alt="">
    </a>
</div>