<?php if (!defined('THINK_PATH')) exit();?>﻿﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <title>保礼街 </title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">
    <link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/style_2.css" />
    <script type="text/javascript" src="/Public/Mobile/default/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Mobile/default/js/global.js"></script>
    <script type="text/javascript" src="/Public/Mobile/default/js/arttpl.js"></script>
    <link type="text/css" rel="stylesheet" href="/Public/Mobile/default/css/iconfont.css" />
</head>
<body>

<div class="login_top">
    <div class="zc_tt">保礼街</div>
    <div class="top_dl">
        <img src="/Public/Mobile/default/images/logo.png" alt="" />
    </div>
    <a class="u_fh" href="<?php echo U('Index/index');?>"><i class="sy_ico"></i></a>
</div>
<form method="post" id="form">
    <div class="zc_box1" style="padding:0 10px">
        <div class="zc_list">
            <div class="zc_mal zc_i1">
                <i class="icon-icon icon  iconfont"></i>
                <input type="text" name="phone" class="zc_input1" placeholder=" 手机号 " /></div>
        </div>
        <div class="zc_list">
            <div class="zc_mal zc_i2">
                <i class="icon-mima icon  iconfont"></i>
                <input type="text" name="user_pw" class="zc_input1" placeholder="登录密码" onfocus="this.type='password'" /></div>
        </div>
    </div>
    <div class="loginbtn" style="margin:30px 20px;">
        <input type="button" id="login_btn" value="登 录" />
    </div>
</form>
<div class="zh_zc1">
    <a href="<?php echo U('do/login_code');?>" class="mar10 fl" style="color: #005BB5;">验证码登录</a>
    <a href="<?php echo U('do/register');?>" class="mar10 fr">还没有账户，点此免费注册</a>
</div>
<script type="text/javascript">
    $(function() {
        $("#login_btn").click(function() {
            if ($(":input[name='phone']").val() == '') {
                app_tip('请填写手机号');
                return false;
            } else {
                var pattern = /^1[3|4|5|6|7|8|9][0-9]{9}$/;
                // var pattern = /^(((13[0-9]{1})|(14[0-9]{1})|(19[0-9]{1})|(17[0-9]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/;
                if(!pattern.test($(":input[name='phone']").val())){
                    app_tip('手机号格式不正确');
                    return false;
                }
            }

            if ($(":input[name='user_pw']").val() == '') {
                app_tip('请填写密码');
                return false;
            }
            $(this).val('登录中...');
            app_submit("<?php echo U('Do/login');?>", function(json) {
                if (json.result) {
                    if ('' != '') {
                        app_open('', 1000);
                    } else {
                        app_open("<?php echo U('User/index');?>", 1000);
                    }
                } else {
                    $("#login_btn").val('登 录');
                }
            })
        })
    })
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