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
		<?php if($_admin_flag == false): ?>[<?php echo ($_zcinfo["prov"]); ?>-<?php echo ($_zcinfo["city"]); ?>-<?php echo ($_zcinfo["area"]); ?>:<?php echo (get_zc_name($_zcinfo["zc_id"])); ?>]<?php endif; ?>
	</div>
	<div class="form">
		<form method='post' id="form_do" name="form_do" action="<?php echo U('Event/msg_save');?>" onsubmit="return chk_pro()">
			<dl>
				<dt>活动名</dt>
				<dd>
					<input type="text" name="name" id="name" class="inp_large" maxlength="255"  value="<?php echo ($vo["name"]); ?>" />
				</dd>
			</dl>
			<dl>
				<dt>活动场次</dt>
				<dd>
					<input type="text" name="alias" id="alias" class="inp_large" maxlength="255"  value="<?php echo ($vo["alias"]); ?>" />
				</dd>
			</dl>
			<dl>
				<dt>活动时间</dt>
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
			<dl>
				<dt>活动地点</dt>
				<dd>
					<input type="text" name="address" id="address" class="inp_large" maxlength="255"  value="<?php echo ($vo["address"]); ?>" />
				</dd>
			</dl>
			<dl>
				<dt>活动范围</dt>
				<dd>
					<select name="area" id="area" style="width:180px;height:30px;border: solid 1px #d7d7d7;">
						<option <?php if($vo['area']==3){ ?>selected="selected"<?php } ?> value="3">职场活动</option>
						<option <?php if($vo['area']==2){ ?>selected="selected"<?php } ?>  value="2">分公司活动</option>
						<option <?php if($vo['area']==1){ ?>selected="selected"<?php } ?> value="1">市活动</option>
					</select>
				</dd>
			</dl>
			<dl class="area_show city_box" style="display: none;">
				<dt>选择市</dt>
				<dd>
					<select name="citys" id="citys" style="width:180px;height:30px;border: solid 1px #d7d7d7;">
						<?php if(is_array($citys)): foreach($citys as $key=>$val): ?><option <?php if($vo['citys']==$val['city']){ ?>selected="selected"<?php } ?> value="<?php echo ($val['city']); ?>"><?php echo ($val['city']); ?></option><?php endforeach; endif; ?>

					</select>
				</dd>
			</dl>
			<dl class="area_show fgs_box" style="display: none;">
				<dt>选择分公司</dt>
				<dd>
					<select name="areas" id="areas" style="width:180px;height:30px;border: solid 1px #d7d7d7;">
						<?php if(is_array($areas)): foreach($areas as $key=>$val): ?><option <?php if($vo['areas']==$val['area']){ ?>selected="selected"<?php } ?> value="<?php echo ($val['area']); ?>"><?php echo ($val['area']); ?></option><?php endforeach; endif; ?>
					</select>
				</dd>
			</dl>
			<div  class="right_main area_show zc_box" style="border-bottom: 1px solid #EDEDED;padding-top: 8px;padding-bottom: 8px">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="wenzhang mat20 mab20">
					<tr>
						<td style="width:160px;">参与职场<span class="c999 mal10">（可多选）</span>：</td>
						<td align="left">
							<input type="hidden" name="zc_info" value="<?php echo ($vo["zc_info"]); ?>" id="zc_info"/>
							<div id="zcCell">
								<?php if($vo.zc_info): if(is_array($vo["zc_info"])): foreach($vo["zc_info"] as $key=>$zc): ?><input type="checkbox" checked="checked" name="zc[]" value="<?php echo ($zc["id"]); ?>" id="zc_2" class="inputfix"> <?php echo ($zc["name"]); endforeach; endif; endif; ?>
							</div>
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
								<select name="district" id="selDistricts" onchange="region_changed(this, 3)" size="10" style="width:130px;height:200px;">
									<option value="">请选择...</option>
								</select>

								<span style="vertical-align: top">职场： </span>
								<select name="zc" id="selZc"  size="10" style="width:180px;height:200px;">
									<option value="">请选择...</option>
								</select>
								<span style="vertical-align: top">
									<input type="button" value="+单个" class="button" onclick="addRegion()">

									<input type="button" value="+全部" class="button" onclick="addAll()">
									<input type="button" value="-全部" class="button" onclick="delAll()">
								</span>
							</div>

						</td>
					</tr>
				</table>
			</div>
			<dl>
				<dt>是否抽奖</dt>
				<dd>
					<input type="radio" name="is_draw" value="1" <?php if($vo['is_draw']==1){ ?>checked="checked"<?php } ?> />是
					<input type="radio" name="is_draw" value="0" <?php if($vo['is_draw']!=1){ ?>checked="checked"<?php } ?> />否
				</dd>
			</dl>
			<dl>
				<dt>是否预约保费</dt>
				<dd>
					<input type="radio" name="is_order" value="1" <?php if($vo['is_order']==1){ ?>checked="checked"<?php } ?> />是
					<input type="radio" name="is_order" value="0" <?php if($vo['is_order']!=1){ ?>checked="checked"<?php } ?> />否
				</dd>
			</dl>
			<dl>
				<dt>最大报名人数</dt>
				<dd>
					<input type="number" name="max_member" id="max_member" class="inp_large" value="<?php echo ($vo["max_member"]); ?>" />
				</dd>
			</dl>
			<dl>
				<dt>活动内容</dt>
				<dd>
					<textarea name="content" id="content"><?php echo ($vo["content"]); ?></textarea>
				</dd>
			</dl>


			<div class="form_b">
				<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
				<input type="submit" class="btn_blue" id="submit" value="保 存">
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
    $(function(){
        get_prov();
        //初始化显示分公司 市 还是职场
        box_change();
        $("#area").bind("change",function(){
            box_change();
		})
    });
	function box_change(){
        var area = $("#area").val();
        $(".area_show").hide()
        if(area==1){
            $(".city_box").show()
        }else if(area==2){
            $(".fgs_box").show()
        }else{
            $(".zc_box").show()
        }
	}
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
    function get_zc(pid) {
        $.getJSON("<?php echo U('Zc/get_zc_jsdata');?>",{pid:pid}, function(json){
            var id='selZc';
            var html_str='';
            for(var o in json){
                html_str+='<option value="'+json[o].id+'">'+json[o].name+'</option>';
            }
            if(html_str==''){
                alert('该区域没有职场,请重新选择');
            }else{
                $("#"+id).html(html_str);
            }
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
            case 3:clear_select('selZc');get_zc(val);break;
        }
    }

    function add_option(id,json) {
        var html_str='';
        for(var o in json){
            html_str+='<option value="'+json[o].region_id+'">'+json[o].region_name+'</option>';
        }
        $("#"+id).html(html_str);
    }

    //打开规格框
    function rule_open() {
        url = "<?php echo U('Product/rule');?>";
        if ($(":input[name='product_ruleid[]']").length > 0) {
            var product_ruleid = new Array();
            $(":input[name='product_ruleid[]']").each(function(){
                product_ruleid.push($(this).val());
            })
            product_ruleid = product_ruleid.join(',');
            url += "&id="+ product_ruleid;
        }
        pe_dialog(url, '选择规格', 1000, 550);
    }

    function addAll() {
        //var zc = new Array(); //定义数组
        var chk_flag=false;

        $("#selZc option").each(function(){ //遍历全部option
            var txt = $(this).val(); //获取option的内容
            var regionId = $(this).val();
            var regionName = $(this).text();
            if(regionName!='请选择...'){
                //zc.push(regionId);
                chk_flag=true;

                // 检查该地区是否已经存在
                var exists = false;
                $("#zcCell input[type=checkbox]").each(function(){
                    if ($(this).val() == regionId) {
                        exists = true;
                        return false;
                    }
                });

                // 创建checkbox
                if (!exists) {
                    var append_html= "<input type='checkbox' name='zc[]' value='" + regionId + "' checked='true' /> " + regionName + "&nbsp;&nbsp;";
                    $('#zcCell').append(append_html);
                }

            }
        });

        if(chk_flag==false){
            alert('没有职场被选择');
            return false;
        }

    }

    function delAll() {
        $("#zcCell").html('');
    }

    function addRegion() {
        var checkIndex=$("#selZc ").get(0).selectedIndex;  //获取Select选择的索引值
        var regionId='';
        var regionName='';
        if (checkIndex >= 0) {
            regionId = $("#selZc").val();
            regionName = $("#selZc").find("option:selected").text();
        } else {
            alert('没有职场被选择');
            return false;
        }

        if(regionName=='请选择...'){
            alert('没有职场被选择');
            return false;
        }

        // 检查该地区是否已经存在
        var exists = false;
        $("#zcCell input[type=checkbox]").each(function(){
            if ($(this).val() == regionId) {
                exists = true;
                alert('该职场已经被选择，请勿重复勾选');
                return false;
            }
        });

        // 创建checkbox
        if (!exists) {
            var append_html= "<input type='checkbox' name='zc[]' value='" + regionId + "' checked='true' /> " + regionName + "&nbsp;&nbsp;";
            $('#zcCell').append(append_html);
        }
    }

    function chk_pro() {
        var title=$("#name").val();
        if(title==""){
            alert('请填写活动名称');
            return false;
        }

        var chk_zc_html='';
        $("#zcCell input[type=checkbox]:checked").each(function(){
            if(chk_zc_html==""){
                chk_zc_html+=$(this).val();
            }else{
                chk_zc_html+=","+$(this).val();
            }
        });
        $("#zc_info").val(chk_zc_html);
        console.log(chk_zc_html);

        return true;
    }
</script>

</body>
</html>