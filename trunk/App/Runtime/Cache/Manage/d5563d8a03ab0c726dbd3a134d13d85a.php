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
		
    	var validate={pwd:1,code:1};
		$("#form_do").submit(function(){
			validate.pwd = 1;
			var oldpassword = $("input[name='oldpassword']");
			var password = $("input[name='password']");
			var rpassword = $("input[name='rpassword']");
			if(oldpassword.val() ==''){
				oldpassword.parent().find("span").remove().end().append("<span class='error'>请输入旧密码</span>");
				validate.pwd = 0;
			}else {
				oldpassword.parent().find("span").remove();
			}
			if(password.val() ==''){
				password.parent().find("span").remove().end().append("<span class='error'>请输入新密码</span>");
				validate.pwd = 0;
			}
			if(rpassword.val() ==''){
				rpassword.parent().find("span").remove().end().append("<span class='error'>请输入确认密码</span>");
				validate.pwd = 0;
			}else {
				rpassword.parent().find("span").remove();
			}
			if(password.val() != rpassword.val()){
				password.parent().find("span").remove().end().append("<span class='error'>两次密码不一样</span>");
				validate.pwd = 0;
			}else if(password.val() !='') {
				password.parent().find("span").remove();
			}
			if (validate.pwd == 0) {
				return false;
			}
			return true;
		});
    });
</script>
</head>
<body>
<div class="main">
    <div class="pos">修改密码</div>
	<div class="form">
		<form method='post' id="form_do" name="form_do" action="<?php echo U('Personal/pwd');?>">
		<dl>
			<dt>旧密码</dt>
			<dd>
				<input type="password" name="oldpassword" class="inp_one" value=""/>
			</dd>
		</dl>
		<dl>
			<dt>新密码</dt>
			<dd>
				<input type="password" name="password" class="inp_one" value=""/>
			</dd>
		</dl>
		<dl>
			<dt>密码确认</dt>
			<dd>
				<input type="password" name="rpassword" class="inp_one" value=""/>
			</dd>
		</dl>
		<div class="form_b">
				<input type="submit" class="btn_blue" id="submit" value="提 交">
		</div>
		</div>
		
	   </form>
	</div>


</body>
</html>