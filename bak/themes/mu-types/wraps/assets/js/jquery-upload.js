jQuery(document).ready(function() {
   
	//Favicon Image Upload
	jQuery('#favicon_button').click(function() {		
		window.send_to_editor = function(html) 		
		{
			imgurl = jQuery('img',html).attr('src');
			jQuery('#favicon').val(imgurl);
			tb_remove();
		}	 
	 
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;		
	});


	//Logo Image Upload
	jQuery('#logo_button').click(function() {		
		window.send_to_editor = function(html) 		
		{
			imgurl = jQuery('img',html).attr('src');
			jQuery('#logo').val(imgurl);
			tb_remove();
		}	 
	 
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;		
	});


	//Special Image Upload
	jQuery('#slidershow_special_image_button').click(function() {		
		window.send_to_editor = function(html) 		
		{
			imgurl = jQuery('img',html).attr('src');
			jQuery('#slidershow_special_image').val(imgurl);
			tb_remove();
		}	 
	 
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;		
	});


	//Poster Image Upload
	jQuery('#slidershow_video_preview_button').click(function() {		
		window.send_to_editor = function(html) 		
		{
			imgurl = jQuery('img',html).attr('src');
			jQuery('#slidershow_video_preview').val(imgurl);
			tb_remove();
		}	 
	 
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;		
	});

	//Background Image Upload
	jQuery('#body_bg_image_button').click(function() {		
		window.send_to_editor = function(html) 		
		{
			imgurl = jQuery('img',html).attr('src');
			jQuery('#body_bg_image').val(imgurl);
			tb_remove();
		}	 
	 
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;		
	});

});