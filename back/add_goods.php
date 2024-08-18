<h2 class="ct">新增商品</h2>
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
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <td class="ct tt">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品價格</td>
            <td class="pp">
                <input type="text" name="price" id="price">
            </td>
        </tr>
        <tr>
            <td class="ct tt">規格</td>
            <td class="pp">
                <input type="text" name="spec" id="spec">
            </td>
        </tr>
        <tr>
            <td class="ct tt">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" id="stock">
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
            <td class="pp"><textarea name="intro" id="intro" style="width:80%;height:150px"></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">新增</button>
        <button type="reset">重置</button>
        <button onclick="location.href='?do=th'">返回</button>
    </div>
</form>

<script>
// 載入大分類選單
getType('big')

// 大分類和中分類選單連動
$("#big").on("change",function(){
	getType('mid',$("#big").val())
})

function getType(type,big_id=0){
	$.get("./api/get_types.php",{type,big_id},(res)=>{
		$(`#${type}`).html(res)

		if(type=='big'){
			getType('mid',$("#big").val())
		}
	})
}
</script>