<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="zh-cn">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta charset="utf-8">
<title><?php echo ($info["name"]); ?></title>
<link rel="stylesheet" href="<?php echo ($staticPath); ?>/tpl/static/crowdfunding/css/zc-common.css">
<link rel="stylesheet" href="<?php echo ($staticPath); ?>/tpl/static/crowdfunding/css/zc-style.css">

<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/alert.js"></script>

<style>
.window .title{
    background-image: linear-gradient(#f05c52, #f05c52);
}
</style>
</head>
<body>
<div class="wrapper bg-white">
    <div class="slide-main base-layer">
        <!-- head -->
        <header class="header">
        <h2><a href="javascript:void(0);" class="text-red">订单</a></h2>
        <a href="javascript:window.history.go(-1);" class="icon btn-goback"></a>
        <a href="<?php echo U('Crowdfunding/home',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="icon btn-home"></a>
        </header>
        <!-- / -->
        <form action="<?php echo U('Crowdfunding/pay',array('token'=>$token,'wecha_id'=>$wecha_id));?>" id="main_form" method="post">
            <div class="cont-layer">
                <div class="title-box">
                    <h5><?php echo ($info["name"]); ?></h5>
                    <h6>简介：<?php echo ($info["intro"]); ?></h6>
                </div>
                <div class="placeBlock-10 bg-gray">
                </div>
                <div class="order-box">
                <?php if($reward["id"] == -1): ?><div class="order-item clearfix">
                        <div class="order-item-key">
                            支持金额：
                        </div>
                        <div class="order-item-value">
                            自定义
                        </div>
                    </div>
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            自定义金额：
                        </div>
                        <div class="order-item-value">
                           <input type="text" id='price' name="price" class="order-input" placeholder="请输入支持的金额" id="tel" value="">
                        </div>
                    </div>
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            回报内容：
                        </div>
                        <div class="order-item-value">
                            感谢您的无私奉献！
                        </div>
                    </div>
                <?php else: ?>
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            应付金额：
                        </div>
                        <div class="order-item-value red-money">
                            <?php echo ($reward["payPrice"]); ?>元
                        </div>
                    </div>
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            支持金额：
                        </div>
                        <div class="order-item-value">
                            ￥ <?php echo ($reward["money"]); ?>
                        </div>
                    </div>
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            配送费用：
                        </div>
                        <div class="order-item-value">
                            <?php if($reward["carriage"] != 0): ?>￥ <?php echo ($reward["carriage"]); ?>
                            <?php else: ?>
                                免运费<?php endif; ?>
                        </div>
                    </div>
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            回报内容：
                        </div>
                        <div class="order-item-value">
                            <?php echo ($reward["content"]); ?>
                        </div>
                    </div>
                    <?php if($addrSign != ''): ?><div class="order-item clearfix wxaddr">
                        <a id="editAddress" href="javascript:void(0);">点击使用微信收货地址</a>
                        
                    </div><?php endif; ?>
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            收货人：
                        </div>
                        <div class="order-item-value">
                            <input type="text" name="username" class="order-input" placeholder="请填写收货人" id="username" value="<?php echo ($fans["truename"]); ?>">
                        </div>
                    </div> 
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            联系方式：
                        </div>
                        <div class="order-item-value">
                            <input type="text" name="tel" class="order-input" placeholder="请填写联系电话" id="tel" value="<?php echo ($fans["tel"]); ?>">
                        </div>
                    </div> 
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            收货地址：
                        </div>
                        <div class="order-item-value">
                            <textarea name="address" class="order-textarea" rows="2" cols="32" id="address"><?php echo ($fans["address"]); ?></textarea>
                        </div>
                    </div><?php endif; ?>
                    <div class="order-item clearfix">
                        <div class="order-item-key">
                            备注：
                        </div>
                        <div class="order-item-value">
                            <textarea name="remark" class="order-textarea" rows="3" cols="32"></textarea>
                        </div>
                    </div>
                </div>
                <input name="reward_id" value="<?php echo ($reward["id"]); ?>" type="hidden">
                <input name="pid" value="<?php echo ($info["id"]); ?>"  type="hidden">
                <div class="order-pay-box mt10">
                    <button id="btn_next" type="button" is_over='<?php if($is_over == 1): ?>-1<?php else: ?>0<?php endif; ?>' is_no='<?php echo ($reward["id"]); ?>' class="btn btn-large btn-red">去付款</button>
                </div>
            </div>
        </form>
    </div>
    <?php if($copyright != ''): ?><div class="footer">
    <p class="f-text1">
        <?php echo ($copyright); ?>
    </p>
</div><?php endif; ?>
</div>
<input name="tapp_page_point" id="tapp_page_point" value="1025" type="hidden">
<script>
  
    $(function(){
        $("#btn_next").click(function () {     
            if($(this).attr('is_over') == -1){
                alert("项目已经结束");
                return false;
            }

            if($(this).attr('is_no') == -1){
                if($("#price").val().trim()==""){
                    alert("请填写自定义金额");
                    return false;
                }
            }else{
                if($("#address").val().trim()==""){
                    alert("请填写收货地址");
                    return false;
                }
                if($("#username").val().trim() == ""){
                    alert("请填写收货人");
                    return false;
                }
                if($("#username").val().trim() == ""){
                    alert("请填写联系电话");
                    return false;
                }
            }

            $("#main_form").submit();
        });
        
        $('#editAddress').click(function(){
            getaddr();
        });
        function getaddr(){
            WeixinJSBridge.invoke('editAddress',{
                "appId" : "<?php echo ($addrSign["appId"]); ?>",
                "scope" : "jsapi_address",
                "signType" : "sha1",
                "addrSign" : "<?php echo ($addrSign["addrSign"]); ?>",
                "timeStamp": "<?php echo ($addrSign["timeStamp"]); ?>",
                "nonceStr" : "<?php echo ($addrSign["nonceStr"]); ?>",
            },function(res){
                if(res.err_msg == 'edit_address:ok'){
                    $('#username').val(res.userName);
                    $('#tel').val(res.telNumber);            
                    $('#address').val(res.proviceFirstStageName+res.addressCitySecondStageName+res.addressCountiesThirdStageName+res.addressDetailInfo);
                }
            });
        }

    });
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