<?php
namespace Mobile\Controller;

class EventController extends MobileCommonController{

	public function eight(){
        $title='吕小布相亲记';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"吕小布相亲记");
        $this->display();
	}

	public function answer(){
        $title='百度大师';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',$title);
        $this->display();

    }

    public function  ajax_an_chk_name(){
        $company= I('company');
        $phone=I('phone');
        $return_arr=$this->an_chk_name($company,$phone);
        echo json_encode($return_arr);
        exit();
    }

    public function save_answer(){
        $company=$data['company']= I('company');
        $phone=$data['phone']=I('phone');
        $name=$data['name']=I('name');
        $area=$data['area']=I('area');
        $an_str=$data['an_str']=I('an_str');

        $return_arr=$this->an_chk_name($company,$phone);
        if($return_arr['flag']==false){
            echo json_encode($return_arr);
            exit();
        }else{
            $data['number']=$return_arr['msg'];
        }

        $return_arr=array('flag'=>false,'msg'=>'提交失败');
        if (empty($name)||empty($area)){
            $return_arr['msg']="请输入姓名，选择区域";
            echo json_encode($return_arr);
            exit();
        }

        if(empty($an_str)){
            $return_arr['msg']="请选择题目答案";
            echo json_encode($return_arr);
            exit();
        }

        //处理答案字段
        $answer=explode(":",$an_str);
        $new_answer=array();
        foreach ($answer as $k=>$v){
            $tmp=explode("_",$v);
            $new_answer[$tmp[0]][]=$tmp[1];
        }

        //匹配正确答案
        $data['answer']=serialize($new_answer);
        $data['score']=0;
        $data['score_info']='';
        foreach ($new_answer as $k=>$v){
            $ok=M('answer')->where(array('id'=>$k))->find();
            if($ok){
                $right=$ok['value'];
                $user=implode(',',$v);
                if($right==$user){
                    $data['score']+=1;
                    $data['score_info'].=$k.",";
                }
            }
        }
        $data['qs']='品牌专区';
        $data['addtime'] = time();
        $data['ip'] = get_client_ip();
        if($id = M('answer_info')->add($data)) {
            $return_arr['flag']=true;

            //处理中奖信息
            $score=$data['score'];
            $where='qs="品牌专区" and  min_score<='.$score.' and max_score>='.$score;
            $prize=M('prize')->where($where)->find();

            if($prize){
                $return_arr['score']=$score;
                $return_arr['img']=$prize['img'];
                $return_arr['title']=$prize['title'];

                //加入奖品处理
                $prize=$this->add_reward($prize['name'],$prize['level'],$phone,$company,$data['number'],$score,$prize);
                if($prize){
                    $return_arr['name']=$prize['name'];
                    $return_arr['info']=$prize['level'];
                }else{
                    $return_arr['name']='奖品已领完';
                    $return_arr['info']=$prize['level'];
                }
            }else{
                $return_arr['score']=$score;
                $return_arr['img']='jl02.png';
                $return_arr['info']=false;
            }
        }

        echo json_encode($return_arr);
        exit();
    }

    public function an_chk_name($company,$phone,$chk_name=true){
        $return_arr=array('flag'=>false,'msg'=>'答题已经结束或者未开始');

        $event=M('event_params')->where(array('name'=>'百度大师'))->find();
        if(empty($event)||$event['flag']!=2){
            return $return_arr;
        }

        if($chk_name){
            if(empty($company)){
                //$return_arr['msg']='请输入公司名';
                //return $return_arr;
            }

            if(empty($phone)){
                //$return_arr['msg']='请输入手机号';
                //return $return_arr;
            }

            $number=$event['number'];
            $chk_company=M('answer_info')->where(array('company'=>$company,'number'=>$number))->find();
            $chk_phone=M('answer_info')->where(array('phone'=>$phone,'number'=>$number))->find();

            if($chk_company||$chk_phone){
                $return_arr['msg']='同一个手机号或者公司名只能答题一次';
                return $return_arr;
            }
        }

        $return_arr['flag']=true;
        $return_arr['msg']=$event['number'];
        return $return_arr;
    }

    public function  chk_sms_code(){
        $return_arr=array('flag'=>false,'msg'=>'错误的请求');
        $validate=I('validate');
        $phone=I('phone');
        if(empty($validate)||empty($phone)){
            echo json_encode($return_arr);
            exit();
        }

        if($phone!=$_SESSION['sms']['phone']){
            $return_arr['msg']='接收验证码的手机号已经更改，请重新获取';
            echo json_encode($return_arr);
            exit();
        }

        if($_SESSION['sms']['extime']<time()){
            $_SESSION['sms']['code']='';
            $_SESSION['sms']['extime']='';
            $_SESSION['sms']['phone']='';

            $return_arr['msg']='验证码已经过期';
            echo json_encode($return_arr);
            exit();
        }else{
            if($_SESSION['sms']['code']==$validate){
                $return_arr['msg']='ok';
                $return_arr['flag']=true;

                $_SESSION['sms']['code']='';
                $_SESSION['sms']['extime']='';
                $_SESSION['sms']['phone']='';

                echo json_encode($return_arr);
                exit();
            }else{
                $return_arr['msg']='验证码错误，请重新输入验证码';
                echo json_encode($return_arr);
                exit();
            }
        }

    }

    public function ajax_send_code(){
        set_time_limit(0);
        $return_arr=array('flag'=>false,'msg'=>'error');
        $phone=I('phone');
        if(empty($phone)){
            echo json_encode($return_arr);
            exit();
        }
        $_SESSION['sms']['code']='';
        $_SESSION['sms']['expires']='';
        $_SESSION['sms']['phone']='';
        $sms_demo=new \Common\Lib\SmsDemo();

        $code=rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $response = $sms_demo::sendSms($phone,$code);
        //$code=3456;$response=$code;//todo:test code
        $_SESSION['sms']['code']=$code;
        $_SESSION['sms']['expires']= time() + 60*60*2;
        $_SESSION['sms']['phone']=$phone;

        $return_arr['flag']=true;
        $return_arr['msg']=$response;
        echo json_encode($return_arr);
        exit();
    }

    public function add_reward($name,$level,$phone,$company,$number,$score,$chk_prize){
        if(empty($chk_prize)){
            return false;
        }
        if($chk_prize['cnt']<=0){
            $chk_prize=$this->chk_prize($chk_prize);
            if(!$chk_prize){
                return false;
            }
        }

        $flag=M('prize')->where("id=".$chk_prize['id'])->save(array('cnt'=>$chk_prize['cnt']-1));
        if($flag==false){
            return false;
        }
        $data['qs']='品牌专区';
        $data['prize']=$chk_prize['name'];
        $data['reward']=$chk_prize['level'];
        $data['phone']=$phone;
        $data['company']=$company;
        $data['number']=$number;
        $data['right_cnt']=$score;
        $data['addtime']=time();
        $id = M('reward')->add($data);
        return $chk_prize;
    }

    public function chk_prize($prize){
        //顺延
        switch ($prize['level']){
            case '一等奖':
                $where='qs="百度大师" and  level="二等奖" and cnt>0';
                $data=M('prize')->where($where)->find();
                if(!$data){
                    $where='qs="百度大师" and   level="三等奖"  and cnt>0';
                    $data=M('prize')->where($where)->find();
                }
                break;
            case '二等奖';
                $where='qs="百度大师" and   level="三等奖"  and cnt>0';
                $data=M('prize')->where($where)->find();
            break;
            case '三等奖';
                return false;
            break;
        }

        return $data;
    }

    public function second(){
        $title='品牌专区';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',$title);
        $this->display();
    }

    public function save_answer_second(){
        $an_str=$data['an_str']=I('an_str');

        $return_arr=array('flag'=>false,'msg'=>'提交失败');

        if(empty($an_str)){
            $return_arr['msg']="请选择题目答案";
            echo json_encode($return_arr);
            exit();
        }
        $event=M('event_params')->where(array('name'=>'品牌专区'))->find();
        if(empty($event)||$event['flag']!=2){
            $return_arr['msg']="答题已经结束或者未开始";
            echo json_encode($return_arr);
            exit();
        }

        $data['number']=$event['number'];
        //处理答案字段
        $answer=explode(":",$an_str);
        $new_answer=array();
        foreach ($answer as $k=>$v){
            $tmp=explode("_",$v);
            $new_answer[$tmp[0]][]=$tmp[1];
        }

        //匹配正确答案
        $data['answer']=serialize($new_answer);
        $data['score']=0;
        $data['score_info']='';
        foreach ($new_answer as $k=>$v){
            $ok=M('answer')->where(array('id'=>$k))->find();
            if($ok){
                $right=$ok['value'];
                $user=implode(',',$v);
                if($right==$user){
                    $data['score']+=1;
                    $data['score_info'].=$k.",";
                }
            }
        }
        $data['qs']='品牌专区';
        $data['addtime'] = time();
        $data['ip'] = get_client_ip();
        if($id = M('answer_info')->add($data)) {
            $return_arr['flag']=true;

            //处理中奖信息
            $score=$data['score'];
            $where='qs="品牌专区" and  min_score<='.$score.' and max_score>='.$score;
            $prize=M('prize')->where($where)->find();

            if($prize){
                $return_arr['score']=$score;
                $return_arr['img']=$prize['img'];
                $return_arr['title']=$prize['title'];

            }else{
                $return_arr['score']=$score;
                $return_arr['img']='2_4.png';
                $return_arr['title']=false;
            }
        }

        echo json_encode($return_arr);
        exit();
    }
	
	public function three(){
        $title='本地直通车';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',$title);
        $this->display();
    }

    public function save_answer_three(){
        $an_str=$data['an_str']=I('an_str');

        $return_arr=array('flag'=>false,'msg'=>'提交失败');

        if(empty($an_str)){
            $return_arr['msg']="请选择题目答案";
            echo json_encode($return_arr);
            exit();
        }
        $event=M('event_params')->where(array('name'=>'本地直通车'))->find();
        if(empty($event)||$event['flag']!=2){
            $return_arr['msg']="答题已经结束或者未开始";
            echo json_encode($return_arr);
            exit();
        }

        $data['number']=$event['number'];
        //处理答案字段
        $answer=explode(":",$an_str);
        $new_answer=array();
        foreach ($answer as $k=>$v){
            $tmp=explode("_",$v);
            $new_answer[$tmp[0]][]=$tmp[1];
        }

        //匹配正确答案
        $data['answer']=serialize($new_answer);
        $data['score']=0;
        $data['score_info']='';
        foreach ($new_answer as $k=>$v){
            $ok=M('answer')->where(array('id'=>$k))->find();
            if($ok){
                $right=$ok['value'];
                $user=implode(',',$v);
                if($right==$user){
                    $data['score']+=1;
                    $data['score_info'].=$k.",";
                }
            }
        }
        $data['qs']='本地直通车';
        $data['addtime'] = time();
        $data['ip'] = get_client_ip();
        if($id = M('answer_info')->add($data)) {
            $return_arr['flag']=true;

            //处理中奖信息
            $score=$data['score'];
            $where='qs="本地直通车" and  min_score<='.$score.' and max_score>='.$score;
            $prize=M('prize')->where($where)->find();

            if($prize){
                $return_arr['score']=$score;
                $return_arr['img']=$prize['img'];
                $return_arr['title']=$prize['title'];

            }else{
                $return_arr['score']=$score;
                $return_arr['img']='3_4.png';
                $return_arr['title']=false;
            }
        }

        echo json_encode($return_arr);
        exit();
    }

    public function  four(){
        $title='百度搜索';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',$title);
        $this->display();
    }

    public function save_answer_four(){
        $an_str=$data['an_str']=I('an_str');

        $return_arr=array('flag'=>false,'msg'=>'提交失败');

        if(empty($an_str)){
            $return_arr['msg']="请选择题目答案";
            echo json_encode($return_arr);
            exit();
        }
        $event=M('event_params')->where(array('name'=>'百度搜索'))->find();
        if(empty($event)||$event['flag']!=2){
            $return_arr['msg']="答题已经结束或者未开始";
            echo json_encode($return_arr);
            exit();
        }

        $data['number']=$event['number'];
        //处理答案字段
        $answer=explode(":",$an_str);
        $new_answer=array();
        foreach ($answer as $k=>$v){
            $tmp=explode("_",$v);
            $new_answer[$tmp[0]][]=$tmp[1];
        }

        //匹配正确答案
        $data['answer']=serialize($new_answer);
        $data['score']=0;
        $data['score_info']='';
        foreach ($new_answer as $k=>$v){
            $ok=M('answer')->where(array('id'=>$k))->find();
            if($ok){
                $right=$ok['value'];
                $user=implode(',',$v);
                if($right==$user){
                    $data['score']+=1;
                    $data['score_info'].=$k.",";
                }
            }
        }
        $data['qs']='百度搜索';
        $data['addtime'] = time();
        $data['ip'] = get_client_ip();
        if($id = M('answer_info')->add($data)) {
            $return_arr['flag']=true;

            //处理中奖信息
            $score=$data['score'];
            $where='qs="百度搜索" and  min_score<='.$score.' and max_score>='.$score;
            $prize=M('prize')->where($where)->find();

            if($prize){
                $return_arr['score']=$score;
                $return_arr['img']=$prize['img'];
                $return_arr['title']=$prize['title'];

            }else{
                $return_arr['score']=$score;
                $return_arr['img']='4_4.png';
                $return_arr['title']=false;
            }
        }

        echo json_encode($return_arr);
        exit();
    }
	
	public function  five(){
        $title='外部活动-凡科';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"度客挑战赛•第五期");
        $this->display();
    }

    public function  six(){
        $title='母亲节活动';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"我的时光•你的白发");
        $this->display();
    }

    //Event_seven
    public function  seven(){
        $title='爱你一万年';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"爱你一万年");
        $this->display();
    }

    public function  nine(){
        $title='百度高考大作战';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"百度高考大作战");
        $this->display();
    }

    public function  ten(){
        $title='激情世界杯';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"第十期活动");
        $this->display();
    }

    public function test(){
        import("Org.Util.PHPExcel");

        $objPHPExcel = new \PHPExcel();
        $info=$objPHPExcel->test();
        var_dump($info);exit();
    }

    public function  ev11(){
        $title='营销世界杯精准信息流';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"精准信息流");
        $this->display();
    }

    public function  ev12(){
        $title='香港回归';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"香港回归");
        $this->display();
    }

    public function  ev13(){
        $title='拯救天台球迷';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"拯救天台球迷");
        $this->display();
    }

    public function _get_ev14(){
        $title='新王登记全额返款';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        //四只球队
        $where=array("is_guess"=>1);
        $list = M('ev14_queue')->where($where)->order('sort asc,id asc')->limit(4)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        return $list;
    }


    public function _create_cdkey(){
        $str='JSBT';
        $str.=substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        return $str;
    }

    public function  ev14(){
        $list=$this->_get_ev14();

        $ydy_list=array();
        foreach ($list as $value){
            switch ($value['name']){
                case '巴西':
                    $ydy_list[]=array("name"=>'巴西','pic1'=>'bx01.png','pic2'=>'bx02.png');
                    break;
                case '法国':
                    $ydy_list[]=array("name"=>'法国','pic1'=>'fg01.png','pic2'=>'fg02.png');
                    break;
                case '比利时':
                    $ydy_list[]=array("name"=>'比利时','pic1'=>'bilishi01.png','pic2'=>'bilishi02.png');
                    break;
                case '瑞典':
                    $ydy_list[]=array("name"=>'瑞典','pic1'=>'rd01.png','pic2'=>'rd02.png');
                    break;
                case '英格兰':
                    $ydy_list[]=array("name"=>'英格兰','pic1'=>'eng01.png','pic2'=>'eng02.png');
                    break;
                case '俄罗斯':
                    $ydy_list[]=array("name"=>'俄罗斯','pic1'=>'eluosi01.png','pic2'=>'eluosi02.png');
                    break;
                case '克罗地亚':
                    $ydy_list[]=array("name"=>'克罗地亚','pic1'=>'kldy01.png','pic2'=>'kldy02.png');
                    break;
                case '乌拉圭':
                    $ydy_list[]=array("name"=>'乌拉圭','pic1'=>'wlg01.png','pic2'=>'wlg02.png');
                    break;

            }
        }
        $this->assign('ydy_list', $ydy_list);
        $this->assign('title',"新王登基日，全额退款时");

        $jsdk=\Common\Lib\Weichat_JSSDK::getSignPackage();
        $this->assign("jsdk",$jsdk);

        $this->display();
    }

    public function  ev14Index(){
        $this->_get_ev14();

        $area=I('area');
        if(empty($area)){
            $area='yc';
        }
        $this->assign('area',$area);
        $this->assign('title',"新王登基日，全额退款时");

        $jsdk=\Common\Lib\Weichat_JSSDK::getSignPackage();
        $this->assign("jsdk",$jsdk);

        $this->display();
    }

    public function  ev14Guide(){
        $this->_get_ev14();

        $jsdk=\Common\Lib\Weichat_JSSDK::getSignPackage();
        $this->assign("jsdk",$jsdk);

        $this->assign('title',"新王登基日，全额退款时");
        $this->display();
    }

    public function  ev14Rule(){
        $this->_get_ev14();

        $jsdk=\Common\Lib\Weichat_JSSDK::getSignPackage();
        $this->assign("jsdk",$jsdk);

        $this->assign('title',"新王登基日，全额退款时");
        $this->display();
    }

    public function  ev14Result(){
        $this->_get_ev14();

        $id=I('id');
        if(!is_numeric($id)){
            $this->error('你还没有参加活动');
        }
        $title='新王登记全额返款';
        $info= M('reward')->where(array('qs'=>$title,'id'=>$id))->find();
        if(empty($info)){
            $this->error('你还没有参加活动');
        }else{
            $this->assign('info',$info);
        }

        $this->assign('title',"新王登基日，全额退款时");

        $jsdk=\Common\Lib\Weichat_JSSDK::getSignPackage();
        $this->assign("jsdk",$jsdk);

        $this->display();
    }

    public function save_ev14(){

        $sel_str=I('sel_str');
        $money=$data['money']=I('money');
        $name=$data['uname']=I('name');
        $customer_manage=$data['customer_manage']=I('customer_manage');
        $company=$data['company']=I('company');
        $phone=$data['phone']=I('phone');
        $code=I('code');
        $data['area']=I('area');

        //活动检验
        $title='新王登记全额返款';
        $param = M('event_params')->where(array('name'=>$title))->find();
        if($param['flag']!=2){
            $this->_frm_json(false,'活动尚未开始或已经结束');
        }

        //基本检验
        if(empty($phone)||empty($code)){
            $this->_frm_json(false,'手机号和验证码不得为空');
        }
        if(!is_numeric($money)||empty($money)){
            $this->_frm_json(false,'请选择投注金额');
        }
        if(empty($name)){
            $this->_frm_json(false,'请填写姓名');
        }
        if(empty($company)){
            $this->_frm_json(false,'请填写公司信息');
        }
        if(empty($customer_manage)){
        //    $this->_frm_json(false,'请填写客户经理');
        }
        if(empty($sel_str)){
            $this->_frm_json(false,'请正确选择球队排名');
        }else{
            $sel_attr=explode(',',$sel_str);
            if(count($sel_attr)!=4){
                $this->_frm_json(false,'请正确选择球队排名');
            }else{
                if($sel_attr[1]=="undefined"||$sel_attr[2]=="undefined"||$sel_attr[3]=="undefined"||$sel_attr[4]=="undefined"){
                    $this->_frm_json(false,'请正确选择球队排名');
                }
            }
        }

        //验证码检验
        if(empty($_SESSION['sms']['code'])){
            $this->_frm_json(false,'验证码尚未发送，请点击获取验证码');
        }else if($_SESSION['sms']['expires']<time()){
            $this->_frm_json(false,'验证码已经过期');
        }else{
            if($_SESSION['sms']['code']!=$code){
                $this->_frm_json(false,'验证码填写不正确');
            }
            if($_SESSION['sms']['phone']!=$phone){
                $this->_frm_json(false,'获取验证码的手机号不匹配');
            }
        }

        //号码唯一性检验
        $chk= M('reward')->where(array('qs'=>$title,'phone'=>$phone))->find();
        if($chk){
            $this->_frm_json(false,'该手机号码已经提交过信息，不可以再提交');
        }

        $chk2= M('reward')->where(array('qs'=>$title,'company'=>$company))->find();
        if($chk2){
            $this->_frm_json(false,'该公司已经提交过信息，不可以再提交');
        }

        //重组数据
        $data['guess_1']=$sel_attr[0];
        $data['guess_2']=$sel_attr[1];
        $data['guess_3']=$sel_attr[2];
        $data['guess_4']=$sel_attr[3];
        $data['ev14_code']=$this->_create_cdkey();
        $data['cj_addtime']=time();
        $data['addtime']=time();
        $data['qs']=$title;
        $id = M('reward')->add($data);

        if($id){
            //$_SESSION['JSBT_ID']=$phone;
            $this->_frm_json(true,$id);
        }else{
            //$_SESSION['JSBT_ID']='';
            $this->_frm_json(false,'提交失败，请重新提交');
        }

    }

    public function _frm_json($flag,$msg){
        $return_arr=array('flag'=>$flag,'msg'=>$msg);
        echo json_encode($return_arr);
        exit();
    }


    public function  addqs(){
        $data=array('name'=>'新王登记全额返款',"flag"=>1);
        $id = M('event_params')->add($data);
        echo $id;exit();
    }

    public function  ev15(){
        $title='国产票房由你守护';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"国产票房由你守护");
        $this->display();
    }

    public function  ev16(){
        $title='寻找套路王';
        $param = M('event_params')->where(array('name'=>$title))->find();
        $flag=1;
        if($param){
            $flag=$param['flag'];
        }

        $list = M('answer')->where(array("f"=>$title))->order('sort asc')->limit(20)->select();
        $this->assign('vlist', $list);
        $this->assign('vflag', $flag);

        $this->assign('title',"寻找套路王");
        $this->display();
    }
}

?>