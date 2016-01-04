<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0078)http://wxsyb.bama555.com/activity/free_vote/result_list/?id=23839&rotate_id=58 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>投票</title>
	<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/winner_list.css">
</head>
<body style="width:1200px;height:550px;">
<h1>中奖名单</h1>
	<ul class="rotate-tab clearfix">
		<?php if(is_array($max)): $key = 0; $__LIST__ = $max;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$max): $mod = ($key % 2 );++$key;?><li class="<?php if($round == $max['round']): ?>active<?php endif; ?>">
				<a href="<?php echo U('Scene/show_shake',array('sceneid'=>$sceneid,'id'=>$id,'round'=>$max['round']));?>">第<?php echo ($key); ?>轮</a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
		<span class="clear"></span>
	</ul>
<div class="member-list" style="height: 390px;">
	<ul class="clearfix">
		<ul class="clearfix">
			<?php if(is_array($data)): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($key % 2 );++$key;?><li>
					<span>第<?php echo ($key); ?>名</span>
					<div class="member-avatar"><img src="<?php echo ($data["head"]); ?>"></div>
					<span><?php echo ($data["name"]); ?></span>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</ul>
</div>
</body></html>