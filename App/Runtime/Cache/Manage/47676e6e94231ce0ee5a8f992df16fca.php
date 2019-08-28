<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理中心</title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
 <script language="JavaScript">
    <!--
    var URL = '/index.php?s=/Manage/Public';
    var APP	 = '/index.php?s=';
    var SELF='/index.php?s=/Manage/Public/main';
    var PUBLIC='/App/Manage/View/Public';
    //-->
</script>
<script>
   $(function(){
	
	   
	   })
</script>
</head>
<body>
<style type="text/css">
	html{_overflow-y:scroll}
</style>
<div style=" margin-left:20px;">
<div style="max-width:98%; min-width:900px;">
    <div class="pos">当前位置:系统首页</div>
   <div class="column">
	<dl class="dbox winbg1" id="item3">
	    <dt class="lside">
	        <div class="l">个人信息</div>
	    </dt>
	    <dd>
			<div class="content">
               <div class="left"><img src="/App/Manage/View/Public/images/main/ico04.jpg" /></div>
				<div class="right">
                <span>您好，<?php echo (session('yang_adm_username')); ?> 欢迎使用新之礼后台管理系统</span>
				<p>上次登录时间：<?php echo (session('yang_adm_logintime')); ?></p>
				<p>上次登录IP：<?php echo (session('yang_adm_loginip')); ?></p>
                <p>[如果非本人操作，请及时<a href="<?php echo U('Manage/Personal/pwd');?>">更改密码</a>]</p>
                </div>
                <div class="clear"></div>
			</div>
	    </dd>
	</dl>
	<dl class="dbox winbg2" id="item1">
	    <dt class="lside"><span class="l">系统信息</span></dt>
	    <dd>
	        <div class="content">
	<p>操作系统：<?php echo ($os); ?> </p>
	<p>服务器软件：<?php echo ($software); ?></p>
	<p>SQLite 版本：<?php echo ($mysql_ver); ?></p>
	<p>上传文件：<?php echo ($environment_upload); ?></p>
	         </div>
	    </dd>
	</dl>
    <div class="clear"></div>
</div>
   <!--<div class="main_center">
      <div class="img"><img src="/App/Manage/View/Public/images/main/ico06.png" /></div>
      <div class="right">
         <span>尊敬的用户：您在更新网站后需要点击一下“<i>一键更新</i>”实现网页静态化</span>
         <p>网站静态化技术优势：</p>
         <p>1.百度、谷歌等搜索引擎更易收录</p>
         <p>2.提高网站访问速度，提升感受</p>
         <a href="<?php echo U('Manage/ClearHtml/allCache');?>">一键更新</a>
      </div>
   </div>-->
   <div class="column">
	<dl class="dbox winbg7">
	    <dt class="lside"><span class="l">快捷入口</span></dt>
	    <dd>
	        <div class="content content2">
	            <ul>
                  <li><a href="<?php echo U('Manage/Product/index');?>"><img src="/App/Manage/View/Public/images/main/ico09.png" /><img src="/App/Manage/View/Public/images/main/ico10.png" /><span>产品列表</span></a></li></li>
                  <li><a href="<?php echo U('Manage/Order/index');?>"><img src="/App/Manage/View/Public/images/main/ico11.png" /><img src="/App/Manage/View/Public/images/main/ico12.png" /><span>订单列表</span></a></li></li>
                  <li><a href="<?php echo U('Manage/Member/index');?>"><img src="/App/Manage/View/Public/images/main/ico13.png" /><img src="/App/Manage/View/Public/images/main/ico14.png" /><span>业务员列表</span></a></li></li>
                  <li><a href="<?php echo U('Manage/Zc/index');?>"><img src="/App/Manage/View/Public/images/main/ico15.png" /><img src="/App/Manage/View/Public/images/main/ico16.png" /><span>职场列表</span></a></li></li>
                  <li><a href="<?php echo U('Manage/Wenjuan/index');?>"><img src="/App/Manage/View/Public/images/main/ico17.png" /><img src="/App/Manage/View/Public/images/main/ico18.png" /><span>问卷列表</span></a></li></li>
                  <div class="clear"></div>
                </ul>
                 <div class="clear"></div>
	         </div>
	    </dd>
	</dl>
	
    <div class="clear"></div>
</div>
</div>
<div class="open_right">
   <div class="top">待处理业务</div>
   <div class="bottom">
      <a href="<?php echo U('Manage/Guestbook/index');?>">
         <img src="/App/Manage/View/Public/images/main/ico20.png" />
         <span>3</span>
         <p>新留言</p>
      </a>
   </div>
   <div class="top">网站运营情况</div>
   <div class="bottom">
     网站运营时长：868天<br />
     
         
      </a>
   </div>
</div>
</div>

</body>
</html>