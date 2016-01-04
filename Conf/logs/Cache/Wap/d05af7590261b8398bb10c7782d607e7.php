<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<script src="<?php echo $staticFilePath;?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/notification.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/swiper.min.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/main.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $staticFilePath;?>/css/style_touch.css">
<link type="text/css" rel="stylesheet" href="/tpl/static/store/style/<?php echo ($productSet['headerid']); ?>.css">
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
<div><a href="javascript:history.go(-1);" class="back">返回</a></div>
<div><a href="javascript:void(0);" class="cat">商品分类</a></div>
<div class="tit"><?php echo ($metaTitle); ?></div>
<div><a href="<?php echo U('Store/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid, 'cid' => $cid));?>" class="uc">用户中心</a></div>
<div><a href="<?php echo U('Store/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid, 'cid' => $cid));?>" class="cart">购物车<i class="cart_com"><?php if($totalProductCount != 0): echo ($totalProductCount); endif; ?></i></a></div>
</div>

<ul class="sub-menu-list">
<li><a href="<?php echo U('Store/select',array('token' => $_GET['token'], 'wecha_id' => $wecha_id, 'twid' => $twid));?>">浏览店铺</a></li>
<li><a href="<?php echo U('Store/cats',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'cid' => $cid, 'twid' => $twid, 'cid' => $cid));?>">商城首页</a></li>
<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i; if($hostlist['isfinal'] == 1): ?><li><a href="<?php echo U('Store/products',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'twid' => $twid, 'cid' => $cid));?>"><?php echo ($hostlist["name"]); ?></a></li>
<?php else: ?>
<li><a href="<?php echo U('Store/cats',array('token' => $_GET['token'], 'cid' => $hostlist['cid'], 'parentid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'twid' => $twid, 'cid' => $cid));?>"><?php echo ($hostlist["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>

<ul class="m-uc-i-li">
<li>
<p class="u-info">
<?php if(empty($fans['username']) != true): ?><i class="u"><?php echo ($fans['username']); ?></i>
<a href="<?php echo U('Store/logout',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid));?>" class="q">退出</a>
<br><?php endif; ?>
我的推广号：<i><?php echo ($mytwid); ?></i><br>
我的推广佣金：<i><?php echo ($total); ?>元</i><?php if($total > 0): ?><a href="<?php echo U('Store/setremove',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid));?>" class="q">[申请提现]</a><?php endif; ?><br>
历史提现金额：<i><?php echo (($count['remove'])?($count['remove']):0); ?>元</i><br>
会员类型：<?php if($distributor['id'] != ''): if($distributor['checked'] == 1): ?><span style="color:green">正式分销商</span> <?php else: ?><span style="color:red">待审核分销商...</span><?php endif; else: ?>普通会员<?php endif; ?>
</p>
</li>
<li class="msg-tip">
</li>
</ul>
<ul class="m-uc-i-li haveafter">
<li><a href="<?php echo U('Store/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid));?>">我的订单</a></li>
<li><a href="<?php echo U('Store/remove',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid));?>">提现记录</a></li>
<li><a href="<?php echo U('Store/detail',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid));?>">佣金获取记录</a></li>
<!-- <li><a href="http://m.s.cn/touch/member/coupon/">我的优惠券</a></li>
<li><a href="http://m.s.cn/touch/member/order_return/">退换货服务</a></li>
<li><a href="http://m.s.cn/touch/member/coupon_exchange/">积分兑换</a></li> -->
</ul>

<style type="text/css">
    @charset "utf-8";
    /* CSS Document */
    .h50{height:50px;}

    /*foundation*/
    .fixed {
        width: 100%;
        left: 0;
        position: fixed;
        top: 0;
        z-index: 99; }
    .sub-nav dt,
    .sub-nav dd,
    .sub-nav li {
        float: left;
        display: inline;
        margin-left: 1rem;
        margin-bottom: 0.625rem;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        font-weight: normal;
        font-size: 0.875rem;
        color: #999999; }

    .fixed.bottom{bottom:-1px; top:auto;}

    /*--nav bottom--*/
    .icon-nav-search,
    .icon-nav-store,
    .icon-nav-bag,
    .icon-nav-heart,
    .icon-nav-cart{display:inline-block;background:url("./tpl/Wap/default/common/css/store/css/img/icon-addition.png") no-repeat;background-size:300px 300px;vertical-align:middle;}
    .icon-nav-search{background-position:-32px -36px;width:22px;height:22px;}
    .icon-nav-store{background-position:-64px -36px;width:22px;height:22px;}
    .icon-nav-bag{background-position:-154px -36px;width:22px;height:22px;}
    .icon-nav-heart{background-position:-186px -36px;width:22px;height:22px;}
    .icon-nav-cart{background-position:-94px -36px;width:22px;height:22px;}

    .sub-nav.nav-b5{height:48px;margin:0;padding:0;background:#fff;border-top:0px solid #000;box-shadow:0 -3px 3px rgba(0,0,0,.1);}
    .sub-nav.nav-b5 dd{margin:0 0 0 0;width:25%;text-align:center;border-right:0px solid #ccc;
        -moz-box-sizing:border-box;
        -webkit-box-sizing:border-box;
        -o-box-sizing:border-box;
        box-sizing:border-box;
    }
    .sub-nav.nav-b5 dd.last{border-right:0;}
    .sub-nav .nav-b5-relative{position:relative;}
    .sub-nav.nav-b5 dd a{display:block;margin:0 2px;height:48px;padding:0 0 0 0;font-size:12px;color:#333;overflow:hidden;font-style:normal;}
    .sub-nav.nav-b5 dd.active a{color:#000;border-radius:0;background:#f1f1f1;}
    .sub-nav.nav-b5 dd a:active{background:#f7f7f7;}
    .sub-nav.nav-b5 dd a.more{position:relative;}
    .sub-nav.nav-b5 dd .arrow{position:absolute;right:5px;bottom:5px;width:10px;height:10px;background:url("../images/distribution2.png") no-repeat -161px -455px;background-size:300px 1000px;}
    .sub-nav.nav-b5 dd i{display:block;margin:5px auto 0px auto;width:22px;height:22px;}
    .sub-nav.nav-b5 dd.active .icon-nav-home{background-position:0 -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-search{background-position:-32px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-store{background-position:-64px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-cart{background-position:-94px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-order{background-position:-126px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-bag{background-position:-154px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-heart{background-position:-186px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-cart{background-position:-94px -66px;}
</style>
<div class="fixed bottom" style="display:none">

    <dl class="sub-nav nav-b5" >
        <dd>
            <?php if($distributor['id'] != ''): ?><div class="nav-b5-relative"><a href="<?php echo U('DrpStore/index', array('id' => $store['id']));?>"><i class="icon-nav-store"></i>我的店铺</a></div>
            <?php else: ?>
            <div class="nav-b5-relative"><a href="<?php echo U('Store/select', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $_GET['twid']));?>"><i class="icon-nav-store"></i>逛街</a></div><?php endif; ?>
        </dd>
        <dd>
            <?php if($distributor['id'] != ''): ?><div class="nav-b5-relative"><a href="<?php echo U('DrpUcenter/drp_index');?>"><i class="icon-nav-bag"></i>分销管理</a></div>
            <?php else: ?>
            <div class="nav-b5-relative"><a href="<?php echo U('DrpStore/login', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $_GET['twid']));?>"><i class="icon-nav-bag"></i>分销申请</a></div><?php endif; ?>
        </dd>
        <dd>
            <div class="nav-b5-relative"><a href="<?php echo U('Store/cart', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $_GET['twid']));?>"><i class="icon-nav-cart"></i>购物车</a></div>
        </dd>
        <dd>
            <div class="nav-b5-relative"><a href="<?php echo U('Store/my', array('token' => $_GET['token']));?>"><i class="icon-nav-heart"></i>用户中心</a></div>
        </dd>
    </dl>

</div>
</body>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Store",
            "moduleID":"",
            "imgUrl": "", 
            "timeLineLink": "<?php echo C('site_url') . U('Store/my',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Store/my',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "weiboLink": "<?php echo C('site_url') . U('Store/my',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>