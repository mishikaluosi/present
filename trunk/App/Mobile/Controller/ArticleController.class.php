<?php
namespace Mobile\Controller;

class ArticleController extends MobileCommonController{
	//方法：index
	public function index(){
        $cid = I('cid', C('_News_top_id'),'intval');
        $this->assign('cid', $cid);

        //栏目信息
        $cate=get_cate_byid($cid);
        $this->assign('cate', $cate);

        //栏目列表
        $ids = \Common\Lib\Category::getChildsId(get_category(),C('_News_top_id'), true);
        $cate_ids=implode(',',$ids);
        $cate_list=M('category')->where(' 1=1  and id in ('.$cate_ids.') and id !='.C('_News_top_id'))->order(get_sort('category'))->select();
        $this->assign('clist',$cate_list);

        if($cid==0||$cid==C('_News_top_id')) {
            $ids = implode(',',$ids);
        }else{
            $ids=$cid;
        }
        if(empty($cid)){
            $where=' 1=1 and article.status=0  ';
        }else{
            $where=' 1=1 and article.status=0  and article.cid in ('.$ids.')';
        }

        $count = D2('ArcView','article')->where($where)->count();
        $page=I('page', 1,'intval');
        $page = new \Common\Lib\Spage($count,$page,C('_News_pagesize'));
        $art = D2('ArcView','article')->nofield('content')->where($where)->order(get_sort('article',true))->limit($page->limit)->select();
        $this->assign('page', $page->html);
        $this->assign('vlist', $art);
        $this->assign('cid', $cid);
        $this->display();

	}

	public function detail(){
        $id = I('id', 0,'intval');
        $this->assign('id', $id);

        if(is_numeric($id)){
            $vo=M('article')->where('id='.$id)->find();
        }

        if($vo){
            $cate=get_cate_byid($vo['cid']);
            $this->assign('cate', $cate);

            //上一篇 下一篇
            $where=' 1=1 and status=0  and cid='.$vo['cid'];
            $next_where=$where.' and (asort>'.$vo['asort'].' or (asort='.$vo['asort'].' and id<'.$vo['id'].' ))';
            $prev_where=$where.' and (asort<'.$vo['asort'].' or (asort='.$vo['asort'].' and id>'.$vo['id'].' ))  ';
            $next=M('article')->where($next_where)->order(get_sort('article'))->find();
            $prev=M('article')->where($prev_where)->order('asort desc,id asc')->find();
            $next_n=array("url"=>"#",'title'=>'没有下一篇了');
            $prev_n=array("url"=>"#",'title'=>'没有上一篇了');
            if($next){
                $next_n['url']=U('news/detail',array('id'=>$next['id']));
                $next_n['title']=$next['title'];
            }
            if($prev){
                $prev_n['url']=U('news/detail',array('id'=>$prev['id']));
                $prev_n['title']=$prev['title'];
            }
            $this->assign('next_n', $next_n);
            $this->assign('prev_n', $prev_n);
        }
        $this->assign('vo', $vo);

        //栏目列表
        $ids = \Common\Lib\Category::getChildsId(get_category(),C('_News_top_id'), false);
        $cate_ids=implode(',',$ids);
        $cate_list=M('category')->where(' 1=1  and id in ('.$cate_ids.') ')->order(get_sort('category'))->select();
        $this->assign('clist',$cate_list);

        $this->display();
    }

    public function event_detail(){
        $id = I('id', 0,'intval');
        $this->assign('id', $id);

        if(is_numeric($id)){
            $vo=M('event')->find($id);
        }
        $this->assign('vo', $vo);
        $this->display();
    }

    public function event_qrcode(){
        $id=I('id',null);
        $vo=M('event')->find($id);
        if(empty($vo)){
            exit();
        }
        $url='http://xt.wxlyz.com/index.php/Mobile/Wenjuan/event/id/'.$id.'/uid/'.$this->_xzl_uid;
        //$url='功能开发中，敬请期待';
        $level=3;
        $size=4;
        Vendor('phpqrcode.phpqrcode');
        $errorCorrectionLevel =intval($level) ;//容错级别
        $matrixPointSize = intval($size);//生成图片大小
        $object = new \QRcode();
        ob_clean();
        $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
        exit();
    }
    //签到二维码
    public function check_qrcode(){
//        $id=I('id',null);
//        $vo=M('event')->find($id);
//        if(empty($vo)){
//            exit();
//        }
//        $url='http://xt.wxlyz.com/index.php/Mobile/Wenjuan/event/id/'.$id.'/uid/'.$this->_xzl_uid;
//        //$url='功能开发中，敬请期待';
//        $level=3;
//        $size=4;
//        Vendor('phpqrcode.phpqrcode');
//        $errorCorrectionLevel =intval($level) ;//容错级别
//        $matrixPointSize = intval($size);//生成图片大小
//        $object = new \QRcode();
//        ob_clean();
//        $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
//        exit();
        $e_id=I('id',null);
        if(!is_numeric($e_id)){
            echo '活动不能为空';
            exit();
        }
        $url= 'http://'.$_SERVER['HTTP_HOST'].U('Mobile/'.'Check/getWechat/',array('e_id'=>$e_id));
        $level=3;
        $size=4;
        Vendor('phpqrcode.phpqrcode');
        $errorCorrectionLevel =intval($level) ;//容错级别
        $matrixPointSize = intval($size);//生成图片大小
        $object = new \QRcode();
        ob_clean();
        $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
        exit();
    }
    public function checkList(){
        $e_id = I("e_id");
        $where['e_id'] = $e_id;
        //获取业务员id；
        $user_id=$this->_xzl_uid;
        $info=M('member')->find($user_id);
        $where['member_id'] = $info['id'];
        $event_user = M("event_user")->where($where)->select();
        $this->assign('event_user', $event_user);
        $this->display();
    }
    public function appointment(){
        $user_id = I("user_id");
        $appointment_money = I("appointment_money");
        $appointment_money_actual = I("appointment_money_actual");
        $data = [];
        if($appointment_money !=''){
            $data['appointment_money'] = $appointment_money;
        }
        if($appointment_money_actual !=''){
            $data['appointment_money_actual'] = $appointment_money_actual;
        }
        $data['is_appointment'] = 2;
        M("event_user")->where("id=".$user_id)->save($data);
        $this->returnSuccess();
    }
    public function appointmentList(){
        $e_id = I("e_id");
        $where['e_id'] = $e_id;
        //获取业务员id；
        $user_id=$this->_xzl_uid;
        $info=M('member')->find($user_id);
        $where['member_id'] = $info['id'];
        $appointment = M("appointment")->where($where)->select();
        $this->assign('e_id', $e_id);
        $this->assign('appointment', $appointment);
        $this->display();
    }
    public function deleteApp(){
	    $ids = I("ids");
	    if(!$ids){
            $this->returnError("无有效的id");
        }
        $where='id in ('.$ids.')';
        $ret = M("appointment")->where($where)->delete();
        if(!$ret){
            $this->returnError("批量删除失败");
        }
        $this->returnSuccess();
    }
    public function addApp(){
        $e_id = I("e_id");
        $this->assign('e_id', $e_id);
        $this->display();
    }
    public function saveApp(){
        $data =[];
        $data['e_id'] = I("get.e_id");
        $data['name'] = I("name");
        $data['phone'] = I("phone");
        $data['sex'] = I("sex");
        $data['room_num'] = I("room_num");
        //获取业务员id；
        $user_id=$this->_xzl_uid;
        $info=M('member')->find($user_id);
        $data['member_id'] = $info['id'];
        $data['adduser'] = $info['name'];
        $data['created_at'] = time();
        $ret =  M("appointment")->add($data);
        if(!$ret){
            $this->returnError("保存客户失败");
        }
        $this->returnSuccess();
    }
}

?>
