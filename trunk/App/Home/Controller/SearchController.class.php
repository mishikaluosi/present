<?php
namespace Home\Controller;
use Common\Lib\Category;

class SearchController extends HomeCommonController{
	//方法：index
	public function index(){
		$cid = I('cid', 0,'intval');
		$keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
		$category = M("category") -> where('id = '.$cid) -> find();
		$modelid = $category["modelid"];//模型ID
		
		
		if (!empty($modelid)) {
			$tablename = M('model')->where(array('id' => $modelid))->getField('tablename');
		}
		
		
		if (empty($tablename)||$tablename=='page') {
			$tablename = "product";
		}
		

		//获取当前ID所包含的所有子类ID
		$ids = Category::getChildsId(get_category(),$cid, true);
		$ids = implode(',',$ids);
		
		if($keyword == '请输入关键词') $keyword = '';
		if (!empty($keyword) && !empty($tablename)) {

			$where = array('title' => array('LIKE', '%'.$keyword.'%'),'cid' => array('IN',$ids),'status' => 0);
			$count = D2('ArcView',$tablename)->where($where)->count();
			
			//设置显示的页数
			$thisPage = new \Common\Lib\Page($count, 10);		
			$thisPage->rollPage = 3;
			$thisPage->setConfig('theme',' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
			$limit = $thisPage->firstRow. ',' .$thisPage->listRows;	
			$page = $thisPage->show();

			$vlist = D2('ArcView',$tablename)->nofield('content')->where($where)->order('id desc')->limit($limit)->select();
		}else {
			$page = '';
			$vlist = array();
		}
		if (empty($vlist)) {
				$vlist = array();
			}
		foreach ($vlist as $k => $v) {
			if (isset($v['flag'])) {
				$_jumpflag = ($v['flag'] & B_JUMP) == B_JUMP? true : false;
				$_jumpurl = $v['jumpurl'];
			}else {
				$_jumpflag = false;
				$_jumpurl = '';
			}			
			$vlist[$k]['url'] = get_content_url($v['id'], $v['cid'], $v['ename'], $_jumpflag, $_jumpurl);
		}

		if (empty($keyword)) {
			$title = '搜索中心';	
		}else {			
			$title = $keyword.'_搜索中心';	
		}


		$this->assign('title', $title);
		$this->assign('keyword', $keyword);
		$this->assign('searchurl', U('Search/index'));
		$this->assign('vlist', $vlist);	
		$this->assign('page', $page);	
		$this->assign('modelid', $modelid);	
		$this->display();

	}


}

?>