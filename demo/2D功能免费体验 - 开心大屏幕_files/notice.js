define(function (require, exports, module) {
    var moduleCommon = require('common');
    var $noticeContainer = $('#top_notice>#topNoticeList');
    var scrollInterval;
    var defaultTopI;
    var topI;

    //获取通知消息
    var getNotice = function () {
        $.extendGetJSON(moduleCommon.httpURL + $('#GetNotices').val(), {}, function (data) {
            $(data.CancelledIds).each(function (i, e) {
                if ($('#top_notice>#topNoticeList>#Notice_' + e).size() < 1) {
                    $('#top_notice>#topNoticeList>#Notice_' + e).remove();
                }
            });
            $(data.Notices).each(function (i, e) {
                if ($('#top_notice>#topNoticeList>#Notice_' + e.Id).size() < 1) {
                    $noticeContainer.append('<span id="Notice_' + e.Id + '">　' + e.Content + '</span>');
                    setTimeout(function () {
                        $('#top_notice>#topNoticeList>#Notice_' + e.Id).remove();
                    }, e.ShowDuration * 60000);
                }
            });

            setTimeout(function () {
                getNotice();
            }, 60000);
        }, function () {
            setTimeout(function () {
                getNotice();
            }, 60000);
        });
    };

    var setPara = function () {
        if ($(window).width() < 1920) {
            topI = 630;
            defaultTopI = 630;
        } else {
            defaultTopI = 1000;
            topI = 1000;
        }
    }

    //通知消息滚动
    var noticeScroll = function () {
        scrollInterval = setInterval(function () {
            if (-topI >= $noticeContainer.width()) {
                topI = defaultTopI;
            }
            $noticeContainer.css("left", topI);
            topI--;
        }, 10);
    }



    //初始化
    exports.init = function () {
        $(window).resize(function () {
            setPara();
        });
        setPara();
        $('body').on('active', function () {
            getNotice();
            //显示通知消息
            $('#top_notice').show();
            //通知消息滚动
            noticeScroll();
            //绑定滚动通知停止滚动事件
            $('#top_notice').hover(function () {
                clearInterval(scrollInterval);
            }, function () {
                noticeScroll();
            });
        });
    };
});