<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="tpl/Agent/Common/style/style.css" type="text/css" rel="stylesheet">
<script src="tpl/Agent/Common/js/mootools1.3.js"></script>
<script src="tpl/Agent/Common/js/mootools-more.js"></script>
<script src="tpl/Agent/Common/js/dialog.js"></script>
<script src="tpl/Agent/Common/js/manage.js"></script>
<title></title>
</head>
<body id="body">
<DIV class="column">
<script src="<?php echo STATICS;?>/forum/js/jquery_min.js" ></script>
<script type="text/javascript" src="tpl/Agent/Common/js/formCheck/lang/cn.js"> </script>
<script type="text/javascript" src="tpl/Agent/Common/js/formCheck/formcheck.js"> </script>
<link rel="stylesheet" href="tpl/Agent/Common/js/formCheck/theme/grey/formcheck.css" type="text/css" media="screen" />
<link href="tpl/Agent/Common/style/calendar.css" type="text/css" rel="stylesheet">
<script src="tpl/Agent/Common/js/calendar.js"></script>
<script src="tpl/Agent/Common/js/artDialog4.1.6/artDialog.js?skin=default"></script>
<script src="tpl/Agent/Common/js/artDialog4.1.6/plugins/iframeTools.js"></script>
<script src="/tpl/static/upyun.js"></script>
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script>

var editor;
KindEditor.ready(function(K) {
editor = K.create('#content', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
                        'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                        'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'music', 'video']
});

});
</script>
</script>
<script type="text/javascript">
window.addEvent('domready', function(){
	new FormCheck('myform');
});
</script>

<div class="columntitle">修改资料</div>
   <form method="post" action="?g=Agent&m=Site&a=index" id="myform">
            <table class="addTable">
         <tr>
          <th>网站名称</th>
          <td><input type="text" name="sitename" style="width:300px;" class="validate['required'] colorblur" value="<?php echo ($thisAgent["sitename"]); ?>" /> </td>
        </tr>
         <tr>
          <th>Logo</th>
          <td><input type="text" name="sitelogo" id="sitelogo" style="width:400px;" class="validate['required'] colorblur" value="<?php if($thisAgent['sitelogo']): echo ($thisAgent["sitelogo"]); else: ?>/tpl/Home/pigcms/common/images/logo-pigcms.png<?php endif; ?>" /> <a href="###" onclick="upyunWapPicUpload('sitelogo',190,60,'admin')">上传</a>&nbsp;&nbsp;png格式，宽190像素，高60像素</td>
        </tr>
        <tr>
          <th>二维码地址</th>
          <td><input type="text" id="qrcode" name="qrcode" style="width:400px;" class="validate['required'] colorblur" value="<?php echo ($thisAgent["qrcode"]); ?>" /> <a href="###" onclick="upyunWapPicUpload('qrcode',258,258,'admin')">上传</a>&nbsp;&nbsp;宽258像素，高258像素</td>
        </tr>
         <tr>
          <th>网站Title</th>
          <td><input type="text" name="sitetitle" style="width:300px;" class="colorblur" value="<?php echo ($thisAgent["sitetitle"]); ?>" /> </td>
        </tr>
        <tr>
          <th>Meta关键词</th>
          <td><input type="text" name="metakeywords" style="width:300px;" class="colorblur" value="<?php echo ($thisAgent["metakeywords"]); ?>" /> </td>
        </tr>
        <tr>
          <th>Meta描述</th>
          <td><textarea name="metades" style="width:400px;height:80px;" class="colorblur"><?php echo ($thisAgent["metades"]); ?></textarea> </td>
        </tr>
        <tr>
          <th>备案号</th>
          <td><input type="text" name="copyright" style="width:300px;" class="colorblur" value="<?php echo ($thisAgent["copyright"]); ?>" /> 可以不要填写</td>
        </tr>
         <tr style="display:none">
          <th>机器人名称</th>
          <td><input type="text" name="robotname" style="width:300px;" class="colorblur" value="<?php echo ($thisAgent["robotname"]); ?>" /> </td>
        </tr>
         <tr style="display:none">
          <th>请求数超出提示</th>
          <td><input type="text" name="connectouttip" style="width:300px;" class="colorblur" value="<?php echo ($thisAgent["connectouttip"]); ?>" /> </td>
        </tr>
         
         <tr>
          <th>统计代码</th>
          <td><textarea name="statisticcode" style="width:400px;height:80px;" class="colorblur"><?php echo base64_decode($thisAgent['statisticcode']);?></textarea></td>
        </tr>
    <tr>
          <th>关于我们 - 标题</th>
          <td><input type="text" name="title" style="width:300px;" class="colorblur" value="<?php echo ($thisAgent["title"]); ?>" /> </td>
        </tr>
    <tr>
      <td height="48" align="right">关于我们 - 内容：</td>
      <td colspan="3" class="lt">
      <textarea name="content" id="content" class="ipt"  rows="5" style="width:590px;height:360px"><?php echo ($thisAgent["content"]); ?></textarea>
      </td>
    </tr>   
          <tr>
            <td class="addName"></td>
            <td>
   
            <input type="submit" name="doSubmit" value="提交" class="button"/></td>
          </tr>
         
        </table>
        <input type="hidden" value="<?php echo $_SERVER['HTTP_REFERER'];?>" name="referer" />
</form>
</DIV>
</body>
</html>