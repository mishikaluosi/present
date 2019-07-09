<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel='stylesheet' type="text/css" href="/waibao/present/trunk/App/Manage/View/Public/css/style.css" />
	<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/common.js"></script>

	<script type="text/javascript" src="/waibao/present/trunk/App/Manage/View/Public/js/dmAddress.js"></script>

</head>
<body>
<div class="main">
	<div class="pos">活动数据
		<?php if($_admin_flag == false): ?>[<?php echo ($_zcinfo["prov"]); ?>-<?php echo ($_zcinfo["city"]); ?>-<?php echo ($_zcinfo["area"]); ?>:<?php echo (get_zc_name($_zcinfo["zc_id"])); ?>]<?php endif; ?>
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
			<li <?php if($fp==0){ ?>class="on" <?php }?>><a href="<?php echo U('Event/info');?>">全部</a></li>
			<?php if(is_array($fp_arr)): foreach($fp_arr as $k=>$v): ?><li <?php if($fp==$v['id']){ ?>class="on" <?php }?>><a href="<?php echo U('Event/info',array('fp'=>$v['id']));?>">活动<?php echo ($v["id"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>

	<div class="operate">
		<div class="left">
			<form method="post" action="<?php echo U('Event/info');?>">
				<span class="s_span">&nbsp;&nbsp业务员：</span>
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
				<input type="text" name="sdep" class="inp_one" value="<?php echo ($sdep); ?>" >
				<span class="s_span">活动名称</span>
				<input type="text" name="swjname" class="inp_one" value="<?php echo ($swjname); ?>" >
				<span class="s_span">用户名</span>
				<input type="text" name="sname" class="inp_one" value="<?php echo ($sname); ?>" >
				<span class="s_span">手机号</span>
				<input type="text" name="sphone" class="inp_one" value="<?php echo ($sphone); ?>" >

				<input type="hidden" name="fp" value="<?php echo ($fp); ?>"/>

				<input type="submit" class="btn_blue" style="float: none" value="查  询">
			</form>
		</div>
		<div class="clear"></div>
	</div>

	<div class="list guestbook">
		<form action="<?php echo U('Wenjuan/an_delAll');?>" method="post" id="form_do" name="form_do">
			<table width="100%">
				<tr>
					<th><input type="checkbox" id="check"></th>
					<th>编号</th>
					<th>业务员</th>
					<th>活动名</th>
					<th>用户姓名</th>
					<th>手机号</th>
					<th>添加时间</th>

				</tr>
				<?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
						<td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
						<td><?php echo ($v["id"]); ?></td>
						<td><?php echo ($v["yq_username"]); ?></td>
						<td class="aleft" style="">
							<?php echo ($v["e_name"]); ?><span style="color: #e4570d;padding-left: 5px;">(活动<?php echo ($v["event_id"]); ?>)</span>
						</td>
						<td><?php echo ($v["username"]); ?></td>
						<td><?php echo ($v["phone"]); ?></td>

						<td><?php echo (date('Y-m-d H:i:s', $v["addtime"])); ?></td>

					</tr><?php endforeach; endif; ?>
			</table>
			<div class="page" style="clear: both">
				<!--<input type="button" onclick="doConfirmBatch('<?php echo U('Wenjuan/an_del', array('batchFlag' => 1));?>', '确实要删除选择项吗？')" class="btn_blue btn_f" value="删除">
				-->
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