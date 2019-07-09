<?php
namespace Manage\Controller;

class RegisterController extends CommonController {
	
	public function index() {

        $pid = I('pid', 0, 'intval');

        switch ($pid){
            case 201://我要优化
                $this->success('正在加载', U('Register/yh'));
                break;
            case 210://投诉建设
                $this->success('正在加载', U('Register/tousu'));
                break;
            case 211://我要投稿
                $this->success('正在加载', U('Register/tougao'));
                break;
            case 217://账户优化
                $this->success('正在加载', U('Register/account_yh'));
                break;
			case 224://信息流招聘
                $this->success('正在加载', U('Register/zp'));
                break;
            default://我要推广
                $this->success('正在加载', U('Register/tg'));
        }
	}

	public function view_img(){
        //当前控制器名称
        $id = I('id', 0, 'intval');

        $vo = M('other')->find($id);
        if($vo){
            if($vo['story']){
                $img_arr=explode("|||",$vo['story']);
                foreach($img_arr as $im){
                    $imgs[]=C('CFG_UPLOAD_ROOTPATH').'/'.$im;
                }
            }
        }
        $this->assign('imgs', $imgs);
        $this->assign('vo', $vo);
        $this->display();
    }
	
	public function zp(){
        $where=array('type'=>6);
        $count = M('other')->where($where)->count();

        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('other')->order('id DESC')->where($where)->limit($limit)->select();

        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
        $this->assign('img_path',C('CFG_UPLOAD_ROOTPATH').'/');
        $this->assign('type', '信息流招聘');
        $this->display();
    }

	public function account_yh(){
        $where=array('type'=>5);
        $count = M('other')->where($where)->count();

        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('other')->order('id DESC')->where($where)->limit($limit)->select();

        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
        $this->assign('img_path',C('CFG_UPLOAD_ROOTPATH').'/');
        $this->assign('type', '账户优化');
        $this->display();
    }

    public function tousu() {

        $where=array('type'=>3);
        $count = M('other')->where($where)->count();

        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('other')->order('id DESC')->where($where)->limit($limit)->select();

        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
        $this->assign('type', '投诉建议');
        $this->display();
    }

    public function tougao() {

        $where=array('type'=>4);
        $count = M('other')->where($where)->count();

        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('other')->order('id DESC')->where($where)->limit($limit)->select();

        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
        $this->assign('type', '客户故事投稿');
        $this->display();
    }

    public function yh() {

        $where=array('type'=>1);
        $count = M('other')->where($where)->count();

        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('other')->order('id DESC')->where($where)->limit($limit)->select();

        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
        $this->assign('type', '我要优化');
        $this->display();
    }

    public function tg() {

        $where=array('type'=>2);
        $count = M('other')->where($where)->count();

        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('other')->order('id DESC')->where($where)->limit($limit)->select();

        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
        $this->assign('type', '我要推广');
        $this->display();
    }

	//添加
	public function add() {
		//当前控制器名称		
		$actionName = strtolower(CONTROLLER_NAME);		
		if (IS_POST) {
			$this->addPost();
			exit();
		}
		$this->display();
	}

	//
	public function addPost() {

		//M验证
		$validate = array(
			array('name','require','姓名不能为空！'), 
			array('email','require','邮箱不能为空！'),
			array('email','email','邮箱格式错误！'),
			array('country','require','国家不能为空！'),
		);

		$auto = array ( 
			array('posttime','time',1,'function'), 
			array('ip','get_client_ip',1,'function') ,
		);

		$db = M('register');
		if (!$db->auto($auto)->validate($validate)->create()) {
			$this->error($db->getError());
		}


		if($id = $db->add()) {
			$this->success('添加成功',U('Register/index'));
		}else {
			$this->error('添加失败');
		}
	}
	
	
	//修改
	public function edit() {
		//当前控制器名称		
		$actionName = strtolower(CONTROLLER_NAME);	
		if (IS_POST) {
			$this->editPost();
			exit();
		}
		$id = I('id', 0, 'intval');
		$db = M('register');
		$register = $db->where(array('id'=>$id))->find();
		$this->assign('register',$register);
		$this->display();
	}
	
	//
	public function editPost() {
		
		$data = I('post.');
		//M验证
		$validate = array(
			array('name','require','姓名不能为空！'), 
			array('email','require','邮箱不能为空！'),
			array('email','email','邮箱格式错误！'),
			array('country','require','国家不能为空！'),
		);
		
		$db = M('register');	
		
		if (!$db->validate($validate)->create()) {
			$this->error($db->getError());
		}
			

		if(false != $db->save($data)) {
			$this->success('修改成功',U('Register/index'));
		}else {
			$this->error('修改失败');
		}
	}




	//彻底删除文章
	public function del() {

		$id = I('id',0 , 'intval');
		$batchFlag = I('get.batchFlag', 0, 'intval');
		//批量删除
		if ($batchFlag) {
			$this->delBatch();
			return;
		}
		
		if (M('register')->delete($id)) {
			$this->success('彻底删除成功', U('Register/index'));
		}else {
			$this->error('彻底删除失败');
		}
	}


	//批量彻底删除文章
	public function delBatch() {

		$idArr = I('key',0 , 'intval');		
		if (!is_array($idArr)) {
			$this->error('请选择要彻底删除的项');
		}
		$where = array('id' => array('in', $idArr));

		if (M('register')->where($where)->delete()) {
			$this->success('彻底删除成功', U('Register/index'));
		}else {
			$this->error('彻底删除失败');
		}
	}

    public function yh_del() {

        $id = I('id',0 , 'intval');
        $batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
        if ($batchFlag) {
            $this->other_delBatch(U('Register/yh'));
            return;
        }

        if (M('other')->delete($id)) {
            $this->success('彻底删除成功', U('Register/yh'));
        }else {
            $this->error('彻底删除失败');
        }
    }

    public function tougao_del() {

        $id = I('id',0 , 'intval');
        $batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
        if ($batchFlag) {
            $this->other_delBatch(U('Register/tougao'));
            return;
        }

        if (M('other')->delete($id)) {
            $this->success('彻底删除成功', U('Register/tougao'));
        }else {
            $this->error('彻底删除失败');
        }
    }

    public function tousu_del() {

        $id = I('id',0 , 'intval');
        $batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
        if ($batchFlag) {
            $this->other_delBatch(U('Register/tousu'));
            return;
        }

        if (M('other')->delete($id)) {
            $this->success('彻底删除成功', U('Register/tousu'));
        }else {
            $this->error('彻底删除失败');
        }
    }

    public function tg_del() {

        $id = I('id',0 , 'intval');
        $batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
        if ($batchFlag) {
            $this->other_delBatch(U('Register/tg'));
            return;
        }

        if (M('other')->delete($id)) {
            $this->success('彻底删除成功', U('Register/tg'));
        }else {
            $this->error('彻底删除失败');
        }
    }

    public function other_delBatch($url) {

        $idArr = I('key',0 , 'intval');
        if (!is_array($idArr)) {
            $this->error('请选择要彻底删除的项');
        }
        $where = array('id' => array('in', $idArr));

        if (M('other')->where($where)->delete()) {
            $this->success('彻底删除成功',$url);
        }else {
            $this->error('彻底删除失败');
        }
    }

}



?>