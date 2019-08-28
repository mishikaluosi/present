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
        var URL = '/index.php?s=/Manage/Rbac';
        var APP	 = '/index.php?s=';
        var SELF='/index.php?s=/Manage/Rbac/index';
        var PUBLIC='/App/Manage/View/Public';
        //-->
        </script>
</head>
<body>
<div class="main">
    <div class="pos">职场管理人列表</div>
    <div class="operate">
        <div class="left">
            <input type="button" onclick="goUrl('<?php echo U('Rbac/addUser');?>')" class="btn_blue btn_red" value="添加职场管理人">

        </div>
        <div class="left_pad">
         <i class="heng"></i>
            <form method="post" action="<?php echo U('Rbac/index');?>">
                <i></i>  <input type="text" name="keyword" title="管理员名称" class="inp_default" value="<?php echo ($keyword); ?>" placeholder="用户名" onfocus="if (value=='用户名'){value=''}" onblur="if(value==''){value='用户名'}">
                <!--<input type="submit" class="btn_blue" value="查  询">-->
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="list">    
    <form action="<?php echo U('Rbac/delAllUser');?>" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>
                <th><input type="checkbox" id="check"></th>
                <th>编号</th>
                <th>真实姓名</th>
                <th>用户名</th>

                <th>权限组</th>
                <th>职场</th>
                <th>上次登录ip</th>
                <th>上次登录时间</th>
				<th>锁定</th>
                <th>操作</th>
            </tr>
			<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
                <td><input type="checkbox" name="key[]" <?php if($v['usertype'] == 9): ?>disabled="disabled"<?php endif; ?> value="<?php echo ($v["id"]); ?>"></td>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["realname"]); ?></td>
                <td><?php echo ($v["username"]); ?></td>

                <td>
                <?php if($v['usertype'] == 9): ?>超级管理员
                <?php else: ?>
				<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$value): echo ($value["name"]); endforeach; endif; endif; ?>
				</td>
                <td><?php echo ($v["prov"]); ?>-<?php echo ($v["city"]); ?>-<?php echo ($v["area"]); ?>&nbsp;&nbsp;<?php echo (get_zc_name($v["zc_id"])); ?></td>
                <td><?php echo ($v["loginip"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$v["logintime"])); ?></td>
				<td><?php if($v['islock']): ?>是<?php else: ?>否<?php endif; ?></td>
                <td>
				<?php if($v['usertype'] == 9): ?><a href="<?php echo U('Rbac/addUser',array('uid' => $v['id']),'');?>">修改</a>

                <?php else: ?>
				<a href="<?php echo U('Rbac/addUser',array('uid' => $v['id']),'');?>">修改</a>
				<a href="<?php echo U('Rbac/delUser',array('uid' => $v['id']),'');?>" onclick="del('<?php echo U('Rbac/delUser',array('uid' => $v['id']),'');?>'); return false;">删除</a><?php endif; ?>
				</td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div class="page" style="clear: both;">
            <input type="button" onclick="doConfirmBatch('<?php echo U('Rbac/delUser', array('batchFlag' => 1));?>','确实要删除选择项吗？')" class="btn_blue btn_f" value="删除选中">
<?php echo ($page); ?></div>
    </form>
    </div>
</div>
</body>
</html>