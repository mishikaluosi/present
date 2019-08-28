<?php
namespace Api\Controller;
use Common\Lib\Xcx as Xcx;

class UserController extends LoginedCommonController {

  //获取用户信息
  public function getInfo()
  {
    $userId = $this->userId;
    $userId = $this->userId;
    $userInfo = $this->userInfo;
    //总充值金额
    $totczmoney = M('member')->query("select SUM(price) as totczmoney from bestop_xcxproductrecord where del = 0 and status>1 and member_id = '{$userId}'");
    //总获取百拓币
    $tothqbtb = M('member')->query("select SUM(num) as tothqbtb from bestop_xcxiconrecord where member_id = '{$userId}' and type = 'income'");
    //总获取百拓币
    $totxfbtb = M('member')->query("select SUM(num) as totxfbtb from bestop_xcxiconrecord where member_id = '{$userId}' and type = 'pay'");
    //product类型
    return_ok([
      'totczmoney'=>round($totczmoney[0]['totczmoney']?$totczmoney[0]['totczmoney']:0,2),
      'tothqbtb'=>$tothqbtb[0]['tothqbtb']?$tothqbtb[0]['tothqbtb']:0,
      'totxfbtb'=>$totxfbtb[0]['totxfbtb']?$totxfbtb[0]['totxfbtb']:0,
      'icon'=>$userInfo['icon']?$userInfo['icon']:0,
      'phone'=>$userInfo['phone'],
      'islock'=>$userInfo['islock']
    ]);
  }

  //发送验证码
  public function send_code()
  {
    $userId = $this->userId;
    $phone = I('phone', 1,'trim');
    if(preg_match("/^1[345678]{1}\d{9}$/",$phone)){
        $code=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $sms_demo=new \Common\Lib\Baidu\BaiduSmsClient();
        $response = $sms_demo->sendMessage($phone,$code);
        $_SESSION['code']=$code;
        $_SESSION['phone']=$phone;
        return_ok(array());
    }else{
        return_error("手机格式错误!");
    }
  }

  //推荐有礼
  public function tjyl()
  {
    $userId = $this->userId;
    $name = I('nameInput','','trim');
    $phone = I('phoneInput', 1,'trim');
    if(preg_match("/^1[345678]{1}\d{9}$/",$phone)){
        M('xcxtjyl')->add([
          'member_id'=>$userId,
          'name'=>$name,
          'phone'=>$phone,
          'update_time'=>time()
        ]);
        return_ok(array());
    }else{
        return_error("手机格式错误!");
    }
  }
  //设置手机号
  public function setphone()
  {
    $userId = $this->userId;
    $phone = I('phone', 1,'trim');
    $code = I('code', 1,'trim');
    if(preg_match("/^1[3456789]{1}\d{9}$/",$phone)){
        if($_SESSION["phone"] != $phone)return_error("手机号错误");
        if($_SESSION["code"] != $code)return_error("验证码错误");
        M('member')->where(['id'=>$userId])->save(['phone'=>$phone]);
        return_ok(array());
    }else{
        return_error("手机格式错误!");
    }
  }


  //获取用户礼品兑换记录
  public function dhlist()
  {
    $id = I('id',1,'intval');
    $page = I('page', 1,'intval');
    $size = I('size', 10,'intval');
    $records = Xcx::dhlist($this->userId,$page,$size,$id);
    return_ok($records);
  }

  //获取用户礼品兑换详情
  public function dhdetail()
  {
    $id = I('id',1,'intval');
    $records = M('member')->query("select a.*,b.title,b.litpic from bestop_xcxlipingrecord a left join bestop_xcxliping b on a.xcxliping_id = b.id where a.id = '{$id}'");
    return_ok($records[0]);
  }

  //获取百拓币消费明细
  public function totlist()
  {
    $page = I('page', 1,'intval');
    $size = I('size', 10,'intval');
    $records = Xcx::totlist($this->userId,$page,$size);
    return_ok($records);
  }

  //获取百拓币增加的记录
  public function zjlist()
  {
    $page = I('page', 1,'intval');
    $size = I('size', 10,'intval');
    $records = Xcx::zjlist($this->userId,$page,$size);
    return_ok($records);
  }

  //获取百拓币减少的记录
  public function jslist()
  {
    $page = I('page', 1,'intval');
    $size = I('size', 10,'intval');
    $records = Xcx::jslist($this->userId,$page,$size);
    return_ok($records);
  }

  //获取充值记录
  public function czlist()
  {
    $page = I('page', 1,'intval');
    $size = I('size', 10,'intval');
    $records = Xcx::czlist($this->userId,$page,$size);
    return_ok($records);
  }

  //获取充值记录type =1 未支付 //type=2 已支付
  public function czlistcate()
  {
    $page = I('page', 1,'intval');
    $size = I('size', 10,'intval');
    $type = I('type', 0,'intval');
    $records = Xcx::czlistcate($this->userId,$page,$size,$type);
    return_ok($records);
  }
}
 ?>
