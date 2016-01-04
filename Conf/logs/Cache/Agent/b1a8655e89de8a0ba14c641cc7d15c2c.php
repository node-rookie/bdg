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
<div class="columntitle">用户组管理</div>
<div style="border:1px solid #E9EFF7;margin-top:10px;">
<div class="oper" style="border:none"><a href="?g=Agent&m=Users&a=groupSet" class="add">添加</a></div>


  <table cellspacing="1" cellpadding="1" class="listtable">
		<tr class="summary-title">
		    <td>ID</td>
		    <td>名称</td>
			<td>允许添加公众号数量</td>
			<td>每月请求数</td>
			<td>操作</td>
		</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="tdbg" onMouseOver="this.className='tdbg-dark';" onMouseOut="this.className='tdbg';" style="height:29px;">
        <td><?php echo ($list["id"]); ?></td>
		<td><?php echo ($list["name"]); ?></td>
		<td><?php echo ($list["wechat_card_num"]); ?></td>
		<td><?php echo ($list["connectnum"]); ?></td>
		<td><a href="?g=Agent&m=Users&a=groupSet&id=<?php echo ($list["id"]); ?>">修改</a> <a href="###" onclick="if(confirm('确定删除吗')){location.href='?g=Agent&m=Users&a=delGroup&id=<?php echo ($list["id"]); ?>'}">删除</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</div>
<div class="pages"><?php echo ($page); ?></div>
</DIV>
</body>
</html>