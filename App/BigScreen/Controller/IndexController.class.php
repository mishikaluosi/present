<?php
namespace BigScreen\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        echo 1;
        die();
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
        $pre = C('DB_PREFIX');
        //获取奖项
        $event_draw = M("event_draw")->alias('ed')->
            field('ed.*,a.name,a.image')
            ->join("{$pre}award a ON a.id=ed.award_id","LEFT")
            ->where(['ed.e_id'=>$e_id])
            ->select();
        $this->assign('event_draw',$event_draw);
        $this->assign('e_id',$e_id);
        $this->display();
    }
    public function getEventInfo(){//获取参与活动人员
        $e_id = I('e_id');
        $event_members=$this->getEventMember($e_id);
        $ret['member_count'] = count($event_members);//参加总人数
        $ret['event_members'] = $event_members; //参加人员
        //总已中奖人数
        $award_count = M('prize')->where(['e_id'=>$e_id])->count();
        $event_members_left =  $ret['member_count'] - $award_count;
        $ret['event_members_left'] = $event_members_left;

        echo json_encode($ret);
    }
    public function getPrizeInfo(){
        $e_id = I('e_id');
        $draw_id = I('draw_id');
        $pre = C('DB_PREFIX');
        $ret['prize_member'] = M('prize')
            ->alias('p')
            ->field('p.*,eu.name,eu.image')
            ->join("{$pre}event_user eu ON eu.id=p.uid","LEFT")
            ->where(['p.e_id'=>$e_id,'p.draw_id'=>$draw_id])
            ->select();
        //该奖项中奖人数
        $ret['prize_lottery_num'] = M('prize')->where(['e_id'=>$e_id,'draw_id'=>$draw_id])->count();
        echo json_encode($ret);
    }
    public function getLuckyInfo(){
        $e_id = I('e_id');
        $luckyNum = I('luckyNum');
        $cur_award_id = I('cur_award_id');
        //排除已中奖人员id
        $prize = M("prize")->where(['e_id'=>$e_id,])->select();
        $prize_uids = join(",",i_array_column($prize,'uid'));
        //获取所有未中奖人员
        $not_prize = M('event_user')->where(['id'=>['not in',$prize_uids],'e_id'=>$e_id])->select();
        $not_prize_uids = i_array_column($not_prize,'id');
        //随机生成中奖数据
        $licky_keys = array_rand($not_prize_uids,$luckyNum);
        if(count($licky_keys)>1){
            for($i=0;$i<$luckyNum;$i++){
                $licky_uids[] = $not_prize_uids[$licky_keys[$i]];
            }
            $licky_uids = join(",",$licky_uids);
        }else{
            $licky_uids =$not_prize_uids[$licky_keys];
        }

        $prize_member = M('event_user')->where(['id'=>['in',$licky_uids],'e_id'=>$e_id])->select();
        $data = [];
        foreach($prize_member as $v){
            $tmp_data = [];
            $tmp_data['draw_id'] = $cur_award_id;
            $tmp_data['e_id'] = $e_id;
            $tmp_data['uid'] = $v['id'];
            $tmp_data['created_at']  = time();
            $data[] = $tmp_data;
        }
        $ret = M("prize")->addAll($data);
        if(!$ret){
            $this->returnError("抽奖失败");
        }
        $this->returnSuccess($prize_member);
    }
    private function getEventMember($e_id){
//        $data = [
//            [
//                "name" => '赞木',
//                "thumb_image" => 'public/img/tx.png',
//                "image" => 'public/img/tx.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => 'saray鱼',
//                "thumb_image" => 'public/img/tx1.png',
//                "image" => 'public/img/tx1.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => 'Lily',
//                "thumb_image" => 'public/img/tx2.png',
//                "image" => 'public/img/tx2.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '钟道江',
//                "thumb_image" => 'public/img/tx3.png',
//                "image" => 'public/img/tx3.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '小涛',
//                "thumb_image" => 'public/img/tx4.png',
//                "image" => 'public/img/tx4.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '亮亮',
//                "thumb_image" => 'public/img/tx5.png',
//                "image" => 'public/img/tx5.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '小超',
//                "thumb_image" => 'public/img/tx6.png',
//                "image" => 'public/img/tx6.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '赞木2',
//                "thumb_image" => 'public/img/tx.png',
//                "image" => 'public/img/tx.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => 'saray鱼2',
//                "thumb_image" => 'public/img/tx1.png',
//                "image" => 'public/img/tx1.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => 'Lily2',
//                "thumb_image" => 'public/img/tx2.png',
//                "image" => 'public/img/tx2.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '钟道江2',
//                "thumb_image" => 'public/img/tx3.png',
//                "image" => 'public/img/tx3.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '小涛2',
//                "thumb_image" => 'public/img/tx4.png',
//                "image" => 'public/img/tx4.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '亮亮2',
//                "thumb_image" => 'public/img/tx5.png',
//                "image" => 'public/img/tx5.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//            [
//                "name" => '小超2',
//                "thumb_image" => 'public/img/tx6.png',
//                "image" => 'public/img/tx6.png',
//                "e_id" => $e_id,
//                "created_at" => time(),
//            ],
//        ];
//        $members = M('event_user')->addAll($data);
        $members = M('event_user')->where(['e_id'=>$e_id])->select();
        return $members;
    }
    public function returnSuccess($data,$message='ok'){
        echo json_encode(array(
            'status' => 0,
            'data' => $data,
            'message' => $message
        ));
        exit();
    }
    public function returnError($message='error'){
        echo json_encode(array(
            'status' => 1,
            'data' => null,
            'message' => $message
        ));
        exit();
    }
}
