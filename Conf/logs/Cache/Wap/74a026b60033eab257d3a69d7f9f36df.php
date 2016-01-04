<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
        <meta charset="utf-8">
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta content="eric.wu" name="author">
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
        <meta content="no-cache" http-equiv="pragma">
        <meta content="" http-equiv="expires">
        <meta content="telephone=no, address=no" name="format-detection">
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/autumns/css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/autumns/css/myPrize.css" media="all">
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/zepto_min.js"></script>
<title><?php echo ($linfo["title"]); ?></title>

<script>
    (function(){
        window.config_custom = {
            IMG:{
                BG:"<?php echo ($linfo["mpic"]); ?>"
            },
            ISPLATFORM:true, //别人版本是true 自己版本 是false
            SLIDEVERTICAL: true, //上下
            ABOVEMAX:true, //是否在领一个
            
            prize:[
            <?php if(is_array($count)): $i = 0; $__LIST__ = $count;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>{h:<?php echo ($vo["time"]); ?>,r:<?php echo ($linfo["optime"]); ?>-<?php echo ($vo["time"]); ?>,i:<?php echo ($vo["isopen"]); ?>==1?true:false,rc:false},<?php endforeach; endif; else: echo "" ;endif; ?>
             ]
            // i:true=>打开过 false=>未打开过
            // rc:true=>被领完了 false=>未被领完 
        }
    })();
</script>

<script src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/common.js"></script>
<script src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/iscroll.js"></script>
<script src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/myPrize.js"></script>
<style class="firebugResetStyles" type="text/css" charset="utf-8">
</style></head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container">
        <header data-role="header"><!----></header>
        
        <section data-role="body" class="body">
            <div style="height: 110px;" class="layer-row"></div>
            <div class="choose-content">
                <ul>
                    <?php if(is_array($box)): $i = 0; $__LIST__ = $box;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="prize<?php echo ($vo["box"]); ?>" data-id="<?php echo ($vo["id"]); ?>" id="lbox"><img src=""></li><?php endforeach; endif; else: echo "" ;endif; ?>                 
                </ul>
            </div>
            <ul class="choose-content-identifier"></ul>
          
            <div class="text-num"> <!-- rechoose/full -->
                    <span class="text-num-have"></span>
                    <span class="text-num-rest"></span>
            </div>
            <div class="progress-num">
                <div style="width: 10%;" class="progress-num-current"></div>
            </div>
            <div class="btn-layout">
                <a href="javascript:void(0);" class="btn-help"></a> 
                <form action="<?php echo U('Autumns/boxs',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$_GET['id']));?>" method="post">
                        <input value="<?php echo ($vo["box"]); ?>" name="box" type="hidden">
                        <input value="<?php echo ($vo["bid"]); ?>" name="bid" type="hidden">
                        <input value="<?php echo ($vo["id"]); ?>" name="id" type="hidden">
                        <input value="915263" name="info-prize" type="hidden">
                        <input class="btn-open" value="" type="submit" >
                </form>

                <a href="" class="btn-again2 hide"></a>
                <a href="" class="btn-again big hide"></a>
                <!--<a href="javascript:void(0);" class="btn-see"></a>-->

                <form action="<?php echo U('Autumns/opbox',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$_GET['id']));?>" method="post">
                    <input value="<?php echo ($vo["box"]); ?>" name="box" type="hidden">
                    <input value="<?php echo ($vo["bid"]); ?>" name="bid" type="hidden">
                    <input value="<?php echo ($vo["id"]); ?>" name="id" type="hidden">
                    <input value="915263" name="info-prize2" type="hidden">
                    <input class="btn-see" value="" type="submit" >
                    
                </form> 
 
            </div>
                             
        </section>
    </div>
    <div class="share-layer"></div>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Autumns",
            "moduleID":"<?php echo (intval($_GET['id'])); ?>",
            "imgUrl": "<?php echo ($linfo["starpicurl"]); ?>",
            "timeLineLink":"<?php echo ($f_siteUrl); echo U('Autumns/open',array('token'=>$_GET['token'],'id'=>intval($_GET['id'])));?>",
            "sendFriendLink":"<?php echo ($f_siteUrl); echo U('Autumns/open',array('token'=>$_GET['token'],'id'=>intval($_GET['id'])));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Autumns/open',array('token'=>$_GET['token'],'id'=>intval($_GET['id'])));?>",
            "tTitle": "<?php echo ($linfo["title"]); ?>",
            "tContent": "<?php echo ($linfo["info"]); ?>"
        };
</script>
<?php echo ($shareScript); ?>

</body></html>