<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
	<script type="text/javascript" src="<?php echo U('Public/editor');?>"></script>
	<script type="text/javascript">
        var data_path = "/Data";
        var tpl_public = "/App/Manage/View/Public";
        var tpl_upload = "/uploads/";
	</script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/calendar.config.js"></script>
</head>
<body>

<div class="main">
	<div class="pos"><?php echo ($title); ?>
	</div>
	<div class="form">
		<form method='post' id="form_do" name="form_do" action="<?php echo U('Award/save');?>" onsubmit="return chk_pro()">
			<dl>
				<dt>奖品名称</dt>
				<dd>
					<input type="text" name="name" id="name" class="inp_large" value="<?php echo ($vo["name"]); ?>" />
				</dd>
			</dl>
			<dl>
				<dt>奖品图片</dt>
				<dd>
					<div class="litpic_show">

						<div class="litpic_btn" id="btn_1">
							<span>添加图片</span>
							<input id="fileupload_1" type="file" name="mypic">
						</div>
						<div style="float:left;">
							<input type="text" class="inp_w250 inp_w251" name="pic" id="pic"  value="<?php echo ($vo["image"]); ?>" />
						</div>
						<div class="litpic_tip" id="tip_1"></div>
						<div class="clear"></div>
					</div>
					<div id="show_1">
						<?php if($vo['image']): ?><img src="/uploads/<?php echo ($vo["image"]); ?>" width='250' /><?php endif; ?>
					</div>
				</dd>
			</dl>
			<dl>
				<dt>奖品简介</dt>
				<dd>
					<textarea name="desc" id="desc" class="tarea_default tarea_default2"><?php echo ($vo["desc"]); ?></textarea>
				</dd>
			</dl>
			<div class="form_b">
				<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
				<input type="submit" class="btn_blue" id="submit" value="保 存">
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
    $(function () {
        pic_upload('tip_1','btn_1',1,'fileupload_1','show_1','pic');
        function pic_upload(tip_id,pic_btn_id,auto_form_id,fileupload_id,show_id,db_file_id) {
            //缩略图上传
            var litpic_tip = $("#"+tip_id);
            var btn = $("#"+pic_btn_id+" span");
            $("#"+fileupload_id).wrap("<form id='myupload"+auto_form_id+"' action='<?php echo U('Public/upload');?>' method='post' enctype='multipart/form-data'></form>");
            $("#"+fileupload_id).change(function(){
                if($("#"+fileupload_id).val() == "") return;
                $("#myupload"+auto_form_id).ajaxSubmit({
                    dataType:  'json',
                    beforeSend: function() {
                        $('#'+show_id).empty();
                        btn.html("上传中...");
                    },
                    success: function(data) {
                        if(data.state == 'SUCCESS'){
                            litpic_tip.html(""+ tpl_upload+data.info[0].name +" 上传成功("+data.info[0].size+"k)");
                            var img = data.info[0].url;//原图
                            if(auto_form_id==2){
                                $('#'+show_id).html("<img src='"+tpl_upload+img+"' height='10'>");
                            }else{
                                $('#'+show_id).html("<img src='"+tpl_upload+img+"' width='250'>");
                            }

                            $("#"+db_file_id).val(img);
                        }else {
                            litpic_tip.html(data.state);
                        }
                        btn.html("添加图");

                    },
                    error:function(xhr){
                        btn.html("上传失败");
                        litpic_tip.html(xhr);
                    }
                });
            });
        }
    });
    function chk_pro() {
        var title=$("#name").val();
        if(title==""){
            alert('请填写奖品名称');
            return false;
        }
        var pic=$("#pic").val();
        if(pic==""){
            alert('请上传奖品图片');
            return false;
        }
        return true;
    }
</script>
</body>
</html>