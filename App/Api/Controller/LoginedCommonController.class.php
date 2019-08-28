<?php
namespace Api\Controller;
use Think\Controller;

//需要登录后请求的方法都继承这个类LoginedCommonController
class LoginedCommonController extends Controller {
    protected $userId;
    protected $userInfo;
    protected function _initialize()
    {
      // if (!IS_AJAX ||  !IS_POST) {
      //   $ret = array('code'=>404,'data'=>'','msg'=>'非法请求');
      //   return_json($ret);
      // }

      $session_key = I('session_key','','trim');
      $this->checkSession($session_key);
      if($_COOKIE['PHPSESSID'])
      {
        session_id($_COOKIE['PHPSESSID']);
        session_set_cookie_params(120);
        session_start();
      }
    }

    private function checkSession($session_key)
    {
      if($session_key){
        $userInfo = M('member')->where(array('sessionkey'=>$session_key))->find();
        if($userInfo){
          $this->userId = $userInfo['id'];
          $this->userInfo = $userInfo;
        }else{
          return_json(array('code'=>400,'data'=>'','msg'=>'session_key过期'));
        }
      }else{
        return_json(array('code'=>400,'data'=>'','msg'=>'缺少参数session_key'));
      }
    }
}
?>
