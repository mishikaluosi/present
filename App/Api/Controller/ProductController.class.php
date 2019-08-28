<?php
namespace Api\Controller;
use Common\Lib\Xcx as Xcx;

class ProductController extends LoginedCommonController {
  private $sign;
  //购买产品(支付接口)
  public function buyProduct()
  {
    //这里先不用队列处理并发
    $userId = $this->userId;
    $userInfo = $this->userInfo;

    //购买的产品id
    $id = I('id', 0,'intval');
    if(empty($id))return_error('参数错误');
    //产品的信息
    $productInfo = M('xcxproduct')->where(['id'=>$id,'del'=>0])->find();

    //存在产品
    if(!empty($productInfo)){
      $price = $productInfo['price'];
      $reicon = $productInfo['reicon'];
      //增加购买产品记录
      $orderbn = 'W'.date('YmdHis',time()).'-'.randomkeys(2);
      $insertid = M('xcxproductrecord')->add([
        'member_id'=>$userId,
        'xcxproduct_id'=>$id,
        'price'=>$price,
        'reicon'=>$reicon,
        'time'=>time(),
        'status'=>0,
        'orderbn'=>$orderbn
      ]);
      if($insertid){
        $this->Pay($price*100,$userInfo['openid'],$orderbn);
      }else{
        return_error('生成订单错误');
      }
    }else{
      return_error('不存在该产品或产品已下架');
    }
  }

  //购买未支付产品(支付接口)
  public function buyProduct1()
  {
    $userId = $this->userId;
    $userInfo = $this->userInfo;

    //购买的产品记录的id
    $id = I('id', 0,'intval');
    if(empty($id))return_error('参数错误');
    //产品的信息
    $productrecordInfo = M('xcxproductrecord')->where(['id'=>$id,'status'=>0,'member_id'=>$userId])->find();
    $productId = $productrecordInfo['xcxproduct_id'];
    $productInfo = M('xcxproduct')->where(['id'=>$productId,'del'=>0])->find();
    //存在产品
    if(!empty($productInfo)){
      $price = $productInfo['price'];
      $reicon = $productInfo['reicon'];
      //增加购买产品记录
      $orderbn = $productrecordInfo['orderbn'];
      $this->Pay($price*100,$userInfo['openid'],$orderbn);
    }else{
      return_error('未找到订单信息');
    }
  }

  public function cancelProduct()
  {
    $userId = $this->userId;
    $userInfo = $this->userInfo;

    //购买的产品记录的id
    $id = I('id', 0,'intval');
    if(empty($id))return_error('参数错误');
    //产品的信息
    $productrecordInfo = M('xcxproductrecord')->where(['id'=>$id,'status'=>0,'member_id'=>$userId])->find();
    $productId = $productrecordInfo['xcxproduct_id'];
    $productInfo = M('xcxproduct')->where(['id'=>$productId,'del'=>0])->find();
    //存在产品
    if(!empty($productInfo)){
      M('xcxproductrecord')->where(['id'=>$id,'status'=>0,'member_id'=>$userId])->save([
        'status'=>'1'
      ]);
      return_ok([]);
    }else{
      return_error('未找到订单信息');
    }
  }

  //获取产品列表
  public function getlist()
  {
    $id = I('id', 0,'intval');
    $page = I('page', 1,'intval');
    $size = I('size', 10,'intval');
    $products = Xcx::productlist($id,$page,$size);
    return_ok($products);
  }

  public function getdetail()
  {
    $id = I('id', 0,'intval');
    $info = M('member')->query("select a.*,b.name as name from bestop_xcxproduct a left join bestop_xcxproduct_cates b on a.type = b.id where a.id = '{$id}'");
    return_ok($info[0]);
  }

  private function Pay($total_fee,$openid,$order_id){
      if(empty($total_fee)){
        return_error('金额有误');
      }
      if(empty($openid)){
        return_error('登录失效，请重新登录(openid参数有误)');
      }
      if(empty($order_id)){
        return_error('自定义订单有误');
      }
      $appid =  C('CFG_WEIXIN_APPID');
      $body = 'baituo';
      $mch_id = C('CFG_WEIXIN_SHANGHUHAO');
      $KEY = C('CFG_WEIXIN_SHANGHUMIYAO');
      $nonce_str =    randomkeys(32);//随机字符串
      $notify_url =   'https://xcx.jsbestop.com/index.php/Api/Login/pay_notify';  //支付完成回调地址url
      $out_trade_no = $order_id;//商户订单号
      $spbill_create_ip = $_SERVER['SERVER_ADDR']?$_SERVER['SERVER_ADDR']:'180.76.252.194';
      $trade_type = 'JSAPI';//交易类型 默认JSAPI

      $post['appid'] = $appid;
      $post['body'] = $body;
      $post['mch_id'] = $mch_id;
      $post['nonce_str'] = $nonce_str;
      $post['notify_url'] = $notify_url;
      $post['openid'] = $openid;
      $post['out_trade_no'] = $out_trade_no;
      $post['spbill_create_ip'] = $spbill_create_ip;
      $post['total_fee'] = intval($total_fee);
      $post['trade_type'] = $trade_type;
      $sign = $this->MakeSign($post,$KEY);

      $post_xml = '<xml>
             <appid>'.$appid.'</appid>
             <body>'.$body.'</body>
             <mch_id>'.$mch_id.'</mch_id>
             <nonce_str>'.$nonce_str.'</nonce_str>
             <notify_url>'.$notify_url.'</notify_url>
             <openid>'.$openid.'</openid>
             <out_trade_no>'.$out_trade_no.'</out_trade_no>
             <spbill_create_ip>'.$spbill_create_ip.'</spbill_create_ip>
             <total_fee>'.$total_fee.'</total_fee>
             <trade_type>'.$trade_type.'</trade_type>
             <sign>'.$sign.'</sign>
          </xml> ';

      $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
      $xml = $this->http_request($url,$post_xml);     //POST方式请求http
      $array = xml2array($xml);               //将【统一下单】api返回xml数据转换成数组，全要大写
      if($array['return_code'] == 'SUCCESS' && $array['return_msg'] == 'OK'){
          $time = time();
          $tmp=[];                            //临时数组用于签名
          $tmp['appId'] = $appid;
          $tmp['nonceStr'] = $nonce_str;
          $tmp['package'] = 'prepay_id='.$array['prepay_id'];
          $tmp['signType'] = 'MD5';
          $tmp['timeStamp'] = "$time";

          $data['state'] = 1;
          $data['timeStamp'] = "$time";
          $data['nonceStr'] = $nonce_str;
          $data['signType'] = 'MD5';
          $data['package'] = 'prepay_id='.$array['prepay_id'];
          $data['paySign'] = $this->MakeSign($tmp,$KEY);
          $data['out_trade_no'] = $out_trade_no;
          return_ok($data);
      }else{
          $data['state'] = 0;
          $data['text'] = "错误";
          $data['RETURN_CODE'] = $array['return_code'];
          $data['RETURN_MSG'] = $array['return_msg'];
          return_ok($data);
      }
  }

  /**
   * 生成签名, $KEY就是支付key
   * @return 签名
   */
  private function MakeSign( $params,$KEY){
      if(isset($params['sing']))
      unset($params['sing']);
      ksort($params);
      $string = $this->ToUrlParams($params);
      $string = $string . "&key=".$KEY;
      $string = md5($string);
      $result = strtoupper($string);
      return $result;
  }
  /**
   * 将参数拼接为url: key=value&key=value
   * @param $params
   * @return string
   */
  private function ToUrlParams( $params ){
      $string = '';
      if( !empty($params) ){
          $array = array();
          foreach( $params as $key => $value ){
              $array[] = $key.'='.$value;
          }
          $string = implode("&",$array);
      }
      return $string;
  }
  /**
   * 调用接口， $data是数组参数
   * @return 签名
   */
  private function http_request($url,$data = null,$headers=array())
  {
      $curl = curl_init();
      if( count($headers) >= 1 ){
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      }
      curl_setopt($curl, CURLOPT_URL, $url);

      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

      if (!empty($data)){
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      }
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $output = curl_exec($curl);
      curl_close($curl);
      return $output;
  }

}
 ?>
