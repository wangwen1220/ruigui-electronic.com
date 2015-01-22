	var offset_top = 30;
	var headline_pos = $('#secondary').offset();
	
	$(window).scroll(function()
	{
		var scroll_top = $(window).scrollTop();
		//if (scroll_top > (headline_pos.top-offset_top))
		if (scroll_top > 30)
		{
			$('.sidebox').addClass('fixed');
		}
		else
		{
			$('.sidebox').removeClass('fixed');
		}
	});