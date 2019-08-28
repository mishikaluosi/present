<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
<script type="text/javascript">
	var data_path = "/Data";
	var tpl_public = "/App/Manage/View/Public";
</script>
<script type="text/javascript" src="/App/Manage/View/Public/js/jBox.config.js"></script>
<script type="text/javascript">
	$(function(){

		setStyleSelect('1');//默认样式选择

		$("#form_do").submit(function(){
			var name = $("input[name='name']");
			if($.trim(name.val())==''){
				name.parent().find("span").remove().end().append("<span class='error'>名称不能为空</span>");
				return false;			
			}else {
				name.parent().find("span").remove().end();
			}

		});

    });
</script>



</head>
<body>
<div class="main">
    <div class="pos">网站设置<!--<input type="button" onclick="goUrl('<?php echo U('System/index');?>')" class="btn_blue none" value="配置项管理" style="float:right; ">--></div>
	<div class="form form2" style=" display:none">
     <ul class="tabnav" style=" border-bottom:none">
			<?php if(is_array($configgroup)): foreach($configgroup as $key=>$v): if($key == 1): ?><li id="tab_setting_<?php echo ($key); ?>" onclick="switchTab('setting','on',<?php echo ($groupnum); ?>,<?php echo ($key); ?>);" <?php if($key == 1): ?>class="on"<?php endif; ?>><?php echo ($v); ?></li><?php endif; endforeach; endif; ?>
		</ul>
    </DIV>
    <div class="form">
		<form method='post' id="form_do" name="form_do" action="<?php echo U('System/site');?>">
		<?php if(is_array($vlist)): foreach($vlist as $key=>$v): if($key == 1): ?><div id="div_setting_<?php echo ($key); ?>" <?php if($key > 1): ?>style="display:none;"<?php endif; ?>>	
        <dl style=" font-size:14px; color:#000">网站基本信息设置</dl>
	
			<?php if(is_array($v)): foreach($v as $key=>$config): if($config['id'] == 3 || $config['id'] == 6 || $config['id'] == 7): else: ?>
			<dl>
				<dt><?php echo ($config["title"]); ?></dt>
				<dd>
				<?php if($config['id'] == 2): ?><input class="inp_large" type="<?php echo ($config['typeid']); ?>" value="<?php echo ($config['value']); ?>" name="<?php echo ($config['name']); ?>" readonly>
				<?php else: ?>
					<?php echo get_element_html("config[".$config['name']."]",$config['typeid'], $config['tvalue'], $config['value']); endif; ?>
				</dd>
			</dl><?php endif; endforeach; endif; ?>
		</div><?php endif; endforeach; endif; ?>
<div class="form_b">
			<input type="submit" class="btn_blue" id="submit" value="保存">
		</div>

		</div>
		
	   </form>
	</div>


</body>
</html>