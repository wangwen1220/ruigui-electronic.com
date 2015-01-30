/* 
@Scroll Top
*/
jQuery(document).ready(function(){
	jQuery('.divider a').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
		return false;
	});
});