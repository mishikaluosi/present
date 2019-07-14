var is_double = false;
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
    $('#submit').click(saveDraw);
});
function setBar(e) {
    var tag = false,ox = 0;
    var _box = $(this);
    var bgleft = _box.find('.scale').offset().left;
    var left = e.pageX - bgleft;
    _box.find('.btn').mousedown(function(e) {
        ox = e.pageX - left;
        tag = true;
    });
    $(document).mouseup(function() {
        tag = false;
    });
    $(document).mousemove(function(e) {//鼠标移动
        if(tag){
            left = e.pageX - ox;
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
        var del_url = $('#del_url').val()
        $.post(del_url,{id:draw_id},function(ret){
            if(ret.status!=1){
                alert(ret.info);
                return false;
            }
        },'json')
    }
}
function saveDraw(){
    var e_id = $('#e_id').val();
    var draw_data = new Array();
    var tip = "";
    var check_pass = true;
    $(".form_box .form input[type=text],.form_box .form input[type=number],.form_box .form select").css("background", "transparent")
    $('.form_box').find(".form").each(function(){
        var _tmp =new Object();
        _tmp.id =parseInt($(this).attr("alt"));
        _tmp.draw_level =$(this).find(".draw_level").val();
        _tmp.award_id =$(this).find(".draw_award").val();
        _tmp.draw_num =parseInt($(this).find(".draw_num").val());
        _tmp.draw_percent =parseInt($(this).find(".draw_percent").val());
        if(!_tmp.draw_level){
            $(this).find('.draw_level').css('background','red');
            tip = "请填写奖项等级";
            check_pass = false;
            return false;
        }
        if(isNaN(_tmp.award_id) || _tmp.award_id <= 0){
            $(this).find('.draw_award').css('background','red');
            tip = "请选择奖品";
            check_pass = false;
            return false;
        }
        if(isNaN(_tmp.draw_num) || _tmp.draw_num <= 0){
            $(this).find('.draw_num').css('background','red');
            tip = "请填写奖品数量";
            check_pass = false;
            return false;
        }
        if(isNaN(_tmp.draw_percent) || _tmp.draw_percent < 0){
            $(this).find('.draw_percent').css('background','red');
            tip = "请填写中奖率";
            check_pass = false;
            return false;
        }
        draw_data.push(_tmp)
    });
    if(!check_pass){
        alert(tip);
        return false;
    }
    if(draw_data.length<=0){
        alert("请添加奖项");
        return false;
    }
    if(!is_double){
        is_double = true;
        var url = $('#save_url').val();
        $.post(url,{e_id:e_id,draw_data:draw_data},function(ret){
            is_double = false;
            if(ret.status!=1){
                alert(ret.info);
                is_double = false;
                return false;
            }
            location.reload();
        },'json')
    }

}
