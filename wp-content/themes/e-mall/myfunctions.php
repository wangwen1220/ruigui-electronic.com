<?php
$new_meta_boxes =
array(
    "good_gourl" => array(
        "name" => "good_gourl",
        "std" => "请输入宝贝的直达链接，如 http://s.click.taobao.com.....",
        "title" => "直接链接:"),

    "haikuo_tb_price" => array(
        "name" => "haikuo_tb_price",
        "std" => "请输入宝贝的价格，如 190.00、89.50 ",
        "title" => "宝贝价格:")
);
function new_meta_boxes() {
    global $post, $new_meta_boxes;

    foreach($new_meta_boxes as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'] , true);

       // if($meta_box_value == "")
       //     $meta_box_value = $meta_box['std'];

        // 自定义字段标题
        echo'<h4>'.$meta_box['title'].'</h4><p>'.$meta_box['std'].'</p>';

        // 自定义字段输入框
        echo '<textarea cols="80" rows="3" style="width:95%;" name="'.$meta_box['name'].'">'.$meta_box_value.'</textarea><br />';
    }
    
    echo '<input type="hidden" name="newmetaboxes_noncename" id="newmetaboxes_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}



function create_meta_box() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '商品信息', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
}



function save_postdata( $post_id ) {
    global $new_meta_boxes;
    
    if ( !wp_verify_nonce( $_POST['newmetaboxes_noncename'], plugin_basename(__FILE__) ))
        return;
    
    if ( !current_user_can( 'edit_posts', $post_id ))
        return;
                    
    foreach($new_meta_boxes as $meta_box) {
        $data = $_POST[$meta_box['name']];

        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'] , $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}


add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');
?>