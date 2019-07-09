<?php
//归档
namespace Mobile\Controller;

class OrderController extends MobileCommonController{

	public function index(){
        $this->display();
	}

    /**
     * 订单添加页
     */
	public function add(){
        $cache_payment = cache_payment();
        $payment_list = payment_list('order');
        $user_id = $this->_xzl_uid;

        $cart_id = I('id',null);
        $cart = cart_list($cart_id);
        $info_list = $cart['all_list'];
        $info = $cart['info'];
        $user=M('member')->find($user_id);
        $user['user_money'] = deal_num($user['user_money'], 'round', 1, true);

        $this->assign('cart_id',$cart_id);
        $this->assign('cart',$cart);
        $this->assign('info_list',$info_list);
        $this->assign('info',$info);
        $this->assign('user',$user);
        $this->assign('cache_payment',$cache_payment);
        $this->assign('payment_list',$payment_list);
        $this->display();
    }

    protected function _frm_ret($result,$show){
        $return_arr=array('result'=>$result, 'show'=>$show);
        echo json_encode($return_arr);
        exit();
    }

    function add_save(){
        $cache_payment = cache_payment();
        $payment_list = payment_list('order');
        $user_id = $this->_xzl_uid;

        $cart_id = I('id',null);
        $cart = cart_list($cart_id);
        $info_list = $cart['all_list'];
        $info = $cart['info'];
        $user=M('member')->find($user_id);
        $user['user_money'] = deal_num($user['user_money'], 'round', 1, true);

        $order_text=I('order_text',null);
        $address_id=I('address_id',null);
        $order_payment=I('order_payment',null);
        if (!logined()) {$this->_frm_ret(false,'请先登录');}
        if (!count($info_list)){$this->_frm_ret(false,'购物车商品为空');}
        if (!$order_payment) {$this->_frm_ret(false,'请选择付款方式');}
        //虚拟商品不用检测收货地址
        if (!$info['order_virtual']) {
            $address = useraddr_info($address_id);
            if (!$address['address_id']){$this->_frm_ret(false,'请选择收货地址');}
        }
        //输出购买错误信息
        foreach ($info_list as $v) {
            if ($v['error']){$this->_frm_ret(false,"【{$v['error']['show']}】{$v['product_name']}");}
        }
        $sql_order['order_id'] = $order_id = pe_guid('order|order_id');
        $sql_order['order_type'] = $info['order_type'];
        $sql_order['order_virtual'] = $info['order_virtual'];
        $sql_order['order_name'] = $info['order_name'];
        $sql_order['order_product_money'] = $info['order_product_money'];
        $sql_order['order_wl_money'] = $info['order_wl_money'];
        $sql_order['order_money'] = $info['order_money'];
        $sql_order['order_point_get'] = $info['order_point_get'];
        $sql_order['order_atime'] = time();
        $sql_order['order_payment'] = $order_payment;
        $sql_order['order_payment_name'] = $cache_payment[$order_payment]['payment_name'];
        $sql_order['order_state'] = $order_payment == 'cod' ? 'wsend' : 'wpay';
        $sql_order['order_text'] = $order_text;
        $sql_order['user_id'] = $user_id;
        $sql_order['user_name'] = $_SESSION['user_name'];
        $sql_order['user_address'] = "{$address['address_province']}{$address['address_city']}{$address['address_area']}{$address['address_text']}";
        $sql_order['user_tname'] = $address['user_tname'];
        $sql_order['user_phone'] = $address['user_phone'];

        $sql_order['prov'] = $address['address_province'];
        $sql_order['city'] = $address['address_city'];
        $sql_order['area'] = $address['address_area'];
        $sql_order['zc'] = $address['zc_name'];
        $sql_order['zc_id'] = $address['address_id'];
        if ($sql_order['order_money'] < 0){
            $this->_frm_ret(false,'订单有误');
            $sql_order['order_money'] = 0;
        }

        if (M('order')->add(pe_dbhold($sql_order))) {
            foreach ($info_list as $v) {
                $sql_orderdata['product_id'] = $v['product_id'];
                $sql_orderdata['product_guid'] = $v['product_guid'];
                $sql_orderdata['product_name'] = $v['product_name'];
                $sql_orderdata['product_rule'] = $v['product_rule'];
                $sql_orderdata['product_logo'] = $v['product_logo'];
                $sql_orderdata['product_money'] = $v['product_money'];
                $sql_orderdata['product_allmoney'] = $v['product_allmoney'];
                $sql_orderdata['product_num'] = $v['product_num'];
                $sql_orderdata['order_id'] = $order_id;

                $sql_orderdata['prov'] = $address['address_province'];
                $sql_orderdata['city'] = $address['address_city'];
                $sql_orderdata['area'] = $address['address_area'];
                $sql_orderdata['zc'] = $address['zc_name'];
                $sql_orderdata['zc_id'] = $address['address_id'];
                $sql_orderdata['uname'] = $_SESSION['user_name'];
                $sql_orderdata['uid'] =$user_id;
                M('orderdata')->add(pe_dbhold($sql_orderdata, array('product_rule')));
            }
            order_calback_add($order_id, $cart_id);
            //金额为0直接支付成功
            if ($sql_order['order_money'] == 0) {
                order_callback_pay($order_id, '', 'balance');
                $ret = order_pay_goto($order_id, false);
                echo json_encode(array('result'=>true, 'show'=>'订单支付成功', 'url'=>$ret['url']));
                exit();
            }
            else {
                $url_ok=U('Order/pay',array('id'=>$order_id));
                echo json_encode(array('result'=>true, 'show'=>'订单提交成功', 'url'=>$url_ok));
                exit();
            }
        } else {
            echo json_encode(array('result'=>false, 'show'=>'订单提交失败'));
            exit();
        }
    }

    public function pay(){
        $cache_payment = cache_payment();
        $payment_list = payment_list('order');
        $user_id = $this->_xzl_uid;

        $order_id = pe_dbhold(I('id',null));
        $info =M('order')->where( array('order_id'=>$order_id))->find();
        $user = M('member')->where( array('user_id'=>$user_id))->find();
        $user['user_money'] = deal_num($user['user_money'], 'round', 1, true);
        if (!$info['order_id']){
            $this->error('订单号错误');
        }
        $this->assign('order_id',$order_id);
        $this->assign('info',$info);
        $this->assign('user',$user);

        $this->assign('cache_payment',$cache_payment);
        $this->assign('payment_list',$payment_list);
        $this->display();
    }

    public function pay_save(){
        $cache_payment = cache_payment();
        $payment_list = payment_list('order');
        $user_id = $this->_xzl_uid;

        $order_id = pe_dbhold(I('id',null));
        $order_payment=I('order_payment',null);
        $info =M('order')->where( array('order_id'=>$order_id))->find();
        $user = M('member')->where( array('user_id'=>$user_id))->find();
        $user['user_money'] = deal_num($user['user_money'], 'round', 1, true);

        if (!$info['order_id']){
            $this->_frm_ret(false,'订单号错误');
        }
        if ($info['order_pstate']) {
            $this->_frm_ret(false,'订单已支付');
        };
        $order_payment = $order_payment ? pe_dbhold($order_payment) : $info['order_payment'];
        if ($order_payment == 'cod' or !array_key_exists($order_payment, $cache_payment)){
            $this->_frm_ret(false,'支付方式错误');
        }

        if($order_payment=='alipay'){
            $zurl=U("Alipay/pay",array('id'=>$order_id));
        }else if($order_payment=='wechat'){
            $zurl=U("Wechat/pay");//,array('id'=>$order_id)
            $zurl=str_replace('.html','',$zurl);
        }
        echo json_encode(array('result'=>true, 'id'=>$order_id, 'url'=>$zurl));
        exit();

    }

    public function view(){
        $order_id = pe_dbhold(I('id',null));
        $info =M('order')->where( array('order_id'=>$order_id, 'user_id'=>$this->_xzl_uid))->find();
        if (!$info['order_id']) pe_error('...参数错误');
        $product_list=M('orderdata')->where(array('order_id'=>$order_id))->select();
        //$prokey_list = $db->pe_selectall('prokey', array('order_id'=>$order_id, 'order by'=>'prokey_id asc'));

        $this->assign('order_id',$order_id);
        $this->assign('info',$info);
        $this->assign('product_list',$product_list);
        $this->display();
    }
}

?>