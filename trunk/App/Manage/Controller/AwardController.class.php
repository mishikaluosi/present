<?php
namespace Manage\Controller;
use Think\Controller;

class AwardController extends CommonController
{
    public function index()
    {
        $this->_get_search();
        $this->display();
    }
    private function _get_search(){
        $name=I('name');
        $this->assign('name', $name);
        $where="1=1";
        if(!empty($name)){
            $where.=" and (name like '%{$name}%' or `desc` like '%{$name}%')";
        }
        $order='created_at desc,id desc';
        $count = M('award')->where($where)->count();
        $page = new \Common\Lib\Page($count, 18);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list =  M('award')->where($where)->order($order)->limit($limit)->select();
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
    }
    public function add()
    {
        $id = I('id', 0, 'intval');
        if(is_numeric($id) && $id>0){
            $vo = M('award')->find($id);
            $this->assign('title', '修改奖品');
        }else{
            $this->assign('title', '添加奖品');
        }
        $this->assign('vo', $vo);
        $this->display();
    }
    public function save(){
        $id = I('id');
        $wj['name'] = I('name');
        $wj['image'] = I('pic');
        $wj['desc'] = I('desc');
        if(is_numeric($id) && $id>0){
            $flag=M('award')->where(array('id'=>$id))->save($wj);
        }else{
            $wj['created_at']=time();
            $wj['adduser']=$_SESSION['yang_adm_username'];
            $flag=M('award')->add($wj);
        }
        if($flag){
            $this->redirect('Award/index');
        }else {
            $this->error('添加失败');
        }
    }
    public function del(){
        $id = I('id',0 , 'intval'); //批量删除
        if (false !== M('award')->where(array('id' => $id))->delete()) {
            $this->redirect('Award/index');
        }else {
            $this->error('删除失败');
        }
    }
    public function delBatch() {
        $idArr = I('key',0 , 'intval');
        if (!is_array($idArr)) {
            $this->error('请选择要删除的项');
        }

        if (false !== M('Award')->where(array('id' => array('in', $idArr)))->delete()) {
            $this->redirect('Award/index');
        }else {
            $this->error('批量删除失败');
        }
    }
}
