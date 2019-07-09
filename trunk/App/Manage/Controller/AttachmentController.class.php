<?php
namespace Manage\Controller;

class AttachmentController extends CommonController {
	
	public function index() {		
		$filesname = I('filesname',0 , 'intval');
		
		if($filesname==""){
		    $count = M('attachment')->count();
		}else{
		    $map['filepath'] = array('like','%'."$filesname".'%');
		    $count = M('attachment')->where($map)->count();
		}
		$page = new \Common\Lib\Page($count, 50);
		$page->rollPage = 7;
		$page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow. ',' .$page->listRows;
		if($filesname==""){
		    $list = M('attachment')->order('id DESC')->limit($limit)->select();
		}else{
		    $map['filepath'] = array('like','%'."$filesname".'%');
		    $list = M('attachment')->where($map)->order('id DESC')->limit($limit)->select();
		}
		
		if (!$list) {
			$list = array();
		}
		

		

        //获取文件夹的名字
	    $path_upload = C('CFG_UPLOAD_ROOTPATH')."img1/";
	    $filenames = array();
        if (is_dir($path_upload)) {
        if ($dh = opendir($path_upload)) {
        while (($file = readdir($dh)) !== false) {
               if($file=="."){
                   
               }elseif ($file==".."){
                   
               }else{
                   $filenames[]['name']=$file;
               }        
        }
        closedir($dh);
        }
        }
		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('filenames', $filenames);
		$this->assign('upload', get_url_path(get_cfg_value('CFG_UPLOAD_ROOTPATH')));
		$this->display();
	}
    //删除文件夹
    public function attahdel()
    {
        $filesname = I('post.filesname',0 , 'intval');
        $path_upload = C('CFG_UPLOAD_ROOTPATH')."img1/".$filesname;
        $map['filepath'] = array('like','%'."$filesname".'%');
        $count = M('attachment')->where($map)->count();
        if($count=='0'){
            $dh=opendir($path_upload);
            while ($file=readdir($dh)) {
                if($file!="." && $file!="..") {
                    $fullpath=$path_upload."/".$file;
                    if(!is_dir($fullpath)) {
                        unlink($fullpath);
                    } else {
                        deldir($fullpath);
                    }
                }
            }
            closedir($dh);
        if(rmdir($path_upload)) {
            echo  '1';
        } else {
            echo  '0';
        }
        }else{
            echo  '3';
        }
    }

	//彻底删除文章
	public function del() {

		$id = I('id',0 , 'intval');
		$vo = M('attachment')->find($id);
		if (empty($vo)) {
			$this->error('不存在');
		}
		
		$this->getdel($vo);
			
		if (M('attachment')->delete($id)) {			
			$this->success('删除成功', U('Attachment/index'));
		}else {
			$this->error('删除失败');
		}
	}
	
	
	public function delselect()
	{
		$str = I('selectid');
		$arr = explode(",",$str);
		foreach($arr as $key=>$value){
			$id = $arr[$key];
			if(!empty($id))
			{
				$vo = M('attachment')->find($id);
				if (empty($vo)) {
					$this->error('不存在');
				}
			}
			$this->getdel($vo);	
			M('attachment')->delete($id);
			
		}
		$this->success('删除成功', U('Attachment/index'));
		
	}
	
	
	
	//删除文件核心程序
	public function getdel($vo)
	{
		//$_SERVER['DOCUMENT_ROOT'];//有的虚拟主机不行		
		$path_upload = C('CFG_UPLOAD_ROOTPATH');
		// "/"开始,则转为绝对路径
		if (strpos($path_upload,"/") === 0) {
			$doc_path = str_ireplace(str_replace("\\","/",$_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_FILENAME']);
			$path_upload = $doc_path. $path_upload;
		}
		
		$list = glob($path_upload.$vo['filepath'].'*');
		
		if (!empty($list)) {
			foreach ($list as $v) {
				$ret = @unlink($v);
				if (!$ret) {
					$this->error('删除文件失败！文件：'.$v);
				}
			}
		}
	}
	







}



?>