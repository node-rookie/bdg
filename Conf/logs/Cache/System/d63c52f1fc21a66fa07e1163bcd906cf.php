<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限管理</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.css" />
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<script>

var editor;
KindEditor.ready(function(K) {
editor = K.create('#content', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
                        'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                        'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'music', 'video']
});

});
</script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<div id="artlist" class="addn">
<?php if(($info["id"]) > "0"): ?><script src="./tpl/User/default/common/js/date/WdatePicker.js"></script>
			<form action="<?php echo U('News/upsave');?>" method="post" name="form" id="myform">
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
		<?php else: ?>
			<form action="<?php echo U('News/insert');?>" method="post" name="form" id="myform"><?php endif; ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">

				 <tr>
					<th colspan="4"><?php echo ($title); ?></th>
				</tr>
				<tr>
					<td height="48" align="right"><strong>标题：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" name="title" class="ipt" size="95" value="<?php echo ($info["title"]); ?>" <?php if(($info["name"]) == "admin"): ?>readonly="readonly"<?php endif; ?>>
					</td>
				</tr>
				<tr>

					<td height="48" align="right"><strong>分类：</strong></td>
					<td colspan="3" class="lt">
							<select name="category" style="width:136px">
								<option value="1" <?php if(($info["category"]) == "1"): ?>selected<?php endif; ?>>新闻动态</option>
								<option value="2" <?php if(($info["category"]) == "2"): ?>selected<?php endif; ?>>系统公告</option>
								<option value="3" <?php if(($info["category"]) == "3"): ?>selected<?php endif; ?>>更新动态</option>																
								<option value="4" <?php if(($info["category"]) == "4"): ?>selected<?php endif; ?>>使用帮助</option>
							</select>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>图片：</strong></td>
					<td colspan="3" class="lt">			
						<input type="text" class="ipt" id="pic" name="imgs" size="95" value="<?php echo ($info["imgs"]); ?>" /> <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic',700,420,'<?php echo ($token); ?>')" style="color:red">上传</a> <a href="###" onclick="viewImg('pic')">预览</a>&nbsp;&nbsp;推荐尺寸大小，高度190像素，宽度440像素
					</td>
			</tr>
				<tr>
					<td height="48" align="right"><strong>更新时间：</strong></td>

					<td colspan="3" class="lt">
						<input type="text" name="showtime" onClick="WdatePicker()" class="ipt" size="45" value="<?php echo (date("Y-m-d",$info["showtime"])); ?>">
					</td>					
				</tr>
				<tr>				
				<tr>
					<td height="48" align="right"><strong>状态：</strong></td>
					<td colspan="3" class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="status" id="status1" <?php if(($info["status"] == 1) OR ($info['status'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="status" id="status2" <?php if(($info["status"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
				</tr>
					<td height="48" align="right"><strong>内容摘要：</strong></td>
					<td colspan="3" class="lt">

                        <textarea	 type="text" name="description" class="ipt" style="width:450px;height:60px;margin:5px 0 5px 0;" /><?php echo ($info["description"]); ?></textarea><span>&nbsp;&nbsp;一般不超过60个字符</span>
					</td>
				</tr>				
                <tr>
                    <td height="48" align="right"><strong>内容说明：</strong></td>
                    <td colspan="3" class="lt">
                    <textarea name="content" id="content" class="ipt"  rows="5" style="width:590px;height:360px"><?php echo ($info["content"]); ?></textarea>
                    </td>
                </tr>
    <tr>
        <td colspan="4" style="padding:10px 0 10px 160px;">
            <?php if(($info["id"]) > "0"): ?><button class="button" type="submit" name="" value="" >修 改</button>
                <?php else: ?>
                <button class="button" type="submit" name="" value="">添 加</button><?php endif; ?>
            &nbsp;
            <button class="button" onclick="javascript:history.back(-1);" value="" >返 回</button></td>
    </tr>
</table>
</form>
<br />
<br />
<br />

</div>

</body>

</html>