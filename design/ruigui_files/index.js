$(function(){
	var img = $("ul.banner_list li");
    var len  = img.length;
	var index = 0;
	var adTimer;
	//添加按钮
	for(var i = 1; i<=img.length; i++){
		$("ol.btn").append('<li></li>');
	}
	$("ol.btn b").eq(0).addClass("cur");
	
	$("ol.btn li").mouseover(function(){
		index  =   $(this).index();
		showImg(index);
	}).eq(0).mouseover();	
	//滑入 停止动画，滑出开始动画.
	$('div.banner').hover(function(){
		$(".btn2").fadeIn();
		clearInterval(adTimer);
	},function(){
		$(".btn2").fadeOut();
		adTimer = setInterval(function(){	
			index++;
			if(index==len){index=0;}
			showImg(index);
		} , 3000);
	}).trigger("mouseleave");
	//下一个
	$(".next").click(function(){
		index = $(".cur").index() + 1;
		if(index==len){index=0;}
		showImg(index);
	});
	//上一个
	$(".prev").click(function(){
		index = $(".cur").index() - 1;
		if(index==len){index=0;}
		showImg(index);
	});
})
// 通过控制top ，来显示不同的幻灯片
function showImg(index){
	var w = $("div.banner").width();
	$(".banner_list li").eq(index).fadeIn().siblings().fadeOut();
	$(".btn li").removeClass("cur").eq(index).addClass("cur");
}