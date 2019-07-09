<?php
namespace Manage\Controller;

class DmsgController extends CommonController {

	public function config() {
	    $fix_field=array("id", "username", "tel", "email", "homepage", "qq", "ip", "posttime", "replytime", "status", "content", "reply", "userid", "attr",'type');
        $this->assign('fix_field', $fix_field);

        //是否有type
        $field_sql="SHOW COLUMNS FROM bestop_guestbook;";
        $fields=M('guestbook')->query($field_sql);
        //var_dump($fields);exit();
        $has_type=false;
        foreach ($fields as $f){
            if($f['field']=='type')
                $has_type=true;
        }
        if($has_type==false){
            $type_sql='alter table bestop_guestbook add column type varchar(255);';
            M('guestbook')->execute($type_sql);
        }

        //字段的配置
        $config_item = 'MSG_ADD_FIELD';
        $config = M('config')->where(array('name' => $config_item))->find();
        $other_field=array();
        if($config && !empty($config['value'])){
            $other_field=unserialize($config['value']);
        }
        $this->assign('other_field', $other_field);

        //type的配置
        $config_item = 'MSG_ADD_TYPE';
        $t_config = M('config')->where(array('name' => $config_item))->find();
        $type_list=array();
        if($t_config && !empty($t_config['value'])){
            $type_list=unserialize($t_config['value']);
        }
        $this->assign('type_list', $type_list);

        $this->display();
	}

	public function msg(){
        $fp=I('fp','all');
        $where=array();
        if(is_numeric($fp)){
            $where['type']=$fp;
        }
		$this->assign('fp', $fp);
		
        //字段的配置
        $config_item = 'MSG_ADD_FIELD';
        $config = M('config')->where(array('name' => $config_item))->find();
        $other_field=array();
        if($config && !empty($config['value'])){
            $other_field=unserialize($config['value']);
        }
        $this->assign('other_field', $other_field);

        //type的配置
        $config_item = 'MSG_ADD_TYPE';
        $t_config = M('config')->where(array('name' => $config_item))->find();
        $type_list=array();
        if($t_config && !empty($t_config['value'])){
            $type_list=unserialize($t_config['value']);
        }
        $this->assign('type_list', $type_list);

        $count = M('guestbook')->where($where)->count();

        $page = new \Common\Lib\Page($count, 10);
        $page->rollPage = 7;
        $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $limit = $page->firstRow. ',' .$page->listRows;
        $list = M('guestbook')->order('id DESC')->where($where)->limit($limit)->select();

        $this->assign('page', $page->show());
        $this->assign('vlist', $list);
        $this->assign('type', '留言本管理');
        $this->display();
    }

    public function add_type(){
	    $tname=I('tname');
	    $tvalue=I('tvalue');
	    $data[]=array('name'=>$tname,'value'=>$tvalue);

	    if(empty($tname)&&empty($tvalue)){
            $this->error('不得为空');
        }
        $config_item = 'MSG_ADD_TYPE';
        $config = M('config')->where(array('name' => $config_item))->find();

        if ($config) {//修改一条信息
            if (empty($config['value'])) {
                $value = serialize($data);
            } else {
                $value = serialize(array_merge(unserialize($config['value']), $data));
            }
            $edit_config = array(
                'name' => $config_item,
                'value' => $value,
                'id' => $config['id']
            );
            M('config')->save($edit_config);
            $this->success('ok ');exit();
        }

        //添加一条信息
        $add_config = array(
            'name' => $config_item,
            'value' => serialize($data)
        );
        M('config')->add($add_config);
        $this->success('成功');

    }

	public function add_field(){
        $data = $keys = array();
        for ($i = 1; $i < 6; $i++) {
            $data['name' . $i] = I('f' . $i . '_name');
            $data['value' . $i] = $keys[$i] = I('f' . $i . '_value');
        }
        $data = array_filter($data);
        $keys = array_filter($keys);

        if (empty($data)) {
            $this->error('没有可添加的字段');
        }

        $field_sql="SHOW COLUMNS FROM bestop_guestbook;";
        $old_fields = M('guestbook')->query($field_sql);
        $names = array();
        foreach ($old_fields as $o) {
            $names[] = strtolower($o['field']);
        }

        $new_keys = array();
        $type_sql='';
        foreach ($keys as $k => $v) {
            if (!in_array(strtolower($v), $names)) {
                if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $v) > 0) {
                    //echo '全是中文';
                } else if (preg_match('/[\x{4e00}-\x{9fa5}]/u', $v) > 0) {
                    // echo '含有中文';
                } else {
                    $type_sql .= 'alter table bestop_guestbook add column ' . $v . ' varchar(255);';


                    $new_keys[] = array("name" => $data['name' . $k], 'value' => $data['value' . $k]);
                }
            }
        }

        if(!empty($type_sql)){
            $flag = M('guestbook')->execute($type_sql);
        }

        if (empty($new_keys)) {
            $this->error('你添加的字段已存在或不合格');exit();
        }

        $config_item = 'MSG_ADD_FIELD';
        $config = M('config')->where(array('name' => $config_item))->find();

        if ($config) {//修改一条信息
            if (empty($config['value'])) {
                $value = serialize($new_keys);
            } else {
                $value = serialize(array_merge(unserialize($config['value']), $new_keys));
            }
            $edit_config = array(
                'name' => $config_item,
                'value' => $value,
                'id' => $config['id']
            );
            M('config')->save($edit_config);
            $this->success('ok ');exit();
        }

        //添加一条信息
        $add_config = array(
            'name' => $config_item,
            'value' => serialize($new_keys)
        );
        M('config')->add($add_config);
        $this->success('成功');
    }


}


?>