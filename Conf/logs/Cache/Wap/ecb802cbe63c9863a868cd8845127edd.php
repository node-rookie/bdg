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
    <div class="container integral integral_record integral_my coupon">
        <header>
            <nav id="nav_1" class="p_10">
                <ul class="box">
                    <li><a href="/index.php?g=Wap&m=Card&a=payRecord&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo intval($_GET['cardid']);?>&month=<?php echo date('n');?>" class="on">会员卡交易</a></li>
                    <li><a href="/index.php?g=Wap&m=Card&a=expense&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo intval($_GET['cardid']);?>&month=<?php echo date('n');?>">积分线下交易</a></li>
                </ul>
            </nav>
        </header>
        <div class="bill_header">
            <ul class="bill_detail box">
                <li>
                    <label>消费总额:<span><?php echo (($fans['expensetotal'])?($fans['expensetotal']):0.00); ?></span></label>
                </li>
                <li>
                    <label>卡上余额:<span><?php echo (($balance)?($balance):0.00); ?></span></label>
                </li>
                <li>
                    <div>
                        <select onChange="dourl2(this.value)" class="month" id="monthSelectElement">
                            <option value="">请选择月份</option>
                            <option value="1"><?php echo ($year); ?>年1月</option>
                            <option value="2"><?php echo ($year); ?>年2月</option>
                            <option value="3"><?php echo ($year); ?>年3月</option>
                            <option value="4"><?php echo ($year); ?>年4月</option>
                            <option value="5"><?php echo ($year); ?>年5月</option>
                            <option value="6"><?php echo ($year); ?>年6月</option>
                            <option value="7"><?php echo ($year); ?>年7月</option>
                            <option value="8"><?php echo ($year); ?>年8月</option>
                            <option value="9"><?php echo ($year); ?>年9月</option>
                            <option value="10"><?php echo ($year); ?>年10月</option>
                            <option value="11"><?php echo ($year); ?>年11月</option>
                            <option value="12"><?php echo ($year); ?>年12月</option>
                        </select>
                    </div>
                </li>
            </ul>
        </div>
        <div class="body">
            <section>
                <table class="table_record">
                    <thead>
                    <tr>
                        <td style="width:20%;">日期</td>
                        <td style="width:40%;">订单名称</td>
                        <td style="width:20%;">金额(元)</td>
                        <td style="width:20%;">状态</td>
                    </tr>
                    </thead>
                    <table class="table_record <?php if($list == ''): ?>empty1<?php endif; ?>">
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><tr>
                            <td style="width:20%;" align="center"><?php echo (date('m/d',$re["createtime"])); ?></td>
                            <td style="width:40%;"><?php echo ($re["ordername"]); ?></td>
                            <td style="width:20%;" align="center"><?php if($re['type'] == 1): ?>+<?php else: ?>-<?php endif; echo ($re["price"]); ?></td>
                            <td style="width:20%;" align="center"><?php if($re['paid'] == 1): ?>成功<?php else: ?><a style="color:red" href="<?php echo U('Card/payAction',array('token'=>$token,'wecha_id'=>$wecha_id,'orderid'=>$re['orderid'],'cardid'=>$thisCard['id']));?>">待付</a><?php endif; ?></td>
                        </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                    </table>
                </table>
            </section>
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

<script>
    function dourl2(m){
        location.href= '/index.php?g=Wap&m=Card&a=payRecord&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>&month='+m;
    }
</script>
</body>
</html>