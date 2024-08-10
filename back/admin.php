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
// 可先以此方式新增管理員，看效果
// $admin["acc"]="manager";
// $admin["pw"]="5678";
// $admin["pr"]=serialize([1,2,3,4,5]);
// $Admin->save($admin);
?>