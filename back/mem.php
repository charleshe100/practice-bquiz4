<h2 class="ct">會員管理</h2>
<table class="all ct">
    <tr>
        <td class="tt">姓名</td>
        <td class="tt">會員帳號</td>
        <td class="tt">註冊日期</td>
        <td class="tt">操作</td>
    </tr>
    <?php
    /** @var DB $Mem */
    $rows=$Mem->all();
    foreach ($rows as $row) {             
    ?>
    <tr>
        <td class="pp"><?=$row['name'];?></td>
        <td class="pp"><?=$row['acc'];?></td>
        <td class="pp"><?=$row['regdate'];?></td>
        <td class="pp">
            <?php
            if($row['acc']=='admin'){
                echo "此帳號為最高權限";
            }else{
                ?>
                <button onclick="location.href='?do=edit_mem&id=<?=$row['id'];?>'">修改</button>
                <button onclick="del('mem',<?=$row['id'];?>)">刪除</button>
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