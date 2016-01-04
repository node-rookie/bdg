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
<div class="columntitle">消费记录</div>
<div style="border:1px solid #E9EFF7;margin-top:10px;">
<div class="oper" style="border:none"><a href="?g=Agent&m=Basic&a=recharge" class="add">充值</a></div>


  <table cellspacing="1" cellpadding="1" class="listtable">
		<tr class="summary-title">
		    <td>用途</td>
			<td>费用</td>
			<td>时间</td>
			<td>成功</td>
		</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="tdbg" onMouseOver="this.className='tdbg-dark';" onMouseOut="this.className='tdbg';" style="height:29px;">
        <td><?php echo ($list["des"]); ?></td>
		<td><?php echo ($list["amount"]); ?></td>
		<td><?php echo date('Y-m-d H:i:s',$list['time']); ?></td>
	<td><?php if($list['status'] == '1'): ?><span style="color:green">已成功</span><?php else: ?><span style="color:red">未成功</span><?php endif; ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</div>
<div class="pages"><?php echo ($page); ?></div>
</DIV>
</body>
</html>