	$(function(){

		//快捷菜单
		//bindQuickMenu();

		//菜单切换(测试)
		bindAdminMenu();
		ChangeNav("left_menu_0");

		//菜单开关
		//LeftMenuToggle();

		//全部功能开关
		//AllMenuToggle();

		//取消菜单链接虚线
		$(".head").find("a").click(function(){$(this).blur()});
		$(".menu").find("a").click(function(){$(this).blur()});


	}).keydown(function(event){//快捷键
		if(event.keyCode ==116 ){
			url = $("#main").attr("src");
			main.location.href = url;
			return false;
		}
		if(event.keyCode ==27 ){
			$("#qucikmenu").slideToggle("fast")
		}
	});

	function bindQuickMenu(){//快捷菜单
		$("#ac_qucikmenu").bind("mouseenter",function(){
			$("#qucikmenu").slideDown("fast");
		}).dblclick(function(){
			$("#qucikmenu").slideToggle("fast");
		}).bind("mouseleave",function(){
			hidequcikmenu=setTimeout('$("#qucikmenu").slideUp("fast");',700);
			$(this).bind("mouseenter",function(){clearTimeout(hidequcikmenu);});
		});
		$("#qucikmenu").bind("mouseleave",function(){
			hidequcikmenu=setTimeout('$("#qucikmenu").slideUp("fast");',700);
			$(this).bind("mouseenter",function(){clearTimeout(hidequcikmenu);});
		}).find("a").click(function(){
			$(this).blur();
			$("#qucikmenu").slideUp("fast");
			$("#ac_qucikmenu").text($(this).text());
		});
	}


	function bindAdminMenu(){
		$("#nav").find("a").click(function(){
			if ($(this).attr("_for") == 'left_menu_1') {
				if ($.cookie('devmod') == 1) {
					ChangeNav($(this).attr("_for"));
				} else {
					$("#natsu").show();
				}
			} else {
				ChangeNav($(this).attr("_for"));
			}
			//$('#main').get(0).src = $(this).attr("href");
		});

		/*$("#menu").find("dt").click(function(){
			dt = $(this);
			dd = $(this).next("dd");
			if(dd.css("display")=="none"){
				dd.slideDown("fast");
				dt.css("background-position","right 10px");
			}else{
				dd.slideUp("fast");
				dt.css("background-position","right -40px");
			}
		});*/
		
		//动态元素添加的也能触发
		$('#menu dd ul').on('click',"li a",function(){
			$(this).addClass("thisclass").blur().parents("#menu").find("ul li a").not($(this)).removeClass("thisclass");
			//alert(this.id)
			$('[ name = leftlist ]').hide();
			var id = this.id;
			$('#left_list_'+id).show();
			$('#all_'+id).addClass("thisclass").blur().parents("#menu1").find("ul li a").not($('#all_'+id)).removeClass("thisclass");
			var s=$(".right02 #left_list_"+id).children("dd").children("ul").children("li").html();
			if( s==null)
			{
				$(".close").css("display","none");
				$(".open").css("display","none");
				$(".right02").css({"display":"none","width":"0"});
				$(".right").css("left","170px");
			}
			else{
				$(".right02").css({"display":"block","width":"155px"});
				$(".right").css("left","325px");
				$(".open").css("display","block");
			}
			
		}); 
		
		//动态二级元素添加的也能触发
		

	}

	function ChangeNav(nav){//菜单跳转
		$("#nav").find("a").removeClass("thisclass");
		$("#nav").find("a[_for='"+nav+"']").addClass("thisclass");//.blur();
		$("body").attr("class","showmenu");
		$("#menu").find("div[id^=items]").hide();
		$("#menu").find("#items_"+nav).show().find("ul li a").removeClass("thisclass");//.blur();  .find("dl dd").show()
	}

	function LeftMenuToggle(){
		/*$("#togglemenu").click(function(){
			if($("body").attr("class")=="showmenu"){
				$("body").attr("class","hidemenu");
				$(this).html("显示菜单");
			}else{
				$("body").attr("class","showmenu");
				$(this).html("隐藏菜单");
			}
		});*/
	}


	function AllMenuToggle(){
		mask = $(".pagemask,.iframemask,.allmenu");
		$("#allmenu").click(function(){
				mask.show();
		});
		//mask.mousedown(function(){alert("123");});
		mask.click(function(){mask.hide();});
	}
	
	
	/*修改-刘纯纯 2015-11-04*/
		$(function(){
			
				var s=$.trim($(".open01 a").text())
				var s1="静态缓存开"
				if(s==s1)
				{
				$(".open01").addClass("open02")
				}
				else{
				 $(".open01").removeClass("open02")
				}
				
			
			  $(".open01 a").click(function(){
				  var s=$.trim($(this).text())
				  var s1="静态缓存开"
				  if(s==s1)
				  {
					$(this).parent().addClass("open02")
				  }
		          else{
					 $(this).parent().removeClass("open02")
				   }
	
				  })
				  
				  $("#menu_1 a  b").click(function(){
					  $(this).parent("a").css("color","#49ff01")
					  
					  })
					   $("#devin").click(function(){
					  $("#menu_1 a").css("color","#49ff01")
					  
					  })
					   $("#menu_0 a  b").click(function(){
					      $("#menu_1 a").css("color","#FFF")
					  
					  })
					  $(".nav li:first") .click(function(){
					      $("#menu_1 a").css("color","#FFF")
					  
					  })
			  $(".menu02 dl:first").addClass("a1").children("dd").css("display","block");
			  $(".menu02 dl:first").children("dt").addClass("hover");
			  $(".menu02 dl").not(".a1").children("dd").hide();
			  $(".menu02 dl dt ").click(function(){
				  $(this).next("dd").toggle();
				  $(this).toggleClass("hover");
				  $(this).parent('dl').siblings('dl').children("dd").hide(200);
				  $(this).parent('dl').siblings('dl').children("dt").removeClass("hover");
		       })
			   $(".open").click(function(){
				   $(".right02").css({"display":"none","width":"0"});
					$(".right").css("left","170px");
					$(this).hide();
					$(".close").show();
					body_w2();
			   })
			   $(".close").click(function(){
				   $('.right02').css({"display":"block","width":"155px"});
					$(".right").css("left","325px")
					$(this).hide();
					$(".open").show();
					body_w2();
				})
			$(".menu02 dl:eq(1) dt").addClass("a2");
			$(".menu02 dl:eq(2) dt").addClass("a3");
			$(".menu02 dl:eq(3) dt").addClass("a4");
			$("#dl_items_1_1 dd").css("display","block");
			$(".top_link ul li.i_self").hover(function(){
				$(this).toggleClass("hover");
			})
		    $(".i_hide_menu").hover(function(){
			    $(this).children(".tu").toggle();
		    })
           $(".nav li:last-child").children("a").css("background","none");
	    })
		
		
		 $(function(){
             body_w2();//默认加载
             $(window).resize(function(){
                  body_w2();
             })
         })
		 function body_w(num){
			   var s=$(window).width();
		       var left=$(".left").width();
			    var right02=$(".right02").width();
			   if(s<=1005){
				    var right=1005-left-15-num;
			    }
				else{
		           var right=s-left-15-num;
				}
		       $(".right").css("width",right);
	     }
		 function body_w2(){
			   var s=$(window).width();
		       var left=$(".left").width();
			   var right02=$(".right02").width();
			   if(s<=1005){
				    var right=1005-left-15-right02;
			    }
				else{
		           var right=s-left-15-right02;
				}
		       $(".right").css("width",right);
	     }
		function sidebar(){
			$('#menu1 dd ul li a').click(function(){
				$(this).toggleClass("thisclass").blur().parents("#menu1").find("ul li a").not($(this)).removeClass("thisclass");
			})
			$('#menu1 dd ul ul li a').click(function(){			
				$(this).parent("li").parent(".ulul").prev(".bb").children("a").addClass("thisclass");
				$(this).parent("li").parent(".ulul").prev(".bb").css("background","#eaedf1")
			})
			$("#menu1 dd ul").children("ul").addClass("ulul");
			$('#menu1 dd').each(function(){
				$(this).children("ul").children("li:eq(0)").addClass("aa");
				})
			$('#menu1 dd ul li').each(function() { 
			      $(this).next(".ulul").prev("li").addClass("bb");
				 // $(this).children("a").removeAttr("href");
            });
			$('#menu1 dd ul li.bb').click(function(){
				$(this).next(".ulul").toggleClass("bbbb");
				$(this).siblings("li").next(".ulul").removeClass("bbbb");
				})
			$('#menu1 dd ul li').click(function(){
				$(this).siblings("li").next(".ulul").removeClass("bbbb");
				})
			$(".sidebar_left li").click(function(){
				var idname=$(this).children("a").attr("id");
				if($("#left_list_"+idname).children("dd").children("ul").children("li").html()==null){
					body_w("0");
				}else{
					body_w("155");
				}
			})
		}
       /*修改-刘纯纯 2015-11-04*/
