<?php

namespace Mobile\Controller;
use Think\Controller;

class DoController extends Controller{
    // 空操作，404页面
    public function _empty(){
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        $this->display(get_tpl('404.html'));
    }

    protected function _initialize(){
        if (C('CFG_WEBSITE_CLOSE') == 1) {
            exit_msg(C('CFG_WEBSITE_CLOSE_INFO'));
        }

    }

    public function qrcode(){
        $uid=I('uid',null);
        if(!is_numeric($uid)){
            exit();
        }
        $url='http://xt.wxlyz.com/index.php/Mobile/Wenjuan/index/uid/'.$uid;
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

    public function msg(){
        $uid=I('uid',null);
        $info=M('member')->where(array('id'=>$uid))->find();
        $this->assign('uid',$uid);
        $this->assign('info',$info);
        $this->display();
    }

    /**
     * 图片验证码
     */
    public function pic_code(){
        $authcode = new \Common\Lib\Authcode();
        echo $authcode->get();
        exit();
	}

    /**
     * 省市区联动
     */
	public function get_region_jsdata(){
        $jsdata=get_region_jsdata();
        echo $jsdata;
        exit();
    }

    /**
     * 根据地区名获得职场信息
     */
    public function get_zc_jsdata(){
        $name = I('name', '');
        if(empty($name)){
            exit();
        }else{
            $area=M('region')->where(array('region_name'=>trim($name)))->find();
            if(empty($area)){
                exit();
            }
        }
        $city=M('region')->where(array('region_id'=>$area['parent_id']))->find();
        $info=array();
        if($area && $city){
            $keyword=trim($area['region_name']);
            $where='  area like "%'.$keyword.'%" ';
            $where.=' and city like "%'.trim($city['region_name']).'%" ';
            $info= M('zc')->where($where)->order('sort ASC, id DESC')->select();
        }

        echo json_encode($info);
        exit();
    }

    public function chk_phone(){
        $phone = I('phone', '');
        $chk_flag=$this->_chk($phone);
        $this->_frm_json($chk_flag,null);
    }

    public function _chk($phone){
        if(empty($phone)){
            return false;
        }
        $where=array('phone'=>$phone);
        $ret=M('member')->where($where)->find();
        if($ret){
            return true;
        }
        return false;
    }

    public function _frm_json($flag,$arr){
        echo json_encode(array('flag'=>$flag,'msg'=>$arr));
        exit();
    }
    public function _frm_json_login($result,$show){
        echo json_encode(array('result'=>$result, 'show'=>$show));
        exit();
    }
    public function returnSuccess($data,$message='ok'){
        echo json_encode(array(
            'status' => 0,
            'data' => $data,
            'message' => $message
        ));
        exit();
    }
    public function returnError($message='error'){
        echo json_encode(array(
            'status' => 1,
            'data' => null,
            'message' => $message
        ));
    exit();
}
	public function index(){
		$this->display();
	}

	public function login(){
	    if(IS_POST){
	        $this->login_in();
	        exit();
        }
        $this->display();
	}
    public function login_code(){
        if(IS_POST){
            $this->login_in_code();
            exit();
        }
        $this->display();
    }

	public function register(){
        if(IS_POST){
            $this->register_save();
            exit();
        }
        $this->display();
	}

	public function login_in(){
        $phone=I('phone', '');
        $password=I('user_pw', '');
        $exc_code=I('exc_code', '');
        if(empty($phone)){
            $this->_frm_json_login(false,'手机号不得为空');
        }
        if(empty($password)){
            $this->_frm_json_login(false,'密码不得为空');
        }
//        if(empty($exc_code)){
//            $this->_frm_json_login(false,'验证码不得为空');
//        }
        $where=array('phone'=>pe_dbhold($phone));
        $user=M('member')->where($where)->find();
        if($user){
            if($user['password'] != get_password($password, $user['encrypt'])){
                $this->_frm_json_login(false,'手机号或密码错误');
            }
            //验证验证码
//            $send_code=M('send_code')->where(array('phone'=>$phone,'code'=>$exc_code,'type'=>'login'))->order('id desc')->find();
//            if(!$send_code){
//                $this->_frm_json_login(false,'验证码不存在');
//            }
//            $pass_time = time()-$send_code['created_at'];
//            if($pass_time>15*60){
//                $this->_frm_json_login(false,'验证码已超时，请重新获取');
//            }
            if($user['islock']==1){
                $this->_frm_json_login(false,'您的账户已被锁定，请联系管理员解锁');
            }
            $this->_user_login_callback($user);
            $this->_frm_json_login(true,'登录成功');
        }else{
            $this->_frm_json_login(false,'手机号或密码错误');
        }
    }
    public function login_in_code(){
        $phone=I('phone', '');
        $exc_code=I('exc_code', '');
        if(empty($phone)){
            $this->_frm_json_login(false,'手机号不得为空');
        }
        if(empty($exc_code)){
            $this->_frm_json_login(false,'验证码不得为空');
        }
        //验证用户
        $where=array('phone'=>pe_dbhold($phone));
        $user=M('member')->where($where)->find();
        if($user){
            //验证验证码
            $send_code=M('send_code')->where(array('phone'=>$phone,'code'=>$exc_code,'type'=>'login'))->order('id',"desc")->find();
            if(!$send_code){
                $this->_frm_json_login(false,'验证码不存在');
            }
            $pass_time = time()-$send_code['created_at'];
            if($pass_time>15*60){
                $this->_frm_json_login(false,'验证码已超时，请重新获取');
            }
            if($user['islock']==1){
                $this->_frm_json_login(false,'您的账户已被锁定，请联系管理员解锁');
            }

            $this->_user_login_callback($user);
            $this->_frm_json_login(true,'登录成功');
        }else{
            $this->_frm_json_login(false,'手机号错误或用户不存在');
        }
    }
    /**
     * 保存业务员信息
     */
	public function register_save(){
        $post_data=I('post.');
        $zc = I('zc_id', '');
        $password=I('user_pw', '');
        $repassword=I('user_pw1', '');
        $code=$post_data['code'];
        if(empty($post_data['name'])){
            $this->_frm_json_login(false,'姓名不得为空');
        } else if(mb_strlen($post_data['name'],'utf8')<2 || mb_strlen($post_data['name'],'utf8')>15){
            $this->_frm_json_login(false,'姓名为2~15位字符');
        }
        if(empty($post_data['phone'])){
            $this->_frm_json_login(false,'手机号不得为空');
        }else if(!pe_formcheck('phone',$post_data['phone'])){
            $this->_frm_json_login(false,'手机号格式不正确');
        }else if($this->_chk($post_data['phone'])){
            $this->_frm_json_login(false,'该手机号已经存在');
        }

        if(empty($password)||empty($repassword)){
            $this->_frm_json_login(false,'密码不得为空');
        }else{
            if(strlen($password)<6||strlen($password)>20){
                $this->_frm_json_login(false,'密码为6~20位字符');
            }
            if($password!=$repassword){
                $this->_frm_json_login(false,'两次密码不一致');
            }
        }

        if(empty($code)||strtoupper($code)!=strtoupper($_SESSION['authcode'])){
            $this->_frm_json_login(false,'验证码不得为空');
        }

        $data=array(
            'name'=>$post_data['name'],
            'phone'=>$post_data['phone'],
            'group_no'=>$post_data['group_no'],
            'work_no'=>$post_data['work_no'],
            'islock'=>0,
        );
        if(is_numeric($zc)&&$zc>0){
            $data['zc_id']=$zc;
            $data['area']=$post_data['area'];
            $data['city']=$post_data['city'];
            $data['prov']=$post_data['prov'];
        }else{
            $this->_frm_json_login(false,'请选择职场');
        }
        $passwordinfo = get_password($password);
        $data['password'] = $passwordinfo['password'];
        $data['encrypt'] = $passwordinfo['encrypt'];
        $data['regtime'] = time();
        $id = M('member')->add($data);

        if($id){
            $this->_user_login_callback($id);
            $this->_frm_json_login(true,'注册成功');
        }else{
            $this->_frm_json_login(false,'注册失败');
        }

    }

    /**
     * 清除登录session
     */
    function _clear_login_session(){
        //unset($_SESSION['user_idtoken']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_phone']);
        unset($_SESSION['user_zcid']);
        unset($_SESSION['user_ltime']);
        unset($_SESSION['U']['openid']);
    }

    /**
     * 登录注册后的共同操作
     * @param $user
     */
    function _user_login_callback($user) {
        if (!is_array($user)){
            $user_where=array('id'=>$user);
            $user =M('member')->where($user_where)->find();
        }else{
            $user_where=array('id'=>$user['id']);
        }
        $user_update=array(
            'logintime'=>time(),
            'loginip'=>get_client_ip()
        );
        M('member')->where($user_where)->save($user_update);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_phone'] = $user['phone'];
        $_SESSION['user_zcid'] = $user['zc_id'];
        $_SESSION['user_ltime'] = $user['logintime'];
        if(!empty($user['user_wx_openid'])){
            $_SESSION['U']['openid']=$user['user_wx_openid'];
        }
    }
    public function sendCode(){
        $phone = I("phone");
        $code = rand(100000, 999999);
//        $code = 123456;//未接入短信平台 ，测试123456
        if(!pe_formcheck('phone',$phone)) {
            $this->returnError('手机号格式不正确');
        }
        //发送验证码给手机
        $ret  = $this->sendsms($phone,$code);
        $ret = json_decode($ret,true);
        if($ret['result']!=0){
            $this->returnError($ret['errmsg']);
        }
        $item = array(
            'phone'	=> 	$phone,
            'code'	=> 	$code,
            'type' => 	'login',
            'created_at'	=> 	time(),
        );
        $id = M('send_code')->add($item);
       if(!$id){
           $this->returnError('验证码获取失败');
       }
        $this->returnSuccess($phone);
        exit();
    }
    function sendsms($phone,$code){
        $strMobile = $phone; //tel 的 mobile 字段的内容
        $strAppKey = "29ecbbdf6d66fe75b28833934d729ee7"; //sdkappid 对应的 appkey，需要业务方高度保密
        $strAppid = "1400248288";
        $strRand = rand(100000, 999999); //URL 中的 random 字段的值
        $strTime = time(); //UNIX 时间戳
        $sig =  hash("sha256", "appkey=$strAppKey&random=$strRand&time=$strTime&mobile=$strMobile");
        $tpl_id =405171;
        $url = "https://yun.tim.qq.com/v5/tlssmssvr/sendsms?sdkappid=".$strAppid."&random=".$strRand;
        $params = array($code,'15');
        $sign = "新吴区新之礼日用品商行";
        $tel['mobile'] = $phone;
        $tel['nationcode'] = '86';

        $send_param['ext'] ='';
        $send_param['extend'] ='';
        $send_param['params'] =$params;
        $send_param['sig'] =$sig;
        $send_param['sign'] =$sign;
        $send_param['tel'] =$tel;
        $send_param['time'] =$strTime;
        $send_param['tpl_id'] =$tpl_id;
        $send_param = json_encode($send_param);
        $ret = $this->http_post($url,$send_param);
        return $ret;
    }
    function http_post($url, $param, $post_file = false)
    {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        if (is_string($param) || $post_file) {
            $strPOST = $param;
        } else {
            $aPOST = array();
            foreach ($param as $key => $val) {
                $aPOST[] = $key . "=" . urlencode($val);
            }
            $strPOST = join("&", $aPOST);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($oCurl, CURLOPT_POST, true);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS, $strPOST);
        $sContent = curl_exec($oCurl);
        $aStatus  = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($aStatus["http_code"]) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }
}

?>
