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
   <form method="post" action="?g=Agent&m=Site&a=regConfig" id="myform">
            <table class="addTable">
         <tr>
        
         <tr>
          <th>需要审核</th>
          <td><label><input type="radio" name="needcheckuser" value="0" <?php if($thisAgent['needcheckuser']==0)echo checked; ?> /> 注册时无需要审核</label> <label><input type="radio" name="needcheckuser" value="1" <?php if($thisAgent['needcheckuser']==1)echo checked; ?> /> 注册时需要审核</label> </td>
        </tr>
         <tr style="margin-top:10px;">
          <th>注册填写手机号</th>
          <td><label><input type="radio" name="regneedmp" value="1" <?php if($thisAgent['regneedmp']==1)echo checked; ?> /> 需要填写手机号</label> <label><input type="radio" name="regneedmp" value="0" <?php if($thisAgent['regneedmp']==0)echo checked; ?> /> 不需要填写手机号</label> </td>
        </tr>
         <tr style="margin-top:10px;">
          <th>注册后等级</th>
          <td><select name="reggid">
      <?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><option value="<?php echo ($g["id"]); ?>" <?php if($thisAgent['reggid'] == $g['id']): ?>selected<?php endif; ?>><?php echo ($g["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
      <span>&nbsp;&nbsp; <span class="tdtip">仅注册不需要审核的时候有效</span> </td>
        </tr>
         <tr style="margin-top:10px;">
          <th>注册后免费天数</th>
          <td><input type="text" name="regvaliddays" style="width:100px;" class="validate['required','digit'] colorblur" value="<?php echo ($thisAgent["regvaliddays"]); ?>" /></td>
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