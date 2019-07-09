<?php

if (C('CFG_WEBSITE_CLOSE') == 1) {
	exit_msg(C('CFG_WEBSITE_CLOSE_INFO'));
}


function GetNowChild()
{
	$sort = $_GET["cid"];
	
	if(!empty($sort))
	{
		$category = M("category");
		//判断是否为一级类
		$res = $category -> where(" id = ".$sort) ->find();
		
		if( $res["pid"] == 0 )
		{
			$count = $category -> where(" pid = ".$sort) ->count();
			if($count > 0 )
				return true;
			else
				return false;
			
		}
		else
			return true;
	}
	else
		return false;
	
}



?>