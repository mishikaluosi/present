<?php

error_reporting (E_ALL & ~E_NOTICE);
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('APP_DEBUG',true);//是否调试//部署阶段注释或者设为false
define('APP_PATH', "./App/");//项目路径
define('THINK_PATH', "./Include/");
define('WEB_PATH', "./");



$agent = $_SERVER['HTTP_USER_AGENT'];
if(
	strpos($agent,"comFront") ||
	strpos($agent,"iPhone") ||
	strpos($agent,"MIDP-2.0") ||
	strpos($agent,"Opera Mini") ||
	strpos($agent,"UCWEB") ||
	strpos($agent,"Android") ||
	strpos($agent,"Windows Phone") ||
	strpos($agent,"Windows CE") ||
	strpos($agent,"SymbianOS"))
{
    define('BIND_VIEW','Mobile');
}else{
    define('BIND_VIEW','Home');
}

require THINK_PATH.'ThinkPHP.php';//加载ThinkPHP框架




?>
