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
        $where.=' and  zc_ids like "%$$$'.$_SESSION['user_zcid'].'%" ';
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
    public function orderTongji(){
        $zc_id = $this->_xzl_zcid;
        $type = 'area';
        $pre = C('DB_PREFIX');
        //获取搜索条件
        $zc_name =I("zc_name");
        $zc_area =I("zc_area");
        $start_date =I("start_date");
        $end_date =I("end_date");
        $this->assign('zc_name', $zc_name);
        $this->assign('zc_area', $zc_area);
        $this->assign('start_date', $start_date);
        $this->assign('end_date', $end_date);
        $where = "1=1";
        if($zc_name){
            $where .= " and zc.name like '%{$zc_name}%'";
        }
        if($zc_area){
            $where .= " and zc.area = '{$zc_area}'";
        }
        if($start_date){
            $start_date = strtotime($start_date.' 00:00:00');
            $where .= " and o.order_ftime >= '{$start_date}'";
        }
        if($end_date){
            $end_date = strtotime($end_date.' 23:59:59');
            $where .= " and o.order_ftime <= '{$end_date}'";
        }
        if($type=='area'){
            //获取当前用户职场所在支公司
            $zc = M('zc')->where(array('id'=>$zc_id))->find(array('area'));
            //获取当前支公司所有职场
            $zc_id_arr = M('zc')->field(array('id','name'))->where(array('area'=>$zc['area']))->select();
            $zc_array =array_unique(array_column($zc_id_arr,'name'));
            $this->assign('zc_array', $zc_array);
            $zc_ids = join(",",array_column($zc_id_arr,'id'));
        }else if($type=='city'){
            //获取当前用户职场所在支公司
            $zc = M('zc')->where(array('id'=>$zc_id))->find(array('city'));
            //获取当前支公司所有职场
            $zc_id_arr = M('zc')->field(array('id','name','area'))->where(array('city'=>$zc['city']))->select();
            $area_array =array_unique(array_column($zc_id_arr,'area'));
            $this->assign('area_array', $area_array);
            $zc_ids = join(",",array_column($zc_id_arr,'id'));
        }else{
            $zc_ids = $zc_id;
        }
        $where .= " and od.zc_id in($zc_ids)";
        $sql = "select od.zc_id, sum(product_num) as num ,sum(product_allmoney) as money,count(distinct o.user_id) as buy_num,
                zc.name as zc_name,zc.area as zc_area,zc.city as zc_city
                from {$pre}orderdata as od
                LEFT JOIN {$pre}order as o ON o.order_id=od.order_id
                LEFT JOIN {$pre}zc as zc ON zc.id=od.zc_id
                where  o.order_state='success' and {$where}
                group by od.zc_id
                order by order_stime desc";
        $vlist=M('order')->query($sql);
        foreach ($vlist as $k=>$v){
            $sql = "select od.product_id,od.product_name, sum(product_num) as num ,sum(product_allmoney) as money 
                    from {$pre}orderdata as od
                    LEFT JOIN {$pre}order as o
                    ON o.order_id=od.order_id
                    where  o.order_state='success' and o.zc_id={$v['zc_id']}
                    group by product_id
                    order by product_id DESC ";
            $cp=M('order')->query($sql);
            $vlist[$k]['cp_list']=$cp;
        }
        $this->assign('vlist',$vlist);
        $this->assign('type',$type);
        $this->display();
    }
    public function eventTongji(){
        $zc_id = $this->_xzl_zcid;
        $type = 'city';
        $pre = C('DB_PREFIX');
        //获取搜索条件
        $zc_name =I("zc_name");
        $zc_area =I("zc_area");
        $e_name =I("e_name");
        $start_date =I("start_date");
        $end_date =I("end_date");
        $this->assign('zc_name', $zc_name);
        $this->assign('zc_area', $zc_area);
        $this->assign('e_name', $e_name);
        $this->assign('start_date', $start_date);
        $this->assign('end_date', $end_date);
        $where = "1=1";
        if($zc_name){
            $where .= " and zc.name like '%{$zc_name}%'";
        }
        if($zc_area){
            $where .= " and zc.area = '{$zc_area}'";
        }
        if($e_name){
            $where .= " and e.name like '%{$e_name}%'";
        }
        if($start_date){
            $start_date = strtotime($start_date.' 00:00:00');
            $where .= " and e.etime >= '{$start_date}'";
        }
        if($end_date){
            $end_date = strtotime($end_date.' 23:59:59');
            $where .= " and e.etime <= '{$end_date}'";
        }
        if($type=='area'){
            //获取当前用户职场所在支公司
            $zc = M('zc')->where(array('id'=>$zc_id))->find(array('area'));
            //获取当前支公司所有职场
            $zc_id_arr = M('zc')->field(array('id','name'))->where(array('area'=>$zc['area']))->select();
            $zc_array =array_unique(array_column($zc_id_arr,'name'));
            $this->assign('zc_array', $zc_array);
            $zc_ids = join(",",array_column($zc_id_arr,'id'));
        }else if($type=='city'){
            //获取当前用户职场所在支公司
            $zc = M('zc')->where(array('id'=>$zc_id))->find(array('city'));
            //获取当前支公司所有职场
            $zc_id_arr = M('zc')->field(array('id','name','area'))->where(array('city'=>$zc['city']))->select();
            $area_array =array_unique(array_column($zc_id_arr,'area'));
            $this->assign('area_array', $area_array);
            $zc_ids = join(",",array_column($zc_id_arr,'id'));
        }else{
            $zc_ids = $zc_id;
        }
        //获取活动总数量
        $sql = "select count(t.id) as total_count,
                count(DISTINCT t.e_id) as e_num,
                sum(t.app_num) as app_num,
                sum(t.check_num) as check_num,
                sum(t.appointment_money) as appointment_money,
                sum(t.appointment_money_actual) as appointment_money_actual
                from {$pre}event_tongji as t 
                left join {$pre}event as e on e.id=t.e_id
                left join {$pre}zc as zc on zc.id=t.zc_id
                where t.zc_id in($zc_ids) and $where";
        $total = M('event_tongji')->query($sql);
        $sql = "select t.*,e.name,e.area,e.address,e.stime,e.etime,
                IFNULL(zc.name ,'其他职场') as zc_name,zc.prov,zc.city,zc.area as areas
                from {$pre}event_tongji as t 
                left join {$pre}event as e on e.id=t.e_id
                left join {$pre}zc as zc on zc.id=t.zc_id
                where t.zc_id in($zc_ids) and $where";
        $event_info = M('event_tongji')->query($sql);
        foreach ($event_info as $key => $value){
            if($value['area']==1){
                $event_info[$key]['area']='市活动';
            }else if($value['area']==2){
                $event_info[$key]['area']='分公司活动';
            }else if($value['area']==3){
                $event_info[$key]['area']='职场活动';
            }else{
                $event_info[$key]['area']='市活动';
            }
        }
        //获取所有活动
        $event = M('event')->field(array('id','name'))->select();
        $this->assign('event',$event);
        $this->assign('type',$type);
        $this->assign('event_total',$total[0]);
        $this->assign('vlist',$event_info);
        $this->display();
    }
}

?>
