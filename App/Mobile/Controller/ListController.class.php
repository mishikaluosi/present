<?php
namespace Mobile\Controller;
use Common\Lib\Category;

class ListController extends MobileCommonController{

	public function index(){

		$cid = I('cid', 0,'intval');
		
		$ename = I('e', '', 'htmlspecialchars,trim');

		$cate = get_category(2);
		
		if (!empty($ename)) {//ename不为空
			$self = Category::getSelfByEName($cate, $ename);//当前栏目信息
		}else {//$cid来判断
			$self = Category::getSelf($cate, $cid);//当前栏目信息
		}

		
		
		if(empty($self)) {
			$this->error('栏目不存在');
		}
		
	
		$cid = $self['id'];//当使用ename获取的时候，就要重新给$cid赋值，不然0
		$_GET['cid'] = $cid;//栏目ID
		$self['url'] = get_url($self);

		//访问权限
		$groupid = intval(get_cookie('groupid'));
		$groupid = empty($groupid) ? 1 : $groupid;//1为游客
		//判断访问权限
		$access = M('categoryAccess')->where(array('catid' => $cid, 'flag' => 0 , 'action' => 'visit'))->getField('roleid', true);
		//权限存在，则判断
		if (!empty($access) && !in_array($groupid, $access)) {
			$this->error('您没有访问该信息的权限！');
		}
		
		//判断当前页面分类顶分类
		$this->GetTopSort();
		
		
		
		
		$this->assign('cate', $self);
		$this->assign('flag_son', Category::hasChild($cate, $cid));//是否包含子类
		$this->assign('title', empty($self['seotitle']) ? $self['name'] : $self['seotitle']);
		$this->assign('keywords', $self['keywords']);
		$this->assign('description', $self['description']);
		$this->assign('cid', $cid);
		
		// $patterns = array('/^List_/', '/'.C('TMPL_TEMPLATE_SUFFIX').'$/');
		$patterns = array('/'.C('TMPL_TEMPLATE_SUFFIX').'$/');
		$replacements = array('');
		$template_list = preg_replace($patterns, $replacements, $self['template_list']);
		
		
		if (empty($template_list)) {
			$this->error('模板不存在');
		}
		switch ($self['tablename']) {
			case 'Register':
				$this->display($template_list);
				return;
				break;
			case 'article':	
				$this->display($template_list);
				return;
				break;
			case 'product':
				$this->display($template_list);
				return;
				break;
			case 'picture':
				$this->display($template_list);
				return;
				break;	
			case 'soft':
				$this->display($template_list);
				return;
				break;
			case 'cases':
				$this->display($template_list);
				return;
				break;
			case 'page':
				{
					$cate = M('Category')->Field('content')->find($cid);
					$self['content'] = $cate['content'];
					$this->assign('cate', $self);
					$this->display($template_list);
				}
				return;
				break;	
			case 'phrase':
				$this->display($template_list);
				return;
				break;
			case 'guestbook':	
				$count = M('guestbook')->count();
				$page = new \Common\Lib\Page($count, 10);
				$page->rollPage = 7;
				$page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
				$limit = $page->firstRow. ',' .$page->listRows;
				$list = M('guestbook')->order('id DESC')->limit($limit)->select();

				$this->assign('page', $page->show());
				$this->assign('vlist', $list);
				$this->display($template_list);
				return;	
			default:
				//$this->error('参数错误');
				$userOther = A(ucfirst($self['tablename']));
				$userOther->lists();
				return;
				break;
		}
		
		$this->display();

	}

	public function map() {
		$this->assign('title', '网站地图');
		$this->assign('keywords', '网站地图');
		$this->assign('description', '网站地图');
		$this->display();
	}
	
	public function ArticleTemplate($cid,$template_list){
		//计算是否为顶部新闻列表
		$category = M("category");
		$res = $category -> where(" pid = 0 and id = ".$cid) ->find();		
		
		if(!empty($res))
		{
			//是否有两条以上之类
			$res1 = $category -> where(" pid = ".$cid) ->count();
			if( $res1 > 1 )
				return $template_list."1";
			else
				return $template_list;
		}
		else
			return $template_list;
	}
	
	
	//获取顶级分类
	public function GetTopSort($res = "")
	{
		
		if(!empty($res))
			$cid = $res; 
		else
			$cid = I('cid', 0,'intval');
		$res = M("category") -> where(" id = ".$cid) -> find();
		if($res["pid"] == 0 )
			$this->assign('sortinfo', $res);
		else
			$this->GetTopSort($res["pid"]);
	}

}

?>