<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>扫描二维码获取使用权 －<?php echo C('site_title');?></title>
<meta name="keywords" content="PIGCMS 微信帮手 微信公众账号 微信公众平台 微信公众账号开发 微信二次开发 微信接口开发 微信托管服务 微信营销 微信公众平台接口开发"/>
<meta name="description" content="微信公众平台接口开发、托管、营销活动、二次开发"/>
    <?php if($usertplid == 0): ?><link href="<?php echo RES;?>/css/style.css?id=103" rel="stylesheet" type="text/css" />
    <?php else: ?>
        <link href="<?php echo RES;?>/css/style-<?php echo ($usertplid); ?>.css?id=103" rel="stylesheet" type="text/css" /><?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/index.css"/>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/ie6.css"/>
<![endif]-->
<script type="text/javascript">window.onerror=function(){return true;}</script>
<script type="text/javascript" src="<?php echo RES;?>/js/lang.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/page.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/jquery.lazyload.js"></script>
<script type="text/javascript">
GoMobile('');
var searchid = 5;
</script>
</head>
<body>
<div class="topbg">
<div class="top">
<div class="toplink">
<div class="welcome">欢迎使用<?php echo ($f_siteName); ?>多用户微信营销服务平台!</div>
    <div class="memberinfo"  id="destoon_member">	
		<?php if($_SESSION[uid]==false): ?>你好&nbsp;&nbsp;<span class="f_red">游客</span>&nbsp;&nbsp;
			<a href="<?php echo U('Index/login');?>">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?php echo U('Index/login');?>">注册</a>
			<?php else: ?>
			你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('uname')); ?></span></a>（uid:<?php echo (session('uid')); ?>）
			<a href="/#" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a><?php endif; ?>	
	</div>
</div>
    <div class="logo">
        <div style="float:left"></div>
            <h1><a href="/" title="多用户微信营销服务平台"><img src="<?php echo ($f_logo); ?>" /></a></h1>
            <div class="navr">
        <ul id="topMenu">           
			 <li <?php if((ACTION_NAME == 'index') and (GROUP_NAME == 'Home')): ?>class="menuon"<?php endif; ?> ><a href="/" >首页</a></li>
                <li <?php if((ACTION_NAME) == "fc"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/fc');?>">功能介绍</a></li>
                <li <?php if((ACTION_NAME) == "about"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/about');?>">关于我们</a></li>
                <li <?php if((ACTION_NAME) == "price"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/price');?>">资费说明</a></li>
                <li <?php if((ACTION_NAME) == "common"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/common');?>">微信导航</a></li>
                <li <?php if((GROUP_NAME) == "User"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('User/Index/index');?>">管理中心</a></li>
                <li <?php if((ACTION_NAME) == "help"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/help');?>">帮助中心</a></li>
            
            </ul>
        </div>
        </div>
    </div>
</div>
<style type="text/css">
.main{
padding: 10px 0 0 10px;;
border: 1px solid #c7cdd6;
background: #f5f6f7;
box-shadow: 0px 1px 3px #ccc;
}
.submit{ background: #348FD4; color: #fff; font-size: 20px; height: 50px; line-height: 40px; padding: 0 24px; vertical-align: middle; border: 0; cursor: pointer; }
.submit:hover{ background-color: #2F81BF; }
</style>
<script>
function setTab(m,n){
var tli=document.getElementById("menu"+m).getElementsByTagName("div");
var mli=document.getElementById("main"+m).getElementsByTagName("div");
for(i=0;i<tli.length;i++){
   tli[i].className=i==n?"hover":"";
   mli[i].style.display=i==n?"block":"none";
}
}
</script>

<div class="main" style="margin-top:20px;margin-bottom:20px;">
   
<div class="qtcontent">
        <div class="intro" style="">
            <div class="normalTitle"><h2 style="text-align:center;margin-top:30px;">扫描二维码关注公众号，并发送“审核<?php echo ($thisUser["username"]); ?>”，可以自动获取<?php echo ($reg_validDays); ?>天的使用权限</h2></div>
            <div class="normalContent" style="width:430px;margin:20px auto">
<div class="section">
                    <div id="table" style="overflow:hidden;width:100%">
                    <div class="menubg">
                        <div class="menu0" id="menu0">
                    <img src="<?php echo C('site_twm');?>" />
                        </div>
                    </div>
                  
                    </div>
                	<p class="clr"></p>
            	</div>
            	
            <div style="text-align:center;margin:20px auto;display:none" id="toex"><input class="submit" onclick="location.href='<?php echo U('Index/qrcodeLogin');?>'" type="button" value="自动审核成功，点击这里就可以体验了"></div>
        	</div>
    	</div>
    </div>
<!--底部-->	</div>
<!--底部-->	</div>
</div>
<input type="hidden" id="openid" value="<?php echo ($thisUser["openid"]); ?>" />
<script>
	function rs(){
		if(!$('#openid').value){
		$.ajax({
			type: "post",
			url : "<?php echo U('Index/isfollow');?>",
			dataType:'json',
			data: 'id=<?php echo ($thisUser["id"]); ?>',
			success: function(json){
				if(json.openid){
					$('#toex').fadeIn('slow');
				}
			}
		});
		}
		
	}
	setInterval(rs,2000);
</script>
</div>
<div class="IndexFoot" style="height:120px;">
<div class="foot">
<div class="foot_page">
<a href="/"><?php echo ($f_siteName); ?>，移动互联网会员管理与营销系统。</a><br/>
帮助您快速搭建属于自己的营销平台,构建自己的客户群体！<br/>
大转盘、刮刮卡，会员卡,优惠卷,订餐,订房等营销模块,客户易用,易懂,易营销。
</div>
<div id="copyright">
	<?php echo ($f_siteName); ?>(c) 版权所有<br/>
	<a href="http://www.miibeian.gov.cn" target="_blank" style="color:white"><?php echo ($f_ipc); ?></a><br/>
	QQ咨询：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($f_qq); ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo ($f_qq); ?>:51" alt="联系我吧" title="联系我吧"/></a>

</div>
    </div>
</div>
<div style="display:none">
<?php echo html_entity_decode(base64_decode(C('countsz')));?>
</div>
</body>
</html>