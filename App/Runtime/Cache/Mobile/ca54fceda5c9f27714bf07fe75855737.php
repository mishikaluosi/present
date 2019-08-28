<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<div class="search_bar" style="position:relative;margin-top:54px;height:50px;">
    <img class="search_icon" src="/Public/Mobile/default/images/search_2.png" style="
    top: 13px;
    display: block;
    width: 17px;
    position: absolute;
    left: 8%;">
    <input id="keywords" type="text" value="<?php echo ($keywords); ?>" placeholder="请输入用户名或手机号" style="
    line-height: 40px;
    height: 40px;
    padding-left: 35px;
    display: block;
    width: 80%;
    margin: 0 auto;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
    color:#666;
    ">
    <div class="clear"></div>
</div>
<div class="page__hd">
    <?php if(is_array($customer)): foreach($customer as $key=>$vo): ?><div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd" style="
            color: rgba(0, 0, 0, 0.9);
            font-size: 15px;
            font-weight: 700;
            height: 30px;
            line-height: 30px;
            ">
                <p class="fl" style="
                width:50%;
                line-height: 30px;
                height: 30px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                    ">
                    <img class="fl" src="/Public/Mobile/default/images/user.png" style="margin-right:5px;width:16px;margin-top:7px;"><?php echo ($vo["uname"]); ?>
                </p>
                <p class="fl" style="
                width:50%;
                line-height: 30px;
                height: 30px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;">
                    <img class="fl" src="/Public/Mobile/default/images/phone.png" style="margin-right:5px;width:16px;margin-top:7px;"><?php echo ($vo["phone"]); ?>
                </p>
            </div>
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_text">
                    <h4 class="weui-media-box__title">推荐客户1</h4>
                    <p class="weui-media-box__desc" style="height:25px;line-height: 25px;">姓名：<?php echo ($vo["khname1"]); ?></p>
                    <p class="weui-media-box__desc" style="height:25px;line-height: 25px;">手机：<?php echo ($vo["khtel1"]); ?></p>
                </div>
                <div class="weui-media-box weui-media-box_text">
                    <h4 class="weui-media-box__title">推荐客户2</h4>
                    <p class="weui-media-box__desc" style="height:25px;line-height: 25px;">姓名：<?php echo ($vo["khname2"]); ?></p>
                    <p class="weui-media-box__desc" style="height:25px;line-height: 25px;">手机：<?php echo ($vo["khtel2"]); ?></p>
                </div>
                <div class="weui-media-box weui-media-box_text">
                    <h4 class="weui-media-box__title">推荐客户3</h4>
                    <p class="weui-media-box__desc" style="height:25px;line-height: 25px;">姓名：<?php echo ($vo["khname3"]); ?></p>
                    <p class="weui-media-box__desc" style="height:25px;line-height: 25px;">手机：<?php echo ($vo["khtel3"]); ?></p>
                </div>
            </div>
        </div><?php endforeach; endif; ?>
</div>

<script type="text/javascript">
    $(function() {
        $("#keywords").bind("keypress",function(event){
            if(event.keyCode == 13) {
                var keywords = $("#keywords").val();
                var url = "<?php echo U('User/customer');?>&keywords="+keywords;
                window.location.href= url;
                return false;

            }
        })
    })
</script>
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