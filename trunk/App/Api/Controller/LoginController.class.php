<?php
namespace Api\Controller;
use Common\Lib\Weixin as Weixin;
use Think\Controller;

class LoginController extends Controller {

  //获取一些基本信息
  public function getbaseinfo()
  {
    //产品基本信息
    $product_cates = M('member')->query('select * from bestop_xcxproduct_cates where del = 0 order by id asc');
    //帮助中心信息
    $help = array();
    $article_cates = M('category')->where(['pid'=>1])->select();
    foreach ($article_cates as $k => $v) {
      $article = M('article')->where(['cid'=>$v['id']])->select();
      $item = array();
      foreach ($article as $kk => $vv) {
        $item[] = array(
          "itemName"=> $vv['title'],
          "content"=> $vv['description'],
        );
      }
      $help[] = array(
        "listName" => $v['name'],
        "item" => $item
      );
    }
    //滚动条信息
    $broadcast = M('article')->where(['cid'=>6])->order('updatetime desc')->limit('0,2')->select();
    //兑换礼品说明
    $shuoming = M('block')->where(['id'=>1])->find();

    return_ok(['product_cates'=>$product_cates,'help'=>$help,'broadcast'=>$broadcast,'shuoming'=>$shuoming['content']]);
  }
  // 微信登录
  public function weixin_login(){
      $iv=define_str_replace(I('iv')); //把空格转成+
      $encryptedData=urldecode(I('encryptedData'));  //解码
      $code=define_str_replace(I('code')); //把空格转成+
      $msg=Weixin::getUserInfo($code,$encryptedData,$iv); //获取微信用户信息（openid）
      if($msg['errCode']==0){
        $open_id=$msg['data']->openId;
        $session_key=$msg['session_key'];
        $nick_name=$msg['data']->nickName;
        $gender=$msg['data']->gender;
        $avatarurl=$msg['data']->avatarUrl;
        $info=M('member')->where(array('openid'=>$open_id))->select();
        $info = $info[0];
        if(!$info||empty($info)){
          //注册登录
          M('member')->add([
              'openid'=>$open_id,
              'sessionkey'=>$session_key,
              'avatarurl'=>$avatarurl,
              'gender'=>$gender,
              'nickname'=>$nick_name,
              'logintime'=>time(),
              'regtime'=>time(),
            ]);
        }else{
          //登录
          M('member')->where(array('openid'=>$open_id))->save([
            'sessionkey'=>$session_key,
            'avatarurl'=>$avatarurl,
            'gender'=>$gender,
            'nickname'=>$nick_name,
            'logintime'=>time(),
          ]);
        }
        return_json(['code'=>200,'data'=>array('session_key'=>$session_key),'msg'=>'登录成功']);
      }else{
        return_json(['code'=>404,'data'=>'','msg'=>'登录失败']);
      }
    }

    /* 微信支付完成，回调地址url方法  pay_notify() */
     public function pay_notify(){
         $post = post_data();    //接受POST数据XML个数
         $post_data = xml2array($post);   //微信支付成功，返回回调地址url的数据：XML转数组Array
         $postSign = $post_data['sign'];
         unset($post_data['sign']);

         ksort($post_data);// 对数据进行排序
         $str = $this->ToUrlParams($post_data);//对数组数据拼接成key=value字符串
         $key = C('CFG_WEIXIN_SHANGHUMIYAO');
         $sign = strtoupper(md5($str.'&key='.$key));   //再次生成签名，与$postSign比较

         $where['orderbn'] = $post_data['out_trade_no'];
         $order = M('xcxproductrecord')->where($where)->find();
         $userId = $order['member_id'];
         $productId = $order['xcxproduct_id'];
         if($sign==$postSign&&$order&&$post_data['return_code']=='SUCCESS'){
           if($order['status']=='2'){
               $this->return_success();
           }else{
               $updata['status'] = '2';
               //更新订单信息
               M('xcxproductrecord')->where($where)->save($updata);
               //获取商品信息
               $product = M('xcxproduct')->where(['id'=>$productId])->find();
               //添加百拓币返回记录
               M('xcxiconrecord')->add([
                 'member_id'=>$order['member_id'],
                 'type'=>"income",
                 'num'=>$order['reicon'],
                 'time'=>time(),
                 'tip'=>'购买产品'.$product['title']
               ]);
               //给用户账户添加百拓币
               M('member')->execute("update bestop_member set icon = icon + '{$order['reicon']}' where id = '$userId'");
               $this->return_success();
           }
         }else{
             echo '微信支付失败';
         }
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

     /*
      * 给微信发送确认订单金额和签名正确，SUCCESS信息 -xzz0521
      */
     private function return_success(){
         $return['return_code'] = 'SUCCESS';
         $return['return_msg'] = 'OK';
         $xml_post = '<xml>
                     <return_code>'.$return['return_code'].'</return_code>
                     <return_msg>'.$return['return_msg'].'</return_msg>
                     </xml>';
         echo $xml_post;exit;
     }
  }
?>
