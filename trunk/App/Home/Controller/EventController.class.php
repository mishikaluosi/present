<?php
namespace Home\Controller;

class EventController extends HomeCommonController{
	//方法：index
	public function index(){
        $id=I('id',null,'intval');

        if(is_numeric($id) && $id>0){
            $event=M('event')->find($id);

        }
        if(empty($event)){
            $this->error('活动不存在',U('/'));
        }

        if($event['status']!=1){
            $this->error('活动已经关闭1',U('/'));
        }

        if(!empty($event['etime']) && strtotime(date('Y-m-d 23:59:59',$event['etime']))<time()){
            $this->error('活动已经关闭2',U('/'));
        }

        if(!empty($event['stime']) && $event['stime']>time()){
            $this->error('活动还没有开启',U('/'));
        }

        $url='http://xt.wxlyz.com/index.php/Mobile/Wenjuan/event/id/'.$id;
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

    public function cj(){
        $this->assign('title',"幸运大抽奖");
        $this->display();
    }

    /**
     * 获取可抽奖信息列表
     */
    public function phone_list(){
        $list=$this->_phone_list();
        if($list){
            $this->_frm_json(true,$list);
        }else{
            $this->_frm_json(false,'没有可抽奖的手机号码');
        }

    }

    private function _phone_list(){
        $qs=$this->_get_qs();
        $where=' phone is not null and phone!="" and phone!=" " and cj_name is NULL and qs="'.$qs.'" ';
        $list = M('reward')->where($where)->order('id asc')->field('phone')->select();
        $ret=null;
        foreach ($list as $k=>$v){
            $ret[]=$v['phone'];
        }
        return $ret;
    }

    /**
     * 获取可抽奖品
     */
    public function get_prize(){
        $info=$this->_get_prize();
        if($info){
            $this->_frm_json(true,$info);
        }else{
            $this->_frm_json(false,'奖品已经全部抽完');
        }
    }

    private function _get_prize(){
        $qs=$this->_get_qs();
        $where='cnt>0  and qs="'.$qs.'" ';
        $info = M('prize')->where($where)->order('sort asc')->field('name,cnt,img')->find();
        return $info;
    }

    /**
     * 已经中奖列表
     */
    public function zj_list(){
        $list=$this->_zj_list();
        if($list){
            $this->_frm_json(true,$list);
        }else{
            $this->_frm_json(false,'暂无中奖人员');
        }
    }

    private function _zj_list(){
        $qs=$this->_get_qs();
        $where=' phone is not null and phone!="" and phone!=" " and cj_name is not NULL and qs="'.$qs.'" ';
        $list = M('reward')->where($where)->order('cj_addtime desc')->field('phone,company,unick,uname,cj_name')->select();
        return $list;
    }

    /**
     * 中奖入库
     */
    public function zj(){

        $phone = I('phone', '');
        $prize = I('name', '');
        if (!IS_POST || empty($phone)||empty($prize)) {
            $this->_frm_json(false,'系统异常，请重新再抽1');
        }

        //查看奖品是否有效
        $qs=$this->_get_qs();
        $where='cnt>0  and qs="'.$qs.'" and name="'.trim($prize).'" ';
        $info = M('prize')->where($where)->order('sort asc')->field('id,name,cnt,img')->find();
        if(!$info){
            $this->_frm_json(false,'该奖品已经抽完，请更换一个奖品再抽');
        }

        //奖品-1
        $cnt=$info['cnt']-1;
        $flag=M('prize')->where("id=".$info['id'])->data(array('cnt'=>$cnt))->save();
        if($flag){
            //入库
            $phone_list=explode("****",$phone);
            $ok=M('reward')->where("phone like '".$phone_list[0]."%".$phone_list[1]."'")->data(array('cj_name'=>$prize,"cj_addtime"=>time()))->save();
            if($ok){
                $ret['phone_list']=$this->_phone_list();
                $ret['zj_list']=$this->_zj_list();
                $this->_frm_json(true,$ret);
            }else{
                $flag=M('prize')->where("id=".$info['id'])->data(array('cnt'=>$info['cnt']))->save();//手动回滚
                $this->_frm_json(false,'系统异常，请重新再抽3');
            }

        }else{
            $this->_frm_json(false,'系统异常，请重新再抽2');
        }
    }


    public function _frm_json($flag,$arr){
        $ret=array('flag'=>$flag,'info'=>$arr);
        echo json_encode($ret);
        exit();
    }

    public function _get_qs(){
        return '手机尾号抽奖活动';
    }


    /*******备选抽奖*******奖品库公用，抽奖池号码 中奖信息不公用***/
    public function bak(){
        $this->assign('title',"bak-cj-v3.0");
        $this->display();
    }

    public function bak_phone_list(){
        $list=$this->_bak_phone_list();
        if($list){
            $this->_frm_json(true,$list);
        }else{
            $this->_frm_json(false,'没有可抽奖的手机号码');
        }

    }

    private function _bak_phone_list(){
        $qs="抽奖备选";
        $where=' phone is not null and phone!="" and phone!=" " and cj_name is NULL and qs="'.$qs.'" ';
        $list = M('reward')->where($where)->order('id asc')->field('phone')->select();
        $ret=null;
        foreach ($list as $k=>$v){
            $ret[]=$v['phone'];
        }
        return $ret;
    }

    public function bak_get_prize(){
        $info=$this->_get_prize();
        if($info){
            $this->_frm_json(true,$info);
        }else{
            $this->_frm_json(false,'奖品已经全部抽完');
        }
    }

    public function bak_zj_list(){
        $list=$this->_bak_zj_list();
        if($list){
            $this->_frm_json(true,$list);
        }else{
            $this->_frm_json(false,'暂无中奖人员');
        }
    }

    private function _bak_zj_list(){
        $qs="抽奖备选";
        $where=' phone is not null and phone!="" and phone!=" " and cj_name is not NULL and qs="'.$qs.'" ';
        $list = M('reward')->where($where)->order('cj_addtime desc')->field('phone,company,unick,uname,cj_name')->select();
        return $list;
    }

    public function bak_zj(){

        $phone = I('phone', '');
        $prize = I('name', '');
        if (!IS_POST || empty($phone)||empty($prize)) {
            $this->_frm_json(false,'系统异常，请重新再抽1');
        }

        //查看奖品是否有效
        $qs=$this->_get_qs();
        $where='cnt>0  and qs="'.$qs.'" and name="'.trim($prize).'" ';
        $info = M('prize')->where($where)->order('sort asc')->field('id,name,cnt,img')->find();
        if(!$info){
            $this->_frm_json(false,'该奖品已经抽完，请更换一个奖品再抽');
        }

        //奖品-1
        $cnt=$info['cnt']-1;
        $flag=M('prize')->where("id=".$info['id'])->data(array('cnt'=>$cnt))->save();
        if($flag){
            //入库
            $phone_list=explode("****",$phone);
            $ok=M('reward')->where("phone like '".$phone_list[0]."%".$phone_list[1]."'")->data(array('cj_name'=>$prize,"cj_addtime"=>time()))->save();
            if($ok){
                $ret['phone_list']=$this->_bak_phone_list();
                $ret['zj_list']=$this->_bak_zj_list();
                $this->_frm_json(true,$ret);
            }else{
                $flag=M('prize')->where("id=".$info['id'])->data(array('cnt'=>$info['cnt']))->save();//手动回滚
                $this->_frm_json(false,'系统异常，请重新再抽3');
            }

        }else{
            $this->_frm_json(false,'系统异常，请重新再抽2');
        }
    }

    /*******备选抽奖 end **********/
}

?>