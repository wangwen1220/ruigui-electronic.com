/*-----------------------------------------------------------------------------------*/
//	Common
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(){

		//image hover
		image_hover();

		//prettyPhoto
		prettyPhoto();

		//home slider
		home_slider();

		//single slider
		single_slider();

		//External links
		jQuery('a[rel*=external]').click( function() {
			window.open(this.href);
			return false;
		});

		//Placeholder
		jQuery('[placeholder]').focus(function() {
		  var input = jQuery(this);
		  if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		  }
		}).blur(function() {
		  var input = jQuery(this);
		  if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		  }
		}).blur();
		jQuery('[placeholder]').parents('form').submit(function() {
		  jQuery(this).find('[placeholder]').each(function() {
			var input = jQuery(this);
			if (input.val() == input.attr('placeholder')) {
			  input.val('');
			}
		  })
		});

		//Go Top
		jQuery('.sc-gotop a').click(function(){
			jQuery('html, body').animate({scrollTop:0}, 'slow');
			return false;
		});

		//Hide Message Box
		jQuery('.sc-message-box .close').click( function() {
			jQuery(this).parent('.sc-message-box').fadeTo(400, 0.001).slideUp();
		});

		//Scroll to top
		jQuery(window).scroll(function() {
			if(jQuery(this).scrollTop() != 0) {
				jQuery('#toTop').fadeIn();	
			} else {
				jQuery('#toTop').fadeOut();
			}
		});
		jQuery('#toTop').click(function() {
			jQuery('body,html').animate({scrollTop:0},300);
		});


		//Toggle
		jQuery(".sc-toggle").each(function(){		
			jQuery(this).find(".inner").hide();		
		});
			
		jQuery(".sc-toggle").each(function(){			
			jQuery(this).find(".title").click(function() {
				jQuery(this).toggleClass("toggled").next().stop(true, true).slideToggle(100);
				return false;
			});		
		});


		// Navigation Tabs
		jQuery(".sc-tab").click(function () {
			jQuery(".sc-tab-active").removeClass("sc-tab-active");
			jQuery(this).addClass("sc-tab-active");
			jQuery(".pane").hide();
			var change_content=  jQuery(this).attr("id");
			jQuery("."+change_content).fadeIn();
			return false;
		});


		//ADD REL FOR FLICKR
		jQuery('.flickr_badge_image a').each(function(i){
		var src = jQuery(this).find('img').attr('src');
		var title = jQuery(this).find('img').attr('title');
		var src2 = src.replace(/_s.jpg/g, '.jpg');
		jQuery(this).removeAttr('href');
			jQuery(this).attr({
				href: src2,
				title: title,
				rel: 'prettyPhoto[Flickr]'
			});
		});

		//PRETTY PHOTO FOR FLICKR
		jQuery(".flickr_badge_image a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'fast',
			slideshow:3000,
			autoplay_slideshow: true,
			show_title:false,
			deeplinking: false,
			opacity: 0.5
		});

		//Home Slider Button
		jQuery('.flex-container').hover(function(){
			jQuery('.flex-pauseplay span, .flex-direction-nav li a',this).stop().fadeTo(500, 1);
			}, function() {
			jQuery('.flex-pauseplay span, .flex-direction-nav li a',this).stop().fadeTo(500, 0);
		});


		//Portfolio Slider
		jQuery('.sc-slider-list').fadeIn(900);
		jQuery('.sc-portfolio-slider-list ul').jcarousel({    
			animation: 500,
			scroll: 4,
			scroll: 1,
			//auto: 1,
			easing: 'swing'
		});

		//Blog Slider
		jQuery('.sc-blog-slider-list ul').jcarousel({    
			animation: 500,
			scroll: 4,
			scroll: 1,
			//auto: 1,
			easing: 'swing'
		});

		//Product Slider
		jQuery('.sc-product-slider-list ul').jcarousel({    
			animation: 500,
			scroll: 4,
			scroll: 1,
			//auto: 1,
			easing: 'swing'
		});
});



/*-----------------------------------------------------------------------------------*/
//	prettyPhoto
/*-----------------------------------------------------------------------------------*/
function prettyPhoto(){
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'fast',
			slideshow:3000,
			show_title:false,
			deeplinking: false,
			opacity: 0.5
		});
};



/*-----------------------------------------------------------------------------------*/
//	Image - Hover
/*-----------------------------------------------------------------------------------*/
function image_hover(){
	jQuery('.post-thumb-fade a.image-link').hover(function(){
	    jQuery('.wp-post-image',this).stop().fadeTo(500, 0.6);
	    jQuery('a.image-link').css('background', 'none');
		}, function() {
		jQuery('.wp-post-image',this).stop().fadeTo(300, 1.0);
	});
};




/*-----------------------------------------------------------------------------------*/
//	Preload
/*-----------------------------------------------------------------------------------*/
jQuery(window).bind('load', function() {
     var i = 1;
     var imgs = jQuery('.post-thumb-preload .wp-post-image').length;
     var int = setInterval(function() {

     if(i >= imgs) clearInterval(int);
     jQuery('.post-thumb-preload .wp-post-image:not(.image-loaded)').eq(0).animate({ top: "0", opacity: "1"}, 300,"easeInQuart").addClass('image-loaded');
     i++;
     
     }, 100);     
});


/*-----------------------------------------------------------------------------------*/
//	Preload - images - Quicksand
/*-----------------------------------------------------------------------------------*/
function preload_images(){
	  	jQuery('a.image-link').removeClass('image-loaded');
	  	jQuery('.wp-post-image').css('opacity','1');
};



/*-----------------------------------------------------------------------------------*/
//	Home Slider
/*-----------------------------------------------------------------------------------*/
function home_slider(){
	jQuery(window).load(function() {
		jQuery('.flexslider').fadeIn(1000);
		jQuery('.flex-container .loader').css({display: 'none'});
		jQuery('.flexslider').flexslider({
			animation: 'fade',
			slideshow: true,                
			slideshowSpeed: 6000,           
			animationDuration: 1000,         
			directionNav: true,             
			controlNav: true,              
			pausePlay: true,                               
			pauseOnAction: false,            
			pauseOnHover: true,    
			controlsContainer: '.flex-container'    
		});
	});
}



/*-----------------------------------------------------------------------------------*/
//	Single Slider
//preloadImage: jQuery("#single-slider").attr('data-loader'), 
//fadeSpeed: 150,
//slideSpeed: 350,
/*-----------------------------------------------------------------------------------*/
function single_slider(){
	jQuery('.slides_container').fadeIn(1000);
	jQuery('#single-slider .loader').css({display: 'none'});
	jQuery('#single-slider').slides({
		preload: false,
		generatePagination: true,
		generateNextPrev: true,
		paginationClass: 'single-slider-pagination',
		next: 'single-slider-next',
		prev: 'single-slider-prev',
		effect: 'fade',
		//play: 3000,
		//pause: 800,
		//bigTarget: true,
		autoHeight: true,
		bigTarget: true
	});
}



/*-----------------------------------------------------------------------------------*/
// jQuery Quicksand project categories filtering 
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
 	// Clone applications to get a second collection
	var $data = jQuery(".portfolio-sortable-grid").clone();
	
	jQuery('.portfolio-sortable-menu li').click(function(e) {
		jQuery(".filter li").removeClass("active");	
		var filterClass=jQuery(this).attr('class').split(' ').slice(-1)[0];
		
		if (filterClass == 'all-items') {
			var $filteredData = $data.find('.item');
		} else {
			var $filteredData = $data.find('.item.' + filterClass );
		}
		jQuery(".portfolio-sortable-grid").quicksand($filteredData, {
			duration: 500,
			useScaling: false,
			easing: 'swing',
			adjustHeight: 'dynamic',
			enhancement: function() {
				//jQuery('.wp-post-image:hidden').fadeIn(300);
				preload_images();
				image_hover();
				prettyPhoto();
			}		
		});
		jQuery(this).addClass("active");			
		return false;
	});
	
});