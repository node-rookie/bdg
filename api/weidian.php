
<?php 
//微店登陆跳转地址
session_start();
if(!empty($_POST['phone']) && !empty($_POST['password'])){
	$phone = trim($_POST['phone']);
	$password = trim($_POST['password']);
	$salt = 'pigcms';
	$key = md5(md5($password).$salt);
	$post_data = array();
	$post_data['phone'] = $phone;
	$post_data['key'] = $key;
	$post_data['app_id'] = 1;
	$sort_data = $post_data;
	$sort_data['salt'] = $salt;
	ksort($sort_data);
	$sign_key = sha1(http_build_query($sort_data));
	$post_data['sign_key'] = $sign_key;
	$url = 'http://v.meihua.com/api/login.php';
	$result = json_decode(curl_post($url,$post_data),true);
	if($result['error_code'] == 0 && !empty($result['return_url'])){
		$_SESSION['status'] = 'logined';
		$_SESSION['return_url'] = $result['return_url'];
		echo json_encode(array('error_code'=>0));
		exit;
	}else{
		echo json_encode(array('error_code'=>$result['error_code'],'error_msg'=>$result['error_msg']));
		exit;
	}
}elseif(@$_SESSION['status'] == 'logined' && !empty($_SESSION['return_url'])){
	echo '<html><body style="padding: 0px; margin: 0px; zoom: 1;">';
	echo '<iframe id="iframepage" style="margin:0;" frameborder="0"  height="100%" width="100%" src="'.$_SESSION['return_url'].'" name="iframepage" marginwidth="0" marginheight="0">';
	echo '</body></html>';
}else{
 	if (file_exists('../Conf/info.php'))
	{
		$info = require('../Conf/info.php');
	}
	else if(file_exists('../PigData/conf/info.php'))
	{
		$info = require('../PigData/conf/info.php');
	}
	else
	{
		$info = require('../DataPig/conf/info.php');
	}

	if( strpos($info['site_logo'], 'tpl') === 0)
	{
		$info['site_logo'] = '/'.$info['site_logo'];
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录 - 微店</title>
<meta name="author" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<link href="/tpl/static/weidian/css/base.css" type="text/css" rel="stylesheet">
<link href="/tpl/static/weidian/css/login.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/tpl/static/weidian/js/jquery.min.js"></script>
<script type="text/javascript" src="/tpl/static/weidian/js/login.js"></script>
</head>
<body>
<div id="hd" class="wrap rel">
<div class="wrap_1000 clearfix">
	<h1 id="hd_logo" class="abs" title="<?php echo $info['site_title'];?>">
		<a href="<?php echo $info['site_url'];?>">
			<img src="<?php echo $info['site_logo'];?>" alt="">
		</a>
	</h1>
</div>
</div>
<form action="/api/weidian.php" method="POST" id="weidian_login">
<div id="loginPane" class="kd-regist">
	<div class="kd-regist-wrapper">
		<div class="kd-regist-title">用户登录</div>
		<div class="J_textboxPrompt input-phone">
			<input id="phone" name="phone" type="text" autocomplete="off">
			<label class="input-text" style="display: block;">请输入您的手机号码</label>
			<span class="icon"></span>
		</div>
		<div class="J_textboxPrompt input-pwd">
			<input id="password" name="password" type="password" autocomplete="off">
			<label class="input-text" style="display: none;">请输入您的密码</label>
			<span class="icon"></span>
		</div>
		<div id="J_loginError" class="kd-form-error"></div>
		<input id="loginValidate" class="kd-form-btn" type="button" value="登	录" style="width:320px;">
	</div>
</div>
</form>
</body></html>
<?php
}
?>
<?php 
 function curl_post($url,$post){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// post数据
	curl_setopt($ch, CURLOPT_POST, 1);
	// post的变量
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	$output = curl_exec($ch);
	curl_close($ch);
	//返回获得的数据
	return $output;
}
?>