<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>  
<title><?php echo ($thisCard["cardname"]); ?></title> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /> 
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" /> 
<!-- Mobile Devices Support @begin --> 
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type" /> 
<meta content="telephone=no, address=no" name="format-detection" /> 
<meta name="apple-mobile-web-app-capable" content="yes" /> 
<!-- apple devices fullscreen --> 
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
<link href="<?php echo $staticPath;?>/tpl/static/card/css/main.css" rel="stylesheet" type="text/css">
</head> 
<body onselectstart="return true;" ondragstart="return false;"> 
  <div class="container addr"> 
   <div class="body"> 
    <ul class="list_ul list_addr "> 
     <ol> 
        <li class="li_b header tbox"> 
           <dd> 
                <i>&nbsp;</i> 
           </dd> 
           <dd> 
                <label class="label">商家门店</label> 
           </dd> 
        </li> 
     </ol> 
    <?php if(is_array($companies)): $i = 0; $__LIST__ = $companies;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$thisCompany): $mod = ($i % 2 );++$i;?><div> 
        <li class="li_name tbox"> 
            <dd class="pl_10"></dd> 
            <dd> 
                <label class="label"><?php echo ($thisCompany["name"]); if($thisCompany["isbranch"] == 0): ?>（总部）<?php endif; ?></label> 
            </dd> 
        </li> 
        <li class="li_tel tbox"> 
           <dd> 
                <i>&nbsp;</i> 
           </dd> 
           <dd> 
                <a class="label" href="tel:<?php echo ($thisCompany["tel"]); ?>">电话：<?php echo ($thisCompany["tel"]); ?></a> 
           </dd> 
        </li> 
        <li class="li_add tbox"> 
        <dd> 
            <i>&nbsp;</i> 
        </dd> 
        <dd> 
            <a href="<?php echo U('Card/companyMap',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id'],'companyid'=>$thisCompany['id']));?>">
                <label class="label">地址：<?php echo ($thisCompany["address"]); ?></label>
            </a> 
        </dd> 
        </li> 
     </div><?php endforeach; endif; else: echo "" ;endif; ?>

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