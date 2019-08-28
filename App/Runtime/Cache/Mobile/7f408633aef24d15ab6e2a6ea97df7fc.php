<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <title>填写签到信息</title>
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
<style>
    a:hover{
        color: #fff;
    }
</style>
<input type="hidden" id="e_id" value="<?php echo ($e_id); ?>">
<input type="hidden" id="member_id" value="<?php echo ($member_id); ?>">
<input type="hidden" id="uid" value="<?php echo ($user['id']); ?>">
<input type="hidden" id="match_url" value="<?php echo U('Check/matchPhone');?>">
<input type="hidden" id="sub_url" value="<?php echo U('Check/subPhone');?>">
<!--是否匹配预约数据-->
<input type="hidden" id="is_matched" value="0">
<div class="zc_tt" style="width:100%;text-align: center;font-size: 19px;margin-top: 20px;">签到信息</div>
<div class="weui-cells weui-cells_form">
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">手机号</label></div>
        <div class="weui-cell__bd">
            <input id="phone" class="weui-input" type="tel" placeholder="请输入手机号">
        </div>
    </div>
    <div class="weui-cell other_info" style="display: none;">
        <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
        <div class="weui-cell__bd">
            <input id="username" class="weui-input" type="text" placeholder="请输入姓名">
        </div>
    </div>
    <div class="weui-cell other_info mem" style="display: none;">
        <div class="weui-cell__hd"><label class="weui-label">业务员</label></div>
        <div class="weui-cell__bd">
            <input id="member" class="weui-input" type="text" placeholder="请输入业务员">
        </div>
    </div>
    <div class="weui-cell other_info" style="display: none;">
        <div class="weui-cell__hd"><label class="weui-label">性别</label></div>
        <select id="sex" class="weui-select" name="select1">
            <option value="">请选择性别</option>
            <option value="男">男</option>
            <option value="女">女</option>
        </select>
    </div>
    <div class="button-sp-area" style="margin-top: 20px;">
        <a href="javascript:;" id="submit_info" class="weui-btn weui-btn_block weui-btn_primary">保存</a>
    </div>
</div>
<link rel="stylesheet" href="/Public/Mobile/default/css/weui.min.css">
<link rel="stylesheet" href="/Public/Mobile/default/css/layer.css">
<link rel="stylesheet" href="/Public/Mobile/default/css/jquery-weui.min.css">
<script src="/Public/Mobile/default/js/jquery-weui.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/layer.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/app.js"></script>
<script type="text/javascript" src="/Public/Mobile/default/js/jquery.scrollloading.js"></script>
<script>
    $(function(){
        $("#submit_info").bind("click",function(){
            var e_id = parseInt($("#e_id").val());
            var is_matched = parseInt($("#is_matched").val());
            var uid = $("#uid").val();
            var phone = $("#phone").val();

            if(!phone){
                app_tip('请填写手机号');
                return false;
            }
            var pattern = /^1[3|4|5|6|7|8|9][0-9]{9}$/;
            if(!pattern.test(phone)){
                app_tip('手机号格式不正确');
                return false;
            }
            //提交手机号匹配预约信息
            if(is_matched!=1){
                var url = $("#match_url").val();
                $.post(url,{e_id:e_id,uid:uid,phone:phone},function(ret){
                    if(ret.status!=0){
                        app_tip(ret.message);
                        $(".other_info").show();
                        var c_member_id = $('#member_id').val();
                        if(c_member_id>0){
                            $(".mem").hide();
                        }
                        $("#is_matched").val(1);
                        return false;
                    }else{
                        location.reload();
                    }
                },"json")
            }else{
                var url = $("#sub_url").val();
                var username = $("#username").val();
                var sex = $("#sex").val();
                var member = $("#member").val();
                var member_id = $('#member_id').val();
                if(!username){
                    app_tip('请填写姓名');
                    return false;
                }
                if(!member_id>0){
                    if(!member){
                        app_tip('请填写业务员');
                        return false;
                    }
                }
                if(!sex){
                    app_tip('请填写性别');
                    return false;
                }
                $.post(url,{uid:uid,phone:phone,username:username,member:member,sex:sex,member_id:member_id},function(ret){
                    if(ret.status!=0){
                        app_tip(ret.message);
                        return false;
                    }else{
                        location.reload();
                    }
                },"json")
            }
        })
    })
</script>