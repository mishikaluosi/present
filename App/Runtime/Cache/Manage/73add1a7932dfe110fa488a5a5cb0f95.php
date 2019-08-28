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
        var URL = '/index.php?s=/Manage/Category';
        var APP	 = '/index.php?s=';
        var SELF='/index.php?s=/Manage/Category/index';
        var PUBLIC='/App/Manage/View/Public';
        //-->
        </script>
    <script language="JavaScript">
     function psorts(id)
     {
    	 var sort = $(".psort"+id).val();
    	 $.ajax({
	            type: "POST",
	            url: "<?php echo U('Category/sort');?>",
	            data: {sort:sort,id:id},
	            dataType: "text",
	            success: function(data){
					
				}
				 
	         });
	 }
    </script>
</head>
<body>
<div class="main">
    <div class="pos">栏目列表</div>    
    <div class="operate">
    <?php if(I('parameter') == 'admin'): ?><div class="left"><input type="button" onclick="goUrl('<?php echo U('Category/add',array('parameter'=>I('parameter')));?>')" class="btn_blue btn_red" value="添加栏目">
       </div><?php endif; ?>
    <div class="clear"></div>
    </div>
    <div class="list list0">    
    <form action="<?php echo U('Category/sort');?>" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr class="one">
                <th><input type="checkbox" id="check"></th>
                <th>编号</th>
                <th>名称</th>
                <th>所属模型</th>
                <th>显示</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
			<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr id="<?php echo ($v["id"]); ?>" cid="<?php echo ($v["pid"]); ?>" level="<?php echo ($v["level"]); ?>">
                <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                <td><?php echo ($v["id"]); ?></td>
                <td class="aleft"><?php echo ($v["delimiter"]); ?>
                    <?php if($v['pid'] != 0): ?><img src="/App/Manage/View/Public/images/bg_columnx.gif"/><?php endif; ?>
                       <i class="jt"></i><a href="<?php if($v["type"] == 0): echo U(''.ucfirst($v['tablename']). '/index', array('pid' => $v['id']));?>
                     <?php else: echo U('Category/edit',array('id' => $v['id'])); endif; ?>"><?php echo ($v["name"]); ?></a>
                </td>
                <td ><?php if($v["type"] == 1): ?><span style="color:red">外部链接</span><?php else: echo ($v["modelname"]); endif; ?></td>
				<td><?php if($v['status']): ?>是<?php else: ?>否<?php endif; ?></td>
                <td><input type="text" name="psort" value="<?php echo ($v["sort"]); ?>" onblur="psorts(<?php echo ($v["id"]); ?>)" class="psort<?php echo ($v["id"]); ?>"  size="5" /></td>
                <td>
                <a href="<?php echo U('Category/add',array('pid' => $v['id']));?>">添加子栏目</a>
                <a href="<?php echo U(''.ucfirst($v['tablename']). '/index', array('pid' => $v['id']));?>">列表</a>
                <a href="<?php echo U('Category/edit',array('id' => $v['id'],'parameter'=>I('parameter')));?>">修改</a>            
                <?php if((I('parameter') == 'admin') OR ($v['level'] > 1 )): ?><a href="javascript:;" onclick="toConfirm('<?php echo U('Category/del', array('id' => $v['id'],'parameter'=>I('parameter')));?>', '确实要删除吗？')">
					删除
				</a><?php endif; ?>
				</td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div class="page" style="clear: both;"> </div>
    </form>
    </div>
</div>
<style>
    .list td img {
        width: 13px !important;
        height: 20px!important;
    }
</style>
</body>
</html>