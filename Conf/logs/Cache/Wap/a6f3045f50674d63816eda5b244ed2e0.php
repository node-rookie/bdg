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
</head>
<body>
<div class="wrapbox">
    <!-- heard -->
    <header class="header">
    <h2><a href="javascript:void(0);" class="text-red">产品信息</a></h2>
    <a href="javascript:window.history.go(-1);" class="icon btn-goback"></a>
    <a href="<?php echo U('Crowdfunding/my_support',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="icon btn-person"></a>
    </header>
    <!-- / -->
    <!-- main -->
    <div class="pd-b50">
        <div class="title-box">
            <h4 class="h4-title">
                <strong><?php echo ($info["name"]); ?></strong>
            </h4>
            <p>
                <?php echo (date("Y/m/d",$info['start'])); ?>-<?php echo (date("Y/m/d",$info['end'])); ?>火热筹款中
            </p>
        </div>
        <div class="initiater-box">
            <div class="gridbox">
                <div class="headpic">
                    <img src="<?php echo ($company["logourl"]); ?>" alt="" height="50" width="50">
                </div>
                <div class="grid-1">
                    <h4>
                        <?php echo ($company["name"]); ?>
                    <!-- <i class="icon i-approve"></i>
                    <i class="icon i-medal"></i> -->
                    </h4>
                    <p>
                        <?php echo ($company["shortname"]); ?>
                    </p>
                    <p>
                        <span class="mr20">发起：<?php echo ($originate); ?></span><span>支持：<?php echo ($support); ?></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="detail-box">
            <?php echo (htmlspecialchars_decode($info["detail"])); ?>
        </div>


    <?php if($copyright != ''): ?><div class="footer">
    <p class="f-text1">
        <?php echo ($copyright); ?>
    </p>
</div><?php endif; ?>
    </div>
</div>

</div>


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