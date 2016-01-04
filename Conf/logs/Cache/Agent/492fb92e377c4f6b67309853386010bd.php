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
<script type="text/javascript" src="tpl/Agent/Common/js/formCheck/lang/cn.js"> </script>
<script type="text/javascript" src="tpl/Agent/Common/js/formCheck/formcheck.js"> </script>
<link rel="stylesheet" href="tpl/Agent/Common/js/formCheck/theme/grey/formcheck.css" type="text/css" media="screen" />
<link href="tpl/Agent/Common/style/calendar.css" type="text/css" rel="stylesheet">
<script src="tpl/Agent/Common/js/calendar.js"></script>
<script src="tpl/Agent/Common/js/artDialog4.1.6/artDialog.js?skin=default"></script>
<script src="tpl/Agent/Common/js/artDialog4.1.6/plugins/iframeTools.js"></script>
<script type="text/javascript">
window.addEvent('domready', function(){
	new FormCheck('myform');
});
</script>

<div class="columntitle">修改资料</div>
<form action="?g=Agent&m=Basic&a=index" method="post" name="form" enctype="multipart/form-data" id="myform">
            <table class="addTable">
            <tr>
          <th>名称</th>
          <td><input type="text" name="name" style="width:300px;" class="validate['required'] colorblur" value="<?php echo ($thisAgent["name"]); ?>" readonly /> <span class="tdtip">名称不能改</span></td>
        </tr>
        <tr>
          <th>手机</th>
          <td><input type="text" name="mp" style="width:200px;" class="validate['required','digit'] colorblur" value="<?php echo ($thisAgent["mp"]); ?>" /> </td>
        </tr>
        <tr>
          <th>应用ID</th>
          <td><input type="text" name="appid" style="width:200px;" class="colorblur" value="<?php echo ($thisAgent["appid"]); ?>" /> </td>
        </tr>
        <tr>
          <th>应用Secret</th>
          <td><input type="text" name="appsecret" style="width:200px;" class="colorblur" value="<?php echo ($thisAgent["appsecret"]); ?>" /> </td>
        </tr>
         <tr>
          <th>QQ</th>
          <td><input type="text" name="qq" style="width:300px;" class="validate['required','digit'] colorblur" value="<?php echo ($thisAgent["qq"]); ?>" /> </td>
        </tr>
         <tr>
          <th>Email</th>
          <td><input type="text" name="email" style="width:300px;" class="validate['required','email'] colorblur" value="<?php echo ($thisAgent["email"]); ?>" /> </td>
        </tr>
        <tr>
          <th>备注</th>
          <td><textarea name="intro" style="width:300px;height:80px;" class="colorblur"><?php echo ($thisAgent["intro"]); ?></textarea></td>
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