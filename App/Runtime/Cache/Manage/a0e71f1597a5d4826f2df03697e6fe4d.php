<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
    <script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/shop/js/global.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/js/date/WdatePicker.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/js/dmAddress.js"></script>
    <script type="text/javascript">
        var data_path = "/Data";
    </script>
</head>
<body>
<input type="hidden" id="index_url" value="<?php echo U('Event/total');?>">
<input type="hidden" id="get_data_url" value="<?php echo U('Event/saveTongji');?>">
<div class="main">
    <div class="pos">
        统计列表
    </div>
    <div class="operate">
        <input type="button" class="btn_blue" id="get_tongji" style="float: none" value="获取最新统计数据">
    </div>
    <div class="operate">
        <span style="margin-left: 20px;" class="s_span">区域</span>
        <select id="cmbProvince" name='sprov'></select>
        <select id="cmbCity" name='scity'></select>
        <select id="cmbArea" name='sarea'></select>
        <span  style="margin-left: 20px;" class="s_span">活动名称</span>
        <select id="e_name" name='e_name'></select>
        <!--<input style="width: 100px;" type="text" id="e_name" name="e_name" class="inp_one" value="<?php echo ($e_name); ?>" placeholder="活动名称">-->

        <span style="margin-left: 20px;" class="s_span">职场名称</span>
        <input style="width: 100px;" type="text" name="zc_name" id="zc_name" class="inp_one" value="<?php echo ($zc_name); ?>" placeholder="职场名称">

        <span  style="margin-left: 20px;" class="s_span">活动范围</span>
        <select class="area_type" id="area_type">
            <option value="">所有活动</option>
            <option <?php if($area_type==1){ ?>selected="selected"<?php } ?> value="1">市活动</option>
            <option  <?php if($area_type==2){ ?>selected="selected"<?php } ?> value="2">分公司活动</option>
            <option  <?php if($area_type==3){ ?>selected="selected"<?php } ?> value="3">职场活动</option>
        </select>

        <span  style="margin-left: 20px;" class="s_span">活动截止时间</span>
        <input style="width: 100px;" type='text' id="start_date" class="inp_one Wdate start_date" value="<?php echo ($start_date); ?>" onClick="WdatePicker()" placeholder="开始时间" readonly/>~
        <input style="width: 100px;" type='text' id="end_date" class="inp_one Wdate end_date" value="<?php echo ($end_date); ?>" onClick="WdatePicker()" placeholder="结束时间" readonly/>

        <input type="button" class="btn_blue" id="btn_submit" style="float: none" value="查  询">
    </div>
    <div class="operate" style="text-align: center;font-size: 20px;">
        <span style="margin-left: 30px;">活动数：<?php echo ($event_total['e_num']); ?></span>
        <span style="margin-left: 30px;">预约人数：<?php echo ($event_total['app_num']); ?></span>
        <span style="margin-left: 30px;">签到人数：<?php echo ($event_total['check_num']); ?></span>
        <span style="margin-left: 30px;">预约保费：<?php echo ($event_total['appointment_money']); ?></span>
        <span style="margin-left: 30px;">实际保费：<?php echo ($event_total['appointment_money_actual']); ?></span>
    </div>
    <div class="list guestbook">
        <form action="" method="post" id="form_do" name="form_do">
            <table width="100%">
                <tr>
                    <th>编号</th>
                    <th>活动名称</th>
                    <th>活动范围</th>
                    <th>省</th>
                    <th>市</th>
                    <th>区</th>
                    <th>职场</th>
                    <th>预约人数</th>
                    <th>签到人数</th>
                    <th>预约保费</th>
                    <th>实签保费</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                </tr>
                <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                        <td><?php echo ($v["id"]); ?></td>
                        <td><?php echo ($v["name"]); ?></td>
                        <td><?php echo ($v["area"]); ?></td>
                        <td><?php echo ($v["prov"]); ?></td>
                        <td><?php echo ($v["city"]); ?></td>
                        <td><?php echo ($v["areas"]); ?></td>
                        <td><?php echo ($v["zc_name"]); ?></td>
                        <td><?php echo ($v["app_num"]); ?></td>
                        <td><?php echo ($v["check_num"]); ?></td>
                        <td><?php echo ($v["appointment_money"]); ?></td>
                        <td><?php echo ($v["appointment_money_actual"]); ?></td>
                        <td><?php echo (date('Y-m-d',$v["stime"])); ?></td>
                        <td><?php echo (date('Y-m-d',$v["etime"])); ?></td>
                    </tr><?php endforeach; endif; ?>
            </table>
            <div class="page" style="clear: both">
                <?php echo ($page); ?>
            </div>
        </form>
    </div>
</div>
</body>
<script>
    $(function(){
        $("#btn_submit").bind("click",choose_data);
        $("#get_tongji").bind("click",getTongji);
        $.ajax({
            type: "POST",
            url: "<?php echo U('Zc/get_region_jsdata_new');?>",
            data:{type:'select'},
            dataType: "json",
            success: function(data){
                var provinceList=data;
                addressInitNew('cmbProvince', 'cmbCity', 'cmbArea','e_name','<?php echo ($prov); ?>', '<?php echo ($city); ?>', '<?php echo ($area); ?>','<?php echo ($e_name); ?>',provinceList);
            }
        });
    })
    function choose_data(){
        var url = $("#index_url").val();

        var prov =$.trim($("#cmbProvince").val());
        var city =$.trim($("#cmbCity").val());
        var area =$.trim($("#cmbArea").val());
        var zc_name =$.trim($("#zc_name").val());
        var area_type =$.trim($("#area_type").val());
        var e_name =$.trim($("#e_name").val());
        var start_date =$.trim($("#start_date").val());
        var end_date =$.trim($("#end_date").val());
        if(prov && prov!='请选择'){
            url += "&prov="+prov;
        }
        if(city && city!='请选择'){
            url += "&city="+city;
        }
        if(area && area!='请选择'){
            url += "&area="+area;
        }
        if(e_name && e_name!='请选择'){
            url += "&e_name="+e_name;
        }
        if(zc_name){
            url += "&zc_name="+zc_name;
        }
        if(area_type){
            url += "&area_type="+area_type;
        }
        if(start_date){
            url += "&start_date="+start_date;
        }
        if(end_date) {
            url += "&end_date=" + end_date;
        }
        location.href=url;
    }
    function getTongji(){
        var url = $('#get_data_url').val();
        $.get(url,function(ret){
            if(ret.status!=0){
                alert(ret.message);
                return false;
            }
            location.reload();
        },"json")
    }
</script>
</html>