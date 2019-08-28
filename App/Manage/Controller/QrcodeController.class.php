<?php
namespace Manage\Controller;
use Common\Lib\Category;


class QrcodeController extends CommonContentController {
	public function index(){
	  $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
	  $level=3;
	  $size=4;
      Vendor('phpqrcode.phpqrcode');
      $errorCorrectionLevel =intval($level) ;//容错级别 
      $matrixPointSize = intval($size);//生成图片大小 
      $object = new \QRcode();
      $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);   
 }
	
}



?>