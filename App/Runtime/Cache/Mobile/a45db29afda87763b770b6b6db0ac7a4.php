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

<style>
    a:hover{
        color: #fff;
    }
</style>
<div class="content">
    <div class="dingdan_info1">
        <div class="mat10 font18 c333 aleft"><?php echo ($vo["name"]); ?></div>
        <div class="mat10 font12 c999 ">发布日期：<?php echo (date("Y-m-d",$vo["addtime"])); ?></div>
        <?php if($vo["stime"] != null): ?><div class="mat5 font12 c999 ">开始时间：<?php echo (date("Y-m-d",$vo["stime"])); ?></div><?php endif; ?>
        <?php if($vo["etime"] != null): ?><div class="mat5 font12 c999 ">截止时间：<?php echo (date("Y-m-d",$vo["etime"])); ?></div><?php endif; ?>
        <?php if($vo["alias"] != null): ?><div class="mat5 font12 c999 ">活动场次：<?php echo ($vo["alias"]); ?></div><?php endif; ?>
        <?php if($vo["address"] != null): ?><div class="mat5 font12 c999 ">活动地址：<?php echo ($vo["address"]); ?></div><?php endif; ?>
        <?php if($vo["address"] != null): ?><div class="mat5 font12 c999 ">活动介绍：</div>
            <div style="width: 100%;">
                <?php echo ($vo["content"]); ?>
            </div><?php endif; ?>
        <div class="clear"></div>
        <div class="xian"></div>
        <a style="margin-left:2%;margin-top:24px;font-size:1em;float :left;width: 45%;" href="<?php echo U('Article/appointmentList',array('e_id'=>$vo['id']));?>" class="weui-btn weui-btn_block weui-btn_primary">立即报名</a>
        <a style="margin-left:5%;margin-top:24px;font-size:1em;float :left;width: 45%;" href="<?php echo U('Article/checkList',array('e_id'=>$vo['id']));?>" class="weui-btn weui-btn_block weui-btn_primary">会场签到</a>

<!--        <div class="button-sp-area">-->
<!--            <div>-->
<!--                <div style="float: left;width: 70%;">-->
<!--                    <img style="width:180px;" src="/index.php/Mobile/Article/check_qrcode/id/<?php echo ($vo["id"]); ?>">-->
<!--                    <div style="width:180px;text-align: center;">签到二维码</div>-->
<!--                </div>-->
<!--                <div style="float :left;width: 30%;">-->
<!--                    <a style="margin-top:72px;font-size:1em;" href="<?php echo U('Article/checkList',array('e_id'=>$vo['id']));?>" class="weui-btn weui-btn_block weui-btn_primary">签到列表</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div>-->
<!--                <div style="float: left;width: 70%;">-->
<!--                    <img style="width: 180px;" src="/index.php/Mobile/Article/event_qrcode/id/<?php echo ($vo["id"]); ?>">-->
<!--                    <div style="width: 180px;text-align: center;">预约二维码</div>-->
<!--                </div>-->
<!--                <a style="margin-top:72px;font-size:1em;float :left;width: 30%;" href="<?php echo U('Article/appointmentList',array('e_id'=>$vo['id']));?>" class="weui-btn weui-btn_block weui-btn_primary">预约列表</a>-->
<!--            </div>-->
<!--        </div>-->
        <!--<div class="mat10 font18 c333 aleft">请扫描下方活动二维码：</div>-->
        <!--<div class="danye_main mat20">-->
            <!--<img src="http://xt.wxlyz.com/index.php/Mobile/Article/event_qrcode/id/<?php echo ($vo["id"]); ?>">-->
        <!--</div>-->
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