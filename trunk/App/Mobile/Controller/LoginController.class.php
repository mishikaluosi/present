<?php
namespace Mobile\Controller;

class LoginController extends MobileCommonController{

    protected function _frm_ret($flag,$msg){
        $return_arr=array('flag'=>$flag,'msg'=>$msg);
        echo json_encode($return_arr);
        exit();
    }

    /**
     * 微信网页回调url
     * 请勿更删
     */
    public function weichat(){
        $this->get_web_access_token($_REQUEST['code']);
        $openid=$_SESSION['U']['openid'];
        if(empty($openid)){
            $this->web_oauth_login();
        }

        $data= M('member')->where(array("user_wx_openid"=>$openid))->find();
        if(!$data){
            $this->web_oauth_login();
        }
        $this->success('',U(MODULE_NAME."/User/index"));
    }

    public function ajax_send_code(){
        set_time_limit(0);
        $return_arr=array('flag'=>false,'msg'=>'error');
        $phone=trim(I('phone'));
        if(empty($phone)){
            echo json_encode($return_arr);
            exit();
        }

        if(strlen($phone)!=11){
            echo json_encode($return_arr);
            exit();
        }

        $_SESSION['login']['code']='';
        $_SESSION['login']['expires']='';
        $_SESSION['login']['phone']='';
        $sms_demo=new \Common\Lib\SmsDemo();

        $code=rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        //$response = $sms_demo::sendSms($phone,$code);
        $response=$code;//todo:test code
        $_SESSION['login']['code']=$code;
        $_SESSION['login']['expires']= time() + 60*60*2;
        $_SESSION['login']['phone']=$phone;

        $return_arr['flag']=true;
        $return_arr['msg']=$response;
        echo json_encode($return_arr);
        exit();
    }
}

?>
