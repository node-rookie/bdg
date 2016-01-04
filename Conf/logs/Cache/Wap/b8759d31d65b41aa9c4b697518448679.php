<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>专属二维码</title>
    <link rel="stylesheet" type="text/css" href="/tpl/static/storenew/css/foundation.css?v=150317X2">
    <link href="/tpl/static/storenew/css/bottom.css?x=150317X2" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/tpl/static/storenew/css/common-v4.0.css?v=150317X2">
</head>

<body class="body-gray" >

    <!--topbar begin-->
    <div >
        <nav class="tab-bar">
            <section class="left-small">
                <a href="javascript:history.back();" class="menu-icon"><span></span></a>
            </section>
            <section class="middle tab-bar-section">
                <h1 class="title">长按二维码可保存到手机</h1>
            </section>
        </nav>
    </div>
    <!--topbar end-->
    <!--content begin-->
    <div class="qrcode">
	<?php if($erweima != false): ?><img src="<?php echo ($erweima['imgurl']); ?>">
		<a href="#" class="qrcode-a">长按二维码可保存到手机</a>
	<?php else: ?>
        <a class="qrcode-address" href="#">二维码已生成，请返回我的个人中心，再次获取专属二维码</a>
		<a href="<?php echo U('Storenew/myerweima',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>" class="qrcode-a">查看我的专属二维码</a><?php endif; ?>

    </div>
    <!--content end-->
</body>
<footer style="width:100%;min-width:300px;margin-top:10px;margin-bottom:50px;padding:10px 0;color:#555;text-align:center;"><a style="color:#555;margin:0 3px;" href="">&copy; <?php echo ($com['name']); ?></a></footer>
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
            "moduleName":"Storenew",
            "moduleID":"",
            "imgUrl": "", 
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Storenew/my',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Storenew/my',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Storenew/my',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>