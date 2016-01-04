<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ($metaTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="./tpl/bj_qmxk/recouse/images/apple-touch-icon.png">
<link href="./tpl/static/storenew/style/home.css" rel="stylesheet" type="text/css" />
<link href="./tpl/static/storenew/style/foot.css" rel="stylesheet" type="text/css" />
<link href="./tpl/static/storenew/style/xin_v3.s.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/tpl/static/storenew/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="/tpl/static/storenew/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/tpl/static/storenew/js/fbi.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".row_list img").lazyload({
		placeholder: "/tpl/static/storenew/images/img_bg4.png",
		effect: "fadeIn"
	});
	$("#submit").click(function() {
		if($("#search_name").val()){
			$("#searchForm").submit();
		} else {
			alert("请输入关键词！");
			return false;
		}
	});
});
</script>
<style>
		.footer_banner {
		    background: none repeat scroll 0 0 rgba(30, 30, 33, 0.55);
		    color: #fff;
		    font-size: 15px;
		    height: auto;
			max-height:65px;
			min-height:55px;
		    left: 0;
		    padding: 2% 0;
		    position: fixed;
		    right: 0;
		    width: 100%;
		    z-index: 100;
			top:0;
		}
		.footer_banner .footer-fix-inner {
		    position: relative;
		}
		
		.footer_banner .banner_close {
		    border-bottom-right-radius: 25px;
		    color: #eaeaea;
		    display: block;
		    font-size: 20px;
		    font-style: normal;
		    height: 22px;
		    right: 0;
		    position: absolute;
		    top: 25%;
		    width: 20px;
		}
		.footer_banner .footer-open {
		    cursor: pointer;
		    height:90%;
		    line-height: 20px;
		    padding-left: 19%;
		    vertical-align: middle;
			padding-top:2%;
			padding-bottom:2%;
		}
		.footer_banner .dp-icon {
			background: url("<?php echo ($fans['portrait']); ?>") no-repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0);
			display: block;
		    height: 50px;
		    left: 2%;
		    position: absolute;
		    top: 10%;
		    width:50px;
			border-radius: 50%;
		}
		.footer_banner .wrap {
		    font-size: 15px;
		    vertical-align: middle;
		    width: 55%;
			color:white;
			font-family:Verdana,"华文细黑"; 
			font-weight:550;
		}
		.footer_banner .imm-open {
			background-color: #5cb85c;
		    border-color: #4cae4c;
		    color: #fff;
		    display: block;
		    font-size: 14px;
		    height: 33px;
		    line-height: 33px;
		    position: absolute;
		    right: 8%;
		    text-align: center;
		    top: 20%;
		    width: 25%; 
			border-radius: 5px; 
		}
    </style>
</head>
<body style="">


<!--div class="WX_search" id="mallHead">
    <div class="WX_bar_cate">
        <a href="<?php echo U('Storenew/cats',array('token'=>$token,'id'=>$o['id'],'wecha_id'=>$wecha_id, 'twid' => $twid));?>" id="__cate"></a>
    </div>
	<form class="WX_search_frm" action="" id="searchForm" name="searchForm">
		<input type="hidden" name="g" value="Wap" />
		<input type="hidden" name="m" value="Storenew" />
		<input type="hidden" name="a" value="products" />
		<input type="hidden" name="token" value="<?php echo ($token); ?>" />
		<input type="hidden" name="twid" value="<?php echo ($twid); ?>" />
		<input type="hidden" name="cid" value="<?php echo ($cid); ?>" />
		<input type="hidden" name="wecha_id" value="<?php echo ($wecha_id); ?>" />
        <input name="search_name" id="search_name" class="WX_search_txt hd_search_txt_null" placeholder="请输入商品名进行搜索！" ptag="37080.5.2" type="search"  AUTOCOMPLETE="off"/>
      
   
    <div class="WX_me">
        <a href="javascript:;" id="submit" class="WX_search_btn_blue" >搜索</a>
       
    </div>
	 </form>
</div-->
<?php if($is_sub == 2): ?><div style="" class="footer_banner">
	<div class="footer-fix-inner">
		<div id="footer_download" class="footer-open">
			<i class="dp-icon"></i>
			<p class="J_open_app wrap">亲爱的 <?php echo ($fans['truename']); ?> 你还未关注</p>
			<a class="imm-open J_open_app" href="<?php echo ($gzhurl); ?>">立即关注</a>
		</div>
	</div>
</div><?php endif; ?>
<div class="WX_tab Top_tab" id="toolbarHead">
    <div class="WX_tab_wrap">
        <span class="WX_tab_inner">
            <a href="<?php echo U('Storenew/cats',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>">分类</a>
			<a href="<?php echo U('Storenew/groupon',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>">t团购</a>
            <a href="<?php echo U('Storenew/xinpin',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>">新品</a>
            <a href="<?php echo U('Storenew/tuijian',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>">推荐</a>
            <a href="<?php echo U('Storenew/news',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>">资讯</a>
        </span>
    </div>
</div>


<div id="viewport" class="viewport">
  <div class="slider card card-nomb" style="visibility: visible;">
    <!-- banner轮播Start -->
    <script type="text/javascript" src="/tpl/static/storenew/js/TouchSlide.1.1.js"></script>
    <div id="focus" class="focus">
	<div class="hd">
        <ul>
        </ul>
      </div>

      <div class="bd">
        <ul>
       <?php if(is_array($piclist)): $i = 0; $__LIST__ = $piclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($o['url']); ?>"><img src="<?php echo ($o['img']); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <script type="text/javascript">
	TouchSlide({ 
		slideCell:"#focus",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul",
		delayTime:600,
		interTime:4000,
		effect:"leftLoop", 
		autoPlay:true,//自动播放
		autoPage:true, //自动分页
		switchLoad:"_src" //切换加载，真实图片路径为"_src" 
	});
	</script>
    <!-- banner轮播End -->
  </div>
  <?php if($dzdinfo != ''): ?><div class="site-info">
      <div class="site-logo">
        <img alt="Thumb photo" src="<?php echo ($dzduserinfo['portrait']); ?>" />
      </div>
      <div class="site-title">
		<?php echo ($dzdinfo['title']); ?>
	  </div>
    
      <div class="site-menu cellar-font">
        <ul>
		
          <li>
		  <a href="<?php echo U('Storenew/products',array('token' => $_GET['token'], 'twid' => $twid, 'cid' => $cid));?>" style="border-right: 1px solid #cccccc;display: block;padding-right:15px;">
            <div class="upper"><i><?php echo ($dzdcount); ?></i></div>
            <div class="label">全部宝贝</div>
			 </a>
          </li>
		  
          <li>
            <a href="#" style="border-right: 1px solid #cccccc;display: block;padding-right:15px;padding-left:15px;">
              <div class="upper"><i class="icons-star"></i></div>
              <div class="label">收藏本店</div>
            </a>
          </li>

          <li>
			
            <a href="<?php if($erweima != ''): echo ($erweima['imgurl']); else: ?>#<?php endif; ?>" style="display: block;padding-left:15px;padding-right:15px;">
              <div class="upper"><i class="icons-qrcode"></i></div>
              <div class="label">推广码</div>
            </a>
          </li>
		  
        </ul>		
      </div>
	  
    </div><?php endif; ?>

    <div class="rec_panel">
             <ul class="rec_list_v2" id="m1">
				<?php if(is_array($jingpai)): $i = 0; $__LIST__ = $jingpai;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><li status="1" title="<?php echo ($o['name']); ?>" aid="" qnum="" ynum="" skuid="">
					<a href="<?php echo U('Storenew/jingpai',array('token'=>$token,'wecha_id'=>$wecha_id, 'twid' => $twid));?>" class="item">
					  <div class="item_tag tag_red" style="display:">限时抢购
						<span yuyueid="" style="display:none"></span>
					  </div>
					  <div class="img"><img class="photo" usesrc="1" src="<?php echo ($o['logourl']); ?>"></div>
					  <div class="info">
						   <div class="name"><?php echo ($o['name']); ?></div>
						   <div class="desc">
						   <?php echo ($o['intro']); ?>
						   </div><br>
						   <div class="desc">
						   开始时间：<br><?php echo (date("Y-m-d H:i:s",$o["starttime"])); ?>
						   </div>
						   <div class="price">当前出价 ￥<?php echo ($o['price']); ?></div>
					  </div>
					  <div class="buy"><span class="btn">马上抢购</span></div>
					</a>
				  </li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
	</div>
  </div>


  
   <div class="mod_space_gap"></div>
	<div class="os_panel">
		<div class="hd">
			<h3>首页推荐</h3>
		</div>
		<ul class="os_box_list" id="m2Con">
		<?php if(is_array($itmes)): $i = 0; $__LIST__ = $itmes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><li>
				  <a href="<?php echo U('Storenew/product',array('token'=>$token,'id'=>$o['id'],'wecha_id'=>$wecha_id, 'twid' => $twid,'cid'=>$cid));?>" class="item">
					 
					  <div class="img"><img src="<?php echo ($o['logourl']); ?>"  usesrc="1" alt=""></div>
					  <div class="txt"><?php echo ($o['name']); ?></div>
					  <div class="buy">
						  <span class="price">￥<?php echo ($o['price']); ?></span>
						  <span class="btn">马上抢购</span>
					  </div>
				  </a>
			  </li><?php endforeach; endif; else: echo "" ;endif; ?>
	   </ul>
	   <div class="os_list_more" id="btnMore2"  pi="1">
		<a href="<?php echo U('Storenew/products',array('token' => $_GET['token'], 'twid' => $twid, 'cid' => $cid));?>"><span  class="btn_more" ptag="37328.3.2" >查看更多&nbsp;&gt;&gt; </span></a>
	</div>
   </div>
<!--页面底部-->
<div class="foot30"></div>
<div class="wx_nav">
	<a href="<?php echo U('Storenew/index',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>" data-href="###" class="nav_index on">首页</a>
	<!-- <a href="<?php echo U('Storenew/jingpai',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_search" style="display:">限时竞拍</a>
	 -->
	 <a href="tel:<?php echo ($com['tel']); ?>"  class="nav_search" style="display:">客服电话</a>
	<a href="<?php echo U('Storenew/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_shopcart">购物车</a>
	
	<?php if($is_sub == 2): ?><a href="<?php echo U('Storenew/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_me">个人中心</a>
	<a href="<?php echo ($gzhurl); ?>"  class="nav_fav">一键关注</a>
	<?php else: ?>
	<a href="<?php echo U('Storenew/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_shopping_guide">我的订单</a>
	<a href="<?php echo U('Storenew/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"  class="nav_me">个人中心</a><?php endif; ?>
</div>
<!--页面底部-->
<script>
    $(function(){
        var containerEl = $('.footer_banner'),
            hideBtnEl  = $('.J_close_banner'),
            downloadEl = $('#footer_download');

        var url = location.href;
        if (url && url.indexOf('product=dpapp') == -1) {
            containerEl.show();
        }

        hideBtnEl.on('click', function(e){
            containerEl.hide();
        });

        downloadEl.on('click', function(e){
            location.href = "<?php echo ($gzhurl); ?>";
        })


    })
</script>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Storenew",
            "moduleID":"<?php echo ($company['id']); ?>",
			<?php if($dzdinfo == ''): ?>"imgUrl": "<?php echo ($company['logourl']); ?>", <?php else: ?>"imgUrl": "<?php echo ($dzduserinfo['portrait']); ?>",<?php endif; ?>
           
            "timeLineLink": "<?php echo ($f_siteUrl); echo U('Storenew/index',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Storenew/index',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "weiboLink": "<?php echo ($f_siteUrl); echo U('Storenew/index',array('token' => $_GET['token'], 'twid' => $mytwid, 'cid' => $cid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
			<?php if($dzdinfo == ''): ?>"tContent": "<?php echo ($metaTitle); ?>"<?php else: ?>"tContent": "<?php echo ($dzdinfo['info']); ?>"<?php endif; ?>
        };
</script>
<?php echo ($shareScript); ?>
</body>
</html>