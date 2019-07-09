<?php
namespace Mobile\Controller;

use phpDocumentor\Reflection\Types\Null_;

class WechatController extends MobileCommonController{

	public function pay(){
        $order_id = pe_dbhold(I('id',null));
        $type=I('type',null);
        if($type=='h5'){
            $json = wechat_jspay($order_id);//wechat_h5pay($order_id);
        }else{
            $json = wechat_jspay($order_id);
        }
        echo json_encode($json);
	    exit();
    }

    /**
     * 回调接口
     */
    public function notify_url(){
        $xml = wechat_getxml();
        //商户订单号
        $order_id = substr(pe_dbhold($xml['out_trade_no']), 0, -4);
        //微信订单号
        $order_outid = pe_dbhold($xml['transaction_id']);
        if ($xml['sign'] == wechat_sign($xml, C('CFG_WEIXIN_SHANGHUMIYAO'))) {
            if ($xml['return_code'] == 'SUCCESS' && $xml['result_code'] == 'SUCCESS') {
                order_callback_pay($order_id, $order_outid, 'wechat');
                echo wechat_xml(array('return_code'=>'SUCCESS', 'return_msg'=>''));
            }
        } else {
            echo wechat_xml(array('return_code'=>'FAIL', 'return_msg'=>''));
        }
        exit();
    }

    /**
     * 退款接口
     */
    public function refund_url(){

    }


}

?>