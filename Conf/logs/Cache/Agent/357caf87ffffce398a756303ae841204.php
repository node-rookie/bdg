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

<div class="columntitle">充值续费</div>
<form action="?g=Agent&m=Pay&a=recharge" method="post" name="form" enctype="multipart/form-data" id="myform">
            <table class="addTable">
         <tr>
          <th>金额</th>
          <td><input type="text" name="amount" style="width:100px;" class="validate['required'] colorblur" value="" /> 元</td>
        </tr>
       <tr>
          <th></th>
          <td></td>
        </tr>
         <tr>
            <td class="addName"></td>
            <td>
            <input type="submit" name="doSubmit" value="充值" class="button"/></td>
          </tr>
        </table>
        <input type="hidden" value="<?php echo $_SERVER['HTTP_REFERER'];?>" name="referer" />
</form>
</DIV>
</body>
</html>