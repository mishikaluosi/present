<?php
namespace Home\Controller;

class ClearHtmlController extends HomeCommonController {
	
	public function all(){
		$this->buildHtml('index_index',HTML_PATH,'index:index');
		echo "成功生成:index_index.html";
	}
	
}


?>