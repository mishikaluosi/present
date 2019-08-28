<?php
  $config_base = array(
  	'TMPL_PARSE_STRING' => array(
  		'__PUBLIC__' => __ROOT__. '/Public/'.MODULE_NAME. '/' . get_cfg_value('CFG_THEMESTYLE'),
  		'__DATA__' => __ROOT__. '/Data',
  		'__AVATAR__' => __ROOT__. '/avatar',
  		'__UPLOAD__' => __ROOT__.'/uploads/',
  	),
  );
  return array_merge(get_cfg_value(),$config_base);
?>
