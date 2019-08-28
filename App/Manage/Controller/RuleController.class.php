<?php
namespace Manage\Controller;
use Common\Lib\Category;

class RuleController extends CommonContentController {
	
	public function index() {
        $order='`rule_id` desc';

        $where = '1=1';
        $count = M('rule')->where($where)->count();
        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $art = M('rule')->where($where)->order($order)->limit($limit)->select();
        $this->assign('page', $page->show());
        $this->assign('vlist', $art);

        $tongji['all'] = $count;
        $this->assign('tongji',$tongji);
        $this->display();
	}

	public function msg(){
        $id = I('id', 0,'intval');
        if(IS_POST){
            $this->msg_save();
            exit();
        }
        $type_title='';
        if(is_numeric($id)){
            $vo= M('rule')->where(array('rule_id'=>$id))->find();
            $info_list=get_rule_byid($id);
        }
        if($vo){
            $type_title='修改规格';
        }else{
            $type_title='添加规格';
        }

        $this->assign('type_title', $type_title);
        $this->assign('info_list', $info_list);
        $this->assign('info', $vo);
        $this->display();
    }

    public function msg_save(){
        $data=I('post.');
        $info=isset($data['info'])?$data['info']:null;
        $rule_id=isset($data['rule_id'])?$data['rule_id']:null;
        //$ids=isset($data['id'])?$data['id']:null;
        $names=isset($data['name'])?$data['name']:null;

        if(empty($info['rule_name'])){
            $this->error('名称不得为空');
        }
        if($this->_chk($info['rule_name'],$rule_id)){
            $this->error($info['rule_name'].'已经存在，请更换规格名');
        }
        if(empty($names)){
            $this->error('请添加规格选项');
        }

        if(is_numeric($rule_id)&&$rule_id>1){//保存
            $flag=M('rule')->where("rule_id=".$rule_id)->data($info)->save();
            M('ruledata')->where('rule_id='.$rule_id)->delete();
        }else{//添加
            $flag=M('rule')->add($info);
            $rule_id=$flag;
        }
        $infolist=array();
        $names=array_unique($names);
        foreach ($names as $k=>$v){
            if(!empty($v)){
                $infolist[]=array(
                    'ruledata_name'=>$v,
                    'sort'=>$k+1,
                    'rule_id'=>$rule_id
                );
            }
        }
        $flag=M('ruledata')->addAll($infolist);

        if($flag){
            $this->redirect('Rule/index');
        }else {
            $this->error('添加失败');
        }
    }

    public function del(){
        $id = I('id',0 , 'intval');
        if (M('rule')->where('rule_id='.$id)->delete()) {
            M('ruledata')->where('rule_id='.$id)->delete();
            $this->success('删除成功', U('Rule/index'));
        }else {
            $this->error('删除失败');
        }
    }

    public function _chk($name,$id){
        if(empty($name)){
            return null;
        }

        if(is_numeric($id)&&$id>0){
            $where='rule_id !='.$id.' and rule_name="'.$name.'"';
        }else{
            $where=array('rule_name'=>$name);
        }
        $ret=M('rule')->where($where)->find();
        if($ret){
            return true;
        }
        return false;
    }

}



?>