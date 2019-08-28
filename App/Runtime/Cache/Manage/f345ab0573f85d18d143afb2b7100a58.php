<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
	<script type="text/javascript">
        var data_path = "/Data";
        var tpl_public = "/App/Manage/View/Public";
        var tpl_upload = "/uploads/";
	</script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/calendar.config.js"></script>
</head>
<body>
<style>
	.form dl dd .form_popup {
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
	.form dl dd .form_popup ul {
		max-height: 260px;
		overflow-y: auto;
	}
	.form dl dd .form_popup ul li {
		line-height: 26px;
		height: 26px;
		padding-left: 10px;
		border-radius: 3px;
	}
	.form dl dd .form_popup ul li a{color: #333;}
	.form dl dd .form_popup ul li:hover {
		background: #32c8af;
	}
	.form dl dd .form_popup ul li:hover a{color: #fff;}
	.form dl {
		height: 32px;
		overflow: visible;
	}
</style>
<input type="hidden" id="e_id" value="<?php echo ($vo['e_id']); ?>">
<input type="hidden" id="save_url" value="<?php echo U('Appointment/save');?>">
<input type="hidden" id="member_url" value="<?php echo U('Appointment/getMember');?>">
<input type="hidden" id="index_url" value="<?php echo U('Appointment/index',array('e_id'=>$vo['e_id']));?>">

<div class="main">
	<div class="pos"><?php echo ($title); ?>
	</div>
	<div class="form">
		<!--<form method='post' id="form_do" name="form_do" action="<?php echo U('Appointment/save');?>" onsubmit="return chk_pro()">-->
			<dl>
				<dt>姓名</dt>
				<dd>
					<input type="text" name="name" id="name" class="inp_large" value="<?php echo ($vo["name"]); ?>" />
				</dd>
			</dl>
		<dl>
			<dt>业务员</dt>
			<dd style="position: relative;">
				<input type="text" alt="<?php echo ($vo["member_id"]); ?>" name="member" id="member" class="inp_large" value="<?php echo ($vo["member"]); ?>" autocomplete="off" />

			</dd>
		</dl>
			<dl>
				<dt>手机号</dt>
				<dd>
					<input type="text" name="phone" id="phone" class="inp_large" value="<?php echo ($vo["phone"]); ?>" />
				</dd>
			</dl>
			<dl>
				<dt>性别</dt>
				<dd><input type="radio" class="sex" name="sex" value="男"  <?php if($vo['sex']=='男'){ ?>checked="checked"<?php } ?> />
				男
				<input type="radio" class="sex" name="sex" value="女" <?php if($vo['sex']!='男'){ ?>checked="checked"<?php } ?> />
				女
				</dd>
			</dl>
			<dl>
				<dt>房间号</dt>
				<dd>
					<input type="text" name="room_num" id="room_num" class="inp_large" value="<?php echo ($vo["room_num"]); ?>" />
				</dd>
			</dl>
			<div class="form_b">
				<input type="hidden" id="id" name="id" value="<?php echo ($vo["id"]); ?>" />
				<input type="submit" class="btn_blue" id="submit" value="保 存">
			</div>
		<!--</form>-->
	</div>
</div>
<div class="form_popup" id="popupMenuUI" style="display:none; width:444px;overflow: hidden">
	<ul>

	</ul>
</div>
<li id="popupRowUI" style="display:none;"><a href="javascript:" alt="-1"></a></li>
<script type="text/javascript">
    var is_double =false;
    $(function () {
        $("#member").bind("click",selectSupplier).bind("keyup",selectSupplier).bind('input',function () {
            $("#member").attr('alt','');
        });
        $(document).unbind().bind("click",function(){ // 点击消失
            $("div.form_popup:visible").remove();
        });
        $('#submit').bind("click",function(){
            var _tmp =new Object();
            _tmp.id =$("#id").val();
            _tmp.e_id =$("#e_id").val();
            _tmp.name =$.trim($('.form').find("#name").val());
            _tmp.member_id =parseInt($('.form').find("#member").attr('alt'));
            _tmp.phone =$.trim($('.form').find("#phone").val());
            _tmp.sex =$('.form').find('input.sex:radio:checked').val();
            _tmp.room_num =$.trim($('.form').find('input#room_num').val());
            if(!_tmp.name){
                alert("请输入姓名");
                return false;
            }
            if(!_tmp.member_id>0){
                alert("请选择业务员");
                return false;
            }
			if(!_tmp.phone){
				alert("请输入手机号");
				return false;
			}
            var pattern = /^1[3|4|5|6|7|8|9][0-9]{9}$/;
            if(!pattern.test(_tmp.phone)){
                alert('手机号格式不正确');
                return false;
            }
            if(!is_double){
                is_double = true;
                var url = $('#save_url').val();
                $.post(url,{app_data:_tmp},function(ret){
                    is_double = false;
                    if(ret.status!=0){
                        alert(ret.message);
                        is_double = false;
                        return false;
                    }
                    location.href=$('#index_url').val();
                },'json')
            }
		})
    });
    //筛选业务员
    function selectSupplier(){
        $(".form .form_popup").remove();
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
						$(".form .form_popup").remove();
					}
				});
			});
			thatInput.after(popupMenuUI);
		});
    }
</script>
</body>
</html>