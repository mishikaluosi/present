<?php
namespace Home\Controller;

class WenjuanController extends HomeCommonController{

    public function index(){
        $this->_wenjuan_data();

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

        if(is_numeric($id) && $id>0){
            $wenjuan=M('wenjuan')->find($id);
            $info_list=M('wenjuan_question')->where(array('wenjuan_id'=>$id))->order('sort asc,id asc')->select();
            foreach ($info_list as $k=>$v){
                $info_list[$k]=$v;
                $info_list[$k]['type']=M('question_type')->find($v['q_type']);
            }
        }

        if(empty($wenjuan)){
            $this->error('问卷不存在',U('/'));
        }
        $this->assign('wenjuan',$wenjuan);
        $this->assign('info_list',$info_list);

        $this->_get_qtype();

        $this->assign('answer',$answer);
        $this->assign('qa_list',$qa_list);

        $this->display();
    }

    private function _wenjuan_data($clear_flag=false){
        $id=I('id',null,'intval');

        if(is_numeric($id) && $id>0){
            $wenjuan=M('wenjuan')->find($id);
            $info_list=M('wenjuan_question')->where(array('wenjuan_id'=>$id))->order('sort asc,id asc')->select();
            foreach ($info_list as $k=>$v){
                $info_list[$k]=$v;
                $info_list[$k]['type']=M('question_type')->find($v['q_type']);
            }
        }

        if(empty($wenjuan)){
            $this->error('问卷不存在',U('/'));
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
        $phone=$answer['phone']=I('phone',null);
        $answer['txt1']=I('txt1',null);
        $answer['txt2']=I('txt2',null);
        $answer['txt3']=I('txt3',null);
        $answer['txt4']=I('txt4',null);
        $answer['txt5']=I('txt5',null);
        $answer['txt6']=I('txt6',null);
        $wenjuan_id=$answer['wenjuan_id']=I('wenjuan_id',null);

        //验证问卷
        $wenjuan=M('wenjuan')->find($wenjuan_id);
        if(empty($wenjuan)){
            $this->error('问卷不存在',U('/'));
        }else{
            if($wenjuan['status']!=1){
                $this->error('该问卷已经关闭1',U('/'));
            }
            if(!empty($wenjuan['etime']) && strtotime(date('Y-m-d 23:59:59',$wenjuan['etime']))<time()){
                $this->error('该问卷已经关闭2',U('/'));
            }
            if(!empty($wenjuan['stime']) && $wenjuan['stime']>time()){
                $this->error('该问卷还没有开启',U('/'));
            }
        }

        //验证基础字段
        if(empty($answer['uname'])){
            $this->error('姓名不得为空');
        }
        if(empty($phone)){
            $this->error('号码不得为空');
        }
        $chk=M('wenjuan_answer')->where(array('phone'=>$phone,"wenjuan_id"=>$wenjuan_id))->find();
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
        $redirect = U('Index/index');
        if($flag) {
            $this->success('添加成功',$redirect);
        }else {
            $this->error('添加失败',$redirect);
        }

    }
}

?>