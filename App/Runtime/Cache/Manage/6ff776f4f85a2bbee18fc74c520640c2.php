<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>

    <script type="text/javascript" src="/App/Manage/View/Public/js/dmAddress.js"></script>

    <script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
    <script type="text/javascript">
        var data_path = "/Data";
        var tpl_public = "/App/Manage/View/Public";
        var tpl_upload = "/uploads/";
    </script>
    <script language="JavaScript">
        $(function () {

            upload_ex("picture_tip_1",'fileupload_1',1,"<?php echo U('Member/import_ex');?>");

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
    </script>

</head>
<body>
<div class="main">
    <div class="pos">业务员列表</div>
    <div class="operate">
        <div class="left" style="float: left">
            <div class="litpic_show">
                <div class="litpic_btn" >
                    <span>导入数据</span>
                    <input  id="fileupload_1" type="file" name="mypic_1">
                </div>
                <div class="picture_tip_1" style="color:red;"></div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="left" style="float: left;margin-top:8px">
            <input type="button" onclick="goUrl('<?php echo U('Member/add');?>')" class="btn_blue " value="添加业务员">
            <a href="/App/Manage/View/Public/file/member_tpl.xls" class="btn_blue">下载模板</a>
            <input type="button" onclick="goUrl('<?php echo U('Member/export_ex');?>')" class="btn_blue btn_red" value="导出">

        </div>
        <div class="clear"></div>
    </div>

    <div class="operate">
        <div class="left">
            <form method="post" action="<?php echo U('Member/index');?>">
                <span class="s_span">姓名：</span><input type="text" name="sname" class="inp_one" value="<?php echo ($sname); ?>" >
                <span class="s_span">&nbsp;&nbsp;手机号：</span><input style="width:100px;" type="text" name="sphone" class="inp_one" value="<?php echo ($sphone); ?>" >
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

                <span class="s_span">&nbsp;&nbsp;组号：</span>
                <input type="text" name="sgno" class="inp_one" style="width:100px;" value="<?php if(!empty($sgno)){ echo $sgno;}?>" >
                <span class="s_span">&nbsp;&nbsp;工号：</span>
                <input type="text" name="swno" class="inp_one" style="width:100px;" value="<?php if(!empty($swno)){ echo $swno;}?>" >
                <input type="hidden" name="fp" value="<?php echo ($fp); ?>"/>
                <input type="submit" class="btn_blue" style="float: none" value="查  询">
            </form>
        </div>
        <div class="clear"></div>
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
            <li <?php if($fp=='all'){ ?>class="on" <?php }?>><a href="<?php echo U('Member/index');?>">全部<span class="tongji_3">(<?php echo ($tongji["all"]); ?>)</span></a></li>
            <li <?php if($fp=='nolock'){ ?>class="on" <?php }?>><a href="<?php echo U('Member/index',array('fp'=>'nolock'));?>">正常会员<span class="tongji_3">(<?php echo ($tongji["nolock"]); ?>)</span></a></li>
            <li <?php if($fp=='lock'){ ?>class="on" <?php }?>><a href="<?php echo U('Member/index',array('fp'=>'lock'));?>">锁定会员<span class="tongji_3">(<?php echo ($tongji["lock"]); ?>)</span></a></li>
            <li <?php if($fp=='nozc'){ ?>class="on" <?php }?>><a href="<?php echo U('Member/index',array('fp'=>'nozc'));?>">无职场会员<span class="tongji_3">(<?php echo ($tongji["nozc"]); ?>)</span></a></li>
        </ul>
    </div>

    <div class="list">
    <form action="<?php echo U('Member/delAll');?>" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>手机号</th>
                <th>所在职场</th>
                <th>组号</th>
                <th>工号</th>
                <th>支公司查看权限</th>
                <th>市级查看权限</th>
                <th>注册时间</th>
                <th>登录时间</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
			<?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <td><?php echo ($v["phone"]); ?></td>
                <td>
                    <?php if($v['zc_id']): echo ($v["prov"]); ?>-<?php echo ($v["city"]); ?>-<?php echo ($v["area"]); ?>&nbsp;&nbsp;<span class="s_blue"><?php echo (get_zc_name($v["zc_id"])); ?></span><?php endif; ?>
                </td>
                <td><?php echo ($v["group_no"]); ?></td>
                <td><?php echo ($v["work_no"]); ?></td>
                <td>
                    <?php if($v['city_level']): ?>有
                        <?php else: ?>
                        无<?php endif; ?>
                </td>
                <td>
                    <?php if($v['area_level']): ?>有
                        <?php else: ?>
                        无<?php endif; ?>
                </td>
                <td>
                    <?php if($v['regtime']): echo (date('Y-m-d H:i:s',$v["regtime"])); endif; ?>
                </td>
                <td>
                    <?php if($v['logintime']): echo (date('Y-m-d H:i:s',$v["logintime"])); endif; ?>
                </td>
                <td class="oper">
                    <?php if($v['islock'] != 1): ?><a href="<?php echo U('Member/state',array('id' => $v['id'],'islock'=>1), '');?>"><img src="/App/Manage/View/Public/images/dui.png"></a>
                        <?php else: ?>
                        <a href="<?php echo U('Member/state',array('id' => $v['id'],'islock'=>0), '');?>"><img src="/App/Manage/View/Public/images/cuo.png"></a><?php endif; ?>
                </td>
                <td>
                <a href="<?php echo U('Member/edit',array('id' => $v['id']), '');?>">编辑</a>&nbsp;&nbsp;|
                    <a href="<?php echo U('Member/resetpwd',array('id' => $v['id']), '');?>">重置密码</a>
				</td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div class="page" style="clear: both;"><?php echo ($page); ?></div>
    </form>
    </div>
</div>
<style>
    .list td.aleft{  text-align: left;  }
    .list td.oper img {
        width: 14px !important;
        height:14px!important;
    }
    .tongji_3{color: #00a0d4 !important;font-size: 12px;font-weight: bold;margin-left: 5px;}
    .s_org{color: #FF5A00 !important}
    .s_blue{color: #3366CC !important}
</style>

</body>
</html>