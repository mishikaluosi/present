//删除左右两端的空格
function trim(str){ 
    return str.replace(/(^\s*)|(\s*$)/g, "");
}
//转跳网址
function goUrl(url) {
    if (!url) {
        return false;
    }
    location.href  = url;
}
//添加
function add(url) {
    if (!url) {
        return false;
    }
    location.href  = url;
}

//删除
function del(url) {
    if (!url) {
        alert('请选择删除项！');
        return false;
    }
    if (window.confirm('确实要永久删除选择项吗？')){
        location.href  = url;
    }
    
}
//批量删除
function delAll(){
    //if 没有被选中的checkbox
    if (!getCheckboxNum()){
        alert('请选择项！');
        return false;
    }
    if (window.confirm('确实要永久删除选择项吗？')){
        document.getElementById("form_do").submit(); 
    }
      

}

//批量确认通用
function doConfirmBatch(url, str){
    //if 没有被选中的checkbox
    if (!getCheckboxNum()){
        alert('请选择项！');
        return false;
    }
    if (window.confirm(str)){
        var form_do = document.getElementById("form_do"); 
        form_do.action = url;
        form_do.submit(); 
    }
      

}

//批量通用(无确认)
function doGoBatch(url, str){
    //if 没有被选中的checkbox
    if (!getCheckboxNum()){
        alert('请选择项！');
        return false;
    }
    var form_do = document.getElementById("form_do"); 
    form_do.action = url;
    form_do.submit();       

}

//全部确认通用
function doConfirmAll(url, str){

    if (window.confirm(str)){
        var form_do = document.getElementById("form_do"); 
        form_do.action = url;
        form_do.submit(); 
    }
      

}

//直接提交
function doGoSubmit(url, formid){
    if (formid.length == 0) {
        alert('formid empty！');
        return false;
    }
    var form_do = document.getElementById(formid); 
    form_do.action = url;
    form_do.submit();       

}



//批量通过审核
function toGetSubmit(url, mode, depr){
    var keyValue = getCheckValues();
    if (depr == '') {
        depr = '/';
    }
    if (!keyValue){
        alert('请选择项！');
        return false;
    }

    if (mode == 0) {
        location.href = url+"&key="+keyValue;
    }else {
        location.href = url+depr+"key"+depr+keyValue;
    }       
    
}

//确认,跳转网址
function toConfirm(url, str){

    if (window.confirm(str)){
        location.href = url;
    }
      

}


//获取Checkbox被选择个数
function getCheckboxNum(){
   var checkbox = document.getElementsByName("key[]");
   var j = 0; // 用户选中的选项个数
   for(var i=0;i<checkbox.length;i++){
      if(checkbox[i].checked){
          j++;
      }
   }
   return j;

}
//设置Checkbox状态
function setCheckbox(flag){
    flag = flag? true : false;
    var checkbox = document.getElementsByName("key[]");
    for(var i=0;i<checkbox.length;i++){
        if (!checkbox[i].disabled) {        
            checkbox[i].checked = flag;
        }
    }

}

function getCheckValues(){
	var obj = document.getElementsByName('key[]');
	var result ='';
	var j= 0;
	for (var i=0;i<obj.length;i++){
            if (obj[i].checked===true){
                result += obj[i].value+",";
                j++;
            }
	}
	return result.substring(0, result.length-1);
}


function switchTab(name,sclass,cnt,cur){
        for(i=1;i<=cnt;i++){
            if(i==cur){
                 $('#div_'+name+'_'+i).show();
                 $('#tab_'+name+'_'+i).addClass(sclass);
            }else{
                 $('#div_'+name+'_'+i).hide();
                 $('#tab_'+name+'_'+i).removeClass(sclass);
            }
        }
    }


$(function(){
    //选中列表行变色
    $(".list tr").mouseover(function(){
        $(this).addClass("currow");
    }).mouseout(function(){
        $(this).removeClass("currow");
    });
    //全选/取消
    $("#check").click(function(){
        if($(this).attr("checked")=="checked"){
            setCheckbox(true);
        }else{
            setCheckbox(false);
        }

    });
    
       /*刘纯纯*/
	 $(".content2 ul li a").each(function(){
		 $(this).children("img:eq(1)").hide();
		 })
	 $(".content2 ul li a").hover(function(){
		  $(this).children("img:eq(1)").show();
		  $(this).children("img:eq(0)").hide();
		  $(this).children("span").css("color","#24a0f1")
		 },function(){
          $(this).children("img:eq(1)").hide();
		 $(this).children("img:eq(0)").show();
		 $(this).children("span").css("color","#2b323b")
	 })	


	 
	 $("table tbody tr th:eq(0),table tbody tr th:eq(1)").each(function(index, element) {
        $(this).css("width","40px")
     });
	 $("table tbody tr td:eq(0),table tbody tr td:eq(1)").each(function(index, element) {
        $(this).css("width","40px")
    });
      $(".guestbook tr th:eq(1)").each(function(index, element) {
        $(this).css("width","100px")
     });
	
	 $(".guestbook tr td:last-child").each(function(index, element) {
        $(this).css("text-align","center")
    });
	$(".form dl:first").css("background","#f7f7f7")
	$(".form dl.none").css("background","none")
	$(".list_new").each(function(index, element) {
        $(this).children(".tab_bottom:first").addClass("block")
    });
	
	
	$(".list_new .tab a").click(function(){
		var s=$(this).index();
		$(this).closest(".list_new").children(".tab_bottom:eq("+s+")").addClass("block").siblings(".tab_bottom").removeClass("block")
	})
	$(".form dl.xs dd").click(function(){
		$(".form dl.yc").toggle()
		})
	 if($("#picture_show").find(".picture_item"))
	 {
		 $("#picture_show").css("border-top","none")
	
     }
	 else{
		   $("#picture_show").css("border-top","1px dashed #ddd")
	 }
	 
	 $(".list0 table tr").each(function() {
	     $(this).children("td:eq(2)").css("text-align","left")
	 })
	 $(".list0 table tr").each(function() {
	     $(this).children("td:eq(2)").css("width","300px")
	 })
	 $(".list0 table tr").each(function() {
          var i= $(this).attr("level")
		 $(this).children("td:eq(2)").children(".jt").css("display","none")
	      if(i==1){
			 $(this).children("td:eq(2)").addClass("one")
			 /*if($(this).next().attr("level")==2){	}
			 else{ $(this).children("td:eq(2)").children(".jt").css("display","none") }*/
		  }else if(i==2){
			    /* $(this).css("display","none")*/
				 $(this).children("td:eq(2)").addClass("two")
				/*  if($(this).next().attr("level")==3){}
				  else{$(this).children("td:eq(2)").children(".jt").css("display","none")}*/
		  }else{
			  /*  $(this).css("display","none")*/
			/*	$(".list0 table tr:first").show()*/
			    $(this).children("td:eq(2)").addClass("three")
			  /*  if($(this).next().attr("level")==4){}
			    else{$(this).children("td:eq(2)").children(".jt").css("display","none")}*/
		 }
		  
	})

//	$(".jt").click(function(){
//			   var s=$(this).closest("tr").attr("id");
//		       $(".list0 table tr").each(function() {  
//			       var cid=$(this).attr('cid')
//                  if(==s)
//				  {$(this).toggle()}
//			   })
//		   
//	})
	
    //tap_list("list_new1",1);/*产品详细介绍*/
//tap_list("list_new2",1);/*产品详细介绍*/

/*function tap_list(div,type){
	//1:click   2:hover
	var type_mouse=type;
	if(type_mouse==1){
		$("."+div+" .tab a").click(function(){
			var this_num =$(this).index();
			$(this).addClass("selected").siblings("li").removeClass("selected");
			$("."+div+" .tab_bottom:eq("+this_num+")").addClass("block").siblings(".tab_bottom").removeClass("block");
		})
	}
}*/
	
	
});



