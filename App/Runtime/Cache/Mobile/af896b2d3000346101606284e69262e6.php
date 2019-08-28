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

<input type="hidden" id="index_url" value="<?php echo U('User/orderTongji',array('type'=>$type));?>">
<script type="text/javascript" src="/Public/Mobile/default/js/datePicker.js"></script>
<div class="top" style="margin-top: 28px;"></div>
<div class="main">
    <div class="operate" style="height: 40px;line-height: 40px;">
        <?php if($type == area): ?><select style="width: 33%;" id="zc_search" name='zc_search'>
                <option value="">职场搜索</option>
                <?php if(is_array($zc_array)): foreach($zc_array as $key=>$value): ?><option <?php if($zc_name==$value){ ?>selected="selected"<?php } ?>  value="<?php echo ($value); ?>"><?php echo ($value); ?></option><?php endforeach; endif; ?>
            </select>
            <?php elseif($type == city): ?>
            <select style="width: 33%;" id="area_seareh" name='area_seareh'>
                <option value="">支公司搜索</option>
                <?php if(is_array($area_array)): foreach($area_array as $key=>$value): ?><option <?php if($zc_area==$value){ ?>selected="selected"<?php } ?> value="<?php echo ($value); ?>"><?php echo ($value); ?></option><?php endforeach; endif; ?>
            </select>
            <?php else: endif; ?>
        <input style="width: 32%;" type='text' id="start_date" class="start_date" value="<?php echo ($start_date); ?>" placeholder="开始时间" readonly/>
        <input style="width: 32%;" type='text' id="end_date" class="end_date" value="<?php echo ($end_date); ?>" placeholder="结束时间" readonly/>
    </div>
    <table style="width:100%;font-size: 0.8em;line-height: 35px;" border="2" cellpadding=“10” cellspacing="0">
        <tr>
            <?php if($type == area): ?><th>职场名称</th>
            <?php elseif($type == city): ?>
            <th>支公司</th>
            <?php else: ?>
            <th>职场名称</th><?php endif; ?>
            <th>自购人数</th>
            <th>产品</th>
            <th>购买数量</th>
        </tr>
        <?php if(is_array($vlist)): foreach($vlist as $key=>$v): if(is_array($v["cp_list"])): foreach($v["cp_list"] as $i=>$vv): ?><tr>
                <?php if($i == 0): if($type == area): ?><td rowspan="<?php echo count($v['cp_list']); ?>"><?php echo ($v["zc_name"]); ?></td>
                    <?php elseif($type == city): ?>
                    <td rowspan="<?php echo count($v['cp_list']); ?>"><?php echo ($v["zc_area"]); ?>}</td>
                    <?php else: ?>
                    <td rowspan="<?php echo count($v['cp_list']); ?>"><?php echo ($v["zc_name"]); ?></td><?php endif; ?>
                <td rowspan="<?php echo count($v['cp_list']); ?>"><?php echo ($v["buy_num"]); ?></td><?php endif; ?>
                <td><?php echo ($vv["product_name"]); ?></td>
                <td><?php echo ($vv["num"]); ?></td>
            </tr><?php endforeach; endif; endforeach; endif; ?>
    </table>
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
        $("#zc_search").bind("change",choose_data);
        $("#area_seareh").bind("change",choose_data);
        $("#event_search").bind("change",choose_data);
        var calendar1 = new datePicker();
        calendar1.init({
            'trigger': '#start_date',
            'type': 'date',
            'minDate':'1900-1-1',
            'maxDate':'2100-12-31',
            'onSubmit':function(){
                var theSelectData=calendar1.value;
                choose_data();
            },
            'onClose':function(){
            }
        });
        var calendar2 = new datePicker();
        calendar2.init({
            'trigger': '#end_date',
            'type': 'date',
            'minDate':'1900-1-1',
            'maxDate':'2100-12-31',
            'onSubmit':function(){
                var theSelectData=calendar2.value;
                choose_data();
            },
            'onClose':function(){
            }
        });
    })

    function choose_data(){
        var url = $("#index_url").val();
        var zc_name =$("#zc_search").val();
        var zc_area =$("#area_seareh").val();
        var start_date =$("#start_date").val();
        var end_date =$("#end_date").val();
        if(zc_name){
            url += "&zc_name="+zc_name;
        }
        if(zc_area){
            url += "&zc_area="+zc_area;
        }
        if(start_date){
            url += "&start_date="+start_date;
        }
        if(end_date) {
            url += "&end_date=" + end_date;
        }
        location.href=url;
    }
</script>