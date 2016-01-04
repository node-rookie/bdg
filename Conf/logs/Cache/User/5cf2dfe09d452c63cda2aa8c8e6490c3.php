<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>抽奖 - 微现场</title>
	<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/winner_list.css">
	<script type="text/javascript" src="jquery-2.0.3.min.js" charset="utf-8"></script>
<style>
	.member-list span{width:190px;font-weight: bold;}
	.member-list li{margin:0 30px 0 10px;}
	.member-avatar{width:190px}
	.member-avatar img {width:190px;}
	.member-list p{text-align: left;margin:0;height: 30px;line-height: 30px;overflow: hidden;}
</style>
</head>
<body style="width:1200px;height:auto;">
<h1>奖品清单</h1>
	<div class="member-list" style="height: 470px;">
		<ul class="clearfix">
			<?php if(is_array($prize_info)): $i = 0; $__LIST__ = $prize_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prize_info): $mod = ($i % 2 );++$i;?><li>
					<span><?php echo ($prize_info["name"]); ?></span>
					<div class="member-avatar" style="background: #fff;"><img src="<?php echo ($prize_info["pic"]); ?>"></div>
					<p>奖品名称:<?php echo ($prize_info["pname"]); ?></p>
					<p>奖励名额：<?php echo ($prize_info["num"]); ?></p>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</body>
</html>