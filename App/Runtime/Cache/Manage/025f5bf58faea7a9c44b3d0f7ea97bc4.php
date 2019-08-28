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
    <script type="text/javascript">
        var data_path = "/Data";
    </script>
</head>
<body>
<style>
    .form_popup {
        position: absolute;
        z-index: 3;
        top: 33px;
        left: 0;
        background: #fff;
        border: 1px solid #ccc;
        width: 198px;
        display: block;
        border-radius: 3px;
    }
    .form_popup ul {
        max-height: 260px;
        overflow-y: auto;
    }
    .form_popup ul li {
        line-height: 26px;
        height: 26px;
        padding-left: 10px;
        border-radius: 3px;
    }
    .form_popup ul li a{color: #333;}
    .form_popup ul li:hover {
        background: #32c8af;
    }
    .form_popup ul li:hover a{color: #fff;}

</style>
<input type="hidden" id="e_id" value="<?php echo ($event['id']); ?>">
<input type="hidden" id="export_url" value="<?php echo U('Check/exportEx',array('e_id'=>$event['id']));?>">
<input type="hidden" id="index_url" value="<?php echo U('Check/index',array('e_id'=>$event['id']));?>">
<input type="hidden" id="member_url" value="<?php echo U('Appointment/getMember');?>">
<input type="hidden" id="zc_url" value="<?php echo U('Appointment/getZC');?>">
<div class="main">
    <div class="pos">
        <?php echo ($event['name']); ?>--签到列表
    </div>
    <div class="operate">
        <div class="left">
            <input type="button" id="exportEx" class="btn_blue" value="批量导出">
        </div>
        <div class="left">
            <a title="生成二维码，请先选择业务员" class="btn_blue btn_red" href="<?php echo U('Check/qrcode',array('e_id'=>$event['id'],'member_id'=>$member_id));?>" target="_blank">签到二维码</a>
        </div>
    </div>
    <div class="operate">
        <div class="left search_box" style="position: relative">
            <!--<form method="post" action="<?php echo U('Appointment/index');?>">-->
                <input type="text" id="member" class="inp_one" autocomplete="off" alt="<?php echo ($member_id); ?>" value="<?php echo ($member); ?>" placeholder="业务员搜索" style="margin-right: 50px;">
                <input type="text" id="zc" class="inp_one" autocomplete="off" alt="<?php echo ($zc_id); ?>" value="<?php echo ($zc); ?>" placeholder="职场搜索" style="margin-right: 50px;">
                <input type="text" id="name" name="name" class="inp_one" autocomplete="off" value="<?php echo ($name); ?>" placeholder="关键词">
                <select name="is_appointment" id="is_appointment">
                    <option value="0">-- 是否预约保费 --</option>
                    <option value="1" <?php if($is_appointment == 1): ?>selected<?php endif; ?>>否</option>
                    <option value="2" <?php if($is_appointment == 2): ?>selected<?php endif; ?>>是</option>
                </select>
                <input type="button" id="search_btn" class="btn_blue" style="float: none" value="查  询">
            <!--</form>-->
        </div>
        <div class="clear"></div>
    </div>

    <div class="list guestbook">
        <form action="" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>
                <th><input type="checkbox" id="check"></th>
                <th>编号</th>
                <th>昵称</th>
                <th>姓名</th>
                <th>手机号</th>
                <th>性别</th>
                <th>业务员</th>
                <th>头像</th>
                <th>省</th>
                <th>城市</th>
                <th>是否预约保费</th>
                <th>预约保费金额(元)</th>
                <th>实际预约保费金额(元)</th>
                <!--<th style="width: 150px">操作</th>-->
            </tr>
            <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                    <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                    <td><?php echo ($v["id"]); ?></td>
                    <td>
                        <?php echo ($v["name"]); ?>
                    </td>
                    <td>
                        <?php echo ($v["username"]); ?>
                    </td>
                    <td>
                        <?php echo ($v["phone"]); ?>
                    </td>
                    <td><?php echo ($v["sex"]); ?></td>
                    <td><?php echo ($v["member"]); ?></td>
                    <td style="width:40px;"><img src="<?php echo ($v["image"]); ?>" alt=""></td>
                    <td><?php echo ($v["province"]); ?></td>
                    <td><?php echo ($v["city"]); ?></td>
                    <td><?php echo ($v['is_appointment'] == 1 ? '否' : '是'); ?></td>
                    <td><?php echo ($v["appointment_money"]); ?></td>
                    <td><?php echo ($v["appointment_money_actual"]); ?></td>
                    <!--<td>-->
                        <!--<a href="<?php echo U('Appointment/add',array('id' => $v['id']), '');?>">编辑</a>-->
                        <!--<a href="javascript:;" onclick="toConfirm('<?php echo U('Appointment/del',array('id' => $v['id'],'e_id' => $event['id']), '');?>', '确实要删除吗？')">删除</a>-->
                    <!--</td>-->
                </tr><?php endforeach; endif; ?>
        </table>

        <div class="page" style="clear: both">
            <!--<input type="button" onclick="doConfirmBatch('<?php echo U('Appointment/delBatch', array('batchFlag' => 1,'e_id' => $event['id']));?>', '确实要删除选择项吗？')" class="btn_blue btn_f" value="删除">-->
            <?php echo ($page); ?>
        </div>
        </form>
    </div>
</div>
<div class="form_popup" id="popupMenuUI" style="display:none; width:180px;overflow: hidden">
    <ul>

    </ul>
</div>
<li id="popupRowUI" style="display:none;"><a href="javascript:" alt="-1"></a></li>
<style>
    .list td img {
        width: 40px!important;
        height:auto !important;
    }
    .list td.aleft img {
        width: 60px!important;
        height: auto!important;
    }
</style>
<script>
    $(function () {
        $('#name').bind('keypress', enterOrderSearch);
        $("#member").bind("click", selectSupplier).bind("keyup", selectSupplier).bind('input', function () {
            $("#member").attr('alt', '');
        });
        $('#zc').bind('click', selectSupplierZC).bind('keyup', selectSupplierZC).bind('input', function(){
            $('#zc').attr('alt', '');
        })
        $(document).unbind().bind("click", function () { // 点击消失
            $("div.form_popup:visible").remove();
        });
        $("#search_btn").bind("click", choose_data);
    })
    function choose_data(){
        var url = $("#index_url").val();
        var name =$.trim($("#name").val());
        var member_id = parseInt($("#member").attr("alt"));
        var member = $("#member").val();
        var zc_id = parseInt($('#zc').attr('alt'))
        var zc = $('#zc').val()
        var is_appointment = $('#is_appointment').val()
        if(name){
            url += "&name="+name;
        }
        if(member_id>0){
            url += "&member_id="+member_id;
            url += "&member="+member;
        }
        if(zc_id > 0){
            url += '&zc_id=' + zc_id;
            url += '&zc=' + zc
        }
        if(is_appointment > 0){
            url += '&is_appointment=' + is_appointment
        }
        location.href=url;
    }
    //筛选业务员
    function selectSupplier(){
        $(".search_box .form_popup").remove();
        var thatInput 	= $(this);
        var url 		= $("#member_url").val();
        var keywords   = $.trim($(this).val());
        url += "&keywords="+keywords;
        $.getJSON(url,function(ret){
            var popupMenuUI = $("#popupMenuUI").clone().removeAttr("id").show().addClass("form_popup");
            $.each(ret.data,function(i,v){
                var popupRowUI = $("#popupRowUI").clone().removeAttr("id").show();
                popupRowUI.find("a").text(v.name);
                popupRowUI.find("a").attr('alt',v.id);
                popupRowUI.find('a').addClass('text-ellipsis');
                popupMenuUI.find("ul").append(popupRowUI);
                popupRowUI.bind("click",function(){
                    var text = $(this).find("a").text();
                    var alt = $(this).find("a").attr('alt');
                    if(text!=" "){
                        thatInput.val(text);
                        thatInput.attr('alt',alt);
                        $(".search_box .form_popup").remove();
                        choose_data();
                    }
                });
            });
            thatInput.after(popupMenuUI);
        });
    }

    //筛选职场
    function selectSupplierZC(){
        $(".search_box .form_popup").remove();
        var thatInput 	= $(this);
        var url 		= $("#zc_url").val();
        var keywords   = $.trim($(this).val());
        url += "&keywords="+keywords;
        $.getJSON(url,function(ret){
            var popupMenuUI = $("#popupMenuUI").clone().removeAttr("id").show().addClass("form_popup");
            popupMenuUI.css({left: '240px'})
            $.each(ret.data,function(i,v){
                var popupRowUI = $("#popupRowUI").clone().removeAttr("id").show();
                popupRowUI.find("a").text(v.name);
                popupRowUI.find("a").attr('alt',v.id);
                popupRowUI.find('a').addClass('text-ellipsis');
                popupMenuUI.find("ul").append(popupRowUI);
                popupRowUI.bind("click",function(){
                    var text = $(this).find("a").text();
                    var alt = $(this).find("a").attr('alt');
                    if(text!=" "){
                        thatInput.val(text);
                        thatInput.attr('alt',alt);
                        $(".search_box .form_popup").remove();
                        choose_data();
                    }
                });
            });
            thatInput.after(popupMenuUI);
        });
    }

    //搜索
    function enterOrderSearch(event)
    {
        if(event.keyCode == 13)
        {
            choose_data();//搜索
            return false;

        }
    }
    $("#exportEx").bind("click",function(){
//        var ids =getIds();
//        if(!ids.length>0){
//            alert('请选择要导出的项！');
//            return false;
//        }
        var url = $("#export_url").val();
        var name =$.trim($("#name").val());
        var member_id = parseInt($("#member").attr("alt"));
        var member = $("#member").val();
        var zc_id = parseInt($('#zc').attr('alt'))
        var zc = $('#zc').val()
        var is_appointment = $('#is_appointment').val()
        if(name){
            url += "&name="+name;
        }
        if(member_id>0){
            url += "&member_id="+member_id;
            url += "&member="+member;
        }
        if(zc_id > 0){
            url += '&zc_id=' + zc_id;
            url += '&zc=' + zc;
        }
        if(is_appointment > 0){
            url += '&is_appointment=' + is_appointment
        }
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.responseType = 'blob';
        xhr.onload = function(e) {
            if (this.status == 200) {
                var blob = this.response;
                var reader = new FileReader();
                reader.readAsDataURL(blob);  // 转换为base64，可以直接放入a表情href
                reader.onload = function (e) {
                    // 转换完成，创建一个a标签用于下载
                    var a = document.createElement('a');
                    a.download = '签到用户列表.xlsx';
                    a.href = e.target.result;
                    $("body").append(a);  // 修复firefox中无法触发click
                    a.click();
                    $(a).remove();
                }
            }
        };

        xhr.send();
    })
    function getIds(){
        var obj = document.getElementsByName('key[]');
        var result =[];
        var j= 0;
        for (var i=0;i<obj.length;i++){
            if (obj[i].checked===true){
                result.push(obj[i].value);
                j++;
            }
        }
        return result;
    }
</script>
</body>
</html>