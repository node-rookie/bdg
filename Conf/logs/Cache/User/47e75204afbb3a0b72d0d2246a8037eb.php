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

<link rel="stylesheet" type="text/css" href="/tpl/static/wall/css/screen_supperzzle.css">
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>


<body class="sameRound" rotate_id="58">
<div class="Panel Top" style="top: 0px;">
    <img class="activity_logo" src="<?php echo ($info["logo"]); ?>">
    <div class="top_title" style="font-size: 30px">
        <div>欢迎您参加-<?php echo ($info["title"]); ?></div>    </div>
    <?php if($info["qrcode"] != ''): ?><img class="mp_account_codeimage" src="<?php echo ($info["qrcode"]); ?>"><?php endif; ?>
</div>


<div class="Panel Pairup" style="display: block; opacity: 1;">
	<div class="pLeft">
		<div class="pairup-title">
			<h3>缘份对对碰</h3>
			<span>男:<em class="m">0</em>人,女:<em class="w">0</em>人</span>
		</div>
		<div class="pairup-pic">
			<span class="nan"></span>
			<span class="nv"></span>
		</div>
		<div class="pairup-btn" style="display: block;">开始对对碰</div>
        <div class="buttons">
        	<!--
            <div class="restart">重新报名</div>
            <span class="replay">重新配对</span>
            <div class="restart">开始报名</div>-->
            <div class="button-showresult" id="replay">重新配对</div>
            <span class="save-result" onClick="supperzzle_log(<?php echo ($info["id"]); ?>)">中奖记录</span>
        </div>
	</div>
	<div class="pRight">
		<div class="result-title">
			<h3>配对名单<i>(已保存)</i></h3>
			<span>配对组数<b>0</b></span>
		</div>
		<div class="result-list">
			<ul></ul>
		</div>
		<!-- <div class="result-btn">
            <span class="save-result">保存结果</span>
			<span class="replay">重新配对</span>
		</div> -->
	</div>
</div>

<script>
var loadTime 	= 1000;
var token      	= '<?php echo ($token); ?>';   
var sceneid   	= '<?php echo ($info["id"]); ?>';
var maleArr 	= [];
var femaleArr 	= [];
var maleCache 	= [];
var femaleCache = [];
var nanT 		= '';
var nvT 		= '';
var startT		= '';
var	resultIndex = 0;

function supperzzle_log(sceneid){
    art.dialog.open('<?php echo U('Scene/supperzzle_log',array('token'=>$token));?>&id='+sceneid,{lock:false,title:'信息详情',width:1200,height:600,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
<script>
window.onload=function(){

    startT = setInterval(defData,loadTime);

    $(".pairup-btn").on("click",
        function() {
            if (!$(".pairup-btn").hasClass("runed")) {
                
                startRun();
                $(".pairup-btn").hide();
                setTimeout(function() {
                    $(".pairup-btn").fadeIn()
                },
                    1000)
            } else {
                stopRun()
            }
        clearInterval(startT);
    });

    $("#replay").on("click",function() {
        window.location.reload();
    });


}

function startRun(){
    if (!$.isEmptyObject(maleCache) && !$.isEmptyObject(femaleCache)) {
                $(".star,.gxImg").remove();
                $(".pairup-btn").addClass("runed").text("停止");
                $(".result-title h3 i").hide();
                $(".save-result").removeClass("disable");
                imgChanged()
    } else {
        zAlert.Alert({
            content: "剩余玩家不足以配对！",
            callback: function() {
                zAlert.Close()
            }
        })
    }

}

function stopRun(){
    /*     
    if (a) {
        a.pause()
    }*/
    nanT ? clearInterval(nanT) : "";
    nvT ? clearInterval(nvT) : "";
    $(".pairup-btn").removeClass("runed").text("开始对对碰");
    
    star()
}
function star() {
            for (var g = 0; g < 100; g++) {
                var k = Math.floor(Math.random() * 10 + 1);
                k = k > 5 ? 1 : k;
                var f = 15;
                if (k == 3 || k == 4) {
                    f = 8
                }
                var p = Math.floor(Math.random() * f + 5);
                var d = (Math.random() > 0.5 ? 1 : -1),
                o = d * (Math.random() * 400);
                var n = (Math.random() > 0.5 ? 1 : -1),
                j = n * (Math.random() * 200);
                var m = '<div class="star t' + k + '" size="' + p + '" w="' + o + '" h="' + j + '"></div>';
                $(".pLeft").append(m)
            }
            $(".star").each(function() {
                var q = $(this).attr("size"),
                i = $(this).attr("w"),
                r = $(this).attr("h");
                $(this).width(q).height(q).animate({
                    left: "+=" + i,
                    top: "+=" + r
                },
                300)
            });
            var e = '<div class="gxImg"></div>';
            $(".pLeft").append(e);
            $(".gxImg").animate({
                width: "350px",
                height: "133px",
                "margin-left": "-175px"
            },
            400,
            function() {
                $(this).animate({
                    width: "290px",
                    height: "110px",
                    "margin-left": "-145px"
                },
                200)
            });

    getResult()
}

function getResult() {
            var e = this;
            var d = e.listItem();
            $(d).height(0).prependTo(".result-list ul").animate({
                height: "126px"
            },
            500,
            function() {
                $(this).find(".result-item").fadeIn(1000);
                var h = 0,
                g = 0;
                for (var l in e.femaleCache) {
                    h++
                }
                for (var f in e.maleCache) {
                    g++
                }
                $(".pairup-title em.w").html(h);
                $(".pairup-title em.m").html(g)
            }).find(".result-item").hide();
            $(".result-title b").text(e.resultIndex)
}

function listItem() {
            resultIndex++;
            var e = getInd("male", $(".pairup-pic .nan").attr("lid")),
                d = getInd("female", $(".pairup-pic .nv").attr("lid"));
            var f = "";

            f += '<li nInd="' + e + '" nvInd="' + d + '"><i>' + resultIndex + '</i><div class="result-item"><div class="result-item-left"><div class="nan"><img src="' + maleArr[e].portrait + '" alt="" /></div><p>' + maleArr[e].nickname + '</p></div><div class="result-item-right"><div class="nv"><img src="' + femaleArr[d].portrait + '" alt="" /></div><p>' + femaleArr[d].nickname + "</p></div></div></li>";
            addLog(maleArr[e].id,femaleArr[d].id);
            return f
}

function addLog(nid,vid){
    $.post("/index.php?g=User&m=Scene&a=add_slog", {'sceneid':sceneid,'nid':nid,'vid':vid}, function(f){});
}

function getInd(h, k) {
            var j = this;
            var f = j[h + "Arr"],
            e = f.length;
            var d = -1;
            for (var g = 0; g < e; g++) {
                if (f[g].id == k) {
                    d = g;
                    delete j[h + "Cache"][g];
                    return d
                }
            }
            return d
}



function imgChanged() {
            if (!$.isEmptyObject(maleCache)) {
                var d = 0;
                nanT = setInterval(function() {
                    var h = [];
                    for (var k in maleCache) {
                        h.push(k)
                    }
                    var g = h.length;
                    var j = h[d];
                    $(".pairup-pic .nan").css({
                        "background-image": "url(" + maleCache[j].portrait + ")"
                    }).attr("lid", maleCache[j].id);
                    d++;
                    if (d >= g) {
                        d = 0
                    }
                },
                111)
            } else {
                zAlert.Alert({
                    content: "剩余玩家不足以配对！",
                    callback: function() {
                        zAlert.Close()
                    }
                })
            }
            setTimeout(function() {},
            100);
            if (!$.isEmptyObject(femaleCache)) {
                /*
                if (a) {
                    a.play()
                }*/
                var e = 0;
                nvT = setInterval(function() {
                    var g = [];
                    for (var j in femaleCache) {
                        g.push(j)
                    }
                    var k = g.length;
                    var h = g[e];
                    $(".pairup-pic .nv").css({
                        "background-image": "url("+femaleCache[h].portrait+")"
                    }).attr("lid", femaleCache[h].id);
                    e++;
                    if (e >= k) {
                        e = 0
                    }
                },
                100)
            } else {
                zAlert.Alert({
                    content: "剩余玩家不足以配对！",
                    callback: function() {
                        zAlert.Close()
                    }
                })
            }
}





function defData(){
     $.getJSON("/index.php?g=User&m=Scene&a=defUser", {'sceneid':sceneid}, function(f){
        if(f.err == 0  && f.data){
                    if (f.data.list) {
                        var g = f.data.list;
                        if (g.male && g.male.length) {
                            maleArr = g.male;
                            for (var e = 0; e < g.male.length; e++) {
                                maleCache[e] = g.male[e]
                            }
                        }
                        if (g.female && g.female.length) {
                            femaleArr = g.female;
                            for (var e = 0; e < g.female.length; e++) {
                                femaleCache[e] = g.female[e]
                            }
                        }
                    }

                    $(".pairup-title em.w").html(f.data.femaleCount);
                    $(".pairup-title em.m").html(f.data.maleCount);

                    if ($("body").hasClass("sameRound") && f.data.filter_list) {
                        var g = f.data.filter_list;
                        if (g.female.length && g.male.length) {
                            zAlert.Confirm({
                                closed: false,
                                title: "过滤中奖用户",
                                content: "已中奖用户，是否可再参与抽奖?",
                                sureTxt: "否",
                                sureCallback: function() {
                                    for (var k = 0; k < g.male.length; k++) {
                                        for (var h in d.maleCache) {
                                            if (g.male[k].mid == d.maleCache[h].mid) {
                                                delete d.maleCache[h]
                                            }
                                        }
                                    }
                                    for (var k = 0; k < g.female.length; k++) {
                                        for (var h in d.femaleCache) {
                                            if (g.female[k].mid == d.femaleCache[h].mid) {
                                                delete d.femaleCache[h]
                                            }
                                        }
                                    }
                                    $(".pairup-title em.w").html(f.data.female_count - g.female.length);
                                    $(".pairup-title em.m").html(f.data.male_count - g.male.length);
                                    zAlert.Close()
                                },
                                cancelTxt: "是",
                                cancelCallback: function() {
                                    zAlert.Close()
                                }
                            })
                        }
                    }

        }else{
            $(".pairup-title em.w").html(f.data.femaleCount);
            $(".pairup-title em.m").html(f.data.maleCount);
        }

     });

}

</script>
<!--<script type="text/javascript" src="/tpl/static/wall/js/scene_supperzzle.js" charset="utf-8"></script>-->


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