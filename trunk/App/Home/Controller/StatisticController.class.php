<?php
namespace Home\Controller;
use Think\Controller;

class StatisticController extends Controller{
	
	//统计url,模型原版，ID
	public function index(){
		$url = $_SERVER['HTTP_REFERER'];
		
		//获取当前栏目的cid
		if(strstr($url,'/cid/'))
		{
			$arr = explode('/cid/',$url);
			if(strstr($arr[1],'/'))
				$arr = explode('/',$arr[1]);
			else
				$arr = explode('.',$arr[1]);
			$cid = $arr[0];
		}
		
		
		//获取当前栏目的id
		if(strstr($url,'/cid/'))
		{
			$arr = explode('/id/',$url);
			if(strstr($arr[1],'/'))
				$arr = explode('/',$arr[1]);
			else
				$arr = explode('.',$arr[1]);
			$id = $arr[0];
		}
		
		
		if(!empty($cid))
		{
			//根据cid获取当前栏目的模板ID
			$res = M("category") -> where(" id = ".$cid) -> find();
			//根据模板ID 获得模板的原型
			$res = M("model") -> where(" id =  ".$res["modelid"]) -> find();
			$tablename = $res["tablename"];	
		}
		else
		{
			$tablename = "index";
			$cid = 0;
		}
		
		if(empty($id))
			$id = 0;
		
		//获取IP以及位置
		$ip = get_client_ip();
		
		$data = array(
			'from_url' => $url,
			'ip' => $ip,
			'category' => $tablename,
			'parameter' => '/cid/'.$cid.'/id/'.$id,
			'browse_time' => time(),
		);
		
		//编译数组表头准备起飞
		$data = http_build_query($data);
		$opts["http"] = array(
			'method'=>"POST",
			'timeout'=>0.1, 
			'content' => $data,
		);
		
		$cxContext = stream_context_create($opts);  
		
		$url = "http://222.188.92.104:1900/interface.php/Home/Index/test";
		
		$sFile = file_get_contents($url, false, $cxContext);
		
		print_R($sFile);die;
		
		M("statistic") -> add($data);
		
	}
}

?>