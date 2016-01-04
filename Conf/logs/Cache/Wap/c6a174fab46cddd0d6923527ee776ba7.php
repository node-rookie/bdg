<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<title><?php echo ($news["title"]); ?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="/tpl/static/storenew/css/oder.css?r=1430970616"/>
<link rel="stylesheet" href="./tpl/static/storenew/css/news.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" />
<meta name="mobileOptimized" content="width" />
<meta name="handheldFriendly" content="true" />
<meta http-equiv="Cache-Control" content="max-age=0" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link href="/tpl/static/storenew/css/bottom.css?x=150317X2" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="/tpl/static/storenew/css/foundation.css?v=3132323">
 <link rel="stylesheet" type="text/css" href="/tpl/static/storenew/css/common-v4.0.css?v=3133233">
<style>
.main-box{padding:15px 5%;}
.rule-detail{ width: 100%; background-color: white;   padding: 15px;}
.border-box{-webkit-box-sizing: border-box;box-sizing: border-box;}
</style>
</head>
<div class="panel memberhead">
    <div class="header-l">
	<img class="icon-level-p1" src="<?php echo ($fans["portrait"]); ?>"/>
    </div>

    <div class="header-r">
        <ul class="distributor-infor">

            <li><span class="distributor-infor-label">昵称：</span><span class="distributor-infor-c"><?php echo ($fans["truename"]); ?></span></li>

            <li><span class="distributor-infor-label">等级：</span><span class="distributor-infor-c">会员(<a
                    class="txt-link" href="#"> 分享微店赚佣金</a>)</span>
            </li>
            <li><span class="distributor-infor-label">注册日期：</span><span class="distributor-infor-c">
                   <?php echo (date("Y-m-d",$weiuser)); ?></span>
            </li>
        </ul>
    </div>
</div>

<!--head end-->
<!--count begin-->
<body class="body-gray my-memvers">
<div id="news">
<div class="page-bizinfo">
	<div class="header" style="position: relative;">
		<h1 id="activity-name"><?php echo ($news["title"]); ?></h1>
		<span id="post-date">时间：<?php echo (date("Y-m-d H:i:s",$news["add_time"])); ?></span>
	</div>
	<div class="text" id="content">
	<?php echo ($news["info"]); ?>
	</div>
 <script>
function dourl(url){
location.href= url;
}
</script>

    <div id="news">
		<div class="list">
			<div id="olload">
			<span>往期内容</span>
			</div>
			<div id="oldlist">
				<ul>
					<?php if(is_array($newslist)): $i = 0; $__LIST__ = $newslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><li class="newsmore">
							<a href="<?php echo U('Storenew/views',array('token'=>$token,'id'=>$o['id'],'wecha_id'=>$wecha_id,'twid' => $twid,'cid'=>$cid));?>">
							<div class="olditem">
							<div class="title"><?php echo ($o["title"]); ?></div> 
							</div>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<a class="footer" href="#news" target="_self"><span class="top">返回顶部</span></a>

</div>
</div>
<footer style="width:100%;min-width:300px;margin-top:10px;margin-bottom:50px;padding:10px 0;color:#555;text-align:center;"><a style="color:#555;margin:0 3px;" href="">&copy; 优一果</a></footer>
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
<script type="text/javascript">
window.shareData = {  
				"moduleName":"Storenew",
				"moduleID": '<?php echo (intval($_GET["id"])); ?>',
				"imgUrl": "<?php echo ($news["share_pic"]); ?>", 
				"timeLineLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'cid'=>$_GET['cid'],'id'=>intval($_GET['id']),'twid'=>$_GET['twid']));?>",
				"sendFriendLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'cid'=>$_GET['cid'],'id'=>intval($_GET['id']),'twid'=>$_GET['twid']));?>",
				"weiboLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'cid'=>$_GET['cid'],'id'=>intval($_GET['id']),'twid'=>$_GET['twid']));?>",
				"tTitle": "<?php echo ($news["title"]); ?>",
				"tContent": "<?php echo (str_replace('"','',str_replace("\r\n",' ',mb_substr(trim(strip_tags(htmlspecialchars_decode($news["intro"]))),0,30,'utf-8')))); ?>"
			};
</script>
<?php echo ($shareScript); ?>
</html>