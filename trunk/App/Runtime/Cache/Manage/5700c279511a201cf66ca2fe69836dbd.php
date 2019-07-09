<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel='stylesheet' type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/css/style.css" />
	<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/common.js"></script>
	<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/jquery.form.min.js"></script>
	<script type="text/javascript" src="<?php echo U('Public/editor');?>"></script>
	<script type="text/javascript">
        var data_path = "/waibao/present/trunk/Data";
        var tpl_public = "/waibao/present/trunk/App/Manage/View/Public";
        var tpl_upload = "/waibao/present/trunk/uploads/";
	</script>
	<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/calendar.config.js"></script>

	<link rel='stylesheet' type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/css/style_shop.css" />
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

	</script>
	<style type="text/css">
		.field_box{border:2px solid #666;padding: 10px;margin-bottom: 10px;}
		.field_box legend{color: deepskyblue;font-size: 16px;}
		span.tips{color: #e4570d}
		.ruledata_list  td img{width: 13px!important;height: 12px!important;}
		.now a.fabu{background: #38c4f0;color: #fff;
			font-size: 12px;
			cursor: pointer;}
	</style>
</head>
<body>
<div class="main">
	<div class="pos"><?php echo ($title); ?></div>
	<div class="">
		<form method='post' id="form_do" name="form_do" action="<?php echo U('Wenjuan/msg_save');?>" onsubmit="return chk()">
			<fieldset class="field_box">
				<legend>问卷基本信息</legend>
				<div class="form">
					<dl>
						<dt> 问卷名</dt>
						<dd>
							<input type="text" name="wj_name" id="wj_name" class="inp_large" maxlength="255"  value="<?php echo ($vo["name"]); ?>" />
							<span class="tips"></span>
						</dd>
					</dl>
					<dl>
						<dt> 问卷介绍：</dt>
						<dd>
							<input type="text" name="des" id="des" class="inp_large" maxlength="255"  value="<?php echo ($vo["des"]); ?>" />
							<span  class="tips">(简单的几句介绍，如：本问卷为职业生涯调查问卷，仅对公司内部员工开放)</span>
						</dd>
					</dl>
					<dl>
						<dt> 问卷提示：</dt>
						<dd>
							<textarea rows="4" cols="60" name="wj_tips"><?php echo ($vo["tips"]); ?></textarea>
							<span class="tips"> (问卷底部的备注信息，如：[注]问卷结果对所有人保密，不计入年终考核范围)</span><br/>
							<span class="tips"> 多条用|||隔开</span>
						</dd>
					</dl>
					<dl >
						<dt> 开始截止时间</dt>
						<dd>

							<input type="text" class="inp_one" name="stime" id="stime" <?php if($vo and $vo["stime"] != 0): ?>value="<?php echo (date('Y-m-d', $vo["stime"])); ?>"<?php endif; ?> >
							<script type="text/javascript">
                                Calendar.setup({
                                    weekNumbers: true,
                                    inputField : "stime",
                                    trigger    : "stime",
                                    dateFormat: "%Y-%m-%d",
                                    showTime: true,
                                    minuteStep: 1,
                                    onSelect   : function() {this.hide();}
                                });
							</script>

							~ <input type="text" class="inp_one" name="etime" id="etime" <?php if($vo and $vo["etime"] != 0): ?>value="<?php echo (date('Y-m-d', $vo["etime"])); ?>"<?php endif; ?> >
							<script type="text/javascript">
                                Calendar.setup({
                                    weekNumbers: true,
                                    inputField : "etime",
                                    trigger    : "etime",
                                    dateFormat: "%Y-%m-%d",
                                    showTime: true,
                                    minuteStep: 1,
                                    onSelect   : function() {this.hide();}
                                });
							</script>
							<span class="tips">默认没有时间限制</span>
						</dd>
					</dl>
					<div class="right_main">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="wenzhang mat20 mab20">
							<tr>
								<td style="width:90px;">所属区县：</td>
								<td align="left">
									<span style="color: red"><?php echo ($vo["prov"]); ?>-<?php echo ($vo["city"]); ?>-<?php echo ($vo["area"]); ?></span>
									<div style="color: blue">(如需更改，点击下方重新选择)</div>
									<div id="zc_all">
										<span style="vertical-align: top">省份： </span>
										<select name="province" id="selProvinces" onchange="region_changed(this, 1)" size="10" style="width:80px;height:200px;">
											<option value="">请选择...</option>
										</select>

										<span style="vertical-align: top">城市： </span>
										<select name="city" id="selCities" onchange="region_changed(this, 2)" size="10" style="width:80px;height:200px;">
											<option value="">请选择...</option>
										</select>

										<span style="vertical-align: top">区/县：</span>
										<select name="district" id="selDistricts"  size="10" style="width:130px;height:200px;">
											<option value="">请选择...</option>
										</select>
									</div>
								</td>
							</tr>
						</table>
					</div>

				</div>
			</fieldset>

			<fieldset class="field_box">
				<legend>问卷样式定制</legend>
				<div class="form">

					<dl>
						<dt> 主题样式</dt>
						<dd>
							<input type="text" name="name_style" id="name_style" class="inp_large" maxlength="255"  value="<?php echo ($vo["name_style"]); ?>" />
							<span class="tips">(如:color:red;等)</span>
						</dd>
					</dl>
					<dl>
						<dt> 题干样式</dt>
						<dd>
							<input type="text" name="title_style" id="title_style" class="inp_large" maxlength="255"  value="<?php echo ($vo["title_style"]); ?>" />
							<span class="tips">(如:color:red;等)</span>
						</dd>
					</dl>
					<dl>
						<dt> 题引样式1</dt>
						<dd>
							<input type="text" name="one_title_style" id="one_title_style" class="inp_large" maxlength="255"  value="<?php echo ($vo["one_title_style"]); ?>" />
							<span class="tips">（大标题）(如:color:red;等)</span>
						</dd>
					</dl>
					<dl>
						<dt> 题引样式2</dt>
						<dd>
							<input type="text" name="two_title_style" id="two_title_style" class="inp_large" maxlength="255"  value="<?php echo ($vo["two_title_style"]); ?>" />
							<span class="tips">（题目前面的说明）(如:color:red;等)</span>
						</dd>
					</dl>
					<dl>
						<dt> 答案样式</dt>
						<dd>
							<input type="text" name="answer_style" id="answer_style" class="inp_large" maxlength="255"  value="<?php echo ($vo["answer_style"]); ?>" />
							<span class="tips">(如:color:red;等)</span>
						</dd>
					</dl>
					<dl>
						<dt>推荐客户的描述 </dt>
						<dd>
							<input type="text" name="tjkh_desc" id="tjkh_desc" class="inp_large" maxlength="1000"  value="<?php echo ($vo["tjkh_desc"]); ?>" />
							<span class="tips">如：您是否可以再提供三位朋友，帮助理财顾问完成考核。</span>
						</dd>
					</dl>
				</div>
			</fieldset>

			<fieldset class="field_box">
				<legend>问卷图片</legend>
				<div class="form">
					<dl>
						<dt> 显示图片</dt>
						<dd>
							<div class="litpic_show">

								<div class="litpic_btn" id="btn_1">
									<span>添加图片</span>
									<input id="fileupload_1" type="file" name="mypic">
								</div>
								<div style="float:left;">
									<input type="text" class="inp_w250 inp_w251" name="pic" id="pic"  value="<?php echo ($vo["pic"]); ?>" />
								</div>
								<div class="litpic_tip" id="tip_1"></div>
								<div class="clear"></div>
							</div>
							<div id="show_1">
								<?php if($vo['pic']): ?><img src="/waibao/present/trunk/uploads/<?php echo ($vo["pic"]); ?>" width='250' /><?php endif; ?>
							</div>
						</dd>
					</dl>

				</div>
			</fieldset>

			<?php if($vo["is_old"] != 1): ?><fieldset class="field_box">
				<legend>题目管理</legend>
				<div class="form">
					<div class="now">

						<?php if(is_array($qtype_list)): foreach($qtype_list as $key=>$v): ?><a href="javascript:ruledata_add(<?php echo ($v["id"]); ?>);" class="fabu">添加<?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
						<div class="clear"></div>
					</div>
					<div class="right_main">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list" id="rule_data">
							<tr>
								<th class="bgtt" width="150">序号</th>
								<th class="bgtt" width="210">题目标题</th>
								<th class="bgtt" width="150">类型</th>
								<th class="bgtt" width="210">选项<span style="color: red">(多个选项用|隔开)</span></th>
								<th class="bgtt">题引<span style="color: red">(大标题用|开头)</span></th>
								<th class="bgtt">前缀</th>
								<th class="bgtt">后缀</th>
								<th class="bgtt">排序方式</th>
								<th class="bgtt" width="100">操作</th>
							</tr>
							<?php if(is_array($info_list)): foreach($info_list as $k=>$v): ?><tr class="ruledata_list"  >
									<td><?php echo ($k+1); ?></td>
									<td class="aleft">
										<input type="hidden" name="qid[]" value="<?php echo ($v['id']); ?>" />
										<textarea rows="4" cols="50" name="name[]" ><?php echo ($v["name"]); ?></textarea>
									</td>
									<td>
										<?php echo ($v["type"]["name"]); ?>
										<input type="hidden" name="q_type[]" value="<?php echo ($v["q_type"]); ?>"/>
									</td>
									<td>
										<?php if($v['type']['has_answer'] == 1): ?><textarea rows="4" cols="50" name="content[]"><?php echo ($v["content"]); ?></textarea>
										<?php else: ?>
											<textarea style="display: none" rows="4" cols="50" name="content[]"></textarea><?php endif; ?>
									</td>
									<td>
										<?php if($v['type']['has_title_des'] == 1): ?><textarea rows="4" cols="50" name="tips[]"><?php echo ($v["tips"]); ?></textarea>
											<?php else: ?>
											<textarea style="display: none" rows="4" cols="50" name="tips[]"></textarea><?php endif; ?>
									</td>
									<td>
										<?php if($v['type']['has_prev'] == 1): ?><input type="text" name="prev[]" value="<?php echo ($v["prev"]); ?>" class="inp_large" style="width:100px;" />
											<?php else: ?>
											<input type="hidden" name="prev[]" value="" class="inp_large" style="width:100px;" /><?php endif; ?>
									</td>
									<td>
										<?php if($v['type']['has_next'] == 1): ?><input type="text" name="next[]" value="<?php echo ($v["next"]); ?>" class="inp_large" style="width:100px;" />
											<?php else: ?>
											<input type="hidden" name="next[]" value="" class="inp_large" style="width:100px;" /><?php endif; ?>
									</td>
									<td>
										<?php if($v['type']['has_sort'] == 1): ?><select name="display_sort[]">
												<option value="3" <?php if($v["display_sort"] == 3): ?>selected="selected"<?php endif; ?>>题干一行，答案一排全显</option>
												<option value="2" <?php if($v["display_sort"] == 2): ?>selected="selected"<?php endif; ?>>题干一行，答案一排一个</option>
												<option value="1" <?php if($v["display_sort"] == 1): ?>selected="selected"<?php endif; ?>>题干：答案在同一行</option>
											</select>
											<?php else: ?>
											<input  type="hidden" name="display_sort[]" value="1" class="inp_large" style="width:100px;" /><?php endif; ?>
									</td>
									<td>
										<img style="cursor:pointer;" title="向上移动" class="icon_up mat3" src="/waibao/present/trunk/App/Manage/View/Public/images/icon_up.gif" />
										<img style="cursor:pointer;" title="向上移动" class="icon_down mat3 mal10" src="/waibao/present/trunk/App/Manage/View/Public/images/icon_down.gif" />
										<img style="cursor:pointer;" title="删除" class="icon_del mat3 mal10" onclick="rule_del(this, 0)" src="/waibao/present/trunk/App/Manage/View/Public/images/icon_del.gif" />
									</td>
								</tr><?php endforeach; endif; ?>

							<?php if(is_array($qtype_list)): foreach($qtype_list as $key=>$v): ?><tr class="ruledata_list ruledata_list<?php echo ($v["id"]); ?>"  style="display:none">
									<td>1</td>
									<td class="aleft">
										<input type="hidden" name="qid[]" value="" />
										<textarea rows="4" cols="50" name="name[]"></textarea>
									</td>
									<td>
										<?php echo ($v["name"]); ?>
										<input type="hidden" name="q_type[]" value="<?php echo ($v["id"]); ?>"/>
									</td>
									<td>
										<?php if($v["has_answer"] == 1): ?><textarea rows="4" cols="50" name="content[]"></textarea>
										<?php else: ?>
											<textarea style="display: none" rows="4" cols="50" name="content[]"></textarea><?php endif; ?>
									</td>
									<td>
										<?php if($v["has_title_des"] == 1): ?><textarea rows="4" cols="50" name="tips[]"></textarea>
											<?php else: ?>
											<textarea style="display: none" rows="4" cols="50" name="tips[]"></textarea><?php endif; ?>
									</td>
									<td>
										<?php if($v["has_prev"] == 1): ?><input type="text" name="prev[]" value="" class="inp_large" style="width:100px;" />
											<?php else: ?>
											<input type="hidden" name="prev[]" value="" class="inp_large" style="width:100px;" /><?php endif; ?>
									</td>
									<td>
										<?php if($v["has_next"] == 1): ?><input type="text" name="next[]" value="" class="inp_large" style="width:100px;" />
											<?php else: ?>
											<input type="hidden" name="next[]" value="" class="inp_large" style="width:100px;" /><?php endif; ?>
									</td>
									<td>
										<?php if($v["has_sort"] == 1): ?><select name="display_sort[]">
											<option value="3">题干一行，答案一排全显</option>
											<option value="2">题干一行，答案一排一个</option>
											<option value="1">题干：答案在同一行</option>
										</select>
											<?php else: ?>
											<input  type="hidden" name="display_sort[]" value="1" class="inp_large" style="width:100px;" /><?php endif; ?>
									</td>
									<td>
										<img style="cursor:pointer;" title="向上移动" class="icon_up mat3" src="/waibao/present/trunk/App/Manage/View/Public/images/icon_up.gif" />
										<img style="cursor:pointer;" title="向上移动" class="icon_down mat3 mal10" src="/waibao/present/trunk/App/Manage/View/Public/images/icon_down.gif" />
										<img style="cursor:pointer;" title="删除" class="icon_del mat3 mal10" onclick="rule_del(this, 0)" src="/waibao/present/trunk/App/Manage/View/Public/images/icon_del.gif" />
									</td>
								</tr><?php endforeach; endif; ?>
						</table>
					</div>

					<div class="now">
						<?php if(is_array($qtype_list)): foreach($qtype_list as $key=>$v): ?><a href="javascript:ruledata_add(<?php echo ($v["id"]); ?>);" class="fabu">添加<?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
						<div class="clear"></div>
					</div>
				</div>
			</fieldset><?php endif; ?>
			<div class="form_b">
				<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
				<input type="submit" class="btn_blue" id="submit" value="提 交">
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
    $(function(){
        get_prov();

        $(".icon_up").live("click", function(){
            var current = $(this).parents("tr");
            var prev = $(this).parents("tr").prev();
            if (current.index() > 1) {
                current.insertBefore(prev);
                var current_num = current.find("td:first").html();
                var prev_num = prev.find("td:first").html();
                current.find("td:first").html(prev_num)
                prev.find("td:first").html(current_num)
                current.find("td").css("background-color", "#fff").find(":input").slideUp(100).delay(100).fadeIn(200);
            }
        })
        $(".icon_down").live("click", function(){
            var current = $(this).parents("tr");
            var next = $(this).parents("tr").next();
            if (next.is("tr:visible")) {
                current.insertAfter(next);
                var current_num = current.find("td:first").html();
                var next_num = next.find("td:first").html();
                current.find("td:first").html(next_num)
                next.find("td:first").html(current_num)
                current.find("td").css("background-color", "#fff").find(":input").slideUp(100).delay(100).fadeIn(200);
            }
        })
    })
    function rule_del(_this) {
        $(_this).parents("tr").remove();
    }
    function ruledata_add(id) {
        var html=$("#rule_data tr.ruledata_list"+id+"").clone(true);
        html.removeClass("ruledata_list"+id);
        $(".ruledata_list1").before(html);
        var _num = $(".ruledata_list:visible").length > 0 ? parseInt($(".ruledata_list:visible:last").find("td:first").text()) : 0;
        $(".ruledata_list:hidden:first").show().find("td:first").html(_num + 1);
    }
</script>

<script type="text/javascript" charset="utf-8">

    function get_prov() {
        $.getJSON("<?php echo U('Zc/get_prov_jsdata');?>", function(json){
            add_option('selProvinces',json);
        })
    }
    function get_city(pid) {
        $.getJSON("<?php echo U('Zc/get_city_jsdata');?>",{pid:pid}, function(json){
            add_option('selCities',json);
        })
    }
    function get_area(pid) {
        $.getJSON("<?php echo U('Zc/get_area_jsdata');?>",{pid:pid}, function(json){
            add_option('selDistricts',json);
        })
    }

    function clear_select(id) {
        var clear_html='<option value="">请选择...</option>';
        $("#"+id).html(clear_html);
    }

	/* *
	 * 处理下拉列表改变的函数
	 *
	 * @obj     object  下拉列表
	 * @type    integer 类型
	 * @selName string  目标列表框的名称
	 */
    function region_changed(obj, type) {
        var val=obj.options[obj.selectedIndex].value;
        switch (type){
            case 1:
                get_city(val);
                clear_select('selDistricts');
                clear_select('selZc');
                break;
            case 2:
                get_area(val);
                clear_select('selZc');
                break;
        }
    }

    function add_option(id,json) {
        var html_str='';
        for(var o in json){
            html_str+='<option value="'+json[o].region_id+'">'+json[o].region_name+'</option>';
        }
        $("#"+id).html(html_str);
    }

    function chk_pro() {
        var checkIndex=$("#selZc ").get(0).selectedIndex;
        if (checkIndex >= 0) {
        } else {
            //alert('没有职场被选择');
        }
        return true;
    }
</script>

</body>
</html>