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

<link rel="stylesheet" href="./tpl/static/storenew/css/renk.css">
<style>
content{display:none;width:100%;overflow:hidden;position:absolute;top:0}#imgs{-webkit-transition-property:-webkit-transform;-webkit-transition-duration:0.5s;-webkit-transition-timing-function:ease-out;-webkit-transform:translate3d(0px,0px,0px);height:100%}#imgs li{float:left;text-align:center;height:100%;padding-top:65px}#imgs img{width:94%;-webkit-transform:translate3d(0px,0px,0px)}.bg{width:100%;top:0;left:0;background:#000;opacity:0.8;position:absolute;display:none}.close{display:none;position:absolute;z-index:10;right:3%;top:20px;color:#fff;cursor:pointer;background:#999;border-radius:3px;padding:5px 8px}.s_count{display:none;position:absolute;z-index:10;right:3%;top:25px;color:#fff;margin-right:60px}
.infodetail img{
    max-width: 100%;
}
.chujiakuang input{
  border: .1rem solid #cfcfcf;
  margin: 5px 5px;
  font-size: 14px;
  display: inline-block;
  text-align: center;
  height: 30px;
  width: 120px;
  border-radius: 0;
  background: -webkit-gradient(linear, 0 0, 0 100%, from(#e5e5e5),color-stop(0.3, #fff),to(#fff));
  -webkit-appearance: none;
  color: #999;}
.pinglun input{
  border: .1rem solid #cfcfcf;
  margin: 1px 1px;
  font-size: 14px;
  display: inline-block;
  text-align: center;
  height: 30px;
  width: 200px;
  border-radius: 0;
  background: -webkit-gradient(linear, 0 0, 0 100%, from(#e5e5e5),color-stop(0.2, #fff),to(#fff));
  -webkit-appearance: none;
  color: #999;}
.chujiak{padding: .5rem .2rem;}
.disorder-none .icon-none{display:block;width:90px;height:120px;margin:80px auto 0 auto;background:url("<?php echo ($staticPath); ?>/tpl/static/storenew/css/distribution2.png") no-repeat -219px -160px;background-size:300px 1000px;}
.disorder-none .nonetext{display:block;text-align:center;font-size:14px;color:#999;}
</style>
<!--轮播--->
<div class="focusPic">
    <div class="views">
        <?php if(empty($imageList) != true): ?><ul class="warp" id="fd">
                <?php if(is_array($imageList)): $i = 0; $__LIST__ = $imageList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><li class="li"><img src="<?php echo ($img["image"]); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php else: ?>
            <ul class="warp" id="fd">
                <li class="li"><img src="<?php echo ($product["logourl"]); ?>"></li>
            </ul><?php endif; ?>
    </div>
    <?php if(empty($imageList) != true): ?><ul class="tabs">
            <?php if(is_array($imageList)): $i = 0; $__LIST__ = $imageList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><li class="li"><?php echo ($i); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php else: ?>
        <ul class="tabs">
            <li>0</li>
        </ul><?php endif; ?>
</div>
<script>
    var focusPic = new Swiper('.focusPic .views', {pagination: '.focusPic .tabs', autoplay: 3000})
</script>
<!--轮播结束--->
<div class="d-info">
	<div class="tm">
		<div class="td2">
			<div class="td2_name"><?php echo ($product["name"]); ?></div>
			<div class="td2_cx">争抢<?php echo ($product["name"]); ?>的时刻到了，开团抢购中！</div>
			<div class="td2_info">
				<div class="td2_price">市场价：<b id="market_price"><?php echo ($product["price"]); ?></b> </div>
				<div class="td2_num">支付开团并邀请<span id="tuan_more_need_number"><?php echo ($product['tgnum']-1); ?></span>人参团，人数不足自动退款，详见下方拼团玩法</div>
			</div>
		</div>
		<div class="kt">
			<a id="tuan_more_btn" class="kt_item" href="<?php echo U('Storenew/addgrouponorder',array('token'=>$token,'id'=>$product['id'],'wecha_id'=>$_GET['wecha_id'], 'codeid'=>$codeid, 'twid' => $twid,'cid' => $cid));?>">
				<div class="kt_price"><b id="tuan_more_price"><?php echo ($product["tgprice"]); ?></b><i> / </i>件</div>
				<div class="kt_btn"><b id="tuan_more_number"><?php echo ($product["tgnum"]); ?>人团</b></div>
			</a>
			<a id="tuan_one_btn" class="kt_item kt_item_buy" href="<?php echo U('Storenew/product',array('token'=>$token,'id'=>$product['id'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid,'cid' => $cid));?>">
				<div class="kt_price"><b id="tuan_one_price"><?php echo ($product["price"]); ?></b><i> / </i>件</div>
				<div class="kt_btn" id="tuan_one_number">单独购买</div>
			</a>
		</div>
	</div>
	<div class="step">
		<div class="step_hd">
			拼团玩法<a class="step_more" href="tuan_rule.html">查看详情</a>
		</div>
		<div id="footItem" class="step_list">
			<div class="step_item step_item_on">
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
			<div class="step_item ">
				<div class="step_num">3</div>
				<div class="step_detail">
					<p class="step_tit">邀请好友
						<br>参团支付</p>
				</div>
			</div>
			<div class="step_item">
				<div class="step_num">4</div>
				<div class="step_detail">
					<p class="step_tit">达到人数
						<br>团购成功</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="go-shop-info">
	<div class="btn-box clearfix"> 
		<div class="btn-2-1">
		<a href="<?php echo U('Storenew/index',array('token' => $_GET['token'], 'twid' => $twid, 'cid' => $cid));?>"><span class="iconfont icon-fenlei"></span>所有商品</a>
		</div>
		<div class="btn-2-1">
		<a href="<?php echo U('Storenew/groupon',array('token' => $_GET['token'],'twid' => $twid, 'cid' => $cid));?>"><span class="iconfont icon-store"></span>更多团购</a>
		</div> 
	</div>
</div>

<div class="d-info">
    <div class="detailinfo">
        <ul class="tabs"><li>团购记录<i>(<?php echo ($allcount); ?>)</i></li><li>商品详情</li></ul>
        <div class="views">
            <div class="warp">
			    <div class="li">
                    <div class="com-dec">共<b><?php echo ($allcount); ?></b>位参与团购  -->滑动切换
                    </div>
					<div class="getList">
						<div class="luckguys swiper-slid swiper-slide-visible swiper-slide-active" style="width: auto;min-width:330px; height: auto;min-height:350px;">
									<div class="luck_con swipe_con">
									<?php if($log != ''): if(is_array($log)): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?><div class="luck-manito"><ul><li><img src="<?php echo ($log["portrait"]); ?>" class="headers"></li><li><div><span class="nickname"><?php echo ($log["truename"]); ?></span><br/><span class="date"><?php echo (date("Y-m-d H:i",$log["dateline"])); ?></span></div><!--div><p><?php echo ($vo["share_content"]); ?></p></div--></li><li><span class="tel"><?php echo ($log["price"]); ?> 元</span></li></ul></div><?php endforeach; endif; else: echo "" ;endif; ?>	
										<?php else: ?>
										<div class="fit-plan_end">
										<div class="disorder-none"><i class="icon-none"></i><span class="nonetext">还没有人开团，赶紧邀请小伙伴一起开团吧！</span></div>
										</div><?php endif; ?>
									</div>
						</div>
					</div>
                </div>
				
                <div class="li">
                    <ul class="detail-list">
                        <div class="infodetail"><?php echo ($product["intro"]); ?></div>
                    </ul>
                    <div class="goods_intro"></div>
                </div>

            </div>
        </div>
    </div>
	<div style="height:30px"></div>
</div>
<script type="text/javascript">
var detailinfo = new Swiper('.detailinfo .views',{pagination: '.detailinfo .tabs',autoplay:false});
</script>
<script type="text/javascript">
    var SysSecond;
    var InterValObj;
    $(document).ready(function () {
    SysSecond = parseInt($("#remainSeconds").html()); //这里获取倒计时的起始时间 
	InterValObj = window.setInterval(SetRemainTime, 1000); //间隔函数，1秒执行 

    });
	//将时间减去1秒，计算天、时、分、秒 
function SetRemainTime() {
	if (SysSecond > 0) { 
		SysSecond = SysSecond - 1; 
		var second = Math.floor(SysSecond % 60);             // 计算秒     
		var minite = Math.floor((SysSecond / 60) % 60);      //计算分 
		var hour = Math.floor((SysSecond / 3600) % 24);      //计算小时 
		var day = Math.floor((SysSecond / 3600) / 24);        //计算天 
		$("#remainTime").html('&nbsp;&nbsp;倒计时:'+day + "天&nbsp;" + hour + ":" + minite + ":" + second + ""); 
	} else {//剩余时间小于或等于0的时候，就停止间隔函数 
		window.clearInterval(InterValObj); 
		//这里可以添加倒计时时间为0后需要执行的事件 
	} 
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
        "moduleName": "Store",
        "moduleID": "<?php echo ($product['id']); ?>",
        "imgUrl": "<?php echo ($product['logourl']); ?>",
        "timeLineLink": "<?php echo ($f_siteUrl); echo U('Storenew/biddingproduct',array('token' => $_GET['token'],'id'=>$product['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
        "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Storenew/biddingproduct',array('token' => $_GET['token'],'id'=>$product['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
        "weiboLink": "<?php echo ($f_siteUrl); echo U('Storenew/biddingproduct',array('token' => $_GET['token'],'id'=>$product['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
        "tTitle": "<?php echo ($metaTitle); ?>",
        "tContent": "快邀请你的<?php echo ($product["tgnum"]); ?>位小伙伴一起来团购<?php echo ($product["name"]); ?>吧，"
    };
</script>
<?php echo ($shareScript); ?>
</html>