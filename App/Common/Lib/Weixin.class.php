<?php

namespace Common\Lib;

class Weixin{
  static function getUserInfo($code,$encryptedData,$iv){
    $appid=C('CFG_WEIXIN_APPID');
    $secret=C('CFG_WEIXIN_APPSECRET');
    $grant_type='authorization_code';
    $url='https://api.weixin.qq.com/sns/jscode2session';
    $url= sprintf("%s?appid=%s&secret=%s&js_code=%s&grant_type=%",$url,$appid,$secret,$code,$grant_type);
    $user_data=json_decode(file_get_contents($url));
    $session_key= define_str_replace($user_data->session_key);
    $data="";
    $wxBizDataCrypt=new \Common\Lib\Phpweixinaes\WXBizDataCrypt($appid,$session_key);
    $errCode=$wxBizDataCrypt->decryptData($encryptedData,$iv,$data);
    return ['errCode'=>$errCode,'data'=>json_decode($data),'session_key'=>$session_key];
  }
}
