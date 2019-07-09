<?php
  //返回json
  function return_json($arr)
  {
    echo(json_encode($arr));
    exit;
  }

  //返回失败的json
  function return_error($msg)
  {
    echo(json_encode([
      'code'=>404,
      'data'=>'',
      'msg'=>$msg
    ]));
    exit;
  }

  //返回成功
  function return_ok($data)
  {
    echo(json_encode([
      'code'=>200,
      'data'=>$data,
      'msg'=>'请求成功'
    ]));
    exit;
  }

  //空格转+
  function define_str_replace($s)
  {
    return str_replace(" ","+",$s);
  }

  function randomkeys($param){
    $str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $key = "";
    for($i=0;$i<$param;$i++)
     {
         $key .= $str{mt_rand(0,32)};    //生成php随机数
     }
     return $key;
   }

   function randomnum($param){
     $str="0123456789";
     $key = "";
     for($i=0;$i<$param;$i++)
      {
          $key .= $str{mt_rand(0,10)};    //生成php随机数
      }
      return $key;
    }

   function post_data(){
     $receipt = $_REQUEST;
     if($receipt==null){
     $receipt = file_get_contents("php://input");
     if($receipt == null){
     $receipt = $GLOBALS['HTTP_RAW_POST_DATA'];
     }
     }
     return $receipt;
   }

   function xml2array($xml){
     //将XML转为array
     $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
      return $array_data;
   }
 ?>
