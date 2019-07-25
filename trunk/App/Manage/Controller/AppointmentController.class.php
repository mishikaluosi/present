<?php
namespace Manage\Controller;
use Think\Controller;

class AppointmentController extends CommonController
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
        $where=" a.e_id = {$e_id} ";
        if(!empty($name)){
            $where.=" and (a.name like '%{$name}%' or a.phone like '%{$name}%')";
        }
        if($member_id>0){
            $where.=" and a.member_id={$member_id}";
        }
        $order='a.id desc';
        $count = M('appointment')->alias('a')
            ->join("{$pre}member bm ON bm.id=a.member_id","LEFT")
            ->where($where)
            ->count();
        $page = new \Common\Lib\Page($count, 18);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list =  M('appointment')->alias('a')
            ->field('a.*,bm.name as member')
            ->join("{$pre}member bm ON bm.id=a.member_id","LEFT")
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
    }
    public function add()
    {
        $id = I('id', 0, 'intval');
        $pre = C('DB_PREFIX');
        $vo = [];
        if(is_numeric($id) && $id>0){
            $where="a.id =$id ";
            $vo = M('appointment')->alias('a')
                ->field('a.*,bm.name as member')
                ->join("{$pre}member bm ON bm.id=a.member_id","LEFT")
                ->where($where)->find();
            $this->assign('title', '修改成员信息');
        }else{
            $e_id = I('e_id');
            if(!$e_id){
                echo '页面错误';
                exit();
            }
            $event = M('event')->where(['id'=>$e_id])->find();
            if(!$event){
                echo '活动不存在';
                exit();
            }
            $vo['e_id'] = $e_id;
            $this->assign('title', '添加成员');
        }
        $this->assign('vo', $vo);
        $this->display();
    }
    public function getMember(){
        $keywords = I('keywords');
        $where  = "1";
        if($keywords){
            $where .=" and name like '%{$keywords}%'";
        }
        $member = M('member')->where($where)->limit(20)->select();
        $this->returnSuccess($member);
    }
    public function save(){
        $app_data = I('app_data');
        $id = $app_data['id'];
        $wj['e_id'] = $app_data['e_id'];
        $wj['name'] = $app_data['name'];
        $wj['phone'] = $app_data['phone'];
        $wj['member_id'] = $app_data['member_id'];
        $wj['sex'] = $app_data['sex'];
        $wj['room_num'] = $app_data['room_num'];
        if(is_numeric($id) && $id>0){
            $flag=M('appointment')->where(array('id'=>$id))->save($wj);
        }else{
            $wj['created_at']=time();
            $wj['adduser']=$_SESSION['yang_adm_username'];
            $flag=M('appointment')->add($wj);
        }
        if($flag){
            $this->returnSuccess();
        }else {
            $this->returnError('添加失败');
        }
    }
    public function del(){
        $id = I('id',0 , 'intval');
        $e_id = I('e_id');
        if (false !== M('appointment')->where(array('id' => $id))->delete()) {
            $this->redirect('appointment/index',array('e_id'=>$e_id));
        }else {
            $this->error('删除失败');
        }
    }
    public function delBatch() {
        $idArr = I('key',0 , 'intval');
        $e_id = I('get.e_id', 0, 'intval');
        if (!is_array($idArr)) {
            $this->error('请选择要删除的项');
        }
        if (false !== M('appointment')->where(array('id' => array('in', $idArr)))->delete()) {
            $this->redirect('appointment/index',array('e_id'=>$e_id));
        }else {
            $this->error('批量删除失败');
        }
    }
    /***
     * 导出excel
     */
    public function exportEx(){
        $e_id = I('get.e_id');
        $member_id = I('get.member_id');
        $name = I('get.name');
        $where=" a.e_id = {$e_id} ";
        if(!empty($name)){
            $where.=" and (a.name like '%{$name}%' or a.phone like '%{$name}%')";
        }
        if($member_id>0){
            $where.=" and a.member_id={$member_id}";
        }
        $pre = C('DB_PREFIX');
        $app = M('appointment')->alias('a')
            ->field('a.*,bm.name as member')
            ->join("{$pre}member bm ON bm.id=a.member_id","LEFT")
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
            ->setCellValue('E1', '房间号');
        foreach ($app as $k => $v) {
            $num = $k + 2;
            $objActiveSheet->setCellValue("A$num", $v['name'])
                ->setCellValue("B$num", $v['phone'])
                ->setCellValue("C$num", $v['sex'])
                ->setCellValue("D$num", $v['member'])
                ->setCellValue("E$num", $v['room_num']);
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
    //导入
    public function upload(){
        header("Content-Type:text/html; charset=utf-8");//不然返回中文乱码
        if(empty($_FILES)){
            $this->error('必须选择上传文件');
        }
        $e_id = I('e_id');
        $path = $this->_uploadFile();
        $uploadfile = $_SERVER['DOCUMENT_ROOT'].C("TMPL_PARSE_STRING.__UPLOAD__").$path['inputExcel']['savepath'].$path['inputExcel']['savename'];
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();
        $objReader = $iofactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load($uploadfile);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();//取得总行数
        $highestColumnIndex =5;//总列数
        $map=array();
        for ($col = 0;$col <$highestColumnIndex ;$col++)//注意highestColumnIndex的列数索引从0开始
        {
            $map[$col] =trim($objWorksheet->getCellByColumnAndRow($col, 1)->getValue());
        }
        $body=array();
        for ($row = 2;$row <= $highestRow;$row++)//从excel的第二行读取数据，第一行是标题
        {
            $strs=array();
            for ($col = 0;$col < $highestColumnIndex;$col++)//注意highestColumnIndex的列数索引从0开始
            {
                $strs[$map[$col]] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
            $body[]=$strs;
        }
        $data=[];
        foreach ($body as $value){
            $tmp_data = $value;
            $tmp_data['created_at'] =time();
            $tmp_data['adduser']=$_SESSION['yang_adm_username'];
            $tmp_data['e_id'] =$e_id;
            $data[] = $tmp_data;
        }
        $ret = M('appointment')->addAll($data);
        if(!$ret){
            $this->returnError('批量导入失败');
        }
        $this->returnSuccess();
    }
    public function _uploadFile($sfile = 'excel') {
        $ext = '';//原文件后缀
        foreach ($_FILES as $key => $v) {
            $strtemp = explode('.', $v['name']);
            $ext = end($strtemp);//获取文件后缀，或$ext = end(explode('.', $_FILES['fileupload']['name']));
            break;
        }


        $upload = new \Think\Upload();//new Upload($config)
        //修配置项
        $upload->autoSub =true;//是否使用子目录保存图片
        $upload->subType = 'date';//子目录保存规则
        $upload->subName = array('date', 'Ymd');
        $upload->maxSize = get_upload_maxsize();//设置上传文件大小
        $upload->exts = explode(',', C('CFG_UPLOAD_FILE_EXT').',xls,xlsx,XLS,XLSX');//设置上传文件类型
        $upload->rootPath = C('CFG_UPLOAD_ROOTPATH');//上传根路径
        $upload->savePath = rtrim($sfile, '/').'/';//上传（子）目录
        $upload->saveName = array('uniqid', '');//上传文件命名规则
        $upload->replace = true; //存在同名是否覆盖
        $upload->callback = false; //检测文件是否存在回调函数，如果存在返回文件信息数组


        if($info = $upload->upload()) {

            return $info;

        }else {

            return $upload->getError();
        }


    }
}
