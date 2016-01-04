<?php if (!defined('THINK_PATH')) exit();?><div id="top" class="alert alert-info" style="line-height: 16px;padding-bottom:0px;">
				父级菜单：	<select name="pid" id="pid">
					<option selected="selected" value="0">请选择根菜单：</option>
					<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pid): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($pid["id"]); ?>" <?php if($show['pid'] == $pid['id']): ?>selected<?php endif; ?>><?php echo ($pid["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				<span style="color:red">二级菜单需要选择父菜单</span>
		</div>
		<div id="top" class="alert alert-info" style="line-height: 16px;padding-bottom:0px;">
			菜单名称：<input type="text" id="cdmcinpo" name="title" value="<?php echo ($show["title"]); ?>" style="margin-top: 6px;">
			<span style="color:red">一级菜单最多4个汉字</span>
		</div>
		
		<div class="alert alert-info" style="line-height: 16px;padding-bottom:6px;">
			显　　示：
			<input type="radio" name="is_show" <?php if($show['is_show'] == 1): ?>checked="checked"<?php endif; ?> value="1">是　　　　
			<input type="radio" name="is_show" <?php if($show['is_show'] == 0): ?>checked="checked"<?php endif; ?> value="0">否
		</div>
		<div class="alert alert-info" style="line-height: 16px;padding-bottom:0px;">
			排　　序：<input id="sortid" name="sort" title="排序" value="<?php echo ($show["sort"]); ?>" type="text" >			
			<span style="color:red">数字大的排在前面（不填默认为0）</span>
		</div>
		<div class="system l"></div>
		
		<div class="control-group alert alert-info">
			  <label class="control-label" for="answertype">菜单类型:</label>
			    <div class="controls">
			    
					<select name="menu_type" class="menu_type" id="answertype">
						<option value="1" <?php if($type == 1): ?>selected<?php endif; ?>>关键词回复菜单</option>		
						<option value="2" <?php if($type == 2): ?>selected<?php endif; ?>>url链接菜单</option>
						<option value="3" <?php if($type == 3): ?>selected<?php endif; ?>>微信扩展菜单</option>
						<option value="4" <?php if($type == 4): ?>selected<?php endif; ?>>一键拔号菜单</option>
						<option value="5" <?php if($type == 5): ?>selected<?php endif; ?>>一键导航</option>
					</select>
			   </div>
		  	</div>  	

			<!-- 关键字  -->
			<div class="szcjbt alert alert-info" <?php if($show["keyword"] != ''): ?>style="display:block;"<?php endif; ?> id="res_1">
				要触发的关键字：<input type="text" name="keyword" id="menu_keyword"  value="<?php echo ($show["keyword"]); ?>" >
				<a href="###" onclick="addLink('menu_keyword',1)" class="a_choose">从功能库添加</a>
			</div>
			<!-- url  -->
			<div class="szcjbt alert alert-info"<?php if($show["url"] != ''): ?>style="display:block;"<?php endif; ?> id="res_2">
				要链接到的URL地址：<input type="text" name="url" id="menu_key" value="<?php echo ($show["url"]); ?>" >
				<?php if($wxuser['oauth'] == 1): ?><a href="###" onclick="addLink('menu_key',0)" class="a_choose">从功能库添加</a><?php endif; ?><br/>
				<span style="color:red">必须开启授权, 禁止使用短网址</span><br/>
			</div>
			
			<!-- 扩展菜单  -->
			<div class="szcjbt alert alert-info" <?php if($show["wxsys"] != ''): ?>style="display:block;"<?php endif; ?> id="res_3">
				扩展菜单：
					<div class="mr15 l">
						<select name="wxsys">
							<?php if(is_array($wxsys)): $i = 0; $__LIST__ = $wxsys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wxsys): $mod = ($i % 2 );++$i;?><option value="<?php echo ($wxsys); ?>" <?php if($wxsys == $show['wxsys']): ?>selected<?php endif; ?>><?php echo ($wxsys); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
			</div>
			
			<!-- 一键拔号 -->
			<div class="szcjbt alert alert-info" <?php if($show["tel"] != ''): ?>style="display:block;"<?php endif; ?> id="res_4">
				一键拔号：<input type="text" name="tel" value="<?php echo ($show["tel"]); ?>"><br/>
				<span style="color:red">格式：0551-65371998 或 13912345678</span>
			</div>
			
			<!-- 一键导航 -->
			<div class="szcjbt alert alert-info" <?php if($show["nav"] != ''): ?>style="display:block;"<?php endif; ?> id="res_5">
				一键导航：<input value="<?php echo ($show["longitude"]); ?>" type="text" name="longitude"  id="longitude" style="width:80px;" > 
						<input value="<?php echo ($show["latitude"]); ?>" style="width:80px;" type="text" name="latitude"  id="latitude" >
						<a href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())">在地图中查看/设置</a><br/>
			</div>
			
			<p style="text-align:center;">
				<button class="btnGreen" style="width:80px;line-height:30px;margin-top:10px;" type="submit">保存</button>
			</p>