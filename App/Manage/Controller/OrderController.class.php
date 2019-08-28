<?php
namespace Manage\Controller;
use phpDocumentor\Reflection\Types\Null_;
use Think\Controller;

class OrderController extends CommonController {

    private function _get_zcinfo(){
        if($_SESSION['ADMIN_AUTH_KEY']==true){
            $this->assign('_admin_flag',true);
        }else{
            $this->assign('_admin_flag',false);
            $user_name=$_SESSION['yang_adm_username'];
            $zcinfo=M('admin')->where(array('username'=>$user_name))->find();
            $this->assign('_zcinfo',$zcinfo);
            return $zcinfo;
        }
        return 0;
    }

	public function index() {
        $where=$this->_search();

        $count = M('order')->where($where)->count();
        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $art = M('order')->where($where)->order('order_atime desc')->limit($limit)->select();
        $info_list=$art;
        foreach ($info_list as $k => $v) {
            $info_list[$k]['product_list'] =M('orderdata')->where(array('order_id'=>$v['order_id']))->select();
        }

        //统计订单数量
        $tongji['all'] = pe_num('order',null);
        $tongji['wpay'] = pe_num('order', array( 'order_state'=>'wpay'));
        $tongji['wget'] =pe_num('order', array('order_state'=>'wget'));
        $tongji['success'] =pe_num('order', array('order_state'=>'success'));
        $tongji['close'] =pe_num('order', array('order_state'=>'close'));
        $tongji['change'] =pe_num('order', array('edit_flag'=>1));
        $tongji['change_ok'] =pe_num('order', array('edit_flag'=>2));

        $this->assign('tongji', $tongji);
        $this->assign('page', $page->show());
        $this->assign('info_list', $info_list);
		$this->display();
	}

	public function zccptj(){
        $ret=$this->get_zccptj();
        $this->assign('total_num',$ret['total_num']);
        $this->assign('total_money',$ret['total_money']);
        $this->assign('vlist',$ret['info_list']);
        $this->display();
    }

    public function zcrytj(){
        $ret=$this->get_zcrytj();
        $this->assign('total_num',$ret['total_num']);
        $this->assign('total_money',$ret['total_money']);
        $this->assign('vlist',$ret['info_list']);
        $this->display();
    }

    public function get_zccptj(){
        $where=$this->_zc_search();
        $sql=<<<eot
select bestop_orderdata.zc_id, sum(product_num) as num ,sum(product_allmoney) as money 
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success" and {$where}
group by zc_id
order by order_stime desc
eot;
        //var_dump($sql);exit();
        $vlist=M('order')->query($sql);
        $info_list=null;
        $total_num=$total_money=0;
        foreach ($vlist as $k=>$v){
            $total_num+=$v['num'];
            $total_money+=$v['money'];
            $info_list[$k]=$v;
            $tmp_zc=M('zc')->where(array('id'=>$v['zc_id']))->find();
            if($tmp_zc){
                $info_list[$k]['prov']=$tmp_zc['prov'];
                $info_list[$k]['city']=$tmp_zc['city'];
                $info_list[$k]['area']=$tmp_zc['area'];
                $info_list[$k]['addr']=$tmp_zc['addr'];
                $info_list[$k]['tel']=$tmp_zc['tel'];
                $info_list[$k]['contact']=$tmp_zc['contact'];
                $info_list[$k]['zc']=$tmp_zc['name'];

                //自购人数
                $zg_sql=<<<eot
select distinct user_id from  bestop_order
where  bestop_order.order_state="success"  and bestop_order.zc_id={$v['zc_id']} and {$where}
order by order_stime desc
eot;
                $zg=M('order')->query($zg_sql);
                $info_list[$k]['zg_cnt']=count($zg)>0?count($zg):0;

                //产品详情
                $cp_sql=<<<eot
select bestop_orderdata.product_id,bestop_orderdata.product_name, sum(product_num) as num ,sum(product_allmoney) as money 
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success"  and bestop_order.zc_id={$v['zc_id']} and {$where}
group by product_id
order by product_id DESC 
eot;
                $cp=M('order')->query($cp_sql);
                $info_list[$k]['cp_list']=$cp;

            }

        }
        return array('info_list'=>$info_list,"total_money"=>$total_money,"total_num"=>$total_num);
    }

    public function get_zcrytj(){
        $where=$this->_zc_search();
        $sql=<<<eot
select bestop_orderdata.uid,bestop_orderdata.zc_id, sum(product_num) as num ,sum(product_allmoney) as money 
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success" and {$where}
group by bestop_orderdata.uid
order by bestop_orderdata.zc_id desc,order_stime desc
eot;
        //var_dump($sql);exit();
        $vlist=M('order')->query($sql);
        $info_list=null;
        $total_num=$total_money=0;
        foreach ($vlist as $k=>$v){
            $total_num+=$v['num'];
            $total_money+=$v['money'];
            $info_list[$k]=$v;
            $tmp_uinfo=M('member')->where(array('id'=>$v['uid']))->find();
            if($tmp_uinfo){
                $info_list[$k]['uname']=$tmp_uinfo['name'];
                $info_list[$k]['tel']=$tmp_uinfo['phone'];
                $info_list[$k]['group_no']=$tmp_uinfo['group_no'];
                $tmp_zc=M('zc')->where(array('id'=>$tmp_uinfo['zc_id']))->find();
                if($tmp_zc){
                    $info_list[$k]['prov']=$tmp_zc['prov'];
                    $info_list[$k]['city']=$tmp_zc['city'];
                    $info_list[$k]['area']=$tmp_zc['area'];
                    $info_list[$k]['addr']=$tmp_zc['addr'];
                    $info_list[$k]['zc']=$tmp_zc['name'];
                }

                //产品详情
                $cp_sql=<<<eot
select bestop_orderdata.product_id,bestop_orderdata.product_name, sum(product_num) as num ,sum(product_allmoney) as money 
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success"  and bestop_orderdata.uid={$v['uid']} and {$where}
group by product_id
order by product_id DESC 
eot;
                $cp=M('order')->query($cp_sql);
                $info_list[$k]['cp_list']=$cp;
            }

        }
        return array('info_list'=>$info_list,"total_money"=>$total_money,"total_num"=>$total_num);
    }

    public function zctj(){
        $ret=$this->get_zctj();
        $this->assign('total_num',$ret['total_num']);
        $this->assign('total_money',$ret['total_money']);
        $this->assign('vlist',$ret['info_list']);
        $this->display();
    }

    public function get_zctj(){
        $where=$this->_zc_search();
        $sql=<<<eot
select bestop_orderdata.zc_id,bestop_orderdata.product_id, sum(product_num) as num ,sum(product_allmoney) as money 
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success" and {$where}
group by product_id,zc_id
order by order_stime desc
eot;
        //var_dump($sql);exit();
        $vlist=M('order')->query($sql);
        $info_list=null;
        $total_num=$total_money=0;
        foreach ($vlist as $k=>$v){
            $total_num+=$v['num'];
            $total_money+=$v['money'];
            $info_list[$k]=$v;
            $tmp_zc=M('zc')->where(array('id'=>$v['zc_id']))->find();
            if($tmp_zc){
                $info_list[$k]['prov']=$tmp_zc['prov'];
                $info_list[$k]['city']=$tmp_zc['city'];
                $info_list[$k]['area']=$tmp_zc['area'];
                $info_list[$k]['zc']=$tmp_zc['name'];
            }
            $tmp_pro=M('product')->field('title,litpic')->where(array('id'=>$v['product_id']))->find();
            if($tmp_pro){
                $info_list[$k]['product']=$tmp_pro['title'];
                $info_list[$k]['litpic']=$tmp_pro['litpic'];
            }
        }
        return array('info_list'=>$info_list,"total_money"=>$total_money,"total_num"=>$total_num);
    }

    public function get_ywytj(){
        $where=$this->_ywy_search();
        $sql=<<<eot
select bestop_orderdata.uid,bestop_orderdata.product_id, sum(product_num) as num ,sum(product_allmoney) as money 
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success" and {$where}
group by bestop_orderdata.product_id,bestop_orderdata.uid
order by order_stime desc
eot;
        //var_dump($sql);exit();
        $vlist=M('order')->query($sql);
        $info_list=null;
        $total_num=$total_money=0;
        foreach ($vlist as $k=>$v){
            $total_num+=$v['num'];
            $total_money+=$v['money'];
            $info_list[$k]=$v;
            $tmp_uinfo=M('member')->where(array('id'=>$v['uid']))->find();
            if($tmp_uinfo){
                $info_list[$k]['uname']=$tmp_uinfo['name'];
                $info_list[$k]['tel']=$tmp_uinfo['phone'];
                $info_list[$k]['group_no']=$tmp_uinfo['group_no'];
                $info_list[$k]['work_no']=$tmp_uinfo['work_no'];
                $tmp_zc=M('zc')->where(array('id'=>$tmp_uinfo['zc_id']))->find();
                if($tmp_zc){
                    $info_list[$k]['prov']=$tmp_zc['prov'];
                    $info_list[$k]['city']=$tmp_zc['city'];
                    $info_list[$k]['area']=$tmp_zc['area'];
                    $info_list[$k]['zc']=$tmp_zc['name'];
                }
            }
            $tmp_pro=M('product')->field('title,litpic')->where(array('id'=>$v['product_id']))->find();
            if($tmp_pro){
                $info_list[$k]['product']=$tmp_pro['title'];
                $info_list[$k]['litpic']=$tmp_pro['litpic'];
            }
        }
        return array('info_list'=>$info_list,"total_money"=>$total_money,"total_num"=>$total_num);
    }

    public function ywytj(){
        $ret=$this->get_ywytj();
        $this->assign('total_num',$ret['total_num']);
        $this->assign('total_money',$ret['total_money']);
        $this->assign('vlist',$ret['info_list']);
        $this->display();
    }

    public function _ywy_search(){
        $where=' 1=1 ';

        $_zcinfo=$this->_get_zcinfo();
        $kw_arr=array('sname','sprov','scity','sarea','sstime','setime','sstime_e','setime_e');
        foreach ($kw_arr as $k=>$v){
            $params[$v] = I($v, '', 'htmlspecialchars,trim');
            $this->assign($v,$params[$v]);
        }
        $this->assign('search_p',$params);

        $table_pre='bestop_order.';
        if(!empty($params['sarea'])&&$params['sarea']!='请选择'){
            $where.=' and '.$table_pre.'area like "'.$params['sarea'].'%"';
        }
        if(!empty($params['sname'])){
            $where.=' and '.$table_pre.'user_name like "%'.$params['sname'].'%"';
        }
        if(!empty($params['sstime'])){
            $where.=' and '.$table_pre.'order_ptime >='.strtotime($params['sstime'].' 00:00:00');
        }
        if(!empty($params['setime'])){
            $where.=' and '.$table_pre.'order_ptime <='.strtotime($params['setime'].' 23:59:59');
        }
        if(!empty($params['sstime_e'])){
            $where.=' and '.$table_pre.'order_ftime >='.strtotime($params['sstime_e'].' 00:00:00');
        }
        if(!empty($params['setime_e'])){
            $where.=' and '.$table_pre.'order_ftime <='.strtotime($params['setime_e'].' 23:59:59');
        }

        if(!empty($_zcinfo)){
            $where.=' and  '.$table_pre.'zc_id='.$_zcinfo['zc_id'].'';
        }
        return $where;
    }

    public function _zc_search(){

        $_zcinfo=$this->_get_zcinfo();

        $where=' 1=1 ';

        $kw_arr=array('sname','sprov','scity','sarea','sstime','setime','sstime_e','setime_e');
        foreach ($kw_arr as $k=>$v){
            $params[$v] = I($v, '', 'htmlspecialchars,trim');
            $this->assign($v,$params[$v]);
        }
        $this->assign('search_p',$params);

        $table_pre='bestop_order.';
        if(!empty($params['sarea'])&&$params['sarea']!='请选择'){
            $where.=' and '.$table_pre.'area like "'.$params['sarea'].'%"';
        }
        if(!empty($params['sname'])){
            $where.=' and '.$table_pre.'zc like "%'.$params['sname'].'%"';
        }
        if(!empty($params['sstime'])){
            $where.=' and '.$table_pre.'order_ptime >='.strtotime($params['sstime'].' 00:00:00')." ";
        }
        if(!empty($params['setime'])){
            $where.=' and '.$table_pre.'order_ptime <='.strtotime($params['setime'].' 23:59:59')." ";
        }
        if(!empty($params['sstime_e'])){
            $where.=' and '.$table_pre.'order_ftime >='.strtotime($params['sstime_e'].' 00:00:00')." ";
        }
        if(!empty($params['setime_e'])){
            $where.=' and '.$table_pre.'order_ftime <='.strtotime($params['setime_e'].' 23:59:59')." ";
        }

        if(!empty($_zcinfo)){
            $where.=' and  '.$table_pre.'zc_id='.$_zcinfo['zc_id'].'';
        }

        return $where;
    }

	public function view(){
        $order_id = pe_dbhold(I('id',null));
        $info =M('order')->where( array('order_id'=>$order_id))->find();
        $product_list=M('orderdata')->where(array('order_id'=>$order_id))->select();
        $elist=empty($info['edit_text'])?'':explode('|||',$info['edit_text']);

        $this->assign('order_id',$order_id);
        $this->assign('info',$info);
        $this->assign('product_list',$product_list);
        $this->assign('elist',$elist);
        $this->display();
    }

    public function changem(){
        $order_id = pe_dbhold(I('id',null));
        $info =M('order')->where( array('order_id'=>$order_id))->find();
        $product_list=M('orderdata')->where(array('order_id'=>$order_id))->select();

        $this->assign('order_id',$order_id);
        $this->assign('info',$info);
        $this->assign('product_list',$product_list);
        $this->display();
    }

    public function changem_save(){
        $order_id = pe_dbhold(I('id',null));
        $info =M('order')->where( array('order_id'=>$order_id))->find();
        $product_list=M('orderdata')->where(array('order_id'=>$order_id))->select();

        $product_num=I('product_num',0);
        $product_jjmoney=I('product_jjmoney',0);
        $order_product_money=0;
        $edit_text=empty($info['edit_text'])?"":$info['edit_text'];
        $jgf="|||";
        foreach ($product_list as $v) {
            $sql_set['product_jjmoney'] = deal_num($product_jjmoney[$v['orderdata_id']], 'round', 1);
            $sql_set['product_num']= $product_num[$v['orderdata_id']];
            $sql_set['product_allmoney'] = deal_num($v['product_money'] * $sql_set['product_num'] + $sql_set['product_jjmoney'], 'round', 1);
            M('orderdata')->where(array('orderdata_id'=>$v['orderdata_id']))->save(pe_dbhold($sql_set));

            $order_product_money += $sql_set['product_allmoney'];
            if($sql_set['product_num']!=$v['product_num']){
                $t1_text="[".date("Y-m-d H:i:s")."] {$v['product_name']} (id:{$v['product_id']}) 购买数量由 {$v['product_num']} 更改为 {$sql_set['product_num']}";
                $edit_text.=empty($edit_text)?$t1_text:$jgf.$t1_text;
            }
            if($sql_set['product_jjmoney']!=$v['product_jjmoney']){
                $t2_text="[".date("Y-m-d H:i:s")."] {$v['product_name']} (id:{$v['product_id']}) 加了：{$sql_set['product_jjmoney']} 元";
                $edit_text.=empty($edit_text)?$t2_text:$jgf.$t2_text;
            }
        }
        $sql_order['order_product_money'] = $order_product_money;
        $sql_order['order_money'] = $order_product_money;
        $sql_order['edit_flag']=2;
        $sql_order['edit_text']=$edit_text;
        $flag=M('order')->where(array('order_id'=>$order_id))->save( pe_dbhold($sql_order));
        if ($flag) {
            pe_success('操作成功!', '', 'dialog');
        } else {
            pe_error('操作失败...', '', 'dialog');
        }
    }

    public function fh(){
        $key=I('key',null);
	    if(empty($key)){
            $this->error('错误的请求...');
        }
        if(!is_array($key)){
	        $ids[]=$key;
        }else{
            $ids=$key;
        }
        $ret=array('ok'=>0,'err'=>0,'cnt'=>count($key));
        foreach ($ids as $id){
            $tmp_flag=$this->fh_update($id);
            if($tmp_flag){
                $ret['ok']+=1;
            }else{
                $ret['err']+=1;
            }
        }
        if($ret['cnt']==1){
            $this->success('发货成功...', U('Order/index'));
        }else{
            $this->success("批量发货{$ret['cnt']}条，成功{$ret['ok']}条，失败{$ret['err']}条", U('Order/index'),5);
        }
    }

    private function fh_update($id){
        $order_id = pe_dbhold($id);
        $info = M('order')->where( array('order_id'=>$order_id))->find();
        if ($info['order_state'] != 'wget') {
            return false;
        }
        $result = order_callback_send_success($info, null, null);
        if ($result) {
            return true;
        }else{
            return false;
        }

    }

    public function del(){
        $order_id = pe_dbhold(I('id',null));
        $info =M('order')->where( array('order_id'=>$order_id))->find();
        if ($info['order_state'] != 'close') {
            $this->error('未关闭订单不能删除...');
        }
        $flag=M('order')->where( array('order_id'=>$order_id))->delete();
        if ($flag) {
            M('orderdata')->where( array('order_id'=>$order_id))->delete();
            $this->redirect('Order/index', array('fp' => 'close'));
        } else {
            $this->error('删除失败...');
        }
    }

	private function _search(){
        $fp=I('fp','all');
        $where=' 1=1 ';
        switch ($fp){
            case 'all':break;
            case 'wpay':$where.=' and order_state="wpay" ';break;
            case 'wget':$where.=' and order_state="wget" ';break;
            case 'success':$where.=' and order_state="success" ';break;
            case 'change':$where.=' and edit_flag=1 ';break;
            case 'change_ok':$where.=' and edit_flag=2 ';break;
            case 'close':$where.=' and order_state="close" ';break;
        }
        $this->assign('fp', $fp);

        $kw_arr=array('sname','sphone','sprov','scity','sarea','sorderno','sstime','setime');
        foreach ($kw_arr as $k=>$v){
            $params[$v] = I($v, '', 'htmlspecialchars,trim');
            $this->assign($v,$params[$v]);
        }
        $this->assign('search_p',$params);

        if(!empty($params['sarea'])&&$params['sarea']!='请选择'){
            //$tmp_addr=frm_substr($params['sprov'],2).'%'.frm_substr($params['scity'],2).'%'.frm_substr($params['sarea'],2);
            //$where.=' and user_address like "'.$tmp_addr.'%"';
            $where.=' and area like "'.$params['sarea'].'%"';
        }

        if(!empty($params['sname'])){
            $where.=' and user_name like "%'.$params['sname'].'%"';
        }
        if(!empty($params['sphone'])){
            $where.=' and user_phone like "%'.$params['sphone'].'%"';
        }
        if(!empty($params['sorderno'])){
            $where.=' and order_id like "%'.$params['sorderno'].'%"';
        }
        if(!empty($params['sstime'])){
            $where.=' and order_atime >='.strtotime($params['sstime'].' 00:00:00');
        }
        if(!empty($params['setime'])){
            $where.=' and order_atime <='.strtotime($params['setime'].' 23:59:59');
        }
        return $where;
    }

    private function get_order_status($status){
	    $return_str='';
	    switch ($status){
            case 'wpay':$return_str='待付款';break;
            case 'wget':$return_str='已付款';break;
            case 'success':$return_str='交易完成';break;
            case 'close':$return_str='交易关闭';break;
        }
        return $return_str;
    }

    /***
     * 导出excel
     */
    public function export_ex(){
        $where=$this->_search();
        $data['list']= M('order')->where($where)->order('order_atime desc')->select();

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Order/index'));exit();
        }

        $name='订单';
        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("订单数据")
            ->setLastModifiedBy("订单数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("订单数据")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '订单编号')
            ->setCellValue('B1', '订单状态')
            ->setCellValue('C1', '下单时间')
            ->setCellValue('D1', '实付款')
            ->setCellValue('E1', '支付单号')
            ->setCellValue('F1', '支付时间')
            ->setCellValue('G1', '商品信息')
            ->setCellValue('H1', '商品数量')
            ->setCellValue('I1', '收货人姓名')
            ->setCellValue('J1', '收货人地址')
            ->setCellValue('K1', '收货人手机')
            ->setCellValue('L1', '订单留言')
            ->setCellValue('M1', '省')
            ->setCellValue('N1', '市')
            ->setCellValue('O1', '区')
            ->setCellValue('P1', '职场');

        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $objActSheet->getStyle( 'A1:P1')->applyFromArray(
            array(
                'font'    => array (
                    'bold'      => true,
                    'color'  => array ('argb' => '5a9bd5'),
                ),
                'alignment' => array ('horizontal' => 'center',),
                'fill' => array (
                    'type'       => 'solid',
                    'rotation'   => 90,
                    'startcolor' => array ('argb' => 'f3f3f3'),
                    'endcolor'   => array ('argb' => 'f3f3f3')
                ),
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A:P')->getNumberFormat()->setFormatCode('@');
        $objPHPExcel->getActiveSheet()->getStyle('A')->getNumberFormat()->setFormatCode('0');

        $jgf=' | ';
        foreach ($data['list'] as $k=>$V){
            $num=$k+2;
            $product_list =M('orderdata')->where(array('order_id'=>$V['order_id']))->select();
            $pname=$ps='';
            foreach ($product_list as $p){
                if(empty($pname)){
                    $pname.=$p['product_name'];
                }else{
                    $pname.=$jgf.$p['product_name'];
                }
                if(empty($ps)){
                    //$ps.=$p['product_allmoney'].'*'.$p['product_num'];
                    $ps.=$p['product_num'];
                }else{
                    //$ps.=$jgf.$p['product_allmoney'].'*'.$p['product_num'];
                    $ps.=$jgf.$p['product_num'];
                }
            }

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['order_id'])
                ->setCellValue('B'.$num, $this->get_order_status($V['order_state']))
                ->setCellValue('C'.$num, date("Y-m-d H:i:s",$V['order_atime']))
                ->setCellValue('D'.$num, $V['order_money'])
                ->setCellValue('E'.$num, $V['order_outid'])
                ->setCellValue('F'.$num, $V['order_ptime']?date("Y-m-d H:i:s",$V['order_ptime']):'')
                ->setCellValue('G'.$num, $pname)
                ->setCellValue('H'.$num, $ps)
                ->setCellValue('I'.$num, $V['user_name'])
                ->setCellValue('J'.$num, $V['user_address'])
                ->setCellValue('K'.$num, $V['user_phone'])
                ->setCellValue('L'.$num, $V['order_text'])
                ->setCellValue('M'.$num, $V['prov'])
                ->setCellValue('N'.$num, $V['city'])
                ->setCellValue('O'.$num, $V['area'])
                ->setCellValue('P'.$num, $V['zc']);
            $objActSheet->getRowDimension($num)->setRowHeight(25);
            $objActSheet->getStyle( 'A'.$num.':P'.$num.'')->applyFromArray(
                array(
                    'borders' => array (
                        'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                        'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                    )
                )
            );
        }

        $objPHPExcel->getActiveSheet()->setTitle($name);
        $objPHPExcel->setActiveSheetIndex(0);
        ob_clean();
        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-type: application/vnd.ms-excel');
        $name=iconv("utf-8", "gb2312", $name);
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = $iofactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function export_zctj_ex(){
        $ret=$this->get_zctj();
        $data['list']=$ret['info_list'];

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Order/index'));exit();
        }

        $name='职场统计';
        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("职场统计数据")
            ->setLastModifiedBy("职场统计数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("职场统计数据")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '省')
            ->setCellValue('B1', '市')
            ->setCellValue('C1', '区')
            ->setCellValue('D1', '职场')
            ->setCellValue('E1', '商品')
            ->setCellValue('F1', '数量')
            ->setCellValue('G1', '总价');

        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $objActSheet->getStyle( 'A1:G1')->applyFromArray(
            array(
                'font'    => array (
                    'bold'      => true,
                    'color'  => array ('argb' => '5a9bd5'),
                ),
                'alignment' => array ('horizontal' => 'center',),
                'fill' => array (
                    'type'       => 'solid',
                    'rotation'   => 90,
                    'startcolor' => array ('argb' => 'f3f3f3'),
                    'endcolor'   => array ('argb' => 'f3f3f3')
                ),
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A:G')->getNumberFormat()->setFormatCode('@');
        //$objPHPExcel->getActiveSheet()->getStyle('F:G')->getNumberFormat()->setFormatCode('0');
        $jgf=' | ';
        foreach ($data['list'] as $k=>$V){
            $num=$k+2;
            $product_list =M('orderdata')->where(array('order_id'=>$V['order_id']))->select();
            $pname=$ps='';
            foreach ($product_list as $p){
                if(empty($pname)){
                    $pname.=$p['product_name'];
                }else{
                    $pname.=$jgf.$p['product_name'];
                }
                if(empty($ps)){
                    $ps.=$p['product_allmoney'].'*'.$p['product_num'];
                }else{
                    $ps.=$jgf.$p['product_allmoney'].'*'.$p['product_num'];
                }
            }

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['prov'])
                ->setCellValue('B'.$num, $V['city'])
                ->setCellValue('C'.$num, $V['area'])
                ->setCellValue('D'.$num, $V['zc'])
                ->setCellValue('E'.$num, $V['product'])
                ->setCellValue('F'.$num, $V['num'])
                ->setCellValue('G'.$num, $V['money']);
            $objActSheet->getRowDimension($num)->setRowHeight(25);
            $objActSheet->getStyle( 'A'.$num.':G'.$num.'')->applyFromArray(
                array(
                    'borders' => array (
                        'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                        'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                    )
                )
            );
        }

        $objPHPExcel->getActiveSheet()->setTitle($name);
        $objPHPExcel->setActiveSheetIndex(0);
        ob_clean();
        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-type: application/vnd.ms-excel');
        $name=iconv("utf-8", "gb2312", $name);
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = $iofactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }


    public function export_zctj_ex_wgm(){
        $ret=$this->get_zctj();
        $data['list']=$ret['info_list'];

        $name='无购买_职场统计_'.date(Ymd);
        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("职场统计数据")
            ->setLastModifiedBy("职场统计数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("职场统计数据")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '省')
            ->setCellValue('B1', '市')
            ->setCellValue('C1', '区')
            ->setCellValue('D1', '职场');

        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $objActSheet->getStyle( 'A1:D1')->applyFromArray(
            array(
                'font'    => array (
                    'bold'      => true,
                    'color'  => array ('argb' => '5a9bd5'),
                ),
                'alignment' => array ('horizontal' => 'center',),
                'fill' => array (
                    'type'       => 'solid',
                    'rotation'   => 90,
                    'startcolor' => array ('argb' => 'f3f3f3'),
                    'endcolor'   => array ('argb' => 'f3f3f3')
                ),
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A:G')->getNumberFormat()->setFormatCode('@');
        //购买职场id
        $gm_zc_ids=array();
        foreach ($data['list'] as $k=>$V){
            $gm_zc_ids[]=$V['zc_id'];
        }
        //所有职场
        $all_zc=M('zc')->order('sort ASC, id DESC')->select();
        $num=2;
        foreach ($all_zc as $k=>$V){
            //无购买职场
            if(!in_array($V['id'],$gm_zc_ids)){
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$num, $V['prov'])
                    ->setCellValue('B'.$num, $V['city'])
                    ->setCellValue('C'.$num, $V['area'])
                    ->setCellValue('D'.$num, $V['name']);
                $objActSheet->getRowDimension($num)->setRowHeight(25);
                $objActSheet->getStyle( 'A'.$num.':D'.$num.'')->applyFromArray(
                    array(
                        'borders' => array (
                            'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                            'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                        )
                    )
                );
                $num++;
            }
        }

        $objPHPExcel->getActiveSheet()->setTitle($name);
        $objPHPExcel->setActiveSheetIndex(0);
        ob_clean();
        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-type: application/vnd.ms-excel');
        $name=iconv("utf-8", "gb2312", $name);
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = $iofactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function export_ywytj_ex(){
        $ret=$this->get_ywytj();
        $data['list']=$ret['info_list'];

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Order/index'));exit();
        }

        $name='业务员统计';
        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("业务员统计数据")
            ->setLastModifiedBy("业务员统计数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("业务员统计数据")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '组号')
            ->setCellValue('B1', '用户名')
            ->setCellValue('C1', '电话')
            ->setCellValue('D1', '省')
            ->setCellValue('E1', '市')
            ->setCellValue('F1', '区')
            ->setCellValue('G1', '职场')
            ->setCellValue('H1', '商品')
            ->setCellValue('I1', '数量')
            ->setCellValue('J1', '总价');

        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $objActSheet->getStyle( 'A1:J1')->applyFromArray(
            array(
                'font'    => array (
                    'bold'      => true,
                    'color'  => array ('argb' => '5a9bd5'),
                ),
                'alignment' => array ('horizontal' => 'center',),
                'fill' => array (
                    'type'       => 'solid',
                    'rotation'   => 90,
                    'startcolor' => array ('argb' => 'f3f3f3'),
                    'endcolor'   => array ('argb' => 'f3f3f3')
                ),
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A:J')->getNumberFormat()->setFormatCode('@');
        //$objPHPExcel->getActiveSheet()->getStyle('F:G')->getNumberFormat()->setFormatCode('0');
        $jgf=' | ';
        foreach ($data['list'] as $k=>$V){
            $num=$k+2;
            $product_list =M('orderdata')->where(array('order_id'=>$V['order_id']))->select();
            $pname=$ps='';
            foreach ($product_list as $p){
                if(empty($pname)){
                    $pname.=$p['product_name'];
                }else{
                    $pname.=$jgf.$p['product_name'];
                }
                if(empty($ps)){
                    $ps.=$p['product_allmoney'].'*'.$p['product_num'];
                }else{
                    $ps.=$jgf.$p['product_allmoney'].'*'.$p['product_num'];
                }
            }

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['group_no'])
                ->setCellValue('B'.$num, $V['uname'])
                ->setCellValue('C'.$num, $V['tel'])
                ->setCellValue('D'.$num, $V['prov'])
                ->setCellValue('E'.$num, $V['city'])
                ->setCellValue('F'.$num, $V['area'])
                ->setCellValue('G'.$num, $V['zc'])
                ->setCellValue('H'.$num, $V['product'])
                ->setCellValue('I'.$num, $V['num'])
                ->setCellValue('J'.$num, $V['money']);
            $objActSheet->getRowDimension($num)->setRowHeight(25);
            $objActSheet->getStyle( 'A'.$num.':J'.$num.'')->applyFromArray(
                array(
                    'borders' => array (
                        'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                        'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                    )
                )
            );
        }

        $objPHPExcel->getActiveSheet()->setTitle($name);
        $objPHPExcel->setActiveSheetIndex(0);
        ob_clean();
        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-type: application/vnd.ms-excel');
        $name=iconv("utf-8", "gb2312", $name);
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = $iofactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function export_ywytj_ex_wgm(){
        $ret=$this->get_ywytj();
        $data['list']=$ret['info_list'];

        $name='无购买_业务员统计_'.date(Ymd);
        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("业务员统计数据")
            ->setLastModifiedBy("业务员统计数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("业务员统计数据")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '组号')
            ->setCellValue('B1', '用户名')
            ->setCellValue('C1', '电话')
            ->setCellValue('D1', '省')
            ->setCellValue('E1', '市')
            ->setCellValue('F1', '区')
            ->setCellValue('G1', '职场');

        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $objActSheet->getStyle( 'A1:G1')->applyFromArray(
            array(
                'font'    => array (
                    'bold'      => true,
                    'color'  => array ('argb' => '5a9bd5'),
                ),
                'alignment' => array ('horizontal' => 'center',),
                'fill' => array (
                    'type'       => 'solid',
                    'rotation'   => 90,
                    'startcolor' => array ('argb' => 'f3f3f3'),
                    'endcolor'   => array ('argb' => 'f3f3f3')
                ),
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A:G')->getNumberFormat()->setFormatCode('@');
        //$objPHPExcel->getActiveSheet()->getStyle('F:G')->getNumberFormat()->setFormatCode('0');
        $jgf=' | ';
        $gm_ywy_ids=array();
        foreach ($data['list'] as $k=>$V){
            $gm_ywy_ids[]=$V['uid'];
        }
        $num=2;
        $all_ywy=M('member')->order('id DESC')->select();
        foreach ($all_ywy as $k=>$V){
            if(!in_array($V['id'],$gm_ywy_ids)){
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$num, $V['group_no'])
                    ->setCellValue('B'.$num, $V['name'])
                    ->setCellValue('C'.$num, $V['phone'])
                    ->setCellValue('D'.$num, $V['prov'])
                    ->setCellValue('E'.$num, $V['city'])
                    ->setCellValue('F'.$num, $V['area'])
                    ->setCellValue('G'.$num, get_zc_name($V['zc_id']));
                $objActSheet->getRowDimension($num)->setRowHeight(25);
                $objActSheet->getStyle( 'A'.$num.':G'.$num.'')->applyFromArray(
                    array(
                        'borders' => array (
                            'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                            'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                        )
                    )
                );
                $num++;
            }

        }

        $objPHPExcel->getActiveSheet()->setTitle($name);
        $objPHPExcel->setActiveSheetIndex(0);
        ob_clean();
        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-type: application/vnd.ms-excel');
        $name=iconv("utf-8", "gb2312", $name);
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = $iofactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function export_zccptj_ex(){
        $ret=$this->get_zccptj();
        $data['list']=$ret['info_list'];
        $where=$this->_zc_search();

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Order/zccptj'));exit();
        }

        if(I('is_all',false)!=true){
            $pro_where=' and 1=1 ';
        }else{
            $pro_where=' and '.$where.' ';
        }

        $pro_sql=<<<eot
select bestop_orderdata.product_id,bestop_orderdata.product_name
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success"  {$pro_where}
group by product_id
order by product_id desc 
eot;

        $pro_list=M('order')->query($pro_sql);


        $name='职场商品分类发货清单';
        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("职场统计数据")
            ->setLastModifiedBy("职场统计数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("职场统计数据")
            ->setCategory("result file");
        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $jgf=' | ';
        $last_column='';
        $c_array=array(
            'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
            'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
            'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
            'CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ',
            'DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ',
            'EA','EB','EC','ED','EE','EF','EG','EH','EI','EJ','EK','EL','EM','EN','EO','EP','EQ','ER','ES','ET','EU','EV','EW','EX','EY','EZ',
        );
        $head_array=array();
        $end_array=array();
        foreach ($data['list'] as $k=>$V){
            //行
            $num=$k+2;
            //列
            $excel_index=0;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['zc']);
            $head_array[$c_array[$excel_index]]='职场';
            $end_array[$c_array[$excel_index]]='总计';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['zg_cnt']);
            $head_array[$c_array[$excel_index]]='自购人数';
            $end_array[$c_array[$excel_index]]+=$V['zg_cnt'];
            $excel_index+=1;
            foreach ($pro_list as $pro){
                //产品数量
                $cp_sql=<<<eot
select  sum(product_num) as num
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success" and bestop_orderdata.product_id={$pro['product_id']}  and bestop_order.zc_id={$V['zc_id']} and {$where}
order by product_id DESC 
eot;
                $pro_num=M('order')->query($cp_sql);
                if($pro_num){
                    $pro_num=$pro_num[0]['num'];
                }else{
                    $pro_num='';
                }

                $head_array[$c_array[$excel_index]]=$pro['product_name'];
                $end_array[$c_array[$excel_index]]+=$pro_num;
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($c_array[$excel_index].$num, $pro_num);
                $excel_index+=1;
            }
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['num']);
            $head_array[$c_array[$excel_index]]='合计数量';
            $end_array[$c_array[$excel_index]]+=$V['num'];
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['money']);
            $head_array[$c_array[$excel_index]]='金额';
            $end_array[$c_array[$excel_index]]+=$V['money'];
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['prov']);
            $head_array[$c_array[$excel_index]]='省';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['city']);
            $head_array[$c_array[$excel_index]]='市';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['area']);
            $head_array[$c_array[$excel_index]]='区';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['contact']);
            $head_array[$c_array[$excel_index]]='联系人';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['tel']);
            $head_array[$c_array[$excel_index]]='联系电话';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['addr']);
            $head_array[$c_array[$excel_index]]='详细地址';

            //样式处理
            $last_column=$c_array[$excel_index];
            $objActSheet->getRowDimension($num)->setRowHeight(25);
            $objActSheet->getStyle( 'A'.$num.':'.$last_column.$num.'')->applyFromArray(
                array(
                    'borders' => array (
                        'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                        'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                    )
                )
            );
        }

        foreach ($head_array as $k=>$v){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($k.'1', $v);
        }

//var_dump($end_array);exit();
        $num++;
        foreach ($end_array as $k=>$v) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($k .$num, $v);
        }
        $objActSheet->getStyle( 'A'.$num.':'.$last_column.$num.'')->applyFromArray(
            array(
                'font' => ['bold' => true,'size'=>20,'color'=>array('argb'=>'A52A2A')],
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );
        $objActSheet->getRowDimension($num)->setRowHeight(40);

        $objActSheet->getStyle( 'A1:'.$last_column.'1')->applyFromArray(
            array(
                'font'    => array (
                    'bold'      => true,
                    'color'  => array ('argb' => '5a9bd5'),
                ),
                'alignment' => array ('horizontal' => 'center',),
                'fill' => array (
                    'type'       => 'solid',
                    'rotation'   => 90,
                    'startcolor' => array ('argb' => 'f3f3f3'),
                    'endcolor'   => array ('argb' => 'f3f3f3')
                ),
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A:'.$last_column)->getNumberFormat()->setFormatCode('@');

        $objPHPExcel->getActiveSheet()->setTitle($name);
        $objPHPExcel->setActiveSheetIndex(0);
        ob_clean();
        header('Content-type: application/vnd.ms-excel');
        $name=iconv("utf-8", "gb2312", $name);
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = $iofactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function export_zcrytj_ex(){
        $ret=$this->get_zcrytj();
        $data['list']=$ret['info_list'];
        $where=$this->_zc_search();

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Order/index'));exit();
        }

        if(I('is_all',false)!=true){
            $pro_where=' and 1=1 ';
        }else{
            $pro_where=' and '.$where.' ';
        }

        $pro_sql=<<<eot
select bestop_orderdata.product_id,bestop_orderdata.product_name
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success"  {$pro_where}
group by product_id
order by product_id desc 
eot;
        $pro_list=M('order')->query($pro_sql);


        $name='业务员自购商品数量合计清单';
        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("职场统计数据")
            ->setLastModifiedBy("职场统计数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("职场统计数据")
            ->setCategory("result file");
        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $jgf=' | ';
        $last_column='';
        $c_array=array(
            'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
            'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
            'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
            'CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ',
            'DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ',
            'EA','EB','EC','ED','EE','EF','EG','EH','EI','EJ','EK','EL','EM','EN','EO','EP','EQ','ER','ES','ET','EU','EV','EW','EX','EY','EZ',
        );
        $head_array=array();
        $end_array=array();
        foreach ($data['list'] as $k=>$V){
            //行
            $num=$k+2;
            //列
            $excel_index=0;

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['prov']);
            $head_array[$c_array[$excel_index]]='省';
            $end_array[$c_array[$excel_index]]='总计';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['city']);
            $head_array[$c_array[$excel_index]]='市';
            $end_array[$c_array[$excel_index]]='';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['area']);
            $head_array[$c_array[$excel_index]]='区';
            $end_array[$c_array[$excel_index]]='';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['zc']);
            $head_array[$c_array[$excel_index]]='职场';
            $end_array[$c_array[$excel_index]]='';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['group_no']);
            $head_array[$c_array[$excel_index]]='组号';
            $end_array[$c_array[$excel_index]]='';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['uname']);
            $head_array[$c_array[$excel_index]]='姓名';
            $end_array[$c_array[$excel_index]]='';
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['tel']);
            $head_array[$c_array[$excel_index]]='手机';
            $end_array[$c_array[$excel_index]]='';
            $excel_index+=1;
            foreach ($pro_list as $pro){
                //产品数量
                $cp_sql=<<<eot
select  sum(product_num) as num
from bestop_orderdata 
LEFT JOIN bestop_order
ON bestop_order.order_id=bestop_orderdata.order_id
where  bestop_order.order_state="success" and bestop_orderdata.product_id={$pro['product_id']}  and bestop_orderdata.uid={$V['uid']} and {$where}
order by product_id DESC 
eot;
                $pro_num=M('order')->query($cp_sql);
                if($pro_num){
                    $pro_num=$pro_num[0]['num'];
                }else{
                    $pro_num='';
                }
                $end_array[$c_array[$excel_index]]+=$pro_num;
                $head_array[$c_array[$excel_index]]=$pro['product_name'];
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($c_array[$excel_index].$num, $pro_num);
                $excel_index+=1;
            }
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['num']);
            $head_array[$c_array[$excel_index]]='合计数量';
            $end_array[$c_array[$excel_index]]+=$V['num'];
            $excel_index+=1;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['money']);
            $head_array[$c_array[$excel_index]]='金额';
            $end_array[$c_array[$excel_index]]+=$V['money'];
            $excel_index+=1;

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_array[$excel_index].$num, $V['addr']);
            $head_array[$c_array[$excel_index]]='详细地址';

            //样式处理
            $last_column=$c_array[$excel_index];
            $objActSheet->getRowDimension($num)->setRowHeight(25);
            $objActSheet->getStyle( 'A'.$num.':'.$last_column.$num.'')->applyFromArray(
                array(
                    'borders' => array (
                        'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                        'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                    )
                )
            );
        }

        foreach ($head_array as $k=>$v){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($k.'1', $v);
        }
        $num++;
        foreach ($end_array as $k=>$v) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($k .$num, $v);
        }
        $objActSheet->getStyle( 'A'.$num.':'.$last_column.$num.'')->applyFromArray(
            array(
                'font' => ['bold' => true,'size'=>20,'color'=>array('argb'=>'A52A2A')],
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );
        $objActSheet->getRowDimension($num)->setRowHeight(40);

        $objActSheet->getStyle( 'A1:'.$last_column.'1')->applyFromArray(
            array(
                'font'    => array (
                    'bold'      => true,
                    'color'  => array ('argb' => '5a9bd5'),
                ),
                'alignment' => array ('horizontal' => 'center',),
                'fill' => array (
                    'type'       => 'solid',
                    'rotation'   => 90,
                    'startcolor' => array ('argb' => 'f3f3f3'),
                    'endcolor'   => array ('argb' => 'f3f3f3')
                ),
                'borders' => array (
                    'outline'     => array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),),
                    'inside'=> array ('style' => 'thin', 'color'  => array ('argb' => 'a7a7a7'),)
                )
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A:'.$last_column)->getNumberFormat()->setFormatCode('@');

        $objPHPExcel->getActiveSheet()->setTitle($name);
        $objPHPExcel->setActiveSheetIndex(0);
        ob_clean();
        header('Content-type: application/vnd.ms-excel');
        $name=iconv("utf-8", "gb2312", $name);
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = $iofactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
    public function close(){
        $key=I('key',null);
        if(empty($key)){
            $this->error('错误的请求...');
        }
        if(!is_array($key)){
            $ids[]=$key;
        }else{
            $ids=$key;
        }
        $ret=array('ok'=>0,'err'=>0,'cnt'=>count($key));
        $data['order_state']='close';
        foreach ($ids as $id){
            $tmp_flag=M('order')->where(array('order_id'=>$id))->save($data);
            if($tmp_flag){
                $ret['ok']+=1;
            }else{
                $ret['err']+=1;
            }
        }
        if($ret['cnt']==1){
            $this->success('关闭成功...', U('Order/index'));
        }else{
            $this->success("批量关闭{$ret['cnt']}条，成功{$ret['ok']}条，失败{$ret['err']}条", U('Order/index'),5);
        }
    }

}



?>
