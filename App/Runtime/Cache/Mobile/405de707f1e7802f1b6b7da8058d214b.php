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

<style>
    a:hover{
        color: #0bb20c;
    }
    .dialog-mask{
        position: fixed;
        z-index: 10000;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        transition-duration: .3s;
    }
    .dialog-half-screen{
        width:90%;
        margin:0 auto;
        position: fixed;
        left: 0;
        right: 0;
        top: 20%;
        height: 60%;
        z-index: 10005;
        line-height: 1.4;
        background-color: #FFFFFF;
        border-radius: 5px;
        overflow: hidden;
    }
    .weui-toast{
        z-index: 10010 !important;
        margin: 0 !important;
    }
</style>
<input id="appointment_url" value="<?php echo U('Article/appointment');?>" />
<div style="margin-top: 45px;">
</div>
<div class="content">
    <div class="weui-gallery__opr" style="background:rgb(95, 151, 116);z-index: 100;bottom: 100px;right:20px;left:unset;position: fixed;height: 50px;width:50px;border-radius: 25px;">
        <a id="show-qr" href="javascript:" style="height: 50px;">
            <img style="float:left;margin-left:10px;margin-top:5px;width: 30px;height: 30px;" src="/Public/Mobile/default/images/qr.png">
            <span style="width:100%;text-align:center;float:left;height: 10px;line-height: 10px;font-size: 10px;color: #fff">签到码</span>
        </a>
    </div>
    <div style="width: 100%;height: 50px;line-height: 50px;background: rgb(95, 151, 116);margin-top: 5px;overflow: hidden">
        <span style="margin-left: 20px;float: left"><?php echo ($info['name']); ?></span>
        <span style="margin-left: 20px;color: #666666;float: left"><img style="width:20px;height: 20px;margin-top: 15px;float: left" src="/Public/Mobile/default/images/idp.png" alt=""><?php echo ($info['work_no']); ?></span>
        <span style="margin-left: 20px;color: #666666;float: left"><img style="width:20px;height: 20px;margin-top: 15px;float: left" src="/Public/Mobile/default/images/link.png" alt=""><?php echo ($zc['name']); ?></span>
    </div>
    <table style="width:100%;font-size: 0.9em;line-height: 4em;text-align: center">
        <tr>
            <th>姓名</th>
            <th>性别</th>
            <th>预约保费</th>
            <th>实际保费</th>
            <th>操作</th>
        </tr>
    <?php if(is_array($event_user)): foreach($event_user as $key=>$user): ?><tr class='<?php if((($key+1)%2) == 1): ?>tab_ul2<?php endif; ?> row'>
            <td><?php echo ($user["username"]); ?></td>
            <td><?php echo ($user["sex"]); ?></td>
            <td><?php echo ($user["appointment_money"]); ?></td>
            <td><?php echo ($user["appointment_money_actual"]); ?></td>
            <td> <a class="btn_blue showDialog" username="<?php echo ($user["username"]); ?>" appointment_money_actual="<?php echo ($user["appointment_money_actual"]); ?>" appointment_money="<?php echo ($user["appointment_money"]); ?>"  alt="<?php echo ($user["id"]); ?>" href="javascript:">填写预约保费</a></td>
        </tr>
<!--    <div class="weui-form-preview" style="margin-top: 10px;">-->
<!--        <div class="weui-form-preview__hd" style="padding: 0">-->
<!--            <div class="weui-form-preview__item">-->
<!--                <div class="weui-cell weui-cell_example">-->
<!--                    <div class="weui-cell__hd">-->
<!--                        <img src="<?php echo ($user["image"]); ?>" alt="" style="border-radius:24px;width:48px;margin-right:16px;display:block">-->
<!--                    </div>-->
<!--                    <div class="weui-cell__bd"><?php echo ($user["name"]); ?></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="weui-form-preview__bd">-->
<!--            <div class="weui-form-preview__item">-->
<!--                <label class="weui-form-preview__label">姓名</label>-->
<!--                <span class="weui-form-preview__value"><?php echo ($user["username"]); ?></span>-->
<!--            </div>-->
<!--            <div class="weui-form-preview__item">-->
<!--                <label class="weui-form-preview__label">手机号</label>-->
<!--                <span class="weui-form-preview__value"><?php echo substr_replace($user['phone'],'****',3,4); ?></span>-->
<!--            </div>-->
<!--            <div class="weui-form-preview__item">-->
<!--                <label class="weui-form-preview__label">性别</label>-->
<!--                <span class="weui-form-preview__value"><?php echo ($user["sex"]); ?></span>-->
<!--            </div>-->
<!--            <div class="weui-form-preview__item">-->
<!--                <label class="weui-form-preview__label">是否预约保费</label>-->
<!--                <span class="weui-form-preview__value">-->
<!--                    <?php if($user["is_appointment"] == 1): ?>-->
<!--                        否-->
<!--                        <?php else: ?>-->
<!--                        是-->
<!--<?php endif; ?>-->
<!--                </span>-->
<!--            </div>-->
<!--            <div class="weui-form-preview__item">-->
<!--                <label class="weui-form-preview__label">预约保费</label>-->
<!--                <span class="weui-form-preview__value"><?php echo ($user["appointment_money"]); ?></span>-->
<!--            </div>-->
<!--            <div class="weui-form-preview__item">-->
<!--                <label class="weui-form-preview__label">实际预约保费</label>-->
<!--                <span class="weui-form-preview__value"><?php echo ($user["appointment_money_actual"]); ?></span>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="weui-form-preview__ft">-->
<!--            <a class="weui-form-preview__btn weui-form-preview__btn_primary showDialog" username="<?php echo ($user["username"]); ?>" appointment_money_actual="<?php echo ($user["appointment_money_actual"]); ?>" appointment_money="<?php echo ($user["appointment_money"]); ?>"  alt="<?php echo ($user["id"]); ?>" href="javascript:">填写预约保费</a>-->
<!--        </div>-->
<!--    </div>--><?php endforeach; endif; ?>
    </table>
    <div id="qr_img" style="width: 100%;height: 100%;display: none;">
        <div class="mask" style="    position: fixed;
    z-index: 10000;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    transition-duration: .3s;"></div>
        <div class="image-box" style="width: 80%;height: 300px;background: #fff;position: fixed;top: 100px;left: 10%;z-index: 10001">
            <div class="weui-half-screen-dialog__hd__side">
                <span class="btn-close" style="border: none;margin-left: 10px;margin-top: 5px;">关闭</span>
                <div class="image" style="width: 200px;height: 200px;margin: 20px auto;">
                    <img src="/index.php/Mobile/Article/check_qrcode/id/<?php echo ($e_id); ?>" style="width: 200px;height: 200px;">
                </div>
            </div>
        </div>
    </div>
    <div class="js_dialog" id="dialog" style="display: none;">
        <input type="hidden" id="user_id" value="0">
        <div class="dialog-mask"></div>
        <div class="dialog-half-screen">
            <div class="weui-half-screen-dialog__hd">
                <div class="weui-half-screen-dialog__hd__side">
                    <button class="weui-icon-btn weui-icon-btn_close btn-close"></button>
                </div>
                <div class="weui-half-screen-dialog__hd__main">
                    <strong class="weui-half-screen-dialog__title">修改预约保费</strong>
                </div>
            </div>
            <div class="weui-half-screen-dialog__bd">
                <div class="weui-cells weui-cells_form">
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">客户姓名</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input username" type="text" readonly>
                        </div>
                    </div>
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">预约保费</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input appointment_money" type="number" placeholder="请输入金额">
                        </div>
                    </div>
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">实际保费</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input appointment_money_actual" type="number" placeholder="请输入金额">
                        </div>
                    </div>
                </div>
            </div>
            <div class="weui-half-screen-dialog__ft" style="padding: 0;padding-top: 20px;">
                <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary btn-submit">确定</a>
                <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default btn-close">取消</a>
            </div>
        </div>
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
<link rel="stylesheet" href="/Public/Mobile/default/css/weui.css">
<script>
    $(function(){
        $("#show-qr").bind("click",function(){
            $("#qr_img").show();
            $("#qr_img .btn-close").bind("click",function(){
                $("#qr_img").hide();
            })
        })
        $(".showDialog").bind("click",function () {
            var user_id = parseInt($(this).attr("alt"));
            $("#dialog").find("#user_id").val(user_id);
            $("#dialog").find(".username").val($(this).attr("username"));
            $("#dialog").find(".appointment_money").val($(this).attr("appointment_money"));
            $("#dialog").find(".appointment_money_actual").val($(this).attr("appointment_money_actual"));
            $("#dialog").show();
        })
        $("#dialog .btn-close").bind("click",function(){
            $("#dialog").hide();
            $("#user_id").val(0);
        })
        $("#dialog .btn-submit").bind("click",function(){
            var user_id = $("#dialog").find("#user_id").val();
            var appointment_money = $("#dialog").find(".appointment_money").val();
            var appointment_money_actual = $("#dialog").find(".appointment_money_actual").val();
            if(!user_id){
                app_tip("请选择签到人员");
                return false;
            }
            var pattern=/((^[1-9]\d*)|^0)(\.\d{0,2}){0,1}$/
            if(appointment_money!=""){
                if(!pattern.test(appointment_money)){
                    app_tip('预约保费格式不正确');
                    return false;
                }
            }
            if(appointment_money_actual!="") {
                if (!pattern.test(appointment_money_actual)) {
                    app_tip('实际保费格式不正确');
                    return false;
                }
            }
            if(appointment_money == "" && appointment_money_actual==""){
                location.reload();
                return false;
            }
            var url = $("#appointment_url").val();
            $.post(url,{user_id:user_id,appointment_money:appointment_money,appointment_money_actual:appointment_money_actual},function(ret){
                if(ret.status!=0){
                    app_tip('保存失败');
                    return false;
                }
                app_tip('保存成功');
                location.reload();
            },"json")
        })
    })
</script>