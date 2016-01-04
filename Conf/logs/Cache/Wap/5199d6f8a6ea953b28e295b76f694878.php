<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($thisCard["cardname"]); ?>会员特权</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo RES;?>/card/style/style.css" rel="stylesheet" type="text/css">
<script src="/tpl/static/jquery.min.js" type="text/javascript"></script>
<script src="/tpl/static/alert.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/card/js/accordian.pack.js" type="text/javascript"></script>
<style>
.window .title{background-image: linear-gradient(#179f00, #179f00);}
</style>
<script>
var jQ = jQuery.noConflict();
</script>
</head>
<body id="cardnews" onLoad="new Accordian(&#39;basic-accordian&#39;,5,&#39;header_highlight&#39;);" class="mode_webapp">
<div class="qiandaobanner"><a href="javascript:history.go(-1);"><img src="<?php echo ($thisCard["vip"]); ?>" ></a> </div>

<div id="basic-accordian">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div id="test<?php echo ($item["id"]); ?>-header" class="accordion_headings  <?php if ($item['id']==$firstItemID){?>header_highlight<?php } ?>">
<div class="tab  vip ">
<span class="title"><?php echo ($item["title"]); ?><p><?php if ($item['type']&&$item['enddate']){?>有效期至<?php echo (date('Y年m月d日',$item["enddate"])); }else{ ?>无限期<?php } ?></p></span>
</div>
<div id="test<?php echo ($item["id"]); ?>-content">
<div class="accordion_child">
<div id="queren<?php echo ($item["id"]); ?>" style="display:none;">
	<form action="/index.php?g=Wap&m=Card&a=action_usePrivelege&wecha_id=<?php echo ($wecha_id); ?>&token=<?php echo ($token); ?>" method="post" id="payform<?php echo ($item["id"]); ?>">
								<p style=" margin:10px 0;text-align:center">
									<input type="radio" name="paytype" onchange="radiochange(this,<?php echo ($item["id"]); ?>)" class="paytype<?php echo ($item["id"]); ?>" value="0" /><label for="paytype<?php echo ($item["id"]); ?>" style="font-size:12px;">线下支付</label> &nbsp; &nbsp; &nbsp; &nbsp;
									<input type="radio" name="paytype" onchange="radiochange(this,<?php echo ($item["id"]); ?>)" class="paytype<?php echo ($item["id"]); ?>" value="1" /><label for="paytype<?php echo ($item["id"]); ?>" style="font-size:12px;">会员卡支付</label>
						
								</p>
								<p style=" margin:10px 0">
									<input name="money" type="text" class="px" id="money<?php echo ($item["id"]); ?>" value="" placeholder="请输入实际消费金额">
								</p>
								<!--  
								<p style=" margin:10px 0" id="usetime_p<?php echo ($item["id"]); ?>">
									<input name="s_money" type="text" class="px" id="s_money<?php echo ($item["id"]); ?>" value="" placeholder="请再输入消费金额">
								</p>-->
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
									<input type="hidden" name="itemid" value="<?php echo ($item["id"]); ?>" />
									<input type="hidden" name="wecha_id" value="<?php echo ($_GET['wecha_id']); ?>" />
									<a id="showcard0" class="submit" href="javascript:void(0)" onclick="payformsubmit(<?php echo ($item["id"]); ?>)">确定使用</a>
								</p>
							</div>
							</form>	
							<p class="explain_sn" id="shiyong<?php echo ($item["id"]); ?>" style="width: 100%;margin: 0px auto;color: #fff;">
			           			<a style="height: 25px;line-height: 25px;" class="submit" href="###" onclick="this.style.display='none';document.getElementById('queren<?php echo ($item["id"]); ?>').style.display=''">点击立即使用</a>
			           		</p>
<b>详情说明</b>
<ul style="min-height:250px;"><?php echo ($item["info"]); ?></ul>
</div> 
<div style="clear:both;height:20px;"></div>
</div>
</div>
<script>
jQ(function(){
	loadType('<?php echo ($item["id"]); ?>');
});
</script><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<script>

var jQ = jQuery.noConflict();

function radiochange(e,tid){
	var ptype = e.value;
			if(ptype == 1){
				jQ('#password'+tid).css('display','none');
				jQ('#username'+tid).css('display','none');
				jQ('#notes'+tid).css('display','none');
			}else{
				jQ('#password'+tid).css('display','').attr('placeholder','请输入商家密码');
				jQ('#username'+tid).css('display','');
				jQ('#notes'+tid).css('display','');

			}
}

function loadType(id){
	if(jQ('.paytype'+id+':checked').val() == 1){
		jQ('#password'+id).css('display','none');
		jQ('#username'+id).css('display','none');
		jQ('#notes'+id).css('display','none');
	}else{
		jQ('#password'+id).css('display','').attr('placeholder','请输入商家密码');
		jQ('#username'+id).css('display','');
		jQ('#notes'+id).css('display','');
		jQ('.paytype'+id+':first').attr('checked',true);
	}
}

function payformsubmit(itemid){
	if(jQ('.paytype'+itemid+':checked').val() == 1){
		jQ('#payform'+itemid).submit();
	}else{
		use(itemid);
	}
}


function use(i){
	var paytype =  jQ('.paytype'+i+':checked').val()
	var password =  jQ('#password'+i).val();
	var money 	 =  jQ('#money'+i).val();
	var username =  jQ('#username'+i).val();
	var notes 	 =  jQ('#notes'+i).val();
	var prg 	= /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/;
	if(!prg.test(money)){
		alert('请输入正确金额');
		return false;
	}
	if(!username){
		alert('请输入商家用户名');
		return false;
	}
	if(!password){
		alert('请输入商家密码');
		return false;
	}
	if(!notes){
		alert('请输入备注信息');
		return false;
	}

	var itemid=i;
	var submitData = {
		password:password,
		itemid:itemid,
		money: money,
		username:username,
		notes:notes,
		paytype: paytype,
		wecha_id:'<?php echo ($wecha_id); ?>',
		cat:0,
	};
	
	jQ.post('/index.php?g=Wap&m=Card&a=action_usePrivelege&wecha_id=<?php echo ($wecha_id); ?>&token=<?php echo ($token); ?>', submitData,
	
	function(data) {
		if (data.success == 1) {
			document.getElementById('queren'+i).style.display='none';
			document.getElementById('password'+i).value = '';
			document.getElementById('money'+i).value='';
			alert(data.msg);
		}else{
			alert(data.msg);
		}
	}, "json");
}



</script>
<div style="height:40px;"></div>
<div class="footermenu">
    <ul>
        <li>
            <a href="/index.php?g=Wap&m=Card&a=index&token=<?php echo ($token); ?>&cardid=<?php echo ($thisCard["id"]); ?>&wecha_id=<?php echo ($wecha_id); ?>">
           	<img src="<?php echo RES;?>/card/images/home.png">
            <p>首页</p>
            </a>
        </li>
        
        <li>
            <a <?php if(ACTION_NAME=='card'){ ?>class="active"<?php } ?> href="/index.php?g=Wap&m=Card&a=card&token=<?php echo ($token); ?>&cardid=<?php echo ($thisCard["id"]); ?>&wecha_id=<?php echo ($wecha_id); ?>">
           	<img src="<?php echo RES;?>/card/images/c.png">
            <p>会员卡</p>
            </a>
        </li>

        <li>
            <a <?php if(ACTION_NAME=='notice'){ ?>class="active"<?php } ?> href="/index.php?g=Wap&m=Card&a=notice&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>">
           	<img src="<?php echo RES;?>/card/images/prev.png">
            <p>通知</p>
            </a>
        </li>

        <li>
            <a <?php if(ACTION_NAME=='signscore'){ ?>class="active"<?php } ?> href="/index.php?g=Wap&m=Card&a=signscore&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($thisCard["id"]); ?>">
           	<img src="<?php echo RES;?>/card/images/intergral.png">
            <p>签到</p>
            </a>
        </li>

        <li>
            <a <?php if(ACTION_NAME=='cards'){ ?>class="active"<?php } ?> href="/index.php?g=Wap&m=Card&a=cards&token=<?php echo ($token); ?>&cardid=<?php echo ($thisCard["id"]); ?>&wecha_id=<?php echo ($wecha_id); ?>">
           	<img src="<?php echo RES;?>/card/images/my.png">
            <p>会员中心</p>
            </a>
        </li>
    </ul>
</div>
<script type="text/javascript">
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