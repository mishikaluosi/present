<?php
//归档
namespace Mobile\Controller;

class ArchiveController extends MobileCommonController{
	//方法：index
	public function index(){

        $cid = I('cid', 0,'intval');
        $this->assign('cid', $cid);

        //栏目信息
        $cate=get_cate_byid($cid);
        $this->assign('cate', $cate);

        if($cid==0||$cid==C('_News_top_id')) {
            $ids = Category::getChildsId(get_category(),C('_News_top_id'), true);
            $ids = implode(',',$ids);
        }else{
            $ids=$cid;
        }

        if(empty($cid)){
            $where=' 1=1 and article.status=0  ';
        }else{
            $where=' 1=1 and article.status=0  and article.cid in ('.$ids.')';
        }

        $count = D2('ArcView','article')->where($where)->count();
        $page=I('page', 1,'intval');
        $page = new \Common\Lib\Spage($count,$page,C('_News_pagesize'));
        $art = D2('ArcView','article')->nofield('content')->where($where)->order(get_sort('article',true))->limit($page->limit)->select();
        $this->assign('page', $page->html);
        $this->assign('vlist', $art);
        $this->display();

	}

	public function detail(){
        $id = I('id', 0,'intval');
        $this->assign('id', $id);

        if(is_numeric($id)){
            $vo=M('article')->where('id='.$id)->find();
        }

        if($vo){
            $cate=get_cate_byid($vo['cid']);
            $this->assign('cate', $cate);

            $this->seo_info(empty($vo['seo_title'])?$vo['title']:$vo['seo_title'],$vo['keywords'],$vo['seo_des']);

            //列表
            $list_where=' 1=1 and article.status=0  and article.cid='.$vo['cid'];
            $count = D2('ArcView','article')->where($list_where)->count();
            $page = new \Common\Lib\Page($count,6);
            $page->rollPage = 10;
            $page->setConfig('theme','%UP_PAGE% %DOWN_PAGE%');
            $limit = $page->firstRow. ',' .$page->listRows;
            $art = D2('ArcView','article')->nofield('content')->where($list_where)->order(news_sort(false))->limit($limit)->select();
            $this->assign('page', $page->show(true));
            $this->assign('vlist', $art);

            //上一篇 下一篇
            $where=' 1=1 and status=0  and cid='.$vo['cid'];
            $next_where=$where.' and (asort>'.$vo['asort'].' or (asort='.$vo['asort'].' and id<'.$vo['id'].' ))';
            $prev_where=$where.' and (asort<'.$vo['asort'].' or (asort='.$vo['asort'].' and id>'.$vo['id'].' ))  ';
            $next=M('article')->where($next_where)->order(news_sort())->find();
            $prev=M('article')->where($prev_where)->order('asort desc,id asc')->find();
            $next_n=array("url"=>"#",'title'=>'没有下一篇了');
            $prev_n=array("url"=>"#",'title'=>'没有上一篇了');
            if($next){
                $next_n['url']=U('news/detail',array('id'=>$next['id']));
                $next_n['title']=$next['title'];
            }
            if($prev){
                $prev_n['url']=U('news/detail',array('id'=>$prev['id']));
                $prev_n['title']=$prev['title'];
            }
            $this->assign('next_n', $next_n);
            $this->assign('prev_n', $prev_n);
        }

        $this->assign('vo', $vo);

        $this->display();
    }

}

?>