(function ()
{
	// create dotShortcodes plugin
	tinymce.create("tinymce.plugins.dotShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("dotPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "dot_button" )
			{	
				var a = this;
					
				// adds the tinymce button
				btn = e.createMenuButton("dot_button",
				{
					title: "Insert Shortcode",
					image: "../wp-content/themes/mu-types/wraps/shortcodes/tinymce/images/icon.png",
					icons: false
				});
				
				// adds the dropdown to the button
				btn.onRenderMenu.add(function (c, b)
				{					
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Highlight Text", "highlight_text" );
					a.addWithPopup( b, "Icon Lists", "icon_list" );
					a.addWithPopup( b, "Icon Boxes", "icon_box");
					a.addWithPopup( b, "Message Boxes", "message_box");
					a.addWithPopup( b, "Gallery", "gallery");
					a.addWithPopup( b, "Blog Slider List", "blog_slider_list");
					a.addWithPopup( b, "Portfolio Slider List", "portfolio_slider_list");
					a.addWithPopup( b, "Product Slider List", "product_slider_list");
					a.addWithPopup( b, "Slidershow", "slidershow");
					a.addWithPopup( b, "Style Image", "style_image" );
					a.addWithPopup( b, "Tabbed", "tabs" );
					a.addWithPopup( b, "Toggle", "toggles" );
				});
				
				return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("dotPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Dot Shortcodes',
				author: 'HawkTheme',
				authorurl: 'http://themeforest.net/user/HawkTheme/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add dotShortcodes plugin
	tinymce.PluginManager.add("dotShortcodes", tinymce.plugins.dotShortcodes);
})();