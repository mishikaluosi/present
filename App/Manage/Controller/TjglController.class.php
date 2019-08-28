<?php
namespace Manage\Controller;

class TjglController extends CommonController {

	//分类列表
	public function index() {

    $keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
		$amap = array('id' => array('gt', 0));
		if (!empty($keyword)) {
				$where['phone'] = array("like","%$keyword%");
				$where['name'] = array("like","%$keyword%");
				$where['_logic'] = 'or';
				$amap['_complex'] = $where;
		}

		$count = M('xcxtjyl')->where($amap)->count();

		$page = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow. ',' .$page->listRows;
		$list = M('xcxtjyl')->where($amap)->order('id desc')->limit($limit)->select();

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('keyword', $keyword);
		$this->assign('type', '推荐列表');
		$this->display();
	}

}




?>
