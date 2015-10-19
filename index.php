<?php
//Below is a very simple PHP 5 script that implements the RPX token URL processing.
//The code below assumes you have the CURL HTTP fetching library.

$signedIn=false;

$rpxApiKey='ee58a3533e198e57a84d462cc298cdbd80cfb6e7';

if(isset($_POST['token'])){

	/*STEP 1: Extract token POST parameter*/
	$token=$_POST['token'];

	/*STEP 2: Use the token to make the auth_info API call*/
	$post_data=array('token'=>$_POST['token'],'apiKey'=>$rpxApiKey,'format'=>'json');

	$curl=curl_init();
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_URL,'https://rpxnow.com/api/v2/auth_info');
	curl_setopt($curl,CURLOPT_POST,true);
	curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
	curl_setopt($curl,CURLOPT_HEADER,false);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
	$raw_json=curl_exec($curl);
	curl_close($curl);

	/*STEP 3: Parse the JSON auth_info response*/
	$auth_info = json_decode($raw_json, true);

	if($auth_info['stat'] == 'ok') {
	
		/*STEP 3 Continued: Extract the 'identifier' from the response*/
		$profile=$auth_info['profile'];
		$identifier=$profile['identifier'];

		if(isset($profile['photo']))	{
			$photo_url=$profile['photo'];
		}

		if(isset($profile['displayName'])){
			$name=$profile['displayName'];
		}

		if(isset($profile['email'])){
			$email=$profile['email'];
		}

		//STEP 4: Use the identifier as the unique key to sign the user into your system.
		//This will depend on your website implementation, and you should add your own code here
		$signedIn=true;

	}else{//an error occurred
		//gracefully handle the error. Hook this into your native error handling system.
		echo 'An error occured: '.$auth_info['err']['msg'];
		$signedIn=false;
	}
}

if($signedIn): ?>
<!--[if IE]><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><![endif]-->
<!--[if !IE]><!--><!DOCTYPE html><!--<![endif]-->
<html>
<head>
	<title>nanote</title>
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<!--[if IE]><meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /><![endif]-->
	<!--[if !IE]><!-->
	<meta charset="utf-8" />
	<script src="./res/scripts/jquery.min.js"></script>
	<script src="./res/scripts/top_up.min.js"></script>
	<script src="./res/scripts/mousewheel.js"></script>
	<script src="./res/scripts/jScrollPane.js"></script>
	<script src="./res/scripts/placeheld.js"></script>
	<script src="./res/scripts/TextLimit.js"></script>
	<script src="./res/scripts/jReject.js"></script>
	<script src="./res/scripts/growl.js"></script>
	<script src="./res/scripts/md5.js"></script>
	<script src="./res/scripts/global.js"></script>
	<script>global.userPath='<?php echo $identifier ?>';</script>
	<script src="./res/scripts/main.js"></script>
	<style type="text/css">
@import "./res/styles/nanote.css";
@import "./res/styles/jScrollPane.css";
@import "./res/styles/growl.css";
#noCSS{display:none;}
	</style>
	<!--<![endif]-->
</head>
<body>
	<div id="noCSS"><h1><em><big><strong>You REALLY should consider turning on stylesheets, or at least use a device that supports them.</strong></big></em></h1></div>
	<div id="main"></div>
	<noscript>You must have JavaScript enabled to use nanote.</noscript>
</body>
</html>
<?php else: ?>
<!--[if IE]><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><![endif]-->
<!--[if !IE]><!--><!DOCTYPE html><!--<![endif]-->
<html>
<head>
	<title>nanote - Sign In</title>
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<!--[if IE]><meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /><![endif]-->
	<meta charset="utf-8" />
	<script src="./res/scripts/jquery.min.js"></script>
	<style type="text/css">
@import "./res/styles/main.css";
	</style>
</head>
<body>
<div id="header">
	<img src="./res/img/logo/logo.png" alt="nanote" />
</div>
<div id="content">
	<iframe id="login" src="http://nanote.rpxnow.com/openid/embed?token_url=http%3A%2F%2Fnanote.zxq.net%2F" scrolling="no" frameBorder="no" allowtransparency="true" style="width:400px;height:240px"></iframe>
	<h1>What is nanote?</h1>
	<p>nanote is a [INSERT DESCRIPTION HERE] note-taking webapp with high functionality and a great user interface.</p>
</div>
<div id="footer">
	<div id="info">
		<span id="copyright">&copy;2010</span> 
		<a href="http://greenfir3.axxim.net/">Max Ciotti</a>&nbsp;&bull;&nbsp;
		<a href="./privacy/">Privacy</a>&nbsp;&bull;&nbsp;
		<a href="mailto:nanote.app+support@gmail.com">Support</a>&nbsp;&bull;&nbsp;
		<a href="mailto:nanote.app+bugs@gmail.com">Report a Bug</a>&nbsp;&bull;&nbsp;
		<a href="http://twitter.com/nanoteapp">Twittter</a>
	</div>
</div>
</body>
</html>
<?php endif; ?>