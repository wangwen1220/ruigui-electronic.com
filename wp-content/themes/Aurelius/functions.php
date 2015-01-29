<?php

add_action('admin_print_scripts', 'admin_scripts');

function admin_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('mytheme_upload', get_bloginfo('template_url') . '/js/script.js', array());
    wp_enqueue_script('mytheme_upload');
}

include(TEMPLATEPATH . '/custom_form.php');
include(TEMPLATEPATH . '/custom_form_2.php');
?>
<?php

if (function_exists('register_sidebar'))
    register_sidebar();
?>