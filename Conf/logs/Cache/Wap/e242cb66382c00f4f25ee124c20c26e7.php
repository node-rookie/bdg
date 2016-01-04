<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<title>我推荐的订单</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/tpl/static/storenew/css/oder.css?r=1430970616"/>
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

.pagination li{
	margin-left:12px;
	background-color: #fa614b;
	display: inline-block;
	padding: 0 4%;
	border-radius: 5px;
}
.ranking-list .td.r{ filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.2) none repeat scroll 0 0 !important; background-size:contain; max-width:170px; color:#666; font-size:14px;text-align:center;}
.ranking-list .td.td3{width:20%; filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.2) none repeat scroll 0 0 !important;background-size:contain; max-width:170px; color:#666; font-size:14px;text-align:center;}
.ranking-list .td.td4{width:20%; filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.2) none repeat scroll 0 0 !important; background-size:contain; max-width:170px; color:#666; font-size:14px;text-align:center;}
.ranking-list .td.td2{ width:40%;filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.2) none repeat scroll 0 0 !important;color:#666; font-size:14px;text-align:center;}
.ranking-list .th.th1{ width:20%; min-width:90px; max-width:90px; color:#333; filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.4) none repeat scroll 0 0 !important;font-size:14px; text-align:center;}
.ranking-list .th.th2{ width:40%; color:#333; filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.4) none repeat scroll 0 0 !important;font-size:14px; text-align:center;}
.ranking-list .th.th3{ width:20%; color:#333; filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.4) none repeat scroll 0 0 !important; font-size:14px; text-align:center;}
.ranking-list .th.th4{ width:20%; color:#333; filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.4) none repeat scroll 0 0 !important; font-size:14px; text-align:center;}
.to-index-button{width:50px; height:45px; padding-top:4px; text-align:center; position:absolute; right:0px; top:0px; background-color:#7C0C0C; color:#333; text-decoration:none; font-size:0.9em; line-height:1.2em;}
.ranking-list .th{ display:table-cell; line-height:40px; position:relative;}
.ranking-list .td{ display:table-cell; line-height:60px; height:1px; filter:alpha(opacity=50); background:rgba(255, 255, 255, 0.4) none repeat scroll 0 0 !important;}
.ranking-list .td .user-head{ max-width:170px; color:#333; font-size:1.6em;}
.ranking-list .th .arrow{ position:absolute; left:45%; bottom:-12px; border-top-color:#FF1313;}
.ranking-list .th.th2 .arrow{border-top-color:#FF1313;}
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
</div>
<!--head end-->
<!--count begin-->
<div class="row count">
    <div class="small-4 large-3 columns mid">

        <a href="#" class="count-a">
            <p class="count-dis-mony"><?php echo ($fans["total_score"]); ?></p>
            <span class="count-title">总积分</span></a>

    </div>
    <div class="small-4 large-3 columns mid">

        <a href="#" class="count-a">
            <p class="count-dis-mony"><?php echo ($fans["balance"]); ?></p>
            <span class="count-title">账户余额</span></a>

        <!-- -->
    </div>

    <div class="small-4 large-3 columns last">
        <a href="#" class="count-a">
            <p class="count-dis-mony"><?php echo (($count['total'])?($count['total']):0); ?>元</p>
            <span class="count-title">累计佣金</span></a>
    </div>

</div>
<body  class="body-gray my-memvers">

    <!--count-->
    <section class="member-count">
        <h2 class="member-count-title"><i class="icon-chunk-gray"><i class="icon-chunk-blue"></i></i><span>推荐订单数据</span></h2>
        <div class="row member-count-row">
            <div class="small-4 columns member-count-column"><span class="member-count-label">今日新增</span><em class="member-count-number">0</em></div>
            <div class="small-4 columns member-count-column"><span class="member-count-label">昨日新增</span><em class="member-count-number">0</em></div>
            <div class="small-4 columns member-count-column"><span class="member-count-label">订单总数</span><em class="member-count-number"><?php echo ($ordersCount); ?></em></div>
        </div>
    </section>
    <!--count-->

	
	    <section class="member-browse">
        <h2 class="member-browse-title"><i class="icon-chunk-gray"><i class="icon-chunk-blue"></i></i><span>详细订单记录</span></h2>
        <ul class="member-browse-ul">
		<div class="page-load-container" style="min-height: 400px; opacity: 1;">
			<div class="page-load-page ranking-page"  style="min-height: 400px;">
				<div class="ranking-list" >
					<div class="tr">
						<div class="th th1">时间</div>
						<div class="th th2">购买人</div>
						<div class="th th3">佣金</div>
						<div class="th th4">状态</div>
					</div>
					<?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$orders): $mod = ($i % 2 );++$i;?><div class="tr">
							<div class="td r"><?php echo (date("Y-m-d",$orders['dateline'])); ?></div>
							<div class="td td2"><a style="color:#666" href="#"><?php echo ($orders["wechaname"]); ?></a></div>
							
							<div class="td td3"><?php echo ($orders["price"]); ?></div>
							
							<div class="td td4"><?php if($orders['type'] == 3): ?>一级订单<?php else: ?>二级订单<?php endif; ?></div>
						
						</div>
						<div class="tr">
							<div class="td"></div>
							<div class="td"></div>
							<div class="td"></div>
							<div class="td"></div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<?php if($totalpage > 1) { ?>
						<div class="m-page uc-orderlist">
							<?php if($page == 1): ?><div class="pg-pre pg-grey"><a href="javascript:void(0);">上一页<i><em></em></i></a></div>
							<?php else: ?>
								<div class="pg-pre"><a href="<?php echo U('Storenew/fansorder',array('token'=>$token,'page'=>intval($page - 1),'wecha_id'=>$wecha_id,'cid' => $cid, 'twid' => $twid));?>">上一页<i><em></em></i></a></div><?php endif; ?>
							<div class="pg-num"><?php echo ($page); ?>/<?php echo ($totalpage); ?></div>
							<?php if($page == $totalpage): ?><div class="pg-next pg-grey"><a href="javascript:void(0);">下一页<i><em></em></i></a></div>
							<?php else: ?>
								<div class="pg-next"><a href="<?php echo U('Storenew/fansorder',array('token' => $token,'page'=>intval($page + 1),'wecha_id'=>$wecha_id,'cid' => $cid, 'twid' => $twid));?>">下一页<i><em></em></i></a></div><?php endif; ?>
						</div>
				<?php } ?>
			</div>
		</div>
        </ul>
    </section>
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
</html>