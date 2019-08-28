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

<div class="content" >
    <div class="main" >
        <div class="hy_tt" style="margin-top: 26px;">
            <ul>
                <li style="width:20%"><a style="width:100%;padding: 9px 0;" href="<?php echo U('User/order');?>" <?php if($state == null): ?>class="sel"<?php endif; ?>>全部</a></li>
                <li style="width:20%"><a style="width:100%;padding: 9px 0;"  href="<?php echo U('user/order',array('state'=>'wpay'));?>" <?php if($state == 'wpay'): ?>class="sel"<?php endif; ?>>待付款</a></li>
                <li style="width:20%"><a style="width:100%;padding: 9px 0;"  href="<?php echo U('user/order',array('state'=>'wget'));?>" <?php if($state == 'wget'): ?>class="sel"<?php endif; ?>>已付款</a></li>
                <li style="width:20%"><a style="width:100%;padding: 9px 0;"  href="<?php echo U('user/order',array('state'=>'success'));?>" <?php if($state == 'success'): ?>class="sel"<?php endif; ?>>交易完成</a></li>
                <li style="width:20%"><a style="width:100%;padding: 9px 0;"  href="<?php echo U('user/order',array('state'=>'close'));?>" <?php if($state == 'close'): ?>class="sel"<?php endif; ?>>交易关闭</a></li>
            </ul>
        </div>

    <?php if($info_list): if(is_array($info_list)): foreach($info_list as $k=>$v): ?><div class="dingdan_tt" style="font-size:13px">
            <span class="fl c666"><?php echo date('Y-m-d h:i',$v['order_atime'])?></span>
            <span class="fr"><?php echo (order_stateshow($v['order_state'])); ?></span>
            <div class="clear"></div>
        </div>
        <div class="dingdan_info" style="padding:0;">
            <?php if(is_array($v["product_list"])): foreach($v["product_list"] as $kk=>$vv): ?><a href="<?php echo U('Order/view',array('id'=>$v['order_id']));?>" class="order_a">
                <div class="dingdan_img"><img src="/uploads//<?php echo (get_picture($vv['product_logo'],100,100)); ?>"></div>
                <div class="dingdan_name" style="line-height:20px;">
                    <div style="height:40px; overflow:hidden; line-height:20px;">
                        <?php echo ($vv['product_name']); ?>
                    </div>
                    <div class="c888"><?php echo (order_skushow($vv['product_rule'])); ?></div>
                </div>
            </a><?php endforeach; endif; ?>
            <div class="xuxian2"></div>
            <div class="yingfu">
                <div class="order_yf fr">合计：¥ <span class="font16 mar5"><?php echo ($v['order_product_money']); ?></span></div>
                <div class="clear"></div>
                <div class="fr" style="padding:8px 10px 10px;">
                    <?php if($v['order_state'] == 'wpay'): ?><a style="background:none;color: #ff5500" class="tag_org fl" href="<?php echo U(MODULE_NAME.'/Order/pay',array('id'=>$v['order_id']));?>">立即付款</a>
                        <a style="background:none;color: #3d4244" class="tag_gray fl mal10" href="javascript:app_iframe('<?php echo U(MODULE_NAME."/User/close",array("id"=>$v["order_id"]));?>')">取消订单</a><?php endif; ?>
                    <?php if($v['order_state'] == 'wget' and $v['edit_flag'] == 0): ?><a style="background:none;color: #ff5500" class="tag_org fl" href="javascript:app_iframe('<?php echo U(MODULE_NAME."/User/apply",array("id"=>$v["order_id"]));?>')">申请改单</a><?php endif; ?>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div><?php endforeach; endif; ?>
    <?php else: ?>
        <div class="nodata">
            <div class="nodata_img"></div>
            <div class="nodata_tip">暂无信息</div>
        </div><?php endif; ?>
        <div class="fenye mab10"><?php echo ($page); ?></div>
    </div>
</div>
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

</html>