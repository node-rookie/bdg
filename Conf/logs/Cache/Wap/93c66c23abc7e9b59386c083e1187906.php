<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/autumns/css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/autumns/css/index.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/autumns/css/common.css" media="all">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/static/vhouse/bootstrap_min.css" media="all"> -->
<script type="text/javascript" async="" src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/wtj.js"></script><script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/common.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/iscroll.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/index.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/zepto_min.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/vhouse/jQuery.js"></script>
<!-- <script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/vhouse/js/bootstrap_min.js"></script> -->
    
    <title><?php echo ($linfo["title"]); ?></title>

		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <!-- Mobile Devices Support @begin -->
            
            <meta content="telephone=no, address=no" name="format-detection">
            <meta name="apple-mobile-web-app-capable" content="yes"> <!-- apple devices fullscreen -->
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <!-- Mobile Devices Support @end -->
        <style>
            img{max-width:100%!important;}
            .black_overlay{  display: none;  position: absolute;  top: 0%;  left: 0%;  width: 100%;  height: 100%;  background-color: black;  z-index:1001;  -moz-opacity: 0.8;  opacity:.80;  filter: alpha(opacity=80);  }
            .white_content {  display: none;  position: absolute;  top: 25%; padding: 16px;  border: 3px solid ;  background-color: white;  z-index:1002;  overflow:auto; margin-left: 15px;
margin-right: 15px;border-radius:20px;line-height:24px;} 
            .aif{margin-top:10px;}
            .yes{width:50px;height:25px;background:#0000ff;float:left;margin-left:50px;color:#FFFFFF;border-radius:8px;text-align:center;}
            .no{width:50px;height:25px;background:#0000ff;float:right;margin-right:50px;color:#FFFFFF;border-radius:8px;text-align:center;}
        </style> 
    </head>
<body onselectstart="return true;" ondragstart="return false;">
    <?php if($wecha_id == ''): echo ($memberNotice); endif; ?>
<script>
    (function(){
        window.config_custom = {
                        OPENSLIDE:true, 
            IMG:{
                BG:"<?php echo ($linfo["hpic"]); ?>"
            },
                        MUSICBG:"<?php echo ($linfo["backmp3"]); ?>"
                    }
    })()
</script>
<script src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/sound.js"></script>
<script src="<?php echo ($staticPath); ?>/tpl/static/autumns/js/soundmanager.js"></script>
    <div data-role="container" class="container">
        <header data-role="header"><!----></header>
        <section data-role="bodys" class="bodys">
        <?php if($memberNotice != NULL): echo ($memberNotice); ?>
            <div class="btn-layout">
                    <a href="#memberNoticeBox" id="modaltrigger_notice" class="btn-againnn"></a>
            </div>
        <?php elseif($list != 0): ?>
    			<div class="btn-layout">
                    <a href="<?php echo U('Autumns/mybox',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$_GET['id']));?>" class="btn-see"></a>
                    <a href="<?php echo U('Autumns/box',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$_GET['id']));?>"   class="btn-again"></a>
            	</div>
        <?php else: ?>
				<div class="btn-layout">
                    <a href="<?php echo U('Autumns/box',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$_GET['id']));?>"   class="btn-againn"></a>
                </div><?php endif; ?>
            <div class="img-list"> 
            </div>
            <span class="roof"></span>
            <?php if(is_array($linfo)): $i = 0; $__LIST__ = $linfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="game-ps"><?php echo ($linfo["sttxt"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="btn-as">
                    <a href="javascript:void(0);" class="btn-a list">获奖名单</a>
                    <a href="javascript:void(0);" class="btn-a rule right">活动规则</a>
                    <hr class="common-hr">
                
                    <p class="text-num-get">已有<b><?php echo ($count); ?></b>人参与领取了礼盒</p>
                    <p class="text-num-get">此活动由<strong style="color:#FFFFFF"><?php echo ($weixin); ?></strong>公众号提供</p>
                </div>
           	
        </section>

    </div>
        <div class="panel-box-layer"></div>
        <div class="panel-box">
            <ul class="panel-title">
                <li><a href="javascript:void(0);" class="btn-list"></a></li>
                <li><a href="javascript:void(0);" class="btn-rule"></a></li>
            </ul>
            <div class="panel-content">
                <div class="panel-content-child" style="overflow: hidden;">  
                    <table style="transition: transform 0ms; -webkit-transition: transform 0ms; transform-origin: 0px 0px 0px; transform: translate(0px, 0px) translateZ(0px);">
                        <colgroup><col width="45%">
                        <col width="55%">
                        </colgroup>
                        <?php if($displayjpnums != 0): ?><tr>
                            	<th><b>奖品总数：<?php echo ($nums); ?></b></th>
                            	<th><b>已经领取：<?php echo ($lucknums); ?></b></th>
                            </tr>
                            <tr>
                                <th><div class="text-nick"></div></th>
                                <th><div class="text-name"></div></th>
                            </tr>
                            <?php if(is_array($prize)): foreach($prize as $key=>$vo): ?><tr>
                                    <td><?php echo ($vo["name"]); ?></td>
                                    <td>&nbsp;&nbsp;&nbsp;<?php echo ($vo["prize"]); ?></td>
                                </tr><?php endforeach; endif; ?>
                        <?php else: ?>
                            <tr>
                                <th><div class="text-nick"></div></th>
                                <th><div class="text-name"></div></th>
                            </tr>
                            <?php if(is_array($prize)): foreach($prize as $key=>$vo): ?><tr>
                                    <td><?php echo ($vo["name"]); ?></td>
                                    <td>&nbsp;&nbsp;&nbsp;<?php echo ($vo["prize"]); ?></td>
                                </tr><?php endforeach; endif; endif; ?>
    </table>
                   
                </div>
                <div class="panel-content-child" style="overflow: hidden;">
                    <dl style="transition: transform 0ms; -webkit-transition: transform 0ms; transform-origin: 0px 0px 0px; transform: translate(0px, 0px) translateZ(0px);">
                        <dt><div class="text-time"></div></dt><dd><?php echo (date("Y年m月d日",$linfo["statdate"])); ?>-<?php echo (date("Y年m月d日",$linfo["enddate"])); ?></dd>
                        <dt><div class="text-rule"></div></dt><dd><?php echo ($activity["aginfo"]); ?></dd>
                        <dt><div class="text-desc"></div></dt><dd><?php echo ($linfo["txt"]); ?></dd>
                    </dl>
                </div>
                <div class="btn-layout">
                    <form action="###" method="post" data-role="form"></form>
                </div>
            </div>
        </div>
        <div class="share-layer"></div>

<div id="fade" class="black_overlay"> 
</div>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Autumns",
            "moduleID":"<?php echo (intval($_GET['id'])); ?>",
            "imgUrl": "<?php echo ($linfo["starpicurl"]); ?>",
            "timeLineLink":"<?php echo ($f_siteUrl); echo U('Autumns/index',array('token'=>$token,'id'=>intval($_GET['id'])));?>",
            "sendFriendLink":"<?php echo ($f_siteUrl); echo U('Autumns/index',array('token'=>$token,'id'=>intval($_GET['id'])));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Autumns/index',array('token'=>$token,'id'=>intval($_GET['id'])));?>",
            "tTitle": "<?php echo ($linfo["title"]); ?>",
            "tContent": "<?php echo ($linfo["info"]); ?>"
        };
</script>
<?php echo ($shareScript); ?>

</body></html>