<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<title><?php echo ($info["title"]); ?></title>
<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/base.css">
<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/zAlert.css">

<script type="text/javascript" src="/tpl/static/wall/js/jquery-2.0.3.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/tpl/static/wall/js/zAlert.js" charset="utf-8"></script>
</head>

<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/screen_shake.css">
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>


<body class="FUN WALL" style="background-image:url(<?php echo ($info["background"]); ?>);" >
<div class="Panel Top" style="top: 0px;">
    <?php if($info['logo'] != ''): ?><img class="activity_logo" src="<?php echo ($info["logo"]); ?>"><?php endif; ?>
    <div class="top_title" style="font-size: 30px">
        <div>欢迎您参加-<?php echo ($info["title"]); ?></div>    
    </div>
    <?php if($info["qrcode"] != ''): ?><img class="mp_account_codeimage" src="<?php echo ($info["qrcode"]); ?>"><?php endif; ?>
</div>
<audio autoplay src="<?php echo ($info["backgroundmusic"]); ?>" loop></audio>

<!--<audio id="Audio_Player" src="<?php echo ($info["music"]); ?>" preload="preload"></audio>-->
<div class="Panel SloganList"></div>
<div class="Panel Track" style="display: none; opacity: 1;overflow: hidden;">
    <div class="tracklist"></div>
    <div class="runlist" style="width:100%;position: absolute;overflow: visible;left:0;top:0;height:100%;"></div>
    <div class="cutdown-end"></div>
    <div class="track-tool"></div>
    <div class="track-result"></div>
</div>

<div class="round-welcome" style="display: block;">
    <div class="label top">微信扫一扫，发送<span class="activity_key"><?php echo ($info["keyword"]); ?></span>参与游戏！</div>
    <img src="<?php echo ($info["qrcode"]); ?>">
    <div class="label bottom"><span class="shake-icon shake"></span>游戏开始后不停摇动手机,已链接人数<span id="connectcount" style="color:#ff0000;">0</span>人</div>
    <div class="button-start">开始游戏</div>
    <!--<div class="button restart">重新报名</div>-->
</div>

<div class="result-layer" style="display: none;">
    <div class="result-label" style="display: none;">GAME OVER</div>
    <div class="result-cup" style="display: none;">
        <!--<span class="button nexttound">开始下一轮</span>-->
        <!--<span class="button allresult">全部排名</span>-->
        <span class="button reset" onclick="javascript:window.location.reload();">再玩一次</span>
        <span class="button result" onclick="showShake(<?php echo ($info["id"]); ?>)">查看结果</span>  
	</div>
</div>

<div class="cutdown-start"><?php echo ($info["starttime"]); ?></div>

<div class="loginform">
    <div class="activity_title">微现场体验</div>
    <div><input id="password" class="password" placeholder="请输入微现场的管理密码" type="password"></div>
    <div class="submitline">
        <button class="button-login">开启</button>
    </div>
</div>
<div class="loader" style="display: none;">
    <div class="icon"></div>
</div>

<script>
/*赛道尺寸*/
var id=<?php echo ($info["id"]); ?>, diff = <?php echo ($info["shownum"]); ?> ,starttime = <?php echo ($info["starttime"]); ?>;

var showtime=<?php echo ($info["showtime"]); ?>*1000;
var sceneid = '<?php echo ($sceneid); ?>';
var SLOGANS = <?php echo ($info['cheer']); ?>;
function showShake(id){
    art.dialog.open('<?php echo U('Scene/show_shake',array('token'=>$token,'sceneid'=>$sceneid));?>&id='+id,{lock:false,title:'信息详情',width:1200,height:600,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
<script type="text/javascript" src="/tpl/static/wall/js/scene_shake.js" charset="utf-8"></script>
<div class="Panel Bottom" style="bottom: 0px;">
    <div class="helperpanel pulse">
        搜索关注<span class="mp_account"><?php echo ($info["wxuser"]); ?></span><br>发送<span class="activity_key"><?php echo ($info["keyword"]); ?></span>即可参与
    </div>
    <div class="navbar">
        <!--
    <?php if($sceneid > '0'): ?><a class="navbaritem fullscreen" href="<?php echo U('Scene/index',array('token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">管理中心</div>
        </a><?php endif; ?>-->
        <a class="navbaritem fullscreen" id="fullscreen" href="javascript:void(0);">
            <div class="icon"></div>
            <div class="label">全屏</div>
        </a>
    <?php if($info['open_vote'] == '1'): ?><a class="navbaritem vote <?php if(ACTION_NAME == 'vote'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/vote',array('sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">投票</div>
        </a><?php endif; ?>
     <?php if($info['open_zzle'] == '1'): ?><a class='navbaritem pairup <?php if(ACTION_NAME == 'supperzzle'): ?>hover<?php endif; ?>' href="<?php echo U('Scene/supperzzle',array('sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">对对碰</div>
        </a><?php endif; ?>   
    <?php if($info['open_lottery'] == '1'): ?><a class="navbaritem lottery <?php if(ACTION_NAME == 'lottery'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/lottery',array('sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">抽奖</div>
        </a><?php endif; ?>   
    <?php if($info['open_shake'] != 0 or ($info['shake_id'] != 0)): ?><a class="navbaritem rocker <?php if(ACTION_NAME == 'shake'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/shake',array('id'=>$info['id'],'sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">摇一摇</div>
        </a><?php endif; ?>
    <?php if($info['open_wall'] != 0 or ($info['wall_id'] != 0)): ?><a class="navbaritem wall_pic <?php if(ACTION_NAME == 'wall_pic'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/wall_pic',array('id'=>$info['id'],'sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">图片</div>
        </a>
        <a class="navbaritem wall <?php if(ACTION_NAME == 'wall'): ?>hover<?php endif; ?>" href="<?php echo U('Scene/wall',array('id'=>$info['id'],'sceneid'=>$sceneid,'token'=>$_SESSION['token']));?>">
            <div class="icon"></div>
            <div class="label">微信上墙</div>
        </a><?php endif; ?>
    </div>    
</div>
<div id="leafContainer"></div>
    <div style="display: none;" class="bigmpcodebar">
        <div class="closebutton"></div>
        <div class="label">微信扫一扫，发送<span class="activity_key"><?php echo ($info["keyword"]); ?></span>即可参与</div>
        <img src="<?php echo ($info["qrcode"]); ?>">
    </div>
<script>

$('.mp_account_codeimage').click(function(){
    $('.bigmpcodebar').css('display','block');
});

$('.closebutton').click(function(){
    $('.bigmpcodebar').css('display','none');
});

$('#fullscreen').click(function(){
    
    if($('#fullscreen').hasClass('in')){
        exitFullscreen();
        $('#fullscreen').removeClass("in"); 
    }else{   
        fullscreen();
        $('#fullscreen').addClass("in"); 
    }
    
});

function fullscreen(){
    elem=document.body;
    if(elem.webkitRequestFullScreen){
        elem.webkitRequestFullScreen();   
    }else if(elem.mozRequestFullScreen){
        elem.mozRequestFullScreen();
    }else if(elem.requestFullScreen){
        elem.requestFullscreen();
    }else{
        //浏览器不支持全屏API或已被禁用
    }
}

function exitFullscreen(){
    var elem=document;
    if(elem.webkitCancelFullScreen){
        elem.webkitCancelFullScreen();    
    }else if(elem.mozCancelFullScreen){
        elem.mozCancelFullScreen();
    }else if(elem.cancelFullScreen){
        elem.cancelFullScreen();
    }else if(elem.exitFullscreen){
        elem.exitFullscreen();
    }else{
        //浏览器不支持全屏API或已被禁用
    }
}
</script>
</body>
</html>