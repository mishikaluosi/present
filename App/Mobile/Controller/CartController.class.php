<?php

namespace Mobile\Controller;

class CartController extends MobileCommonController{

	public function index(){
        $cart = cart_list('all');
        $info_list = $cart['all_list'];
        $info = $cart['money'];
        $this->assign('info',$info);
		$this->assign('info_list',$info_list);
		$this->display();
	}

	public function chkcart(){
        if (!logined()){
            $this->_frm_ret(false,'请先登录');
        }
        $post_data=I('post.');
        $cart_id = is_array($post_data['cart_id']) ? $post_data['cart_id'] : array();
        $cart = cart_list('all');
        $info_list = $cart['all_list'];

        foreach ($info_list as $k=>$v) {
            if (!in_array($v['cart_id'], $cart_id)) continue;
            if ($v['error']){
                $this->_frm_ret(false,"【{$v['error']['show']}】{$v['product_name']}");
            }
            $cart_arr[] = $v['cart_id'];
        }
        if (!is_array($cart_arr)){
            $this->_frm_ret(false,'请选择商品');
        };
        echo json_encode(array('result'=>true, 'id'=>implode(',', $cart_arr)));
        exit();
    }

    protected function _frm_ret($result,$show){
        $return_arr=array('result'=>$result, 'show'=>$show);
        echo json_encode($return_arr);
        exit();
    }

    /**
     * 购物车修改(为零就删除吧)
     */
	public function edit(){
        $cart_id = I('id',null);
        $product_num = I('num',null);
        if (!logined()) {
            $this->_frm_ret(false,'请先登录');
        };
        $user_id=$this->_xzl_uid;
        $cart = M('cart')->where(array('cart_id'=>$cart_id, 'user_id'=>$user_id))->find();
        if ($product_num) {
            $product = product_buyinfo($cart['product_guid']);
            if($product){
                $product=$product[0];
            }
            if (!$product['product_id']){
                echo json_encode(array('result'=>false, 'show'=>'商品下架或失效', 'num'=>$product_num));
                exit();
            }
            if ($product['product_num'] < $product_num){
                echo json_encode(array('result'=>false, 'show'=>"库存仅剩{$product['product_num']}件", 'num'=>$product['product_num']));
                exit();
            }
            $cart_flag=M('cart')->where(array('cart_id'=>$cart['cart_id']))->save(array('product_num'=>$product_num));
            if (!$cart_flag) {
                echo json_encode(array('result'=>false, 'show'=>'修改失败', 'num'=>$cart['product_num']));
                exit();
            }
        } else {
            $cart_flag=M('cart')->where(array('cart_id'=>$cart['cart_id']))->delete();
            if (!$cart_flag) {
                echo json_encode(array('result'=>false, 'show'=>'删除失败', 'num'=>$cart['product_num']));
                exit();
            }
        }
        echo json_encode(array('result'=>true, 'cart_num'=>user_cartnum(), 'num'=>$product_num));
        exit();
    }
}

?>
