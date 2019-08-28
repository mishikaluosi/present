<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
<style>
    .list td img{ width:auto !important;max-width:128px;min-width:68px; }
</style>
 <script language="JavaScript">
        <!--
        var URL = '/index.php?s=/Manage/Block';
        var APP	 = '/index.php?s=';
        var SELF='/index.php?s=/Manage/Block/index';
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
            <input type="button" onclick="goUrl('<?php echo U('Block/add');?>')" class="btn_blue btn_red" value="添加自由块">
            <div class="clear"></div>
            
        </div>
    </div>
    <div class="list">    
    <form action="<?php echo U('Block/delAll');?>" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>
                <th><input type="checkbox" id="check"></th>
                <th>编号</th>
                <th>[说明]</th>
                <th>内容</th>
                <th>模板调用代码</th>
                <th>操作</th>
            </tr>
			<?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr class="special">
                <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                <td><?php echo ($v["id"]); ?></td>
                <td class="aleft">
					<?php if($v['remark'] != ''): ?>【<?php echo (str2sub($v["remark"],10)); ?>】<?php endif; ?>
				</td>
                <td class="specialtd"><?php echo (get_content($v["id"])); ?></td>
                <td class="aleft">&lt;yang:block name='<?php echo ($v["name"]); ?>' /&gt; </td>
                <td>
                    <a href="<?php echo U('Block/edit',array('id' => $v['id']), '');?>">编辑</a>
                    <a href="javascript:;" onclick="toConfirm('<?php echo U('Block/del',array('id' => $v['id']), '');?>', '确实要彻底删除吗？')">删除</a>
				</td>
            </tr><?php endforeach; endif; ?>
        </table>
            
        <div class="page" style="clear: both;  background:#f7f7f7"> <input type="button" onclick="doConfirmBatch('<?php echo U('Block/del', array('batchFlag' => 1));?>', '确实要删除选择项吗？')" class="btn_blue btn_f" value="删除">  <?php echo ($page); ?></div>
    </form>
    </div>
    <script>
        $(function(){
            $(".list table tr.special").each(function(index, el) {
                if($(this).children('td:eq(3)').children().is("img")){
                    $(this).children('td:eq(3)').css("background","#ff9743");
                   
                }
            });
            
        })
    </script>
</div>
</body>
</html>