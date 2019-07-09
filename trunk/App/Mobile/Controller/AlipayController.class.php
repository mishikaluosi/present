<?php
namespace Mobile\Controller;

class AlipayController extends MobileCommonController{

	public function pay(){
        $order_id = pe_dbhold(I('id',null));
        $order = M(order_table($order_id))->where(array('order_id'=>$order_id))->find();
        $alipay_config=C('alipay_config');

        /**************************请求参数**************************/

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $order['order_id'];
        //订单名称，必填
        $subject = $order['order_name'];
        //付款金额，必填
        $total_fee = $order['order_money'];
        //商品描述，可空
        $body = $order['order_text'];

        /************************************************************/

        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type"	=> $alipay_config['payment_type'],
            "notify_url"	=> $alipay_config['notify_url'],
            "return_url"	=> $alipay_config['return_url'],
            "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
            "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
            "out_trade_no"	=> $out_trade_no,
            "subject"	=> $subject,
            "total_fee"	=> $total_fee,
            "body"	=> $body,
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"
        );
        $parameter['app_pay'] = 'Y';

        //建立请求
        $alipaySubmit = new \Common\Lib\Payment\Alipay\AlipaySubmit($alipay_config);
        $html = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        $this->assign('html_str',$html);
	    $this->display();
    }

    /**
     * 支付宝服务器异步通知页面
     */
    public function notify_url(){
        $alipay_config=C('alipay_config');

        //计算得出通知验证结果
        $alipayNotify = new \Common\Lib\Payment\Alipay\AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        //验证成功
        if ($verify_result) {
            //商户订单号
            $order_id = pe_dbhold($_POST['out_trade_no']);
            //支付宝交易号
            $order_outid = pe_dbhold($_POST['trade_no']);
            if ($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {
                order_callback_pay($order_id, $order_outid, 'alipay');
            }
            echo "success";		//请不要修改或删除
        } else {
            echo "fail";//验证失败
        }
        exit();
    }

    /**
     * 支付宝页面跳转同步通知页面
     */
    public function return_url(){
        $alipay_config=C('alipay_config');
        $head_str=<<<eot
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付宝即时到账交易接口</title>
</head>
<body>
eot;
        $foot_str=<<<eot
</body>
</html>
eot;
        echo $head_str;
        //计算得出通知验证结果
        $alipayNotify = new \Common\Lib\Payment\Alipay\AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyReturn();
        //验证成功
        if ($verify_result) {
            //商户订单号
            $order_id = pe_dbhold($_GET['out_trade_no']);
            //支付宝交易号
            $order_outid = pe_dbhold($_GET['trade_no']);
            if ($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                order_callback_pay($order_id, $order_outid, 'alipay');
            } else {
                echo "trade_status=".$_GET['trade_status'];
            }
            order_pay_goto($order_id);
        } else {
            echo "验证失败";//验证失败
        }
        echo $foot_str;
        exit();

    }
}

?>