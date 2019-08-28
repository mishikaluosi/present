<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript">
	//var verifyUrl="<?php echo U('Login/verify','','');?>";
	var CONTROL_U = "<?php echo U('Login/checkusername');?>";
	var CONTROL_P = "<?php echo U('Login/checkpassword');?>";
	var URLPATHDEPR= "<?php echo C('URL_PATHINFO_DEPR');?>";
	/*$(function(){
		$('#vcode').click();
	});*/
</script>

<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/login.js"></script>		
<link rel="stylesheet" href="/App/Manage/View/Public/css/login.css" />
</head>	
<body>
	<div class="login">
        <div class="loginLeft">
                <div class="loginLogo">
                    <!--<img src="/App/Manage/View/Public/images/login/loginLogo.png">-->
                </div>
               <div class="loginTop1">
                   保礼街 在线商城 <BR/>后 台 管 理 系 统</div>

    </div>
		<div class="loginForm">	
        <div class="loginRTop">

			<form action="<?php echo U('Login/login');?>" method="post" id="login">
			 <div class="loginRC">
               <div class="loginRC1">
				帐号:
					
						<input type="username" name="username" class="len220"/>
					
                </div>
                <div class="loginRC1">
				密码:
					
						<input type="password" class="len220" name="password"/></div>
						<!-- 
                        <div class="loginRC1">
					验证码:
				 
						<input type="code" class="len220 len100" name="code" autocomplete="off" /><img src="<?php echo U('Login/verify');?>" align="absmiddle" id="vcode"  class="vcode" onclick="change_code();"/></div>
						-->
				<div class="loginRC1 loginRC2">
					<input type="submit" class="btn_blue" value="立即登录"/></div>
                    
                <span  class="msg"></span>
                    </div>
		</form>
		</div>
	</div>
        <div class="login_footer">
            <div class="login_f_t">
               <a href="#">关于新之礼</a>
               <a href="#">联系我们</a>
               <a href="#">新之礼官网</a>
            </div>
            <div class="login_f_b">无锡新之礼日用品商行 </div>
        </div>
    </div>

</body>
</html>