<?php
namespace Manage\Controller;
use Common\Lib\Category;

class XcxlipingController extends CommonContentController
{
  public function index() {

    $pid = I('pid', 0, 'intval');//类型
    $keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
    $where = array('del'=>0);

    if (!empty($keyword)) {
      $where['title'] = array('LIKE', "%{$keyword}%");
    }

    $count = M('xcxliping')->where($where)->count();
    $page = new \Common\Lib\Page($count, 10);
    $page->rollPage = 7;
    $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $limit = $page->firstRow. ',' .$page->listRows;
    $art = M('xcxliping')->where($where)->order('psort ASC, publishtime DESC')->limit($limit)->select();
    $del_count = M('xcxliping')->where(array('del'=>1))->count();
    $this->assign('delcount',$del_count);
    $this->assign('pid', $pid);
    $this->assign('keyword', $keyword);
    $this->assign('page', $page->show());
    $this->assign('vlist', $art);
    $this->assign('type', '礼品列表');
    $this->display();
  }
  //添加文章
  public function add() {
    //当前控制器名称
    if (IS_POST) {
      $this->addPost();
      exit();
    }

    $this->display();
  }

  //
  public function addPost() {
    $data = I('post.');
    $data['title'] = I('title', '', 'htmlspecialchars,rtrim');
    $data['description'] = I('description','','htmlspecialchars,rtrim');
    $data['content'] = I('content', '', '');
    $data['price'] = I('price','0','intval');
    $data['oldprice'] = I('oldprice','0','intval');
    $data['num'] = I('num','0','intval');
    $data['reicon'] = I('reicon','0','intval');
    $data['psort'] = I('psort','999','intval');
    $data['publishtime'] = I('publishtime', time(),'strtotime');
    $data['starttime'] = I('starttime', time(),'strtotime');
    $data['endtime'] = I('endtime', time(),'strtotime');
    $data['updatetime'] = time();
    if (empty($data['title'])) {
      $this->error('产品名称不能为空');
    }
    if (empty($data['description'])) {
      $this->error('描述不能为空');
    }
    if (empty($data['price'])) {
      $this->error('价格不能为空');
    }
    if (empty($data['psort'])) {
      $this->error('排序不能为空');
    }

    $pictureurls_arr  = array();
    $imgPostUrls = isset($data['pictureurls']) ? $data['pictureurls'] : '';
    if (is_array($imgPostUrls)) {
      foreach ($imgPostUrls as $k => $v) {
        $pictureurls_arr[] = $v.'$$$'.'$$$';//array('url'=> $v ,'alt'=> '');
        if ($k == 0) {
          if( C('CFG_PRODUCT_USE') == "1" )
          {
            $imgtbSize = explode(',', C('CFG_PRODUCT_THUMB'));//配置缩略图第一个参数
            $pic = get_picture($v,$imgtbSize[0],$imgtbSize[1]);
          }
          else
            $pic = $v;
        }
      }
    }
    $data['pictureurls'] = join('|||',$pictureurls_arr);
    $data['litpic'] = isset($pic) ? $pic : '';
    if($id = M('xcxliping')->add($data)) {
      $this->success('添加成功',U('xcxliping/index', array('pid' => $pid)));
    }else {
      $this->error('添加失败');
    }
  }

  //编辑
  public function edit() {
    //当前控制器名称
    $id = I('id', 0, 'intval');
    $actionName = strtolower(CONTROLLER_NAME);

    if (IS_POST) {
      $this->editPost();
      exit();
    }

    $vo = M($actionName)->find($id);
    $pictureurls = array();
    if (!empty($vo['pictureurls'])) {
      $temparr = explode('|||', $vo['pictureurls']);
      foreach ($temparr as $key => $v) {
        $temparr2 = explode('$$$', $v);
        $pictureurls[] = array('url' => ''.$temparr2[0], 'alt' => ''.$temparr2[1]);
      }
    }

    $vo['pictureurls'] = $pictureurls;
    $vo['content'] = htmlspecialchars($vo['content']);
    $this->assign('vo', $vo);
    $this->assign('flagtypelist', get_item('flagtype'));//文档属性
    $this->display();
  }


  public function editPost() {

    $data = I('post.');
    $data['title'] = I('title', '', 'htmlspecialchars,rtrim');
    $data['description'] = I('description','','htmlspecialchars,rtrim');
    $data['content'] = I('content', '', '');
    $data['price'] = I('price','0','intval');
    $data['num'] = I('num','0','intval');
    $data['oldprice'] = I('oldprice','0','intval');
    $data['psort'] = I('psort','999','intval');
    $data['publishtime'] = I('publishtime', time(),'strtotime');
    $data['starttime'] = I('starttime', time(),'strtotime');
    $data['endtime'] = I('endtime', time(),'strtotime');
    $data['updatetime'] = time();

    if (empty($data['title'])) {
      $this->error('产品名称不能为空');
    }
    if (empty($data['description'])) {
      $this->error('描述不能为空');
    }
    if (empty($data['price'])) {
      $this->error('价格不能为空');
    }
    if (empty($data['psort'])) {
      $this->error('排序不能为空');
    }

    $pictureurls_arr  = array();
    $imgPostUrls = isset($data['pictureurls']) ? $data['pictureurls'] : '';

    if (is_array($imgPostUrls)) {
      foreach ($imgPostUrls as $k => $v) {
        $pictureurls_arr[] = $v.'$$$'.'$$$';//array('url'=> $v ,'alt'=> '');
        if ($k == 0) {
          if( C('CFG_PRODUCT_USE') == "1" )
          {
            $imgtbSize = explode(',', C('CFG_PRODUCT_THUMB'));//配置缩略图第一个参数
            $pic = get_picture($v,$imgtbSize[0],$imgtbSize[1]);
          }
          else
            $pic = $v;
        }
      }
    }

    $data['pictureurls'] = join('|||',$pictureurls_arr);
    $data['litpic'] = isset($pic) ? $pic : '';
    if (false !== M('xcxliping')->save($data)) {
      $this->success('修改成功', U('xcxliping/index'));
    }else {
      $this->error('修改失败');
    }
  }



  //回收站
  public function trach() {

    $where = array('del' => 1);
    $count = M('xcxliping')->where($where)->count();

    $page = new \Common\Lib\Page($count, 10);
    $page->rollPage = 7;
    $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $limit = $page->firstRow. ',' .$page->listRows;
    $art = M('xcxliping')->where($where)->order('psort ASC, id DESC')->limit($limit)->select();
    $pid = I('pid', 0, 'intval');

    $this->assign('pid', $pid);
    $this->assign('page', $page->show());
    $this->assign('vlist', $art);
    $this->assign('subcate', '');
    $this->assign('type', '产品回收站');
    $this->display('index');
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

    if (false !== M('xcxliping')->where(array('id' => $id))->setField('del', 1)) {

      //$this->success('删除成功', U('Product/index', array('pid' => $pid)));
      $this->redirect('xcxliping/index');

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

    if (false !== M('xcxliping')->where(array('id' => array('in', $idArr)))->setField('del', 1)) {

      //更新静态缓存
      $this->redirect('xcxliping/index');

    }else {
      $this->error('批量删除文失败');
    }
  }

  //还原
  public function restore() {

    $id = I('id',0 , 'intval');
    $batchFlag = I('get.batchFlag', 0, 'intval');
    //批量删除
    if ($batchFlag) {
      $this->restoreBatch();
      return;
    }

    $pid = I('get.pid', 0, 'intval');

    if (false !== M('xcxliping')->where(array('id' => $id))->setField('del', 0)) {

      //$this->success('还原成功', U('Product/trach', array('pid' => $pid)));
      $this->redirect('xcxliping/trach');

    }else {
      $this->error('还原失败');
    }
  }

  //批量还原
  public function restoreBatch() {

    $idArr = I('key',0 , 'intval');
    $pid = I('get.pid', 0, 'intval');
    if (!is_array($idArr)) {
      $this->error('请选择要还原的项');
    }

    if (false !== M('xcxliping')->where(array('id' => array('in', $idArr)))->setField('del', 0)) {

      //$this->success('还原成功', U('Product/trach', array('pid' => $pid)));
      $this->redirect('xcxliping/trach');

    }else {
      $this->error('还原失败');
    }
  }

  //彻底删除
  public function clear() {

    $id = I('id',0 , 'intval');
    $batchFlag = I('get.batchFlag', 0, 'intval');
    //批量删除
    if ($batchFlag) {
      $this->clearBatch();
      return;
    }

    if (M('xcxliping')->delete($id)) {
      // delete picture index
      $this->success('彻底删除成功', U('xcxliping/trach'));
    }else {
      $this->error('彻底删除失败');
    }
  }


  //批量彻底删除
  public function clearBatch() {

    $idArr = I('key',0 , 'intval');
    $pid = I('get.pid', 0, 'intval');
    if (!is_array($idArr)) {
      $this->error('请选择要彻底删除的项');
    }
    $where = array('id' => array('in', $idArr));

    if (M('xcxliping')->where($where)->delete()) {
      // delete picture index
      $this->success('彻底删除成功', U('xcxliping/trach'));
    }else {
      $this->error('彻底删除失败');
    }
  }

  //更新排序
  public function psort(){
      $psort = I('post.psort','', 'intval');
      $id = I('post.id','', 'intval');
      $data['psort'] = $psort;
      $psorts=M('product')->where("id=$id")->data($data)->save();
      echo "$psorts";
  }
}

 ?>
