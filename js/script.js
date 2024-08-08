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