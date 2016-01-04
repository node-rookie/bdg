<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>团购</title>
    <meta name="description" content="">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no"  />
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name='apple-touch-fullscreen' content='yes'>
    <meta name="full-screen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="address=no"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="tpl/static/groupon/wap/css.css" />
<script src="/tpl/Wap/default/common/css/product/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/tpl/Wap/default/common/css/product/js/main.js"></script>
</head>
<body id='index'>
<a name="top"></a>
<style>
.deal-title img {max-width:360px; margin:0 auto;}
</style>
<header>
        <div class="left-box">
            <a class="hd-lbtn" href="<?php echo U('Groupon/product',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$product['id']));?>"><span>返回</span></a>
        </div>
        <h1>团购详情</h1>
    </header>
<div class="msg-ok" id="okMsg" style="display: none;"></div>
<div class="msg-err" id="errMsg" style="display: none;"></div>
<div id="deal" class="deal" xmlns="http://www.w3.org/1999/html">
    <div class="deal-intro">
       
  
        <div class="deal-title">
            <h1><?php echo ($product["name"]); ?></h1>

            <p class="explain"><?php echo ($product["intro"]); ?></p>

        </div>
        <ul class="deal-tips">
            <li><span class="icon-fonts">C</span>已售<?php echo ($product['salecount']+$product['fakemembercount']); ?></li>
            <li><span class="icon-fonts">D</span><?php echo (date("Y-m-d",$product["endtime"])); ?>结束</li>
        </ul>
    </div>

   
<script type="text/javascript">
    //点击加入购物车
    function add_cart() {
    	location.href="<?php echo U('Groupon/orderCart',array('token'=>$token,'id'=>$product['id'],'price'=>$product['price'],'count'=>1,'wecha_id'=>$_GET['wecha_id']));?>";
    }
</script>
    
    <div style="margin:20px 10px 10px 10px">
     <?php if ($product['endtime']>time()){?><a class="btn-large btn-tip" onclick="add_cart();" href="###">立即购买</a><?php }else {?><a class="btn-large btn-tip" href="###">已结束</a><?php }?>
            
    </div>

<div id="mask" class="shadow" style="display: none"></div>



<div id="img_pop" class="img-pop" style="display: none;">

</div>
<nav class="pageinator clearfix">
    <div id="nav-page" class="pg-next">
    </div>
    <?php if($hideTopButton != 1): ?><div id="nav-top" class="pg-top">
        <span class="btn btn-top"><span class="icon icon-top"><a href="#top" style="color:#666">回到顶部</a></span></span>
    </div><?php endif; ?>
</nav>
<footer>
<div class="ft-copyright"><span class="ft-copyright-text"> &copy;<?php echo date('Y',time());?> </span></div>
</footer>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Groupon",
            "moduleID":"0",
            "imgUrl": "", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Groupon/grouponIndex',array('token'=>$token));?>",
            "tTitle": "团购",
            "tContent": ""
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>