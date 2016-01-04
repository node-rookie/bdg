<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<script src="/tpl/static/storenew/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/tpl/static/storenew/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="/tpl/static/storenew/js/notification.js" type="text/javascript"></script>
<script src="/tpl/static/storenew/js/swiper.min.js" type="text/javascript"></script>
<script src="/tpl/static/storenew/js/main.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="/tpl/static/storenew/css/style_touch.css">
<link href="/tpl/static/storenew/style/foot.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="/tpl/static/storenew/style/1.css">
</head>
<script>
$(document).ready(function(){
	$(".m-hd .cat").parent('div').click( function() {
	    var docH=$(document).height();
	  	$('.sub-menu-list').toggle();
	    $(".m-right-pop-bg2").addClass("on").css('min-height',docH);
	});
	$(".m-right-pop-bg2").click( function() {
	    $('.sub-menu-list').hide();
		$(".m-right-pop-bg2").removeClass("on").removeAttr("style");
	});
});
</script>
<body>
<div id="top"></div>
<div id="scnhtm5" class="m-body">
<div class="m-detail-mainout">



<div class="m-hd">
<div><a href="<?php echo U('Storenew/index',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'cid' => $cid, 'twid' => $twid, 'cid' => $cid));?>" class="back">返回</a></div>
<div><a href="javascript:void(0);" class="cat">商品分类</a></div>
<div class="tit"><?php echo ($metaTitle); ?></div>
<div><a href="<?php echo U('Storenew/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid, 'cid' => $cid));?>" class="uc">用户中心</a></div>
<div><a href="<?php echo U('Storenew/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid, 'cid' => $cid));?>" class="cart">购物车<i class="cart_com"><?php if($totalProductCount != 0): echo ($totalProductCount); endif; ?></i></a></div>
</div>

<ul class="sub-menu-list">
<li><a href="<?php echo U('Storenew/select',array('token' => $_GET['token'], 'wecha_id' => $wecha_id, 'twid' => $twid));?>">浏览店铺</a></li>
<li><a href="<?php echo U('Storenew/index',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'cid' => $cid, 'twid' => $twid, 'cid' => $cid));?>">商城首页</a></li>
<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i; if($hostlist['isfinal'] == 1): ?><li><a href="<?php echo U('Storenew/products',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'twid' => $twid, 'cid' => $cid));?>"><?php echo ($hostlist["name"]); ?></a></li>
<?php else: ?>
<li><a href="<?php echo U('Storenew/cats',array('token' => $_GET['token'], 'cid' => $hostlist['cid'], 'parentid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'twid' => $twid, 'cid' => $cid));?>"><?php echo ($hostlist["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>

<div class="nav_fixed">
        <a href="<?php echo U('Storenew/grouponmy',array('token'=>$token,'list'=>0,'wecha_id'=>$wecha_id, 'twid' => $twid,'cid' => $cid));?>" class="fixed_nav_item"><span class="nav_txt">全部订单</span></a>
        <a href="<?php echo U('Storenew/grouponmy',array('token'=>$token,'list'=>1,'wecha_id'=>$wecha_id, 'twid' => $twid,'cid' => $cid));?>" class="fixed_nav_item"><span class="nav_txt nav_payment">待付款<b class="nav_payment_num" style="display:none;"></b></span></a>
        <a href="<?php echo U('Storenew/grouponmy',array('token'=>$token,'list'=>2,'wecha_id'=>$wecha_id, 'twid' => $twid,'cid' => $cid));?>" class="fixed_nav_item"><span class="nav_txt nav_receiving">已付款<b class="nav_receiving_num" style="display:none;"></b></span></a>
        <a href="<?php echo U('Storenew/grouponmy',array('token'=>$token,'list'=>3,'wecha_id'=>$wecha_id, 'twid' => $twid,'cid' => $cid));?>" class="fixed_nav_item"><span class="nav_txt nav_receiving">我的团<b class="nav_receiving_num" style="display:none;"></b></span></a>
</div>
<?php if($ordersCount != 0): if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><div id="dealliststatus1">
		<div class="order" ms-repeat-order="orders">
			<div class="order_hd">
				<?php echo (date("Y-m-d H:i",$o["addtime"])); ?>
			</div>
			<div class="order_bd">
				<div class="order_glist">
					<a href="<?php echo U('Storenew/grouponshare', array('token' => $token, 'wecha_id' => $wecha_id,'codeid' => $o['code'], 'twid' => $twid,'cid' => $cid));?>">
						<div class="order_goods" data-url="">
							<div class="order_goods_img">
								<img alt="" src="<?php echo ($o["logourl"]); ?>">
							</div>
							<div class="order_goods_info">
								<div class="order_goods_name"><?php echo ($o["name"]); ?></div>
								<div class="order_goods_attr">
									<div class="order_goods_attr_item">
										<div class="order_goods_price"><i>¥</i><?php echo ($o["tgprice"]); ?><i>元/件</i></div>数量：1
									</div>
								</div>
							</div>
						</div>
					</a>
					<div class="order_ft">
						<div class="order_total">
							<span class="order_total_info">共1件商品 ，免运费</span>
							<span class="order_price">实付：<b>¥<?php echo ($o["tgprice"]); ?></b> 元</span>
						</div>
						<div class="order_opt">
							<span class="order_status">状态</span>
							<div class="order_btn" >
							<?php if($o['status'] != 2): if($o['paid'] != 1): ?><a class="order_btn_receive"  >未付款</a>
									<a class="order_btn_buy"  href="<?php echo U('Storenew/grouponorderCart', array('token' => $token, 'wecha_id' => $wecha_id,'orid' => $o['cartid'], 'twid' => $twid,'cid' => $cid));?>">立即支付</a>
								<?php else: ?>
									<a class="order_btn_receive" >已付款</a><?php endif; ?>
								<?php if($o['sent'] == 1): ?><a class="order_btn_receive"  >查看物流</a>
									<a class="order_btn_receive" >已发货</a>
								<?php else: ?>
									<a class="order_btn_receive" >未发货</a><?php endif; ?>
							<?php else: ?>
								<?php if($o['paid'] != 1): ?><a class="order_btn_receive"  >未付款</a>
								<?php else: ?>
									<?php if($o['tuikuan'] == 0): ?><a class="order_btn_receive" href="<?php echo U('Storenew/groupontuikuanstatus', array('token' => $token, 'codeid' => $o['codeid'],'id' => $o['id'],'cid' => $cid));?>">我要退款</a>
									<?php elseif($o['tuikuan'] == 1): ?>
									<a class="order_btn_receive" >已退款</a>
									<?php elseif($o['tuikuan'] == 2): ?>
									<a class="order_btn_receive" >已提现</a><?php endif; endif; ?>
									<a class="order_btn_receive" >团购失败</a><?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php if($totalpage > 1) { ?>
		<div class="m-page uc-orderlist">
			<?php if($page == 1): ?><div class="pg-pre pg-grey"><a href="javascript:void(0);">上一页<i><em></em></i></a></div>
			<?php else: ?>
				<div class="pg-pre"><a href="<?php echo U('Storenew/my',array('token'=>$token,'page'=>intval($page - 1),'wecha_id'=>$wecha_id, 'twid' => $twid,'cid' => $cid));?>">上一页<i><em></em></i></a></div><?php endif; ?>
			<div class="pg-num"><?php echo ($page); ?>/<?php echo ($totalpage); ?></div>
			<?php if($page == $totalpage): ?><div class="pg-next pg-grey"><a href="javascript:void(0);">下一页<i><em></em></i></a></div>
			<?php else: ?>
				<div class="pg-next"><a href="<?php echo U('Storenew/my',array('token'=>$token,'page'=>intval($page + 1),'wecha_id'=>$wecha_id, 'twid' => $twid,'cid' => $cid));?>">下一页<i><em></em></i></a></div><?php endif; ?>
		</div>
	<?php }else{} ?>
<?php else: ?>
	<ul style="margin: 15px 10px;border-radius: 4px;line-height: 1.4em;font-size: 16px;border: 1px solid #ddd;background: #f5f5f5;padding: 10px 10px 6px;">
		<span><li class="p-li" style="padding:10px; text-align:center;">没有订单</li></span>
	</ul><?php endif; ?>
<div style="height:58px;visibility:hidden "></div>

<!--页面底部-->
<div class="foot30"></div>
<div class="wx_nav">
	<a href="<?php echo U('Storenew/index',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>" data-href="###" class="nav_index on">首页</a>
	<!-- <a href="<?php echo U('Storenew/jingpai',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_search" style="display:">限时竞拍</a>
	 -->
	 <a href="tel:<?php echo ($com['tel']); ?>"  class="nav_search" style="display:">客服电话</a>
	<a href="<?php echo U('Storenew/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_shopcart">购物车</a>
	
	<?php if($is_sub == 2): ?><a href="<?php echo U('Storenew/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_me">个人中心</a>
	<a href="<?php echo ($gzhurl); ?>"  class="nav_fav">一键关注</a>
	<?php else: ?>
	<a href="<?php echo U('Storenew/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_shopping_guide">我的订单</a>
	<a href="<?php echo U('Storenew/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_me">个人中心</a><?php endif; ?>
</div>
<!--页面底部-->
</body>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Store",
            "moduleID":"<?php echo ($products[0]['id']); ?>",
            "imgUrl": "<?php echo ($products[0]['logourl']); ?>", 
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Storenew/jingpai',array('token' => $_GET['token'], 'catid' => $thisCat['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Storenew/jingpai',array('token' => $_GET['token'], 'catid' => $thisCat['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Storenew/jingpai',array('token' => $_GET['token'], 'catid' => $thisCat['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>