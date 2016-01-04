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
<div class="columntitle">用户管理</div>
<div style="border:1px solid #E9EFF7;margin-top:10px;">

<div class="oper" style="border:none"><div style="width:260px;float:left"><a href="?g=Agent&m=Users&a=addUser" class="add">添加</a> 按照用户名搜索：<input type="text" id="keyword" style="width:90px;height:18px;" class="colorblur" value="<?php echo htmlspecialchars($_GET['keyword']);?>" /></div> <input type="button" onclick="location.href='?g=Agent&m=Users&a=index&keyword='+$('keyword').value" name="doSubmit" value="搜索" style="float:left" class="button"/>
<div style="clear:both"></div>
</div>

  <table cellspacing="1" cellpadding="1" class="listtable">
		<tr class="summary-title">
		    <td>会员组ID</td>
		    <td>用户名</td>
		    <td>会员组</td>
		    <td>手机</td>
		    <td>到期日期</td>
			<td>最后登录时间</td>
			<td>最后登录IP</td>
			<td>操作</td>
		</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="tdbg" onMouseOver="this.className='tdbg-dark';" onMouseOut="this.className='tdbg';" style="height:29px;">
     <td><?php echo ($list["gid"]); ?></td>
        <td><?php echo ($list["username"]); ?></td>
        <td><?php echo ($list["groupName"]); ?></td>
		<td><?php echo ($list["mp"]); ?></td>
		<td><?php echo date('Y-m-d',$list['viptime']); ?></td>
		<td><?php echo date('Y-m-d H:i:s',$list['lasttime']); ?></td>
		<td><?php echo ($list["lastip"]); ?></td>
		<td><a href="?g=Agent&m=Users&a=updateUser&id=<?php echo ($list["id"]); ?>">修改</a> <a href="###" onclick="if(confirm('确定删除吗')){location.href='?g=Agent&m=Users&a=deleteUser&id=<?php echo ($list["id"]); ?>'}">删除</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</div>
<div class="pages"><?php echo ($page); ?></div>
</DIV>
</body>
</html>