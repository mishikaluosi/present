<?php
namespace Manage\Controller;
use Common\Lib\Category;

class XcxproductController extends CommonContentController
{
  static $types;

  public function __construct()
  {
    parent::__construct();
    $r = M('xcxproduct_cates')->where(array('del'=>0))->select();
    foreach ($r as $v) {
      $types[$v['id']] = $v['name'];
    }
    self::$types = $types;
  }

  private function checkType($type)
  {
    return in_array($type,self::$types);

  }

  public function index() {

    $pid = I('pid', 0, 'intval');//类型
    $keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
    $types = self::$types;
    $where = array('del'=>0);
    if(array_key_exists($pid,$types)){
      $where['type'] = $pid;
    }

    if (!empty($keyword)) {
      $where['title'] = array('LIKE', "%{$keyword}%");
    }

    $count = M('xcxproduct')->where($where)->count();
    $page = new \Common\Lib\Page($count, 10);
    $page->rollPage = 7;
    $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $limit = $page->firstRow. ',' .$page->listRows;
    $art = M('xcxproduct')->where($where)->order('psort ASC, publishtime DESC')->limit($limit)->select();
    $del_count = M('xcxproduct')->where(array('del'=>1))->count();
    $this->assign('delcount',$del_count);
    $this->assign('pid', $pid);
    $this->assign('keyword', $keyword);
    $this->assign('types', $types);
    $this->assign('page', $page->show());
    $this->assign('vlist', $art);
    $this->assign('type', '产品列表');
    $this->display();
  }
  //添加文章
  public function add() {
    //当前控制器名称
    if (IS_POST) {
      $this->addPost();
      exit();
    }

    $this->assign('types', self::$types);
    $this->display();
  }

  //
  public function addPost() {
    $data = I('post.');
    $data['type'] = I('type', '', 'intval');
    $data['title'] = I('title', '', 'htmlspecialchars,rtrim');
    $data['description'] = I('description','','htmlspecialchars,rtrim');
    $data['content'] = I('content', '', '');
    $data['price'] = I('price','0','float');
    $data['reicon'] = I('reicon','0','intval');
    $data['psort'] = I('psort','999','intval');
    $data['publishtime'] = I('publishtime', time(),'strtotime');
    $data['updatetime'] = time();
    if (empty($data['title'])) {
      $this->error('产品名称不能为空');
    }
    if (empty($data['description'])) {
      $this->error('产品摘要不能为空');
    }
    if (empty($data['price'])) {
      $this->error('价格不能为空');
    }
    if (empty($data['psort'])) {
      $this->error('排序不能为空');
    }
    if (!$data['type']) {
      $this->error('请选择类型');
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
    if($id = M('xcxproduct')->add($data)) {
      $this->success('添加成功',U('Xcxproduct/index', array('pid' => $pid)));
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
    $this->assign('types', self::$types);
    $this->assign('vo', $vo);
    $this->assign('flagtypelist', get_item('flagtype'));//文档属性
    $this->display();
  }


  public function editPost() {

    $data = I('post.');
    $data['type'] = I('type', '', 'intval');
    $data['title'] = I('title', '', 'htmlspecialchars,rtrim');
    $data['description'] = I('description','','htmlspecialchars,rtrim');
    $data['content'] = I('content', '', '');
    $data['price'] = I('price','0','float');
    $data['reicon'] = I('reicon','0','intval');
    $data['psort'] = I('psort','999','intval');
    $data['publishtime'] = I('publishtime', time(),'strtotime');
    $data['updatetime'] = time();

    if (empty($data['title'])) {
      $this->error('产品名称不能为空');
    }
    if (empty($data['description'])) {
      $this->error('产品摘要不能为空');
    }
    if (empty($data['price'])) {
      $this->error('价格不能为空');
    }
    if (empty($data['psort'])) {
      $this->error('排序不能为空');
    }
    if (!$data['type']) {
      $this->error('请选择类型');
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
    if (false !== M('xcxproduct')->save($data)) {
      $this->success('修改成功', U('xcxproduct/index'));
    }else {
      $this->error('修改失败');
    }
  }



  //回收站
  public function trach() {

    $where = array('del' => 1);
    $count = M('xcxproduct')->where($where)->count();

    $page = new \Common\Lib\Page($count, 10);
    $page->rollPage = 7;
    $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $limit = $page->firstRow. ',' .$page->listRows;
    $art = M('xcxproduct')->where($where)->order('psort ASC, id DESC')->limit($limit)->select();
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

    if (false !== M('xcxproduct')->where(array('id' => $id))->setField('del', 1)) {

      //$this->success('删除成功', U('Product/index', array('pid' => $pid)));
      $this->redirect('xcxproduct/index');

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

    if (false !== M('xcxproduct')->where(array('id' => array('in', $idArr)))->setField('del', 1)) {

      //更新静态缓存
      $this->redirect('xcxproduct/index');

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

    if (false !== M('xcxproduct')->where(array('id' => $id))->setField('del', 0)) {

      //$this->success('还原成功', U('Product/trach', array('pid' => $pid)));
      $this->redirect('xcxproduct/trach');

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

    if (false !== M('xcxproduct')->where(array('id' => array('in', $idArr)))->setField('del', 0)) {

      //$this->success('还原成功', U('Product/trach', array('pid' => $pid)));
      $this->redirect('xcxproduct/trach');

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

    if (M('xcxproduct')->delete($id)) {
      // delete picture index
      $this->success('彻底删除成功', U('xcxproduct/trach'));
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

    if (M('xcxproduct')->where($where)->delete()) {
      // delete picture index
      $this->success('彻底删除成功', U('xcxproduct/trach'));
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
