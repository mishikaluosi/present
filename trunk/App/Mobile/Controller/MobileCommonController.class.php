<?php
namespace Mobile\Controller;
use Think\Controller;

//公共验证控制器
class MobileCommonController extends Controller {

    public $_xzl_uid;
    public $_userinfo;
    public $_xzl_zcid;

    public function __construct(){
        parent::__construct();
        $this->_xzl_uid=$_SESSION['user_id'];
        if(empty($_SESSION['user_id'])&&CONTROLLER_NAME!='Login'&&CONTROLLER_NAME!='Wechat'&&CONTROLLER_NAME!='Wenjuan'&&CONTROLLER_NAME!='Check'){
//            $this->error('请先登陆',U(MODULE_NAME."/Do/login"));
            header("location:".U(MODULE_NAME."/Do/login"));
        }
        $zc=M('member')->field('zc_id')->find($_SESSION['user_id']);//$_SESSION['user_zcid'];
        if($zc){
            $this->_xzl_zcid=$zc['zc_id'];
            $_SESSION['user_zcid']=$zc['zc_id'];
        }
        $this->_userinfo=array(
            "id"=>$_SESSION['user_id'] ,
            "name"=>$_SESSION['user_name'] ,
            "phone"=>$_SESSION['user_phone'] ,
            "zc_id"=>$_SESSION['user_zcid'] ,
            "logintime"=>$_SESSION['user_ltime']
        );
        $this->assign('_C_NAME',CONTROLLER_NAME);
        $this->assign('_A_NAME',ACTION_NAME);
    }

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

    /**
     * 获取url
     * @param $action
     * @return string
     */
    public function _get_api_url($action){
        $domin=$_SERVER['HTTP_HOST'];
        if(empty($action)){
            $action='test';
        }
        $url=$domin.'/index.php?s=/Mobile/Wechat/'.$action;
        return $url;
    }

    /**
     * 获取http接口内容
     * @param $url
     * @return mixed
     */
    public function _httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    /**
     * 获取微信配置
     * @return array
     */
    public function getWechatConfig(){
        $config=array(
            'wx'=>'新之礼',
            'EncodingAESKey'=>'thNnzXucFjI4upgUVAiydwX5yNrs1cOXj2xMvx2h2M0',
            'token'=>'xzl'
        );
        $config['appid'] =  C('CFG_WEIXIN_APPID');
        $config['appsecret']=C('CFG_WEIXIN_APPSECRET');
        return $config;
    }

    /**
     * 获取微信接口url
     * @param $type
     * @return string
     */
    public function weichat_api_url($type){
        $url='';
        switch ($type){
            case 'token':
                $url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=:APPID&secret=:APPSECRET';
                break;
            case 'user':
                $url='https://api.weixin.qq.com/cgi-bin/user/info?access_token=:ACCESS_TOKEN&openid=:OPENID&lang=zh_CN';
                break;
            case 'oauth2':
                $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid=:APPID&redirect_uri=:REDIRECT_URI&response_type=code&scope=snsapi_base&state=123#wechat_redirect';
                break;
            case 'oauth2_2':
                $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid=:APPID&secret=:APPSECRET&code=:CODE&grant_type=authorization_code';
                break;
            case 'oauth2_3':
                $url='https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=:APPID&grant_type=refresh_token&refresh_token=:REFRESH_TOKEN';
                break;
        }
        return $url;
    }

    public function weichat_errcode(){
        /**
         * -1	系统繁忙，此时请开发者稍候再试
        0	请求成功
        40001	AppSecret错误或者AppSecret不属于这个公众号，请开发者确认AppSecret的正确性
        40002	请确保grant_type字段值为client_credential
        40164
         */
        return array('-1','40001','40002','40164');
    }

    /**
     * 获取access token
     * @return bool
     */
    public function getToken(){
        $needFlush=false;
        $cfg = $this->getWechatConfig();
        $data = json_decode(file_get_contents("access_token.json"));
        if ($data->expire_time < time()) {
            $needFlush=true;
        }else{
            return $data->access_token;
        }

        if ($needFlush) {
            $tokenApi = str_replace(':APPID', trim($cfg['appid']), $this->weichat_api_url('token'));
            $tokenApi = str_replace(':APPSECRET', trim($cfg['appsecret']), $tokenApi);
            $res=$res = json_decode($this->_httpGet($tokenApi));

            $err_code=$this->weichat_errcode();
            if(!empty($res->errcode) && in_array($res->errcode,$err_code)){
                return false;
            } else {
                $data = array();
                $data['access_token'] = $res->access_token;
                $data['expire_time'] = $res->expires_in + time() - 100;
                $fp = fopen("access_token.json", "w");
                fwrite($fp, json_encode($data));
                fclose($fp);
            }
        }
        return $data['access_token'] ;
    }

    /**
     * 网页授权登陆1
     */
    public function web_oauth_login(){
        $cfg=$this->getWechatConfig();
        $return_url="http://xt.wxlyz.com/index.php/Mobile/Login/weichat/";
        $url = str_replace(':APPID', trim($cfg['appid']), $this->weichat_api_url('oauth2'));
        $url = str_replace(':REDIRECT_URI', $return_url, $url);
        header('Location: ' . $url);
        exit();
    }

    /**
     * 网页授权登陆2
     */
    public function get_web_access_token($code){
        if($_SESSION['web_info']['access_token']){
            if($_SESSION['web_info']['expires']>time()){
                return $_SESSION['web_info']['access_token'];
            }
        }
        $cfg=$this->getWechatConfig();
        $tokenApi = str_replace(':APPID', trim($cfg['appid']), $this->weichat_api_url('oauth2_2'));
        $tokenApi = str_replace(':APPSECRET', trim($cfg['appsecret']), $tokenApi);
        $tokenApi = str_replace(':CODE', trim($code), $tokenApi);
        $res=$res = json_decode($this->_httpGet($tokenApi),true);

        if($res['access_token']){
            $data=$this->_set_webinfo($res);
            $_SESSION['U']['openid']=$res['openid'];
            $add_data=array('id'=>$_SESSION['user_id'], "user_wx_openid"=>$res['openid']);
            M('member')->where(array('id'=>$_SESSION['user_id']))->save($add_data);
            return $res['access_token'];
        }
        return $res['access_token'];
    }

    /**
     * 获取openid；
     */
    public function get_openid(){
        $cfg=$this->getWechatConfig();
        $data=$_SESSION['web_info'];
        if($data){
            if ($data['expires']> time()) {//过期了
                return $data['openid'];
            }
        }
        //刷新access_token
        $tokenApi = str_replace(':APPID', trim($cfg['appid']), $this->weichat_api_url('oauth2_3'));
        $tokenApi = str_replace(':REFRESH', trim($data['refresh_token']), $tokenApi);
        $res=$res = json_decode($this->_httpGet($tokenApi),true);

        if($res['access_token']){
            //结果存session
            $data=$this->_set_webinfo($res);
        }
        return $res['openid'];
    }

    private function _set_webinfo($res){
        $data = array();
        $data['access_token'] = $res['access_token'];
        $data['expires'] = $res['expires_in'] + time() - 100;
        $data['refresh_token']=$res['refresh_token'];
        $data['openid']=$res['openid'];
        $data['scope']=$res['scope'];
        $_SESSION['web_info']=$data;
        return $data;
    }

    //抽奖用户授权登录
    public function check_oauth_login($e_id){
        $cfg=$this->getWechatConfig();
        $return_url="http://xt.wxlyz.com/index.php/Mobile/Check/getWechat/e_id/{$e_id}";
        $url = str_replace(':APPID', trim($cfg['appid']), $this->weichat_api_url('oauth2'));
        $url = str_replace(':REDIRECT_URI', $return_url, $url);
        header('Location: ' . $url);
        exit();
    }
    public function get_check_access_token($code,$e_id,$member_id){
        if($_SESSION['web_info']['access_token']){
            if($_SESSION['web_info']['expires']>time()){
                $access_token = $_SESSION['web_info']['access_token'];
                $openid = $_SESSION['web_info']['openid'];
            }
        }
        $cfg=$this->getWechatConfig();
        $tokenApi = str_replace(':APPID', trim($cfg['appid']), $this->weichat_api_url('oauth2_2'));
        $tokenApi = str_replace(':APPSECRET', trim($cfg['appsecret']), $tokenApi);
        $tokenApi = str_replace(':CODE', trim($code), $tokenApi);
        $res = json_decode($this->_httpGet($tokenApi),true);
        if($res['access_token']){
            $this->_set_webinfo($res);
            $access_token = $res['access_token'];
            $openid = $res['openid'];
        }
        //判断该活动下用户是否已存在
        $user = M('event_user')->where(['open_id'=>$openid,'e_id'=>$e_id])->find();
        if(!$user){
            //判断活动是否限制人数
            $event = M('event')->where(['e_id'=>$e_id])->find();
            $user_count = M('event_user')->where(['e_id'=>$e_id])->count();
            if($event['max_member']<=$user_count){
                return false;
            }
            $userApi = str_replace(':OPENID', $openid, $this->weichat_api_url('user'));
            $userApi = str_replace(':ACCESS_TOKEN', $access_token, $userApi);
            $usr_info = json_decode($this->_httpGet($userApi),true);
            if($usr_info['sex']==1){
                $sex = '男';
            }elseif($usr_info['sex']==2){
                $sex = '女';
            }else{
                $sex = '未知';
            }
            $event_user['e_id'] = $e_id;
            $event_user['name'] = $usr_info['nickname'];
            $event_user['image'] = $usr_info['headimgurl'];
            $event_user['thumb_image'] = $usr_info['headimgurl'];
            $event_user['created_at'] = time();
            $event_user['province'] = $usr_info['province'];
            $event_user['city'] = $usr_info['city'];
            $event_user['open_id'] = $usr_info['openid'];
            $event_user['sex'] = $sex;
            $event_user['member_id'] = $member_id;
            M('event_user')->add($event_user);
            return true;
        }
    }
}
?>
