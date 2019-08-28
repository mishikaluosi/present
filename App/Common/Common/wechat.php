<?php
//微信支付（公众号）
function wechat_jspay($order_id) {
    $order = M(order_table($order_id))->where(array('order_id'=>$order_id))->find();
    $wechat_config = wechat_config();
    $user =M('member')->field('user_wx_openid')->where(array('id'=>$order['user_id']))->find();
    if ($order['order_state'] != 'wpay') {
        return array('result'=>false, 'show'=>'请勿重复支付');
    }
    //统一下单接口
    $xml_arr['appid'] = $wechat_config['wechat_appid'];
    $xml_arr['mch_id'] = $wechat_config['wechat_mchid'];
    $xml_arr['device_info'] = 'WEB';
    $xml_arr['nonce_str'] = md5(microtime(true).pe_ip().'koyshe+andrea');
    $xml_arr['body'] = pe_cut($order['order_name'], 13, '...');
    $xml_arr['out_trade_no'] = "{$order['order_id']}_".rand(100,999);
    $xml_arr['total_fee'] = $order['order_money']*100;
    $xml_arr['spbill_create_ip'] = pe_ip();
    $xml_arr['notify_url'] = $wechat_config['notify_url'];
    $xml_arr['trade_type'] = 'JSAPI';
    $xml_arr['openid'] = $user['user_wx_openid'];
    $xml_arr['sign'] = wechat_sign($xml_arr, $wechat_config['wechat_key']);

    //发送xml下单请求

    $json = wechat_sendxml('https://api.mch.weixin.qq.com/pay/unifiedorder', $xml_arr);
    if ($json['return_code'] == 'SUCCESS' && $json['result_code'] == 'SUCCESS') {
        $info_arr['appId'] = $wechat_config['wechat_appid'];
        $info_arr['timeStamp'] = strval(time());
        $info_arr['nonceStr'] = md5(microtime(true).pe_ip().'koyshe+andrea');
        $info_arr['package'] = "prepay_id={$json['prepay_id']}";
        $info_arr['signType'] = 'MD5';
        $info_arr['paySign'] = wechat_sign($info_arr, $wechat_config['wechat_key']);
        $url_arr = order_pay_goto($order_id, 0);
        $url = $url_arr['url'];
        return array('result'=>true, 'info'=>$info_arr, 'url'=>$url);
    } else {
        return array('result'=>false, 'show'=>"{$json['return_msg']}");
    }
}


//微信支付（h5支付）
function wechat_h5pay($order_id) {
    $order = M(order_table($order_id))->where(array('order_id'=>$order_id))->find();
    $wechat_config = wechat_config();
    $user =M('member')->field('user_wx_openid')->where(array('id'=>$order['user_id']))->find();
    if ($order['order_state'] != 'wpay') {
        return array('result'=>false, 'show'=>'请勿重复支付');
    }
    //统一下单接口
    $xml_arr['appid'] = $wechat_config['wechat_appid'];
    $xml_arr['mch_id'] = $wechat_config['wechat_mchid'];
    $xml_arr['device_info'] = 'WEB';
    $xml_arr['nonce_str'] = md5(microtime(true).pe_ip().'koyshe+andrea');
    $xml_arr['body'] = pe_cut($order['order_name'], 13, '...');
    $xml_arr['out_trade_no'] = "{$order['order_id']}_".rand(100,999);
    $xml_arr['total_fee'] = $order['order_money']*100;
    $xml_arr['spbill_create_ip'] = pe_ip();
    $xml_arr['notify_url'] = $wechat_config['notify_url'];
    $xml_arr['trade_type'] = 'MWEB';
    $xml_arr['scene_info'] = '{"h5_info": {"type":"Wap","wap_url": "'.$_SERVER['HTTP_HOST'].'","wap_name": "微信-支付"}}';
    $xml_arr['openid'] = $user['user_wx_openid'];
    $xml_arr['sign'] = wechat_sign($xml_arr, $wechat_config['wechat_key']);
    //发送xml下单请求
    $json = wechat_sendxml('https://api.mch.weixin.qq.com/pay/unifiedorder', $xml_arr);
    if ($json['return_code'] == 'SUCCESS' && $json['result_code'] == 'SUCCESS') {
        return array('result'=>true, 'url'=>$json['mweb_url']);
    } else {
        return array('result'=>false, 'show'=>"{$json['return_msg']}");
    }
}

//生成微信参数签名
function wechat_sign($arr, $key) {
    if (!is_array($arr)) return '';
    //签名步骤一：按字典序排序参数
    ksort($arr);
    $sign = "";
    foreach ($arr as $k => $v) {
        if ($k != "sign" && $v != "" && !is_array($v)){
            $sign .= "{$k}={$v}&";
        }
    }
    $sign = trim($sign, "&");
    //签名步骤二：在string后加入KEY
    $sign = "{$sign}&key={$key}";
    //签名步骤三：MD5加密
    $sign = md5($sign);
    //签名步骤四：所有字符转为大写
    $result = strtoupper($sign);
    return $result;
}


//微信xml格式数据
function wechat_xml($arr) {
    $xml = "<xml>";
    foreach ($arr as $k => $v) {
        if (is_numeric($v)) {
            $xml .= "<{$k}>{$v}</{$k}>";
        }
        else{
            $xml .= "<{$k}><![CDATA[{$v}]]></{$k}>";
        }
    }
    $xml .= "</xml>";
    return $xml;
}

//获取xml数据
function pe_getxml() {
    $xml = file_get_contents("php://input");
    return $xml = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
}

//接收微信xml数据
function wechat_getxml() {
    return pe_getxml();
}

//发送微信xml数据
function wechat_sendxml($url, $arr, $cert = false) {
    global $pe;
    $xml = wechat_xml($arr);
    if ($cert) {
        $cert_arr['ssl_cert'] =$_SERVER['HTTP_HOST']. "/wechat_cert/apiclient_cert.pem";
        $cert_arr['ssl_key'] = $_SERVER['HTTP_HOST']."/wechat_cert/apiclient_key.pem";
    }
    return pe_curl_post($url, $xml, 'str', $cert_arr);
}

//发送微信post数据
function wechat_curlpost($url, $arr, $type = 'arr') {
    $result = pe_curl_post($url, $arr, $type);
    return json_decode($result, true);
}

//发送微信get数据
function wechat_curlget($url) {
    return pe_curl_get($url);
}


function pe_curl_get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $result = curl_exec($ch);
    //var_dump(curl_error($ch));
    curl_close($ch);
    return $result;
}

function pe_curl_post($url, $arr = '', $arr_type = 'arr', $cert = array()) {
    if (is_array($arr)) {
        foreach ($arr as $k=>$v) {
            if (!is_array($v) && stripos($v, '@') === 0) {
                $v = substr($v, 1);
                if (class_exists('CURLFile')) {
                    $arr[$k] = new CURLFile($v);
                }
                else {
                    $arr[$k] = '@'.$v;
                }
            }
        }
        if ($arr_type == 'json') {
            $data = pe_json_encode($arr);
        }
        else {
            $data = $arr;
        }
    }
    else {
        $data = $arr;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    if (isset($cert['ssl_cert']) && isset($cert['ssl_key'])) {
        curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
        curl_setopt($ch, CURLOPT_SSLCERT, $cert['ssl_cert']);
        curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
        curl_setopt($ch, CURLOPT_SSLKEY, $cert['ssl_key']);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $result = curl_exec($ch);
    if (stripos($result, '<xml>') !== false) {
        $result = json_decode(json_encode(simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    }
//	var_dump(curl_error($ch));
    curl_close($ch);
    return $result;
}

//获取微信基础配置信息
function wechat_config($update = null) {
    $return_url='http://xt.wxlyz.com/index.php/Mobile/';
    if ($_SESSION['_Wechat_Config']['time'] <= time() - 3600 * 1.5 || $_SESSION['_Wechat_Config']['wechat_access_token'] == '' || $update) {
        $wechat_config['wechat_appid'] =  C('CFG_WEIXIN_APPID');
        $wechat_config['wechat_appsecret']=C('CFG_WEIXIN_APPSECRET');
        $wechat_config['wechat_mchid'] = C('CFG_WEIXIN_SHANGHUHAO');
        $wechat_config['wechat_key'] = C('CFG_WEIXIN_SHANGHUMIYAO');
        $wechat_config['wechat_token'] ='';
        //获取基础access_token
        $json = wechat_curlget("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$wechat_config['wechat_appid']}&secret={$wechat_config['wechat_appsecret']}");
        $json = json_decode($json, true);
        $wechat_config['wechat_access_token'] = $json['access_token'];
        //获取jsapi_ticket
        $json = wechat_curlget("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token={$wechat_config['wechat_access_token']}&type=jsapi");
        $json = json_decode($json, true);
        $wechat_config['wechat_jsapi_ticket'] = $json['ticket'];
        $wechat_config['notify_url'] =$return_url."Wechat/notify_url";
        $wechat_config['refund_url'] = $return_url."Wechat/refund_url";
        $wechat_config['time'] = time();
        $_SESSION['_Wechat_Config']=$wechat_config;
    }else{
        $wechat_config=$_SESSION['_Wechat_Config'];
    }
    return $wechat_config;
}

?>