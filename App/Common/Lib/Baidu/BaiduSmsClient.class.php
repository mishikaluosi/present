<?php
/*
* 百度官方没有提供官方的SMS SDK，这个SMS客户端由yaiyuan.com开发，作者:老葛
* sign.php为百度开发的文档，里面有错误。我做了修正。现在成功。
* 这个文件，采用GPL协议开源。
*
*/
namespace Common\Lib\Baidu;

use Common\Lib\Baidu\HttpUtil;
use Common\Lib\Baidu\SampleSigner;
use Common\Lib\Baidu\SignOption;

class BaiduSmsClient{
  //终端，默认为sms.bj.baidubce.com
  protected $endPoint;
  //AK
  protected $accessKey;
  //SK
  protected $secretAccessKey;
  //sign
  protected $sign_code;
  //tpl
  protected $tpl_code;

  /**
   * $config = array(
   *    'endPoint' => 'sms.bj.baidubce.com',
   *    'accessKey' => '618888888888888888888888',
   *    'secretAccessKey' => 'a6888888888888888888888888',
   *  );
   */
  function __construct() {
        $this->endPoint ='sms.bj.baidubce.com';
        $this->accessKey ='4f844aedf06f4c07a11a9ff47cb58d47';
	    $this->secretAccessKey ='52615428363d4cf389cec762c2c72bcc';

	    $this->sign_code='wWGrOb9L-ECsf-tzqx';
	    $this->tpl_code='smsTpl:e7476122a1c24e37b3b0de19d04ae901';
  }

  /**
   *   返回一个数组:
   *   成功：array( 'code' => '1000', 'message' => '成功', 'requestId' => '45e1235-3b07-4421-83f8-cf4c74b1232c', )
   *   失败：array( 'requestId' => 'a1145bba-95c0-4341-83de-115d41741f0f', 'code' => '401', 'message' => '权限认证失败', )
   */

  public function sendMessage($phone,$code) {
      $message_array = array(
          "invokeId" => $this->sign_code,
          "phoneNumber" => $phone,
          "templateCode" =>$this->tpl_code,
          "contentVar" => array(
              "code" =>  $code,
          ),
      );

	//生成json格式
	$json_data = json_encode($message_array);

	//生成签名
    $signer = new SampleSigner();
    $credentials = array("ak" => $this->accessKey,"sk" => $this->secretAccessKey);
    $httpMethod = "POST";
    $path = "/bce/v2/message";
    $params = array();
    $timestamp = new \DateTime();
    $timestamp->setTimezone(new \DateTimeZone("GMT"));
    $datetime = $timestamp->format("Y-m-d\TH:i:s\Z");
    $datetime_gmt = $timestamp->format("D, d M Y H:i:s T");

    $headers = array("Host" => $this->endPoint);
    $str_sha256 = hash('sha256', $json_data);
    $headers['x-bce-content-sha256'] = $str_sha256;
    $headers['Content-Length'] = strlen($json_data);
    $headers['Content-Type'] = "application/json";
    $headers['x-bce-date'] = $datetime;
    $options = array(SignOption::TIMESTAMP => $timestamp, SignOption::HEADERS_TO_SIGN =>array('host', 'x-bce-content-sha256',),);
    $ret = $signer->sign($credentials, $httpMethod, $path, $headers, $params, $options);
    $headers_curl = array(
      'Content-Type:application/json',
      'Host:' . $this->endPoint,
      'x-bce-date:' . $datetime,
      'Content-Length:' . strlen($json_data),
      'x-bce-content-sha256:' . $str_sha256,
      'Authorization:' . $ret,
      "Accept-Encoding: gzip,deflate",
      'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/2008052906 Firefox/3.0',
      'Date:' .$datetime_gmt,
    );

	$url = 'http://' . $this->endPoint . $path;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers_curl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $errorno = curl_errno($curl);
    curl_close($curl);
    return json_decode($result,true);
  }
  /**
   * {}
   */
  public function setEndPoint($endPoint) {
    $this->endPoint = $endPoint;
    return $this;
  }

  /**
   * {}
   */
  public function getEndPoint() {
    return $this->endPoint;
  }

  /**
   * {}
   */
  public function setAccessKey($accessKey) {
    $this->accessKey = $accessKey;
    return $this;
  }

  /**
   * {}
   */
  public function getAccessKey() {
    return $this->accessKey;
  }

  /**
   * {}
   */
  public function setSecretAccessKey($secretAccessKey) {
    $this->secretAccessKey = $secretAccessKey;
    return $this;
  }

  /**
   * {}
   */
  public function getSecretAccessKey() {
    return $this->secretAccessKey;
  }
}
