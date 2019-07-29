<?php
namespace Mobile\Controller;

class CheckController extends MobileCommonController{
    public function getWechat(){
        $e_id = I('e_id');
//        $member_id = I('member_id');
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
            $ret = $this->get_check_access_token($code,$e_id);
            if(!$ret){
                echo '签到失败,已大于最大报名人数';
                exit();
            }
        }
        $openid=$_SESSION['web_info']['openid'];
        if(empty($openid)){
            $this->check_oauth_login($e_id);
        }
        $pre = C('DB_PREFIX');
        $data= M('event_user')
            ->alias('eu')
            ->field('eu.*,bm.name as member')
            ->join("{$pre}member bm ON bm.id=eu.member_id","LEFT")
            ->where(array("eu.open_id"=>$openid,"eu.e_id"=>$e_id))
            ->find();
        if(!$data){
            $this->check_oauth_login($e_id);
        }
        $this->assign('e_id', $e_id);
        $this->assign('user', $data);
        if(empty($data['phone'])){
            $this->display('Event_info');
        }else{
            $this->display('Event_success');
        }
    }
    public function matchPhone(){
        $uid = I("uid");
        $e_id = I("e_id");
        $phone = I("phone");
        $apply = M("appointment")->where(array("e_id"=>$e_id,"phone"=>$phone))->find();
        if($apply){
            $data['phone'] = $apply['phone'];
            $data['member_id'] = $apply['member_id'];
            $data['sex'] = $apply['sex'];
            $data['username'] = $apply['name'];
            $data['apply_at'] =$apply['created_at'];
            M('event_user')->where(array('id'=>$uid))->save($data);
            $this->returnSuccess();
        }else{
            $this->returnError('未匹配到预约客户');
        }
    }
    public function subPhone(){
        $uid = I("uid");
        $phone = I("phone");
        $username = I("username");
        $member_name = trim(I("member"));
        $sex = I("sex");
        $member = M("member")->where(array("name"=>$member_name))->find();
        if($member){
            $member_id = $member['id'];
        }else{
            $member = M("member")->where(array('name'=>array('like','%'.$member_name.'%')))->find();
            if($member) {
                $member_id = $member['id'];
            }else{
                $member_id = 0;
                $this->returnError("业务员不存在");
            }
        }
        $data['phone'] = $phone;
        $data['member_id'] = $member_id;
        $data['sex'] = $sex;
        $data['username'] = $username;
        $data['apply_at'] =time();
        M('event_user')->where(array('id'=>$uid))->save($data);
        $this->returnSuccess();
    }

}
