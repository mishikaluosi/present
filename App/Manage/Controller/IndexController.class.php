<?php
namespace Manage\Controller;
use Common\Lib\Category;

class IndexController extends CommonController{
	
	public function index(){
		$menu = M('menu')->where(array('status' => 1))->order('sort,id')->select();
		if (empty($menu)) {
			$menu = array();
		}		
		$qmenu = M('menu')->where(array('status' => 1, 'quick' => 1))->order('sort,id')->select();
		if (empty($qmenu)) {
			$qmenu = array();
		}
		$menu_c = $qmenu_c = array();

		//权限，是否开启验证且不是超级管理员
		if (C('USER_AUTH_ON') && empty($_SESSION[C('ADMIN_AUTH_KEY')])) {
            if(C('USER_AUTH_TYPE')==2) {
                //加强验证和即时验证模式
                $accessList = \Org\Util\Rbac::getAccessList(session(C('USER_AUTH_KEY')));
            }else {
                $accessList = $_SESSION['_ACCESS_LIST'];
            }

            foreach ($menu as $k => $v) {
                //若无活动权限,不展示活动管理和抽奖管理
                if(isset($accessList['MANAGE']['EVENT_AUTH']['EVENT_AUTH_NONE'])){
                    if(strtoupper($v['module']) == 'EVENT' || strtoupper($v['module'] == 'Award')){
                        continue;
                    }
                }
                if (empty($v['module']) || empty($v['action'])) {
                    $menu_c[] = $v;
                } else if (isset($accessList[strtoupper(MODULE_NAME)][strtoupper($v['module'])][strtoupper($v['action'])])) {
                    $menu_c[] = $v;
                }
            }

            foreach ($qmenu as $k => $v) {
                //若无活动权限,不展示活动管理和抽奖管理
                if(isset($accessList['MANAGE']['EVENT_AUTH']['EVENT_AUTH_NONE'])){
                    if(strtoupper($v['module']) == 'EVENT' || strtoupper($v['module'] == 'Award')){
                        continue;
                    }
                }
                if (empty($v['module']) || empty($v['action'])) {
                    $qmenu_c[] = $v;
                } elseif (isset($accessList[strtoupper(MODULE_NAME)][strtoupper($v['module'])][strtoupper($v['action'])])) {
                    $qmenu_c[] = $v;
                }
            }
          
            
        }else{
            $menu_c = $menu;
            $qmenu_c = $qmenu;
			
		}
		
		$homecache = M('meta') -> where("name = 'HOME_HTML_CACHE_ON'") -> find();
		$mobilecache = M('meta') -> where("name = 'MOBILE_HTML_CACHE_ON'") -> find();
		if($homecache["value"] == 0 && $mobilecache["value"] == 0)
			$cache = "1";
		else
			$cache = "0";


		$this->assign('menu', Category::toLayer($menu_c));
		$this->assign('qmenu', $qmenu_c);
		$this->assign('cache', $cache);
		$this->display();
	}

	public function getParentCate(){
		header("Content-Type:text/html; charset=utf-8");//不然返回中文乱码
		$count = D('CategoryView')->where(array('pid' => 0))->count();
		$list = D('CategoryView')->nofield('content')->where(array('pid' => 0))->order('category.sort,category.id')->select();
		if (empty($list)) {
			$list = array();
		}

		//权限检测
		$checkflag = true;
		if (empty($_SESSION[C('ADMIN_AUTH_KEY')])) {
        	$checkaccess = M('categoryAccess')->distinct(true)->where(array('flag' => 1, 'roleid' => intval($_SESSION['yang_adm_roleid'])))->getField('catid', true);
                     
        }else {
        	$checkflag = false;
        }
		if(empty($checkaccess)) { 
			$checkaccess= array(); 
		}

		$menudoclist = array('count' => $count);
		//封装单维数组
		foreach ($list as $v) {
			if (!$checkflag || in_array($v['id'], $checkaccess) ) {				
				$menudoclist['list'][] = array(
					'id' => $v['id'],				
					'name' => $v['name'],		
					'url' => U(ucfirst($v['tablename']) .'/index', array('pid'=>$v['id'])),
				);	
			}
		}
		
		//封装二维数组
		foreach ($menudoclist["list"] as $key=>$v) {
			$id = $menudoclist["list"][$key]['id'];
			$child = D("CategoryView") -> where('pid = '.$id) -> select();
			foreach ($child as $v1) {
				$menudoclist['list'][$key]['child'][] = array(
					'id' => $v1['id'],	
					'name' => $v1['name'],		
					'url' => U(ucfirst($v1['tablename']) .'/index', array('pid'=>$v1['id'])),
				);
			}
		}
		
		//封装三维数组
		foreach ($menudoclist["list"] as $key=>$v) {
			$child = $menudoclist["list"][$key]['child'];
			if(!empty($child))
			{
				foreach ($child as $key1=>$v1) {
					$id = $menudoclist['list'][$key]['child'][$key1]["id"];
					$child1 = D("CategoryView") -> where('pid = '.$id) -> select();
					foreach ($child1 as $v2) {
						$menudoclist['list'][$key]['child'][$key1]['child'][] = array(
							'id' => $v2['id'],	
							'name' => $v2['name'],		
							'url' => U(ucfirst($v2['tablename']) .'/index', array('pid'=>$v2['id'])),
						);
					}
				}
			}
			
		}
		
		
		
		
		
		exit(json_encode($menudoclist));
	}


}


?>