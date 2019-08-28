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


<div class="content" >
    <div class="swiper-container jdt">
        <div class="swiper-wrapper">
            <?php
 $_id = intval(1); $where = array('aid'=> $_id, 'status' => 1); $limit = "8"; $abc_cate = M('abc')->find($_id); if ($abc_cate) { $limit = empty($limit) ? $abc_cate['num'] : $limit; $_abc = M('abcDetail')->where($where)->order('sort')->limit($limit)->select(); }else { $_abc = array(); } if (empty($_abc)) { $_abc = array(); } foreach($_abc as $autoindex => $abc): $abc['width'] = $abc_cate['width']; $abc['url'] = GetAbcUrl($abc['url']); $abc['height'] = $abc_cate['height']; ?><div class="swiper-slide">
                    <a href="<?php echo ($abc["url"]); ?>" ><img src="/uploads/<?php echo ($abc["content"]); ?>" /></a>
                </div><?php endforeach;?>
            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="index_gg" id="gundong_html">
        <div class="gg_tt">公告</div>
        <div class="index_gglist gundong_list">
            <div class="tempWrap" style="overflow:hidden; position:relative; height:21px">
                <ul style="height: 84px; position: relative; padding: 0px; margin: 0px; top: -42px;">
                   <?php if(is_array($news_list)): foreach($news_list as $key=>$vo): ?><li style="height: 21px;"><a class="new_name" href="<?php echo U('article/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
            </div>
            <a class="new_more" href="<?php echo U('article/index',array('cid'=>C('_Index_News_cid')));?>">更多</a>
        </div>
    </div>


    <div class="tuijian_list mat10">
    <a href="#" title="">
        <div class="tuijian_tt">
            <p></p>所有礼品<i class="tj_more"></i></div>
    </a>
    <ul>
        <?php if(is_array($plist)): foreach($plist as $k=>$v): ?><li>
            <div class="li_box">
                <a href="<?php echo U('Product/detail',array('id'=>$v['id']));?>" title="<?php echo ($v['title']); ?>">
                    <div class="prolist_logo">
                        <img src="/Public/Mobile/default/images/pixel.gif" data-url="/uploads//<?php echo (get_picture($v['litpic'],400,400)); ?>"  title="<?php echo ($v['title']); ?>" class="js_imgload" />
                    </div>
                </a>
                <div class="prolist_name">
                    <p><a href="<?php echo U('Product/detail',array('id'=>$v['id']));?>" title="<?php echo ($v['title']); ?>"><?php echo ($v['title']); ?></a></p>
                    <span>¥<?php echo ($v['money']); ?></span>
                </div>
            </div>
        </li><?php endforeach; endif; ?>

    </ul>
    <div class="clear"></div>
    </div>
    <div class="fenye mat10 mab10">
        <?php echo ($page); ?>
        <div class="clear"></div>
    </div>
    <link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/swiper.min.css" />
    <script type="text/javascript" src="/Public/Mobile/default/js/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Mobile/default/js/jquery.superslide.js"></script>
    <script type="text/javascript">
        $(function() {
            //var jdt_height = $(".content").width()/1.33;
            $(".jdt, .jdt img").height(200);
            //焦点图切换
            var swiper = new Swiper('.swiper-container', {
                pagination: '.swiper-pagination',
                paginationClickable: true,
                // Disable preloading of all images
                preloadImages: false,
                // Enable lazy loading
                lazyLoading: true,
                initialSlide: 0,
                autoplay: 2000,
                loop: true
            });
            pe_jstime(".huodong_time", '1545267728', 'html');
        })
        //滚动公告
        $("#gundong_html").slide({
            mainCell: ".gundong_list ul",
            effect: "topLoop",
            vis: 1,
            delayTime: 1000,
            interTime: 3000,
            autoPage: true,
            autoPlay: true
        });
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