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

    <script type="text/javascript" src="/App/Manage/View/Public/js/dmAddress.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
    <script type="text/javascript">
        var data_path = "/Data";
        var tpl_public = "/App/Manage/View/Public";
        var tpl_upload = "/uploads/";
    </script>
    <script language="JavaScript">
        $(function () {

            upload_ex("picture_tip_1",'fileupload_1',1,"<?php echo U('Zc/import_ex');?>");

            function upload_ex(picture_tip_class,fileupload_id,id,url) {
                //图片集上传
                var picture_tip = $("."+picture_tip_class);
                $("#"+fileupload_id).wrap("<form id='picture_form_"+id+"' action='"+url+"' method='post' enctype='multipart/form-data'></form>");
                $("#"+fileupload_id).change(function(){
                    if($("#"+fileupload_id).val() == "") return;

                    $("#picture_form_"+id).ajaxSubmit({
                        dataType:  'json',
                        beforeSend: function() {
                            picture_tip.html("上传中...");
                        },
                        success: function(data) {
                            if(data.state == 'SUCCESS'){
                                //picture_tip.html(""+ tpl_upload+data.info[0].name +" 上传成功("+data.info[0].size+"k)");
                                picture_tip.html("上传成功");
                            }else {
                                picture_tip.html(data.info);
                            }

                        },
                        error:function(xhr){
                            picture_tip.html("上传失败"+xhr);

                        }
                    });
                });
            }
        });

        function sorts(id)
        {
            var sort = $(".sort"+id).val();
            $.ajax({
                type: "POST",
                url: "<?php echo U('Zc/sort');?>",
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
    <div class="pos">职场管理</div>
    <div class="operate">
        <div class="left">
            <div class="litpic_show">
                <div class="litpic_btn" >
                    <span>导入数据</span>
                    <input  id="fileupload_1" type="file" name="mypic_1">
                </div>
                <div class="picture_tip_1" style="color:red;"></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="operate">
        <div class="left">
            <input type="button" onclick="goUrl('<?php echo U('Zc/msg');?>')" class="btn_blue " value="添加职场">
            <a href="/App/Manage/View/Public/file/zc_tpl.xls" class="btn_blue">下载模板</a>
            <input type="button" onclick="goUrl('<?php echo U('Zc/export_ex');?>')" class="btn_blue btn_red" value="导出">

        </div>
        <div class="clear"></div>
    </div>

    <div class="operate">
        <div class="left">
            <form method="post" action="<?php echo U('Zc/index');?>">
                <span class="s_span">职场名：</span><input type="text" name="keyword" class="inp_one" value="<?php echo ($keyword); ?>" >
                <span class="s_span">联系人：</span><input type="text" name="sname" class="inp_one" value="<?php echo ($sname); ?>" >
                <span class="s_span">&nbsp;&nbsp;联系电话：</span><input style="width:100px;" type="text" name="sphone" class="inp_one" value="<?php echo ($sphone); ?>" >
                <span class="s_span">&nbsp;&nbsp;所在区域：</span>

                <select id="cmbProvince" name='sprov'></select>
                <select id="cmbCity" name='scity'></select>
                <select id="cmbArea" name='sarea'></select>
                <script type="text/javascript">
                    $.ajax({
                        type: "POST",
                        url: "<?php echo U('Zc/get_region_jsdata');?>",
                        data:{type:'select'},
                        dataType: "json",
                        success: function(data){
                            var provinceList=data;
                            addressInit('cmbProvince', 'cmbCity', 'cmbArea', '<?php echo ($sprov); ?>', '<?php echo ($scity); ?>', '<?php echo ($sarea); ?>',provinceList);
                        }
                    });
                </script>

                <input type="hidden" name="fp" value="<?php echo ($fp); ?>"/>
                <input type="submit" class="btn_blue" style="float: none" value="查  询">
            </form>
        </div>
        <div class="clear"></div>
    </div>

    <div class="list list0">
        <form action="<?php echo U('Zc/sort');?>" method="post" id="form_do" name="form_do">
            <table width="100%">
                <tr class="">
                    <th><input type="checkbox" id="check"></th>
                    <th>编号</th>
                    <th >名称</th>
                    <th style="width: 100px;">联系人</th>
                    <th style="width: 100px;">联系电话</th>
                    <th style="width: 150px;">所在区域</th>
                    <th style="width: 200px;">地址</th>
                    <th style="width: 180px;">添加时间</th>
                    <th>排序</th>
                    <th style="width: 120px;">操作</th>
                </tr>
                <?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr >
                        <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                        <td><?php echo ($v["id"]); ?></td>
                        <td ><?php echo ($v["name"]); ?></td>
                        <td ><?php echo ($v["contact"]); ?></td>
                        <td ><?php echo ($v["tel"]); ?></td>
                        <td ><?php echo ($v["prov"]); ?>-<?php echo ($v["city"]); ?>-<?php echo ($v["area"]); ?></td>
                        <td ><?php echo ($v["addr"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s', $v["addtime"])); ?></td>
                        <td>
                            <input type="text" name="sort" value="<?php echo ($v["sort"]); ?>" onblur="sorts(<?php echo ($v["id"]); ?>)" class="sort<?php echo ($v["id"]); ?>"  size="5" /></td>
                        <td>
                            <a href="<?php echo U('Zc/msg',array('id' => $v['id'],'parameter'=>I('parameter')));?>">修改</a>
                            <a href="javascript:;" onclick="toConfirm('<?php echo U('Zc/del', array('id' => $v['id'],'parameter'=>I('parameter')));?>', '确实要删除吗？')">删除</a>
                        </td>
                    </tr><?php endforeach; endif; ?>
            </table>
            <div class="page" style="clear: both;"><?php echo ($page); ?> </div>
        </form>
    </div>

</div>
</body>
</html>