<?php
namespace Api\Controller;
use Common\Lib\Xcx as Xcx;
use Think\Controller;
class DrawController extends Controller {

  //获取用户信息
    public function getconfig(){
        $str='{"State":5,"Configs":{"KXD_Bonus_RepeatWinning":"1","KXD_M3DLogoUrl":"0","KXD_M3DNoOne":"0","KXD_M3DSCREEN_HEIGHT":"900","KXD_M3DSCREEN_WIDTH":"1600","KXD_M3DStartNum":"5","KXD_MessageWall_AuthType":"3","KXD_MessageWall_BackgroudColor":"ffffff","KXD_MessageWall_BackgroudOpacity":"1","KXD_MessageWall_BorderColor":"cecece","KXD_MessageWall_FontColor":"000000","KXD_MessageWall_FontOpacity":"1","KXD_MessageWall_IsFastDisplay":"0","KXD_MessageWall_ShowWay":"animate_default","KXD_Music_Play_Mode":"single","KXD_Music_Play_State":"stop","KXD_Music_Url":"","KXD_Screen_MaxJoinCount":"20","KXD_Screen_WelcomeContent":"欢迎参加｛screenName｝活动，请在收到本消息一分钟内，发送关键字“查询”，查询本次活动参加资格！","KXD_ScreenJoinReminder":"0"}}';
        echo $str;
    }
}

