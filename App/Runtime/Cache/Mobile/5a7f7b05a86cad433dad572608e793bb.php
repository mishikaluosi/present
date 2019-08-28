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

<div class="top" style="margin-top: 28px;"></div>
<style>
    .tab_ul2 td{
        background: #fff;
    }
</style>
<div class="main" style="margin-bottom: 50px;">
    <table style="width:100%;font-size: 0.9em;line-height: 40px;text-align: center">
        <tr>
            <th>活动场次</th>
            <th>姓名</th>
            <th>预约保费</th>
            <th>实签保费</th>
            <th>时间</th>
        </tr>
        <?php if(is_array($vlist)): foreach($vlist as $k=>$v): ?><tr class='<?php if((($k+1)%2) == 1): ?>tab_ul2<?php endif; ?>'>
                <td><?php echo ($v["e_name"]); ?></td>
                <td><?php echo ($v["username"]); ?></td>
                <td><?php echo ($v["appointment_money"]); ?></td>
                <td><?php echo ($v["appointment_money_actual"]); ?></td>
                <td><?php echo (date('Y-m-d', $v["created_at"])); ?></td>
            </tr><?php endforeach; endif; ?>
    </table>
</div>
<div class="total" style="background:#fff;height: 50px;width: 100%;position: fixed;z-index:2;left: 0;bottom: 57px;border-top: 1px solid #ccc;">
    <div style="width:calc(20% - 1px);float: left;text-align: center;border-right: 1px solid #ccc;">
        <p style="width: 100%;height: 25px;color: #009900;line-height: 25px;"><?php echo ($total_event); ?></p>
        <p style="width: 100%;height: 25px;line-height: 25px;">合计场次</p>
    </div>
    <div style="width:calc(20% - 1px);float: left;text-align: center;border-right: 1px solid #ccc;">
        <p style="width: 100%;height: 25px;color: #009900;line-height: 25px;"><?php echo ($total_user); ?></p>
        <p style="width: 100%;height: 25px;line-height: 25px;">客户数</p>
    </div>
    <div style="width:calc(20% - 1px);float: left;text-align: center;border-right: 1px solid #ccc;">
        <p style="width: 100%;height: 25px;color: #009900;line-height: 25px;"><?php echo ($total_appointment_money); ?></p>
        <p style="width: 100%;height: 25px;line-height: 25px;">预约保费</p>
    </div>
    <div style="width:calc(20% - 1px);float: left;text-align: center;border-right: 1px solid #ccc;">
        <p style="width: 100%;height: 25px;color: #009900;line-height: 25px;"><?php echo ($total_appointment_money_actual); ?></p>
        <p style="width: 100%;height: 25px;line-height: 25px;">实签保费</p>
    </div>
    <div style="width: 20%;float: left;text-align: center;">
        <p style="width: 100%;height: 25px;color: #009900;line-height: 25px;"><?php echo ($total_per); ?></p>
        <p style="width: 100%;height: 25px;line-height: 25px;">回收率</p>
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