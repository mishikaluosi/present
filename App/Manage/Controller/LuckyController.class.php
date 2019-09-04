<?php
namespace Manage\Controller;
use Think\Controller;

class LuckyController extends CommonController
{
    public function index()
    {
        $this->_get_search();
        $this->display();
    }
    private function _get_search(){
        $e_id=I('e_id');
        $pre = C('DB_PREFIX');
        if(!$e_id){
            echo '页面错误';
            exit();
        }
        $event = M('event')->where(['id'=>$e_id])->find();
        if(!$event){
            echo '活动不存在';
            exit();
        }
        $this->assign('event', $event);
//        $name=I('name');
//        $this->assign('name', $name);
//        $member_id=I('member_id');
//        $member=I('member');
//        $this->assign('member_id', $member_id);
//        $this->assign('member', $member);
        $where=" p.e_id = {$e_id} ";
//        if(!empty($name)){
//            $where.=" and (a.name like '%{$name}%' or a.phone like '%{$name}%')";
//        }
//        if($member_id>0){
//            $where.=" and a.member_id={$member_id}";
//        }
        $order='p.id desc';
        $count = M('prize')->alias('p')
            ->join("{$pre}event e ON e.id=p.e_id","LEFT")
            ->join("{$pre}event_user eu ON eu.id=p.uid","LEFT")
            ->join("{$pre}member bm ON bm.id=eu.member_id","LEFT")
            ->join("{$pre}event_draw ed ON ed.id=p.draw_id","LEFT")
            ->join("{$pre}award a ON a.id=ed.award_id","LEFT")
            ->where($where)
            ->count();
        $page = new \Common\Lib\Page($count, 18);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('prize')->alias('p')
                    ->field('p.*,bm.name as member,e.name as event_name,eu.name as nickname,eu.username as username,eu.image as head_image,eu.phone,ed.draw_level,a.name as award_name,a.image as award_image')
                    ->join("{$pre}event e ON e.id=p.e_id","LEFT")
                    ->join("{$pre}event_user eu ON eu.id=p.uid","LEFT")
                    ->join("{$pre}member bm ON bm.id=eu.member_id","LEFT")
                    ->join("{$pre}event_draw ed ON ed.id=p.draw_id","LEFT")
                    ->join("{$pre}award a ON a.id=ed.award_id","LEFT")
                    ->where($where)
                    ->order($order)
                    ->limit($limit)
                    ->select();
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
    }


    public function export_zjlb_ex(){
        $e_id=I('e_id');
        $pre = C('DB_PREFIX');
        $where=" p.e_id = {$e_id} ";
        $order='p.id desc';

        $list = M('prize')->alias('p')
            ->field('p.*,bm.name as member,e.name as event_name,eu.name as nickname,eu.username as username,eu.image as head_image,eu.phone,ed.draw_level,a.name as award_name,a.image as award_image')
            ->join("{$pre}event e ON e.id=p.e_id","LEFT")
            ->join("{$pre}event_user eu ON eu.id=p.uid","LEFT")
            ->join("{$pre}member bm ON bm.id=eu.member_id","LEFT")
            ->join("{$pre}event_draw ed ON ed.id=p.draw_id","LEFT")
            ->join("{$pre}award a ON a.id=ed.award_id","LEFT")
            ->where($where)
            ->order($order)
            ->select();


        $name = '活动_中奖列表';

        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();
        $objPHPExcel->getProperties()->setCreator("中奖列表")
            ->setLastModifiedBy("中奖列表")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("中奖列表")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '活动名称')
            ->setCellValue('B1', '业务员')
            ->setCellValue('C1', '姓名')
            ->setCellValue('D1', '昵称')
            ->setCellValue('E1', '手机号')
            ->setCellValue('F1', '奖项')
            ->setCellValue('G1', '奖品')
            ->setCellValue('H1', '是否有效');
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
        $objPHPExcel->getActiveSheet()->getStyle('A:D')->getNumberFormat()->setFormatCode('@');
        foreach ($list as $k=>$V){
            $num=$k+2;

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['event_name'])
                ->setCellValue('B'.$num, $V['member'])
                ->setCellValue('C'.$num, $V['username'])
                ->setCellValue('D'.$num, $V['nickname'])
                ->setCellValue('E'.$num, $V['phone'])
                ->setCellValue('F'.$num, $V['draw_level'])
                ->setCellValue('G'.$num, $V['award_name'])
                ->setCellValue('H'.$num, $V['is_disabled'] == 0 ? '是' : '否');
            $objActSheet->getRowDimension($num)->setRowHeight(25);
            $objActSheet->getStyle( 'A'.$num.':D'.$num.'')->applyFromArray(
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

    public function status(){
        $flag=I('flag',0);
        $id=I('id',0);
        if($flag==1){
            $data['is_disabled']=1;
        }else{
            $data['is_disabled']=0;
        }

        $ret=M('prize')->where(array('id'=>$id))->save($data);
        if($ret){
            $this->success('成功');
        }
        $this->error('失败1');
    }
}
