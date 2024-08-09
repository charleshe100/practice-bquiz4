<h2>管理員登入</h2>
<table class="all">
    <tr>
        <td class="tt">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp">
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td class="tt">驗證碼</td>
        <td class="pp">
            <?php
            $a=rand(10,99);
            $b=rand(10,99);
            $_SESSION['ans']=$a+$b;
            echo "{$a} + {$b} = "
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('admin')">確認</button>
</div>

<?php
//先以此方式，將admin的管理員資料存進資料表
    // $admin["acc"]="admin";
    // $admin["pw"]="1234";
//使用serialize()將陣列序列化轉為字串，才能存進資料表
//因為權限項目有5個checkbox，所以使用陣列的方式紀錄
//若要從資料表讀取資料，就要用unserialize()轉回陣列
    // $admin["pr"]=serialize([1,2,3,4,5]);

    // $Admin->save($admin);
?>
