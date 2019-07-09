<?php
namespace Home\Controller;
use Think\Controller;

//公共验证控制器HomeCommonController
class HomeCommonController extends Controller {
	
	// 空操作，404页面
	public function _empty(){		
		header("HTTP/1.1 404 Not Found");  
		header("Status: 404 Not Found");
		$this->display(get_tpl('404.html'));
	}


    protected function _initialize(){
        if (C('CFG_WEBSITE_CLOSE') == 1) {
			exit_msg(C('CFG_WEBSITE_CLOSE_INFO'));
		}
		
		if(BIND_VIEW == "Mobile" && C("CFG_MOBILE_AUTO") == "1")
		{
			$param = array();
			//获取当前的域名
			$param = array("cid"=>$_GET["cid"],"id"=>$_GET["id"]);
			$url = BIND_VIEW."/".CONTROLLER_NAME."/".ACTION_NAME;
			if(BIND_VIEW == Mobile)
				header('Location:'.U($url,$param).'');
		}
		
		
		
    }

}


?>