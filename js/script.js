// JavaScript Document
function lof(x)
{
	location.href=x
}

// console.log('script has been loaded.');

// 檢測帳號
function chkacc(){
	let acc=$("#acc").val()
	$.get("./api/chk_acc.php",{acc},(res)=>{
		if(parseInt(res)==1 || acc=='admin'){
			alert(`此帳號${acc}已被使用`)
		}else{
			alert(`此帳號${acc}可以使用`)
		}
	})
}

// 註冊會員
function reg(){
	let user={
		name:$("#name").val(),
		acc:$("#acc").val(),
		pw:$("#pw").val(),
		tel:$("#tel").val(),
		addr:$("#addr").val(),
		email:$("#email").val(),
	}
	$.get("./api/chk_acc.php",{acc:user.acc},(res)=>{
		if(parseInt(res)==1 || user.acc=='admin'){
			alert(`此帳號${user.acc}已被使用`)
		}else{
			$.post("./api/reg.php",user,()=>{
				alert("註冊成功，歡迎加入")
				location.href='?do=login'
			})
		}
	})
}

// 重置input裡的資料
function clean(){
	$('input').val('')
}

// 驗證 驗證碼與會員密碼
function login(table){
	$.get('./api/chk_ans.php',{ans:$("#ans").val()},(chk)=>{
		if(parseInt(chk)==0){
			alert("驗證碼錯誤，請重新輸入")
		}else{
			$.post('./api/chk_pw.php',{table,acc:$("#acc").val(),pw:$("#pw").val()},(res)=>{
				if(parseInt(res)==0){
					alert("帳號或密碼錯誤，請重新輸入")
				}else{
					location.href='index.php';
					alert("恭喜登入成功！");
				}
			})
		}
	})
}