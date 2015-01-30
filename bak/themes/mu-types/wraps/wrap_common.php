<?php
/*
* ----------------------------------------------------------------------------------------------------
* Theme Common
* @PACKAGE BY HAWKTHEME
* ----------------------------------------------------------------------------------------------------
*/

#
#Add basic theme functions
#
add_theme_support('menus');
add_theme_support('post-thumbnails', array('post', 'portfolio', 'product', 'download', 'event', 'team', 'slidershow'));
add_theme_support('automatic-feed-links');
add_editor_style( '/assets/css/style-editor.css' );

load_theme_textdomain( 'HK', LANG_DIR );

register_nav_menus( array( 
	'top menu' => esc_html__( 'Top Navigation', 'HK' ),
	'bottom menu' => esc_html__( 'Bottom Navigation', 'HK' )
)); 




#
#Set the thumbs size for the posts
#

#
#Get theme options
#
$home_slidershow_height = get_theme_option('slidershow','slidershow_image_height');

$thumb_size['imgSize']['size-50-50'] = array('width'=>50,  'height'=>50);
$thumb_size['imgSize']['size-90-90'] = array('width'=>90,  'height'=>90);
$thumb_size['imgSize']['size-125-125'] = array('width'=>125,  'height'=>125);
$thumb_size['imgSize']['size-225-130'] = array('width'=>225,  'height'=>130);
$thumb_size['imgSize']['size-225-160'] = array('width'=>225,  'height'=>160);
$thumb_size['imgSize']['size-400-230'] = array('width'=>400,  'height'=>230);
$thumb_size['imgSize']['size-600-400'] = array('width'=>600,  'height'=>400);
$thumb_size['imgSize']['size-670-210'] = array('width'=>670,  'height'=>210);
$thumb_size['imgSize']['size-product-single'] = array('width'=>480,  'height'=>400);
$thumb_size['imgSize']['size-event-single'] = array('width'=>480,  'height'=>400);
$thumb_size['imgSize']['size-team-single'] = array('width'=>480,  'height'=>400);
$thumb_size['imgSize']['size-blog-single'] = array('width'=>670,  'height'=>410);
$thumb_size['imgSize']['size-portfolio-single'] = array('width'=>990,  'height'=>500);
$thumb_size['imgSize']['size-home-slider'] = array('width'=>990,  'height'=>$home_slidershow_height);
$thumb_size['imgSize']['size-shortcode-slider'] = array('width'=>990,  'height'=>430);

theme_add_thumbnail_size($thumb_size);



#
#Creates wordpress image thumb sizes for the theme
#
function theme_add_thumbnail_size($thumb_size)
{	
	foreach ($thumb_size['imgSize'] as $sizeName => $size)
	{
		if($sizeName == 'base')
		{
			set_post_thumbnail_size($thumb_size['imgSize'][$sizeName]['width'], $thumb_size[$sizeName]['height'], true);
		}
		else
		{	
			add_image_size(	 
				$sizeName,
				$thumb_size['imgSize'][$sizeName]['width'], 
				$thumb_size['imgSize'][$sizeName]['height'], 
				true);
		}
	}
}



#
#Remove Auto <p> For Shortcodes
#
function theme_remove_autop($content) 
{ 
	$content = do_shortcode( shortcode_unautop( $content ) ); 
	$content = preg_replace('#^<\/p>|^<br\s?\/?>|<p>$|<p>\s*(&nbsp;)?\s*<\/p>#', '', $content);
	return $content;
}



#
#Remove Default Widgets & Add Shortcode Support
#
function theme_remove_wp_widgets()
{
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_RSS');
	//unregister_widget('WP_Widget_Tag_Cloud');
}

add_action('widgets_init', 'theme_remove_wp_widgets');
add_filter('widget_text', 'do_shortcode');



#
#Register Widgets Function
#
if ( function_exists('register_sidebar') )
{	
	$sidebars = array('page', 'blog', 'download', 'event', 'archive', 'contact', 'search');	
	foreach ($sidebars as $sidebar)
	{	
		register_sidebar( array (
			'name' => $sidebar.' sidebar',
			'id' => $sidebar.'-widget-area',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));
	}


	$footer_columns = get_theme_option('footer','widget_columns');
	for ($i = 1; $i <= $footer_columns; $i++)
	{
		register_sidebar(array(
			'name' => 'footer widget '.$i,
			'id' => 'footer-widget-area-'.$i,
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
	}
}



#
# Fixed WP Title
#
function theme_filter_wp_title( $title, $separator ) 
{
	if ( is_feed() )
		return $title;

	global $paged, $page;

	if ( is_search() ) {
		$title = sprintf( esc_html__( 'Search results for %s', 'HK' ), '"' . get_search_query() . '"' );
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( esc_html__( 'Page %s', 'HK' ), $paged );
			$title .= " $separator " . get_bloginfo( 'name', 'display' );
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( esc_html__( 'Page %s', 'HK' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'theme_filter_wp_title', 10, 2 );



#
#Theme Comments List
#
function theme_comment( $comment, $args, $depth ) 
{
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="pingback">
		<?php esc_html_e( 'Pingback:', 'HK' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'HK' ), '<span class="edit-link">', '</span>' ); ?>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="clearfix comment-wrap">
		<div class="comment-author vcard">
		<?php
			$avatar_size = 64;
			if ( '0' != $comment->comment_parent ) { $avatar_size = 48; }
			echo get_avatar( $comment, $avatar_size );
		?>	
		<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<span class="reply">Reply</span>', 'HK' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?><!-- .reply -->
		</div><!-- .comment-author .vcard -->

		<div class="comment-entry">
			<div class="comment-meta">
			<?php
			printf( __( '%1$s on %2$s <span class="says">said:</span>', 'HK' ),
			sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
			sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
				esc_url( get_comment_link( $comment->comment_ID ) ),
				get_comment_time( 'c' ),
				/* translators: 1: date, 2: time */
				sprintf( __( '%1$s at %2$s', 'HK' ), get_comment_date(), get_comment_time() )
			));
			edit_comment_link( __( 'Edit', 'HK' ), '<span class="edit-link">', '</span>' ); 
			?>
			</div>
			<div class="comment-content">
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'HK' ); ?></em>
			<?php endif; ?>
			<div class="comment-text post-content"><?php comment_text(); ?></div>
			</div>
		</div><!-- .comment-entry -->
	</article><!-- #comment-## -->
	<?php
	break;
	endswitch;
}


#
#Theme Comments Form
#
function theme_comment_form() 
{
	$fields =  array(
			'author' => '<p><input id="author" class="comment-form-file"  name="author" type="text" value="" placeholder="Name" size="30" /></p>',
			'email'  => '<p><input id="email" class="comment-form-file" name="email" type="text" value="" placeholder="Email" size="30" /></p>',
			'url'    => '<p><input id="url" class="comment-form-file" name="url" type="text" value="" placeholder="Website" size="30" /></p>'
	);

	$args = array(
			'title_reply' =>  esc_html__( 'Leave a Reply', 'HK' ),
			'cancel_reply_link' =>  esc_html__( 'Cancel reply', 'HK' ),
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field' => '<textarea id="comment" class="comment-form-comment" name="comment" rows="5"></textarea>',
			'comment_notes_after' => ''
	);
	
	comment_form($args); 

}


?>