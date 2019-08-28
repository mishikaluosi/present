<?php if (!defined('THINK_PATH')) exit();?>﻿﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <title>保礼街</title>
    <meta name="keywords" content="保礼街" />
    <meta name="description" content="保礼街" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">

    <link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/style.css" />
    <link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/style2.css" />
    <link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/style_1.css" />
    <script type="text/javascript" src="/Public/Mobile/default/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Mobile/default/js/global.js"></script>
    <script type="text/javascript" src="/Public/Mobile/default/js/arttpl.js"></script>

    <link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/iconfont.css" />
</head>
<body>
<div class="top_box1">
    <div class="pagetop1">
        <div class="top_logo">
            <a href="<?php echo U('Index/index');?>">
                <img src="/Public/Mobile/default/images/logo_small.jpg" alt="保礼街" />
            </a>
        </div>
        <!--<div class="sear" onclick="javascript:app_iframe('<?php echo ($pe['host_root']); ?>index.php?mod=search');">
            <div class="sear_input_box"><input name="keyword" type="text" class="sear_input" placeholder="搜索关键字" /></div>
            <div class="sear_tj"><input type="button" value=" "></div>
            <div class="clear"></div>
        </div>-->
        <div class="sear" style="text-align: center;font-size: 16px;font-weight: bold;letter-spacing: 4px">保礼街</div>
        <div class="cd">
            <a href="javascript:top_menu();"></a>
        </div>
        <div class="top_tc" id="top_menu">
            <ul>
                <li><a href="<?php echo U('Index/index');?>"><i class="top_tb1"></i><span>首页</span></a></li>
                <li><a href="<?php echo U('Cart/index');?>"><i class="top_tb3"></i><span>购物车</span></a></li>
                <li><a href="<?php echo U('User/index');?>"><i class="top_tb4"></i><span>个人中心</span></a></li>
                <li><a href="<?php echo U('User/order');?>"><i class="top_tb2"></i><span>订单</span></a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>

<link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/style_4.css">
<link href="/Public/Mobile/default/css/layer.css?2.0" type="text/css" rel="styleSheet" id="layermcss">
<div class="content"  style="margin-top: 25px;">
<div class="zt_box" >
    <p><?php echo (order_stateshow($info['order_state'],text)); ?></p>
    <?php if($info['order_state'] == 'close'): ?><div class="font12">关闭说明：<?php echo ($info['order_closetext']); ?></div><?php endif; ?>
    <i></i>
</div>
<div class="dd_zt">
    <div class="dd_fh dd_sh">
        <div class="dd_fh_text" style="margin-right:20px;">
            <div>
                <span class="fl">收货人：<?php echo ($info['user_tname']); ?></span>
                <span class="fr"><?php echo ($info['user_phone']); ?></span>
                <div class="clear"></div>
            </div>
            <div>收货地址：<?php echo ($info['user_address']); ?></div>
        </div>
    </div>
</div>
<div class="main" style="margin-top:0; margin-bottom:55px;">
    <div class="dingdan_tt3"><span>商品清单</span></div>

    <?php if(is_array($product_list)): foreach($product_list as $key=>$v): ?><div class="order_a">
        <div class="dingdan_img">
            <a href="<?php echo U('Product/detail',array('id'=>$v['product_id']));?>">
                <img src="/uploads//<?php echo (get_picture($v['product_logo'],400,400)); ?>" />
            </a>
        </div>
        <div class="dingdan_name">
            <p style="height:40px; overflow:hidden;">
                <a href="<?php echo U('Product/detail',array('id'=>$v['product_id']));?>"><?php echo ($v['product_name']); ?></a>
            </p>
            <div class="c888"><?php echo (order_skushow($v['product_rule'])); ?></div>
        </div>
        <div class="dingdan_jg">
            <p>¥<?php echo ($v['product_money']); ?></p>
            <p class="c999 font12">×<?php echo ($v['product_num']); ?></p>
        </div>
        <div class="clear"></div>
        <div class="tk_box">
        </div>
        <div class="clear"></div>
    </div>
    <div class="xuxian2"></div><?php endforeach; endif; ?>
    <div class="dingdan_info">
        <div class="order_xq">
            <span class="fl c999">商品金额</span><span class="fr">¥ <?php echo ($info['order_product_money']); ?></span>
            <div class="clear"></div>
            <span class="fl c999">运　　费</span><span class="fr">¥ <?php echo ($info['order_wl_money']); ?></span>
            <div class="clear"></div>
            <span class="fl c999">实付金额</span><span class="fr font16 cred">¥ <?php echo ($info['order_money']); ?></span>
            <div class="clear"></div>
        </div>
    </div>
    <div class="dingdan_tt3"><span>订单信息</span></div>
    <div class="dingdan_info">
        <div><span class="c999">订单编号：</span><?php echo ($info['order_id']); ?></div>
        <div><span class="c999">下单时间：</span>
            <?php if($info['order_atime']): echo date('Y-m-d h:i',$info['order_atime']); endif; ?>
        </div>
        <div><span class="c999">付款时间：</span>
            <?php if($info['order_ptime']): echo date('Y-m-d h:i',$info['order_ptime']); endif; ?>
        </div>
        <div><span class="c999">发货时间：</span>
            <?php if($info['order_stime']): echo date('Y-m-d h:i',$info['order_stime']); endif; ?>

        </div>
        <div><span class="c999">付款方式：</span>
            <?php if($info['order_payment_name']): echo ($info['order_payment_name']); ?>
            <?php else: ?>
                尚未付款<?php endif; ?>
        </div>
        <div><span class="c999">买家留言：</span>
            <?php if($info['order_text']): echo ($info['order_text']); endif; ?>
        </div>
    </div>

    <?php $elist=empty($info['edit_text'])?'':explode('|||',$info['edit_text']); ?>
    <?php if($elist): ?><div class="dingdan_tt3"><span>订单修改记录</span></div>
    <div class="dingdan_info">
        <?php if(is_array($elist)): foreach($elist as $k=>$v): ?><div><span style="color: #ff5500">(<?php echo ($k+1); ?>) </span><?php echo ($v); ?></div><?php endforeach; endif; ?>
    </div><?php endif; ?>
</div>
<div class="zt_bot">
    <div style="padding:0 10px;float: right">
        <?php if($info['order_state'] == 'wpay'): ?><a style="background:none;color: #ff5500" class="tag_org fl" href="<?php echo U(MODULE_NAME.'/Order/pay',array('id'=>$info['order_id']));?>">立即付款</a>
            <a style="background:none;color: #3d4244" class="tag_gray fl mal10" href="javascript:app_iframe('<?php echo U(MODULE_NAME."/User/close",array("id"=>$info["order_id"]));?>')">取消订单</a><?php endif; ?>
        <?php if($info['order_state'] == 'wget' and $info['edit_flag'] == 0): ?><a style="background:none;color: #ff5500" class="tag_org fl" href="javascript:app_iframe('<?php echo U(MODULE_NAME."/User/apply",array("id"=>$info["order_id"]));?>')">申请改单</a><?php endif; ?>
    </div>
    <div style="clear: both"></div>
</div>
</div>
<script type="text/javascript">
    $(function() {
        if ($(".zt_bot a").length == 0) {
            $(".zt_bot").remove();
            $(".main").css("margin-bottom", "10px");
        }
    })
</script>
<style type="text/css">
    body {
        background: #e8e8ed
    }
</style>
<?php if($info['order_state'] == 'wpay' or $info['order_state'] == 'wget'): ?>﻿
<link rel="stylesheet" href="/Public/Mobile/default/css/weui.min.css">
<link rel="stylesheet" href="/Public/Mobile/default/css/layer.css">
<link rel="stylesheet" href="/Public/Mobile/default/css/jquery-weui.min.css">
<script src="/Public/Mobile/default/js/jquery-weui.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/layer.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/app.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/jquery.scrollloading.js"></script>
<script type="text/javascript">
    $(function() {
        $("img.js_imgload").scrollLoading();
    });
    //顶部菜单点击
    function top_menu() {
        if ($("#top_menu").is(":hidden")) {
            $("#top_menu").show();
        } else {
            $("#top_menu").hide();
        }
        $("#top_menu a").live("click", function() {
            $("#top_menu").hide();
        })
    }
</script>
</body>

</html>
<?php else: ?>
    ﻿<div class="foot_nav">
    <ul>
        <ul>
            <li style='width:25%'><a href="<?php echo U('Index/index');?>" <?php if($_C_NAME == 'Index'): ?>class="sel"<?php endif; ?>><i class="foot_i1"></i><span>首页</span></a></li>
            <li style='width:25%'><a href="<?php echo U('Cart/index');?>" <?php if($_C_NAME == 'Cart'): ?>class="sel"<?php endif; ?>><i class="foot_i5"></i><span>购物车</span></a></li>
            <li style='width:25%'><a href="<?php echo U('User/index');?>" <?php if($_C_NAME == 'User' and $_A_NAME != 'order'): ?>class="sel"<?php endif; ?>><i class="foot_i4"></i><span>个人中心</span></a></li>
            <li style='width:25%'><a href="<?php echo U('User/order');?>" <?php if($_C_NAME == 'User' and $_A_NAME == 'order'): ?>class="sel"<?php endif; ?>><i class="foot_i2"></i><span>订单</span></a></li>
        </ul>
    </ul>
    <div class="clear"></div>
</div>


<div class="fenye mat10  mab60">
    <div class="clear"></div>
</div>

<link rel="stylesheet" href="/Public/Mobile/default/css/weui.min.css">
<link rel="stylesheet" href="/Public/Mobile/default/css/layer.css">
<link rel="stylesheet" href="/Public/Mobile/default/css/jquery-weui.min.css">
<script src="/Public/Mobile/default/js/jquery-weui.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/layer.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/app.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/jquery.scrollloading.js"></script>
<script type="text/javascript">
    $(function() {
        $("img.js_imgload").scrollLoading();
    });
    //顶部菜单点击
    function top_menu() {
        if ($("#top_menu").is(":hidden")) {
            $("#top_menu").show();
        } else {
            $("#top_menu").hide();
        }
        $("#top_menu a").live("click", function() {
            $("#top_menu").hide();
        })
    }
</script>
</body>

</html><?php endif; ?>