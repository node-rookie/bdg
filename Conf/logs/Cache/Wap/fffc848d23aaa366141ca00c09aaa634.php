<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<title>新闻资讯</title>
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
<body  class="body-gray my-memvers">
<div id="news">
	<div class="list">
		<div id="olload">
		<span>文章资讯</span>
		</div>
		<div id="oldlist">
			<ul>
				<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><li class="newsmore">
						<a href="<?php echo U('Storenew/views',array('token'=>$token,'id'=>$o['id'],'wecha_id'=>$wecha_id,'twid' => $twid,'cid'=>$cid));?>">
						<div class="olditem">
						<div class="title"><?php echo ($o["title"]); ?></div> 
						</div>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<?php if($totalpage > 1) { ?>
						<div class="m-page uc-orderlist">
							<?php if($page == 1): ?><div class="pg-pre pg-grey"><a href="javascript:void(0);">上一页<i><em></em></i></a></div>
							<?php else: ?>
								<div class="pg-pre"><a href="<?php echo U('Storenew/myfansDetail',array('token'=>$token,'page'=>intval($page - 1),'wecha_id'=>$wecha_id,'cid' => $cid, 'twid' => $twid, 'level'=>$level));?>">上一页<i><em></em></i></a></div><?php endif; ?>
							<div class="pg-num"><?php echo ($page); ?>/<?php echo ($totalpage); ?></div>
							<?php if($page == $totalpage): ?><div class="pg-next pg-grey"><a href="javascript:void(0);">下一页<i><em></em></i></a></div>
							<?php else: ?>
								<div class="pg-next"><a href="<?php echo U('Storenew/myfansDetail',array('token' => $token,'page'=>intval($page + 1),'wecha_id'=>$wecha_id,'cid' => $cid, 'twid' => $twid, 'level'=>$level));?>">下一页<i><em></em></i></a></div><?php endif; ?>
						</div>
		<?php } ?>
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
				"tTitle": "文章资讯",
				"tContent": "文章资讯"
			};
</script>
<?php echo ($shareScript); ?>
</html>