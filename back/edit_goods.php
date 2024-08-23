<?php
$goods=$Goods->find($_GET['id']);
?>
<h2 class="ct">修改商品</h2>
<form action="./api/save_goods.php" method="post" enctype="multiopart/form-data">
    <table class="all">
        <tr>
            <td class="ct tt">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="ct tt">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品編號</td>
            <td class="pp" id="no"><?=$goods['no'];?></td>
        </tr>
        <tr>
            <td class="ct tt">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" id="name" value="<?=$goods['name'];?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品價格</td>
            <td class="pp">
                <input type="text" name="price" id="price" value="<?=$goods['price'];?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">規格</td>
            <td class="pp">
                <input type="text" name="spec" id="spec" value="<?=$goods['spec'];?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" id="stock" value="<?=$goods['stock'];?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品圖片</td>
            <td class="pp">
                <input type="file" name="img" id="img">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品介紹</td>
            <td class="pp"><textarea name="intro" id="intro" style="width:80%;height:150px"><?=$goods['intro'];?></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$goods['id'];?>">
        <button type="submit">修改</button>
        <button type="reset">重置</button>
        <button onclick="location.href='?do=th'">返回</button>
    </div>
</form>