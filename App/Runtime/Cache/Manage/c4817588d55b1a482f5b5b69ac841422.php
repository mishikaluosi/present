<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>

    <script type="text/javascript" src="/App/Manage/View/Public/js/dmAddress.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/App/Manage/View/Public/js/calendar/jscal2.css"/>
    <link rel="stylesheet" type="text/css" href="/App/Manage/View/Public/js/calendar/border-radius.css"/>
    <link rel="stylesheet" type="text/css" href="/App/Manage/View/Public/js/calendar/win2k.css"/>
    <script type="text/javascript" src="/App/Manage/View/Public/js/calendar/calendar.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/js/calendar/lang/en.js"></script>
</head>
<body>
<style>
    .list td.org,span.org{color: #e4570d;}
    .list td.blue,span.blue{color: #19a8ee}
</style>
<div class="main">
    <div class="pos">业务员统计
        <?php if($_admin_flag == false): ?>[<?php echo ($_zcinfo["prov"]); ?>-<?php echo ($_zcinfo["city"]); ?>-<?php echo ($_zcinfo["area"]); ?>:<?php echo (get_zc_name($_zcinfo["zc_id"])); ?>]<?php endif; ?>
    </div>
    <div class="operate">
        <div class="left" style="float: left;margin-top:8px">
            <form method="post" action="<?php echo U('Order/export_ywytj_ex');?>">
                <?php if(is_array($search_p)): foreach($search_p as $k=>$v): ?><input type="hidden" name="<?php echo ($k); ?>" value="<?php echo ($v); ?>"/><?php endforeach; endif; ?>
                <input type="submit" class="btn_blue btn_red" style="float: none" value="导出">
            </form>
        </div>
        <div class="left" style="float: left;margin-top:8px">
            <form method="post" action="<?php echo U('Order/export_ywytj_ex_wgm');?>">
                <?php if(is_array($search_p)): foreach($search_p as $k=>$v): ?><input type="hidden" name="<?php echo ($k); ?>" value="<?php echo ($v); ?>"/><?php endforeach; endif; ?>
                <input type="submit" class="btn_blue btn_red" style="float: none" value="无购买导出">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="operate">
        <div class="left">
            <span style="color: orangered;">
                总金额：<?php echo ($total_money); ?>元&nbsp;&nbsp;总数量：<?php echo ($total_num); ?>
            </span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="operate">
        <div class="left">
            <form method="post" action="<?php echo U('Order/ywytj');?>">
                <span class="s_span">&nbsp;&nbsp区域：</span>
                <select id="cmbProvince" name='sprov'></select>
                <select id="cmbCity" name='scity'></select>
                <select id="cmbArea" name='sarea'></select>
                <script type="text/javascript">
                    $.ajax({
                        type: "POST",
                        url: "<?php echo U('Zc/get_region_jsdata');?>",
                        data:{type:'select'},
                        dataType: "json",
                        success: function(data){
                            var provinceList=data;
                            addressInit('cmbProvince', 'cmbCity', 'cmbArea', '<?php echo ($sprov); ?>', '<?php echo ($scity); ?>', '<?php echo ($sarea); ?>',provinceList);
                        }
                    });
                </script>
                <span class="s_span">用户名：</span>
                <input type="text" style="width:100px;" name="sname" class="inp_one" value="<?php echo ($sname); ?>" >
                <span class="s_span">付款时间：</span>
                <input type="text" style="width:100px;" name="sstime" id="sstime" class="inp_one" value="<?php echo ($sstime); ?>" />
                <script type="text/javascript">
                    Calendar.setup({
                        weekNumbers: true,
                        inputField : "sstime",
                        trigger    : "sstime",
                        dateFormat: "%Y-%m-%d",
                        showTime: true,
                        minuteStep: 1,
                        onSelect   : function() {this.hide();}
                    });
                </script>
                <input type="text" style="width:100px;" name="setime" id="setime" class="inp_one" value="<?php echo ($setime); ?>" />
                <script type="text/javascript">
                    Calendar.setup({
                        weekNumbers: true,
                        inputField : "setime",
                        trigger    : "setime",
                        dateFormat: "%Y-%m-%d",
                        showTime: true,
                        minuteStep: 1,
                        onSelect   : function() {this.hide();}
                    });
                </script>

                <span class="s_span">完成时间：</span>
                <input type="text" style="width:100px;" name="sstime_e" id="sstime_e" class="inp_one" value="<?php echo ($sstime_e); ?>" />
                <script type="text/javascript">
                    Calendar.setup({
                        weekNumbers: true,
                        inputField : "sstime_e",
                        trigger    : "sstime_e",
                        dateFormat: "%Y-%m-%d",
                        showTime: true,
                        minuteStep: 1,
                        onSelect   : function() {this.hide();}
                    });
                </script>
                <input type="text" style="width:100px;" name="setime_e" id="setime_e" class="inp_one" value="<?php echo ($setime_e); ?>" />
                <script type="text/javascript">
                    Calendar.setup({
                        weekNumbers: true,
                        inputField : "setime_e",
                        trigger    : "setime_e",
                        dateFormat: "%Y-%m-%d",
                        showTime: true,
                        minuteStep: 1,
                        onSelect   : function() {this.hide();}
                    });
                </script>
                <input type="submit" class="btn_blue" style="float: none" value="查  询">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="list">
        <table width="100%">
            <tr>
                <th style="width:9%">组号</th>
                <th style="width:12%">用户名</th>
                <th style="width:12%">电话</th>
                <th style="width:8%">省</th>
                <th style="width:8%">市</th>
                <th style="width:8%">区</th>
                <th style="width:12%">职场</th>
                <th style="width:15%">商品</th>
                <th style="width:8%">数量</th>
                <th style="width:8%">总价</th>
            </tr>
            <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                    <td><?php echo ($v["group_no"]); ?></td>
                    <td><?php echo ($v["uname"]); ?></td>
                    <td><?php echo ($v["tel"]); ?></td>
                    <td><?php echo ($v["prov"]); ?></td>
                    <td><?php echo ($v["city"]); ?></td>
                    <td><?php echo ($v["area"]); ?></td>
                    <td><?php echo ($v["zc"]); ?></td>
                    <td>
                        <img src="/uploads//<?php echo (get_picture($v['litpic'],100,100)); ?>" width="40" height="40" class="imgbg" />
                        <?php echo ($v["product"]); ?>
                    </td>
                    <td class="blue"><?php echo ($v["num"]); ?></td>
                    <td class="org"><?php echo ($v["money"]); ?></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
    <div class="operate">
        <div class="left">
            <span style="color: orangered;">
                总金额：<?php echo ($total_money); ?>元&nbsp;&nbsp;总数量：<?php echo ($total_num); ?>
            </span>
        </div>
        <div class="clear"></div>
    </div>
</div>

</body>
</html>