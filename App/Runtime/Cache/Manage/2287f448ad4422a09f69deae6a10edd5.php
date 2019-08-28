<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>

</head>
<body>
<div class="main">
    <div class="pos">问卷列表</div>
    <div class="operate">
        <div class="left">
            <input type="button" onclick="goUrl('<?php echo U('Wenjuan/msg');?>')" class="btn_blue btn_red" value="添加问卷">
        </div>
    </div>

    <div class="operate">
        <style>
            ul,li,a{ text-decoration:none;list-style: none; }
            .vatice{overflow: hidden;border-bottom:1px solid #ccc;font-size: 16px;}
            .vatice li{ float: left;padding:0 10px 5px; text-align:center;  }
            .vatice li a{ color:#666; }
            .vatice li.on,.vatice li:hover{ border-bottom:2px solid #21a0fd; }
        </style>
        <ul class="vatice">
            <li <?php if($fp==0){ ?>class="on" <?php }?>><a href="<?php echo U('Wenjuan/index');?>">全部</a></li>
            <li <?php if($fp==1){ ?>class="on" <?php }?>><a href="<?php echo U('Wenjuan/index',array('fp'=>1));?>">已发布</a></li>
            <li <?php if($fp==2){ ?>class="on" <?php }?>><a href="<?php echo U('Wenjuan/index',array('fp'=>2));?>">已下线</a></li>
            <li <?php if($fp==3){ ?>class="on" <?php }?>><a href="<?php echo U('Wenjuan/index',array('fp'=>3));?>">已过期</a></li>

        </ul>
    </div>

    <div class="operate">
        <div class="left">
            <form method="post" action="<?php echo U('Wenjuan/index');?>">
                <span class="s_span">名称</span>
                <input type="text" name="sname" class="inp_one" value="<?php echo ($sname); ?>" >
                <input type="hidden" name="fp" value="<?php echo ($fp); ?>"/>
                <input type="submit" class="btn_blue" style="float: none" value="查  询">
            </form>
        </div>
        <div class="clear"></div>
    </div>

    <div class="list guestbook">    
    <form action="<?php echo U('Wenjuan/delAll');?>" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>

                <th>编号</th>
                <th>名称</th>
                <!--<th>介绍</th>
                <th>提示</th>-->
                <th>区县</th>
                <th>题目数</th>
                <th>参与人数</th>
                <th>状态</th>
                <th>有效时间</th>
                <th>添加时间</th>
                <th style="width: 150px">操作</th>
            </tr>
            <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                    <td><?php echo ($v["id"]); ?></td>
                    <td class="aleft" style="width: 250px;">
                        <img  src="/uploads//<?php echo ($v["pic"]); ?>" style="width:40px;">
                        <?php echo ($v["name"]); ?>
                    </td>
                    <td><?php echo ($v["prov"]); ?>-<?php echo ($v["city"]); ?>-<?php echo ($v["area"]); ?></td>
                    <!--<td><?php echo ($v["des"]); ?></td>
                    <td>
                        <?php $tips_arr=explode("|||",$v['tips']);?>
                        <?php if(is_array($tips_arr)): foreach($tips_arr as $key=>$vv): echo ($vv); ?><br><?php endforeach; endif; ?>
                    </td>-->
                    <td><?php echo ($v["qcnt"]); ?></td>
                    <td><?php echo ($v["acnt"]); ?></td>
                    <td>
                        <?php if($v['status'] == 1): ?><img src="/App/Manage/View/Public/images/dui.png" onclick="toConfirm('<?php echo U('Wenjuan/status',array('id' => $v['id'],'flag' =>0));?>', '确定要下线该问卷吗？')">
                            <?php else: ?>
                            <img src="/App/Manage/View/Public/images/cuo.png" onclick="toConfirm('<?php echo U('Wenjuan/status',array('id' => $v['id'],'flag' =>1));?>', '确定要发布该问卷吗？')"><?php endif; ?>
                    </td>
                    <td>
                        <?php if($v["stime"] != 0 and $v["stime"] != null): echo (date('Y-m-d', $v["stime"])); endif; ?>
                        <span>&nbsp;~&nbsp;</span>
                        <?php if($v["etime"] != 0 and $v["etime"] != null): echo (date('Y-m-d', $v["etime"])); endif; ?>
                    </td>
                    <td><?php echo (date('Y-m-d H:i:s', $v["addtime"])); ?></td>
                    <td>
                        <a href="<?php echo U('Home/'.'Wenjuan/index',array('id' => $v['id']), '');?>" target="_blank">预览</a>
                        <a href="<?php echo U('Wenjuan/wjcopy',array('id' => $v['id']), '');?>">复制</a>
                        <a href="<?php echo U('Wenjuan/msg',array('id' => $v['id']), '');?>">编辑</a>

                        <?php if($v['acnt'] < 1): ?><a href="javascript:;" onclick="toConfirm('<?php echo U('Wenjuan/del',array('id' => $v['id']), '');?>', '确实要删除吗？')">删除</a><?php endif; ?>

                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
        <div class="page" style="clear: both">
            <!--<input type="button" onclick="doConfirmBatch('<?php echo U('Wenjuan/del', array('batchFlag' => 1));?>', '确实要删除选择项吗？')" class="btn_blue btn_f" value="删除">-->
            <?php echo ($page); ?>
        </div>
    </form>
    </div>
</div>
<style>
    .list td img {
        width: 14px!important;
        height:14px!important;
    }
    .list td.aleft img {
        width: 60px!important;
        height: auto!important;
    }
</style>
</body>
</html>