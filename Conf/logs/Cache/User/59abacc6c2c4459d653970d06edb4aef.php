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

<link rel="stylesheet" href="/tpl/static/wall/css/screen_lottery_free.css">
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>

<body class="FUN WALL" style="background-image:url(<?php echo ($info["background"]); ?>);" >
<div class="Panel Top" style="top: 0px;">
    <img class="activity_logo" src="<?php if($info["logo"] == ''): ?>tpl/static/wall/images/activity_default_logo.png<?php else: echo ($info["logo"]); endif; ?>">
    <div class="top_title" style="font-size: 30px">
        <div>欢迎您参加-<?php echo ($info["title"]); ?></div>    </div>
    <?php if($info["qrcode"] != ''): ?><img class="mp_account_codeimage" src="<?php echo ($info["qrcode"]); ?>"><?php endif; ?>
</div>

<div class="Panel Lottery" style="display: block; opacity: 1;">
    <div class="lottery-left">
        <div class="lottery-title"><span class="title-label">抽奖(<b><?php echo ($users); ?></b>人参与人)</span><span class="usercount-label">未中奖(<?php echo ($nusers); ?>人)</span></div>
        <div class="lottery-run">
            <div class="user" id="header" >
                <span class="nick-name"></span>
            </div>
            <div class="control button-run" style="display: block;">开始抽奖</div>
            <div class="control button-stop" style="display: none;">停止</div><!--
            <div class="control button-nextround" style="display: none;">下一轮</div>-->
        </div>
        <div class="lottery-bottom">
            <div class="round-num">
                <div class="select-panel">奖项：
                    <select name="lottery_rank" id="prize_rank">
                      <option value="">请选择...</option>
                    <?php if(is_array($prize)): $i = 0; $__LIST__ = $prize;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prize): $mod = ($i % 2 );++$i;?><option value="<?php echo ($prize["id"]); ?>"><?php echo ($prize["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                    <div class="select-value">名额：<b id="prize_num">0</b></div>
                </div>
            </div>

            <!--
            <div class="button-reset">重新抽奖</div>-->
            <div class="button-showresult" onclick="showIntroDetail(<?php echo ($info["id"]); ?>)">查看奖品</div>
            <div class="button-reload">重新抽奖</div>
            <div class="button-save" onclick="lottery_log(<?php echo ($info["id"]); ?>)">中奖记录</div>
        </div>
    </div>

<script>
    var id = '<?php echo ($info["id"]); ?>';
    var loadTime     = 3000;
    var userinterval = '';
    var interval     = '';
    var tempData     = [];
</script>
<script type="text/javascript" src="/tpl/static/wall/js/scene_lottery.js" charset="utf-8"></script>
<script>
function showIntroDetail(id){
    art.dialog.open('<?php echo U('Scene/show_prize',array('token'=>$token));?>&id='+id,{lock:false,title:'信息详情',width:1200,height:600,yesText:'关闭',background: '#000',opacity: 0.87});
}
function lottery_log(id){
    art.dialog.open('<?php echo U('Scene/show_plog',array('token'=>$token));?>&id='+id,{lock:false,title:'信息详情',width:1200,height:600,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
    <div class="lottery-right"></div>
</div>

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