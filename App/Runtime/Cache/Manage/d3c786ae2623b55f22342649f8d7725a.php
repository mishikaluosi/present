<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>

	<script type="text/javascript" src="/App/Manage/View/Public/js/dmAddress.js"></script>

	<link rel="stylesheet" type="text/css" href="/App/Manage/View/Public/js/calendar/jscal2.css"/>
	<link rel="stylesheet" type="text/css" href="/App/Manage/View/Public/js/calendar/border-radius.css"/>
	<link rel="stylesheet" type="text/css" href="/App/Manage/View/Public/js/calendar/win2k.css"/>
	<script type="text/javascript" src="/App/Manage/View/Public/js/calendar/calendar.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/calendar/lang/en.js"></script>

</head>
<body>
<div class="main">
	<div class="pos">问卷结果</div>
	<div class="operate">
		<div class="left" style="float: left;margin-top:8px">
			<form method="post" action="<?php echo U('Wenjuan/export_answer');?>">
				<?php if(is_array($search_p)): foreach($search_p as $k=>$v): ?><input type="hidden" name="<?php echo ($k); ?>" value="<?php echo ($v); ?>"/><?php endforeach; endif; ?>
				<input type="hidden" name="fp" value="<?php echo ($fp); ?>"/>
				<input type="submit" class="btn_blue btn_red" style="float: none" value="导出">
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
			<li <?php if($fp==0){ ?>class="on" <?php }?>><a href="<?php echo U('Wenjuan/answer');?>">全部</a></li>
			<?php if(is_array($fp_arr)): foreach($fp_arr as $k=>$v): ?><li <?php if($fp==$v['id']){ ?>class="on" <?php }?>><a href="<?php echo U('Wenjuan/answer',array('fp'=>$v['id']));?>">问卷<?php echo ($v["id"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>

	<div class="operate">
		<div class="left">
			<form method="post" action="<?php echo U('Wenjuan/answer');?>">
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
				<span class="s_span">问卷名称</span>
				<input type="text" name="swjname" class="inp_one" value="<?php echo ($swjname); ?>" >
				<!--<span class="s_span">姓名</span>
				<input type="text" name="sname" class="inp_one" value="<?php echo ($sname); ?>" >
				<span class="s_span">手机号</span>
				<input type="text" name="sphone" class="inp_one" value="<?php echo ($sphone); ?>" >-->
				<span class="s_span">时间：</span>
				<input type="text" style="width:100px;" name="stime" id="stime" class="inp_one" value="<?php echo ($stime); ?>" />
				<script type="text/javascript">
                    Calendar.setup({
                        weekNumbers: true,
                        inputField : "stime",
                        trigger    : "stime",
                        dateFormat: "%Y-%m-%d",
                        showTime: true,
                        minuteStep: 1,
                        onSelect   : function() {this.hide();}
                    });
				</script>
				<input type="text" style="width:100px;" name="etime" id="etime" class="inp_one" value="<?php echo ($etime); ?>" />
				<script type="text/javascript">
                    Calendar.setup({
                        weekNumbers: true,
                        inputField : "etime",
                        trigger    : "etime",
                        dateFormat: "%Y-%m-%d",
                        showTime: true,
                        minuteStep: 1,
                        onSelect   : function() {this.hide();}
                    });
				</script>

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
					<th>区域</th>
					<th>职场</th>
					<th>组号</th>
					<th>业务员</th>
					<th>问卷名</th>
					<th>客户姓名</th>
					<th>客户电话</th>
					<th>联系地址</th>
					<th>客户1</th>
					<th>电话1</th>
					<th>客户2</th>
					<th>电话2</th>
					<th>客户3</th>
					<th>电话4</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
						<td><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
						<td><?php echo ($v["id"]); ?></td>

						<td><?php echo ($v["prov"]); ?>-<?php echo ($v["city"]); ?>-<?php echo ($v["area"]); ?></td>
						<td><?php echo ($v["zc"]); ?></td>
						<td><?php echo ($v["group_no"]); ?></td>

						<td><?php echo ($v["dep"]); ?></td>
						<td class="aleft" style="">
							<img  src="/uploads//<?php echo ($v["wj_pic"]); ?>" style="width:40px;">
							<?php echo ($v["wj_name"]); ?><span style="color: #e4570d;padding-left: 5px;">(问卷<?php echo ($v["wenjuan_id"]); ?>)</span>
						</td>
						<td><?php echo ($v["uname"]); ?></td>
						<td><?php echo ($v["phone"]); ?></td>
						<td><?php echo ($v["address"]); ?></td>
						<td><?php echo ($v["khname1"]); ?></td>
						<td><?php echo ($v["khtel1"]); ?></td>
						<td><?php echo ($v["khname2"]); ?></td>
						<td><?php echo ($v["khtel2"]); ?></td>
						<td><?php echo ($v["khname3"]); ?></td>
						<td><?php echo ($v["khtel3"]); ?></td>

						<td><?php echo (date('Y-m-d H:i:s', $v["addtime"])); ?></td>
						<td>
							<a href="<?php echo U('Home/'.'Wenjuan/view',array('aid'=>$v['id']),'');?>" target="_blank">查看答题情况</a>
							<a href="javascript:;" onclick="toConfirm('<?php echo U('Wenjuan/an_del',array('id' => $v['id']), '');?>', '确实要删除吗？')">删除</a>
						</td>
					</tr><?php endforeach; endif; ?>
			</table>
			<div class="page" style="clear: both">
				<input type="button" onclick="doConfirmBatch('<?php echo U('Wenjuan/an_del', array('batchFlag' => 1));?>', '确实要删除选择项吗？')" class="btn_blue btn_f" value="删除">
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