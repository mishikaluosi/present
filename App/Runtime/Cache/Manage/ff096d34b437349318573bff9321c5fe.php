<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/shop/js/global.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
    <script type="text/javascript">
        var data_path = "/Data";
    </script>
</head>
<body>
<input type="hidden" id="e_id" value="<?php echo ($event['id']); ?>">
<!--<input type="hidden" id="export_url" value="<?php echo U('Appointment/exportEx',array('e_id'=>$event['id']));?>">-->
<!--<input type="hidden" id="index_url" value="<?php echo U('Appointment/index',array('e_id'=>$event['id']));?>">-->
<!--<input type="hidden" id="member_url" value="<?php echo U('Appointment/getMember');?>">-->
<div class="main">
    <div class="pos">
        <?php echo ($event['name']); ?>--中奖列表
    </div>
    <!--<div class="operate">-->
        <!--<div class="left">-->
            <!--<input type="button" onclick="goUrl('<?php echo U('Appointment/add',array('e_id'=>$event['id']));?>')" class="btn_blue btn_red" value="添加报名成员">-->
        <!--</div>-->
        <!--<div class="left">-->
            <!--<input type="button" alt="/Data/appointment.xlsx" id="exportTemp" class="btn_blue btn_blue" value="导出模板">-->
        <!--</div>-->
        <!--<div class="left">-->
            <!--<form action="" id="importExcelForm" target="upload_excel_ifm" method="post" enctype="multipart/form-data">-->
                <!--<input type="button" id="change_input"  class="btn_blue" value="批量导入">-->
                <!--<input type="hidden" name="e_id" value="<?php echo ($event['id']); ?>">-->
                <!--<input type="file" alt=<?php echo U('Appointment/upload');?> name="inputExcel" id="inputExcel" style="display:none;" class="btn_blue" value="批量导入">-->
            <!--</form>-->
        <!--</div>-->
        <!--<div class="left">-->
            <!--&lt;!&ndash;<form action="<?php echo U('appointment/exportEx');?>" method="post">&ndash;&gt;-->
                <!--<input type="button" id="exportEx" class="btn_blue btn_red" value="批量导出">-->
            <!--&lt;!&ndash;</form>&ndash;&gt;-->
        <!--</div>-->
    <!--</div>-->
    <!--<div class="operate">-->
        <!--<div class="left search_box" style="position: relative">-->
            <!--&lt;!&ndash;<form method="post" action="<?php echo U('Appointment/index');?>">&ndash;&gt;-->

                <!--<input type="text" id="member" class="inp_one" autocomplete="off" alt="<?php echo ($member_id); ?>" value="<?php echo ($member); ?>" placeholder="业务员搜索" style="margin-right: 50px;">-->
                <!--<input type="text" id="name" name="name" class="inp_one" autocomplete="off" value="<?php echo ($name); ?>" placeholder="关键词">-->
                <!--<input type="button" id="search_btn" class="btn_blue" style="float: none" value="查  询">-->

            <!--&lt;!&ndash;</form>&ndash;&gt;-->
        <!--</div>-->
        <!--<div class="clear"></div>-->
    <!--</div>-->

    <div class="list guestbook">
        <form action="" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>
                <th ><input type="checkbox" id="check"></th>
                <th>编号</th>
                <th>活动名称</th>
                <th>业务员</th>
                <th>姓名</th>
                <th>昵称</th>
                <th style="width: 50px;">头像</th>
                <th>手机号</th>
                <th>奖项</th>
                <th>奖品</th>
                <th style="width: 50px;">奖品图片</th>
                <th>是否有效</th>
            </tr>
            <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                    <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                    <td><?php echo ($v["id"]); ?></td>
                    <td>
                        <?php echo ($v["event_name"]); ?>
                    </td>
                    <td>
                        <?php echo ($v["member"]); ?>
                    </td>
                    <td><?php echo ($v["username"]); ?></td>
                    <td><?php echo ($v["nickname"]); ?></td>
                    <td class="common"><img src="<?php echo ($v["head_image"]); ?>" alt=""></td>
                    <td><?php echo ($v["phone"]); ?></td>
                    <td><?php echo ($v["draw_level"]); ?></td>
                    <td><?php echo ($v["award_name"]); ?></td>
                    <td class="common"><img src="/uploads/<?php echo ($v["award_image"]); ?>" alt=""></td>
                    <td class="little">
                        <?php if($v['is_disabled'] == 0): ?><img src="/App/Manage/View/Public/images/dui.png" onclick="toConfirm('<?php echo U('Lucky/status',array('id' => $v['id'],'flag' =>1));?>', '确定设置中奖无效吗？')">
                        <?php else: ?>
                        <img src="/App/Manage/View/Public/images/cuo.png" onclick="toConfirm('<?php echo U('Lucky/status',array('id' => $v['id'],'flag' =>0));?>', '确定设置中奖有效吗？')"><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
        <div class="page" style="clear: both">
            <?php echo ($page); ?>
        </div>
        </form>
    </div>
</div>
</body>
<style>
    .list td.common img {
        width: 40px!important;
        height:auto!important;
    }
    .list td.little img {
        width: 14px!important;
        height:14px!important;
    }
</style>
</html>