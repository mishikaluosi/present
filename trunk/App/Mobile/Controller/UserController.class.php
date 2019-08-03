<?php
namespace Mobile\Controller;

class UserController extends MobileCommonController{

    public function  index(){
        if(empty($_SESSION['U']['openid'])){
            // 微信域名id
            $this->web_oauth_login();
        }
        $user_id=$this->_xzl_uid;
        $info=M('member')->find($user_id);
        $zc=M('zc')->where(array('id'=>$this->_xzl_zcid))->find();

        //统计订单数量
        $tongji['wpay'] = pe_num('order', array('user_id'=>$user_id, 'order_state'=>'wpay'));
        $tongji['wget'] =pe_num('order', array('user_id'=>$user_id, 'order_state'=>'wget'));
        $tongji['success'] =pe_num('order', array('user_id'=>$user_id, 'order_state'=>'success'));

        //订单统计
        //order_state="success" and
        $order_where='user_id='.$user_id.' and order_atime>=%1$s and order_atime<=%2$s';
        $order['today']=pe_num('order',sprintf($order_where,strtotime(date("Y-m-d 00:00:00")),strtotime(date("Y-m-d 23:59:59"))));
        $order['month']=pe_num('order',sprintf($order_where,strtotime(date("Y-m-01 00:00:00")),strtotime(date("Y-m-31 23:59:59"))));
        $order['year']=pe_num('order',sprintf($order_where,strtotime(date("Y-01-01 00:00:00")),strtotime(date("Y-12-31 23:59:59"))));

        $orderby='addtime desc,id desc';
        $where=' 1=1 and status=1';
        $where.=' and (stime<='.strtotime(date("Y-m-d 00:00:00")).' or stime is null or stime="")';
        $where.=' and (etime>='.strtotime(date("Y-m-d 00:00:00")).' or etime is null or etime="")';
//        $where.=' and  zc_ids like "%$$$'.$_SESSION['user_zcid'].'%" ';
//        业务员加载活动 是否有职场限制（原因 活动分区域 不一定有职场）
        $velist=M('event')->where($where)->order($orderby)->limit(10)->select();
        $this->assign('velist',$velist);

        $this->assign('order',$order);
        $this->assign('info',$info);
        $this->assign('tongji',$tongji);
        $this->assign('zc',$zc);
        $this->display();
    }

    public function order(){
        $state=I('state',null);
        $user_id=$this->_xzl_uid;
        $sql_where='1=1';
        if (in_array($state, array('wpay', 'wget', 'success','close'))) {
            $sql_where .= " and `order_state` = '".pe_dbhold($state)."'";
        } elseif ($state == 'wpj') {//待评价
            $sql_where .= " and `order_state` = 'success' and `order_comment` = 0";
        }
        $sql_where .= " and `user_id` = '{$this->_xzl_uid}' ";
        $order_by="`order_id` desc";

        $count =M('order')->where($sql_where)->count();
        $page=I('page', 1,'intval');
        $page = new \Common\Lib\Spage($count,$page,10);
        $info_list = M('order')->where($sql_where)->order($order_by)->limit($page->limit)->select();

        foreach ($info_list as $k=>$v) {
            $info_list[$k]['product_list'] = M('orderdata')->where(array('order_id'=>$v['order_id']))->select();
        }
        //统计订单数量
        $tongji['wpay'] = pe_num('order', array('user_id'=>$user_id, 'order_state'=>'wpay'));
        $tongji['wsend'] =pe_num('order', array('user_id'=>$user_id, 'order_state'=>'wsend'));
        $tongji['success'] =pe_num('order', array('user_id'=>$user_id, 'order_state'=>'success'));

        $this->assign('page', $page->html);
        $this->assign('info_list',$info_list);
        $this->assign('tongji',$tongji);
        $this->assign('state',$state);
        $this->display();
    }

    protected function _frm_ret($result,$show){
        $return_arr=array('result'=>$result, 'show'=>$show);
        echo json_encode($return_arr);
        exit();
    }

    public function close(){
        $order_id = pe_dbhold(I('id',null));
        $user_id=$this->_xzl_uid;
        $info = M('order')->where(array('order_id'=>$order_id, 'user_id'=>$user_id))->find();
        $this->assign('order_id',$order_id);
        $this->assign('info',$info);
        $this->display();
    }

    public function apply(){
        $order_id = pe_dbhold(I('id',null));
        $user_id=$this->_xzl_uid;
        $info = M('order')->where(array('order_id'=>$order_id, 'user_id'=>$user_id))->find();
        $this->assign('order_id',$order_id);
        $this->assign('info',$info);
        $this->display();
    }

    public function orderapply(){
        $order_id = pe_dbhold(I('id',null));
        $order_closetext=pe_dbhold(I('order_closetext',null));
        $user_id=$this->_xzl_uid;
        $info = M('order')->where(array('order_id'=>$order_id, 'user_id'=>$user_id))->find();

        if (!$info['order_id']){
            $this->_frm_ret(false,'参数错误');
        }
        if ($info['order_state'] != 'wget') {
            $this->_frm_ret(false,'订单不可更改');
        }
        if (!$order_closetext){
            $this->_frm_ret(false,'请填写订单修改的内容');
        }
        $edit_text=empty($info['edit_text'])?"":$info['edit_text'];
        $jgf="|||";
        $t1_text="[".date("Y-m-d H:i:s")."] [用户申请内容：]".$order_closetext;
        $edit_text.=empty($edit_text)?$t1_text:$jgf.$t1_text;
        $sql_set['edit_flag'] = 1;
        $sql_set['edit_text'] = $edit_text;
        $flag=M('order')->where(array('order_id'=>$info['order_id']))->save(pe_dbhold($sql_set));

        if ($flag) {
            $this->_frm_ret(false,'操作成功');
        }
        if (!$info['order_id']) pe_error('参数错误', '', 'dialog');
    }

    public function orderclose(){
        $order_id = pe_dbhold(I('id',null));
        $order_closetext=pe_dbhold(I('order_closetext',null));
        $user_id=$this->_xzl_uid;
        $info = M('order')->where(array('order_id'=>$order_id, 'user_id'=>$user_id))->find();

        if (!$info['order_id']){
            $this->_frm_ret(false,'参数错误');
        }
        if ($info['order_state'] != 'wpay') {
            $this->_frm_ret(false,'订单不可取消');
        }
        if (!$order_closetext){
            $this->_frm_ret(false,'请填写取消原因');
        }
        if (order_callback_close($info, $order_closetext)) {
            $this->_frm_ret(false,'操作成功');
        }
        if (!$info['order_id']) pe_error('参数错误', '', 'dialog');
    }


    public function setting(){
        $this->display();
    }

    public function pwd_save(){
        $uid=$this->_xzl_uid;
        $oldpassword=I('user_oldpw',null);
        $password=I('user_pw',null);
        $rpassword=I('user_pw1',null);

        if (empty($oldpassword)) {
            $this->_frm_ret(false,'旧密码不得为空');
        }
        if (empty($password)) {
            $this->_frm_ret(false,'请填写新密码！');
        }
        if ($password != $rpassword) {
            $this->_frm_ret(false,'两次密码不一样，请重新填写！');
        }
        if (strlen($password) < 6 or strlen($password) > 20){
            $this->_frm_ret(false,'新密码为6-20位字符');
        }

        $user = M('member')->field(array('phone', 'password' ,'encrypt'))->where(array('id' => $uid))->find();
        if (!$user) {
            $this->error('错误的请求');
        }
        if($user['password'] != get_password($oldpassword, $user['encrypt'])){
            $this->_frm_ret(false,'旧密码错误');
        }
        $passwordinfo = get_password($password);
        $data = array(
            'id'		=> $uid,
            'password'		=> $passwordinfo['password'],
            'encrypt'		=> $passwordinfo['encrypt']
        );
        if (false !== M('member')->save($data)) {
            $this->_frm_ret(true,'修改密码成功');
        }else {
            $this->_frm_ret(false,'修改密码失败');
        }

    }

    public function zc(){
        $user_id=$this->_xzl_uid;
        $info=M('member')->find($user_id);
        $zc=M('zc')->where(array('id'=>$this->_xzl_zcid))->find();
        $this->assign('info',$info);
        $this->assign('zc',$zc);
        $this->display();
    }

    public function base(){
        $user_id=$this->_xzl_uid;
        $info=M('member')->find($user_id);
        $zc=M('zc')->where(array('id'=>$this->_xzl_zcid))->find();
        $this->assign('info',$info);
        $this->assign('zc',$zc);
        $this->display();
    }

    public function useraddr(){
        $info=useraddr_info($this->_xzl_zcid);
        echo json_encode(array('result'=>true, 'info'=>$info));
        exit();
    }
    public function customer(){
        $keywords = I("keywords");
        $user_id=$this->_xzl_uid;
        if($keywords){
            $where['uname'] = array('LIKE', "%{$keywords}%");
            $where['phone'] = array('LIKE', "%{$keywords}%");
            $where['khname1'] = array('LIKE', "%{$keywords}%");
            $where['khtel1'] = array('LIKE', "%{$keywords}%");
            $where['khname2'] = array('LIKE', "%{$keywords}%");
            $where['khtel2'] = array('LIKE', "%{$keywords}%");
            $where['khname3'] = array('LIKE', "%{$keywords}%");
            $where['khtel3'] = array('LIKE', "%{$keywords}%");
            $where['_logic'] = 'or';
            $map['_complex'] = $where;
        }
        $map['user_id'] = $user_id;
        $customer=M('wenjuan_answer')->where($map)->select();
        $this->assign('customer',$customer);
        $this->assign('keywords',$keywords);
        $this->display();
    }
}

?>
