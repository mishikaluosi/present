$(function(){
    $('.scale_panel').click(setBar);
    $("#add_draw").click(function(){
        var dom = $(".empty_form").clone().removeClass("empty_form").show();
        var award_tip = parseInt($(".form_box").find(".form:last").find('.award_tip').text());
        if(isNaN(award_tip)){
            award_tip =1;
        }else{
            award_tip=award_tip+1;
        }
        dom.find('.award_tip').text(award_tip)
        $(".form_box").append(dom);
        $('.scale_panel').click(setBar);
        $('.del_form').bind("click",deleteFrom);
    })
    $('.del_form').click(deleteFrom);
});
function setBar(e) {
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
}
function deleteFrom(){
    if($(".form_box .form").length==1){
        alert("最后一个奖项不能删除");
        return false;
    }
    var form = $(this).parents(".form");
    var draw_id = parseInt(form.attr("alt"));
    form.remove();
    $(".form_box .form").each(function(i){
        var key = i+1;
        $(this).find('.award_tip').text(key);
    })
    if(draw_id>0){
        // 执行删除操作
    }
}
