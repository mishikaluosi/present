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

<div style="margin-top: 40px;">
</div>
<input type="hidden" id="del_url" value="<?php echo U('Article/deleteApp');?>">
<input type="hidden" id="save_url" value="<?php echo U('Article/saveApp',array('e_id'=>$e_id));?>">
<input type="hidden" id="index_url" value="<?php echo U('Article/appointmentList',array('e_id'=>$e_id));?>">
<style>
    .tab_ul2 td{
        background: #eee;
    }
</style>
<div class="content">
    <div class="weui-gallery__opr" style="background:rgb(95, 151, 116);z-index: 100;bottom: 100px;right:20px;left:unset;position: fixed;height: 50px;width:50px;border-radius: 25px;">
        <a id="del-batch" href="javascript:" class="weui-gallery__del" style="height: 50px;">
            <i class="weui-icon-delete weui-icon_gallery-delete" style="line-height: 50px;color: #fff;"></i>
        </a>
    </div>
    <div class="weui-gallery__opr" style="background:rgb(95, 151, 116);z-index: 100;bottom: 160px;right:20px;left:unset;position: fixed;height: 50px;width:50px;border-radius: 25px;">
        <a id="show-qr" href="javascript:" style="height: 50px;">
            <img style="float:left;margin-left:10px;margin-top:5px;width: 30px;height: 30px;" src="/Public/Mobile/default/images/qr.png" alt="/index.php/Mobile/Article/event_qrcode/id/<?php echo ($info["id"]); ?>">
            <span style="width:100%;text-align:center;float:left;height: 10px;line-height: 10px;font-size: 10px;color: #fff">预约码</span>
        </a>
    </div>
    <div class="weui-cells weui-cells_form" style="margin-top: 50px">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
            <div class="weui-cell__bd">
                <input id="name" class="weui-input" type="text" placeholder="请输入姓名">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">手机号</label>
            </div>
            <div class="weui-cell__bd">
                <input id="phone" class="weui-input" type="tel" placeholder="请输入手机号">
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">性别</label>
            </div>
            <select id="sex" class="weui-select" name="select1">
                <option value="">请选择性别</option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">业务员工号</label></div>
            <div class="weui-cell__bd">
                <input id="member_code" class="weui-input" type="text" value="<?php echo ($info['work_no']); ?>" readonly>
            </div>
        </div>
        <div class="button-sp-area">
            <a href="javascript:;" id="submit_info" class="weui-btn weui-btn_block weui-btn_primary" style="border-radius: 10px;background:rgb(95, 151, 116)">提交</a>
        </div>
    </div>
    <div style="width: 100%;height: 50px;line-height: 50px;background: rgb(95, 151, 116);margin-top: 5px;overflow: hidden">
        <span style="margin-left: 20px;float: left"><?php echo ($info['name']); ?></span>
        <span style="margin-left: 20px;color: #666666;float: left"><img style="width:20px;height: 20px;margin-top: 15px;float: left" src="/Public/Mobile/default/images/idp.png" alt=""><?php echo ($info['work_no']); ?></span>
        <span style="margin-left: 20px;color: #666666;float: left"><img style="width:20px;height: 20px;margin-top: 15px;float: left" src="/Public/Mobile/default/images/link.png" alt=""><?php echo ($zc['name']); ?></span>
    </div>
        <div class="weui-cells weui-cells_checkbox">
            <table style="width:100%;font-size: 0.8em;line-height: 3em;text-align: center">
                <tr>
                    <th>序号</th>
                    <th>姓名</th>
<!--                    <th>手机号</th>-->
                    <th>性别</th>
<!--                    <th>房间号</th>-->
                    <th>报名时间</th>
                    <th>操作</th>
                </tr>
            <?php if(is_array($appointment)): foreach($appointment as $key=>$user): ?><tr class='<?php if((($key+1)%2) == 1): ?>tab_ul2<?php endif; ?> row'>
                    <td>
                        <input type="checkbox" class="checkbox" name="list" value="<?php echo ($user['id']); ?>">
                        <?php echo ($key+1); ?>
                    </td>
                    <td><?php echo ($user['name']); ?></td>
<!--                    <td><?php echo substr_replace($user['phone'],'****',3,4); ?></td>-->
                    <td><?php echo ($user['sex']); ?></td>
<!--                    <td><?php echo ($user['room_num']); ?></td>-->
                    <td><?php echo date("Y-m-d",$user['created_at']); ?></td>
                    <td class="delete_row" alt="<?php echo ($user['id']); ?>">删除</td>
                </tr>
<!--            <label class="weui-cell weui-check__label row" for="<?php echo ($user['id']); ?>">-->
<!--                <div class="weui-cell__hd">-->
<!--                    <input type="checkbox" class="weui-check checkbox" name="checkbox1" id="<?php echo ($user['id']); ?>">-->
<!--                    <i class="weui-icon-checked"></i>-->
<!--                </div>-->
<!--                <div class="weui-form-preview__bd" style="width: 100%;">-->
<!--                    <div class="weui-form-preview__item">-->
<!--                        <label class="weui-form-preview__label">姓名</label>-->
<!--                        <span class="weui-form-preview__value"><?php echo ($user['name']); ?></span>-->
<!--                    </div>-->
<!--                    <div class="weui-form-preview__item">-->
<!--                        <label class="weui-form-preview__label">手机号</label>-->
<!--                        <span class="weui-form-preview__value"><?php echo substr_replace($user['phone'],'****',3,4); ?></span>-->
<!--                    </div>-->
<!--                    <div class="weui-form-preview__item">-->
<!--                        <label class="weui-form-preview__label">性别</label>-->
<!--                        <span class="weui-form-preview__value"><?php echo ($user['sex']); ?></span>-->
<!--                    </div>-->
<!--                    <div class="weui-form-preview__item">-->
<!--                        <label class="weui-form-preview__label">房间号</label>-->
<!--                        <span class="weui-form-preview__value"><?php echo ($user['room_num']); ?></span>-->
<!--                    </div>-->
<!--                    <div class="weui-form-preview__item">-->
<!--                        <label class="weui-form-preview__label">预约时间</label>-->
<!--                        <span class="weui-form-preview__value"><?php echo date("Y-m-d",$user['created_at']); ?></span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </label>--><?php endforeach; endif; ?>
            </table>
        </div>
</div>
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
                <img src="/index.php/Mobile/Article/event_qrcode/id/<?php echo ($e_id); ?>" style="width: 200px;height: 200px;">
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
<script>
    $(function(){
        $("#show-qr").bind("click",function(){
            $("#qr_img").show();
            $("#qr_img .btn-close").bind("click",function(){
                $("#qr_img").hide();
            })
        })
        $("#del-batch").bind("click",function(){
            var ids=[];
            $(".row").each(function(){
                if($(this).find(".checkbox").prop("checked")==true){
                    ids.push($(this).find(".checkbox").val());
                }
            })
            if(!ids.length>0){
                app_tip("请选择要删除的客户");
                return false;
            }
            if(confirm("确定删除客户吗")){
                var url =$('#del_url').val();
                $.post(url,{ids:ids.toString()},function(ret){
                    if(ret.status!=0){
                        app_tip(ret.message);
                        return false;
                    }
                    location.reload();
                },"json")
            }
        })
        $(".delete_row").bind("click",function(){
            var ids=$(this).attr("alt");
            if(confirm("确定删除客户吗")){
                var url =$('#del_url').val();
                $.post(url,{ids:ids.toString()},function(ret){
                    if(ret.status!=0){
                        app_tip(ret.message);
                        return false;
                    }
                    location.reload();
                },"json")
            }
        })
        $("#submit_info").bind("click",function(){
            var name = $("#name").val();
            var phone = $("#phone").val();
            var room_num = "";
            var sex = $("#sex").val();
            if(!name){
                app_tip('请填写姓名');
                return false;
            }
            if(!phone){
                app_tip('请填写手机号');
                return false;
            }
            var pattern = /^1[3|4|5|6|7|8|9][0-9]{9}$/;
            if(!pattern.test(phone)){
                app_tip('手机号格式不正确');
                return false;
            }
            if(!sex){
                app_tip('请填写性别');
                return false;
            }
            var url = $("#save_url").val();
            var index_url = $("#index_url").val();
            $.post(url,{name:name,phone:phone,sex:sex,room_num:room_num},function(ret){
                if(ret.status!=0){
                    app_tip(ret.message);
                    return false;
                }
                location.href=index_url;
            },"json")
        })
    })

</script>