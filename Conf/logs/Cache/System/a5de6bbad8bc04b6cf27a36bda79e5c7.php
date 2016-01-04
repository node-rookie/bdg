<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限管理</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<div id="artlist" class="addn">
		<?php if($list == null): ?><form action="<?php echo U('Images/insert');?>" method="post" name="form" id="myform">
		<?php else: ?>
			<form action="<?php echo U('Images/upsave');?>" method="post" name="form" id="myform"><?php endif; ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">

				 <tr>
					<th colspan="4">设置图片：</th>
				</tr>
				<tr>
					<td height="48" align="right"><strong>显示位置：</strong></td>
					<td colspan="3" class="lt">
						<?php echo ($title); ?>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>图片：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" class="ipt" id="pic" name="img" value="<?php echo ($img); ?>" style="width:300px"/> <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic','<?php echo ($token); ?>')">上传</a> <a href="###" onclick="viewImg('pic')">预览</a>
						<span style="color:red">&nbsp;&nbsp;&nbsp;建议尺寸：1600x300</span>
						<input name="mid" value="<?php echo ($id); ?>" type="hidden">
					</td>
				</tr>
				<tr>
					<td colspan="3" class="lt">
						<input type="hidden" name="pid" class="ipt" value="<?php echo ($pid); ?>" size="45"/>
					</td>
				</tr>
				
	<tr>
		<td colspan="4">
				<input class="bginput" type="submit" value="确 定" />
			&nbsp;
			<input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
	</tr>
</table>
</form>
<br />
<br />
<br />

</div>
</body>
</html>