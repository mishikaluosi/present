var personArray = new Array;
// 获取用户列表 用户数量 未中奖用户数量 该奖项已中奖数量
var e_id = $("#e_id").val();
var get_member_url = $("#get_member_url").val()+'&e_id='+e_id;
$.ajaxSettings.async = false;
$.get(get_member_url,function(ret){
    personArray = ret.event_members;
    $("#member_count").text(ret.member_count);
    $("#event_members_left").val(ret.event_members_left);
},'json');
$.ajaxSettings.async = true;
