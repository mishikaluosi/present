<?php
namespace Mobile\Controller;

class GuestbookController extends MobileCommonController {
	
	public function index() {
					
		//分页
		$count = M('guestbook')->count();

		$page = new \Common\Lib\Page($count, 10);		
		$page->rollPage = 3;
		$page->setConfig('theme',' %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow. ',' .$page->listRows;
		$list = M('guestbook')->order('id DESC')->limit($limit)->select();

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('title', '留言本');
		$this->display();
	}
	//添加

	public function add() {

		if (!IS_POST) {
			exit();
		}
		$content = I('content', '');
		$data =  I('post.');

		if($data['fp_type']==1){//普通发票

        }else{//增值税发票

        }

        if (empty($data['username'])) {
            $this->error('发票抬头不能为空!');
        }

        if (empty($data['number'])) {
            $this->error('纳税人识别号不能为空!');
        }

        if (empty($data['email'])) {
            $this->error('电子邮箱不能为空!');
        }

		$data['posttime'] = time();
		$data['ip'] = get_client_ip();
	
		$db = M('guestbook');

		if($id = $db->add($data)) {
			$this->success('添加成功');
		}else {
			$this->error('添加失败');
		}
	}

	

}



?>