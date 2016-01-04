<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($thisCard["cardname"]); ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<!-- Mobile Devices Support @end -->
<link href="<?php echo $staticPath;?>/tpl/static/card/css/main.css" rel="stylesheet" type="text/css">
<script src="<?php echo $staticPath;?>/tpl/static/jquery.min.js" type="text/javascript"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">

<div class="container my">
    <header>
        <div class="header">
            <a href="<?php echo U('Userinfo/index',array('token'=>$_GET['token'],'cardid'=>(int)$_GET['cardid'],'wecha_id'=>$_GET['wecha_id'],'redirect'=>'Card/card|cardid:'.(int)$_GET['cardid']));?>" class="setting">&nbsp;</a>
            <div>
                <ul class="tbox">
                    <li>
                        <span id="upload_header">                
                            <img src="<?php echo ($fans["portrait"]); ?>" />                          
                        </span>
                    </li>
                    <li>
                        <h3><?php echo ($fans["wechaname"]); ?></h3>
                        <p><sban>&nbsp;</sban><?php echo ($thisCard["cardname"]); ?></p>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="box">
                    <li>
                        <a href="javascipt:void(0);">
                            <label>优惠券</label>
                            <span><?php echo ($couponCount1); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascipt:void(0);">
                            <label>代金券</label>
                            <span><?php echo ($couponCount2); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascipt:void(0);">
                            <label>积分</label>
                            <span><?php echo ($userScore); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascipt:void(0);">
                            <label>余额</label>
                            <span><?php echo ($userInfo['balance']); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="body">
        <ul class="list_ul">
            <div>
				<li class="li_t">
                    <a href="<?php echo U('Card/signcpenter',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id'],'type'=>1));?>"><label class="label"><i>&nbsp;</i>积分兑换的礼品<span>&nbsp;</span></label></a>
                </li>
				<li class="li_t">
                    <a href="<?php echo U('Card/myscorelottery',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id'],'type'=>1));?>"><label class="label"><i>&nbsp;</i>参与的积分抽奖<span>&nbsp;</span></label></a>
                </li>
			<!--	<li class="li_t">
                    <a href="<?php echo U('Card/weizhaohuan',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id'],'type'=>1));?>"><label class="label"><i>&nbsp;</i>我的微召唤<span>&nbsp;</span></label></a>
                </li> -->
				<li class="li_t">
                    <a href="<?php echo U('Card/helping',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id'],'type'=>1));?>"><label class="label"><i>&nbsp;</i>分享助力<span>&nbsp;</span></label></a>
                </li>
                <li class="li_t">
                    <a href="<?php echo U('Card/coupon',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id'],'type'=>1));?>"><label class="label"><i>&nbsp;</i>我的优惠券<span>&nbsp;</span></label></a>
                </li>
                <li class="li_s">
                    <a href="<?php echo U('Card/coupon',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id'],'type'=>2));?>"><label class="label"><i>&nbsp;</i>我的代金券<span>&nbsp;</span></label></a>
                </li>
                <li class="li_u">
                    <a href="<?php echo U('Card/integral',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id']));?>"><label class="label"><i>&nbsp;</i>我的礼品券<span>&nbsp;</span></label></a>
                </li>
                <li class="li_v">
                    <a href="<?php echo U('Card/payRecord',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$card['id'],'month'=>date('n')));?>"><label class="label"><i>&nbsp;</i>交易记录<span>&nbsp;</span></label></a>
                </li>
            </div>
            <div>
                <li class="li_o">
                    <label class="label"><i>&nbsp;</i>收货地址<a href="<?php echo U('Card/addr',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="button">管  理</a></label>
                </li>
                
                <li class="li_y">
                    <label class="label"><i>&nbsp;</i>会员卡密码<a href="<?php echo U('Card/paypwd',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="button">管  理</a></label>
                    
                </li>

                <li class="li_b">
                    <label class="label">
                        <i>&nbsp;</i>绑定线下会员卡<a  href="<?php echo U('Card/bind',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id']));?>" class="button" >绑定</a>
                    </label>
                </li>

            </div>
        </ul>
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