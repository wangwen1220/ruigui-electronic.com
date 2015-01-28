<?php
/**
 * Setup theme functions for e-mall.
 *
 * @package Steven
 */

// SET THEME CONSTANTS
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());
define('THEME_VER', '1.0.0');

// SET FOLDER CONSTANTS
define('ADMIN_DIR', TEMPLATEPATH.'/admin');

// 加载主题设置框架
require_once(ADMIN_DIR.'/panel.php');
require_once(ADMIN_DIR.'/theme-form.php');
require_once(ADMIN_DIR.'/theme-options.php');

// TODO
// require_once(TEMPLATEPATH .'/myfunctions.php');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
  $content_width = 960; // pixels
}

if (!function_exists('emall_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which runs
   * before the init hook. The init hook is too late for some features, such as indicating
   * support post thumbnails.
   */
  function emall_setup() {
    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on emall, use a find and replace
     * to change 'emall' to the name of your theme in all the template files
     */
    load_theme_textdomain('emall', THEME_DIR.'/languages');

    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support('automatic-feed-links');

    /**
     * Enable support for Post Thumbnails on posts and pages
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    // add_theme_support('post-thumbnails');

    /**
     * This theme uses wp_nav_menu() in one location.
     */
    // register_nav_menus(array(
    //   'topbar-menu' => __('顶部菜单'),
    //   'nav-menu' => __('导航菜单'),
    //   'footer-menu'  => __('页脚菜单')
    // ));
    register_nav_menus(array(
      'nav-menu' => '导航菜单',
      'topbar-menu' => '顶部菜单',
      'footer-menu'  => '页脚菜单'
    ));
    // register_nav_menus(array( 'sub_footer_menu' => 'Footer Menu', ));

    /**
     * Enable support for Post Formats
     */
    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
  }
endif; // end emall_setup

add_action('after_setup_theme', 'emall_setup');

// SEO 优化设置
function emall_seo() {
  global $keywords, $description;
  if (is_home()) {
    $keywords = get_option('index_key');
    $keywords = 'index_key';
    $description = get_option('desc_textarea');
  } elseif (is_single() || is_page()) {
    $keywords = tagtext();
    $description = get_the_title();
  } elseif (is_category()) {
    $description = category_description();
    if (!empty($description) && get_query_var('paged')) {
      $description .= '(page'.get_query_var('paged').')';
    }
    $keywords = single_cat_title('', false);
  } elseif (is_tag()) {
    $description = tag_description();
    if (!empty($description) && get_query_var('paged')) {
      $description .= '(page'.get_query_var('paged').')';
    }
    $keywords = single_tag_title('', false);
  }

  echo '<meta name="keywords" content="'.$keywords.'">'."\n";
  echo '<meta name="description" content="'.$description.'">'."\n";
}

add_action('wp_seo', 'emall_seo');

// 优化 wp_head
remove_action('wp_head', 'wp_enqueue_scripts', 1);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'locale_stylesheet');
remove_action('publish_future_post', 'check_and_publish_future_post', 10, 1);
remove_action('wp_head', 'noindex', 1);
remove_action('wp_head', 'wp_print_styles', 8);
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_generator');
// remove_action('wp_head', 'rel_canonical');
remove_action('wp_footer', 'wp_print_footer_scripts');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('template_redirect', 'wp_shortlink_header', 11, 0);
add_action('widgets_init', 'my_remove_recent_comments_style');

function my_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory -> widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

// 获取菜单
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

// function emall_nav_menu() {
//   $args = array(
//     'title_li' => null,
//     'sort_column' => 'menu_order',
//     'depth' => 1
//   );

//   echo '<ul>'."\n";
//   wp_list_pages($args);
//   echo '</ul>'."\n";
// }

/**
 * 移除菜单的多余的 id 和 class
 * From http://www.wpdaxue.com/remove-wordpress-nav-classes.html
 */
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

function my_css_attributes_filter($var) {
  // 全部移除
  // return is_array($var) ? array() : '';

  // 保留：current-post-ancestor, current-menu-ancestor, current-menu-item, current-menu-parent
  return is_array($var) ? array_intersect($var, array('menu-item', 'current-menu-item', 'current-post-ancestor', 'current-menu-ancestor', 'current-menu-parent')) : '';
}

/*** 获取缩略图 ***/
function get_post_img($id = null, $width = '122', $height = '140') {
  if ($id) {
    $post = get_post($id);
    $post_id = $id;
  } else {
    global $post;
    $post_id = $post -> ID;
  }

  $output = preg_match_all('/\< *[img][^\>]*src *= *[\"\']{0,1}([^\"\'\ >]*)/i', $post->post_content, $matches);

  if (!empty($matches[1][0])) {
    return $matches[1][0];
  } else {
    return '';
  }
}

// 页码函数
function pagenavi() {
    global $wp_query, $wp_rewrite;
    $wp_query -> query_vars['paged'] > 1 ? $current = $wp_query -> query_vars['paged'] : $current = 1;
    $pagination = array(
      'base' => @add_query_arg('paged','%#%'),
      'format' => '',
      'total' => $wp_query -> max_num_pages,
      'current' => $current,
      'show_all' => false,
      'end_size' => '1',
      'mid_size' => '10',
      'type' => 'plain',
      'prev_next' => false
   );

  if ($wp_rewrite -> using_permalinks()) {
    $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))).'page/%#%/', 'paged');
  }
  if (!empty($wp_query -> query_vars['s'])) {
    $pagination['add_args'] = array('s' => get_query_var('s'));

    previous_posts_link('Prev','');
    echo paginate_links($pagination);
    next_posts_link('Next','');
  }
  if ($pagination['total'] > 1) {
    // code
  }
}

/*** 归档页标签 ***/
function get_category_tags($args) {
    global $wpdb;
    $tags = $wpdb -> get_results("
      SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name, null as tag_link
      FROM
        wp_posts as p1
        LEFT JOIN wp_term_relationships as r1 ON p1.ID = r1.object_ID
        LEFT JOIN wp_term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
        LEFT JOIN wp_terms as terms1 ON t1.term_id = terms1.term_id,
        wp_posts as p2
        LEFT JOIN wp_term_relationships as r2 ON p2.ID = r2.object_ID
        LEFT JOIN wp_term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
        LEFT JOIN wp_terms as terms2 ON t2.term_id = terms2.term_id
      WHERE
        t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id IN (".$args['categories'].") AND
        t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
        AND p1.ID = p2.ID
      ORDER by tag_name
    ");
    $count = 0;
    foreach ($tags as $tag) {
      $tags[$count] -> tag_link = get_tag_link($tag -> tag_id);
      $count++;
    }
    return $tags;
}

// TODO
/*** 自定义评论 ***/
function mytheme_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" class="user">
  <?php
  if ($comment -> user_id) {
    $user_info = get_userdata($comment->user_id);
  ?>
  <?php echo get_avatar($comment -> user_id, 30); ?>
  <?php } else {
    echo get_avatar($comment, 30,'',$comment->comment_author);
  }
  ?>
  <?php printf(__('<p class="book_cmts"><span class="u"><a href="javascript:;">%s</a></span>'), get_comment_author_link()) ?>
  <?php if ($comment -> comment_approved == '0') : ?>
    <em><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
  <?php endif; ?>
  <?php comment_text() ?>
    </div>
  <?php
}

function wp_bac_breadcrumb() {
    //Variable (symbol >> encoded) and can be styled separately.
    //Use >> for different level categories (parent >> child >> grandchild)
    $delimiter = ' &raquo; ';
    //Use bullets for same level categories (parent.parent)
    $delimiter1 = '<span class="delimiter1"> &bull; </span>';

    //text link for the 'Home' page
    $main = '首页';
    //Display only the first 30 characters of the post title.
    $maxLength= 30;

    //variable for archived year
    $arc_year = get_the_time('Y');
    //variable for archived month
    $arc_month = get_the_time('F');
    //variables for archived day number + full
    $arc_day = get_the_time('d');
    $arc_day_full = get_the_time('l');

    //variable for the URL for the Year
    $url_year = get_year_link($arc_year);
    //variable for the URL for the Month
    $url_month = get_month_link($arc_year,$arc_month);

    /*is_front_page(): If the front of the site is displayed, whether it is posts or a Page. This is true
    when the main blog page is being displayed and the 'Settings > Reading ->Front page displays'
    is set to "Your latest posts", or when 'Settings > Reading ->Front page displays' is set to
    "A static page" and the "Front Page" value is the current Page being displayed. In this case
    no need to add breadcrumb navigation. is_home() is a subset of is_front_page() */

    //Check if NOT the front page (whether your latest posts or a static page) is displayed. Then add breadcrumb trail.
    if (!is_front_page()) {
        global $post, $cat;
        //A safe way of getting values for a named option from the options database table.
        $homeLink = get_option('home'); //same as: $homeLink = get_bloginfo('url');
        //If you don't like "You are here:", just remove it.
        echo '<a href="'.$homeLink.'">'.$main.'</a>'.$delimiter;

        //Display breadcrumb for single post
        if (is_single()) { //check if any single post is being displayed.
            //Returns an array of objects, one object for each category assigned to the post.
            //This code does not work well (wrong delimiters) if a single post is listed
            //at the same time in a top category AND in a sub-category. But this is highly unlikely.
            $category = get_the_category();
            $num_cat = count($category); //counts the number of categories the post is listed in.

            //If you have a single post assigned to one category.
            //If you don't set a post to a category, WordPress will assign it a default category.
            if ($num_cat <=1)  //I put less or equal than 1 just in case the variable is not set (a catch all).
            {
                echo get_category_parents($category[0],  true,' '.$delimiter.' ');
                //Display the full post title.
                echo ' ' .'<span>'. get_the_title().'</span>';
            }
            //then the post is listed in more than 1 category.
            else {
                //Put bullets between categories, since they are at the same level in the hierarchy.
                echo the_category($delimiter1, multiple);
                    //Display partial post title, in order to save space.
                    if (strlen(get_the_title()) >= $maxLength) { //If the title is long, then don't display it all.
                        echo ' '.$delimiter .'<span>'. trim(substr(get_the_title(), 0, $maxLength)).' ...</span>';
                    }
                    else { //the title is short, display all post title.
                        echo ' '.$delimiter .'<span>'. get_the_title().'</span>';
                    }
            }
        }
        //Display breadcrumb for category and sub-category archive
        elseif (is_category()) { //Check if Category archive page is being displayed.
            //returns the category title for the current page.
            //If it is a subcategory, it will display the full path to the subcategory.
            //Returns the parent categories of the current category with links separated by '»'
            echo get_category_parents($cat, true,' '.$delimiter.' ');
        }
        //Display breadcrumb for tag archive
        elseif (is_tag()) { //Check if a Tag archive page is being displayed.
            //returns the current tag title for the current page.
            echo 'Posts Tagged: "'.single_tag_title("", false).'"';
        }
        //Display breadcrumb for calendar (day, month, year) archive
        elseif (is_day()) { //Check if the page is a date (day) based archive page.
            echo '<a href="'.$url_year.'">'.$arc_year.'</a> '.$delimiter.' ';
            echo '<a href="'.$url_month.'">'.$arc_month.'</a> '.$delimiter.$arc_day.' ('.$arc_day_full.')';
        }
        elseif (is_month()) {  //Check if the page is a date (month) based archive page.
            echo '<a href="'.$url_year.'">'.$arc_year.'</a> '.$delimiter.$arc_month;
        }
        elseif (is_year()) {  //Check if the page is a date (year) based archive page.
            echo $arc_year;
        }
         //Display breadcrumb for top-level pages (top-level menu)
        elseif (is_page() && !$post->post_parent) { //Check if this is a top Level page being displayed.
            echo get_the_title();
        }
        //Display breadcrumb trail for multi-level subpages (multi-level submenus)

        //Display breadcrumb for author archive
        elseif (is_author()) {//Check if an Author archive page is being displayed.
            global $author;
            //returns the user's data, where it can be retrieved using member variables.
            $user_info = get_userdata($author);
            echo  'Archived Article(s) by Author: '.$user_info->display_name ;
        }
        //Display breadcrumb for 404 Error
        elseif (is_404()) {//checks if 404 error is being displayed
            echo  'Error 404 - Not Found.';
        }
        else {
            //All other cases that I missed. No Breadcrumb trail.
        }
    }
}

function bm_dont_display_it($content) {
  if (!empty($content)) {
    $content = str_ireplace('<li>' .__("没有分类目录"). '</li>', "", $content);
  }
  return $content;
}
add_filter('wp_list_categories','bm_dont_display_it');

//输出标签
function tagtext() {
global $post;
$gettags = get_the_tags($post->ID);
if($gettags) {
foreach ($gettags as $tag) {
$posttag[] = $tag->name;
}
$tags = implode(',', $posttag);
return $tags;
}
}


function my_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>">
<div class="comment-author vcard">
<?php echo get_avatar($comment,$size='48'); ?>
</div>
<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.') ?></em>
<br />
<?php endif; ?>

<div class="comment-meta commentmetadata"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),' ','') ?></div>

<?php comment_text() ?>

<div class="reply">
<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</div>
<?php
}


/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function emall_register_custom_background() {
  $args = array(
    'default-color' => 'ffffff',
    'default-image' => '',
  );

  $args = apply_filters('emall_custom_background_args', $args);

  if (function_exists('wp_get_theme')) {
    add_theme_support('custom-background', $args);
  } else {
    define('BACKGROUND_COLOR', $args['default-color']);
    if (! empty($args['default-image']))
      define('BACKGROUND_IMAGE', $args['default-image']);
    add_custom_background();
  }
}
add_action('after_setup_theme', 'emall_register_custom_background');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function emall_widgets_init() {
  register_sidebar(array(
    'name'          => __('Sidebar', 'emall'),
    'id'            => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ));
}
add_action('widgets_init', 'emall_widgets_init');

/**
 * Enqueue scripts and styles
 */
function emall_scripts() {
  wp_enqueue_style('emall-style', get_stylesheet_uri());

  wp_enqueue_script('emall-navigation', THEME_URI.'/js/navigation.js', array(), '20120206', true);

  wp_enqueue_script('emall-skip-link-focus-fix', THEME_URI.'/js/skip-link-focus-fix.js', array(), '20130115', true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  if (is_singular() && wp_attachment_is_image()) {
    wp_enqueue_script('emall-keyboard-image-navigation', THEME_URI.'/js/keyboard-image-navigation.js', array('jquery'), '20120202');
  }
}
add_action('wp_enqueue_scripts', 'emall_scripts');

/**
 * Implement the Custom Header feature.
 */
//require THEME_DIR.'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require THEME_DIR.'/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require THEME_DIR.'/inc/extras.php';

/**
 * Customizer additions.
 */
require THEME_DIR.'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require THEME_DIR.'/inc/jetpack.php';

/**
 * WordPress.com-specific functions and definitions.
 */
//require THEME_DIR.'/inc/wpcom.php';
