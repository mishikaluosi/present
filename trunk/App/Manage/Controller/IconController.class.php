<?php
namespace Manage\Controller;

class IconController extends CommonController {

	public function index() {

    $id = I('id', '', 'trim');//关键字
		// $keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
		$amap = array('member_id' => $id);
		// if (!empty($keyword)) {
		// 		$where['tip'] = array("like","%$keyword%");
		// 		$where['type'] = array("like","%$keyword%");
		// 		$where['_logic'] = 'or';
		// 		$amap['_complex'] = $where;
		// }

		$count = M('xcxiconrecord')->where($amap)->count();
		$page = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow. ',' .$page->listRows;
		$list = M('xcxiconrecord')->where($amap)->order('id desc')->limit($limit)->select();
    $this->assign('id',$id);
		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('keyword', $keyword);
		$this->assign('type', '百拓币记录');
		$this->display();
	}
	//添加
	public function add() {
		//当前控制器名称
    $id = I('id', '', 'trim');//关键字
		if (IS_POST) {
			$this->addPost();
			exit();
		}
    $this->assign('id',$id);
		$this->display();
	}

	//
	public function addPost() {
		//M验证
		$validate = array(
			array('type','require','类型必填'),
			array('num','require','数量必填'),
			array('time','require','时间必填'),
			array('tip','require','交易细节必填'),
		);

		$db = M('xcxiconrecord');
		if (!$db->validate($validate)->create()) {
			$this->error($db->getError());
		}

    $member_id = I('member_id');
    $num = I('num');
		$data = I('post.');
    $data['time'] = strtotime($data['time']);
		$data['action'] = 'user';
		if(I('type') == 'pay'){
			$member_info = M('member')->where(['id'=>$member_id])->find();
			if($member_info['icon']<$num){
				$this->error('扣除百拓币超出本身');
			}
		}
		if($db->add($data)) {
      //修改用户百拓币
      switch (I('type')) {
        case 'pay':
          M('member')->execute("update bestop_member set icon = icon - '$num' where id  = '$member_id'");
          break;
        default:
          M('member')->execute("update bestop_member set icon = icon + '$num' where id  = '$member_id'");
          break;
      }
			$this->success('添加成功',U('Icon/index',array('id' => $member_id), ''));
		}else {
			$this->error('添加失败');
		}
	}
}



?>
