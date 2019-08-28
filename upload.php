<?php
$saveFile = 'upload/';
$imgurl = $_POST['img'];
$newimgs=array();
foreach($imgurl as $img){

	$save =base64_upload($img);
	if($save){
		$newimgs[]=$save;
	}
}

function base64_upload($base64) {
    $base64_image = str_replace(' ', '+', $base64);
    //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)){
        //匹配成功
        if($result[2] == 'jpeg'){
            $image_name = uniqid().'.jpg';
            //纯粹是看jpeg不爽才替换的
        }else{
            $image_name = uniqid().'.'.$result[2];
        }
        $image_file = "upload/{$image_name}";
        //服务器文件存储路径
        if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))){
            return $image_name;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
if(empty($newimgs)){
	echo json_encode('upload error');exit();
}else{
	echo json_encode($newimgs[0]);exit();
}

//echo var_dump($newimgs);exit();
?>