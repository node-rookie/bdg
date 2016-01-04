<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($thisCard["cardname"]); echo ($item["title"]); ?>兑换实物</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo RES;?>/card/style/style.css" rel="stylesheet" type="text/css">
<script src="/tpl/static/jquery.min.js" type="text/javascript"></script>
<script src="/tpl/static/alert.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/card/js/accordian.pack.js" type="text/javascript"></script>

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
    width:50%;
    float:left;
}
.pic{width:100%;margin-bottom:10px;}
.over{background:#aaa;border:1px solid #aaa;box-shadow: 0 1px 0 #cccccc inset, 0 1px 2px rgba(0, 0, 0, 0.5);}
.window .title{background-image: linear-gradient(#179f00, #179f00);}
</style>
</head>
<body id="cardnews" onLoad="new Accordian(&#39;basic-accordian&#39;,5,&#39;header_highlight&#39;);" class="mode_webapp">
<div class="qiandaobanner">
	<a href="javascript:history.go(-1);"><img src="<?php echo ($thisCard["vip"]); ?>" ></a>
</div>
<header>
	<nav id="nav_1" class="p_10">
		<ul class="boxb">
			<li><a href="index.php?g=Wap&m=Card&a=myscorelottery&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>&type=<?php echo ($type); ?>&is_use=0" class="<?php if($is_use == '0'): ?>on<?php endif; ?>">未使用</a></li>
			<li><a href="index.php?g=Wap&m=Card&a=myscorelottery&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>&type=<?php echo ($type); ?>&is_use=1" class="<?php if($is_use == '1'): ?>on<?php endif; ?>">已使用</a></li>
		</ul>
	</nav>
</header>
<div id="basic-accordian">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div id="test<?php echo ($item["id"]); ?>-header" class="accordion_headings  <?php if ($item['id']==$firstItemID){?>header_highlight<?php } ?>">
<div class="tab gift">
<span class="title"><?php echo ($item["title"]); ?><p>有效期至<?php echo (date('Y年m月d日',$item["enddate"])); ?></p></span>
</div>
<div id="test<?php echo ($item["id"]); ?>-content">
<div class="accordion_child">
<img src="<?php echo ($item["pic"]); ?>" class="pic">
							<?php if($item["is_use"] == '0'): ?><div id="queren<?php echo ($item["id"]); ?>" style="display:none;">
								<p style=" margin:10px 0 0 0">
									<input name="username" class="px" id="username<?php echo ($item["id"]); ?>" value="" type="text" placeholder="请输入商家用户名">
								</p>
								<p style=" margin:10px 0 0 0">
									<input name="password" class="px" id="password<?php echo ($item["id"]); ?>" value="" type="password" placeholder="请输入商家密码">
								</p>
								<p style=" margin:10px 0 0 0">
									<textarea placeholder="备注信息" class="px" id="notes<?php echo ($item["id"]); ?>" name="notes"></textarea>
								</p>
								
								<p style=" margin:10px 0">
									<a id="showcard0" class="submit" href="javascript:void(0)" onClick="use(<?php echo ($item["id"]); ?>)">确认兑换</a>
								</p>
								
							</div>
							<p class="explain_sn" id="shiyong<?php echo ($item["id"]); ?>" style="width: 100%;margin: 0px auto;color: #fff;">
			           			<a style="height: 25px;line-height: 25px;" class="submit" href="###" onClick="this.style.display='none';document.getElementById('queren<?php echo ($item["id"]); ?>').style.display=''">商家确认兑换</a>
			           		</p><?php endif; ?>
<div style="clear:both;height:20px;"></div>
<p class="infos"><b>领取要求：</b>所有会员</p>
<p class="infos"><b>所需积分：</b><span class="max_count" id="integral<?php echo ($item["id"]); ?>"><?php echo ($item["integral"]); ?></span> 积分</p>
<p class="infos"><b>兑换限制：</b>无限制</p>
<?php if($item["add_time"] != ''): ?><p class="infos"><b>兑换日期：</b><?php echo (date("Y-m-d H:i:s",$item["add_time"])); ?></p><?php endif; ?>
<?php if($item["is_use"] == '1'): ?><p class="infos red"><b>使用日期：</b><?php echo (date("Y-m-d H:i:s",$item["use_time"])); ?></p><?php endif; ?>
<p class="infos"><b>活动介绍：</b><?php echo ($item["info"]); ?></p>
<div style="clear:both;height:20px;"></div>
</div> 
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script>
var jQ = jQuery.noConflict();
function use(i){
	var username =  jQ('#username'+i).val();
	var password =  jQ('#password'+i).val();
	var notes 	 =  jQ('#notes'+i).val();
	if(!username){
		alert('请输入商家用户名');
		return false;
	}
	if(!password){
		alert('请输入商家密码');
		return false;
	}
	var itemid=i;
	var submitData = {
			password:password,
			record_id:itemid,
			username:username,
			notes:notes,
		};	
	jQ.post('/index.php?g=Wap&m=Card&a=action_usescorelottery&wecha_id=<?php echo ($wecha_id); ?>&token=<?php echo ($token); ?>&cardid=<?php echo ($thisCard["id"]); ?>', submitData,
	function(data) {
		if (data.success == 1) {
			document.getElementById('queren'+i).style.display='none';
			document.getElementById('password'+i).value = '';
			alert(data.msg);
		}else{
			alert(data.msg);
		}
	}, "json");
}
</script>
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