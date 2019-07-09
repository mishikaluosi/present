<?php

$url = $_SERVER['HTTP_HOST'].str_replace('bestop.php','index.php',$_SERVER['PHP_SELF']);
$url .= '?s=/Manage/Login/index';
header("Location: http://".$url);

?>