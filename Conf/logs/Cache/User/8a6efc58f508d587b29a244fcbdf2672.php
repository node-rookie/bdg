<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php echo ($f_siteTitle); ?> <?php echo ($f_siteName); ?></title>
<meta name="keywords" content="<?php echo ($f_metaKeyword); ?>" />
<meta name="description" content="<?php echo ($f_metaDes); ?>" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<script>var SITEURL='';</script>

<script src="<?php echo RES;?>/js/common.js" type="text/javascript"></script>
</head>
<body id="nv_member" class="pg_CURMODULE">
	
<div id="wp" class="wp">
	<?php if($usertplid == 0): ?><link href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style.css?id=103" rel="stylesheet" type="text/css" />
	<?php else: ?>
		<link href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style-<?php echo ($usertplid); ?>.css?id=103" rel="stylesheet" type="text/css" /><?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style_2_common.css?BPm" />
<style>
a.a_upload,a.a_choose{border:1px solid #3d810c;box-shadow:0 1px #CCCCCC;-moz-box-shadow:0 1px #CCCCCC;-webkit-box-shadow:0 1px #CCCCCC;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;vertical-align:middle;background-color:#f1f1f1;background-image: -webkit-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -moz-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -ms-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); color:#000;border:1px solid #AAA;padding:2px 8px 2px 8px;text-shadow: 0 1px #FFFFFF;font-size: 14px;line-height: 1.5;
}

.pages{padding:3px;margin:3px;text-align:center;}
.pages a{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#036cb4;text-decoration:none;}
.pages a:hover{border:#999 1px solid;color:#666;}
.pages a:active{border:#999 1px solid;color:#666;}
.pages .current{border:#036cb4 1px solid;padding:2px 5px;font-weight:bold;margin:2px;color:#fff;background-color:#036cb4;}
.pages .disabled{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#ddd;}
</style>
 <script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
 <?php if(session('isQcloud') == true): ?><link type="text/css" rel="stylesheet" href="http://qzonestyle.gtimg.cn/qcloud/app/open/v1/css/wxcloud.min.css" />


<style>
.px {
	background:#fff;

	border-color:#c9c9c9;

}


input[type=radio] {

	border-radius:55px;

	border: none;

}
.btnGreen {
	border:1px solid #FFFFFF;
	box-shadow:0 1px 1px #0A8DE4;
	-moz-box-shadow:0 1px 1px #0A8DE4;
	-webkit-box-shadow:0 1px 1px #0A8DE4;
	padding:5px 20px;
	cursor:pointer;
	display:inline-block;
	text-align:center;
	vertical-align:bottom;
	overflow:visible;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
*zoom:1;
	background-color:#5ba607;
	background-image:linear-gradient(bottom, #107BAD  3%, #18C2D1 97%, #18C2D1 100%);
	background-image:-moz-linear-gradient(bottom, #107BAD  3%, #0A8DE40 97%, #18C2D1 100%);
	background-image:-webkit-linear-gradient(bottom, #107BAD  3%,#0A8DE4 97%, #18C2D1 100%);
	color:#fff; font-size:14px; line-height: 1.5;
}
.btnGreen:hover {
	background-color:#5ba607;
	background-image:linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
	background-image:-moz-linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
	background-image:-webkit-linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
	color:#fff
}
.btnGreen:active {
	background-color:#5ba607;
	background-image:linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
	background-image:-moz-linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
	background-image:-webkit-linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
	color:#fff
}

.btnGreen{border:1px solid #3d810c;box-shadow:0 1px 1px #aaa;-moz-box-shadow:0 1px 1px #aaa;-webkit-box-shadow:0 1px 1px #aaa;padding:5px 20px;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;*zoom:1;background-color:#5ba607;background-image:linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);color:#fff;font-size:14px;line-height:1.5;}.btnGreen:hover{background-color:#5ba607;background-image:linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);color:#fff}.btnGreen:active{background-color:#5ba607;background-image:linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);color:#fff}

</style><?php endif; ?>
<?php
if (!isset($_SESSION['isQcloud'])){ ?>
<div class="topbg">
<div class="top">
<div class="toplink">
<style>
<?php if($usertplid == 1): ?>.topbg{background:url(<?php echo ($staticPath); ?>/tpl/static/newskin/images/top.gif) repeat-x; height:101px; /*box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;*/}
.top {
    margin: 0px auto; width: 988px; height: 101px;
}

.top .toplink{ height:30px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {width: 990px; color: #333; height:70px; font-size:16px;}
.top h1{ font-size:25px;float:left; width:230px; margin:0; padding:0; margin-top:6px; }
.top .navr {WIDTH:750px; float:right; overflow:hidden;}
.top .navr ul{ width:850px;}
.navr li {text-align:center; float: left; height:70px; font-size:1em; width:103px; margin-right:5px;}
.navr li a {width:103px; line-height:70px; float: left; height:100%; color: #333; font-size: 1em; text-decoration:none;}
.navr li a:hover { background:#ebf3e4;}
.navr li.menuon {background:#ebf3e4; display:block; width:103px;}
.navr li.menuon a{color:#333;}
.navr li.menuon a:hover{color:#333;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}
<?php else: ?>

.topbg{BACKGROUND-IMAGE: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/top.png);BACKGROUND-REPEAT: repeat-x; height:124px; box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;}
.top {
	MARGIN: 0px auto; WIDTH: 988px; HEIGHT: 124px;
}

.top .toplink{ height:27px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {WIDTH: 990px;COLOR: #333; height:70px;  FONT-SIZE:16px; PADDING-TOP:25px}
.top h1{ font-size:25px; margin-top:20px; float:left; width:230px; margin:0; padding:0;}
.top .navr {WIDTH:750px; float:right; overflow:hidden; margin-top:10px;}
.top .navr ul{ width:850px;}
.navr LI {TEXT-ALIGN:center;FLOAT: left;HEIGHT:32px;FONT-SIZE:1em;width:103px; margin-right:5px;}
.navr LI A {width:103px;TEXT-ALIGN:center; LINE-HEIGHT:30px; FLOAT: left;HEIGHT:32px;COLOR: #333; FONT-SIZE: 1em;TEXT-DECORATION: none
}
.navr LI A:hover {BACKGROUND: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/navhover.gif) center no-repeat;color:#009900;}
.navr LI.menuon {BACKGROUND: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/navon.gif) center no-repeat; display:block;width:103px;HEIGHT:32px;}
.navr LI.menuon a{color:#FFF;}
.navr LI.menuon a:hover{BACKGROUND: url(img/navon.gif) center no-repeat;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}<?php endif; ?>
</style>
<div class="welcome">欢迎使用多用户微信营销服务平台!</div>
    <div class="memberinfo"  id="destoon_member">	
		<?php if($_SESSION[uid]==false): ?><a href="<?php echo U('Index/login');?>">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?php echo U('Index/login');?>">注册</a>
			<?php else: ?>
			你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('uname')); ?></span></a>（uid:<?php echo (session('uid')); ?>）
			<a href="/#" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a><?php endif; ?>	
	</div>
</div>
    <div class="logo">
        <div style="float:left"></div>
            <h1><a href="/" title="多用户微信营销服务平台"><img src="<?php echo ($f_logo); ?>" height="55" /></a></h1>
            <div class="navr">
        <ul id="topMenu">           
            <li <?php if((ACTION_NAME == 'index') and (GROUP_NAME == 'Home')): ?>class="menuon"<?php endif; ?> ><a href="/">首页</a></li>
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
<div id="aaa"></div>
<?php
} ?>

  <!--中间内容-->

  <div class="contentmanage"<?php if (isset($_SESSION['isQcloud'])){?> style="width:100%"<?php }?>>
  <?php
if (!isset($_SESSION['isQcloud'])){ ?>
    <div class="developer">
       <div class="appTitle normalTitle2">
        <div class="vipuser">


<div class="logo">
<a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><img src="<?php echo ($wecha["headerpic"]); ?>" width="100" height="100" /></a>
</div>

<div id="nickname">
<strong><a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><?php echo ($wecha["wxname"]); ?></a></strong><a href="#" target="_blank" class="vipimg vip-icon<?php echo $userinfo['taxisid']-1; ?>" title=""></a></div>
<div id="weixinid">微信号:<?php echo ($wecha["weixin"]); ?></div>
</div>

        <div class="accountInfo">
<table class="vipInfo" width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><strong>VIP有效期：</strong><?php echo (date("Y-m-d",$thisUser["viptime"])); ?></td>
<td><strong>图文自定义：</strong><?php echo ($thisUser["diynum"]); ?>/<?php echo ($userinfo["diynum"]); ?></td>
<td><strong>活动创建数：</strong><?php echo ($thisUser["activitynum"]); ?>/<?php echo ($userinfo["activitynum"]); ?></td>
<td><strong>请求数：</strong><?php echo ($thisUser["connectnum"]); ?>/<?php echo ($userinfo["connectnum"]); ?></td>
</tr>
<tr>
<td><strong>请求数剩余：</strong><?php echo ($userinfo['connectnum']-$_SESSION['connectnum']); ?></td>
<td><strong>已使用：</strong><?php echo $_SESSION['diynum']; ?></td>
<td><strong>当月赠送请求数：</strong><?php echo ($userinfo["connectnum"]); ?></td>
<td><strong>当月剩余请求数：</strong><?php echo $userinfo['connectnum']-$_SESSION['connectnum']; ?></td>
</tr>

</table>
    </div>
        <div class="clr"></div>
      </div>
      <!--左侧功能菜单-->


<style type="text/css">
#sideBar{
border-right: 0px solid #D3D3D3 !important;
float: left;
padding: 0 0 10px 0;
width: 170px;
background: #fff;
}
.tableContent {
background: none repeat scroll 0 0 #f5f6f7;
padding: 0;
}
.tableContent .content {
border-left: 1px solid #D7DDE6 !important;
}
ul#menu, ul#menu ul {
  list-style-type:none;
  margin: 0;
  padding: 0;
  background: #fff;
}

ul#menu a {
  display: block;
  text-decoration: none;
}

ul#menu li {
  margin: 1px;
}
ul#menu li ul li{
  margin: 1px 0;
}
ul#menu li a {
  background: #EBEEF1;
  color: #464D6A;
  padding: 0.5em;
}
ul#menu li .nav-header{
font-size:14px;
border-bottom: 1px solid #D7DDE6;
}
ul#menu li .nav-header:hover {
  background: #DDE4EB;
}

ul#menu li ul li a {
  background: #FCFCFC;
  color: #8288A4;
  padding-left: 20px;
}
ul#menu li ul li:last-child {
    border-bottom: 1px solid #D7DDE6;
}
ul#menu li ul li a:hover {
  background: #fff;
  border-left: 5px #4A98E0 solid;

}
ul#menu li.selected a{
  background: #fff;
  border-left: 5px #4A98E0 solid;
  padding-left: 15px;
  color: #4A98E0;
}
.code { border: 1px solid #ccc; list-style-type: decimal-leading-zero; padding: 5px; margin: 0; }
.code code { display: block; padding: 3px; margin-bottom: 0; }
.code li { background: #ddd; border: 1px solid #ccc; margin: 0 0 2px 2.2em; }
.indent1 { padding-left: 1em; }
.indent2 { padding-left: 2em; }
.tableContent .content{min-height: 1328px;}

a.nav-header{background:url(/tpl/static/images/arrow_click.png) center right no-repeat;cursor:pointer}
a.nav-header-current{background:url(/tpl/static/images/arrow_unclick.png) center right no-repeat;}
</style>
<?php
} ?>
      <div class="tableContent">
        <?php
if (!isset($_SESSION['isQcloud'])){ ?>
        <!--左侧功能菜单-->
 <div  class="sideBar" id="sideBar">
<div class="catalogList">
<ul id="menu">
<?php
$menus=array( array( 'name'=>'基础设置', 'iconName'=>'base', 'display'=>0, 'subs'=>array( array('name'=>'功能管理','link'=>U('Function/index',array('token'=>$token,'id'=>session('wxid'))),'new'=>0,'selectedCondition'=>array('m'=>'Function','a'=>'index')), array('name'=>'关注时回复与帮助','link'=>U('Areply/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Areply')), array('name'=>'微信－文本回复','link'=>U('Text/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Text')), array('name'=>'微信－图文回复','link'=>U('Img/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Img','a'=>'index')), array('name'=>'微信－多图文回复','link'=>U('Img/multi',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Img','a'=>'multi')), array('name'=>'微信－图文编辑器','link'=>'./wx/index.html?token='.$token,'new'=>1,'selectedCondition'=>array('m'=>'Img','a'=>'index'),'blank'=>1), array('name'=>'微信－语音回复','link'=>U('Voiceresponse/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Voiceresponse')), array('name'=>'微信－群发消息','link'=>U('Message/sendHistory',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Message')), array('name'=>'微信－模板消息','link'=>U('TemplateMsg/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'TemplateMsg')), array('name'=>'自定义LBS回复','link'=>U('Company/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Company')), array('name'=>'自定义菜单','link'=>U('Diymen/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Diymen')), array('name'=>'微信用户信息授权','link'=>U('Auth/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Auth')), array('name'=>'回答不上来的配置','link'=>U('Other/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Other')), )), array( 'name'=>'微网站', 'iconName'=>'site', 'display'=>0, 'subs'=>array( array('name'=>'首页回复配置','f'=>'Home','link'=>U('Home/set',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Home','g'=>'User','a'=>'set')), array('name'=>'分类管理','f'=>'Home','link'=>U('Classify/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Classify')), array('name'=>'模板管理','f'=>'Home','link'=>U('Tmpls/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Tmpls')), array('name'=>'文章管理','f'=>'Home','link'=>U('Img/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Img','a'=>'index')), array('name'=>'首页幻灯片','f'=>'Home','link'=>U('Flash/index',array('token'=>$token,'tip'=>1)),'new'=>0,'selectedCondition'=>array('m'=>'Flash','tip'=>1)), array('name'=>'轮播背景图','f'=>'Home','link'=>U('Flash/index',array('token'=>$token,'tip'=>2)),'new'=>1,'selectedCondition'=>array('m'=>'Flash','tip'=>2)), array('name'=>'底部导航菜单','f'=>'Home','link'=>U('Catemenu/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Catemenu')), array('name'=>'版权设置','f'=>'Home','link'=>U('Home/plugmenu',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Home','g'=>'User','a'=>'plugmenu')), array('name'=>'微场景','f'=>'Home','link'=>U('Live/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Live'),'notinpigcms'=>1), array('name'=>'在线预览','link'=>U('Yulan/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Yulan')), )), array( 'name'=>'微贺卡', 'iconName'=>'card', 'display'=>0, 'subs'=>array( array('name'=>'我的贺卡','f'=>'Card','link'=>U('Card/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Card','a'=>'index')), array('name'=>'贺卡库','f'=>'Card','link'=>U('Card/cardLibrary',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Card','a'=>'cardLibrary')), )), array( 'name'=>'PC网站[独立]', 'iconName'=>'scene', 'display'=>0, 'subs'=>array( array('name'=>'基本设置','f'=>'Web','link'=>U('Web/set',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Web','a'=>'set')), array('name'=>'选择模板','f'=>'Web','link'=>U('Web/choose_tpl',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Web','a'=>'choose_tpl')), array('name'=>'导航菜单','f'=>'Web','link'=>U('Web/nav',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Web','a'=>'nav')), array('name'=>'图集管理','f'=>'Web','link'=>U('Web/flash',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Web','a'=>'flash')), array('name'=>'新闻管理','f'=>'Web','link'=>U('Web/news',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Web','a'=>'news')), array('name'=>'产品管理','f'=>'Web','link'=>U('Web/product',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Web','a'=>'product')), array('name'=>'下载管理','f'=>'Web','link'=>U('Web/down',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Web','a'=>'down')), array('name'=>'自定义页面','f'=>'Web','link'=>U('Web/page',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Web','a'=>'page')), )), array( 'name'=>'手机站[独立]', 'iconName'=>'site', 'display'=>0, 'subs'=>array( array('name'=>'手机站配置','f'=>'Phone','link'=>U('Phone/baseSet',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Phone','a'=>'baseSet')) )), array( 'name'=>'APP云打包', 'iconName'=>'store', 'display'=>0, 'subs'=>array( array('name'=>'创建应用','f'=>'Yundabao','link'=>U('Yundabao/add',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Yundabao','a'=>'add')), array('name'=>'应用列表','f'=>'Yundabao','link'=>U('Yundabao/applist',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Yundabao','a'=>'applist')), array('name'=>'应用数据','f'=>'Yundabao','link'=>U('Yundabao/data',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Yundabao','a'=>'data')), )), array( 'iconName'=>'zhida', 'name'=>'百度直达号', 'display'=>0, 'subs'=>array( array('name'=>'对接配置','f'=>'Zhida','link'=>U('Zhida/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Zhida','a'=>'index')), )), array( 'iconName'=>'ditch', 'name'=>'高级场景', 'display'=>0, 'subs'=>array( array('name'=>'场景管理','link'=>U('Eqx/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Eqx')), array('name'=>'场景回复配置','link'=>U('Eqx/keywordlist',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Eqx')), )), array( 'name'=>'微互动', 'iconName'=>'interact', 'display'=>0, 'subs'=>array( array('name'=>'留言板','f'=>'Reply','link'=>U('Reply/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Reply')), array('name'=>'微论坛','f'=>'Forum','link'=>U('Forum/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Forum')), array('name'=>'3G图集(相册)','f'=>'Photo','link'=>U('Photo/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Photo')), array('name'=>'3G微投票','f'=>'Vote','link'=>U('Vote/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Vote')), array('name'=>'图文投票','f'=>'Voteimg','link'=>U('Voteimg/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Voteimg')), array('name'=>'新版投票','f'=>'Hvotes','link'=>U('Hvotes/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hvotes')), array('name'=>'微预约(万能表单,报名)','f'=>'Custom','link'=>U('Custom/record',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Custom')), array('name'=>'微调研','f'=>'Research','link'=>U('Research/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Research')), array('name'=>'祝福贺卡','f'=>'Greeting_card','link'=>U('Greeting_card/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Greeting_card')), array('name'=>'分享管理','f'=>'Share','link'=>U('Share/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Share')), array('name'=>'邀请函','f'=>'Invite','link'=>U('Invite/add',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Invite')), )), array( 'name'=>'行业应用', 'iconName'=>'business', 'display'=>0, 'subs'=>array( array('name'=>'微餐饮（无线打印）','f'=>'Repast','link'=>U('Repast/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Repast')), array('name'=>'微外卖[新版]','f'=>'DishOut','link'=>U('DishOut/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'DishOut'),'test'=>0), array('name'=>'楼盘房产','f'=>'Estate','link'=>U('Estate/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Estate')), array('name'=>'360°全景','f'=>'Panorama','link'=>U('Panorama/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Panorama')), array('name'=>'全民经纪人','f'=>'MicroBroker','link'=>U('MicroBroker/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'MicroBroker'),'test'=>0), array('name'=>'微婚庆（喜帖）','f'=>'Wedding','link'=>U('Wedding/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Wedding')), array('name'=>'微汽车','f'=>'Car','link'=>U('Car/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Car')), array('name'=>'微教育','f'=>'School','link'=>U('School/index',array('token'=>$token,'type'=>'semester')),'new'=>0,'selectedCondition'=>array('m'=>'School')), array('name'=>'微医疗','f'=>'Medical','link'=>U('Medical/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Medical'),'test'=>0), array('name'=>'酒店宾馆','f'=>'Hotels','link'=>U('Hotels/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Hotels')), array('name'=>'通用订单(酒吧KTV)','f'=>'Host','link'=>U('Host/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Host')), array('name'=>'微美容','f'=>'Beauty','link'=>U('Business/index',array('token'=>$token,'type'=>'beauty')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'beauty'),'test'=>0), array('name'=>'微健身','f'=>'Fitness','link'=>U('Business/index',array('token'=>$token,'type'=>'fitness')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'fitness'),'test'=>0,'show'=>1), array('name'=>'微政务','f'=>'Gover','link'=>U('Business/index',array('token'=>$token,'type'=>'gover')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'gover'),'test'=>0,'show'=>1), array('name'=>'微食品','f'=>'Food','link'=>U('Business/index',array('token'=>$token,'type'=>'food')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'food'),'test'=>0), array('name'=>'微旅游','f'=>'Travel','link'=>U('Business/index',array('token'=>$token,'type'=>'travel')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'travel'),'test'=>0), array('name'=>'微花店','f'=>'Flower','link'=>U('Business/index',array('token'=>$token,'type'=>'flower')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'flower'),'test'=>0), array('name'=>'微物业','f'=>'Property','link'=>U('Business/index',array('token'=>$token,'type'=>'property')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'property'),'test'=>0), array('name'=>'微KTV','f'=>'Ktv','link'=>U('Business/index',array('token'=>$token,'type'=>'ktv')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'ktv'),'test'=>0), array('name'=>'微酒吧','f'=>'Bar','link'=>U('Business/index',array('token'=>$token,'type'=>'bar')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'bar'),'test'=>0), array('name'=>'微装修','f'=>'Fitment','link'=>U('Business/index',array('token'=>$token,'type'=>'fitment')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'fitment'),'test'=>0), array('name'=>'微婚庆','f'=>'Wedding','link'=>U('Business/index',array('token'=>$token,'type'=>'wedding')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'wedding'),'test'=>0), array('name'=>'微宠物','f'=>'Affections','link'=>U('Business/index',array('token'=>$token,'type'=>'affections')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'affections'),'test'=>0), array('name'=>'微家政','f'=>'Housekeeper','link'=>U('Business/index',array('token'=>$token,'type'=>'housekeeper')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'housekeeper'),'test'=>0), array('name'=>'微租赁','f'=>'Lease','link'=>U('Business/index',array('token'=>$token,'type'=>'lease')),'new'=>0,'selectedCondition'=>array('m'=>'Business','type'=>'lease'),'test'=>0), array('name'=>'微招聘','link'=>U('Zhaopin/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Zhaopin')), )), array( 'name'=>'摇一摇.周边', 'iconName'=>'scene', 'display'=>0, 'subs'=>array( array('name'=>'设备管理','f'=>'Shakearound','link'=>U('Shakearound/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Shakearound')), array('name'=>'页面管理','f'=>'Shakearound','link'=>U('Shakearound/page_index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Shakearound','a'=>'page_index')), )), array( 'name'=>'微现场', 'iconName'=>'scene', 'display'=>0, 'subs'=>array( array('name'=>'微信签到','f'=>'Signin','link'=>U('Signin/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Signin')), array('name'=>'摇一摇','f'=>'Shake','link'=>U('Shake/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Shake')), array('name'=>'微信墙','f'=>'Wall','link'=>U('Wall/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Wall')), array('name'=>'现场活动','f'=>'Scene','link'=>U('Scene/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Scene')), )), array( 'name'=>'电商系统', 'iconName'=>'store', 'display'=>0, 'subs'=>array( array('name'=>'在线支付设置','link'=>U('Alipay_config/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Alipay_config')), array('name'=>'微信支付证书','link'=>U('Alipay_cert/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Alipay_cert')), array('name'=>'平台支付对帐','link'=>U('Platform/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Platform')), array('name'=>'微信团购系统','f'=>'Groupon','link'=>U('Groupon/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Groupon')), array('name'=>'微信商城系统','f'=>'Store','link'=>U('Store/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Store')), array('name'=>'商城分佣管理','f'=>'Store','link'=>U('Store/twitter',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Store','a'=>'twitter')), array('name'=>'微信分销系统','f'=>'Distribution','link'=>U('Distribution/statistics',array('token'=>$token)),'new'=>1,'test'=>1,'selectedCondition'=>array('m'=>'Distribution')), array('name'=>'微商圈','f'=>'Market','link'=>U('Market/index',array('token'=>$token)),'test'=>0,'selectedCondition'=>array('m'=>'Market')), array('name'=>'微众筹','f'=>'Crowdfunding','link'=>U('Crowdfunding/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Crowdfunding')), array('name'=>'一元夺宝','f'=>'Unitary','link'=>U('Unitary/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Unitary')), array('name'=>'微秒杀','f'=>'Seckill','link'=>U('Seckill/index',array('token'=>$token,'type'=>'seckill')),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Seckill')), array('name'=>'微信生活圈','f'=>'LivingCircle','link'=>U('LivingCircle/index',array('token'=>$token,'type'=>'LivingCircle')),'new'=>0,'test'=>1,'selectedCondition'=>array('m'=>'LivingCircle')), array('name'=>'微砍价','f'=>'Bargain','link'=>U('Bargain/index',array('token'=>$token,'type'=>'Bargain')),'new'=>1,'selectedCondition'=>array('m'=>'Bargain')), )), array( 'name'=>'微店系统', 'iconName'=>'store', 'display'=>0, 'subs'=>array( array('name'=>'微店设置','f'=>'Micrstore','link'=>U('Micrstore/index',array('token'=>$token,'infotype'=>'Micrstore')),'new'=>0,'selectedCondition'=>array('m'=>'Micrstore','a'=>'index')), array('name'=>'微店管理','f'=>'Micrstore','link'=>U('Micrstore/api',array('token'=>$token,'infotype'=>'Micrstore')),'new'=>0,'selectedCondition'=>array('m'=>'Micrstore','a'=>'api')), )), array( 'name'=>'微游戏', 'iconName'=>'game', 'display'=>0, 'subs'=>array( array('name'=>'信息设置','link'=>U('Game/config',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Game','a'=>'config')), array('name'=>'我的游戏','link'=>U('Game/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Game','a'=>'index')), array('name'=>'游戏库','link'=>U('Game/gameLibrary',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Game','a'=>'gameLibrary')), )), array( 'name'=>'微粉丝管理CRM', 'iconName'=>'crm', 'display'=>0, 'subs'=>array( array('name'=>'粉丝管理','link'=>U('Wechat_group/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wechat_group','a'=>'index')), array('name'=>'分组管理','link'=>U('Wechat_group/groups',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wechat_group','a'=>'groups')), array('name'=>'粉丝行为分析','link'=>U('Wechat_behavior/statistics',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wechat_behavior')), array('name'=>'服务窗粉丝管理','f'=>'Fuwu','link'=>U('Fuwu/index',array('token'=>$token)),'new'=>0,'test'=>0,'selectedCondition'=>array('m'=>'Fuwu')), )), array( 'name'=>'微硬件', 'iconName'=>'hardware', 'display'=>0, 'subs'=>array( array('name'=>'RippleOS设置','link'=>U('RippleOS/set',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'RippleOS','a'=>'set')), array('name'=>'无线打印机','link'=>U('Hardware/orderprint',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hardware','a'=>'orderprint')), array('name'=>'照片打印机','link'=>U('Hardware/photoprint',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hardware','a'=>'photoprint')), )), array( 'name'=>'微渠道', 'iconName'=>'ditch', 'display'=>0, 'subs'=>array( array('name'=>'渠道二维码','link'=>U('Recognition/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Recognition')), array('name'=>'DIY宣传页','link'=>U('Adma/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Adma')), )), array( 'name'=>'微客服', 'iconName'=>'service', 'display'=>0, 'subs'=>array( array('name'=>'微信人工客服','link'=>U('ServiceUser/wechatService',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'ServiceUser')), array('name'=>'网页客服管理','f'=>'Service','link'=>U('Service/servicelist',array('token'=>$token,'type'=>'setup')),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Service','type'=>'setup')), array('name'=>'聊天推广内容','f'=>'Service','link'=>U('Service/preferentiallist',array('token'=>$token,'type'=>'preferential')),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Service','type'=>'preferential')), array('name'=>'聊天个人板块','f'=>'Service','link'=>U('Service/my',array('token'=>$token,'type'=>'my')),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Service','type'=>'my')), )), array( 'name'=>'微活动', 'iconName'=>'active', 'display'=>0, 'subs'=>array( array('name'=>'微召唤','f'=>'Weizhaohuan','link'=>U('Weizhaohuan/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Weizhaohuan')), array('name'=>'分享助力','f'=>'Helping','link'=>U('Helping/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Helping')), array('name'=>'人气冲榜','f'=>'Popularity','link'=>U('Popularity/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Popularity')), array('name'=>'幸运大转盘','f'=>'Lottery','link'=>U('Lottery/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Lottery')), array('name'=>'幸运九宫格','f'=>'Jiugong','link'=>U('Jiugong/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Jiugong')), array('name'=>'优惠券','f'=>'Coupon','link'=>U('Coupon/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Coupon')), array('name'=>'刮刮卡','f'=>'Guajiang','link'=>U('Guajiang/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Guajiang')), array('name'=>'幸运水果机','f'=>'LuckyFruit','link'=>U('LuckyFruit/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'LuckyFruit')), array('name'=>'砸金蛋','f'=>'GoldenEgg','link'=>U('GoldenEgg/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'GoldenEgg')), array('name'=>'走鹊桥','f'=>'AppleGame','link'=>U('AppleGame/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'AppleGame')), array('name'=>'摁死小情侣','f'=>'Lovers','link'=>U('Lovers/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Lovers')), array('name'=>'中秋吃月饼','f'=>'Autumn','link'=>U('Autumn/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Autumn')), array('name'=>'拆礼盒','f'=>'Autumns','link'=>U('Autumns/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Autumns')), array('name'=>'一战到底','f'=>'Problem','link'=>U('Problem/index',array('token'=>$token)),'new'=>0,'test'=>0,'selectedCondition'=>array('m'=>'Problem')), array('name'=>'微信红包','f'=>'Red_packet','link'=>U('Red_packet/index',array('token'=>$token)),'new'=>0,'test'=>0,'selectedCondition'=>array('m'=>'Red_packet')), array('name'=>'惩罚台','f'=>'Punish','link'=>U('Punish/index',array('token'=>$token)),'new'=>0,'test'=>0,'selectedCondition'=>array('m'=>'Punish')), array('name'=>'趣味测试','f'=>'Test','link'=>U('Test/index',array('token'=>$token,'type'=>'Test')),'new'=>0,'test'=>1,'selectedCondition'=>array('m'=>'Test')), array('name'=>'微信合体红包','f'=>'Hongbao','link'=>U('Hongbao/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Hongbao')), )), array( 'name'=>'会员卡', 'iconName'=>'card', 'display'=>0, 'subs'=>array( array('name'=>'会员卡','f'=>'Member_card','link'=>U('Member_card/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card'),'exceptCondition'=>array('a'=>'replyInfoSet,focus,custom,center,member')), array('name'=>'会员中心','f'=>'Member_card','link'=>U('Member_card/center',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card','a'=>'center')), array('name'=>'回复设置','f'=>'Member_card','link'=>U('Member_card/replyInfoSet',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card','a'=>'replyInfoSet')), array('name'=>'幻灯片广告','f'=>'Member_card','link'=>U('Member_card/focus',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card','a'=>'focus')), array('name'=>'自定义输入项','f'=>'Member_card','link'=>U('Member_card/custom',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card','a'=>'custom')), )), array( 'name'=>'数据魔方', 'iconName'=>'datacube', 'display'=>0, 'subs'=>array( array('name'=>'请求数详情','link'=>U('Requerydata/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Requerydata')), array('name'=>'粉丝行为分析','link'=>U('Wechat_behavior/statistics',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wechat_behavior','a'=>'statistics')), )), array( 'name'=>'二次开发', 'iconName'=>'secondary', 'display'=>0, 'subs'=>array( array('name'=>'融合第三方','link'=>U('Api/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Api')), )), ); ?>
<?php
 foreach ($menus as $mk => $mv){ if(C('router_key') != ''&&$mv['iconName']=='hardware'){ unset($mv['subs'][0]); } foreach ($mv['subs'] as $mvk => $mvv){ if ($mvv['f'] != NULL && !in_array($mvv['f'], $Allfunc)) { unset($menus[$mk]['subs'][$mvk]); } if ($mvv['selectedCondition']['m'] == 'Web') { $path=str_replace($_SERVER['SCRIPT_NAME'],'',dirname($_SERVER['SCRIPT_FILENAME'])).DIRECTORY_SEPARATOR.'PigCms'.DIRECTORY_SEPARATOR.'Lib'.DIRECTORY_SEPARATOR.'Action'.DIRECTORY_SEPARATOR.'Web'.DIRECTORY_SEPARATOR; if (!file_exists($path.'Web_indexAction.class.php')) { unset($menus[$mk]); } } if(in_array($mvv['selectedCondition']['m'],$not_exist) || in_array($mvv['f'],$not_exist)){ if($mvv['selectedCondition']['m'] == 'Home'){ unset($menus[$mk]); }else{ unset($menus[$mk]['subs'][$mvk]); } }elseif($mvv['selectedCondition']['m'] == 'Business'){ if($mvv['selectedCondition']['type'] == 'wedding') $mvv['selectedCondition']['type'] = 'buswedd'; if(in_array(ucfirst($mvv['selectedCondition']['type']),$not_exist)){ unset($menus[$mk]['subs'][$mvk]); } } if($menus[$mk]['subs'] == NULL){ unset($menus[$mk]); } } } $i=0; $parms=$_SERVER['QUERY_STRING']; $parms1=explode('&',$parms); $parmsArr=array(); if ($parms1){ foreach ($parms1 as $p){ $parms2=explode('=',$p); $parmsArr[$parms2[0]]=$parms2[1]; } } $subMenus=array(); $t=0; $currentMenuID=0; $currentParentMenuID=0; foreach ($menus as $m){ $loopContinue=1; if ($m['subs']){ $st=0; foreach ($m['subs'] as $s){ $includeArr=1; if ($s['selectedCondition']){ foreach ($s['selectedCondition'] as $condition){ if (!in_array($condition,$parmsArr)){ $includeArr=0; break; } } } if ($includeArr){ if ($s['exceptCondition']){ foreach ($s['exceptCondition'] as $epkey=>$eptCondition){ if ($epkey=='a'){ $parm_a_values=explode(',',$eptCondition); if ($parm_a_values){ if (in_array($parmsArr['a'],$parm_a_values)){ $includeArr=0; break; } } }else { if (in_array($eptCondition,$parmsArr)){ $includeArr=0; break; } } } } } if ($includeArr){ $currentMenuID=$st; $currentParentMenuID=$t; $loopContinue=0; break; } $st++; } if ($loopContinue==0){ break; } } $t++; } foreach ($menus as $m){ $displayStr=''; if ($currentParentMenuID!=0||0!=$currentMenuID){ $m['display']=0; } if (!$m['display']){ $displayStr=' style="display:none"'; } if ($currentParentMenuID==$i){ $displayStr=''; } $aClassStr=''; if ($displayStr){ $aClassStr=' nav-header-current'; } if($i == 0){ echo '<a class="nav-header'.$aClassStr.'" style="border-top:none !important;"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>'; }else{ echo '<a class="nav-header'.$aClassStr.'"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>'; } if ($m['subs']){ $j=0; foreach ($m['subs'] as $s){ $selectedClassStr='subCatalogList'; if ($currentParentMenuID==$i&&$j==$currentMenuID){ $selectedClassStr='selected'; } $newStr=''; if ($s['test']){ $newStr.='<span class="test"></span>'; }else { if ($s['new']){ $newStr.='<span class="new"></span>'; } } if ($s['name']!='微信墙'&&$s['name']!='摇一摇'&&$s['name']!='现场活动'){ $target=''; if ($s['blank']){ $target=' target="_blank"'; } if ($s['notinpigcms']&&C('server_topdomain')=='pigcms.cn'){ }else { echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'"'.$target.'>'.$s['name'].'</a>'.$newStr.'</li>'; } }else { switch ($s['name']){ case '微信墙': case '摇一摇': case '现场活动': $path=str_replace($_SERVER['SCRIPT_NAME'],'',dirname($_SERVER['SCRIPT_FILENAME'])).DIRECTORY_SEPARATOR.'PigCms'.DIRECTORY_SEPARATOR.'Lib'.DIRECTORY_SEPARATOR.'Action'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR; if (file_exists($path.'WallAction.class.php')&&file_exists($path.'ShakeAction.class.php')){ echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'">'.$s['name'].'</a>'.$newStr.'</li>'; } break; } } if ($s['name']=='模板管理'&&is_dir($_SERVER['DOCUMENT_ROOT'].'/cms')&&!strpos($_SERVER['HTTP_HOST'],'pigcms')){ echo '<li class="subCatalogList"> <a href="/cms/manage/index.php">高级模板</a><span class="new"></span></li>'; } $j++; } } echo '</ul>'; $i++; } ?>

<div style="clear:both"></div>
</ul>
</div>
</div>
<?php
} ?>
<script type="text/javascript">

	$(document).ready(function(){
		$(".nav-header").mouseover(function(){
			$(this).addClass('navHover');
		}).mouseout(function(){
			$(this).removeClass('navHover');
		}).click(function(){
			$(this).toggleClass('nav-header-current');
			$(this).next('.ckit').slideToggle();
		})
	});

</script>
<script src="./tpl/User/default/common/js/date/WdatePicker.js"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>

 <script src="/tpl/static/upyun.js"></script>
<div class="content">
<style>
.msgWrap .control-group {
margin-bottom: 20px;
}
.msgWrap .control-label {
text-align: left;
width: 140px;
font-weight: bold;
padding-top: 5px;
float: left;
display: block;
margin-bottom: 5px;
}
.msgWrap .controls {
margin-left: 160px;
}
.msgWrap .form-actions {
padding: 19px 20px 20px 160px;
margin-top: 20px;
}
.span4, .span1, .option, .valid, .input-large{
	background: url(../images/px.png) repeat-x scroll 0 0 #FFFFFF;
    border-color: #848484 #E0E0E0 #E0E0E0 #848484;
    border-style: solid;
    border-width: 1px;
	border-radius: 2px 2px 2px 2px;
	padding:5px;
	width: 210px;
}
</style>
<script>
function setlatlng(longitude,latitude){
	art.dialog.data('longitude', longitude);
	art.dialog.data('latitude', latitude);
	art.dialog.open('<?php echo U('Map/setLatLng');?>',{lock:false,title:'设置经纬度',width:600,height:400,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
<div class="cLineB">
  <h4>新建微喜帖</h4><a href="<?php echo U('Wedding/index');?>" class="right btnGrayS vm" style="margin-top:-27px">返回</a>
 </div> 
  <div class="msgWrap bgfc">
  <form action="" method="post" class="form-horizontal form-validate" novalidate="novalidate">
	<div class="control-group">
		<label for="title" class="control-label">喜帖标题：</label>
		<div class="controls">
			<input type="text" name="title" id="title" maxlength="10" class="span4" value="<?php echo ($wedding["title"]); ?>" data-rule-required="true"><span class="maroon">*</span><span class="help-inline">喜帖标题限制在十个字以内</span>
		</div>
	</div>
	<div class="control-group">
		<label for="keyword" class="control-label">触发关键词：</label>
		<div class="controls">
			<input type="text" name="keyword" id="keyword" class="span4" data-rule-required="true" value="<?php echo ($wedding["keyword"]); ?>"><span class="maroon">*</span><span class="help-inline">只能设置一个关键字</span>
		</div>
	</div>
	<div class="control-group">
		<label for="coverurl" class="control-label">喜帖封面：</label>
		<div class="controls">
			<img class="thumb_img" id="suicai1_src" src="<?php if($wedding['coverurl'] != false): echo ($wedding["coverurl"]); else: ?>http://bcs.duapp.com/baeimgs/Tnh1ROgm93.png<?php endif; ?>" style="max-height: 100px;">
			<input id="suicai1" type="text" name="coverurl" class="px hide" onchange="changpic(this,1)" value="<?php if($wedding['coverurl'] != false): echo ($wedding["coverurl"]); else: ?>http://bcs.duapp.com/baeimgs/Tnh1ROgm93.png<?php endif; ?>">
			<span class="help-inline">
				<a href="javascript:void(0)" onclick="upyunPicUpload('suicai1',700,420,'<?php echo ($token); ?>')" class="btnGrayS vm">上传</a>
				<a href="###" onclick="viewImg('suicai1')" class="btnGrayS vm">预览</a>
			</span>
			<span class="help-inline"><span class="maroon">*</span>封面默认大小720*400</span>
		</div>
	</div>
	<div class="control-group">
		<label for="openpic" class="control-label">开场动画：</label>
		<div class="controls">
			<img class="thumb_img" id="suicaipic2_src" src="<?php if($wedding['openpic'] != false): echo ($wedding["openpic"]); else: ?>http://bcs.duapp.com/baeimgs/jNuxaj1cAj.jpg<?php endif; ?>" style="width: 180px; height: 180px;">
			<input id="suicaipic2" type="text" name="openpic" class="px hide" onchange="changpic(this,2)" value="<?php if($wedding['openpic'] != false): echo ($wedding["openpic"]); else: ?>http://bcs.duapp.com/baeimgs/jNuxaj1cAj.jpg<?php endif; ?>">
			<span class="help-inline">
						<a href="javascript:void(0)" onclick="upyunPicUpload('suicaipic2',700,420,'<?php echo ($token); ?>')" class="btnGrayS vm">上传</a>
				<a href="###" onclick="viewImg('suicaipic2')" class="btnGrayS vm">预览</a>
			</span>
			<span class="help-inline"> 上传400*400左右的新郎新娘合影图,用于喜帖打开时的动画中,图片大小不超过300K </span>
			<span class="red">不想要开场动画图片地址留空即可!</span>
		</div>
	</div>
	<div class="control-group">
		<label for="picurl" class="control-label">缩略图：</label>
		<div class="controls">
			<img class="thumb_img" id="suicai3_src" src="<?php if($wedding['openpic'] != false): echo ($wedding["openpic"]); else: ?>http://bcs.duapp.com/baeimgs/2cDQtFbl75.jpg<?php endif; ?>" style="width: 40px; height: 40px;">
			<input id="suicai3" type="text" name="picurl" class="px hide" onchange="changpic(this,3)" value="<?php if($wedding['openpic'] != false): echo ($wedding["openpic"]); else: ?>http://bcs.duapp.com/baeimgs/2cDQtFbl75.jpg<?php endif; ?>">
			<span class="help-inline">
				<a href="javascript:void(0)" onclick="upyunPicUpload('suicai3',700,420,'<?php echo ($token); ?>')" class="btnGrayS vm">上传</a>
				<a href="###" onclick="viewImg('suicai3')" class="btnGrayS vm">预览</a>
			</span><span class="help-inline"><span class="maroon">*</span>默认40x40,显示在喜帖主页</span>
		</div>
	</div>
		<div class="control-group">
		<label for="picurl" class="control-label">相册选择：</label>
		<div class="controls">
			<select name="pid">
				<option value="">请选择相册名称</option>
				<?php if(is_array($photo)): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($photo["id"]); ?>" <?php if($photo['id'] == $wedding['pid']): ?>selected="selected"<?php endif; ?>><?php echo ($photo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<span class="help-inline">
			</span>
			<span class="help-inline">
				<span class="maroon">*</span>
				<a target="ddd" class="btnGrayS vm" href="<?php echo U('Photo/add');?>">创建相册</a>  如果没有请创建
			</span>
		</div>
	</div>
	<div class="control-group">
		<label for="address" class="control-label">新郎名字：</label>
		<div class="controls">
			<input type="text" name="man" id="man" class="span4" value="<?php echo ($wedding["man"]); ?>" data-rule-required="true">
			<span class="maroon">*</span>
		</div>
	</div>
	<div class="control-group">
		<label for="woman" class="control-label">新娘名字：</label>
		<div class="controls">
			<input type="text" name="woman" id="woman" class="span4" value="<?php echo ($wedding["woman"]); ?>" data-rule-required="true">
			<span class="maroon">*</span>
		</div> 
	</div>
	<div class="control-group">
		<label for="typename" class="control-label"></label>
		<div class="controls">
			<label class="radio inline">
				<input type="radio" name="who_first" checked="checked" value="1"><span class="help-inline">新郎名字在前</span>
			</label>
			<label class="radio inline">
				<input type="radio" name="who_first" value="2"><span class="help-inline">新娘名字在前</span>
			</label>
		</div>
	</div>
	<div class="control-group">
		<label for="tel" class="control-label">联系电话：</label>
		<div class="controls">
			<input type="text" name="phone" id="phone" class="span4" value="<?php echo ($wedding["phone"]); ?>" data-rule-required="true" data-rule-phone="true"><span class="maroon">*</span><span class="help-inline">如0551-63474223 </span>
		</div>
	</div>
	<div class="control-group">
		<label for="time" class="control-label">婚宴日期：</label>
		<div class="controls"> 
			<div class="input-prepend">
				<span class="add-on">
					<i class="icon-calendar"></i>
				</span>
				<input type="input" class="px" onClick="WdatePicker()"  value="<?php if($wedding['time'] != false): echo (date('Y-m-d',$wedding["time"])); endif; ?>" name="time"> <span class="maroon">*</span> 
			</div>
		</div>
	</div>
	<div class="control-group">
		<label for="place" class="control-label">宴席地址：</label>
		<div class="controls"> 
			<div class="input-prepend">
				<input type="text" name="place" class="span4" value="<?php echo ($wedding["place"]); ?>" onchange="loadmap()" id="suggestId" data-rule-required="true"/> <span class="maroon">*</span> 
			</div>
		</div>
	</div>
	<div class="control-group">
		 <label class="control-label" for="suggestId">经纬地址</label>
		 <div class="controls">
			<div id="r-result">
				 <input type="input" class="px" id="longitude" value="<?php echo ($wedding["lng"]); ?>"  name="lng" style="width:80px;">
				 <input type="input" class="px" id="latitude" value="<?php echo ($wedding["lat"]); ?>"  name="lat" style="width:80px;">  <a href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())">在地图中查看/设置</a>
				 <input  type="hidden"  name="city" class="px" id="city" size="20" value="" /> 
			 </div>
			 <div id="searchResultPanel"></div>
		 </div>
    </div>
	<div class="control-group">
		<label for="video" class="control-label">喜帖视频：</label>
		<div class="controls"> 
			 <input type="text" name="video" id="video" class="span4" style="width:480px" value="<?php echo ($wedding["video"]); ?>"><p>支持优酷视频地址如;http://v.youku.com/v_show/id_XNjI4ODk5NDQ4.html <br> 腾讯flash视频地址：如http://static.video.qq.com/TPout.swf?vid=v0119s27wd5&amp;auto=0 <br> 也支持mp4和ogg 格式地址 http://www.w3school.com.cn/example/html5/mov_bbb.mp4 </p>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="mp3url">背景音乐</label>
		<div class="controls">
			<input type="text" class="px" name="mp3url" value="<?php echo ($wedding["mp3url"]); ?>" id="mp3url" style="width:200px;float:left" onchange="$('#plmp3').attr('href',this.value"> <a href="###" onclick="upyunPicUpload('mp3url',0,0,'<?php echo ($token); ?>')" class="a_upload">上传</a>&nbsp;<a href="###" onclick="chooseFile('mp3url','music')" class="a_upload">选择</a>
		</div>
	</div>
	<div class="control-group">
		<label for="tel" class="control-label">密码：</label>
		<div class="controls">
			<input type="text" name="passowrd" id="passowrd" class="span4" value="<?php echo ($wedding["passowrd"]); ?>" data-rule-required="true"><span class="maroon">*</span><span class="help-inline">设置微信上查看来宾名单的验证密码</span>
		</div>
	</div>
	<div class="control-group">
		<label for="tel" class="control-label">想要给朋友说的话：</label>
		<div class="controls">
			<textarea rows="5" name="word" id="word" class="px" data-rule-required="true" data-rule-maxlength="200" style=" width:450px; height:60px"><?php if($wedding['word'] != false): echo ($wedding["word"]); else: ?>亲爱的朋友，我要结婚了，希望能在我的婚礼上得到你的祝福，并祝愿你也幸福.<?php endif; ?></textarea>
			<span class="maroon">*</span><span class="help-inline">喜帖文字限制在200字以内</span>
		</div>
	</div>
	<div class="control-group">
		<label for="qr_code" class="control-label">二维码图片地址：</label>
		<div class="controls">
			<input id="suicai6" type="text" name="qr_code" class="span4" value="<?php echo ($wedding["qr_code"]); ?>">
			<span class="help-inline">
				<a href="javascript:void(0)" onclick="upyunPicUpload('suicai6',700,420,'<?php echo ($token); ?>')" class="btnGrayS vm">上传</a>
				<a href="###" onclick="viewImg('suicai6')" class="btnGrayS vm">预览</a>
			</span>
			<span class="help-inline">
			<span class="maroon">*</span>默认100x100,显示在喜帖底部</span>
		</div>
	</div>
	<div class="control-group">
		<label for="copr" class="control-label">底部版权：</label>
		<div class="controls">
		<textarea name="copyrite" id="copyrite" class="px" rows="5" style="width:450px; height:60px"><?php echo ($wedding["copyrite"]); ?></textarea>
		</div>
	</div>
   <div class="form-actions">
			<button id="bsubmit" type="submit" data-loading-text="提交中..." class="btnGreen">保存</button>　<button type="button" class="btnGray vm">取消</button>
		</div>
</form>
  </div> 
 
  
        </div>
		
</div>
</div>
</div>

<style>
.IndexFoot {
	BACKGROUND-COLOR: #333; WIDTH: 100%; HEIGHT: 39px
}
.foot{ width:988px; margin:0px auto; font-size:12px; line-height:39px;}
.foot .foot_page{ float:left; width:600px;color:white;}
.foot .foot_page a{ color:white; text-decoration:none;}
#copyright{ float:right; width:380px; text-align:right; font-size:12px; color:#FFF;}
</style>
<div class="IndexFoot" style="height:120px;clear:both">
<div class="foot" style="padding-top:20px;">
<div class="foot_page" >
<a href="<?php echo ($f_siteUrl); ?>"><?php echo ($f_siteName); ?>,微信公众平台营销</a><br/>
帮助您快速搭建属于自己的营销平台,构建自己的客户群体。
</div>
<div id="copyright" style="color:white;">
	<?php echo ($f_siteName); ?>(c)版权所有 <a href="http://www.miibeian.gov.cn" target="_blank" style="color:white"><?php echo C('ipc');?></a><br/>
	技术支持：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($f_qq); ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo ($f_qq); ?>:51" alt="联系我吧" title="联系我吧"/></a>

</div>
    </div>
</div>
<!-- 帮助悬浮开始 -->
<?php $data_g=GROUP_NAME; $textHelp=1; if (C('server_topdomain')=='pigcms.cn'){ $textHelp=0; }else{ $users=M('Users')->where(array('id'=>$_SESSION['uid']))->find(); if($users['sysuser']){ $textHelp=0; }else{ if(C('close_help')){ $data_g='notingh'; } } } $data = array( 'key' => C('server_key'), 'domain' => C('server_topdomain'), 'is_text' => $textHelp, 'data_g' => $data_g, 'data_m' => MODULE_NAME, 'data_a' => ACTION_NAME ); if(function_exists('curl_init')){ $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, 'http://up.pigcms.cn/oa/admin.php?m=help&c=view&a=get_list&'.http_build_query($data)); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_HEADER, 0); $content = curl_exec($ch);curl_close($ch); }else{ $content = file_get_contents('http://up.pigcms.cn/oa/admin.php?m=help&c=view&a=get_list&'.http_build_query($data)); } $content = json_decode($content,true); ?>
<?php if(!empty($content)): ?><link href="<?php echo ($staticPath); ?>/tpl/static/help_xuanfu/css/zuoce.css" type="text/css" rel="stylesheet"/>
	<div class="zuoce zuoce_clear">
		<div id="Layer1">
			<a href="javascript:"><img src="<?php echo ($staticPath); ?>/tpl/static/help_xuanfu/images/ou_03.png"/></a>
		</div>
		<div id="Layer2" style="display:none;">
			<p class="xiangGuan zuoce_clear">相关帮助</p>
			<?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><p class="lianjie zuoce_clear"><a href="javascript:openwin('/index.php?g=User&m=Index&a=help&helpParm=/oa/admin_help_<?php echo ($list['id']); ?>.html',768,960)" <?php if($list['is_video'] == 1): ?>class="video"<?php else: ?>class="writing"<?php endif; ?>><?php echo ($list["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
			<!--p class="anNiuo clear"><a href="#">进入帮助中心</a></p-->
			<p class="anNiut zuoce_clear"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes" target="_blank">在线客服</a></p>
		</div>
	</div>
	<script type="text/javascript">
		window.onload = function(){
			var oDiv1 = document.getElementById('Layer1');
			var oDiv2 = document.getElementById('Layer2');
			oDiv1.onclick = function(){
				oDiv2.style.display = oDiv2.style.display == 'block' ? 'none' : 'block';
			}
		}
		function openwin(url,iHeight,iWidth){
			var iTop = (window.screen.availHeight-30-iHeight)/2,iLeft = (window.screen.availWidth-10-iWidth)/2;
			window.open(url, "newwindow", "height="+iHeight+", width="+iWidth+", toolbar=no, menubar=no,top="+iTop+",left="+iLeft+",scrollbars=yes, resizable=no, location=no, status=no");
		}
	</script><?php endif; ?>
<!-- 帮助悬浮结束 -->
<div style="display:none">
<?php echo ($alert); ?> 
<?php echo base64_decode(C('countsz'));?>
<!-- <script src="http://s15.cnzz.com/stat.php?id=5524076&web_id=5524076" language="JavaScript"></script>
 --></div>

</body>

<?php if(MODULE_NAME == 'Function' && ACTION_NAME == 'welcome'){ ?>
<script src="<?php echo ($staticPath); ?>/tpl/static/myChart/js/echarts-plain.js"></script>

<script type="text/javascript">


    var myChart = echarts.init(document.getElementById('main')); 
   

    var option = {
        title : {
            text: '<?php if($charts["ifnull"] == 1): ?>本月关注和文本请求数据统计示例图(您暂时没有数据)<?php else: ?>本月关注和文本请求数据统计<?php endif; ?>',
            x:'left'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['文本请求数','关注数'],
            x: 'right'
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: false},
                dataView : {show: false, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: false} ,
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : [<?php echo ($charts["xAxis"]); ?>]
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'文本请求数',
                type:'line',
                tiled: '总量',
                data: [<?php echo ($charts["text"]); ?>]
            },    
            {
                "name":'关注数',
                "type":'line',
                "tiled": '总量',
                data:[<?php echo ($charts["follow"]); ?>]
            }
       

        ]

    };                   

    myChart.setOption(option); 


    var myChart2 = echarts.init(document.getElementById('pieMain')); 
               
    var option2 = {
        title : {
            text: '<?php if($pie["ifnull"] == 1): ?>7日内粉丝行为分析示例图(您暂时没有数据)<?php else: ?>7日内粉丝行为分析<?php endif; ?>',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : [
            {
                name:'粉丝行为统计',
                type:'pie',
                radius : ['50%', '70%'],
                itemStyle : {
                    normal : {
                        label : {
                            show : false
                        },
                        labelLine : {
                            show : false
                        }
                    },
                    emphasis : {
                        label : {
                            show : true,
                            position : 'center',
                            textStyle : {
                                fontSize : '18',
                                fontWeight : 'bold'
                            }
                        }
                    }
                },
                data:[ 
                    <?php echo ($pie["series"]); ?>
                
                ]
            }
        ]
    };
     myChart2.setOption(option2,true); 


    var myChart3 = echarts.init(document.getElementById('pieMain2')); 
    var option3 = {
        title : {
            text: '<?php if($sex_series["ifnull"] == 1): ?>会员性别统计示例图(您暂时没有数据)<?php else: ?>会员性别统计<?php endif; ?>',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : [
            {
                name:'会员性别统计',
                type:'pie',
                radius : ['50%', '70%'],
                itemStyle : {
                    normal : {
                        label : {
                            show : false
                        },
                        labelLine : {
                            show : false
                        }
                    },
                    emphasis : {
                        label : {
                            show : true,
                            position : 'center',
                            textStyle : {
                                fontSize : '18',
                                fontWeight : 'bold'
                            }
                        }
                    }
                },
                data:[
                  <?php echo ($sex_series['series']); ?>
                ]
            }
        ]
    };                     

  myChart3.setOption(option3,true); 



    </script>
<?php } ?>
</html>