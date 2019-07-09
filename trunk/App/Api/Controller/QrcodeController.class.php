<?php
namespace Api\Controller;
use Think\Controller;

class QrcodeController extends Controller {

    function index()
    {
      require("Include/Library/Vendor/phpqrcode/phpqrcode.php");
      $code = I('code','','trim');
      $errorCorrectionLevel = 'L';//容错级别
      $matrixPointSize = 6;//生成图片大小
      \QRcode::png($code, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }
}
?>
