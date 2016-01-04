<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<script src="/tpl/static/Storenew/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/tpl/static/Storenew/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="/tpl/static/Storenew/js/notification.js" type="text/javascript"></script>
<script src="/tpl/static/Storenew/js/swiper.min.js" type="text/javascript"></script>
<script src="/tpl/static/Storenew/js/main.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="/tpl/static/Storenew/css/style_touch.css">
<link href="/tpl/static/Storenew/style/foot.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="/tpl/static/Storenew/style/1.css">
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

<link href="<?php echo ($staticPath); ?>/tpl/static/Storenew/css/eve.css" rel="stylesheet"/>
<link href="<?php echo ($staticPath); ?>/tpl/static/Storenew/css/other.css" rel="stylesheet"/>
<div class="msg-err" style="display: none;"></div>
<div id="login" class="body account">
    <div class="wrapper">
        <div id="login-panel" class="panel" data-tab="normal">
            <div id="normal-panel" class="active-panel normal-panel">
                <form id="normal-login-form" action="<?php echo U('Storenew/register',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid, 'cid' => $cid));?>" autocomplete="off" method="post">
                    <p><input class="input-common" type="text" placeholder="账号" name="username" /></p>
                    <p><input class="input-common" type="text" placeholder="请输入您的手机号" name="tel" /></p>
                    <p><input class="input-common" type="text" placeholder="请输入您的真实姓名" name="truename" /></p>
                    <p><input class="input-common" type="text" placeholder="请输入您的通信地址" name="address" /></p>
                    <p><input class="input-common" type="password" placeholder="请设置您的密码" name="password" /></p>
                    <p><input class="input-common" type="password" placeholder="请输入您的确认密码" name="password2" /></p>
					<button type="submit" class="btn-large btn-large mj-submit mj-submit">注册</button>
                </form>
            </div>
        </div>
    </div>
</div>
<p class="sub-action"><a href="<?php echo U('Storenew/login', array('token' => $token, 'wecha_id' => $wecha_id, 'twid' => $twid));?>">已有账号，现在登录</a> <!-- <a href="">找回密码</a> --></p>
<div id="meituan_check" style="margin:0 0 55px 0"><br><br><br></div>
<!--页面底部-->
<div class="foot30"></div>
<div class="wx_nav">
	<a href="<?php echo U('Storenew/index',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>" data-href="###" class="nav_index on">首页</a>
	<!-- <a href="<?php echo U('Storenew/jingpai',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_search" style="display:">限时竞拍</a>
	 -->
	 <a href="tel:0371-11111111"  class="nav_search" style="display:">客服电话</a>
	<a href="<?php echo U('Storenew/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_shopcart">购物车</a>
	<a href="<?php echo U('Storenew/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_shopping_guide">我的订单</a>
	<a href="<?php echo U('Storenew/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_me">个人中心</a>
</div>
<!--页面底部-->
</body>
<script type="text/javascript">
window.shareData = {  
            "moduleName" : "Store",
            "moduleID" : "",
            "imgUrl" : "", 
            "timeLineLink" : "<?php echo ($f_siteUrl); echo U('Storenew/products',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Storenew/products',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Storenew/products',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>