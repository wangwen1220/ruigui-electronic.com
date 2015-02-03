<?php
/**
 * Setup theme functions for Minamaze.
 *
 * @package ThinkUpThemes
 */

// Setup content width
if ( ! isset( $content_width ) )
	$content_width = 960;

/* ----------------------------------------------------------------------------------
	Add Theme Options Panel & Assign Variable Values
---------------------------------------------------------------------------------- */

	// Add Redux Framework - Credits attributable to http://reduxframework.com/
	require_once (get_template_directory() . '/admin/main/framework.php');

	// Add Theme Options Features.
	require_once( get_template_directory() . '/admin/main/options/00.theme-setup.php' );
	require_once( get_template_directory() . '/admin/main/options/00.variables.php' );
	require_once( get_template_directory() . '/admin/main/options/01.general-settings.php' );
	require_once( get_template_directory() . '/admin/main/options/02.homepage.php' );
	require_once( get_template_directory() . '/admin/main/options/03.header.php' );
	require_once( get_template_directory() . '/admin/main/options/04.footer.php' );
	require_once( get_template_directory() . '/admin/main/options/05.blog.php' );
	require_once( get_template_directory() . '/admin/main/options/08.special-pages.php' );

	// Add widget features.
//	include_once( get_template_directory() . '/lib/widgets/categories.php' );
//	include_once( get_template_directory() . '/lib/widgets/popularposts.php' );
//	include_once( get_template_directory() . '/lib/widgets/recentposts.php' );
//	include_once( get_template_directory() . '/lib/widgets/searchfield.php' );
//	include_once( get_template_directory() . '/lib/widgets/tagscloud.php' );

/* ----------------------------------------------------------------------------------
	Assign Theme Specific Functions
---------------------------------------------------------------------------------- */

/* Setup theme features, register menus and scripts.  */
if ( ! function_exists( 'thinkup_themesetup' ) ) {

	function thinkup_themesetup() {

		/* Load required files */
		require_once ( get_template_directory() . '/lib/functions/extras.php' );
		require_once ( get_template_directory() . '/lib/functions/template-tags.php' );

		/* Make theme translation ready. */
		load_theme_textdomain( 'lan-thinkupthemes', get_template_directory() . '/languages' );

		/* Add default theme functions. */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-background' );

		// Add support for custom header
		$args = apply_filters( 'custom-header', array( 'height' => 200, 'width'  => 1600 ) );
		add_theme_support( 'custom-header', $args );

		/* Register theme menu's. */
		register_nav_menus( array( 'pre_header_menu' => 'Pre Header Menu', ) );
		register_nav_menus( array( 'header_menu' => 'Primary Header Menu', ) );
		register_nav_menus( array( 'sub_footer_menu' => 'Footer Menu', ) );
	}
}
add_action( 'after_setup_theme', 'thinkup_themesetup' );


/* 优化 wp_head
----------------------------------------------------------------------------- */
// remove_action('wp_head', 'wp_enqueue_scripts', 1);
// remove_action('wp_head', 'feed_links', 2);
// remove_action('wp_head', 'feed_links_extra', 3);
// remove_action('wp_head', 'rsd_link');
// remove_action('wp_head', 'wlwmanifest_link');
// remove_action('wp_head', 'index_rel_link');
// remove_action('wp_head', 'parent_post_rel_link', 10, 0);
// remove_action('wp_head', 'start_post_rel_link', 10, 0);
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// remove_action('wp_head', 'locale_stylesheet');
// remove_action('publish_future_post', 'check_and_publish_future_post', 10, 1);
// remove_action('wp_head', 'noindex', 1);
// remove_action('wp_head', 'wp_print_styles', 8);
// remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_generator');
// remove_action('wp_head', 'rel_canonical');
// remove_action('wp_footer', 'wp_print_footer_scripts');
// remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// remove_action('template_redirect', 'wp_shortlink_header', 11, 0);
// add_action('widgets_init', 'my_remove_recent_comments_style');

// WordPress 技巧：移除后台核心，插件和主题的更新提示
// add_filter('pre_site_transient_update_core', '__return_null');

// remove_action ('load-update-core.php', 'wp_update_plugins');
// add_filter('pre_site_transient_update_plugins', '__return_null');

// remove_action ('load-update-core.php', 'wp_update_themes');
// add_filter('pre_site_transient_update_themes', '__return_null');

// add_filter('auto_update_core', '__return_false'); //关闭核心更新

// 隐藏 WP 图标
add_action('admin_head', 'modify_admin_head');
if (is_user_logged_in()) add_action('wp_head', 'modify_admin_head');
function modify_admin_head() {
	echo '
		<style>
			/* 定制导航菜单 */
			#wp-admin-bar-wp-logo,
			#wp-admin-bar-comments {
				display: none !important;
			}

			/* 修复媒体库 */
			.attachments-browser > .wp-filter {
				position: relative;
			}
		</style>
		<script>
			jQuery(function($) {
				var $siteName = $("#wp-admin-bar-site-name");
				var $body = $("body");
				var txt = $body.hasClass("wp-admin") ? "预览网站" : "管理后台";
				$siteName.children("a").text(txt)
					.next("div").has("#wp-admin-bar-view-site").remove();
			});
		</script>
	';
}

/* ----------------------------------------------------------------------------------
	Register Front-End Styles And Scripts
---------------------------------------------------------------------------------- */

function thinkup_frontscripts() {
	/* Add jQuery library. */
	wp_enqueue_script('jquery');

	/* Register theme stylesheets. */
	wp_register_style( 'style', get_stylesheet_uri(), '', '1.1.3' );
	wp_register_style( 'shortcodes', get_template_directory_uri() . '/styles/style-shortcodes.css', '', '1.1' );
	wp_register_style( 'responsive', get_template_directory_uri() . '/styles/style-responsive.css', '', '1.1' );
	wp_register_style( 'sidebarleft', get_template_directory_uri() . '/styles/layouts/thinkup-left-sidebar.css', '', '1.1' );
	wp_register_style( 'sidebarright', get_template_directory_uri() . '/styles/layouts/thinkup-right-sidebar.css', '', '1.1' );
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/css/bootstrap.min.css', '', '2.3.2' );
	wp_register_style( 'prettyPhoto', get_template_directory_uri().'/lib/extentions/prettyPhoto/css/prettyPhoto.css', '', '3.1.5' );

	/* Register Font Packages. */
	wp_register_style( 'font-awesome-min', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '3.2.1' );
	wp_register_style( 'font-awesome-cdn', get_template_directory_uri() . '/lib/extentions/font-awesome-4.2.0/css/font-awesome.min.css', '', '4.2.0' );
	wp_register_style( 'dashicons-css', get_template_directory_uri() . '/lib/extentions/dashicons/css/dashicons.css', '', '2.0' );

	/* Register theme scripts. */
	wp_register_script( 'frontend', get_template_directory_uri() . '/lib/scripts/main-frontend.js', array( 'jquery' ), '1.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/lib/scripts/modernizr.js', array( 'jquery' ), '', true );
	wp_register_script( 'retina', get_template_directory_uri() . '/lib/scripts/retina.js', array( 'jquery' ), '', true );
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/js/bootstrap.js', array( 'jquery' ), '2.3.2', true );
	wp_register_script( 'prettyPhoto', ( get_template_directory_uri()."/lib/extentions/prettyPhoto/jquery.prettyPhoto.js" ), array( 'jquery' ), '3.1.5', true );

		/* Add Font Packages */
		wp_enqueue_style( 'font-awesome-min' );
		wp_enqueue_style( 'font-awesome-cdn' );
		wp_enqueue_style( 'dashicons-css' );

		/* Add theme stylesheets */
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'prettyPhoto' );
		wp_enqueue_style( 'style' );
		wp_enqueue_style( 'shortcodes' );

		/* Add theme scripts */
		wp_enqueue_script( 'prettyPhoto' );
		wp_enqueue_script( 'frontend' );
		wp_enqueue_script( 'bootstrap' );
		wp_enqueue_script( 'modernizr' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Add ThinkUpSlider scripts
		if ( is_front_page() or thinkup_check_ishome() ) {
			wp_enqueue_script( 'thinkupslider', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides.min.js', array( 'jquery' ), '1.54' );
		wp_enqueue_script( 'thinkupslider-call', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides-call.js', array( 'jquery' ) );
		}
}
add_action( 'wp_enqueue_scripts', 'thinkup_frontscripts', 10 );


/* ----------------------------------------------------------------------------------
	Register Back-End Styles And Scripts
---------------------------------------------------------------------------------- */

function thinkup_adminscripts() {

	/* Register theme stylesheets. */
	wp_register_style( 'backend', get_template_directory_uri() . '/styles/backend/style-backend.css', '', 1.1 );

	/* Register theme scripts. */
	wp_register_script( 'backend', get_template_directory_uri() . '/lib/scripts/main-backend.js', array( 'jquery' ), '1.1' );

		/* Add theme stylesheets */
		wp_enqueue_style( 'backend' );

		/* Add theme scripts */
		wp_enqueue_script( 'backend' );
}
add_action( 'admin_enqueue_scripts', 'thinkup_adminscripts' );


//----------------------------------------------------------------------------------
//	Register Shortcodes Styles And Scripts
//----------------------------------------------------------------------------------

function thinkup_shortcodescripts() {

	// Register shortcode scripts
	wp_register_script( 'thinkupslider', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides.min.js', array( 'jquery' ), '1.54', 'true' );
	wp_register_script( 'thinkupslider-call', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides-call.js', array( 'jquery' ), '', 'true' );

		// Add shortcode scripts
		wp_enqueue_script( 'thinkupslider' );
		wp_enqueue_script( 'thinkupslider-call' );
}
add_action( 'wp_enqueue_scripts', 'thinkup_shortcodescripts', 10 );


/* ----------------------------------------------------------------------------------
	Register Theme Widgets
---------------------------------------------------------------------------------- */

function thinkup_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 1',
        'id' => 'footer-w1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 2',
        'id' => 'footer-w2',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 3',
        'id' => 'footer-w3',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 4',
        'id' => 'footer-w4',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 5',
        'id' => 'footer-w5',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 6',
        'id' => 'footer-w6',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
 }
add_action( 'widgets_init', 'thinkup_widgets_init' );

/* 设置菜单
----------------------------------------------------------------------------- */
function get_wp_menu($location) {
  // echo str_replace('</ul></div>', '', ereg_replace('<div[^>]*><ul[^>]*>', '', wp_nav_menu(array(
  //   'theme_location' => 'nav-menu',
  //   'echo' => false,
  //   'depth' => 1
  // ))));

  // 如果 theme_location 项给定的菜单没有在后台设置，下面有些设置项会失效
  $args = array(
    'theme_location' => $location.'-menu',
    'container' => false,
    'menu_class' => 'menu-list',
    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
    // 'fallback_cb' => 'emall_nav_menu',
    'depth' => 1
  );

  wp_nav_menu($args);
}

// 移除菜单的多余的 id 和 class
// From http://www.wpdaxue.com/remove-wordpress-nav-classes.html
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

function my_css_attributes_filter($var) {
  // 全部移除
  // return is_array($var) ? array() : '';

  // 保留：current-post-ancestor, current-menu-ancestor, current-menu-item, current-menu-parent
  return is_array($var) ? array_intersect($var, array('menu-item', 'current-menu-item', 'current-post-ancestor', 'current-menu-ancestor', 'current-menu-parent')) : '';
}