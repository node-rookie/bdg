<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>个人中心</title>
    <link rel="stylesheet" type="text/css" href="/tpl/static/storenew/css/foundation.css?v=150317X2">
    <link href="/tpl/static/storenew/css/bottom.css?x=150317X2" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/tpl/static/storenew/css/common-v4.0.css?v=150317X2">
    <script src="/tpl/static/storenew/js/jquery.js?v=150317X2"></script>
    <script src="/tpl/static/storenew/js/func.js?v=150317X2"></script>
    <style>


        .foot {
            width: 100%;
            min-width: 300px;
            margin-top: 10px;
            margin-bottom: 30px;
            padding: 10px 0;
            color: #555;
            text-align: center;
        }

        .foot a {
            color: #555;
            margin: 0 3px;
        }

    </style>
    <style>
        .wx_loading {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: 90;
            background-color: rgba(0, 0, 0, 0);
            font-family: Helvetica, STHeiti STXihei, Microsoft JhengHei, Microsoft YaHei, Arial;
            line-height: 1.5
        }

        .wx_loading_inner {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            position: fixed;
            top: 50%;
            left: 50%;
            margin-left: -70px;
            margin-top: -48px;
            width: 140px;
            border-radius: 6px;
            font-size: 14px;
            padding: 58px 0 10px 0
        }

        .wx_loading_icon {
            position: absolute;
            top: 15px;
            left: 50%;
            margin-left: -16px;
            width: 24px;
            height: 24px;
            border: 2px solid #fff;
            border-radius: 24px;
            -webkit-animation: gif 1s infinite linear;
            animation: gif 1s infinite linear;
            clip: rect(0 auto 12px 0)
        }

        @keyframes gif {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @-webkit-keyframes gif {
            0% {
                -webkit-transform: rotate(0deg)
            }
            100% {
                -webkit-transform: rotate(360deg)
            }
        }
    </style>
</head>

<body class="body-gray">
<div class="wx_loading" id="wxloading">
    <div class="wx_loading_inner">
        <i class="wx_loading_icon"></i>
        请求加载中...
    </div>
</div>

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
<!--count end-->

<div class="text-center" style=" margin-top:5px;margin-bottom:5px; font-size:14px;">
    你是由【<?php echo ($tgusername); ?>】推荐
</div>

<div class="panel member-nav">
    <ul class="side-nav">
        <li><a href="<?php echo U('Storenew/myerweima',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>"><i class="icon-qrcode"></i><span class="text">我的二维码</span><i
                class="arrow"></i></a>
		</li>
		<?php if($productSet['dzd'] == 1): ?><li><a href="<?php echo U('Storenew/dzdset',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>"><i class="icon-account"></i><span class="text">我的小店</span><i
                class="arrow"></i></a>
		</li><?php endif; ?>
        <li>
            <a id="disstroe" href="javascript:void(0)">
			<i class="icon-lowLevel"></i><span class="text">我的会员</span>
			<i class="arrow"></i> <span class="tip-number"><?php echo ($twidcount); ?></span>
            </a>

            <div id="disstroe-sub" class="member-nav-sub" style="display: none;">
                <ul class="member-nav-sub-ul">
                    <li class="member-nav-sub-li" id="shop"><a href="<?php echo U('Storenew/myfansDetail',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>"><span class="text">一级普通会员</span><i
                            class="arrow"></i>
                        <span class="tip-number"><?php echo ($fromtwidcount); ?></span> </a></li>
                    <li class="member-nav-sub-li" id="subShop"><a href="<?php echo U('Storenew/myfansDetail',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'level' => '2', 'twid' => $twid));?>"><span class="text">二级普通会员</span><i
                            class="arrow"></i>
                        <span class="tip-number"><?php echo ($addtwidcount); ?></span> </a></li>
                    <!--li class="member-nav-sub-li" id="subShop1"><a
                            href="mobile.php?act=module&level=3&name=bj_qmxk&do=myfansDetail&weid=1"><span class="text">三级普通会员</span><i
                            class="arrow"></i>
                        <span class="tip-number">0</span> </a></li-->
                </ul>
            </div>
        </li>
		
		<!-- <li>
			<a href="<?php echo U('Storenew/my',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>">
				<i class="icon-card"></i><span class="text">我的订单</span><i class="arrow"></i>
			</a>
		</li>
		
		<li>
			<a href="<?php echo U('Storenew/myjingpai',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>">
				<i class="icon-card"></i><span class="text">我的竞拍订单</span><i class="arrow"></i>
			</a>
		</li> -->
		
		<li>
            <a id="disstroe1" href="javascript:void(0)"><i class="icon-set"></i><span class="text">我的订单</span><i class="arrow"></i> <span class="tip-number"><?php echo ($ocount); ?></span></a>
			<!--<a href="<?php echo U('Storenew/fansorder',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>"><i class="icon-set"></i><span class="text">我的推广</span><i
                    class="arrow"></i> <span class="tip-number"><?php echo ($ordersCount); ?></span>
            </a>-->
            <div id="disstroe-sub1" class="member-nav-sub" style="display: none;">
                <ul class="member-nav-sub-ul">
                    <li class="member-nav-sub-li" id="shop2">
					<a href="<?php echo U('Storenew/my',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>"><span class="text">我购买的商品订单</span><i class="arrow"></i> <span class="tip-number"><?php echo ($dingdancount); ?></span>
					</a>
					</li>
                    <li class="member-nav-sub-li" id="subShop2"><a
                            href="<?php echo U('Storenew/myjingpai',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>"><span class="text">成功拍到的竞拍订单</span><i
                            class="arrow"></i> <span class="tip-number"><?php echo ($jingpaicount); ?></span></a></li>
                </ul>
            </div>
        </li>

		
		<li>
			<a href="<?php echo U('Storenew/grouponmy',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>"><i class="icon-card"></i><span class="text">我的团购</span><i
                    class="arrow"></i> <span class="tip-number"><?php echo ($allcount); ?></span>
            </a>
        </li>

        <li>
			<a href="<?php echo U('Storenew/fansorder',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>"><i class="icon-set"></i><span class="text">我的推广</span><i
                    class="arrow"></i> <span class="tip-number"><?php echo ($ordersCount); ?></span>
            </a>
        </li>
		
		<li class="last">
			<a href="<?php echo U('Storenew/setre',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>">
			<i class="icon-commission"></i><span class="text">提现记录</span><i class="arrow"></i>
			</a>
		</li>

    </ul>
</div>


<div class="panel member-nav">
    <ul class="side-nav">
        <li id="brokerage">
			<a href="<?php echo U('Storenew/setuserinfo',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>">
				<i class="icon-account"></i><span class="text">资料修改</span><i class="arrow"></i>
			</a>
		</li>	
        <li id="brokerage">
			<a href="<?php echo U('Card/index',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>">
				<i class="icon-personal"></i><span class="text">积分兑换</span><i class="arrow"></i>
			</a>
		</li>
        <!--li>
			<a href="<?php echo U('Storenew/rink',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>">
				<i class="icon-card"></i><span class="text">销售排行榜</span><i class="arrow"></i>
			</a>
		</li-->

        <li>
			<a href="<?php echo U('Storenew/help',array('token'=>$token,'wecha_id'=>$wecha_id, 'cid' => $cid, 'twid' => $twid));?>">
				<i class="icon-client"></i><span class="text">帮助说明</span><i class="arrow"></i>
			</a>
		</li>
    </ul>
</div>


<!--side nav end-->


<!--bottom begin
   <div class="h50"></div>-->
<footer style="width:100%;min-width:300px;margin-top:10px;margin-bottom:50px;padding:10px 0;color:#555;text-align:center;">
    <a style="color:#555;margin:0 3px;" href="">&copy; <?php echo ($com['name']); ?></a></footer>
<!--bottom end-->
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
<script src="/tpl/static/storenew/js/zepto.min.js"></script>
<script>
    document.getElementById('wxloading').style.display = 'none';
</script>
</html>