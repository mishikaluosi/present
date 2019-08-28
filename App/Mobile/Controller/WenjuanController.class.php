<?php
namespace Mobile\Controller;

class WenjuanController extends MobileCommonController{

    public function index(){
        $this->_wenjuan_data();
        $this->display();
    }

    public function style() {
        $this->_wenjuan_data(true);
        $this->display();
    }

    public function view() {
        //用户答案
        $aid=I('aid',null,'intval');
        if(is_numeric($aid) && $aid>0){
            $answer=M('wenjuan_answer')->find($aid);
            $qa_list=unserialize($answer['answer']);
            $id=$answer['wenjuan_id'];
        }

        $uid=$answer['user_id'];
        $info=M('member')->where(array('id'=>$uid))->find();
        $this->assign('uid',$uid);
        $this->assign('info',$info);

        if(is_numeric($id) && $id>0){
            $wenjuan=M('wenjuan')->find($id);
            $info_list=M('wenjuan_question')->where(array('wenjuan_id'=>$id))->order('sort asc,id asc')->select();
            foreach ($info_list as $k=>$v){
                $info_list[$k]=$v;
                $info_list[$k]['type']=M('question_type')->find($v['q_type']);
            }
        }

        if(empty($wenjuan)){
            $this->_error('问卷不存在',U('/'));
        }
        $this->assign('wenjuan',$wenjuan);
        $this->assign('info_list',$info_list);

        $this->_get_qtype();

        $this->assign('answer',$answer);
        $this->assign('qa_list',$qa_list);

        $this->display();
    }

    private function _wenjuan_data($clear_flag=false){
        $uid=I('uid',null);
        $info=M('member')->where(array('id'=>$uid))->find();
        $this->assign('uid',$uid);
        $this->assign('info',$info);

        //$id=I('id',null,'intval');
        $where='status=1';
        $where.=" and prov='".$info['prov']."' ";
        $where.=" and city='".$info['city']."' ";
        $where.=" and area='".$info['area']."' ";
        $wenjuan=M('wenjuan')->where($where)->order('id desc')->find();
        if(empty($wenjuan)){
            $this->_error('问卷不存在',U('/'));
        }
        $id=$wenjuan['id'];
        $info_list=M('wenjuan_question')->where(array('wenjuan_id'=>$id))->order('sort asc,id asc')->select();
        foreach ($info_list as $k=>$v){
            $info_list[$k]=$v;
            $info_list[$k]['type']=M('question_type')->find($v['q_type']);
        }
        if(empty($info_list)){
            $this->_error('该问卷没有问题',U('/'));
        }else{
            $this->assign('qa_cnt',count($info_list));
        }

        if($wenjuan['status']!=1){
            $this->_error('该问卷已经关闭1',U('/'));
        }

        if(!empty($wenjuan['etime']) && strtotime(date('Y-m-d 23:59:59',$wenjuan['etime']))<time()){
            $this->_error('该问卷已经关闭2',U('/'));
        }

        if(!empty($wenjuan['stime']) && $wenjuan['stime']>time()){
            $this->_error('该问卷还没有开启',U('/'));
        }

        if($clear_flag){
            $wenjuan['name_style']=null;
            $wenjuan['title_style']=null;
            $wenjuan['one_title_style']=null;
            $wenjuan['two_title_style']=null;
            $wenjuan['answer_style']=null;
        }

        $this->assign('wenjuan',$wenjuan);
        $this->assign('info_list',$info_list);

        $this->_get_qtype();
    }

    private function _get_qtype(){
        $list=M('question_type')->order('id asc ')->select();
        $this->assign('qtype_list',$list);
    }

    public function save(){
        //$data=I('post.');
        //var_dump($data);exit();

        $answer['uname']=I('uname',null);
        $answer['dep']=I('dep',null);
        $answer['address']=I('address',null);
        $phone=$answer['phone']=I('phone',null);
        $answer['txt1']=I('txt1',null);
        $answer['txt2']=I('txt2',null);
        $answer['txt3']=I('txt3',null);
        $answer['txt4']=I('txt4',null);
        $answer['txt5']=I('txt5',null);
        $answer['txt6']=I('txt6',null);
        $uid=$answer['user_id']=I('user_id',null);
        $wenjuan_id=$answer['wenjuan_id']=I('wenjuan_id',null);
        $redirect = U('Wenjuan/index',array('uid'=>$uid));

        $answer['khname1']=I('khname1',null);
        $answer['khtel1']=I('khtel1',null);
        $answer['khname2']=I('khname2',null);
        $answer['khtel2']=I('khtel2',null);
        $answer['khname3']=I('khname3',null);
        $answer['khtel3']=I('khtel3',null);

        //验证问卷
        $wenjuan=M('wenjuan')->find($wenjuan_id);
        if(empty($wenjuan)){
            $this->error('问卷不存在',$redirect);
        }else{
            if($wenjuan['status']!=1){
                $this->error('该问卷已经关闭1',$redirect);
            }
            if(!empty($wenjuan['etime']) && strtotime(date('Y-m-d 23:59:59',$wenjuan['etime']))<time()){
                $this->error('该问卷已经关闭2',$redirect);
            }
            if(!empty($wenjuan['stime']) && $wenjuan['stime']>time()){
                $this->error('该问卷还没有开启',$redirect);
            }
        }

        //验证基础字段
        if(empty($answer['uname'])){
            $this->error('姓名不得为空');
        }
        if(empty($phone)){
            $this->error('号码不得为空');
        }
        $uinfo=M('member')->find($uid);
        if(empty($uinfo)){
            $this->error('邀请人不得为空');
        }else{
            $answer['user_name']=$uinfo['name'];
            $answer['zc_id']=$uinfo['zc_id'];
            $tmp_zc=M('zc')->where(array('id'=>$uinfo['zc_id']))->find();
            if($tmp_zc){
                $answer['zc']=$tmp_zc['name'];
                $answer['prov']=$tmp_zc['prov'];
                $answer['city']=$tmp_zc['city'];
                $answer['area']=$tmp_zc['area'];
            }
        }
        $chk=M('wenjuan_answer')->where(array('phone'=>$phone,'user_id'=>$uid,"wenjuan_id"=>$wenjuan_id))->find();
        if($chk){
            $this->error('你已经回答过该问卷，请勿重复作答');
        }

        $qa_cnt=I('qa_cnt',null);
        $qustion_qa=I('qa',null);
        if(empty($qustion_qa)){
            $this->error('请先完成问题再提交1');
        }else{
            if(!is_array($qustion_qa)){
                $this->error('请先完成问题再提交2');
            }
            //判断问题
            $qa_index=1;
            $err_qa=array();
            foreach ($qustion_qa as $k=>$v){
                if(empty($v)){
                    $err_qa[]=$k;
                }
                $qa_index++;
            }
            if(!empty($err_qa)){
                $err_qa=implode(',',$err_qa);
                $this->error("你还有题目没有做答{$err_qa}");
            }
        }

        $answer['answer']=serialize($qustion_qa);
        $answer['addtime']=time();
        $flag=M('wenjuan_answer')->add($answer);

        if($flag) {
            $this->success('添加成功',$redirect);
        }else {
            $this->error('添加失败',$redirect);
        }

    }

    private function _error($msg,$url){
        header("Content-Type: text/html; charset=utf-8");
        echo $msg;
        exit();
    }

    public function event(){
        $id=I('id',null,'intval');

        if(is_numeric($id) && $id>0){
            $event=M('event')->find($id);

        }
        if(empty($event)){
            $this->_error('活动不存在',U('/'));
        }

        if($event['status']!=1){
            $this->_error('活动已经关闭1',U('/'));
        }

        if(!empty($event['etime']) && strtotime(date('Y-m-d 23:59:59',$event['etime']))<time()){
            $this->_error('活动已经关闭2',U('/'));
        }

        if(!empty($event['stime']) && $event['stime']>time()){
            $this->_error('活动还没有开启',U('/'));
        }

        $uid=I('uid',null);
        $info=M('member')->where(array('id'=>$uid))->find();
        $this->assign('uid',$uid);
        $this->assign('info',$info);

        $this->assign('vo',$event);
        $this->display();

    }

    public function save_event(){
        $answer['username']=I('username',null);
        $answer['yq_username']=I('yq_username',null);
        $phone=$answer['phone']=I('phone',null);

        $yq_phone=trim(I('yq_tel',null));

        $event_id=$answer['event_id']=I('event_id',null);
        $redirect = U('Wenjuan/event',array('id'=>$event_id));

        //验证问卷
        $wenjuan=M('event')->find($event_id);
        if(empty($wenjuan)){
            $this->error('活动不存在',$redirect);
        }else{
            if($wenjuan['status']!=1){
                $this->error('该活动已经关闭1',$redirect);
            }
            if(!empty($wenjuan['etime']) && strtotime(date('Y-m-d 23:59:59',$wenjuan['etime']))<time()){
                $this->error('该活动已经关闭2',$redirect);
            }
            if(!empty($wenjuan['stime']) && $wenjuan['stime']>time()){
                $this->error('该活动还没有开启',$redirect);
            }
        }

        //验证基础字段
        if(empty($answer['username'])){
            $this->error('姓名不得为空');
        }
        if(empty($phone)){
            $this->error('号码不得为空');
        }
        if(empty($yq_phone)){
            $uinfo=M('member')->where(array('name'=>$answer['yq_username']))->select();
            if(count($uinfo)>1){
                $this->error('邀约人同名，请填写邀约人手机号');
            }else if(!empty($uinfo)){
                $uinfo=$uinfo[0];
            }
        }else{
            $uinfo=M('member')->where(array('name'=>$answer['yq_username'],'phone'=>$yq_phone))->find();
        }

        if(empty($uinfo)){
            $this->error('邀请人不存在，请重新填写邀约人');
        }else{
            //$answer['user_name']=$uinfo['name'];
            $answer['yq_userid']=$uinfo['id'];
            $answer['zc_id']=$uinfo['zc_id'];
            $tmp_zc=M('zc')->where(array('id'=>$uinfo['zc_id']))->find();
            if($tmp_zc){
                $answer['zc_name']=$tmp_zc['name'];
                $answer['prov']=$tmp_zc['prov'];
                $answer['city']=$tmp_zc['city'];
                $answer['area']=$tmp_zc['area'];
            }
        }
        $chk=M('event_info')->where(array('phone'=>$phone,"event_id"=>$event_id))->find();
        if($chk){
            $this->error('你已经参与过该活动了');
        }

        $answer['addtime']=time();
        $flag=M('event_info')->add($answer);
        if($flag) {
            $this->success('添加成功',$redirect);
        }else {
            $this->error('添加失败',$redirect);
        }
    }
}

?>