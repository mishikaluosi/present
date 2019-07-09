<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/common.js"></script>
 <script language="JavaScript">
        <!--
        var URL = '/waibao/present/trunk/index.php?s=/Manage/Rbac';
        var APP	 = '/waibao/present/trunk/index.php?s=';
        var SELF='/waibao/present/trunk/index.php?s=/Manage/Rbac/role';
        var PUBLIC='/waibao/present/trunk/App/Manage/View/Public';
        //-->
        </script>
</head>
<body>
<div class="main">
    <div class="pos">用户组列表</div>    
    <div class="operate">
       <div class="left">
            <input type="button" onclick="goUrl('<?php echo U('Rbac/addRole');?>')" class="btn_blue btn_red" value="添加用户组">

       </div>
        <div class="left">
            <div style="color: red">
                注：一键同步是指将职场信息同步到职场管理员表中，如之前已同步过的账号不会重复同步过来。<br/>
                一键同步的账号为职场联系人手机号，密码为手机号后6位。<br/>

            </div>
        </div>
        <div class="left_pad">
         <i class="heng"></i>
            <form method="post" action="<?php echo U('Rbac/role');?>">
                 <i></i> <input type="text" name="keyword" title="关键字" class="inp_default" value="<?php echo ($keyword); ?>" placeholder="用户名" onfocus="if (value=='用户名'){value=''}" onblur="if(value==''){value='用户名'}">
                <!--<input type="submit" class="btn_blue" value="查  询">-->
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="list">    
    <form action="<?php echo U('Rbac/delRole');?>" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>
                <th><input type="checkbox" id="check"></th>
                <th>编号</th>
                <th>用户组名称</th>
                <th>描述</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
			<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
                <td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <td><?php echo ($v["remark"]); ?></td>
                <td><?php if($v['status']): ?>是<?php else: ?>否<?php endif; ?></td>
                <td>
                    <?php if($v["id"] != 2): ?><input type="button" onclick="goUrl('<?php echo U('Rbac/batch_user',array('role_id'=>$v['id']));?>')" class="btn_blue " value="一键同步">
                        <a href="<?php echo U('Rbac/access',array('rid' => $v['id']),'');?>">权限设置</a>

                        <a href="<?php echo U('Rbac/addRole',array('id' => $v['id']),'');?>">修改</a>
                        <a href="<?php echo U('Rbac/delRole',array('id' => $v['id']),'');?>" onclick="del('<?php echo U('Rbac/delRole',array('id' => $v['id']),'');?>'); return false;">删除</a><?php endif; ?>
                </td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div class="page" style="clear: both;">
            <!--<input type="button" onclick="doConfirmBatch('<?php echo U('Rbac/delRole', array('batchFlag' => 1));?>','确实要删除选择项吗？')" class="btn_blue btn_f" value="删除选中">-->
            <?php echo ($page); ?>
        </div>
    </form>
    </div>
</div>
</body>
</html>