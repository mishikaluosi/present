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

<link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/style_3.css" />
<div class="content" style="margin-bottom:62px;">
    <div class="user_info">
        <div class="user_tx_box">
            <div class="user_tx">
                <img src="http://xt.wxlyz.com/index.php/Mobile/Do/qrcode/uid/<?php echo ($info["id"]); ?>">
            </div>
            <div class="user_text">
                <div class="" style=""><?php echo ($info["name"]); ?>&nbsp;&nbsp;<?php echo ($info["phone"]); ?>
                    <p class="mat10"><span class="dj_btn">组号：<?php echo ($info["group_no"]); ?></span></p>
                    <p class="mat10"><span class="dj_btn">工号：<?php echo ($info["work_no"]); ?></span></p>
                    <p class="mat10"><span class="dj_btn">职场：<?php echo ($zc["name"]); ?></span></p>
                </div>

            </div>
        </div>
    </div>
    <div class="side_all">
        <div class="side_fh1">
            <a href="<?php echo U('user/order');?>"><span><?php echo ($order["today"]); ?> 个</span>今日订单数</a>
            <a href="<?php echo U('user/order');?>"><span><?php echo ($order["month"]); ?> 个</span>本月订单数</a>
            <a href="<?php echo U('user/order');?>"><span><?php echo ($order["year"]); ?> 个</span>今年订单数</a>
            <div class="clear"></div>
        </div>

        <div class="nav">
            <a class="tgdd_tt" href="<?php echo U('user/order');?>"><span class="fl">我的订单</span><span class="fr c888 font13">查看全部订单</span><i class="more_jt"></i></a>
            <ul>
                <li><a href="<?php echo U('user/order',array('state'=>wpay));?>"><i class="user_tb1"></i>待付款<!--{if($tongji['wpay'] > 0):}--><span><?php echo ($tongji['wpay']); ?></span><!--{endif;}--></a></li>
                <li><a href="<?php echo U('user/order',array('state'=>wget));?>"><i class="user_tb3"></i>已付款<!--{if($tongji['wget'] > 0):}--><span><?php echo ($tongji['wget']); ?></span><!--{endif;}--></a></li>
                <li><a href="<?php echo U('user/order',array('state'=>success));?>"><i class="user_tb5"></i>交易完成<!--{if($tongji['success'] > 0):}--><span><?php echo ($tongji['success']); ?></span><!--{endif;}--></a></li>
            </ul>
            <div class="clear"></div>
        </div>

<!--        <div class="nav" style="padding-bottom: 0px;">-->
<!--            <a class="tgdd_tt" href="#" style="margin-bottom: 0px;">-->
<!--                <span class="fl">我的活动</span>-->
<!--            </a>-->
<!--        </div>-->
<!--            <div class="fenlei_list zx_list" style="margin-top:0px;">-->
<!--                <ul>-->
<!--                    <?php if(is_array($velist)): foreach($velist as $key=>$vo): ?>-->
<!--                        <li>-->
<!--                            <a href="<?php echo U('article/event_detail',array('id'=>$vo['id']));?>" title="<?php echo ($vo["name"]); ?>">-->
<!--                                <?php echo ($vo["name"]); ?>-->
<!--                                <?php if($vo["stime"] != null): ?>-->
<!--                                    <p class="cbbb font12 num">开始时间：<?php echo (date("Y-m-d",$vo["stime"])); ?></p>-->
<!--<?php endif; ?>-->
<!--                                <?php if($vo["etime"] != null): ?>-->
<!--                                    <p class="cbbb font12 num">截止时间：<?php echo (date("Y-m-d",$vo["etime"])); ?></p>-->
<!--<?php endif; ?>-->
<!--                                <?php if($vo["etime"] == null and $vo["stime"] == null): ?>-->
<!--                                    <p class="cbbb font12 num">添加时间：<?php echo (date("Y-m-d",$vo["addtime"])); ?></p>-->
<!--<?php endif; ?>-->

<!--                            </a>-->
<!--                            <i></i>-->
<!--                        </li>-->
<!--<?php endforeach; endif; ?>-->
<!--                </ul>-->
<!--                <div class="clear"></div>-->
<!--            </div>-->
        <div class="nav" style="padding-bottom: 0px;">
            <a class="tgdd_tt" href="<?php echo U('user/event');?>">
                <span class="fl">我的活动</span><span class="fr c888 font13">查看全部活动</span>
                <i class="more_jt"></i>
            </a>
        </div>
            <div class="clear"></div>
        <div class="nav" style="padding-bottom: 0px;">
            <a class="tgdd_tt" href="<?php echo U('user/customer');?>">
                <span class="fl">我的客户</span><span class="fr c888 font13">查看全部客户</span>
                <i class="more_jt"></i>
            </a>
        </div>

        <div class="ck_nav mat10">
            <ul>
                <li><a href="<?php echo U('User/setting');?>"><i class="ck_i2"></i><span>修改密码</span><p></p></a></li>
                <li><a href="<?php echo U('User/zc');?>"><i class="ck_i3"></i><span>我的职场</span><p></p></a></li>
                <li><a href="<?php echo U('User/base');?>"><i class="ck_i4"></i><span>帐号设置</span><p></p></a></li>
                <?php if($info["area_level"] == 1): ?><li><a href="<?php echo U('User/orderTongji',array('type'=>'area'));?>"><i class="ck_i7"></i><span>职场-订单统计</span><p></p></a></li>
                    <li><a href="<?php echo U('User/eventTongji',array('type'=>'area'));?>"><i class="ck_i8"></i><span>职场-活动统计</span><p></p></a></li><?php endif; ?>
                <?php if($info["city_level"] == 1): ?><li><a href="<?php echo U('User/orderTongji',array('type'=>'city'));?>"><i class="ck_i7"></i><span>支公司-订单统计</span><p></p></a></li>
                    <li><a href="<?php echo U('User/eventTongji',array('type'=>'city'));?>"><i class="ck_i8"></i><span>支公司-活动统计</span><p></p></a></li><?php endif; ?>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="ck_nav_xian"></div>
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