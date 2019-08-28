<?php
namespace Manage\Controller;
use Think\Controller;

class ZcController extends CommonController {
	
	public function index() {
        $keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
        $where = '1=1';

        $kw_arr=array('sname','sphone','sprov','scity','sarea','keyword');
        $db_arr=array('contact','tel','prov','city','area','name');
        foreach ($kw_arr as $k=>$v){
            $params[$v] = I($v, '', 'htmlspecialchars,trim');
            if(!empty($params[$v])&&$params[$v]!='请选择'){
                if(in_array($v,array('sprov','scity','sarea'))){
                    $where.=' and '.$db_arr[$k].' like "%'.$params[$v].'%"';
                }else{
                    $where.=' and '.$db_arr[$k].' like "%'.$params[$v].'%"';
                }

            }
            $this->assign($v,$params[$v]);
        }

        $count = M('zc')->where($where)->count();
        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $art = M('zc')->where($where)->order('sort ASC, id DESC')->limit($limit)->select();

        $this->assign('keyword', $keyword);
        $this->assign('page', $page->show());
        $this->assign('vlist', $art);
		$this->display();
	}


	public function msg(){
        $id = I('id', 0,'intval');
        if(IS_POST){
            $this->msg_save();
            exit();
        }
        $type_title='';
        if(is_numeric($id)){
            $vo= M('zc')->where(array('id'=>$id))->find();
        }
        if($vo){
            $type_title='修改职场';
        }else{
            $type_title='添加职场';
        }

        $this->assign('type_title', $type_title);
        $this->assign('vo', $vo);
        $this->display();
    }

    public function msg_save(){
        $data=I('post.');
        if(empty($data['sort'])){
            $data['sort']=1;
        }
        if(empty($data['name'])){
            $this->error('名称不得为空');
        }
        if(empty($data['contact'])){
            $this->error('联系人不得为空');
        }
        if(empty($data['tel'])){
            $this->error('联系电话不得为空');
        }
        if(empty($data['addr'])){
            $this->error('地址不得为空');
        }
        if(empty($data['prov'])||empty($data['city'])||empty($data['area'])){
            $this->error('请选择所在区域');
        }
        if($this->_chk($data['name'],$data['id'])){
            $this->error($data['name'].'已经存在，请更换职场名');
        }

        if(is_numeric($data['id'])&&$data['id']>1){//保存
            $data['edittime']=time();
            $flag=M('zc')->where("id=".$data['id'])->data($data)->save();
        }else{//添加
            $data['addtime']=time();
            $flag=M('zc')->add($data);
        }

        if($flag){
            $this->redirect('zc/index');
        }else {
            $this->error('添加失败');
        }
    }

    public function _chk($name,$id){
        if(empty($name)){
            return null;
        }

        if(is_numeric($id)&&$id>0){
            $where='id !='.$id.' and name="'.$name.'"';
        }else{
            $where=array('name'=>$name);
        }
        $ret=M('zc')->where($where)->find();
        if($ret){
            return true;
        }
        return false;
    }

    public function sort(){
        $id = I('id',0, 'intval');
        $sort = I('sort',0, 'intval');
        $data = array(
            'sort' => $sort,
        );
        $data['sort'] = $sort;
        $sorts=M('zc')->where("id=$id")->data($data)->save();
        echo "$sorts";
    }

    public function del(){
        $id = I('id',0 , 'intval');

        if (M('zc')->where('id='.$id)->delete()) {
            $this->success('删除成功', U('Zc/index'));
        }else {
            $this->error('删除失败');
        }
    }

    /***
     * 省市区三级联动的数据
     */
    public function get_region_jsdata(){
        $type=I('type',null);
        echo get_region_jsdata($type);
        exit();
    }
    /***
     * 新的省市区三级联动的数据 可以选择空
     */
    public function get_region_jsdata_new(){
        $type=I('type',null);
        echo get_region_jsdata_new($type);
        exit();
    }
    /**
     * 省
     */
    public function get_prov_jsdata(){
        $info=get_region_bypid(1,1);
        echo json_encode($info);
        exit();
    }
    public function get_city_jsdata(){
        $pid = I('pid',0 , 'intval');
        $info=get_region_bypid($pid,2);
        echo json_encode($info);
        exit();
    }
    public function get_area_jsdata(){
        $pid = I('pid',0 , 'intval');
        $info=get_region_bypid($pid,3);
        echo json_encode($info);
        exit();
    }
    public function get_zc_jsdata(){
        $pid = I('pid',0 , 'intval');
        $area=M('region')->where(array('region_id'=>$pid))->find();
        $city=M('region')->where(array('region_id'=>$area['parent_id']))->find();
        $info=array();
        if($area && $city){
            $keyword=trim($area['region_name']);
            $where='  area like "%'.$keyword.'%" ';
            $where.=' and city like "%'.trim($city['region_name']).'%" ';
            $info= M('zc')->where($where)->order('sort ASC, id DESC')->select();
        }

        echo json_encode($info);
        exit();
    }

    public function upload() {
        header("Content-Type:text/html; charset=utf-8");//不然返回中文乱码

        if(empty($_FILES)){
            return array(
                'state' =>false,
                'info' => '必须选择上传文件'
            );
        }else{
            $info = $this->_uploadFile();//获取图片信息

            return array(
                'state' =>"SUCCESS",
                'info' =>$info
            );
        }

    }

    public function _uploadFile($sfile = 'file1') {
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

    /***
     * 导入excel
     */
    public function import_ex(){
        $info=$this->upload();

        if($info['state']==false){
            echo json_encode($info);exit();
        }
        $index='mypic_1';
        $file_path=C('CFG_UPLOAD_ROOTPATH').$info['info'][$index]['savepath']."".$info['info'][$index]['savename'];
        $ext=$info['info'][$index]['ext'];
        $info=$this->deal_excel($file_path,$ext);
        echo json_encode($info);exit();
    }

    /***
     * 导出excel
     */
    public function export_ex(){

        $data['list']= M('zc')->order('sort ASC, id DESC')->select();

        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Zc/index'));exit();
        }

        $name='职场';    //生成的Excel文件文件名
        //var_dump($data);exit();

        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("职场数据")
            ->setLastModifiedBy("职场数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("职场数据")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '职场名称')
            ->setCellValue('B1', '联系人')
            ->setCellValue('C1', '联系电话')
            ->setCellValue('D1', '省')
            ->setCellValue('E1', '市')
            ->setCellValue('F1', '区')
            ->setCellValue('G1', '详细地址')
            ->setCellValue('H1', '排序')
            ->setCellValue('I1', '添加时间');

        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        $objActSheet->getStyle( 'A1:I1')->applyFromArray(
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

        $objActSheet->getColumnDimension( 'A')->setWidth(27);
        $objActSheet->getColumnDimension( 'B')->setWidth(16);
        $objActSheet->getColumnDimension( 'C')->setWidth(16);
        $objActSheet->getColumnDimension( 'D')->setWidth(11);
        $objActSheet->getColumnDimension( 'E')->setWidth(11);
        $objActSheet->getColumnDimension( 'F')->setWidth(11);
        $objActSheet->getColumnDimension( 'G')->setWidth(46);
        $objActSheet->getColumnDimension( 'H')->setWidth(11);
        $objActSheet->getColumnDimension( 'I')->setWidth(27);

        foreach ($data['list'] as $k=>$V){
            $num=$k+2;

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['name'])
                ->setCellValue('B'.$num, $V['contact'])
                ->setCellValue('C'.$num, $V['tel'])
                ->setCellValue('D'.$num, $V['prov'])
                ->setCellValue('E'.$num, $V['city'])
                ->setCellValue('F'.$num, $V['area'])
                ->setCellValue('G'.$num, $V['addr'])
                ->setCellValue('H'.$num, $V['sort'])
                ->setCellValue('I'.$num, date("Y-m-d H:i:s",$V['addtime']));
            $objActSheet->getRowDimension($num)->setRowHeight(25);
            $objActSheet->getStyle( 'A'.$num.':I'.$num.'')->applyFromArray(
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

    /**
     * 导入的excel处理
     * @param $filePath
     * @param $ext
     * @return bool
     */
    public function deal_excel($filePath,$ext){
        error_reporting(0);//禁用错误报告
        $c_array=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
            'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
            'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
        );
        ini_set('max_execution_time', '0');
        import("Org.Util.PHPExcel");

        $PHPExcel = new \PHPExcel();
        if ($ext == 'xls') {
            $PHPReader = new \PHPExcel_Reader_Excel5();
        } else if ($ext == 'xlsx') {
            $PHPReader = new \PHPExcel_Reader_Excel2007();
        } else if ($ext == 'csv') {
            $PHPReader = new \PHPExcel_Reader_CSV();
            //默认输入字符集
            $PHPReader->setInputEncoding('GBK');
            //默认的分隔符
            $PHPReader->setDelimiter(',');
        }

        // 加载excel文件
        $PHPExcel = $PHPReader->load($filePath);

        // 读取excel文件中的第一个工作表
        $currentSheet = $PHPExcel->getSheet(0);
        // 取得最大的列号
        $allColumn = $currentSheet->getHighestColumn();
        $allIndex=array_keys($c_array,$allColumn,true);
        // 取得一共有多少行
        $allRow = $currentSheet->getHighestRow();

        $retrun_arr=array(
            'state' =>false,
            'info' => '必须选择上传文件'
        );
        //检测基本格式 职场名称	联系人	联系电话	省	市	区	详细地址	排序
        $chk_filed=array('A'=>'职场名称','B'=>'联系人','C'=>'联系电话','D'=>'省','E'=>'市','F'=>'区','G'=>'详细地址');
        foreach ($chk_filed as $key=>$chk){
            $filed_1=$currentSheet->getCellByColumnAndRow(ord($key) - 65,1);
            $val_1 = $filed_1->getValue();
            if(trim($val_1)!=trim($chk)){
                $retrun_arr['info']='EXCEL模板错误，请上传正确的EXCEL';
                return $retrun_arr;
            }
        }
        $chk_colum_len=8;

        $db_insert_arr=array(
            'name','contact',"tel","prov","city","area",'addr','sort'
        );

        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            /**从第A列开始输出*/
            for($currentColumn= 0;$currentColumn <= $allIndex[0]; $currentColumn++){
                $column_index=$c_array[$currentColumn];
                $cell = $currentSheet->getCellByColumnAndRow($currentColumn,$currentRow);
                $val = $cell->getValue();

                if(is_object($val))  $val= $val->__toString();

                if (empty($val)) {
                    $val = " ";
                }
                if($currentColumn<$chk_colum_len){
                    $data1[$db_insert_arr[$currentColumn]]=trim($val);
                }
            }
            if(!empty($data1['name'])&&!empty($data1['contact'])){
                $data1['sort']=is_numeric($data1['sort'])&&$data1['sort']>0?$data1['sort']:1;
                $data1['addtime']=time();
                M('zc')->add($data1);
                $row_data[] = $data1;
            }

        }

        //M('reward')->addAll($row_data);
        return array('state' =>'SUCCESS', 'info' => '');
    }

}



?>
