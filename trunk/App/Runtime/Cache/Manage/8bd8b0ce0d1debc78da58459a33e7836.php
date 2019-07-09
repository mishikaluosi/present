<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/common.js"></script>
<script type="text/javascript">
    $(function(){
		var uid = <?php echo ($vo["id"]); ?>;
		var validate={email:1,code:1};
		//设置post/get同步或异步//或者使用$.ajax
		$.ajaxSetup({
		    async : false
		});	      
		//验证
		$("#form_do").submit(function(){
			var email = $("input[name='email']");
			if($.trim(email.val()) == '') {
				email.parent().find("span").remove().end().append("<span class='error'>邮箱不能为空</span>");
				return false;
			}
			$.post("<?php echo U('Login/checkemail');?>",{email:$.trim(email.val()), id:uid},function(stat){
				if(stat==1){
					validate.email =0;		
					email.parent().find("span").remove().end().append("<span class='error'>邮箱已经存在</span>");
		
				}else if(stat == 0){
					validate.email = 1;				
					email.parent().find("span").remove();
		
				}			
			});
			if(validate.email == 1) {
				return true;
			}

			return false;
		});
    });
</script>
</head>
<body>
<div class="main">
    <div class="pos"><?php echo ($type); ?></div>
	<div class="form">
		<form method='post' id="form_do" name="form_do" action="<?php echo U('Personal/index');?>">
		<dl>
			<dt> 用户名</dt>
			<dd>
				<?php echo (session('yang_adm_username')); ?>
			</dd>
		</dl>
		<dl>
			<dt> 最后登录时间</dt>
			<dd>
				<?php echo (date('Y-m-d H:i:s',$vo["logintime"])); ?>
			</dd>
		</dl>
		<dl>
			<dt> 最后登录IP</dt>
			<dd>
				<?php echo ($vo["loginip"]); ?>
			</dd>
		</dl>
		<dl>
			<dt> 真实姓名</dt>
			<dd>
				<input type="text" class="inp_one" name="realname" value="<?php echo ($vo["realname"]); ?>" />
			</dd>
		</dl>
		
		<dl>
			<dt> E-mail</dt>
			<dd>
				<input type="text" class="inp_one" name="email" value="<?php echo ($vo["email"]); ?>" />
			</dd>
		</dl>
		<div class="form_b">
		<input type="hidden" name="uid" value="<?php echo ($vo["id"]); ?>" />
			<input type="submit" class="btn_blue" id="submit" value="保 存">
		</div>
		</div>
		
	   </form>
	</div>


</body>
</html>