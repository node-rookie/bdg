<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/repastnew/css/common.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/repastnew/css/color.css" media="all">
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/repastnew/js/jquery_min.js"></script>
<title><?php echo ($metaTitle); ?></title>	
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<!-- Mobile Devices Support @begin -->
		<meta content="telephone=no, address=no" name="format-detection">
		<meta name="apple-mobile-web-app-capable" content="yes"> <!-- apple devices fullscreen -->
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<!-- Mobile Devices Support @end -->
</head>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/repastnew/js/nav.js"></script>
<link href="<?php echo ($staticPath); ?>/tpl/static/repastnew/css/nav.css" rel="stylesheet">
<body onselectstart="return true;" ondragstart="return false;">
	<div data-role="container" class="container orderList">
		<section data-role="body">
		<div>我的订单</div>
		<ul class="orderlist">
		   <?php if(!empty($orderList)): if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><li>
				<a href="<?php echo U('Repast/myOrderDetail', array('token'=>$token, 'cid'=>$order['cid'],'orid'=>$order['oid'], 'wecha_id'=>$wecha_id));?>" class="info">
				<?php if($order['paid'] == 0): if(($order['takeaway'] == 2 AND $order['otime'] > $today) OR ($order['takeaway'] == 0 AND ($order['reservetime'] > $today))): ?><span class="sawtooth processing">处理中</span>
				  <label>
				  <span class="name"><?php echo ($order['cyname']); ?></span>
				  <span class="time"><?php echo ($order['otimestr']); ?></span>
				  </label>
				  </a>
				  <a href="<?php echo U('Repast/OrderToPay', array('token'=>$token, 'cid'=>$order['cid'],'orid'=>$order['oid'], 'wecha_id'=>$wecha_id));?>" class="btn" style="margin-right: 15px;">去付款</a>
				 <!---<?php if(isset($order['jiaxcai']) AND $order['jiaxcai']): ?><a href="<?php echo U('Repast/dishMenu', array('token'=>$token, 'cid'=>$order['cid'],'orid'=>$order['oid'], 'wecha_id'=>$wecha_id));?>" class="btn" style="margin-right: 100px;">去加菜</a><?php endif; ?>-->
				<?php else: ?>
				 <span class="sawtooth faild hasicon"><label>×</label>已过期</span>
				 <label>
				  <span class="name"><?php echo ($order['cyname']); ?></span>
				  <span class="time"><?php echo ($order['otimestr']); ?></span>
				  </label>
				  </a>
				  <!---<?php if(isset($order['jiaxcai']) AND $order['jiaxcai']): ?><a href="<?php echo U('Repast/dishMenu', array('token'=>$token, 'cid'=>$order['cid'],'orid'=>$order['oid'], 'wecha_id'=>$wecha_id));?>" class="btn" style="margin-right: 30px;">去加菜</a><?php endif; ?>--><?php endif; ?>
				<?php else: ?>
				  <span class="sawtooth faild hasicon"><label>×</label>已完成</span>
				  <label>
				  <span class="name"><?php echo ($order['cyname']); ?></span>
				  <span class="time"><?php echo ($order['otimestr']); ?></span>
				  </label>
				  </a>
				  <!---<?php if(isset($order['jiaxcai']) AND $order['jiaxcai']): ?><a href="<?php echo U('Repast/dishMenu', array('token'=>$token, 'cid'=>$order['cid'],'orid'=>$order['oid'], 'wecha_id'=>$wecha_id));?>" class="btn" style="margin-right: 30px;">去加菜</a><?php endif; ?>--><?php endif; ?>
				<a><span class="icon_right"><span class="right_adron"></span></span></a>
			</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
			</ul>
		</section>
<footer data-role="footer">
<nav class="nav">
	<ul class="box">
	<li>
		<a href="<?php echo U('Index/index', array('token'=>$token, 'wecha_id'=>$wecha_id));?>">
		<span class="home">&nbsp;</span>
		<label>首页</label>				
		</a>
	</li>
	<li>
		<a href="<?php echo U('Repast/index', array('token'=>$token, 'st'=>'1','wecha_id'=>$wecha_id));?>">
		<span class="order">&nbsp;</span>
		<label>在线点餐</label>				
		</a>
	</li>
	<li>
		<a href="<?php echo U('Repast/index', array('token'=>$token, 'st'=>'2','wecha_id'=>$wecha_id));?>">
		<span class="book">&nbsp;</span>
		<label>在线订位</label>	
		</a>
	</li>
	<li class="more on">
		<a href="<?php echo U('Repast/myOrders', array('token'=>$token,'wecha_id'=>$wecha_id));?>">
		<span class="my">&nbsp;</span>
		<label>我的订单</label>
		</a>
	</li>		
  </ul>
</nav>
</footer>
</div>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Repast",
            "moduleID":"0",
            "imgUrl": "<?php echo ($company['logourl']); ?>", 
            "timeLineLink": "<?php echo $f_siteUrl . U('Repast/index',array('token' => $token));?>",
            "sendFriendLink": "<?php echo $f_siteUrl . U('Repast/index',array('token' => $token));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</body>
</html>