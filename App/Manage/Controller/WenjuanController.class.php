<?php
namespace Manage\Controller;
use Think\Controller;

class WenjuanController extends CommonController {
	
	public function index() {

        $fp=I('fp',0);
        $this->assign('fp',$fp);
        $this->_get_search($fp);

		$this->display();
	}

    private function _get_search($sstype=1){
        $arr=array('sname');
        $search_arr=array();
        foreach ($arr as $a){
            $search_arr[$a]=I($a);
            $this->assign($a, $search_arr[$a]);
        }

        $where=array();
        switch ($sstype){
            case 1:
                $where['status']=1;
                break;
            case 2:
                $where['status']=array('neq',1);
                break;
            case 3:
                $where['etime']=array('elt',strtotime(date("Y-m-d 23:59:59", strtotime("-1 day"))));//<=
                break;
        }

        $order='addtime desc,id desc';

        foreach ($search_arr as $k=>$v){
            if(!empty($v)){
                switch ($k){
                    case 'sname':
                        $where['name']=array('like','%'.$v.'%');
                        break;
                }
            }
        }

        $count = M('wenjuan')->where($where)->count();
        $page = new \Common\Lib\Page($count, 18);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list =  M('wenjuan')->where($where)->order($order)->limit($limit)->select();
        foreach ($list as $k=>$v){
            $list[$k]=$v;
            $list[$k]['qcnt']=$this->_get_question_cnt($v['id']);
            $list[$k]['acnt']=$this->_get_answer_cnt($v['id']);
        }
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);

    }

    public function answer_search(){
        $fp=I('fp',0);
        $this->assign('fp',$fp);

        $arr=array('swjname','sname','sphone','sdep','sprov','scity','sarea','stime','etime');
        $search_arr=array();
        foreach ($arr as $a){
            $search_arr[$a]=I($a);
            $this->assign($a, $search_arr[$a]);
        }
        $this->assign('search_p',$search_arr);

        $where='1=1';//array();
        if(!empty($fp)){
            //$where['bestop_wenjuan_answer.wenjuan_id']=$fp;
            $where.=' and bestop_wenjuan_answer.wenjuan_id='.$fp;
        }

        foreach ($search_arr as $k=>$v){
            if(!empty($v)){
                switch ($k){
                    case 'swjname':
                        //$where['bestop_wenjuan.name']=array('like','%'.$v.'%');
                        $where.=$this->_slike('bestop_wenjuan.name',$v);
                        break;
                    case 'sname':
                        //$where['bestop_wenjuan_answer.uname']=array('like','%'.$v.'%');
                        $where.=$this->_slike('bestop_wenjuan_answer.uname',$v);
                        break;
                    case 'sphone':
                        //$where['bestop_wenjuan_answer.phone']=array('like','%'.$v.'%');
                        $where.=$this->_slike('bestop_wenjuan_answer.phone',$v);
                        break;
                    case 'sdep':
                        //$where['bestop_wenjuan_answer.dep']=array('like','%'.$v.'%');
                        $where.=$this->_slike('bestop_wenjuan_answer.dep',$v);
                        break;
                    case 'sprov':
                        if(!empty($v)&&$v!='请选择'){
                            //$where['bestop_wenjuan_answer.prov']=array('like','%'.$v.'%');
                            $where.=$this->_slike('bestop_wenjuan_answer.prov',$v);
                        }
                        break;
                    case 'scity':
                        if(!empty($v)&&$v!='请选择'){
                            //$where['bestop_wenjuan_answer.city']=array('like','%'.$v.'%');
                            $where.=$this->_slike('bestop_wenjuan_answer.city',$v);
                        }
                        break;
                    case 'sarea':
                        if(!empty($v)&&$v!='请选择'){
                            //$where['bestop_wenjuan_answer.area']=array('like','%'.$v.'%');
                            $where.=$this->_slike('bestop_wenjuan_answer.area',$v);
                        }
                        break;
                    case 'stime':
                        //$where['bestop_wenjuan_answer.addtime']=array('glt',strtotime($v.' 00:00:00'));;
                        $where.=' and bestop_wenjuan_answer.addtime >='.strtotime($v.' 00:00:00');
                        break;
                    case 'etime':
                        //$where['bestop_wenjuan_answer.addtime']=array('elt',strtotime($v.' 23:59:59'));;
                        $where.=' and bestop_wenjuan_answer.addtime <='.strtotime($v.' 23:59:59');
                        break;
                }
            }
        }
        //var_dump($where);exit();
        return $where;
    }

    private function _slike($field,$str){
        return ' and '.$field.' like "%'.$str.'%" ';
    }

    public function export_answer(){

        $where=$this->answer_search();
        $order='bestop_wenjuan_answer.addtime desc,bestop_wenjuan_answer.id desc';
        $data['list'] =  M('wenjuan_answer')
            ->field('bestop_wenjuan_answer.*,bestop_wenjuan.name as wj_name,bestop_wenjuan.pic as wj_pic')
            ->join(' JOIN bestop_wenjuan ON bestop_wenjuan.id = bestop_wenjuan_answer.wenjuan_id' )
            ->where($where)->order($order)->select();


        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Wenjuan/answer'));exit();
        }

        $name='问卷回答详情_'.date(Ymd);
        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("问卷回答")
            ->setLastModifiedBy("问卷回答")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("问卷回答")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '省')
            ->setCellValue('B1', '市')
            ->setCellValue('C1', '区')
            ->setCellValue('D1', '职场')
            ->setCellValue('E1', '组号')
            ->setCellValue('F1', '业务员姓名')
            ->setCellValue('G1', '客户姓名')
            ->setCellValue('H1', '客户电话')
            ->setCellValue('I1', '客户1')
            ->setCellValue('J1', '电话1')
            ->setCellValue('K1', '客户2')
            ->setCellValue('L1', '电话2')
            ->setCellValue('M1', '客户3')
            ->setCellValue('N1', '电话3')
            ->setCellValue('O1', '日期');

        $end_index='O';

        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $objActSheet->getStyle( 'A1:'.$end_index.'1')->applyFromArray(
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

        $objPHPExcel->getActiveSheet()->getStyle('A:'.$end_index.'')->getNumberFormat()->setFormatCode('@');
        $objPHPExcel->getActiveSheet()->getStyle('A')->getNumberFormat()->setFormatCode('0');

        $jgf=' | ';
        foreach ($data['list'] as $k=>$V){
            $num=$k+2;

            $tmp_uinfo=M('member')->where(array('id'=>$V['user_id']))->find();
            if($tmp_uinfo) {
                $tmp_zc=M('zc')->where(array('id'=>$tmp_uinfo['zc_id']))->find();
            }

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, empty($tmp_zc)?'':$tmp_zc['prov'])
                ->setCellValue('B'.$num, empty($tmp_zc)?'':$tmp_zc['city'])
                ->setCellValue('C'.$num, empty($tmp_zc)?'':$tmp_zc['area'])
                ->setCellValue('D'.$num, empty($tmp_zc)?'':$tmp_zc['name'])
                ->setCellValue('E'.$num, empty($tmp_uinfo)?'':$tmp_uinfo['group_no'])
                ->setCellValue('F'.$num, $V['dep'])
                ->setCellValue('G'.$num, $V['uname'])
                ->setCellValue('H'.$num, $V['phone'])
                ->setCellValue('I'.$num, $V['khname1'])
                ->setCellValue('J'.$num, $V['khtel1'])
                ->setCellValue('K'.$num, $V['khname2'])
                ->setCellValue('L'.$num, $V['khtel2'])
                ->setCellValue('M'.$num, $V['khname3'])
                ->setCellValue('N'.$num, $V['khtel3'])
                ->setCellValue('O'.$num, $V['addtime']?date("Y-m-d H:i:s",$V['addtime']):'');
            $objActSheet->getRowDimension($num)->setRowHeight(25);
            $objActSheet->getStyle( 'A'.$num.':'.$end_index.$num.'')->applyFromArray(
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

    public function answer(){

        $fp_arr=M('wenjuan')->order('addtime desc,id desc')->limit(10)->select();
        $this->assign('fp_arr', $fp_arr);

        $where=$this->answer_search();
        $order='bestop_wenjuan_answer.addtime desc,bestop_wenjuan_answer.id desc';
        $count = M('wenjuan_answer')->join(' JOIN bestop_wenjuan ON bestop_wenjuan.id = bestop_wenjuan_answer.wenjuan_id' )->where($where)->count();
        $page = new \Common\Lib\Page($count, 18);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list =  M('wenjuan_answer')->field('bestop_wenjuan_answer.*,bestop_wenjuan.name as wj_name,bestop_wenjuan.pic as wj_pic')->join(' JOIN bestop_wenjuan ON bestop_wenjuan.id = bestop_wenjuan_answer.wenjuan_id' )->where($where)->order($order)->limit($limit)->select();

        $info_list=array();
        foreach ($list as $k=>$v){
            $info_list[$k]=$v;
            $tmp_uinfo=M('member')->where(array('id'=>$v['user_id']))->find();
            if($tmp_uinfo) {
                $info_list[$k]['tel'] = $tmp_uinfo['phone'];
                $info_list[$k]['group_no'] = $tmp_uinfo['group_no'];
                $tmp_zc=M('zc')->where(array('id'=>$tmp_uinfo['zc_id']))->find();
                if($tmp_zc){
                    $info_list[$k]['prov']=$tmp_zc['prov'];
                    $info_list[$k]['city']=$tmp_zc['city'];
                    $info_list[$k]['area']=$tmp_zc['area'];
                    $info_list[$k]['addr']=$tmp_zc['addr'];
                    $info_list[$k]['zc']=$tmp_zc['name'];
                }
            }
        }

        $this->assign('page', $page->show());
        $this->assign('vlist', $info_list);

        $this->display();
    }

	public function msg(){
        $id = I('id', 0, 'intval');
        if(is_numeric($id) && $id>0){
            $vo = M('wenjuan')->find($id);
            $info_list=M('wenjuan_question')->where(array('wenjuan_id'=>$id))->order('sort asc,id asc')->select();
            foreach ($info_list as $k=>$v){
                $info_list[$k]=$v;
                $info_list[$k]['type']=M('question_type')->find($v['q_type']);
            }
            $this->assign('title', '修改问卷');
        }else{
            $this->assign('title', '添加问卷');
        }
//var_dump($info_list);

        $this->assign('vo', $vo);
        $this->assign('info_list', $info_list);
	    $this->_get_qtype();
	    $this->display();
    }

    public function wjcopy(){
        $id = I('id', 0, 'intval');
        if(is_numeric($id) && $id>0){
            $new_wj=$old_wj = M('wenjuan')->find($id);
        }
        if(empty($old_wj)){
            $this->error('没有可复制的问卷');
        }
        $new_qa=$old_qa=M('wenjuan_question')->where(array('wenjuan_id'=>$id))->order('sort asc,id asc')->select();
        unset($new_wj['id']);
        $new_wj['name'].='_复制';
        $new_wj['addtime']=time();
        $new_wj['status']=0;
        $new_id=M('wenjuan')->add($new_wj);
        if($new_id){
            foreach ($new_qa as $n){
                $tmp_v=$n;
                unset($tmp_v['id']);
                $tmp_v['wenjuan_id']=$new_id;
                M('wenjuan_question')->add($tmp_v);
            }
            $this->redirect('Wenjuan/index');
        }
        $this->error('复制失败');
    }

    public function msg_save(){
        $id=I('id',0);

        $wj['name']=I('wj_name',null);
        $wj['name_style']=I('name_style',null);
        $wj['title_style']=I('title_style',null);
        $wj['one_title_style']=I('one_title_style',null);
        $wj['two_title_style']=I('two_title_style',null);
        $wj['answer_style']=I('answer_style',null);
        $wj['tjkh_desc']=I('tjkh_desc',null);
        $wj['des']=I('des',null);
        $wj['tips']=I('wj_tips',null);
        $wj['stime']=I('stime',null);
        $wj['etime']=I('etime',null);
        $wj['pic']=trim(I('pic'));

        $province = I('province', '');
        $district = I('district', '');
        $city = I('city', '');

        if(!empty($district)&&!empty($province)&&!empty($city)){
            $wj['area']=get_region_name($district);
            $wj['city']=get_region_name($city);
            $wj['prov']=get_region_name($province);
            $wj['status']=0;
        }

        $question['qid']=I('qid');
        $question['name']=I('name');
        $question['content']=I('content');
        $question['tips']=I('tips');
        $question['q_type']=I('q_type');
        $question['prev']=I('prev');
        $question['next']=I('next');
        $question['display_sort']=I('display_sort');


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
            $this->error('问卷名不得为空');
        }

        if(!empty($wj['stime'])&&!empty($wj['etime'])){
            if($wj['stime']>$wj['etime']){
                $this->error('截止时间不得小于开始时间');
            }
        }


        if(is_numeric($id) && $id>0){
            $flag=M('wenjuan')->where(array('id'=>$id))->save($wj);
        }else{
            $wj['addtime']=time();
            $wj['status']=0;
            $id=M('wenjuan')->add($wj);
            $flag=$id;
        }

        $info_list=M('wenjuan_question')->where(array('wenjuan_id'=>$id))->order('sort asc,id asc')->select();

        $new_ids=array();
        if($id){
            foreach ($question['name'] as $k=>$v){
                $question_data=array();
                if(empty($v)){
                    if(!empty($question['qid'][$k])){//非空 删除
                        M('wenjuan_question')->where(array('id'=>$question['qid'][$k]))->delete();
                        $new_ids[]=$question['qid'][$k];
                    }
                }else{
                    $question_data['name']=$v;
                    $question_data['content']=$question['content'][$k];
                    $question_data['tips']=$question['tips'][$k];
                    $question_data['prev']=$question['prev'][$k];
                    $question_data['next']=$question['next'][$k];
                    $question_data['wenjuan_id']=$id;
                    $question_data['display_sort']=$question['display_sort'][$k];
                    $question_data['q_type']=$question['q_type'][$k];
                    $question_data['sort']=$k+1;

                    if(empty($question['qid'][$k])){//空
                        M('wenjuan_question')->add($question_data);
                    }else{
                        $new_ids[]=$question['qid'][$k];
                        M('wenjuan_question')->where(array('id'=>$question['qid'][$k]))->save($question_data);
                    }
                }
            }

            //删除字段
            foreach ($info_list as $i){
                if(!in_array($i['id'],$new_ids)){
                    M('wenjuan_question')->where(array('id'=>$i['id']))->delete();
                }
            }
        }

        $this->redirect('Wenjuan/index');

    }

    private function _get_qtype(){
	    $list=M('question_type')->order('id asc ')->select();
	    $this->assign('qtype_list',$list);
    }

    public function del(){
        $id = I('id',0 , 'intval');
        $batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
        if ($batchFlag) {
            $this->delBatch();
            return;
        }

        $acnt=$this->_get_answer_cnt($id);
        if($acnt>0){
            $this->error('该问卷已有'.$acnt.'人答题 不能删除');
        }

        if (false !== M('wenjuan')->where(array('id' => $id))->delete()) {
            //对应删除题目
            M('wenjuan_question')->where(array('wenjuan_id'=>$id))->delete();

            $this->redirect('Wenjuan/index');
        }else {
            $this->error('删除失败');
        }
    }

    public function delBatch() {

        /**
        $idArr = I('key',0 , 'intval');

        if (!is_array($idArr)) {
            $this->error('请选择要删除的项');
        }

        if (false !== M('wenjuan')->where(array('id' => array('in', $idArr)))->delete()) {
            $this->redirect('Wenjuan/index');
        }else {
            $this->error('批量删除文失败');
        }
         **/
    }


    public function an_del(){
        $id = I('id',0 , 'intval');
        $batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
        if ($batchFlag) {
            $this->an_delBatch();
            return;
        }

        if (false !== M('wenjuan_answer')->where(array('id' => $id))->delete()) {
            $this->redirect('Wenjuan/answer');
        }else {
            $this->error('删除失败');
        }
    }

    public function an_delBatch() {
        $idArr = I('key',0 , 'intval');

        if (!is_array($idArr)) {
        $this->error('请选择要删除的项');
        }

        if (false !== M('wenjuan_answer')->where(array('id' => array('in', $idArr)))->delete()) {
        $this->redirect('Wenjuan/answer');
        }else {
        $this->error('批量删除文失败');
        }
    }

    public function status(){
        $flag=I('flag',0);
        $id=I('id',0);
        if($flag==1){
            $old=M('wenjuan')->find($id);
            if($old['area']==''){
                $this->error('请先为问卷设置区域');
            }
            $where='1=1';
            $where.=" and prov='".$old['prov']."' ";
            $where.=" and city='".$old['city']."' ";
            $where.=" and area='".$old['area']."' ";
            M('wenjuan')->where($where)->save(array('status'=>0));
            $data['status']=1;
        }else{
            $data['status']=0;
        }

        $ret=M('wenjuan')->where(array('id'=>$id))->save($data);
        if($ret){
            $this->success('成功');
        }
        $this->error('失败');
    }

    private function _get_question_cnt($wid){
        $cnt=M('wenjuan_question')->where(array('wenjuan_id'=>$wid))->count();
        if($cnt){
            return $cnt;
        }
        return 0;
    }
    private function _get_answer_cnt($wid){
        $cnt=M('wenjuan_answer')->where(array('wenjuan_id'=>$wid))->count();
        if($cnt){
            return $cnt;
        }
        return 0;
    }

    public function zcywy(){
        $ret=$this->get_zcywy();
        $this->assign('total_num',$ret['total_num']);
        $this->assign('total_money',$ret['total_money']);
        $this->assign('vlist',$ret['info_list']);
        $this->display();
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
select zc_id,count(phone) as num from bestop_wenjuan_answer
where 1=1  and {$where}
 group by zc_id
order by addtime desc
eot;
        //var_dump($sql);exit();
        $vlist=M('wenjuan_answer')->query($sql);
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
select distinct user_id from bestop_wenjuan_answer
where 1=1  and  zc_id={$v['zc_id']} and {$where}
eot;
            $bf_ywy=M('wenjuan_answer')->query($zg_sql);
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
select user_id,zc_id,count(phone) as num from bestop_wenjuan_answer
where 1=1 and {$where}
 group by user_id
order by addtime desc
eot;
        //var_dump($sql);exit();
        $vlist=M('wenjuan_answer')->query($sql);
        $info_list=null;
        $total_num=0;
        foreach ($vlist as $k=>$v){
            $total_num+=$v['num'];
            $info_list[$k]=$v;

            $tmp_uinfo=M('member')->where(array('id'=>$v['user_id']))->find();
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
        $where=' 1=1 ';

        $kw_arr=array('sname','sprov','scity','sarea','sdep','sstime','setime');
        foreach ($kw_arr as $k=>$v){
            $params[$v] = I($v, '', 'htmlspecialchars,trim');
            $this->assign($v,$params[$v]);
        }
        $this->assign('search_p',$params);

        $table_pre='bestop_wenjuan_answer.';
        if(!empty($params['sarea'])&&$params['sarea']!='请选择'){
            $where.=' and '.$table_pre.'area like "'.$params['sarea'].'%"';
        }
        if(!empty($params['sname'])){
            $where.=' and '.$table_pre.'zc like "%'.$params['sname'].'%"';
        }
        if(!empty($params['sdep'])){
            $where.=' and '.$table_pre.'dep like "%'.$params['sdep'].'%"';
        }
        if(!empty($params['sstime'])){
            $where.=' and '.$table_pre.'addtime >='.strtotime($params['sstime'].' 00:00:00');
        }
        if(!empty($params['setime'])){
            $where.=' and '.$table_pre.'addtime <='.strtotime($params['setime'].' 23:59:59');
        }
        return $where;
    }

    public function export_zctj_ex(){
        $ret=$this->get_zc();
        $data['list']=$ret['info_list'];

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Wenjuan/index'));exit();
        }

        $name='问卷_职场_拜访统计_'.date(Ymd);
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
            ->setCellValue('F1', '有拜访数的业务员数')
            ->setCellValue('G1', '拜访用户数');

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

        $name='问卷_业务员_拜访统计_'.date(Ymd);
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


}



?>