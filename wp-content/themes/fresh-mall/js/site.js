// Add
$(document).ready(function(){
	$(".nine_box li:nth-child(3n+4)").css("marginLeft",0);
	$(".nine_box").find("li:first").css("marginLeft",0);
	$(".maybe_like").find("li:first").css("marginLeft",0);
	$(".box_cont .box_ul").find("li:first").addClass("first");
});

//Menu
$(document).ready(function(){
	$(".menu li").hover(function(){
	$(this).find('.sub-menu').css("display","block");	
	$(this).find('.sub-menu').find('.sub-menu').css("display","none");
	},function(){
	$(this).find('.sub-menu').css("display","none");
	});
});

// Tip
$(document).ready(function(){
	$(".box_ul li a,.sidebox li a").aToolTip();
});

// Thumbnail
$(document).ready(function(){
	$(".list_img_two li, .list_img_five li").find("a").animate({opacity:0.8});
	$(".list_img_two li, .list_img_five li").hover(function(){
		$(this).find("a").animate({top:0,opacity:0.8},{queue:false,duration:250});
	},function(){
		$(this).find("a").animate({top:232,opacity:0.8},{queue:false,duration:250});
	});
});

$(document).ready(function(){
	$(".list_img_seven li").find("a").animate({opacity:0.65});
	$(".list_img_seven li").hover(function(){
		$(this).find("a").animate({top:0,opacity:0.65},{queue:false,duration:350});
	},function(){
		$(this).find("a").animate({top:300,opacity:0.65},{queue:false,duration:350});
	});
});


jQuery(function($){

$('#sysmenus li').hover(function(){
$(this).find('.topdmenu').slideDown(200);
$(this).find('.topothermenu').addClass('topmenuover');
$(this).find('.topusername').addClass('topmenuover');
$('#topdmenu1').width($(this).innerWidth()-2);
},function(){
$(this).find('.topdmenu').hide();
$(this).find('.topothermenu').removeClass('topmenuover');
$(this).find('.topusername').removeClass('topmenuover');
});
if($("#unlogin-alterbartop").length==1) {
setTimeout("$('#unlogin-alterbartop').slideDown()",1000);
}
if($("#firstload").length == 1)
{
if($("#firstload").css("display") == "block")
{
setTimeout("$('#firstload').hide();$('#body').show();$('#firstfastbox').hide();",300);

}
}
//top_fix
$(window).scroll(function(){
if($(this).scrollTop()>61){
$('.nav_bar').addClass('topfixed');
} 
else 
{
$('.nav_bar').removeClass('topfixed');
}

if ($(document.documentElement).scrollTop() > 0 || $(document.body).scrollTop() > 0) {
            $("#backtotop").show();
            $("#backtotop").die().live("click",
            function() {
                $("body,html").animate({
                    scrollTop: 0
                },
                500)
            })
        } else {
            $("#backtotop").hide()
        }
});
});

jQuery(document).ready(function($){
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');//修复Opera滑动异常地，加过就不需要重复加了。
$('#shang').mouseover(function(){//鼠标移到id=shang元素上触发事件
        up();
    }).mouseout(function(){//鼠标移出事件
        clearTimeout(fq);
    }).click(function(){//点击事件
        $body.animate({scrollTop:0},400);//400毫秒滑动到顶部
});
$('#xia').mouseover(function(){
        dn();
    }).mouseout(function(){
        clearTimeout(fq);
    }).click(function(){
        $body.animate({scrollTop:$(document).height()},400);//直接取得页面高度，不再是手动指定页尾ID
});
$('#comt').click(function(){
    $body.animate({scrollTop:$('#comments').offset().top},400);//滑动到id=comments元素，遇到不规范的主题需调整
});
}); 
//下面部分放jQuery外围，几个数值不妨自行改变试试
function up(){
   $wd = $(window);
   $wd.scrollTop($wd.scrollTop() - 1);
   fq = setTimeout("up()", 50);
}
function dn(){
   $wd = $(window);
   $wd.scrollTop($wd.scrollTop() + 1);
   fq = setTimeout("dn()", 50);
} 


