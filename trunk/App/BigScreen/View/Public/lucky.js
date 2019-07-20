$(function () {
    /*
     luckyNum为每次抽几人
     luckyResult为抽奖结果的集合（数组）
     luckyNum为5那么luckyResult的length也为5
     */
    var Obj = {};
    Obj.luckyResult = [];
    Obj.luckyPrize = '';
    Obj.luckyNum = $(".select_lucky_number").val();
    /*
     一次抽几人改变事件
     */
    $(".icon-add").bind('click',function(){
        var cur_num = parseInt($(".select_lucky_number").val());
        var member_count = parseInt($("#event_members_left").val());
        var curent_award_num = parseInt($("#curent_award_num").val());
        if(cur_num>=member_count){
            return false;
        }
        if(cur_num>=curent_award_num){
            return false;
        }
        cur_num++;
        $(".select_lucky_number").val(cur_num);
        $(".show_lucky_number").text(cur_num);
        Obj.luckyNum =  cur_num;
    })
    $(".icon-reduce").bind('click',function(){
        var cur_num = parseInt($(".select_lucky_number").val());
        if(cur_num<=1){
            return false;
        }
        cur_num--;
        $(".select_lucky_number").val(cur_num);
        $(".show_lucky_number").text(cur_num);
        Obj.luckyNum =  cur_num;
    })
    //显示中奖人员
    $("#show-prize-user").bind("click",function(){
        $(".lucky_list").hide();
        var cur_award_id = $("#cur_award_id").val(); //当前奖项id
        var e_id = $("#e_id").val();
        var get_prize_url = $("#get_prize_url").val()+'&e_id='+e_id+'&draw_id='+cur_award_id;
        $(".lottery-all ul.lucky_user").empty();
        $.get(get_prize_url,function(ret){
            if(ret.prize_member.length>0){
                $.each(ret.prize_member,function() {
                    var html = '';
                    html += '<li class="lpl_userInfo">';
                    html += '<img class="lpl_userImage" src="' + this.image + '">';
                    html += '<p class="lpl_userName">' + this.name + '</p>';
                    html += '</li>';
                    $(".lottery-all ul.lucky_user").append(html);
                })
            }
        },'json');
        $(".lottery-all").show();
    })
    //显示所有参加人员
    $("#show-all-member").bind("click",function(){
        $(".lucky_list").hide();

        $(".lottery-all ul.lucky_user").empty();
        $.each(personArray,function(){
            var html='';
            html=   '<li class="lpl_userInfo">';
            html+=      '<img class="lpl_userImage" src="'+this.image+'">';
            html+=      '<p class="lpl_userName">'+this.name+'</p>';
            html+=  '</li>';
            $(".lottery-all ul.lucky_user").append(html);
        })
        $(".lottery-all").show();
    })
    $("#backLottery").bind("click",function(){
        $(".lottery-all").hide();
        $(".lucky_list").show();
    })
    // $(".select_lucky_number").bind('change', function () {

    // })

    /*
     图片预加载
     */
    function loadImage(arr, callback) {
        var loadImageLen = 1;
        var arrLen = arr.length;
        $('.all_number').html("/" + arrLen);
        for (var i = 0; i < arrLen; i++) {
            var img = new Image(); //创建一个Image对象，实现图片的预下载
            img.onload = function () {
                img.onload = null;
                ++loadImageLen;
                $(".current_number").html(loadImageLen);
                if (loadImageLen == arrLen) {
                    callback(img); //所有图片加载成功回调；
                }
                ;
            }
            img.src = arr[i].image;
        }
    }

    /*
     把3D动画初始化，等待执行
     personArray为本地引入数据
     */
    Obj.M = $('.container').lucky({
        row: 7, //每排显示个数  必须为奇数
        col: 5,//每列显示个数  必须为奇数
        depth: 5, //纵深度
        iconW: 30, //图片的宽
        iconH: 30, //图片的高
        iconRadius: 8, //图片的圆角
        data: personArray, //数据的地址数组
    });
    /*
    执行图片预加载并关闭加载试图
    */
    loadImage(personArray, function (img) {
        $('.loader_file').hide();
    });
    /*
     若为ajax请求执行这段代码
     此为为ajax请求;
     $.get('index.php',function(data){
         if(data.res == 1){
             personArray = data.data; //此为数组

             //执行图片预加载并关闭加载试图
             loadImage(personArray, function (img) {
                $('.loader_file').hide();
             })
             Obj.M = $('.container').lucky({
             row : 7, //每排显示个数  必须为奇数
             col : 7, //每列显示个数  必须为奇数
             depth : 6, //纵深度
             iconW : 30, //图片的宽
             iconH : 30, //图片的高
             iconRadius : 8, //图片的圆角
             data : personArray, //数据的地址数组
         });
         }
     })
     */

    /*
     中奖人员展示效果
     传入当前中奖数组中单个的key
     */
    function showLuckyPeople(num) {
        setTimeout(function () {
            var $luckyEle = $('<img class="lucky_icon" />');
            var $userName = $('<p class="lucky_userName"></p>');
            var $fragEle = $('<div class="lucky_userInfo"></div>');
            $fragEle.append($luckyEle, $userName);
            $('.mask').append($fragEle);
            $(".mask").fadeIn(200);

            $luckyEle.attr('src', Obj.luckyResult[num].image);
            $userName.text(Obj.luckyResult[num].name)
            $fragEle.animate({
                'left': '50%',
                'top': '50%',
                'height': '200px',
                'width': '200px',
                'margin-left': '-100px',
                'margin-top': '-100px',
            }, 1000, function () {
                setTimeout(function () {
                    $fragEle.animate({
                        'height': '100px',
                        'width': '100px',
                        'margin-left': '100px',
                        'margin-top': '-50px',
                    }, 400, function () {
                        $(".mask").fadeOut(0);
                        $luckyEle.attr('class', 'lpl_userImage').attr('style', '');
                        $userName.attr('class', 'lpl_userName').attr('style', '');
                        $fragEle.attr('class', 'lpl_userInfo').attr('style', '');
                        $('.lpl_list.active').append($fragEle);
                    })
                }, 1000)
            })
        }, num * 2500)
        setTimeout(function () {
            $('.lucky_list').show();
        }, 2500)
    }

    /*
     停止按钮事件函数
     */
    $('#stop').click(function () {
        Obj.M.stop();
        $(".container").hide();
        $(this).hide();
        var i = 0;
        for (; i < Obj.luckyResult.length; i++) {
            showLuckyPeople(i);
        }

    })
    /*
     开始按钮事件函数
     */
    $('#open').click(function () {
        $('.lucky_list').hide();
        $(".container").show();
        Obj.M.open();
        // 此为ajax请求获奖结果
        var get_lucky_info = $('#get_lucky_info').val();
        var cur_award_id = $('#cur_award_id').val();
        var e_id = $('#e_id').val();
        $.post(get_lucky_info,{luckyNum : Obj.luckyNum,e_id:e_id,cur_award_id:cur_award_id},function(ret){
        	  if(ret.status != 1){
        		  Obj.luckyResult = ret.data;
        		  //该奖项已中奖数修改
        		  var prizelotteryNum = parseInt($("#prizelotteryNum").text());
        		  prizelotteryNum = prizelotteryNum+Obj.luckyNum;
                  $("#prizelotteryNum").text(prizelotteryNum);
                  //未中奖数修改
                  var event_members_left = parseInt($("#event_members_left").val());
                  event_members_left = event_members_left-Obj.luckyNum;
                  $("#event_members_left").val(event_members_left);
                  //可抽奖数修改
                  var curent_award_num = parseInt($("#curent_award_num").val());
                  var select_lucky_number = curent_award_num-prizelotteryNum;
                  $(".select_lucky_number").val(select_lucky_number);
                  //可抽奖数显示修改
                  $(".show_lucky_number").text(select_lucky_number);
                  Obj.luckyNum = select_lucky_number;
                  $("#stop").show(500);
        	  }
        },'json')
        //ajax获奖结果结束

        //此为人工写入获奖结果
        // randomLuckyArr();
        // setTimeout(function () {
        //     $("#stop").show(500);
        // }, 1000)
        //人工获奖结果结束
    })

    /*
     前端写中奖随机数
     */
    function randomLuckyArr() {
        Obj.luckyResult = [];
        for (var i = 0; i < Obj.luckyNum; i++) {
            var random = Math.floor(Math.random() * personArray.length);
            if (Obj.luckyResult.indexOf(random) == -1) {
                Obj.luckyResult.push(random)
            } else {
                i--;
            }
        }
    }

    /*
     切换奖品代码块
     */
    function tabPrize() {
        var luckyDefalut = $(".lucky_prize_picture").attr('data-default');
        var index = luckyDefalut ? luckyDefalut : 1;
        tabSport(index);
        var lucky_prize_number = $('.lucky_prize_show').length;
        $('.lucky_prize_left').click(function () {
            $('.lucky_prize_right').addClass('active');
            index <= 1 ? 1 : --index;
            tabSport(index, lucky_prize_number);
        })
        $('.lucky_prize_right').click(function () {
            $('.lucky_prize_left').addClass('active');
            index >= lucky_prize_number ? lucky_prize_number : ++index;
            tabSport(index, lucky_prize_number);
        })

    }

    /*
     切换奖品左右按钮公共模块
     */
    function tabSport(i, lucky_prize_number) {
        if (i >= lucky_prize_number) {
            $('.lucky_prize_right').removeClass('active');
        }
        if (i <= 1) {
            $('.lucky_prize_left').removeClass('active');
        }
        Obj.luckyPrize = i;
        $('.lucky_prize_show').hide().eq(i - 1).show();
        $(".lucky_prize_title").html($('.lucky_prize_show').eq(i - 1).attr('alt'));
        $.ajaxSettings.async = false;
        //异步获取该奖项已中奖人数
        var cur_award_id = parseInt($('.lucky_prize_show').eq(i - 1).attr('award_id'));
        $("#cur_award_id").val(cur_award_id); //当前奖项id
        var e_id = $("#e_id").val();
        var get_prize_url = $("#get_prize_url").val()+'&e_id='+e_id+'&draw_id='+cur_award_id;
        $('.lpl_list').empty();
        $.get(get_prize_url,function(ret){
            $("#prizelotteryNum").text(ret.prize_lottery_num);
            if(ret.prize_member.length>0){
                $.each(ret.prize_member,function() {
                    var html = '';
                    html += '<div class="lpl_userInfo">';
                    html += '<img class="lpl_userImage" src="' + this.image + '">';
                    html += '<p class="lpl_userName">' + this.name + '</p>';
                    html += '</div>';
                    $('.lpl_list').append(html);
                })
            }
        },'json');
        $.ajaxSettings.async = true;
        var cur_num = parseInt($('.lucky_prize_show').eq(i - 1).attr('award_num'));
        var member_count = parseInt($("#event_members_left").val());
        //该奖项已中奖人数
        var prizelotteryNum = parseInt($("#prizelotteryNum").text());
        cur_num = cur_num - prizelotteryNum;  //默认抽奖数量减掉该奖项已中奖人员数量
        if(cur_num>member_count){ //如果奖项抽奖数量大于参加人员 抽奖数量取参加人员数量
            cur_num =  member_count;
        }
        Obj.luckyNum =  cur_num;
        $(".select_lucky_number").val(cur_num); //默认奖项抽奖数量提取
        $(".show_lucky_number").text(cur_num); //默认奖项抽奖数量 显示
        $("#curent_award_num").val(cur_num); //最大奖项抽奖数量

        $("#current").html($('.lucky_prize_show').eq(i - 1).attr('award_level'));
        // $('.lpl_list').removeClass('active').hide().eq(i - 1).show().addClass('active');

    }
    tabPrize();
})
