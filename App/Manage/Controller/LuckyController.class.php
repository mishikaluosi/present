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
