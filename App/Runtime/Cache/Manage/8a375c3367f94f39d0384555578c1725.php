<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>

    <link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/layui/css/layui.css" />
    <script type="text/javascript" src="/App/Manage/View/Public/layui/layui.js"></script>
 <script language="JavaScript">
        <!--
        var URL = '/index.php?s=/Manage/Region';
        var APP	 = '/index.php?s=';
        var SELF='/index.php?s=/Manage/Region/index';
        var PUBLIC='/App/Manage/View/Public';
        //-->
        </script>
    <script language="JavaScript">
        function sorts(id)
        {
            var sort = $(".sort"+id).val();
            $.ajax({
                type: "POST",
                url: "<?php echo U('Region/sort');?>",
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
    <div class="pos">地区区域管理</div>


    <div class="list list0">
        <form action="<?php echo U('Region/sort');?>" method="post" id="form_do" name="form_do">
            <table width="100%">
                <tr class="one">
                    <th><input type="checkbox" id="check"></th>
                    <th>编号</th>
                    <th>名称</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr >
                        <td><input type="checkbox" name="key[]" value="<?php echo ($v["region_id"]); ?>"></td>
                        <td><?php echo ($v["region_id"]); ?></td>
                        <td class="aleft"><?php echo ($v["region_name"]); ?></td>

                        <td>
                            <input type="text" name="sort" value="<?php echo ($v["sort"]); ?>" onblur="sorts(<?php echo ($v["region_id"]); ?>)" class="sort<?php echo ($v["region_id"]); ?>"  size="5" /></td>
                        <td>
                            <?php if($v['region_type'] < 3): ?><a href="<?php echo U('Region/index', array('pid' => $v['region_id'],'type'=>$v['region_type']+1));?>">查看</a><?php endif; ?>
                            <?php if($v['region_type'] < 3): ?><a href="<?php echo U('Region/msg',array('pid' => $v['region_id']));?>">添加子级</a><?php endif; ?>

                            <a href="<?php echo U('Region/msg',array('id' => $v['region_id'],'parameter'=>I('parameter')));?>">修改</a>
                            <a href="javascript:;" onclick="toConfirm('<?php echo U('Region/del', array('id' => $v['region_id'],'parameter'=>I('parameter')));?>', '确实要删除吗？')">删除</a>
                        </td>
                    </tr><?php endforeach; endif; ?>
            </table>
            <div class="page" style="clear: both;"> </div>
        </form>
    </div>

</div>
</body>
</html>