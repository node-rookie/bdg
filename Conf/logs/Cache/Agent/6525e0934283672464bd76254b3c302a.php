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
<div class="columntitle">功能管理</div>
<div style="border:1px solid #E9EFF7;margin-top:10px;">



  <table cellspacing="1" cellpadding="1" class="listtable">
		<tr class="summary-title">
		    <td align="center">ID</td>
		    <td>名称</td>
		    <td>等级要求</td>
			<td>方法名</td>
			<td>描述</td>
			<td>操作</td>
		</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="tdbg" onMouseOver="this.className='tdbg-dark';" onMouseOut="this.className='tdbg';" style="height:29px;">
        <td align="center"><?php echo ($list["id"]); ?></td>
		<td><?php echo ($list["name"]); ?></td>
		<td><?php echo ($list["groupName"]); ?></td>
		<td><?php echo ($list["funname"]); ?></td>
		<td><?php echo ($list["info"]); ?></td>
		<td><a href="?g=Agent&m=Site&a=funSet&id=<?php echo ($list["id"]); ?>">修改</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</div>
<div class="pages"><?php echo ($page); ?></div>
</DIV>
</body>
</html>