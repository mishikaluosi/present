<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel='stylesheet' type="text/css" href="/App/Manage/View/Public/css/style.css" />
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/common.js"></script>
	<script type="text/javascript" src="/App/Manage/View/Public/js/jquery.form.min.js"></script>
	<!--<script type="text/javascript" src="<?php echo U('Public/editor');?>"></script>-->
</head>
<body>
<style>
	.scale_panel {
		float: left;
		margin-left: 30px;
		font-size: 12px;
		color: #999;
		width: 200px;
		line-height: 18px;
		position: relative;
		height:32px;
	}
	.scale_panel .scale {
		position: absolute;
		left: 0;
		top: 9px;
		width: 200px;
		background-repeat: repeat-x;
		background-position: 0 100%;
		background-color: #E4E4E4;
		height: 8px;
		border-radius: 10px;
		height:15px;
	}
	.scale_panel .scale .div{
		background-repeat: repeat-x;
		background-color: #3BE3FF;
		width: 0px;
		position: absolute;
		height: 15px;
		border-radius: 10px;
	}
	.scale span.btn {
		background: #ccc no-repeat;
		width: 20px;
		height: 20px;
		position: absolute;
		top: -3px;
		left:-10px;
		cursor: pointer;
		border-radius: 10px;
	}

</style>
<div class="main">
	<div class="pos">
		<span style="float:left;">奖项设置</span>
		<input style="float:left;margin-left: 20px;" type="button" onclick="location.reload()" class="btn_blue" value="刷新">
		<input id="add_draw" style="float:left;margin-left: 20px;" type="button" class="btn_blue btn_green" value="添加奖项">
	</div>
	<div class="form_box">
		<?php if(is_array($event_draw)): foreach($event_draw as $key=>$v): ?><div class="form" alt="<?php echo ($v["id"]); ?>">
			<dl>
				<dt>奖项<span class="award_tip"><?php echo ($key+1); ?></span> </dt>
				<dd>
					<input style="
					background: #d9534f;
					height: 31px;
					min-width: 80px;
					padding: 0 10px;
					line-height: 28px;
					border-radius: 5px;
					margin: 0px 10px 0 0;
					text-align: center;
					border: 0px;
					color: #fff;
					font-size: 12px;
					cursor: pointer;
					float: left;"type="button" class="del_form" value="删除">
				</dd>
			</dl>
			<dl>
				<dt>奖项等级</dt>
				<dd>
					<input type="text" name="draw_level" class="inp_large draw_level" value="<?php echo ($v["draw_level"]); ?>" />
				</dd>
			</dl>
			<dl>
				<dt>奖品信息</dt>
				<dd>
					<select name="draw_award" class="draw_award" style="width:180px;height:30px;border: solid 1px #d7d7d7;">
						<option value="0">请选择奖品</option>
						<?php if(is_array($awards)): foreach($awards as $key=>$value): ?><option value="<?php echo ($value['id']); ?>"
								<?php if($v["award_id"] == $value['id']): ?>selected<?php endif; ?>
							>
							<?php echo ($value['name']); ?>
							</option><?php endforeach; endif; ?>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>奖品数量</dt>
				<dd>
					<input type="number" name="draw_num" class="inp_large draw_num" min="1" value="<?php echo ($v['draw_num']); ?>">
				</dd>
			</dl>
			<!--<dl>-->
				<!--<dt>中奖率</dt>-->
				<!--<dd>-->
					<!--<input style="float: left;width: 20%;" type="number" name="draw_percent" class="inp_large draw_percent" value="<?php echo ($v['draw_percent']); ?>" readonly>-->
					<!--<div class="scale_panel">-->
						<!--<div class="scale">-->
							<!--<div class="div" style="width: <?php echo ($v['draw_percent']); ?>%;"></div>-->
							<!--<span class="btn" style="left: <?php echo ($v['draw_percent']/100*200-10); ?>px;"></span>-->
						<!--</div>-->
					<!--</div>-->
				<!--</dd>-->
			<!--</dl>-->
		</div><?php endforeach; endif; ?>
	</div>
	<div class="form_b">
		<input id="id" type="hidden" name="id" value="" />
		<input id="e_id" type="hidden" name="e_id" value="<?php echo ($e_id); ?>" />
		<input id='save_url' type="hidden" value="<?php echo U('Event/draw_save');?>">
		<input id='del_url' type="hidden" value="<?php echo U('Event/draw_delete');?>">
		<input type="button" class="btn_blue" id="submit" value="保 存">
	</div>
</div>
<div class="empty_form form" alt="-1" style="display:none;">
	<dl>
		<dt>奖项<span class="award_tip"></span></dt>
		<dd>
			<input style="
					background: #d9534f;
					height: 31px;
					min-width: 80px;
					padding: 0 10px;
					line-height: 28px;
					border-radius: 5px;
					margin: 0px 10px 0 0;
					text-align: center;
					border: 0px;
					color: #fff;
					font-size: 12px;
					cursor: pointer;
					float: left;"type="button" class="del_form" value="删除">
		</dd>
	</dl>
	<dl>
		<dt>奖项等级</dt>
		<dd>
			<input type="text" name="draw_level" class="inp_large draw_level" value="" />
		</dd>
	</dl>
	<dl>
		<dt>奖品信息</dt>
		<dd>
			<select name="draw_award" class="draw_award" style="width:180px;height:30px;border: solid 1px #d7d7d7;">
				<option value="0">请选择奖品</option>
				<?php if(is_array($awards)): foreach($awards as $key=>$value): ?><option value="<?php echo ($value['id']); ?>"><?php echo ($value['name']); ?></option><?php endforeach; endif; ?>
			</select>
		</dd>
	</dl>
	<dl>
		<dt>奖品数量</dt>
		<dd>
			<input type="number" name="draw_num" class="inp_large draw_num" min="1" value="">
		</dd>
	</dl>
	<!--<dl>-->
		<!--<dt>中奖率</dt>-->
		<!--<dd>-->
			<!--<input style="float: left;width: 20%;" type="number" name="draw_percent" class="inp_large draw_percent" value="0" readonly>-->
			<!--<div class="scale_panel">-->
				<!--<div class="scale" >-->
					<!--<div class="div"></div>-->
					<!--<span class="btn"></span>-->
				<!--</div>-->
			<!--</div>-->
		<!--</dd>-->
	<!--</dl>-->
</div>
<script type="text/javascript" src="/App/Manage/View/Public/js/percent_bar.js"></script>

</body>
</html>