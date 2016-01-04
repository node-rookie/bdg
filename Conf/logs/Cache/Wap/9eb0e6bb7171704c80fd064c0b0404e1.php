<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title>所有购买记录</title>
		<meta content="app-id=518966501" name="apple-itunes-app" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
		<meta content="yes" name="apple-mobile-web-app-capable" />
		<meta content="black" name="apple-mobile-web-app-status-bar-style" />
		<meta content="telephone=no" name="format-detection" />
		<link href="<?php echo ($staticPath); ?>/tpl/static/unitary/css/comm.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ($staticPath); ?>/tpl/static/unitary/css/goods.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<script src="<?php echo ($staticPath); ?>/tpl/static/unitary/js/jquery-2.1.3.min.js" language="javascript" type="text/javascript"></script>
		<div id="loadingPicBlock">
			<div class="wrapper">
				<div id="divRecordList" class="buy_records" style="margin-bottom:60px;">
					<ul>
						<?php if(is_array($cart_list)): $i = 0; $__LIST__ = $cart_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<span>
								<?php if($vo["pic"] == ''): ?><a href=""><img src="<?php echo ($staticPath); ?>/tpl/static/unitary/images/00000000000000000.jpg"></a>
								<?php else: ?>
								<a href=""><img src="<?php echo ($vo["pic"]); ?>"></a><?php endif; ?>
							</span>
							<dl>
								<dt><a href="" class="blue"><?php echo ($vo["name"]); ?></a></dt>
								<dd class="gray6">购买了<b class="orange"><?php echo ($vo["count"]); ?></b>人次</dd>
								<dd class="gray9"><?php echo date("Y-m-d H:i:s",$vo['addtime']);?></dd>
							</dl>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="footer" style="display:block;">
					<ul>
						<li class="f_whole"><a href="<?php echo U('Unitary/index',array('token'=>$token));?>" title="所有商品"><i></i>所有商品</a></li>
						<li class="f_car"><a id="btnCart" href="<?php echo U('Unitary/cart',array('token'=>$token));?>"  title="购物车"><i><?php if($cart_count != null && $cart_count != 0){?><b><?php echo ($cart_count); ?></b><?php }?></i>购物车</a></li>
						<li class="f_personal"><a href="<?php echo U('Unitary/my',array('token'=>$token));?>"  title="我的"><i></i>我的</a></li>
					</ul>
				</div>
			</div>
		</div>
		<script type="text/javascript">
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