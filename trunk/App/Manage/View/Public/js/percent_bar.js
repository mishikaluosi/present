$(function(){
    $('.scale_panel').click(function(e) {
        var tag = false,ox = 0;
        var _box = $(this);
        var bgleft = _box.find('.scale').offset().left;
        var left = e.pageX - bgleft;
        _box.find('.btn').mousedown(function(e) {
            ox = e.pageX - left;
            console.log(ox);
            tag = true;
        });
        $(document).mouseup(function() {
            tag = false;
        });
        $(document).mousemove(function(e) {//鼠标移动
           if(tag){
               left = e.pageX - ox;
                console.log(left);
                if ( left <= 0) {
                    left = 0;
                }else if (left > 200) {
                    left = 200;
                }
                _box.find('.btn').css('left', left-10);
                _box.find('.div').width(left);
                _box.prev().val(parseInt((left/200)*100));
           }
        });
        _box.find('.scale').mousedown(function(e) {//鼠标点击
            if (!tag) {
                bgleft = _box.find('.scale').offset().left;
                left = e.pageX - bgleft;
                if (left <= 0) {
                    left = 0;
                }else if (left > 200) {
                    left = 200;
                }
                _box.find('.btn').css('left', left-10);
                _box.find('.div').width(left);
                _box.prev().val(parseInt((left/200)*100));
            }
        });
    })
});
