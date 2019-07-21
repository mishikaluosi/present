<?php
namespace Mobile\Controller;

class CheckController extends MobileCommonController{
    public function getWechat(){
        $e_id = I('e_id');
        $member_id = I('member_id');
        if(!$e_id){
            echo '页面错误';
            exit();
        }
        $event = M('event')->where(['id'=>$e_id])->find();
        if(!$event){
            echo '活动不存在';
            exit();
        }
        $code = $_REQUEST['code'];
        if($code) {
            $ret = $this->get_check_access_token($code,$e_id,$member_id);
        }
        $openid=$_SESSION['web_info']['openid'];
        if(empty($openid)){
            $this->check_oauth_login($e_id);
        }
        $data= M('event_user')->where(array("open_id"=>$openid,"e_id"=>$e_id))->find();
        if(!$data){
            $this->check_oauth_login($e_id);
        }
        if(!$ret){
            echo '签到失败,已大于最大报名人数';
            exit();
        }
        if(empty($data['phone'])){
            echo '跳转到获取手机号页面';
//            $this->display();
        }else{
            echo '跳转到活动信息页';
//            $this->display();
        }
    }
}
