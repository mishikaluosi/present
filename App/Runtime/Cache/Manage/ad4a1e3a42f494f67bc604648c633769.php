<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>


    <script type="text/javascript" src="/App/Manage/View/Public/shop/js/global.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/shop/js/arttpl.js"></script>
    <script type="text/javascript" src="/App/Manage/View/Public/shop/plugin/layer/layer.js"></script>
 <script language="JavaScript">
        <!--
        var URL = '/index.php?s=/Manage/Product';
        var APP	 = '/index.php?s=';
        var SELF='/index.php?s=/Manage/Product/index';
        var PUBLIC='/App/Manage/View/Public';
		var UPLOAD = "/uploads/";
        //-->
        </script>
 <script language="JavaScript">
     function psorts(id) {
    	 var psort = $(".psort"+id).val();
    	 $.ajax({
	            type: "POST",
	            url: "<?php echo U('Product/psort');?>",
	            data: {psort:psort,id:id},
	            dataType: "text",
	            success: function(data){
					
				}
				 
	         });
	 }
 </script>
</head>
<body>
<div class="main">
    <div class="pos">商品列表</div>
    <div class="operate">
        <div class="left">
            <input type="button" onclick="goUrl('<?php echo U('Product/msg');?>')" class="btn_blue btn_red" value="发布产品">
            <button type="button" class="btn_blue btn_red" onclick="product_move()">批量更改产品职场</button>
        </div>
        <div class="left_pad">
            <i class="heng"></i>
            <form method="post" action="<?php echo U('Product/index');?>">
                <i></i><input type="text" name="keyword" title="关键字" class="inp_default inp_bg" value="<?php echo ($keyword); ?>" placeholder="搜索" onfocus="if (value=='搜索'){value=''}" onblur="if(value==''){value='搜索'}">
                <input type="hidden" name="fp" value="<?php echo ($fp); ?>">
                <!--<input type="submit" class="btn_blue" value="查  询">-->
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
            <li <?php if($fp=='all'){ ?>class="on" <?php }?>><a href="<?php echo U('Product/index');?>">全部<span class="tongji_3">(<?php echo ($tongji["all"]); ?>)</span></a></li>
            <li <?php if($fp=='zs'){ ?>class="on" <?php }?>><a href="<?php echo U('Product/index',array('fp'=>'zs'));?>">在售商品<span class="tongji_3">(<?php echo ($tongji["zs"]); ?>)</span></a></li>
            <li <?php if($fp=='xj'){ ?>class="on" <?php }?>><a href="<?php echo U('Product/index',array('fp'=>'xj'));?>">下架商品<span class="tongji_3">(<?php echo ($tongji["xj"]); ?>)</span></a></li>
            <li <?php if($fp=='qh'){ ?>class="on" <?php }?>><a href="<?php echo U('Product/index',array('fp'=>'qh'));?>">缺货商品<span class="tongji_3">(<?php echo ($tongji["qh"]); ?>)</span></a></li>
            <li <?php if($fp=='by'){ ?>class="on" <?php }?>><a href="<?php echo U('Product/index',array('fp'=>'by'));?>">包邮商品<span class="tongji_3">(<?php echo ($tongji["by"]); ?>)</span></a></li>
            <li <?php if($fp=='zc'){ ?>class="on" <?php }?>><a href="<?php echo U('Product/index',array('fp'=>'zc'));?>">无职场商品<span class="tongji_3">(<?php echo ($tongji["zc"]); ?>)</span></a></li>
        </ul>
    </div>
    <div class="list">    
    <form action="<?php echo U('Product/delAll');?>" method="post" id="form_do" name="form_do">
        <table width="100%">
            <tr>
                <th  width="20">
                    <input type="checkbox" name="checkall" onclick="pe_checkall(this, 'product_id')" />
                </th>

                <th>ID</th>
                <th>商品图</th>
                <th>名称</th>
				<th>单价</th>

                <th>库存</th>
                <th>销量</th>
                <th>排序</th>
                <th>上架</th>
                <th>发布时间</th>
                <th>操作</th>
            </tr>
			<?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                <td><input type="checkbox" name="product_id[]" value="<?php echo ($v['id']); ?>" /></td>
                <td><?php echo ($v["id"]); ?></td>
                <td>
                    <?php if($v['litpic']): ?><img src="/uploads/<?php echo ($v["litpic"]); ?>" width="40" height="40" style="border:1px solid #f5f5f5;"><?php endif; ?>
                </td>
                <td class="aleft" ><?php echo ($v["title"]); ?></td>
                <td><span class="s_org"><?php echo ($v["money"]); ?></span></td>

                <td><span class="s_blue"><?php echo ($v["num"]); ?></span></td>
                <td><?php echo ($v["sellnum"]); ?></td>
                <td><input type="text" name="psort" value="<?php echo ($v["psort"]); ?>" onblur="psorts(<?php echo ($v["id"]); ?>)" class="psort<?php echo ($v["id"]); ?>"  size="5" /></td>
                <td class="oper">
                    <?php if($v['status'] == 1): ?><a href="<?php echo U('Product/state',array('id' => $v['id'],'status'=>2), '');?>"><img src="/App/Manage/View/Public/images/dui.png"></a>
                    <?php else: ?>
                        <a href="<?php echo U('Product/state',array('id' => $v['id'],'status'=>1), '');?>"><img src="/App/Manage/View/Public/images/cuo.png"></a><?php endif; ?>
                </td>
                <td><?php echo (date('Y-m-d H:i:s', $v["publishtime"])); ?></td>
                <td>
                    <a href="<?php echo U('Product/msg',array('id' => $v['id']), '');?>">编辑</a>
                    <a href="javascript:;" onclick="toConfirm('<?php echo U('Product/del',array('id' => $v['id']), '');?>', '确实要删除吗？')">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div class="page">
            <?php echo ($page); ?>
        </div>
    </form>
    </div>
</div>

<script type="text/javascript">
    function product_move() {
        var product_id = new Array();
        if ($("input[name='product_id[]']").filter(":checked").length == 0) {
            alert('请先勾选需要更改的商品!');
            return false;
        }
        $("input[name='product_id[]']").filter(":checked").each(function(i){
            product_id[i] = $(this).val();
        })
        product_id = product_id.join(',');
        var layer_index = layer.open({
            type: 2,
            title: '批量更改商品职场',
            area: ['800px', '500px'],
            fixed: false, //不固定
            shadeClose: true,
            shade: 0.5,
            content: "<?php echo U('Product/changezc');?>/product_id/"+product_id //iframe的url
        });
    }

</script>
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