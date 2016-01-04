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
<style>
strong{font-weight:normal}
</style>
<div class="columntitle">设置会员组</div>
   <form method="post" action="?g=Agent&m=Users&a=groupSet" id="myform">
            <table class="addTable">
        <tr>
					<th height="48" align="right"><strong>是否显示版权:</strong></th>
					<td colspan="3" class="lt">
						<label><input type="radio" class="radio" class="ipt" value="1" name="iscopyright" id="status1" <?php if(($info['iscopyright'] == 1) OR ($info['iscopyright'] == '')): ?>checked<?php endif; ?> >
							启用</label>
							<label><input type="radio" class="radio" class="ipt"  value="0" name="iscopyright" id="status2" <?php if($info['iscopyright'] == '0'): ?>checked<?php endif; ?> >
							关闭</label>
			
					</td>
				</tr>
				<tr>
					<th height="48" align="right"><strong>用户组名称：</strong></th>
					<td colspan="3" class="lt">
						<input type="text" name="name" class="validate['required'] colorblur" size="45" value="<?php echo ($info["name"]); ?>" />
					</td>
				</tr>
				<tr>
					<th height="48" align="right"><strong>公众号数量：</strong></th>
					<td colspan="3" class="lt">
						<input type="text" name="wechat_card_num" value="<?php echo ($info["wechat_card_num"]); ?>" class="validate['required','digit'] colorblur" size="45"/>
					</td>
				</tr>
				<tr>
					<th height="48" align="right"><strong>自定义图文条数：</strong></th>
					<td colspan="3" class="lt">
						<input type="text" name="diynum" value="<?php echo ($info["diynum"]); ?>" class="validate['required','digit'] colorblur" size="45"/>
					</td>
				</tr>
				<tr>
					<th height="48" align="right"><strong>功能请求次数：</strong></th>
					<td colspan="3" class="lt">
						<input type="text" name="connectnum" value="<?php echo ($info["connectnum"]); ?>" class="validate['required','digit'] colorblur" size="45"/>
					
					</td>
				</tr>
				<tr>
					<th height="48" align="right"><strong>活动创建次数：</strong></th>
					<td colspan="3" class="lt">
						<input type="text" name="activitynum"  value="<?php echo ($info["activitynum"]); ?>" class="validate['required','digit'] colorblur" size="45"/>
						
					</td>
				</tr>
				
				<tr>
					<th height="48" align="right"><strong>包月价格：</strong></th>
					<td colspan="3" class="lt">
						<input type="text" name="price" class="validate['required','digit'] colorblur" size="45" value="<?php echo ($info["price"]); ?>"/>
					</td>
				</tr>
				<tr>
					<th height="48" align="right"><strong>创建会员卡数量：</strong></th>
					<td colspan="3" class="lt">
						<input type="text" name="create_card_num" class="validate['required','digit'] colorblur" size="45" value="<?php echo ($info["create_card_num"]); ?>"/>
					</td>
				</tr>
				
				<tr>
					<td height="100" align="right"><strong>分配功能模块</strong></td>
					<td colspan="3" class="lt">
						<input type="checkbox" id="checkall" onclick="checkAll(this);" /><label for="checkall"> 全选 / 全不选 </label>
								<table style="padding:5px;" border="0" cellspacing="8">
									<?php if(is_array($func)): $i = 0; $__LIST__ = $func;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i; if($i%10 == 1): ?><tr><?php endif; ?>
										<td style="border-bottom:1px solid #efefef">
											<input class="input" type="checkbox" style="cursor:pointer" name="func[]" value="<?php echo ($f["funname"]); ?>" id="func_<?php echo ($f["id"]); ?>" <?php if(in_array(($f['funname']), is_array($info['func'])?$info['func']:explode(',',$info['func']))): ?>checked<?php endif; ?> /> 
											<label for="func_<?php echo ($f["id"]); ?>" style="cursor:pointer"><?php echo ($f["name"]); ?></label> 
										</td>
										<?php if($i%10 == 0 || $i == count($func)): ?></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</table>
																
								</div>
						
					</td>
				</tr>
				
<script>

function checkAll()
{
 var tit = document.getElementById("checkall");
 var inputs = document.getElementsByClassName("input");
 for(var i = 0; i < inputs.length; i++)
 {
  if(inputs[i].type == "checkbox")
  {
   if(tit.checked == true)
   {
    inputs[i].checked = true;
   }else{
    inputs[i].checked = false;
   }
  }
 }
}
</script>				
				
          <tr>
            <td class="addName"></td>
            <td>
            <?php if($info): ?><input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" /><?php endif; ?>
            <input type="hidden" name="agentid" value="<?php echo ($thisAgent["id"]); ?>" />
            <input type="hidden" name="status" value="1" />
            <input type="submit" name="doSubmit" value="提交" class="button"/></td>
          </tr>
         
        </table>
        <input type="hidden" value="<?php echo $_SERVER['HTTP_REFERER'];?>" name="referer" />
</form>
</DIV>
</body>
</html>