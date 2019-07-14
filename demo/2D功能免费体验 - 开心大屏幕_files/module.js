define(function (require, exports, module) {
  var moduleCommon = require('common');
  var selfModuleName = 'prizelottery';
  var fireWork = require('firework');
  var moduleID = $('[data-modulename=' + selfModuleName + ']').data('moduleid');
  var beginTimer; //开始抽奖
  var luckState = false; //抽奖状态
  var isLuck = ""; //中奖号
  var luckNumber = 1; //抽奖次数
  var luckNumberList = 1;
  var luckLevel; //等级ID
  var showLevel; //等级名称
  var selectNumber = 1; //保存上一次抽奖人的数量,
  var luckScrollTime = 30;
  var stopLuckTime; //强制停止抽奖
  var luckUl = $("#prizelottery #luck_user");
  var userArray;
  var $prizeBox = $('#prizelottery #options');
  var lotteryPrize = $("#prizelottery .prize-select .btn-select");
  var lotteryNumber = $("#prizelottery .select-number");
  var prizeName;
  var removeLotteryUser = 0;
  var moduleId = $('#prizelottery').data('moduleid');
  var activeModule = false;
  exports.init = function () {
    $(window).resize(function () {
      setPara();
    });
    setPara();
    $('body').on('active', function () {
      getLotteryAward();
      $('#beginLuck').click(function () {
        isAuto();
      });
      $('#stopLuck').click(function () {
        stopLuck();
      });
      $('body').on('click', '#submitLottery', function () {
        SubmitLotteryFans();
      });
      $('body').on('click', '.prizelottery #lotteryUser .btn-del', function () {
        deleteThis($(this), $(this).parent().attr('data-level'));
      });
      $('#prizelottery .prize-user-all').on('click', function () {
        showAllLotteryUser();
      });
      $('#prizelottery #backLottery').on('click', function () {
        $('#prizelottery .lottery-all').hide();
        $('#prizelottery .game-box').show();
        $('#prizelottery #lotteryAll').empty();
      })

      $(function () {
        // 设置奖品
        $(document).on('click', '#prizelottery #options li', function () {
          var prizeId = $(this).attr('data-prizeid');
          $('#prizelottery .prize-box .prize-default').animate({'opacity': 0}, function () {
            $(this).remove()
          });
          $('#current').text($(this).attr('data-name'));
          lotteryPrize.attr('data-prizeid', $(this).attr('data-prizeid'));
          lotteryPrize.attr('data-amount', $(this).attr('data-amount'));
          lotteryPrize.attr('data-prizename', $(this).attr('data-prizename'));
          lotteryPrize.attr('data-awardname', $(this).attr('data-awardname'));
          $('#prizelottery .prize-box .prize-use ul[data-prizeid=' + prizeId + ']').show().siblings().hide();
          $('#options').hide();
          if (luckNumber < $(this).attr('data-amount')) {
            $('#prizelottery .select-number .icon-add').removeClass('icon-add-dis');
          } else if (luckNumber > $(this).attr('data-amount')) {
            luckNumber = $(this).attr('data-amount') < 1 ? 1 : $(this).attr('data-amount');
            lotteryNumber.attr('data-amount', luckNumber);
            lotteryNumber.find('label').html(luckNumber + '人');
            $('#prizelottery .select-number .icon-reduce').removeClass('icon-reduce-dis');
          }
          setLotteryBox();
        });
        $('#prizelottery #current').click(function (event) {
          if (!luckState) {
            event.stopPropagation();
            $('#prizelottery #current').removeClass('active');
            $('#prizelottery #options').slideUp();
            if ($('#prizelottery #options').css("display") === "none") {
              $('#prizelottery #options').slideDown("fast");
              $('#prizelottery #current').addClass('active');
            } else {
              $('#prizelottery #options').slideUp();
              $('#prizelottery #current').removeClass('active');
            }
          }
        });
        $(document).on('click', function () {
          $('#prizelottery #current').removeClass('active');
          $('#prizelottery #options').slideUp();
        });
        // 抽取人数调整 增加
        $('#prizelottery .select-number .icon-add').on('click', function () {
          if (!$(this).hasClass('icon-add-dis') && !luckState) {
            levelMaxNum = lotteryPrize.attr("data-amount") * 1;
            luckNumber = lotteryNumber.attr('data-amount') * 1;
            if (luckNumber >= 15) {
              moduleCommon.showInfo("最多同时只能抽取15人!");
              return false;
            } else {
              console.log(luckNumber, userArray.length);
              if (luckNumber >= userArray.length) {
                moduleCommon.showInfo("抽奖人数不够!");
                return false;
              } else {
                if (luckNumber < levelMaxNum) {
                  luckNumber += 1;
                  lotteryNumber.attr('data-amount', luckNumber);
                  lotteryNumber.find('label').html(luckNumber + '人');
                  $('#prizelottery .select-number .icon-reduce').removeClass('icon-reduce-dis');
                  setLotteryBox();
                } else {
                  moduleCommon.showInfo("没有足够的奖品!");
                }
                if (luckNumber === levelMaxNum) {
                  $(this).addClass('icon-add-dis');
                }
                if (luckNumber < 5) {
                  luckUl.removeClass('list-small');
                  luckUl.addClass('list-big');
                } else {
                  luckUl.removeClass('list-big');
                  luckUl.addClass('list-small');
                }
              }
            }
          }
        });
        // 减少抽取人数
        $('#prizelottery .select-number .icon-reduce').on('click', function () {
          if (!$(this).hasClass('icon-reduce-dis') && !luckState) {
            levelMaxNum = lotteryPrize.attr("data-amount") * 1;
            luckNumber = lotteryNumber.attr('data-amount') * 1;
            if (luckNumber <= 1) {
              moduleCommon.showInfo("最少同时抽取1人!");
              return false;
            } else {
              luckNumber -= 1;
              lotteryNumber.attr('data-amount', luckNumber);
              lotteryNumber.find('label').html(luckNumber + '人');
              $('#prizelottery .select-number .icon-add').removeClass('icon-add-dis');
              setLotteryBox();
              if (luckNumber === 1) {
                $(this).addClass('icon-reduce-dis');
              } else {
                $(this).removeClass('icon-reduce-dis');
              }
              if (luckNumber < 5) {
                luckUl.removeClass('list-small');
                luckUl.addClass('list-big');
              } else {
                luckUl.removeClass('list-big');
                luckUl.addClass('list-small');
              }
            }
          }
        })
      })
    });
    $('body').on('modulechange', function (e, moduleName) {
      if (moduleName === selfModuleName) {
        $('#prizelottery').show();
        if (!activeModule) {
          getConfig();
          activeModule = true;
        }
        $('body').keydown(function (event) {
          if (event.keyCode === 13 && event.ctrlKey && activeModule && $('#beginLuck').css('display') !== 'none' && $('#prizelottery').css('display') === "block") {
            isAuto();
          }
          if (event.keyCode === 32 && event.ctrlKey && activeModule && $('#stopLuck').css('display') !== 'none' && $('#prizelottery').css('display') === "block") {
            stopLuck();
          }
        });
      } else {
        activeModule = false;
        $('#prizelottery').hide();
      }
    });
  };
  var setPara = function () {
    if ($(window).width() < 1920) {
    } else {
    }
  };

  var getConfig = function () {
    $.extendGetJSON(moduleCommon.httpURL + $("#GetConfig").val(), {'moduleId': moduleId}, function (data) {
      removeLotteryUser = data.KXD_SeniorLottery_WinnerWay;
      getLottery();
    }, function () {
      moduleCommon.showInfo("加载失败,请重试!");
      moduleCommon.loaded();
    });
  };
  // 点击查看全部中奖用户
  var showAllLotteryUser = function () {
    var htmlStr = $('#prizelottery #luckUl').html();
    $('#prizelottery .lottery-all').show();
    $('#prizelottery .game-box').hide();
    $('#prizelottery #lotteryAll').html(htmlStr);
  };

  //获取奖品信息和对应中奖用户
  var getLotteryAward = function () {
    $.extendGetJSON(moduleCommon.httpURL + $("#GetLotteryAward").val(), {}, function (data) {
      if (data.length > 0) {
        $prizeBox.empty();
        $("#luckUl").empty();
        $('#prizelottery .prize-box .prize-use').empty();
        $(data).each(function (index, element) {
          $prizeBox.append('<li data-prizeid="' + element.Id + '"  data-prizename="' + element.PrizeName + '"  data-name="' + element.Name + '" data-amount="' + element.Count + '">' + element.Name + ' <span>剩<label>' + element.Count + '</label>名</span></li>');
          if (element.PrizeImg === '') {
            $('#prizelottery .prize-box .prize-use').append('<ul data-prizeid="' + element.Id + '" class="prize-default"><li class="prize-img prize-normal"></li><li class="prize-name">' + element.PrizeName + '</li></ul> ');
          } else {
            $('#prizelottery .prize-box .prize-use').append('<ul data-prizeid="' + element.Id + '" ><li class="prize-img" data-prizeid="' + element.Id + '"><img src="' + element.PrizeImg + '"></li><li class="prize-name">' + element.PrizeName + '</li></ul>');
          }

          if (element.Fans.length > 0) {
            if ($("#luckUl").find("#level_" + element.Id).length < 1) {
              $("#luckUl").append("<div id=level_" + element.Id + " class='prize-box'><h1 class='prize-level'>" + element.Name + "：<a></a></h1><ul class='prize-user-box'></ul></div>");
            }
            $(element.Fans).each(function (i, ele) {
              $("#level_" + element.Id).find("ul").prepend('<li class="submited prize-user" data-hasluck="1" data-level="' + element.Id + '"><img class="user-head" src="' + ele.Head + '"><span class="user-name">' + ele.NickName + '</span></li>');
            });
            var _length = $('#level_' + element.Id + ' li').length;
            $('#level_' + element.Id + ' h1 a').text(_length + '人');
            $('#prizelotteryNum').html($('#luckUl li').length);
          }
        });
      }

    }, function () {
      moduleCommon.showInfo("加载失败,请重试!");
      moduleCommon.loaded();
    });
  };

  //获取用户
  var getLottery = function () {
    moduleCommon.loading('数据加载中,请稍后');
    isLuck = '';
    userArray = [];
    notPrize = [];
    $.extendGetJSON(moduleCommon.httpURL + $("#GetLotteryFans").val(), {}, function (data) {
      if (removeLotteryUser == 0) {
        $.extendGetJSON(moduleCommon.httpURL + $("#GetFansWinnerRecord").val(), {'isGetAll': 'False'}, function (data2) {
          setLotteryBox();
          setLotteryUser(moduleCommon.removeLotteryedUser(data, data2));
        });
      } else {
        setLotteryBox();
        setLotteryUser(data);
      }
      moduleCommon.loaded();
    }, function () {
      luckUl.html("");
      moduleCommon.showInfo("加载失败,请重试!");
      moduleCommon.loaded();
    });
  };
  var setLotteryBox = function () {
    luckUl.empty();
    for (var i = 0; i < luckNumber; i++) {
      var htmlStr = '<li class="user-head user-no"></li>';
      luckUl.append(htmlStr);
    }
  };
  var setLotteryUser = function (data) {
    if (data.length > 0) {
      $(data).each(function (index, element) {
        userArray.push({
          'userId': element.Id,
          'userHead': element.Head,
          'userName': element.NickName,
          'headPath': element.HeadPath
        });
      });
    }
  };

  ///////////////////////////////////////////////////////////////////////////////抽奖

  var isAuto = function () {
    luckNumberList = lotteryNumber.attr('data-amount');
    selectNumber = lotteryNumber.attr('data-amount');
    luckLevel = lotteryPrize.attr("data-prizeid") || 0;
    levelMaxNum = lotteryPrize.attr("data-amount") * 1;
    luckNumber = lotteryNumber.attr('data-amount') * 1;
    prizeName = lotteryPrize.attr("data-prizename");
    showLevel = lotteryPrize.html();

    if (userArray.length < 0) {
      moduleCommon.showInfo('当前还没有人参加活动');
      return false;
    }

    if (luckLevel === 0) {
      moduleCommon.showInfo("请选择奖项名称");
      return false;
    }
    if (luckNumber > userArray.length) {
      moduleCommon.showInfo("抽奖人数不够!");
      return false;
    }
    if (luckNumberList * 1 > levelMaxNum) {
      moduleCommon.showInfo("亲，奖品没那么多!");
      return false;
    }
    beginLuck();
    $('#lottery .condition').addClass('disabled');
  };
  var beginLuck = function () {
    stopLuckTime = 0;
    $("#luck_user ul").css("opacity", 1);
    if (!luckState) {
      luckState = true;
      $("#stopLuck").show();
      $("#beginLuck").hide();

      //判断奖池是否已经没人了
      if (luckNumber <= 0) {
        moduleCommon.showInfo("请选取抽取人数!");
        return false;
      }
      // 抽奖动画
      beginTimer = setInterval(function () {
        var luckList = luckUl.find('li');
        for (var i = 0; i < luckList.length; i++) {
          $(luckList[i]).removeClass('user-no');
          $(luckList[i]).html('<img src="">');
          var random = mathRandom(0, userArray.length - 1);
          $(luckList[i]).attr('data-headpath', userArray[random].headPath);
          $(luckList[i]).attr('data-userid', userArray[random].userId);
          $(luckList[i]).find('img').attr('src', userArray[random].userHead);
        }
      }, 50);
    } else {
      moduleCommon.showInfo("抽奖进行中...");
    }
  };

  var mathRandom = function (min, max) {
    return min + Math.round(Math.random() * (max - min))
  };

  //停止抽奖
  function stopLuck() {
    clearInterval(beginTimer);
    luckState = false;
    $("[data-prizeid=" + luckLevel + "]").find("label").html($("[data-prizeid=" + luckLevel + "]").find("label").html() * 1 - luckNumber);
    $("[data-prizeid=" + luckLevel + "]").attr('data-amount', $("[data-prizeid=" + luckLevel + "]").find("label").html() * 1);

    $("#beginLuck").show();
    $("#stopLuck").hide();
    $('#prizelottery .game-box').hide();
    $('.prizelottery #lotteryUser').empty();
    var luckList = luckUl.find('li');
    for (var j = 0; j < luckList.length; j++) {
      $(luckList[j]).addClass('user-no');
      $(luckList[j]).empty();
    }
    var appendHtml = '<div class="prizelottery lottery-user">\n' +
        '    <h1 class="lottery-title">恭喜中奖</h1>\n' +
        '    <ul id="lotteryUser">\n' +
        '    </ul>\n' +
        '    <div class="btn btn-back" id="submitLottery">确认中奖</div>\n' +
        '  </div>';
    $('body').append(appendHtml);
    if ($(window).width() < 1920) {
      $('.prizelottery.lottery-user').css('zoom', '0.71');
    }
    $('.prizelottery.lottery-user').show();
    for (var i = 0; i < luckNumber; i++) {
      var imgUl;
      var userName;
      var headPath;
      var value = Math.round(Math.random() * (userArray.length - 1));
      isLuck = userArray[value].userId; //获取中奖data,也就是中奖人的ID啦
      imgUl = userArray[value].userHead;
      userName = userArray[value].userName;
      headPath = userArray[value].headPath;
      userArray.splice(value, 1);
      $("#luck_user ul").css("opacity", 0);
      var htmlStr = '<li class="lottery-list" data-hasluck="0" data-prizename="' + prizeName + '" data-awardname="' + showLevel + '" data-imgul="' + imgUl + '"  data-headpath="' + headPath + '" data-isluck="' + isLuck + '" data-level="' + luckLevel + '">\n' +
          '        <span class="btn-del"></span>\n' +
          '        <span class="user-head-rotate"></span>\n' +
          '        <span class="user-head-bg">\n' +
          '          <img class="user-head" src="' + imgUl + '" alt="用户头像"></span>\n' +
          '        <span class="user-name">' + userName + '</span>\n' +
          '      </li>';
      $('.prizelottery #lotteryUser').prepend(htmlStr);
      //   // 弹出
      moduleCommon.tempLotteryUser.push({
        'moduleId': moduleId,
        'fanseId': isLuck,
        'fansNickName': userName,
        'awardId': luckLevel,
        'PrizeName': prizeName,
        'AwardName': showLevel
      });
      moduleCommon.submitTempLottery();
    }
    fireWork.show();
  }

//删除中奖
  var deleteThis = function (v, luckLevel) {
    var li = v.parent();
    if (li.data("hasluck") !== 1) {
      $("[data-prizeid=" + luckLevel + "]").find("label").html($("[data-prizeid=" + luckLevel + "]").find("label").html() * 1 + 1);
      $("[data-prizeid=" + luckLevel + "]").attr('data-amount', $("[data-prizeid=" + luckLevel + "]").find("label").html() * 1);
      //添加到需要回到奖池的数组
      userArray.push({
        'userId': li.data('isluck'),
        'userHead': li.find('img').attr('src'),
        'userName': li.find('.user-name').html(),
        'headPath': li.data('headpath')
      });
      li.remove();
    }
    if ($('.prizelottery #lotteryUser li').length === 0) {
      $('.prizelottery.lottery-user').remove();
      $('#prizelottery .game-box').show();
      fireWork.hide();
    }
  };

  //提交中奖名单
  var SubmitLotteryFans = function (v) {
    var submitCount = $(".prizelottery #lotteryUser li[data-hasluck!=1]").size();
    if (submitCount > 0) {
      moduleCommon.loading("正在提交，请稍后");
      var submitArray = [];
      $(".prizelottery #lotteryUser li[data-hasluck!=1]").each(function (index, element) {
        submitArray.push({
          Module_Id: moduleId,
          Fans_Id: $(element).data('isluck'),
          HeadPath: $(element).data('headpath'),
          UserHead: $(element).data('imgul'),
          Fans_NickName: $(element).find('span').text(),
          AwardId: $(element).data('level'),
          PrizeName: $(element).data('prizename'),
          AwardName: $(element).data('awardname')
        });
      });
      $.extendPostLayer(moduleCommon.httpURL + $("#SubmitWinnerRecord").val() + '?moduleId=' + moduleID, JSON.stringify(submitArray), "json", function (data) {
        var recordArray = [];
        $(".prizelottery #lotteryUser li[data-hasluck!=1]").each(function (index, element) {
          recordArray.push({
            AwardId: $(element).data('level'),
            FansId: $(element).data('isluck'),
            FansNickName: $(element).find('span').text(),
            FansHead: $(element).data('headpath')
          });
        });
        $.extendPostLayer(moduleCommon.httpURL + $("#SubmitLotteryFans").val() + '?moduleId=' + moduleID, JSON.stringify(recordArray), "json", function (data) {
          moduleCommon.loaded();
          if (data.ResultType === 1) {
            moduleCommon.showInfo("提交成功", 1);
            console.log(userArray, $('#current').attr('data-amount'), luckNumber);
            // 如果抽取后，可抽取人数小于剩余奖品数 则做以下处理
            if (userArray.length < $('#current').attr('data-amount')) {
              luckNumber = userArray.length < 1 ? 1 : userArray.length;
              $('#prizelottery .select-number').attr('data-amount', luckNumber);
              $('#prizelottery .select-number label').text(luckNumber + '人');
              setLotteryBox();
            }
            // 如果抽取后 还剩余可抽取人数小于上次抽奖的数量 则做以下处理
            if ($('#current').attr('data-amount') < luckNumber) {
              luckNumber = $('#current').attr('data-amount') < 1 ? 1 : $('#current').attr('data-amount');
              $('#prizelottery .select-number').attr('data-amount', luckNumber);
              $('#prizelottery .select-number label').text(luckNumber + '人');
              setLotteryBox();
            }

            // 确认中奖之后 将中奖用户数据添加到右侧中奖名单里面
            for (var i = 0; i < submitArray.length; i++) {
              $('#prizelottery .game-box').show();
              $('.prizelottery.lottery-user').remove();
              fireWork.hide();
              if ($("#luckUl").find("#level_" + submitArray[i].AwardId).length < 1) {
                $("#luckUl").prepend("<div id=level_" + submitArray[i].AwardId + " class='prize-box'><h1 class='prize-level'>" + submitArray[i].AwardName + "：<a></a></h1><ul class='prize-user-box'></ul></div>");
              }
              $("#level_" + luckLevel).find("ul").prepend('<li class="prize-user" data-hasluck="0" data-prizename="' + submitArray[i].PrizeName + '" data-awardname="' + submitArray[i].AwardName + '" data-imgul="' + submitArray[i].UserHead + '"  data-headpath="' + submitArray[i].HeadPath + '" data-isluck="' + submitArray[i].Fans_Id + '" data-level="' + submitArray[i].AwardId + '"><a href="javascript:void(0)"></a><img class="user-head" src="' + submitArray[i].UserHead + '"><span class="user-name">' + submitArray[i].Fans_NickName + '</span></li>');
              $("#level_" + submitArray[i].AwardId + " h1 a").text($("#level_" + submitArray[i].AwardId + " li").length + '人');
              $("#prizelotteryNum").html($("#luckUl li").length);
            }
          } else {
            moduleCommon.showInfo(data.Message);
          }
        }, function () {
          moduleCommon.showInfo("网络繁忙，请稍后重试!");
          moduleCommon.loaded();
        });
      }, function () {
        moduleCommon.showInfo("网络繁忙，请稍后重试!");
        moduleCommon.loaded();
      });
    }
  }
});
