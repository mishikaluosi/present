<?php
namespace Api\Controller;
use Common\Lib\Xcx as Xcx;

class LipinController extends LoginedCommonController {

  //购买礼品
  public function buyLipin()
  {
    //这里先不用队列处理并发
    $userId = $this->userId;
    $userInfo = $this->userInfo;

    //购买的礼品id
    $id = I('id', 0,'intval');
    $num = I('num', 1,'intval');
    $num = $num?$num:1;
    if(empty($id))return_error('参数错误');
    //礼品的信息
    $lipinInfo = M('xcxliping')->where(['id'=>$id,'del'=>0])->find();

    //存在礼品
    if(!empty($lipinInfo)){

      $nowTime = time();
      if($nowTime<$lipinInfo['starttime']){
        return_error('尚未到兑换时间');
      }

      if($nowTime>$lipinInfo['endtime']){
        return_error('礼品已过期');
      }

      $neednum = (int)$num;
      $hasnum = (int)$lipinInfo['num'];
      $needicon = (int)$lipinInfo['price']*$neednum;
      $hasIcon = (int)$userInfo['icon'];

      //检查数量
      if($hasnum<$neednum){
        return_error('库存不足');
      }

      //看用户的百拓币是否能够支付
      if($hasIcon<$needicon){
        return_error('账户百拓币不够');
      }

      Xcx::kcbtb($userId,$needicon);      //扣除用户的百拓币
      Xcx::kclpsl($id,$neednum);      //扣除礼品数量

      //增加礼品兑换记录
      $lpid = M('xcxlipingrecord')->add([
        'member_id'=>$userId,
        'xcxliping_id'=>$id,
        'num'=>$neednum,
        'reicon'=>$needicon,
        'time'=>time(),
        'status'=>2//已经支付,表示未核销,5表示完成(已经核销)
      ]);

      //生成二维码code
      $code = "JSBT ".randomnum(4).' '.sprintf("%04d",$lpid).' '.randomnum(4);
      M('xcxlipingrecord')->where(["id"=>$lpid])->save(["code"=>$code]);

      //增加百拓币log记录
      M('xcxiconrecord')->add([
        'member_id'=>$userId,
        'type'=>'pay',
        'time'=>$nowTime,
        'num'=>$needicon,
        'tip'=>'购买礼品'.$lipinInfo['title']
      ]);
      return_ok(['id'=>$lpid]);
    }else{
      return_error('不存在该礼品');
    }
  }

  //获取礼品列表
  public function getlist()
  {
    $page = I('page', 1,'intval');
    $size = I('size', 10,'intval');
    $lipins = Xcx::lipinlist($page,$size);
    return_ok($lipins);
  }

  //获取礼品详情
  public function getlipindetail()
  {
    $id = I('id',1,'intval');
    $lipinInfo = M('xcxliping')->field("
      id,content,date_format(from_unixtime(starttime),'%Y-%m-%d') as starttime,date_format(from_unixtime(endtime),'%Y-%m-%d') as endtime,pictureurls,price,oldprice,title,description
    ")->where(['id'=>$id,'del'=>0])->find();
    return_ok($lipinInfo);
  }
}
 ?>
