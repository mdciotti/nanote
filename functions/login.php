<?php
ob_start();
$host="localhost";
$db_username="admin";
$db_password="####";
$db="nanote_zxq_main";
$table="users";

mysql_connect("$host", "$db_username", "$db_password")or die("Error: could not connect to the database");
mysql_select_db("$db")or die("Error: could not select database");

$username=mysql_real_escape_string(stripslashes($_POST['username']));
$password=mysql_real_escape_string(stripslashes($_POST['password']));

$sql="SELECT * FROM $table WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

if(mysql_num_rows($result)==1){
session_register("username");
session_register("password");
//header("location:login_success.php");
}
else{
echo "Wrong Username or Password";
}

ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>nanote - create account</title>
	<meta charset="utf-8" />
</head>
<body>
<h1>Login</h1>
<form method="POST" action="/login.php">
	<input type="text" name="username" placeholder="username" maxlength="32" />
	<input type="password" name="password" placeholder="password" maxlength="32" />
	<input type="submit" value="Login" />
</form>
</body>
</html>