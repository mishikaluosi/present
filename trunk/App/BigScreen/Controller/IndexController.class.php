<?php
namespace BigScreen\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        $e_id = I('e_id');
        if(!$e_id){
            echo '页面错误';
            exit();
        }
//        $sql = ""
        $this->display();
    }


}
