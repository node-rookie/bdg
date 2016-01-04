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
<div class="columntitle">基本信息</div>
<div style="border:1px solid #E9EFF7;">
<div style="padding:10px 20px;">
 <table class="addTable">
        <tr>
          <th align="right">代理商名称：</th>
          <td>
          <?php echo ($thisAgent["name"]); ?>
          </td>
          </tr>
            <tr>
          <th align="right">账户余额：</th>
          <td>
          <?php echo ($thisAgent["moneybalance"]); ?> 元 (此为虚拟金额，实际金额以充值记录为准)
          </td>
          </tr>
          <tr>
          <th align="right">用户数量：</th>
          <td>
          <?php echo ($userCount); ?> 个
          </td>
          </tr>
          <tr>
          <th align="right">公众号数量：</th>
          <td>
          <?php echo ($wxuserCount); ?> 个
          </td>
          </tr>
          <tr>
          <th align="right">到期时间：</th>
          <td>
          <?php echo date('Y-m-d',$thisAgent['endtime']);?>
          </td>
          </tr>
</table>
</div>
</div>
</DIV>
</body>
</html>