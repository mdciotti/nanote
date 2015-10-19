<?php
if($_POST && !empty($_POST['username']) && !empty($_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$saveDir='./users/'.md5(md5($username).md5($password)).'/';
	if(!is_dir($saveDir)) mkdir($saveDir, 0, true);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>nanote - create account</title>
	<meta charset="utf-8" />
	<script src="./res/scripts/jquery.min.js"></script>
	<script type="text/javascript">
function checkName(input){
	if(input.length>=2){
	input=input.toLowerCase();
	$.ajax({
		url:'./users/manifest.xml',
		dataType:'xml',
		cache:false,
		success:function(data){
			$(data).find('user').each(function(){
			console.log($(this).text());
			if(input==$(this).text()){
				console.log('taken');
				$('#message').html('Username taken');
				$('#password:not(:disabled)').attr('disabled','disabled');
				$('#submit:not(:disabled)').attr('disabled','disabled');
				$('#username').focus();
			}else{
				console.log('available');
				$('#message').html('Username available');
				$('#password:disabled').removeAttr('disabled');
			}
			});
		}
	});
	}else{
		$('#message').html('Username too short');
		$('#password:not(:disabled)').attr('disabled','disabled');
		$('#submit:not(:disabled)').attr('disabled','disabled');
	}
}
function checkPass(input){
	if(input.length>=6){
		$('#message').html('Valid password');
		$('#submit:disabled').removeAttr('disabled');
	}else{
		$('#message').html('Password too short');
		$('#submit:not(:disabled)').attr('disabled','disabled');
	}
}
	</script>
</head>
<body>
<h1>Create an Account</h1>
<form method="POST" action="/nanote/create_account.php">
	<input type="text" id="username" name="username" placeholder="username" onchange="checkName(this.value)" maxlength="32" />
	<input type="password" id="password" name="password" placeholder="password" onchange="checkPass(this.value)" disabled="disabled" maxlength="32" />
	<input type="submit" id="submit" value="Create" disabled="disabled" />
	<div id="message"></div>
</form>
</body>
</html>