<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title>收货地址</title>
		<meta content="app-id=518966501" name="apple-itunes-app" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
		<meta content="yes" name="apple-mobile-web-app-capable" />
		<meta content="black" name="apple-mobile-web-app-status-bar-style" />
		<meta content="telephone=no" name="format-detection" />
		<link href="<?php echo ($staticPath); ?>/tpl/static/unitary/css/comm.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ($staticPath); ?>/tpl/static/unitary/css/login.css" rel="stylesheet" type="text/css" />
		<style>
		.registerCon li textarea {
			padding: 15px;
			width: 100%;
			height: 90px;
			color: #333;
			border: 1px solid #dedede;
			border-radius: 5px;
			margin-top: -1px;
			font-size: 16px;
			-webkit-box-sizing: border-box;
		}
		.registerCon li input {
			padding: 15px;
			width: 100%;
			height: 45px;
			color: #333;
			border: 1px solid #dedede;
			border-radius: 5px;
			margin-top: -1px;
			font-size: 16px;
			-webkit-box-sizing: border-box;
		}
		</style>
	</head>
	<body>
		<script src="<?php echo ($staticPath); ?>/tpl/static/unitary/js/jquery-2.1.3.min.js" language="javascript" type="text/javascript"></script>
		<div class="wrapper">
			<div class="registerCon">
				<ul>
					<li class="accAndPwd">
						<dl>
							昵称：
							<input id="name" maxlength="11" type="text" placeholder="请输入您的昵称" value="<?php echo ($user["name"]); ?>"/>
						</dl>
					</li>
					<li class="accAndPwd">
						<dl>
							手机号码：
							<input id="phone" maxlength="11" type="tel" placeholder="请输入您的手机号码" value="<?php echo ($user["phone"]); ?>"/>
						</dl>
					</li>
					<li class="accAndPwd">
						<dl>
							确认收货地址：
							<textarea id="address" placeholder="请填写您的收货地址"><?php echo ($user["address"]); ?></textarea>
						</dl>
					</li>
					<li><a id="btnNext" class="orangeBtn loginBtn">下一步</a></li>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				delorder();
				$("#btnNext").click(function(){
					var address = $("#address").val();
					var phone = $("#phone").val();
					var name = $("#name").val();
					if(address == ""){
						alert("请填写您的收货地址");
					}else if(phone == ""){
						alert("请填写您的手机号码");
					}else{
						window.location.href="<?php echo U('Unitary/doaddress',array('token'=>$token));?>&address="+address+"&phone="+phone+"&name="+name;
					}
				})
			})
			
			function delorder(){
				$.ajax({
					type:"POST",
					url:"<?php echo U('Unitary/cartajax',array('token'=>$token));?>",
					dataType:"json",
					data:{
						type:'delorder',
						token:"<?php echo ($token); ?>",
						wecha_id:"<?php echo ($wecha_id); ?>"
					},
					success:function(data){
						if(data.error == 1){
							//alert("支付失败");
							window.location.href="<?php echo U('Unitary/cart',array('token'=>$token));?>";
						}
					}
				});
				//setTimeout("delorder()",3000);
			}
		</script>

<?php if($unitary == ''): ?><script type="text/javascript">
window.shareData = {  
            "moduleName":"Unitary",
            "moduleID":"0",
            "imgUrl": "<?php echo ($staticPath); ?>/tpl/static/unitary/images/wxnewspic.jpg", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Unitary/index',array('token'=>$token));?>",
            "tTitle": "一元夺宝",
            "tContent": ""
        };
</script>
<?php else: ?>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Unitary",
            "moduleID":"0",
            "imgUrl": "<?php echo ($unitary['wxpic']); ?>", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Unitary/goodswhere',array('token'=>$token,'unitaryid'=>$_GET['unitaryid']));?>",
            "tTitle": "<?php echo ($unitary['name']); ?>",
            "tContent": "<?php echo ($unitary['wxinfo']); ?>"
        };
</script><?php endif; ?>
<?php echo ($shareScript); ?>
	</body>
</html>