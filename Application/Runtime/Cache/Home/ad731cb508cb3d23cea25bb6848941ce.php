<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo ($page_title); ?></title>
	<meta name="keywords" content="<?php echo ($page_keywords); ?>" />
	<meta name="description" content="<?php echo ($page_description); ?>" />
	<link rel="stylesheet" href="/php34/Public/Home/style/base.css" type="text/css">
	<link rel="stylesheet" href="/php34/Public/Home/style/global.css" type="text/css">
	<link rel="stylesheet" href="/php34/Public/Home/style/header.css" type="text/css">
	<?php foreach ($page_css as $k => $v): ?>
	<link rel="stylesheet" href="/php34/Public/Home/style/<?php echo ($v); ?>.css" type="text/css">
	<?php endforeach; ?>
	<link rel="stylesheet" href="/php34/Public/Home/style/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/php34/Public/Home/style/footer.css" type="text/css">
	<script type="text/javascript" src="/php34/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/php34/Public/Home/js/header.js"></script>
	<?php foreach ($page_js as $k => $v): ?>
	<script type="text/javascript" src="/php34/Public/Home/js/<?php echo ($v); ?>.js"></script>
	<?php endforeach; ?>
</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li id="logInfo">您好，欢迎来到伟良家电商城！[<a href='<?php echo U('Home/Member/login'); ?>'>登录</a>] [<a href='<?php echo U('Home/Member/regist'); ?>'>免费注册</a>]</li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
	<div style="clear:both;"></div>

	<!-- 内容 -->
	
<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="/php34/Public/Home/images/logo.png" alt="京西商城"></a></h2>
			<div class="flow fr">
				<ul>
					<li class="cur">1.我的购物车</li>
					<li>2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	<div style="clear:both;"></div>
	<form method="POST" action="<?php echo U('order'); ?>">
	<!-- 主体部分 start -->
	<div class="mycart w990 mt10 bc">
		<h2><span>我的购物车</span></h2>
		<table>
			<thead>
				<tr>
					<th></th>
					<th class="col1">商品名称</th>
					<th class="col2">商品信息</th>
					<th class="col3">单价</th>
					<th class="col4">数量</th>
					<th class="col5">小计</th>
					<th class="col6">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  $tp = 0; foreach ($data as $k => $v): ?>
				<tr goods_id="<?php echo ($v["goods_id"]); ?>" goods_attr_id="<?php echo ($v["goods_attr_id"]); ?>">
					<td><input type="checkbox" value="<?php echo ($v["goods_id"]); ?>-<?php echo ($v["goods_attr_id"]); ?>" name="buythis[]" /></td>
					<td class="col1">
					<a href=""><?php showImage($v['sm_logo']); ?></a>  <strong><a href=""><?php echo ($v["goods_name"]); ?></a></strong></td>
					<td class="col2"> <?php echo ($v["goods_attr_str"]); ?> </td>
					<td class="col3">￥<span><?php echo ($v["price"]); ?></span>元</td>
					<td class="col4"> 
						<a href="javascript:;" class="reduce_num"></a>
						<input type="text" name="amount" value="<?php echo ($v["goods_number"]); ?>" class="amount"/>
						<a href="javascript:;" class="add_num"></a>
					</td>
					<td class="col5">￥<span><?php $xj = $v['goods_number'] * $v['price']; $tp+=$xj; echo $xj; ?></span>元</td>
					<td class="col6"><a href="">删除</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="7">购物金额总计： <strong>￥ <span id="total"><?php echo ($tp); ?></span>元</strong></td>
				</tr>
			</tfoot>
		</table>
		<div class="cart_btn w990 bc mt10">
			<a href="/" class="continue">继续购物</a>
			<a href="javascript:void(0);" onclick="$('form').submit();" class="checkout">结 算</a>
		</div>
	</div>
	<!-- 主体部分 end -->
	</form>
	
<script>
function ajaxUpdateCartData(goodsId, goodsAttrId, goodsNumber)
{
	var _gaid = "";
	if(goodsAttrId != "")
		_gaid = "/gaid/"+goodsAttrId;
	// 以GET方式请求一个地址
	$.get("<?php echo U('Home/Cart/ajaxUpdateData', '', FALSE); ?>/gid/"+goodsId+"/gn/"+goodsNumber+_gaid);
}
</script>
	
	<!-- 底部导航 end -->
	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
		</p>
		<p class="copyright">
			 © 2005-2013 伟良网上商城 版权所有，并保留所有权利。
		</p>
		<p class="auth">
			<a href=""><img src="/php34/Public/Home/images/xin.png" alt="" /></a>
			<a href=""><img src="/php34/Public/Home/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="/php34/Public/Home/images/police.jpg" alt="" /></a>
			<a href=""><img src="/php34/Public/Home/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->

</body>
</html>
<script>
// AJAX判断登录状态
$.ajax({
	type : "GET",
	url : "<?php echo U('Home/Member/ajaxChkLogin'); ?>",
	dataType : "json",  // 指定服务器返回json
	success : function(data)
	{
		if(data.ok == 1)
			var html = "您好，"+data.email+" <a href='<?php echo U('Home/Member/logout'); ?>'>[退出]</a>";
		else
			var html = "您好，欢迎来到伟良家电商城！[<a href='<?php echo U('Home/Member/login'); ?>'>登录</a>] [<a href='<?php echo U('Home/Member/regist'); ?>'>免费注册</a>] ";
		$("#logInfo").html(html);
	}
});
</script>