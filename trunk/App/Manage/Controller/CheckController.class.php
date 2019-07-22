<?php
namespace Manage\Controller;
use Think\Controller;

class CheckController extends CommonController
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
        $name=I('name');
        $this->assign('name', $name);
        $member_id=I('member_id');
        $member=I('member');
        $this->assign('member_id', $member_id);
        $this->assign('member', $member);
        $where=" eu.e_id = {$e_id} ";
        if(!empty($name)){
            $where.=" and (eu.name like '%{$name}%' or eu.phone like '%{$name}%' or eu.city like '%{$name}%' or eu.province like '%{$name}%')";
        }
        if($member_id>0){
            $where.=" and eu.member_id={$member_id}";
        }
        $order='eu.id desc';
        $count = M('event_user')->alias('eu')
            ->join("{$pre}member bm ON bm.id=eu.member_id","LEFT")
            ->where($where)
            ->count();
        $page = new \Common\Lib\Page($count, 18);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list =  M('event_user')->alias('eu')
            ->field('eu.*,bm.name as member')
            ->join("{$pre}member bm ON bm.id=eu.member_id","LEFT")
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
    }
    /***
     * 导出excel
     */
    public function exportEx(){
        $ids = I('get.ids');
        $where ="1";
        if($ids){
            $where .= " and eu.id in ($ids)";
        }
        $pre = C('DB_PREFIX');
        $app = M('event_user')->alias('eu')
            ->field('eu.*,bm.name as member')
            ->join("{$pre}member bm ON bm.id=eu.member_id","LEFT")
            ->where($where)->select();
        $name=date('Y_m_d_H_i_s');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();
        $objPHPExcel->setActiveSheetIndex(0);
        $objActiveSheet = $objPHPExcel->getActiveSheet();
        $objActiveSheet->setCellValue('A1', '姓名')
            ->setCellValue('B1', '手机号')
            ->setCellValue('C1', '性别')
            ->setCellValue('D1', '业务员')
            ->setCellValue('E1', '省')
            ->setCellValue('F1', '市');
        foreach ($app as $k => $v) {
            $num = $k + 2;
            $objActiveSheet->setCellValue("A$num", $v['name'])
                ->setCellValue("B$num", $v['phone'])
                ->setCellValue("C$num", $v['sex'])
                ->setCellValue("D$num", $v['member'])
                ->setCellValue("E$num", $v['province'])
                ->setCellValue("F$num", $v['city']);
        }
        $objPHPExcel->getActiveSheet()->setTitle($name);
        $objPHPExcel->setActiveSheetIndex(0);
        ob_clean();
        header('Content-type: application/vnd.ms-excel');
        $name=iconv("utf-8", "gb2312", $name);
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = $iofactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
//    生成二维码
    public function qrcode(){
        $e_id=I('e_id',null);
        $member_id=I('member_id',null);
        if(!is_numeric($e_id)){
            echo '活动不能为空';
            exit();
        }
        if(!is_numeric($member_id)){
            echo '业务员不能为空';
            exit();
        }
        $url= 'http://'.$_SERVER['HTTP_HOST'].U('Mobile/'.'Check/getWechat/',array('e_id'=>$e_id,'member_id'=>$member_id));
        $level=3;
        $size=4;
        Vendor('phpqrcode.phpqrcode');
        $errorCorrectionLevel =intval($level) ;//容错级别
        $matrixPointSize = intval($size);//生成图片大小
        $object = new \QRcode();
        ob_clean();
        $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
        exit();
    }
}
