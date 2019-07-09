<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/common.js"></script>

    <script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/dmAddress.js"></script>
    <script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/jquery.form.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/js/calendar/jscal2.css"/>
    <link rel="stylesheet" type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/js/calendar/border-radius.css"/>
    <link rel="stylesheet" type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/js/calendar/win2k.css"/>
    <script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/calendar/calendar.js"></script>
    <script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/calendar/lang/en.js"></script>
</head>
<body>
<style>
    .list td.org,span.org{color: #e4570d;}
    .list td.blue,span.blue{color: #19a8ee}
</style>
<div class="main">
    <div class="pos">职场活动统计
        <?php if($_admin_flag == false): ?>[<?php echo ($_zcinfo["prov"]); ?>-<?php echo ($_zcinfo["city"]); ?>-<?php echo ($_zcinfo["area"]); ?>:<?php echo (get_zc_name($_zcinfo["zc_id"])); ?>]<?php endif; ?>
    </div>
    <div class="operate">
        <div class="left" style="float: left;margin-top:8px">
            <form method="post" action="<?php echo U('Event/export_zctj_ex');?>">
                <?php if(is_array($search_p)): foreach($search_p as $k=>$v): ?><input type="hidden" name="<?php echo ($k); ?>" value="<?php echo ($v); ?>"/><?php endforeach; endif; ?>
                <input type="submit" class="btn_blue btn_red" style="float: none" value="导出">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="operate">
        <div class="left">
            <span style="color: orangered;">
                总数量：<?php echo ($total_num); ?>
            </span>
        </div>
        <div class="clear"></div>
    </div>
    <div class="operate">
        <div class="left">
            <form method="post" action="<?php echo U('Event/zc');?>">
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

                <span class="s_span">职场名称：</span>
                <input type="text" style="width:100px;" name="sname" class="inp_one" value="<?php echo ($sname); ?>" >
                <span class="s_span">参与时间：</span>
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

                <input type="submit" class="btn_blue" style="float: none" value="查  询">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="list">
        <table width="100%">
            <tr>
                <th style="width:8%">省</th>
                <th style="width:8%">市</th>
                <th style="width:8%">区</th>
                <th style="width:20%">职场</th>
                <th style="width:15%">业务员数</th>
                <th style="width:15%">有活动数的业务员数</th>
                <th style="width:15%">参与客户数</th>
            </tr>
            <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                    <td><?php echo ($v["prov"]); ?></td>
                    <td><?php echo ($v["city"]); ?></td>
                    <td><?php echo ($v["area"]); ?></td>
                    <td><?php echo ($v["zc"]); ?></td>
                    <td class="org"><?php echo ($v["ywy"]); ?></td>
                    <td class="org"><?php echo ($v["bf_ywy"]); ?></td>
                    <td class="blue"><?php echo ($v["num"]); ?></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
    <div class="operate">
        <div class="left">
            <span style="color: orangered;">
                &nbsp;&nbsp;总数量：<?php echo ($total_num); ?>
            </span>
        </div>
        <div class="clear"></div>
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