<?php
namespace Manage\Controller;
use Think\Controller;

class RegionController extends CommonController {
	
	public function index() {
        $pid = I('pid', 1,'intval');
        $type = I('type', 1,'intval');
        $arr=get_region_bypid($pid,$type);
        $this->assign('vlist',$arr);

		$this->display();
	}


    public function _frm_json($arr,$flag=null){
	    if(empty($flag)){
	        echo json_encode(array('code'=>0,'data'=>$arr));
	        exit();
        }
        if($flag==-1){
	        echo json_encode($arr);
	        exit();
        }
        echo json_encode(array('flag'=>$flag,'msg'=>$arr));
	    exit();
    }

	public function msg(){
        $id = I('id', 0,'intval');
        $pid = I('pid',0,'intval');
        if(IS_POST){
            $this->msg_save();
            exit();
        }
        $type_title='';
        if(is_numeric($id)){
            $vo= M('region')->where(array('region_id'=>$id))->find();
        }
        if($vo){
            $pid=$vo['parent_id'];
            $type_title='修改区域';
        }else{
            $type_title='添加区域';
        }
        $parent= M('region')->where(array('region_id'=>$pid))->find();
        $type_title.='<span style="color: red">['.$parent['region_name'].']</span>';
        $this->assign('type_title', $type_title);
        $this->assign('vlist',get_region_all(2));
        $this->assign('vo', $vo);
        $this->assign('pinfo',$parent);
        $this->display();
    }

    public function msg_save(){
        $parent_id=I('parent_id');
        $region_name=trim(I('region_name'));
        $region_id=I('region_id');
        $sort=I('sort');
        if(empty($sort)){
            $sort=1;
        }
        if(empty($parent_id)||empty($region_name)){
            $this->error('区域不得为空');
        }
        if($this->_chk($parent_id,$region_name)){
            $this->error($region_name.'已经存在，请更换区域名');
        }

        $parent= M('region')->where(array('region_id'=>$parent_id))->find();
        $data=array(
            'parent_id'=>$parent_id,
            'sort'=>$sort,
            'region_name'=>$region_name,
            'region_type'=>$parent['region_type']+1,
        );
        if(is_numeric($region_id)&&$region_id>1){//保存
            $flag=M('region')->where("region_id=".$region_id)->data($data)->save();
        }else{//添加
            $flag=M('region')->add($data);
        }

        if($flag){
            $this->redirect('Region/index', array('pid' => $parent_id,'type'=>$parent['region_type']+1));
        }else {
            $this->error('添加失败');
        }
    }

    public function sort(){
        $id = I('id',0, 'intval');
        $sort = I('sort',0, 'intval');
        $data = array(
            'sort' => $sort,
        );
        $data['sort'] = $sort;
        $sorts=M('region')->where("region_id=$id")->data($data)->save();
        echo "$sorts";
    }

    public function del(){
        $id = I('id',0 , 'intval');

        $child= M('region')->where(array('parent_id' => $id))->find();
        if($child) {
            $this->error('删除失败!请先删除子级内容!');
            exit();
        }

        if (M('region')->where('region_id='.$id)->delete()) {
            $this->success('删除成功', U('Region/index'));
        }else {
            $this->error('删除失败');
        }
    }

    public function _chk($pid,$name){
        if(!is_numeric($pid)){
            return null;
        }
        $where=array(
          'parent_id'=>$pid, 'region_name'=>$name,
        );
        $ret=M('region')->where($where)->find();
        if($ret){
            return true;
        }
        return false;
    }
}



?>