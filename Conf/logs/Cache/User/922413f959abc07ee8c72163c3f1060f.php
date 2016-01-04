<?php if (!defined('THINK_PATH')) exit();?><meta charset="utf-8" />
<script src="./tpl/static/jquery-1.4.2.min.js" type="text/javascript"></script>	
<link rel="stylesheet" type="text/css" href="/tpl/User/default/common/css/tplSilder.css" media="all" />
<script type="text/javascript" src="/tpl/User/default/common/js/tplSilder.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/cymain.css" />
 <script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<?php if($_GET['type'] == 2): ?><style>
			#viewTpl {
				width:170px;
				height:353px;		
				background:url(/tpl/User/default/common/images/img/radio_iphone.png) no-repeat;
				margin:auto;
			}

	</style>

	<div id="viewTpl"><img src="./tpl/User/default/common/css/catemenu-style/<?php echo ($info["view"]); ?>" /></div>
<?php else: ?>
	<div style="background:#fefbe4;border:1px solid #f3ecb9;color:#993300;padding:10px;margin-bottom:5px;font-size:13px;">
	使用方法：点击两侧的箭头可以翻页浏览更多的样式，直接点击对应的样式既可选中
	</div>
	<div class="list_carousel">
		<div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 960px; height: 383px; margin: 0px; overflow: hidden;">
			<ul id="foo2" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 11040px; height: 383px; z-index: auto;">
														
				<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><li>
					<a style="margin-bottom:5px;" href="javascript:void(0);" onclick="returnHomepage(<?php echo ($m["radiogroupid"]); ?>)" title="<?php echo ($m["name"]); ?>">
						<img src="./tpl/User/default/common/css/catemenu-style/<?php echo ($m["view"]); ?>" />
					</a>
					<span class="tplinfo">样式 <?php echo ($m["radiogroupid"]); ?></span>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
				
		</div>
		
		<div class="clearfix"></div>
		<a id="prev2" class="prev" href="#" style="display: block;"></a>
		<a id="next2" class="next" href="#" style="display: block;"></a>

	</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#foo2').carouFredSel({
					auto: false,
					prev: '#prev2',
					next: '#next2',
					pagination: "#pager2",
					mousewheel: true,
					swipe: {
						onMouse: true,
						onTouch: true
					}
				
				});

			});

			var domid=art.dialog.data('domid');
			var domid2=art.dialog.data('domid2');
			// 返回数据到主页面
			function returnHomepage(url){
				var origin = artDialog.open.origin;
				var dom = origin.document.getElementById(domid);
				var dom2 = origin.document.getElementById(domid2);

				dom.value=url;
				dom2.value='已选择样式 '+url;
				setTimeout("art.dialog.close()", 100 )
			}
		</script><?php endif; ?>