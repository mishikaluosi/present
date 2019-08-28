<?php
namespace Manage\Controller;
use Common\Lib\Category;

class XcxproductrecordController extends CommonContentController
{

  public function index()
  {
    $pid = I('pid', 0, 'intval');//类型
    $keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
    $status = isset($_GET['status'])?$_GET['status']:'';//默认已经完成支付
    if($status === ''){
      $where = array('g.del'=>0);
    }else{
      $where = array('g.del'=>0,'g.status'=>$status);
    }

    if (!empty($keyword)) {
      $where['title'] = array('LIKE', "%{$keyword}%");
    }

    $count = M('Xcxproductrecord')->alias('g')->where($where)->count();
    $page = new \Common\Lib\Page($count, 10);
    $page->rollPage = 7;
    $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $limit = $page->firstRow. ',' .$page->listRows;
    $art = M('Xcxproductrecord')
          ->alias('g')
          ->field('g.*,o.title AS title,j.nickname')
          ->join('left join bestop_xcxproduct AS o ON g.xcxproduct_id = o.id')
          ->join('left join bestop_member AS j ON g.member_id = j.id')
          ->where($where)
          ->order('id DESC')
          ->limit($limit)
          ->select();
    $this->assign('status', $_GET['status']);
    $this->assign('keyword', $keyword);
    $this->assign('page', $page->show());
    $this->assign('vlist', $art);
    $this->assign('type', '充值记录');
    $this->display();
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
    if (false !== M('Xcxproductrecord')->where(array('id' => $id))->setField('del', 1)) {
      $this->redirect('Xcxproductrecord/index');
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

    if (false !== M('Xcxproductrecord')->where(array('id' => array('in', $idArr)))->setField('del', 1)) {

      //更新静态缓存
      $this->redirect('Xcxproductrecord/index');

    }else {
      $this->error('批量删除失败');
    }
  }
}
