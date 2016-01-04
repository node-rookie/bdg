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
<div class="columntitle">友情链接管理</div>
<div style="border:1px solid #E9EFF7;margin-top:10px;">
<div class="oper" style="border:none;background: #FDFDFD;">
	<?php if($wxname == null): ?><div class="ksearch">
	 		<form action="<?php echo U('Site/newsset');?>" method="post" style="float:left;">
	 		<span style="color:red">请设置公众号后再进行新闻管理操作。</span>
	 		<input type="hidden" name="agentid" class="ipt" value="<?php echo ($agentid); ?>" size="45"/>
	 		公众号：
		 		<input name="new" type="text" value="">
		 		<input type="submit" value=" 确 定 ">
		 	</form>
	    </div>
	<?php else: ?>
	    <div class="ksearch">
	    	<div style="margin-left:20px"><b>当前公众号：<?php echo ($wxname); ?></b><span style="margin-left:40px"><a href="<?php echo U('Site/newsdel',array('wxname'=>$wxname,'agentid'=>$agentid));?>">退出</a></span></div>
	    </div><?php endif; ?>
</div>

  <table cellspacing="1" cellpadding="1" class="listtable">
		<tr class="summary-title">
		    <td width="100" align='center'>id</td>
			<td align='center'>新闻分类1</td>
			<td align='center'>新闻分类2</td>
			<td align='center'>新闻分类3</td>
			<td width="200" align='center'>操作</td>
		</tr>
		<form action="<?php echo U('Site/newsup');?>" method="post">
			<tr>
				<td align='center'><?php echo ($info["id"]); ?></td>
				<td align='center'>
					<select style="height:25px;width:200px" id="clas1" name="class1"> 
						<option value ="0">——请选择新闻分类——</option>
						<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>" <?php if($info['class1'] == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
				<td align='center'>
					<select style="height:25px;width:200px" id="clas2" name="class2"> 
						<option value ="0">——请选择新闻分类——</option>
						<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>" <?php if($info['class2'] == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
				<td align='center'>
					<select style="height:25px;width:200px" id="clas3" name="class3"> 
						<option value ="0">——请选择新闻分类——</option>
						<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>" <?php if($info['class3'] == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>

				<td style="display:none">
					<input name="tok" type="text" value="<?php echo ($tok); ?>">
					<input name="name" type="text" value="<?php echo ($wxname); ?>">
					<input type="hidden" name="agentid" class="ipt" value="<?php echo ($agentid); ?>" size="45"/>
				</td>
				<td align='center'>
					<input type="submit" value=" 确 定 ">
				</td>
			</tr>
		</form>
	</table>
</div>
<div style="color:red;margin:10px 0 0 20px;font-size:13px;">请选择文章分类,系统会选取每个分类下的5篇文章作为新闻信息。</div>
<div class="pages"><?php echo ($page); ?></div>
</DIV>
</body>
</html>