<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/shop/js/global.js"></script>
</head>
<body>
<div class="main">
    <div class="pos">
        奖品列表
    </div>
    <div class="operate">
        <div class="left">
            <input type="button" onclick="goUrl('<?php echo U('Award/add');?>')" class="btn_blue btn_red" value="添加奖品">
        </div>
    </div>
    <div class="operate">
        <div class="left">
            <form method="post" action="<?php echo U('Award/index');?>">
                <span class="s_span">名称</span>
                <input type="text" name="name" class="inp_one" value="<?php echo ($name); ?>" >
                <input type="submit" class="btn_blue" style="float: none" value="查  询">
            </form>
        </div>
        <div class="clear"></div>
    </div>

    <div class="list guestbook">
        <form action="" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>
                <th ><input type="checkbox" id="check"></th>
                <th>编号</th>
                <th>奖品名称</th>
                <th>奖品图片</th>
                <th>奖品描述</th>
                <th style="width: 150px">操作</th>
            </tr>
            <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                    <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                    <td><?php echo ($v["id"]); ?></td>
                    <td class="aleft" style="">
                        <?php echo ($v["name"]); ?>
                    </td>
                    <td>
                        <img src="/uploads/<?php echo ($v["image"]); ?>" alt="" style="width:100px;">
                    </td>
                    <td><?php echo ($v["desc"]); ?></td>
                    <td>
                        <a href="<?php echo U('Award/add',array('id' => $v['id']), '');?>">编辑</a>
                        <a href="javascript:;" onclick="toConfirm('<?php echo U('Award/del',array('id' => $v['id']), '');?>', '确实要删除吗？')">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>

        <div class="page" style="clear: both">
            <input type="button" onclick="doConfirmBatch('<?php echo U('Award/delBatch', array('batchFlag' => 1));?>', '确实要删除选择项吗？')" class="btn_blue btn_f" value="删除">
            <?php echo ($page); ?>
        </div>
        </form>
    </div>
</div>
<style>
    .list td img {
        width: 40px!important;
        height:auto !important;
    }
    .list td.aleft img {
        width: 60px!important;
        height: auto!important;
    }
</style>
</body>
</html>