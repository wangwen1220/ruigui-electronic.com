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
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');//�޸�Opera�����쳣�أ��ӹ��Ͳ���Ҫ�ظ����ˡ�
$('#shang').mouseover(function(){//����Ƶ�id=shangԪ���ϴ����¼�
        up();
    }).mouseout(function(){//����Ƴ��¼�
        clearTimeout(fq);
    }).click(function(){//����¼�
        $body.animate({scrollTop:0},400);//400���뻬��������
});
$('#xia').mouseover(function(){
        dn();
    }).mouseout(function(){
        clearTimeout(fq);
    }).click(function(){
        $body.animate({scrollTop:$(document).height()},400);//ֱ��ȡ��ҳ��߶ȣ��������ֶ�ָ��ҳβID
});
$('#comt').click(function(){
    $body.animate({scrollTop:$('#comments').offset().top},400);//������id=commentsԪ�أ��������淶�����������
});
}); 
//���沿�ַ�jQuery��Χ��������ֵ�������иı�����
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


