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
    var SELF='/index.php?s=/Manage/Rbac/access/rid/4';
    var PUBLIC='/App/Manage/View/Public';
    $(function(){

        $('input[level=1]').click(function(){
            var inputs = $(this).parents('.app').find('input');
            if ( $(this).attr('checked')) {
                inputs.attr('checked','checked');
            }else {
                inputs.removeAttr('checked');
            }
            
        });

        $('input[level=2]').click(function(){
            var inputs = $(this).parents('dl').find('input');
            if($(this).attr('checked')) {
                inputs.attr('checked','checked');
                var inputParent = $(this).parents('.app').find('p>input');                
                inputParent.attr('checked','checked');

            }else {
                inputs.removeAttr('checked');
            }
            
        });

        $('input[level=3]').click(function(){
            var inputs = $(this).parents('dl').find('dt>input');
            if($(this).attr('checked')) {
                inputs.attr('checked','checked');
                var inputParent = $(this).parents('.app').find('p>input');                
                inputParent.attr('checked','checked');

            }else {
            }
            
        });
    });
    //-->
</script>
</head>
<body>
<div class="main">
    <div class="pos">权限设置</div>    
    <div class="operate">
        <div class="left"><input type="button" onclick="add('<?php echo U('Rbac/role');?>')" class="btn_blue" value="返回"></div>
    </div>
    <div class="list">    
        <div id="wrap">
        <form action="<?php echo U('Rbac/access');?>" method="post">

        <?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
        <p><input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_<?php echo ($app["level"]); ?>" level="1" <?php if($app['access']): ?>checked="checked"<?php endif; ?>/> <strong><?php echo ($app["title"]); ?></strong></p>


        <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
            <dt><input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_<?php echo ($action["level"]); ?>" level="2" <?php if($action['access']): ?>checked="checked"<?php endif; ?>/> <strong><?php echo ($action["title"]); ?></strong></dt>

            <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd><input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_<?php echo ($method["level"]); ?>" level="3" <?php if($method['access']): ?>checked="checked"<?php endif; ?>/> <span><?php echo ($method["title"]); ?></span></dd><?php endforeach; endif; ?>
        </dl><?php endforeach; endif; ?>

        </div><?php endforeach; endif; ?>
        <input type="hidden" name="rid" value="<?php echo ($rid); ?>"/>
        <input type="submit" class="btn_blue" value="保存权限"/>
        </form>

        </div>   

    </div>
</div>
</body>
</html>