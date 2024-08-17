<h2 class="ct">商品分類</h2>
<div class="ct">
    <label for="">新增大分類</label>
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    <label for="">新增中分類</label>
    <select name="bigs" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
<?php
$bigs=$Type->all(['big_id'=>0]);
foreach ($bigs as $big) {
?>
    <tr class="tt">
        <td><?=$big['name'];?></td>
        <td class="ct">
            <button onclick="edit(this,<?=$big['id'];?>)">修改</button>
            <button onclick="del('type',<?=$big['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
    if($Type->count(['big_id'=>$big['id']])>0){
        $mids=$Type->all(['big_id'=>$big['id']]);
        foreach($mids as $mid){
    ?>
    <tr class="pp ct">
        <td><?=$mid['name'];?></td>
        <td class="ct">
            <button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
            <button onclick="del('type',<?=$mid['id'];?>)">刪除</button>
        </td>
    </tr>
<?php    
        }   
    }   
}
?>
</table>

<hr>

<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>
<table class="all">
    <tr class="ct tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <tr class="ct pp">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <button>修改</button>
            <button>刪除</button>
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
</table>