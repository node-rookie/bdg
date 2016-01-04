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

<ul class="m-uc-order-p-liv m-cart-list">
<?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i; if(empty($p['detail']) != true): if(is_array($p['detail'])): $i = 0; $__LIST__ = $p['detail'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li>
				<span class="pic"><img src="<?php echo ($p["logourl"]); ?>" width="75" height="75"></span>
				<span class="con">
				<i class="t"><?php echo ($p["name"]); ?></i>
				<i class="d"><?php if(empty($p['formatTitle']) != true): echo ($p["formatTitle"]); ?>：<?php echo ($row["formatName"]); endif; ?> <?php if(empty($p['colorTitle']) != true): ?>，<?php echo ($p["colorTitle"]); ?>：<?php echo ($row["colorName"]); endif; ?></i>
				<p><label>数量：</label><?php echo ($row["count"]); ?>　<label>小计：</label><span class="price">￥<?php echo ($row['price'] * $row['count']); ?></span></p>
				<?php if($row['comment'] == 1): ?><a href="<?php echo U('Storenew/comment',array('token'=>$token,'detailid'=>$row['id'],'wecha_id'=>$wecha_id,'pid'=>$p['id'], 'cartid' => $cartid, 'twid' => $twid,'cid' => $cid));?>" style="font-size: 1.4rem;color: #fff;bottom: -1px;right: -1px;background: #ff8a00;border: 1px solid #f26100;padding: 2px 14px;line-height: 24px;border-radius: 4px 0 4px 0;">评论</a><?php endif; ?>
				</span>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php else: ?>
		<li>
			<span class="pic"><img src="<?php echo ($p["logourl"]); ?>" width="75" height="75"></span>
			<span class="con">
			<i class="t"><?php echo ($p["name"]); ?></i>
			<p><label>数量：</label><?php echo ($p["count"]); ?>　<label>小计：</label><span class="price">￥<?php echo ($p['price'] * $p['count']); ?></span></p>
			<?php if($p['comment'] == 1): ?><a href="<?php echo U('Storenew/comment',array('token'=>$token,'wecha_id'=>$wecha_id,'pid'=>$p['id'], 'cartid' => $cartid, 'twid' => $twid,'cid' => $cid));?>" style="font-size: 1.4rem;color: #fff;bottom: -1px;right: -1px;background: #ff8a00;border: 1px solid #f26100;padding: 2px 14px;line-height: 24px;border-radius: 4px 0 4px 0;">评论</a><?php endif; ?>
			</span>
		</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>
<ul class="m-uc-order-v-infobox">
<li><span class="tit">订单状态</span>
<?php if($cartData['sent']){echo '<b class="orderStatus">已发货</b>';} ?>
<?php if($cartData['paid'] == 1): ?><b class="orderStatus">已付款</b><?php else: ?><b class="noorderStatus">未付款</b><?php endif; ?>
<?php if($cartData['paid'] != 1): ?><a href="<?php echo U('Storenew/orderCart', array('token' => $token, 'wecha_id' => $wecha_id,'orid' => $cartid, 'twid' => $twid,'cid' => $cid));?>"><b class="orderStatus">立即付款</b></a><?php endif; ?>
</li>
<li class="info">
<p>订单号：<?php echo ($cartData["orderid"]); ?></p>
<p>下单时间：<?php echo (date("Y-m-d H:i:s",$cartData["time"])); ?></p>
<p>订单金额：<b> <?php echo ($totalFee); ?> 元</b></p>
</li>
<?php if(($cartData['paid'] == 0) AND ($cartData['sent'] == 0)): ?><li class="act">
<div class="btn-gray">取消订单
<select name="cancel_reason" onchange="cancleorder($(this))" class="cel-opt">
<option value="下单重复">下单重复</option>
<option value="支付问题">支付问题</option>
<option value="快递不到">快递不到</option>
<option value="更改支付方式或商品">更改支付方式或商品</option>
<option value="测试订单">测试订单</option>
<option value="包含缺货商品">包含缺货商品</option>
<option value="价格原因">价格原因</option>
<option value="其它原因">其它原因</option>
</select>
</div>
</li><?php endif; ?>
</ul>
<!-- <ul class="m-uc-order-v-infobox">
<li><span class="tit">物流信息</span></li>
<li id="shipping_wlgs">
<p>物流公司：<?php if($cartData['logistics']){echo $cartData['logistics'] . ';  订单号：' . $cartData['logisticsid'];}else{echo '普通快递';} ?></p>
</li>
</ul> -->
<ul class="m-uc-order-v-infobox">
<li><span class="tit">收货人信息</span></li>
<li class="info">
<p>收 货 人：<?php echo ($cartData["truename"]); ?></p>
<p>收货地址：<?php echo ($cartData["address"]); ?></p>
<p>联系方式：<?php echo ($cartData["tel"]); ?></p>
<p>备注信息：<?php echo ($cartData["note"]); ?></p>
</li>
</ul>
<ul class="m-uc-order-v-infobox">
<li><span class="tit">支付与配送</span></li>
<li id="shipping_zfhps" class="info">
	<?php if($cartData['paytype'] == 'alipay'): ?>支付方式：<span style="color:green">支付宝</span>
	<?php elseif($cartData['paytype'] == 'weixin'): ?>支付方式：<span style="color:green">微信支付</span>
	<?php elseif($cartData['paytype'] == 'tenpay'): ?>支付方式：<span style="color:green">财付通[wap手机]</span>
	<?php elseif($cartData['paytype'] == 'tenpayComputer'): ?>支付方式：<span style="color:green">财付通[即时到帐]</span>
	<?php elseif($cartData['paytype'] == 'yeepay'): ?>支付方式：<span style="color:green">易宝支付</span>
	<?php elseif($cartData['paytype'] == 'allinpay'): ?>支付方式：<span style="color:green">通联支付</span>
	<?php elseif($cartData['paytype'] == 'daofu'): ?>支付方式：<span style="color:green">货到付款</span>
	<?php elseif($cartData['paytype'] == 'dianfu'): ?>支付方式：<span style="color:green">到店付款</span>
	<?php elseif($cartData['paytype'] == 'chinabank'): ?>支付方式：<span style="color:green">网银在线</span>
	<?php elseif($cartData['paytype'] == 'CardPay'): ?>支付方式：<span style="color:green">会员卡支付</span><?php endif; ?>
<?php if($cartData['sent'] == 1): ?><p>快递公司：<?php echo ($cartData["logistics"]); ?></p>
<p>快递单号：<?php echo ($cartData["logisticsid"]); ?></p>
<p><a href="http://m.kuaidi100.com/index_all.html?type=<?php echo ($cartData["logistics"]); ?>&postid=<?php echo ($cartData["logisticsid"]); ?>&callbackurl=<?php echo ($f_siteUrl); echo U('Storenew/myDetail',array('token' => $_GET['token'],'cid' => $cid));?>">快递状态：<span style="color:red"><?php echo ($wuliustat); ?>  --> 查询</span></a></p><?php endif; ?>
<p>商品金额：<?php echo ($totalFee); ?> 元</p>
<p>运    费：<?php echo ($mailprice); ?> 元　</p>
<p>订单金额：<?php {echo $cartData['price'];} ?> 元</p>
<p>兑换积分：<?php {echo $cartData['score'];} ?> 分</p>
</li>
</ul>
</div>
<script type="text/javascript">
function cancleorder(obj){
    confirm =floatNotify.confirm("确定要删除此订单吗？", "",
        function(t, n) {
            if(n==true){
                var _reson=obj.val();
                var _order_id=$("#order_id").val();
                $.ajax({
                	type:"POST",
                	url: "<?php echo U('Storenew/cancelCart',array('token' => $token, 'cartid' => $cartid, 'wecha_id' => $_GET['wecha_id'], 'twid' => $twid,'cid' => $cid));?>",
                    dataType:"json",
                    success:function(data){
                        if(data.error_code == false){
                            floatNotify.simple('订单取消成功');
                            setTimeout("location.href='<?php echo U('Storenew/my',array('token' => $token, 'wecha_id' => $_GET['wecha_id'], 'twid' => $twid,'cid' => $cid));?>'",1200);  
                        }else{
                           return floatNotify.simple(data.msg);  
                        }
                    },
                    error:function(){
                       return floatNotify.simple("提交失败");
                    }
                });
            }
    	this.hide();
      }),
    confirm.show();
}
</script>
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
            "moduleID":"0",
            "imgUrl": "", 
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Storenew/myDetail',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Storenew/myDetail',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Storenew/myDetail',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>