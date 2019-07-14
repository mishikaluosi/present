define(function (require, exports, module) {
    var moduleCommon = require('common');
    exports.httpURL = '';
    exports.tempLotteryUser = [];
    //消息提示（type 1:正确信息 0:错误信息）
    exports.showInfo = function (text, type) {
        $(".info-box").remove();
        if (type == 1) {
            $("body").append("<div class='info-box'><div class=success>" + text + "</div></div>");
        } else {
            $("body").append("<div class='info-box'><div class=error>" + text + "</div></div>");
        }
        setTimeout(function () {
            $(".info-box").animate({"top": "50px", "opacity": 0}, function () {
                $(".info-box").remove();
            });
        }, 2000)
    };
    //显示提示
    exports.showTips = function (obj) {
        var v = $(obj);
        var _left = v.offset().left;
        var _top = v.offset().top;
        $('body').append('<div class="tips">' + v.data('description') + '</div>');
        $('.tips').css({
            'left': _left,
            top: _top - 40,
            'margin-left': -($('.tips').width() / 2) + 7
        });
    };

    //移除提示
    exports.removeTips = function () {
        $('.tips').remove();
    };

    //筛选已中奖人

    exports.removeLotteryedUser=function(lotteryUser,lotteryedUser){
        var result = [];
        for (var i = 0; i < lotteryUser.length; i++) {
            var hasUser = false;
            for (var j = 0; j < lotteryedUser.length; j++) {
                if (lotteryUser[i].Id == lotteryedUser[j].FansId) {
                    hasUser = true;
                    break
                }
            }
            if (!hasUser) {
                result.push(lotteryUser[i]);
            }
        }
        return result;
    }

    exports.submitTempLottery = function () {
        var submitForm = $('<form/>');
        $(moduleCommon.tempLotteryUser).each(function (index, element) {
            submitForm.append('<input name="[' + index + '].Module_Id" type="hidden" value="' + element.moduleId + '" />');
            submitForm.append('<input name="[' + index + '].Fans_Id" type="hidden" value="' + element.fanseId + '" />');
            submitForm.append('<input name="[' + index + '].Fans_NickName" type="hidden" value="' + element.fansNickName + '" />');
            submitForm.append('<input name="[' + index + '].AwardId" type="hidden" value="' + element.awardId + '" />');
            submitForm.append('<input name="[' + index + '].PrizeName" type="hidden" value="' + element.PrizeName + '" />');
            submitForm.append('<input name="[' + index + '].AwardName" type="hidden" value="' + element.AwardName + '" />');
        });
        $.extendPost(moduleCommon.httpURL + $("#SubmitAwardFansRecord").val(), submitForm.serializeArray(), "json", function (data) {
            moduleCommon.tempLotteryUser.length = 0;
        }, function () {
            setTimeout(function () {
                moduleCommon.submitTempLottery();
            }, 10000);
        });
    }

    //加载中
    exports.loading = function (text) {
        $('body').append('<div id="loading"><div class="loading-box"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div><span>' + text + '</span></div></div>');
    };

    //加载完成
    exports.loaded = function () {
        $('#loading').remove();
    };

    exports.fillZero = function (number, digits) {
        number = String(number);
        var length = number.length;
        if (number.length < digits) {
            for (var i = 0; i < digits - length; i++) {
                number = "0" + number;
            }
        }
        return number;
    };
});
