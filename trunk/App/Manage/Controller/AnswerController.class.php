<?php
namespace Manage\Controller;
use Think\Controller;

class AnswerController extends CommonController {

    private function _get_events($type='list'){

        //启动&关闭活动页面。新增需要在数据库bestop_event_params里面新加一条数据
        $list= M('event_params')->order('id desc')->select();

        //用于搜索、操作
        $type_for_name=array();
        //添加修改题目，添加修改奖品称号页面
        $select_list=array();
        //题目列表tab
        $tab_list=array();

        foreach ($list as $key=>$event){
            $type_for_name[$event['id']]=$event['name'];
            $tmp_qs='第'.$event['id'].'期';
            $select_list[]=array("name"=>$tmp_qs.':'.$event['name'],"value"=>$event['name']);
            $tab_list[]=array("name"=>$tmp_qs."题目","type"=>$event['id'],'jp_name'=>$tmp_qs."奖品&称号",'qa_name'=>$tmp_qs."答题情况",'reward_name'=>$tmp_qs."中奖情况",'qs'=>$tmp_qs);
        }

        //530抽奖活动
        $type_for_name[99]="手机尾号抽奖活动";
        $select_list[]=array("name"=>"手机尾号抽奖活动","value"=>"手机尾号抽奖活动");
        $tab_list[]=array("name"=>"抽奖活动","type"=>99,'jp_name'=>"抽奖活动奖品&称号",'qa_name'=>"抽奖活动答题情况",'reward_name'=>"抽奖活动中奖情况",'qs'=>'抽奖活动');

        switch ($type){
            case 'select':return $select_list;break;
            case 'tab':return $tab_list;break;
            case 'type':return $type_for_name;break;
            default:return $list;break;
        }
    }
	
	public function index() {
        $_list=$this->_get_events('list');
        $this->assign('event_list',$_list);

		$this->display();
	}

    public function question() {

        $tab_list=$this->_get_events('tab');

        $qtype = I('qtype',1, 'intval');
        $where=' 1=1 ';
        $type_list=$this->_get_events('type');
        foreach ($type_list as $k=>$v){
            if($k==$qtype){
                $where=array("f"=>$v);
            }
        }


        $list = M('answer')->where($where)->order('sort asc')->select();
        $this->assign('type', '题目列表');
        $this->assign('qtype', $qtype);
        $this->assign('vlist',$list);
        $this->assign('tab_list',$tab_list);
        $this->display();
    }

    public function prize() {

        $tab_list=$this->_get_events('tab');
        $this->assign('tab_list',$tab_list);

        $qtype = I('qtype',99, 'intval');
        $where=' 1=1 ';
        $type_list=$this->_get_events('type');
        foreach ($type_list as $k=>$v){
            if($k==$qtype){
                $where=array("qs"=>$v);
            }
        }
        $this->assign('qtype',$qtype);

        if($qtype==99){
            $order='sort asc';
        }else{
            $order='id asc';
        }

        $list = M('prize')->where($where)->order($order)->select();

        $this->assign('type', '奖品管理');
        $this->assign('vlist',$list);
        $this->display();
    }

    public function reward(){
        $params['scompany'] = I('scompany', '', 'htmlspecialchars,trim');
        $params['sreward'] = I('sreward', '', 'htmlspecialchars,trim');
        $params['sphone'] = I('sphone', '', 'htmlspecialchars,trim');
        $params['sprize'] = I('sprize', '', 'htmlspecialchars,trim');
        $params['smin'] = I('smin', '', 'intval');
        $params['smax'] = I('smax','', 'intval');
        $params['sno'] = I('sno','', 'intval');

        $where=' 1=1 ';
        foreach ($params as $k=>$v){
            switch ($k){
                case 'scompany':
                    if(!empty($params['scompany']))
                        $where.=' and company like "%'.$params['scompany'].'%"';
                    break;
                case 'sreward':
                    if(!empty($params['sreward']))
                        $where.=' and reward like "%'.$params['sreward'].'%"';
                    break;
                case 'sphone':
                    if(!empty($params['sphone']))
                        $where.=' and phone="'.$params['sphone'].'"';
                    break;
                case 'sprize':
                    if(!empty($params['sprize']))
                        $where.=' and prize like "%'.$params['sprize'].'%"';
                    break;
                case 'sno':
                    if(!empty($params['sno']))
                        $where.=' and number="'.$params['sno'].'"';
                    break;
                case 'smin':
                    if(!empty($params['smin']))
                        $where.=' and right_cnt>='.$params['smin'];
                    break;
                case  'smax':
                    if(!empty($params['smax']))
                        $where.=' and right_cnt<='.$params['smax'];
                    break;
            }
            $this->assign($k,$v);
        }


        $tab_list=$this->_get_events('tab');
        $this->assign('tab_list',$tab_list);

        $qtype = I('qtype',1, 'intval');
        //$where=' 1=1 ';
        $type_list=$this->_get_events('type');
        foreach ($type_list as $k=>$v){
            if($k==$qtype){
                $where.=' and qs="'.$v.'"';
            }
        }
        $this->assign('qtype',$qtype);

//echo var_dump($where);
        $count = M('reward')->where($where)->count();
        $page = new \Common\Lib\Page($count, 20);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('reward')->where($where)->order('number desc,addtime desc')->limit($limit)->select();

        $this->assign('type', '中奖情况查询');
        $this->assign('page', $page->show());
        $this->assign('vlist',$list);

        $this->display();
    }

    public function userqa() {
        $params['scompany'] = I('scompany', '', 'htmlspecialchars,trim');
        $params['sname'] = I('sname', '', 'htmlspecialchars,trim');
        $params['sphone'] = I('sphone', '', 'htmlspecialchars,trim');
        $params['sarea'] = I('sarea', '', 'htmlspecialchars,trim');
        $params['smin'] = I('smin', '', 'intval');
        $params['smax'] = I('smax','', 'intval');
        $params['sno'] = I('sno','', 'intval');

        $where=' 1=1 ';
        foreach ($params as $k=>$v){
            switch ($k){
                case 'scompany':
                    if(!empty($params['scompany']))
                    $where.=' and company like "%'.$params['scompany'].'%"';
                    break;
                case 'sname':
                    if(!empty($params['sname']))
                    $where.=' and name like "%'.$params['sname'].'%"';
                break;
                case 'sphone':
                    if(!empty($params['sphone']))
                    $where.=' and phone="'.$params['sphone'].'"';
                break;
                case 'sarea':
                    if(!empty($params['sarea']))
                    $where.=' and area="'.$params['sarea'].'"';
                break;
                case 'sno':
                    if(!empty($params['sno']))
                    $where.=' and number="'.$params['sno'].'"';
                break;
                case 'smin':
                    if(!empty($params['smin']))
                    $where.=' and score>='.$params['smin'];
                break;
                case  'smax':
                    if(!empty($params['smax']))
                    $where.=' and score<='.$params['smax'];
                break;
            }
            $this->assign($k,$v);
        }

        $tab_list=$this->_get_events('tab');
        $this->assign('tab_list',$tab_list);

        $qtype = I('qtype',1, 'intval');
        //$where=' 1=1 ';
        $type_list=$this->_get_events('type');
        foreach ($type_list as $k=>$v){
            if($k==$qtype){
                $where.=' and qs="'.$v.'"';
            }
        }
        $this->assign('qtype',$qtype);

//echo var_dump($where);
        $count = M('answer_info')->where($where)->count();
        $page = new \Common\Lib\Page($count, 50);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('answer_info')->where($where)->order('number desc,addtime desc')->limit($limit)->select();

        $this->assign('type', '答题情况');
        $this->assign('page', $page->show());
        $this->assign('vlist',$list);

        $this->display();
    }

    //批量彻底删除
    public function delBatch() {

        $idArr = I('key',0 , 'intval');
        if (!is_array($idArr)) {
            $this->error('请选择要彻底删除的项');
        }
        $where = array('id' => array('in', $idArr));

        if (M('answer')->where($where)->delete()) {
            $this->success('彻底删除成功', U('Answer/question'));
        }else {
            $this->error('彻底删除失败');
        }
    }

    public function question_del(){
        $id = I('id',0 , 'intval');
        $batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
        if ($batchFlag) {
            $this->delBatch();
            return;
        }
        if (M('answer')->delete($id)) {
            $this->success('彻底删除成功', U('Answer/question'));
        }else {
            $this->error('彻底删除失败');
        }
    }

    public function prize_del(){
        $id = I('id',0 , 'intval');
        if (M('prize')->delete($id)) {
            $this->success('彻底删除成功', U('Answer/prize'));
        }else {
            $this->error('彻底删除失败');
        }
    }

    public function event_opt(){
        $flag=$data['flag'] = I('flag',0 , 'intval');
        if(empty($flag)){
            $this->error('错误的操作');
        }
        $type=$data['type'] = I('type',0 , 'intval');
        $where=null;
        $type_list=$this->_get_events('type');
        foreach ($type_list as $k=>$v){
            if($k==$type){
                $where=array("name"=>$v);
            }
        }

        if(empty($where)){
            $this->error('错误的操作');
        }


        switch ($flag){
            case 1:break;
            case 2:$data['s_time']=time();$data['number']=time();break;
            case 3:$data['e_time']=time();break;
        }
        $ret=M('event_params')->where($where)->save($data);
        if (false !== $ret) {
            $this->success('修改成功',U('Answer/index', array('aid'=> $data['aid'])));
        }else {
            $this->error('修改失败');
        }
    }



    //添加题目
    public function addquestion() {
        if (IS_POST) {
            $this->addquestionPost();
            exit();
        }
        $id = I('id', 0, 'intval');
        if (!$id) {
            $typetitle = '添加';
        }else {
            $typetitle = '编辑';
        }
        $list = M('answer')->find($id);

        $select_qs=$this->_get_events('select');
        $this->assign('select_qs',$select_qs);
        $this->assign('list', $list);
        $this->assign('id', $id);
        $this->assign('type', $typetitle);
        $this->display();
    }


    //添加题目
    public function addquestionPost() {


        //M验证
        $validate = array(
            array('name','require','题目必须填写！'),
            array('value','require','正确答案必须填写！'),
            array('name','','题目已经存在！',0,'unique',1),
        );

        $ary=I('post.');
        $ary['a']=$ary['aaa'];
        unset($ary['aaa']);

        $ary['addtime']=time();
        $type= I('post.type');
        if (empty($type)){
            $this->error('题目类型必须填写！');
        }
        $data = M('answer');
        if (!$data->validate($validate)->create()) {
            $this->error($data->getError());
        }

        if (M('answer')->add($ary)) {
            $this->success('添加题目成功', U('Answer/question'));
        }else {
            $this->error('添加题目失败');
        }
    }

    //编辑题目
    public function editquestion(){
        //M验证
        $validate = array(
            array('name','require','题目必须填写！'),
            array('value','require','正确答案必须填写！'),
            array('name','','题目已经存在！',0,'unique',1),
        );


        $ary=I('post.');
        $ary['a']=$ary['aaa'];
        unset($ary['aaa']);

        $ary['edittime']=time();
        $type= I('post.type');
        if (empty($type)){
            $this->error('题目类型必须填写！');
        }
        $data = M('answer');
        if (!$data->validate($validate)->create()) {
            $this->error($data->getError());
        }

        $id=$ary['id'];
        if (M('answer')->where("id= $id")->save($ary)) {
            $this->success('修改题目成功', U('Answer/question'));
        }else {
            $this->error('修改题目失败');
        }
    }



    //添加奖品
    public function addprize() {


        if (IS_POST) {
            $this->addprizePost();

            exit();
        }
        $id = I('id', 0, 'intval');
        if (!$id) {
            $typetitle = '添加';
        }else {
            $typetitle = '编辑';
        }
        $list = M('prize')->find($id);
        $select_qs=$this->_get_events('select');
        $this->assign('select_qs',$select_qs);
        $this->assign('list', $list);
        $this->assign('id', $id);
        $this->assign('type', $typetitle);
      
        $this->display();
        
    }


    //添加奖品
    public function addprizePost() {


        //M验证
        $validate = array(
            array('level','require','名称必须填写！'),
            array('cnt','require','奖品数量必须填写！'),
            //array('level','','名称已经存在！',0,'unique',1),
        );

        $ary=I('post.');
        $ary['addtime']=time();

        if (empty($ary['min_score'] )  && empty($ary['max_score'])){
            $this->error('请填写应答对题目数');
        }
        else  if (empty($ary['min_score'] )  && !empty($ary['max_score'])){
            $ary['min_score']=$ary['max_score'];
            $ary['max_score']=$ary['max_score'];
        }
        else  if (!empty($ary['min_score'] )  && empty($ary['max_score'])){
            $ary['min_score']=$ary['min_score'];
            $ary['max_score']=$ary['min_score'];
        }
        else if($ary['min_score']> $ary['max_score']) {
            $this->error('应答对题目数 区间填写有误');
        }
        $data = M('prize');
        if (!$data->validate($validate)->create()) {
            $this->error($data->getError());
        }

        if (M('prize')->add($ary)) {
            $this->success('添加奖品成功', U('Answer/prize'));
        }else {
            $this->error('添加奖品失败');
        }
    }


    //修改奖品
    public function editprize(){
        //M验证
        $validate = array(
            array('level','require','名称必须填写！'),
            array('cnt','require','奖品数量必须填写！'),
            array('level','','名称已经存在！',0,'unique',1),
        );

        $ary=I('post.');
        $ary['edittime']=time();

        if (empty($ary['min_score'] )  && empty($ary['max_score'])){
            $this->error('请填写应答对题目数');
        }
        else  if (empty($ary['min_score'] )  && !empty($ary['max_score'])){
            $ary['min_score']=$ary['max_score'];
            $ary['max_score']=$ary['max_score'];
        }
        else  if (!empty($ary['min_score'] )  && empty($ary['max_score'])){
            $ary['min_score']=$ary['min_score'];
            $ary['max_score']=$ary['min_score'];
        }
        else if($ary['min_score']> $ary['max_score']) {
            $this->error('应答对题目数 区间填写有误');
        }

        $data = M('prize');
        if (!$data->validate($validate)->create()) {
            $this->error($data->getError());
        }


        $id=$ary['id'];
        if (M('prize')->where("id= $id")->save($ary)) {
            $this->success('修改奖品成功', U('Answer/prize'));
        }else {
            $this->error('修改奖品失败');
        }

    }

    /**
     * 题目排序
     */
    public function question_sort(){
        $id = I('id',0, 'intval');
        $sort = I('sort',0, 'intval');
        $data = array(
            'sort' => $sort,
        );
        $data['sort'] = $sort;
        $sorts=M('answer')->where("id=$id")->data($data)->save();
        echo "$sorts";
    }



    public function record(){
        $tab_list=$this->_get_events('tab');
        $this->assign('tab_list',$tab_list);

        $params['scompany'] = I('scompany', '', 'htmlspecialchars,trim');
        $params['sreward'] = I('sreward', '', 'htmlspecialchars,trim');
        $params['sphone'] = I('sphone', '', 'htmlspecialchars,trim');
        $params['sname'] = I('sname', '', 'htmlspecialchars,trim');
        $params['snick'] = I('snick', '', 'htmlspecialchars,trim');

        $where=' 1=1 ';
        foreach ($params as $k=>$v){
            switch ($k){
                case 'scompany':
                    if(!empty($params['scompany']))
                        $where.=' and company like "%'.$params['scompany'].'%"';
                    break;
                case 'sreward':
                    if(!empty($params['sreward']))
                        $where.=' and reward like "%'.$params['sreward'].'%"';
                    break;
                case 'sphone':
                    if(!empty($params['sphone']))
                        $where.=' and phone like"%'.$params['sphone'].'%"';
                    break;
                case 'sname':
                    if(!empty($params['sname']))
                        $where.=' and uname like "%'.$params['sname'].'%"';
                    break;
                case 'snick':
                    if(!empty($params['snick']))
                        $where.=' and unick like "%'.$params['snick'].'%"';
                    break;

            }
            $this->assign($k,$v);
        }


        $tab_list=$this->_get_events('tab');
        $this->assign('tab_list',$tab_list);

        $qtype = I('qtype',99, 'intval');
        if(!empty($qtype)) {
            $type_list = $this->_get_events('type');
            foreach ($type_list as $k => $v) {
                if ($k == $qtype) {
                    $where .= ' and qs="' . $v . '"';
                }
            }
        }
        $this->assign('qtype',$qtype);

        $count = M('reward')->where($where)->count();
        $page = new \Common\Lib\Page($count, 20);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('reward')->where($where)->order('addtime desc,id asc')->limit($limit)->select();

        $_list=array();
        foreach ($list as $key=>$value){
            $remark=unserialize($value['remark']);//var_dump($remark);exit();
            $value['remark']=$remark;
            $_list[]=$value;
        }

        $this->assign('page', $page->show());
        $this->assign('vlist',$_list);

        $this->display();
    }

    public function import_ex_1(){
        $this->import_ex(1);
    }
    public function import_ex_2(){
        $this->import_ex(2);
    }
    public function import_ex_3(){
        $this->import_ex(3);
    }
    public function import_ex_4(){
        $this->import_ex(4);
    }

    public function import_ex_99(){
        $this->import_ex(99);
    }


    public function import_ex($qtype){
        $qs=null;//期数
        if(!empty($qtype)) {
            $type_list = $this->_get_events('type');
            foreach ($type_list as $k => $v) {
                if ($k == $qtype) {
                    $qs=$v;
                }
            }
        }else{
             echo json_encode(array("state"=>"错误的请求"));exit();
        }

        $info=$this->upload();

        if($info['state']==false){
            echo json_encode($info);exit();
        }
        $index='mypic_'.$qtype;
        $file_path=C('CFG_UPLOAD_ROOTPATH').$info['info'][$index]['savepath']."".$info['info'][$index]['savename'];
        $ext=$info['info'][$index]['ext'];
        if($qtype==100){//抽奖备选excel单独处理
            $this->prize_bak($file_path,$qs,$ext);
        }else{
            $this->deal_excel($file_path,$qs,$ext);
        }


        echo json_encode($info);exit();
    }

    public function deal_excel($filePath,$qs,$ext){
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
        //检测基本格式 序号	昵称	真实姓名	手机号	公司
        $chk_filed=array('A'=>'序号','B'=>'昵称','C'=>'真实姓名','D'=>'手机号','E'=>'公司');
        foreach ($chk_filed as $key=>$chk){
            $filed_1=$currentSheet->getCellByColumnAndRow(ord($key) - 65,1);
            $val_1 = $filed_1->getValue();
            if($val_1!=$chk){
                $retrun_arr['info']='EXCEL格式错误，请上传正确的EXCEL';
                return $retrun_arr;
            }
        }

        //删除对应期数
        $del_chk=M('reward')->where('qs="'.$qs.'"')->delete();
        $db_insert_arr=array(
            'unick','uname',"phone","company","reward","addtime",'qs','remark'
        );

        $table_head=array();
        $reward_index=-1;
        for($currentColumn= 0;$currentColumn <= $allIndex[0]; $currentColumn++){
            $column_index=$c_array[$currentColumn];
            $cell = $currentSheet->getCellByColumnAndRow($currentColumn,1);
            $val = $cell->getValue();
            if($currentColumn>4){
                if($val=="获得奖品"){
                    $reward_index=$currentColumn;
                }else{
                    $table_head[$column_index]=$val;
                }

            }
        }

        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            /**从第A列开始输出*/
            $remark=null;
            for($currentColumn= 0;$currentColumn <= $allIndex[0]; $currentColumn++){
                $column_index=$c_array[$currentColumn];
                $cell = $currentSheet->getCellByColumnAndRow($currentColumn,$currentRow);
                $val = $cell->getValue();

                if(is_object($val))  $val= $val->__toString();

                if (empty($val)) {
                    $val = " ";
                }

                switch ($currentColumn){
                    case 0:break;
                    case 1:$data1['unick']=$val;break;
                    case 2:$data1['uname']=$val;break;
                    case 3:$data1['phone']=$val;break;
                    case 4:$data1['company']=$val;break;
                    case $reward_index:
                        if($reward_index!=-1){
                            $data1['reward']=$val;break;
                        }
                        break;
                    default:
                        $remark[$column_index]=array($table_head[$column_index].":".$val);
                        $data1['remark']=$remark;
                        break;
                }
                $data1['addtime']=time();
                $data1['qs']=$qs;

            }
            $data1['remark']=serialize($data1['remark']);
            //var_dump($data1);exit();
            M('reward')->add($data1);
            $row_data[] = $data1;
        }

        //M('reward')->addAll($row_data);
        return true;
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

    /**
     * 奖品排序
     */
    public function prize_sort(){
        $sort = I('post.sort','', 'intval');
        $id = I('post.id','', 'intval');
        $data['sort'] = $sort;
        $psorts=M('prize')->where("id=$id")->data($data)->save();
        echo "$psorts";
    }


    /*****抽奖备选*******/
    public function import_ex_100(){
        $this->import_ex(100);
    }

    public function prize_bak($filePath,$qs,$ext){
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
        //检测基本格式 序号	昵称	真实姓名	手机号	公司
        $chk_filed=array('E'=>'企业联系人','B'=>'企业名称','G'=>'客户电话');
        foreach ($chk_filed as $key=>$chk){
            $filed_1=$currentSheet->getCellByColumnAndRow(ord($key) - 65,1);
            $val_1 = $filed_1->getValue();
            if($val_1!=$chk){
                $retrun_arr['info']='EXCEL格式错误，请上传正确的EXCEL';
                return $retrun_arr;
            }
        }

        //删除对应期数
        $del_chk=M('reward')->where('qs="'.$qs.'"')->delete();
        $db_insert_arr=array(
            'uname',"phone","company","addtime",'qs','remark'
        );

        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            /**从第A列开始输出*/
            $remark=null;
            for($currentColumn= 0;$currentColumn <= $allIndex[0]; $currentColumn++){
                $column_index=$c_array[$currentColumn];
                $cell = $currentSheet->getCellByColumnAndRow($currentColumn,$currentRow);
                $val = $cell->getValue();

                if(is_object($val))  $val= $val->__toString();

                if (empty($val)) {
                    $val = " ";
                }

                switch ($currentColumn){
                    case 0:break;
                    case 1:$data1['company']=$val;break;
                    case 4:$data1['uname']=$val;break;
                    case 6:$data1['phone']=$val;break;
                    default:
                        break;
                }
                $data1['addtime']=time();
                $data1['qs']=$qs;
            }
            M('reward')->add($data1);
            $row_data[] = $data1;
        }

        return true;
    }

    public function zjqk() {
        $qs = I('qs',99);
        if($qs==100){
            $qs_str='抽奖备选';
        }else{
            $qs_str='手机尾号抽奖活动';
        }
        $this->assign('qs',$qs);
        $where=' phone is not null and phone!="" and phone!=" " and cj_name is not NULL and qs="'.$qs_str.'" ';
        $list = M('reward')->where($where)->order('cj_addtime desc,id asc')->select();
        $this->assign('vlist',$list);
        $this->display();
    }


    public function queue() {
        $where='';
        $list = M('ev14_queue')->where($where)->order('sort asc,id asc')->select();
        $this->assign('vlist',$list);
        $this->display();
    }

    public function ev14() {

        $qtype = I('qtype',14, 'intval');
        $area = I('area','yc');
        $where=' 1=1 ';
        $type_list=$this->_get_events('type');
        foreach ($type_list as $k=>$v){
            if($k==$qtype){
                $where=array("qs"=>$v,'area'=>$area);
            }
        }
        $this->assign('qtype',$qtype);
        $order='id desc';

        $list = M('reward')->where($where)->order($order)->select();

        $zj_list=M('ev14_queue')->where(' rank<5 and rank>0')->order('rank asc')->select();
        $zj_arr=array();
        foreach ($zj_list as $zj){
            $zj_arr[]=$zj['name'];
        }
        $this->assign('zj_arr',$zj_arr);
        $this->assign('vlist',$list);
        $this->assign('area',$area);
        $this->display();
    }

    public function ev14_display(){
        $id=$data['id'] = I('id',0 , 'intval');
        $opt= I('opt',0 , 'intval');

        if(empty($id)){
            $this->error('错误的操作');
        }

        $qs='新王登记全额返款';
        $param = M('event_params')->where(array('name'=>$qs))->find();
        if($param['flag']==2){
            $this->error('活动正在进行中，不可以更改');;exit();
        }

        $ret=M('ev14_queue')->where("id=".$id)->save(array('is_guess'=>$opt,"guesstime"=>time()));
        if (false !== $ret) {
            $this->success('修改成功',U('Answer/queue'));
        }else {
            $this->error('修改失败');
        }
    }

    public function ev14_sort(){
        $id = I('id',0, 'intval');
        $sort = I('sort',0, 'intval');
        $data = array(
            'sort' => $sort,
        );
        $data['sort'] = $sort;
        $sorts=M('ev14_queue')->where("id=$id")->data($data)->save();
        echo "$sorts";
    }

    public function ev14_rank(){
        $id = I('id',0, 'intval');
        $rank = I('rank',0, 'intval');

        $qs='新王登记全额返款';
        $param = M('event_params')->where(array('name'=>$qs))->find();
        if($param['flag']==2){
            echo "请先关闭活动再更新名次";;exit();
        }

        $data = array(
            'rank' => $rank,
        );
        $data['rank'] = $rank;
        $ranks=M('ev14_queue')->where("id=$id")->data($data)->save();
        echo "$ranks";
    }

    public function ev14_confirm(){
        $id = I('id',0, 'intval');

        $qs='新王登记全额返款';
        $param = M('event_params')->where(array('name'=>$qs))->find();
        if($param['flag']==2){
            echo "请先关闭活动再来核销";;exit();
        }

        $data = array(
            'remark' => '已核销',
        );

        $flag=M('reward')->where("id=$id")->data($data)->save();

        if ($flag) {
            $this->redirect('Answer/ev14');

        }else {
            $this->error('核销失败');
        }
    }

    public function export_excel(){
        $qtype = I('qtype',14, 'intval');
        $area = I('area','yc');
        $where=' 1=1 ';
        $type_list=$this->_get_events('type');
        foreach ($type_list as $k=>$v){
            if($k==$qtype){
                $where=array("qs"=>$v,'area'=>$area);
            }
        }
        $this->assign('qtype',$qtype);
        $order='id desc';

        $data['list'] = M('reward')->where($where)->order($order)->select();

        if(count($data['list'])<1){
            $this->error('没有可导出的记录','/Answer/ev14');exit();
        }

        $name=$area.'_投注明细_'.date(Ymd);    //生成的Excel文件文件名
        //var_dump($data);exit();

        ini_set('max_execution_time', '180');
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.IOFactory");
        $objPHPExcel  = new \PHPExcel();
        $iofactory = new \IOFactory();

        $zj_list=M('ev14_queue')->where(' rank<5 and rank>0')->order('rank asc')->select();
        $zj_arr=array();
        foreach ($zj_list as $zj){
            $zj_arr[]=$zj['name'];
        }

        $objPHPExcel->getProperties()->setCreator("新王登基日，全额退款时")
            ->setLastModifiedBy("新王登基日，全额退款时")
            ->setTitle($name)
            ->setSubject($name)
            ->setDescription("本文档从度客数据系统导出")
            ->setKeywords($area."，客户明细")
            ->setCategory("result file");
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '编号')
            ->setCellValue('B1', '姓名')
            ->setCellValue('C1', '手机号')
            ->setCellValue('D1', '公司名')
            ->setCellValue('E1', '客户经理')
            ->setCellValue('F1', '投注金额')
            ->setCellValue('G1', '第一')
            ->setCellValue('H1', '第二')
            ->setCellValue('I1', '第三')
            ->setCellValue('J1', '第四')
            ->setCellValue('K1', '返款码')
            ->setCellValue('L1', '竞猜时间')
            ->setCellValue('M1', '是否核销')
            ->setCellValue('N1', '竞猜中奖率');


        foreach ($data['list'] as $k=>$V){
            $num=$k+2;

            $tmp_rate=0;
            if($V['guess_1']==$zj_arr[0]){
                $tmp_rate+=25;
            }
            if($V['guess_2']==$zj_arr[1]){
                $tmp_rate+=25;
            }
            if($V['guess_3']==$zj_arr[2]){
                $tmp_rate+=25;
            }
            if($V['guess_4']==$zj_arr[3]){
                $tmp_rate+=25;
            }

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$num, $V['id'])
                ->setCellValue('B'.$num, $V['uname'])
                ->setCellValue('C'.$num, $V['phone'])
                ->setCellValue('D'.$num, $V['company'])
                ->setCellValue('E'.$num, $V['customer_manage'])
                ->setCellValue('F'.$num, $V['money'])
                ->setCellValue('G'.$num, $V['guess_1'])
                ->setCellValue('H'.$num, $V['guess_2'])
                ->setCellValue('I'.$num, $V['guess_3'])
                ->setCellValue('J'.$num, $V['guess_4'])
                ->setCellValue('K'.$num, $V['ev14_code'])
                ->setCellValue('L'.$num, date("Y-m-d H:i:s",$V['cj_addtime']))
                ->setCellValue('M'.$num, empty($V['remark'])?'否':'是')
                ->setCellValue('N'.$num, $tmp_rate.'%');
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);

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

    //添加&修改活动
    public function addevent() {
        if (IS_POST) {
            $this->manage_event();
            exit();
        }
        $id = I('id', 0, 'intval');
        if (!$id) {
            $typetitle = '添加';
        }else {
            $typetitle = '编辑';
        }
        $info = M('event_params')->find($id);

        $this->assign('vo', $info);
        $this->assign('id', $id);
        $this->assign('type', $typetitle."活动");
        $this->display();
    }

    public function manage_event(){
        $id= I('id', 0, 'intval');
        $data['name'] = I('name', '', 'htmlspecialchars,rtrim');
        $data['img'] = I('litpic');
        $data['link']=I('link', '', 'htmlspecialchars,rtrim');

        if(is_numeric($id)&& $id>0){//修改
            $data['id'] =$id;
            unset($data['name']);
            $flag = M('event_params')->save($data);
        }else{//添加
            if (empty($data['name'])) {
                $this->error('活动名不能为空');
            }
            $data['flag']=1;
            $flag = M('event_params')->add($data);
        }

        if(!$flag){
            $this->error('提交失败');
        }else{
            $this->success('提交成功',U('Answer/index'));
        }
    }

    /**
     * 消息类型管理
     */
    public function  msgType(){

        $count = M('msg_type')->count();
        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('msg_type')->order('id desc')->limit($limit)->select();
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);

        $this->assign('type', "消息类型管理");
        $this->display();
    }

    /**
     * 消息类型添加
     */
    public function msgtype_add() {
        if (IS_POST) {
            $this->manage_msgtype();
            exit();
        }
        $id = I('id', 0, 'intval');
        if (is_numeric($id) && $id>0) {
            $typetitle = '编辑';
        }else {
            $typetitle = '添加';
        }
        $info = M('msg_type')->find($id);

        $this->assign('vo', $info);
        $this->assign('id', $id);
        $this->assign('type', $typetitle."消息类型");
        $this->display();
    }

    /**
     * 消息类型添加和修改
     */
    public function manage_msgtype(){
        $id= I('id', 0, 'intval');
        $data['name'] = I('name', '', 'htmlspecialchars,rtrim');
        $data['img'] = I('litpic');
        $data['is_display']=I('is_display',0, 'intval');

        if(is_numeric($id)&& $id>0){//修改
            $data['id'] =$id;

            $chk=M('msg_type')->where('name="'.$data['name'].'" and id!='.$id)->select();
            if($chk){
                $this->error('类型名已经存在');
            }

            $flag = M('msg_type')->save($data);
        }else{//添加
            if (empty($data['name'])) {
                $this->error('类型名不能为空');
            }

            $chk=M('msg_type')->where('name="'.$data['name'].'" ')->select();
            if($chk){
                $this->error('类型名已经存在');
            }

            $data['addtime']=time();
            $flag = M('msg_type')->add($data);
        }

        if(!$flag){
            $this->error('提交失败');
        }else{
            $this->success('提交成功',U('Answer/msgType'));
        }
    }


    /**
     * 消息批次发送列表
     */
    public function  msg(){

        $sql=<<<eot
SELECT A.*,B.`name` ,B.img FROM(
SELECT batch_id,title,content,COUNT(id) as cnt,SUM(is_read) as r_cnt,type_id,addtime from bestop_msg GROUP BY batch_id
)as A LEFT JOIN bestop_msg_type as B on A.type_id=B.id
ORDER BY A.batch_id DESC
eot;
        $sql_cnt=<<<eot
SELECT COUNT(batch_id) as cnt FROM(
SELECT batch_id,title,content,COUNT(id) as cnt,SUM(is_read) as r_cnt,type_id from bestop_msg  GROUP BY batch_id
)as A
eot;

        $count =M('msg')->query($sql_cnt);
        if($count){
            $count=$count[0]['cnt'];
        }
        $page = new \Common\Lib\Page($count, 20);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('msg')->query($sql.' LIMIT '.$limit." ");
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);

        $this->assign('type', "消息管理");
        $this->display();
    }

    /**
     * 消息详情页
     */
    public function msgdetail(){
        $id = I('batch_id', 0, 'intval');

        $where='batch_id="'.$id.'"';
        $count = M('msg')->where($where)->count();
        $page = new \Common\Lib\Page($count, 50);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('msg')->order('id asc')->where($where)->limit($limit)->select();
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);

        //类型处理
        if($list){
            $msg_type=M('msg_type')->find($list[0]['type_id']);
            $this->assign('typeInfo',$msg_type);
        }


        $this->assign('id', $id);
        $this->assign('type', "消息详情");
        $this->display();
    }

    public function addmsg(){
        if (IS_POST) {
            $this->manage_msg();
            exit();
        }

        $list = M('msg_type')->order('id desc')->where(' is_display=1 ')->select();
        $this->assign('vlist', $list);

        $this->assign('type', "发送消息");
        $this->display();
    }

    public function manage_msg(){
        $title=$data['title'] = I('title', '', 'htmlspecialchars,rtrim');
        $data['type_id']=I('type_id',0, 'intval');
        $content=$data['content'] = I('content');
        $data['addtime']=I('addtime');

        if(empty($title)||empty($content)){
            $this->error('标题和内容不得为空');
        }
        $data['is_read']=0;
        $data['batch_id']=time();
        if(empty($data['addtime'])){
            $data['addtime']=time();
        }else{
            $data['addtime']=strtotime($data['addtime']);
        }

        $received= I('received');
        if(empty($received)){//发送给所有人
            $user_list= M('user')->order('id asc')->select();
        }else{//发送个单个
            $user_list=explode('|',trim($received));
        }

        foreach ($user_list as $u){
            $data['received']=empty($u['phone'])?$u:$u['phone'];
            $flag = M('msg')->add($data);
        }

        if(!$flag){
            $this->error('提交失败');
        }else{
            $this->success('提交成功',U('Answer/msg'));
        }
    }
}



?>