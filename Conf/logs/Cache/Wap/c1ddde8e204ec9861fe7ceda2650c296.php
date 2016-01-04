<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($thisCard["cardname"]); ?>积分抽奖</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo RES;?>/card/style/style.css" rel="stylesheet" type="text/css">
<script src="/tpl/static/jquery.min.js" type="text/javascript"></script>
<link href="<?php echo RES;?>/card/style/score.css" rel="stylesheet" type="text/css">
</head>
<body class="mode_webapp">
<div class="qiandaobanner"><a href="javascript:history.go(-1);"><img src="<?php echo ($thisCard["vip"]); ?>" ></a> </div>
<style>
header {
    margin: 0 10px;
    position: relative;
    z-index: 4;
}
header ul {
	margin:0 -1px;
	border: 1px solid #179f00;
	border-radius: 3px;
	width: 100%;
	overflow: hidden;
}
header ul li a.bl {
    border-left: 1px solid #0b8e00;
}
header ul li a.on {
    background-color:#179f00;
    color: #ffffff;
    background-image: -moz-linear-gradient(center bottom , #179f00 0%, #5dd300 100%);
}
header ul li a {
    color: #0b8e00;
    display: block;
    font-size: 15px;
    height: 28px;
    line-height: 28px;
    text-align: center;
    width:33%;
    float:left;
}
.pic{width:100%;margin-bottom:10px;}
.over{background:#aaa;border:1px solid #aaa;box-shadow: 0 1px 0 #cccccc inset, 0 1px 2px rgba(0, 0, 0, 0.5);}
.window .title{background-image: linear-gradient(#179f00, #179f00);}

.ui-widget-content{
	border-color:#e9e9e9;
}
.ui-dialog{
	padding:0;
}
.ui-widget-header{
	border:0;
	background: #179F00;
}
.ui-widget-header{
	color:#fff;
}
.infos{
	word-break:break-all; 
	overflow:auto;
}
</style>

<div class="jifen-box">
<ul class="zongjifen">
<li>
<div class="fengexian">
<p>会员</p>
<span><?php echo ($userInfo['truename']); ?></span></div>
</li>
<li><a href="/index.php?g=Wap&m=Card&a=signscore&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($card["id"]); ?>">
<div class="fengexian">
<p>目前积分</p>
<span><?php echo ($userScore); ?>分</span></div>
</a></li>
<li><a href="/index.php?g=Wap&m=Card&a=payRecord&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($card["id"]); ?>&month=<?php echo date('n');?>">
<p>我的余额</p>
<span><?php echo ($userInfo['balance']); ?>元</span></a></li>
</ul>
<div class="clr"></div>
</div>
<div class="contents">
	<div class="content-wrapper clearfix">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><a href="index.php?g=Wap&m=Card&a=scorelotteryview&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>&aid=<?php echo ($item["id"]); ?>">
	  <article class="article">
		<div class="article-content">
			<div class="article-logo-wrapper">
				<span class="article-logo bg-img" style="background-image:url(<?php echo ($item["pic"]); ?>)"></span>
			</div>
			<div class="btn-container disabled">
			<?php if($item['people'] == $item['usetime']): ?><span class="exchange-btn">抽光了</span>
			<?php else: ?>
				<span class="exchange-btn">立即抽奖</span><?php endif; ?>
			</div>
			<div class="article-info-container">
				<div class="info-inline-container">
					<p class="info-title"><?php echo ($item["title"]); ?></p>
					<p class="info-inline">总量:<?php echo ($item["people"]); ?>件</p>
					<p class="info-inline">剩余:<?php echo ($item['people']-$item['usetime']);?>件</p>
					<p class="info-explain">所需积分:<?php echo ($item["integral"]); ?>积分</p>
				</div>
				
			</div>
		</div>
	  </article>
	  </a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
<footer>
    <nav class="nav">
        <ul class="box">
            <li>
                <a href="<?php echo U('Card/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="<?php if(ACTION_NAME=='index'){ ?>on<?php } ?>">
                    <p class="share"></p>
                    <span>
                        <?php if($thisCard['id'] == ''): ?>领卡
                        <?php else: ?>
                            换卡<?php endif; ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/card',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='card'){ ?>on<?php } ?>">
                    <p class="card"></p>
                    <span>会员卡</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/cards',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="my <?php if(ACTION_NAME=='cards'){ ?>on<?php } ?>" >
                    <p class="my"  ></p>
                    <span>我的</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/notice',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='notice'){ ?>on<?php } ?>">
                    <p id="Js-msg-num" class="msg" data-count="1" ></p>
                    <span>消息</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Card/signscore',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="<?php if(ACTION_NAME=='signscore'){ ?>on<?php } ?>">
                    <p class="sign"></p>
                    <span>签到</span>
                </a>
            </li>
        </ul>
    </nav>
</footer>

<!--
<div class="box clr"></div>
<div class="xia clr">
    <ul>
        <li class="clr <?php if(ACTION_NAME=='index'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
                <i class="ico_bt hk"></i>
                <P>
                    <?php if($thisCard['id'] == ''): ?>领卡
                    <?php else: ?>
                        换卡<?php endif; ?>
                </P>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='card'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/card',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt hyk"></i>
                <p>会员卡</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='notice'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/notice',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt xx"></i>
                <p>消息</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='signscore'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/signscore',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt qd"></i>
                <p>签到</p>
            </a>
        </li>
        <li class="clr <?php if(ACTION_NAME=='cards'){ ?>cur<?php } ?>">
            <a href="<?php echo U('Card/cards',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>">
                <i class="ico_bt wd"></i>
                <p>我的</p>
            </a>
        </li>
    </ul>
</div>
-->
<script type="text/javascript">
/*var phoneWidth = parseInt(window.screen.width);
var phoneScale = phoneWidth/520;
var ua = navigator.userAgent;
var meta = document.createElement("meta"); 
	meta.setAttribute("name","viewport");

if (/Android (\d+\.\d+)/.test(ua)){
	var version = parseFloat(RegExp.$1);
	// andriod 2.3
	if(version>2.3){
		meta.setAttribute("content",'width=520, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi');
	// andriod 2.3以上
	}else{
		meta.setAttribute("content",'width=520, target-densitydpi=device-dpi');
	}
	// 其他系统
} else {
	meta.setAttribute("content",'width=520, user-scalable=no, target-densitydpi=device-dpi');
}
document.head.appendChild(meta);
*/

window.shareData = {  
            "moduleName":"Card",
            "moduleID":"0",
            "imgUrl": "", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Card/index',array('token'=>$token));?>",
            "tTitle": "会员卡",
            "tContent": ""
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>