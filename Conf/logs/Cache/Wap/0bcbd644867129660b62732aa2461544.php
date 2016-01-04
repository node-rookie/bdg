<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8" />
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="0">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/car/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/car/css/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/car/css/datepicker_car.css" media="all" />
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src="./tpl/User/default/common/js/select/js/comm.js"></script>
<script src="./tpl/User/default/common/js/select/js/linkagesel-min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/car/js/jquery_ui.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/car/js/category.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/car/js/bootstrap-datepicker.js"></script>

<link rel="stylesheet" href="<?php echo STATICS;?>/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<script src="<?php echo STATICS;?>/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo STATICS;?>/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script>
        jQuery(document).ready(function(){
      jQuery("#form1").validationEngine();
    });
</script>
<title><?php echo ($reser['title']); ?>-<?php echo ($reser['typename']); ?></title>

        <style>
            img{width:100%!important;}
        </style>
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
                <style>
            #bookBody .pb_5{
                padding-bottom:10px!important;
            }
        </style>

        <script>
            $().ready(function(){
                var nowTemp = new Date();
                var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                var ndate = $('#dateline').datepicker({
                        format:"yyyy-mm-dd",
                        onRender: function(date) {
                           return date.valueOf() < now.valueOf() ? 'disabled' : '';
                        }
                }).on("changeDate", function(date){
                        ndate.datepicker('hide');
                });
            });
        </script>
    <body onselectstart="return true;" ondragstart="return false;">
            <div id="bookBody" class="body">
            <header>
                <ul>
                    <li><img src="<?php echo ($reser['headpic']); ?>" style="width:100%;" /></li>
                </ul>
            </header>
            <section>
                <div class="pt_5 pb_5 pl_10 pr_10">
                    <dl class="list_book list_book_my">
                        <dd class="tbox">
                            <div><label><?php echo (($reser['typename'])?($reser['typename']):'我的订单'); ?></label></div>
                            <div class="align_right"><a href="<?php echo U('Medical/ReserveBooking',array('token'=>$token,'wecha_id'=>$wecha_id,'sid'=>$vo['id'],'bid'=>$vo['brand_id'],'getlist'=>1,'title'=>$title,'addtype'=>$reser['addtype']));?>" ><?php echo (($count)?($count):0); ?></a></div>
                        </dd>
                    </dl>
                </div>
                <div class="pb_5 pl_10 pr_10">
                    <dl class="list_book list_book_des">
                        <dd>
                            <div><label>订单说明</label></div>
                            <div style="word-break:break-all;word-wrap:nowrap;white-space:normal;padding: 15px 0;"><?php echo (strip_tags($reser['info'])); ?></div>
                        </dd>
                    </dl>
                </div>
                <div class="pb_5 pl_10 pr_10">
                    <dl class="list_book list_book_contact">
                        <dd>
                            <div>
                                <a href="http://chabus.duapp.com/mapapi.php?lng=<?php echo ($reser['lng']); ?>&lat=<?php echo ($reser['lat']); ?>&title=来院路线&info=温馨提示：<?php echo ($reser['address']); ?>">
                                    <span>地址：<?php echo ($reser['address']); ?></span>
                                </a></div>
        <?php if($reser['tel'] != ''): ?><div style="padding-top: 3px;"><a href="tel:<?php echo ($reser['tel']); ?>"><span>订单电话： <?php echo ($reser['tel']); ?></span></a></div><?php endif; ?>

     <?php if($gopay == 1): ?><div style="padding-top: 3px;"><a href><span>预约费用： <?php echo ($reser['price']); ?> </span> 元 </a> </div>
    <?php else: ?>
       <div style="padding-top: 3px;"><a href><span>预约费用： 免费 </span>  </a> </div><?php endif; ?>
                        </dd>
                    </dl>
                </div>


                <div class="pb_5 pl_10 pr_10">
<form id="form1" action="<?php echo U('Medical/add',array('token'=>$token,'wecha_id'=>$wecha_id));?>" method="post" >
                        <input type="hidden" name="wecha_id" id="wecha_id" value="<?php echo ($wecha_id); ?>" />
                        <input type="hidden" name="rid" id="rid" value="<?php echo ($reser['id']); ?>" />
                        <input type="hidden" name="type" id="type" value="<?php echo ($reser['addtype']); ?>" />
                        <dl class="list_book">
                            <dt><label>请认真填写表单,请认真核对订单信息.</label></dt>
                            <dd class="tbox">
                                <div><label>患者姓名:</label></div>
                                <div><input type="text" name="truename" placeholder="请输入您的真实姓名" value="<?php echo ($reser['truename']); ?>" data-validation-engine="validate[required,minSize[2]]"
                    data-errormessage-value-missing="姓名必填项!" data-prompt-position="inline"/></div>
                            </dd>
                            <dd class="tbox">
                                <div><label>联系电话：</label></div>
                                <div><input type="tel" name="utel" placeholder="请输入您的电话" value="<?php echo ($reser['utel']); ?>" data-validation-engine="validate[required,custom[phone]]"
                    data-errormessage-value-missing="联系电话必填项!" data-prompt-position="inline"/></div>
                            </dd>
                            <dd class="tbox">
                                <div><label>预约日期：</label></div>
                                <div><input type="text" name="dateline" placeholder="请选择预约日期" id="dateline" readonly="readonly"  value="<?php echo ($reser['dateline']); ?>" /></div>
                            </dd>

                            <dd class="tbox">
                                <div><label>患者性别：</label></div>
                                <div>
                                    <select name="sex">
                                <option value="1" <?php if($reser['sex'] == 1): ?>selected="selected"<?php endif; ?>>男</option>
                                <option value="2"<?php if($reser['sex'] == 2): ?>selected="selected"<?php endif; ?>>女</option>
                                    </select>
                                </div>
                            </dd>
                              <dd class="tbox">
                                <div><label>患者年龄:</label></div>
                                <div>
                                  <input type="number" name="age" id="age"  value="<?php echo ($reser['age']); ?>" placeholder="请输入您的年龄"   data-validation-engine="validate[required,custom[number],min[0],max[150]]" class="px" data-prompt-position="inline" data-errormessage-value-missing="请填写您的年龄!"/>
                                </div>
                            </dd>
                            <dd class="tbox"<?php if($reser['txt3'] == ''): ?>style="display:none;"<?php endif; ?>>
                                <?php if($reser['txt3'] != ''): ?><input type="hidden" name="txt3name" id="txt3name" value="<?php echo ($reser['txt3']); ?>" /><?php endif; ?>
                                <div><label><?php echo ($reser['txt3']); ?></label></div>
                                <div>
                                  <input type="text" name="txt33" id="txt33" value="" placeholder="<?php echo ($reser['value3']); ?>"  />
                                </div>
                            </dd>
                            <dd class="tbox"<?php if($reser['txt4'] == ''): ?>style="display:none;"<?php endif; ?>>
                            <?php if($reser['txt4'] != ''): ?><input type="hidden" name="txt4name" id="txt4name" value="<?php echo ($reser['txt4']); ?>" /><?php endif; ?>
                                <div><label><?php echo ($reser['txt4']); ?></label></div>
                                <div>
                                  <input type="text" name="txt44" id="txt44" value="" placeholder="<?php echo ($reser['value4']); ?>"  />
                                </div>
                            </dd>
                             <dd class="tbox"<?php if($reser['txt5'] == ''): ?>style="display:none;"<?php endif; ?>>
                             <?php if($reser['txt5'] != ''): ?><input type="hidden" name="txt5name" id="txt5name" value="<?php echo ($reser['txt5']); ?>" /><?php endif; ?>
                                <div><label><?php echo ($reser['txt5']); ?></label></div>
                                <div>
                                  <input type="text" name="txt55" id="txt55" value="" placeholder="<?php echo ($reser['value5']); ?>"  />
                                </div>
                            </dd>

                             <dd class="tbox">
                                <div><label><?php echo (($reser['select1'])?($reser['select1']):'预约科室'); ?>：</label></div>
                                <div>
                                    <select name="yyks">
                                    	<?php if(is_array($svalue1)): $i = 0; $__LIST__ = $svalue1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                            <dd class="tbox">
                                <div><label><?php echo (($reser['select2'])?($reser['select2']):'预约专家'); ?>：</label></div>
                                <div>
                                    <select name="yyzj">
                                        <?php if(is_array($svalue2)): $i = 0; $__LIST__ = $svalue2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                             <dd class="tbox">
                                <div><label><?php echo (($reser['select3'])?($reser['select3']):'预约病种'); ?>：</label></div>
                                <div>
                                    <select name="yybz">
                                        <?php if(is_array($svalue3)): $i = 0; $__LIST__ = $svalue3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                             <dd class="tbox" <?php if($reser['select4'] == ''): ?>style="display: none;"<?php endif; ?>>
                             <?php if($reser['select4'] != ''): ?><input type="hidden" name="select4name" id="select4name" value="<?php echo ($reser['select4']); ?>" /><?php endif; ?>
                                <div><label><?php echo ($reser['select4']); ?>：</label></div>
                                <div>
                                    <select name="yy4">
                                        <?php if(is_array($svalue4)): $i = 0; $__LIST__ = $svalue4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                             <dd class="tbox" <?php if($reser['select5'] == ''): ?>style="display: none;"<?php endif; ?>>
                              <?php if($reser['select5'] != ''): ?><input type="hidden" name="select5name" id="select5name" value="<?php echo ($reser['select5']); ?>" /><?php endif; ?>
                                <div><label><?php echo ($reser['select5']); ?>：</label></div>
                                <div>
                                    <select name="yy5">
                                        <?php if(is_array($svalue5)): $i = 0; $__LIST__ = $svalue5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                            <dd class="tbox">
                                <div><label><?php echo (($reser['datename'])?($reser['datename']):'备注信息'); ?>：</label></div>
                                <div><textarea name="uinfo" placeholder="请输入备注信息" style="height:80px;"></textarea></div>
                            </dd>
                        </dl>
                        <div style="margin:10px;text-align: center;">
                <input type="submit" value="提交订单" class="btn_submit"  style="margin:10px auto;text-align: center;cursor:pointer">
                        </div>
</form>
                </div>
            </section>

        </div>

    </body>

</html>