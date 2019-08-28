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
        color: unset;
    }
</style>
<div class="content"  style="margin-top:10px;">
    <div class="weui-gallery__opr" style="background:rgb(95, 151, 116);z-index: 100;bottom: 160px;right:20px;left:unset;position: fixed;height: 50px;width:50px;border-radius: 25px;">
        <a id="app_list" href="<?php echo U('User/appTongji');?>" style="height: 50px;">
            <img style="float:left;margin-left:10px;margin-top:5px;width: 30px;height: 30px;" src="/Public/Mobile/default/images/baoming.png">
            <span style="width:100%;text-align:center;float:left;height: 10px;line-height: 10px;font-size: 10px;color: #fff">报名</span>
        </a>
    </div>
    <div class="weui-gallery__opr" style="background:rgb(95, 151, 116);z-index: 100;bottom: 100px;right:20px;left:unset;position: fixed;height: 50px;width:50px;border-radius: 25px;">
        <a id="check_list" href="<?php echo U('User/checkTongji');?>" style="height: 50px;">
            <img style="float:left;margin-left:15px;margin-top:10px;width: 20px;height: 20px;" src="/Public/Mobile/default/images/qiandao.png">
            <span style="margin-top:5px;width:100%;text-align:center;float:left;height: 10px;line-height: 10px;font-size: 10px;color: #fff">签到</span>
        </a>
    </div>
    <div class="weui-cells">
        <?php if(is_array($velist)): foreach($velist as $k=>$v): ?><a class="weui-cell weui-cell_access" href="<?php echo U('article/event_detail',array('id'=>$v['id']));?>">
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_text">
                    <h4 class="weui-media-box__title"><?php echo ($v["name"]); ?></h4>
                    <p class="weui-media-box__desc"><span>活动时间：</span><span style="color: red"><?php echo (date("Y-m-d",$v["stime"])); ?>至<?php echo (date("Y-m-d",$v["etime"])); ?></span></p>
                    <p class="weui-media-box__desc"><span>活动地址：</span><?php echo ($v["address"]); ?></p>
                    <p class="weui-media-box__desc"><span>活动场次：</span><?php echo ($v["alias"]); ?></p>
                </div>
            </div>
            <div class="weui-cell__ft"></div>
        </a><?php endforeach; endif; ?>
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