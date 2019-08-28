<?php
namespace Mobile\Controller;

class RegisterController extends MobileCommonController {

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

    public function other_add(){
        if (!IS_POST) {
            exit();
        }
        $content = I('content', '');
        $data =  I('post.');

        if (empty($data['username'])) {
            $this->error('姓名不能为空!');
        }
        if (empty($data['tel'])) {
            $this->error('电话不能为空!');
        }
        if (empty($data['company'])) {
            //   $this->error('公司不能为空！');
        }

        $type=$data['type'];
        $data['posttime'] = time();
        $data['ip'] = get_client_ip();
        $db = M('other');

        if($id = $db->add($data)) {
            $this->success('提交成功');
        }else {
            $this->error('提交失败');
        }
    }

    public function upload() {
        header("Content-Type:text/html; charset=utf-8");//不然返回中文乱码

        //文件上传地址提交给他，并且上传完成之后返回一个信息，让其写入数据库
        if(empty($_FILES)){
            echo json_encode(array(
                'url' => '', 'name' => '',	'original' => '',
                'state' => '必须选择上传文件'
            ));
        }else{

            $upload = new \Think\Upload();//new Upload($config)
            //修配置项
            $upload->autoSub =true;//是否使用子目录保存图片
            $upload->subType = 'date';//子目录保存规则
            $upload->subName = array('date', 'Ymd');
            $upload->maxSize = get_upload_maxsize();//设置上传文件大小
            $upload->exts = explode(',', C('CFG_UPLOAD_IMG_EXT'));//设置上传文件类型
            $upload->rootPath = C('CFG_UPLOAD_ROOTPATH');//上传根路径
            $upload->savePath ='img1/';//上传（子）目录
            $upload->saveName = array('uniqid', '');//上传文件命名规则
            $upload->replace = true; //存在同名是否覆盖
            $upload->callback = false; //检测文件是否存在回调函数，如果存在返回文件信息数组

            if($info = $upload->upload()) {
                return $info;
            }else {
                return $upload->getError();
            }

        }
    }

    public function ajax_upload(){
        $typeArr = array("jpg",'jpeg', "png", "gif");//允许上传文件格式
        $path = C('CFG_UPLOAD_ROOTPATH').'/';//上传路径

        if (isset($_POST)) {
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $name_tmp = $_FILES['file']['tmp_name'];
            if (empty($name)) {
                echo json_encode(array("error"=>"您还未选择图片"));
                exit;
            }
            $type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型

            if (!in_array($type, $typeArr)) {
                echo json_encode(array("error"=>"清上传jpg,jpeg,png或gif类型的图片！"));
                exit;
            }
            if ($size > (5*1024 * 1024)) {
                echo json_encode(array("error"=>"图片大小已超过5M！"));
                exit;
            }

            $pic_name = time() .'_'.rand(10000, 99999) . "." . $type;//图片名称
            $pic_url = $path . $pic_name;//上传后图片路径+名称
            if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
                echo json_encode(array("error"=>"0","pic"=>$pic_url,"name"=>$pic_name));
            } else {
                echo json_encode(array("error"=>"上传有误，请检查服务器配置！"));
            }
        }
    }

    public function  other_add_img(){
        if (!IS_POST) {
            exit();
        }
        $data =  I('post.');

        if (empty($data['username'])) {
            $this->error('姓名不能为空!');
        }
        if (empty($data['tel'])) {
            $this->error('电话不能为空!');
        }

        if(!empty($data['upimg'])){
            foreach ($data['upimg'] as $imgurl){
                $newdata['story'][]=$imgurl;
            }
        }

        $newdata['story']=implode("|||",$newdata['story']);
        $newdata['username']=$data['username'];
        $newdata['tel']=$data['tel'];
        $newdata['remark']=$data['remark'];
        $newdata['type']=$data['type'];
        $newdata['posttime'] = time();
        $newdata['ip'] = get_client_ip();
        $db = M('other');

        if($id = $db->add($newdata)) {
            $this->success('提交成功');
        }else {
            $this->error('提交失败');
        }
    }


}



?>