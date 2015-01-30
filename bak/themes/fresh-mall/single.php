<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _s
 */

$post = $wp_query->post; 
$catid = get_option('shopcatid');
$catid = explode(',',$catid);
if ( in_category($catid) ) { 
include(TEMPLATEPATH . '/single-shop.php'); 
} 
else { 
include(TEMPLATEPATH . '/single-good.php'); 
}  ?>