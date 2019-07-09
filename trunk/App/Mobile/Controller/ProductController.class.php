<?php

namespace Mobile\Controller;

class ProductController extends MobileCommonController{

	public function index(){
		$this->display();
	}

	public function detail(){
		$product_id=I('id',null);
		$info=M('product')->find($product_id);
        $good_detail=$info;
		if(!$info['id']){
		    $this->error('错误请求',U(MODULE_NAME."/Index/index"));
		}
        //商品规格
        if ($info['rules']) {
            $rule_list = unserialize($info['rules']);
            $product_guid = '';
        } else {
            $rule_list = array();
            $prodata=M('prodata')->where(array('product_id'=>$product_id))->find();
            $product_guid = $prodata['product_guid'];
        }
        $prodata_list=M('prodata')->field('product_guid, product_ruleid, product_money,  product_num')->where(array('product_id'=>$product_id))->order('sort asc')->select();

        foreach ($prodata_list as $k=>$v) {
            $prodata_list[$k]['product_money'] = $v['product_money'];
            if (!$v['product_num']) unset($prodata_list[$k]);
        }

		//var_dump($prodata_list);exit();
        $prodata_list = json_encode($prodata_list);

        //更新点击
        product_jsnum($product_id, 'clicknum');
        //商品相册
        $album_list=$info['pictureurls'] = deal_pictureurls($info);
        //当前路径
        $info['content'] = $info['content'] ? $info['content'] : pe_cut(pe_text($info['content']), 200);

        $this->assign('info',$info);
        $this->assign('album_list',$album_list);
        $this->assign('prodata_list',$prodata_list);
        $this->assign('good_detail',$good_detail);
        $this->assign('rule_list',$rule_list);
        $this->assign('product_guid',$product_guid);
        $this->assign('id',$product_id);
        $this->display();
	}

    protected function _frm_ret($result,$show){
        $return_arr=array('result'=>$result, 'show'=>$show);
        echo json_encode($return_arr);
        exit();
    }

    /**
     * 产品页面加入购物车&立即购买
     */
	public function cart(){
        $product_id=I('id',null);
        $act=trim(I('type',null));
        $product_guid=trim(I('guid',null));
        $product_num=trim(I('num',null));

        if (!logined()){
            $this->_frm_ret(false,'请先登录');
        }
        //检测库存
        $product = product_buyinfo($product_guid);//b.`title`, b.`litpic`, b.`wlmoney`
        if($product){
            $product=$product[0];
        }
        if (!$product['product_id']) {
            $this->_frm_ret(false,'商品下架或失效');
        }
        if ($product['product_num'] < $product_num){
            $this->_frm_ret(false,"库存仅剩{$product['product_num']}件");
        }

        //购物车
        $cart=M('cart')->where( array('cart_act'=>'cart', 'user_id'=>$this->_xzl_uid, 'product_guid'=>$product_guid))->find();
        if ($act == 'add' && $cart['cart_id']) {//加购物车[购物车已有]
            $sql_set['product_num'] = $cart['product_num'] + $product_num;
            if ($product['product_num'] < $sql_set['product_num']) {
                $this->_frm_ret(false,"库存仅剩{$product['product_num']}件");
            }
            $cart_flag=M('cart')->where(array('cart_id'=>$cart['cart_id']))->save($sql_set);
            if (!$cart_flag){
                $this->_frm_ret(false,'异常请重新操作');
            }
            $cart_id = $cart['cart_id'];
        } else {
            $sql_set['cart_act'] = $act == 'add' ? 'cart' : 'buy';
            $sql_set['cart_type'] = 'fixed';
            $sql_set['cart_atime'] = time();
            $sql_set['product_id'] = $product['product_id'];
            $sql_set['product_guid'] = $product['product_guid'];
            $sql_set['product_name'] = $product['title'];
            $sql_set['product_rule'] = $product['product_rule'];
            $sql_set['product_logo'] = $product['litpic'];
            $sql_set['product_money'] = $product['product_money'];
            $sql_set['product_num'] = $product_num;
            $sql_set['user_id'] = $this->_xzl_uid;

            $cart_id =M('cart')->add(pe_dbhold($sql_set, array('product_rule')));
            if (!$cart_id){
                $this->_frm_ret(false,'异常请重新操作');
            }
        }
        echo json_encode(array('result'=>true, 'id'=>$cart_id, 'cart_num'=>user_cartnum()));
        exit();
    }
}

?>
