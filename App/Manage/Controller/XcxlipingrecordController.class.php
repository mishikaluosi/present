<?php
namespace Manage\Controller;
use Common\Lib\Category;

class XcxlipingrecordController extends CommonContentController
{

  public function index()
  {
    $pid = I('pid', 0, 'intval');//类型
    $keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
    $where = " where g.del = 0 ";

    if (!empty($keyword)) {
      $where .= " and (j.nickname like '%{$keyword}%' or g.code like '%{$keyword}%' )";
    }

    $count = M('member')->query("
      select count(*) as count
      from bestop_xcxlipingrecord as g
      left join bestop_xcxliping as o
      on g.xcxliping_id = o.id
      left join bestop_member as j
      on g.member_id = j.id".$where);
    $count = $count[0]['count'];
    $page = new \Common\Lib\Page($count, 10);
    $page->rollPage = 7;
    $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $limit = $page->firstRow. ',' .$page->listRows;
    $art = M('member')->query("
      select g.*,o.title AS title,j.nickname as name
      from bestop_xcxlipingrecord as g
      left join bestop_xcxliping as o
      on g.xcxliping_id = o.id
      left join bestop_member as j
      on g.member_id = j.id".$where." order by id DESC limit $limit
    ");
    $this->assign('keyword', $keyword);
    $this->assign('page', $page->show());
    $this->assign('vlist', $art);
    $this->assign('type', '兑换记录');
    $this->display();
  }

  public function heqian()
  {
    $code = I("code");
    $code = (int)$code;
    $lipinrecordinfo = M('Xcxlipingrecord')->where(array('id' => $code))->find();
    if($lipinrecordinfo){
      if($lipinrecordinfo["status"] != '2'){
        echo json_encode([
          "code"=>-1,
          "msg"=>"礼品已核签"
        ]);
        exit;
      }else{
        $nowTime = time();
        $lipininfo = M('Xcxliping')->where(array('id'=>$lipinrecordinfo['xcxliping_id']))->find();
        if($nowTime<$lipininfo['starttime']){
          echo json_encode([
            "code"=>-1,
            "msg"=>"尚未到兑换时间"
          ]);
          exit;
        }
        if($nowTime>$lipininfo['endtime']){
          echo json_encode([
            "code"=>-1,
            "msg"=>"礼品已过期"
          ]);
          exit;
        }
        M('Xcxlipingrecord')->where(array('id' => $code))->save(['status'=>5,'heqiantime'=>time()]);
        echo json_encode([
          "code"=>0,
          "msg"=>"核签成功"
        ]);
        exit;
      }
    }else{
      echo json_encode([
        "code"=>-1,
        "msg"=>"没有改礼品记录"
      ]);
      exit;
    }
  }

  //删除到回收站
  public function del() {
    $id = I('id',0 , 'intval');
    $batchFlag = I('get.batchFlag', 0, 'intval');
    //批量删除
    if ($batchFlag) {
      $this->delBatch();
      return;
    }
    $pid = I('pid',0 , 'intval');//单纯的GET没问题
    if (false !== M('Xcxlipingrecord')->where(array('id' => $id))->setField('del', 1)) {
      $this->redirect('Xcxlipingrecord/index');
    }else {
      $this->error('删除失败');
    }
  }

  //批量删除到回收站
  public function delBatch() {
    $idArr = I('key',0 , 'intval');
    $pid = I('get.pid', 0, 'intval');

    if (!is_array($idArr)) {
      $this->error('请选择要删除的项');
    }

    if (false !== M('Xcxlipingrecord')->where(array('id' => array('in', $idArr)))->setField('del', 1)) {

      //更新静态缓存
      $this->redirect('Xcxlipingrecord/index');

    }else {
      $this->error('批量删除失败');
    }
  }
}
