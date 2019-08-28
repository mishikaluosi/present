<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
 <script language="JavaScript">
        <!--
        var URL = '/index.php?s=/Manage/Abc';
        var APP	 = '/index.php?s=';
        var SELF='/index.php?s=/Manage/Abc/index';
        var PUBLIC='/App/Manage/View/Public';
        //-->
        </script>
</head>
<body>
<div class="main">
    <div class="pos"><?php echo ($type); ?>
    </div>
    <div class="operate">
        <div class="left">
            <input type="button" onclick="goUrl('<?php echo U('Abc/add');?>')" class="btn_blue btn_red" value="添加广告位">     
        </div>
        <div class="clear"></div>
    </div>
	<form action="<?php echo U('Abc/delAll');?>" method="post" id="form_do" name="form_do">
		<?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><div class="list_new">
				<h2><span>
					<a href="<?php echo U('Abc/addDetail',array('aid' => $v['id']), '');?>">添加图片</a>
					-
					<a href="<?php echo U('Abc/detail',array('aid' => $v['id']), '');?>">图片列表</a>
				</span>
                ID:<?php echo ($v["id"]); ?> <a href="<?php echo U('Abc/edit',array('id' => $v['id']), '');?>"><?php echo ($v["name"]); ?></a>
				
				</h2>
			<ul class="tab">
			<?php if(is_array($v['pics'])): $k = 0; $__LIST__ = $v['pics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($k % 2 );++$k;?><a><?php echo ($k); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
	    	<?php if($v['pics'] != null): if(is_array($v['pics'])): $k = 0; $__LIST__ = $v['pics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($k % 2 );++$k;?><div class="tab_bottom">
				<img src="/uploads/<?php echo (GetPic($v1)); ?>" />
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
			<div class="tab_bottom">
				<img src="/uploads/system/nopic.png" />
			</div><?php endif; ?>
        <h3><a href="javascript:;" onclick="toConfirm('<?php echo U('Abc/del',array('id' => $v['id']), '');?>', '确实要删除吗？')">删除广告位</a></h3>
		</div><?php endforeach; endif; ?>
	</form>
</div>
</body>
</html>