<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<script language="javascript" type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script language="javascript" type="text/javascript" src="/App/Manage/View/Public/js/jquery.cookie.js"></script>
<script src="/App/Manage/View/Public/js/frame.js" language="javascript" type="text/javascript"></script>
<link href="/App/Manage/View/Public/css/frame.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(function(){
	
	function get_cate(){
		
		if($.cookie('href') != null)
			$("#main").attr("src",$.cookie('href'));
		
		
		$.get("<?php echo U('Index/getParentCate');?>",
            {
                'pid' : 0, 
                'rnd' : Math.floor(111+Math.random()*100000)
            },
            function(data){
                var listUl = $('#dl_items_2_0 ul');
				var leftlist = $('#menu1');
                if(!isNaN(data.count) && data.count>0){
                	listUl.text('');
                }
                if(data.list && (typeof data.list == 'object')){
                    $.each(data.list, function(i, v){
                        var html = '<li><a id="'+v.id+'" href="'+v.url+'" class="main" onclick="remember(this)" target="main">'+v.name+'</a></li>';
						var html1;
						html1 = "<dl id='left_list_"+v.id+"' name='leftlist' style='display:none'><dt>"+v.name+"</dt><dd><ul>";
						if(v.child && (typeof v.child == 'object')){
							html1 += '<li><a id="all_'+v.id+'" href="'+v.url+'" class="main thisclass" onclick="remember(this)" target="main">所有</a></li>';
							$.each(v.child, function(ii, vv){
								html1 += '<li><a href="'+vv.url+'" class="main" onclick="remember(this)" target="main">'+vv.name+'</a></li>';
								if(vv.child && (typeof vv.child == 'object')){
									html1 += '<ul>';
									$.each(vv.child, function(iii,vvv){
										html1 += '<li><a href="'+vvv.url+'" class="main" onclick="remember(this)" target="main">'+vvv.name+'</a></li>';
									});
									html1 += '</ul>';
								}
							});
							
						}
						html1 += "</dd></ul></dl>";
						leftlist.append(html1);
                        listUl.append(html);
						sidebar();
                    });
                }
                               
        },'json');
		

		
		
	}
	get_cate();
})	
</script>
<script type="text/javascript">
	function remember(obj)
	{
		var url = $(obj).attr("href");
		$.cookie('href',url);
		$("#main",parent.document.body).attr("src",url) 
	}
	function clearcookies()
	{
		$.cookie('href',null);
	}
</script>
<!--[if IE 6]>
<script src="/App/Manage/View/Public/js/DD_belatedPNG_0.0.8a-min.js" language="javascript" type="text/javascript"></script>
<script>
  DD_belatedPNG.fix('.nav ul li a,.top_link ul li,background');   /* string argument can be any CSS selector */
</script>
<![endif]-->

<style>
.s-div{ background-color: white; position: absolute; width: 400px; height: 200px; border: 1px solid #0083c5; top: 350px;left: 50%; margin-left: -200px; z-index: 10001; display: none; }
.s-div p{ line-height:25px; text-align:center; padding:15px 0 0; font-size:14px;}
.s-d-01{ width: 295px; margin: 0 auto;}
.s-d-t01{ margin:10px 0 30px 0; width: 278px; height: 30px; padding: 0 10px; border:1px solid #cfd3db; }
.s-a-but{ width: 80px; height: 30px; margin: 0 auto; display: block; border: 1px solid #cdcdcd; border-radius: 5px; text-align: center; line-height: 30px; cursor: pointer;}
</style>
<script>
$().ready(function(){
	$('#devin').click(function(){
		$txt=$('#devtxt').val();
		if($txt=='xzl888'){
			$.cookie('devmod', 1);
			ChangeNav("left_menu_1");
			$('#devtxt').attr("value", '');
			$('#natsu').hide();
		}
		else{
			alert("密码错误");
		}
		
		
	});
	$('#devout').click(function(){
		$('#devtxt').attr("value", '');
		$('#natsu').hide();
	});
});
</script>
<script>
  

</script>
</head>
<body class="showmenu">
<div class="pagemask"></div>
<iframe class="iframemask"></iframe>

<div class="head">
<div class="top_logo"><a href="/" target="_blank"> <img src="/App/Manage/View/Public/images/logo.jpg" /></a> </div>
     <div class="nav" id="nav">
      <ul>
		<li><a href="<?php echo U('Manage/Public/main');?>" _for="left_menu_0" target="main" ><b>系统首页</b></a></li>
		<?php if(is_array($menu)): foreach($menu as $k=>$v): ?><li id="menu_<?php echo ($k); ?>"><a <?php if(empty($k)): ?>class="thisclass"<?php endif; ?> href="#" _for="left_menu_<?php echo ($k); ?>"><b><?php echo ($v["name"]); ?></b></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
	 <div class="top_link">
      <ul>
	   
<?php if($_SESSION['ADMIN_AUTH_KEY']){?>
		<li id="i_exit" class="open01 open02">
			<a href="{:U('Manage/System/SetRuntime',array('cache'=>$cache))}">静态缓存<?php echo $cache==0?"开":"关" ?></a>
		</li> 
        <li id="i_exit"><a href="<?php echo U('Manage/ClearHtml/allCache');?>">一键更新</a></li> 
		<li class="i_hide_menu"><a href="<?php echo U('Mobile/Index/index');?>" id="togglemenu">手机站</a>
			<div class="tu"> <a href="<?php echo U('Mobile/Index/index');?>" target="_blank"><img src="<?php echo U('Manage/Qrcode/index');?>" /></a>扫码打开手机网站</div>
        </li>
        <li id="i_home"><a href="<?php echo U('Home/Index/index');?>" target="_blank">浏览网站</a></li>
<?php }?>
        <li class="i_self" ><a>你好，<?php echo (session('yang_adm_username')); ?><i></i></a>
            <div class="i_exit"><a href="<?php echo U('Manage/Login/logout');?>" onclick="clearcookies();" target="_top">退出</a></div>
        </li>	
      </ul>
    </div>
</div>
<!-- header end -->

<div class="left">
   <div class="span"></div>
   <div class="menu" id="menu">
		<?php if(is_array($menu)): foreach($menu as $k=>$v): ?><div id="items_left_menu_<?php echo ($k); ?>" class="menu02">
			<?php if(is_array($v["child"])): $k2 = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k2 % 2 );++$k2; if($v2["child"]||$_SESSION['ADMIN_AUTH_KEY']){ ?>
			<dl id="dl_items_<?php echo ($k2); ?>_<?php echo ($k); ?>">
				<dt><?php echo ($v2["name"]); ?><i></i></dt>
				<dd>
					<ul class="sidebar_left">
					<?php if(is_array($v2["child"])): $k3 = 0; $__LIST__ = $v2["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($k3 % 2 );++$k3;?><li>
							<a href="<?php echo U($v3['module'].'/'.$v3['action'],array('parameter'=>$v3['parameter']));?>" target="main" onclick="remember(this)">
								<?php echo ($v3["name"]); ?>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</dd>
			</dl>
				<?php } endforeach; endif; else: echo "" ;endif; ?>	
			
		</div><?php endforeach; endif; ?>
<!-- Item End -->
</div>
 
</div>
  <div class="open"></div>
  <div class="close"></div>
<!-- left end -->
<style>
.right02{ margin-left:155px}

</style>
<div class="left right02">
<div class="span"></div>
<div class="menu" id="menu1" >
</div>
</div>
<!-- left end -->

<div class="right">
	<div class="rightContent">
	<iframe id="main" name="main" frameborder="0" scrolling="yes" src="<?php echo U('Public/main');?>"></iframe>
	</div>    
</div>
<!-- right end -->

<div id='natsu' class='s-div'>
  <p>开发者设置，用户无需操作</p>
	<div class='s-d-01'>
		<input id='devtxt' type='password' class='s-d-t01' />
	</div>
	<div class='s-d-01'>
		<a id='devin' class='s-a-but'>确定</a><br/>
		<a id='devout' class='s-a-but'>取消</a>
	</div>
</div>

</body>
</html>