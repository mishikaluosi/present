<?php
//订单发货操作
function order_callback_send_success($order, $order_wl_id='', $order_wl_name='') {
    //global $db;
    $info = is_array($order) ? $order :M('order')->where( array('order_id'=>pe_dbhold($order)))->find();
    if (!$info['order_id']) return false;
    if ($order_wl_id) $sql_set['order_wl_id'] = $order_wl_id;
    if ($order_wl_name) $sql_set['order_wl_name'] = $order_wl_name;
    $sql_set['order_state'] = 'success';
    $sql_set['order_sstate'] = 1;
    $sql_set['order_stime'] = time();
    $sql_set['order_ftime'] = time();
    $flag=M('order')->where(array('order_id'=>$info['order_id']))->save(pe_dbhold($sql_set));
    if ($flag) {
        return true;
    } else {
        return false;
    }
}

//url处理函数
function pe_updateurl($k, $v='')
{
    $querystr = $_SERVER['QUERY_STRING'];
    if(strpos($querystr, '/page/')===false){
        $querystr=str_replace('.html','',$querystr);
    }else {
        $querystr=substr($querystr,0,strpos($querystr, '/page/'));
    }
    
    $url = $v === ''
        ? preg_replace('/\b'.$k.'=[^&]*/', '', $querystr)
        : ((stripos($querystr, "&{$k}=") === false && stripos($querystr, "?{$k}=") === false)
            ? "{$querystr}&{$k}={$v}"
            : preg_replace('/\b'.$k.'=[^&]*/', "$k=$v", $querystr));
    $url = trim($url, '&');

    $url=str_replace('&page=','/page/',$url);

    return $url ? "?{$url}.html" : '?';
}
//url批量处理函数
function pe_updateurl_arr($arr)
{
    $querystr = $_SERVER['QUERY_STRING'];
    foreach ($arr as $val) {
        $k = $val[0];
        $v = $val[1];
        $querystr = $v === ''
            ? preg_replace('/'.$k.'=[^&]*/', "", $querystr)
            : (stripos($querystr, $k.'=') === false ? "{$querystr}&{$k}={$v}" : preg_replace('/'.$k.'=[^&]*/', "$k=$v", $querystr));
        $querystr = trim($querystr, '&');
    }
    return $querystr ? '?'.$querystr : '';
}

/**
 * 通用排序
 * @param string $type
 * @param bool $is_prex
 * @return string
 */
function get_sort($type='product',$is_prex=false){
    $sort_str='';
    switch ($type){
        case 'article':
            $sort_str=$is_prex?'article.asort asc,article.id desc':'asort asc,id desc';
            break;
        case 'product':
            $sort_str=$is_prex?'Product.psort asc,Product.id desc':'psort asc,id desc';
            break;
        case 'case':
            $sort_str=$is_prex?'Cases.csort asc,Cases.id desc':'csort asc,id desc';
            break;
        case 'category':
            $sort_str='sort asc,id asc';
            break;
    }
    return $sort_str;
}

/**
 * 获取分类
 * @param $cid
 * @return mixed|null
 */
function get_cate_byid($cid){
    $cate=M('category')->where(array('id'=>$cid))->find();
    if($cate){
        $cate['url']=deal_url($cate);
        return $cate;
    }
    return null;
}


/**
 * url处理
 * @param $t
 * @return string
 */
function deal_url($t){
    if($t['type']==1){
        if(strpos($t['links'], '@')===false){
            $url=$t['links'];
        }else{
            $url=str_replace('@','',$t['links']);
            $url=U($url);
        }
    }else{
        $tc=empty($t['controller'])?'Index':$t['controller'];
        $ta=empty($t['action'])?'index':$t['action'];
        $url=U($tc.'/'.$ta,array('cid'=>$t['id']));
    }
    return $url;
}

/**
 * 处理数量
 * @param $table
 * @param string $where
 * @return mixed
 */
function pe_num($table, $where = '')
{
    if(empty($where)){
        $where=null;
    }
    $count = M($table)->where($where)->count();
    if($count){
        return $count;
    }
    return 0;
}

/***
 * 规格html
 * @param $id
 * @param int $type
 * @return string
 */
function get_rule_html($id,$type=1){
    $list=get_rule_byid($id);
    $html_str='';
    foreach ($list as $v){
        switch ($type){
            case 1:
                $html_str.='<span class="rule_id mal5">'.$v['ruledata_name'].'</span>';
                break;
        }
    }
    return $html_str;
}

/**
 * 获取规格详情
 * @param $id
 * @return bool
 */
function get_rule_byid($id){
    if(!is_numeric($id)){
        return false;
    }
    $list = M('ruledata')->where(array('rule_id'=>$id))->order('sort asc')->select();
    return $list;
}

/**
 * 获取产品规格属性
 * @param $id
 * @return bool
 */
function get_prodata_byid($id){
    if(!is_numeric($id)){
        return false;
    }
    $list = M('prodata')->where(array('product_id'=>$id))->order('sort asc')->select();
    return $list;
}

/**
 * 规格+属性
 * @return mixed
 */
function get_cache_rule(){
    $rule_list = M('rule')->order('`rule_id` desc')->select();
    $new_list=array();
    foreach ($rule_list as $k=>$v){
        $new_list[$v['rule_id']]=$v;
        $new_list[$v['rule_id']]['list']=get_rule_byid($v['rule_id']);
    }
    return $new_list;
}

/**
 * 属性
 * @return mixed
 */
function get_cache_ruledata(){
    $ruledata_list = M('ruledata')->order('rule_id asc, sort asc')->select();
    return deal_arr_index('ruledata_id',$ruledata_list);
}

function deal_arr_index($index,$arr){
    if(empty($arr)){
        return null;
    }
    $new_list=array();
    foreach ($arr as $k=>$v){
        if(array_key_exists($index,$v)){
            $new_list[$v[$index]]=$v;
        }
    }
    return $new_list;
}

//数据库安全
function pe_dbhold($str, $exc=array())
{
    if (is_array($str)) {
        foreach($str as $k => $v) {
            $str[$k] = in_array($k, $exc) ? pe_dbhold($v, 'all') : pe_dbhold($v);
        }
    }
    else {
        //$str = $exc == 'all' ? mysql_real_escape_string($str) : mysql_real_escape_string(htmlspecialchars($str));
        $str = $exc == 'all' ? addslashes($str) : addslashes(htmlspecialchars($str));
    }
    return $str;
}

/**
 * 处理产品图片
 * @param $vo
 * @return array
 */
function deal_pictureurls($vo){
    $pictureurls = array();
    if (!empty($vo['pictureurls'])) {
        $temparr = explode('|||', $vo['pictureurls']);
        foreach ($temparr as $key => $v) {
            $temparr2 = explode('$$$', $v);
            $pictureurls[] = array('url' => ''.$temparr2[0], 'alt' => ''.$temparr2[1]);
        }
    }
    return $pictureurls;
}

function rowspan_list($info_list) {
    if (!is_array($info_list)) return array();
    $rowspan_list = array();
    foreach ($info_list as $k=>$v) {
        foreach ($v['id_arr'] as $kk=>$vv) {
            $line = $k;
            while(true) {
                if ($info_list[$line]['id_arr'][$kk] == $vv && $rowspan_list[$line][$kk] != -1) {
                    $rowspan_list[$k][$kk]++;
                    if ($line > $k) $rowspan_list[$line][$kk] = -1;
                }
                else {
                    break;
                }
                $line++;
            }
        }
    }
    return $rowspan_list;
}

function prodata_list($cache_ruledata,$all_list = array(), $zuhe_list = array()) {
    //global $cache_ruledata;
    $i = 0;
    if (!is_array($all_list) || (is_array($all_list) && !count($all_list))) return $zuhe_list;
    $info_list = array_shift($all_list);
    if (count($zuhe_list)) {
        foreach ($zuhe_list as $v) {
            foreach ($info_list as $vv) {
                $info['id'] = "{$v['id']},{$vv}";
                $info['id_arr'] = explode(',', $info['id']);
                $info['name'] = "{$v['name']},{$cache_ruledata[$vv]['ruledata_name']}";
                $info['name_arr'] = explode(',', $info['name']);
                $zuhe_list[$i++] = $info;
            }
        }
    }
    else {
        foreach ($info_list as $v) {
            $info['id'] = $v;
            $info['id_arr'] = explode(',', $info['id']);
            $info['name'] = $cache_ruledata[$v]['ruledata_name'];
            $info['name_arr'] = explode(',', $info['name']);
            $zuhe_list[$i++] = $info;
        }
    }
    return prodata_list($cache_ruledata,$all_list, $zuhe_list);
}


/**
 *
 * 中英混合的字符串截取
 * @param unknown_type $sourcestr
 * @param unknown_type $cutlength
 */
function frm_substr($sourcestr, $cutlength) {
    $returnstr = '';
    $i = 0;
    $n = 0;
    $str_length = strlen ( $sourcestr ); //字符串的字节数
    while ( ($n < $cutlength) and ($i <= $str_length) ) {
        $temp_str = substr ( $sourcestr, $i, 1 );
        $ascnum = Ord ( $temp_str ); //得到字符串中第$i位字符的ascii码
        if ($ascnum >= 224) {//如果ASCII位高与224，
            $returnstr = $returnstr . substr ( $sourcestr, $i, 3 ); //根据UTF-8编码规范，将3个连续的字符计为单个字符 
            $i = $i + 3; //实际Byte计为3
            $n ++; //字串长度计1
        } elseif ($ascnum >= 192){ //如果ASCII位高与192，
            $returnstr = $returnstr . substr ( $sourcestr, $i, 2 ); //根据UTF-8编码规范，将2个连续的字符计为单个字符
            $i = $i + 2; //实际Byte计为2
            $n ++; //字串长度计1
        } elseif ($ascnum >= 65 && $ascnum <= 90) {//如果是大写字母，
            $returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
            $i = $i + 1; //实际的Byte数仍计1个
            $n ++; //但考虑整体美观，大写字母计成一个高位字符
        }elseif ($ascnum >= 97 && $ascnum <= 122) {
            $returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
            $i = $i + 1; //实际的Byte数仍计1个
            $n ++; //但考虑整体美观，大写字母计成一个高位字符
        } else {//其他情况下，半角标点符号，
            $returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
            $i = $i + 1;
            $n = $n + 0.5;
        }
    }
    return $returnstr;
}

/**
 * 表单验证
 * @param $type
 * @param $value
 * @return bool
 */
function pe_formcheck($type, $value) {
    switch ($type) {
        case 'uname':
            $result = preg_match("/^[A-Za-z0-9\x{4e00}-\x{9fa5}]+$/u", $value) ?  true : false;
            break;
        case 'tname':
            $result = preg_match("/^[\x{4e00}-\x{9fa5}]{2,4}$/u", $value) ?  true : false;
            break;
        case 'phone':
            $result = preg_match("/^1\d{10}$/", $value) ?  true : false;
            break;
        case 'email':
            $result = preg_match("/^[-_A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[a-z]{2,3}$/", $value) ?  true : false;
            break;
        case 'qq':
            $result = preg_match("/^[1-9][0-9]{4,14}$/", $value) ?  true : false;
            break;
    }
    return $result;
}

//数字处理
function deal_num($num, $type, $len = 1, $fix = false) {
    $pow = pow(10, $len);
    if ($type == 'round') {
        $num = round($num, $len);
    }
    elseif ($type == 'ceil') {
        $num = ceil($num * $pow) / $pow;
    }
    elseif ($type == 'floor') {
        $num = floor($num * $pow) / $pow;
    }
    if ($fix == true) {
        $num_arr = explode('.', $num);
        $num = "{$num_arr[0]}.{$num_arr[1]}".str_repeat('0', $len - strlen($num_arr[1]));
    }
    return $num;
}
//获取text
function pe_text($str){
    $str = str_ireplace(array('\t','\r','\n','\rn','&nbsp;',' ','　'), '', strip_tags($str));
    return trim($str);
}

//截取字符串
function pe_cut($str, $len, $tail = '')
{
    $str_len = strlen($str);//字符串总偏移量
    $i = 0;//截取汉字时字符偏移量
    $l = 0;//已截取了的汉字长度
    $cnstr='';
    while (true) {
        if (ord(substr($str, $i, 1)) > 0xa0) {//中文
            $cnstr .= substr($str, $i, 3);
            $i += 3;
            $l++;
        }
        else {//字母，字符，数字
            $cnstr .= substr($str, $i, 1);
            $i++;
            $l += 0.5;
        }
        if ($l == $len or ($l+0.5) == $len) {
            return $str_len <= $i ? $cnstr : $cnstr . $tail;
        }
    }
}

//用户检测是否登录状态
function logined() {
    if ($_SESSION['user_id']) return true;
    return false;
}

/**
 * 商品数量更新
 * @param $id
 * @param $type
 * @param int $num 默认1
 */
function product_jsnum($id, $type, $num = 1) {

    switch ($type) {
        case 'add_num':
        case 'del_num':
            $product_guid = intval($id);
            $info=M('prodata')->field('product_id, product_num')->where(array('product_guid'=>$product_guid))->find();
            if ($type == 'add_num') {
                $product_num = $info['product_num'] + $num;
            } else {
                $product_num = $info['product_num'] > $num ? ($info['product_num'] - $num) : 0;
            }
            M('prodata')->where(array('product_guid'=>$product_guid))->save(array('product_num'=>$product_num));

            $product=M('prodata')->field('sum(product_num) as `product_num`')->where(array('product_id'=>$info['product_id']))->find();

            M('product')->where(array('id'=>$info['product_id']))->save(array('num'=>$product['product_num']?$product['product_num']:0));
            break;
        case 'add_sellnum':
        case 'del_sellnum':
            $product_id = intval($id);
            $info = M('product')->field('id,sellnum')->find($product_id);
            if ($type == 'add_sellnum') {
                $product_sellnum = $info['sellnum'] + $num;
            }
            else {
                $product_sellnum = $info['sellnum'] > $num ? ($info['sellnum'] - $num) : 0;
            }
            M('product')->where(array('id'=>$info['id']))->save(array('sellnum'=>$product_sellnum));
            break;
        case 'clicknum':
            //todo:点击量先不做
            //$product_id = intval($id);
            //$db->pe_update('product', array('product_id'=>$product_id), "`product_clicknum` = `product_clicknum` + ".rand(3, 5)."");
            break;
    }
}


//获取购买商品信息
function product_buyinfo($product_guid) {
    $sql_field = "a.`product_id`, a.`product_guid`, a.`product_rule`, a.`product_money`,a.`product_num`, b.`title`, b.`litpic`, b.`wlmoney`";
    $sql = "select {$sql_field} from `bestop_prodata` a, `bestop_product` b where a.`product_id` = b.`id` and a.`product_guid` = '{$product_guid}' and b.`status` = 1";
    $info = M('product')->query($sql);
    return $info;
}

//获取购物车商品数
function user_cartnum() {
    $user_id = $_SESSION['user_id'];
    $info_list =M('cart')->where(array('cart_act'=>'cart', 'user_id'=>$user_id))->select();
    $cartnum=0;
    foreach ($info_list as $v) {
        $cartnum += $v['product_num'];
    }
    return intval($cartnum);
}

//购物车列表及检测
function cart_list($cart_id = null) {
    $all_list = $del_list = array();
    $user_id = $_SESSION['user_id'];
    $sql_where=' 1=1 ';
    if ($cart_id === 'all') {
        $sql_where.=' and cart_act="cart"';
    } else {
        $sql_where.=' and cart_id in ('.pe_dbhold($cart_id).')';
    }
    $sql_where.=' and user_id='.$user_id;
    $info_list=M('cart')->where($sql_where)->select();//var_dump($info_list);exit();
    $cart_num = count($info_list);
    foreach ($info_list as $k=>$v) {
        $error = null;
        $product_guid = intval($v['product_guid']);
        $product = product_buyinfo($product_guid);//b.`title`, b.`litpic`, b.`wlmoney`
        if($product){
            $product=$product[0];
        }
        $buy['cart_id'] = $v['cart_id'];
        //检测商品是否失效或删除并格式化商品数据
        if ($product['product_id'] && $product['product_guid']) {
            $buy['product_id'] = $product['product_id'];
            $buy['product_guid'] = $product['product_guid'];
            $buy['product_name'] = $product['title'];
            $buy['product_rule'] = $product['product_rule'];
            $buy['product_logo'] = $product['litpic'];
            $buy['product_money'] = $product['product_money'];
            $buy['product_maxnum'] = $product['product_num'];
            $buy['product_num'] = $v['product_num'];
            if (!$error && $buy['product_num'] > $buy['product_maxnum']) {
                $error = array('show'=>"仅剩{$buy['product_maxnum']}件");
            }
        } else {
            $buy['product_id'] = $v['product_id'];
            $buy['product_guid'] = $v['product_guid'];
            $buy['product_name'] = $v['title'];
            $buy['product_rule'] = $v['product_rule'];
            $buy['product_logo'] = $v['litpic'];
            $buy['product_money'] = $v['product_money'];
            $buy['product_maxnum'] = $v['product_num'];
            $buy['product_num'] = $v['product_num'];
            $error = array('show'=>'下架或失效', 'del'=>true);
        }
        $buy['product_allmoney'] = $buy['product_money'] * $buy['product_num'];
        $all_list[$product_guid] = $buy;
        $all_list[$product_guid]['error'] = $error;
        if ($error['del']) $del_list[$product_guid] = $all_list[$product_guid];
        $info['order_type'] = $v['cart_type'];
        $info['order_name'][] = $product['title'];
        $info['order_product_money'] += $buy['product_allmoney'];
        $info['order_wl_money'] =0;//+= $product['wlmoney'];//TODO:运费处理
    }
    //格式化显示数据
    $info['order_name'] = is_array($info['order_name']) ? implode(';', $info['order_name']) : '';
    $info['order_product_money'] = deal_num($info['order_product_money'], 'round', 1, true);
    $info['order_wl_money'] = deal_num($info['order_wl_money'], 'round', 1, true);
    $info['order_money'] = deal_num($info['order_product_money'] + $info['order_wl_money'], 'round', 1, true);
    return array('all_list'=>$all_list, 'del_list'=>$del_list, 'info'=>$info);
}

/**
 * 系统支持的支付方式
 * @return mixed
 */
function cache_payment(){
    $order='`payment_order` asc, `payment_id` asc';
    $filed='payment_id, payment_name, payment_type, payment_desc, payment_config, payment_state';
    $info_list = M('payment')->field($filed)->where()->order($order)->select();
    $info_list=deal_arr_index('payment_type',$info_list);
    foreach ($info_list as $k=>$v) {
        $info_list[$k]['payment_config'] = unserialize($v['payment_config']);
    }
    return $info_list;
}


//订单支付方式
function payment_list($type = 'order') {
    $cache_payment = cache_payment();
    $payment_list = array();
    if(!logined()){
        return null;
    }
    foreach ($cache_payment as $k=>$v) {
        if (!$v['payment_state']) continue;
        if ($type == 'order') {
            $payment_list[$k]['payment_name'] = $v['payment_name'];
            $payment_list[$k]['payment_type'] = $v['payment_type'];
        } elseif ($type == 'pay' && !in_array($v['payment_type'], array('cod', 'balance', 'bank'))) {
            $payment_list[$k]['payment_name'] = $v['payment_name'];
            $payment_list[$k]['payment_type'] = $v['payment_type'];
        } elseif ($type == 'admin' && !in_array($v['payment_type'], array('cod', 'bank'))) {
            $payment_list[$k]['payment_name'] = $v['payment_name'];
            $payment_list[$k]['payment_type'] = $v['payment_type'];
        }
    }
    return $payment_list;
}


//获取下单收货地址
function useraddr_info($zc_id) {
    $zc_info=M('zc')->find($zc_id);
    $info=array(
        "address_id"=>$zc_id,
        "address_area"=>$zc_info['area'],
        "address_atime"=>$zc_info['addtime'],
        "address_city"=>$zc_info['city'],
        "address_default"=> "1",
        "address_province"=>$zc_info['prov'],
        "address_text"=>$zc_info['addr'],
        'zc_contact'=>$zc_info['contact'],
        'zc_tel'=>$zc_info['tel'],
        'zc_name'=>$zc_info['name'],
        "user_id"=>$_SESSION['user_id'],
        "user_name"=>$_SESSION['user_name'],
        "user_phone"=>$_SESSION['user_phone'],
        "user_tname"=>$_SESSION['user_name'],
    );
    return $info;
}

//订单商品规格显示
function order_skushow($product_rule) {
    $html = '';
    if ($product_rule) {
        $product_rule = unserialize($product_rule);
        foreach ($product_rule as $v) {
            $html .= "{$v['name']}：{$v['value']}；";
        }
    }
    return trim($html, '；');
}

//生成唯一id
function pe_guid($table = null, $prefix = null) {
    $guid = date('ymdHis').mt_rand(0,9).mt_rand(0,9).mt_rand(0,9);
    $guid = $prefix ? "{$prefix}_{$guid}" : $guid;
    if (!$table) return $guid;
    $table_arr = explode('|', $table);
    if (pe_num($table_arr[0], array($table_arr[1]=>$guid))) {
        return pe_guid($table, $prefix);
    }
    else {
        return $guid;
    }
}


//订单创建操作
function order_calback_add($order, $cart_id = array()) {
    $info = is_array($order) ?$order:M('order')->where(array('order_id'=>pe_dbhold($order)))->find();
    if (!$info['order_id']) return false;
    //更新商品库存
    $orderdata_list =M('orderdata')->where(array('order_id'=>$info['order_id']))->select();
    foreach ($orderdata_list as $v) {
        product_jsnum($v['product_guid'], 'del_num', $v['product_num']);
    }
    //更新用户订单数
    $user_ordernum = pe_num('order', array('user_id'=>$info['user_id']));
    M('member')->where(array('id'=>$info['user_id']))->save(array('user_ordernum'=>$user_ordernum));
    //清空购物车
    M('cart')->where(array('cart_id'=>pe_dbhold($cart_id)))->delete();
    return true;
}

//获取订单对应表名
function order_table($id) {
    if (stripos($id, '_') !== false) {
        $id_arr = explode('_', $id);
        return "order_{$id_arr[0]}";
    }
    else {
        return "order";
    }
}

//订单付款操作
function order_callback_pay($order, $order_outid = '', $order_payment = '') {
    $cache_payment = cache_payment();
    $info = is_array($order) ? $order :M(order_table($order))->where(array('order_id'=>pe_dbhold($order)))->find() ;

    if (!$info['order_id']) return false;
    if (order_table($info['order_id']) != 'order')  return false;
    if($info['order_state']!='wpay') return false;

    if ($order_outid) $sql_set['order_outid'] = $order_outid;
    if ($order_payment) {
        $sql_set['order_payment'] = $order_payment;
        $sql_set['order_payment_name'] = $cache_payment[$order_payment]['payment_name'];
    }

    $sql_set['order_state'] =  'wget';
    $sql_set['order_pstate'] = 1;
    $sql_set['order_ptime'] = time();

    if (M('order')->where(array('order_id'=>$info['order_id']))->save(pe_dbhold($sql_set))) {
        //更新商品销量
        $orderdata_list =M('orderdata')->where(array('order_id'=>$info['order_id']))->select();
        foreach ($orderdata_list as $v) {
            product_jsnum($v['product_id'], 'add_sellnum', $v['product_num']);
        }
        return true;
    } else {
        return false;
    }
}


//订单支付后跳转
function order_pay_goto($order_id, $jump = 1) {
    if (order_table($order_id) == 'order_pay') {
        $show = '充值成功！';
        $url =U("User/moneylog");
    } else {
        $show = '支付成功！';
        $info =M('order')->where(array('order_id'=>$order_id))->find();
        $url =U("Order/view",array("id"=>$order_id));
    }
    if ($jump) {
        pe_success($show, $url);
    }
    else {
        return array('show'=>$show, 'url'=>$url);
    }
}


//订单关闭操作
function order_callback_close($order, $order_closetext = '', $refund = true) {
    $info = is_array($order) ? $order : M('order')->where(array('order_id'=>pe_dbhold($order)))->find();
    if (!$info['order_id']) return false;
    if ($info['order_state'] == 'close') return true;
    $sql_set['order_ftime'] = time();
    $sql_set['order_state'] = 'close';
    $sql_set['order_closetext'] = $order_closetext;
    $flag=M('order')->where(array('order_id'=>$info['order_id']))->save(pe_dbhold($sql_set));
    if ($flag) {
        if ($info['order_pstate'] && $refund) {
            //已付款生成退款单退款
            //order_callback_refund($info, $order_closetext);
            return false;
        } else {
            //未付款可以释放商品库存
            $info_list = M('orderdata')->where(array('order_id'=>$info['order_id']))->select();
            foreach ($info_list as $v) {
                product_jsnum($v['product_guid'], 'add_num', $v['product_num']);
            }
        }
        return true;
    } else {
        return false;
    }
}

//订单状态计算
function order_stateshow($state, $type = 'html') {
    $text = '';
    if ($state == 'success') {
        $text = '交易完成';
        $html = "<span class=\"cgreen\">交易完成</span>";
    } else if ($state == 'close') {
        $text = '交易关闭';
        $html = "<del class=\"c999\">交易关闭</del>";
    } else if ($state == 'wpay') {
        $text = '待付款';
        $html = "<span class=\"corg\">待付款</span>";
    } else {
        $text = '交易中';
        $html = "<span class=\"corg\">交易中</span>";
    }
    return $type == 'html' ? $html : $text;
}

//转换日期
function pe_date($time, $type = 'Y-m-d H:i') {
    return $time ? date($type, $time) : '';
}

//订单调价显示
function order_jjmoney_show($money) {
    if ($money > 0) {
        return '手动改价 +'.round($money, 1).'元';
    }
    elseif ($money < 0) {
        return '手动改价 '.round($money, 1).'元';
    }
    return '-';
}

//####################// 处理结果展示 //####################//
function pe_success($msg, $url=null, $type=null)
{
    $_SESSION['msg_show'] = $msg;
    $_SESSION['msg_result'] = 'success';
    pe_goto($url, $type);
}
function pe_error($msg, $url=null, $type=null) {
    $_SESSION['msg_show'] = $msg;
    $_SESSION['msg_result'] = 'error';
    pe_goto($url, $type);
}
//跳转函数
function pe_goto($url = '', $type = 'default')
{
    global $pe;
    if ($type == 'dialog') {
        $url = $url ? "top.location.href = '{$url}'" : "top.location.reload()";
    }
    else {
        $url = $url ? $url : (stripos($_SERVER['HTTP_REFERER'], $pe['host_root']) === false ? $pe['host_root'] : $_SERVER['HTTP_REFERER']);
        $url = "window.location.href='{$url}'";
    }
    echo "<script type='text/javascript'>{$url}</script>";
    die();
}
//####################// 处理结果展示 //####################//
?>