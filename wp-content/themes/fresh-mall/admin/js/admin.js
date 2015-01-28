jQuery.noConflict();
jQuery(document).ready(function($) {
	/* 图片上传、插入以及预览 */
	var _ste = window.send_to_editor;
	$('.thickbox').live('click', function(){
		if($(this).hasClass('wpd-upload-button')) {
			var preview = $(this).siblings('.wpd-upload-preview'),
				text = $(this).siblings('.wpd-upload-text');
		
			window.send_to_editor = function(html) {
				console.log(html);
				var imgurl = $(html).find('img').attr('src');
				if(!imgurl)
					imgurl = $(html).attr('src');
				if(imgurl) {
					text.val(imgurl);
					preview.html('<img src="'+imgurl+'" />');
				}
				window.send_to_editor = _ste;
				tb_remove();
			}
			
			return false;
		} else {
			window.send_to_editor = _ste;
		}
	});
	$('.wpd-remove-button').live('click', function(e){
		e.preventDefault();
		preview = $(this).siblings('.wpd-upload-preview');
		text = $(this).siblings('.wpd-upload-text');
		text.val('');
		preview.empty();
	});
	$('.wpd-upload-preview').each(function(){
		text = $(this).siblings('.wpd-upload-text');
		if(text.val())
			$(this).html('<img src="'+text.val()+'" />');
	})
	
	/* 全部展开/合并、恢复默认按钮 */
	$(".toggel-all").click(function(){
		if($(".postbox").hasClass("closed")) {
			$(".postbox").removeClass("closed");
		} else {
			$(".postbox").addClass("closed");
		};
		postboxes.save_state(pagenow);
				
		return false;
	});
	$('.reset').click(function(){
		if (confirm("警告！恢复默认设置将清除所有更改，你确定要这么做吗?")) { 
			return true;
		} else { 
			return false; 
		}
	});		
	
	/* Color Picker */
	$('.wpd-color-handle').each(function(){
		current_color = $(this).next('.wpd-color-input').attr('value');
		$(this).css('backgroundColor', current_color);
		var c = $(this).ColorPicker({
			color: $(this).next('.wpd-color-input').attr('value'),
			onChange: function (hsb, hex, rgb, el) {
				$(c).css('backgroundColor', '#' + hex);
				$(c).next('.wpd-color-input').attr('value', '#' + hex);
			}
		});
	});
	
	$('#wpd-color-scheme').change(function(){
		if($(this).val() == 'custom') {
			$('.in-color-scheme').parents('tr').show();
		} else {
			$('.in-color-scheme').parents('tr').hide();
		}
	}).change();	
	$('#wpd-preset-bgpat').change(function(){
		var pat = $(this).val();
		if(pat != '')
			$('.wpd-preset-bgpat-preivew').css('background', 'url('+pat+')');
	}).change();
	if(jQuery().sortable) {
	$('.sortable-list').sortable({
		cursor: 'move'
	});
	}
	
	$('.handler .up').click(function(){
		var currentItem = $(this).parents('li');
		var prevItem = currentItem.prev('li');
		
		prevItem.before(currentItem);
	});
	
	$('.handler .down').click(function(){
		var currentItem = $(this).parents('li');
		var nextItem = currentItem.next('li');
		
		nextItem.after(currentItem);
	});
	
	/* 设置面板展开/合并 */
	$('.section-handlediv, .section-hndle').live('click', function(){
		$(this).parents('.section-box').find('.section-inside').toggle();
	});
});