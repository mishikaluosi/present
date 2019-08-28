<?php
namespace Home\Controller;

class RegisterController extends HomeCommonController {
	
	public function index() {
					
		//分页
		$count = M('register')->count();

		$page = new \Common\Lib\Page($count, 10);		
		$page->rollPage = 3;
		$page->setConfig('theme',' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow. ',' .$page->listRows;
		$list = M('register')->order('id DESC')->limit($limit)->select();

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('title', '注册');
		$this->display();
	}
	//添加

	public function add() {

		if (!IS_POST) {
			exit();
		}
		$content = I('content', '');
		$data =  I('post.');		
		$verify = I('vcode','','htmlspecialchars,trim');
		

		if (empty($data['name'])) {
			$this->error('姓名不能为空!');
		}
		if (empty($data['email'])) {
			$this->error('邮箱不能为空!');
		}
		if (empty($data['country'])) {
			$this->error('国家不能为空！');
		}
		
		if(!preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",$data['email'] )){
			$this->error('邮箱格式错误!');
		}
	
		

		$data['posttime'] = time();
		$data['ip'] = get_client_ip();
	
		$db = M('register');

		if($id = $db->add($data)) {
			$this->success('添加成功');
		}else {
			$this->error('添加失败');
		}
	}

	

}



?>