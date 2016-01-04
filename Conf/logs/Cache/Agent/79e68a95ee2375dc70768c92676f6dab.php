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
<div class="columntitle">优惠套餐</div>
<div class="ftip" style="margin:10px 0">您的余额为虚拟余额，不能使用余额进行购买。<?php if($alipayOpen): ?>您需要进行支付购买。<?php else: ?>您需要在下面点击购买然后把钱线下交给总管理员，然后由他给您开通购买。<?php endif; ?></div>
<div style="border:1px solid #E9EFF7;margin-top:10px;">


  <table cellspacing="1" cellpadding="1" class="listtable">
		<tr class="summary-title">
		    <td>套餐名称</td>
			<td>可开公众号数量</td>
			<td>标准价</td>
			<td>优惠价</td>
			<td>购买</td>
		</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr class="tdbg" onMouseOver="this.className='tdbg-dark';" onMouseOut="this.className='tdbg';" style="height:29px;">
        <td><?php echo ($list["name"]); ?></td>
        <td><?php echo ($list["maxaccount"]); ?></td>
        <td><span style="text-decoration:line-through"><?php echo $thisAgent['wxacountprice']*$list['maxaccount'];?>元</span></td>
		<td><?php echo ($list["price"]); ?>元</td>
		<td><a href="<?php if($alipayOpen): echo C('site_url').U('Agent/Pay/recharge',array('discountpriceid'=>$list['id'])); else: echo C('site_url').U('Agent/Basic/buyDiscountPrice',array('discountpriceid'=>$list['id'])); endif; ?>">购买</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</div>
<div class="pages"><?php echo ($page); ?></div>
</DIV>
</body>
</html>