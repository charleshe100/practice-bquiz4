<?php
// dd($_SESSION['admin']);
if($_SESSION['admin']=='admin'){
?>
<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>
</div>
<table class="all ct">
    <tr>
        <td class="tt">帳號</td>
        <td class="tt">密碼</td>
        <td class="tt">管理</td>
    </tr>
    <?php
    /** @var DB $Admin */
    $rows=$Admin->all();
    foreach ($rows as $row) {             
    
    ?>
    <tr>
        <td class="pp"><?=$row['acc'];?></td>
        <td class="pp"><?=str_repeat('*',strlen($row['pw']));?></td>
        <td class="pp">
            <?php
            if($row['acc']=='admin'){
                echo "此帳號為最高權限";
            }else{
                ?>
                <button onclick="location.href='?do=edit_admin&id=<?=$row['id'];?>'">修改</button>
                <button onclick="del('admin',<?=$row['id'];?>)">刪除</button>
            <?php
            }
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <button onclick="location.href='index.php'">返回</button>
</div>
<?php
}else{
?>
<?php
/** @var DB $Admin */
$acc=$_SESSION['admin'];
$row=$Admin->q("SELECT * FROM `admin` WHERE `acc`='$acc'");
// dd($row);
$row[0]['pr']=unserialize($row[0]['pr']);
// dd($row[0]['pr']);
?>
<h2 class="ct">顯示管理權限</h2>
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><?=$row[0]['acc'];?></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><?=$row[0]['pw'];?></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <input type="checkbox" name="pr[]" value="1" disabled <?=(in_array(1,$row[0]['pr']))?'checked':'';?>>商品分類與管理<br>
                <input type="checkbox" name="pr[]" value="2" disabled <?=(in_array(2,$row[0]['pr']))?'checked':'';?>>訂單管理<br>
                <input type="checkbox" name="pr[]" value="3" disabled <?=(in_array(3,$row[0]['pr']))?'checked':'';?>>會員管理<br>
                <input type="checkbox" name="pr[]" value="4" disabled <?=(in_array(4,$row[0]['pr']))?'checked':'';?>>頁尾版權區管理<br>
                <input type="checkbox" name="pr[]" value="5" disabled <?=(in_array(5,$row[0]['pr']))?'checked':'';?>>最新消息管理<br>
            </td>
        </tr>
    </table>
</form>
<?php
}
?>

<?php
// 可先以此方式新增管理員，看效果
// $admin["acc"]="manager";
// $admin["pw"]="5678";
// $admin["pr"]=serialize([1,2,3,4,5]);
// $Admin->save($admin);
?>