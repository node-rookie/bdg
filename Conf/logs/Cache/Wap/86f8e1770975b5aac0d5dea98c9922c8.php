<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta charset="utf-8">
<title><?php echo ($info["name"]); ?></title>
<link rel="stylesheet" href="<?php echo ($staticPath); ?>/tpl/static/crowdfunding/css/zc-common.css">
<link rel="stylesheet" href="<?php echo ($staticPath); ?>/tpl/static/crowdfunding/css/zc-index.css">

<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/alert.js"></script>
<!-- <script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/crowdfunding/js/zepto.min.js"></script> -->
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/crowdfunding/js/lightbox.js"></script>
<style>
.window .title{
    background-image: linear-gradient(#f05c52, #f05c52);
}
</style>
</head>
<body>
<div class="wrapbox">
<?php if($memberNotice != ''): echo ($memberNotice); endif; ?>    
    <!-- heard -->
    <header class="header">
        <h2><a href="javascript:void(0);" class="text-red">项目详情</a></h2>
        <a href="<?php echo U('Crowdfunding/home',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="icon btn-home" style="left:0px;"></a>
        <a href="<?php echo U('Crowdfunding/my_support',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="icon btn-person"></a>
    </header>
    <!-- / -->
    <!-- main -->
    <div class="pd-b50">
        <div class="zc-list">
            <div class="zc-item">
                <div>
                    <a href="<?php echo U('Crowdfunding/detail',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$info['id']));?>">
                        <img src="<?php echo ($info["pic"]); ?>" alt="">
                    </a>
                </div>
                <div class="pd-0-10 bd-b">
                    <a href="<?php echo U('Crowdfunding/detail',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$info['id']));?>" class="detail-a">
                    <h4 class="h4-title"> <?php echo ($info["name"]); ?> <i class="icon more-r fr"></i></h4>
                    <p>
                        <?php echo ($info["intro"]); ?>
                    </p>
                    </a>
                    <div class="progress-box <?php if($info["status"] == 4): ?>sta-end<?php else: ?>sta-ing<?php endif; ?>">
                        <div class="progrestate-b  fr">
                            <?php if($info["status"] == 4): ?>已结束
                            <?php else: ?>
                                众筹中<?php endif; ?>
                        </div>
                        <div class="progresnum">
                            <?php echo ($info["progress"]); ?>
                        </div>
                        <div class="progressbar">
                            <div class="progressing" style="width:<?php echo ($info["percent"]); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="gridbox zc-datum">
                        <div class="grid-3">
                            <strong>￥<?php echo ($info["price_count"]); ?></strong>
                            <p>
                                已筹集
                            </p>
                        </div>
                        <div class="grid-2">
                            <strong><?php echo ($info["people_count"]); ?></strong>
                            <p>
                                支持人数
                            </p>
                        </div>
                        <div class="grid-2">
                            <strong>  <?php echo ($info["remain_day"]); ?> 天</strong>
                            <p>
                                剩余时间
                            </p>
                        </div>
                    </div>
                    <ul class="gridbox">
                        <li class="grid-1 btn-oncern">
                            <a href="javascript:void(0);" id="a_focus">
                                <i class="icon"></i>关注<span></span>
                            </a>
                        </li>
                        <li class="grid-1 btn-praise">
                            <a href="javascript:void(0);" id="a_prais">
                                <i class="icon"></i>赞<span></span>
                            </a>
                        </li>
                        <input id="user_pin"   value="<?php echo ($wecha_id); ?>" type="hidden">
                        <input id="project_id" value="<?php echo ($info["id"]); ?>" type="hidden">
                    </ul>
<!--                <a clstag="jr|keycount|zc_m_detail|zc_htxq" href="#" class="btn btn-l2 topicbtn">
                                                    项目话题（58个）
<i class="icon more-r"></i>
</a> -->
                </div>
            </div>
        </div>
        <?php if($reward != ''): ?><h2 class="h2-title">选择回报</h2>
        <ul class="return-list">
            <?php if(is_array($reward)): $i = 0; $__LIST__ = $reward;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$reward): $mod = ($i % 2 );++$i;?><li>
                <div class="gridbox supportbox">
                    <div class="grid-2 supp-price">
                        支持￥<?php echo ($reward["money"]); ?>
                    </div>
                    <div class="grid-2">
                        <?php if($reward["surplus"] > 0): ?><a name="btn_support" projectid="3238" redoundid="12176" href="<?php echo U('Crowdfunding/order',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$info['id'],'reward_id'=>$reward['id']));?>" class="btn btn-red fr is_null">去支持</a>
                        <?php else: ?>
                            <a href="javascript:void(0);" class="btn btn-disable fr">限额已满</a><?php endif; ?>
                    </div>
                </div>
                <div class="info-min">
                    <p>
                        <?php echo ($reward["content"]); ?>
                    </p>
                    <a href="<?php echo ($reward["img"]); ?>" class="lightbox" data-id="bigimg1">
                        <img src="<?php echo ($reward["img"]); ?>" class="" height="64" width="64">
                    </a>
                    <p>
                        配送费用：
                        <?php if($reward["carriage"] != 0): echo ($reward["carriage"]); ?>元
                        <?php else: ?>
                            免运费<?php endif; ?>
                    </p>
                    <p>
                        预计回报发送时间：项目成功结束后<?php echo ($reward["back_day"]); ?>天内
                    </p>
                </div>

                <div class="gridbox supportfoot">
                    <div class="grid-1">
                        <div class="grid-2">
                            <span class="text-red">
                            <strong>
                                <?php echo ($reward["count"]); ?>位
                            </strong>
                            </span>
                            支持者
                            （剩余<span class="text-red"><?php echo ($reward["surplus"]); ?>位</span>）
                        </div>
                    </div>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><?php endif; ?>
        <h2 class="h2-title">无私奉献</h2>
        <div class="return-list">
            <div class="wsbox">
                <div class="gridbox">
                    <div class="grid-1 zctxt">
                        <span class="text-red"><?php echo ($selfless); ?>位</span>支持者
                    </div>
                    <div class="grid-1 clearfix">
                        <a name="btn_support"  projectid="3238" redoundid="0" href="<?php echo U('Crowdfunding/order',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$info['id'],'reward_id'=>-1));?>" class="btn btn-red fr is_null">无私奉献</a>
                    </div>
                </div>
                <p>
                    不需要给回报，选择此项，项目成功后发起人将不会给您发送回报
                </p>
            </div>
        </div>
    </div>

    <?php if($copyright != ''): ?><div class="footer">
    <p class="f-text1">
        <?php echo ($copyright); ?>
    </p>
</div><?php endif; ?>
</div>

<script>
    var projectId   = '<?php echo ($info["id"]); ?>';
    <?php if($is_over == 1): ?>$('.is_null').each(function(){
            $(this).attr('href','javascript:alert("项目已经结束");');
            //$(this).attr('id','modaltrigger_notice');
            //$(this).addClass('modaltrigger_notice');
        });
    <?php elseif($memberNotice != ''): ?>
        $('.is_null').each(function(){
            $(this).attr('href','javascript:alert("关注或者注册后才能操作");');
            //$(this).attr('id','modaltrigger_notice');
            //$(this).addClass('modaltrigger_notice');
        });<?php endif; ?>


    $(function(){
        new lightbox({
            obj: $(".lightbox")
        });


        var name = $("#user_pin").val();
        var url = "<?php echo U('Crowdfunding/initFocus',array('token'=>$token));?>&id=" + projectId + "&name="+name;
        initFocusCount(url);

        function initFocusCount(url){
            $.getJSON(url, function(data,e) {
                if(data == null || data == undefined || data.result==null || data.result==undefined){
                    $("#a_prais").children("span").html("（0）");
                    $("#a_focus").children("span").html("（0）");
                }else{
                    show_data(data.focusCounter);
                    if(data.flag=='yes' ){
                        $("#a_focus").html($("#a_focus").html().replace("关注","已关注"));
                    }
                }
            });
        }


        $("#a_prais").click(function () { //点赞
            $.getJSON("<?php echo U('Crowdfunding/praise',array('token'=>$token));?>&id=" + projectId, function (data, e) {
                if(data!=null && data.result!=undefined && data.result.isSuccess){
                    show_data(data.focusCounter);
                }else{
                    alert(data.error);
                }
            });
        });

        $("#a_focus").click(function(){ //关注
            var code = $(this).html();
//            var c_focus_val=$.fn.cookie("c_focus_project_id"+projectId);
            if(code.indexOf("已关注")!= -1){ //已关注了
                alert("已关注");
                return;
            }else{
                var url = "<?php echo U('Crowdfunding/focus',array('token'=>$token));?>&id="+projectId+"&name="+name;
                $.ajax({url:url, dataType: "json", scriptCharset: "utf-8", success: function (data) {

                    if(data!=null && data.result!=undefined && data.result.isSuccess){
                        show_data(data.focusCounter);
                        
                        if($("#a_focus").html().indexOf("已关注")== -1){
                            $("#a_focus").html($("#a_focus").html().replace("关注","已关注"));
                        }
                    }else{
                        alert(data.error);
                    }
                },
                error: function (a) {
                        alert("系统繁忙");
                    }
                });
            }
        });
    });

    function show_data(data) {
        if(data!=null && data.praise!=null && data.focus!=null && data.praise!=undefined && data.focus!=undefined){
            $("#a_prais").children("span").html("（"+show_num(data.praise)+"）");
            $("#a_focus").children("span").html("（"+show_num(data.focus)+"）");
        }
    }

    function show_num(f){
        if(f>=10000){
            return parseInt(f/10000) +"万";
        }else if(f<10000 && f>=1000){
            return parseInt(f/1000) +"千";
        }else{
            return f;
        }
    }
</script>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Crowdfunding",
            "moduleID":"0",
            "imgUrl": "<?php echo ($info['pic']); ?>", 
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Crowdfunding/index',array('token'=>$token,'id'=>$info['id']));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Crowdfunding/index',array('token'=>$token,'id'=>$info['id']));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Crowdfunding/index',array('token'=>$token,'id'=>$info['id']));?>",
            "tTitle": "<?php echo ($info['name']); ?>",
            "tContent": "<?php echo ($info['intro']); ?>"
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>