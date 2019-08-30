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

    <script type="text/javascript" src="/App/Manage/View/Public/shop/js/global.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/shop/js/arttpl.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/shop/plugin/layer/layer.js"></script>

</head>
<body>
<div class="main">
    <div class="pos">订单列表</div>
    <div class="operate">
        <div class="left" style="float: left;margin-top:8px">
            <form method="post" action="<?php echo U('Order/export_ex');?>">
                <?php if(is_array($search_p)): foreach($search_p as $k=>$v): ?><input type="hidden" name="<?php echo ($k); ?>" value="<?php echo ($v); ?>"/><?php endforeach; endif; ?>
                <input type="hidden" name="fp" value="<?php echo ($fp); ?>"/>
                <input type="submit" class="btn_blue btn_red" style="float: none" value="导出">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="operate">
        <style>
            ul,li,a{ text-decoration:none;list-style: none; }
            .vatice{overflow: hidden;border-bottom:1px solid #ccc;font-size: 16px;}
            .vatice li{ float: left;padding:0 10px 5px; text-align:center;  }
            .vatice li a{ color:#666; }
            .vatice li.on,.vatice li:hover{ border-bottom:2px solid #21a0fd; }
        </style>
        <ul class="vatice">
            <li <?php if($fp=='all'){ ?>class="on" <?php }?>><a href="<?php echo U('Order/index');?>">全部<span class="tongji_3">(<?php echo ($tongji["all"]); ?>)</span></a></li>
            <li <?php if($fp=='wpay'){ ?>class="on" <?php }?>><a href="<?php echo U('Order/index',array('fp'=>'wpay'));?>">待付款<span class="tongji_3">(<?php echo ($tongji["wpay"]); ?>)</span></a></li>
            <li <?php if($fp=='wget'){ ?>class="on" <?php }?>><a href="<?php echo U('Order/index',array('fp'=>'wget'));?>">已付款<span class="tongji_3">(<?php echo ($tongji["wget"]); ?>)</span></a></li>
            <li <?php if($fp=='success'){ ?>class="on" <?php }?>><a href="<?php echo U('Order/index',array('fp'=>'success'));?>">交易完成<span class="tongji_3">(<?php echo ($tongji["success"]); ?>)</span></a></li>
            <li <?php if($fp=='close'){ ?>class="on" <?php }?>><a href="<?php echo U('Order/index',array('fp'=>'close'));?>">交易关闭<span class="tongji_3">(<?php echo ($tongji["close"]); ?>)</span></a></li>

            <li <?php if($fp=='change'){ ?>class="on" <?php }?>><a href="<?php echo U('Order/index',array('fp'=>'change'));?>">申请改价<span class="tongji_3">(<?php echo ($tongji["change"]); ?>)</span></a></li>
            <li <?php if($fp=='change_ok'){ ?>class="on" <?php }?>><a href="<?php echo U('Order/index',array('fp'=>'change_ok'));?>">改价成功<span class="tongji_3">(<?php echo ($tongji["change_ok"]); ?>)</span></a></li>

        </ul>
    </div>

    <div class="operate">
        <div class="left">
            <form method="post" action="<?php echo U('Order/index');?>">
                <span class="s_span">&nbsp;&nbsp;订单编号：</span>
                <input type="text" name="sorderno" class="inp_one" style="width:100px;" value="<?php if(!empty($sorderno)){ echo $sorderno;}?>" >
                <span class="s_span">姓名：</span>
                <input type="text" style="width:100px;" name="sname" class="inp_one" value="<?php echo ($sname); ?>" >
                <span class="s_span">&nbsp;&nbsp;电话：</span>
                <input style="width:100px;" type="text" name="sphone" class="inp_one" value="<?php echo ($sphone); ?>" >
                <span class="s_span">&nbsp;&nbsp;地址：</span>
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

                <span class="s_span">下单时间：</span>
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
                <input type="hidden" name="fp" value="<?php echo ($fp); ?>"/>
                <input type="submit" class="btn_blue" style="float: none" value="查  询">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="list">
        <form action="<?php echo U('Order/fhAll');?>" method="post" id="form_do" name="form_do">
            <div>
                <input type="button" style="color: red!important" onclick="doConfirmBatch('<?php echo U('Order/fh', array('batchFlag' => 1,'pid' => $pid));?>', '确实要批量发货吗？')" class="btn_blue btn_f" value="批量发货">
                <input type="button" style="color: red!important" onclick="doConfirmBatch('<?php echo U('Order/close', array('batchFlag' => 1,'pid' => $pid));?>', '确实要批量关闭吗？')" class="btn_blue btn_f" value="批量关闭">
            </div>
            <table width="100%">
                <tr>
                    <th ><input type="checkbox" id="check"></th>
                    <th >商品信息</th>
                    <th  style="width: 100px;">实付款</th>
                    <th  style="width: 180px;">收货信息</th>
                    <th  style="width: 180px;">订单修改信息</th>
                    <th  style="width: 61px;" >支付/发货</th>
                    <th  style="width: 61px;" >状态</th>
                    <th  style="width: 61px;" >操作</th>
                </tr>
                <?php if(is_array($info_list)): foreach($info_list as $k=>$v): $sel = in_array($v['order_state'], array('success', 'close')) ? 'hy_ordertw' : 'hy_ordertt'; ?>
                    <tr>
                        <td colspan="8" style="text-align: left">
                            <div class="hy_ordertw c666 mat10" style="margin-top: 10px">
                                订单编号：<span class="num" style="margin-right:60px"><?php echo ($v['order_id']); ?></span>
                                下单时间：<span class="num"><?php echo (pe_date($v['order_atime'])); ?></span>
                                <div class="clear"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input style="width:13px;" type="checkbox" name="key[]" value="<?php echo ($v["order_id"]); ?>"></td>

                        <td class="aleft " style="border-left:0;padding:8px 10px;width:300px;">
                            <?php if(is_array($v["product_list"])): foreach($v["product_list"] as $kk=>$vv): ?><div class="dingdan_list" <?php if($kk == 0): ?>style="padding-top:0"<?php endif; ?>>
                                <table width="100%" class="dd_tb1">
                                    <tr>
                                        <td width="50">
                                            <a href="#" target="_blank">
                                                <img src="/uploads//<?php echo (get_picture($vv['product_logo'],100,100)); ?>" width="40" height="40" class="imgbg" />
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" title="<?php echo ($vv['product_name']); ?>" target="_blank" class="cblue dd_name"><?php echo ($vv['product_name']); ?></a>
                                        </td>
                                        <td width="70" class="aright">
                                            <span class="num"><?php echo ($vv['product_money']); ?></span>(×<?php echo ($vv['product_num']); ?>)
                                        </td>
                                        <td width="70" class="aright">
                                        </td>
                                    </tr>
                                </table>
                                </div><?php endforeach; endif; ?>
                        </td>

                        <td>
                            <p class="corg num strong"><?php echo ($v['order_money']); ?></p>
                            <p class="c999">（含运费：<?php echo ($v['order_wl_money']); ?>）</p>
                            <p class="c999"><?php echo ($v['order_payment_name']); ?></p>
                        </td>

                        <td valign="top" style="width:180px;overflow:hidden;color:#555;padding-left:10px;text-align: left">
                            <p>姓名：<?php echo ($v['user_tname']); ?>
                                <?php if($v['user_phone']): ?><span class="c888 mal5">（<?php echo ($v['user_phone']); ?>）</span><?php endif; ?>
                            </p>
                            <p>地址：<?php echo ($v['user_address']); ?></p>
                            <p>留言：<span class="c888"><?php echo ($v['order_text']); ?></span></p>
                        </td>

                        <td valign="top" style="width:180px;overflow:hidden;color:#555;padding-left:10px;text-align: left">
                            <?php $elist=empty($v['edit_text'])?'':explode('|||',$v['edit_text']); ?>
                            <?php if(is_array($elist)): foreach($elist as $kk=>$vv): ?><p><span style="color: #ff5500">(<?php echo ($kk+1); ?>)&nbsp;</span> <span class="c888"><?php echo ($vv); ?></span></p><?php endforeach; endif; ?>
                        </td>

                        <td class="fufa">
                            <img src="/App/Manage/View/Public/images/fu_<?php echo ($v['order_pstate']); ?>.png" title="<?php echo (pe_date($v['order_ptime'])); ?>" />
                            <img src="/App/Manage/View/Public/images/fa_<?php echo ($v['order_sstate']); ?>.png" title="<?php echo (pe_date($v['order_stime'])); ?>" />
                        </td>

                        <td>
                            <?php echo (order_stateshow($v['order_state'])); ?>
                            <p class="mat5">
                                <a href="<?php echo U('Order/view',array('id' => $v['order_id']), '');?>"  class="c999">订单详情</a>
                            </p>
                        </td>

                        <td>
                            <?php if($v['order_state'] == 'wget' or $v['order_state'] == 'wpay'): ?><a class="tag_gray mar10" href="<?php echo U('Order/changem', array('id' => $v['order_id']));?>" onclick="return pe_dialog(this, '修改订单', 950, 550, 'order_money')">修改订单</a><?php endif; ?>

                            <?php if($v['order_state'] == 'close'): ?><a href="javascript:;" onclick="toConfirm('<?php echo U('Order/del', array('id' => $v['order_id'],'parameter'=>I('parameter')));?>', '确实要删除吗？')">删除</a><?php endif; ?>
                            <?php if($v['order_state'] == 'wget'): ?><a href="javascript:;" onclick="toConfirm('<?php echo U('Order/fh', array('key' => $v['order_id'],'parameter'=>I('parameter')));?>', '确实要发货吗？')">发货</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; ?>
            </table>
            <div class="page" style="clear: both;">
                <input type="button" style="color: red!important" onclick="doConfirmBatch('<?php echo U('Order/fh');?>', '确实要批量发货吗？')" class="btn_blue btn_f" value="批量发货">
                <input type="button" style="color: red!important" onclick="doConfirmBatch('<?php echo U('Order/close', array('batchFlag' => 1,'pid' => $pid));?>', '确实要批量关闭吗？')" class="btn_blue btn_f" value="批量关闭">
                <?php echo ($page); ?>
            </div>
        </form>
    </div>

</div>
<style>
    .list td.aleft{  text-align: left;  }
    .list td.oper img {
        width: 14px !important;
        height:14px!important;
    }
    .tongji_3{color: #00a0d4 !important;font-size: 12px;font-weight: bold;margin-left: 5px;}
    .s_org{color: #FF5A00 !important}
    .s_blue{color: #3366CC !important}

    .list td img {
         width: 40px !important;
         height: 40px!important;
     }
    .list td.fufa img {
        width: 20px !important;
        height: 20px!important;
    }
    .corg {
        color: #FF5A00 !important;
    }

    .strong {
        font-weight: bold;
    }
    .list td a {
        margin: 0px 5px;
        color: #3366CC !important;
    }

    .list{overflow:hidden; width:100%;}
    .list th{padding:7px 5px; color:#666; text-align:center; font-size:12px;}
    .list td{border-top:1px #f1f1f1 solid; color:#555; text-align:center; font-size:12px; line-height:20px; padding:8px 5px; background:#fff; color:#666;}
    .list .bgtt{background:#f2f6fc; color:#888; font-weight:normal}/*#e3f3ff*/
    .list .aright{text-align:right;}
    .list .aleft{text-align:left;}
    .list .acenter{text-align:center;}
    .list_bak th{padding:7px 5px; border:1px #eee solid; font-weight:normal; background:#f2f6fc; text-align:center}
    .list_bak td{padding:10px 5px; border:1px #eee solid; text-align:center}
    .hy_tablelist td{height:30px; line-height:30px; padding:0; font-size:13px; border:1px #ddd solid; border-top:0; border-bottom:0; text-align:center;}
    .hy_orderlist{background:#fff}
    .hy_orderlist td,.hy_orderlist th{border:1px #eee solid;padding:7px 5px; text-align:center;}
    .hy_orderlist td.aright{text-align:right;}
    .hy_orderlist td.aleft{text-align:left;}
    .hy_orderlist td.acenter{text-align:center;}
    .hy_ordertt{background:#EAF8FF; height:26px; line-height:26px; border-top:1px solid #D4E7FF; padding:0 0 0 10px; font-size:12px; color:#888}
    .hy_ordertw{background:#F5F5F5; height:26px; line-height:26px; border-top:1px solid #eeeeee; padding:0 0 0 10px; font-size:12px; color:#888}
    .hy_tablett{text-align:center}
    .hy_tablett td{border-right:0; height:35px; line-height:35px; padding:0;}
    .hy_tablett .bgtt{padding:5px 8px; font-size:12px; background:url(../images/tt5.gif) repeat-x bottom; height:20px; line-height:20px; border-bottom:1px #e8e8e8 solid; border-top:1px #e8e8e8 solid;}
    .dingdan_heji{padding:10px 20px; text-align:right; background:#f8f8f8; border-top:1px solid #f1f1f1; border-bottom:1px solid #f1f1f1;}
    .dingdan_list{padding-top:10px;}
    .dd_name{width:300px; line-height:18px;}
    a.hy_btn{background:#f3f3f3; display:inline-block; height:20px; line-height:20px; padding:0 8px; color:#555; border:1px solid #8D8D8D; border-radius:2px; font-size:12px;}
    .hy_pay{background:#f3f3f3; height:30px; padding:5px 5px 0; line-height:30px; border-bottom:1px #ddd solid;}
    .dd_tb1{border:0}
    .dd_tb1 td{border:0; text-align:left; vertical-align:top; padding:0}
    .imgbg{border:1px solid #f5f5f5;}
    table {
        border-collapse: collapse;
    }
    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }
    table tr.wtd{width:500px;}
    .dingdan_heji{padding:10px 20px; text-align:right; background:#f8f8f8; border-top:1px solid #f1f1f1; border-bottom:1px solid #f1f1f1;}
    .dingdan_list{padding-top:10px;}
</style>

</body>
</html>