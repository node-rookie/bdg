<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title><?php echo ($info['title']); ?></title>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/public-framework/scripts/jquery.js"></script>
<link href="<?php echo ($staticPath); ?>/tpl/static/public-framework/styles/framework.css" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/public-framework/styles/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/public-framework/styles/owl.theme.css" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/public-framework/styles/swipebox.css"  rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/alert.js"></script>
<link href="<?php echo ($staticPath); ?>/tpl/static/helping/countdown/jquery.countdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/helping/countdown/jquery.countdown.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/helping/js/script.js"></script>

<link href="/tpl/static/helping/css/index2.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function swapStyleSheet(sheet){
	document.getElementById('pagestyle').setAttribute('href', sheet);
}
</script>

</head>
<body>
<?php if($memberNotice != ''): echo ($memberNotice); endif; ?>

<div id="preloader">
	<div id="status">
    	<p class="center-text">
            <em>Loading...</em>
        </p>
    </div>
</div>

<div class="all-elements">
    <div id="content" class="page-content">
    	<div class="content-controls solid-color fixed-header">
            <?php if($is_over == 1): ?><a class="button-big button-turqoise" href="javascript:void(0);" style="background:#5a5a5a;">活动还没开始</a>
            <?php elseif($is_over == 2): ?>    
                <a class="button-big button-turqoise" href="javascript:void(0);" style="background:#5a5a5a;">活动已经结束</a>
            <?php elseif($share_key != ''): ?>
                <a class="button-big button-turqoise" href="<?php echo U('Helping/index',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$info['id']));?>">进入我的分享页面</a>
			<?php else: ?>
                <?php if($memberNotice == ''): ?><a class="button-big button-turqoise" id="share" href="javascript:void(0);">找朋友助力</a>
                <?php else: ?>
                   <a class="button-big button-turqoise"  href="#memberNoticeBox" id="modaltrigger_notice">我要参加</a><?php endif; endif; ?>
        </div>    
        
		<!--gift start-->
		<div class="content">
            <div class="container">
                <div class="top_pic">
                    <img src="<?php echo ($info['reply_pic']); ?>" alt="<?php echo ($info['title']); ?>">
                </div>
				<!--gift start-->
				<div class="wechaimg"><img src="<?php echo ($user["portrait"]); ?>"></div>
				 <div class="topmain">
					<div class="wechaidinfo">
						<span class="name"><b><?php echo ($user["username"]); ?></b></span>
						<span class="allcounts">分享值</span>
						<span class="nums"><i class="red-b"><?php echo ($user["help_count"]); ?></i></span>
					</div>
					<div class="shares">
						<span class="shareinfo">分享次数<br><i class="red-b"><?php echo ($user["sharecount"]); ?></i></span>
						<span class="line"></span>
						<span class="countsinfo">当前排名<br>第<i class="red-b"><?php echo ($user["help_rank"]); ?></i>名</span>
					</div>
				 </div>
				 <!--gift end-->
                <div class="blank"></div>
                <div class="title">
                    <?php echo ($info['title']); ?>
                </div>
                <div class="blank"></div>
                <div class="times">
                    <span class="time-ico">
                        活动时间：<?php echo (date("m月d日",$info['start'])); ?> - <?php echo (date("m月d日 H时i分",$info['end'])); ?>
                    </span>
                </div>
                <div class="blank"></div>
                <?php if($is_over == 0): ?><div class="countdown" id="countdown" endtime="<?php echo ($info['end']); ?>"></div>
                    <div class="blank"></div><?php endif; ?>
				<!-- <div class="title">
                    你为 <i class="cl-red"><?php echo ($user["username"]); ?></i> 投得一票！<br />
				</div> -->
				<?php if($share_key != ''): ?><div class="title">
                    <i class="cl-red">↓↓参加请点击< 我的分享页面 >↓↓</a></i><br />
				</div><?php endif; ?>
            </div> 
        </div> 
		<!--gift end-->
		<div class="blank"></div>
		<!--sharelist start-->
		<?php if($info['frist'] != ''): ?><div class="content">
            <div class="rank_title">
                <div class="top">奖品信息</div>
                <!--<div class="cot">
                    参与活动人数: 
                    <i class="cl-green"><?php echo ($count); ?></i>
                </div>-->
            </div>
        </div>
		 <div class="content half-bottom">
            <div class="container no-bottom">
			
            	<div class="column-responsive half-bottom">
            		<img src="<?php echo ($info['fristpic']); ?>">
                    <div class="info">
                    	<b> <?php echo ($info['frist']); ?></b>
                    	<div class="con">
	                    	<i class="diagram-list"></i>
	                    	<span class="num">数量：<?php echo ($info['fristnums']); ?></span>
	                    	<span class="time"><?php echo ($info['fristdoc']); ?></span>
	                    </div>
	                    <i class="ic_rank1">一等奖奖品</i>
                	</div>
            	</div> 
				<?php if($info['second'] != ''): ?><div class="jiang-bottom"></div>
				<div class="column-responsive half-bottom">
            		<img src="<?php echo ($info['secondpic']); ?>">
                    <div class="info">
                    	<b> <?php echo ($info['second']); ?></b>
                    	<div class="con">
	                    	<i class="diagram-list"></i>
	                    	<span class="num">数量：<?php echo ($info['secondnums']); ?></span>
	                    	<span class="time"><?php echo ($info['seconddoc']); ?></span>
	                    </div>
	                    <i class="ic_rank1">二等奖奖品</i>
                	</div>
            	</div><?php endif; ?>
				<?php if($info['third'] != ''): ?><div class="jiang-bottom"></div>
				<div class="column-responsive half-bottom">
            		<img src="<?php echo ($info['thirdpic']); ?>">
                    <div class="info">
                    	<b> <?php echo ($info['third']); ?></b>
                    	<div class="con">
	                    	<i class="diagram-list"></i>
	                    	<span class="num">数量：<?php echo ($info['thirdnums']); ?></span>
	                    	<span class="time"><?php echo ($info['thirddoc']); ?></span>
	                    </div>
	                    <i class="ic_rank1">三等奖奖品</i>
                	</div>
            	</div><?php endif; ?>
				<?php if($info['four'] != ''): ?><div class="jiang-bottom"></div>
				<div class="column-responsive half-bottom">
            		<img src="<?php echo ($info['fourpic']); ?>">
                    <div class="info">
                    	<b> <?php echo ($info['four']); ?></b>
                    	<div class="con">
	                    	<i class="diagram-list"></i>
	                    	<span class="num">数量：<?php echo ($info['fournums']); ?></span>
	                    	<span class="time"><?php echo ($info['fourdoc']); ?></span>
	                    </div>
	                    <i class="ic_rank1">四等奖奖品</i>
                	</div>
            	</div><?php endif; ?>
				<?php if($info['five'] != ''): ?><div class="jiang-bottom"></div>
				<div class="column-responsive half-bottom">
            		<img src="<?php echo ($info['fivepic']); ?>">
                    <div class="info">
                    	<b> <?php echo ($info['five']); ?></b>
                    	<div class="con">
	                    	<i class="diagram-list"></i>
	                    	<span class="num">数量：<?php echo ($info['fivenums']); ?></span>
	                    	<span class="time"><?php echo ($info['fivedoc']); ?></span>
	                    </div>
	                    <i class="ic_rank1">五等奖奖品</i>
                	</div>
            	</div><?php endif; ?>
                <div class="clear"></div>
            </div>
        </div><?php endif; ?>
		<!--sharelist end-->
		<div class="blank"></div>
		<!--sharelist start-->
		 <div class="content">
            <div class="rank_title">
                <div class="top">TOP20</div>
                <div class="cot">
                    参与活动人数: 
                    <i class="cl-green"><?php echo ($count); ?></i>
                </div>
            </div>
        </div>
		<!--sharelist end-->
        <div class="content">
            <div class="container">
            	<table class="table" border="0" width="100%">
                    <tr>
                        <th>排名</th>
                        <th>姓名</th>
                        <th>分享值</th>
						<?php if($info["is_score"] == '1'): ?><th>获得积分</th><?php endif; ?>
                        <th>助力指数</th>
                    </tr>
                    <?php if(is_array($rank)): $key = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rank): $mod = ($key % 2 );++$key;?><tr>
                        <td><?php echo ($key); ?></td>
                        <td><?php echo ($rank["username"]); ?></td>
						<td><?php echo ($rank["help_count"]); ?></td>
                        <?php if($info["is_score"] == '1'): ?><td><?php echo ($rank["help_score"]); ?></td><?php endif; ?>
                        <td><?php echo ($rank["nums"]); ?>%</td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
        </div>
		<!-- 规则开始 -->
		<div class="blank"></div>
		<!--sharelist start-->
		 <div class="content">
            <div class="rank_title">
                <div class="top">活动规则</div>
            </div>
        </div>
		<!--sharelist end-->
		<div class="content">
            <div class="container con-last">
				<div class="rule">
					<?php echo (htmlspecialchars_decode($info['info'])); ?>
                </div>
			</div>  
		</div>
		<!-- 规则 END -->
    </div>  
</div>
<div class="share_bg">
    <img src="/tpl/static/live/default/share-guide.png">
</div>
<script type="text/javascript">
/*<?php if($is_over > 0): ?>document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() { 
	WeixinJSBridge.call('hideOptionMenu');
});
<?php else: ?>
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {   
	WeixinJSBridge.call('showOptionMenu');
});<?php endif; ?>*/
</script>

<script type="text/javascript">
$(function(){
	$('#share').click(function(){
		$('.share_bg').css('display','block');
	});
	
	$('.share_bg').click(function(){
		if($(this).css('display') == 'block'){
			$(this).css('display','none');
		}
	});

    <?php if($share_key != '' and $is_over == 0): ?>$.getJSON("<?php echo U('Helping/add_share',array('token'=>$token,'id'=>$info['id']));?>",{share_key:'<?php echo ($share_key); ?>',wecha_id:'<?php echo ($wecha_id); ?>'},function(res){
    		alert(res.info);
    	});<?php endif; ?>

});

</script>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Helping",
            "moduleID":"<?php echo ($info["id"]); ?>",
			"pid": "<?php echo ($info["id"]); ?>", 
            "imgUrl": "<?php echo ($info["top_pic"]); ?>", 
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Helping/index',array('token'=>$token,'id'=>$info['id'],'share_key'=>$user['share_key']));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Helping/index',array('token'=>$token,'id'=>$info['id'],'share_key'=>$user['share_key']));?>",
			"sendQQLink": "<?php echo ($f_siteUrl); echo U('Helping/index',array('token'=>$token,'id'=>$info['id'],'share_key'=>$user['share_key']));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Helping/index',array('token'=>$token,'id'=>$info['id'],'share_key'=>$user['share_key']));?>",
            "tTitle": "<?php echo ($info["title"]); ?>",
            "tContent": "<?php echo ($user["username"]); ?>当前分享值:<?php echo ($user["help_count"]); ?> ，排名: 第<?php echo ($user["help_rank"]); ?>名，请求你祝TA一臂之力赢取一等奖：<?php echo ($info['frist']); ?>！<?php echo ($info['title']); ?>"
};
</script>
<?php echo ($shareScript); ?>

<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/public-framework/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/public-framework/scripts/jquery.swipebox.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/public-framework/scripts/framework.launcher.js"></script>

</body>
</html>