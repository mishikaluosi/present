<?php
namespace Manage\Controller;
use Think\Controller;

class EventController extends CommonController {

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
        $fp=I('fp',0);
        $this->assign('fp',$fp);
        $this->_get_search($fp);
		$this->display();
	}

    private function _get_search($sstype=1){
        $_zcinfo=$this->_get_zcinfo();
        $arr=array('sname');
        $search_arr=array();
        foreach ($arr as $a){
            $search_arr[$a]=I($a);
            $this->assign($a, $search_arr[$a]);
        }

        $where="1=1";
        switch ($sstype){
            case 1:
                //$where['status']=1;
                $where.=' and status=1';
                break;
            case 2:
                //$where['status']=array('neq',1);
                $where.=' and status!=1';
                break;
            case 3:
                $where.=' and etime<='.strtotime(date("Y-m-d 23:59:59", strtotime("-1 day")));
                //$where['etime']=array('elt',strtotime(date("Y-m-d 23:59:59", strtotime("-1 day"))));//<=
                break;
            case 4:
                $where.=' and (zc_info is null or zc_info="")';
                break;
        }

        if(!empty($_zcinfo)){
            $where.=' and (adduser="'.$_zcinfo['username'].'" or  zc_ids like "%$$$'.$_zcinfo['zc_id'].'%")';
        }

        $order='addtime desc,id desc';

        foreach ($search_arr as $k=>$v){
            if(!empty($v)){
                switch ($k){
                    case 'sname':
                        $where.=' and name like "%'.$v.'%"';
                        break;
                }
            }
        }

        $count = M('event')->where($where)->count();
        $page = new \Common\Lib\Page($count, 18);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list =  M('event')->where($where)->order($order)->limit($limit)->select();
        foreach ($list as $k=>$v){
            $list[$k]=$v;
            $list[$k]['acnt']=$this->_get_answer_cnt($v['id']);;
            $list[$k]['zc_info']=unserialize($v['zc_info']);

        }
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);

    }

    public function info(){

        $_zcinfo=$this->_get_zcinfo();

        $fp_where="1=1";
        if(!empty($_zcinfo)){
            $fp_where.=' and (adduser="'.$_zcinfo['username'].'" or  zc_ids like "%$$$'.$_zcinfo['zc_id'].'%")';
        }
        $fp_arr=M('event')->where($fp_where)->order('addtime desc,id desc')->limit(10)->select();
        $this->assign('fp_arr', $fp_arr);
        $fp=I('fp',0);
        $this->assign('fp',$fp);

        $arr=array('swjname','sname','sphone','sdep','sprov','scity','sarea',);
        $search_arr=array();
        foreach ($arr as $a){
            $search_arr[$a]=I($a);
            $this->assign($a, $search_arr[$a]);
        }

        $where="1=1";
        $info_prev='bestop_event_info.';
        $event_prev='bestop_event.';
        if(!empty($fp)){
            //$where['bestop_event_info.event_id']=$fp;
            $where.=" and {$info_prev}event_id={$fp}";
        }

        $order='bestop_event_info.addtime desc,bestop_event_info.id desc';

        foreach ($search_arr as $k=>$v){
            if(!empty($v)){
                switch ($k){
                    case 'swjname':
                        //$where['bestop_event.name']=array('like','%'.$v.'%');
                        $where.=" and {$event_prev}name like '%".$v."%'";
                        break;
                    case 'sname':
                        //$where['bestop_event_info.username']=array('like','%'.$v.'%');
                        $where.=" and {$info_prev}username like '%".$v."%'";
                        break;
                    case 'sphone':
                        //$where['bestop_event_info.phone']=array('like','%'.$v.'%');
                        $where.=" and {$info_prev}phone like '%".$v."%'";
                        break;
                    case 'sdep':
                        //$where['bestop_event_info.yq_username']=array('like','%'.$v.'%');
                        $where.=" and {$info_prev}yq_username like '%".$v."%'";
                        break;
                    case 'sprov':
                        if(!empty($v)&&$v!='请选择'){
                            //$where['bestop_event_info.prov']=array('like','%'.$v.'%');
                            $where.=" and {$info_prev}prov like '%".$v."%'";
                        }
                        break;
                    case 'scity':
                        if(!empty($v)&&$v!='请选择'){
                            //$where['bestop_event_info.city']=array('like','%'.$v.'%');
                            $where.=" and {$info_prev}city like '%".$v."%'";
                        }
                        break;
                    case 'sarea':
                        if(!empty($v)&&$v!='请选择'){
                            //$where['bestop_event_info.area']=array('like','%'.$v.'%');
                            $where.=" and {$info_prev}area like '%".$v."%'";
                        }
                        break;

                }
            }
        }

        if(!empty($_zcinfo)){
            $where.=' and ('.$event_prev.'adduser="'.$_zcinfo['username'].'" or  '.$event_prev.'zc_ids like "%$$$'.$_zcinfo['zc_id'].'%") ';
            $where.=" and {$info_prev}zc_id={$_zcinfo['zc_id']}";
        }

        $count = M('event_info')->join(' JOIN bestop_event ON bestop_event.id = bestop_event_info.event_id' )->where($where)->count();
        $page = new \Common\Lib\Page($count, 18);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list =  M('event_info')->field('bestop_event_info.*,bestop_event.name as e_name')->join('  JOIN bestop_event ON bestop_event.id = bestop_event_info.event_id' )->where($where)->order($order)->limit($limit)->select();

        $this->assign('page', $page->show());
        $this->assign('vlist', $list);

        $this->display();
    }

	public function msg(){
        $_zc_id=$this->_get_zcinfo();

        $id = I('id', 0, 'intval');
        if(is_numeric($id) && $id>0){
            $vo = M('event')->find($id);
            $vo['content'] = htmlspecialchars($vo['content']);
            $vo['zc_info'] = empty($vo['zc_info'])?null:unserialize($vo['zc_info']);
            $this->assign('title', '修改活动');
        }else{
            $this->assign('title', '添加活动');
        }
//var_dump($info_list);

        $this->assign('vo', $vo);
	    $this->display();
    }

    public function msg_save(){
        $id=I('id',0);

        $wj['name']=I('name',null, 'htmlspecialchars,rtrim');
        $wj['address']=I('address',null, 'htmlspecialchars,rtrim');
        $wj['stime']=I('stime',null);
        $wj['etime']=I('etime',null);
        $wj['content'] = I('content', '', '');
        $wj['area'] = I('area');
        $wj['is_draw'] = I('is_draw') ? I('is_draw') : 0;
        $wj['is_order'] = I('is_order')? I('is_order') : 0;
        $wj['max_member'] = I('max_member')? I('max_member') : 0;
        $wj['area']  = I('area')? I('area') : 1;
        $zc_info =I('zc_info',null);
        if (!empty($zc_info)) {
            $where = ' id in (' . trim($zc_info) . ')';
            $zc_info = M('zc')->where($where)->select();
            $zc_arr = array();
            $zc_id_arr = array();
            foreach ($zc_info as $v) {
                $zc_arr[$v['id']] = array('id' => $v['id'], 'name' => $v['name']);
                $zc_id_arr[] = $v['id'];
            }
        }

        if($zc_arr){
            $wj['zc_info']=serialize($zc_arr);
            $wj['zc_ids']='$$$'.implode("$$$",$zc_id_arr).'$$$';
        }else{
            $wj['zc_info']='';
            $wj['zc_ids']='';
        }

        if(!empty($wj['stime'])){
            $wj['stime']=strtotime($wj['stime']);
        }else{
            unset($wj['stime']);
        }
        if(!empty($wj['etime'])){
            $wj['etime']=strtotime($wj['etime']);
        }else{
            unset($wj['etime']);
        }

        if(empty($wj['name'])){
            $this->error('活动名不得为空');
        }

        if(!empty($wj['stime'])&&!empty($wj['etime'])){
            if($wj['stime']>$wj['etime']){
                $this->error('截止时间不得小于开始时间');
            }
        }


        if(is_numeric($id) && $id>0){
            $flag=M('event')->where(array('id'=>$id))->save($wj);
        }else{
            $wj['addtime']=time();
            $wj['status']=0;
            $wj['adduser']=$_SESSION['yang_adm_username'];
            $flag=M('event')->add($wj);
        }

        if($flag){
            $this->redirect('Event/index');
        }else {
            $this->error('添加失败');
        }

    }



    public function del(){
        $id = I('id',0 , 'intval');

        $acnt=$this->_get_answer_cnt($id);
        if($acnt>0){
            $this->error('该活动已有'.$acnt.'人参与 不能删除');
        }

        if (false !== M('event')->where(array('id' => $id))->delete()) {

            $this->redirect('Event/index');
        }else {
            $this->error('删除失败');
        }
    }


    public function status(){
        $flag=I('flag',0);
        $id=I('id',0);
        if($flag==1){
            $data['status']=1;
        }else{
            $data['status']=0;
        }

        $ret=M('event')->where(array('id'=>$id))->save($data);
        if($ret){
            $this->success('成功');
        }
        $this->error('失败1');
    }


    private function _get_answer_cnt($eid){
        $cnt=M('event_info')->where(array('event_id'=>$eid))->count();
        if($cnt){
            return $cnt;
        }
        return 0;
    }


    public function zc(){

        $ret=$this->get_zc();
        $this->assign('total_num',$ret['total_num']);
        $this->assign('total_money',$ret['total_money']);
        $this->assign('vlist',$ret['info_list']);
        $this->display();
    }
    public function ywy(){
        $ret=$this->get_ywy();
        $this->assign('total_num',$ret['total_num']);
        $this->assign('total_money',$ret['total_money']);
        $this->assign('vlist',$ret['info_list']);
        $this->display();
    }

    private function get_zcywy(){
        $where=$this->_wj_search();
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
        $vlist=M('wenjuan_answer')->query($sql);
        $info_list=null;
        $total_num=0;
        foreach ($vlist as $k=>$v){
            $total_num+=$v['num'];
            $info_list[$k]=$v;

            $tmp_zc=M('zc')->where(array('id'=>$v['zc_id']))->find();
            if($tmp_zc){
                $info_list[$k]['prov']=$tmp_zc['prov'];
                $info_list[$k]['city']=$tmp_zc['city'];
                $info_list[$k]['area']=$tmp_zc['area'];
                $info_list[$k]['addr']=$tmp_zc['addr'];
                $info_list[$k]['zc']=$tmp_zc['name'];

            }

        }
        return array('info_list'=>$info_list,"total_num"=>$total_num);
    }

    private function get_zc(){
        $where=$this->_wj_search();
        $sql=<<<eot
select zc_id,count(phone) as num from bestop_event_info
where 1=1  and {$where}
 group by zc_id
order by addtime desc
eot;
        //var_dump($sql);exit();
        $vlist=M('event_info')->query($sql);
        $info_list=null;
        $total_num=0;
        foreach ($vlist as $k=>$v){
            $total_num+=$v['num'];
            $info_list[$k]=$v;

            //zc业务员数
            $ywy= M('member')->where("zc_id={$v['zc_id']}")->count();
            $info_list[$k]['ywy']=$ywy;
            //zc有拜访的业务员数
            $zg_sql=<<<eot
select distinct yq_userid from bestop_event_info
where 1=1  and  zc_id={$v['zc_id']} and {$where}
eot;
            $bf_ywy=M('event_info')->query($zg_sql);
            $info_list[$k]['bf_ywy']=count($bf_ywy)>0?count($bf_ywy):0;

            $tmp_zc=M('zc')->where(array('id'=>$v['zc_id']))->find();
            if($tmp_zc){
                $info_list[$k]['prov']=$tmp_zc['prov'];
                $info_list[$k]['city']=$tmp_zc['city'];
                $info_list[$k]['area']=$tmp_zc['area'];
                $info_list[$k]['addr']=$tmp_zc['addr'];
                $info_list[$k]['zc']=$tmp_zc['name'];
            }

        }
        return array('info_list'=>$info_list,"total_num"=>$total_num);
    }

    private function get_ywy(){
        $where=$this->_wj_search();
        $sql=<<<eot
select yq_userid,zc_id,count(phone) as num from bestop_event_info
where 1=1 and {$where}
 group by yq_userid
order by addtime desc
eot;
        //var_dump($sql);exit();
        $vlist=M('event_info')->query($sql);
        $info_list=null;
        $total_num=0;
        foreach ($vlist as $k=>$v){
            $total_num+=$v['num'];
            $info_list[$k]=$v;

            $tmp_uinfo=M('member')->where(array('id'=>$v['yq_userid']))->find();
            if($tmp_uinfo){
                $info_list[$k]['uname']=$tmp_uinfo['name'];
                $info_list[$k]['tel']=$tmp_uinfo['phone'];
            }
            $tmp_zc=M('zc')->where(array('id'=>$v['zc_id']))->find();
            if($tmp_zc){
                $info_list[$k]['prov']=$tmp_zc['prov'];
                $info_list[$k]['city']=$tmp_zc['city'];
                $info_list[$k]['area']=$tmp_zc['area'];
                $info_list[$k]['addr']=$tmp_zc['addr'];
                $info_list[$k]['zc']=$tmp_zc['name'];
            }

        }
        return array('info_list'=>$info_list,"total_num"=>$total_num);
    }

    private function _wj_search(){
        $_zcinfo=$this->_get_zcinfo();
        $where=' 1=1 ';

        $kw_arr=array('sname','sprov','scity','sarea','sdep','sstime','setime');
        foreach ($kw_arr as $k=>$v){
            $params[$v] = I($v, '', 'htmlspecialchars,trim');
            $this->assign($v,$params[$v]);
        }
        $this->assign('search_p',$params);

        $table_pre='bestop_event_info.';
        if(!empty($params['sarea'])&&$params['sarea']!='请选择'){
            $where.=' and '.$table_pre.'area like "'.$params['sarea'].'%"';
        }
        if(!empty($params['sname'])){
            $where.=' and '.$table_pre.'zc_name like "%'.$params['sname'].'%"';
        }
        if(!empty($params['sdep'])){
            $where.=' and '.$table_pre.'yq_username like "%'.$params['sdep'].'%"';
        }
        if(!empty($params['sstime'])){
            $where.=' and '.$table_pre.'addtime >='.strtotime($params['sstime'].' 00:00:00');
        }
        if(!empty($params['setime'])){
            $where.=' and '.$table_pre.'addtime <='.strtotime($params['setime'].' 23:59:59');
        }

        if(!empty($_zcinfo)){
            $where.=' and '.$table_pre.'zc_id ='.$_zcinfo['zc_id'];
        }

        return $where;
    }

    public function export_zctj_ex(){
        $ret=$this->get_zc();
        $data['list']=$ret['info_list'];

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Wenjuan/index'));exit();
        }

        $name='活动_职场_统计_'.date(Ymd);
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
            ->setCellValue('E1', '业务员数')
            ->setCellValue('F1', '有活动数的业务员数')
            ->setCellValue('G1', '活动客户数');

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

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['prov'])
                ->setCellValue('B'.$num, $V['city'])
                ->setCellValue('C'.$num, $V['area'])
                ->setCellValue('D'.$num, $V['zc'])
                ->setCellValue('E'.$num, $V['ywy'])
                ->setCellValue('F'.$num, $V['bf_ywy'])
                ->setCellValue('G'.$num, $V['num']);
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

    public function export_ywytj_ex(){
        $ret=$this->get_ywy();
        $data['list']=$ret['info_list'];

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Order/index'));exit();
        }

        $name='活动_业务员_统计_'.date(Ymd);
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
            ->setCellValue('A1', '用户名')
            ->setCellValue('B1', '电话')
            ->setCellValue('C1', '省')
            ->setCellValue('D1', '市')
            ->setCellValue('E1', '区')
            ->setCellValue('F1', '职场')
            ->setCellValue('G1', '数量');

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

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['uname'])
                ->setCellValue('B'.$num, $V['tel'])
                ->setCellValue('C'.$num, $V['prov'])
                ->setCellValue('D'.$num, $V['city'])
                ->setCellValue('E'.$num, $V['area'])
                ->setCellValue('F'.$num, $V['zc'])
                ->setCellValue('G'.$num, $V['num']);
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
    public function draw(){
        $e_id = I('e_id');
        $this->assign('e_id',$e_id);
        $awards = M('award')->select();
        $this->assign('awards',$awards);
        $this->display();
    }

}



?>
