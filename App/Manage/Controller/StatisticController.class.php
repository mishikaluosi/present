<?php
namespace Manage\Controller;

class StatisticController extends CommonController {

	public function index() {		
	
		if(IS_POST){
			$data = I('post.');
			$starttime = strtotime($data['starttime']);
			$endtime = strtotime($data['endtime'])+24*60*60;
			
			//循环次数
			$number = ceil(($endtime-$starttime)/(24*60*60));
			//echo $number;die;
			
			$arr=array();
			
			for($i=0; $i<$number; $i++){
				$start = $starttime + $i*24*60*60;
				$end = $starttime +($i+1)*24*60*60;
				$where['time'] = array('between',array($start,$end));
				//$count = M("statistic")->where($where)->count();
				$product = M("statistic")->where($where)->where(array("tablename"=>"product"))->count();
				$article = M("statistic")->where($where)->where(array("tablename"=>"article"))->count();
				$cases = M("statistic")->where($where)->where(array("tablename"=>"cases"))->count();
				$index = M("statistic")->where($where)->where(array("tablename"=>"index"))->count();
				$arr[0][$i] = intval($product);
				$arr[1][$i] = intval($article);
				$arr[2][$i] = intval($cases);
				$arr[3][$i] = intval($index);
				$arr[4][$i] = date('Y-m-d',$start);
				
				//$result = M("statistic")->getLastSql();
				//$arr[$i] = $count;
				
			}
			
			echo json_encode($arr);
			//echo($result);die;
			

			
		}
		else{
		
		
			$time = time();
			//今天时间
			$today = strtotime(date('Y-m-d',time()));
			//$yd=strtotime('-1 day');
			
			
			$count = M("statistic")->count();
			$product = M("statistic")->where(array("tablename"=>"product"))->count();
			$article = M("statistic")->where(array("tablename"=>"article"))->count();
			$cases = M("statistic")->where(array("tablename"=>"cases"))->count();
			$index = M("statistic")->where(array("tablename"=>"index"))->count();
				

				
				
			
			$this->assign("product",$product);
			$this->assign('article',$article);
			$this->assign('cases',$cases);
			$this->assign('index',$index);
			
			$this->display();
		}
		
		
	}

	



}


?>