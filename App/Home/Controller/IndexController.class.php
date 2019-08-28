<?php

namespace Home\Controller;

class IndexController extends HomeCommonController{
	//方法：index
	public function index(){

		$this->assign('title', C('CFG_WEBNAME'));
		$this->display();
	}
}

?>