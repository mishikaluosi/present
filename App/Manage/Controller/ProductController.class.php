<?php
namespace Manage\Controller;
use Common\Lib\Category;

class ProductController extends CommonContentController {
	
	public function index() {
        $fp=I('fp','all');
        $where=' 1=1 ';
        switch ($fp){
            case 'all':break;
            case 'zs':$where.=' and status=1 ';break;
            case 'xj':$where.=' and (status!=1 or status is null)';break;
            case 'qh':$where.=' and (num<1 or num is null)';break;
            case 'by':$where.=' and (wlmoney<=0 or wlmoney is null)';break;
            case 'zc'://无职场
                $where.=' and (zc_info is null or zc_info="")';
                break;
        }
        $this->assign('fp', $fp);

        $keyword = I('keyword', '', 'htmlspecialchars,trim');//关键字
        if (!empty($keyword)) {
            $where.=' and title like "%'.$keyword.'%"';
        }
        $this->assign('keyword', $keyword);

        $count = M('product')->where($where)->count();
        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('product')->order(get_sort('product'))->where($where)->limit($limit)->select();
        $this->assign('page', $page->show());
        $this->assign('vlist', $list);

        $tongji['all'] = pe_num('product', null);
        $tongji['zs'] = pe_num('product', array('status'=>1));
        $tongji['xj'] = pe_num('product', array('status'=>2));
        $tongji['qh'] = pe_num('product', array('num'=>0));
        $tongji['by'] = pe_num('product', array('wlmoney'=>0));
        $tongji['zc'] =pe_num('product', '(zc_info is null or zc_info="")');
        $this->assign('tongji', $tongji);
		$this->display();
	}

	public function msg(){
        $id = I('id', 0,'intval');
        if(IS_POST){
            $this->msg_save();
            exit();
        }
        if(is_numeric($id)&&$id>0){
            $vo = M('product')->find($id);
            $vo['pictureurls'] = deal_pictureurls($vo);
            $vo['content'] = htmlspecialchars($vo['content']);
            $vo['zc_info'] = empty($vo['zc_info'])?null:unserialize($vo['zc_info']);
        }
        $type_title='';
        if($vo){
            $type_title='修改产品';
        }else{
            $type_title='添加产品';
        }
        $this->assign('type_title', $type_title);
        $this->assign('vo', $vo);
        $this->assign('info', $vo);
        $this->display();
    }
    
    public function msg_save()
    {
        $post_data = I('post.');
        $id = I('id', null);
        $data['title'] = I('title', '', 'htmlspecialchars,rtrim');
        $data['content'] = I('content', '', '');
        $data['pictureurls'] = I('pictureurls');
        $info = $post_data['info'];
        $data['money'] = $info['money'];
        $data['num'] = $info['num'];
        $data['wlmoney'] = 0;//$info['wlmoney'];

        if (empty($data['title'])) {
            $this->error('产品名不得为空');
        }

        //图片处理
        $pictureurls_arr = array();
        $imgPostUrls = isset($data['pictureurls']) ? $data['pictureurls'] : '';
        if (is_array($imgPostUrls)) {
            foreach ($imgPostUrls as $k => $v) {
                $pictureurls_arr[] = $v . '$$$' . '$$$';//array('url'=> $v ,'alt'=> '');
                if ($k == 0) {
                    $pic = $v;
                }
            }
        }
        $data['pictureurls'] = join('|||', $pictureurls_arr);
        $data['litpic'] = isset($pic) ? $pic : '';

        //职场信息
        $zc_info = $post_data['zc_info'];
        if (!empty($zc_info)) {
            $where = ' id in (' . trim($zc_info) . ')';
            $zc_info = M('zc')->where($where)->select();
            $zc_arr = array();
            $zc_id_arr = array();
            foreach ($zc_info as $v) {
                $zc_arr[$v['id']] = array('id' => $v['id'], 'name' => $v['name']);
                $zc_id_arr[] = $v['id'];
            }
        }

        if($zc_arr){
            $data['zc_info']=serialize($zc_arr);
            $data['zc_ids']='$$$'.implode("$$$",$zc_id_arr).'$$$';
        }else{
            $data['zc_info']='';
            $data['zc_ids']='';
        }

        if(is_numeric($id)&&$id>1){//保存
            $data['updatetime']=time();
            $flag=M('product')->where("id=".$id)->data($data)->save();
        }else{//添加
            $data['publishtime'] = time();
            $data['psort']=50;
            $data['status'] = 1;
            $data['sellnum']=$data['clicknum']=0;
            $flag=$id=M('product')->add($data);
        }

        if($flag){
            $this->_product_callback($id,$post_data);
            $this->redirect('Product/index');
        }else {
            $this->error('添加失败');
        }
    }

    /**
     * 修改&添加产品的后续处理
     * @param $product_id
     * @param $post_data
     */
    public function _product_callback($product_id,$post_data) {
        //global $db;
        $info_list =deal_arr_index('product_ruleid',get_prodata_byid($product_id));
        if (is_array($post_data['product_ruleid'])) {
            foreach ($post_data['product_ruleid'] as $k=>$v) {
                $sql_set['product_id'] = $product_id;
                $sql_set['product_ruleid'] = $v;
                $sql_set['product_rulename'] = $post_data['product_rulename'][$k];
                $product_rule = array();
                foreach($post_data['rule_id'] as $kk=>$vv) {
                    $rulename_arr = explode(',', $post_data['product_rulename'][$k]);
                    $product_rule[] = array('name'=>$post_data['rule_name'][$kk], 'value'=>$rulename_arr[$kk]);
                }
                $sql_set['product_rule'] = count($product_rule) ? serialize($product_rule) : '';
                $sql_set['product_money'] = $post_data['money'][$k];
                $sql_set['product_num'] = $post_data['num'][$k];
                $sql_set['sort'] = $k+1;
                if (is_array($info_list[$v])) {
                    M('prodata')->where( array('product_guid'=>$info_list[$v]['product_guid']))->save($sql_set);
                    unset($info_list[$v]);
                }
                else {
                    $id = M('prodata')->add($sql_set);
                }

                //计算商品价格和库存
                $sqlset_product=array();
                if ($post_data['money'][$k] <= $sqlset_product['money'] or !isset($sqlset_product['money'])) {
                    $sqlset_product['money'] = $post_data['money'][$k];
                }
                foreach ($post_data['num'] as $v){
                    $sqlset_product['num'] +=$v;
                }
            }
            //组合总规格数据集
            foreach($post_data['rule_id'] as $k=>$v) {
                $rule_list[$k]['id'] = $v;
                $rule_list[$k]['name'] = $post_data['rule_name'][$k];
                //$rule_list[$k]['list'] = $ruledata_list[$k];
                foreach ($post_data['product_ruleid'] as $kk=>$vv) {
                    $ruleid_arr = explode(',', $post_data['product_ruleid'][$kk]);
                    $rulename_arr = explode(',', $post_data['product_rulename'][$kk]);
                    $rule_list[$k]['list'][$ruleid_arr[$k]] = array('id'=>$ruleid_arr[$k], 'name'=>$rulename_arr[$k]);
                }
            }
            $sqlset_product['rules'] = serialize($rule_list);
        } else {
            $info = M('product')->find($product_id);
            $sql_set['product_id'] = $product_id;
            $sql_set['product_ruleid'] = '';
            $sql_set['product_rulename'] = '';
            $sql_set['product_rule'] = '';
            $sql_set['product_money'] = $info['money'];
            $sql_set['product_num'] = $info['num'];
            $sql_set['sort'] = 1;
            if (is_array($info_list[''])) {
                M('prodata')->where(array('product_guid'=>$info_list['']['product_guid']))->save($sql_set);
                unset($info_list['']);
            }
            else {
                $id = M('prodata')->add($sql_set);
            }
            $sqlset_product['rules'] = '';
        }

        M('product')->where(array('id'=>$product_id))->save($sqlset_product);
        //删除失效规格商品
        $guid_arr = array();
        foreach ($info_list as $v) {
            $guid_arr[] = $v['product_guid'];
        }
        if(count($guid_arr)>0){
            $guid_arr_str=implode(',',$guid_arr);
            $where='product_guid in ('.$guid_arr_str.')';
            M('prodata')->where($where)->delete();
        }
    }

    public function rule(){
        $cache_rule=get_cache_rule();//var_dump($cache_rule);exit();
        $ruledata_id=I('id');
        $ruledata_id = $ruledata_id ? explode(',', $ruledata_id) : array();
        $this->assign('cache_rule',$cache_rule);
        $this->assign('ruledata_id',$ruledata_id);
        $this->display();
    }

    public function datalist(){
        $product_id = intval(I('id'));
        $info = M('product')->find($product_id);
        if ($info&&$info['rules']) {
            $info['rules'] = unserialize($info['rules']);
            foreach ($info['rules'] as $k=>$v) {
                $rule_list[] = array('id'=>$v['id'], 'name'=>$v['name']);
            }
            $data_list = get_prodata_byid($product_id);
            foreach ($data_list as $k=>$v) {
                $prodata_list[$k]['guid'] = $v['product_guid'];
                $prodata_list[$k]['id'] = $v['product_ruleid'];
                $prodata_list[$k]['id_arr'] = explode(',', $v['product_ruleid']);
                $prodata_list[$k]['name'] = $v['product_rulename'];
                $prodata_list[$k]['name_arr'] = explode(',', $v['product_rulename']);
                $prodata_list[$k]['money'] = $v['product_money'];
                $prodata_list[$k]['num'] = $v['product_num'];
            }
        }
        $rowspan_list = rowspan_list($prodata_list);
        $result = is_array($rule_list) ? true : false;
        $json_arr=array('result'=>$result, 'rule_list'=>$rule_list, 'prodata_list'=>$prodata_list, 'rowspan_list'=>$rowspan_list);
        $this->_frm_json($json_arr);
    }
    public function datalist_new(){
        $ruledata_id=I('id');
        $ruledata_id = $ruledata_id ?$ruledata_id : array();
        $rule_ids = array();
        $cache_ruledata=get_cache_ruledata();
        $cache_rule=get_cache_rule();
        foreach($cache_ruledata as $k=>$v) {

            if (!in_array($v['ruledata_id'], $ruledata_id)) continue;
            if (!in_array($v['rule_id'], $rule_ids)) {
                $rule_ids[] = $v['rule_id'];
                $rule_list[] = array('id'=>$v['rule_id'], 'name'=>$cache_rule[$v['rule_id']]['rule_name']);
            }
            $ruledata_idarr[$v['rule_id']][] = $v['ruledata_id'];
        }

        $prodata_list = prodata_list($cache_ruledata,$ruledata_idarr);
        $rowspan_list = rowspan_list($prodata_list);
        $result = is_array($rule_list) ? true : false;
        $json_arr=array('result'=>$result, 'rule_list'=>$rule_list, 'prodata_list'=>$prodata_list, 'rowspan_list'=>$rowspan_list);
        $this->_frm_json($json_arr);
    }

    public function _frm_json($arr,$flag=null){
        if(empty($flag)){
            echo json_encode($arr);
            exit();
        }
        echo json_encode(array('flag'=>$flag,'msg'=>$arr));
        exit();
    }

	//更新排序
	public function psort(){
	    $psort = I('post.psort','', 'intval');
	    $id = I('post.id','', 'intval');
	    $data['psort'] = $psort;
	    $psorts=M('product')->where("id=$id")->data($data)->save();
	    echo "$psorts";
	}

	public function del(){
        $id = I('id',0 , 'intval');
        if (M('product')->where('id='.$id)->delete()) {
            M('prodata')->where(array('product_id'=>$id))->delete();
            M('cart')->where(array('product_id'=>$id))->delete();
            $this->success('删除成功', U('product/index'));
        }else {
            $this->error('删除失败');
        }
    }

    public function changezc(){
        $product_id = I('product_id');
        $pro_ids=explode(',',$product_id);
        $zc_info=array();
        $pro_info=array();
        foreach ($pro_ids as $id){
            $vo = M('product')->find($id);
            $pro_info[]=array(
                "id"=>$id,
                "title"=>$vo['title'],
                "img"=> deal_pictureurls($vo)
            );
            $zc = empty($vo['zc_info'])?null:unserialize($vo['zc_info']);
            foreach ($zc as $z){
                if(!in_array($z['id'],$zc_info)){
                    $zc_info[$z['id']]=$z;
                }
            }
        }
        $this->assign('pro_info',$pro_info);
        $this->assign('zc_info',$zc_info);
        $this->assign('product_id',$product_id);
        $this->assign('pcnt',count($pro_ids));
        $this->display();
    }
    public function changezc_save(){
        $product_id = I('product_id');
        $pro_ids=explode(',',$product_id);
        $post_data=I('post.');
        $zc_info=$post_data['zc_info'];
        if(!empty($zc_info)){
            $where=' id in ('.trim($zc_info).')';
            $zc_info= M('zc')->where($where)->select();
            $zc_arr=array();$zc_id_arr=array();
            foreach ($zc_info as $v){
                $zc_arr[$v['id']]=array('id'=>$v['id'],'name'=>$v['name']);
                $zc_id_arr[]=$v['id'];
            }

        }

        if($zc_arr){
            $data['zc_info']=serialize($zc_arr);
            $data['zc_ids']='$$$'.implode("$$$",$zc_id_arr).'$$$';
        }else{
            $data['zc_info']='';
            $data['zc_ids']='';
        }

        foreach ($pro_ids as $id){
            $flag=M('product')->where("id=".$id)->data($data)->save();
        }

        pe_success('批量更改成功!', '', 'dialog');
    }

    /**
     * 上架下架
     */
    public function state(){
        $id = I('id',0 , 'intval');
        $status = I('status',1 , 'intval');
        $flag=M('product')->where("id=".$id)->data(array('status'=>$status))->save();
        if ($flag) {
            if($status==2){
                M('cart')->where(array('product_id'=>$id))->delete();
            }
            $this->success('操作成功',null,1);
        }else {
            $this->error('操作失败');
        }
    }

}



?>