imgError = function (v) {
    $(v).attr('src', $('#config>#FileWebHost').val() + '/common/css/images/nohead.jpg');
};
define(function (require, exports, module) {
    var moduleCommon = require('common');
    var moduleMain = require('main');

    // 快捷键类型
    var SHORTCUT_TYPE = {
        // 开启
        OPEN: 'open',
        // 关闭
        CLOSE: 'close'
    };

    // 活动的状态
    var ACTIVITY_STATUS = {
        // 准备状态， 对应可执行开启操作
        READY: 'ready',
        // 进行中，对应可执行关闭操作
        ING: 'ing'
    };

    // // 快捷键使用需要等待时间
    // var shortcutWaitTime = 1000;
    // 是否能用快捷键
    var canUseShortcut = true;
    // 快捷键的timer
    var shortcutTimer;

    // 定义快捷空格开启活动的模块
    var quickSwitchModules = [
        // 颜值抽奖
        // {
        //     name: 'facepk',
        //     beginBtn: '.face-lottery-begin',
        //     endBtn: '.face-lottery-stop'
        // },
        // 滚动抽奖
        {
            name: 'lottery',
            beginBtn: '#beginLuck',
            endBtn: '#stopLuck',
            // 操作前，是否需要判定状态
            isNeedJudgeStatus: true,
            /**
             * 获取当前活动状态
             * @return {ENUM.<ACTIVITY_STATUS>} 当前活动状态
             */
            getStatus: function () {
                if ($('#lottery #beginLuck').css('display') !== 'none') {
                    return ACTIVITY_STATUS.READY;
                }
                return ACTIVITY_STATUS.ING;
            }
        },
        // 摇一摇
        {
            name: 'shake',
            beginBtn: '#beginShake',
            // 确定中奖名单
            endBtn: '.submitShake',
            // 不包含在模块的DOM中
            isEndNotIn: true,
            begin: function () {
                if ($('#shake .shake-ready').css('display') === 'block') {
                    $('#shake #beginShake').click();
                }
            }
        },
        // 订货宝
        {
            name: 'ordergoods',
            beginBtn: 'beginOrder',
            endBtn: 'beginOrder',
            begin: function () {
                var container = $('#ordergoods');
                if (container.find('.product-list[data-state=2]').length > 0) {
                    return;
                }

                var waitingProducts = container.find('.product-list[data-state=1]');
                if (waitingProducts.length > 0) {
                    var currentProduct = waitingProducts[0];
                    $(currentProduct).find('.beginOrder').click();
                }
            },
            end: function () {
                var currentProduct = $('#ordergoods .product-list[data-state=2]');
                currentProduct.find('.beginOrder').click();
            }
        },
        // // 即时组队
        // {
        //     name: 'pair',
        //     beginBtn: '#beginPair',
        //     endBtn: '#stopPair'
        // },
        //摇红包
        /*{
         name: 'shakebonus',
         beginBtn: '#beginShakebonus',
         endBtn: '#stopShakebonus'
         },
         */
        // 分享大比拼
        {
            name: 'popularity',
            beginBtn: '.beginPopularity',
            endBtn: '.beginPopularity',
            // 操作前，是否需要判定状态
            isNeedJudgeStatus: true,
            /**
             * 获取当前活动状态
             * @return {ENUM.<ACTIVITY_STATUS>} 当前活动状态
             */
            getStatus: function () {
                // FIXME(zhangyan): 为兼容原代码，不再对应模块添加更多代码，
                // 故在此通过按钮文字判定当前状态
                var btnText = $('#popularity #popularityBg .beginPopularity').text();

                if (btnText === '开始游戏') {
                    return ACTIVITY_STATUS.READY;
                }
                return ACTIVITY_STATUS.ING;
            }
        }
    ];

    exports.isSendMessage = 1;
    //获取屏幕配置信息 and 音乐氛围控制
    var getScreenSetting = function () {
        $.extendGetJSON(moduleCommon.httpURL + $('#url>#GetConfig').val(), {
            'moduleId': 100100,
            'isGetScreenState': 'True'
        }, function (data) {
            moduleMain.isSendMessage = data.Configs.KXD_ScreenJoinReminder;
            $('#screenfinished').remove();
            if (data.State != 5) {
                $('body').append('<div id="screenfinished"><span>活动已结束</span></div>');
            }
            // 音乐氛围控制
            var $bgMusic = $('#bgMusic');
            if ($bgMusic.attr('src') != data.Configs.KXD_Music_Url) { // 是否更换歌曲
                $bgMusic.attr('src', data.Configs.KXD_Music_Url);
            }
            if (data.Configs.KXD_Music_Play_State == 'start') { //是否停止播放
                if ($bgMusic.get(0).paused) {
                    $bgMusic.get(0).play();
                }
            } else {
                $bgMusic.get(0).pause();
            }
            if (data.Configs.KXD_Music_Play_Mode == 'loop') { //是否单曲循环播放
                $bgMusic.get(0).loop = true;
            } else {
                $bgMusic.get(0).loop = false;
            }

            $('body').data('screenConfig', data.Configs);
            setTimeout(function () {
                getScreenSetting();
            }, 30000);
        }, function () {
            setTimeout(function () {
                getScreenSetting();
            }, 3000);
        });
    };

    /**
     * 快速开启/关闭活动
     * @param {ENUM.<SHORTCUT_TYPE>} type 快捷键类型
     */
    function switchActivites(type) {
        // 当前操作模块
        var currentModule = null;

        // 根据模块的 display 属性获取当前操作模块
        for (var i = 0, len = quickSwitchModules.length; i < len; i++) {
            var item = quickSwitchModules[i];
            var itemJDOM = $('#' + item.name);
            if (itemJDOM.css('display') === 'block') {
                currentModule = item;
                currentModule.jdom = itemJDOM;
                break;
            }
        }

        // 没有要操作的模块则返回
        if (!currentModule) {
            return;
        }

        // 是否能执行当前操作，默认为true
        var isCan = true;
        // 根据当前要执行的操作与状态判定，当前操作是否可继续执行
        if (currentModule.isNeedJudgeStatus) {
            var status = currentModule.getStatus();

            if (type === SHORTCUT_TYPE.OPEN) {
                isCan = status === ACTIVITY_STATUS.READY;
            }
            else {
                isCan = status === ACTIVITY_STATUS.ING;
            }
        }

        if (!isCan) {
            return;
        }

        // 开启活动
        if (type === SHORTCUT_TYPE.OPEN) {
            if (currentModule.begin) {
                currentModule.begin();
                return;
            }

            currentModule.jdom.find(currentModule.beginBtn).click();
        }
        // 关闭活动
        else {
            if (currentModule.end) {
                currentModule.end();
                return;
            }

            if (currentModule.isEndNotIn) {
                $(currentModule.endBtn).click();
            }
            else {
                currentModule.jdom.find(currentModule.endBtn).click();
            }
        }
    }

    //快捷键设置
    $(document).keydown(function (event) {
        var e = event || window.event || arguments.callee.caller.arguments[0];
        if (!e) {
            return;
        }
        // 空格，开启活动
        if (e.keyCode === 32) {
            switchActivites(SHORTCUT_TYPE.OPEN);
            return;
        }
        // 回车，关闭活动
        else if (e.keyCode === 13) {
            switchActivites(SHORTCUT_TYPE.CLOSE);
            return;
        }
        // if (!canUseShortcut) {
        //     return;
        // }
        // 切换模块，有时间限制
        // canUseShortcut = false;
        // clearTimeout(shortcutTimer);
        // shortcutTimer = setTimeout(function () {
        //     canUseShortcut = true;
        // }, shortcutWaitTime);
        if (e.shiftKey&&e.keyCode === 69) {
            var $activityCode = $('#activityCode');
            if ($activityCode.css('display') === 'none') {
                $activityCode.show();
            } else {
                $activityCode.hide();
            }
        }
        else{
            switch (e.keyCode) {
                // 颜值抽奖 K
                case 75:
                    $('#btn_change .module-box[data-name=facepk]').click();
                    break;
                // 消息墙 X
                case 88:
                    // 签到墙(定制)
                    $('#btn_change .module-box[data-name=messagewall]').click();
                    break;
                // 标星消息 N
                case 78:
                    $('#btn_change .module-box[data-name=starmessage]').click();
                    break;
                // 抽奖：滚动抽奖, 合并抽奖 C
                case 67:
                    $('#btn_change .module-box[data-name=lottery]').click();
                    $('#btn_change .module-box[data-name=prizelottery]').click();
                    break;
                // 摇一摇：基础摇一摇, 螃蟹摇一摇 Y
                case 89:
                    $('#btn_change .module-box[data-name=shake]').click();
                    $('#btn_change .module-box[data-name=crabshake]').click();
                    break;
                // 图片库 T
                case 84:
                    $('#btn_change .module-box[data-name=imgwall]').click();
                    break;
                // 订货宝 1
                case 49:
                case 97:
                    $('#btn_change .module-box[data-name=ordergoods]').click();
                    break;
                // 投票 I: 嘉宾投票, 投票(预测抽奖), 图片投票, 即时投票, 团队投票
                case 73:
                    $('#btn_change .module-box[data-name=vote]').click();
                    $('#btn_change .module-box[data-name=imgvote]').click();
                    break;
                // 节目评分, 特殊节目评分 P
                case 80:
                    $('#btn_change .module-box[data-name=program]').click();
                    break;
                // 组队：即时组队, 即时配对 E
                case 69:
                    $('#btn_change .module-box[data-name=pair]').click();
                    $('#btn_change .module-box[data-name=pair2]').click();
                    break;
                // 分享大比拼 2
                case 50:
                case 98:
                    $('#btn_change .module-box[data-name=popularitymatch]').click();
                    break;
                // 开心集卡片 R
                case 82:
                    $('#btn_change .module-box[data-name=carcollect]').click();
                    break;
                // 照片墙 V
                case 86:
                    $('#btn_change .module-box[data-name=signwall]').click();
                    break;
                // 开心刮刮卡 G
                case 71:
                    $('#btn_change .module-box[data-name=scratchcard]').click();
                    break;
                // 开心拔河 F
                case 70:
                    $('#btn_change .module-box[data-name=tugofwar]').click();
                    break;
                // 嘉宾展示 W
                case 87:
                    $('#btn_change .module-box[data-name=guest]').click();
                    break;
                // 开心大转盘 Z
                case 90:
                    $('#btn_change .module-box[data-name=turntable]').click();
                    break;
                // 打赏 D
                case 68:
                    $('#btn_change .module-box[data-name=reward]').click();
                    break;
                // 图片摇一摇 B
                case 66:
                    $('#btn_change .module-box[data-name=imgshake]').click();
                    break;
                //  团队摇一摇 A
                case 65:
                    $('#btn_change .module-box[data-name=groupshake]').click();
                    break;
                // 话题讨论 O
                case 79:
                    $('#btn_change .module-box[data-name=topic]').click();
                    break;
                // 开心答题 U
                case 85:
                    $('#btn_change .module-box[data-name=question]').click();
                    break;
                // 数钱 S
                case 83:
                    $('#btn_change .module-box[data-name=countmoney]').click();
                    break;
                // 抢红包 Q
                case 81:
                    $('#btn_change .module-box[data-name=grabbonus]').click();
                    break;
                // 弹幕 M
                case 77:
                    $('#btn_change .module-box[data-name=messagewalldanmu]').click();
                    break;
                // 开心摇奖机 J
                case 74:
                    $('#btn_change .module-box[data-name=slotmachine]').click();
                    break;
                // 摇红包 H
                case 72:
                    $('#btn_change .module-box[data-name=shakebonus]').click();
                    break;
                // 接接乐 L
                case 76:
                    $('#btn_change .module-box[data-name=happycatch]').click();
                    break;
                // 带球过人 3
                case 99:
                case 51:
                    $('#btn_change .module-box[data-name=dribbling]').click();
                    break;
                // 回家过年 4
                case 100:
                case 52:
                    $('#btn_change .module-box[data-name=celebrateTheNewYear]').click();
                    break;
                // 红包雨 5
                case 101:
                case 53:
                    $('#btn_change .module-box[data-name=grabBonusRain]').click();
                    break;
                // 极速前进 6
                case 102:
                case 54:
                    $('#btn_change .module-box[data-name=amazingrace]').click();
                    break;
                // 名单抽奖 7
                case 103:
                case 55:
                    $('#btn_change .module-box[data-name=numberlottery]').click();
                    break;
                // 口令红包 8
                case 104:
                case 56:
                    $('#btn_change .module-box[data-name=wordbonus]').click();
                    break;
            }
        }
    });

    //提交网络中断恢复日志
    var submitNetworkInterruptAndRecoveryLog = function (time) {
        $.extendPost(moduleCommon.httpURL + $('#url>#SubmitNetworkInterruptAndRecoveryLog').val(), {'time': time}, 'text', function () {
        }, function () {
            setTimeout(function () {
                submitNetworkInterruptAndRecoveryLog(time);
            }, 60000);
        });
    };

    //背景图显示大小
    var setBackgroundSize = function () {
        var scale = $(window).width() / $(window).height();
        if (scale < 1.7777) {
            $('body').css('background-size', 'auto 100%');
        } else {
            $('body').css('background-size', '100% auto');
        }
    };
    //初始化
    exports.init = function () {
        window.onload = function () {
            $('#loading').remove();
            /**
             * 鼠标拖拽二维码
             */
            var drag = document.getElementById('activityCode');
            //点击某物体时，用drag对象即可，move和up是全局区域，也就是整个文档通用，应该使用document对象而不是drag对象(否则，采用drag对象时物体只能往右方或下方移动)
            var isScale = false;
            // 给二维码块添加拖拽事件
            drag.getElementsByTagName('img')[0].onmousedown = function (event) {
                event.preventDefault();
                var e = event || window.event; //兼容ie浏览器
                var diffX = e.clientX - drag.offsetLeft; //鼠标点击物体那一刻相对于物体左侧边框的距离=点击时的位置相对于浏览器最左边的距离-物体左边框相对于浏览器最左边的距离
                var diffY = e.clientY - drag.offsetTop;
                if (typeof drag.setCapture !== 'undefined') {
                    drag.setCapture();
                }
                if (isScale) {
                    return;
                }
                document.onmousemove = function (ev) {
                    var e = ev || window.event; //兼容ie浏览器
                    var left = e.clientX - diffX;
                    var top = e.clientY - diffY;

                    //控制拖拽物体的范围只能在浏览器视窗内，不允许出现滚动条
                    if (left < 0) {
                        left = 0;
                    } else if (left > window.innerWidth - drag.offsetWidth) {
                        left = window.innerWidth - drag.offsetWidth;
                    }
                    if (top < 0) {
                        top = 0;
                    } else if (top > window.innerHeight - drag.offsetHeight) {
                        top = window.innerHeight - drag.offsetHeight;
                    }

                    //移动时重新得到物体的距离，解决拖动时出现晃动的现象
                    drag.style.left = left + 'px';
                    drag.style.top = top + 'px';
                };
                document.onmouseup = function (e) { //当鼠标弹起来的时候不再移动
                    this.onmousemove = null;
                    this.onmouseup = null; //预防鼠标弹起来后还会循环（即预防鼠标放上去的时候还会移动）
                    //修复低版本ie bug
                    if (typeof drag.releaseCapture !== 'undefined') {
                        drag.releaseCapture();
                    }
                };
            };
            // 获取二维码四个角dom
            var aSpan = drag.getElementsByTagName('span');
            for (var i = 0; i < aSpan.length; i++) {
                dragFn(aSpan[i]);
            }
            // 给四角添加拖拽事件
            function dragFn(obj) {
                obj.onmousedown = function (ev) {
                    isScale = true;
                    var oEv = ev || event;
                    var oldWidth = drag.offsetWidth;
                    var oldX = oEv.clientX;
                    var oldY = oEv.clientY;
                    var oldLeft = drag.offsetLeft;
                    var oldTop = drag.offsetTop;
                    document.onmousemove = function (ev) {
                        var oEv = ev || event;
                        if (obj.className === 'tl') {
                            drag.style.width = oldWidth - (oEv.clientX - oldX) + 'px';
                            drag.getElementsByTagName('img')[0].style.height = drag.style.width;
                            drag.style.height = oldWidth - (oEv.clientX - oldX) + $('#activityCode_txt').height() + 'px';
                            drag.style.left = oldLeft + (oEv.clientX - oldX) + 'px';
                            drag.style.top = oldTop + (oEv.clientY - oldY) + 'px';
                        } else if (obj.className === 'bl') {
                            drag.style.width = oldWidth - (oEv.clientX - oldX) + 'px';
                            drag.getElementsByTagName('img')[0].style.height = drag.style.width;
                            drag.style.height = oldWidth - (oEv.clientX - oldX) + $('#activityCode_txt').height() + 'px';
                            drag.style.left = oldLeft + (oEv.clientX - oldX) + 'px';
                            drag.style.bottom = oldTop + (oEv.clientY + oldY) + 'px';
                        } else if (obj.className === 'tr') {
                            drag.style.width = oldWidth + (oEv.clientX - oldX) + 'px';
                            drag.getElementsByTagName('img')[0].style.height = drag.style.width;
                            drag.style.height = oldWidth + (oEv.clientX - oldX) + $('#activityCode_txt').height() + 'px';
                            drag.style.right = oldLeft - (oEv.clientX - oldX) + 'px';
                            drag.style.top = oldTop + (oEv.clientY - oldY) + 'px';
                        } else if (obj.className === 'br') {
                            drag.style.width = oldWidth + (oEv.clientX - oldX) + 'px';
                            drag.getElementsByTagName('img')[0].style.height = drag.style.width;
                            drag.style.height = oldWidth + (oEv.clientX - oldX) + $('#activityCode_txt').height() + 'px';
                            drag.style.right = oldLeft - (oEv.clientX - oldX) + 'px';
                            drag.style.bottom = oldTop + (oEv.clientY + oldY) + 'px';
                        }
                    };

                    document.onmouseup = function () {
                        document.onmousemove = null;
                        isScale = false;
                    };
                    return false;
                };
            }
        };
        if ($('#wall_zz').size() < 1) {  //如果是拼图背景就不根据窗口大小设置背景图大小
            setBackgroundSize();
            $(window).resize(function () {
                setBackgroundSize();
            });
        }

        var isChrome = window.navigator.userAgent.indexOf("Chrome") !== -1;
        if (!isChrome) {
            $("body").prepend('<div id="nohtml5"><div>由于您正在使用非chrome浏览器,大屏幕的体验处于不佳状态,建议您立刻更换浏览器,以获得更好的大屏幕产品用户体验。<br/>下载浏览器:<a href="http://www.chromeliulanqi.com/" target="blank"><img src=" ' + $('#config>#FileWebHost').val() + '/ScreenTheme/default/images/chrome.jpg"> chrome浏览器</a></div></div>');
        }

        //模拟select
        $('.select>div').click(function (event) {
            var $this = $(this).parent();
            var ul = $this.find('ul');
            event.stopPropagation();
            if (!$this.parent().hasClass('disabled')) {
                ul.slideUp();
                if (ul.css("display") == "none") {
                    ul.slideDown("fast");
                }
                else {
                    ul.slideUp();
                }
            }
        });
        //选择奖品
        $('body').on('click', '.select-prize li', function () {
            var $this = $(this);
            var selected = $this.parent().prev();
            var selectNumber = $this.parents('.module').find('.select-number');
            selected.html($this.data('name')).attr({
                "data-prizeid": $this.data("prizeid"),
                "data-amount": $this.attr("data-amount"),
                'data-prizename': $this.data("prizename"),
                'data-awardname': $this.data("name"),
            });
            var _num = $this.data("amount");
            selectNumber.find(".newNumber").remove();
            if ($this.parents('.module').attr('id') != 'numberlottery') {
                if ($this.parents('.module').attr('id') != 'slotmachine') {
                    selectNumber.find('.selected').html(_num).attr('data-amount', _num);
                    if (_num > 10) {
                        $this.parents('.module').find('.select-number').find('ul').append('<li data-amount="' + _num + '"class="newNumber">' + _num + '</li>');
                    }
                } else {
                    _num = Math.min(10, _num);
                    selectNumber.find('.selected').html(_num).attr('data-amount', _num);
                }
                selectNumber.find('li').each(function (index, element) {
                    if ($(this).data("amount") > _num) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            }
        });
        //选择数量
        $('body').on('click', '.select-number li', function () {
            var $this = $(this);
            var selected = $this.parent().prev();
            selected.html($this.attr('data-amount')).attr({
                "data-amount": $this.attr('data-amount')
            });
        });
        //隐藏select
        $(document).on("click", function () {
            $('.select ul').slideUp();
        });

        //获取屏幕配置
        getScreenSetting();
        var menuCurrIndex = 0;
        var menuLength = 0;
        //绑定开启活动按钮的点击事件
        $('#index>#code>a.clickBtn').on('click', function () {
            //移除活动准备开始界面
            $('#btnBox').show();
            $("#index").remove();
            menuLength = $('#btn_change .module-box').length;
            $('.moduleBtn').remove();
            // 如果选择的功能比较多，则使用上下键切换
            $(document).on('click', '.handle-box .icon-prev', function () {
                if (menuCurrIndex < 1) {
                    moduleCommon.showInfo('没有更多功能了！')
                } else {
                    menuCurrIndex -= 1;
                    $('#menu-box').animate({
                        'margin-top': -(60 * menuCurrIndex) + 'px'
                    }, 200)
                }
            });
            $(document).on('click', '.handle-box .icon-next', function () {
                if (menuCurrIndex >= Math.ceil(menuLength / 10) - 1) {
                    moduleCommon.showInfo('没有更多功能了！')
                } else {
                    menuCurrIndex += 1;
                    $('#menu-box').animate({
                        'margin-top': -(60 * menuCurrIndex) + 'px'
                    }, 200)
                }
            })
            //绑定模块操作按钮点击事件
            $('#btn_change .module-box').on('click', function () {
                var $this = $(this);
                // 为了全屏化
                $('#logo').show();
                $('#top_notice').show();
                $('#top_code').show();
                $('#joinCount').show();
                $('.copyright').show();
                $('#btnBox .module-box[data-name="threedwall"]').off('click');
                //触发当前激活模块变化事件
                $('body').triggerHandler('modulechange', [$this.data('name')]);
            });
            //绑定模块操作按钮点击事件
            $('#otherMenu .module-box.btn_qrcode').on('click', function () {
                if ($('#activityCode').css('display') === 'none') {
                    $('#activityCode').show();
                } else {
                    $('#activityCode').hide();
                }
            });
            $('#btnBox .module-box[data-name="threedwall"] i').on('click', function (e) {
                e.stopPropagation();
                window.open('/' + $('#KXDScreen_Id').val() + '/Home/Wall/');
            });

            setInterval(function () {
                var $img = $('<img />');
                $img.attr({
                    'src': 'https://www.baidu.com/img/bdlogo.gif?_r=' + Math.random(),
                    'id': 'testConnectionStatus'
                }).css('display', 'none');
                $img.on('load', function () {
                    $('#NetworkStatus i').html('&#xe67f;');
                    var time = localStorage.getItem('networkInterruptTime');
                    if (time) {
                        submitNetworkInterruptAndRecoveryLog(time);
                        localStorage.removeItem('networkInterruptTime');
                    }
                }).on('error', function () {
                    $('#NetworkStatus i').html('&#xe680;');
                    var time = localStorage.getItem('networkInterruptTime');
                    if (!time) {
                        var now = new Date();
                        localStorage.setItem('networkInterruptTime', now.getFullYear() + '-' + moduleCommon.fillZero(now.getMonth() + 1, 2) + '-' + moduleCommon.fillZero(now.getDate(), 2) + ' ' + moduleCommon.fillZero(now.getHours(), 2) + ':' + moduleCommon.fillZero(now.getMinutes(), 2) + ':' + moduleCommon.fillZero(now.getSeconds(), 2));
                    }
                });
            }, 5000);
            //隐藏按钮
            $(document).on('click', '#hideBtn', function () {
                if ($(this).hasClass('btn_hidden')) {
                    $(this).addClass('ps-f');
                    $(this).find('i').html('&#xe62d;');
                    $('#btnBox').animate({'right': -$('#btnBox').width() + 75});
                    $(this).removeClass('btn_hidden');
                } else {
                    $(this).removeClass('ps-f');
                    $('#btnBox').animate({'right': 0});
                    $(this).addClass('btn_hidden');
                    $(this).find('i').html('&#xe62c;');
                }
            });
            //绑定全屏按钮点击事件
            var fullscreen = false;
            $(document).on('click', '#btnBox .module-box.btn_fullscreen', function () {
                if (!fullscreen) {
                    var docElm = document.documentElement;
                    if (docElm.requestFullscreen) {
                        docElm.requestFullscreen();
                    }
                    else if (docElm.msRequestFullscreen) {
                        docElm.msRequestFullscreen();
                    }
                    else if (docElm.mozRequestFullScreen) {
                        docElm.mozRequestFullScreen();
                    }
                    else if (docElm.webkitRequestFullScreen) {
                        docElm.webkitRequestFullScreen();
                    }
                    fullscreen = true;
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    }
                    else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    }
                    else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    }
                    else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                    fullscreen = false;
                }
            });

            //点击二维码小图
            $('#top_code').on('click', function () {
                if ($('#activityCode').css('display') === 'none') {
                    $('#activityCode').show();
                } else {
                    $('#activityCode').hide();
                }
            });

            //显示操作按钮
            $('#btn_change').show();
            //在body上触发active事件
            $('body').triggerHandler('active');
            $('body').triggerHandler('modulechange', [$('#btnBox .module-box:not(.btn_fullscreen):eq(0)').data('name')]);
        });

        $('body').on('modulechange', function (e, moduleName) {
            if ($('#hideBtn').hasClass('btn_hidden')) {
                $('#hideBtn').click();
            }
            //针对功能
            for (var i = 0; i < $('div.full-module').length; i++) {
                if (moduleName === $($('div.full-module')[i]).data('modulename')) {
                    // 全屏化皮肤
                    $('#logo').hide();
                    $('#top_notice').hide();
                    $('#top_code').hide();
                    $('#joinCount').hide();
                    $('.copyright').hide();
                }
            }
        });
    };
});
