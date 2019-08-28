<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>幸运大抽奖</title>
    <link rel="stylesheet" href="/App/BigScreen/View/Public/index.css" media="screen" type="text/css">
    <style type="text/css">
    ._ea-area ._ea-desc {
        overflow: hidden;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    ._ea-area {
        list-style: none;
        margin: 10px 0;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    ._ea-area li {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        height: 45px;
        line-height: 45px;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        cursor: pointer;
        margin: 0;
        background-color: #f5f5f5;
        font-size: 14px;
        padding-left: 16px;
    }

    ._ea-area li ._ea-icon {
        width: 18px;
        height: 18px;
        margin-right: 8px;
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAIAAADZrBkAAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3NDM4MDIwNzBDMjA2ODExQjI0Q0IwRkRFMzU5M0MyRCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo5Nzg1ODQ2NDBCMzAxMUU1OEI0QkIzRkUyM0JCQzMwMyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo5Nzg1ODQ2MzBCMzAxMUU1OEI0QkIzRkUyM0JCQzMwMyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NzQzODAyMDcwQzIwNjgxMUIyNENCMEZERTM1OTNDMkQiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NzQzODAyMDcwQzIwNjgxMUIyNENCMEZERTM1OTNDMkQiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7xYkKOAAABXElEQVR42mL03xrKQDpgYiAL0FcbC6aQADt/pVHpr3+/W890/Pj7kyjbhDgEOyxb1AXVdIW1Wywa2JhYCWsT5hDqtGyR4BKHcFX4lVstGtmY2bBo42LhhLBEOUWB9gBJIPvs6/OPPj8GMlQFVNosGjmY2dG0MW+ZtunI86NAI/usO0U4hYFCl95ebjzVevTFCScZew5mDiEOIRMx40PPjv7+95uFieXf/39ANYz///9//u0FkCPNLQXkn3t9vvl0x3+G/0C2OJd4vWmVFLckkH3t3fU1d9cHKwdWn6iHaoNbferlmbazXciO4WPjBQaMHI8sXCRgWxjIb0AnQfjHX5xE0wMEn359zjtUfPvDHQgXHh9MQCedeXX20LMjned6sYa1HK+sLC/UNnjYsAA9OvHStD///uBKEKIcIlffXfv48xMrE8uX318QqeTzr8940hEwMoBoKOYAgAADAKmHhfBKCYRQAAAAAElFTkSuQmCC");
    }

    ._ea-area li ._ea-desc {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    ._ea-area li._ea-price-status a {
        color: #008000 !important;
    }

    ._ea-area li._ea-price-trend {
        position: relative;
        margin-left: 15px;
        color: #fd9729;
    }

    ._ea-area li._ea-price-trend ._ea-icon {
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozMzM1RjhFOTBCMzkxMUU1OEI0QkIzRkUyM0JCQzMwMyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozMzM1RjhFQTBCMzkxMUU1OEI0QkIzRkUyM0JCQzMwMyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjMzMzVGOEU3MEIzOTExRTU4QjRCQjNGRTIzQkJDMzAzIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjMzMzVGOEU4MEIzOTExRTU4QjRCQjNGRTIzQkJDMzAzIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+z/CkXQAAAQ1JREFUeNrE1M0KAVEYBuAhkabISlEs2CEbKcpGKWXhAmys5qLmGthQLETIT1nbKRfgb6EUNuM99U6dJsZPU7566pwjX+98znAZhqE4UW7FofLoui4iuX5toGmas4neNQrDAkag2j6azWcRmEKC+zGU4PpNoiiTJKSzHEzAb9coIJ3F2STOfQ/WXOeZUn3VaAYhEk1iPB9CDcqwk5LNISg2+NW9cqMMrGDJ2YjqQ4XrPRRgw30WulCFgXXYSWndgbol/RaKHHqKg+9bH20ofaH9pIlZB0gzvVkXOZGYQwvO0Hhzt9JMZJYqN7pBE+4fXOIYr4GYmw9O1hkdP3wbevSfd+3rRsav+DekPAQYAAC/RKcXqkFDAAAAAElFTkSuQmCC");
    }

    ._ea-area li._ea-price-trend._ea-on ._ea-tab {
        display: block;
    }

    ._ea-tab {
        position: absolute;
        left: 0;
        top: 45px;
        right: 0;
        z-index: 9999;
        display: none;
        cursor: default;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 0;
        border-bottom: 3px solid #fd9729;
        -webkit-transition: opacity 0.233s linear;
        -o-transition: opacity 0.233s linear;
        transition: opacity 0.233s linear;
        -webkit-transform: translate(0);
        -ms-transform: translate(0);
        transform: translate(0);
        opacity: 1;
        background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAM8AAAB+CAIAAAAMddLYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDQjYxQ0QwQjE5NzIxMUU1QkRBM0Q5QjRCODg2QkVDNSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDQjYxQ0QwQzE5NzIxMUU1QkRBM0Q5QjRCODg2QkVDNSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkNCNjFDRDA5MTk3MjExRTVCREEzRDlCNEI4ODZCRUM1IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkNCNjFDRDBBMTk3MjExRTVCREEzRDlCNEI4ODZCRUM1Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+VuM4SwAAJxlJREFUeNrsfVlz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");
        background-repeat: no-repeat;
        background-position: 28px 20px;
        background-color: #fff;
    }

    ._ea-tab ._ea-tab-desc {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        cursor: text;
        color: #ff5400;
        margin: 60px auto 0 auto;
        line-height: 1.6;
        width: 246px;
        font-weight: bold;
    }

    ._ea-tab ._ea-tab-btn,
    ._ea-tab ._ea-tab-btn:hover,
    ._ea-tab ._ea-tab-btn:active {
        height: 40px;
        line-height: 40px;
        display: block;
        font-size: 16px;
        margin: 40px 20px 20px;
        background: #fd9729;
        color: #fff !important;
        text-decoration: none;
    }
    </style>
</head>
<body style="">
<!--初始化数据请求url-->
<input type="hidden" id="get_member_url" value="<?php echo U('Index/getEventInfo');?>">
<!--已中奖数据请求url 获取当前奖项已经中奖数据-->
<input type="hidden" id="get_prize_url" value="<?php echo U('Index/getPrizeInfo');?>">
<!--获取中奖结果请求url-->
<input type="hidden" id="get_lucky_info" value="<?php echo U('Index/getLuckyInfo');?>">
<!--活动id-->
<input type="hidden" id="e_id" value="<?php echo ($e_id); ?>">
<!--当前奖项最大中奖数量-->
<input type="hidden" id="curent_award_num" value="">
<!--未中奖数量-->
<input type="hidden" id="event_members_left" value="">
<!--当前奖项id-->
<input type="hidden" id="cur_award_id" value="">
<div class="container none" style="">
</div>
<div class="mask"></div>
<div id="stop" class="btn_circle none">停止</div>
<div class="loader_file" style="display: none;">
    用户数据导入中 <span class="current_number">56</span><span class="all_number">/56</span>
</div>
<div class="lucky_list clearfix">
    <div class="lucky_prize">
        <h1 class="game-title">幸运抽奖</h1>
        <div class="lucky_prize_box">
            <button class="lucky_prize_left lucky_prize_direction">&lt;</button>
            <div data-default="1" class="lucky_prize_picture">
                <?php if(is_array($event_draw)): foreach($event_draw as $key=>$draw): ?><img class="lucky_prize_show none" src="/uploads/<?php echo ($draw['image']); ?>" award_level="<?php echo ($draw['draw_level']); ?>" alt="<?php echo ($draw['name']); ?>" award_num="<?php echo ($draw['draw_num']); ?>" award_id="<?php echo ($draw['id']); ?>"
                         style="
                         <?php if($key== 0): ?>display: inline;
                        <?php else: ?>
                        display: none;<?php endif; ?>
                        "><?php endforeach; endif; ?>
            </div>
            <button class="lucky_prize_right active lucky_prize_direction">&gt;</button>
            <div class="lucky_prize_title"></div>
        </div>

        <div class="lucky_setting" style="margin-top: 180px;">
            <p>奖项名称：
                <span class="btn-select" id="current"></span>
            </p>
        </div>
        <div class="lucky_setting" style="margin-top: 30px;">
            抽取人数：
            <span class="select-number">
                <i class="icon-common icon-reduce"></i>
                <input type="hidden" class="select_lucky_number" value="">
                <label><span class="show_lucky_number"></span>人</label>
                <i class="icon-common icon-add"></i>
            </span>
        </div>
    </div>
    <div class="lucky_mid">
        <h1 class="game-title">签到人员(<i id="member_count"></i>人)
            <a href="javascript:;" id="show-all-member" class="prize-user-all">全部</a>
        </h1>
        <div class="img-qrcode">
            <img src="/App/BigScreen/View/Public/img/user_no.png">
            虚席以待
        </div>
        <div id="open" class="btn_circle btn_start">开始</div>
    </div>

    <div class="lucky_people_list">
        <h1 class="game-title">获奖名单(<i id="prizelotteryNum">0</i>人)
            <a href="javascript:;" id="show-prize-user" class="prize-user-all">全部</a>
        </h1>
        <div class="lpl_list clearfix active" style="display: block;">


        </div>
    </div>
</div>
<div class="lottery-all" style="display: none;">
    <h1 class="game-title"></h1>
    <ul class="lucky_user" id="lotteryAll">
    </ul>
    <div class="btn btn-back" id="backLottery">返回抽奖</div>
</div>
<script src="/App/BigScreen/View/Public/jquery-1.10.2.js"></script>
<script src="/App/BigScreen/View/Public/jquery.min.js"></script>
<script type="text/javascript" src="/App/BigScreen/View/Public/transform.js"></script>
<script type="text/javascript" src="/App/BigScreen/View/Public/tick.js"></script>


<script type="text/javascript" src="/App/BigScreen/View/Public/3d.js"></script>

<script type="text/javascript" src="/App/BigScreen/View/Public/lucky.js"></script>

<script type="text/javascript" src="/App/BigScreen/View/Public/data.js"></script>
</body>
</html>