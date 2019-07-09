<?php

namespace Mobile\Controller;

class IndexController extends MobileCommonController{
	//方法：index
	public function index(){

		$where='status=1 ';
        $where.=' and zc_ids like "%$$$'.$this->_xzl_zcid.'$$$%"';
        $count = M('product')->where($where)->count();
        $page=I('page', 1,'intval');
        $page = new \Common\Lib\Spage($count,$page,C('_Index_Product_cnt'));
        $art =  M('product')->where($where)->order(get_sort('product'))->limit($page->limit)->select();
        $this->assign('page', $page->html);
        $this->assign('plist', $art);

		//最新公告，前4
        $news_where=' 1=1 and status=0  and cid='.C('_Index_News_cid');
        $news_list=M('article')->where($news_where)->order(get_sort('article'))->limit('0,'.C('_Index_News_cnt'))->select();
        $this->assign('news_list',$news_list);

		$this->display();

	}
}

?>
