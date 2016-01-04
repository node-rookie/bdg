<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($thisCard["cardname"]); ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Keywords" content=""/>
<meta name="Description" content=""/>
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<!-- Mobile Devices Support @end -->
<link href="/tpl/static/kindeditor/examples/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css">
<link href="<?php echo $staticPath;?>/tpl/static/card/css/main.css" rel="stylesheet" type="text/css">
<script src="<?php echo $staticPath;?>/tpl/static/jquery.min.js" type="text/javascript"></script>
<script src="/tpl/static/kindeditor/examples/jquery-ui/js/jquery-ui-1.9.2.custom.js" type="text/javascript"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<div class="container coupon <?php if($type == 2): ?>cash_coupon_my<?php elseif($type == 3): ?>exchange<?php endif; ?> <?php if($list == ''): ?>none<?php endif; ?>">
  <header>
  <nav id="nav_1" class="p_10">
  <ul class="box" style="width:300px;">
    <li><a href="index.php?g=Wap&m=Card&a=my_coupon&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>&type=1"  <?php if($type == 1): ?>class="on"<?php endif; ?>>优惠券</a></li>
    <li><a href="index.php?g=Wap&m=Card&a=my_coupon&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>&type=2" <?php if($type == 2): ?>class="on"<?php endif; ?>>代金券</a></li>
    <li><a href="index.php?g=Wap&m=Card&a=my_coupon&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>&type=3" <?php if($type == 3): ?>class="on"<?php endif; ?>>礼品券</a></li>
  </ul>
  </nav>
  </header>
  <div class="body">
    <ul class="<?php if($type == 3): ?>list_exchange<?php else: ?>list_coupon<?php endif; ?>">
      <ol>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if($type == 1): ?><li data-card>
          <a href="javascript:;" onclick="this.classList.toggle('toggle');" <?php if($item["count"] == 0): ?>class="on"<?php endif; ?>>
            <header>
              <label><?php echo ($item["title"]); ?></label>
              <label class="fr" style="font-size:12px;line-height:22px;">
                <?php if($item["count"] == -1): ?>不限
                <?php else: ?>
                  剩余<?php echo ($item["count"]); ?>张<?php endif; ?>
              </label>
            </header>
            <section>
              <div>
                <figure class="tbox">
                <div>
                  <img src="<?php echo ($item["pic"]); ?>"/>
                </div>
                <div onclick="payformsubmit(<?php echo ($item["id"]); ?>);event.stopPropagation();">
                  <label>
                    <?php if($item["count"] == 0): ?>已领取
                    <?php else: ?>
                      领取<?php endif; ?>
                  </label>
                </div>
                </figure>
              </div>
              <div class="des">
                <dl>
                  <dt onclick="this.classList.toggle('on');event.stopPropagation();">
                    有效期至<?php echo (date('Y-m-d',$item["enddate"])); ?>
                  </dt>
                  <dd>
                    <p>
                      适用门店：<?php echo ($item["company_name"]); ?>
                    </p>
                  </dd>
                  <dd>
                    <?php echo ($item["info"]); ?>   
                  </dd>
                </dl>
              </div>
            </section>
          </a>
        </li>
  <?php elseif($type == 2): ?>
        <li data-card>
          <a href="javascript:;" onclick="this.classList.toggle('toggle');" <?php if($item["count"] == 0): ?>class="on"<?php endif; ?>>
            <header>
              <label><?php echo ($item["title"]); ?></label>
              <label class="fr" style="font-size:12px;line-height:22px;">
                <?php if($item["count"] == -1): ?>不限
                <?php else: ?>
                  剩余<?php echo ($item["count"]); ?>张<?php endif; ?>
              </label>
            </header>
            <section>
              <div>
                <figure class="tbox">
                <div>
                  <img src="<?php echo ($item["pic"]); ?>"/>
                </div>
                <div onclick="payformsubmit(<?php echo ($item["id"]); ?>);event.stopPropagation();">
                  <label>
                    <?php if($item["count"] == 0): ?>已领取
                    <?php else: ?>
                      领取<?php endif; ?>
                  </label>
                </div>
                </figure>
              </div>
              <div class="des">
                <dl>
                  <dt onclick="this.classList.toggle('on');event.stopPropagation();">
                    有效期至<?php echo (date('Y-m-d',$item["enddate"])); ?>
                  </dt>
                  <dd>
                    <p>
                      适用门店：<?php echo ($item["company_name"]); ?>
                    </p>
                  </dd>
                  <dd>
                    <?php echo ($item["info"]); ?>   
                  </dd>
                </dl>
              </div>
            </section>
          </a>
        </li>
  <?php elseif($type == 3): ?>
        <li data-card onclick="this.classList.toggle('on');" >
          <header>
            <ul class="tbox">
              <li>
                <h5><?php echo ($item["title"]); ?> </h5>
                <p>有效期至<?php echo (date('Y-m-d',$item["enddate"])); ?> </p>
              </li>
            </ul>
          </header>
          <section>
            <div>
              <figure>
                <img src="<?php echo ($item["pic"]); ?>" />
              </figure>
              <article class="p">
                <p><?php echo ($item["info"]); ?></p>
              </article>
            </div>
          </section>
          <footer>
            <dl class="box">
              <dd><label><big id="integral<?php echo ($item["id"]); ?>"><?php echo ($item["integral"]); ?></big>积分</label></dd>
              <dd>
                <?php if($item["count"] == 0): ?><a href="javascript:;">已经兑换</a>
                <?php else: ?>
                  <a href="javascript:;" onclick="payformsubmit(<?php echo ($item["id"]); ?>);event.stopPropagation();">立即兑换</a><?php endif; ?>
              </dd>
            </dl>
          </footer>
        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </ol>
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
<script>
function payformsubmit(itemid){
  var submitData = {
    coupon_id:itemid,
    cardid: '<?php echo ($thisCard["id"]); ?>',
    type: '<?php echo ($type); ?>',
    cat:3,
  };

  if(submitData.type == 3){
    $("#spanmessage").text('领取礼品券需要消耗'+($('#integral'+itemid).html())+'点积分，确定领取吗？');
  }else if(submitData.type == 2){
    $("#spanmessage").text('确定要领取此代金卷吗？');
  }else{
    $("#spanmessage").text('确定要领取此优惠劵卷吗？');
  }
  $("#message").dialog({
    title: "温馨提示！",
    modal: true,
    resizable: false,
    buttons: {
       "取消": function() {
          $(this).dialog("close");
       },
       "确定": function() {
          ajaxSub(submitData);//方法回调
       }
    }
  }); 
}

function ajaxSub(submitData){
    $.post('/index.php?g=Wap&m=Card&a=action_myCoupon&wecha_id=<?php echo ($wecha_id); ?>&token=<?php echo ($token); ?>&cardid=<?php echo ($thisCard["id"]); ?>', submitData,function(data) {
    $("#spanmessage").text(data.info); 
    $("#message").dialog({
           title:"温馨提示！",
           modal: true,
           buttons: {
               "确定": function() {
                   $(this).dialog("close");
                   if(data.err == 0){
                      window.location.reload();
                   }
               }
           }
        }); 
  }, "json");
}

$(function(){
   var boardDiv = "<div id='message' style='display:none;'><span id='spanmessage'></span></div>";
   $(document.body).append(boardDiv);

   $('.neirLt').click(function(){
      var des = $(this).siblings('.des');
      if(des.css('display') == 'none'){
        des.css('display','block');
      }else{
        des.css('display','none');
      }
   });
}); 
</script>
</body>
</html>