<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<script src="<?php echo $staticFilePath;?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/notification.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/swiper.min.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/main.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $staticFilePath;?>/css/style_touch.css">
<link type="text/css" rel="stylesheet" href="/tpl/static/store/style/<?php echo ($productSet['headerid']); ?>.css">
</head>
<script>
$(document).ready(function(){
	$(".m-hd .cat").parent('div').click( function() {
	    var docH=$(document).height();
	  	$('.sub-menu-list').toggle();
	    $(".m-right-pop-bg2").addClass("on").css('min-height',docH);
	});
	$(".m-right-pop-bg2").click( function() {
	    $('.sub-menu-list').hide();
		$(".m-right-pop-bg2").removeClass("on").removeAttr("style");
	});
});
</script>
<body>
<div id="top"></div>
<div id="scnhtm5" class="m-body">
<div class="m-detail-mainout">



<div class="m-hd">
<div><a href="javascript:history.go(-1);" class="back">返回</a></div>
<div><a href="javascript:void(0);" class="cat">商品分类</a></div>
<div class="tit"><?php echo ($metaTitle); ?></div>
<div><a href="<?php echo U('Store/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid, 'cid' => $cid));?>" class="uc">用户中心</a></div>
<div><a href="<?php echo U('Store/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid, 'cid' => $cid));?>" class="cart">购物车<i class="cart_com"><?php if($totalProductCount != 0): echo ($totalProductCount); endif; ?></i></a></div>
</div>

<ul class="sub-menu-list">
<li><a href="<?php echo U('Store/select',array('token' => $_GET['token'], 'wecha_id' => $wecha_id, 'twid' => $twid));?>">浏览店铺</a></li>
<li><a href="<?php echo U('Store/cats',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'cid' => $cid, 'twid' => $twid, 'cid' => $cid));?>">商城首页</a></li>
<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i; if($hostlist['isfinal'] == 1): ?><li><a href="<?php echo U('Store/products',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'twid' => $twid, 'cid' => $cid));?>"><?php echo ($hostlist["name"]); ?></a></li>
<?php else: ?>
<li><a href="<?php echo U('Store/cats',array('token' => $_GET['token'], 'cid' => $hostlist['cid'], 'parentid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'twid' => $twid, 'cid' => $cid));?>"><?php echo ($hostlist["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>


<form id="search_form" name="search_form" action="" method="post">
	<div class="m-l-search">
		<input type="hidden" name="wecha_id" value="<?php echo ($wecha_id); ?>" />
		<input type="hidden" name="token" value="<?php echo ($token); ?>" />
		<input type="hidden" name="twid" value="<?php echo ($twid); ?>" /> 
		<input id="search_name" class="inp-search" name="search_name" type="search" value="" placeholder="输入关键字搜索" />
		<input class="btn-search" name="search-btn" type="submit" value="" />
	</div>
</form>

<div class="m-select c666 order_control">
<span><a href="javascript:" order="time" class="arrow-down">时间<i><em></em></i></a></span>
<span><a href="javascript:" order="salecount">销量<i><em></em></i></a></span>
<span><a href="javascript:" order="price">价格<i><em></em></i></a></span>
<span><a href="javascript:" order="discount">折扣<i><em></em></i></a></span>
<input type="hidden" id="view_list" value="">
<!-- <span class="filter"><a href="javascript:;" class="ary li">排列</a><a href="javascript:;" class="flt">筛选</a></span> -->
</div>
<ul id="m_list" class="m-list ">
<?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i;?><li>
		<span class="pic">
			<a href="<?php echo U('Store/product',array('token' => $_GET['token'], 'id' => $hostlist['id'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $twid));?>">
			<img src="<?php echo ($hostlist["logourl"]); ?>" data-original="<?php echo ($hostlist["logourl"]); ?>">
		</a>
		</span>
		<span class="con">
			<a class="t" href="<?php echo U('Store/product',array('token' => $_GET['token'], 'id' => $hostlist['id'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $twid));?>"><?php echo ($hostlist["name"]); ?></a>
			<b>￥<?php echo ($hostlist["price"]); ?></b><del>￥<?php echo ($hostlist["oprice"]); ?></del>
			<span style="color:#999;font-size:8px;margin-top:15px;"><?php echo ($hostlist['salecount'] + $hostlist['fakemembercount']); ?>人付款</span>
		</span>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<a class="more" id="show_more" page="2" style="display: none;" href="javascript:void(0);">加载更多</a>
<input type="hidden" value="1" id="pageid" />
<input type="hidden" id="canScroll" value="1" />
<script type="text/javascript">
$(function() {
	$('#search_form').submit(function() {
		var search_name = $('#search_name').val();
		if (search_name == '') {
			return false;
		}
	});

	//点击排序
	var base_url = '<?php echo U('Store/products',array('token'=>$_GET['token'],'catid'=>$thisCat['id'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid));?>';
	var b_url = '<?php if($isSearch != 1): echo U('Store/ajaxProducts',array('token'=>$_GET['token'],'catid'=>$thisCat['id'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid)); else: echo U('Store/ajaxProducts',array('token'=>$_GET['token'],'keyword'=>$_GET['keyword'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid)); endif; ?>'
		method = 'DESC',
		_get_method = '<?php echo ($method); ?>',
		order = '<?php echo ($order); ?>',
		_get_order  = '';
	if (_get_order != '') {
		order = _get_order;
	}
	$('.order_control a').removeClass('arrow-down');
	if (_get_method == 'DESC')  {
		method = 'ASC';
		$('.order_control a[order="' + order + '"]').addClass('arrow-up');
	} else {
		$('.order_control a[order="' + order + '"]').addClass('arrow-down');
	}
	$('.order_control a').click(function() {
		var order = $(this).attr('order');
		var url = base_url + '&order=' + order+'&method='+method;
		location.href = url;
	});

	/*---------------------加载更多--------------------*/
	var total = <?php echo ($count); ?>,
		pagesize = 8,
		pages = Math.ceil(total / pagesize);
	var com_link = '<?php echo U('Store/product',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>';
	var label_arr = ["\u8bf7\u9009\u62e9\u6807\u7b7e","\u70ed\u5356","\u7206\u6b3e"];
	if (pages > 1) {
		var _page = $('#show_more').attr('page');
		$(window).bind("scroll",function() {
			if ($(document).scrollTop() + $(window).height() >= $(document).height()) {
				$('#show_more').show().html('加载中...');
				if (_page > pages) {
					$('#show_more').show().html('没有更多了').delay(2300).slideUp(1600);
					return;
				}
				if($('#canScroll').val()==0){//不要重复加载
					return;
				}
				$('#canScroll').attr('value',0);
				$.ajax({
					type : "GET",
					data : {'page' : _page, 'inajax' : 1},
					url :  b_url + '&order=' + order + '&method=' + _get_method + '&pagesize='+pagesize,
					dataType : "json",
					success : function(RES) {
						$('#canScroll').attr('value',1);
						$('#show_more').hide().html('加载更多');
						data = RES.products;
						if(data.length){
							$('#show_more').attr('page',parseInt(_page)+1);
						}
						_page = $('#show_more').attr('page');
						var _tmp_html = '';
						$.each(data, function(x, y) {
							_tmp_html +=    '<li><span class="pic">' +
							'<a href="' + com_link + '&id=' + y.id + '">' +
							'<img src="' +y.logourl + '" />' +
							'</a></span><span class="con"><a class="t" href="' + com_link + '&id=' + y.id + '">' + y.name + '</a><b>￥'+ y.price +'&nbsp;元</b><del>￥' + y.oprice + '</del>' +
							'<span style="color:#999;font-size:8px;margin-top:15px;">' + (parseInt(y.salecount) + parseInt(y.fakemembercount)) + '人付款</span></span></li>';
						});
						$('#m_list').append(_tmp_html);
					}
				});
			}
		});
	}
});
</script>
</body>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Store",
            "moduleID":"<?php echo ($products[0]['id']); ?>",
            "imgUrl": "<?php echo ($products[0]['logourl']); ?>", 
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Store/products',array('token' => $_GET['token'], 'catid' => $thisCat['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Store/products',array('token' => $_GET['token'], 'catid' => $thisCat['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Store/products',array('token' => $_GET['token'], 'catid' => $thisCat['id'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>