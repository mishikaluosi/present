<?php
namespace Manage\Controller;
use Common\Lib\Category;

class CategoryController extends CommonController {
	
	//分类列表
	public function index() {

		//CategoryView 视图模型//$cate = get_category();
		$cate = D('CategoryView')->nofield('content')->order('category.sort,category.id')->select();		
		$cate = Category::toLevel($cate, '&nbsp;&nbsp;&nbsp;&nbsp;', 0);

		$this->assign('cate', $cate);
		$this->display();
	}

	//添加分类
	public function add() {

		
		
		if (IS_POST) {
			$this->addPost();
			exit();
		}
		$pid = I('pid', 0, 'intval');
		$cate = M('category')->order('sort')->select();
		$cate = Category::toLevel($cate, '---',0);
		
		/*if( $pid != 0)
		{
		//获取当前所要添加子类的父类模型
		$Scate = M('category')->where('id = '.$pid)->find();

		//获取当前模型的附属表
		$tablename = M('model')->where('id = '.$Scate["modelid"])->getField("tablename");
		//获取当前模型的默认模型
			$modelList = M('model')->where(array('status' => 1,'tablename'=>array('in',array($tablename,'page'))))->order('sort')->select();
		}
		else*/
			$modelList = M('model')->where(array('status' => 1))->order('sort')->select();
		$groupList = M('membergroup')->order('rank')->select();
		$roleList = M('role')->order('id')->select();//管理员组
		$styleListList = get_file_folder_List('./Public/Home/' .C('CFG_THEMESTYLE') , 2, 'List_*');
		$styleShowList = get_file_folder_List('./Public/Home/' .C('CFG_THEMESTYLE') , 2, 'Show_*');

		$this->assign('pid', $pid);
		$this->assign('cate', $cate);
		$this->assign('mlist', $modelList);
		$this->assign('groupList', $groupList);
		$this->assign('roleList', $roleList);
		$this->assign('styleListList', $styleListList);
		$this->assign('styleShowList', $styleShowList);
		$this->display();
	}

	//添加分类处理

	public function addPost() {

		
		$data = I('post.', '');
		$acc_groupid = I('acc_groupid', '');//会员组权限
		$acc_roleid = I('acc_roleid', '');//管理组权限

		
		$data['name'] = trim($data['name']);
		$data['ename'] = trim($data['ename']);		
		$data['type'] = empty($data['type'])? 0 : intval($data['type']);
		$pic = $data['catpic'] = I('catpic', '', 'htmlspecialchars,trim');

		/*if (isset($data['type']) && $data['type'] ==1 ) {
			$data['modelid'] = 0;
		}*/
		
		//M验证
		if (empty($data['name'])) {
			$this->error('栏目名称不能为空！');
		}


		if (empty($data['ename'])) {
			$data['ename'] = get_pinyin(iconv('utf-8','GBK//ignore',$data['name']),0,1,C('DEFAULT_LANG'));
		}elseif ($data['type'] == 0) {
			if (ctype_punct($data['ename'])) {
				$this->error('别名只能由字母和数字组成，不能包含特殊字符！');
			}
		}

		if ($id = M('category')->add($data)) {
			get_category(0,1);//清除栏目缓存
			get_category(1,1);//清除栏目缓存
			get_category(2,1);//清除栏目缓存
			$this->success('添加栏目成功<script type="text/javascript" language="javascript">window.parent.get_cate();</script>',U('Category/index'));
			$this->redirect('Category/index',array('parameter'=>I("parameter")));
		}else {
			$this->error('添加栏目失败');
		}
		
	}


	//修改分类
	public function edit() {

		if (IS_POST) {
			$this->editPost();
			exit();
		}
		$id = I('id', 0, 'intval');
		$data = M('category')->find($id);
		if (!$data) {
			$this->error('记录不存在');
		}

		$cate = M('category')->order('sort')->select();
		$cate = Category::toLevel($cate, '---',0);
		$tablename = M('model')->where(array('id' => $data["modelid"]))->getField("tablename");		
		$modelList = M('model')->where(array('status' => 1))->order('sort')->select();
		$groupList = M('membergroup')->order('rank')->select();
		$roleList = M('role')->order('id')->select();//管理员组
		$styleListList = get_file_folder_List('./Public/Home/' .C('CFG_THEMESTYLE') , 2, 'List_*');
		$styleShowList = get_file_folder_List('./Public/Home/' .C('CFG_THEMESTYLE') , 2, 'Show_*');

		$this->assign('data', $data);
		$this->assign('cate', $cate);
		$this->assign('mlist', $modelList);
		$this->assign('groupList', $groupList);
		$this->assign('roleList', $roleList);
		$this->assign('styleListList', $styleListList);
		$this->assign('styleShowList', $styleShowList);		
		$this->display();
	}



	//修改分类处理

	public function editPost() {

		$data = I('post.', '');		
		$id = $data['id'] = intval($data['id']);
		$pid = $data['pid'];		
		
		$acc_groupid = I('acc_groupid', '');//会员组权限
		$acc_roleid = I('acc_roleid', '');//管理组权限
		
		$data['name'] = trim($data['name']);
		$data['ename'] = trim($data['ename']);		
		$data['type'] = empty($data['type'])? 0 : intval($data['type']);
		$pic = $data['catpic'] = I('catpic', '', 'htmlspecialchars,trim');

		/*if (isset($data['type']) && $data['type'] ==1 ) {
			$data['modelid'] = 0;
		}*/

		if ($id == $pid) {
			$this->error('失败！不能设置自己为自己的子栏目，请重新选择父级栏目');
		}
		//M验证
		if (empty($data['name'])) {
			$this->error('栏目名称不能为空！');
		}

		if (empty($data['ename'])) {
			$data['ename'] = get_pinyin(iconv('utf-8','GBK//ignore',$data['name']),0,1,C('DEFAULT_LANG'));
		}elseif ($data['type'] == 0) {
			if (ctype_punct($data['ename'])) {
				$this->error('别名只能由字母和数字组成，不能包含特殊字符！');
			}
		}
	

		/*
		if (M('category')->where(array('name' => $data['name'], 'id' => array('neq' , $id)))->find()) {
			$this->error('栏目名称已经存在！');
		}
		*/

		

		if (false !== M('category')->save($data)) {

			$msg = '';
			//判断oldmodelid 与 modelid是否不变
			if ($data['oldmodelid'] != $data['modelid']) {
				$oldtablename = M('model')->where(array('id' => $data['oldmodelid']))->getField('tablename');
				$tablename = M('model')->where(array('id' => $data['modelid']))->getField('tablename');
				
				if (!empty($oldtablename) && $oldtablename != 'page' && $oldtablename!=$tablename && $tablename != 'page' ) {
					M($tablename)->where(array('cid' => $id))->delete();
					$msg = '!!!';
				}
			}
			get_category(0,1);//清除栏目缓存
			get_category(1,1);
			get_category(2,1);
			$this->success('修改栏目成功'. $msg .'<script type="text/javascript" language="javascript">window.parent.get_cate();</script>',U('Category/index'));
			$this->redirect('Category/index',array('parameter'=>I("parameter")));
		}else {
			$this->error('修改栏目失败');
		}
		
	}

	//更新排序
	public function sort() {
		$id = I('id',0, 'intval');
		$sort = I('sort',0, 'intval');
			$data = array(
					'sort' => $sort,
				);
	    $data['psort'] = $sort;
	    $sorts=M('category')->where("id=$id")->data($data)->save();
	    echo "$sorts";
	}


	//修改分类处理

	public function del() {
		$id = I('id', 0, 'intval');
		$category = M("category");
		$info = $category->where(array('id' => $id))->find();
		$model = M('model')->where(array('id' => $info["modelid"]))->find();
		
		
		
		$tablename = $model["tablename"];
		
		//优先删除当期分类下的内容
		$this->delcontent($info["id"],$tablename);
		
		//查询是否有子类
		$child = $category->where(array('pid' => $id))->getfield(id,true);
		if(!empty($child))
		{
			//删除子类的内容
			$this->delcontent($child,$tablename);
			$child = $category->where(array('pid' => array("in",$child)))->getfield(id,true);
			$this->delcontent($child,$tablename);
		}
		
		$this->redirect('Category/index',array('parameter'=>I("parameter")));
	}
	
	//根据ID 删除内容
	public function delcontent($ids,$tablename) {
		
		
		if(!empty($ids))
		{
			if(is_array($ids))
				$where["id"] = array("in",$ids);
			else
				$where["id"] = $ids;
			M("category")->where($where)->delete();
				
			if($tablename != "page")
				M($tablename)->where(array('cid' => array("in",$ids)))->delete();
		}
			
	}


}




?>