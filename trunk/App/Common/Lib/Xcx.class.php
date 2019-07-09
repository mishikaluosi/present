<?php

namespace Common\Lib;
class Xcx{

  /**
   * 获取单个礼品信息
   * @param integer $id 礼品id
   * @return array
   */
  static function getlpinfo($id)
  {
    return M('xcxliping')->where(['id'=>$id,'del'=>0])->find();
  }


  /**
   * 扣除用户百拓币
   * @param integer $userId 用户id
   * @param integer $icon 百拓币数量
   * @return NULL
   */
  static function kcbtb($userId,$icon)
  {
    M('member')->execute("update bestop_member set icon = icon - '{$icon}' where id = '$userId'");
  }


  /**
   * 扣除礼品数量
   * @param integer $Id 礼品id
   * @param integer $num 数量
   * @return NULL
   */
  static function kclpsl($id,$num)
  {
    M('member')->execute("update bestop_xcxliping set num = num-$num where id = '$id'");
  }


  /**
   * 获取礼品列表
   * @return array
   */
  static function lipinlist($page,$size)
  {
    $limit = '';
    if($page>0&&$size>0&&is_int($page)&&is_int($size)){
      $f = ($page-1)*$size;
      $limit = sprintf(" limit %u ,%u",$f,$size);
    }
    return M('member')->query("select id,title,litpic,description,price as icon ,num  from bestop_xcxliping where del = 0 and num>0 order by psort asc,publishtime desc ".$limit);
  }

  /**
   * 获取产品列表
   * @return array
   */
  static function productlist($id,$page,$size)
  {
    $limit = '';
    if($page>0&&$size>0&&is_int($page)&&is_int($size)){
      $f = ($page-1)*$size;
      $limit = sprintf(" limit %u ,%u",$f,$size);
    }
    return M('member')->query("select id,title,type,litpic,description,price,reicon as icon from bestop_xcxproduct where del = 0 and type='{$id}' order by psort asc,publishtime desc  ".$limit);
  }

  /**
   * 获取用户礼品兑换记录
   * @param integer $userId 用户id
   * @param integer $page 页数
   * @param integer $size 每页大小
   * @return NULL
   */
   static function dhlist($userId,$page,$size,$id)
   {
     $limit = '';
     $where = "where a.del = 0 and a.member_id = '{$userId}'";
     $order = "";
     $time = time();
     if($id == 2){
       $where .= " and a.status='$id' and b.endtime>$time ";
       $order .= " order by a.time desc ";
     }
     if($id == 5){
       $where .= " and a.status='$id' ";
       $order .= " order by a.heqiantime desc ";
     }
     if($id == 9){
       $where .= " and a.status='2' and b.endtime<$time";
       $order .= " order by a.time desc ";
     }
     if($page>0&&$size>0&&is_int($page)&&is_int($size)){
       $f = ($page-1)*$size;
       $limit = sprintf(" limit %u ,%u",$f,$size);
     }

     return M('member')->query("
                   select a.id,from_unixtime(a.time,'%Y-%m-%d %H:%i:%s') as time,from_unixtime(a.heqiantime,'%Y-%m-%d %H:%i:%s') as heqiantime,from_unixtime(b.endtime,'%Y-%m-%d %H:%i:%s') as endtime,a.status,b.title,b.litpic,a.reicon
                   from bestop_xcxlipingrecord as a left join bestop_xcxliping b on a.xcxliping_id = b.id
                   ".$where.$order.$limit);
   }

   /**
    * 获取用户充值记录
    * @param integer $userId 用户id
    * @param integer $page 页数
    * @param integer $size 每页大小
    * @return NULL
    */
    static function czlist($userId,$page,$size)
    {
      $limit = '';
      if($page>0&&$size>0&&is_int($page)&&is_int($size)){
        $f = ($page-1)*$size;
        $limit = sprintf(" limit %u ,%u",$f,$size);
      }
      return M('member')->query("
                  select b.title,b.litpic,b.description,a.price,a.reicon as icon,a.status,from_unixtime(a.time,'%Y-%m-%d %H:%i:%s') as time
                  from bestop_xcxproductrecord as a left join bestop_xcxproduct as b on a.xcxproduct_id = b.id
                  where a.del = 0 and a.status = 2 and a.member_id = '{$userId}'
                  order by a.time desc ". $limit);
    }

    static function czlistcate($userId,$page,$size,$type)
    {
      $limit = '';
      if($page>0&&$size>0&&is_int($page)&&is_int($size)){
        $f = ($page-1)*$size;
        $limit = sprintf(" limit %u ,%u",$f,$size);
      }
      return M('member')->query("
                  select a.id as productrecordid, b.title,b.litpic,b.description,a.price,a.reicon as icon,a.status,from_unixtime(a.time,'%Y-%m-%d %H:%i:%s') as time
                  from bestop_xcxproductrecord as a left join bestop_xcxproduct as b on a.xcxproduct_id = b.id
                  where a.del = 0 and a.status = '$type' and a.member_id = '{$userId}'
                  order by a.time desc ". $limit);
    }

    static function jslist($userId,$page,$size)
    {
      $limit = '';
      if($page>0&&$size>0&&is_int($page)&&is_int($size)){
        $f = ($page-1)*$size;
        $limit = sprintf(" limit %u ,%u",$f,$size);
      }
      return M('member')->query("
                  select action,type,tip,from_unixtime(time,'%Y-%m-%d %H:%i:%s') as time,num from bestop_xcxiconrecord where type = 'pay' and member_id = '{$userId}' order by time desc ". $limit);
    }

    static function zjlist($userId,$page,$size)
    {
      $limit = '';
      if($page>0&&$size>0&&is_int($page)&&is_int($size)){
        $f = ($page-1)*$size;
        $limit = sprintf(" limit %u ,%u",$f,$size);
      }
      return M('member')->query("
                  select action,type,tip,from_unixtime(time,'%Y-%m-%d %H:%i:%s') as time,num from bestop_xcxiconrecord where type = 'income' and member_id = '{$userId}' order by time desc  ". $limit);
    }

    static function totlist($userId,$page,$size)
    {
      $limit = '';
      if($page>0&&$size>0&&is_int($page)&&is_int($size)){
        $f = ($page-1)*$size;
        $limit = sprintf(" limit %u ,%u",$f,$size);
      }
      return M('member')->query("
                  select action,type,tip,from_unixtime(time,'%Y-%m-%d %H:%i:%s') as time,num from bestop_xcxiconrecord where member_id = '{$userId}' order by time desc  ". $limit);
    }
}
