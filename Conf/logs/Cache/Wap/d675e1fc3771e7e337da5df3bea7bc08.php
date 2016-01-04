<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta content="telephone=no" name="format-detection">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<title>微砍价</title>
		<link href="<?php echo ($staticPath); ?>/tpl/static/bargain/css/global.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ($staticPath); ?>/tpl/static/bargain/css/global2.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/bargain/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/bargain/js/global.js"></script>
		<link href="<?php echo ($staticPath); ?>/tpl/static/bargain/css/bargain.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/bargain/js/bargain.js"></script>
		<link href="<?php echo ($staticPath); ?>/tpl/static/bargain/css/idangerous.swiper.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/bargain/js/idangerous.swiper-1.9.1.min.js"></script>
		<style>
			.cont img{max-width:100%}
		</style>
	</head>
	<body>
		<script language="javascript">$(function(){bargain_obj.detail_init()});</script>
		<div class="product_detail">
			<div class="product_banner">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<a href="<?php echo ($bargain["logourl1"]); ?>"><img src="<?php echo ($bargain["logoimg1"]); ?>" alt=""></a>
						</div>
						<?php if($bargain["logoimg2"] != ''): ?><div class="swiper-slide">
							<a href="<?php echo ($bargain["logourl2"]); ?>"><img src="<?php echo ($bargain["logoimg2"]); ?>" alt=""></a>
						</div><?php endif; ?>
						<?php if($bargain["logoimg3"] != ''): ?><div class="swiper-slide">
							<a href="<?php echo ($bargain["logourl3"]); ?>"><img src="<?php echo ($bargain["logoimg3"]); ?>" alt=""></a>
						</div><?php endif; ?>
					</div>
				</div>
			</div>
			<h3><?php echo ($bargain["name"]); ?></h3>
			<div class="info">
				<span>底价:￥<font><?php echo ($bargain["minimum"]); ?></font></span><span>原价:￥<font><?php echo ($bargain["original"]); ?></font></span>
			</div>
			<div class="stock_volume"><span>库存<?php echo ($bargain["inventory"]); ?>支</span><span>销量<?php echo ($paynum); ?>支</span></div>
		</div>
		<div class="description">
			<h3 class="t">商品详情</h3>
			<div class="cont"><?php echo (htmlspecialchars_decode($bargain["info"])); ?></div>
		</div>
		<div class="description">
			<h3 class="t">活动规则</h3>
			<div class="cont"><?php echo (htmlspecialchars_decode($bargain["guize"])); ?></div>
		</div>
		<div class="join_bar_blank"></div>
		<div id="join_bar">
			<div class="price"><span>底价:￥<font><?php echo ($bargain["minimum"]); ?></font></span><span>原价:￥<font><?php echo ($bargain["original"]); ?></font></span></div>
			<?php if($type == "noorder"){?>
			<div class="btn"><a href="<?php echo U('Bargain/dao',array('token'=>$token,'id'=>$_GET['id']));?>">立即砍价</a></div>
			<?php }else{?>
			<div class="btn"><a href="<?php echo U('Bargain/dao',array('token'=>$token,'id'=>$_GET['id']));?>">我的砍价</a></div>
			<?php }?>
			<div class="clear"></div>
		</div>
		<script type="text/javascript">
		window.shareData = {  
			"moduleName":"Bargain",
			"moduleID":"<?php echo $bargain['pigcms_id'];?>",
			"imgUrl": "<?php echo $bargain['logoimg1'];?>",
			"sendFriendLink": "<?php echo ($f_siteUrl); echo U('Bargain/index',array('token'=>$token,'id'=>$bargain['pigcms_id']));?>",
			"tTitle": "<?php echo $bargain['wxtitle'];?>",
			"tContent": "<?php echo $bargain['wxinfo'];?>"
		};
		</script>
		<?php echo ($shareScript); ?>
	</body>
</html>