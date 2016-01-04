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
<!-- Mobile Devices Support @end --> 
<link href="<?php echo $staticPath;?>/tpl/static/card/css/main.css" rel="stylesheet" type="text/css">
<script src="<?php echo $staticPath;?>/tpl/static/jquery.min.js" type="text/javascript"></script>
</head> 
<body onselectstart="return true;" ondragstart="return false;"> 

<div class="container integral"> 
   <header> 
    <ul class="tbox tbox_1"> 
     <li> <p class="pre"> <label><?php echo ($userScore); ?></label> 可用积分 </p> </li> 
     <li> 
     	<a href="javascript:void(0)" id="qiandao">
     		<label>
     			<?php if($todaySigned == 0): ?>签到
				<?php else: ?>
					已签到<?php endif; ?>
     		</label>
     	</a> 
     </li> 
     <li> <p class="pre"> <label><?php echo ($userInfo['sign_score']); ?></label> 签到积分 </p> </li> 
    </ul> 
    <nav class="nav_integral"> 
     <ul class="box"> 
      <li><a href="<?php echo U('Card/my_coupon',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id'],'type'=>3));?>"> <span class="icons icons_prize">&nbsp;</span><label>兑换礼品</label></a></li> 
      <li><a href="<?php echo U('Card/signdetail',array('token'=>$token,'cardid'=>$thisCard['id']));?>"> <span class="icons icons_teach">&nbsp;</span><label>积分攻略</label></a></li> 
     </ul> 
    </nav> 
   </header> 
   <div class="body"> 
    <div> 
     <div class="Calendar"> 
      <header> 
       <div id="idCalendarPre">
        <a href="<?php echo U('Card/signscore',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id'],'month'=>$prev_month));?>">
          <span class="icons icons_before">&nbsp;</span>
        </a>
       </div> 
       <div id="idCalendarNext">
        <a href="<?php echo U('Card/signscore',array('token'=>$token,'wecha_id'=>$wecha_id,'cardid'=>$thisCard['id'],'month'=>$next_month));?>">
          <span class="icons icons_after">&nbsp;</span>
        </a>
       </div> 
       <span id="idCalendarYear"><?php echo ($now_date); ?></span>
      </header> 
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="integral_table">
          <tr>
            <th>签到日期</th>
            <th>签到状况</th>
            <th>获得积分</th>
          </tr>
          <?php if(is_array($signRecords)): $i = 0; $__LIST__ = $signRecords;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><tr>
            <td width="33%"><?php echo (date('m月d日',$c["sign_time"])); ?></td>
            <td width="33%"><span class="wqian">已签到</span></td>
            <td width="33%">+<?php echo ($c["expense"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>       
        </table>
     </div> 
    </div> 
   </div> 
  </div>

  <div class="window" id="windowcenter" style="margin-top:50px;">
    <div class="tip">
      <div id="txt"></div>
    </div>
  </div>

<script type="text/javascript">
function alert(title){ 
	$("#windowcenter").slideToggle("slow"); 
	$("#txt").html(title);
	setTimeout(function(){
		$("#windowcenter").slideUp(500)
	},3000);
} 

function alert(title){ 
	$("#windowcenter").slideToggle("slow"); 
	$("#txt").html(title);
	setTimeout(function(){
		$("#windowcenter").slideUp(500)
	},3000);
} 

$(function(){
	$("#qiandao").click(function () { 
		var btn = $(this);
		var submitData = {
		};
		$.post('/index.php?g=Wap&m=Card&a=addSign&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>', submitData,
		function(data) {
			alert(data.msg)
			if (data.success == true) {
				$("#qiandao").html("已签到");
				 setTimeout(function(){
				 	window.location.reload();
				 },2000);
			} 
		},
		"json");
	});  
});
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