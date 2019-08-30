<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>

	<link type="text/css" rel="stylesheet" href="/App/Manage/View/Public/css/style_shop.css" />
	<script type="text/javascript" src="/App/Manage/View/Public/shop/js/global.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/shop/js/arttpl.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/shop/plugin/layer/layer.js"></script>
</head>
<body>
<div class="main">
	<div class="pos">修改信息</div>
	<div class="form">
		<form method='post' id="form_do" name="form_do" action="<?php echo U('Member/edit');?>">
			<dl>
				<dt>姓名</dt>
				<dd>
					<input type="text" name="name" class="inp_one" value="<?php echo ($vo["name"]); ?>" />
					<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
				</dd>
			</dl>
			<dl>
				<dt>手机号码</dt>
				<dd>
					<input type="text" name="phone" class="inp_one" value="<?php echo ($vo["phone"]); ?>" />
				</dd>
			</dl>


			<div class="right_main">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="wenzhang mat20 mab20">
					<tr>
						<td style="width:90px;">所属职场：</td>
						<td align="left">
							<span style="color: red"><?php echo ($vo["prov"]); ?>-<?php echo ($vo["city"]); ?>-<?php echo ($vo["area"]); ?>&nbsp;&nbsp;<?php echo (get_zc_name($vo["zc_id"])); ?></span>
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
								<select name="district" id="selDistricts" onchange="region_changed(this, 3)" size="10" style="width:130px;height:200px;">
									<option value="">请选择...</option>
								</select>

								<span style="vertical-align: top">职场： </span>
								<select name="zc" id="selZc"  size="10" style="width:180px;height:200px;">
									<option value="">请选择...</option>
								</select>
							</div>
						</td>
					</tr>
				</table>
			</div>

			<dl>
				<dt>组号</dt>
				<dd>
					<input type="text" name="group_no" class="inp_one"  value="<?php echo ($vo["group_no"]); ?>"/>
				</dd>
			</dl>
			<dl>
				<dt>工号</dt>
				<dd>
					<input type="text" name="work_no" class="inp_one"  value="<?php echo ($vo["work_no"]); ?>"/>
				</dd>
			</dl>
			<dl>
				<dt>权限</dt>
				<dd>
				<dd>
					<input type="checkbox" name="area_level" value="1" <?php if($vo["area_level"] == 1): ?>checked="checked"<?php endif; ?> />支公司数据查看权限
					<input type="checkbox" name="city_level" value="1" <?php if($vo["city_level"] == 1): ?>checked="checked"<?php endif; ?> />市级数据查看权限
				</dd>
				</dd>
			</dl>
			<div class="form_b">
				<input type="submit" class="btn_blue" id="submit" value="保 存">
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
    $(function(){
        get_prov();
    });

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