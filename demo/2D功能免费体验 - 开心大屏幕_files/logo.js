define(function (require, exports, module) {
    //初始化
    exports.init = function () {
        if ($('#isContainLogo').val() == 1) {
            $('#logo').hide();
        }
        if ($('#config>#LogoFilePath').val() != '')
            $('#logo').show().attr('src', $('#config>#LogoFilePath').val());
    };
});