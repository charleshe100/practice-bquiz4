<h2>第一次購買</h2>
<img src="../icon/0413.jpg" alt="按此註冊" onclick="location.href='?do=reg'">

<h2>會員登入</h2>
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
            <input type="text" name="ans" id="ans"><br>
            <img src="" id="captcha"><button onclick="captcha()">重新產生</button> 
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('mem')">確認</button>
</div>