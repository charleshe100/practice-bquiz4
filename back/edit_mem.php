<?php
/** @var DB $Mem */
$row=$Mem->find($_GET['id']);
?>
<h2 class="ct">編輯會員資料</h2>
<form action="./api/save_mem.php" method="post">
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="pp">
            <input type="text" name="acc" value="<?=$row['acc'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="pp">
            <input type="text" name="pw" value="<?=str_repeat("*",strlen($row['pw']));?>"></td>
    </tr>
    <tr>
        <td class="ct tt">累積交易額</td>
        <td class="pp">0</td>
    </tr>
    <tr>
        <td class="ct tt">姓名</td>
        <td class="pp">
            <input type="text" name="name" value="<?=$row['name'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">電子信箱</td>
        <td class="pp">
            <input type="text" name="email" value="<?=$row['email'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">地址</td>
        <td class="pp">
            <input type="text" name="addr" value="<?=$row['addr'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">電話</td>
        <td class="pp">
            <input type="text" name="tel" value="<?=$row['tel'];?>"></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
    <button onclick="location.href='?do=mem'">取消</button>
</div>
</form>