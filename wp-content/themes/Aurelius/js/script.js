jQuery.noConflict();
//media upload script
jQuery(document).ready(function($) {
		$('.mytheme_upload_button').live("click", function() {
			formfield = $(this).attr('name');	 
			var classList =$(this).attr('class').split(' ');
			var url_input = classList[1];
			tb_show('Media Upload', 'media-upload.php?type=image&amp;TB_iframe=true');
			$('html').append("<meta name=\"mytheme_upload_button\" content=\""+url_input+"\" /> ");		
			window.custom_editor = true;
			return false;	
		});

		window.mytheme_upload_send_to_editor= window.send_to_editor;
		window.send_to_editor = function(html)
		{	
			var mytheme_upload_button= $("meta[name=mytheme_upload_button]").attr('content');
			if (mytheme_upload_button) 
			{	
					imgurl = $('img',html).attr('src');
					$('#'+mytheme_upload_button).val(imgurl);
					tb_remove();
					$("meta[name=mytheme_upload_button]").remove();
			}
			else 
			{
					window.mytheme_upload_send_to_editor(html);
			}
		};
});