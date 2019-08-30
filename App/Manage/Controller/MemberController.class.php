<?php
namespace Manage\Controller;

class MemberController extends CommonController {

	public function index() {
        $fp=I('fp','all');
        $where=' 1=1 ';
        switch ($fp){
            case 'all':break;
            case 'nolock':$where.=' and islock!=1 ';break;
            case 'lock':$where.=' and islock=1 ';break;
            case 'no_zc':$where.=' and (zc_id is null)';break;
        }
        $this->assign('fp', $fp);

        $kw_arr=array('sname','sphone','sprov','scity','sarea','sgno','swno');
        $db_arr=array('name','phone','prov','city','area','group_no','work_no');
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

		$count = M('member')->where($where)->count();

		$page = new \Common\Lib\Page($count, 10);
		$page->rollPage = 7;
		$page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$limit = $page->firstRow. ',' .$page->listRows;
		$list = D('member')->where($where)->order('id desc')->limit($limit)->select();

        $tongji['all'] = pe_num('member', null);
        $tongji['lock'] = pe_num('member', 'islock=1 ');
        $tongji['nolock'] = pe_num('member', '  islock!=1 ');
        $tongji['nozc'] = pe_num('member', '(zc_id is null)');
        $this->assign('tongji', $tongji);

		$this->assign('page', $page->show());
		$this->assign('vlist', $list);
		$this->assign('type', '会员列表');
		$this->display();
	}
	//添加
	public function add() {
		if (IS_POST) {
			$this->addPost();
			exit();
		}
		$this->display();
	}

	public function addPost() {
        $name = trim(I('name', ''));
        $phone = trim(I('phone', ''));
        $password = I('password', '');
        $province = I('province', '');
        $district = I('district', '');
        $city = I('city', '');
        $zc = I('zc', '');
        $group_no = trim(I('group_no', ''));
        $work_no = trim(I('work_no', ''));
        $islock = trim(I('islock', ''));

        //基本验证
        if(empty($name)){
            $this->error('名称不得为空');
        }
        if(empty($phone)){
            $this->error('手机号码不得为空');
		}else{
            if($this->_chk($phone)){
                $this->error($phone.'已经存在，请更换手机号');
            }
		}

		if(empty($group_no)){
            $this->error('组号不得为空');
        }else if(!is_numeric($group_no)){
            $this->error('组号必须为数字');
        }else if(strlen($group_no)!=11){
            $this->error('组号不得少于11位');
        }

        if(empty($work_no)){
            $this->error('工号不得为空');
        }else if(!is_numeric($work_no)){
            $this->error('工号必须为数字');
        }else if(strlen($work_no)!=14){
            $this->error('工号不得少于14位');
        }

		$data=array(
			'name'=>$name,
			'phone'=>$phone,
            'group_no'=>$group_no,
            'work_no'=>$work_no,
            'islock'=>$islock,
		);
		if(is_numeric($zc)&&$zc>0){
			$data['zc_id']=$zc;
			$data['area']=get_region_name($district);
            $data['city']=get_region_name($city);
            $data['prov']=get_region_name($province);
		}
		if(empty($password)){
            $passwordinfo=get_password(substr($phone,-6));
		}else{
            $passwordinfo = I('password', '','get_password');
		}
		$data['regtime'] = time();
		$data['password'] = $passwordinfo['password'];
		$data['encrypt'] = $passwordinfo['encrypt'];

		if($id = M('member')->add($data)) {
			$this->success('添加成功',U('Member/index'));
		}else {
			$this->error('添加失败');
		}
	}

    public function _chk($phone,$id){
        if(empty($phone)){
            return null;
        }
        $phone=trim($phone);
        if(is_numeric($id)&&$id>0){
            $where='id !='.$id.' and phone="'.$phone.'"';
        }else{
            $where=array('phone'=>$phone);
        }
        $ret=M('member')->where($where)->find();
        if($ret){
            return true;
        }
        return false;
    }

	//编辑
	public function edit() {
		//当前控制器名称
		$id = I('id', 0, 'intval');
		if (IS_POST) {
			$this->editPost();
			exit();
		}
		$vo = M('member')->find($id);
		$this->assign('vo', $vo);
		$this->display();
	}


	//修改文章处理
	public function editPost() {
        $name = trim(I('name', ''));
        $phone = trim(I('phone', ''));
        $province = I('province', '');
        $district = I('district', '');
        $city = I('city', '');
        $zc = I('zc', '');
        $group_no = trim(I('group_no', ''));
        $work_no = trim(I('work_no', ''));
        $area_level = I('area_level', 0);
        $city_level = I('city_level', 0);
        $id = I('id', '');
        //基本验证
		if(!is_numeric($id)){
            $this->error('错误的请求');
		}
        if(empty($name)){
            $this->error('名称不得为空');
        }
        if(empty($phone)){
            $this->error('手机号码不得为空');
        }else{
            if($this->_chk($phone,$id)){
                $this->error($phone.'已经存在，请更换手机号');
            }
        }

        if(empty($group_no)){
            $this->error('组号不得为空');
        }else if(!is_numeric($group_no)){
            $this->error('组号必须为数字');
        }else if(strlen($group_no)!=11){
            $this->error('组号不得少于11位');
        }

        if(empty($work_no)){
            $this->error('工号不得为空');
        }else if(!is_numeric($work_no)){
            $this->error('工号必须为数字');
        }else if(strlen($work_no)!=14){
            $this->error('工号不得少于14位');
        }

        $data=array(
            'name'=>$name,
            'phone'=>$phone,
            'group_no'=>$group_no,
            'work_no'=>$work_no,
            'area_level'=>$area_level,
            'city_level'=>$city_level,
        );
        if(is_numeric($zc)&&$zc>0){
            $data['zc_id']=$zc;
            $data['area']=get_region_name($district);
            $data['city']=get_region_name($city);
            $data['prov']=get_region_name($province);
        }
		if (false !== M('member')->where(array('id'=>$id))->save($data)) {
			$this->success('修改成功', U('Member/index'));
		}else {
			$this->error('修改失败');
		}

	}

    public function state(){
        $id = I('id',0 , 'intval');
        $status = I('islock',1 , 'intval');
        $flag=M('member')->where("id=".$id)->data(array('islock'=>$status))->save();
        if ($flag) {
            $this->success('操作成功',null,1);
        }else {
            $this->error('操作失败');
        }
    }

    public function resetpwd(){
        $id = I('id', 0, 'intval');
        $vo = M('member')->find($id);
        $this->assign('vo', $vo);
        $this->display();
	}

    /**
     * 重置密码保存
     */
	public function save_pwd(){
        $id = I('id', '');
        $oldpassword = I('oldpassword', '');
        $password = I('password', '');
        $rpassword = I('rpassword', '');
        if (empty($oldpassword)) {
            $this->error('请输入管理员key！');
        }else if(trim($oldpassword)!='xzl888'){
            $this->error('管理员key不正确！');
		}
        if (empty($password)) {
            $this->error('请填写新密码！');
        }
        if ($password != $rpassword) {
            $this->error('两次密码不一样，请重新填写！');
        }

        $self = M('member')->field(array('phone', 'password' ,'encrypt'))->where(array('id' => $id))->find();
        if (!$self) {
            $this->error('错误的请求');
        }
        $passwordinfo = get_password($password);
        $data = array(
            'id'		=> $id,
            'password'		=> $passwordinfo['password'],
            'encrypt'		=> $passwordinfo['encrypt']
        );
        if (false !== M('member')->save($data)) {
            $this->success('修改密码成功', U('Member/index'));
        }else {
            $this->error('修改密码失败');
        }
	}

    /**
     * 导出excel
     */
	public function export_ex(){
        $where=' 1=1 ';
        $kw_arr=array('sname','sphone','sprov','scity','sarea','sgno','swno');
        $db_arr=array('name','phone','prov','city','area','group_no','work_no');
        foreach ($kw_arr as $k=>$v){
            $params[$v] = I($v, '', 'htmlspecialchars,trim');
            if(!empty($params[$v])&&$params[$v]!='请选择'){
                if(in_array($v,array('sprov','scity','sarea'))){
                    $where.=' and '.$db_arr[$k].' like "%'.$params[$v].'%"';
                }else{
                    $where.=' and '.$db_arr[$k].' like "%'.$params[$v].'%"';
                }

            }
        }
        $data['list']= M('member')->where($where)->order('id DESC')->select();
        if(count($data['list'])<1){
            $this->error('没有可导出的记录',U('Member/index'));exit();
        }

        $name='业务员';    //生成的Excel文件文件名
        //var_dump($data);exit();

        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $objPHPExcel->getProperties()->setCreator("业务员数据")
            ->setLastModifiedBy("业务员数据")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从新之礼系统导出")
            ->setKeywords("业务员数据")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '姓名')
            ->setCellValue('B1', '手机号')
            ->setCellValue('C1', '组号')
            ->setCellValue('D1', '工号')
            ->setCellValue('E1', '省')
            ->setCellValue('F1', '市')
            ->setCellValue('G1', '区')
            ->setCellValue('H1', '职场')
			->setCellValue('I1', '添加时间');

        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->getRowDimension(1)->setRowHeight(25);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle('A:I')->getNumberFormat()->setFormatCode('@');

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

        $objActSheet->getColumnDimension( 'A')->setWidth(18);
        $objActSheet->getColumnDimension( 'B')->setWidth(18);
        $objActSheet->getColumnDimension( 'C')->setWidth(18);
        $objActSheet->getColumnDimension( 'D')->setWidth(18);
        $objActSheet->getColumnDimension( 'E')->setWidth(18);
        $objActSheet->getColumnDimension( 'F')->setWidth(18);
        $objActSheet->getColumnDimension( 'G')->setWidth(18);
        $objActSheet->getColumnDimension( 'H')->setWidth(40);
        $objActSheet->getColumnDimension( 'I')->setWidth(27);

        foreach ($data['list'] as $k=>$V){
            $num=$k+2;

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['name'])
                ->setCellValue('B'.$num, $V['phone'])
                ->setCellValue('C'.$num, $V['group_no'])
                ->setCellValue('D'.$num, $V['work_no'])
                ->setCellValue('E'.$num, $V['prov'])
                ->setCellValue('F'.$num, $V['city'])
                ->setCellValue('G'.$num, $V['area'])
                ->setCellValue('H'.$num, get_zc_name($V['zc_id']))
                ->setCellValue('I'.$num, date("Y-m-d H:i:s",$V['regtime']));
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
        //检测基本格式 姓名	手机号	组号	工号	省	市	区
        $chk_filed=array('A'=>'姓名','B'=>'手机号','C'=>'组号','D'=>'工号','E'=>'省','F'=>'市','G'=>'区');
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
            'name','phone',"group_no","work_no","prov","city",'area','zc_before','zc_id'
        );

        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            $data1=array();
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
            if(!empty($data1['name'])&&!empty($data1['phone'])&&$this->_chk($data1['phone'])==false){
                $zc_id=$data1['zc_before'].$data1['zc_id'];
                if(!empty($zc_id)){
                    $zc_info=get_zc_byname($zc_id);
                    if($zc_info){
                        $data1['zc_id']=$zc_info['id'];
                        $data1['prov']=$zc_info['prov'];
                        $data1['city']=$zc_info['city'];
                        $data1['area']=$zc_info['area'];
                    }
                }
                if(!$zc_info){
                    $data1['zc_id']=null;$data1['prov']=null;$data1['city']=null;$data1['area']=null;
                }

                $passwordinfo=get_password(substr($data1['phone'],-6));
                $data1['regtime'] = time();
                $data1['islock']=0;
                $data1['password'] = $passwordinfo['password'];
                $data1['encrypt'] = $passwordinfo['encrypt'];

                M('member')->add($data1);
                $row_data[] = $data1;
            }else{
                //覆盖
                $ret=M('member')->where(array('phone'=>trim($data1['phone'])))->find();
                if($ret){
                    $zc_id=$data1['zc_id'];
                    if(!empty($zc_id)){
                        $zc_info=get_zc_byname($zc_id);
                        if($zc_info){
                            $data1['zc_id']=$zc_info['id'];
                            $data1['prov']=$zc_info['prov'];
                            $data1['city']=$zc_info['city'];
                            $data1['area']=$zc_info['area'];
                        }
                    }
                    if(!$zc_info){
                        $data1['zc_id']=null;$data1['prov']=null;$data1['city']=null;$data1['area']=null;
                    }
                    $data1['islock']=0;
                    M('member')->where(array('id'=>$ret['id']))->save($data1);
                }
            }
        }

        //M('reward')->addAll($row_data);
        return array('state' =>'SUCCESS', 'info' => '');
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
}



?>
