<?php $user=$Order->find($_GET['id']);?>
<h2 class="ct">訂單編號<span style="color: red;"><?=$user['no'];?></span>的詳細資料 </h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><?=$user['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><?=$user['name'];?></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><?=$user['tel'];?></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><?=$user['addr'];?></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><?=$user['email'];?></td>
    </tr>
</table>

<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
     $cart=unserialize($user['cart']);
     foreach($cart as $id => $qt){
         $row=$Goods->find($id);
    ?>
    <tr class="pp ct">
        <td><?=$row['name'];?></td>
        <td><?=$row['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$row['price'];?></td>
        <td><?=$row['price']*$qt;?></td>

    </tr>
    <?php } ?>
</table>
<div class="all tt ct">總價:<?=$user['total'];?></div>
<div class="ct">
    <button onclick="location.href='?do=order'">返回</button>
</div>