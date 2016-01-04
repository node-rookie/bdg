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

<div style="display: block;">
        <div class="H5_con" id="group_title">
			<?php if($shengyu != '0'): ?><div class="tips topStateWrap tips_succ tips_succ2">
				<div class="tips_ico"></div>
				<div class="tips_tit">快来入团吧</div>
				<div class="tips_txt">你的朋友邀请你一起来团购了，赶快购买吧</div>
			</div>
			<?php else: ?>
			<div class="cardtips"><p class="cardtips_txt">来晚了一步！该团已被挤爆<br>求人不如求自己，自己当团长吧！</p></div><?php endif; ?>
			
		</div>
        <div class="H5_con">
            <div id="group_detail" class="tm <?php if($paidcount == $p['tgnum']): ?>tm_succ<?php endif; if($grouponinfo['status'] == 2): ?>tm_err<?php endif; ?>">
			<!--div id="group_detail" class="tm tm_succ"-->
				<a class="goItemPage" href="<?php echo U('Storenew/grouponview',array('token' => $_GET['token'], 'id' => $p['id'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $twid));?>">
					<div class="td tuanDetailWrap">
						<div class="td_img">
							<img alt="<?php echo ($p["name"]); ?>" src="<?php echo ($p["logourl"]); ?>">
						</div>
						<div class="td_info">
							<p class="td_name"><?php echo ($p["name"]); ?></p>
							<p class="td_mprice"><span class="tuanTotal"><?php echo ($p["tgnum"]); ?></span>人团：<i>¥</i><b><?php echo ($p["tgprice"]); ?></b><i> /件</i></p>
							<p>查看详情</p>
							<p class="td_num"></p>
						</div>
					</div>
				</a>
			</div>
            <div class="pp">
                <div class="pp_users" id="pp_users">
				<?php if(is_array($g)): $i = 0; $__LIST__ = $g;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><a class="pp_users_item pp_users_normal" href="#">
					<img alt="" src="<?php echo ($g["portrait"]); ?>">
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
             <?php if($grouponinfo['status'] != 2): if($paidcount != $p['tgnum']): ?><div class="pp_tips" id="flag_0_a" style="display: block;">还差<b><?php echo ($shengyu); ?></b>人，盼你如南方人盼暖气~</div>
                <div class="pp_state" id="flag_0_b" style="display: block;">
                    <div class="pp_time">
                        剩余<span id="ti_time_hour">23</span>:<span id="ti_time_min">56</span>:<span id="ti_time_sec">29</span>结束
                    </div>
                </div>
				<?php else: ?>
				<div class="pp_tips" id="flag_1_a">对于诸位大侠的相助，团长感激涕零</div>
				<div class="pp_state" id="flag_0_b" style="display: block;">
					<div class="pp_state_txt" id="flag_1_b">团购成功，卖家将尽快发货</div>
				</div><?php endif; ?>
			<?php else: ?>
				<div class="pp_tips" id="flag_1_a">哎呀，不给力哦！没有达到团购要求</div>
				<div class="pp_state" id="flag_0_b" style="display: block;">
					<div class="pp_state_txt" id="flag_1_b">团购失败，再次开团吧！</div>
				</div><?php endif; ?>
            </div>
            <div class="pp_list">
                <div id="showYaoheList">
				<?php if(is_array($glist)): $i = 0; $__LIST__ = $glist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><div class="pp_list_item">
						<img class="pp_list_avatar" alt="" src="<?php echo ($g["portrait"]); ?>">
						<div class="pp_list_info" id="pp_list_info">
							<span class="pp_list_name"><?php if($g['openid'] == $g['wecha_id']): ?>团长<?php else: endif; ?><b><?php echo ($g["truename"]); ?></b><?php if($g['paid'] != 1): ?>(未付款)<?php endif; ?></span>
							<span class="pp_list_time"><?php echo (date('Y-m-d H:i:s',$g["addtime"])); if($g['openid'] == $g['wecha_id']): ?>开团<?php else: ?>加入<?php endif; ?></span>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<?php if($paidcount != $p['tgnum']): ?><div id="chamemeber" class="pp_list_blank" style="display: block;">
                    还差
                    <span><?php echo ($shengyu); ?></span> 人，让小伙伴们都来组团吧！
                </div><?php endif; ?>
            </div>
        </div>

        <div class="step">
            <div class="step_hd">
                拼团玩法<a class="step_more" href="<?php echo U('Storenew/grouponrule',array('token' => $_GET['token'],'twid' => $twid, 'cid' => $cid));?>">查看详情</a>
            </div>
            <div id="footItem" class="step_list">
                <div class="step_item ">
                    <div class="step_num">1</div>
                    <div class="step_detail">
                        <p class="step_tit">选择
                            <br>心仪商品</p>
                    </div>
                </div>
                <div class="step_item ">
                    <div class="step_num">2</div>
                    <div class="step_detail">
                        <p class="step_tit">支付开团
                            <br>或参团</p>
                    </div>
                </div>
                <div class="step_item <?php if($paidcount != $p['tgnum']): ?>step_item_on<?php endif; ?>" id="step_3">
                    <div class="step_num">3</div>
                    <div class="step_detail">
                        <p class="step_tit">邀请好友
                            <br>参团支付</p>
                    </div>
                </div>
                <div class="step_item <?php if($paidcount == $p['tgnum']): ?>step_item_on<?php endif; ?>" id="step_4">
                    <div class="step_num">4</div>
                    <div class="step_detail">
                        <p class="step_tit">达到人数
                            <br>团购成功</p>
                    </div>
                </div>
            </div>
        </div>

</div>
<div class="H5_con fixopt" id="fixopt" style="display: block;">
	<div class="fixopt_item">
		<?php if($shengyu > 0): ?><a class="fixopt_btn bottomBtn" href="<?php echo U('Storenew/addgrouponorder',array('token'=>$token,'id'=>$p['id'],'wecha_id'=>$_GET['wecha_id'], 'codeid'=>$codeid, 'twid' => $twid,'cid' => $cid));?>">我也要参与抢购</a>
		<?php else: ?>
		<a class="fixopt_btn bottomBtn" href="<?php echo U('Storenew/groupon',array('token'=>$token,'id'=>$p['id'],'wecha_id'=>$_GET['wecha_id'], 'codeid'=>$codeid, 'twid' => $twid,'cid' => $cid));?>">此团位置已满，去看看其他团购</a><?php endif; ?>
		</div>
</div>
<div style="height:80px;visibility:hidden "></div>
</body>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Store",
            "moduleID":"<?php echo ($p['id']); ?>",
            "imgUrl": "<?php echo ($p['logourl']); ?>", 
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Storenew/grouponshare',array('token' => $_GET['token'], 'codeid' => $_GET['codeid'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Storenew/grouponshare',array('token' => $_GET['token'], 'codeid' => $_GET['codeid'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Storenew/grouponshare',array('token' => $_GET['token'], 'codeid' => $_GET['codeid'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "tTitle": "<?php echo ($p["name"]); ?>开团啦，只要<?php echo ($p["tgprice"]); ?>元",
            "tContent": "<?php echo ($p["name"]); ?>开卖<?php echo ($p["tgnum"]); ?>人团抢购中，仅剩<?php echo ($shengyu); ?>个空位，人满为患哦！"
        };
</script>
<?php echo ($shareScript); ?>
</html>