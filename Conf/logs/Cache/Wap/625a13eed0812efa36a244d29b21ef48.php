<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="format-detection" content="telephone=no">
    <meta content="telephone=no" name="format-detection">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo ($res["title"]); ?></title>

    <link type="text/css" rel="stylesheet" href="./tpl/static/tpl/cont/com/css/comstyle.css"/>
    <link type="text/css" rel="stylesheet" href="./tpl/static/tpl/cont/com/css/font-awesome.css"/>
   <link href="./tpl/static/tpl/cont/3/css/article10c.css" media="screen" rel="stylesheet" type="text/css" />
   <link href="./tpl/static/tpl/cont/3/css/topmenu.css" media="screen" rel="stylesheet" type="text/css" />
  
   <script src="./tpl/static/tpl/cont/com/js/comjs.js" type="text/javascript"></script>
   
</head> 
    <script>
window.onload = function ()
{
var oWin = document.getElementById("win");
var oLay = document.getElementById("overlay");	
var oBtn = document.getElementById("popmenu");
var oClose = document.getElementById("close");
oBtn.onclick = function ()
{
oLay.style.display = "block";
oWin.style.display = "block"	
};
oLay.onclick = function ()
{
oLay.style.display = "none";
oWin.style.display = "none"	
}
};

</script>

<body>

<!---/*顶部菜单开始*/-->
  <div id="ui-header">
<div class="fixed">
<a class="ui-title" id="popmenu">分类</a>
<a class="ui-btn-left_pre" href="javascript:history.go(-1)"></a>
<a class="ui-btn-right_home" href="<?php echo U('Index/index',array('token'=>$tpl['token']));?>"></a>
</div>
</div>
<div id="overlay"></div>
<div id="win">
<ul class="dropdown"> 
<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/lists',array('token'=>$vo['token'],'classid'=>$vo['id']));?>"><span><?php echo ($vo["name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
 	
<div class="clr"></div>
</ul>
</div>  
<br>
<br>
<br>
<!---/*顶部菜单结束*/-->

<div class="html">
      <div class="stage" id="stage">
        <section id="sec-index">
          
          <div class="body">
            


<div class="article ckeditor_content" id="article">

  <div class="hd">
    <h1><?php echo ($res["title"]); ?></h1>
    <small><?php echo (date("Y-m-d",$res["uptatetime"])); ?> 
</small>&nbsp;&nbsp;&nbsp;<a href="./Conf/gzh.php?gzh=<?php echo ($tpl["weixin"]); ?>&gzhurl=<?php echo ($gzhurl["gzhurl"]); ?>"><?php echo ($tpl["wxname"]); ?></a> &nbsp;&nbsp;人气：<?php echo ($res["click"]); ?>
<div class="showpictop"> <img src="./tpl/static/tpl/cont/3/css/img/ABOUT.gif" width="560" height="136" /></div> 
<?php if(($res["showpic"]) == "1"): ?><div class="showpic"><img src="<?php echo ($res["pic"]); ?>" /></div><?php endif; ?>
  </div>

  <div class="bd">

    
<div class="text" id="content">
<?php echo (htmlspecialchars_decode($res["info"])); ?>
</div>
  </div>


</div>

<script>
$(function(){
  $(".ckeditor_content img").css({"height":"auto","width":"auto","max-width":"100%"});
});
</script>

          </div>
        </section>


            <section class="mod-share share-1">
        <a class="share-btn" onclick="showPop('#pop-share')"><span class="ico-share">发送给朋友</span></a>
        <a class="share-btn" onclick="showPop('#pop-share')"><span class="ico-pyq">分享到朋友圈</span></a>
    </section>

      </div><!--.stage end-->
    </div><!--.html end-->


    <div class="mod-pop" id="pop-share" onclick="hidePop('#pop-share')"><span class="text-share"></span></div>
 <div style="display:none"><?php echo (htmlspecialchars_decode($res["tongji"])); ?></div>

  <div class="copyright">
<?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
<?php else: ?>
<?php echo ($siteCopyright); endif; ?>
</div> 
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<?php if($radiogroup > 8): ?><br>
<br><?php endif; ?>
<script>
function displayit(n){
	for(i=0;i<4;i++){
		if(i==n){
			var id='menu_list'+n;
			if(document.getElementById(id).style.display=='none'){
				document.getElementById(id).style.display='';
				document.getElementById("plug-wrap").style.display='';
			}else{
				document.getElementById(id).style.display='none';
				document.getElementById("plug-wrap").style.display='none';
			}
		}else{
			if($('#menu_list'+i)){
				$('#menu_list'+i).css('display','none');
			}
		}
	}
}
function closeall(){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;
	for(i=0;i<count;i++){
		document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
	}
	document.getElementById("plug-wrap").style.display='none';
}

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script> 
<!-- share -->

		<script type="text/javascript">

			window.shareData = {  
				"moduleName":"Img",
				"moduleID": '<?php echo (intval($_GET["id"])); ?>',
				"imgUrl": "<?php echo ($res["pic"]); ?>", 
				"timeLineLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid'],'id'=>intval($_GET['id'])));?>",
				"sendFriendLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid'],'id'=>intval($_GET['id'])));?>",
				"weiboLink": "<?php echo ($f_siteUrl); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid'],'id'=>intval($_GET['id'])));?>",
				"tTitle": "<?php echo ($res["title"]); ?>-<?php echo ($tpl["wxname"]); ?>",
				"tContent": "<?php echo (str_replace('"','',str_replace("\r\n",' ',mb_substr(trim(strip_tags(htmlspecialchars_decode($res["text"]))),0,30,'utf-8')))); ?>"
			};
		</script>	

<?php echo ($shareScript); ?>
  </body>
</html>