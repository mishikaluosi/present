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
<div class="wgw_box">
    <div class="wgw_btn"></div>
    <div class="mat20 font16 c666">你的购物车里还没有商品</div>
    <div class="g_btn"><a href="<?php echo U('Index/index');?>">去逛逛</a></div>
</div>
<div class="content" style="display:none;padding-bottom:60px;">
    <div style="height: 20px;">111</div>
    <form method="post" id="form" >
        <?php if(is_array($info_list)): foreach($info_list as $key=>$v): ?><div class="cart_list js_cart" cart_id="<?php echo ($v['cart_id']); ?>" >
            <label class="dui" for="cart_id_<?php echo ($v['cart_id']); ?>">
                <input type="checkbox" name="cart_id[]" value="<?php echo ($v['cart_id']); ?>" id="cart_id_<?php echo ($v['cart_id']); ?>" style="display:none">
            </label>
            <div class="dingdan_img"><img src="/uploads//<?php echo (get_picture($v['product_logo'],400,400)); ?>"></div>
            <div class="dingdan_name">
                <p style="height:40px; overflow:hidden;"><a href="<?php echo U('Product/detail',array('id'=>$v['product_id']));?>"><?php echo ($v['product_name']); ?></a></p>
                <p class="c888"><?php echo (order_skushow($v['product_rule'])); ?></p>
                <p class="num corg mat3">¥ <?php echo ($v['product_money']); ?></p>

            </div>
            <div class="clear"></div>
            <div class="order_r">
                <div class="shuliang sl_1">

                    <span class="img1" onclick="cart_edit('-', '<?php echo ($v['cart_id']); ?>');"><i></i></span>
                    <span class="shuliang_box"><input type="text" name="cart_num[]" value="<?php echo ($v['product_num']); ?>" product_money="<?php echo ($v['product_money']); ?>"></span>
                    <span class="img2" onclick="cart_edit('+', '<?php echo ($v['cart_id']); ?>');"><i></i></span>
                </div>
                <div class="clear"></div>
            </div>
        </div><?php endforeach; endif; ?>
        <div class="add_tj">
            <div class="add_qx"><span onclick="checkall_btn()"><i></i>全选</span></div>
            <div class="add_heji">合计：<span class="corg font16">¥ <span id="order_money"></span></span>
            </div>
            <div class="add_tjbtn">
                <a href="javascript:cart_submit();">结算 <span class="font12">( <span class="font14" id="order_num"></span> )</span></a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function() {
        pe_select_radio('cart_id[]');
        $(":input[name='cart_id[]']").live("change", function() {
            cart_money();
        })
        $(":input[name='cart_id[]']:checked").each(function() {
            $(this).parents(".dui").removeClass("sel").addClass("sel");
        })
    })
    cart_money();
    //购物车修改
    function cart_edit(type, cart_id) {
        var js_cart = $(".js_cart[cart_id='" + cart_id + "']");
        var _this = js_cart.find(":input[name='cart_num[]']");
        if (type == 'del') {
            var num = 0;
        } else {
            var num = parseInt(_this.val());
            num = type == '+' ? num + 1 : (num >= 1 ? num - 1 : 0);
        }
        if (num == 0) {
            if (confirm('您确认要删除该商品吗?') == false) return;
        }
        app_getinfo_data("<?php echo U('Cart/edit');?>",{id:cart_id, num:num}, function(json) {
            if (json.result) {
                if (num == 0) js_cart.remove();
            }
            _this.val(json.num);
            //更新商品小计金额
            var product_allmoney = pe_num(_this.attr("product_money") * json.num, 'round', 1);
            js_cart.find(".product_allmoney").html('¥ ' + product_allmoney);
            cart_money();
        })
    }
    //购物车金额
    function cart_money() {
        if ($(".js_cart").length == 0) {
            $(".wgw_box").show();
            $(".content").hide();
        } else {
            $(".wgw_box").hide();
            $(".content").show();
        }
        var product_money = 0,
            product_num = 0,
            order_money = 0,
            order_num = 0;
        $(":input[name='cart_id[]']:checked").each(function() {
            var _this = $(this).parents(".js_cart").find(":input[name='cart_num[]']");
            product_money = pe_num(_this.attr("product_money"), 'round', 1);
            product_num = pe_num(_this.val(), 'floor');
            order_money += product_money * product_num;
            order_num += product_num;
        })
        $("#order_money").html(pe_num(order_money, 'round', 1, true));
        $("#order_num").html(order_num);
    }
    //购物车结算
    function cart_submit() {
        if ($(":input[name='cart_id[]']:checked").length == 0) {
            app_tip('请选择商品');
            return false;
        }
        app_submit("<?php echo U('Cart/chkcart');?>", function(json) {
            if (json.result) {
                var url="<?php echo U('Order/add');?>";
                url=url.replace(/.html/g,"")+'/id/'+json.id;
                app_open(url);
            }
        })
    }

    function checkall_btn() {
        if ($(".add_qx i").hasClass("sel")) {
            $("input[name='cart_id[]']").removeAttr("checked").change();
            $(".add_qx i").removeClass("sel");
        } else {
            $("input[name='cart_id[]']").attr("checked", "checked").change();
            $(".add_qx i").addClass("sel");
        }
    }
</script>
<script type="text/javascript">
    $(function(){
        $("img.js_imgload").scrollLoading();
    });
</script>

﻿
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